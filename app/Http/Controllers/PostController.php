<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;
use Validator;
use File;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = array();
        foreach (Category::all() as $category){
            $categories[$category->id] = $category->name;
        }
        return view('post.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer',
            'title' => 'required|max:20|min:3',
            'author' => 'required|max:20|min:3',
            // 'image' => 'required|mimes:jpg,jpeg,png,gif',
            'short_desc' => 'required|max:50|min:10',
            'description' => 'required|max:1000|min:50',
        ]);

        if($validator->fails()){
            return redirect('post/create')->withInput()->withErrors($validator);
        }
        $image = $request->file('image');
        // dd($image);
        $upload = 'img/posts/';
        $filename = $image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathName(), $upload. $filename);

        $post = new Post;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->image = $filename;
        $post->short_desc = $request->short_desc;
        $post->description = $request->description;
        $post->save();

        Session::flash('post_create','New Post is Created');
        return redirect('post/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = array();

        foreach (Category::all() as $category){
            $categories[$category->id] = $category->name;
        }
        $posts = Post::findOrFail($id);

        return view('post.edit')->with('posts', $posts)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer',
            'title' => 'required|max:20|min:3',
            'author'=>'required|max:20|min:3',
            'image'=>'required|mimes:jpg,jpeg,png,gif',
            'short_desc'=>'required|max:50|min:10',
            'description'=>'required|max:1000|min:50',
        ]);

        $post = Post::find($id);

        if($validator->fails()){
            return redirect('post/'.$post->id. '/edit')->withInput()->withErrors($validator);
        }

        if($request->file('image') != ""){
            $image = $request->file('image');
            // dd($image);
            $upload = 'img/posts/';
            $filename = time().$image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathName(), $upload. $filename);

        }

        $post->category_id = $request->category_id;
        $post->title = $request->Input('title');
        $post->author = $request->Input('author');
        if(isset($filename)){
            $post->image = $filename;
        }
        $post->short_desc = $request->Input('short_desc');
        $post->description = $request->Input('description');
        $post->save();

        Session::flash('post_update','Post is Updated');
        return redirect('post');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $image_path = '/img/posts/'.$post->image;
        File::delete($image_path);
        $post->delete();
        Session::flash('post_delete','Post is Delete');
        return redirect('post');
    }
}
