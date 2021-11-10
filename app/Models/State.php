<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = 'states';
    protected $primaryKey  = 'id';

    public function profile_state()
    {
        return $this->hasMany(ProfileModel::class,'state_id','id');
    }
}
