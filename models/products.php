<?php
// la class est la définition de l'objet.
// private: accessible uniquement dans la class.
// protected: accessible dans la class et les enfants.
// public: dispo dans class, enfant et dans les instances.
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
            $this->db = new PDO('mysql:host=54.37.71.121;dbname=c57tradiceylon;charset=utf8', 'c57jeromea', 's7m_dU9J',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
public function checkIdProductsExist(){
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
// j'ai essayer de retourner, mais je n'ai pas mis de valeur qui me permettrait de savoir si il y a une similitude ou non, elle me permettra de la récupérer et de l'utiliser
public function addProduct(){
//$db devient une instance de l'objet PDO
// on fait une requête préparée
        $addProductQuery = $this->db->prepare(
// Marqueur nominatif
//bindValue: vérifie le type et que ça ne génère pas de faille de sécurité.
//$this-> : permet d'acceder aux attributs de l'instance qui est en cours
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
    public function getProductInfo() {
        $getProductInfoQuery = $this->db->prepare(
            'SELECT `id_categories` AS `IDCAT`, `j5z9g2_products`.`id` AS `IDPRO`, `categoryName` AS `NomdeCAT` , `productName` AS `NomdeProduit`, `Description`, `productReference` AS `REF`, `price` AS `PRIX`,`image` AS `Image`
            FROM `j5z9g2_categories`
            INNER JOIN `j5z9g2_products` ON `j5z9g2_categories`.`id` = `j5z9g2_products`.`id_categories`
            WHERE `j5z9g2_products`.`id` = :id'
        );
        $getProductInfoQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getProductInfoQuery->execute();
        return $getProductInfoQuery->fetch(PDO::FETCH_OBJ);
    } 
    public function modifyProductInfo(){
        $modifyProInfoQuery = $this->db->prepare(
           'UPDATE `j5z9g2_products` 
           SET  `id_categories` = :id_categories, `productName` = :productName, `description` = :description, `productReference` = :productReference, `price` = :price, `image` = :image 
           WHERE `id` = :id'
        );
        $modifyProInfoQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        $modifyProInfoQuery->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $modifyProInfoQuery->bindValue(':productName', $this->productName, PDO::PARAM_STR);
        $modifyProInfoQuery->bindValue(':description', $this->description, PDO::PARAM_STR);
        $modifyProInfoQuery->bindValue(':productReference', $this->productReference, PDO::PARAM_STR);
        $modifyProInfoQuery->bindValue(':price', $this->price, PDO::PARAM_STR);
        $modifyProInfoQuery->bindValue(':image', $this->image, PDO::PARAM_STR);
        return $modifyProInfoQuery->execute();
    }
    public function deleteProduct() {
        $deleteProductQuery = $this->db->prepare(
            'DELETE FROM `j5z9g2_products`
            WHERE `id` = :id'
        );
        $deleteProductQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteProductQuery->execute();
    }

}