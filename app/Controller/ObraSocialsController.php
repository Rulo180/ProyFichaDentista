<?php
App::uses('AppController', 'Controller');
/**
 * Obras Sociales Controller
 *
 * @property ObraSocial 
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ObraSocialsController extends AppController {
        
        var $helpers = array('Html', 'Form', 'Session');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
        
/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->ObraSocial->recursive = 0;
		//$this->set('obras', $this->Paginator->paginate());
                $this->loadModel('ObraSocial');
                $this->set('obras', $this->ObraSocial->find('all'));
                $this->set('title', 'Obras Sociales');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id) {
		if (!$this->ObraSocial->exists($id)) {
			throw new NotFoundException(__('Turno inválido'));
		}
		$options = array('conditions' => array('ObraSocial.' . $this->ObraSocial->primaryKey => $id));
		$this->set('turno', $this->ObraSocial->find('first', $options));
                
                /*Segun Tut de Blog
                public function view($id = null) {
                if (!$id) {
                    throw new NotFoundException(__('Invalid post'));
                }

                $escuela = $this->Escuela->findById($id);
                if (!$escuela) {
                    throw new NotFoundException(__('Invalid escuela.'));
                }
                $this->set('escuela', $escuela);
                }*/
                
        }

/**
 * add method
 *
 * @return void
 */
	public function add() {
                
                if ($this->request->is('post')) {
                    $this->ObraSocial->create();
                if ($this->ObraSocial->save($this->request->data)) {
                    $this->Session->setFlash(__('La obra social ha sido guardada.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('La obra social no ha sido guardada. Intente nuevamente.'));
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
            
            $obra = $this->ObraSocial->findByIdObra($id);
            if (!$obra) {
                throw new NotFoundException(__('Obra social inválida.'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->ObraSocial->id = $id;
                if ($this->ObraSocial->save($this->request->data)) {
                    $this->Session->setFlash(__('La obra social ha sido actualizada.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('La obra social no ha sido guardada. Intente nuevamente.'));
        }

            if (!$this->request->data) {
                $this->request->data = $obra;
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

                if ($this->ObraSocial->delete($id)) {
                    $this->Session->setFlash(
                    __('La obra social '.$this->ObraSocial->field('nombre_obra').' ha sido borrada.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                }
	}
}



