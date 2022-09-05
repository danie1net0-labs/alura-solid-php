<?php

namespace App\Models;

use App\Models\Interfaces\Scoring;
use App\Models\Interfaces\Watchable;
use DomainException;

class Course implements Scoring, Watchable
{
    private array $videos = [];
    private array $feedbacks = [];

    public function __construct(private string $name)
    {
    }

    public function getScore(): int
    {
        return 100;
    }

    public function watch(): void
    {
        foreach ($this->videos as $video) {
            $video->watch();
        }
    }

    public function receiveFeedback(Feedback $feedback): void
    {
        $this->feedbacks[] = $feedback;
    }

    public function addVideo(Video $video): void
    {
        if ($video->durationInMinutes() < 3) {
            throw new DomainException('Very short video.');
        }

        $this->videos[] = $video;
    }

    /** @return Video[] */
    public function getVideos(): array
    {
        return $this->videos;
    }
}
