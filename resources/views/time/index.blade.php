@extends('layouts.app')



@section('content')
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Lista de usuários do grupo</li>
                    </ol>
                </nav>

                <div class="card-body">



                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">
                                Usuário
                            </th>
                            <th scope="col">
                                ação
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                          <tr>
                            <th scope="row">
                                {{ $user->name }}
                                @if ($user->user_id == $user->user_owner_id)  
                                    (Admin)
                                @endif
                            </th>

                            <th scope="row">
                                @if($user->user_id != $user->user_owner_id)  
                                    <a type="button" class="btn btn-outline-danger" onclick="return (confirm('Usuário esse registro?') ? window.location.href='{{ route('time.deletar',[$user->user_id,$user->group_id]) }}' : false)">Excluir</a>
                                @endif
                            </th>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>

        


{{--                     <div class="center">
                        {!! $users->links() !!}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection