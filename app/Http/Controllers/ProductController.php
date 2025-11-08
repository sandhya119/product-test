<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    private $file = 'products.json';

    private function readData() {
        $path = storage_path($this->file);
        if (!file_exists($path)) file_put_contents($path, json_encode([]));
        return json_decode(file_get_contents($path), true);
    }

    private function writeData($data) {
        file_put_contents(storage_path($this->file), json_encode($data, JSON_PRETTY_PRINT));
    }

    public function index() {
        $products = $this->readData();
        return view('products', compact('products'));
    }

    public function store(Request $r) {
        $data = $this->readData();
        $new = [
            'name' => $r->name,
            'qty' => (int)$r->qty,
            'price' => (float)$r->price,
            'datetime' => Carbon::now()->format('Y-m-d H:i:s'),
            'total' => (int)$r->qty * (float)$r->price
        ];
        array_unshift($data, $new);
        $this->writeData($data);
        return response()->json($data);
    }
}
