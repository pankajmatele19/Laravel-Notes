<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <h2> {{ $title }}</h2>
        <form id="regform" method="post">
            <div id="response"></div>

            <span class="text-danger">
                @error('error')
                    {{ $message }}
                @enderror
            </span>
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="enter name">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span><br>
                <label for="email">Email</label>
                <input type="email" name="email" id="" class="form-control" placeholder="enter email">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="enter password">
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span><br>
                <label for="password">Confirm Password</label>
                <input type="password" name="password_confirm" id="" class="form-control"
                    placeholder="retype password">
                <span class="text-danger">
                    @error('password_confirm')
                        {{ $message }}
                    @enderror
                </span>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <span><a href="{{ url('/customer/login') }}">Already Registered Login Here!!</a></span>
        </form>

    </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        < /scriptzzz> <
        script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity = "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin = "anonymous" >
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#regform').on('submit', function(e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "{{ url('/') }}/customer/regform",
                    type: 'POST',
                    data: form_data,
                    success: function(response) {
                        $('#response').html('<div class="alert alert-' + response.status +
                            '">' + response.message + '</div>');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
</body>

</html>
