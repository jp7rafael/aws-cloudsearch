<?php
require_once 'vendor/autoload.php';

use Aws\CloudSearchDomain\CloudSearchDomainClient;


$csDomainClient = CloudSearchDomainClient::factory([
    'endpoint'    => 'http://search-my-search-wzfnq73vja7om3qna37iaupkgm.us-east-1.cloudsearch.amazonaws.com',
    'credentials' => false,
    'version' => '2013-01-01',
]);

$result = $csDomainClient->search([
                'query' => 'article'
            ]);

print_r($result);

