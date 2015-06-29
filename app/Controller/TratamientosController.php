<?php
App::uses('AppController', 'Controller');

/**
 * Tratamientos Controller
 *
 * @property Tratamientos $Tratamientos
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */

class TratamientosController extends AppController {
        
        var $helpers = array('Html', 'Form', 'Session');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
        
        public $paginate = array(
        'limit' => 5,
        'order' => array('Tratamiento.fecha_tratamiento' => 'asc')
            );
        
/**
 * index method
 *
 * @return void
 */
	public function index($id = null) {  
            
                $this->Paginator->settings = $this->paginate;
                $this->Paginator->settings = array(
                'conditions' => array('Tratamiento.ficha_id' => $id),
                );
                
		$this->Tratamiento->recursive = 0;
		$this->set('tratamientos', $this->Paginator->paginate());
                $this->set('id_ficha', $id);
                //$this->layout = 'atmosphere';

	}
        
        public function view($id) {
		if (!$this->Tratamiento->exists($id)) {
			throw new NotFoundException(__('Tratamiento inválido'));
		}
		$options = array('conditions' => array('Tratamiento.' . $this->Paciente->primaryKey => $id));
		$this->set('tratamiento', $this->Tratamiento->find('first', $options));
                
        }

/**
 * add method
 *
 * @return void
 */
	public function add($id_ficha = null) {
                
                $this->set('prestacions', $this->Tratamiento->Prestacion->find('list'));
                $this->set('id_ficha', $id_ficha);
                $this->set('obras', $this->Tratamiento->ObraSocial->find('list'));
                //$this->set('prest_trats', $this->Tratamiento->PrestacionTratamiento->find('all'));
                
                if ($this->request->is('post')) {
                    $this->Tratamiento->create();
                    $ficha = $this->Tratamiento->field('ficha_id');
                if ($this->Tratamiento->saveAll($this->request->data, array('deep' => true))) {
                    $this->Session->setFlash(__('El tratamiento ha sido guardado.'));
                    return $this->redirect(array('action' => 'index', $ficha));
                }
                $this->Session->setFlash(__('El tratamiento no ha sido guardado. Intente nuevamente.'));
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
            
            $this->set('prestacions', $this->Tratamiento->Prestacion->find('list'));
            $this->set('fichas', $this->Tratamiento->FichaDental->find('list'));
            $this->set('obras', $this->Tratamiento->ObraSocial->find('list'));
            
            if (!$id) {
                throw new NotFoundException(__('Id inválido.'));
            }
            
            $tratamiento = $this->Tratamiento->findByIdTratamiento($id);
            if (!$tratamiento) {
                throw new NotFoundException(__('Ficha inválida.'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Tratamiento->id = $id;
                if ($this->Tratamiento->saveAll($this->request->data, array('deep' => true))) {
                    $this->Session->setFlash(__('El tratamiento ha sido actualizado.'));
                    $id_ficha = $this->Tratamiento->field('ficha_id');
                    return $this->redirect(array('action' => 'index', $id_ficha));
                }
                $this->Session->setFlash(__('El tratamiento no ha sido guardado. Intente nuevamente.'));
        }

            if (!$this->request->data) {
                $this->request->data = $tratamiento;
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

                if ($this->Tratamiento->delete($id)) {
                    $this->Session->setFlash(
                    __('El tratamiento ha sido borrado.', h($id))
                );
                    $id_ficha = $this->Tratamiento->field('ficha_id');
                return $this->redirect(array('action' => 'index', $id_ficha));
                }
	}
        
        public function buscar(){
            
            $campo = $this->request->data('Buscar.campo');
            $filtro = $this->request->data('Buscar.filtro');
            
            if ($filtro == '1'){
 
                $options = array('conditions' => array( 'Paciente.' . 'Nombre_Completo '. 'LIKE' => "%$campo%"));                                      
            }else if ($filtro == '2'){
                
                $options = array('conditions' => array( 'Paciente.' . 'nro_afiliado '  => "$campo"));
            }
            
            $pacientes =  $this->Paciente->find('all', $options);
            
            if(!$pacientes){
                $this->Session->setFlash(__('No se ha encontrado el paciente '. $campo . "."));
                $id_ficha = $this->Tratamiento->field('ficha_id');
                return $this->redirect(array('action' => 'index', $id_ficha));
            }else{
                $this->set('pacientes', $pacientes);
            }
               
        }
}




