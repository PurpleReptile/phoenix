<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

    public function getHome() {
        return view('welcome');
    }

    public function getAbout() {
        $first = 'Igor';
        $last = 'Poyarkov';

        $fullname = $first . " " . $last;
        $email = "ig.poyarkoff@yandex.ru";

        $arr = [];
        $arr['fullname'] = $fullname;
        $arr['email'] = $email;

        return view('about')->withData($arr);
    }

}