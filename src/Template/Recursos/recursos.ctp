<div class="form-row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card mb-2">
            <div class="card-header text-center">
                <h2>Prefeitura Municipal de Belford Roxo - RJ</h2>
                <h3>Secretaria de Saúde</h3>
                <h4 class="mt-2">Processo Seletivo</h4>
                <?= $this->Html->link('Início', ['controller' => 'Candidatos', 'action' => 'home'], ['class' => 'float-right']) ?>
            </div>
            <div class="card-body">
                <fieldset>
                    <legend>Candidato</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->input('inscricao', ['label' => 'Inscrição', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $candidato->id]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->input('cpf', ['label' => 'CPF', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $candidato->cpf]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->input('candidato', ['label' => 'Candidato', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $candidato->nome]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->input('cargo', ['label' => 'Cargo', 'type' => 'text', 'required' => false, 'readonly' => true, 'value' => $candidato->cargo->nome]); ?>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <?php foreach ($recursos as $recurso) : ?>
            <div class="card">
                <div class="card-body">
                    <h3>Recursos</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Data</th>
                            <td><?= $recurso->data->format('d/m/Y H:i:s') ?></td>
                        </tr>

                        <tr>
                            <th>Questionamento</th>
                            <td>
                                <p><?= $recurso->questionamento ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th>Embasamento Legal</th>
                            <td>
                                <p><?= $recurso->embasamento_legal ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th>Situação</th>
                            <td <?= ($recurso->situacao == 0) ? 'class="text-primary"' : (($recurso->situacao == 1) ? 'class="text-success"' : 'class="text-danger"') ?>><?= $recurso->situacao_texto ?></td>
                        </tr>
                        <?php if($recurso->data_analise): ?>
                        <tr>
                            <th>Data da Análise</th>
                            <td>
                                <p><?= $recurso->data_analise->formte('d/m/Y') ?></p>
                            </td>
                        </tr>
                        <?php endif?>
                        <?php if($recurso->justificativa): ?>
                        <tr>
                            <th>Justificativa</th>
                            <td>
                                <p><?= $recurso->justificativa ?></p>
                            </td>
                        </tr>
                        <?php endif?>
                    </table>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="col-md-2"></div>
</div>