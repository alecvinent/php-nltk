<?php

namespace Nlp\Classifier;

/**
 * Multinomial Naive Bayes Classifier
 * @package Nlp\Classifier
 */
class MultinomialNBClassifier implements Classifier
{
    private $docs = 0;
    private $vocabulary = array();
    private $classes = array();
    private $doc_per_class = array();
    // class => feature => count
    private $feature_per_class = array();

    /**
     * @param string $class
     * @param array $doc list of tokens
     */
    public function train($class, array $doc)
    {
        $this->docs++;
        if(!isset($this->feature_per_class[$class])) {
            $this->classes[] = $class;
            $this->feature_per_class[$class] = array();
            $this->doc_per_class[$class] = 0;
        }
        $this->doc_per_class[$class]++;
        foreach($doc as $feature) {
            if(!isset($this->vocabulary[$feature])) {
                $this->vocabulary[$feature] = 1;
            } else {
                $this->vocabulary[$feature]++;
            }
            if(!isset($this->feature_per_class[$class][$feature])) {
                $this->feature_per_class[$class][$feature] = 1;
            } else {
                $this->feature_per_class[$class][$feature]++;
            }
        }
    }

    /**
     * @param array $doc list of tokens
     * @return string class
     */
    public function classify(array $doc)
    {
        $classes = array_keys($this->feature_per_class);
        $maxClass = current($classes);
        $maxScore = $this->getScore($maxClass, $doc);
        while($class = next($classes)) {
            $score = $this->getScore($class, $doc);
            if($score > $maxScore) {
                $maxClass = $class;
                $maxScore = $score;
            }
        }
        return $maxClass;
    }

    public function getScore($class, array $doc)
    {
        $score = $this->doc_per_class[$class] / $this->docs;
        $features = array_count_values($doc);
        foreach($features as $feature => $featureCount) {
            $featureProbability = $this->getFeatureProbability($class, $feature);
            $featureScore = pow($featureProbability, $featureCount);
            $score *= $featureScore;
        }
        return $score;
    }

    public function getFeatureProbability($class, $feature)
    {
        $classTermCount = array_sum($this->feature_per_class[$class]);
        $vocabularyCount = count($this->vocabulary);
        $featureClassCount = isset($this->feature_per_class[$class][$feature])
            ? $this->feature_per_class[$class][$feature]
            : 0;
        return ($featureClassCount + 1) / ($classTermCount + $vocabularyCount);
    }
}