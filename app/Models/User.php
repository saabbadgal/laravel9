<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_admin',
        'name',
        'email',
        'password',
        'dob',
        'gender',
        'anual_income',
        'occupation',
        'family_type',
        'is_manglik',
        'partner_anual_income_range_from',
        'partner_anual_income_range_to',
        'partner_occupation',
        'partner_family_type',
        'is_partner_manglik',
        'google_id',
        'is_profile_complete'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rating(){

        $authUser = auth()->user();
        $maximumPoints  = 100; 
        $occupation = $this->occupation == $authUser->partner_occupation ? 25 : 0;
        $family_type = $this->family_type == $authUser->partner_family_type ? 25 : 0;
        $is_manglik = $this->is_manglik == $authUser->is_partner_manglik ? 25 : 0;
        $anualIncome = $this->anualIncome >= $authUser->partner_anual_income_range_from && 
                       $this->anualIncome <= $authUser->partner_anual_income_range_to ? 25 : 0; 

        return intval(($occupation+$family_type+$is_manglik+$anualIncome/100));
        
    }

    public function scopeAdminAll($query,$request)
    { 
        return $query->where('is_admin',0)
                ->when(!is_null($request->dateFrom) && !is_null($request->dateTo), function($query) use ($request){ 
                    $query->whereDate('dob','>=',$request->dateFrom)->whereDate('dob','<=',$request->dateTo);
                })
                ->when(!is_null($request->anual_income), function($query) use ($request){
                    $query->whereBetween('anual_income', [trim(explode('-',$request->anual_income)[0]), trim(explode('-',$request->anual_income)[1])]); 
                })
                ->when($request->gender != 'both', function($query) use ($request){
                    $query->where('gender',$request->gender);
                })
                ->when(!is_null($request->family_type), function($query) use ($request){
                    $query->where('family_type',$request->family_type);
                })
                ->when(!is_null($request->is_manglik), function($query) use ($request){
                    $query->where('is_manglik',$request->is_manglik);
                });
    } 
}
