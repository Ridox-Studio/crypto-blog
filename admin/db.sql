-- thsi is the sql code to be runned in ur localhost/phpmyadmin
-- to start type in ur browser localhost/phpmyadmin/
-- on the left top side of the window you will see place(link) written New clcik on it
-- Then you will see an input with placeholder written as Database name
-- In the input with placeholder Database name copy and paste this name in the curly brackets {cryptolistmining}
-- then click CREATE
-- after which you will see on the header navigation a button / link written sql , clcik on the button 
-- in the text area copy and paste this whole file code inside the text area shownto you 
CREATE TABLE admins (
    ADMIN_ID int(11) PRIMARY KEY AUTO_INCREMENT,
    userName varchar(123) NOT NULL,
    Password varchar(123) NOT NULL,
    LastLoginDate DATETIME NULL DEFAULT CURRENT_TIMESTAMP

);
CREATE TABLE posts (
    POST_ID int(11) PRIMARY KEY AUTO_INCREMENT,
    title varchar(500) NOT NULL,
    Descriptions TEXT NOT NULL,
    Images varchar(900) NOT NULL,
    tags varchar(500) NOT NULL,
    ADMIN_ID varchar(255) NOT NULL,
    DateUpload DATETIME NULL DEFAULT CURRENT_TIMESTAMP

);

INSERT INTO `admins` (`ADMIN_ID`, `userName`, `Password`, `Descriptions`, `LastLoginDate`) VALUES (NULL, 'ADMIN', '', '', current_timestamp());











