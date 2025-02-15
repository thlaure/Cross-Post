<?php

declare(strict_types=1);

namespace App\DTO;

readonly class SocialPostDTO
{
    public function __construct(
        public string $content,
    ) {}
}
