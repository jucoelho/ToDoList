<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico">
    
    <title>@yield('title','Login')</title>


    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="{{ asset('/css/login.css')}}" rel="stylesheet">


  </head>

  <body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ url('/') }}">Inicial</a></li>
            <li> <a class="btn btn-link" href="{{ url('user/register') }}">Criar Conta </a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      </nav>

<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">Login</div>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Senha</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            
                            <input type="checkbox" name="remember"> Lembre-me
                            
                             
                        </label>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    
                        
                     <a class="btn btn-link" href="">Esqueci minha senha</a>
                    
                    
                    

                </div>
            </div>
        </form>
    </div>
</div>
</div>
@section('scripts')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script >
        var laravel_token ='{{ csrf_token() }}';
    </script>
    <script src="/js/restfulizer.js"></script>
@show
  </body>
</html>