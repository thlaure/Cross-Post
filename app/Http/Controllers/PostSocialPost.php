<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSocialPostRequest;
use App\Models\SocialPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class PostSocialPost extends Controller
{
    public function __invoke(StoreSocialPostRequest $request): RedirectResponse
    {
        $locale = App::currentLocale();

        try {
            $request->validated();
            /** @var string $postContent */
            $postContent = $request->safe()->input('content');

            SocialPost::create([
                'content' => strip_tags($postContent),
            ]);

            return redirect()
                ->route('page.social-posts.create', ['locale' => $locale])
                ->with('success', __('messages.success.generic'));
        } catch (\Exception $exception) {
            Log::error('Failed to create social post', ['exception' => $exception]);

            return redirect()
                ->route('page.social-posts.create', ['locale' => $locale])
                ->with('error', __('messages.error.generic'));
        }
    }
}
