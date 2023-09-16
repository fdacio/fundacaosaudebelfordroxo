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
                <?= $this->Form->create($recurso) ?>
                <?= $this->Form->hidden('candidatos_id', ['value' => $candidato->id]); ?>
                <fieldset>
                    <legend>Recurso</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->input('inscricao', ['label' => 'Inscrição', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $candidato->id]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->input('cpf', ['label' => 'CPF', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $candidato->cpf]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->input('candidato_nome', ['label' => 'Candidato', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $candidato->nome]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->input('cargo', ['label' => 'Cargo', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $candidato->cargo->nome]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->input('questionamento', ['label' => 'Questionamento ', 'type' => 'textarea', 'required' => false, 'row' => 8]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->input('embasamento_legal', ['label' => 'Embasamento Legal ', 'type' => 'textarea', 'required' => false, 'row' => 8]); ?>
                        </div>
                    </div>

                    <?= $this->Form->button('Registrar', ['class' => ['btn btn-primary btn-block']]); ?>
                    <?= $this->Form->end(); ?>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>