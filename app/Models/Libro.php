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
    public function autore()
    {
        return $this->hasOne('App\Models\Autore', 'id', 'autor_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ejemplares()
    {
        return $this->hasMany('App\Models\Ejemplare', 'libro_id', 'id');
    }
    
}
