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
            $this->db = new PDO('mysql:host=localhost;dbname=tradiceylon;charset=utf8', 'root', '');
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
    public function getUserProfile(){
        $getUserProfile = $this->db->prepare(
            'SELECT `id`, `userName`
            FROM ' . $this->table 
            . ' WHERE `email` = :email'
        );
        $getUserProfile->bindValue(':email', $this->email, PDO::PARAM_STR);
        $getUserProfile->execute();
        return $getUserProfile->fetch(PDO::FETCH_OBJ);
    }

}