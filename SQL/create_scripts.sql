
CREATE TABLE IF NOT EXISTS User
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    User_Name VARCHAR(20) NOT NULL,
    Pass VARCHAR(32) NOT NULL,
    Is_Admin BOOL DEFAULT 0 NOT NULL,
    Create_Date DATETIME NOT NULL,
    Last_Login DATETIME
);
CREATE UNIQUE INDEX User_User_Name_uindex ON User (User_Name);

CREATE TABLE IF NOT EXISTS Restaurant
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    Name VARCHAR(64) NOT NULL,
    URL VARCHAR(767) NOT NULL, -- max length for unique constraint
    Submitter_Id INT NOT NULL,
    Submit_Date DATETIME NOT NULL,
    CONSTRAINT Restaurant_User_id_fk FOREIGN KEY (Submitter_Id) REFERENCES User (id)
);
CREATE UNIQUE INDEX Restaurant_URL_uindex ON Restaurant (URL);

CREATE TABLE IF NOT EXISTS Vote
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    is_positive BOOL DEFAULT 1 NOT NULL,
    submitter_id INT NOT NULL,
    restaurant_id INT NOT NULL,
    CONSTRAINT Vote_user_id_fk FOREIGN KEY (submitter_id) REFERENCES user (id),
    CONSTRAINT Vote_restaurant_id_fk FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)
);


CREATE TABLE IF NOT EXISTS Comment
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    submitter_id INT NOT NULL,
    restaurant_id INT NOT NULL,
    comment_text TEXT,
    submit_date DATETIME,
    CONSTRAINT Comment_user_id_fk FOREIGN KEY (submitter_id) REFERENCES user (id),
    CONSTRAINT Comment_restaurant_id_fk FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)
);

CREATE TABLE IF NOT EXISTS Tag
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    tag_value VARCHAR(16) NOT NULL
);
CREATE UNIQUE INDEX Tag_tag_value_uindex ON Tag (tag_value);


CREATE TABLE IF NOT EXISTS Tag_Restaurant_Mapping
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  restaurant_id INT,
  tag_id INT,
  CONSTRAINT tag_restaurant_tag_id_fk FOREIGN KEY (tag_id) REFERENCES tag (id),
  CONSTRAINT tag_restaurant_restaurant_id_fk FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)
);

