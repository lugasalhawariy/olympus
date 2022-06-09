<?php

namespace App\MyFunction;

class TestFunction
{
    public function getip()
    {
        $clientIP = request()->ip();   
        dd($clientIP);
    }
}