<?php

namespace app\controller;

use app\model\Navigation;
use app\model\User;
use support\Request;

class IndexController
{
    public function index(Request $request)
    {
        return view('index/index');
    }

    function test(){
        return view('index/test');
    }

}
