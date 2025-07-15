<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class crudModel extends Model
{
    use SoftDeletes;
    //
    protected $table='studentdetails';
   
    protected $dates=['deleted_at'];
    
    protected $fillable=[
        'name','email','mobile','birthdate','username','gender','country'
    ]; 
}
