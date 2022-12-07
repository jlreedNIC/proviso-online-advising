# proviso-online-advising
An online career centered advising program for the University of Idaho. For CS360 Database Systems

# Other Libraries/Projects used
https://gojs.net/latest/index.html

# Running ProViso on your local machine
- clone repository on local machine
- Make sure XAMPP is installed
- run XAMPP (may have to run as administrator)
- start Apache and MySQL
- navigate to `localhost/phpmyadmin` in your web browser
- create new database and import the `proviso.sql` file in `Databases_Tables` folder
- can now navigate to `localhost/proviso-online-advising` and run website!

## Important things to note
- creating a new user does not automatically add a degree choice and a career choice for that user
- a degree choice and a career choice are necessary for some of the webpages to display properly
- a career choice can be added to the `user_career` table and a degree choice can be added to the `user_degree` table __manually__
