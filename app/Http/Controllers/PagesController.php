<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    public function about()
    {
        //$name = 'TagPanel';
        return view('pages/about');
        //return view('pages/about')->with('name',$name);
    }
    public function contact()
    {
        //$people = ['Christopher Dufort', 'Théobald Ndikurayayo'];
        //unset($people);
        //return view('pages/contact', compact('people'));
        return view('pages/contact');
    }

    public function services()
    {
        return view('pages/services');
    }
    
    public function faq()
    {
        return view('pages/faq');
    }
    
    public function pricing()
    {
        return view('pages/pricing');
    }
    public function privacy()
    {
        return view('pages/privacy');
    }
    public function terms()
    {
        return view('pages/terms');
    }
}
