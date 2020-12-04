<?php


class User  {
    private $user_id;
    private $user_pseudo;
    private $user_picture;
    private $user_biography;
    private $user_mail;
    private $user_password;
    
    /**
     * User constructor.
     * @param array $data
     */
    public function __construct($data = array()) {
        if (!empty($data))
            $this->affects($data);
    }
    
    protected function affects(array $data) {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'user_id' :
                    $this->user_id = $value;
                    break;
                case 'user_pseudo' :
                    $this->user_pseudo = $value;
                    break;
                case 'user_picture' :
                    $this->user_picture = $value;
                    break;
                case 'user_biography' :
                    $this->user_biography = $value;
                    break;
                case 'user_mail' :
                    $this->user_mail = $value;
                    break;
                case 'user_password' :
                    $this->user_password = $value;
                    break;
            }
        }
    }
    
    /**
     * @return mixed
     */
    public function getUserId() {
        return $this->user_id;
    }
    
    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
    
    /**
     * @return mixed
     */
    public function getUserPseudo() {
        return $this->user_pseudo;
    }
    
    /**
     * @param mixed $user_pseudo
     */
    public function setUserPseudo($user_pseudo) {
        $this->user_pseudo = $user_pseudo;
    }
    
    /**
     * @return mixed
     */
    public function getUserPicture() {
        return $this->user_picture;
    }
    
    /**
     * @param mixed $user_picture
     */
    public function setUserPicture($user_picture) {
        $this->user_picture = $user_picture;
    }
    
    /**
     * @return mixed
     */
    public function getUserBiography() {
        return $this->user_biography;
    }
    /**
     * @param mixed $user_biography
     */
    public function setUserBiography($user_biography) {
        $this->user_biography = $user_biography;
    }
    
    /**
     * @return mixed
     */
    public function getUserMail() {
        return $this->user_mail;
    }
    /**
     * @param mixed $user_mail
     */
    public function setUserMail($user_mail) {
        $this->user_mail = $user_mail;
    }
    
    /**
     * @return mixed
     */
    public function getUserPassword() {
        return $this->user_password;
    }
    /**
     * @param mixed $user_password
     */
    public function setUserPassword($user_password) {
        $this->user_password = $user_password;
    }
}