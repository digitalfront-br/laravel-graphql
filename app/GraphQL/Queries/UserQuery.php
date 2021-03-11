<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserQuery
{
    public function me()
    {
        return Auth::guard('api')->user();
    }
    public function pagination($root, array $args)
    {
        return User::query()->paginate(
            $args['count'],
            ['*'],
            'page',
            $args['page']
        );
    }
}
