<div class="col-lg-12 col-md-12">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="box">
        <div class="box-body">
            <?= $this->Flash->render() ?>
            <?= $this->Form->create($usuarioEntity); ?>
            <fieldset>
                <legend><?= "Cadastro de Usuário"; ?></legend>
                <div class="form-row">
                    <div class="col-md-6">
                        <?= $this->Form->control('nome', ['label' => 'Nome', 'type' => 'text', 'required' => false]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('sobrenome', ['label' => 'Sobrenome', 'type' => 'text', 'required' => false]) ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12">
                        <?= $this->Form->input('role', ['label' => 'Tipo','options' => \App\Model\Entity\Usuario::TIPOS_USUARIOS, 'empty' => 'Selecione']) ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12">
                        <?= $this->Form->control('email', ['label' => 'e-Mail', 'type' => 'text', 'required' => false]) ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <?= $this->Form->control('senha', ['type' => 'password', 'label' => 'Senha', 'required' => false]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->control('confirmacao_senha', ['type' => 'password', 'label' => 'Confirmação da senha', 'required' => false]) ?>
                    </div>
                </div>
            </fieldset>
            <hr>  
            <?= $this->Form->button('Cadastrar'); ?>
            <?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-success btn-md']); ?>
            <?= $this->Form->end(); ?>
        </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
