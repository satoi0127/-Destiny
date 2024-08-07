-- Written on June 12th
CREATE TABLE user(
    user_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_password VARCHAR(32) NOT NULL,
    user_name VARCHAR(64) NOT NULL,
    user_tel VARCHAR(32) NOT NULL,
    mail_address VARCHAR(64) NOT NULL,
    user_sex BIT NOT NULL,
    user_coordinate_latitude DOUBLE,
    user_coordinate_longitude DOUBLE,
    user_current_country VARCHAR(64),
    user_current_city VARCHAR(64),
    user_current_province VARCHAR(64),
    user_current_suburb VARCHAR(64),
    user_age INTEGER
    );

CREATE TABLE profileImage(
    profileImage_id INTEGER PRIMARY KEY,
    user_id INTEGER NOT NULL,
    user_profile_image_path VARCHAR(120),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
    );

CREATE TABLE profile(
    profile_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER UNIQUE NOT NULL,
    user_profile_image_path VARCHAR(120),
    user_description VARCHAR(320),
    user_starsign INTEGER,
    user_height DOUBLE,
    user_blood_type INTEGER,
    user_purpose VARCHAR(128),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
    );

CREATE TABLE interest(
    interest_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    interest_name VARCHAR(32) NOT NULL
    );

CREATE TABLE userInterest(
    uinterest_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER NOT NULL,
    interest_id INTEGER NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY(interest_id) REFERENCES interest(interest_id)
    );

CREATE TABLE chatmember(
    chatmember_id INTEGER,
    user_id INTEGER NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    PRIMARY KEY(chatmember_id, user_id)
    );

CREATE TABLE party(
    party_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    party_name VARCHAR(64) NOT NULL,
    party_description VARCHAR(120) NOT NULL,
    chat_member_id INTEGER,
    party_member_id INTEGER,
    party_host_id INTEGER,
    FOREIGN KEY (chat_member_id) REFERENCES chatmember(chatmember_id),
    FOREIGN KEY (party_host_id) REFERENCES user(user_id)
    );

CREATE TABLE partyInterest(
    paryInterest_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    party_id INTEGER NOT NULL,
    interest_id INTEGER NOT NULL,
    FOREIGN KEY (party_id) REFERENCES party(party_id),
    FOREIGN KEY (interest_id) REFERENCES interest(interest_id)
    );

CREATE TABLE Message(
    message_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    message_text VARCHAR(300) NOT NULL,
    user_id INTEGER NOT NULL,
    chatmember_id INTEGER NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (chatmember_id) REFERENCES chatmember(chatmember_id)
    );

CREATE TABLE party_member(
    party_id INTEGER NOT NULL,
    user_id INTEGER NOT NULL,
    FOREIGN KEY(user_id) REFERENCES user(user_id),
    FOREIGN KEY(party_id) REFERENCES party(party_id),
    PRIMARY KEY(party_id,user_id)
);

CREATE TABLE party_message(
    party_message_id INTEGER AUTO_INCREMENT PRIMARY KEY,
    party_message VARCHAR(300) NOT NULL,
    user_id INTEGER NOT NULL,
    party_id INTEGER NOT NULL,
    FOREIGN KEY(user_id) REFERENCES user(user_id)
);

-- SELECT user_name, ACOS(SIN(user_coordinate_latitude*(PI()/180))*SIN($lat2*(PI()/180))+COS(user_coordinate_latitude*(PI()/180))*COS($lat2*(PI()/180))*COS($lon2*(PI()/180)-user_coordinate_longitude*(PI()/180)))*6371 as distance FROM user;