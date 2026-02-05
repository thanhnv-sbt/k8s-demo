<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestCicdController extends Controller
{
    public function index()
    {
        $users = User::all(); // 1 query

        foreach ($users as $user) {
            $posts = $user->posts()->get();
        }

        return response()->json(['ok' => true]);
    }
}
