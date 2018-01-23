<?php 
$pathArray = explode('/', Request::path()); 
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Personas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a 
          @if($pathArray[0] === "")
            class="nav-link active" 
          @else
            class="nav-link" 
          @endif
          href="{{url('/')}}" >Home
          </a>
        </li>
        <li class="nav-item">
          <a 
          @if($pathArray[0] === "personas")
            class="nav-link active" 
          @else
            class="nav-link" 
          @endif
          href="{{url('/personas/crear')}}">Personas
        </a>
      </li>
      <li class="nav-item">
        <a 
        @if($pathArray[0] === "localidades")
          class="nav-link active" 
        @else
          class="nav-link" 
        @endif
        href="{{url('/localidades/crear')}}">Localidades
        </a>
      </li>
      <li class="nav-item">
        <a 
        @if($pathArray[0] === "provincias")
          class="nav-link active" 
        @else
          class="nav-link" 
        @endif
        href="{{url('/provincias/crear')}}">Provincias
        </a>
      </li>
      <li class="nav-item">
        <a 
        @if($pathArray[0] === "paises")
          class="nav-link active" 
        @else
          class="nav-link" 
        @endif
        href="{{url('/paises/crear')}}">Paises
        </a>
      </li>
    </ul>
  </div>
</div>
</nav>
