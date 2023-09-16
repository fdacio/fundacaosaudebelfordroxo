<div class="row">
	<div class="col-lg-10 col-md-9">
		<div class="box box-primary">
			<div class="box-header with-border">
				<?= 'Unidade' ?>
			</div>
			<div class="box-body">
				<table class="table table-striped table-hover">
					<tr>
						<th>Nome</th>
						<td><?= $processo->nome; ?></td>
					</tr>
					<tr>
						<th>Id</th>
						<td><?= $processo->id; ?></td>
					</tr>
					<tr>
						<th>Criado</th>
						<td><?= $processo->criado; ?>
					
					</tr>
					<tr>
						<th>Alterado</th>
						<td><?= $processo->alterado; ?>
					
					</tr>
					<tr>
						<th>Status</th>
						<td><?= $processo->status ? 'Ativo' : 'Inativo'; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>	