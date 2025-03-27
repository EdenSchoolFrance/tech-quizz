<?php

namespace App\Http\Controllers;

use App\Models\Quizzes;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $quizzes = Quizzes::all();
        return view('admin.quizz-list', [
            'quizzes' => $quizzes,
        ]);
    }

    public function userManagement() {
        $users = User::all();
        return view('admin.user-management', [
            'users' => $users,
        ]);
    }

    public function deleteUser($id) {
        User::query()->findOrFail($id)->delete();
        return redirect()->route('admin.users')->with('message', 'User has been successfully deleted!');
    }

    public function updateUserPage($id) {
        $user = User::query()->findOrFail($id);
        return view('admin.update-user', [
            'user' => $user,
        ]);
    }
}
