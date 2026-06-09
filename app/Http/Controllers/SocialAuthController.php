<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use Illuminate\Support\Facades\Http;

class SocialAuthController extends Controller
{
    public function linkedinRedirect()
    {
        $query = http_build_query([
            'response_type' => 'code',
            'client_id' => env('LINKEDIN_CLIENT_ID'),
            'redirect_uri' => env('LINKEDIN_REDIRECT_URI'),
            'scope' => 'openid profile email',
        ]);

        return redirect(
            'https://www.linkedin.com/oauth/v2/authorization?' . $query
        );
    }

    public function linkedinCallback()
    {
        if (request()->has('error')) {
            dd(request()->all());
        }

        $tokenResponse = Http::asForm()->post(
            'https://www.linkedin.com/oauth/v2/accessToken',
            [
                'grant_type' => 'authorization_code',
                'code' => request('code'),
                'client_id' => env('LINKEDIN_CLIENT_ID'),
                'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
                'redirect_uri' => env('LINKEDIN_REDIRECT_URI'),
            ]
        );

        $tokenData = $tokenResponse->json();

        if (! isset($tokenData['access_token'])) {
            dd($tokenData);
        }

        $userResponse = Http::withToken(
            $tokenData['access_token']
        )->get(
            'https://api.linkedin.com/v2/userinfo'
        );

        $user = $userResponse->json();

        SocialAccount::updateOrCreate(
            [
                'organization_id' => auth()->user()->organization_id,
                'platform' => 'LinkedIn',
                'account_id' => $user['sub'] ?? null,
            ],
            [
                'account_name' => $user['name'] ?? 'LinkedIn User',
                'access_token' => $tokenData['access_token'],
                'status' => 'Connected',
                'metadata' => json_encode($user),
            ]
        );

        return redirect('/admin/social-accounts');
    }
}
