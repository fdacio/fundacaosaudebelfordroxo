<div class="form-row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="header-logo text-left float-left">
                    <?= $this->Html->image('logo_ps.png', ['class' => 'img-fluid img-responsive center-block']) ?>
                </div>
                <div class="header-title text-right float-right">
                    <h4>Processo Seletivo Fundação Saúde - 2023</h4>
                    <h5>Prefeitura Municipal de Belford Roxo - RJ</h5>
                </div>
                <div class="clearfix"></div>
                <a href="/home" class="float-right">Início</a>
            </div>
            <div class="card-body">
                <?= $this->Form->create(null) ?>
                <fieldset>
                    <legend>Consultar Inscrição</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->input('inscricao', ['label' => 'Inscrição', 'type' => 'text', 'required' => false]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->input('cpf', ['label' => 'CPF', 'type' => 'text', 'required' => false, 'class' => 'cpf']); ?>
                        </div>
                    </div>
                    <?= $this->Form->button('Consultar', ['class' => ['btn btn-primary btn-block']]); ?>
                    <?= $this->Form->end(); ?>
                </fieldset>
            </div>
            <?php if ($candidato) : ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>Cargo</th>
                                <td><?= $candidato->cargo->nome ?></td>
                            </tr>
                            <tr>
                                <th>Inscrição</th>
                                <td><?= $candidato->id ?></td>
                            </tr>
                            <tr>
                                <th>Nome</th>
                                <td><?= $candidato->nome; ?></td>
                            </tr>
                            <tr>
                                <th>CPF</th>
                                <td><?= $this->Formatador->formatarCPF($candidato->cpf); ?></td>
                            </tr>
                            <!--
                            <tr>
                                <th>Data da Inscrição</th>
                                <td><?= $candidato->data_inscricao; ?></td>
                            </tr>
                            -->
                        </table>
                    </div>
                    <div class="box box-footer">
                        <?= $this->Html->link('Gera PDF', ['controller' => 'Candidatos', 'action' => 'geraPdf', $candidato->id], ['class' => 'btn btn-success']) ?>
                    </div>

                </div>
            <?php else : ?>
                <?php if ($encontrou) : ?>
                    <div class="alert alert-danger">Inscrição não localizada</div>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>