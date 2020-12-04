<?php


class UserManager extends Manager {
    public function convertDBArrayToRightArray($userData) {
        if (!empty($userData['fk_country_id'])) {
            $userData['country'] = (new CountryManager($this->db))->getCountryByID($userData['fk_country_id']);
            unset($userData['fk_country_id']);
        }
        
        return $userData;
    }
    
    public function addUser($user_mail, $user_password, $user_pseudo) {
        $query = $this->db->prepare("INSERT INTO user (user_pseudo, user_picture, user_biography, user_mail, user_password) VALUES (:pseudo, '', '', :mail, :password)");
        $query->bindValue(':pseudo', $user_pseudo);
        $query->bindValue(':mail', $user_mail);
        $query->bindValue(':password', $user_password);
        $query->execute();
    
        return $this->db->lastInsertId();
    }
    
    public function updateUser(User $user) {
        $query = $this->db->prepare("UPDATE user SET user_pseudo = :user_pseudo, user_mail = :user_mail, user_biography = :user_biography, user_password = :user_password, user_picture = :user_picture WHERE user_id = :user_id");
        $query->bindValue(':user_id', $user->getUserId());
        $query->bindValue(':user_pseudo', $user->getUserPseudo());
        $query->bindValue(':user_picture', $user->getUserPicture());
        $query->bindValue(':user_biography', $user->getUserBiography());
        $query->bindValue(':user_mail', $user->getUserMail());
        $query->bindValue(':user_password', $user->getUserPassword());
        return $query->execute();
    }
    
    
    public function connect($user_mail, $user_password) {
        $querySQL = "SELECT user_id, user_pseudo, user_picture, user_biography, user_mail, user_password FROM user WHERE user_mail = '$user_mail' AND user_password = '$user_password'";
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
        $querySQL = "SELECT user_id, user_pseudo, user_picture, user_biography, user_mail, user_password FROM user WHERE user_id = $user_ID";
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