<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="box">
			<div class="box-body">
                <?= $this->Form->create($candidatos, ['class' => 'form-inline', 'url' => ['action' => 'index'], 'type' => 'get']); ?>                    
                    <fieldset>
					<legend><?='Consulta de Candidatos'?></legend>                
                        <?= $this->Form->input('campo', ['label' => '', 'options' => ['cpf' => 'CPF', 'nome' => 'NOME', 'id' => 'Inscrição' ], 'id' => 'campo_consulta', 'default' => $dadosConsulta->campo]); ?>
                        <?= $this->Form->input('condicao', ['label' => '', 'options' => ['=' => 'Igual', 'like' => 'Contém'], 'default' => $dadosConsulta->condicao]); ?>
                        <?= $this->Form->input('valor', ['label' => '', 'id' => 'valor_consulta', 'default' => $dadosConsulta->valor]); ?>
						<?= $this->Form->input('cargos_id', ['options' => $cargos, 'label' => false, 'empty' => '[Todos Cargos]', 'default' => $dadosConsulta->cargos_id, 'required' => false]) ?>
						<?= $this->Form->button('', ['class' => ['glyphicon glyphicon-search']]); ?> 
                    </fieldset>              
                <?= $this->Form->end(); ?>
			</div>
			<p><?= $this->Paginator->counter('Total de Registros: {{count}}'); ?></p>
		</div>
	</div>
	<div class="col-md-2">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?= 'Ações'; ?></h3>
			</div>
			<ul class="nav nav-pills nav-stacked">
				<li><?= $this->Html->link('Nova Inscrição', ['action' => 'add']); ?></li>
				<li><?= $this->Html->link('Exportar Todas', ['action' => 'exportaInscricoes']); ?></li>
			</ul>
		</div>
	</div>
	<div class='col-md-10'>
		<div class="box">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><?= $this->Paginator->sort('Candidatos.id', ['label' => 'Inscrição']); ?></th>
						<th><?= $this->Paginator->sort('Candidatos.cpf', ['label' => 'CPF']); ?></th>
						<th width="30%"><?= $this->Paginator->sort('Candidatos.nome', ['label' => 'Nome']); ?></th>
						<th width="30%"><?= $this->Paginator->sort('Candidatos.endereco', ['label' => 'Endereço']); ?></th>
						<th width="20%"><?= $this->Paginator->sort('Candidatos.cargos_id', ['label' => 'Cargo']); ?></th>
						<th width="20%"><?= $this->Paginator->sort('Candidatos.processos_id', ['label' => 'Processo']); ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
                <?php foreach ($candidatos as $candidato): ?>
                    <tr>
						<td><?= $candidato->id; ?></td>
						<td><?= $this->Formatador->formatarCPF($candidato->cpf)?></td>
						<td><?= $candidato->nome; ?></td>
						<td><?= $candidato->endereco_completo; ?></td>
						<td><?= $candidato->cargo->nome; ?></td>
						<td><?= (!empty($candidato->processo)) ? $candidato->processo->nome : 'Não Informado'; ?></td>
						<td class="text-nowrap">
							<?= $this->Html->link('Editar', ['action' => 'edit', $candidato->id], ['class' => 'btn btn-success']); ?></li>	
							<?= $this->Html->link('Ver', ['action' => 'view', $candidato->id], ['class' => 'btn btn-primary']); ?></li>	
                        </td>
					</tr>
                <?php endforeach; ?>
            	</tbody>
			</table>
		</div>
		<div class="paginator text-center">
			<ul class="pagination">
                <?= $this->Paginator->prev('&laquo; Anterior', ['escape' => false]); ?>
                <?= $this->Paginator->numbers(['escape' => false]); ?>
                <?= $this->Paginator->next('Próximo &raquo;', ['escape' => false]); ?>
            </ul>
			<p><?= $this->Paginator->counter('Página {{page}} de {{pages}}<br/> Total de Registros: {{count}}'); ?></p>
		</div>
	</div>
</div>
