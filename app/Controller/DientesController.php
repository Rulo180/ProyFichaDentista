<?php
App::uses('AppController', 'Controller');
/**
 * Dientes Controller
 *
 * @property Dientes $Dientes
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DientesController extends AppController {
        
        var $helpers = array('Html', 'Form', 'Session');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
        
        public $paginate = array(
        'limit' => 10,
        'order' => array('Diente.cod_diente' => 'asc')
            );
        
/**
 * index method
 *
 * @return void
 */
	public function index() {
            
                $this->Paginator->settings = $this->paginate;
            
		$this->Diente->recursive = 0;
		$this->set('dientes', $this->Paginator->paginate());
                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id) {
		if (!$this->Diente->exists($id)) {
			throw new NotFoundException(__('Diente inválido'));
		}
		$options = array('conditions' => array('Diente.' . $this->Diente->primaryKey => $id));
		$this->set('diente', $this->Diente->find('first', $options));
                
        }

/**
 * add method
 *
 * @return void
 */
	public function add() {
            
                if ($this->request->is('post')) {
                    $this->Diente->create();
                if ($this->Diente->save($this->request->data)) {
                    $this->Session->setFlash(__('El registro de diente ha sido guardado.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('El registro de diente no ha sido guardado. Intente nuevamente.'));
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
            
            $diente = $this->Diente->findByIdDiente($id);
            if (!$diente) {
                throw new NotFoundException(__('Diente inválido.'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Diente->id = $id;
                if ($this->Diente->save($this->request->data)) {
                    $this->Session->setFlash(__('El diente ha sido actualizado.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('El diente no ha sido guardado. Intente nuevamente.'));
        }

            if (!$this->request->data) {
                $this->request->data = $diente;
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

                if ($this->Diente->delete($id)) {
                    $this->Session->setFlash(
                    __('El diente '.$this->Diente->field('cod_diente').' ha sido borrado.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                }
	}
}

