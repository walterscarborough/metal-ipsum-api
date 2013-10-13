<?php
App::uses('AppModel', 'Model');
/**
 * MetalPhrase Model
 *
 */
class MetalPhrase extends AppModel {

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

    public function afterFind($results, $primary = true) {

        if ($primary === true && count($results) > 0) {
            foreach ($results as $key => $val) {
                $results[$key] = $val['MetalPhrase'];
            }
        }

        return $results;
    }

    public function createParagraphFromPhrases($phrases, $numberOfParagraphs = 4) {

        $phrases = $this->_consolidatePhrases($phrases);

        $output = array();

        for ($i = 0; $i < $numberOfParagraphs; $i++) {

            $numberOfSentencesPerParagraphCounter = rand(4, 10);

            for ($j = 0; $j < $numberOfSentencesPerParagraphCounter; $j++) {

                // Randomize array order
                shuffle($phrases);

                $numberOfWordsPerSentenceCounter = rand(6, 10);

                for ($k = 0; $k < $numberOfWordsPerSentenceCounter; $k++) {

                    // Calculate needsComma
                    $needsComma = false;
                    $commaChance = rand(1, 10);
                    if ($commaChance <= 4) {
                        $needsComma = true;
                    }


                    // First word
                    if ($k === 0) {
                        $output[$i][$j][$k] = ucfirst($phrases[$k]);
                    }
                    // Last word
                    else if ($k === $numberOfWordsPerSentenceCounter - 1) {
                        $output[$i][$j][$k] = $phrases[$k] . '.';
                    }
                    // Add a comma as long as it isn't the last word
                    else if ($needsComma === true && $k !== $numberOfWordsPerSentenceCounter -1) {
                        $output[$i][$j][$k] = $phrases[$k] . ',';
                    }
                    // Middle of sentence words
                    else {
                        $output[$i][$j][$k] = $phrases[$k];
                    }

                }
            }
        }

        $paragraphs = array();

        for ($i = 0; $i < count($output); $i++) {

            $sentence;
            foreach ($output[$i] as $key => $val) {

                // Get sentence
                $sentence = implode(' ', $val);

                // First time through - set first paragraph sentence
                if (!isset($paragraphs[$i])) {
                    $paragraphs[$i] = $sentence;
                }

                // Subsequent times through - append sentence to paragraph w/ an opening space
                else {
                    $paragraphs[$i] .= ' ' . $sentence;
                }

            }
        }

        return $paragraphs;
    }

    private function _consolidatePhrases($phrases) {

        foreach ($phrases as $key => $val) {
            $phrases[$key] = $val['phrase'];
        }

        return $phrases;
    }
}
