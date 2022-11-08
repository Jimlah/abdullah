<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = User::query()
        ->when($request->search !== '', function (Builder $query) use ($request) {
            return $query->where('name', 'LIKE', '%' .$request->search.'%' );
        })
//            ->dd()
        ->paginate($request->perPage);
        return response()->json(compact('data'));
    }
}
