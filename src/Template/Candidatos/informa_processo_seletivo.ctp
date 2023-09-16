<div class="col-lg-12 col-md-12">
    <div class="box box-primary">
        <div class="box-body">
            <?= $this->Form->create(NULL) ?>
            <fieldset>
                <legend>Informa Processo Seletivo</legend>
                <div class="row">
                    <div class="col-md-2">
                        <?= $this->Form->input('id1', ['label' => 'ID 1', 'type' => 'text', 'required' => false]); ?>
                    </div>
                    <div class="col-md-1 text-center form-group">
                        <label>&nbsp</label>
                        <lable>a</lable>
                    </div>
                    <div class="col-md-2">
                        <?= $this->Form->input('id2', ['label' => 'ID 2', 'type' => 'text', 'required' => false]); ?>
                    </div>
                    <div class="col-md-7">
                        <?= $this->Form->input('processos_id', ['label' => 'Processo Seletivo', 'options' => $processos, 'required' => false]); ?>
                    </div>
                </div>
            </fieldset>
            <hr>
            <?= $this->Form->button('Salvar', ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>