<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <?= $this->Form->create($usuarios, ['class' => 'form-inline', 'url'=>['action'=>'index'], 'type' => 'get']); ?>
                <fieldset>
                    <legend><?= 'Consulta de Usuários' ?></legend>
                    <?php

                    echo $this->Form->input('campo', [
                        'label' => '',
                        'options' => [
                            'nome' => 'Nome',
                            'sobrenome' => 'Sobrenome'
                        ],
                        'id' => 'campo_consulta',
                        'default' => $dadosConsulta->campo
                    ]);
                    ?>
                    <?= $this->Form->control('condicao', ['label' => '', 'options' => ['like' => 'Contém', '=' => 'Igual'], 'default' => $dadosConsulta->condicao]); ?>
                    <?= $this->Form->control('valor', ['label' => '', 'id' => 'valor_consulta', 'default' => $dadosConsulta->valor]); ?>
                    <?= $this->Form->button('', ['class' => ['glyphicon glyphicon-search']]); ?> 
                </fieldset>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= 'Ações'; ?></h3>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li><?= $this->Html->link('Cadastrar', ['action' => 'add']); ?></li>
            </ul>
        </div>
    </div>

    <div class="col-md-10 columns content">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th><?= 'Nome'; ?></th>
                    <th><?= 'e-Mail'; ?></th>
                    <th><?= 'Tipo'; ?></th>
                    <th><?= 'Situação'; ?></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario->nome_sobrenome ?></td>
                    <td><?= $usuario->email ?></td>    
                    <td><?= $usuario->nome_tipo_usuario ?></td>                    
                    <td><?= ($usuario->status == 1)?'Ativo':'Inativo' ?></td>
                    <td class="actions text-nowrap text-right">
                        <div class="btn-group pull-right flex">
    							<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            							Ações <span class="caret"></span>
            					</button>
                                <ul class="dropdown-menu pull-right" role="menu">
									<li><?= $this->Html->link('Alterar', ['action' => 'edit', $usuario->id]); ?></li>
                    			</ul>
                    	</div>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="paginator text-center">
            <ul class="pagination">
                <?= $this->Paginator->prev('&laquo; Anterior', ['escape' => false]); ?>
                <?= $this->Paginator->numbers(['escape' => false]); ?>
                <?= $this->Paginator->next('Próximo &raquo;', ['escape' => false]); ?>
            </ul>
            <p><?= $this->Paginator->counter('Página {{page}} de {{pages}} <br/> Total de Registros: {{count}}'); ?></p>
        </div>
    </div>
</div>
