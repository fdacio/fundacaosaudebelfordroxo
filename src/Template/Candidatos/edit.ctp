<div class="box box-primary">
	<div class="box-body">
		<?= $this->Flash->render() ?>
		<?= $this->Form->create($candidato, ['type' => 'file', 'id' => 'form-inscricao']) ?>
		<fieldset>
			<legend>Cadastro de Candidato</legend>
			<div class="row">
				<div class="col-md-12">
					<?= $this->Form->input('processos_id', ['label' => 'Unidade de Saúde', 'id' => 'cargo', 'options' => $processos, 'empty' => 'Selecione', 'required' => false]); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<?= $this->Form->input('novo_id', ['label' => 'Inscrição', 'id' => 'novo_id', 'type' => 'text', 'required' => false, 'value' => $candidato->id]); ?>
					<?= $this->Form->input('antigo_id', ['id' => 'antigo_id', 'type' => 'hidden', 'value' => $candidato->id]); ?>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<label>&nbsp;</label>
						<button type="button" id="update-inscricao" class="btn btn-default form-control"><i class="fa fa-check"></i></button>
					</div>
				</div>

				<div class="col-md-9">
					<?= $this->Form->input('cargos_id', ['label' => 'Cargo', 'id' => 'cargo', 'options' => $cargos, 'empty' => 'Selecione', 'required' => false]); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<?= $this->Form->input('curso_superior', ['label' => 'Curso Superior', 'options' => [1 => 'Sim', 2 => 'Não'], 'empty' => 'Selecione', 'required' => false]) ?>
				</div>
				<div class="col-md-6">
					<?= $this->Form->input('profissao', ['label' => 'Profissão', 'type' => 'text', 'required' => false]); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?= $this->Form->input('cpf', ['label' => 'CPF', 'id' => 'cpf', 'type' => 'text', 'class' => 'cpf', 'required' => false]); ?>
				</div>
				<div class="col-md-7">
					<?= $this->Form->input('nome', ['label' => 'Nome', 'type' => 'text', 'required' => false]); ?>
				</div>
				<div class="col-md-2">
					<?= $this->Form->input('nascimento', ['label' => 'Nascimento', 'id' => 'nascimento', 'type' => 'text', 'class' => 'data', 'label' => 'Nascimento', 'required' => false]); ?>
				</div>

			</div>
			<div class="row">
				<div class="col-md-4">
					<?= $this->Form->input('rg', ['label' => 'RG', 'type' => 'text', 'required' => false]); ?>
				</div>
				<div class="col-md-4">
					<?= $this->Form->input('titulo', ['label' => 'Título de Eleitor', 'type' => 'text', 'required' => false]); ?>
				</div>
				<div class="col-md-2">
					<?= $this->Form->input('zona', ['label' => 'zona', 'type' => 'text', 'required' => false]); ?>
				</div>
				<div class="col-md-2">
					<?= $this->Form->input('secao', ['label' => 'secao', 'type' => 'text', 'required' => false]); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?= $this->Form->input('cep', ['label' => 'CEP', 'id' => 'cep', 'type' => 'text', 'class' => 'cep', 'required' => false]); ?>
				</div>
				<div class="col-md-6">
					<?= $this->Form->input('endereco', ['label' => 'Endereço', 'type' => 'text', 'required' => false]); ?>
				</div>
				<div class="col-md-3">
					<?= $this->Form->input('numero', ['label' => 'Número', 'type' => 'text', 'required' => false]); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<?= $this->Form->input('complemento', ['label' => 'Complemento', 'type' => 'text', 'required' => false]); ?>
				</div>
				<div class="col-md-6">
					<?= $this->Form->input('bairro', ['label' => 'Bairro', 'type' => 'text', 'required' => false]); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					<?= $this->Form->input('cidade', ['label' => 'Cidade', 'type' => 'text', 'required' => false]); ?>
				</div>
				<div class="col-md-4">
					<?= $this->Form->input('uf', ['label' => 'UF', 'type' => 'text', 'required' => false]); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<?= $this->Form->input('email', ['label' => 'e-Mail', 'type' => 'text', 'required' => false]); ?>
				</div>
				<div class="col-md-4">
					<?= $this->Form->input('celular', ['label' => 'Celular', 'type' => 'text', 'required' => false, 'class' => 'celular']); ?>
				</div>
			</div>


			<div class="row">
				<div class="col-md-12">
					<label>Deficiências</label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 form-inline">
					<?php foreach ($deficiencias as $deficiencia) : ?>
						<input type="checkbox" name="deficiencias[]" value="<?= $deficiencia->id; ?>" id="<?= $deficiencia->id ?>" <?= (in_array($deficiencia->id, $candidato->deficiencias)) ? "checked=\"checked\"" : "" ?>>
						<label for="<?= $deficiencia->id ?>"><?= " " . $deficiencia->nome; ?></label>
					<?php endforeach; ?>
				</div>
			</div>

		</fieldset>
		<hr>
		<?= $this->Form->button('Alterar', ['class' => 'btn btn-success']) ?>
		<?= $this->Html->link('Voltar', ['action' => 'index'], ['class' => 'btn btn-primary btn-md']); ?>
		<?= $this->Form->end() ?>
	</div>
</div>
<script>


</script>