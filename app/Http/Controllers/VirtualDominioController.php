<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Dominio;
use App\models\MaquinaVirtual;
use App\models\VirtualDominio;

class VirtualDominioController extends Controller
{
    public function vinculomaquina (Request $request, MaquinaVirtual $maquinaVirtual, Dominio $dominio, VirtualDominio $virtualDominio)
    {


        $listaDominio = $dominio->get_lista_dominios($request->id);

        $listaMaquinas = $maquinaVirtual->get_lista_maquina();



        $title = 'Vinculo com Máquina';

        $vinculados = $virtualDominio->all();


        $arrayDados =[

            'listaMaquinas'     => $listaMaquinas,
            'title'             => $title,
            'listaDominio'      => $listaDominio,
            //  'id_dominio'        => $request->id,
            'vinculados'        => $vinculados,
            // 'id_maq_virtual'    => $id_maq_virtual=0,

        ];


        return view ('dominio/vinculomaquina', $arrayDados);

    }

    public function salvar (Request $request, VirtualDominio $virtualDominio)
    {
        $arrayDados = [

            'id_maq_virtual'     => $request->id_maq_virtual,
            'id_dominio'         => $request->id_dominio,

        ];


        $virtualDominio->inserir($arrayDados);

        if ($virtualDominio->inserir($arrayDados)){
            return redirect('dominios/maquina'.$request->id_maq_fisica);
        };

    }
}
