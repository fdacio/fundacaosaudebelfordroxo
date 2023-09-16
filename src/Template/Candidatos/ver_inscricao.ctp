<div class="form-row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-header text-center">
				<h4>Processo Seletivo Fundação Saúde - 2023</h4>
				<h2>Prefeitura Municipal de Belford Roxo - RJ</h2>
			</div>
			<div class="card-body">
				<?= $this->Flash->render() ?>
				<h3>Inscrição</h3>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
				<tr>
					<th>Cargo</th>
						<td><?= $candidato->cargo->nome ?></td>
					</tr>
					<th>Inscrição</th>
						<td><?= $candidato->id ?></td>
					</tr>
					<tr>
						<th>Nome</th>
						<td><?= $candidato->nome; ?></td>
					</tr>
					<tr>
						<th>CPF</th>
						<td><?= $this->Formatador->formatarCPF($candidato->cpf); ?></td>
					</tr>
					<tr>
						<th>Nacimento</th>
						<td><?= $candidato->nascimento; ?></td>
					</tr>
					<tr>
						<th>RG</th>
						<td><?= $candidato->rg; ?></td>
					</tr>
					<tr>
						<th>Endereço</th>
						<td><?= $candidato->endereco_completo; ?></td>
					</tr>
					<tr>
						<th>e-Mail</th>
						<td><?= $candidato->email; ?></td>
					</tr>
					<tr>
						<th>Celular</th>
						<td><?= $this->Formatador->formatarCelular($candidato->celular); ?></td>
					</tr>

					<tr>
						<th>Curso Superior: </th>
						<td> <?= ($candidato->curso_superior) ? 'Não' : 'Sim' ?>
						</td>
					</tr>
					
					<tr>
						<th>Data da Inscrição</th>
						<td><?= $candidato->data_inscricao; ?></td>
					</tr>
					
				</table>
			</div>
		</div>
	</div>
</div>