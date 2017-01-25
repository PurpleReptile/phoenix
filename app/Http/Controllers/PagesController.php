<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

    public function getHome() {
        return view('pages.welcome');
    }

    public function getAbout() {
        return view('pages.about');
    }

}
