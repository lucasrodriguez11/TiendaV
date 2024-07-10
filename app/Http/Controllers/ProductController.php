<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('index',['products'=>$products]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createProducts');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product -> name = $request -> name;
        $product -> price = $request -> price;
        $product -> description = $request -> description;

        $product->save();

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('editProducts', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       // Validar los datos de la solicitud
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
    ]);

    // Recuperar el producto por id y actualizarlo
    $product = Product::findOrFail($id);
    $product->update($validated);

    // Redirigir a una página de éxito, por ejemplo, el listado de productos
    return redirect()->route('products.index')->with('success', 'Producto actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $product = Product::find($id);
    if ($product) {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado con éxito');
    }
    return redirect()->route('products.index')->with('error', 'Producto no encontrado');
}
}
