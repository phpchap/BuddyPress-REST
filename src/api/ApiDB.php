<?php
$ds = DIRECTORY_SEPARATOR; 
$src_folder = dirname(__FILE__) . $ds . "..".$ds."..".$ds."src";
require_once $src_folder.$ds."wp-config.php";

/**
 * MySQL DB. All data is stored in data_pdo_mysql database
 * Create an empty MySQL database and set the dbname, username
 * and password below
 * 
 * This class will create the table with sample data
 * automatically on first `get` or `get($id)` request
 */
class ApiDB
{
    private $db;
    
    function __construct(){}
    
    function connect_to_db()
    {
        try {  
            $this->db = new PDO(
            'mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, 
            PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new RestException(501, 'MySQL: ' . $e->getMessage());
        }        
    }
    
    // query the database 
    function query($sql)
    {
        $this->connect_to_db();
        $rs = $this->db->query($sql);      
        if(is_object($rs)) {
            return $rs->fetch();  
        } else {
            throw new Exception("error with SQL: ".$sql);
        }
    }
}