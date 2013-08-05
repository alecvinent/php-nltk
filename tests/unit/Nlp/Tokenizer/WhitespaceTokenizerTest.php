<?php

namespace Nlp\Tokenizer;

class WhitespaceTokenizerTest extends \PHPUnit_Framework_TestCase
{
    public function testTokenize()
    {
        $tokenizer = new WhitespaceTokenizer();
        $tokens = $tokenizer->tokenize("Hello world! My name's Alexey %) qwrqw123123");
        $this->assertEquals(Array
        (
            "Hello",
            "world!",
            "My",
            "name's",
            "Alexey",
            "%)",
            "qwrqw123123",
        ), $tokens);
    }
}