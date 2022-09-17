<?php

namespace App\Support\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Published
{
    use Dispatchable, SerializesModels, InteractsWithSockets;

    public function __construct(public Model $model)
    {

    }
}
