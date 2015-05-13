<?php
App::uses('AppController', 'Controller');
/**
 * Turnos Controller
 *
 * @property Turno $Turno
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TurnosController extends AppController {
        
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
		$this->Turno->recursive = 0;
		$this->set('turnos', $this->Paginator->paginate());
                //$this->layout = 'atmosphere';
                $this->set('title', 'Turnos');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id) {
		if (!$this->Turno->exists($id)) {
			throw new NotFoundException(__('Turno inválido'));
		}
		$options = array('conditions' => array('Turno.' . $this->Turno->primaryKey => $id));
		$this->set('turno', $this->Turno->find('first', $options));
                
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
                
                $this->set('pacientes', $this->Turno->Paciente->find('list'));
            
                //$this->loadModel('Paciente');
                //$this->set('pacientes', $this->Paciente->find('all', array('fields' => array('Paciente.id_paciente', 'Paciente.Nombre_Completo'))));
                
                if ($this->request->is('post')) {
                    $this->Turno->create();
                if ($this->Turno->save($this->request->data)) {
                    $this->Session->setFlash(__('El turno ha sido guardado.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('El turno no ha sido guardado. Intente nuevamente.'));
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
            
            $this->set('pacientes', $this->Turno->Paciente->find('list'));
            
            if (!$id) {
                throw new NotFoundException(__('Id inválido.'));
            }
            
            $turno = $this->Turno->findByIdTurno($id);
            if (!$turno) {
                throw new NotFoundException(__('Turno inválido.'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Turno->id = $id;
                if ($this->Turno->save($this->request->data)) {
                    $this->Session->setFlash(__('El turno ha sido actualizado.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('El turno no ha sido guardado. Intente nuevamente.'));
        }

            if (!$this->request->data) {
                $this->request->data = $turno;
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

                if ($this->Turno->delete($id)) {
                    $this->Session->setFlash(
                    __('El turno '.$this->Turno->field('fecha_turno'). $this->Turno->field('hora_turno').' ha sido borrado.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                }
	}
        
        public function filtrarDia($dia = null){
            
            $turnos_dia = $this->Turno->findByFechaTurno($dia);
            if(!$turnos_dia){
                $this->Session->setFlash(__('No se ha encontrado turnos para el día.'));
                return $this->redirect(array('action' => 'index'));
            }/*else{
                $this->set('pacientes', $pacientes);
            }*/
            else{
                $options = array('conditions' => array('Turno.' . 'fecha_turno' => $dia));
                $this->set('turnos', $this->Turno->find('all', $options));
            }
        }
}

