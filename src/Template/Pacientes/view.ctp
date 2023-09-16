<div class="col-lg-2 col-md-3">
	<nav class="box box-body">
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href=""><?= __('Ações') ?></a></li>
			<li><?= $this->Html->link(__('Alterar'), ['action' => 'edit', $aluno->id]) ?> </li>
			<li><?= $this->Html->link(__('Listar'), ['action' => 'index']) ?> </li>	
			<li><?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $aluno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cidadao->id)]) ?> </li>
		</ul>
	</nav>
</div>
<div class="cidadao view col-lg-10 col-md-9">
	<div class="box box-body">
		<h3><?= $aluno->nome ?></h3>
		<table class="table table-striped table-hover">
			<tr>
				<th>Nascimento</th>
				<td><?= $aluno->nascimento->format('d/m/Y') ?>
			</tr>

			<tr>
				<th>Idade</th>
				<td><?= $aluno->idade . " ano(s)"?>
			</tr>

			<tr>
				<th>e-Mail</th>
				<td><?= $aluno->email ?></td>
			</tr>

			<tr>
				<th>Endereço</th>
				<td><?= $aluno->endereco_completo ?></td>
			</tr>

			<tr>
				<th>Telefone</th>
				<td><?= $this->Formatador->formatarTelefone($aluno->telefone) ?></td>
			</tr>
			<tr>
				<th>Celular</th>
				<td><?= $this->Formatador->formatarCelular($aluno->celular) ?></td>
			</tr>
			<tr>
				<th>Whatsapp</th>
				<td><?= $this->Formatador->formatarCelular($aluno->whatsapp) ?></td>
			</tr>
			<tr>
				<th>Criado</th>
				<td><?= $aluno->criado->format('d/m/Y H:i:s') . ' - ' . $aluno->usuario->nome_sobrenome ?>
			</tr>

			<tr>
				<th>Modificado</th>
				<td><?= $aluno->alterado->format('d/m/Y H:i:s') . ' - ' . $aluno->usuario2->nome_sobrenome?>
			</tr>
		</table>

		<div class="related">
        	<?php if (!empty($aluno->matriculas)): ?>
        	<h4>Matrículas</h4>
        	<table class="table table-striped table-hover">
				<tr>
					<th>Data</th>
					<th>Curso</th>
				</tr>
            	<?php foreach ($aluno->matriculas as $matricula): ?>
            	<tr>
					<td><?= h($matricula->data) ?></td>
					<td><?= h($matricula->curso_completo) ?></td>
				</tr>
            	<?php endforeach; ?>
        	</table>
    		<?php endif; ?>
    	</div>
	</div>
</div>