<?php

// This class needs to extend all manager class
class Manager {
    protected $db;
    
    /**
     * Manager constructor.
     *
     * @param MyPDO $db
     */
    public function __construct(MyPDO $db) { $this->db = $db; }
    
    /**
     * This function return the current date of the database.
     *
     * @return false|mixed
     */
    public function getTimeNow() {
        $querySQL = "SELECT NOW() as Date";
        $query = $this->db->prepare($querySQL);
        $query->execute();
    
        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data !== false) {
            return $data['Date'];
        } else {
            return false;
        }
    }
}