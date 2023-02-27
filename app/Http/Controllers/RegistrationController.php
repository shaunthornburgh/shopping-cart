<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class RegistrationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     */
    public function store(StoreUserRequest $request): UserResource
    {
        return new UserResource(User::create($request->validated()));
    }
}
