<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 'libros';

    protected $fillable = ['nombre','isbn','editorial','numero_paginas','autor_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function autores()
    {
        return $this->hasOne('App\Models\Autor', 'id', 'autor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ejemplares()
    {
        return $this->hasMany('App\Models\Ejemplar', 'libro_id', 'id');
    }

}
