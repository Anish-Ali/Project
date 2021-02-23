<?php
namespace Products\Controller;

use Products\Controller\AppController;
use App\Model\Table\CartsTable;

/**
 * Products Controller
 *
 * @property \Products\Model\Table\ProductsTable $Products
 *
 * @method \Products\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 * @property \Products\Model\Table\CartTable $Cart
 *
 * @method \Products\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class ProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
        public function initialize(){

        parent::initialize();
        
        $this->loadModel('Carts');
        $this->loadModel('Users');
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories'],
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));

       
    
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {


        $product = $this->Products->get($id, [
            'contain' => ['Categories'],
        ]);

        $this->set('product', $product);
        $this->loadModel('Carts');

        $cart = $this->Carts->newEntity();
        if ($this->request->is('post')) {
            $cart = $this->Carts->patchEntity($cart, $this->request->getData());
            if ($this->Carts->save($cart)) {
                $this->Flash->success(__('Processed to Add to Cart'));

                return $this->redirect(['controller' => 'carts','action' => 'addcart',$product->id]);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $this->set(compact('cart', 'products'));
       


    }
    public function checkout()
    {

        $this->loadModel('Users');

        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            if ($user) {

                $this->Auth->setUser($user);

                return $this->redirect(['plugin' => 'products' ,'controller' => 'Products','action' => 'success']);
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }
    public function success()
    {

    }


    // public function addcart($id = null){
        
    //     // $product = $this->Products->get($id, [
    //     //     'contain' => ['Categories'],
    //     // ]);

    //     // $this->set('product', $product);
        
    //     $this->loadModel('Carts');
    //     $this->paginate = [
    //         'contain' => ['Products'],
    //     ];
    //     $carts = $this->paginate($this->Carts);

    //     $this->set(compact('carts'));
        
    // }

    private function uploadImage($product)
    {


        $file = $this->getRequest()->getData('file');
        if (!empty($file['name'])) {
            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
            $uploadPath = "img/";
            if (in_array($ext, $arr_ext)) {  
                $result = move_uploaded_file($file['tmp_name'], WWW_ROOT . $uploadPath . $file['name']);
                $product->image = $file['name']; 
                $this->Products->save($product);
                $response = [
                    'message' => $file['name'],
                ];    
            } else {
                $response = ['status' => false, 'message' => 'Selected extension not allowed.'];
            }
        } else {
            $response = ['status' => true];
        }
        return $response;
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        $result = $this->uploadImage($product);
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);   
        $this->set(compact('product', 'categories'));

    }
   
    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {


        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            $result = $this->uploadImage($product);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        
        $this->set(compact('product', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $product = $this->Products->get($id);

        if ($this->Products->delete($product)) {

            $this->Flash->success(__('The product has been deleted.'));

        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function del($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $cart = $this->Carts->get($id);

        if ($this->Carts->delete($cart)) {

            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'addcart']);
    }
}
