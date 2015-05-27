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
        
        public $paginate = array(
        'limit' => 10,
        'order' => array('ObraSocial.nombre_obra' => 'asc')
            );
/**
 * index method
 *
 * @return void
 */
	public function index() {
            
                $this->Paginator->settings = $this->paginate;
            
		$this->ObraSocial->recursive = 0;
		$this->set('obras', $this->Paginator->paginate());
                
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
        
        public function buscar(){
            
            $campo = $this->request->data('Buscar.campo');

            $options = array('conditions' => array( "OR" => array('ObraSocial.' . 'nombre_obra'. ' LIKE' => "%$campo%", 
                                                                  'Obrasocial.' . 'codigo_obra' => "$campo")));                                      
                                                                  
            
            $obras =  $this->ObraSocial->find('all', $options);
            
            if(!$obras){
                $this->Session->setFlash(__('No se ha encontrado la obra social '. $campo . "."));
                return $this->redirect(array('action' => 'index'));
            }else{
                $this->set('obras', $obras);
            }
               
        }
        
        public function verPacientes($id = null){
            
            $options = array('conditions' => array('Paciente.obra_id' => $id));
            $this->loadModel('Paciente');
            $pacientes = $this->Paciente->find('all', $options);
            
            $this->set('obra', $this->ObraSocial->find('first', array('conditions' => array('ObraSocial.id_obra' => $id))));
            
            if(!$pacientes){
                $this->Session->setFlash('No se han encontrado pacientes para esta obra social.');
                return $this->redirect(array('action' => 'index'));
            }else{
                $this->set('pacientes', $pacientes);
            }
        }
}



