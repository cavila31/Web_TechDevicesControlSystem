<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersHasTickets Controller
 *
 * @property \App\Model\Table\UsersHasTicketsTable $UsersHasTickets
 */
class UsersHasTicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Tickets']
        ];
        $usersHasTickets = $this->paginate($this->UsersHasTickets);

        $this->set(compact('usersHasTickets'));
        $this->set('_serialize', ['usersHasTickets']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Has Ticket id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersHasTicket = $this->UsersHasTickets->get($id, [
            'contain' => ['Users', 'Tickets']
        ]);

        $this->set('usersHasTicket', $usersHasTicket);
        $this->set('_serialize', ['usersHasTicket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersHasTicket = $this->UsersHasTickets->newEntity();
        if ($this->request->is('post')) {
            $usersHasTicket = $this->UsersHasTickets->patchEntity($usersHasTicket, $this->request->data);
            if ($this->UsersHasTickets->save($usersHasTicket)) {
                $this->Flash->success(__('The users has ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users has ticket could not be saved. Please, try again.'));
            }
        }
        $users = $this->UsersHasTickets->Users->find('list', ['limit' => 200]);
        $tickets = $this->UsersHasTickets->Tickets->find('list', ['limit' => 200]);
        $this->set(compact('usersHasTicket', 'users', 'tickets'));
        $this->set('_serialize', ['usersHasTicket']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Has Ticket id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersHasTicket = $this->UsersHasTickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersHasTicket = $this->UsersHasTickets->patchEntity($usersHasTicket, $this->request->data);
            if ($this->UsersHasTickets->save($usersHasTicket)) {
                $this->Flash->success(__('The users has ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users has ticket could not be saved. Please, try again.'));
            }
        }
        $users = $this->UsersHasTickets->Users->find('list', ['limit' => 200]);
        $tickets = $this->UsersHasTickets->Tickets->find('list', ['limit' => 200]);
        $this->set(compact('usersHasTicket', 'users', 'tickets'));
        $this->set('_serialize', ['usersHasTicket']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Has Ticket id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersHasTicket = $this->UsersHasTickets->get($id);
        if ($this->UsersHasTickets->delete($usersHasTicket)) {
            $this->Flash->success(__('The users has ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The users has ticket could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
