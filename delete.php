<?php
require_once 'vendor/autoload.php';

use Aws\CloudSearchDomain\CloudSearchDomainClient;


$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$csDomainClient = CloudSearchDomainClient::factory([
    'endpoint'    => 'http://doc-my-search-wzfnq73vja7om3qna37iaupkgm.us-east-1.cloudsearch.amazonaws.com',
    'credentials' => [
                        'key' => getenv('AWS_KEY'),
                        'secret' => getenv('AWS_SECRET'),
                    ],
    'version' => '2013-01-01',
]);


$batch = [
            [
            'type' => 'delete',
            'id' => '3',
            ]
];

$result = $csDomainClient->uploadDocuments([
                'documents'     => json_encode($batch),
                'contentType'     =>'application/json'
            ]);

print_r($result);
