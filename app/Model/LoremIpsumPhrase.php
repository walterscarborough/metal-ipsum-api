<?php
App::uses('AppModel', 'Model');
/**
 * LoremIpsumPhrase Model
 *
 */
class LoremIpsumPhrase extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'phrase';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'phrase' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
