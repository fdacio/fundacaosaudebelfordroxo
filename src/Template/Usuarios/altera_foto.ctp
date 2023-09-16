<div class="col-lg-12 col-md-12">
	<div class="col-lg-2"></div>
	<div class="box box-primary col-lg-8">
		<div class="box-body">
        	<?= $this->Form->create($usuario, ['type' => 'file']) ?>
        	<?= $this->Form->hidden('id', ['type' => 'hidden']); ?>
        	<fieldset>
				<legend><?= 'Atualizar Foto' ?></legend>
				<div class="form-row">
					<div class="col-md-8">
						<?php
							if ($usuario->foto) {
								echo $this->Html->image($usuario->foto, [
								'alt' => 'Foto',
								'id' => 'img_foto_pf',
								'class' => 'col-lg-4 img-circle'
								]);
							} else {
								echo $this->Html->image('user-pf-default.png', [
								'alt' => 'Foto',
								'id' => 'img_foto_pf',
								'class' => 'col-lg-4 img-circle'
								]);
							}						
						?>							
					</div>
                </div>
				<div class="form-row">
					<?= $this->Form->button('Excluir',  ['type' => 'button', 'id' => 'excluir_foto', 'class' => 'btn btn-default btn-xs']); ?>
				</div>
				<div class="form-row">
					<?= $this->Form->hidden('foto', ['id' => 'logo_pf']); ?>
               		<?= $this->Form->file('anexo', ['id' => 'file_foto_pf']); ?>
  				</div>
			</fieldset>
			<hr>
        	<?= $this->Form->button('Atualizar'); ?> 
        	<?= $this->Html->link('Cancelar', ['controller' => 'Usuarios', 'action' => 'index'], ['class' => 'btn btn-success btn-md']); ?>
        	<?= $this->Form->end(); ?>
    	</div>
    </div>
    <div class="col-lg-2"></div>
</div>

