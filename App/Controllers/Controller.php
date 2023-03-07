<?php

namespace App\Controllers;

use App\Request;

class Controller
{
    public function __construct(protected array $config, protected Request $request)
    {
        //
    }
}