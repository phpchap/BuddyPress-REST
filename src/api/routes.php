<?php $o=array();



############### GET ###############

$o['GET']=array();

#==== GET userapi/:userId/getFriend/:friendId

$o['GET']['userapi/:userId/getFriend/:friendId']=array (
	  'class_name' => 'UserAPI',
	  'method_name' => 'getFriend',
	  'arguments' => 
	  array (
	    'userId' => 0,
	    'friendId' => 1,
	  ),
	  'defaults' => 
	  array (
	    0 => '',
	    1 => '',
	  ),
	  'metadata' => 
	  array (
	    'description' => 'Add a new friend
	http://www.example.com/api/index.php/userapi/1/requested',
	    'author' => 'Justen Doherty <phpchap@gmail.com>',
	    'param' => 
	    array (
	      0 => '(int)$user_id id of user to fetch',
	      1 => '(int)$friend_id id/array of friends to add',
	    ),
	    'return' => '(boolean)success/failure',
	    'url' => 0,
	  ),
	  'method_flag' => 0,
	);

#==== GET userapi/:userId/getFriends

$o['GET']['userapi/:userId/getFriends']=array (
	  'class_name' => 'UserAPI',
	  'method_name' => 'getFriend',
	  'arguments' => 
	  array (
	    'userId' => 0,
	    'friendId' => 1,
	  ),
	  'defaults' => 
	  array (
	    0 => '',
	    1 => '',
	  ),
	  'metadata' => 
	  array (
	    'description' => 'Add a new friend
	http://www.example.com/api/index.php/userapi/1/requested',
	    'author' => 'Justen Doherty <phpchap@gmail.com>',
	    'param' => 
	    array (
	      0 => '(int)$user_id id of user to fetch',
	      1 => '(int)$friend_id id/array of friends to add',
	    ),
	    'return' => '(boolean)success/failure',
	    'url' => 0,
	  ),
	  'method_flag' => 0,
	);

#==== GET userapi/:userId/requested

$o['GET']['userapi/:userId/requested']=array (
	  'class_name' => 'UserAPI',
	  'method_name' => 'rejectFriend',
	  'arguments' => 
	  array (
	    'userId' => 0,
	    'friendId' => 1,
	  ),
	  'defaults' => 
	  array (
	    0 => NULL,
	    1 => NULL,
	  ),
	  'metadata' => 
	  array (
	    'description' => 'Reject a friend request
	http://www.example.com/api/index.php/userapi/1/requested',
	    'author' => 'Justen Dohert <phpchap@gmail.com>',
	    'param' => 
	    array (
	      0 => '(int)$user_id user_id of the user to fetch',
	      1 => '(int)$friend_id friend_id of friend to accept',
	    ),
	    'return' => '(boolean)successfully rejected friendship',
	    'url' => 'GET /:userId/requested',
	  ),
	  'method_flag' => 0,
	);
return $o;