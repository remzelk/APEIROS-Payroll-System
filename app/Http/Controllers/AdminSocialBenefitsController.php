<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Application;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminSocialBenefitsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $user = User::join('application', 'users.userno', '=', 'application.UserNo')
            ->select('user.*', 'application.*')
            ->orderBy('Name', 'ASC')
            ->where('Name', 'LIKE', "%$search%")
            ->orwhere('Position', 'LIKE', '4')
            ->orwhere('Position', 'LIKE', '5')
            ->whereNull('users.deleted_at')
            ->get();
        }
        else{
            $user = User::join('application', 'users.userno', '=', 'application.UserNo')
            ->select('users.*', 'application.*')
            ->orderBy('Name', 'ASC')
            ->orwhere('Position', 'LIKE', '4')
            ->orwhere('Position', 'LIKE', '5')
            ->whereNull('users.deleted_at')
            ->get();
        }
        $data = compact('user', 'search');
        return view('Admin.SocialBenefits.index')->with($data);
    }
}
