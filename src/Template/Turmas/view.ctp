<div class="row">
	<div class="col-lg-10 col-md-9">
		<div class="box box-primary">
			<div class="box-header with-border">
				<?= 'Turma' ?>
			</div>
			<div class="box-body">
				<table class="table table-striped table-hover">
					<tr>
						<th>Nome</th>
						<td><?= $turma->nome; ?></td>
					</tr>
					<tr>
						<th>Id</th>
						<td><?= $turma->id; ?></td>
					</tr>
					<tr>
						<th>Criado</th>
						<td><?= $turma->criado; ?>
					
					</tr>
					<tr>
						<th>Alterado</th>
						<td><?= $turma->alterado; ?>
					
					</tr>
					<tr>
						<th>Status</th>
						<td><?= $turma->status ? 'Ativo' : 'Inativo'; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>	