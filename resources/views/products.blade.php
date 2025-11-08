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
        <th>Name</th><th>Qty</th><th>Price</th><th>Date</th><th>Total</th>
      </tr>
    </thead>
    <tbody id="tableBody">
      @php $sum = 0; @endphp
      @foreach($products as $p)
        @php $sum += $p['total']; @endphp
        <tr>
          <td>{{ $p['name'] }}</td>
          <td>{{ $p['qty'] }}</td>
          <td>{{ $p['price'] }}</td>
          <td>{{ $p['datetime'] }}</td>
          <td>{{ $p['total'] }}</td>
        </tr>
      @endforeach
      <tr class="fw-bold table-info">
        <td colspan="4" class="text-end">Grand Total</td>
        <td>{{ $sum }}</td>
      </tr>
    </tbody>
  </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

$('#form').on('submit', function(e){
  e.preventDefault();
  $.post('/add', $(this).serialize(), function(){
    location.reload();
  });
});
</script>
</body>
</html>
