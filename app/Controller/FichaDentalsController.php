<?php
App::uses('AppController', 'Controller');
/**
 * Fichas Dentales Controller
 *
 * @property FichaDental $FichaDental
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FichaDentalsController extends AppController {
        
        var $helpers = array('Html', 'Form', 'Session', 'CakeBreadcrumbs.Breadcrumb');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'CakeBreadcrumbs.Breadcrumb');
        
        public $paginate = array(
        'limit' => 5,
        'order' => array('FichaDental.fecha_ficha' => 'desc')
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
            
                $this->Breadcrumb->add('Fichas/', '/Fichas/index');
                $this->Paginator->settings = $this->paginate;
                
		$this->FichaDental->recursive = 0;
		$this->set('fichas', $this->Paginator->paginate());

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            
                $this->Breadcrumb->add('Fichas/', '/Fichas/index');
                $this->Breadcrumb->add('Agregar/', '/Fichas/add');
                $this->set('pacientes', $this->FichaDental->Paciente->find('list'));
                
                if ($this->request->is('post')) {
                    $this->FichaDental->create();
                if ($this->FichaDental->save($this->request->data)) {
                    $this->Session->setFlash(__('La ficha dental ha sido guardada.'));
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
            
            $this->Breadcrumb->add('Fichas/', '/Fichas/index');
            $this->Breadcrumb->add('Editar/', '/Fichas/edit/' . $id);
            
            $this->set('pacientes', $this->FichaDental->Paciente->find('list'));
            
            if (!$id) {
                throw new NotFoundException(__('Id inválido.'));
            }
            
            $ficha = $this->FichaDental->findByIdFicha($id);
            if (!$ficha) {
                throw new NotFoundException(__('Ficha inválida.'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->FichaDental->id = $id;
                if ($this->FichaDental->save($this->request->data)) {
                    $this->Session->setFlash(__('La ficha ha sido actualizada.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('El registro no ha sido guardado. Intente nuevamente.'));
        }

            if (!$this->request->data) {
                $this->request->data = $ficha;
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
                $ficha = $this->FichaDental->findByIdFicha($id);
                $paciente = $this->FichaDental->Paciente->findByIdPaciente($ficha['FichaDental']['paciente_id']);
                                
                if ($this->FichaDental->delete($id)) {
                    $this->Session->setFlash(
                    __('La ficha de '. $paciente['Paciente']['Nombre_Completo'] .' ha sido borrada.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                }
	}
        
        public function buscar(){
            
            $campo = $this->request->data('Buscar.campo');
 
            $options = array('conditions' => array( 'Paciente.' . 'Nombre_Completo '. 'LIKE' => "%$campo%"));                                      
            $pacientes =  $this->FichaDental->Paciente->find('first', $options);
            
            $options = array('conditions' => array('FichaDental.' . 'paciente_id' => $pacientes['Paciente']['id_paciente']));
            $fichas = $this->FichaDental->find('all', $options);
            $this->Paginator->settings = $options;
            
            if(!$fichas){
                $this->Session->setFlash(__('No se ha encontrado el paciente '. $campo . "."));
                return $this->redirect(array('action' => 'index'));
            }else{
                $this->set('fichas', $this->Paginator->paginate());
            }
               
        }
}
