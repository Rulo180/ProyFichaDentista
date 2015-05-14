<?php
App::uses('AppController', 'Controller');
/**
 * Pacientes Controller
 *
 * @property Prestacion $Prestacion
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PrestacionsController extends AppController {
        
        var $helpers = array('Html', 'Form', 'Session');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
        
        public $paginate = array(
        'limit' => 10,
        'order' => array('Prestacion.nombre_prestacion' => 'asc')
            );
        
/**
 * index method
 *
 * @return void
 */
	public function index() {
            
                $this->Paginator->settings = $this->paginate;
            
		$this->Prestacion->recursive = 0;
		$this->set('prestaciones', $this->Paginator->paginate());
                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id) {
		if (!$this->Prestacion->exists($id)) {
			throw new NotFoundException(__('Prestación inválida'));
		}
		$options = array('conditions' => array('Prestacion.' . $this->Prestacion->primaryKey => $id));
		$this->set('prestacion', $this->Prestacion->find('first', $options));
                
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
                    $this->Prestacion->create();
                if ($this->Prestacion->save($this->request->data)) {
                    $this->Session->setFlash(__('La prestacion ha sido guardada.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('La prestacion no ha sido guardada. Intente nuevamente.'));
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
            
            $prestacion = $this->Prestacion->findByIdPrestacion($id);
            if (!$prestacion) {
                throw new NotFoundException(__('Prestacion inválida.'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Prestacion->id = $id;
                if ($this->Prestacion->save($this->request->data)) {
                    $this->Session->setFlash(__('La prestación ha sido actualizado.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('La prestación no ha sido guardado. Intente nuevamente.'));
        }

            if (!$this->request->data) {
                $this->request->data = $prestacion;
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

                if ($this->Prestacion->delete($id)) {
                    $this->Session->setFlash(
                    __('La prestación '.$this->Prestacion->field('nombre_prestacion').' ha sido borrada.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                }
	}
}
