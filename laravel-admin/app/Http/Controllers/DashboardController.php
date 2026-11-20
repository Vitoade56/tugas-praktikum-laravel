<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function home()    { return view('pages.home'); }
    public function product() { return view('pages.product'); }
    public function service() { return view('pages.service'); }
    public function contact() { return view('pages.contact'); }
    public function about()   { return view('pages.about'); }
}