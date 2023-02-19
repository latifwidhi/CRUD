<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response(view('categories.categories', [
            'categories' => Category::all()
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response(view('categories.form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:categories|min:3',
            'slug' => 'required'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect(route('category.index'))->with(['message' => "{$category->name} succesly created"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): Response
    {
        return response(view('categories.show', [
            'categories' => Category::find($category)
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): Response
    {
        $categories = Category::find($category);
        return response(view('categories.edit', compact('category')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:categories|min:3',
            'slug' => 'required'
        ]);

        Category::find($category->id)->update($request->except(
            '__token', '__method'
        ));

        return redirect(route('category.index'))->with(['message' => "{$category->name} succesly updated"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect(route('category.index'))->with(['message' => "{$category->name} succesly delete"]);
    }
}
