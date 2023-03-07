<?php

namespace App\Models;

class Page
{
    private int $id;
    private string $friendly;
    private string $title;
    private string $description;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Page
     */
    public function setId(int $id): Page
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFriendly(): string
    {
        return $this->friendly;
    }

    /**
     * @param string $friendly
     * @return Page
     */
    public function setFriendly(string $friendly): Page
    {
        $this->friendly = $friendly;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Page
     */
    public function setTitle(string $title): Page
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Page
     */
    public function setDescription(string $description): Page
    {
        $this->description = $description;
        return $this;
    }
}