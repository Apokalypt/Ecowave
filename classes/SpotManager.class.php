<?php


class SpotManager extends Manager {
    public function convertDBArrayToRightArray($spotData) {
        if (!empty($spotData['spot_region'])) {
            $spotData['region'] = (new RegionManager($this->db))->getRegionById($spotData['spot_region']);
            unset($spotData['spot_region']);
        }
    
        if (!empty($spotData['spot_department'])) {
            $spotData['department'] = (new RegionManager($this->db))->getRegionById($spotData['spot_department']);
            unset($spotData['spot_department']);
        }
    
        if (!empty($spotData['fk_user_id'])) {
            $spotData['user'] = (new UserManager($this->db))->getUserByID($spotData['fk_user_id']);
            unset($spotData['fk_user_id']);
        }
        
        return $spotData;
    }
    
    function getSpotByCity($city) {
        $querySQL = "SELECT spot_id, spot_name, spot_city, spot_details, spot_department, spot_region, fk_user_id FROM spot WHERE spot_city = $city";
        $query = $this->db->prepare($querySQL);
        $query->execute();
        
        $spotData = $query->fetch(PDO::FETCH_ASSOC);
        if ($spotData !== false) {
            $spotData = $this->convertDBArrayToRightArray($spotData);
            
            return new Spot($spotData);
        } else {
            return false;
        }
    }
    
    function getSpotByDepartment(Department $department) {
        $querySQL = "SELECT spot_id, spot_name, spot_city, spot_details, spot_department, spot_region, fk_user_id FROM spot WHERE spot_department = ':department_id'";
        $query = $this->db->prepare($querySQL);
        $query->bindValue(':department_id', $department->getDepartmentId());
        $query->execute();
        
        $spotData = $query->fetch(PDO::FETCH_ASSOC);
        if ($spotData !== false) {
            $spotData = $this->convertDBArrayToRightArray($spotData);
            
            return new Spot($spotData);
        } else {
            return false;
        }
    }
    
    
    function getSpotByRegion(Region $region) {
        $listSpot = array();
        
        $querySQL = "SELECT spot_id, spot_name, spot_city, spot_details, spot_department, spot_region, fk_user_id FROM spot WHERE spot_region = :region_id";
        $query = $this->db->prepare($querySQL);
        $query->bindValue(':region_id', $region->getRegionId());
        $query->execute();
    
        while ($spotData = $query->fetch()) {
            $spotData = $this->convertDBArrayToRightArray($spotData);
        
            $spot = new Spot($spotData);
            $listSpot[] = $spot;
        }
    
        $query->closeCursor();
        return $listSpot;
    }
    
    
    function getSpotById($spot_id) {
        $querySQL = "SELECT spot_id, spot_name, spot_city, spot_details, spot_department, spot_region, fk_user_id FROM spot WHERE spot_id = $spot_id";
        $query = $this->db->prepare($querySQL);
        $query->execute();
        
        $spotData = $query->fetch(PDO::FETCH_ASSOC);
        if ($spotData !== false) {
            $spotData = $this->convertDBArrayToRightArray($spotData);
            
            return new Spot($spotData);
        } else {
            return false;
        }
    }
}