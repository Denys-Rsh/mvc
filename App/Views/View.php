<?php

namespace App\Views;

class View
{
    public function __construct(private string $templateFile, private array $arguments = [])
    {
        //
    }

    public function render(): void
    {
        $args = $this->arguments;

        include($this->templateFile);
    }
}