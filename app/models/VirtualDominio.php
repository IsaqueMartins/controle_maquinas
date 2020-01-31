<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class VirtualDominio extends Model
{
    protected $table = 'virtual_dominio';
    public $timestamps = false;


    public function inserir($arrayDaddos)
    {
        $this->id_maq_virtual = $arrayDaddos['id_maq_virtual'];
        $this->id_dominio = $arrayDaddos['id_dominio'];


        if ($this->save() == false){
            throw new Exception('Erro ao salvar maquina virtual');
        };
        return $this;
    }
    public function maquina_virtual()
    {
        return $this->belongsTo(MaquinaVirtual::class, 'id_maq_virtual');
    }
    public function dominio()
    {
        return $this->belongsTo(Dominio::class, 'id_dominio');
    }

}
