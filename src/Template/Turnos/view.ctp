<div class="row">
	<div class="col-lg-10 col-md-9">
		<div class="box box-primary">
			<div class="box-header with-border">
				<?= 'Turno' ?>
			</div>
			<div class="box-body">
				<table class="table table-striped table-hover">
					<tr>
						<th>Nome</th>
						<td><?= $turno->nome; ?></td>
					</tr>
					<tr>
						<th>Id</th>
						<td><?= $turno->id; ?></td>
					</tr>
					<tr>
						<th>Criado</th>
						<td><?= $turno->criado; ?>
					
					</tr>
					<tr>
						<th>Alterado</th>
						<td><?= $turno->alterado; ?>
					
					</tr>
					<tr>
						<th>Status</th>
						<td><?= $turno->status ? 'Ativo' : 'Inativo'; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>	