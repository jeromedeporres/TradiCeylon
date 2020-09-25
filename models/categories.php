<?php
class categories
{
    public $id = 0;
    public $categoryName = '';
    private $db = null;
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=54.37.71.121;dbname=c57tradiceylon;charset=utf8', 'c57jeromea', 's7m_dU9J',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
    public function checkCategoryExist(){
        $checkCategoryExist = $this->db->prepare(
            'SELECT COUNT(`id`) AS `isCategorieExist`
            FROM `j5z9g2_categories` 
            WHERE `categoryName` = :categoryName'
        );
        $checkCategoryExist->bindvalue(':categoryName', $this->categoryName, PDO::PARAM_STR);
        $checkCategoryExist->execute();
        return $checkCategoryExist->fetch(PDO::FETCH_OBJ)->isCategorieExist;
    }
    public function getCategory(){
        $getCategory = $this->db->prepare(
            'SELECT `id`, `categoryName`
            FROM `j5z9g2_categories`'
        );
        $getCategory->execute();
        return $getCategory->fetchAll(PDO::FETCH_OBJ);
    }
    public function checkIdCatExist(){
        $checkIdCatExistQuery = $this->db->prepare(
            'SELECT COUNT(`id`) AS `isIdCatExist`
            FROM `j5z9g2_categories` 
            WHERE `id` = :id'
        );
        $checkIdCatExistQuery->bindvalue(':id', $this->id, PDO::PARAM_INT);
        $checkIdCatExistQuery->execute();
        $data = $checkIdCatExistQuery->fetch(PDO::FETCH_OBJ);
        return $data->isIdCatExist;     
    } 
    public function addCategory(){
        $addCategoryQuery = $this->db->prepare(
            'INSERT INTO `j5z9g2_categories` (`categoryName`)
            VALUES (:categoryName)'
        );
        $addCategoryQuery->bindvalue(':categoryName', $this->categoryName, PDO::PARAM_STR);
        return $addCategoryQuery->execute();
    }  
    public function getCatInfo() {
        $getCatInfoQuery = $this->db->prepare(
            'SELECT `id`, `categoryName`
            FROM `j5z9g2_categories`
            WHERE `id` = :id '
        );
        $getCatInfoQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getCatInfoQuery->execute();
        return $getCatInfoQuery->fetch(PDO::FETCH_OBJ);
    } 
    public function modifyCatInfo(){
        $modifyCatInfoQuery = $this->db->prepare(
           'UPDATE `j5z9g2_categories` 
           SET `categoryName` = :categoryName
           WHERE `id` = :id '
        );
        $modifyCatInfoQuery->bindValue(':categoryName', $this->categoryName, PDO::PARAM_STR);
        $modifyCatInfoQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modifyCatInfoQuery->execute();
    }
    public function deleteCat() {
        $deleteCatQuery = $this->db->prepare(
            'DELETE FROM `j5z9g2_categories`
            WHERE `id` = :id'
        );
        $deleteCatQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteCatQuery->execute();
    }
}