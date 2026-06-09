<?php

namespace App\Services;

use App\Models\SocialPost;
use Illuminate\Support\Facades\Http;

class LinkedInPublisherService
{
    public function publish(SocialPost $post): array
    {
        $account = $post->socialAccount;

        $response = Http::withToken(
            $account->access_token
        )
        ->withHeaders([
            'LinkedIn-Version' => '202506',
            'X-Restli-Protocol-Version' => '2.0.0',
        ])
        ->post(
            'https://api.linkedin.com/rest/posts',
            [
                'author' => 'urn:li:person:' . $account->account_id,
                'commentary' => $post->content,
                'visibility' => 'PUBLIC',
                'distribution' => [
                    'feedDistribution' => 'MAIN_FEED',
                ],
                'lifecycleState' => 'PUBLISHED',
            ]
        );

       return [
    'status' => $response->status(),
    'body' => $response->body(),
    'json' => $response->json(),
];
    }
}
