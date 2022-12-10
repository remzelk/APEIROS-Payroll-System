<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
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
            $user = Profile::join('users', 'profile.UserNo', '=', 'users.userno')
            ->select('profile.*', 'users.*')
            ->orderBy('profile.LastName', 'ASC')
            ->where('profile.LastName', 'LIKE', "%$search%")
            ->orwhere('users.position', 'LIKE', '4')
            ->orwhere('users.position', 'LIKE', '5')
            ->get();
        }
        else{
            $user = Profile::join('users', 'profile.UserNo', '=', 'users.userno')
            ->select('profile.*', 'users.*')
            ->orderBy('profile.LastName', 'ASC')
            ->where('users.position', 'LIKE', '4')
            ->orwhere('users.position', 'LIKE', '5')
            ->get();
        }
        $data = compact('user', 'search');
        return view('Admin.SocialBenefits.index')->with($data);
    }
}
