<!doctype html>
<html lang="en">

<head>
    <title>Login Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
        $(document).ready(function() {
            $('#login').on('submit', function(e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "{{ url('/') }}/customer/login",
                    type: 'POST',
                    data: form_data,
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>

</head>

<body>
    {{-- <pre>
        @php
            print_r($errors->all());
        @endphp
      </pre> --}}
    <div class="container">
        <h2>Customer Login</h2>
        <form id="login" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="" class="form-control" placeholder="enter email"
                    aria-describedby="helpId">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="enter password"
                    aria-describedby="helpId">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
                <label for="password">Confirm Password</label>
                <input type="password" name="password_confirm" id="" class="form-control"
                    placeholder="enter password again" aria-describedby="helpId">
                <span class="text-danger">
                    @error('password_confirm')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
