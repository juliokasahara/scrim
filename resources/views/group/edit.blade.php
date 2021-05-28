@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('usuario') }}">Usuário</a></li>
                        <li class="breadcrumb-item active">Adicionar</li>
                    </ol>
                </nav>

                <div class="card-body">

                    <form action="{{ route('grupo.atualizar', $group->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" class="form-control" placeholder="Nome do grupo" value="{{ $group->name }}"/>
                        </div>

                        <button class="btn btn-info">Adicionar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection