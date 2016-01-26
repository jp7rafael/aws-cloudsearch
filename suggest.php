<?php
require_once 'vendor/autoload.php';

use Aws\CloudSearchDomain\CloudSearchDomainClient;


$csDomainClient = CloudSearchDomainClient::factory([
    'endpoint'    => 'http://search-my-search-wzfnq73vja7om3qna37iaupkgm.us-east-1.cloudsearch.amazonaws.com',
    'credentials' => false,
    'version' => '2013-01-01',
]);

$suggest = $csDomainClient->suggest([
                'query' => 'articl',
                'suggester' => 'title_suggestions'
]);
print_r($suggest['suggest']);
