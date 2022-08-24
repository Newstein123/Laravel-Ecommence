<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'slug'  => $this->slug,
            'quantity'  => $this->quantity,
            'price'     => $this->price,
            'sprice'    => $this->sprice,
            'author'    => $this->author,
            'pages'     => $this->pages,
            'description' => $this->description,
            'time'      => $this->created_at->toFormattedDateString(),
            'image'     => ImageResource::collection($this->images),
            'category'  => CategoryResource::collection($this->categories),
            'papertype' => PaperResource::collection($this->colors),
        ];
    }
}
