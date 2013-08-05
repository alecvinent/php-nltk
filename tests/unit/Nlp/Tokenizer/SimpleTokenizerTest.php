<?php

namespace Nlp\Tokenizer;

class SimpleTokenizerTest extends \PHPUnit_Framework_TestCase
{
    public function testTokenize()
    {
        $tokenizer = new SimpleTokenizer();
        $tokens = $tokenizer->tokenize("Hello world! My name's Alexey %) qwrqw123123");
        $this->assertEquals(array
        (
            "Hello",
            "world",
            "!",
            "My",
            "name",
            "'",
            "s",
            "Alexey",
            "%",
            ")",
            "qwrqw",
            "123123",
        ), $tokens);
    }

    public function testCyrillic()
    {
        $tokenizer = new SimpleTokenizer();
        $tokens = $tokenizer->tokenize("Привет, мир! Меня зовут д'Артаньян %) цуацуа123123");
        $this->assertEquals(array
        (
            'Привет',
            ',',
            'мир',
            '!',
            'Меня',
            'зовут',
            'д',
            '\'',
            'Артаньян',
            '%',
            ')',
            'цуацуа',
            '123123',
        ), $tokens);
    }
}