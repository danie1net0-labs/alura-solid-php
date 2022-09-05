<?php

namespace App\Models;

use App\Models\Interfaces\Scoring;

class AluraPlus extends Video implements Scoring
{
    public function __construct(protected $name, private readonly string $category)
    {
        parent::__construct($name);
    }

    public function getUrl(): string
    {
        return 'https://videos.alura.com.br/' . str_replace(' ', '-', strtolower($this->category));
    }

    public function getScore(): int
    {
        return $this->durationInMinutes() * 2;
    }
}
