<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Users\Admin\CreateUserAction;
use App\Actions\Users\Admin\DeleteUserAction;
use App\Actions\Users\Admin\FindUserByIdAction;
use App\Actions\Users\Admin\GetUsersAction;
use App\Actions\Users\Admin\UpdateUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function __construct(
        protected GetUsersAction     $getUsersAction,
        protected FindUserByIdAction $findUserByIdAction,
        protected UpdateUserAction   $updateUserAction,
        protected CreateUserAction   $createUserAction,
        protected DeleteUserAction   $deleteUserActions
    )
    {
    }

    public function index(Request $request): Response
    {
        return Inertia::render('Admin/Users/Index');
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Users/Modify');
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        $this->createUserAction->run($request->validated());
        return redirect()->route('admin.users.index');
    }

    public function edit(int $id): Response
    {
        $user = $this->findUserByIdAction->run($id);

        return Inertia::render('Admin/Users/Modify', [
            'user' => new UserResource($user)
        ]);
    }

    public function update(UpdateUserRequest $request, int $id): RedirectResponse
    {
        $this->updateUserAction->run($request->validated(), $id);
        return redirect()->route('admin.users.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->deleteUserActions->run($id);
        return back();
    }
}
