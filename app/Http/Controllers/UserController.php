<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Library\Services\UserService;
use App\Http\Requests\User\CreateRequest;

class UserController extends Controller
{
    private $user_service;

    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    public function index()
    {
        return view('pages.users.index', [
            'users' => User::all(),
        ]);
    }

    public function showCreateForm()
    {
        return view('pages.users.create');
    }

    public function create(CreateRequest $request)
    {
        $result = $this->user_service->createUser($request->validated());

        if ($result) {
            return redirect()->route('user.index')->with('success', $this->user_service->message);
        }

        return back()->withInput($request->all())->with('error', $this->user_service->message);
    }

}
