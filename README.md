# opeope_hospital

Ope-Ope Hostpital System Web Application using PHP and MySQL Database<br/><br/>

# **How to Start**

**Step 1: Download and install XAMPP**<br/><br/>
XAMPP helps a local host or server to test its website and clients via computers and laptops before releasing it to the main server<br/>
You can download Xampp from this download section: [Xampp](https://www.apachefriends.org/download.html)
<br/><br/>![alt text](https://i.imgur.com/cZjB6ur.png)<br/><br/>

**Step 2: Start Sever & Database**<br/><br/>

Open XAMPP Control Panel and Start actions in Apache and MySQL<br/><br/>
![alt text](https://i.imgur.com/mH070nl.png)<br/><br/>
Then you can access to SQL Admin panel via: http://localhost/phpmyadmin/

<br/><br/>**Step 3: Import SQL Database & Source Code**<br/><br/>

Create new database by clicking New in phpMyAdmin Panel<br/><br/>

*Import database*

- Name the database: "opeope_db" and create
<br/><br/>![alt text](https://i.imgur.com/SRVvUST.png)<br/><br/>
- Select Import option and choose file named: opeope_db.sql that provided in this repository and click go to Import database.
- if you import file correctly. you will see database schema as below.
<br/><br/>![alt text](https://i.imgur.com/d6VQtgn.png)<br/><br/>
<br/>![alt text](https://i.imgur.com/LPCvGZs.png)<br/><br/>

*Import Source code*<br/><br/>
- Go to XAMPP folder that installed in previous step and go to **htdocs** folder
<br/><br/>![alt text](https://i.imgur.com/g9CDRXK.png)<br/><br/>
- Copy opeope-hospital folder and paste in this folder.
<br/><br/>![alt text](https://i.imgur.com/3cjlDrM.png)<br/><br/>
<hr/>*Note: The name of the source code folder will be used as a subdomain of localhost. You can rename it shorter for accessing easier.*

## Testing
After completed all these step. the next thing you need to do is checking if deployment is working.<br/>
by go to URL: https://localhost/opeope-hospital<br/>
if it's work perfectly you will see the index page as a login as below
<br/><br/>![alt text](https://i.imgur.com/bqEQcMO.png)<br/><br/>

## User Data
Username and Password for accessing the system<br/>
all password will be encrypted in MD5 format as example below
<br/><br/>![alt text](https://i.imgur.com/IVhOou6.png)<br/><br/>
An example user accounts for accessing this website by role.
<br/><br/>![alt text](https://i.imgur.com/5u1Ovva.png)<br/><br/>
