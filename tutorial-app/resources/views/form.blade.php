<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <form action="{{url('/')}}/register" method="post">
      @csrf
      {{-- <div class="form-group">
      <input type="text" name="name" placeholder="enter name" label="username"/>
      </div>
      <div class="form-group">
        <x-input type="email" name="email" placeholder="enter email" label="email"/>
        </div>
        <div class="form-group">
          <x-input type="password" name="pass" placeholder="enter password" label="password"/>
          </div>
          <div class="form-group">
            <x-input type="password" name="password_confirm" placeholder="confirm password" label="confirm password"/>
            </div> --}}
              
       <pre>
        @php
            print_r($errors -> all());
        @endphp
      </pre>
      <div class="form-group">
        <label for="Username">Username</label>
        <input type="text" name="name" id="" class="form-control" placeholder="enter username" aria-describedby="helpId">
        <span class="text-danger">
          @error('name')
          {{$message}}
          @enderror
        </span>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="pass" id="" class="form-control" placeholder="enter password" aria-describedby="helpId">
        <span class="text-danger">
          @error('pass')
            {{$message}}
          @enderror
        </span>
      </div>
      <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" name="password_confirm" id="" class="form-control" placeholder="enter password" aria-describedby="helpId">
        <span class="text-danger">
          @error('password_confirm')
            {{$message}}
          @enderror
        </span>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="" class="form-control" placeholder="enter email" aria-describedby="helpId">    
        <span class="text-danger">
          @error('email')
            {{$message}}  
          @enderror
        </span>
      </div>
      
      <button class="btn btn-primary">Submit</button>
    </form>
  </div>  
  </body>
</html>