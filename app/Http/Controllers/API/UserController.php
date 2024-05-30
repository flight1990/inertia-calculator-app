<?php

namespace App\Http\Controllers\API;

use App\Actions\Users\Admin\GetUsersAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function __construct(
        protected GetUsersAction $getUsersAction
    )
    {
    }

    public function index(Request $request): AnonymousResourceCollection
    {
        $users = $this->getUsersAction->run($request->all());
        return UserResource::collection($users);
    }
}
