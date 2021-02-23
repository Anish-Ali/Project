<?php
namespace Products\Controller;

use Products\Controller\AppController;
use App\Model\Table\ProductsTable;

/**
 * Carts Controller
 *
 * @property \Products\Model\Table\CartsTable $Carts
 *
 * @method \Products\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products'],
        ];
        $carts = $this->paginate($this->Carts);

        $this->set(compact('carts'));
    }

    /**
     * View method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cart = $this->Carts->get($id, [

            'contain' => ['Products'],
        ]);

        $this->set('cart', $cart);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cart = $this->Carts->newEntity();

        if ($this->request->is('post')) {

            $cart = $this->Carts->patchEntity($cart, $this->request->getData());

            if ($this->Carts->save($cart)) {

                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $products = $this->Carts->Products->find('list', ['limit' => 200]);

        $this->set(compact('cart', 'products'));
    }


    public function add($id = null){
        
        // $product = $this->Products->get($id, [
        //     'contain' => ['Categories'],
        // ]);

        // $this->set('product', $product);
        // $id = $id;
        // print_r($id);
        // exit;
        // $cart = $this->Carts->find()->where(['product_id'=>$id]);
        // // $cart = $this->Carts->get($id, [

        // //     'contain' => ['Products'],
        // // ]);
        // $this->set('cart', $cart);



        
        // $this->loadModel('Products');
        // $this->paginate = [
        //     'contain' => ['Products'],
        // ];
        // $carts = $this->paginate($this->Carts);

        // $this->set(compact('carts'));
        
    }



    
    /**
     * Edit method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cart = $this->Carts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $cart = $this->Carts->patchEntity($cart, $this->request->getData());

            if ($this->Carts->save($cart)) {

                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $products = $this->Carts->Products->find('list', ['limit' => 200]);

        $this->set(compact('cart', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $cart = $this->Carts->get($id);

        if ($this->Carts->delete($cart)) {

            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
