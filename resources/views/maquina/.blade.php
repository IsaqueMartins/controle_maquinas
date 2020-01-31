@extends('templates.template2')
@push('scripts')
@endpush
@section('content')

    <h1> Alterar Maquina</h1>

    <div  class="container">
        <form class="form" method="post" action="{{url('maquinas')}}">
            @csrf
            <div class="form-group">
                <select name="tipomaquina" class="form-control">
                    <option>Tipo de Máquina</option>

                    <option value="1">Servidor</option>
                    <option value="2">Estação</option>
                    <option value="3">Notebook</option>

                </select>
            </div>

            <div class="form-group">
                <input type="text" name="ip_fisico" placeholder="IP da Máquina:" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" name="no_maquina" placeholder="Nome da Máquina:" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" name="no_responsavel" placeholder="Nome do Responsável:" class="form-control">
            </div>

            <div class="form-group">
                <select name="no_local" class="form-control">
                    <option>Localização</option>
                    <option value="1">Brasília</option>
                    <option value="2">Rio de Janeiro</option>
                </select>
            </div>

            <div class="form-group">
                <input type="text" name="nu_macaddress" placeholder="Mac Address:" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" name="nu_patrimonio" placeholder="Patrimônio:" class="form-control">
            </div>

            <div class="row">
                <div class="col-md-1">
                    <a href="{{url('maquinas/lista')}}" class="btn btn-success">Voltar</a>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary">Alterar</button>
                </div>
            </div>
        </form>
    </div>


@endsection