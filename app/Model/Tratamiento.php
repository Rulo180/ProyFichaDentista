<?php
App::uses('AppModel', 'Model');
/**
 * Tratamiento Model
 *
 * @property  $
 */
class Tratamiento extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'id_tratamiento';
    

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id_tratamiento';

        
  /**
  * Asociaciones
  * 
  */            
        public $belongsTo = array(
       
            'FichaDental' => array(
                'className' => 'FichaDental',
                'foreignKey' => 'ficha_id'
            ),
            'ObraSocial' => array(
                'className' => 'ObraSocial',
                'foreignKey' => 'obra_id'
            ),
            'Prestacion' => array(
                'className' => 'Prestacion',
                'foreignKey' => 'prestacion_id'
            ),
            'Diente' => array(
                'className' => 'Diente',
                'foreignKey' => 'diente_id'
            ),
            'Cara' => array(
                'className' => 'Cara',
                'foreignKey' => 'cara_id'
            ) 
        );
        
        
        /*      ULTIMA OPCION ELEGIDA!!! 
        public $hasAndBelongsToMany = array(
        'Prestacion'    
        'Prestacion' => array(
            'className' => 'Prestacion',
            'joinTable' => 'prestacion_tratamientos',
            'foreignKey' => 'tratamiento_id',
            'associationForeignKey' => 'prestacion_id',
            'unique' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'with' => ''
            )
    );*/
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'fecha_tratamiento' => array(
			'rule' => 'notEmpty',
			'message' => 'El campo fecha no puede quedar vacio',
			//'allowEmpty' => false,
			'required' => true,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
                'prestacion_id' => array(
                            'rule' => 'notEmpty',
                            'message' => 'Debe indicar una Prestación para cada Tratamiento.',
                            //'allowEmpty' => false,
                            'required' => true,
                            //'last' => false, // Stop validation after this rule
                            //'on' => 'create', // Limit validation to 'create' or 'update' operations
                    ),
                'diente_id' => array(
			'rule' => 'notEmpty',
			'message' => 'Debe indicar un Diente para cada Tratamiento.',
			//'allowEmpty' => false,
			'required' => true,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
                'cara_id' => array(
			'rule' => 'notEmpty',
			'message' => 'Debe indicar una Cara para cada Tratamiento.',
			//'allowEmpty' => false,
			'required' => true,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
                'obra_id' => array(
			'rule' => 'notEmpty',
			'message' => 'Debe indicar una Obra Social para cada Tratamiento.',
			//'allowEmpty' => false,
			'required' => true,
			//'last' => false, // Stop validation after this rule
			//'on' => 'create', // Limit validation to 'create' or 'update' operations
		)     
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

}



