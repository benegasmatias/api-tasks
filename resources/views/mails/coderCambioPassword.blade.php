    @include('mails._header')
    @yield('content')

    <div style="font-size:26px;font-weight:600;letter-spacing:0.5px;color:#434343;line-height:130%;font-family:'Nunito Sans',sans-serif!important">
    Recuperar Contraseña
    </div>
    <br>
    <div style="font-size:16px;color:#6d6a6a;letter-spacing:0.5px;line-height:160%;text-align:justify;font-weight:300;font-family:'Nunito Sans',sans-serif!important">
        <p style="margin-bottom:1em">
        Hola {{$user->name}} {{$user->last_name}}
        <br>
        Solicitaste restablecer tu contraseña, utiliza el siguiente código para restablecerla.
        <br>
        Tu código de recuperación es: <b>{{$resetPass->token}}<b>
        <br>
        En caso de que no hayas solicitado restablecer tu contraseña, ignora este e-mail. Tu contraseña no sufrirá ningún cambio.
        </p>
    </div>

    @include('mails._footer')