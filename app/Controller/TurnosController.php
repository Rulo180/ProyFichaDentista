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
        
        var $helpers = array('Html', 'Form', 'Session', 'CakeBreadcrumbs.Breadcrumb');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'CakeBreadcrumbs.Breadcrumb');
        
        public $paginate = array(
        'limit' => 10,
        'order' => array('Turno.fecha_turno' => 'desc')
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
            
                $this->Breadcrumb->add('Turnos/', '/Turnos/index/');
                $this->Paginator->settings = $this->paginate;
            
		$this->Turno->recursive = 0;
		$this->set('turnos', $this->Paginator->paginate());
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
                
                
        }

/**
 * add method
 *
 * @return void
 */
	public function add() {
            
                $this->Breadcrumb->add('Turnos/', '/Turnos/index/');
                $this->Breadcrumb->add('Agregar/', '/Turnos/add/');
                
                $this->set('pacientes', $this->Turno->Paciente->find('list'));
            
                //$this->loadModel('Paciente');
                //$this->set('pacientes', $this->Paciente->find('all', array('fields' => array('Paciente.id_paciente', 'Paciente.Nombre_Completo'))));
                
                if ($this->request->is('post')) {
                    $this->Turno->create();
                if ($this->Turno->save($this->request->data)) {
                    $this->Session->setFlash(__('El turno ha sido guardado.'));
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
            
            $this->Breadcrumb->add('Turnos/', '/Turnos/index/');
            $this->Breadcrumb->add('Editar/', '/Turnos/edit/'. $id);
            
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
                $this->Session->setFlash(__('El registro no ha sido guardado. Intente nuevamente.'));
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

                $turno = $this->Turno->findByIdTurno($id);
                $paciente = $this->Turno->Paciente->findByIdPaciente($turno['Turno']['paciente_id']);
                if ($this->Turno->delete($id)) {
                    $this->Session->setFlash(
                    __('El turno para '. $paciente['Paciente']['Nombre_Completo'] . ' / ' . $turno['Turno']['fecha_turno'] .' ha sido borrado.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                }
	}
        
        public function buscar($filtro = NULL){
            
            $this->Breadcrumb->add('Turnos/', '/Turnos/index/');

            if($this->request->data('Buscar.desde') != null and $this->request->data('Buscar.hasta') != null){
                $desde = $this->request->data('Buscar.desde');
                $hasta = $this->request->data('Buscar.hasta');
                $options = array('conditions' => array('AND' => array('Turno.fecha_turno' . ' >= ' => $desde, 
                                                                      'Turno.fecha_turno'. ' <= ' => $hasta)));
                $msj = 'entre '. $desde . ' y ' . $hasta . '.';
            }
            else if ($filtro == '1'){
                $dia = date('Y-m-d');
                $msj = 'para este día';
                $options = array('conditions' => array('Turno.' . 'fecha_turno' => $dia));
                $this->Breadcrumb->add('Hoy/', '/Turnos/buscar/1');
                
            }else if ($filtro == '2'){
                $sem = date('W');
                $msj = 'para esta semana';
                $options = array('conditions' => array('EXTRACT(WEEK FROM '. 'Turno.' . 'fecha_turno' .')' => $sem - 1));
                $this->Breadcrumb->add('Semana/', '/Turnos/buscar/2');
                
            }else if($filtro == '3'){
                $msj = 'para este mes';
                $mes = date('m');
                $options = array('conditions' => array('EXTRACT(MONTH FROM '. 'Turno.' . 'fecha_turno' .')' => $mes));
                $this->Breadcrumb->add('Mes/', '/Turnos/buscar/3');

            }else if($filtro == '4'){
                $msj = 'para este año';
                $año = date('Y');
                $options = array('conditions' => array('EXTRACT(YEAR FROM '. 'Turno.' . 'fecha_turno' .')' => $año),
                                 'order' => array('EXTRACT(MONTH FROM '. 'Turno.' . 'fecha_turno'.')'));
                $this->Breadcrumb->add('Año/', '/Turnos/buscar/4');
                
            }else if($this->request->data('Buscar.fecha') != null){
                $fecha = $this->request->data('Buscar.fecha');
                $options = array('conditions' => array('Turno.fecha_turno' . ' = ' => $fecha));
                $msj = 'para el '. $fecha['day'] . '/' . $fecha['month'] . '/'  . $fecha['year'];
            }
            
            $this->set('msj', $msj);
            $turnos =  $this->Turno->find('all', $options);
            
            if(!$turnos){
                $this->Session->setFlash(__('No se han encontrado turnos '. $msj . '.'));
                return $this->redirect(array('action' => 'index'));
            }else{
                $this->set('turnos', $turnos);
            }
               
        }
        
}

