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
    <script>
        $(document).ready(function() {
            $(document).on('submit', '#update', function(e) {
                e.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "{{ url('/customer/update') }}",
                    type: 'POST',
                    data: form_data,
                    success: function(response) {
                        console.log(response);
                    }
                });
            });

        })
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{ url('/customer/view') }}">Customer Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/customer/view') }}">View <span
                            class="sr-only">(current)</span></a>
                </li>

            </ul>
            <a class="nav-item" href="{{ url('/customer/regform') }}"><button
                    class="btn btn-primary my-2 my-sm-0">Register</button></a>
            <a class="nav-item" href="{{ url('/customer/login') }}"><button
                    class="btn btn-success my-2 my-sm-0">Login</button></a>
        </div>
    </nav>
    <br>
    <div class="container">
        <a href="{{ url('/customer/regform') }}"><button class="btn btn-success">Add</button></a><br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Customer Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $cust)
                    <tr>
                        <td scope="row">{{ $cust->id }}</td>
                        <td>{{ $cust->name }}</td>
                        <td>{{ $cust->email }}</td>
                        <td>{{ $cust->password }}</td>
                        <td>
                            @if ($cust->gender == 'M')
                                Male
                            @elseif($cust->gender == 'F')
                                Female
                            @else
                                Other
                            @endif
                        </td>
                        <td>
                            {{-- <td><a href="{{ url('/customer/edit') }}/{{ $cust->id }}"><button
                                    class="btn btn-primary">Edit</button></a> --}}
                            {{-- <a href="{{ url('/customer/delete') }}/{{ $cust->id }}"><button
                                    class="btn btn-danger">Delete</button></a> --}}

                            <button type="button" class="btn btn-primary " data-toggle="modal"
                                data-target="#ModalLoginForm-{{ $cust->id }}">
                                Edit
                            </button>
                            <!-- Modal HTML Markup -->
                            <div id="ModalLoginForm-{{ $cust->id }}" class="modal fade">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title">Update Customer</h1>
                                        </div>
                                        <div class="modal-body">

                                            <form role="form" method="POST" id="update-{{ $cust->id }}" action="">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$cust->id}}">
                                                <div class="form-group">
                                                    <label class="control-label">Username</label>
                                                    <div>
                                                        <input type="text" class="form-control input-lg"
                                                            name="name" value="{{ $cust->name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">E-Mail Address</label>
                                                    <div>
                                                        <input type="email" class="form-control input-lg"
                                                            name="email" value="{{ $cust->email }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <div>
                                                        <input type="password" class="form-control input-lg"
                                                            name="password" value="{{ $cust->password }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Password</label>
                                                    <div>
                                                        <input type="radio" class="form-radio" name="gender"
                                                            value="M" {{ $cust->gender == 'M' ? 'checked' : '' }}>
                                                        <label for="Male">Male</label>
                                                        <input type="radio" class="form-radio" name="gender"
                                                            value="F" {{ $cust->gender == 'F' ? 'checked' : '' }}>
                                                        <label for="Female">Female</label>
                                                        <input type="radio" class="form-radio" name="gender"
                                                            value="O" {{ $cust->gender == 'O' ? 'checked' : '' }}>
                                                        <label for="Other">Other</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-success">
                                                            Update
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->


                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal-{{ $cust->id }}">
                                Delete
                            </button>
                        </td>
                        <div class="modal fade" id="exampleModal-{{ $cust->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure ?</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        you want to delete this record
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <a href="{{ url('/customer/delete') }}/{{ $cust->id }}"><button
                                                type="button" class="btn btn-primary">Confirm</button></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
