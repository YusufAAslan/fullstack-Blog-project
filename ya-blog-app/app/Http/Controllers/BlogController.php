<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    // This function will return all blogs 
    public function index(){
        $blog = Blog::orderBy('created_at','DESC')->get();

        return response()->json([
            'sattus' =>true,
            'data' =>$blog
        ]);
        
    }

    // This function will return single blog
    public function show(){

    }

    // This function will store the blog 
    public function store(Request $request)
    {
        $validator=validator::make($request->all(),[
            'title' => 'required|min:10',
            'author' => 'required|min:3',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' =>'Please fix the errors',
                'errors' => $validator->errors()
            ]);
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->shortDesc = $request->shortDesc;
        $blog->save();

        return response()->json([
            'status' => true,
            'message' =>'Blog added successfully.',
            'data' => $blog
        ]);

    }


    // This function will update the blog
    public function update(){

    }


    // This function will delete the blog
    public function destroy(){

    }


}
