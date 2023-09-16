<div class="row">
	<div class="col-lg-12 col-md-12">
		<div class="box box-primary">
			<div class="box-body">
                <?= $this->Form->create($processos, ['class' => 'form-inline', 'url' => ['action' => 'index'], 'type' => 'get']); ?>                    
                    <fieldset>
					<legend><?='Consulta de Unidades'?></legend>                
                        <?= $this->Form->input('campo', ['label' => '', 'options' => ['nome' => 'NOME', 'id' => 'ID' ], 'id' => 'campo_consulta', 'default' => $dadosConsulta->campo]); ?>
                        <?= $this->Form->input('condicao', ['label' => '', 'options' => ['=' => 'Igual', 'like' => 'Contém'], 'default' => $dadosConsulta->condicao]); ?>
                        <?= $this->Form->input('valor', ['label' => '', 'id' => 'valor_consulta', 'default' => $dadosConsulta->valor]); ?>
                        <?= $this->Form->button('', ['class' => ['glyphicon glyphicon-search']]); ?> 
                    </fieldset>              
                <?= $this->Form->end(); ?>
            </div>
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
	<div class='col-md-10'>
		<div class="box">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><?= $this->Paginator->sort('id'); ?></th>
						<th><?= $this->Paginator->sort('nome'); ?></th>
						<th class="actions text-right"><?= 'Ações'; ?></th>
					</tr>
				</thead>
				<tbody>
                <?php foreach ($processos as $processo): ?>
                    <tr>
						<td><?= $processo->id; ?></td>
						<td><?= $processo->nome; ?></td>
						<td>
                               <div class="btn-group pull-right flex">
            							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    							Ações <span class="caret"></span>
                    					</button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                        	<li><?= $this->Html->link('Ver', ['action' => 'view', $processo->id]); ?></li>	
             								<li><?= $this->Html->link('Alterar', ['action' => 'edit', $processo->id]); ?></li>
             								<li><?= $this->Form->postLink('Excluir', ['action' => 'delete', $processo->id], ['confirm' => 'Tem certeza que deseja excluir?']); ?></li>
                            			</ul>
                            	</div>
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
