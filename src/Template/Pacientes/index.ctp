<div class="row">
	<div class="col-md-12">
		<div class="box box-body ">
    		<?= $this->Form->create($dadosConsulta, ['type' => 'get', 'url' => ['action' => 'index']]); ?>
    		<fieldset>
				<legend>Consulta de Pacientes</legend>
				<div class="form-row">

					<div class="col-md-12">
        				<?= $this->Form->input('nome', ['label' => 'Nome', 'type' => 'text', 'required' => false, 'value' => $dadosConsulta->nome]) ?>
        			</div>

				</div>
				<div class="form-row">
					<div class="col-md-6">
        				<?= $this->Form->input('endereco', ['label' => 'Endereço', 'type' => 'text', 'required' => false, 'value' => $dadosConsulta->endereco]) ?>
        			</div>
					<div class="col-md-6">
        				<?= $this->Form->input('bairro', ['label' => 'Bairro', 'type' => 'text', 'required' => false, 'value' => $dadosConsulta->bairro]) ?>
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
						<th><?= $this->Paginator->sort('id') ?></th>
						<th><?= $this->Paginator->sort('nome') ?></th>
						<th><?= $this->Paginator->sort('nascimento', 'Nascimento') ?></th>
						<th><?= $this->Paginator->sort('celular') ?></th>
						<th class="actions"><?= __('Ações') ?></th>
					</tr>
				</thead>
				<tbody>
    				<?php foreach ($pacientes as $paciente): ?>
    				<tr>
                        <td><?= $this->Number->format($paciente->id) ?></td>
                        <td><?= $paciente->nome ?></td>
                        <td><?= $paciente->nascimento?></td>
                        <td><?= $this->Formatador->formatarCelular($paciente->celular) ?></td>
                        <td class="actions" style="white-space: nowrap">
        	                <?= $this->Html->link(__('Ver'), ['action' => 'view', $paciente->id], ['class'=>'btn btn-default btn-xs']) ?>
            	            <?= $this->Html->link(__('Alterar'), ['action' => 'edit', $paciente->id], ['class'=>'btn btn-primary btn-xs']) ?>
                	        <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $paciente->id], ['confirm' => __('Tem certeza que deseja excluir # {0}?', $aluno->id), 'class'=>'btn btn-danger btn-xs']) ?>
                		</td>
    				</tr>
    				<?php endforeach; ?>
   				</tbody>
			</table>
	    	<?= $this->element('paginacao') ?>
    	</div>
	</div>
</div>