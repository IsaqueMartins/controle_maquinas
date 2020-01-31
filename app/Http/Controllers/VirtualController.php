<?php

namespace App\Http\Controllers;

use App\models\MaquinaFisica;
use Illuminate\Http\Request;
use App\models\MaquinaVirtual;
use App\models\VirtualDominio;

class VirtualController extends Controller
{

    public function cad_maq_virtual(Request $request , MaquinaVirtual $maquinaVirtual, MaquinaFisica $maquinaFisica)
    {
        $listaServidores = $maquinaFisica->get_lista_servidores($request->id_maq_fisica);
        $virtuais = $maquinaVirtual->all();

        $title = 'Cadastro Maquina Virtual';

        $no_servidor = $maquinaFisica;

        $request->id_maquina_fisica;

        $arrayDados  = [
            'title'              => $title,
            'virtuais'           => $virtuais,
            'listaServidores'    => $listaServidores,
            'id_maq_fisica'      => $request->id,
            'no_servidor'        => $no_servidor,
        ];

        return view('maquinavirtual.cadastro', $arrayDados);


    }


    public function alterar( Request $request, MaquinaVirtual $maquinaVirtual, MaquinaFisica $maquinaFisica){

        $virtuais = $maquinaVirtual->all();

        $virtual = MaquinaVirtual::find($request->id_maq_virtual);


        $listaServidores = $maquinaFisica->get_lista_servidores();


        $title = 'Alterar Maquina Virtual';


        $arrayDados = [
            'title'               => $title,
            'virtuais'            => $virtuais,
            'virtual'             => $virtual,
            'listaServidores'     => $listaServidores,
        ];


        return view('maquinavirtual.cadastro', $arrayDados);
    }

    public function alterada (Request $request)
    {
        if ($request->id_maq_virtual == ""){
            echo 'Erro ao informar parametro';
        }

        $virtual = MaquinaVirtual::find($request->id_maq_virtual);

        if (!$virtual == null) {
            $virtual->id_maq_fisica               = $request->id_maq_fisica;
            $virtual->ip_virtual                  = $request->ip_virtual;
            $virtual->no_virtual                  = $request->no_virtual;
            $virtual->no_responsavel_virtual      = $request->no_responsavel_virtual;
            $virtual->nu_macaddress               = $request->nu_macaddress;

            if (!$virtual->save()) {
                return ' Erro ao Alterar';
            }

            return redirect('virtuais/cadastro');



        }
    }


    public function salvar (Request $request, MaquinaVirtual $maquinaVirtual)
    {
        $arrayDados = [
            'id_maq_fisica'                  => $request->id_maq_fisica,
            'ip_virtual'                     => $request->ip_virtual,
            'no_virtual'                     => $request->no_virtual,
            'no_responsavel_virtual'         => $request->no_responsavel_virtual,
            'nu_macaddress'                  => $request->nu_macaddress,
        ];


        $maquinaVirtual->inserir($arrayDados);

        if ($maquinaVirtual->inserir($arrayDados)){
            return redirect('virtuais/cad-maq-virtual/'.$request->id_maq_fisica);
        };

    }

    public function deletarvirtual( Request $request, VirtualDominio $VirtualDominio)
    {
        if ( $request->id_maq_virtual == "")
        {
            echo 'parametro informado inválido';
            exit();
        }

        $virtual_dominio = $VirtualDominio->where('id_maq_virtual', '=',$request->id_maq_virtual)->get();

        if (count($virtual_dominio)  > 0 )
        {
            $virtual_dominio = $VirtualDominio->where('id_maq_virtual', '=',$request->id_maq_virtual)->delete();

            if(!$virtual_dominio)
            {
                echo 'erro ao excluir relação';
                exit();
            }
        }

        $maquinavirtual = MaquinaVirtual::find($request->id_maq_virtual);
        //dd($maquina);
        $delete = $maquinavirtual->delete();

        if ($delete == true)
            return redirect('virtuais/cadastro');


    }

}
