<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

    public function getHome() {
        return view('pages.welcome');
    }
    
    public function getBlog() {
        return view('pages.blog');
    }

    public function getAbout() {
        return view('pages.about');
    }

}
