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
    <div class="panel-heading">Tarefa</div>
    
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/task/edit') }}">
        
        <div class="form-group">
             <input type="hidden" name="id_user"  value="{{ Auth::user()->id }}" />
        </div>

        <div class="form-group">
                <label class="col-md-4 control-label">Titulo</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="title" value="{{ $task->title }}" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Descrição</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="description"  value="{{ $task->description }}">
                </div>
            </div>

            <div class="form-group">
              <label  class="col-md-4 control-label"  for="sel1">Status</label>
              <select  id="sel1" class="statusTarefa" name="statusTarefa">
                <option value="0">Criada</option>
                <option value="1">Executando</option>
                <option value="2">Finalizada</option>
                </select>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Data Inicial</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="initialDate" placeholder="xx/xx/xxxx" value="{{ $task->initialDate }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Data Final</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="endDate"  placeholder="xx/xx/xxxx" value="{{ $task->endDate }}">
                </div>
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