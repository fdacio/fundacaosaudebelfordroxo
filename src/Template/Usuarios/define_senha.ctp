<div class="container form-signin">
	<?= $this->Flash->render() ?>
	<div>
        <?= $this->Form->create($usuario) ?>
		<fieldset>
			<legend>Definir Senha</legend>
			<?= $this->Form->hidden('grupos_usuarios_id'); ?>
			<div class="form-group">
				<?= $this->Form->input('senha', ['type' => 'password', 'label' => 'Nova senha', 'value' => '', 'required' => false]);?>
			</div>
			<div class="form-group">
				<?= $this->Form->input('confirmacao_senha', ['type' => 'password', 'label' => 'Confirme sua senha']);?>
			</div>
		</fieldset>
		<hr>
		<?= $this->Form->button('Salvar', ['class' => 'btn btn-block']); ?>
		<?= $this->Form->end(); ?>
	</div>
</div>
