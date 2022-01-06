<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'prestamos';

    protected $fillable = ['fecha_prestamo','fecha_devolucion','user_id','ejemplar_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ejemplare()
    {
        return $this->hasOne('App\Models\Ejemplare', 'id', 'ejemplar_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}
