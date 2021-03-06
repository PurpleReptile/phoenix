<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;
use Session;
use Image;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() 
	{
		$posts = Post::orderBy('id', 'desc')->paginate(10);
		return view('posts.index')->withPosts($posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() 
	{
		$categories = Category::all();
		$tags = Tag::all();

		return view('posts.create')->withCategories($categories)->withTags($tags);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) 
	{
		// validate the data
		$this->validate($request, array(
			'title' => 'required|max:160',
			'slug' => 'required|alpha_dash|min:5|max:255',
			'category_id' => 'required|integer',
			'body' => 'required|'
		));

		// store in the database
		$post = new Post;

		$post->title = $request->title;
		$post->slug = $request->slug;
		$post->category_id = $request->category_id;
		$post->body = $request->body;


		// save image 
		if	($request->hasFile('featured_image')) 
		{
			$image = $request->file('featured_image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = public_path('images/' . $filename);
			Image::make($image)->resize(800, 400)->save($location);

			$post->image = $filename;
		}

		$post->save();

		$post->tags()->sync($request->tags, false);

		Session::flash('success', 'Новый пост был успешно сохранён!');

		return redirect()->route('posts.show', $post->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) 
	{
		$post = Post::find($id);
		return view('posts.show')->withPost($post);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) 
	{
		// find the post in the database and save as a var
		$post = Post::find($id);
		$categories = Category::all();
		$cats = array();

		foreach ($categories as $category) {
			$cats[$category->id] = $category->name;
		}

		$tags = Tag::all();
		$tags2 = array();
		foreach($tags as $tag) 
		{
			$tags2[$tag->id] = $tag->name;
		}

		// return the view and pass in the var we previously created
		return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
		$post = Post::find($id);
		
		// Validate the data
		$this->validate($request, array(
			'title' => 'required|max:160',
			'slug' => ($request->slug != $post->slug) ? 'required|alpha_dash|min:5|max:255|unique:posts,slug' : '',
			'body' => 'required',
		));

		// Save the data to the database
		$post->title = $request->input('title');
		$post->slug = $request->input('slug');
		$post->category_id = $request->input('category_id');
		$post->body = $request->input('body');
		$post->save();

		if (isset($request->tags))
		{
			$post->tags()->sync($request->tags);
		} else {
			$post->tags()->sync(array());
		}

		// set flash data with success message
		Session::flash('success', 'Этот пост был успешно сохранён.');

		// redirect with flash data to posts.show
		return redirect()->route('posts.show', $post->id);
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
		$post->tags()->detach();

		$post->delete();

		Session::flash('success', 'Публикация №' . $post->id . ' была успешно удалена.');
		return redirect()->route('posts.index');
	}

}
