<div class="form-row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="header-logo text-left float-left">
                    <?= $this->Html->image('logo_ps.png', ['class' => 'img-fluid img-responsive center-block']) ?>
                </div>
                <div class="header-title text-right float-right">
                    <h4>Processo Seletivo Fundação Saúde- 2023</h4>
                    <h5>Prefeitura Municipal de Belford Roxo - RJ</h5>
                </div>
                <div class="clearfix"></div>
                <a href="/home" class="float-right">Início</a>
            </div>
            <div class="card-body">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($candidato, ['type' => 'file', 'id' => 'form-inscricao']) ?>
                <fieldset>
                    <legend>Inscrição</legend>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->input('processos_id', ['label' => 'Unidade de Saúde', 'id' => 'processo', 'options' => $processos, 'empty' => 'Selecione', 'required' => false]); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->input('cargos_id', ['label' => 'Cargo', 'id' => 'cargo', 'options' => $cargos, 'empty' => 'Selecione', 'required' => false]); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->input('curso_superior', ['label' => 'Curso Superior', 'options' => [1 => 'Sim', 2 => 'Não'], 'empty' => 'Selecione', 'required' => false]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->input('profissao', ['label' => 'Profissão', 'type' => 'text', 'required' => false]); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->input('nome', ['label' => 'Nome', 'type' => 'text', 'required' => false]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?= $this->Form->input('cpf', ['label' => 'CPF', 'id' => 'cpf', 'type' => 'text', 'class' => 'cpf', 'required' => false]); ?>
                        </div>
                        <div class="col-md-4">
                            <?= $this->Form->input('rg', ['label' => 'RG', 'type' => 'text', 'required' => false]); ?>
                        </div>
                        <div class="col-md-4">
                            <?= $this->Form->input('nascimento', ['label' => 'Nascimento', 'id' => 'nascimento', 'type' => 'text', 'class' => 'data', 'label' => 'Nascimento', 'required' => false]); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?= $this->Form->input('cep', ['label' => 'CEP', 'id' => 'cep', 'type' => 'text', 'class' => 'cep', 'required' => false]); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->input('endereco', ['label' => 'Endereço', 'type' => 'text', 'required' => false]); ?>
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
                            <?= $this->Form->input('bairro', ['label' => 'Bairro', 'type' => 'text', 'required' => false]); ?>
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
                        <div class="col-md-8">
                            <?= $this->Form->input('email', ['label' => 'e-Mail', 'type' => 'text', 'required' => false]); ?>
                        </div>
                        <div class="col-md-4">
                            <?= $this->Form->input('celular', ['label' => 'Celular', 'type' => 'tel', 'required' => false, 'class' => 'celular-sm celular']); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->input('etnia', ['label' => 'Etnia', 'options' => $etnias, 'required' => false, 'empty' => 'Selecione', 'default' => '']); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->input('deficiencia', ['label' => 'Deficiência', 'options' => [1 => 'Sim', 0 => 'Não'], 'required' => false, 'empty' => 'Selecione', 'default' => '']); ?>
                        </div>
                    </div>
                    <fieldset>
                        <legend>Anexos</legend>
                        <div class="panel">
                            <p>
                                Anexar arquivos no formato <b>PDF</b> ou compactados no farmato <b>ZIP</b>
                            </p>
                            <span>Tamanho Máximo por Arquivo: <b>1 Mbyte</b></span>
                            <p>
                                *Informe pelo menos um anexo.
                            </p>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile1" name="anexo1">
                                    <label class="custom-file-label" for="customFile1">Anexo 1</label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile2" name="anexo2">
                                    <label class="custom-file-label" for="customFile2">Anexo 2</label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile3" name="anexo3">
                                    <label class="custom-file-label" for="customFile3">Anexo 3</label>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <hr>
                    <p><strong>Confira todos os dados informado antes de enviar o formulário de inscrição</strong>.</p>
                    <?= $this->Form->button('Enviar', ['type' => 'button', 'id' => 'btn-envia-inscricao', 'class' => 'btn btn-primary btn-block']) ?>
                    <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>