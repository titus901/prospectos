<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Prospectos</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Prospectos</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="@if(Request::path() === '/') active @endif"><a href="/">Inicio</a></li>
        <li class="@if(Request::path() === 'agragarView') active @endif"><a href="/agragarView">Nuevo Prospecto</a></li>
        <li class="@if(Request::path() === 'listadoView') active @endif"><a href="/listadoView">Prospectos</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>