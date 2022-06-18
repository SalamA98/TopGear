<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Mews\Purifier\Casts\CleanHtml;


class Car extends Model
{

    protected $guarded=[];
    use HasFactory;

    protected $casts = [
        'is_new'=> 'boolean',
        'description'    => CleanHtml::class,  // cleans when setting the value
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
