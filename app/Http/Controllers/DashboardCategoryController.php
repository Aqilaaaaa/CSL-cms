<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;


class DashboardCategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.category.index', [
            'title' => 'Semua Kategori',
            'data_categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.category.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|min:4|max:255',
            'slug' => 'required|max:255|unique:categories',
        ]);



       // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Post Kategori baru berhasil ditambahkan!');
    }

    public function edit(Category $category)
    {
        return view('dashboard.category.edit', [
            'post' => $category,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:255',
            'slug' => 'required|max:255|unique:categories',
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Kategori berhasil di update!');
    }



        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('/dashboard/categories')->with('success', 'Category telah dihapus');
    }

}

    


