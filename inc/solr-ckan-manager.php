<?php

 use Solarium\Solarium;
/*
 * OpenDev
 * Solr Manager
 */

class Odm_Solr_CKAN_Manager {

  var $client = null;

  var $server_config = array(
    'endpoint' => array(
        'localhost' => array(
            'host' => 'solr.pp.opendevelopmentmekong.net',
            'port' => 443,
            'path' => '/solr/',
						'core' => 'collection1',
						'scheme' => 'https'
        )
    )
	);

	function __construct() {
		$this->client = new \Solarium\Client($this->server_config);

		$options = get_option('odm_options');
		$solr_config = $options['solr_config'];
    $this->client->getEndpoint()->setAuthentication($solr_config['solr_user'],$solr_config['solr_pwd']);
	}

  function ping_server(){
    $ping = $this->client->createPing();

    try {
      $result = $this->client->ping($ping);
    } catch (Solarium\Exception $e) {
      return false;
    }

    return true;
  }

	function query($text, $typeFilter = null){
		$query = $this->client->createSelect();
		$query->setQuery($text);
		if (isset($typeFilter)):
			$query->createFilterQuery('dataset_type')->setQuery('type:' . $typeFilter);
		endif;
		$resultset = $this->client->select($query);
		return $resultset;
	}

}

$GLOBALS['Odm_Solr_CKAN_Manager'] = new Odm_Solr_CKAN_Manager();

function Odm_Solr_CKAN_Manager() {
	return $GLOBALS['Odm_Solr_CKAN_Manager'];
}

?>
