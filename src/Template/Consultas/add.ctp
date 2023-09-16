<div class="col-lg-12 col-md-12">
    <div class="box box-primary">
        <div class="box-body">
        <?= $this->Form->create($consulta) ?>
            <fieldset>
            <legend><?= 'Cadastrar Consulta' ?></legend>
            <?= $this->Form->input('paciente', ['label' => 'Paciente', 'type' => 'text', 'required' => false]); ?>     
            </fieldset>
            <hr>
            <?= $this->Form->button('Cadastrar') ?>
            <?= $this->Html->link('Voltar', [ 'action' => 'index' ], ['class' => 'btn btn-success btn-md']); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>        
</div>
 


