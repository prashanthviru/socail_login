<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $primaryKey  = 'id';


    public function profile_state()
    {
        return $this->belongsTo(State::class,'state_id');
    }

    public function profile_country()
    {
        return $this->belongsTo(CountryModel::class,'country_id','id');
    }

    public function profile_city()
    {
        return $this->belongsTo(CITY::class,'city_id');
    }

}
