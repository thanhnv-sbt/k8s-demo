<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class TestCicdController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->fakePosts();
        }

        return response()->json(['ok' => true]);
    }
}
