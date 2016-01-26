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
            'type' => 'add',
            'id' => '1',
            'fields' => [
                'title' => 'Article 1',
                'body' => 'This is the first example.',
                'date' => '2015-01-22T10:03:06Z'
                ]
            ],
            [
            'type' => 'add',
            'id' => '2',
            'fields' => [
                'title' => 'Article 2',
                'body' => 'The second example is presented.',
                'date' => '2015-01-23T10:03:06Z'
                ]
            ],
            [
            'type' => 'add',
            'id' => '3',
            'fields' => [
                'title' => 'Article 3',
                'body' => 'Third article.',
                'date' => '2015-01-25T10:03:06Z'
                ]
            ]
];

$result = $csDomainClient->uploadDocuments([
                'documents'     => json_encode($batch),
                'contentType'     =>'application/json'
            ]);

print_r($result);
