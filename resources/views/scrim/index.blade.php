@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Lista de Scrim</li>
                    </ol>
                </nav>

                <div class="card-body table-responsive">

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">
                                Nome
                            </th>
                            <th scope="col">
                                Inicio
                            </th>
                            <th scope="col">
                                Hora
                            </th>
                            <th scope="col">
                                Qnt. Partida
                            </th>
                            <th scope="col">
                                Qnt. Time
                            </th>
                            <th scope="col">
                                Qnt. Player
                            </th>
                            <th scope="col">
                                Vagas
                            </th>
                            <th scope="col">
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($scrims as $scrim)
                          <tr>
                            <th scope="row">
                                {{ $scrim->nome }}
                            </th>
                            <th scope="row">
                                {{ date('d-m-Y', strtotime($scrim->dt_inicio)) }}
                            </th>
                            <th scope="row">
                                {{ $scrim->hora }}
                            </th>
                            <th scope="row">
                                {{ $scrim->qt_partida }}
                            </th>
                            <th scope="row">
                                {{ $scrim->qt_time }}
                            </th>
                            <th scope="row">
                                {{ $scrim->qt_player }}
                            </th>
                            <th scope="row">
                                
                            </th>
                            <th scope="row">
                                                               
                                <a type="button" class="btn btn-info" href="{{ route('scrim.detalhe',$scrim->id) }}">Detalhe</a>

                                @if (!$usuarioCadastrado->contains('scrim_id', $scrim->id))
                                    <a type="button" class="btn btn-success" href="{{ route('scrim.inscricao',$scrim->id) }}">Cadastrar</a>
                                @else
                                    {{-- <a type="button" class="btn btn-danger" href="{{ route('scrim.cancelar',[$usuarioCadastrado->get(0)->group_id,$scrim->id]) }}">Cancelar inscrição</a> --}}
                                @endif

                    
                                
                            </th>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>

{{--                     <div class="center">
                        {!! $groups->links() !!}
                    </div> --}}

                </div>
            </div>
        </div>
    </div>

@endsection