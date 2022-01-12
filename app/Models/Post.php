<?php

namespace App\Models;

use App\Casts\FileUploadCast;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "preview",
        "thumbnail",
    ];

    protected $casts = [
        "thumbnail" => FileUploadCast::class,
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy("created_at");
    }
}
