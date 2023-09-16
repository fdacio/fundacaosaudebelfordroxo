<div class="form-row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="card">
			<div class="card-body">
				<?= $this->Flash->render() ?>
				<h3>Inscrição</h3>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
				<tr>
						<th>Processo Seletivo</th>
						<td><?= $candidato->processo->nome ?></td>
					</tr>
				<tr>
						<th>Cargo</th>
						<td><?= $candidato->cargo->nome ?></td>
					</tr>
					<tr>
						<th>Inscrição</th>
						<td><?= $candidato->id ?></td>
					</tr>
					<tr>
						<th>CPF</th>
						<td><?= $this->Formatador->formatarCPF($candidato->cpf); ?></td>
					</tr>
					<tr>
						<th>Nome</th>
						<td><?= $candidato->nome; ?></td>
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
						<td> <?= ($candidato->curso_superior) ? 'Sim' : 'Não' ?>
						</td>
					</tr>
					<tr>
						<th>Data da Inscrição</th>
						<td><?= $candidato->data_inscricao; ?></td>
					</tr>
					<tr>
						<th>Anexos: </th>
						<td>
							<?php foreach ($candidato->anexos as $anexo) : ?>
								<div><?= $this->Html->link($anexo->nome, '/' . $anexo->arquivo, ['target' => '_blank']) ?></div>
							<?php endforeach ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
