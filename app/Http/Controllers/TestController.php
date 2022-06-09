<?php

namespace App\Http\Controllers;

use App\MyFunction\TestFunction;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        $data = new TestFunction;
        $data->getip();
    }
}
