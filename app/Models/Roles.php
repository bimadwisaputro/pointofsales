<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['name'];

    public function userroles()
    {
        return $this->hasMany(UserRoles::class, 'role_id', 'id');
    }
}
