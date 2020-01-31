<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Dominio;
use App\models\MaquinaVirtual;
use App\models\VirtualDominio;

class DominioController extends Controller
{
    public function dominio(Dominio $dominio,  VirtualDominio $virtualDominio)
    {

        $dominios = $dominio->all();
        $vinculados = $virtualDominio->all();
        $title = 'Domínios';

        $arrayDados = [
            'dominios'      => $dominios,
            'title'         => $title,
            'vinculados'    => $vinculados,
            ];

        return view('dominio.cadastro', $arrayDados);
    }


    public function alterar(Request $request, Dominio $dominio)
    {
        $dominios = $dominio->all();
        $alterar = Dominio::find($request->id_dominio);
        //dd($alterar);



        $title = 'Alterar Domínio';

        $arrayDados = [
            'title'         => $title,
            'dominios'      => $dominios,
            'alterar'       => $alterar,
        ];

        return view('dominio.cadastro', $arrayDados);
    }

    public function alterada (Request $request)
    {
        if ($request->id_dominio == ""){
            echo 'Erro ao informar parametro';
        }

        $dominio = Dominio::find($request->id_dominio);

        if(!$dominio == null){
            $dominio->no_dominio           = $request->no_dominio;
            $dominio->ip_dns_interno       = $request->ip_dns_interno;
            $dominio->ip_dns_externo       = $request->ip_dns_externo;

            if (!$dominio->save()){
                return ' Erro ao Alterar';
            }

            Return redirect ('dominios/lista');
        }

    }



    public function cadastrodominio (Dominio $dominio)
    {

        $dominios = $dominio;
        $title = 'Cadastro de Domínio';

        $arrayDados = [
            'dominios'   => $dominios,
            'title'      => $title,

            ];
        return view ('dominio/cadastro',$arrayDados);

    }

    public function novocadastrodominio(Request $request, Dominio $dominio)
    {


        $arrayDados = [
            'no_dominio'            => $request->no_dominio,
            'ip_dns_interno'        => $request->ip_dns_interno,
            'ip_dns_externo'        => $request->ip_dns_externo,
        ];


        $dominio->inserir($arrayDados);

        if ($dominio->inserir($arrayDados)){
            return redirect('dominios/lista');
        };

    }





    public function deletar(Request $request, VirtualDominio $VirtualDominio)
    {

        if ( $request->id_dominio == "")
        {
            echo 'parametro informado inválido';
            exit();
        }


        $id = $request->id_dominio;

        $virtual_dominio = $VirtualDominio->where('id_dominio', '=',$id)->get();
       // dd($virtual_dominio);

        if (count($virtual_dominio)  > 0 )
        {
            $virtual_dominio = $VirtualDominio->where('id_dominio', '=',$id)->delete();

            if(!$virtual_dominio)
            {
                echo 'erro ao excluir relação';
                exit();
            }
        }

        $dominio = Dominio::find($id);
        $delete = $dominio -> delete();

        if($delete == true)
            return redirect('dominios/lista');


    }

}
