<?php declare(strict_types=1);
namespace Controllers;

//use MongoDB\Client;
use MongoDB;
use MongoDB\Client;
use MongoId;

class Index_Controller
{
    public static function show_index(): never
    {
        $client = new Client("mongodb://localhost:27017");
        $collection = $client->test->people;

//        $result = $collection->insertOne( [ 'name' => 'Sisi', 'type' => 'Pet' ] );

//        $result = $collection->insertOne( [
//            'name' => 'Linus',
//            'type' => 'Human',
//            'ago' => 12,
//        ] );

//        $data = array(
//            'name' => 'Micky',
//            'type' => 'Human',
//            'food' => array('Pizza', 'Cheese'),
//        );
//        $result = $collection->insertOne( $data );


//        $result = $collection->replaceOne(
//            [ '_id' => new MongoDB\BSON\ObjectId('64d2372683f94ef7e108f562') ],
//            [
//                'name' => 'Linus',
//                'type' => 'Human',
//                'age' => 12,
//            ]
//        );


        $result = $collection->deleteOne(
            [ '_id' => new MongoDB\BSON\ObjectId('64d2385e3d67bac00f06d332') ]
        );


//        $result = $collection->updateOne(
//            ['name' => 'Paul'],
//            [ '$set' => [ 'age' => 285 ] ]
//        );


//        $documents = $collection->find(['name' => 'Hugo']);
        $documents = $collection->find();

//        $documents = $collection->find(
//            [ '_id' => new MongoDB\BSON\ObjectId('64d161ea2a3d2aeba6060662') ]
//        );
//        $documents = $collection->find(
//            [ 'type' => 'Human' ]
//        );
//        $documents = $collection->find(
//            [ 'age' => [ '$gt' => 70 ] ]
//        );

        foreach ($documents as $document) {
            echo '<p>' . $document['_id'] . ': ' . $document['type'] . ': ' . $document['name'] . ', age: ' . $document['age'] . '</p>';
        }

        exit();
    }
}
