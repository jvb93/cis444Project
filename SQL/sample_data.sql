INSERT INTO user (User_Name, Pass, Is_Admin, Create_Date, Last_Login) VALUES ('jvb93','ThatDankPassword1',1, NOW(), NOW());
INSERT INTO restaurant (Name, URL, Submitter_Id, Submit_Date) VALUES ('Sublime Alehouse', 'http://sublimealehouse.com/home/', 1, NOW());
INSERT INTO tag (tag_value) VALUES ('dank');
INSERT INTO tag (tag_value) VALUES ('beer');
INSERT INTO tag_restaurant_mapping (restaurant_id, tag_id) VALUES (1, 1);
INSERT INTO tag_restaurant_mapping (restaurant_id, tag_id) VALUES (1, 2);
INSERT INTO vote (is_positive, submitter_id, restaurant_id) VALUES (1,1,1);
INSERT INTO comment (submitter_id, restaurant_id, comment_text, submit_date) VALUES(1,1,'wow this place is dank', NOW());