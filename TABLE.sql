CREATE TABLE IF NOT EXISTS users(
    userid int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email varchar(30) NOT NULL,
    name varchar(30) NOT NULL,
    address varchar(100) NOT NULL,
    age int(3) NOT NULL,
    phone varchar(20) NOT NULL
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS login(
    username varchar(20) NOT NULL,
    password varchar(100) NOT NULL,
    userlevel int(1) NOT NULL,
    fk_userid int(6) UNSIGNED NOT NULL,
    FOREIGN KEY (fk_userid) REFERENCES users(userid)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS practical_training(
    applicationid int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    applicationtitle varchar(45) NOT NULL,
    applicationdate varchar(20) NOT NULL,
    applicationstatus varchar(10) NOT NULL,
    fk_userid int(6) UNSIGNED NOT NULL,
    FOREIGN KEY (fk_userid) REFERENCES users(userid)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS company(
    companyname varchar(20) NOT NULL,
    companycontactno varchar(20) NOT NULL,
    companyemail varchar(20) NOT NULL,
    department varchar(30) NOT NULL,
    jobtitle varchar(25) NOT NULL,
    startdate varchar(20) NOT NULL,
    enddate varchar(20) NOT NULL,
    fk_applicationid int(6) UNSIGNED NOT NULL,
    FOREIGN KEY (fk_applicationid) REFERENCES practical_training(applicationid)
    ON DELETE CASCADE
    ON UPDATE CASCADE
    )ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS user_detail(
    gender varchar(10) NOT NULL,
    matricnumber varchar(9) NOT NULL,
    nationality varchar(15) NOT NULL,
    fk_applicationid int(6) UNSIGNED NOT NULL,
    FOREIGN KEY (fk_applicationid) REFERENCES practical_training(applicationid)
    ON DELETE CASCADE
    ON UPDATE CASCADE
    )ENGINE = InnoDB DEFAULT CHARSET = utf8;

INSERT INTO users
VALUES (1,"jlteh@gmail.com","Teh Jing Ling","123, Lucky Home",21,"012-3456789");
INSERT INTO users
VALUES (2,"eunice@gmail.com","Lim Xian Ni","456, Lucky Home",21,"011-7895456");
INSERT INTO users
VALUES (3,"yxsiew@gmail.com","Siew Yu Xuan","789, Lucky Home",21,"012-5675434");
INSERT INTO users
VALUES (4,"theresa@gmail.com","Lau Xin Yi","122, Lucky Home",21,"017-5674323");
INSERT INTO users
VALUES (5,"joshua@gmail.com","Lai Chee Yee","145, Lucky Home",21,"014-4563234");
INSERT INTO users
VALUES (6,"yczhu@gmail.com","Zhu Yi Chen","777, Lucky Home",20,"013-5673456");


INSERT INTO login
VALUES ("jacklyn",SHA("jacklyn@123"),1,1);
INSERT INTO login
VALUES ("eunice",SHA("eunice@123"),2,2);
INSERT INTO login
VALUES ("yuxuan",SHA("yuxuan@123"),3,3);
INSERT INTO login
VALUES ("theresa",SHA("theresa@123"),3,4);
INSERT INTO login
VALUES ("joshua",SHA("joshua@123"),3,5);
INSERT INTO login
VALUES ("rebecca",SHA("rebecca@123"),3,6);

INSERT INTO practical_training
VALUES (1,"Intel/Back-End","27-Jun-2022","submitted",3);
INSERT INTO practical_training
VALUES (2,"Google/Back-End","12-Jun-2022","Approve",3);
INSERT INTO practical_training
VALUES (3,"Intel/Network","14-Jun-2022","submitted",3);
INSERT INTO practical_training
VALUES (4,"Google/Front-End","14-Jun-2022","submitted",4);
INSERT INTO practical_training
VALUES (5,"Intel/Full-stack","24-May-2022","Reject",4);
INSERT INTO practical_training
VALUES (6,"Google/Back-End","24-Jun-2022","submitted",5);
INSERT INTO practical_training
VALUES (7,"Intel/Back-End","21-Jun-2022","Reject",5);
INSERT INTO practical_training
VALUES (8,"Miscrosoft/Back-End","12-Jun-2022","submitted",6);
INSERT INTO practical_training
VALUES (9,"Intel/Back-End","30-Jun-2022","Approve",6);
INSERT INTO practical_training
VALUES (10,"Miscrosoft/UIUX-dessigner","24-Jun-2022","submitted",6);

INSERT INTO user_detail
VALUES ("Female","A088","Malaysia",1);
INSERT INTO user_detail
VALUES ("Female","A088","Malaysia",2);
INSERT INTO user_detail
VALUES ("Female","A088","Malaysia",3);
INSERT INTO user_detail
VALUES ("Female","A001","Malaysia",4);
INSERT INTO user_detail
VALUES ("Female","A001","Malaysia",5);
INSERT INTO user_detail
VALUES ("Male","A021","Malaysia",6);
INSERT INTO user_detail
VALUES ("Male","A021","Malaysia",7);
INSERT INTO user_detail
VALUES ("Female","A004","Malaysia",8);
INSERT INTO user_detail
VALUES ("Female","A004","Malaysia",9);
INSERT INTO user_detail
VALUES ("Female","A004","Malaysia",10);

INSERT INTO company
VALUES 
("Intel","03-5678765","intel@gmail.com","Software","Back-End","2022-06-23","2022-07-23",1),
("Intel","03-5678765","intel@gmail.com","Network","Network","2022-06-23","2022-08-23",3),
("Intel","03-5678765","intel@gmail.com","Software","Full-stack","2022-06-23","2022-09-23",5),
("Intel","03-5678765","intel@gmail.com","Software","Back-End","2022-06-23","2022-10-23",7),
("Intel","03-5678765","intel@gmail.com","Software","Back-End","2022-06-23","2022-11-23",9),
("Google","03-5675463","google@gmail.com","Software","Back-End","2022-06-23","2022-12-23",2),
("Google","03-5675463","google@gmail.com","Software","Front-End","2022-06-23","2022-07-23",4),
("Google","03-5675463","google@gmail.com","Software","Back-End","2022-06-23","2022-08-23",6),
("Miscrosoft","03-5675463","miscrosoft@gmail.com","Software","Back-End","2022-06-23","2022-09-23",8),
("Miscrosoft","03-5675463","miscrosoft@gmail.com","Software","UIUX-dessigner","2022-06-23","2022-10-23",10);



// create the table for student cv
CREATE TABLE studentcv (
  cv_id SERIAL PRIMARY KEY,
  student_name VARCHAR(255) NOT NULL,
  file_name VARCHAR(255) NOT NULL,
  file_path VARCHAR(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
