<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestCicdController extends Controller
{
    public function index()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->tokens()->count();
        }

        return response()->json(['ok' => true]);
    }
}
