<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello Laravel {{ $uname  ?? "Guest"}}</h1>

    @if($uname != " ") {{$uname}}
    @else {{"data is empty"}}
    @endif

    @php
    $array = ['pankaj','matele'];
    @endphp
    @foreach($array as $i) 
            <h2>{{$i}}</h2>
    @endforeach

     @for($i=1; $i<=10; $i++)
     <h3>{{$i}}</h3>
     @if($i==5) @break
     @endif
    @endfor

    {{-- @for($i=1; $i<=10; $i++)
     <h3>{{$i}}</h3>
     @if($i==5) @continue
     @endif
    @endfor --}}

    @php
    $i = 1;
    @endphp
    @while($i !=5) {{$i}}
    @php
    $i++;
    @endphp
    @endwhile
    <select>
        @php
    $array = ['pankaj','matele','vinayak'];
    @endphp
        @foreach($array as $key => $name) <option value="{{$key}}">{{$name}}</option>
        @endforeach
    </select>
</body> 
</html>