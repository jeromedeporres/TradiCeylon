<?php
class categories
{
    public $id = 0;
    public $categoryName = '';
    private $db = null;
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=tradiceylon;charset=utf8', 'root', '');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
    public function checkCategoriesExist(){
        $checkCategoriesExist = $this->db->prepare(
            'SELECT COUNT(`id`) AS `isCategorieExist`
            FROM `j5z9g2_categories` 
            WHERE `id` = :id'
        );
        $checkCategoriesExist->bindvalue(':id', $this->id, PDO::PARAM_INT);
        $checkCategoriesExist->execute();
        return $checkCategoriesExist->fetch(PDO::FETCH_OBJ)->isCategorieExist;
    }
    public function getCategory(){
        $getCategory = $this->db->prepare(
            'SELECT `id`, `categoryName`
            FROM `j5z9g2_categories`'
        );
        $getCategory->execute();
        return $getCategory->fetchAll(PDO::FETCH_OBJ);
    }
}
