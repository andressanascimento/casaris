<?php

namespace Casaris\Bundle\CoreBundle\Service\Recomendation;

use \NlpTools\Clustering\KMeans;
use \NlpTools\Similarity\Euclidean;
use \NlpTools\Clustering\CentroidFactories\Euclidean as EuclideanCF;
use \NlpTools\Documents\TrainingSet;
use \NlpTools\Documents\TokensDocument;
use \NlpTools\FeatureFactories\DataAsFeatures;

class KMeansImplementation {

    private $_tset;
    private $_user_order;
    

    public function initialize($data) {

        $this->_tset = new TrainingSet();
        $user_order = array();
        
        foreach($data as $k => $v) {
            $this->_tset->addDocument(
                '', //class is not used so it can be empty
                new TokensDocument($v)
            );
            $user_order[] = $k;
           
        }
        $this->set_user_order($user_order);
        return $this;
    }
    
    public function retrieveGroups() {
        
        $clust = new KMeans(
                2, // two clusters
                new Euclidean(), new EuclideanCF()
        );
         
        $result = $clust->cluster($this->_tset, new DataAsFeatures());
        
        $rf = array();
        $user_order = $this->get_user_order();

        foreach ($result[0] as $cluster => $v) {
            foreach($v as $user) {
                $rf[$cluster][] = $user_order[$user];
            }
        }
        
        return $rf;
    }

    public function get_user_order() {
        return $this->_user_order;
    }

    public function set_user_order($_user_order) {
        $this->_user_order = $_user_order;
    }


}
