<!-- Logo -->
<a href="/" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>SB</b></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Fundação Saúde - Belford Roxo</b></span>
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
	<div class="navbar-custom-menu pull-left">
		<ul class="nav navbar-nav">
			<li><a href="#">
					<b><?=""?></b>
				</a>
			</li>
		</ul>
	</div>

  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <span class="fa fa-user-circle"></span>
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs"><?php echo $this->request->getSession()->read('Auth.User.nome').' '.$this->request->getSession()->read('Auth.User.sobrenome')?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- Menu Footer-->
          <li>
                              <?= $this->Html->link('Perfil', ['controller' => 'Usuarios', 'action' => 'viewPerfil'])?>

            </li>
            <li>
                                <?= $this->Html->link('Sair', ['controller' => 'Usuarios', 'action' => 'logout'])?>

          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
