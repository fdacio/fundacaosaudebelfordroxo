<div class="col-lg-12 col-md-12">
	<div class="col-md-2"></div>
    <div class="box box-primary col-md-8">
        <div class="box-body">
            <?= $this->Form->create($usuarioEntity); ?>
            <?= $this->Form->hidden('pessoas_id'); ?>
            <fieldset>
                <legend><?= "Alterar Dados de Usuário"; ?></legend>
                <div class="form-group">
                    <div class="col-md-6">
                        <?= $this->Form->input('nome', ['label' => 'Nome', 'required' => false, 'type' => 'text']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->input('sobrenome', ['label' => 'Sobrenome', 'required' => false, 'type' => 'text']) ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <?= $this->Form->input('email', ['label' => 'e-Mail' ,'type' => 'text', 'required' => false]) ?>
                    </div>
                </div>

            </fieldset>
            <hr>  
            <?= $this->Form->button('Alterar'); ?>
            <?= $this->Html->link('Voltar', ['action' => 'index'],  ['class' => 'btn btn-success btn-md']); ?>
            <?= $this->Form->end(); ?>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
