<?php
return array(
	'import' => array(
     'application.modules.admin_poll.models.*',
     'application.modules.admin_poll.components.*',
   ),
   'modules' => array(
     'admin_poll' => array(
       // Force users to vote before seeing results
       'forceVote' => TRUE,
       // Restrict anonymous votes by IP address,
       // otherwise it's tied only to user_id 
       'ipRestrict' => TRUE,
       // Allow guests to cancel their votes
       // if ipRestrict is enabled
       'allowGuestCancel' => FALSE,
     ),
   ),
);