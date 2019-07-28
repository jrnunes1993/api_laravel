<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

	 /**
     * Indica os atribustos para definição de dados em massa
     *
     */
    protected $fillable = ['name','birth', 'gerder', 'classroom_id'];

    /**
	* Faz coversão na hora da serialização
    */
    // protected $casts = [
    // 	'birth' => 'date:d/m/Y'

    // ];
    /**
	* Define atributos que serão mostrados depois da serialização
    */
    // protected $visible = ['name','gerder', 'birth', 'classroom_id', 'is_accepted'];
    /**
	* Define os atributos dinamicos anexo a serialização
    */
    // protected $appends = ['is_accepted'];

    //protected $hidden = ['created_at','updated_at'];


    public function classroom()

    {
        return $this->belongsTo("App\Models\Classroom");
    }
    /**
	* Cria um assessor no model de studante chamado is_accepted
    */
    // public function getIsAcceptedAttribute(){
    // 	return $this->attributes['birth'] > '2002-01-01' ? 'aceito' : 'não foi aceito';
    // }
}
