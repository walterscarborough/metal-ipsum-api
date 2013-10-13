<?php

App::uses('AppController', 'Controller');

class IpsumController extends AppController {

    public $uses = array(
        'MetalPhrase',
        'LoremIpsumPhrase',
    );

    public $components = array(
        'RequestHandler'
    );

	public function index() {

        $metalPhrases = $this->MetalPhrase->find(
            'all', 
            array(
                //'limit' => 80,
                'fields' => array(
                    'phrase'
                ),
            )
        );
        
        $phrases = $this->MetalPhrase->createParagraphFromPhrases($metalPhrases);

        $this->set('metalPhrases', $phrases);
        $this->set('_serialize', array('metalPhrases'));
	}
}
