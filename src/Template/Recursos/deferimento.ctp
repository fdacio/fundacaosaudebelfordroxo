<div class="form-row">
    <div class="box">
        <div class="box-body">
            <?= $this->Flash->render() ?>
            <?= $this->Form->create($recurso) ?>
            <?= $this->Form->hidden('id', ['value' => $recurso->id]); ?>
            <fieldset>
                <legend>Recurso</legend>
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->input('inscricao', ['label' => 'Inscrição', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $recurso->candidato->id]); ?>
                    </div>
                    <div class="col-md-6">
                        <?= $this->Form->input('cpf', ['label' => 'CPF', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $recurso->candidato->cpf]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->input('candidato', ['label' => 'Candidato', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $recurso->candidato->nome]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->input('cargo', ['label' => 'Cargo', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $recurso->candidato->cargo->nome]); ?>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12 form-group">
                        <label>Anexos</label>
                        <?php foreach ($recurso->candidato->anexos as $anexo) : ?>
                            <div class="border"><?= $this->Html->link($anexo->nome, '/' . $anexo->arquivo, ['target' => '_blank']) ?></div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->input('questionamento', ['label' => 'Questionamento ', 'type' => 'textarea', 'required' => false, 'row' => 8, 'readonly' => true, 'value' => $recurso->questinamento]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->input('embasamento_legal', ['label' => 'Embasamento Legal ', 'type' => 'textarea', 'required' => false, 'row' => 8, 'readonly' => true, 'value' => $recurso->questinamento]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->input('situacao', ['label' => 'Deferimento', 'options' => [1 => 'Recurso DEFERIDO', 2 => 'Recurso INDEFERIDO'], 'required' => false, 'empty' => 'Selecione', 'default' => 0]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Form->input('justificativa', ['label' => 'Justificativa', 'type' => 'textarea', 'required' => false, 'row' => 8]); ?>
                    </div>
                </div>
                <?= $this->Form->button('Registrar', ['class' => ['btn btn-primary btn-block']]); ?>
                <?= $this->Form->end(); ?>
            </fieldset>
        </div>
    </div>
</div>