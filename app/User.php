<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The Leagues that belong to User
     */
    public function leagues()
    {
        return $this->belongsToMany(League::class);
    }

    public function addLeague(League $league)
    {
        return $this->leagues()->save($league);
    }

    public function removeLeague(League $league)
    {
        return $this->leagues()->detach($league);
    }

    public function inLeague($league)
    {
        $members = [];

        foreach($league->users as $member) {
            $members[] = $member->id;
        }

        if(in_array($this->id, $members)) {
            return true;
        }
    }

    public function isCreator($created)
    {
        if($this->id == $created->creator_id) {
            return true;
        }
    }
}
