CREATE TABLE 163940_users (
	user_id int not null AUTO_INCREMENT PRIMARY KEY,
	user_nickname varchar(40) not null,
	user_email varchar(40) not null,
	user_password varchar(255) not null
);

CREATE TABLE 163940_votes (
	vote_id int not null AUTO_INCREMENT PRIMARY KEY,
	vote_nickname varchar(255) not null,
	vote_postid int not null
);

CREATE TABLE 163940_comments (
	comment_id int not null AUTO_INCREMENT PRIMARY KEY,
	comment_author varchar(255) not null,
	comment_post int not null,
	comment_body varchar(500) not null,
	comment_datestamp varchar(255) not null
);

CREATE TABLE 163940_posts (
	post_id int not null AUTO_INCREMENT PRIMARY KEY,
	post_title varchar(256) not null,
	post_author varchar(256) not null,
	post_body varchar(500) not null,
	post_likes int not null,
	post_dislikes int not null,
	post_datestamp varchar(40) not null,
	post_picture_url varchar(256)
);