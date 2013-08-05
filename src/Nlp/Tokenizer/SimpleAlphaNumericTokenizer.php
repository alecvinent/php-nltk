<?php

namespace Nlp\Tokenizer;

class SimpleAlphaNumericTokenizer implements Tokenizer
{
    public function tokenize($string)
    {
        $string = mb_strtolower($string, 'UTF-8');
        $result = preg_match_all('/([[:alpha:]а-яА-Я]+)/u', $string, $matches);
        if($result !== false) {
            return $matches[1];
        } else {
            return array();
        }
    }
}