<?php

namespace App\Models;

use DomainException;

class Feedback
{
    public function __construct(private readonly int $rating, private readonly string $testimonial)
    {
        if ($this->rating < 9 && !$this->testimonial) {
            throw new DomainException('Testimonial is required.');
        }
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function getTestimonial(): string
    {
        return $this->testimonial;
    }
}