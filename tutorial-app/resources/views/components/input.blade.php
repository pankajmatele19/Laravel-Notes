<div>
    <div class="form-group">
        <label>{{$label}}</label>
        <input type={{$type}} name={{$name}} id="" class="form-control" placeholder="{{$placeholder}}"  aria-describedby="helpId">
        <span class="text-danger">
          @error('name')
          {{$message}}      
          @enderror
        </span>
      </div>
</div>