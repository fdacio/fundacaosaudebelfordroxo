<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="box">
			<div class="box-body">
                <?= $this->Form->create($recursos, ['class' => 'form-inline', 'url' => ['action' => 'index'], 'type' => 'get']); ?>                    
                    <fieldset>
					<legend><?='Consulta de Recursos'?></legend>                
                        <?= $this->Form->input('campo', ['label' => '', 'options' => ['Candidatos.cpf' => 'CPF', 'Candidatos.nome' => 'NOME' ], 'id' => 'campo_consulta', 'default' => $dadosConsulta->campo]); ?>
                        <?= $this->Form->input('condicao', ['label' => '', 'options' => ['=' => 'Igual', 'like' => 'Contém'], 'default' => $dadosConsulta->condicao]); ?>
                        <?= $this->Form->input('valor', ['label' => '', 'id' => 'valor_consulta', 'default' => $dadosConsulta->valor]); ?>
						<?= $this->Form->input('cargos_id', ['options' => $cargos, 'label' => false, 'empty' => '[Todos Cargos]', 'default' => $dadosConsulta->cargos_id, 'required' => false]) ?>
						<?= $this->Form->button('', ['class' => ['glyphicon glyphicon-search']]); ?> 
                    </fieldset>              
                <?= $this->Form->end(); ?>
			</div>
			<div><?= $this->Paginator->counter('Total de Registros: {{count}}'); ?></div>
		</div>
	</div>
	<div class='col-md-12'>
		<div class="box">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><?= $this->Paginator->sort('Recursos.id', ['label' => 'Recurso']); ?></th>
						<th width="20%"><?= $this->Paginator->sort('Recursos.situacao', ['label' => 'Situação']); ?></th>
						<th><?= $this->Paginator->sort('Candidatos.id', ['label' => 'Inscrição']); ?></th>
						<th><?= $this->Paginator->sort('Candidatos.cpf', ['label' => 'CPF']); ?></th>
						<th width="50%"><?= $this->Paginator->sort('Candidatos.nome', ['label' => 'Nome']); ?></th>
						<th width="20%"><?= $this->Paginator->sort('Candidatos.cargos_id', ['label' => 'Cargo']); ?></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
                <?php foreach ($recursos as $recurso): ?>
                    <tr>
						<td><?= $recurso->id; ?></td>
						<td  <?= ($recurso->situacao == 0) ? 'class="text-primary"' : (($recurso->situacao == 1) ? 'class="text-success"' : 'class="text-danger"') ?>><?= $recurso->situacao_texto; ?></td>
						<td><?= $recurso->candidato->id; ?></td>
						<td><?= $this->Formatador->formatarCPF($recurso->candidato->cpf)?></td>
						<td><?= $recurso->candidato->nome; ?></td>
						<td><?= $recurso->candidato->cargo->nome; ?></td>
						<td class="text-nowrap">
							<?= $this->Html->link('Ver', ['action' => 'deferimento', $recurso->id], ['class' => 'btn btn-primary']); ?></li>	
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
