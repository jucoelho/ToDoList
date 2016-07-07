<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico">
    
    <title>@yield('title','Login')</title>


    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/login.css')}}" rel="stylesheet">


  </head>

  <body>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">Perfil</div>
    
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label">Nome</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name"  value="{{ $user->name}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email"  value="{{ $user->email}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label"> Nova Senha</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password" >
                </div>
            </div>

               <div class="form-group">
                <label class="col-md-4 control-label">Confirmar Nova Senha</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="confirmPassword" >
                </div>
            </div>
        <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="/user/delete/{{ Auth::user()->id }}">Excluir</a>
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