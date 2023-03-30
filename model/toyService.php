 <?php
  require_once('../model/toyclass.php');
  require_once('../phpconnectmongodb.php');
  require_once '../vendor/autoload.php'; // path to PHPExcel library autoload file

  use PhpOffice\PhpSpreadsheet\IOFactory;

  class toyService
  {
    private  $dbcollectiontoy;
    public function __construct()
    {
      $this->dbcollectiontoy  = Getmongodb("dbwebtoystore", "Product");
    }
    public function getAllToy()
    {
      $result = $this->dbcollectiontoy->find([]);
      return $result;
    }

    public function getTopProducts($limit = 10)
    {
      $pipeline = [
        ['$sort' => ['productStock' => -1]],
        ['$limit' => $limit]
      ];
      $result = $this->dbcollectiontoy->aggregate($pipeline);
      return $result;
    }



    public function findOneId($id)
    {
      $toy = $this->dbcollectiontoy->findOne(["productID" => (int)$id]);
      return $toy;
    }

    public function getNextProductId()
    {
      try {
        $lastProduct = $this->dbcollectiontoy->findOne([], ['sort' => ['productID' => -1]]);
        $lastProductId = 1;

        if ($lastProduct !== null) {
          $lastProductId = $lastProduct['productID'];
        }

        return $lastProductId + 1;
      } catch (Exception $e) {
        // Handle the exception here
        echo "Error: " . $e->getMessage();
        exit;
      }
    }



    public function createProduct($product)
    {
      $product['productID'] = $this->getNextProductId();
      $result = $this->dbcollectiontoy->insertOne($product);
      return $result;
    }
    public function deleteProduct($id)
    {
      $result = $this->dbcollectiontoy->deleteOne(["productID" => (int)$id]);
      return $result;
    }

    public function updateProduct($id, $updateData)
    {
      $result = $this->dbcollectiontoy->updateOne(
        ["productID" => (int)$id],
        ['$set' => $updateData]
      );
      return $result;
    }

    // //////////////////

  } ?>

