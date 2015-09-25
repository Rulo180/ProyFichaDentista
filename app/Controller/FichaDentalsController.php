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
        
        var $helpers = array('Html', 'Form', 'Session');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
        
        public $paginate = array(
        'limit' => 5,
        'order' => array('FichaDental.fecha_ficha' => 'desc')
            );
        
/**
 * index method
 *
 * @return void
 */
	public function index() {  
                
                $this->Paginator->settings = $this->paginate;
                
		$this->FichaDental->recursive = 0;
		$this->set('fichas', $this->Paginator->paginate());
                $this->loadModel('Paciente');
                $this->set('pacientes', $this->Paciente->find('all'));

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            
                $this->set('pacientes', $this->FichaDental->Paciente->find('list'));
                
                if ($this->request->is('post')) {
                    $this->FichaDental->create();
                if ($this->FichaDental->save($this->request->data)) {
                    $this->Session->setFlash(__('La ficha dental ha sido guardada.'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('La ficha dental no ha sido guardada. Intente nuevamente.'));
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
                $this->Session->setFlash(__('La ficha no ha sido guardada. Intente nuevamente.'));
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
                //No trae al Paciente correcto, solo trae al 1ero
                $paciente_id = $this->FichaDental->field('paciente_id');
                $this->loadModel('Paciente', $paciente_id);
                $nombre = $this->Paciente->field('Nombre_Completo');
                
                if ($this->FichaDental->delete($id)) {
                    $this->Session->setFlash(
                    __('La ficha de '. $nombre .' ha sido borrada.', h($id))
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
            }
            
            $pacientes =  $this->FichaDental->Paciente->find('all', $options);
            
            $options = array('conditions' => array('FichaDental.' . 'paciente_id' => $pacientes['FichaDental']['Paciente']['id_paciente']));
            $fichas = $this->FichaDental->find('all', $options);
            
            if(!$fichas){
                $this->Session->setFlash(__('No se ha encontrado el paciente '. $campo . "."));
                return $this->redirect(array('action' => 'index'));
            }else{
                $this->set('fichas', $fichas);
            }
               
        }
}
