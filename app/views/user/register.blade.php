<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico">
    
    <title>@yield('title','Nova Conta')</title>


    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">


  </head>

<div class="panel panel-default">
    <div class="panel-heading">Nova Conta</div>
    <div class="panel-body">

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
            <input type="hidden" name="_token" value="">

            <div class="form-group">
                <label class="col-md-4 control-label">Nome</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail </label>
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
                <label class="col-md-4 control-label">Confirme Senha</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary" id="botao">
                        Salvar
                    </button>
                </div>
            </div>
        </form>
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