 
create data table in mysql using below command , here table name is district and table columns are   ----- id , district_name , dst_id
==================================================================================================================

----------- command code start ------------  (click on db name to select > then click on SQL tab and paste below code > then press Go button)

CREATE TABLE district (
    id INT PRIMARY KEY AUTO_INCREMENT,
    district_name VARCHAR(255) NOT NULL,
    dst_id VARCHAR(255) UNIQUE
);



------------ command code end -------------




concat a text here dst with the index or as number in  dst_id column on above district table 
=============================================================================================

----------- command code start ------------  (click on db name to select > then click on SQL tab and paste below code > then press Go button)
                                             [  also you can edit this ''''dst'''' text inside triggers tab ]
DELIMITER $$

CREATE TRIGGER trg_before_insert_district
BEFORE INSERT ON district
FOR EACH ROW
BEGIN
    DECLARE next_id INT;

    -- Get the next auto-increment value for the table
    SET next_id = (SELECT AUTO_INCREMENT 
                   FROM INFORMATION_SCHEMA.TABLES 
                   WHERE TABLE_SCHEMA = 'school_dtl' 
                   AND TABLE_NAME = 'district');

    -- Concatenate 'dst_' with the next id value
    SET NEW.dst_id = CONCAT('dst_', next_id);
END$$

DELIMITER ;


------------ command code end -------------




with foreign key 
====================

below is using default id column  (  foreign key  )
---------------------------

CREATE TABLE school (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_name VARCHAR(255) NOT NULL,
    dst_id INT,
    FOREIGN KEY (dst_id) REFERENCES district(id)
);



---------------------------------- 


below is using dst_id column  (  foreign key  )  --- BDO
---------------------------




CREATE TABLE bdo (
    id INT PRIMARY KEY AUTO_INCREMENT,
    bdo_name VARCHAR(255) NOT NULL,
    dst_id VARCHAR(10),  -- Foreign key references dst_id in the district table
    FOREIGN KEY (dst_id) REFERENCES district(dst_id)
);


-------------------------

below is not sure   (  foreign key  )
-------------------

CREATE TABLE school (
    id INT PRIMARY KEY AUTO_INCREMENT,
    school_name VARCHAR(255) NOT NULL,
    dst_id VARCHAR(10),  -- Use VARCHAR to store the dst_id format (e.g., dst_1, dst_2)
    FOREIGN KEY (dst_id) REFERENCES district(dst_id)  -- Assuming you have dst_id in the district table
);








---------------------------
 user encrypted data insering in mysql
---------------------------


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,  -- Encrypted password storage
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




--------------------------------
create users page as per specific user id after login need this mysql
-------------------------------------


CREATE TABLE user_pages (
    user_id INT PRIMARY KEY,
    content TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);


-------------------------------
create users page  for multiple data adding in multiple times like post
----------------------------------



CREATE TABLE user_pages (
    page_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL, -- Optional: add if you need a title for each post
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);





---------------------- 
use this to drop an existing table
------------------------ 
DROP TABLE IF EXISTS user_pages; --   


---------------------------------- 
add new column in data table   ( here -- user_pages -- is table name and  ----  image_path  ----- is new table coloumn name or column header )
-----------------------------------  

ALTER TABLE user_pages ADD image_path VARCHAR(255);
