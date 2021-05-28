@extends('layouts.app')



@section('content')
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Lista de Grupo(s))</li>
                    </ol>
                </nav>

                <div class="card-body">

                    <p>
                        <a class="btn btn-primary" href="{{ route('group.add') }}">Adicionar</a>
                    </p>


                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">
                                Grupo(s)
                            </th>
                            <th scope="col">
                                Ação
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($groups as $group)
                          <tr>
                            <th scope="row">
                                {{ $group->name }}
                            </th>
                            <th scope="row">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-success">Time</button>
                                    <a type="button" class="btn btn-outline-warning" href="{{ route('grupo.editar',$group->id) }}" >Editar</a>
                                    <a type="button" class="btn btn-outline-danger" 
                                    onclick="return (confirm('Deletar esse registro?') ? window.location.href='{{ route('grupo.deletar',$group->id) }}' : false)">Excluir</a>
                                </div>
                            </th>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>

        


                    <div class="center">
                        {!! $groups->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection