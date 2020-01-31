@extends('templates.template2')
@push('scripts')
@endpush
@section('content')
<br><br>
<h1 class="title-pg"> Controle de Máquinas e Domínios</h1>
<br><br><br><br>

<div class="form-group">
    <a href="maquinas/lista">
        <button type="button" class="btn btn-primary btn-lg btn-block">Máquinas</button>
    </a>
</div>
<div class="form-group">
    <a href="dominios/lista">
<button type="button" class="btn btn-primary btn-lg btn-block">Domínios</button>
    </a>
</div>

@endsection

