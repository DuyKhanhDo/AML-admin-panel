<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    const PATH_VIEW = 'admins.categories.';
    public function categoryList()
    {
        $categories = Categories::all();
        return view(self::PATH_VIEW . 'category', compact('categories'));
      
   
    }
   


    public function create()
    {
      
          return view(self::PATH_VIEW . 'create');
    }

    // Xử lý thêm căn hộ
    public function store(Request $request)
    {
      
        Categories::create($request->all());
        return redirect()->back()->with('success', 'Category has been added');
    }

    // Hiển thị form sửa căn hộ
    public function edit($id)
    {
        $categories = Categories::findOrFail($id);
             
        return view(self::PATH_VIEW . 'edit' ,compact('categories'));
    }

    // Xử lý sửa căn hộ
  public function update(Request $request, $id)
    {
        
        $apartment = Categories::findOrFail($id);
        $apartment->update([
            'name' => $request->name,
             
        ]);

        return redirect()->back()->with('success', 'Category has been updated');
    }
    public function destroy($id)
    {

        $category = Categories::findOrFail($id);


         Media::where('category_id', $category->id)->delete();

 
    $category->delete();

        return redirect()->back()->with('success', 'Category has been deleted');
    }
}

