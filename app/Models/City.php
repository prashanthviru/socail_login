<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $primaryKey  = 'id';

    public function profile_city()
    {
        return $this->hasMany(ProfileModel::class,'city_id','id');
    }
}
