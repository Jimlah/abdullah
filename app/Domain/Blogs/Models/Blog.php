<?php

namespace App\Domain\Blogs\Models;

use Database\Factories\BlogFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Blog extends Model
    {
        use HasFactory, HasUlids;

        protected $fillable = [
            'id',
            'title',
            "body",
            "published_at"
        ];

        protected $casts = [
            "published_at" => 'datetime'
        ];

        public static function newFactory(): BlogFactory
        {
            return new BlogFactory();
        }

    }
