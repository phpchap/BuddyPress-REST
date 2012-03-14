BuddyPress API
-------------------

Users
-----

Add a new friend 
POST user/:user_id/friends/add/:friend_id ⇠ User::addFriend($user_id, $friend_id)
http://www.example.com/api/user/1/friends/add/2


Get a list of friends
GET user/:user_id/friends/get ⇠ User::getFriends($user_id)
http://www.example.com/api/user/1/friends/


Get a list of users
GET user/get ⇠ User::getUsers()
http://www.example.com/api/user/get/



Get a specific friend
GET user/:user_id/friends/get/:friend_id ⇠ User::getFriend($user_id, $friend_id)
http://www.example.com/api/user/1/friends/2


List friend requests
POST user/:user_id/friends/requested/ ⇠ User::getRequested($user_id)
http://www.example.com/api/user/1/requested/


Accept a friend request
POST user/:user_id/friends/accept/:friend_id ⇠ User::acceptFriend($user_id, $friend_id)
http://www.example.com/api/user/1/acceptFriend/2


Reject a friend request
POST user/:user_id/friends/reject/:friend_id ⇠ User::rejectFriend($user_id, $friend_id)
http://www.example.com/api/user/1/rejectFriend/2


Groups
-----

Get a list of groups
GET api/groups/getGroups/ ⇠ Groups::getGroups()
