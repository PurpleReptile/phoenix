<?php

namespace App\Http\Controllers;
use App\Post;

class PagesController extends Controller 
{

	public function getIndex() {

		// $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();

		// return view('pages.welcome')->withPosts($posts);
		return view('pages.welcome');
	}

	public function getAbout() {
		return view('pages.about');
	}

}
