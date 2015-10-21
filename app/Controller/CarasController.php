<?php
App::uses('AppController', 'Controller');
/**
 * Caras Controller
 *
 * @property Caras $Dientes
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CarasController extends AppController {
        
        var $helpers = array('Html', 'Form', 'Session');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
        
        public $paginate = array(
        'limit' => 10,
        'order' => array('Cara.nombre_cara' => 'asc')
            );
        
/**
 * index method
 *
 * @return void
 */
	public function index() {
            
                $this->Paginator->settings = $this->paginate;
            
		$this->Cara->recursive = 0;
		$this->set('caras', $this->Paginator->paginate());
                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id) {
		if (!$this->Cara->exists($id)) {
			throw new NotFoundException(__('Cara inválido'));
		}
		$options = array('conditions' => array('Cara.' . $this->Cara>primaryKey => $id));
		$this->set('cara', $this->Cara->find('first', $options));
                
        }

/**
 * add method
 *
 * @return void
 */
	public function add() {
            
                if ($this->request->is('post')) {
                    $this->Cara->create();
                if ($this->Cara->save($this->request->data)) {
                    $this->Session->setFlash(__('La cara ha sido guardada.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('La cara no ha sido guardada. Intente nuevamente.'));
                }
    }
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            
            if (!$id) {
                throw new NotFoundException(__('Id inválido.'));
            }
            
            $cara = $this->Cara->findByIdCara($id);
            if (!$cara) {
                throw new NotFoundException(__('Cara inválida.'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Cara->id = $id;
                if ($this->Cara->save($this->request->data)) {
                    $this->Session->setFlash(__('La cara ha sido actualizada.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('La cara no ha sido guardada. Intente nuevamente.'));
        }

            if (!$this->request->data) {
                $this->request->data = $cara;
            }

 }
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if ($this->request->is('get')) {
                    throw new MethodNotAllowedException();
                }

                if ($this->Cara->delete($id)) {
                    $this->Session->setFlash(
                    __('La cara '.$this->Cara->field('nombre_cara').' ha sido borrada.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                }
	}
}


