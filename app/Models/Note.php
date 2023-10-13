<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

   
    //fillable: son los campos que se pueden llenar con el metodo create de eloquent por defecto todos los campos se pueden llenar
    // guarded: son los campos que no se pueden llenar con el metodo create de eloquent, por defecto al estar vacio se pueden llenar todos los campos
    protected $guarded=[];

    //casts: son los campos que se especifica el tipo de dato, por defecto ninguno

    //hidden: son los campos que no se devuelven en las respuestas json
    protected $hidden=["created_at","updated_at"];
    


    
}
