<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyParkingLotSpot</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCc8X_HhiYzNyW7ArfVuBzqQl6qMQYijGI"></script>
    
<script src="{!! URL::to('/')!!}/js/jquery.min.js"></script>


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Estacionamento</a>

            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> @if(Auth::check())  {{  Auth::user()->name }}  @endif  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=" auth/edit/{{ Auth::user()->id }} "><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                     
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/auth/logout')}}"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> Sobre</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-bar-chart-o" ></i> Estacionamento</a>
                    </li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="alert alert-info alert-dismissible" hidden="true" role="alert" id="alterta">...</div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gerencie sua vaga <!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <title>Document</title>
                            </head>
                            <body>
                                
                            </body>
                            </html>
                        </h1>
                    </div>
                </div>
                <div>
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                 <a  id="botao" class="button"> Indicar Ocupação /</a>
                  <a data-toggle="modal" data-target="#myModal">Cadastrar Veículo</a>
                  <input type="hidden" id="user-id" data-url="{!! URL::route('map.send') !!}" value="{{ Auth::user()->id }}" />
                </div>
                <br>
                <div class="row"  id="googleMap"  style="widows: 10px;00px;height:450px;">
                    
                </div>
                <!-- /.row -->

               
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<div class="modal fade"  id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Cadastro de Veículo</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="#">
        <div class="form-group">
                <label class="col-md-4 control-label">Placa</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="palca" id="palcaVeiculo">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Ano</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="ano" id="anoVeiculo" >
                </div>
            </div>


             <div class="form-group">
              <label  class="col-md-4 control-label"  for="sel1">Marca:</label>
              <select  id="sel1" class="marcaVeiculo" id="marcaVeiculo">
                <option value="0"></option>
                <option value="1">Fiat</option>
                <option value="3">Ford</option>
                <option value="2">Hyundai</option>
            </select>
            </div>

            <div class="form-group">
              <label  class="col-md-4 control-label" for="sel1">Modelo:</label>
              <select  id="sel1" class="modelo"></select>
            </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" id="cadastrarVeiculo">Cadastrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! URL::to('/')!!}/js/bootstrap.min.js"></script>
    <script src="{!! URL::to('/')!!}/js/script/principal.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="{!! URL::to('/')!!}/js/plugins/morris/raphael.min.js"></script>
    <script src="{!! URL::to('/')!!}/js/plugins/morris/morris.min.js"></script>
    <script src="{!! URL::to('/')!!}/js/plugins/morris/morris-data.js"></script>

</body>
</html>
