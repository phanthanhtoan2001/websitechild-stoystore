<?php
//terminal:composer require mongodb/mongodb 
// error use :composer update --ignore-platform-reqs
require_once __DIR__ . "/vendor/autoload.php";

// connect to MongoDB
function Getmongodb($namedb, $namecollection)
{
    $client = new MongoDB\Client("mongodb+srv://phantoan045:123123asD@dbwebflower.cxvlwuj.mongodb.net/?retryWrites=true&w=majority");

    // select a database
    $database = $client->selectDatabase($namedb);

    // select a collection
    $collection = $database->selectCollection($namecollection);
    return $collection;

    // output user data
}

//  $collection = $database->selectCollection("Toys");
//  $result = $collection->find([]);
//  foreach($result as $p){
//  echo 'flowerid: ' . $p['name'] . '<br>';
//  }

// echo 'ProductName: ' . $result['ProductName'] . '<br>';
// echo 'Series: ' . $result['Series'] . '<br>';
// echo 'Brand: ' . $result['Brand'] . '<br>';
// echo 'Note: ' . $result['Note'] . '<br>';
// echo 'DateRelease: ' . $result['DateRelease'] . '<br>';
// echo 'ProductStatus: ' . $result['ProductStatus'] . '<br>'; 
?>
