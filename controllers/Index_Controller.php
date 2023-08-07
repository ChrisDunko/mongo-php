<?php declare(strict_types=1);
namespace Controllers;

use MongoDB\Client;

class Index_Controller
{
    public static function show_index(): never
    {
        $client = new Client("mongodb://localhost:27017");
        $collection = $client->test->people;

//        $result = $collection->insertOne( [ 'name' => 'Sisi', 'type' => 'pet' ] );

//        $documents = $collection->find(['name' => 'Hugo']);
        $documents = $collection->find();

        foreach ($documents as $document) {
            echo '<p>' . $document['type'] . ': ' . $document['name'] . '</p>';
        }

        exit();
    }
}
