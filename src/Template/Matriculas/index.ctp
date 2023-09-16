<div class="row">
	<div class="col-md-12">
		<div class="box box-body ">
    		<?= $this->Form->create($dadosConsulta, ['type' => 'get', 'url' => ['action' => 'index']]); ?>
    		<fieldset>
				<legend>Consulta de Alunos</legend>
				<div class="form-row">
					<div class="col-md-12">
        				<?= $this->Form->input('nome', ['label' => 'Aluno', 'type' => 'text', 'required' => false, 'value' => $dadosConsulta->aluno]) ?>
        			</div>
				</div>
			</fieldset>
			<hr>
    		<?= $this->Form->button('Buscar') ?>
    		<?= $this->Form->end(); ?>
		</div>
	</div>

	<div class="col-md-2">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?= 'Ações'; ?></h3>
			</div>
			<ul class="nav nav-pills nav-stacked">
				<li><?= $this->Html->link('Cadastrar', ['action' => 'add']); ?></li>
			</ul>
		</div>
	</div>
	<div class="col-md-10">
		<div class="box box-body">
			<?= $this->element('total_registros') ?>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><?= $this->Paginator->sort('id', ['label' => 'Matrícula']) ?></th>
						<th><?= $this->Paginator->sort('data', ['label' => 'Data']) ?></th>
						<th><?= $this->Paginator->sort('alunos', ['label' => 'Alunos']) ?></th>
						<th><?= $this->Paginator->sort('cursos_completo', ['label' => 'Curso']) ?></th>
						<th class="actions"><?= __('Ações') ?></th>
					</tr>
				</thead>
				<tbody>
    				<?php foreach ($matriculas as $matricula): ?>
    				<tr>
                        <td><?= $this->Number->format($matricula->id) ?></td>
                        <td><?= $matricula->data->format('d/m/Y') ?></td>
                        <td><?= $matricula->curso_completo ?></td>
                        <td><?= $matricula->aluno->nome?></td>
                        
                        <td class="actions" style="white-space: nowrap">
        	                <?= $this->Html->link(__('Ver'), ['action' => 'view', $matricula->id], ['class'=>'btn btn-default btn-xs']) ?>
                	        <?= $this->Form->postLink(__('Cancela'), ['action' => 'delete', $matricula->id], ['confirm' => __('Tem certeza que deseja excluir # {0}?', $aluno->id), 'class'=>'btn btn-danger btn-xs']) ?>
                		</td>
    				</tr>
    				<?php endforeach; ?>
   				</tbody>
			</table>
	    	<?= $this->element('paginacao') ?>
    	</div>
	</div>
</div>