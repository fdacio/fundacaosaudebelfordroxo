<section class="sidebar">
  <ul class="sidebar-menu">
    <li class="header">MENU</li>

    <li class="treeview">
      <?= $this->Html->link("<i class=\"fa fa-home\"></i><span>Início</span>", ['controller' => 'Index', 'action' => 'index'], ['escape' => false]) ?>
    </li>

    <li class="treeview">
      <a href="#"><i class="fa fa-file"></i> <span>Cadastros</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
      <li><?= $this->Html->link('Unidades', ['controller' => 'Unidades', 'action' => 'index']) ?></li>  
      <li><?= $this->Html->link('Cargos', ['controller' => 'Cargos', 'action' => 'index']) ?></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-users"></i> <span>Candidatos</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><?= $this->Html->link('Inscrições', ['controller' => 'Candidatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Recursos', ['controller' => 'Recursos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Informa Processo Seletivo', ['controller' => 'Candidatos', 'action' => 'informaProcessoSeletivo']) ?></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#"><i class="fa fa-users"></i> <span>Pacientes</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><?= $this->Html->link('Cadastrar', ['controller' => 'Pacientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link('Consultar', ['controller' => 'Pacientes', 'action' => 'index']) ?></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#"><i class="fa fa-briefcase"></i> <span>Consultas</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><?= $this->Html->link('Cadastrar', ['controller' => 'Consultas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link('Consultar', ['controller' => 'Consultas', 'action' => 'index']) ?></li>
      </ul>
    </li>



    <li class="treeview">
      <a href="#"><i class="fa fa-users"></i> <span>Usuários</span> <i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
        <li><?= $this->Html->link('Cadastrar', ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link('Consultar', ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
      </ul>
    </li>

    <li class="treeview">
      <?= $this->Html->link("<i class=\"fa fa-file-text\"></i><span>Fichas de Consultas</span>", ['controller' => 'Consultas', 'action' => 'fichasConsultas'], ['escape' => false]) ?>
    </li>

  </ul>
</section>