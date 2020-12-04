<?php


class CountryManager extends Manager {
    function getAllCountry() {
        $listCountry = array();
    
        $querySQL = "SELECT country_id, country_short, en_country_name, fr_country_name FROM country";
        $query = $this->db->query($querySQL);
    
        while ($countryData = $query->fetch()) {
            $country = new Country($countryData);
            $listCountry[] = $country;
        }
    
        $query->closeCursor();
        return $listCountry;
    }
    

    
    public function getCountryByID($country_ID) {
        $querySQL = "SELECT country_id, country_short, en_country_name, fr_country_name FROM country WHERE country_id = $country_ID";
        $query = $this->db->prepare($querySQL);
        $query->execute();
        
        $countryData = $query->fetch(PDO::FETCH_ASSOC);
        if ($countryData !== false) {
            return new Country($countryData);
        } else {
            return false;
        }
    }
}