<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $fillable = ['nombre','fechainicio','fechafin','estado','activo','borrado','user_id'];
     protected $guarded = ['id'];
}
