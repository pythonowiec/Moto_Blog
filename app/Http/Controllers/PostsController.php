<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::select('*')->orderBy('created_at', 'desc')->paginate(6);
        return view('index', [
            'posts' => $posts
        ]);
    }
    public function search(Request $request){
        if($request->search){
            $posts = Posts::where('title', 'like','%'. $request->search. '%')->get();
            // Storage::disk('google')->url(${element['path_img']}
            return response()->json([
                "status" => $posts
            ]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts,title|max:255',
            'content' => 'required|max:255',
            'image' => 'mimes:jpg,bmp,png,jpeg'
        ]);

        $post = new Posts($request->all());
        $post->path_img = ".";
        $post->user = Auth::user()->name;
        $post->save();

        return redirect('/')->with('status', 'create');
    }

    public function add(Request $request){
        $validated = $request->validate([
            'content' => 'required|max:255',
        ]);
        $comment = new Comment();
        $comment->user = Auth::user()->name;
        $comment->post_id = $request->id;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->back()->with('status', 'create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::find($id);
        $comments = Comment::select('*')->where('post_id', $id)->get();
        return view('post', [
            'post' => $post,
            'comments' => $comments

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
