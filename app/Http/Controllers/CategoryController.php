<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashbourd.category.index', ['categories' => $categories]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbourd.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validatedData = $request->validate([
    'name' => 'required|string|max:255',
    'description' => 'required|string',
    ]);
    
    $category = new Category();
    $category->name = $validatedData['name'];
    $category->description = $validatedData['description'];
    
   
    
    $category->save();
    
    return redirect()->route('dash.index');
    }
    
    /**
    * Display the specified resource.
    */
    public function show(Category $category)
    {

    }
    
    
    /**
    * Show the form for editing the specified resource.
    */
    public function edit($id)
    {
    $category = Category::findOrFail($id);
    return view('dashbourd.category.edit', ['category' => $category]);
    }
    
    /**
    * Update the specified resource in storage.
    */
    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
    'name' => 'required|string|max:255',
    'description' => 'nullable|string',
    ]);
    
    $category = Category::findOrFail($id);
    $category->name = $validatedData['name'];
    $category->description = $validatedData['description'];
    

    $category->save();
    
    return redirect()->route('dash.index');
    }
    
   
    public function destroy(Category $category)
    {
   
    $category->delete();
    
    return redirect()->route('dash.index');
    }
}
    

        
    

    