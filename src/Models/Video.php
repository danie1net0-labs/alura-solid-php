<?php

namespace App\Models;

use App\Models\Interfaces\Watchable;
use DateInterval;

class Video implements Watchable
{
    protected bool $isWatched = false;
    protected DateInterval $duration;

    public function __construct(private readonly string $name)
    {
        $this->duration = DateInterval::createFromDateString('0');
    }

    public function watch(): void
    {
        $this->isWatched = true;
    }

    public function durationInMinutes(): int
    {
        return $this->duration->i;
    }

    public function getUrl(): string
    {
        return 'https://videos.alura.com.br/' . http_build_query(['nome' => $this->name]);
    }
}
