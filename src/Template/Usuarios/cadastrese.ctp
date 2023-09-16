<div class="col-lg-12 col-md-12">
	<div class="col-lg-2"></div>
	<div class="box box-primary col-lg-8">
		<div class="box-body">
			<?= $this->Flash->render() ?> 
            <?= $this->Form->create($usuarioMunicipio); ?>
            <fieldset>
				<legend><?= "Cadastro de Usuário"; ?></legend>
				<div class="form-row">
					<div class="col-md-4">
						<?= $this->Form->input('uf', ['label' => 'UF', 'options' => $ufs, 'empty' => 'Selecione', 'id' => 'uf'])?>
					</div>
					<div class="col-md-8">
						<?= $this->Form->input('municipios_id', ['label' => 'Município', 'options' => $municipios, 'empty' => 'Selecione', 'id' => 'municipio',  'required' => false])?>
					</div>
                </div>
				<div class="form-row">
					<div class="col-md-6">
						<?= $this->Form->input('usuario.nome', ['label' => 'Nome', 'type' => 'text',  'required' => false])?>
					</div>
					<div class="col-md-6">
						<?= $this->Form->input('usuario.sobrenome', ['label' => 'Sobrenome', 'type' => 'text',  'required' => false])?>
					</div>
                </div>
                <div class="form-row">
					<div class="col-md-12">
						<?= $this->Form->input('usuario.email', ['label' => 'e-Mail', 'type' => 'text',  'required' => false])?>
					</div>
                </div>
				<div class="form-row">
					<div class="col-md-6">
                		<?= $this->Form->input('usuario.senha', ['type' => 'password', 'label' => 'Senha',  'required' => false])?>
            		</div>
					<div class="col-md-6">
            	        <?= $this->Form->input('usuario.confirmacao_senha', ['type' => 'password', 'label' => 'Confirmação da senha', 'required' => false])?>
            		</div>
				</div>
			</fieldset>
			<hr>
            <?= $this->Html->link('Voltar', '/login', ['class' => 'btn btn-success btn-md']); ?>
            <?= $this->Form->button('Cadastrar'); ?>
            <?= $this->Form->end(); ?>
        </div>
	</div>
	<div class="col-lg-2"></div>
</div>
