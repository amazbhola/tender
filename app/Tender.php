<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $fillable =[
        'tender_id',
        'description',
        'price',
        'security',
        'method_id',
        'location_id',
        'department_id',
        'tendercapacity',
        'similar',
        'turnover',
        'Liquid',
        'requerdocument',
        'others',
        'date',

    ];

    public function district(){
        return $this->belongsTo(District::class,'location_id');
    }
    public function method(){
        return $this->belongsTo(method::class,'method_id');
    }
    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }


    // public function methods()
    // {
    //     return $this->hasMany('App\method');
    // }
}
