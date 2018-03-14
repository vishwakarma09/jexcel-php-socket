# jexcel-php-socket
A project to show jexcel backend with php using web socket 

#steps of installation

1. clone repositary
2. in the root foler of application do - `composer install`
3. import the `ratchet.sql` script in a database. Update the db connection settings in the `src/Chat.php`
4. run socket server from the root directory by running `php bin\chat-server.php`
5. Open the sheet page from `http://localhost/some_folder/column.php`
6. The web socket server running on port 8080 will connect to load the excel sheet entries

#demo

http://18.216.2.71/ratchet/column.php

For any questions, ask on github
