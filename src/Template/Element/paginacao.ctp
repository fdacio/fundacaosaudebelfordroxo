<div class="paginator">
    <center>
        <ul class="pagination">
            <?= $this->Paginator->prev('&laquo; ' . __('anterior'), ['escape' => false]) ?>
            <?= $this->Paginator->numbers(['escape' => false]) ?>
            <?= $this->Paginator->next(__('próximo') . ' &raquo;', ['escape' => false]) ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registros de
         {{count}} total, começando no registro {{start}}, terminando em {{end}}')) ?></p>
    </center>
</div>
