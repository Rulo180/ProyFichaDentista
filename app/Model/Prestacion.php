<?php
App::uses('AppModel', 'Model');
/**
 * Prestacion Model
 *
 * @property  $
 */
class Prestacion extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_prestacion';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre_prestacion';
        
/**
 * Associations
 */
        
        public $hasAndBelongsToMany = array(
        'Tratamiento' =>
            array(
                'className' => 'Tratamiento',
                'joinTable' => 'prestacions_tratamientos',
                'foreignKey' => 'prestacion_id',
                'associationForeignKey' => 'tratamiento_id',
                'unique' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => '',
                'with' => ''
            )
    );
        
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre_prestacion' => array(
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
