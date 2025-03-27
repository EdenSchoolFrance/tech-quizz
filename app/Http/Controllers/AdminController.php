<?php

namespace App\Http\Controllers;

use App\Models\Quizzes;
use App\Models\User;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
     public function index()
     {
          $quizzes = Quizzes::all();
          return view('admin.quizz-list', [
               'quizzes' => $quizzes,
          ]);
     }

     public function userManagement()
     {
          $users = User::all();
          return view('admin.user-management', [
               'users' => $users,
          ]);
     }

     public function deleteUser($id)
     {
          User::query()->findOrFail($id)->delete();
          return redirect()->route('admin.users')->with('message', 'User has been successfully deleted!');
     }

     public function createUser()
     {
          return view('admin.create-user');
     }

     public function store(Request $request): RedirectResponse
     {
          $request->validate([
               'name' => ['required', 'string', 'max:255'],
               'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
               'password' => ['required', Rules\Password::defaults()],
          ]);

          $user = User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make($request->password),
          ]);

          return redirect(route('admin.users'));
     }
}
