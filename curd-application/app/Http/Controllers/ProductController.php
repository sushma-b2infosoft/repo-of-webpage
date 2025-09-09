<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
public function index() {
    $products = Product::with('category')->get();
    return view('products.index', compact('products'));
}

public function create() {
    $categories = Category::all();
    return view('products.create', compact('categories'));
}

public function store(Request $request) {
    $request->validate([
        'name'=>'required|string|max:255',
        'category_id'=>'required|exists:categories,id',
        'price'=>'required|numeric',
    ]);
    Product::create($request->all());
    return redirect()->route('products.index')->with('success','Product created');
}

public function show(Product $product) {
    return view('products.show', compact('product'));
}

public function edit(Product $product) {
    $categories = Category::all();
    return view('products.edit', compact('product','categories'));
}

public function update(Request $request, Product $product) {
    $request->validate([
        'name'=>'required|string|max:255',
        'category_id'=>'required|exists:categories,id',
        'price'=>'required|numeric',
    ]);
    $product->update($request->all());
    return redirect()->route('products.index')->with('success','Product updated');
}

public function destroy(Product $product) {
    $product->delete();
    return redirect()->route('products.index')->with('success','Product deleted');
}
}