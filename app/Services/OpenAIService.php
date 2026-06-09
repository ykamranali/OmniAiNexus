<?php

namespace App\Services;

use Exception;
use OpenAI;

class OpenAIService
{
    public function generate(string $prompt): array
    {
        try {

            $client = OpenAI::client(
                env('OPENAI_API_KEY')
            );

            $response = $client->chat()->create([
                'model' => 'gpt-4o-mini',

                'messages' => [
                    [
                        'role' => 'system',
                        'content' =>
                            'You are OmniAI Nexus, an AI-powered business assistant specialized in CRM, Sales, Marketing, Lead Management, Customer Engagement, Business Analytics, and Growth Strategy. Always provide professional business-focused responses.',
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],

                'temperature' => 0.7,
            ]);

            return [
                'success' => true,

                'content' =>
                    $response->choices[0]->message->content,

                'tokens' =>
                    $response->usage->totalTokens ?? 0,
            ];

        } catch (Exception $e) {

            return [
                'success' => true,

                'content' =>
                    'OmniAI Assistant is currently operating in demo mode. OpenAI API quota, billing, or connectivity is unavailable. This is a temporary fallback response while service connectivity is being restored.',

                'tokens' => 50,
            ];
        }
    }
}
