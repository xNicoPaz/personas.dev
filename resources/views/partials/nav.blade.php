<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Personas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <?php 
          $pathArray = explode('/', Request::path()); 
        ?>
          <a class="nav-link" href="{{url('/')}}">Home
            @if($pathArray[0] === "home" || $pathArray[0] === "index" || count($pathArray) === 0)
              <span class="sr-only">(current)</span>  
            @endif
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/personas/crear')}}">Personas
            @if($pathArray[0] === "personas")
              <span class="sr-only">(current)</span>  
            @endif
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/localidades/crear')}}">Localidades
            @if($pathArray[0] === "localidades")
              <span class="sr-only">(current)</span>  
            @endif
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/provincias/crear')}}">Provincias
            @if($pathArray[0] === "provincias")
              <span class="sr-only">(current)</span>  
            @endif
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/paises/crear')}}">Paises
            @if($pathArray[0] === "paises")
              <span class="sr-only">(current)</span>  
            @endif
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
