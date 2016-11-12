<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Has Ticket'), ['action' => 'edit', $usersHasTicket->users_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Has Ticket'), ['action' => 'delete', $usersHasTicket->users_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersHasTicket->users_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Has Tickets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Has Ticket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersHasTickets view large-9 medium-8 columns content">
    <h3><?= h($usersHasTicket->users_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $usersHasTicket->has('user') ? $this->Html->link($usersHasTicket->user->id, ['controller' => 'Users', 'action' => 'view', $usersHasTicket->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ticket') ?></th>
            <td><?= $usersHasTicket->has('ticket') ? $this->Html->link($usersHasTicket->ticket->id, ['controller' => 'Tickets', 'action' => 'view', $usersHasTicket->ticket->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($usersHasTicket->tipo) ?></td>
        </tr>
    </table>
</div>
