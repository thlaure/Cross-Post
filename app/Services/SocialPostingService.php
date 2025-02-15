<?php

namespace App\Services;

use App\DTO\SocialPostDTO;
use Illuminate\Support\Facades\Log;
use Revolution\Bluesky\Facades\Bluesky;
use Revolution\Bluesky\Record\Post;
use Revolution\Bluesky\RichText\TextBuilder;

class SocialPostingService
{
    public function post(SocialPostDTO $socialPost): void
    {
        $post = Post::build(function (TextBuilder $textBuilder) use ($socialPost) {
            $textBuilder->text($socialPost->content);
        });

        try {
            Bluesky::login(
                identifier: config('app.bluesky.username'),
                password: config('app.bluesky.app_password')
            )->post($post);
        } catch (\Exception $exception) {
            Log::error('Failed to post Bluesky post', ['exception' => $exception]);
            throw $exception;
        }
    }
}
