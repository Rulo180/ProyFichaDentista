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
		$this->Paciente->recursive = 0;
		$this->set('pacientes', $this->Paginator->paginate());
                //$this->layout = 'atmosphere';

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id) {
		if (!$this->Paciente->exists($id)) {
			throw new NotFoundException(__('Paciente inválido'));
		}
		$options = array('conditions' => array('Paciente.' . $this->Paciente->primaryKey => $id));
		$this->set('paciente', $this->Paciente->find('first', $options));
                
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
                    $this->Paciente->create();
                if ($this->Paciente->save($this->request->data)) {
                    $this->Session->setFlash(__('El paciente ha sido guardado.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('El paciente no ha sido guardado. Intente nuevamente.'));
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
                $this->Session->setFlash(__('El paciente no ha sido guardado. Intente nuevamente.'));
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

                if ($this->Paciente->delete($id)) {
                    $this->Session->setFlash(
                    __('El paciente '.$this->Paciente->field('nombre_paciente'). $this->Paciente->field('apellido_paciente').' ha sido borrado.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                }
	}
        
        public function buscar($id = null){
            
            $pacientes = $this->Paciente->findByApellidoPaciente($id);
            if(!$pacientes){
                $this->Session->setFlash(__('No se ha encontrado el paciente '. $id . "."));
                return $this->redirect(array('action' => 'index'));
            }/*else{
                $this->set('pacientes', $pacientes);
            }*/
            else{
                $options = array('conditions' => array('Paciente.' . 'apellido_paciente' => $id));
                $this->set('pacientes', $this->Paciente->find('all', $options));
            }
        }
}
