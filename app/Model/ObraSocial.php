<?php
App::uses('AppModel', 'Model');
/**
 * ObraSocial Model
 *
 * @property  $
 */
class ObraSocial extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_obra';
        
     
 /**
  * Table Name 
  * @var type 
  */
        public $useTable = 'obra_socials';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre_obra';

        
  /**
  * Asociaciones
  * 
  */    
        public $hasMany = array(
        'Paciente' => array(
            'className' => 'Paciente',
            'foreignKey' => 'obra_id',
            //'conditions' => array('Comment.status' => '1'),
            'order' => 'Paciente.nombre_paciente DESC',
            //'limit' => '5',
            'dependent' => false
            )
        );
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre_obra' => array(
			'rule' => 'notEmpty',
			'message' => 'El campo nombre no puede quedar vacio',
			//'allowEmpty' => false,
			'required' => true,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		)   
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

}


