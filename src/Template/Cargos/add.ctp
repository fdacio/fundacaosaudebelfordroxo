<div class="col-lg-12 col-md-12">
    <div class="box box-primary">
        <div class="box-body">
            <?= $this->Form->create($cargo) ?>
            <fieldset>
                <legend>Cadastro de Cargo</legend>
                <div class="row">
                    <div class="col-md-12">
                    <?= $this->Form->input('processos_id', ['label' => 'Unidade de Saúde', 'id' => 'processo', 'options' => $processos, 'empty' => 'Selecione', 'required' => false]); ?>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-8">
                        <?= $this->Form->input('nome', ['label' => 'Nome', 'type' => 'text', 'required' => false]); ?>
                    </div>
                    <div class="col-md-4">
                        <?= $this->Form->input('ativo', ['label' => 'Ativo', 'options' => [1 => 'Sim', 0 => 'Não'], 'required' => false]); ?>
                    </div>
                </div>
            </fieldset>
            <hr>
            <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>