<?php
App::uses('AppModel', 'Model');
/**
 * Turno Model
 *
 * @property  $
 */
class Turno extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_turno';
    

 /**
  * Virtual fields
  */
        public $virtualFields = array(
        'fecha_hora' => 'CONCAT(Turno.fecha_turno, " ", Turno.hora_turno)');
        
/**
 * Display field
 *
 * @var string
 */
	//public $displayField = 'Nombre_Completo';
        //Deberia crear un campo virtual que una el dia y la fecha

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'fecha_turno' => array(
			'rule' => 'notEmpty',
			'message' => 'El campo nombre no puede quedar vacio',
			//'allowEmpty' => false,
			'required' => true,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
                'hora_turno' => array(
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


