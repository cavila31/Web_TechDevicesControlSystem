<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Has Ticket'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersHasTickets index large-9 medium-8 columns content">
    <h3><?= __('Users Has Tickets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('users_id') ?></th>
                <th><?= $this->Paginator->sort('tickets_id') ?></th>
                <th><?= $this->Paginator->sort('tipo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersHasTickets as $usersHasTicket): ?>
            <tr>
                <td><?= $usersHasTicket->has('user') ? $this->Html->link($usersHasTicket->user->id, ['controller' => 'Users', 'action' => 'view', $usersHasTicket->user->id]) : '' ?></td>
                <td><?= $usersHasTicket->has('ticket') ? $this->Html->link($usersHasTicket->ticket->id, ['controller' => 'Tickets', 'action' => 'view', $usersHasTicket->ticket->id]) : '' ?></td>
                <td><?= $this->Number->format($usersHasTicket->tipo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersHasTicket->users_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersHasTicket->users_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersHasTicket->users_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersHasTicket->users_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
