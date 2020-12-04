<?php


class Region {
    private $region_id;
    private $region_name;
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
                case 'region_id' :
                    $this->region_id = $value;
                    break;
                case 'region_name' :
                    $this->region_name = $value;
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
    public function getRegionId() {
        return $this->region_id;
    }
    /**
     * @param mixed $region_id
     */
    public function setRegionId($region_id) {
        $this->region_id = $region_id;
    }
    
    
    /**
     * @return mixed
     */
    public function getRegionName() {
        return $this->region_name;
    }
    /**
     * @param mixed $region_name
     */
    public function setRegionName($region_name) {
        $this->region_name = $region_name;
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