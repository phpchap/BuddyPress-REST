<?php
$ds = DIRECTORY_SEPARATOR; 
require dirname(__FILE__) . $ds . "UserDB.php";

class UserAPI {
    
    /**
     * reference to the user database queries
     * @var type 
     */
    private $_userDb; 
    
    /**
     * instantiate the User class with a PDO database connection
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @return object $this instance of the User class
     */
    public function __construct($id="")
    {
        $this->_userDb = new UserDB();
        return $this;
    }
    
    /**
     * Add a new friend 
     * http://www.example.com/api/index.php/userapi/1/requested
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @param int $user_id id of user to fetch
     * @param int $friend_id id/array of friends to add
     * @return boolean success/failure
     * 
     * @url GET /:userId/getFriend/:friendId
     * @url GET /:userId/getFriends/
     */    
    public function getFriend($userId="", $friendId="") 
    {    
        // do we get a specific friend or all friends
        if($friendId=="") {
            return $this->_userDb->getFriends($userId); 
        } else {
            return $this->_userDb->getFriend($userId, $friendId); 
        }
    }

    /**
    * Get a list of users
    * http://www.example.com/api/index.php/userapi/1/requested
    * 
    * @author Justen Doherty <phpchap@gmail.com>
    * 
    * @param int $user id (optional) fetch a single user or a list of users
    * @return array $friends list of friends  
    * 
    * @url GET /:userId/requested
    */    
    function get($userId="") 
    {
        // fetch all users or a single user
        if($userId=="") {
            return $this->_userDb->getUsers(); 
        } else {
            return $this->_userDb->getUser($userId);
        }        
    }

    /**
    * Get a list of users
    * http://www.example.com/api/index.php/userapi/1/requested
    * 
    * @author Justen Doherty <phpchap@gmail.com>
    * 
    * @param int $user id (optional) fetch a single user or a list of users
    * @return array $friends list of friends  
    * 
    * @url GET /:userId/requested
    */ 
    public function requested($userId="") 
    {
        return $this->_userDb->getRequested($userId);    
    }
    
    
    /**
     * Accept a friend request
     * 
     * http://www.example.com/api/index.php/userapi/1/requested
     * 
     * @author Justen Dohert <phpchap@gmail.com>
     * 
     * @param int $user_id user_id of the user to fetch
     * @param int $friend_id friend_id of friend to accept
     * @return boolean successfully accepted friendship
     * 
     * @url POST /:userId/acceptFriend/:friendId
     */
    public function acceptFriend($userId, $friendId) 
    {
        return $this->_userDb->acceptFriend($userId, $friendId);        
    }

    /**
     * Reject a friend request
     * http://www.example.com/api/index.php/userapi/1/requested    
     *  
     * @author Justen Dohert <phpchap@gmail.com>
     * 
     * @param int $user_id user_id of the user to fetch
     * @param int $friend_id friend_id of friend to accept
     * @return boolean successfully rejected friendship
     * 
     * @url POST /:userId/rejectFriend/:friendId
     */
    public function rejectFriend($userId, $friendId) 
    {
        return $this->_userDb->rejectFriend($userId, $friendId);      
    }    
}