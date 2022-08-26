<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roservation extends Model
{
    use HasFactory;
    protected $fillable=['last_name','first_name','tel_number','email','table_id','res_date','guest_number'];
    protected $dates=[
        'res_date'
    ];
    public  function  tables(){
        return $this->belongsTo(Table::class,'table_id','id');
    }
}
