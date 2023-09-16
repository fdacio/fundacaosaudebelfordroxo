<div class="form-row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
        <div class="card-header text-center">
                <h2>Prefeitura Municipal de Belford Roxo - RJ</h2>
                <h4 class="mt-2">Recadastramento de Médicos da Prefeitura de Belford Roxo</h4>
                <h4 class="mt-2">Recadastramento</h4>
            </div>
            <div class="card-body">
                <?= $this->Flash->render() ?>
                <div class="row">
                     <div class="col-md-3"></div>
                     <div class="col-md-6 text-center">
                        <ul class="nav d-block">
                            <li class="nav-item"> <?= $this->Html->link('<i class="fa fa-edit" style="font-size: 72px"></i><h5>Recadastramento de Médico</h5>', ['controller' => 'Medicos', 'action' => 'cadastro'], ['class' => 'nav-link', 'escape' => false]) ?></li>
                            <li class="nav-item"> <?= $this->Html->link('<i class="fa fa-search" style="font-size: 72px"></i><h5>Consulta de Cadastro de Médico</h5>', ['controller' => 'Medicos', 'action' => 'consulta'], ['class' => 'nav-link', 'escape' => false]) ?></li>
                        </ul>    
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>