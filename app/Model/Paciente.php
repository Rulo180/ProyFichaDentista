<?php
App::uses('AppModel', 'Model');
/**
 * Paciente Model
 *
 * @property  $
 */
class Paciente extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_paciente';
    
        public $virtualFields = array('Nombre_Completo' => "CONCAT(Paciente.apellido_paciente, ' ', Paciente.nombre_paciente)"
);

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'Nombre_Completo';

        
  /**
  * Asociaciones
  * 
  */    
        public $hasMany = array(
        'Turno' => array(
            'className' => 'Turno',
            'foreignKey' => 'paciente_id',
            'dependent' => true)
            );
        
        public $belongsTo = array(
        'ObraSocial' => array(
            'className' => 'ObraSocial',
            'foreignKey' => 'obra_social_id'
        )
    );
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre_paciente' => array(
			'rule' => 'notEmpty',
			'message' => 'El campo nombre no puede quedar vacio',
			//'allowEmpty' => false,
			'required' => true,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
                'telefono' => array(
                        'rule' => 'numeric',
                        'allowEmpty' => true,
                        'message' => 'Ingrese solo números.'
                ),
                'apellido_paciente' => array(
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


