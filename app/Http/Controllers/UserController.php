<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\MailService;
use Illuminate\Support\Facades\Validator;

class UserController
{
    protected $mailService;

    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $this->mailService->verifyUser($user);

        return response()->json($user, 201);
    }

    public function index(Request $request) {
        $query = User::query();
        if($request->has('verified')) {
            $verified = filter_var($request->verified, FILTER_VALIDATE_BOOLEAN);
            $query->where('verified', $verified);
        }

        $users = $query->orderBy('name')->paginate(100);

        return response()->json($users);
    }
}
