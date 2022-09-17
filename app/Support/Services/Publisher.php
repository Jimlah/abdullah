<?php

namespace App\Support\Services;

use App\Support\Events\Published;
use App\Support\Events\UnPublished;
use Illuminate\Database\Eloquent\Model;

class Publisher
{
    public function publish(Model $model): bool
    {
        $model->update(['published_at' => now()]);
        Published::dispatch($model);
        return true;
    }

    public function unpublish(Model $model): bool
    {
        $model->update(['published_at' => null]);
        UnPublished::dispatch($model);
        return  true;
    }
}
