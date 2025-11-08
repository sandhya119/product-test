<!DOCTYPE html>
<html>
<head>
  <title>Product Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="p-4 bg-light">
<div class="container">
  <h3 class="mb-4 text-center">Product Entry</h3>

  <form id="form" class="row g-2 mb-4">
    <div class="col-md-4">
      <input type="text" name="name" class="form-control" placeholder="Product Name" required>
    </div>
    <div class="col-md-3">
      <input type="number" name="qty" class="form-control" placeholder="Quantity" required>
    </div>
    <div class="col-md-3">
      <input type="number" step="0.01" name="price" class="form-control" placeholder="Price" required>
    </div>
    <div class="col-md-2">
      <button class="btn btn-primary w-100">Add</button>
    </div>
  </form>

  <table class="table table-bordered bg-white">
    <thead class="table-dark">
      <tr>
        <th>Name</th><th>Qty</th><th>Price</th><th>Date</th><th>Total</th><th>Action</th>
      </tr>
    </thead>
    <tbody id="tableBody">
      @php $sum = 0; @endphp
      @foreach($products as $index => $p)
        @php $sum += $p['total']; @endphp
        <tr data-index="{{ $index }}">
          <td class="name">{{ $p['name'] }}</td>
          <td class="qty">{{ $p['qty'] }}</td>
          <td class="price">{{ number_format($p['price'], 2) }}</td>
          <td>{{ $p['datetime'] }}</td>
          <td class="total">{{ number_format($p['total'], 2) }}</td>
          <td><button class="btn btn-sm btn-primary editBtn">Edit</button></td>
        </tr>
      @endforeach
      <tr class="fw-bold table-info">
        <td colspan="4" class="text-end">Grand Total</td>
        <td id="grandTotal">{{ number_format($sum, 2) }}</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

// Add new product dynamically
$('#form').on('submit', function(e){
  e.preventDefault();

  let name = $(this).find('input[name="name"]').val();
  let qty = parseFloat($(this).find('input[name="qty"]').val());
  let price = parseFloat($(this).find('input[name="price"]').val());

  $.post('/add', { name: name, qty: qty, price: price }, function(response){
    let product = response.products[0]; // latest product added
    let formattedPrice = parseFloat(product.price).toFixed(2);
    let formattedTotal = (parseFloat(product.qty) * parseFloat(product.price)).toFixed(2);

    // Prepend new row
    let newRow = `<tr data-index="0">
      <td class="name">${product.name}</td>
      <td class="qty">${product.qty}</td>
      <td class="price">${formattedPrice}</td>
      <td>${product.datetime}</td>
      <td class="total">${formattedTotal}</td>
      <td><button class="btn btn-sm btn-primary editBtn">Edit</button></td>
    </tr>`;

    $('#tableBody tr:first').before(newRow);

    // Recalculate Grand Total
    let sum = 0;
    $('#tableBody tr').each(function(){
      let t = parseFloat($(this).find('.total').text());
      if(!isNaN(t)) sum += t;
    });
    $('#grandTotal').text(sum.toFixed(2));

    // Clear form
    $('#form')[0].reset();

    // Update data-index for all rows
    $('#tableBody tr[data-index]').each(function(i){
      $(this).attr('data-index', i);
    });
  });
});

// Edit / Save functionality
$('#tableBody').on('click', '.editBtn', function(){
  let row = $(this).closest('tr');

  row.find('.name').html(`<input type="text" class="form-control editName" value="${row.find('.name').text()}">`);
  row.find('.qty').html(`<input type="number" class="form-control editQty" value="${row.find('.qty').text()}">`);
  row.find('.price').html(`<input type="number" step="0.01" class="form-control editPrice" value="${row.find('.price').text()}">`);

  $(this).removeClass('btn-primary editBtn').addClass('btn-success saveBtn').text('Save');
});

$('#tableBody').on('click', '.saveBtn', function(){
  let row = $(this).closest('tr');
  let index = row.data('index');
  let updatedName = row.find('.editName').val();
  let updatedQty = parseFloat(row.find('.editQty').val());
  let updatedPrice = parseFloat(row.find('.editPrice').val());

  $.post('/update', {
    index: index,
    name: updatedName,
    qty: updatedQty,
    price: updatedPrice
  }, function(response){
    let formattedPrice = updatedPrice.toFixed(2);
    let formattedTotal = (updatedQty * updatedPrice).toFixed(2);

    row.find('.name').text(updatedName);
    row.find('.qty').text(updatedQty);
    row.find('.price').text(formattedPrice);
    row.find('.total').text(formattedTotal);

    row.find('.saveBtn').removeClass('btn-success saveBtn').addClass('btn-primary editBtn').text('Edit');

    // Update Grand Total
    let sum = 0;
    $('#tableBody tr').each(function(){
      let t = parseFloat($(this).find('.total').text());
      if(!isNaN(t)) sum += t;
    });
    $('#grandTotal').text(sum.toFixed(2));
  });
});
</script>
</body>
</html>
