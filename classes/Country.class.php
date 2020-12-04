<?php


class Country {
    private $country_id;
    private $country_short;
    private $en_country_name;
    private $fr_country_name;
    
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
                case 'country_id' :
                    $this->country_id = $value;
                    break;
                case 'country_short' :
                    $this->country_short = $value;
                    break;
                case 'en_country_name' :
                    $this->en_country_name = $value;
                    break;
                case 'fr_country_name' :
                    $this->fr_country_name = $value;
                    break;
            }
        }
    }
    
    /**
     * @return mixed
     */
    public function getCountryId() {
        return $this->country_id;
    }
    /**
     * @param mixed $country_id
     */
    public function setCountryId($country_id) {
        $this->country_id = $country_id;
    }
    
    
    /**
     * @return mixed
     */
    public function getCountryShort() {
        return $this->country_short;
    }
    /**
     * @param mixed $country_short
     */
    public function setCountryShort($country_short) {
        $this->country_short = $country_short;
    }
    
    
    /**
     * @return mixed
     */
    public function getEnCountryName() {
        return $this->en_country_name;
    }
    /**
     * @param mixed $en_country_name
     */
    public function setEnCountryName($en_country_name) {
        $this->en_country_name = $en_country_name;
    }
    
    
    /**
     * @return mixed
     */
    public function getFrCountryName() {
        return $this->fr_country_name;
    }
    /**
     * @param mixed $fr_country_name
     */
    public function setFrCountryName($fr_country_name) {
        $this->fr_country_name = $fr_country_name;
    }
}