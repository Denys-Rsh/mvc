<?php

namespace App\Exceptions;

use App\Views\View;

interface Viewable
{
    public function getView(): View;
}