<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return'Selamat Datang';
    }
    public function about() {
        return 'Nama : Andika Jaya nanda <br /> NIM : 2341728017';
    }
    public function articles($id) {
        return 'Halaman Artike dengan Id-'.$id;
    }
}
