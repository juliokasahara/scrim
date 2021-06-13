@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('grupo') }}">Grupo</a></li>
                        <li class="breadcrumb-item active">Adicionar</li>
                    </ol>
                </nav>

                <div class="card-body">

                    <form action="{{ route('grupo.salvar') }}" method="post">
                        {{ csrf_field() }} 
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome do grupo"/>
                        </div>
                        <div class="form-group">
                            <label for="sigla">Nome</label>
                            <input type="text" name="sigla" class="form-control" placeholder="Sigla do grupo"/>
                        </div>

                        <button class="btn btn-info">Adicionar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection