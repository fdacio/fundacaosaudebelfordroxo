<div class="cargos view large-9 medium-8 columns content">
    <h3><?= h($cargo->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= 'Nome' ?></th>
            <td><?= h($cargo->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= 'Ativo' ?></th>
            <td><?= ($cargo->ativo) ? 'Sim' : 'Não' ?></td>
        </tr>
    </table>
</div>
