<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product; // تأكد من تضمين نموذج Product
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // جلب جميع المنتجات وعرضها
        $products = Product::all();
        return view('dashbourd.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // جلب جميع الفئات لتحديد الفئة عند إنشاء منتج جديد
        $categories = Category::all();
        return view('dashbourd.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id', // تحقق من وجود الفئة
            'price' => 'required|numeric|min:0', // تحقق من السعر
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->category_id = $validatedData['category_id']; // تحديد الفئة
        $product->price = $validatedData['price']; // تحديد السعر

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // جلب المنتج مع الفئة المرتبطة به
        $product->load('category');

        return view('dashbourd.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // جلب الفئات لتحديد الفئة عند تعديل المنتج
        return view('dashbourd.product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id', // تحقق من وجود الفئة
            'price' => 'required|numeric|min:0', // تحقق من السعر
        ]);

        $product = Product::findOrFail($id);
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->category_id = $validatedData['category_id']; // تحديد الفئة
        $product->price = $validatedData['price']; // تحديد السعر

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // حذف المنتج
        $product->delete();

        return redirect()->route('product.index');
    }
}
