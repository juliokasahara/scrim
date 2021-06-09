@extends('layouts.app')

@section('content')

    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <input type="hidden" name="idScrim" value="{{ $scrim->id }}"/>
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

                        <div id="result_player"></div>
                                           
                        <button class="btn btn-info">Adicionar</button>

                    {{-- </form> --}}

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/scrim/add_scrim.js') }}" defer></script>
    
@endsection