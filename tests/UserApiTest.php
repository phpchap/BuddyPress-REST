<?php
$ds = DIRECTORY_SEPARATOR; 
require dirname(__FILE__) . $ds . "..".$ds."src".$ds."api".$ds."UserAPI.php";


class UserApiTest extends PHPUnit_Framework_TestCase 
{
    private $u;
    
    public function setUp()
    {
        $this->u = new UserAPI();
    }
    
    public function testGetUsers() 
    {
       $requested = $this->u->get();
       print_r($requested);
    }
    /*
    public function testGetRequested() 
    {
       $requested = $this->u->getRequested();
       print_r($requested);
    }
     * 
     */
}