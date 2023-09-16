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
            </div>
            <div class="card-body">
                <?= $this->Flash->render() ?>
                <!--
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3 text-center">
                        <a href="/recursos/abrir"><i class="fa fa-edit" style="font-size: 72px"></i></a>
                        <div>
                            <h5>Recurso</h5>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <a href="/recursos/consultar"><i class="fa fa-search" style="font-size: 72px"></i></a>
                        <div>
                            <h5>Consultar Recurso</h5>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3 text-center">
                        <a href="/candidatos/inscricao"><i class="fa fa-edit" style="font-size: 72px"></i></a>
                        <div>
                            <h5>Inscrição</h5>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <a href="/candidatos/consultar"><i class="fa fa-search" style="font-size: 72px"></i></a>
                        <div>
                            <h5>Consultar Inscrição</h5>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <!--
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center">
                        <?= $this->Html->link('<i class="fa fa-file-o" style="font-size: 72px"></i>', ['action' => 'downloads', 'edital-consultorio-rua.pdf'], ['escape' => false]); ?>
                        <div>
                            <h5>Edital</h5>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                -->
            </div>
        </div>
    </div>
</div>