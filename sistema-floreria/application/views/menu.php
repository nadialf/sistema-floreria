<header>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">El Girasol</a>      
      </div>
      
      <div id="navbar" class="collapse navbar-collapse">
      <?php $activa = $this->uri->segment(2); ?>
        <ul class="nav navbar-nav">        
          
          <li>
            <a href="<?=base_url()?>">
              <span class="glyphicon glyphicon-home"></span>&nbsp;Inicio
            </a>
          </li>
          
          <li>
            <a>
              <span class="glyphicon glyphicon-plus"></span>&nbsp;Empleados
            </a>
          </li>          
          
          <li>
            <a>
              <span class="glyphicon glyphicon-plus"></span>&nbsp;Clientes
            </a>
          </li>

          <li>
            <a>
              <span class="glyphicon glyphicon-plus"></span>&nbsp;Proveedores
            </a>
          </li>

          <li>
            <a>
              <span class="glyphicon glyphicon-th-large"></span>&nbsp;Flores
            </a>
          </li>
          
          <li>
            <a>
              <span class="glyphicon glyphicon-th-large"></span>&nbsp;Compras
            </a>
          </li>

          <li>
            <a>
              <span class="glyphicon glyphicon-search"></span>&nbsp;Reportes
            </a> 
          </li>
          
          <li>
            <a href="<?=base_url()?>index.php/auth/logout">
              <span class="glyphicon glyphicon-remove-sign"></span>&nbsp;Salir
            </a>
          </li>
        
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
</header>