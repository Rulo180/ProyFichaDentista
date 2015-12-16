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
        
        var $helpers = array('Html', 'Form', 'Session', 'CakeBreadcrumbs.Breadcrumb');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'CakeBreadcrumbs.Breadcrumb');
        
        public $paginate = array(
        'limit' => 10,
        'order' => array('Cara.nombre_cara' => 'asc')
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
                $this->Breadcrumb->add('Caras/', '/Caras/index/');
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
            
                $this->Breadcrumb->add('Parametros/');
                $this->Breadcrumb->add('Caras/', '/Caras/index/');
                $this->Breadcrumb->add('Agregar/', '/Caras/add');
                if ($this->request->is('post')) {
                    $this->Cara->create();
                if ($this->Cara->save($this->request->data)) {
                    $this->Session->setFlash(__('La cara ha sido guardada.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('El registro no ha sido guardado. Intente nuevamente.'));
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
            $this->Breadcrumb->add('Caras/', '/Caras/index/');
            $this->Breadcrumb->add('Editar/', 'Caras/edit/' . $id);
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
                $this->Session->setFlash(__('El registro no ha sido guardado. Intente nuevamente.'));
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

                $cara = $this->Cara->findByIdCara($id);
                if ($this->Cara->delete($id)) {
                    $this->Session->setFlash(
                    __('La cara '.$cara['Cara']['nombre_cara'].' ha sido borrada.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                }
	}
}


