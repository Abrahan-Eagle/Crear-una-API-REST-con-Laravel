<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   //return parent::toArray($request);
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'body'       => $this->body,
            'user'    => '/api/users/' . $this->user_id,
            'category'=> '/api/category/' . $this->category_id,
            'image'      => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            //-------------------------------------------------
            //'user_id'    => $this->user_id,
            //'category_id'=> $this->category_id,
            //-------------------------------------------------
            //'user'    => User::find($this->user_id),
            //'category'=> Category::find($this->category_id),
            //-------------------------------------------------

        ];
    }
}
