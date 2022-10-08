<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Application;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    public function create()
    {
        return view('Admin.Credentials.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'position' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $current = Carbon::now();
        $year = Carbon::now()->format('Y');
        $y = substr($year, -2);
        $m = Carbon::now()->format('m');
        $d = Carbon::now()->format('d');
        $usercount = User::withTrashed()->where('created_at', 'LIKE', "%" . $current->toDateString() . "%")->count() + 1;
        if ($usercount < 10)
        {
            $usercount = "0" . $usercount;
        }
        $userno = ($y . $m . $d . $usercount);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'position' => $request->position,
            'userno' => $userno,
            'password' => Hash::make($request->password),
        ]);

        if (($user->position == 4) || ($user->position == 5))
        {
            Application::create([
                'UserNo' => $user->userno
            ]);
        }

        event(new Registered($user));

        return redirect('/Admin/Credentials/Register');
    }
}
