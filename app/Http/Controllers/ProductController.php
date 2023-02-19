<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response(view('products.index', [
            'products' => Product::latest()->get()
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response(view('products.form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        $request->validate([
            'title' => 'required|unique:products|min:4',
            'qty' => 'required',
            'price' => 'required',
            'img' => 'required|mimes:jpg,png,svg,jpeg'
        ]);

        $imgName = Str::random(20) . '.' . $request->file('img')->getClientOriginalExtension();
        $request->file('img')->storeAs('public/uploads/solution', $imgName);

        $product = Product::create([
            'title' => $request->title,
            'qty' => $request->qty,
            'price' => $request->price,
            'img' => $imgName
        ]);

        return redirect(route('product.index'))->with(['message' => "{$product->title} success create"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): Response
    {
        return response(view('products.show', [
            'products' => Product::find($product)
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): Response
    {
        $products = Product::find($product);
        return response(view('products.edit', compact('product')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:4',
            'qty' => 'required',
            'price' => 'required',
            'img' => 'file|image|max:5000'
        ]);

        Product::find($product->id)->update($request->except(
            '__token', '__method'
        ));

        return redirect(route('product.index'))->with(['message' => "{$product->title} success updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect(route('product.index'))->with(['message' => "{$product->title} success delete"]);
    }
}
