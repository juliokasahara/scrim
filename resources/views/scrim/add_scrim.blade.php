@extends('layouts.app')

@section('content')

    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
{{--                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('grupo') }}">Grupo</a></li>
                        <li class="breadcrumb-item active">Adicionar</li>
                    </ol> --}}
                </nav>
                <div class="card-body">
                    <div class="form-group">
                        <h1>{{ $scrim->nome }}</h1>
                    </div>
                  {{--   <form action="{{ route('grupo.salvar') }}" method="post"> --}}
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="time">Time</label>
                            <select class="form-control form-control-lg" name="time" id="time">
                                @foreach ($groups as $group)                                    
                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-info">Adicionar</button>

                    {{-- </form> --}}

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/scrim/add_scrim.js') }}" defer></script>
    
@endsection