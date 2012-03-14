<?php
$ds = DIRECTORY_SEPARATOR; 
require dirname(__FILE__) . $ds . "ApiDB.php";

/**
 * connect to the database and run user specific database queries 
 */
class UserDB{
    
    /**
     * database resource handle 
     * @var resource PDO database connection
     * @access private 
     */
    private $_db = "";

    /**
     * instantiate the User class with a PDO database connection
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @return object $this instance of the User class
     */
    public function __construct()
    {
        // access the database 
        $this->_db = new ApiDB();
        
        // return the class for fluency
        return $this;
    } 
    
    /**
     * return the database connection
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @return resource $_db database connection
     */
    public function getDB()
    {
        // set the database resource
        return $this->_db;
    }    
    
    /**
     * get a users friend
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @param type $userId
     * @param type $friendId 
     * 
     * @return array friend array
     */    
    public function getRequested($userId="") 
    {
        // empty user id
        if($userId=="") {
            throw new RestException(400, 'user id is null');
        }
        
        // not a digit 
        if(!ctype_digit($userId)) {
            throw new RestException(400, 'user id data type is incorrect');
        }
        
        // build the SQL
        $sql="SELECT 
        f.id as friendship_id,
        f.initiator_user_id as user_id,
        f.friend_user_id as friend_id,
        f.is_confirmed as is_confirmed,
        f.is_limited as is_limited,
        f.date_created,
        u.user_login,
        u.user_nicename,
        u.user_email,
        u.user_url,
        u.user_registered,
        u.user_activation_key,
        u.user_status,
        u.display_name
        FROM
        wp_bp_friends f,
        wp_users u
        WHERE
        f.initiator_user_id = u.ID AND
        f.is_confirmed = 0 AND
        u.ID = ".$userId; 
        
        // do the request       
        return $this->doRequest($sql, "No friends requested");
    }
    
    
    /**
     * get a user
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @param type $userId
     * 
     * @return array user info
     */    
    public function getUser($userId)
    {
        // build the SQL
        $sql="SELECT 
        u.user_login,
        u.user_nicename,
        u.user_email,
        u.user_url,
        u.user_registered,
        u.user_activation_key,
        u.user_status,
        u.display_name
        FROM
        wp_users u
        WHERE
        u.ID = ".$userId;
        
        // do the request
        return $this->doRequest($sql, "No user found");
    }
    
      
    /**
     * get a list of user
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @param type $userId
     * 
     * @return array list of users info
     */    
    public function getUsers()
    {
        // build the SQL
        $sql="SELECT 
        u.user_login,
        u.user_nicename,
        u.user_email,
        u.user_url,
        u.user_registered,
        u.user_activation_key,
        u.user_status,
        u.display_name
        FROM
        wp_users u";

        // do the request
        return $this->doRequest($sql, "No users found");
    }
    
    
    /**
     * accept a users friend request
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @param type $userId
     * @param type $friendId 
     * 
     * @return array friend info
     */
    public function acceptFriend($userId, $friendId)
    {
        // build sql
        $sql="UPDATE 
        wp_bp_friends f
        SET
        f.is_confirmed = 1
        WHERE 
        f.initiator_user_id = $userId AND
        f.friend_user_id = $friendId";
       
        // do the request
        return $this->doRequest($sql, "Error accepting friend");
    }
    
    
    /**
     * reject a users friend request
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @param type $userId
     * @param type $friendId 
     * 
     * @return array friend info
     */
    public function rejectFriend($userId, $friendId)
    {
        // build sql
        $sql="DELETE FROM  
        wp_bp_friends f
        WHERE 
        f.initiator_user_id = $userId AND
        f.friend_user_id = $friendId";
       
        // do the request
        return $this->doRequest($sql, "Error rejecting friend");
    }
    
    
    /**
     * get a users friend
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @param type $userId
     * @param type $friendId 
     * 
     * @return array friend info
     */
    public function getFriend($userId, $friendId)
    {
        // build sql
        $sql="SELECT 
        f.id as friendship_id,
        f.initiator_user_id as user_id,
        f.friend_user_id as friend_id,
        f.is_confirmed as is_confirmed,
        f.is_limited as is_limited,
        f.date_created,
        u.user_login,
        u.user_nicename,
        u.user_email,
        u.user_url,
        u.user_registered,
        u.user_activation_key,
        u.user_status,
        u.display_name
        FROM
        wp_bp_friends f,
        wp_users u
        WHERE
        f.initiator_user_id = u.ID AND
        f.is_confirmed = 0 AND
        u.ID = $userId AND
        f.friend_user_id = $friendId";

        // do the request
        return $this->doRequest($sql, "No Friend Found");
    }    
    
    /**
     * get a list users friends
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @param type $userId
     * @param type $friendId 
     * 
     * @return array list of friend arrays
     */    
    public function getFriends($userId)
    {
        // build sql
        $sql="SELECT 
        f.id as friendship_id,
        f.initiator_user_id as user_id,
        f.friend_user_id as friend_id,
        f.is_confirmed as is_confirmed,
        f.is_limited as is_limited,
        f.date_created,
        u.user_login,
        u.user_nicename,
        u.user_email,
        u.user_url,
        u.user_registered,
        u.user_activation_key,
        u.user_status,
        u.display_name
        FROM
        wp_bp_friends f,
        wp_users u
        WHERE
        f.initiator_user_id = u.ID AND
        f.is_confirmed = 0 AND
        u.ID = $userId";

        return $this->doRequest($sql, "No friends found");           
    }
    
    /**
     * make the request
     * 
     * @author Justen Doherty <phpchap@gmail.com>
     * 
     * @param type $userId
     * @param type $friendId 
     * 
     * @return 
     */    
    public function doRequest($sql, $errorMessage="")
    {
        // attempt to run the query
        try {
            
            // fetch the result
            $rs = $this->_db->query($sql);
            
            if($rs == false) {
                return array("error" => $errorMessage);
            } else {
                return $rs;
            }
        // report any problems
        } catch(Exception $e) {
            if($errorMessage != "") {
                return $e->getMessage();                
            } else {
                return array("error" => $errorMessage);
            }
        }        
    }
}