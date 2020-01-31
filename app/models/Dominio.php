<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class dominio extends Model
{
    protected $table = 'dominio';
    protected   $primaryKey     = 'id_dominio';
    public      $timestamps     = false;

    public function get_lista_dominios($id_dominio = null)
    {

        if ($id_dominio != null) {$this->where('id_dominio', '=', $id_dominio);}

        $lista_dominios = $this->get();




        return $lista_dominios;
    }

    public function inserir($arrayDaddos)
    {
        $this->no_dominio = $arrayDaddos['no_dominio'];
        $this->ip_dns_interno = $arrayDaddos['ip_dns_interno'];
        $this->ip_dns_externo = $arrayDaddos['ip_dns_externo'];


        if ($this->save() == false){
            throw new Exception('Erro ao salvar domínio');
        };
        return $this;
    }

    public function maquina_virtual()
    {
               return $this->belongsToMany(MaquinaVirtual::class, 'virtual_dominio', 'id_dominio', 'id_maq_virtual');
    }
}
