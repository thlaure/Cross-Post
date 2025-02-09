<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialPostRequest;
use App\Models\SocialPost;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PostSocialPost extends Controller
{
    public function __invoke(StoreSocialPostRequest $request): JsonResponse
    {
        try {
            $request->validated();

            /** @var string $postContent */
            $postContent = $request->safe()->input('content');

            SocialPost::create([
                'content' => strip_tags($postContent),
            ]);

            return response()->json([
                'message' => __('messages.success.generic'),
                'status' => Response::HTTP_CREATED,
            ]);
        } catch (\Exception $exception) {
            Log::error('Failed to create social post', ['exception' => $exception]);

            return response()->json([
                'message' => __('messages.error.generic'),
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
            ]);
        }
    }
}
