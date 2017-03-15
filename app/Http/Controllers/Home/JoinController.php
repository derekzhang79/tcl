<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use DB;
use Debugbar;
use Session;
use View;

class JoinController extends CommonController
{   
    protected $request;

    public function __construct(
        Request $request
    ) {
        
        $this->request = $request;
        // $this->middleware('brand.create', ['only' => ['create']]);
        parent::__construct($request);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('join us');
        $current_page    = 'join';
        return view('home.join.index', compact('current_page'));
    }
}