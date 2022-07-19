<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all posts then send to homepage of posts
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->image);

        // Validate on all data coming from request
        $this->validate($request, [
            'name' => ['required'],
            'content' => ['required'],
            'image' => ['image'],
        ]);

        $request_date = $request->all();

        if($request->image && $request->image != null){
            Image::make($request->image)->resize(280, 280, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/posts/' . $request->image->hashName()));

            $request_date["image"] = $request->image->hashName();

            // Save data to database
            Post::create([
                'name' => $request->name,
                'content' => $request->content,
                'slug' => Str::slug($request->name),
                'user_id' => Auth::user()->id,
                "image"         => $request->image->hashName(),
            ]);

            // Redirect to homepage of posts
            return redirect()->route('posts.index');

        }else{
            // Save data to database
            Post::create([
                'name' => $request->name,
                'content' => $request->content,
                'slug' => Str::slug($request->name),
                'user_id' => Auth::user()->id,
            ]);

            // Redirect to homepage of posts
            return redirect()->route('posts.index');

        }

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
        // Get data of post by id
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post'));
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
        // Get data of post by id
        $post = Post::find($id);

        // Save data to database
        $post->update([
            'name' => $request->name,
            'content' => $request->content,
            'slug' => Str::slug($request->name),
            'user_id' => Auth::user()->id,
        ]);

        // Redirect to homepage of posts
        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get post by id
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
}
