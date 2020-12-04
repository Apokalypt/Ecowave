<?php


class RegionManager extends Manager {
    public function convertDBArrayToRightArray($regionData) {
        if (!empty($regionData['fk_country_id'])) {
            $regionData['country'] = (new CountryManager($this->db))->getCountryByID($regionData['fk_country_id']);
            unset($regionData['fk_country_id']);
        }
        
        return $regionData;
    }
    
    
    function getAllRegion() {
        $listRegion = array();
        
        $querySQL = "SELECT region_id, region_name, fk_country_id FROM region";
        $query = $this->db->query($querySQL);
        
        while ($regionData = $query->fetch()) {
            $regionData = $this->convertDBArrayToRightArray($regionData);
            
            $region = new Region($regionData);
            $listRegion[] = $region;
        }
        
        $query->closeCursor();
        return $listRegion;
    }
    
    
    function getRegionById($region_id) {
        $querySQL = "SELECT region_id, region_name, fk_country_id FROM region WHERE region_id = $region_id";
        $query = $this->db->prepare($querySQL);
        $query->execute();
        
        $regionData = $query->fetch(PDO::FETCH_ASSOC);
        if ($regionData !== false) {
            $regionData = $this->convertDBArrayToRightArray($regionData);
            
            return new Region($regionData);
        } else {
            return false;
        }
    }
    
    function getRegionByCountryId($country_id) {
        $listRegion = array();
        
        $querySQL = "SELECT region_id, region_name, fk_country_id FROM region WHERE fk_country_id = $country_id";
        $query = $this->db->query($querySQL);
    
        while ($regionData = $query->fetch()) {
            $regionData = $this->convertDBArrayToRightArray($regionData);
        
            $region = new Region($regionData);
            $listRegion[] = $region;
        }
    
        $query->closeCursor();
        return $listRegion;
    }
}