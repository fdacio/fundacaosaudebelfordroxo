<div class="col-lg-12 col-md-12">
    <div class="box box-primary">
        <div class="box-body">
            <?= $this->Form->create($paciente, ['type' => 'file']) ?>
            <fieldset>
                <legend>Cadastro de Paciente</legend>
        		<div class="row">
        			<div class="col-md-8">
        				<?= $this->Form->input('nome', ['label' => 'Nome', 'type' => 'text', 'required' => false]); ?>
        			</div>
        			<div class="col-md-4">
        				<?= $this->Form->input('nascimento', ['label' => 'Nascimento', 'id' => 'nascimento', 'type' => 'text', 'class' => 'data', 'label' => 'Nascimento', 'required' => false]); ?>
        			</div>
        		</div>	
        		<div class="row">
        			<div class="col-md-6">
        				<?= $this->Form->input('cpf', ['label' => 'CPF', 'type' => 'text', 'class' => 'cpf', 'required' => false]); ?>
        			</div>
        			<div class="col-md-6">
        				<?= $this->Form->input('sus', ['label' => 'Incrição no SUS', 'type' => 'text', 'required' => false]); ?>
        			</div>
        		</div>	
        		<div class="row">
        			<div class="col-md-3">
        				<?= $this->Form->input('cep', ['label' => 'CEP', 'id' => 'cep', 'type' => 'text', 'class' => 'cep', 'required' => false]);?>
        			</div>
        			<div class="col-md-6">
        				<?= $this->Form->input('endereco', ['label' => 'Endereço', 'type' => 'text', 'required' => false]);?>
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
        				<?= $this->Form->input('bairro' , ['label' => 'Bairro', 'type' => 'text', 'required' => false]); ?>
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
        			<div class="col-md-12">
        				<?= $this->Form->input('email', ['label' => 'e-Mail', 'type' => 'text', 'required' => false]); ?>
        			</div>
        		</div>		
        
        		<div class="row">
        			<div class="col-md-4">
        				<?= $this->Form->input('telefone', ['label' => 'Telefone', 'type' => 'text', 'required' => false, 'class' => 'telefone']); ?>
        			</div>
        			<div class="col-md-4">
        				<?= $this->Form->input('celular', ['label' => 'Celular', 'type' => 'text', 'required' => false, 'class' => 'celular']); ?>
        			</div>
        			<div class="col-md-4">
        				<?= $this->Form->input('whatsapp', ['label' => 'WhatsApp', 'type' => 'text', 'required' => false, 'class' => 'celular']); ?>
        			</div>
        		</div>	       		

            </fieldset>
            <hr>
            <?= $this->Html->link(__('Voltar'), ['action' => 'index'], ['class' => 'btn btn-success']) ?>
            <?= $this->Form->button(__('Cadastrar')) ?>
            <?= $this->Form->end() ?>
        </div>
	</div>
</div>        
