<?php
App::uses('AppModel', 'Model');
/**
 * FichaDental Model
 *
 * @property  $
 */
class FichaDental extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_ficha';
    

/**
 * Display field
 *
 * @var string
 */     
	public $displayField = 'paciente_id';

        //public $virtualFields = array('Nombre_Paciente' => "FichaDental.Paciente.apellido_paciente");
  /**
  * Asociaciones
  * 
  */    
        public $hasMany = array(
        'Tratamiento' => array(
            'className' => 'Tratamiento',
            'foreignKey' => 'ficha_id',
            'dependent' => false)
            );
        
        public $belongsTo = array(
        'Paciente' => array(
            'className' => 'Paciente',
            'foreignKey' => 'paciente_id'
        )
    );
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'fecha_ficha' => array(
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




