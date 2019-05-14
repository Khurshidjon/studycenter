<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $blog = new Blog();
        $blog->title_uz = $request->title_uz;
        $blog->title_ru = $request->title_ru;
        $blog->title_en = $request->title_en;
        $blog->image = $request->file('image')->store('blogs'.'/'.date('FY'), 'public');
        $blog->description_uz = $request->description_uz;
        $blog->description_ru = $request->description_ru;
        $blog->description_en = $request->description_en;
        $blog->body_uz = $request->body_uz;
        $blog->body_ru = $request->body_ru;
        $blog->body_en = $request->body_en;
        $blog->status = $request->get('status');
        $blog->category_id = $request->get('category_id');
        $blog->user_id = Auth::id();
        $blog->save();

        $notification = array([
            'message' => 'Post has been created successfully',
            'alert-type' => 'success'
        ]);
        return redirect()->route('voyager.blogs.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->title_uz = $request->title_uz;
        $blog->title_ru = $request->title_ru;
        $blog->title_en = $request->title_en;
        $blog->image = $request->file('image')->store('blogs'.'/'.date('FY'), 'public');
        $blog->description_uz = $request->description_uz;
        $blog->description_ru = $request->description_ru;
        $blog->description_en = $request->description_en;
        $blog->body_uz = $request->body_uz;
        $blog->body_ru = $request->body_ru;
        $blog->body_en = $request->body_en;
        $blog->status = $request->get('status');
        $blog->category_id = $request->get('category_id');
        $blog->user_id = Auth::id();
        $blog->save();
        return redirect()->route('voyager.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
