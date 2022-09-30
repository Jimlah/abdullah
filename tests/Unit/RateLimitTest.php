<?php

use Symfony\Component\HttpFoundation\Response;
use function Pest\Laravel\get;

test('test rate limit', function () {
    \Illuminate\Support\Facades\Route::get('/', function (){
        return "Hello World";
    })->middleware(['api','throttle']);
    $request = 0;
    while ($request <= 61)
    {
        get(route('home'));
        $request++;
    }
    get(route('home'))
        ->assertStatus(Response::HTTP_TOO_MANY_REQUESTS);
});
