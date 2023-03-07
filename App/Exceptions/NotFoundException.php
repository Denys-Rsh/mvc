<?php

namespace App\Exceptions;

use App\Views\View;

class NotFoundException extends \Exception implements Viewable
{
    private View $view;

    public function __construct()
    {
        parent::__construct("Not found", 404);

        $this->view = new View(realpath(PROJECT_DIR . '/App/Views/Errors/404.php'));
    }

    public function getView(): View
    {
        return $this->view;
    }
}