<div class="form-row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h2>Prefeitura Municipal de Belford Roxo - RJ</h2>
                <h3>Secretaria de Saúde</h3>
                <h4 class="mt-2">Processo Seletivo</h4>
                <?= $this->Html->link('Início', ['controller' => 'Candidatos', 'action' => 'home'], ['class' => 'float-right']) ?>
            </div>
            <div class="card-body">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create(null) ?>
                <fieldset>
                    <legend>Abrir Recurso</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->input('inscricao', ['label' => 'Inscrição', 'type' => 'text', 'required' => false]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->input('cpf', ['label' => 'CPF', 'type' => 'text', 'required' => false, 'class' => 'cpf']); ?>
                        </div>
                    </div>
                    <?= $this->Form->button('Abrir', ['class' => ['btn btn-primary btn-block']]); ?>
                    <?= $this->Form->end(); ?>
                </fieldset>
            </div>            
        </div>
    </div>
    <div class="col-md-2"></div>
</div>