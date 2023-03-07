<?php

namespace App;

use App\Views\View;

class Response
{
    public function __construct(private readonly View $view, private int $code = 200)
    {
        //
    }

    public function setCode(int $code): Response
    {
        $this->code = $code;

        return $this;
    }

    public function push(): void
    {
        http_response_code($this->code);

        $this->view->render();
    }
}