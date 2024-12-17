<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Categories;
use Carbon\Carbon;

class MediaController extends Controller
{
    const PATH_VIEW = 'admins.medias.';
    const PATH_VIEWD = 'admins.';
    public function dashboard()
    {
        return view(self::PATH_VIEWD . 'dashboard');
    
    }
    public function mediaList()
    {   
        $medias = Media::all();
        return view(self::PATH_VIEW . 'media', compact('medias'));
    
    }
    public function create()
    { 
        $categories = Categories::all();
        return view(self::PATH_VIEW . 'create', compact('categories'));
    }
    public function store(Request $request)
    {
    
        $status = $request->amount > 0 ? 1 : 0;

        
        Media::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'amount' => $request->amount,
            'status' => $status,
        ]);
        return redirect()->back()->with('success', 'Story has been added');
    
    }
    public function edit($id)
    {
        $media = Media::findOrFail($id); 
        $categories = Categories::all(); 
     
        return view(self::PATH_VIEW . 'edit' ,compact('media','categories'));
      
    }
    public function update(Request $request, $id)
    {
        
   

    $media = Media::findOrFail($id);
    $media->update([
        'title' => $request->title,
        'category_id' => $request->category_id,
        'author' => $request->author,
        'amount' => $request->amount,
        'status' => $request->status,
    ]);

        return redirect()->back()->with('success', 'The story has been updated');
    }
    public function destroy($id)
    {

        $media = Media::findOrFail($id);

        $media->delete();
        
        return redirect()->back()->with('success', 'The story has been updated and deleted');
    }
}
