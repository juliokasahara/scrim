@for ($i = 1;  $i <= $scrim->qt_player; $i++)
    <div class="form-group">                                     
            <label for="player">Player {{$i}}</label>
            <select class="form-control" name="player[{{$i}}]" id="player" required>
                <option></option>
                @foreach ($users as $user) 
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
    </div>  
@endfor
