<?php

namespace App\Domain\Blogs\Services;

use App\Domain\Blogs\Models\Blog;
use App\Support\Facades\Publisher;

class BlogService
{
    public function __construct(public Blog $blog)
    {
    }

    public function publish(): bool
    {
        Publisher::publish($this->blog);
        return true;
    }

    public function unpublish(): bool
    {
        Publisher::unpublish($this->blog);
        return true;
    }

}
