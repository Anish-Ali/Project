<?php 

namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
class ProductsController extends AppController
{

    public function initialize()
    {

        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent

				
    }
	public function isAuthorized($user)
	{
		$action = $this->request->params['action'];
		//  registered users can add products and view index
		if (in_array($action, ['index', 'add','products'])) {
		return true;
		}
		// All other actions require an id or users cannot do it 
		if (empty($this->request->params['pass'][0])) {
			return false;
		}		
		
		// The owner of a product can edit and delete it
		// the owner of product is known by its id and user_id value of product .
		if (in_array($this->request->action, ['edit', 'delete'])) {
		// get product id from the request 	
		$productId = (int)$this->request->params['pass'][0];
		// check if the product is owned by the user 
		if ($this->Products->isOwnedBy($productId, $user['id'])) {
		return true;
		}
		}
		return parent::isAuthorized($user);


	}

    public function index()
    {
		// find('all') get all records from Products model
		// We uses set() to pass data to view 
        $this->set('product', $this->Products->find('all'));
    }

    public function view($id)
    {
		// get() method get only one product record using 
		// the $id paraameter is received from the requested url 
		// if request is /products/view/5   the $id parameter value is 3
        $product = $this->Products->get($id);
        $this->set(compact('product'));
    }

    public function add()
    {
        $product = $this->Products->newEntity();
		//if the user products data to your application, the POST request  informations are registered in $this->request   
        if ($this->request->is('post')) { // 
            $product = $this->Products->patchEntity($product, $this->request->data);
			$product->user_id = $this->Auth->user('id');
            if ($this->Products->save($product)) {
				// success() method of FlashComponent restore messages in session variable.
				// Flash messages are displayed in views 
                $this->Flash->success(__('Your product has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your product.'));
        }
        $this->set('product', $product);
    }
	public function edit($id = null)
	{
		$product = $this->Products->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->Products->patchEntity($product, $this->request->data);
			if ($this->Products->save($product)) {
				$this->Flash->success(__('Your product has been updated.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to update your product.'));
		}
	
		$this->set('product', $product);
	}
	public function delete($id)
	{
		//if user wants to delete a record by a GET request ,allowMethod() method give an Exception as the only available request for deleting is POST
		$this->request->allowMethod(['post', 'delete']);
	
		$product = $this->Products->get($id);
		if ($this->Products->delete($product)) {
			$this->Flash->success(__('The product with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
}
?>