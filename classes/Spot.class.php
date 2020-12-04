<?php


class Spot {
    private $spot_id;
    private $spot_city;
    private $spot_details;
    private $spot_name;
    private $department;
    private $region;
    private $user;
    
    
    
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
                case 'spot_id' :
                    $this->spot_id = $value;
                    break;
                case 'spot_city' :
                    $this->spot_city = $value;
                    break;
                case 'spot_details' :
                    $this->spot_details = $value;
                    break;
                case 'spot_name' :
                    $this->spot_name = $value;
                    break;
                case 'department' :
                    $this->department = $value;
                    break;
                case 'department_data' :
                    $this->department = new Department($value);
                    break;
                case 'region' :
                    $this->region = $value;
                    break;
                case 'region_data' :
                    $this->region = new Region($value);
                    break;
                case 'user' :
                    $this->user = $value;
                    break;
                case 'user_data' :
                    $this->user = new User($value);
                    break;
            }
        }
    }
    
    
    
    /**
     * @return mixed
     */
    public function getSpotId() {
        return $this->spot_id;
    }
    /**
     * @param mixed $spot_id
     */
    public function setSpotId($spot_id) {
        $this->spot_id = $spot_id;
    }
    
    
    /**
     * @return mixed
     */
    public function getSpotCity() {
        return $this->spot_city;
    }
    /**
     * @param mixed $spot_city
     */
    public function setSpotCity($spot_city) {
        $this->spot_city = $spot_city;
    }
    
    
    /**
     * @return mixed
     */
    public function getSpotName() {
        return $this->spot_name;
    }
    /**
     * @param mixed $spot_name
     */
    public function setSpotName($spot_name) {
        $this->spot_name = $spot_name;
    }
    
    
    /**
     * @return mixed
     */
    public function getSpotDetails() {
        return $this->spot_details;
    }
    /**
     * @param mixed $spot_details
     */
    public function setSpotDetails($spot_details) {
        $this->spot_details = $spot_details;
    }
    
    
    /**
     * @return mixed
     */
    public function getDepartment() {
        return $this->department;
    }
    /**
     * @param mixed $department
     */
    public function setDepartment($department) {
        $this->department = $department;
    }
    
    
    /**
     * @return mixed
     */
    public function getRegion() {
        return $this->region;
    }
    /**
     * @param mixed $region
     */
    public function setRegion($region) {
        $this->region = $region;
    }
    
    
    /**
     * @return mixed
     */
    public function getUser() {
        return $this->user;
    }
    /**
     * @param mixed $user
     */
    public function setUser($user) {
        $this->user = $user;
    }
}