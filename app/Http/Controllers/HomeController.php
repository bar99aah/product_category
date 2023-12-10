<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $name = 'saleh';
        $age = 28;
        $tag = '<h1>hello</h1>';
        $bool = 123;

        $data = [
            'name' => $name,
            'age' => $age,
            'tag' => $tag,
            'bool' => $bool,
        ];

        return view('home2', $data);


        // return view('home')->with('name', $name)->with('age', $age);

        // return view('home', compact('name', 'age'));

        
    }


}
