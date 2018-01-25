<?php 
$pathArray = explode('/', Request::path()); 
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-custom fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#"><i class="fa fa-user"></i> Personas</a>
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
          href="{{url('/')}}" >
          <i class="fa fa-home"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a 
          @if($pathArray[0] === "personas")
            class="nav-link active" 
          @else
            class="nav-link" 
          @endif
          href="{{url('/personas/crear')}}">
          <i class="fa fa-user"></i> Personas
        </a>
      </li>
      <li class="nav-item">
        <a 
        @if($pathArray[0] === "localidades")
          class="nav-link active" 
        @else
          class="nav-link" 
        @endif
        href="{{url('/localidades/crear')}}">
        <i class="fa fa-map-marker"></i> Localidades
        </a>
      </li>
      <li class="nav-item">
        <a 
        @if($pathArray[0] === "provincias")
          class="nav-link active" 
        @else
          class="nav-link" 
        @endif
        href="{{url('/provincias/crear')}}">
        <i class="fa fa-flag"></i> Provincias
        </a>
      </li>
      <li class="nav-item">
        <a 
        @if($pathArray[0] === "paises")
          class="nav-link active" 
        @else
          class="nav-link" 
        @endif
        href="{{url('/paises/crear')}}">
        <i class="fa fa-globe"></i> Paises
        </a>
      </li>
    </ul>
  </div>
</div>
</nav>
