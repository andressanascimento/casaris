<?php

namespace Casaris\Bundle\CoreBundle\Service\Recomendation;

use \NlpTools\Clustering\KMeans;
use \NlpTools\Similarity\Euclidean;
use \NlpTools\Clustering\CentroidFactories\Euclidean as EuclideanCF;
use \NlpTools\Documents\TrainingSet;
use \NlpTools\Documents\TokensDocument;
use \NlpTools\FeatureFactories\DataAsFeatures;

class KMeansImplementation {

    private $tset;
    
    public function __contruct() {
        
    }

    public function initialize() {
        $this->tset = new TrainingSet();
        $this->tset->addDocument(
                '', //class is not used so it can be empty
                new TokensDocument(array( 'linux' => 13, 'oss' => 10, 'cloud' => 6, 'java' => 0, 'agile' => 0))
        );
        $this->tset->addDocument(
                '', //class is not used so it can be empty
                new TokensDocument(array('linux' => 3, 'oss' => 0, 'cloud' => 1, 'java' => 6, 'agile' => 7))
        );
        $this->tset->addDocument(
                '', //class is not used so it can be empty
                new TokensDocument(array('linux' => 11, 'oss' => 0, 'cloud' => 9, 'java' => 0, 'agile' => 1))
        );
        $this->tset->addDocument(
                '', //class is not used so it can be empty
                new TokensDocument(array('linux' => 0, 'oss' => 3, 'cloud' => 0, 'java' => 9, 'agile' => 8))
        );
        
        $clust = new KMeans(
                2, // two clusters
                new Euclidean(), new EuclideanCF()
        );


        return $clust->cluster($this->tset, new DataAsFeatures());

    }

}
