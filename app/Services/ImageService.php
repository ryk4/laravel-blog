<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class ImageService
{
    private const URL_IMAGE_UPLOAD = 'https://api.imgur.com/3/image';

    public function authorize()
    {
    }

    public function getToken()
    {
    }

    public function getRefreshToken()
    {
    }

    public function uploadImage(UploadedFile $image): string
    {
        $headers = [
            'Authorization' => 'Client-ID ' . env('IMGUR_API_CLIENT'),
        ];

        $response = Http::withHeaders($headers)->post(self::URL_IMAGE_UPLOAD, [
            'image' => base64_encode(file_get_contents($image))
        ]);

        return $response->collect()['data']['link'];
    }
}
