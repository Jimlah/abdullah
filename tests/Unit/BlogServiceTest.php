<?php

use App\Domain\Blogs\Models\Blog;
use App\Domain\Blogs\Services\BlogService;
use App\Support\Events\Published;
use App\Support\Events\UnPublished;

test('publisher is able to publish', function () {
    Event::fake();
    $blog = Blog::factory()->create();
    $blogService = (new BlogService($blog))->publish();

    expect($blogService)->toBe(true);
    Event::assertDispatched(Published::class);
});

test('publisher is able to unpublish', function () {
    Event::fake();
    $blog = Blog::factory()->create(['published_at' => now()]);
    $blogService = (new BlogService($blog))->unpublish();

    expect($blogService)->toBe(true);
    Event::assertDispatched(UnPublished::class);
});
