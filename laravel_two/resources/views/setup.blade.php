@extends('layouts.app')
@section('content')
    <p><a class="btn btn-lg btn-success" href="/author" role="button">Об авторе</a>
    <a class="btn btn-lg btn-success" href="/xesog" role="button">xesog</a></p>
    <link rel="stylesheet" href="../../../css/setup.css">

    <div class="container">


        <input type="text" name="name" id="name" placeholder="Полное имя" class="form-control"/><br>
        <input type="text" name="login" id="login" placeholder="Login" class="form-control"/><br>
        <input type="text" name="password" id="password" placeholder="Пароль" class="form-control"/><br>
        <input type="text" name="password_repeat" id="password_repeat" placeholder="Повторите пароль" class="form-control"/><br>
        <input type="hidden" name="_token" id='_token' value="{{ csrf_token() }}">
        <button class="btn btn-lg btn-primary btn-block" id='sub' >Добавить в базу</button>



    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>



            $(document).ready(function() {
                $('#sub').click(function() {

                    var name = $('#name').val();
                    var login = $('#login').val();
                    var password = $('#password').val();
                    var password_repeat = $('#password_repeat').val();
                    var _token = $('#_token').val();

                   // var _token = $('#_token').val();
                   // console.log(name);
                    if (password != password_repeat)
                    {
                        var string = "<center><h1>Вы ввели разные пароли</h1></center><script>$('h1').fadeOut(500);";
                        $('body').append(string);
                    }
                    else if( (name !='') && (login != '') )
                    {
                        $.post(
                                "/setin", {"name":name,
                                            "login":login,
                                            "password": password,
                                            "_token":_token}
                        )
                                .done(function (msg) {
                                    var string = "<center><h1>Запись добавлена</h1></center><script>$('h1').fadeOut(700);";
                                    $('body').append(string);
                                    $('#name').val('');
                                    $('#login').val('');
                                    $('#password').val('');
                                    $('#password_repeat').val('');
                        console.log(msg);
                    })
                                .fail(function(msg) {
                        var string = "<center><h1>Запись уже существует</h1></center><script>$('h1').fadeOut(700);";
                        $('body').append(string);
                    })
                    }
                });


            })
    </script>
@endsection
