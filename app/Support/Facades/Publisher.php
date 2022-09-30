<?php

namespace App\Support\Facades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;


/**
 * @method static publish(Model $model)
 * @method static unpublish(Model $model)
 */
class Publisher extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'publisher';
    }
}
