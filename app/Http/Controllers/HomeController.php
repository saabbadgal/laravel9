<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
        if(!auth()->user()->is_admin){
            $users = User::where('is_admin',0)->get();
            $users = $users->map(function ($user) {
               return  $user->setAttribute('rating',(int)$user->rating()); 
            });
            $users = $users->filter(function ($user) {
                return $user->rating > 24;
            }); 
            $users = $users->sortByDesc('rating');

            return view('home',compact('users'));
        } 
        
        return view('home');
    } 

    
    public function updateProfile(Request $request)
    {
        $request->validate([
            "dob" => ['required','date'],
            "gender" => 'required',
            "anual_income" => 'required', 
            "family_type" => ['required'],
            "is_manglik" => ['required','boolean'],
            "partner_anual_income" => 'required|not_in:0',
            "partner_occupation" => 'required',
            "partner_family_type" => 'required',
            "is_partner_manglik" => ['required','boolean'],
        ]);

        $user = User::find(auth()->user()->id);
        
        $user->update([
            "dob" => \Carbon\Carbon::parse($request->dob),
            "gender" => $request->gender,
            "anual_income" => $request->anual_income,
            "occupation" => $request->occupation,
            "family_type" => $request->family_type,
            "is_manglik" => $request->is_manglik,
            "partner_anual_income_range_from" => trim(explode('-',$request->partner_anual_income)[0]),
            "partner_anual_income_range_to" => trim(explode('-',$request->partner_anual_income)[1]),
            "partner_occupation" => $request->partner_occupation,
            "partner_family_type" => $request->partner_family_type,
            "is_partner_manglik" => $request->is_partner_manglik,
            'is_profile_complete' => 1
        ]);
        return redirect()->route('home');
    }

    public function adminAll(Request $request){

        if(auth()->user()->is_admin){
            $users = User::adminAll($request)->get();
            return view('all',compact('users'));
        }

    }

    
}
