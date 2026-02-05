<?php

namespace App\Http\Controllers;

use App\Models\User;

class TestCicdController extends Controller
{
    public function index()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->fakePosts();
        }

        return response()->json(['ok' => true]);
    }
}
