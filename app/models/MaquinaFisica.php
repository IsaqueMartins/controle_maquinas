<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Exception;

class MaquinaFisica extends Model
{
    protected   $table          = 'maquina_fisica';
    protected   $primaryKey     = 'id_maq_fisica';
    public      $timestamps     = false;


    public function tipos_maquinas()
    {
        return $this->belongsTo(TipoMaquina::class, 'id_tipo_maquina');
    }

    public function inserir($arrayDaddos)
    {
        $this->id_tipo_maquina = $arrayDaddos['id_tipo_maquina'];
        $this->ip_fisico = $arrayDaddos['ip_fisico'];
        $this->no_maquina = $arrayDaddos['no_maquina'];
        $this->no_responsavel = $arrayDaddos['no_responsavel'];
        $this->no_localizacao = $arrayDaddos['no_localizacao'];
        $this->nu_macaddress = $arrayDaddos['nu_macaddress'];
        $this->nu_patrimonio = $arrayDaddos['nu_patrimonio'];


        if ($this->save() == false){
            throw new Exception('Erro ao salvar maquina');
        };
        return $this;
    }

    public function get_lista_servidores($id_maq_fisica= null)
    {
        $lista_servidores = $this->where("id_tipo_maquina", '=','1');

        if ($id_maq_fisica != null)
        {
            $lista_servidores->where('id_maq_fisica', '=', $id_maq_fisica);
        }

        $lista_servidores = $lista_servidores->get();

        return $lista_servidores;
    }



}
