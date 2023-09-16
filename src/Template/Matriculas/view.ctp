<nav class="col-lg-2 col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href=""><?= __('Actions') ?></a></li>
        <li><?= $this->Html->link(__('Edit {0}', ['Matricula']), ['action' => 'edit', $matricula->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete {0}', ['Matricula']), ['action' => 'delete', $matricula->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matricula->id)]) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Matriculas']), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Matricula']), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Alunos']), ['controller' => 'Alunos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Aluno']), ['controller' => 'Alunos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Cursos']), ['controller' => 'Cursos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Curso']), ['controller' => 'Cursos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Turnos']), ['controller' => 'Turnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Turno']), ['controller' => 'Turnos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List {0}', ['Turmas']), ['controller' => 'Turmas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New {0}', ['Turma']), ['controller' => 'Turmas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="matriculas view col-lg-10 col-md-9">
    <h3><?= h($matricula->id) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th>Aluno</th>
            <td><?= $matricula->has('aluno') ? $this->Html->link($matricula->aluno->id, ['controller' => 'Alunos', 'action' => 'view', $matricula->aluno->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Curso</th>
            <td><?= $matricula->has('curso') ? $this->Html->link($matricula->curso->id, ['controller' => 'Cursos', 'action' => 'view', $matricula->curso->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Turno</th>
            <td><?= $matricula->has('turno') ? $this->Html->link($matricula->turno->id, ['controller' => 'Turnos', 'action' => 'view', $matricula->turno->id]) : '' ?></td>
        </tr>
        <tr>
            <th>Turma</th>
            <td><?= $matricula->has('turma') ? $this->Html->link($matricula->turma->id, ['controller' => 'Turmas', 'action' => 'view', $matricula->turma->id]) : '' ?></td>
        </tr>
        <tr>
            <th>'Id</th>
            <td><?= $this->Number->format($matricula->id) ?></td>
        </tr>
        <tr>
            <th>'Usuarios 1</th>
            <td><?= $this->Number->format($matricula->usuarios_1) ?></td>
        </tr>
        <tr>
            <th>'Usuarios 2</th>
            <td><?= $this->Number->format($matricula->usuarios_2) ?></td>
        </tr>
        <tr>
            <th>Data</th>
            <td><?= h($matricula->data) ?></tr>
        </tr>
        <tr>
            <th>Hora Ini</th>
            <td><?= h($matricula->hora_ini) ?></tr>
        </tr>
        <tr>
            <th>Hora Fim</th>
            <td><?= h($matricula->hora_fim) ?></tr>
        </tr>
        <tr>
            <th>Criado</th>
            <td><?= h($matricula->criado) ?></tr>
        </tr>
        <tr>
            <th>Alterado</th>
            <td><?= h($matricula->alterado) ?></tr>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= $matricula->status ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
