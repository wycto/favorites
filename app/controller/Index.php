<?php

namespace app\controller;

use app\model\Navigation;
use support\Request;

class Index
{
    public function index(Request $request)
    {
        $rows = Navigation::all();
        return view('index/index', ['rows'=>$rows]);
    }

}
