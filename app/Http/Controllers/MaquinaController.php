<?php

namespace App\Http\Controllers;

use App\models\TipoMaquina;
use Illuminate\Http\Request;
use App\models\MaquinaFisica;
use App\models\MaquinaVirtual;
use App\models\VirtualDominio;


class MaquinaController extends Controller
{
    public function index()
    {
        $title = 'Paginal Inicial';


        return view('inicial', compact('title')) ;

    }

    public function maquina(MaquinaFisica  $maquinaFisica )
    {

        $maquinas  = $maquinaFisica->get();
        $title = 'Lista de Maquinas';

        $arrayDados = [
            'maquinas' => $maquinas,
            'title' => $title,

            ];
        return view('maquina.listamaquina', $arrayDados);
    }


    public function cadastro( MaquinaFisica $maquinaFisica, TipoMaquina $tipoMaquina)
    {
        $maquinas       = $maquinaFisica;
        $tipo_maquinas = $tipoMaquina::all();
        $selected   ='';

        $title = 'Cadastro';
        return view('maquina/cadastro', compact('title','maquinas', 'tipo_maquinas', 'selected'));

    }

    public function novocadastro (Request $request, MaquinaFisica $maquinaFisica)
    {
        //  dd($request->nu_macaddress);

        $arrayDados = [
            'id_tipo_maquina' =>      $request->tipomaquina,
            'ip_fisico' =>            $request->ip_fisico,
            'no_maquina' =>           $request->no_maquina,
            'no_responsavel' =>       $request->no_responsavel,
            'no_localizacao' =>       $request->no_local,
            'nu_macaddress' =>        $request->nu_macaddress,
            'nu_patrimonio' =>        $request->nu_patrimonio,
        ];


        $maquinaFisica->inserir($arrayDados);

        if ($maquinaFisica->inserir($arrayDados)){
            return redirect('maquinas/lista');
        };

    }



    public function alterar(Request $request, MaquinaFisica $maquinaFisica, TipoMaquina $tipoMaquina)
    {

        $maquina = MaquinaFisica::find($request->id_maq_fisica);
        $tipo_maquinas = $tipoMaquina::all();

        $title = 'Alterar Maquina' ;


        $arrayDados  = [
            'title' => $title,
            'maquina' => $maquina,
            'tipo_maquinas' => $tipo_maquinas,

        ];
        return view('maquina.cadastro', $arrayDados);
    }

    public function alterada(Request $request, MaquinaFisica $maquinaFisica)
    {

        if ($request->id_maq_fisica == ""){
            echo 'Erro ao informar parametro';
        }

        $maquina = MaquinaFisica::find($request->id_maq_fisica);


        if (!$maquina == null)
        {

            if (!is_null($request->tipomaquina)){
                $maquina->id_tipo_maquina =      $request->tipomaquina;
            }

            $maquina->ip_fisico       =      $request->ip_fisico;
            $maquina->no_maquina      =      $request->no_maquina;
            $maquina->no_responsavel  =      $request->no_responsavel;
            $maquina->no_localizacao  =      $request->no_local;
            $maquina->nu_macaddress   =      $request->nu_macaddress;
            $maquina->nu_patrimonio   =      $request->nu_patrimonio;

            if(!$maquina->save()){
                return 'Erro ao Alterar';
            }

            return redirect('maquinas/lista');

        }else{
            echo 'objeto nullo';
        }

    }


    public function deletar(Request $request, MaquinaVirtual $maquinaVirtual, VirtualDominio $VirtualDominio)
    {
       // dd($request);
        if ( $request->id_maq_fisica == "")
        {
            echo 'parametro informado inválido';
            exit();
        }

        $id = $request->id_maq_fisica;

        $arrayIdMaqVirtual  = $maquinaVirtual->where('id_maq_fisica', '=',$id)->pluck('id_maq_virtual', 'id_maq_virtual');

        if (count($arrayIdMaqVirtual)>0)
        {
            $arrayMaquina_Virtual_Dominio = $VirtualDominio->whereIn('id_maq_virtual', $arrayIdMaqVirtual)->pluck('id_maq_virtual', 'id_maq_virtual');

            if (count($arrayMaquina_Virtual_Dominio) > 0)
            {
                $VirtualDominio = new  VirtualDominio();
                $VirtualDominio = $VirtualDominio->whereIn('id_maq_virtual', $arrayMaquina_Virtual_Dominio)->delete();

                if(!$VirtualDominio)
                {
                    echo 'erro ao excluir relação 1';
                    exit();
                }
            }


            $maquina_Virtual     = new  MaquinaVirtual();
            $maquina_Virtual    = $maquina_Virtual->where('id_maq_fisica', '=',$id)->delete();

            if(!$maquina_Virtual)
            {
                echo 'erro ao excluir relação 2';
                exit();
            }

        }




        $maquina = MaquinaFisica::find($id);
        $delete = $maquina -> delete();

        if($delete == true)
        {
            return redirect('maquinas/lista');
        }

        echo 'erro ao excluir tabela principal';
        exit();


    }



}
