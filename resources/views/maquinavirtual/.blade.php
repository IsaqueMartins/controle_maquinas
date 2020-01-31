@extends('templates.template2')
@section('content')
    @push('scripts')

    @endpush
    <h1 class="title-pg"> Cadastro de Máquina Virtual</h1>
    <div  class="container">

        <form class="form" method="post" action="{{url('virtuais/novocadastro')}}>
            @csrf

                <div class="form-group">
        <select id="id_maq_fisica" name="id_maq_fisica" class="form-control">

            <option value="0">::Selecione um servidor::</option>
            @foreach($listaServidores as $servidores)
                @if ($id_maq_fisica == $servidores->id_maq_fisica)
                    <option value="{{$servidores->id_maq_fisica}}" selected>{{$servidores->no_maquina}}</option>
                @else
                    <option value="{{$servidores->id_maq_fisica}}">{{$servidores->no_maquina}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
                <input type="text" name="ip_virtual" placeholder="IP da Maquina Virtual:" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" name="no_virtual" placeholder="Nome da Maquina Virtual:" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" name="no_responsavel_virtual" placeholder="Nome do Responsavel:" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" name="nu_macaddress" placeholder="Mac Address:" class="form-control">
            </div>

            <div class="row">
                <div class="col-md-1">
                    <a href="{{url('virtuais/cadastro')}}" class="btn btn-success">Voltar</a>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary">Cadastrar</button>
                </div>
            </div>
        </form>
    </div>

    <table class="table table-striped table-bordered mt-2">
        <tr>
            <th>Servidor</th>
            <th>Nome da Maquina Virtual</th>
            <th>Ip da Maquina Virtual</th>
            <th> Nome do Responsável</th>
            <th>Mac Andress</th>
            <th>Ação</th>
        </tr>
        @foreach($virtuais as $maquinavirtual)
            <tr>
                <td>{{$maquinavirtual->id_maq_fisica}}</td>
                <td>{{$maquinavirtual->no_virtual}}</td>
                <td>{{$maquinavirtual->ip_virtual}}</td>
                <td>{{$maquinavirtual->no_responsavel_virtual}}</td>
                <td>{{$maquinavirtual->nu_macandress}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Detalhes
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="{{url('virtuais/alterar')}}">Alterar</a>
                            <a class="dropdown-item" href="{{url('')}}">Excluir</a>
                        </div>
                    </div>
                </td>

            </tr>

        @endforeach
    </table>











@endsection
