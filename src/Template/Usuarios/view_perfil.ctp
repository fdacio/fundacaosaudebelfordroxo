<div class="col-lg-8 col-md-12">
    <div class="box box-primary col-lg-8">
        <div class="box-header with-border">
            <h3 class="box-title">Perfil de Usuário</h3>
        </div>
        <div class="box-body">
            <table class="table table-striped table-hover">
                <tr>
                    <th>Nome</th>
                    <td><?= $usuario->nome_sobrenome; ?></td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td><?= $usuario->email; ?>
                </tr>
            </table>
        </div>
    </div>
</div>
<?= $this->Html->link('Alterar Senha',['controller' => 'Usuarios', 'action' => 'alteraSenha'], ['class' => 'btn btn-primary'])?><br>
<?= $this->Html->link('Alterar informações',['controller' => 'Usuarios', 'action' => 'alteraPerfil'], ['class' => 'btn btn-primary'])?>