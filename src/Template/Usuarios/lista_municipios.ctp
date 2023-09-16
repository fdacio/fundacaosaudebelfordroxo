<div class="container form-signin">
	<h2>Municípios</h2>
 	<div class="list-group">
	<?php foreach ($usuariosMunicipios as $usuarioMunicipio) :?>
  		<?= $this->Html->link($usuarioMunicipio->municipio->nome, ['action' => 'selecaoMunicipio', $usuarioMunicipio->municipios_id, $usuarioMunicipio->usuarios_id],  ['class' => 'list-group-item'])?>
  	<?php endforeach;?>
	</div> 
	<hr>
	<?= $this->Html->link('Voltar', '/login', ['class' => 'btn btn-success btn-md']); ?>
</div> 		
