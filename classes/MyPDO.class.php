<?php


/**
 * Class MyPDO
 * This class is used to create an instance of the database access.
 */
class MyPDO extends PDO {
    protected $dbo;
    
    /**
     * MyPDO constructor.
     */
	public function __construct() {
		$environmentIsDev = (ENV == 'dev');

		try {
			$this->dbo = parent::__construct("mysql:host=".getDBHost()."; dbname=".getDBName()."; port=".DB_PORT.";charset=UTF8",
											 DB_USER,
											 DB_PASSWD,
											 array(
											 	PDO::ATTR_PERSISTENT => true,
												PDO::ATTR_ERRMODE => $environmentIsDev,
												PDO::ERRMODE_EXCEPTION => $environmentIsDev));

		} catch (PDOException $e) {
		    if ($environmentIsDev) {
                echo 'Connection error : ' . $e->getMessage();
            }
		}
	}

}