<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class crudModel extends Model
{
    //
    protected $table='studentdetails';

    protected $fillable=[
        'name','email','mobile','birthdate','username','gender','country'
    ]; 
}
