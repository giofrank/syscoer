 @extends('layouts.auth')
  
@section('content')
  <link rel="stylesheet" href="{{ url('css/mycustom.css') }}">
    <link rel="stylesheet" href="{{ url('font-awesome/css/font-awesome.min.css') }}"> <!--Iconos--> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" >
  <body>      
    <div class="mytop-content" >
        <div class="container" > 
          
                <div class="col-sm-12 " style="background-color:rgba(0, 0, 0, 0.35); height: 60px; " >
                   <a class="mybtn-social pull-right" href="{{ url('/register') }}">
                       Register
                  </a>

                  <a class="mybtn-social pull-right" href="{{ url('/login') }}">
                       Login
                       
                  </a>
               
                </div>
            
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                

                     <div class="myform-top">
                        <div class="myform-top-left">
                           <img  src="{{ url('img/logoaca_00000.png') }}" class="" />
                          <h3>Regístrate por primera vez.</h3>
                            <p>Por favor ingresa tus datos personales:</p>
                        </div>
                        <div class="myform-top-right">
                          <i class="fa fa-user"></i>
                        </div>
                      </div>

                  <div class="col-md-12" >
                    @if (count($errors) > 0)
                     
                        <div class="alert alert-danger">
                            <strong>UPPS!</strong> Error al Registrar<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    
                    @endif
                   </div  >

                    <div class="myform-bottom">
                      
                      <form role="form" action="{{ url('/register') }}" method="post" class="">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input type="text" name="codid" placeholder="codigo..." class="form-control"  
                            value="{{ old('codid') }}" />
                        </div>
                     
                        <div class="form-group">
                            <input type="text" name="pid" placeholder="DNI..." class="form-control"  
                            value="{{ old('pid') }}" />
                        </div>



                        <div class="form-group">
                        <input type="password" name="password" placeholder="Password..." class="form-control" >
                        </div>


                         <div class="form-group">
                        <input type="password" name="password_confirmation" placeholder="Password..." class="form-control" >
                        </div>

                        <button type="submit" class="mybtn">Registrarme</button>
                      </form>
                    
                    </div>
              </div>
            </div>

        </div>
      </div>
 
 </body>
@endsection


