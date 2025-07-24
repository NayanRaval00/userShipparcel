<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EkartApiService
{
    protected $tokenCacheKey = 'Basic aGFyYmFsaHJkOmpNMGFpSlR2cjQ4MEcyaHk=';

    /**
     * Get valid bearer token from cache or fetch a new one
     */
    public static function getBearerToken()
    {
        // Step 1: Check if token is in cache
        // if (Cache::has($this->tokenCacheKey)) {
        //     return Cache::get($this->tokenCacheKey);
        // }

        // Step 2: Token not found or expired — generate new one
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'HTTP_X_MERCHANT_CODE' => 'HRD',
            'Authorization' => 'Basic aGFyYmFsaHJkOmpNMGFpSlR2cjQ4MEcyaHk=',
        ])->post('https://api.ekartlogistics.com/auth/token');

        if (!$response->successful()) {
            throw new \Exception('Failed to fetch token from Ekart. Status: ' . $response->status());
        }

        $data = $response->json();
        dd($data);
        // Step 3: Extract token
        $token = $data['access_token'] ?? null;

        if (!$token) {
            throw new \Exception('Token not found in Ekart response.');
        }

        // Step 4: Determine expiry
        $expiresInSeconds = $data['expires_in'] ?? 2400; // default: 40 minutes
        $cacheDurationInMinutes = floor($expiresInSeconds / 60) - 1; // Add 1-minute buffer

        // Step 5: Cache token
        Cache::put($this->tokenCacheKey, $token, now()->addMinutes($cacheDurationInMinutes));

        return $token;
    }

    /**
     * Call a protected Ekart API using the bearer token
     */
    public static function callEkartApi(string $endpoint, string $method = 'get', array $body = [])
    {
        $token = $this->getBearerToken();

        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ];

        $url = "https://staging.ekartlogistics.com/{$endpoint}";

        $response = Http::withHeaders($headers)->{$method}($url, $body);

        if (!$response->successful()) {
            throw new Exception("Ekart API call failed: " . $response->body());
        }

        return $response->json();
    }


    public static function sendRequest($url, $data)
    {
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'HTTP_X_MERCHANT_CODE' => 'HRD',
                'Authorization' => 'Basic aGFyYmFsaHJkOmpNMGFpSlR2cjQ4MEcyaHk=',
            ])->post('https://api.ekartlogistics.com/auth/token');

            if (!$response->successful()) {
                throw new \Exception('Failed to fetch token from Ekart. Status: ' . $response->status());
            }

            $auth_token = $response->json();

            $response = Http::withHeaders([
                'Authorization' => $auth_token,
                'Content-Type' => 'application/json',
                'HTTP_X_MERCHANT_CODE' => 'HRD',
            ])->withOptions(['verify' => false])
                ->post($url, $data);

            Log::info('ekart logistics API Response:', ['url' => $url, 'response' => $response->json()]);

            return $response;
        } catch (\Exception $e) {
            Log::error('ParcelX API Exception:', ['message' => $e->getMessage()]);
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
