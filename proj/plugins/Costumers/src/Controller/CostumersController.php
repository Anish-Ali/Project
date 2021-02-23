<?php
namespace Costumers\Controller;

use Costumers\Controller\AppController;

/**
 * Costumers Controller
 *
 * @property \Costumers\Model\Table\CostumersTable $Costumers
 *
 * @method \Costumers\Model\Entity\Costumer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CostumersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $costumers = $this->paginate($this->Costumers);

        $this->set(compact('costumers'));
    }

    /**
     * View method
     *
     * @param string|null $id Costumer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $costumer = $this->Costumers->get($id, [
            'contain' => ['Phinxlog'],
        ]);

        $this->set('costumer', $costumer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $costumer = $this->Costumers->newEntity();
        if ($this->request->is('post')) {
            $costumer = $this->Costumers->patchEntity($costumer, $this->request->getData());
            if ($this->Costumers->save($costumer)) {
                $this->Flash->success(__('The costumer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The costumer could not be saved. Please, try again.'));
        }
        $phinxlog = $this->Costumers->Phinxlog->find('list', ['limit' => 200]);
        $this->set(compact('costumer', 'phinxlog'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Costumer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $costumer = $this->Costumers->get($id, [
            'contain' => ['Phinxlog'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $costumer = $this->Costumers->patchEntity($costumer, $this->request->getData());
            if ($this->Costumers->save($costumer)) {
                $this->Flash->success(__('The costumer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The costumer could not be saved. Please, try again.'));
        }
        $phinxlog = $this->Costumers->Phinxlog->find('list', ['limit' => 200]);
        $this->set(compact('costumer', 'phinxlog'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Costumer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $costumer = $this->Costumers->get($id);
        if ($this->Costumers->delete($costumer)) {
            $this->Flash->success(__('The costumer has been deleted.'));
        } else {
            $this->Flash->error(__('The costumer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
