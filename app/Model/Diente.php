<?php
App::uses('AppModel', 'Model');
/**
 * Diente Model
 *
 * @property  $
 */
class Diente extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_diente';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'cod_diente';

        
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
		'cod_diente' => array(
			'rule' => 'notEmpty',
			'message' => 'El campo código no puede quedar vacio',
			//'allowEmpty' => false,
			'required' => true,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
                'tipo_diente' => array(
			'rule' => 'notEmpty',
			'message' => 'El campo tipo no puede quedar vacio',
			//'allowEmpty' => false,
			'required' => true,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		)        
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

}




