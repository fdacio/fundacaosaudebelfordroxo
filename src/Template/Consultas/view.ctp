<div class="row">
	<div class="col-lg-10 col-md-9">
		<div class="box box-primary">
			<div class="box-header with-border">
				<?= 'Curso' ?>
			</div>
			<div class="box-body">
				<table class="table table-striped table-hover">
					<tr>
						<th>Nome</th>
						<td><?= $curso->nome; ?></td>
					</tr>
					<tr>
						<th>Id</th>
						<td><?= $curso->id; ?></td>
					</tr>
					<tr>
						<th>Criado</th>
						<td><?= $curso->criado; ?>
					
					</tr>
					<tr>
						<th>Alterado</th>
						<td><?= $curso->alterado; ?>
					
					</tr>
					<tr>
						<th>Status</th>
						<td><?= $curso->status ? 'Ativo' : 'Inativo'; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>	