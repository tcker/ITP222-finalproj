# To Start Project

---

1. Unzip all files on ur dedicated **xampp/htdocs** directory

2. go to localhost/phpmyadmin

3. create database named **compass_db**

4. inside **compass_db** go to **sql** paste this sql code then click run

```sql
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  reset_token VARCHAR(255) DEFAULT NULL,
  token_expires_at DATETIME DEFAULT NULL,
  failed_attempts INT DEFAULT 0,
  locked_until DATETIME DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

```

5. go to http://localhost/backup/back-end/index.php?uri=signup

6. enjoy

---

#### [GITHUB REPO](https://github.com/tcker/ITP222-finalproj) 


<pre align="center">
                                    
 ██████  ██████   ██████  ██    ██ ██████       ██  ██       ██ 
██       ██   ██ ██    ██ ██    ██ ██   ██     ████████     ███ 
██   ███ ██████  ██    ██ ██    ██ ██████       ██  ██       ██ 
██    ██ ██   ██ ██    ██ ██    ██ ██          ████████      ██ 
 ██████  ██   ██  ██████   ██████  ██           ██  ██     ██████ 
<h1> ITP222 LABORATORY ACT 3 </h1>
                                                                                                       
<p> Submitted By Members: </p> 

<p>ANG, Billy Joe </p>
<p>ARISGADO, Mathew </p>
<p>BAARDE, Ram B </p>
<p>BALMEO, Micheal Angelo </p>
<p>BARCIAL, Allen Christian </p>


</pre>
