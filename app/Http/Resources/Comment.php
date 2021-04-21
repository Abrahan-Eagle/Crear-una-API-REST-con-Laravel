<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'text'       => $this->text,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'article_id'    => '/api/article/' . $this->article_id,
            'user_id'=> '/api/user/' . $this->user_id,
        ];
    }
}
