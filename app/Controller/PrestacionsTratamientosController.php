<?php
App::uses('AppController', 'Controller');
/**
 * PrestacionsTratamientos Controller
 *
 * @property Prestacion $Prestacion
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PrestacionsTratamientosController extends AppController {
        
        public $uses = array('PrestacionTratamiento');
    
        var $helpers = array('Html', 'Form', 'Session');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
        
        public $paginate = array(
        'limit' => 10,
        //'order' => array('Prestacion.nombre_prestacion' => 'asc')
            );
        
/**
 * index method
 *
 * @return void
 */
	public function index() {
            
                $this->Paginator->settings = $this->paginate;
            
		$this->Prestacion->recursive = 0;
		$this->set('prest_trats', $this->Paginator->paginate());
                
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
                
                $this->set('prestacions', $this->PrestacionTratamiento->Prestacion->find('list'));
            
                if ($this->request->is('post')) {
                    $this->PrestacionTratamiento->create();
                if ($this->PrestacionTratamiento->saveAssociated($this->request->data)) {
                    $this->Session->setFlash(__('Prestacion-Tratamiento guardado.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Prestacion-Tratamiento  NO guardado.'));
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
