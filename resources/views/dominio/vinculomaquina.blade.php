@extends('templates.template2')
@section('content')
    @push('scripts')
    @endpush

    <h1>Vincular Máquina</h1>

    <div  class="container">

        <form class="form" method="post" action="{{url('virtualdominio/salvar')}}" >
            @csrf

            <div class="form-group">
                <select id="id_dominio" name="id_dominio" class="form-control">
                    <option value="0">::Selecione um dominio::</option>
                    @foreach($listaDominio as $dominio)
                        @if ($id_dominio == $dominio->id_dominio)
                            <option value="{{$dominio->id_dominio}}" selected>{{$dominio->no_dominio}}</option>
                        @else
                            <option value="{{$dominio->id_dominio}}">{{$dominio->no_dominio}}</option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <select id="id_maq_virtual" name="id_maq_virtual" class="form-control">
                    <option value="0">::Selecione uma maquina::</option>
                    @foreach($listaMaquinas as $maquina)
                        @if ($id_maq_virtual == $maquina->id_maq_virtual)
                            <option value="{{$maquina->id_maq_virtual}}" selected>{{$maquina->no_virtual}}</option>
                        @else
                            <option value="{{$maquina->id_maq_virtual}}">{{$maquina->no_virtual}}</option>
                        @endif
                    @endforeach

                </select>
            </div>


            <div class="row">
                <div class="col-md-1">
                    <a href="{{url('dominios/lista')}}" class="btn btn-success">Voltar</a>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-striped table-bordered mt-2">
        <tr>
            <th>Domínio</th>
            <th>Máquina Virtual</th>
            <th>Ações</th>
        </tr>

        @foreach($vinculados as $vinculado)

            <tr>
                <td>{{$vinculado->dominio->no_dominio}}</td>
                <td>{{$vinculado->maquina_virtual->no_virtual}}</td>
                <td class="opcoes">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detalhes-comunicacao" data-idpedido="1047" data-protocolo="0518.0322.2322.0021">Detalhes</button>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" >Alterar</a>
                                <a class="dropdown-item" >Excluir</a>


                            </div>

                        </div>
                    </div>
                </td>

            </tr>
            @endforeach
    </table>



@endsection