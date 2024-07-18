<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Task</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="{{ asset('style.css') }}">


</head>
<body>
<!-- partial:index.partial.html -->
<nav class="mnb navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <i class="ic fa fa-bars"></i>
      </button>
      <div style="padding: 15px 0;">
         <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
      </div>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">En</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
         
            <li><a href="{{route('logout')}}">Cerrar sesión</a></li>
          </ul>
        </li>
       
      </ul>
     
    </div>
  </div>
</nav>
<!--msb: main sidebar-->
<div class="msb" id="msb">
		<nav class="navbar navbar-default" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<div class="brand-wrapper">
					<!-- Brand -->
					<div class="brand-name-wrapper">
						<a class="navbar-brand" href="{{ route('dashboard') }}">
							ADMINISTRADOR
						</a>
					</div>

				</div>

			</div>

			<!-- Main Menu -->
			<div class="side-menu-container">
				<ul class="nav navbar-nav">

					<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				
								</ul>
							</div>
						</div>
					</li>
					
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>  
</div>
<!--main content wrapper-->
<div class="mcw" >
  <!--navigation here-->
  <!--main content view-->
  <div class="cv">
    <div>
     <div class="inbox">
       <div class="inbox-sb">
         
       </div>
       <div class="inbox-bx container">
         <div class="row">
        
           <div class="col-md-12">
             <table class="table table-stripped table-bordered">
               <tbody>
                <tr>
                <th colspan="7" class="text-center bg-dark">


                <form action="{{ route('buscarTareas') }}" method="POST" class="navbar-form navbar-right">
    @csrf <!-- Agrega el campo CSRF para protección -->

    <div class="form-group">
        <label for="estado">Estado:</label>
        <select class="form-control" id="estado" name="estado">
            <option value="completada">Completada</option>
            <option value="pendiente">Pendiente</option>
            <option value="en progreso">En Progreso</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

         </th>
                </tr>
                <tr>
                <th colspan="7" class="text-center bg-dark">
                <span style="position:relative;top:8px">TASK CREADOS </span>
                <a href="{{route('create')}}" class="btn btn-success pull-right">Agregar</a>
                </th> </tr>
                <tr>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Editar</th>
                <th>Borrar</th>
                </tr>
              
                @foreach ($tasks as $task)
                 <tr>
                   <td>{{ $task->title }}</td>
                   <td>{{ $task->description }}</td>
                   <td style="
    @if($task->status == 'completada')
        background-color: #5cb85c; /* verde */
        color: #fff; /* texto blanco */
    @elseif($task->status == 'en progreso')
        background-color: #337ab7; /* amarillo */
        color: #fff; /* texto negro */
    @elseif($task->status == 'pendiente')
        background-color: #f0ad4e; /* amarillo */
        color: #000; /* texto negro */
    @endif
">{{ $task->status }}</td>
                   <td>{{ $task->due_date }}</td>
                   <td>{{ $task->user->name }}</td>
                  <td> <a href="{{ route('editar', $task->id) }}" class="btn btn-primary">Editar</a></td>
                 <td>  <form action="{{ route('eliminar', $task->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button></td>
                </form>
                 </tr>
                 @endforeach
             </table>
           </div>
         </div>
       </div>
     </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

<script src="{{ asset('script.js') }}"></script>

</body>
</html>
