<?php
class users{
    public $id = 0;
    /**
     * Nom de l'utilisateur
     *
     * @var string
     */
    public $userName = '';
    public $password = '';
    public $email = '';
    public $id_roles = 1;
    private $db = null;
    /**
     * Nom de la table avec le préfix
     *
     * @var string
     */
    private $table = SQL_PREFIX . 'users`';

    public function __construct()
    {
        try{
            $this->db = new PDO('mysql:host=54.37.71.121;dbname=c57tradiceylon;charset=utf8', 'c57jeromea', 's7m_dU9J',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
/**
 * Méthode permettant d'enregistrer un utilisateur
 * @return boolean
 */
    public function addUser(){
        $addUser = $this->db->prepare('
            INSERT INTO ' . $this->table . '
            (`userName`, `email`, `password`)
            VALUES (:userName, :email, :password)
        ');
        $addUser->bindValue(':userName',$this->userName,PDO::PARAM_STR);
        $addUser->bindValue(':email',$this->email,PDO::PARAM_STR);
        $addUser->bindValue(':password',$this->password,PDO::PARAM_STR);
        return $addUser->execute();
    }

    /**
     * Méthode permettant de savoir une valeur d'un champ est déjà prise    
     * Valeur de retour :
     *  - True : la valeur est déjà prise
     *  - False : la valeur est disponible
     * @param array $field
     * @return boolean
     */
    public function checkUserUnavailabilityByFieldName($field){
        $whereArray = [];
        foreach($field as $fieldName ){
            $whereArray[] = '`' . $fieldName . '` = :' . $fieldName;
        }
        $where = ' WHERE ' . implode(' AND ', $whereArray);
        $checkUserUnavailabilityByFieldName = $this->db->prepare('
            SELECT COUNT(`id`) as `isUnavailable`
            FROM ' . $this->table 
            . $where
        ); 
        foreach($field as $fieldName ){
            $checkUserUnavailabilityByFieldName->bindValue(':'.$fieldName,$this->$fieldName,PDO::PARAM_STR);
        }
        $checkUserUnavailabilityByFieldName->execute();
        return $checkUserUnavailabilityByFieldName->fetch(PDO::FETCH_OBJ)->isUnavailable;
    }

    /**
     * Méthode permettant de récupérer le hash du mot de passe de l'utilisateur
     *
     * @return void
     */
    public function getUserPasswordHash(){
        $getUserPasswordHash = $this->db->prepare(
            'SELECT `password` 
            FROM ' . $this->table 
            . ' WHERE `email` = :email'
        );
        $getUserPasswordHash->bindValue(':email', $this->email, PDO::PARAM_STR);
        $getUserPasswordHash->execute();
        $response = $getUserPasswordHash->fetch(PDO::FETCH_OBJ);
        if(is_object($response)){
            return $response->password;
        }else{
            return '';
        }
    }
/**
 * Méthode permettant de récupérer les différentes infos d'un utilisateur
 * 
 * @return object
 */
    public function getUserAccount(){
        $getUserAccount = $this->db->prepare(
            'SELECT `id`, `userName`, id_roles
            FROM ' . $this->table .
            ' WHERE `email` = :email'
        );
        $getUserAccount->bindValue(':email', $this->email, PDO::PARAM_STR);
        $getUserAccount->execute();
        return $getUserAccount->fetch(PDO::FETCH_OBJ);
    }
    public function getUsersList() {
        $getUsersListQuery = $this->db->query(
            'SELECT `id`, `id_roles`, `userName`, `email`
            FROM `j5z9g2_users`'
            );
        return $getUsersListQuery->fetchAll(PDO::FETCH_OBJ);
        }
    public function getProfilUser() {
        $getProfilUserQuery = $this->db->prepare(
            'SELECT `id`, `userName`, `email`
            FROM `j5z9g2_users`
            WHERE `id` = :id '
        );
        $getProfilUserQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getProfilUserQuery->execute();
        return $getProfilUserQuery->fetch(PDO::FETCH_OBJ);
    }
    public function checkIdUsersExist() {
        $checkIdUsersExistQuery = $this->db->prepare(
            'SELECT COUNT(`id`) AS `isIdUserExist`
            FROM `j5z9g2_users` 
            WHERE `id` = :id '
        );
        $checkIdUsersExistQuery->bindvalue(':id', $this->id, PDO::PARAM_INT);
        $checkIdUsersExistQuery->execute();
        $data = $checkIdUsersExistQuery->fetch(PDO::FETCH_OBJ);
        return $data->isIdUserExist; 
    } 
    public function modifyUserProfil(){
        $modifyUserProfilQuery = $this->db->prepare(
           'UPDATE `j5z9g2_users` 
           SET `userName` = :userName, `email` = :email
           WHERE `id` = :id '
        );
        $modifyUserProfilQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        $modifyUserProfilQuery->bindValue(':userName', $this->userName, PDO::PARAM_STR);
        $modifyUserProfilQuery->bindValue(':email', $this->email, PDO::PARAM_STR);
        return $modifyUserProfilQuery->execute();
    }
    public function deleteUsers() {
        $deleteUsersQuery = $this->db->prepare(
            'DELETE FROM `j5z9g2_users`
            WHERE `id` = :id'
        );
        $deleteUsersQuery->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteUsersQuery->execute();
    }
}