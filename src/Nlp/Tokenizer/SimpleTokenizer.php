<?php

namespace Nlp\Tokenizer;

class SimpleTokenizer implements Tokenizer
{
    public function tokenize($string)
    {
        $result = preg_match_all('/([[:alpha:]а-яА-Я]+|[[:digit:]]+|[^[:alpha:][:digit:][:space:]])/u', $string, $matches);
        if($result !== false) {
            return $matches[1];
        } else {
            return array();
        }
    }
}