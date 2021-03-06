<?php
App::uses('AppController', 'Controller');
/**
 * Pacientes Controller
 *
 * @property Paciente $Paciente
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PacientesController extends AppController {
        
        var $helpers = array('Html', 'Form', 'Session', 'CakeBreadcrumbs.Breadcrumb');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'CakeBreadcrumbs.Breadcrumb');
        
        public $paginate = array(
        'limit' => 5,
        'order' => array('Paciente.apellido_paciente' => 'asc', 'Paciente.nombre_paciente' => 'asc')
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
            
                $this->Breadcrumb->add('Pacientes/', '/Pacientes/index');
                $this->Paginator->settings = $this->paginate;
                
		$this->Paciente->recursive = 0;
		$this->set('pacientes', $this->Paginator->paginate());

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id) {
                $this->Breadcrumb->add('Pacientes/', '/Pacientes/index');
                $this->Breadcrumb->add('Ver/', '/Pacientes/view/'.$id);
                
		if (!$this->Paciente->exists($id)) {
			throw new NotFoundException(__('Paciente inválido'));
		}
		$options = array('conditions' => array('Paciente.' . $this->Paciente->primaryKey => $id));
		$this->set('paciente', $this->Paciente->find('first', $options));
                
        }

/**
 * add method
 *
 * @return void
 */
	public function add() {
            
                $this->set('obras', $this->Paciente->ObraSocial->find('list'));
            
                //$this->loadModel('ObraSocial');
                //$this->set('obras', $this->ObraSocial->find('all', array('fields' => array('ObraSocial.id_obra', 'ObraSocial.nombre_obra'))));
                
                if ($this->request->is('post')) {
                    $this->Paciente->create();
                if ($this->Paciente->save($this->request->data)) {
                    $this->Session->setFlash(__('El paciente ha sido guardado.'));
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
            
            $this->Breadcrumb->add('Pacientes/', '/Pacientes/index');
            $this->Breadcrumb->add('Editar/', '/Pacientes/edit/'.$id);
            
            $this->set('obras', $this->Paciente->ObraSocial->find('list'));
            
            if (!$id) {
                throw new NotFoundException(__('Id inválido.'));
            }
            
            $paciente = $this->Paciente->findByIdPaciente($id);
            if (!$paciente) {
                throw new NotFoundException(__('Paciente inválido.'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Paciente->id = $id;
                if ($this->Paciente->save($this->request->data)) {
                    $this->Session->setFlash(__('El paciente ha sido actualizado.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('El registro no ha sido guardado. Intente nuevamente.'));
        }

            if (!$this->request->data) {
                $this->request->data = $paciente;
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
                $paciente = $this->Paciente->findByIdPaciente($id);
                if ($this->Paciente->delete($id)) {
                    $this->Session->setFlash(
                    __('El paciente '.$paciente['Paciente']['Nombre_Completo'].' ha sido borrado.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                }
	}
        
        public function buscar(){
            
            $campo = $this->request->data('Buscar.campo');
            $filtro = $this->request->data('Buscar.filtro');
            
            if ($filtro == '1'){
 
                $options = array('conditions' => array( 'Paciente.' . 'Nombre_Completo '. 'LIKE' => "%$campo%"));                                      
            }else if ($filtro == '2'){
                
                $options = array('conditions' => array( 'Paciente.' . 'nro_afiliado '  => "$campo"));
            } else if ($filtro == '3'){
                
                $options = array('conditions' => array('Paciente.' . 'dni_paciente' => "$campo"));
            }
           
            
            $pacientes =  $this->Paciente->find('all', $options);
            $this->Paginator->settings = $options;
            
            if(!$pacientes){
                $this->Session->setFlash(__('No se ha encontrado el paciente '. $campo . "."));
                return $this->redirect(array('action' => 'index'));
            }else{
                $this->set('pacientes', $this->Paginator->paginate());
            }
               
        }
}
