<?php


class DepartmentManager extends Manager {
    public function convertDBArrayToRightArray($departmentData) {
        if (!empty($departmentData['fk_country_id'])) {
            $departmentData['country'] = (new CountryManager($this->db))->getCountryByID($departmentData['fk_country_id']);
            unset($departmentData['fk_country_id']);
        }
        
        return $departmentData;
    }
    
    
    function getAllDepartment() {
        $listDepartment = array();
        
        $querySQL = "SELECT department_id, department_name, fk_country_id FROM department";
        $query = $this->db->query($querySQL);
        
        while ($departmentData = $query->fetch()) {
            $departmentData = $this->convertDBArrayToRightArray($departmentData);
            
            $department = new Department($departmentData);
            $listDepartment[] = $department;
        }
        
        $query->closeCursor();
        return $listDepartment;
    }
    
    
    function getDepartmentById($department_id) {
        $querySQL = "SELECT department_id, department_name, fk_country_id FROM department WHERE department_id = $department_id";
        $query = $this->db->prepare($querySQL);
        $query->execute();
    
        $departmentData = $query->fetch(PDO::FETCH_ASSOC);
        if ($departmentData !== false) {
            $departmentData = $this->convertDBArrayToRightArray($departmentData);
    
            return new Department($departmentData);
        } else {
            return false;
        }
    }
}