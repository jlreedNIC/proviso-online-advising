# proviso-online-advising
An online career centered advising program for the University of Idaho. For CS360 Database Systems

# Other Libraries/Projects used
https://gojs.net/latest/index.html

# Running ProViso on your local machine
- Download the zip containing the repository on local machine
- Make sure XAMPP is installed
- Move/Copy, and unzip files into ../C:/xampp/htdocs folder.
- run XAMPP (may have to run as administrator)
- start Apache and MySQL
- navigate to `localhost/phpmyadmin` in your web browser
- create new database and import the `proviso.sql` file in `Databases_Tables` folder
- If localhost isn't the main host: go into the file ../php_scripts/db_connection.php
  and change `$servername='(host)'` line 10, and change `$dbhost = "(host)"` on line 26.
- can now navigate to `localhost/index.php` and run website, a login page should appear.
- In order to login you must use the user: reed5204 and pass: hellothere, this will take you to the student menu. 

## Important things to note
- creating a new user does not automatically add a degree choice and a career choice for that user
- a degree choice and a career choice are necessary for some of the webpages to display properly
- a career choice can be added to the `user_career` table and a degree choice can be added to the `user_degree` table __manually__
