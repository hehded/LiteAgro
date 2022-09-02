<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScraperController extends Controller
{
    public function scraper()
    {
        return view('scraper');
    }
}
