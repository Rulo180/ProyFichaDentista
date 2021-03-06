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
        
        var $helpers = array('Html', 'Form', 'Session', 'CakeBreadcrumbs.Breadcrumb');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'CakeBreadcrumbs.Breadcrumb');
        
        public $paginate = array(
        'limit' => 10,
        'order' => array('Prestacion.nombre_prestacion' => 'asc')
            );
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Breadcrumb->add('Inicio/', '/Turnos');
  }
  
/**
 * index method
 *
 * @return void
 */
	public function index() {
            
                $this->Breadcrumb->add('Parametros/');
                $this->Breadcrumb->add('Prestaciones/', '/Prestacions/index/');
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
                                
        }

/**
 * add method
 *
 * @return void
 */
	public function add() {
            
                $this->Breadcrumb->add('Parametros/');
                $this->Breadcrumb->add('Prestaciones/', '/Prestacions/index/');
                $this->Breadcrumb->add('Agregar/', '/Prestacions/add/');
            
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
            
            $this->Breadcrumb->add('Parametros/');
            $this->Breadcrumb->add('Prestaciones/', '/Prestacions/index/');
            $this->Breadcrumb->add('Editar/', '/Prestacions/edit/'. $id);
            
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
                $prestacion = $this->Prestacion->findByIdPrestacion($id);
                
                if ($this->Prestacion->delete($id)) {
                    $this->Session->setFlash(
                    __('La prestación '. $prestacion['Prestacion']['nombre_prestacion'].' ha sido borrada.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                }
	}
}
