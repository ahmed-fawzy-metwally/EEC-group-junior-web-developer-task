<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('active', 'created_at');
    }

    /**
     * Get the orders for the user
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    /**
     * Return status if authenticated user have an admin role
     *
     * @return Boolean
     */
    static public function CheckAdminRole()
    {
        $allRoles = User::getAllRoles();
        return in_array(1, $allRoles);
    }

    /**
     * Return status if authenticated user have an admin role
     *
     * @return Boolean
     */
    static public function CheckUserRole()
    {
        $allRoles = User::getAllRoles();
        return in_array(2, $allRoles);
    }

    /**
     * Return array contain all authenticated user roles
     *
     * @return Array
     */
    static private function getAllRoles()
    {
        $allRoles = [];
        if (!is_null(Auth::user())) {
            foreach (Auth::user()->roles as $role) {
                if ($role->pivot->active)
                    array_push($allRoles, $role->pivot->role_id);
            }
        }
        return $allRoles;
    }
}
