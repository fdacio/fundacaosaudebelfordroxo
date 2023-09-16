<div class="container form-signin">
	<?= $this->Flash->render() ?>
	<div>
        <?= $this->Form->create('Usuarios') ?>
		<fieldset>
		<legend>Recuperar Senha</legend>
		<div class="form-group">
			<div class="input-group">
    			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> 
				<?= $this->Form->input('email', ['type' => 'text', 'label'=> false, 'placeholder' => 'Informe seu e-Mail']) ?>
			</div>
		</div>
		</fieldset>
		<?= $this->Html->link('Volta', ['controller'=>'Usuarios', 'action' => 'login'], ['class' => 'btn btn-success btn-md']); ?>
		<?= $this->Form->button('Avançar'); ?>
        <?= $this->Form->end(); ?>
	</div>
</div>
