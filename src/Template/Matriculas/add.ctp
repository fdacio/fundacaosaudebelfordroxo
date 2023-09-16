<div class="col-lg-12 col-md-12">
    <div class="box box-primary">
        <div class="box-body">
    		<?= $this->Form->create($matricula, ['type' => 'file']) ?>
    		<fieldset>
        		<legend><?= 'Cadastrar Matrícula' ?></legend>
        		<div class="row">
    				<div class="col-md-12">
    					<?= $this->Form->input('alunos', ['label' => 'Aluno', 'id' => 'aluno', 'type' => 'text', 'required' => false]) ?>
    					<?= $this->Form->hidden('alunos_id', ['id' => 'alunos_id', 'value' => '']) ?>    					
    				</div>
    			</div>
        		<div class="row">
    				<div class="col-md-12">
                    	<?= $this->Form->input('cursos_id', ['label' => 'Curso', 'options' => $cursos, 'empty' => 'Selecione', 'required' => false]); ?>
                    </div>
               	</div>     

        		<div class="row">
    				<div class="col-md-12">
                    	<?= $this->Form->input('turnos_id', ['label' => 'Turno', 'options' => $turnos, 'empty' => 'Selecione', 'required' => false]); ?>
                    </div>
               	</div>     

        		<div class="row">
    				<div class="col-md-12">
                    	<?= $this->Form->input('turmas_id', ['label' => 'Turma', 'options' => $turmas, 'empty' => 'Selecione', 'required' => false]); ?>
                    </div>
               	</div>     

        		<div class="row">
    				<div class="col-md-12">
                    	<?= $this->Form->input('turmas_id', ['label' => 'Turma', 'options' => $turmas, 'empty' => 'Selecione', 'required' => false]); ?>
                    </div>
               	</div>     

        		<div class="row">
    				<div class="col-md-6">
    					<?= $this->Form->label('Horário'); ?>
                    	<div class="form-inline">
                			<?= $this->Form->input('hora_ini', ['label' => false, 'type' => 'text', 'class' => 'hora', 'required' => false]); ?>
                			a
                			<?= $this->Form->input('hora_fim', ['label' => false, 'type' => 'text', 'class' => 'hora', 'required' => false]); ?>
                    	</div>
                    </div>
                    <div class="clearfix"></div>	
               	</div> 

            	<div class="row">
    				<div class="col-md-12">
    					<?= $this->Form->label('Termo de Responsabilidade'); ?>
                        <?= $this->Form->file('termo', ['id' => 'file-termo']); ?>
                        <br />
                        <?= $this->Form->button('Excluir',  ['type' => 'button', 'id' => 'excluir-termo', 'class' => 'btn btn-default btn-xs']); ?>
                    </div>
				</div>
    		</fieldset>
            <hr>
            <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'btn btn-success']) ?>
            <?= $this->Form->button(__('Cadastrar')) ?>
    		<?= $this->Form->end() ?>
		</div>
	</div>
</div>
