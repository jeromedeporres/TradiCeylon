<?php
class products
{
    public $id = 0;
    public $productName = '';
    public $description = '';
    public $productReference = '';
    public $price = '';
    public $image = '';
    public $id_categories = 0;
    public $resultNumber = 0;
    private $db = null;
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=tradiceylon;charset=utf8', 'root', '');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
    //Category//
    public function getProductsByCategory() {
        $getProductsByCategoryQuery = $this->db->prepare(
            'SELECT `id`, `productName`, `description`, `productReference`, `price`, `image` 
            FROM `j5z9g2_products`
            WHERE `id_categories` = :id_categories'
            );
            $getProductsByCategoryQuery->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
            $getProductsByCategoryQuery->execute();
            return $getProductsByCategoryQuery->fetchAll(PDO::FETCH_OBJ);
    }

public function checkProductsExist(){
    $addSameProductsQuery = $this->db->prepare(
        'SELECT COUNT(`id`) AS `isProductsExist`
        FROM `j5z9g2_products` 
        WHERE `productName` = :productName AND `productReference` = :productReference'
    );
    $addSameProductsQuery->bindvalue(':productName', $this->productName, PDO::PARAM_STR);
    $addSameProductsQuery->bindvalue(':productReference', $this->productReference, PDO::PARAM_STR);
    $addSameProductsQuery->execute();
    $data = $addSameProductsQuery->fetch(PDO::FETCH_OBJ);
    return $data->isProductsExist; 
}
public function checkIdProductsExist()
{
    $checkIdProductsExistQuery = $this->db->prepare(
        'SELECT COUNT(`id`) AS `isIdProductExist`
        FROM `j5z9g2_products` 
        WHERE `id` = :id'
    );
    $checkIdProductsExistQuery->bindvalue(':id', $this->id, PDO::PARAM_INT);
    $checkIdProductsExistQuery->execute();
    $data = $checkIdProductsExistQuery->fetch(PDO::FETCH_OBJ);
    return $data->isIdProductExist; 
    }     
    public function addProduct()
{
        $addProductQuery = $this->db->prepare(
            'INSERT INTO `j5z9g2_products` (`productName`,`description`,`productReference`,`price`,`image`, `id_categories`)
    VALUES(:productName, :description, :productReference, :price, :image, :id_categories)'
        );
        $addProductQuery->bindvalue(':productName', $this->productName, PDO::PARAM_STR);
        $addProductQuery->bindvalue(':description', $this->description, PDO::PARAM_STR);
        $addProductQuery->bindvalue(':productReference', $this->productReference, PDO::PARAM_STR);
        $addProductQuery->bindvalue(':price', $this->price, PDO::PARAM_STR);
        $addProductQuery->bindvalue(':image', $this->image, PDO::PARAM_STR);
        $addProductQuery->bindvalue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return $addProductQuery->execute();
    }
public function getProductsList() {
    $getProductsListQuery = $this->db->query(
        'SELECT `id_categories` AS `IDCAT`, `j5z9g2_products`.`id` AS `IDPRO`, `categoryName` AS `NomdeCAT` , `productName` AS `NomdeProduit`, `Description`, `productReference` AS `REF`, `price` AS `PRIX`,`image` AS `Image`
        FROM `j5z9g2_categories`
        INNER JOIN `j5z9g2_products` ON `j5z9g2_categories`.`id` = `j5z9g2_products`.`id_categories`'
        );
    return $getProductsListQuery->fetchAll(PDO::FETCH_OBJ);
    }
}