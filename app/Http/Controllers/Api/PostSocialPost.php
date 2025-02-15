<?php

namespace App\Http\Controllers\Api;

use App\DTO\SocialPostDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialPostRequest;
use App\Models\SocialPost;
use App\Services\SocialPostingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PostSocialPost extends Controller
{
    public function __invoke(
        StoreSocialPostRequest $request,
        SocialPostingService $service,
    ): JsonResponse {
        $request->validated();

        /** @var string $postContent */
        $postContent = $request->safe()->input('content');
        $socialPost = new SocialPostDTO(strip_tags($postContent));

        try {
            // TODO: awaiting the async service, no need to store in db if the post is not delayed
            // SocialPost::create([
            //     'content' => $socialPost->content,
            // ]);

            $service->post($socialPost);

            return response()->json(status: Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            Log::error('Failed to create social post', ['exception' => $exception]);

            return response()->json(status: Response::HTTP_INTERNAL_SERVER_ERROR, data: [
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
