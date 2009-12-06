<?php defined('SYSPATH') or die('No direct script access.'); ?>

2009-11-09 19:44:42 -05:00 --- error: Uncaught Kohana_Database_Exception: There was an SQL error: Duplicate entry 'Firehed' for key 'uniq_username' - INSERT INTO `users` (`username`, `email`, `password`) VALUES ('Firehed', 'firehed@gmail.com', '1e51fe17ce04e68c22e5cfeea93b0512b3a26c8f10831cebbe') in file /Applications/MAMP/htdocs/usfirstgirls/system/libraries/drivers/Database/Mysqli.php on line 142
2009-11-09 19:45:07 -05:00 --- error: Uncaught Kohana_Database_Exception: There was an SQL error: Table 'usfirstgirls.sessions' doesn't exist - SELECT *
FROM (`sessions`)
WHERE `session_id` = '72f0f0eab218835fe6b02b45dd33e9e4'
LIMIT 0, 1 in file /Applications/MAMP/htdocs/usfirstgirls/system/libraries/drivers/Database/Mysqli.php on line 142
2009-11-09 19:45:42 -05:00 --- error: Uncaught ErrorException: Uninitialized string offset: 1 in file /Applications/MAMP/htdocs/usfirstgirls/modules/auth/libraries/Auth.php on line 227
2009-11-09 19:47:37 -05:00 --- error: Missing i18n entry messages.session.register for language en_US
2009-11-09 19:47:52 -05:00 --- error: Uncaught Kohana_Exception: The requested view, welcome, could not be found in file /Applications/MAMP/htdocs/usfirstgirls/system/core/Kohana.php on line 1162
2009-11-09 19:49:02 -05:00 --- error: Uncaught Kohana_Exception: The requested view, blog, could not be found in file /Applications/MAMP/htdocs/usfirstgirls/system/core/Kohana.php on line 1162
2009-11-09 19:49:19 -05:00 --- error: Uncaught Kohana_Exception: The requested view, blog/index, could not be found in file /Applications/MAMP/htdocs/usfirstgirls/system/core/Kohana.php on line 1162
2009-11-09 19:49:31 -05:00 --- error: Missing i18n entry titles.blog.index for language en_US
2009-11-09 20:08:16 -05:00 --- error: Missing i18n entry titles.blog.index for language en_US
2009-11-09 20:13:38 -05:00 --- error: Missing i18n entry titles.blog.index for language en_US
2009-11-09 20:15:11 -05:00 --- error: Uncaught Kohana_Exception: Invalid method order_by called in Blog_Post_Model in file /Applications/MAMP/htdocs/usfirstgirls/system/libraries/ORM.php on line 257
2009-11-09 20:15:24 -05:00 --- error: Missing i18n entry titles.blog.index for language en_US
2009-11-09 22:46:01 -05:00 --- error: Uncaught Kohana_Exception: The theadCount property does not exist in the Forum_Model class. in file /Applications/MAMP/htdocs/usfirstgirls/system/libraries/ORM.php on line 364
2009-11-09 22:46:18 -05:00 --- error: Uncaught Kohana_404_Exception: The page you requested, thread/view/2, could not be found. in file /Applications/MAMP/htdocs/usfirstgirls/system/core/Kohana.php on line 841
