<?php

namespace Nlp\Classifier;

interface Classifier
{
    /**
     * @param string $class
     * @param array $doc list of tokens
     */
    public function train($class, array $doc);

    /**
     * @param array $doc list of tokens
     * @return string class
     */
    public function classify(array $doc);
}