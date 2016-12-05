INSERT INTO User (User_Name, Pass, Is_Admin, Create_Date, Last_Login) VALUES ('jvb93','ThatDankPassword1',1, NOW(), NOW());
INSERT INTO Restaurant (Name, URL, Submitter_Id, Submit_Date) VALUES ('Sublime Alehouse', 'http://sublimealehouse.com/home/', 1, NOW());
INSERT INTO Tag (tag_value) VALUES ('dank');
INSERT INTO Tag (tag_value) VALUES ('beer');
INSERT INTO Tag_Restaurant_Mapping (restaurant_id, tag_id) VALUES (1, 1);
INSERT INTO Tag_Restaurant_Mapping (restaurant_id, tag_id) VALUES (1, 2);
INSERT INTO Vote (is_positive, submitter_id, restaurant_id) VALUES (1,1,1);
INSERT INTO Comment (submitter_id, restaurant_id, comment_text, submit_date) VALUES(1,1,'wow this place is dank', NOW());
