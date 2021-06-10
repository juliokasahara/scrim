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

                <div class="card-body">

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            @foreach ($times as $key => $users)
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse-{{ $loop->index }}" aria-expanded="true" aria-controls="collapse-{{ $loop->index }}">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $loop->index + 1 }} - {{ $key }}            <span class="badge right badge-primary badge-pill">Player - {{sizeOf($users)}}</span>
                                        </div>
                                    </button>
                                    </h2>
                                </div>
                            
                                <div id="collapse-{{ $loop->index }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($users as $user)
                                            <!-- Earnings (Monthly) Card Example -->
                                            <div class="col-xl col-md-6 mb-4">
                                                <div class="card border-left-primary shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1 h5 mb-0 font-weight-bold text-gray-800">
                                                                    slot - {{ $loop->index + 1 }}: {{ $user->nick }}
                                                                </div>
                                                                {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach 
                                            
                                        </div>
                                            
                                                {{-- <div class="p-2 bd-highlight">
                                                    {{ $user->nick }}
                                                </div> --}}
                                             
                                                                       
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


{{--                     <div class="center">
                        {!! $groups->links() !!}
                    </div> --}}

                </div>
            </div>
        </div>
    </div>

@endsection