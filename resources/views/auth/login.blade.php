<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{url('assets/extensions/sweetalert2/sweetalert2.min.css')}}">

    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
      </style>

    <link href="{{ url('/css/signin.css') }}" rel="stylesheet" />

</head>
<body class="text-center">

                <main class="form-signin">
                    <form method="Post"  action="{{ route('login') }}">
                        @csrf
                        <div class="text-center mb-3">
                            <h2>Login CV.Sumber Rezeki</h1>
                        </div>

                    <h3 class="h3 mb-2 fw-normal text-center">Isi Kredensial Anda</h1>

                    <div class="mb-3">
                        <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror" id="username" placeholder="Username">

                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" id="input_password" placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>
                        <input type="submit" value="Masuk" class="btn btn-success form-control" style="border-radius:100px">
                    </form>
            </main>


    <script src="{{url('/assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{url('/assets/js/pages/sweetalert2.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
         $(function(){

                @if(Session::has('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Login!',
                        text: '{{ Session::get("error") }}'
                    })
                }
                @endif
         )
    </script>
</body>
</html>
