<?php
App::uses('AppModel', 'Model');
/**
 * Cara Model
 *
 * @property  $
 */
class Cara extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_cara';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'cod_cara';

        
  /**
  * Asociaciones
  * 
  */    

        
        
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'cod_cara' => array(
			'rule' => 'notEmpty',
			'message' => 'El campo código no puede quedar vacio',
			//'allowEmpty' => false,
			'required' => true,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
                'nombre_cara' => array(
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




