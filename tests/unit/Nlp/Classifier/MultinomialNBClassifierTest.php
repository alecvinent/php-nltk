<?php

namespace Nlp\Classifier;

use Nlp\Tokenizer\SimpleTokenizer;

class NaiveBayesClassifierTest extends \PHPUnit_Framework_TestCase
{
    public function testChinese()
    {
        $docs[] = array('yes', 'Chinese Beijing Chinese');
        $docs[] = array('yes', 'Chinese Chinese Shanghai');
        $docs[] = array('yes', 'Chinese Macao');
        $docs[] = array('no', 'Tokyo Japan Chinese');
        $test = 'Chinese Chinese Chinese Tokyo Japan';
        $expected = 'yes';
        $classifier = new MultinomialNBClassifier();
        $tokenizer = new SimpleTokenizer();
        foreach($docs as $doc) {
            list($class, $description) = $doc;
            $description = $tokenizer->tokenize($description);
            $classifier->train($class, $description);
        }
        $test = $tokenizer->tokenize($test);
        $this->assertEquals($expected, $classifier->classify($test));
    }
}