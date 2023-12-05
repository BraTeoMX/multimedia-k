<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat_modulos extends Model
{
    //
    /**
     * The table associated with the model.
     *
     * @var string
     */
    // En el modelo Cat_modulos
    public function teamModulos()
    {
        return $this->hasMany(TeamModulo::class, 'modulo', 'id');
    }

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = [
        
        'id',
        'Modulo',
        'estatus',
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha_solicitado' => 'datetime',
    ];
}
