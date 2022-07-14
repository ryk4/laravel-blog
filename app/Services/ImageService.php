<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class ImageService
{
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
            'Authorization' => 'Client-ID 2d0f4e17142a45e',
        ];

        $response = Http::withHeaders($headers)->post('https://api.imgur.com/3/image', [
            'image' => base64_encode(file_get_contents($image))
        ]);

        return $response->collect()['data']['link'];
    }
}
