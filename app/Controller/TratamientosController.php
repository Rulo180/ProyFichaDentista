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
        
        var $helpers = array('Html', 'Form', 'Session', 'CakeBreadcrumbs.Breadcrumb');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'CakeBreadcrumbs.Breadcrumb');
        
        public $paginate = array(
        'limit' => 5,
        'order' => array('Tratamiento.fecha_trat' => 'asc')
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
	public function index($id = null) {  
            
                $this->Breadcrumb->add('Fichas/', '/FichaDentals/index/');
                $this->Breadcrumb->add('Tratamientos/', '/Tratamientos/index/' . $id);
            
                $this->Paginator->settings = $this->paginate;
                $this->Paginator->settings = array(
                'conditions' => array('Tratamiento.ficha_id' => $id),
                );
                
		$this->Tratamiento->recursive = 0;
		$this->set('tratamientos', $this->Paginator->paginate());
                $this->set('id_ficha', $id);

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
                
                /*
                 * Set de variables para que sean utilizadas por la View
                 */
                $this->set('prestacions', $this->Tratamiento->Prestacion->find('list'));
                $this->set('id_ficha', $id_ficha);
                $this->set('obras', $this->Tratamiento->ObraSocial->find('list'));
                $this->set('prestaciones', $this->Tratamiento->Prestacion->find('list'));
                $this->set('dientes', $this->Tratamiento->Diente->find('list'));
                $this->set('caras', $this->Tratamiento->Cara->find('list'));
                
                $this->Breadcrumb->add('Fichas/', '/FichaDentals/index/');
                $this->Breadcrumb->add('Tratamientos/', '/Tratamientos/index/' . $id_ficha);
                     
                if ($this->request->is('post')) {
                    $cant = 0;
                    $saves = 0;
                    foreach($this->request->data['Tratamiento'] as $data){
                        $cant++;
                        $this->Tratamiento->create(); 
                        $this->Tratamiento->set('ficha_id', $id_ficha);
                        if($this->Tratamiento->save($data)){
                            $saves++;
                        }
                    }  
                    
                    //if($this->Tratamiento->saveMany($this->data['Tratamiento'])){
                        
                    if($saves == $cant){
                        $this->Session->setFlash(__('Los tratamientos han sido guardados.'));
                        return $this->redirect(array('action' => 'index', $id_ficha)); 
                    }
                    $this->Session->setFlash(__('Los tratamientos no han sido guardados. Intente nuevamente.'));
                    $this->Session->setFlash(__('No guardo bien... cant: ' . $cant . ' - saves: ' . $saves));
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
            
            $this->Breadcrumb->add('Fichas/', '/FichaDentals/index/');
            $this->Breadcrumb->add('Tratamientos/', '/Tratamientos/index/' . $id);
            $this->Breadcrumb->add('Editar/', '/Tratamientos/edit/' . $id);
                
            $this->set('prestacions', $this->Tratamiento->Prestacion->find('list'));
            $this->set('fichas', $this->Tratamiento->FichaDental->find('list'));
            $this->set('obras', $this->Tratamiento->ObraSocial->find('list'));
            $this->set('prestaciones', $this->Tratamiento->Prestacion->find('list'));
            $this->set('dientes', $this->Tratamiento->Diente->find('list'));
            $this->set('caras', $this->Tratamiento->Cara->find('list'));
            
            if (!$id) {
                throw new NotFoundException(__('Id inválido.'));
            }
            
            $tratamiento = $this->Tratamiento->findByIdTratamiento($id);
            if (!$tratamiento) {
                throw new NotFoundException(__('Ficha inválida.'));
            }

            if ($this->request->is(array('post', 'put'))) {
                $this->Tratamiento->id = $id;
                if ($this->Tratamiento->save($this->request->data)) {
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
            //$options = array('conditions' => array('Prestacion.' . 'id_prestacion' => $campo));
            //$id_prestacion = $this->Tratamiento->Prestacion->find('list', $options);
            //$this->Session->setFlash(__('ID_prestacion: '. $id_prestacion['Prestacion']['id_prestacion'] . "."));
            $id_ficha = $this->request->data('Buscar.id_ficha');
            
            
            
            $options = array('conditions' => array('AND' => array('Tratamiento.' . 'prestacion_id' => $campo , 'Tratamiento.' . 'ficha_id' => $id_ficha)));
            $tratamientos = $this->Tratamiento->find('all', $options);
            $this->Paginator->settings = $options;
            
            if(!$tratamientos){
                $this->Session->setFlash(__('No se ha encontrado el paciente '. $campo . "."));
                return $this->redirect(array('action' => 'index'));
            }else{
                $this->set('tratamientos', $this->Paginator->paginate());
            }
               
        }
    
        //Add individual ---- OBSOLETO
        	public function add_viejo($id_ficha = null) {
                    
                $this->Breadcrumb->add('Fichas/', '/FichaDentals/index/');
                $this->Breadcrumb->add('Tratamientos/', '/Tratamientos/index/' . $id_ficha);
                
                $this->set('prestacions', $this->Tratamiento->Prestacion->find('list'));
                $this->set('id_ficha', $id_ficha);
                $this->set('obras', $this->Tratamiento->ObraSocial->find('list'));
                $this->set('prestaciones', $this->Tratamiento->Prestacion->find('list'));
                $this->set('dientes', $this->Tratamiento->Diente->find('list'));
                $this->set('caras', $this->Tratamiento->Cara->find('list'));
                
                if ($this->request->is('post')) {
                        $this->Tratamiento->create();
                        if ($this->Tratamiento->save($this->request->data)){
                            $this->Session->setFlash(__('El tratamiento ha sido guardado.'));
                            return $this->redirect(array('action' => 'index', $id_ficha));
                    }
                $this->Session->setFlash(__('El tratamiento no ha sido guardado. Intente nuevamente.'));
                }
        }

}
