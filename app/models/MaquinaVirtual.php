<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MaquinaVirtual extends Model
{
    protected $table = 'virtual';
    protected   $primaryKey     = 'id_maq_virtual';
    public      $timestamps     = false;

    public function maquina_fisica()
    {
        return $this->belongsTo(MaquinaFisica::class, 'id_maq_fisica');
    }


    public function inserir($arrayDaddos)
    {
        $this->id_maq_fisica = $arrayDaddos['id_maq_fisica'];
        $this->ip_virtual = $arrayDaddos['ip_virtual'];
        $this->no_virtual = $arrayDaddos['no_virtual'];
        $this->no_responsavel_virtual = $arrayDaddos['no_responsavel_virtual'];
        $this->nu_macaddress = $arrayDaddos['nu_macaddress'];


        if ($this->save() == false){
            throw new Exception('Erro ao salvar maquina virtual');
        };
        return $this;
    }

    public function get_lista_maquina()
    {
        //$lista_maquina = $this->where("id_maq_fisica");

        //if ($id_maq_fisica != null) {$lista_dominio->where('id_maq_fisica', '=', $id_maq_fisica);}

        $lista_maquina = $this->get();

        return $lista_maquina;

    }

    public function dominios()
    {
        return $this->belongsToMany(Dominio::class, 'virtual_dominio', 'id_maq_virtual', 'id_dominio');
    }
}

