<?php
App::uses('AppModel', 'Model');
/**
 * PrestacionTratamiento Model
 *
 * @property  $
 */
class PrestacionTratamiento extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	//public $primaryKey = 'id_tratamiento';

/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'fecha_tratamiento';

        
  /**
  * Asociaciones
  * 
  */            
        public $belongsTo = array(
        'Prestacion' => array(
            'className' => 'Prestacion'
        ),
        'Tratamiento' => array(
            'className' => 'Tratamiento'
        )
    );
        
}





