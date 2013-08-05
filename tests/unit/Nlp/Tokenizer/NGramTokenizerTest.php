<?php

namespace Nlp\Tokenizer;

class NGramTokenizerTest extends \PHPUnit_Framework_TestCase
{
    public function testTokenize3_8()
    {
        $ngram = new NGramTokenizer(3);
        $doc = explode(' ', '1 2 3 4 5 6 7 8');
        $result = $ngram->tokenize($doc);
        $expected = array(
            '1 2 3',
            '2 3 4',
            '3 4 5',
            '4 5 6',
            '5 6 7',
            '6 7 8',
        );
        $this->assertEquals($expected, $result);
    }

    public function testTokenize3_3()
    {
        $ngram = new NGramTokenizer(3);
        $doc = explode(' ', '1 2 3');
        $result = $ngram->tokenize($doc);
        $expected = array(
            '1 2 3',
        );
        $this->assertEquals($expected, $result);
    }

    public function testTokenize3_2()
    {
        $ngram = new NGramTokenizer(3);
        $doc = explode(' ', '1 2');
        $result = $ngram->tokenize($doc);
        $expected = array();
        $this->assertEquals($expected, $result);
    }
}