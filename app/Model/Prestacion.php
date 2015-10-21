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
//          public $hasMany = array(
//            'PrestacionTratamiento' => array(
//            'className' => 'PrestacionTratamiento',
//            //'foreignKey' => 'prestacion_id',
//            //'conditions' => array('Comment.status' => '1'),
//            //'order' => 'Paciente.nombre_paciente DESC',
//            //'limit' => '5',
//            //'dependent' => false
//            )
//        );
        
        public $hasMany = array(
        'Tratamiento' => array(
            'className' => 'Tratamiento',
            'foreignKey' => 'prestacion_id',
            'dependent' => false)
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
