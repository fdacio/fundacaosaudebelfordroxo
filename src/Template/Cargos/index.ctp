<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="box">
            <div class="box-body">
                <?= $this->Form->create($cargos, ['class' => 'form-inline', 'url' => ['action' => 'index'], 'type' => 'get']); ?>
                <fieldset>
                    <legend><?= 'Consulta de Cargos' ?></legend>
                    <?= $this->Form->input('campo', ['label' => '', 'options' => ['id' => 'ID', 'nome' => 'NOME'], 'id' => 'campo_consulta', 'default' => $dadosConsulta->campo]); ?>
                    <?= $this->Form->input('condicao', ['label' => '', 'options' => ['=' => 'Igual', 'like' => 'Contém'], 'default' => $dadosConsulta->condicao]); ?>
                    <?= $this->Form->input('valor', ['label' => '', 'id' => 'valor_consulta', 'default' => $dadosConsulta->valor]); ?>
                    <?= $this->Form->button('', ['class' => ['glyphicon glyphicon-search']]); ?>
                </fieldset>
                <?= $this->Form->end(); ?>
            </div>
            <p><?= $this->Paginator->counter('Total de Registros: {{count}}'); ?></p>
        </div>
    </div>
    <div class="col-md-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= 'Ações'; ?></h3>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li><?= $this->Html->link('Novo Cargo', ['action' => 'add']); ?></li>
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="box box-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('nome') ?></th>
                        <th>Unidade de Saúde</th>                        
                        <th><?= $this->Paginator->sort('ativo') ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cargos as $cargo) : ?>
                        <tr>
                            <td><?= $this->Number->format($cargo->id) ?></td>
                            <td><?= $cargo->nome ?></td>
                            <td><?= $cargo->processo->nome ?></td>

                            <td><?= ($cargo->ativo == 1) ? 'Sim' : 'Não' ?></td>
                            <td class="actions" style="white-space: nowrap">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $cargo->id], ['class' => 'btn btn-default btn-xs']) ?>
                                <?= $this->Html->link(__('Alterar'), ['action' => 'edit', $cargo->id], ['class' => 'btn btn-primary btn-xs']) ?>
                                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $cargo->id], ['confirm' => __('Tem certeza que deseja excluir # {0}?', $aluno->id), 'class' => 'btn btn-danger btn-xs']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $this->element('paginacao') ?>
        </div>
    </div>
</div>