@extends('layouts.auth')

@section('content')

<style >
  @import url('https://fonts.googleapis.com/css?family=Roboto:400,500');
  * {
    margin:0px;
    padding:0px;
    box-sizing:border-box;
    font-family:"Roboto",sans-serif;
  }
  body {
    background:#e6e6e8;
  }
  .container {
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:700px;
    height:310px;
  }
  .container > div {
    position:absolute;
    width:50%;
    height:100%;
  }
  .container .aside {
    background:rgb(82, 58, 171);
    text-align:center;
    padding:25px 15px;
    color:#eee;
  }
  .container .aside img {
    width:220px;
    height:110px;
  }
  .container .aside h2 {
    margin-top:6px;
    font-size:25px;
    margin-bottom:10px;
    font-weight:500;
  }
  .container .aside p {
    font-size:13px;
  }
  .container .aside .links {
    position:absolute;
    bottom:30px;
    left:20px;
  }
  .container .aside .links div {
    margin:10px;
    font-size:15px;
    cursor:pointer;
    position:relative;
  }
  .container .aside .links div:before {
    content:"";
    width:8px;
    height:8px;
    top:5px;
    position:absolute;
    background:#eee;
    border-radius:50%;
    left:-14px;
  }
  .container .login {
    right:0px;
    padding:45px 30px;
    background:#fff;
  }
  .container .login .form-row {
    margin:12px 0px;
  }
  .container .login label {
    font-size:15px;
    font-weight:500;
  }
  .container .login input {
    width:100%;
    height:30px;
  }
  .container .login .form-row input[type="text"],
  .container .login .form-row input[type="password"] {
    padding-left:5px;
    padding-right:5px;
  }
  .container .login .rem {
    margin:15px 0px;
  }
  .container .login .rem input{
    width:13px;
    height:13px;
  }
  .container .login button {
    width: 100%;
    height: 35px;
    border: 1px solid #714ff1;
    outline: none;
    background: #7e5bff;
    font-size: 15px;
    text-transform: uppercase;
    color: #fff;
    box-shadow: 0px 5px 0px #523aab;
    cursor:pointer;
  }


</style>




<body>      

          
                <div class="col-sm-12">

                </div>
                <div class="col-sm-12 " style="background-color:rgba(0, 0, 0, 0.35); height: 25%; " >
                   

                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <strong>ups!</strong> ocurrio un error en su ingreso<br><br>
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
               
                </div>

                <div class="container">
                  <div class="aside">
                  <img  src="{{ url('img/logoaca_00000.png') }}" />
                    <h2>BIENVENIDO</h2>
                    <p>Centro de Operaciones Regional, del Gobierno Regional Pasco 2018.</p>

                    <div class="links">
                      <div><a style="text-decoration: none;" href="{{ url('/register') }}">
                       Registrarte
                     </a></div>
                    </div>
                  </div>
                  <div class="login">

                    <form method="POST" action="{{ route('login') }}">
                      {{ csrf_field() }}
                      <div class="form-row">
                        <label for="codid">Codigo</label>
                        <input type="text" id="codid" name="codid" value="{{ old('codid') }}" >
                      </div>
                      <div class="form-row">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password"  name="password">
                      </div>
                      <div class="form-row rem">
                        <input type="checkbox" id="rememberme">
                        <label for="rememberme"> Recordarme</label>
                      </div>
                      <div class="form-row">
                        <button type="submit">Iniciar Sesión</button>
                      </div>
                    </form>
                  </div>
                </div>

             
               


    <!-- Enlazamos el js de Bootstrap, y otros plugins que usemos siempre al final antes de cerrar el body -->
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
  </body>

@endsection





