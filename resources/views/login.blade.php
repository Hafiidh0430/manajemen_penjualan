<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .loginBgTech {
            background-color: #fafafa;
            background-repeat: no-repeat;
            background-size: cover;
            background-blend-mode: luminosity;

            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .headerLogin {
            text-align: center;
            color: #121212;
            font-size: 40px;
        }

        .btn-login {
            width: 100%;
            outline: none;
            border: none;
            background-color: #121212;
            color: #fafafa;
            border-radius: 8rem;
            padding: 8px;
            font-size: 12px;
        }

        .card-body {
            gap: 12px;
            display: flex;
            flex-direction: column;
        }

        .card-shadow {
            border-radius: 12px;
            border: 1px #d4d6dc solid;
            padding: 2rem;
        }
    </style>
</head>

<body class="loginBgTech">
    <div class="row">
        <div class="">
            <div class="card-shadow">
                <div class="card-header">
                    <h2 class="headerLogin">
                         {!! $appTitle !!}
                    </h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="label mb-2">Username</label>
                        <input type="text" class="form-control" name="username" id="userName">
                    </div>
                    <div class="form-group">
                        <label class="label mb-2">Password</label>
                        <input type="password" class="form-control" name="password" id="passWord">
                    </div>
                    <!-- spacer -->
                    <div class="form-group">
                        <button class="btn-login">Sign In to access</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <script type="module">
        $('.btn-login').on('click', function(a) {
            axios.post('{{url("login/check")}}', {
                username: $('#userName').val(),
                password: $('#passWord').val(),
                _token: '{{csrf_token()}}'
            }).then(function(response) {
                console.log(response)
                if (response.data.status === true) {
                    window.location.href = response.data.redirect_url
                } else {
                    Swal.fire('login gagal, Username atau password salah', '', 'error')
                }
            }).catch(function(error) {
                if (error.response.status == 422) {
                    Swal.fire(error.response.data.message, '', 'error')
                } else {
                    Swal.fire('login gagal, Username atau password salah', '', 'error')
                }
            })
        })
    </script>
</footer>

</html>