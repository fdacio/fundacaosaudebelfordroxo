<div class="col-lg-12 col-md-12">
    <div class="box box-body">
        <?= $this->Form->create($usuario); ?>
        <fieldset>
            <legend>Alteração de Senha</legend>
            <div class="form-group row">
                <div class="col-md-6">
                    <?= $this->Form->input('senha', ['label' => 'Nova Senha', 'type' => 'password', 'required' => false, 'value' => '']) ?>
                </div>
                <div class="col-md-6">
                    <?= $this->Form->input('confirmacao_senha', ['label' => 'Confirmar Nova Senha', 'type' => 'password', 'required' => false]) ?>
                </div>
            </div>
        </fieldset>
        <hr>
        <?= $this->Form->button('Alterar'); ?>
        <?= $this->Form->end(); ?>
    </div>
</div>
