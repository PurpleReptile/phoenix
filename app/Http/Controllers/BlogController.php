<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

class BlogController extends Controller {

	public function getIndex() {
		$posts = Post::orderBy('id', 'desc')->paginate(10);
		$categories = Category::orderBy('name')->get();

		return view('blog.index')->withPosts($posts)->withCategories($categories);
	}

	public function getSingle($slug) {
		// fetch from the DB based on slug
		$post = Post::where('slug', '=', $slug)->first();

		// return the view and pass in the post object
		return view('blog.single')->withPost($post);
	}

}
