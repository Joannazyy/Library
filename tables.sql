CREATE TABLE book (
  `ISBN` varchar(20) NOT NULL,
  `Book_title` varchar(255) NOT NULL,
  `Date_of_publication` year NOT NULL,
  `Author_name` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  PRIMARY KEY (`ISBN`, `Book_title`)
);

LOAD DATA INFILE 'C:/Study/statistics/226/project/book.txt' 
INTO TABLE book
;

select *
from book;

CREATE TABLE issue (
  `ID` int(20) NOT NULL,
  `Book_title` varchar(255) NOT NULL,
  `Issue_date` date NOT NULL,
  `Due_date` date NOT NULL,
  PRIMARY KEY (`ID`, `Book_title`)
);

LOAD DATA INFILE 'C:/Study/statistics/226/project/issue.txt' 
INTO TABLE issue
;

select *
from issue;

CREATE TABLE membership_full (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` bigint(20) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Region` varchar(255) NOT NULL,
  `Zip_code` varchar(255) NOT NULL,
  `Date_of_issue` date NOT NULL,
  `Date_of_expiry` date NOT NULL,
  `Status` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
);

LOAD DATA INFILE 'C:/Study/statistics/226/project/membership.txt' 
INTO TABLE membership_full
;

select *
from membership;

CREATE TABLE activity (
  `Number` bigint(20) NOT NULL,
  `Date_of_event` date NOT NULL,
  `Start_time_of_event` varchar(255) NOT NULL,
  `End_time_of_event` varchar(255) NOT NULL,
  `Event_name` varchar(255) NOT NULL,
  `Age_group` varchar(255) NOT NULL,
  `Event_type` varchar(255) NOT NULL,
  `Event_description` varchar(8000) NOT NULL,
  PRIMARY KEY (`Number`)
);

LOAD DATA INFILE 'C:/Study/statistics/226/project/activity.txt' 
INTO TABLE activity
;


CREATE TABLE membership (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
);

LOAD DATA INFILE 'C:/Study/statistics/226/project/membershiptest.txt' 
INTO TABLE membership
;
