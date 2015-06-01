<?php

namespace Casaris\Bundle\CoreBundle\Service\Recomendation;

use \NlpTools\Clustering\KMeans;
use \NlpTools\Similarity\Euclidean;
use \NlpTools\Clustering\CentroidFactories\Euclidean as EuclideanCF;
use \NlpTools\Documents\TrainingSet;
use \NlpTools\Documents\TokensDocument;
use \NlpTools\FeatureFactories\DataAsFeatures;
//use \NlpTools\Clustering\ClusteringTestBase;

class KMeansImplementation {

    private $_tset;
    
    private $_userOrder;
    
    private $_clusters;

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
        $this->setUserOrder($user_order);
        return $this;
    }
    
    public function retrieveGroups() {
        
        $clust = new KMeans(
                $this->getClusters(), 
                new Euclidean(), new EuclideanCF()
        );
         
        $result = $clust->cluster($this->_tset, new DataAsFeatures());
               
        $rf = array();
        $user_order = $this->getUserOrder();

        foreach ($result[0] as $cluster => $v) {
            foreach($v as $user) {
                $rf[$cluster][] = $user_order[$user];
            }
        }
        
        return $rf;
    }

    public function getTset() {
        return $this->_tset;
    }

    public function getUserOrder() {
        return $this->_userOrder;
    }

    public function getClusters() {
        return $this->_clusters;
    }

    public function setTset($tset) {
        $this->_tset = $tset;
    }

    public function setUserOrder($userOrder) {
        $this->_userOrder = $userOrder;
    }

    public function setClusters($clusters) {
        $this->_clusters = $clusters;
    }

}
