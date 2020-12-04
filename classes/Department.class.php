<?php


class Department {
    private $department_id;
    private $department_name;
    private $country;
    
    
    
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
                case 'department_id' :
                    $this->department_id = $value;
                    break;
                case 'department_name' :
                    $this->department_name = $value;
                    break;
                case 'country' :
                    $this->country = $value;
                    break;
                case 'country_data' :
                    $this->country = new Country($value);
                    break;
            }
        }
    }
    
    
    
    /**
     * @return mixed
     */
    public function getDepartmentId() {
        return $this->department_id;
    }
    /**
     * @param mixed $department_id
     */
    public function setDepartmentId($department_id) {
        $this->department_id = $department_id;
    }
    
    
    /**
     * @return mixed
     */
    public function getDepartmentName() {
        return $this->department_name;
    }
    /**
     * @param mixed $department_name
     */
    public function setDepartmentName($department_name) {
        $this->department_name = $department_name;
    }
    
    
    /**
     * @return mixed
     */
    public function getCountry() {
        return $this->country;
    }
    /**
     * @param mixed $country
     */
    public function setCountry($country) {
        $this->country = $country;
    }
}