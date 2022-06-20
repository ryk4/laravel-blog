<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogCommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'comment' => $this->comment,
            'votes' => $this->votes,
            'created_at' => $this->created_at->isoFormat('Do MMM Y h:mm'),
        ];
    }
}
