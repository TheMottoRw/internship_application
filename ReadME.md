# Online Internship application project
This project will help student to apply for internship in their final year
##`How to setup/install this project in Your PC`
### Windows
1. You should have xampp installed include php 5.6 or above
2. Place project in <b>htdocs folder</b>
3. In Project sub-folder api/classes change classes import with absolute directory path <b>/var/www/html/RUT/</b> with your absolute directory path (eg: <b>C:/xampp/htdocs/</b>)

### Linux (Debian or Ubuntu)
1. Install apache2 by <b>sudo apt-get install apache2</b>
2. Install mysql by <b>sudo apt install mysql-server</b>
3. Place project folder in <b>/var/www/html/</b>
4. In Project sub-folder api/classes change classes import with absolute directory path <b>/var/www/html/RUT/</b> with your absolute directory path (eg: <b>/var/www/html/</b>)

##### Note
For RedHat and other distros use <b> rpm install </b> instead of <b>apt-get</b><br>
Change Database connection from user <b>super</b> to your <b>superuser(eg: root)</b> in <b>oia/db</b> file </b>

### Import database & run project
1. import database from <b>oia/db</b> folder
2. Now you can run project in your browser by typing <b>localhost/oia</b>

####Landing pages

1. application.php
2. company.php
3. signup_company.php
4. signup_applicant.php


#### Administration pages
1. companyDetail_admin.php
#### Applicant pages
1. application_applicant.php <!-- to check available internship -->
2. company_applicant <!-- to check company details-->
3. feedback <!-- check response from company -->


#### Company page
1. company_internship.php <!-- internship history & add -->
2. applicantView.php

#### Test credentials
<b>Admin</b> <br>
<i>Username:</i> <code>hasua.mr@gmail.com</code><br>
<i>Password:</i> <code>12345</code><br>
<b>Company</b> <br>
<i>Username:</i> <code>0726183049</code><br>
<i>Password:</i> <code>12345</code><br>
<b>Applicant</b> <br>
<i>Username:</i> <code>0789543456</code><br>
<i>Password:</i> <code>12345</code>