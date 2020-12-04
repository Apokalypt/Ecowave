<?php


class UserManager extends Manager {
    public function convertDBArrayToRightArray($userData) {
        if (!empty($userData['fk_country_id'])) {
            $userData['country'] = (new CountryManager($this->db))->getCountryByID($userData['fk_country_id']);
            unset($userData['fk_country_id']);
        }
        
        return $userData;
    }
    
    public function addUser($user_mail, $user_password) {
        $query = $this->db->prepare("INSERT INTO user (user_pseudo, user_picture, fk_country_id, user_biography, user_mail, user_password) VALUES ('', '', '', '', :mail, :password)");
        $query->bindValue(':mail', $user_mail);
        $query->bindValue(':password', $user_password);
        $query->execute();
    
        return $this->db->lastInsertId();
    }
    
    
    public function connect($user_mail, $user_password) {
        $querySQL = "SELECT user_id, user_pseudo, user_picture, fk_country_id, user_biography, user_mail, user_password FROM user WHERE user_mail = '$user_mail' AND user_password = '$user_password'";
        $query = $this->db->prepare($querySQL);
        $query->execute();
        
        $userData = $query->fetch(PDO::FETCH_ASSOC);
        if ($userData !== false) {
            $userData = $this->convertDBArrayToRightArray($userData);
            return new User($userData);
        } else {
            return false;
        }
    }
    

    public function getUserByID($user_ID) {
        $querySQL = "SELECT user_pseudo FROM user WHERE user_id = $user_ID";
        $query = $this->db->prepare($querySQL);
        $query->execute();
        
        $userData = $query->fetch(PDO::FETCH_ASSOC);
        if ($userData !== false) {
            $userData = $this->convertDBArrayToRightArray($userData);
            return new User($userData);
        } else {
            return false;
        }
    }
}