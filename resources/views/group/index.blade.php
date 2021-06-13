@extends('layouts.app')



@section('content')
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Lista de Grupo(s)</li>
                    </ol>
                </nav>

                <div class="card-body table-responsive">

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
                                Sigla
                            </th>
                            <th scope="col">
                                Convite
                            </th>
                            <th scope="col">
                                
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
                                {{ $group->sigla }}
                            </th>
                            <th scope="row">
                                @if ($group->user_owner_id == $user->id) 
                                    {{ $group->hash }} 
                                @endif
                            </th>
                            <th scope="row">
                                
                                <a type="button" class="btn btn-info" href="{{ route('time',$group->id) }}">Time</a>
                                @if ($group->user_owner_id == $user->id)                              
                                <a type="button" class="btn btn-secondary" href="{{ route('grupo.editar',$group->id) }}" >Editar</a>
                                    <a type="button" class="btn btn-danger" onclick="return (confirm('Deletar esse registro?') ? window.location.href='{{ route('grupo.deletar',$group->id) }}' : false)">Excluir</a>
                                @endif


                               
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