-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `leave_type`;
CREATE TABLE `leave_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_name` varchar(255) DEFAULT NULL,
  `total_leave` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user_bill`;
CREATE TABLE `user_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `bill_name` varchar(255) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `bill_file_path` varchar(255) DEFAULT NULL,
  `bill_amount` int(11) DEFAULT NULL,
  `bill_description` text,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user_employee`;
CREATE TABLE `user_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `personal_number` varchar(255) DEFAULT NULL,
  `emergency_number` varchar(255) DEFAULT NULL,
  `role_type` varchar(255) DEFAULT NULL,
  `employee_role` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `residental_address` varchar(255) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `project_team` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `bond` varchar(100) DEFAULT NULL,
  `bond_duration_from` date DEFAULT NULL,
  `bond_duration_to` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_employee` (`id`, `employee_id`, `first_name`, `last_name`, `email`, `password`, `personal_number`, `emergency_number`, `role_type`, `employee_role`, `date_of_birth`, `marital_status`, `nationality`, `gender`, `residental_address`, `home_address`, `city`, `state`, `image`, `joining_date`, `project_team`, `education`, `bond`, `bond_duration_from`, `bond_duration_to`, `status`) VALUES
(1,	'FxB-01',	'Abhishek',	'Kothari',	'abhik1424@gmail.com',	'97d239ec03a8aea7f1530ce9740392d8',	'7879666524',	'8770711320',	'developer',	'developer php',	'1992-03-14',	'unmarried',	'indian',	'male',	'saket nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-03-01',	'team php',	'MCA',	'1',	'2017-03-01',	'2018-03-01',	1),
(2,	'FxB-02',	'Ritesh',	'paliwal',	'paliwal.ritesh@gmail.com',	'477baede57c4a8c1cda9e24e1f6828a7',	'8457693210',	'9875214630',	'developer',	'developer php',	'1989-07-21',	'married',	'indian',	'male',	'dewash naka indore',	'M>G. road,Bhopal',	'bhopal',	'madhya pradesh',	NULL,	'2016-01-06',	'team php',	'BE(CS)',	'2',	'2016-01-10',	'2018-01-10',	1),
(3,	'FxB-03',	'Gourav',	'Sharma',	'sharma@gmail.com',	'ed805647b7ec7ec8ec350e6c0d3bce3e',	'8974563510',	'9674258130',	'developer',	'developer ios',	'1990-09-15',	'unmarried',	'indian',	'male',	'Burhanpur ',	'Indore',	'indore',	'madhya pradesh',	NULL,	'2016-01-15',	'team ios',	'BE(CS)',	'2',	'2016-06-15',	'2018-06-15',	1),
(4,	'FxB-',	'',	'',	'abhik1424@gmail.com',	'63a9f0ea7bb98050796b649e85481845',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	1),
(5,	'FxB-',	'',	'',	'abhik1424@gmail.com',	'd41d8cd98f00b204e9800998ecf8427e',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	1),
(6,	'FxB-',	'',	'',	'abhik1424@gmail.com',	'd41d8cd98f00b204e9800998ecf8427e',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	1),
(7,	'FxB-06',	'qwerty',	'qwerty',	'qwerty@gmail.com',	'd8578edf8458ce06fbc5bb76a58c5ca4',	'7889657845',	'7964587123',	'developer',	'trainee',	'2017-06-08',	'married',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-01-02',	'team ios',	'BCA',	'fresher',	'2017-01-02',	'2018-01-02',	1),
(8,	'FxB-08',	'QA',	'QA',	'asdf@g.com',	'71f6ac3385ce284152a64208521c592b',	'9874563597',	'95475555522',	'trainee',	'trainee',	'2017-03-14',	'unmarried',	'indian',	'male',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-06-01',	'team ios',	'BCA',	'fresher',	'2017-06-01',	'2018-06-01',	1),
(9,	'FxB-FxB-65',	'afdsg',	'asdfg',	'abhi23434@gmail.com',	'5e2959aadf8d60e212998f01fbb7b09c',	'12345678',	'23145678954',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'',	'2017-06-07',	'2015-06-07',	1),
(10,	'FxB-FxB-66',	'afdsg',	'asdfg',	'abhi2334@gmail.com',	'bc6d0d7c0db3b78a92fd3086211b2b0b',	'12345678765',	'2314567895456756',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'',	'2017-06-07',	'2015-06-07',	1),
(11,	'FxB-60',	'afdsg',	'asdfg',	'abhi244@gmail.com',	'6464ded9e5d88ceb1503624cb00852b9',	'1234567875',	'2314567895456',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'',	'2017-06-07',	'2015-06-07',	1),
(12,	'FxB-61',	'afdsg',	'asdfg',	'abhi254@gmail.com',	'7e798bc2bd92a3518af1fbfe319e17d4',	'12345678754545',	'231456789544',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'',	'2017-06-07',	'2015-06-07',	1),
(13,	'FxB-FxB-62',	'afdsg',	'asdfg',	'abhi25466@gmail.com',	'afa245bd45bee80ab636c183a51cb6e1',	'123456787545',	'23145678954',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'',	'2017-06-07',	'2015-06-07',	1),
(14,	'FxB-26',	'afdsg',	'asdfg',	'abhi246@gmail.com',	'23ea098c47a7a0b804789b8502231735',	'12345678888',	'23166678954',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'fresher',	'2017-06-07',	'2015-06-07',	1),
(15,	'FxB-88',	'aDFF',	'shF',	'abhik14241@gmail.com',	'26175673521d3894ac4a194b6df94208',	'898423567897',	'1234567890',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	1),
(16,	'FxB-89',	'aDFF',	'shF',	'dfd@s.com',	'48393425ea78877242682c54ecf64cb2',	'89842356789445',	'1234567890',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	1),
(17,	'FxB-FxB-FxB-FxB-85',	'aDFF',	'shF',	'abhik14424@gmail.com',	'0e419cb8655dd0769de1b7ff600dd766',	'23423567897',	'12345672890',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	1),
(18,	'FxB-90',	'gh',	'gfhf',	'root@d.com',	'827ccb0eea8a706c4c34a16891f84e7b',	'3534534343',	'654625252',	'senior developer',	'developer ios',	'2017-06-14',	'married',	'japanese',	'female',	'oluiliu',	'uiuu',	'',	'maharashtra',	NULL,	'2017-06-19',	'team android',	'',	'1',	'2017-06-12',	'2017-06-14',	1),
(19,	'FxB-FxB-90',	'gh1',	'gfhf1',	'root1@d.com',	'1f32aa4c9a1d2ea010adcf2348166a04',	'35345343431',	'6546252521',	'senior developer',	'developer ios',	'2017-06-14',	'married',	'japanese',	'female',	'oluiliu',	'uiuu',	'',	'maharashtra',	NULL,	'2017-06-19',	'team android',	'',	'1',	'2017-06-12',	'2017-06-14',	1),
(20,	'FxB-100',	'Abhi`',	'Abhi',	'ab@gmail.com',	'd76f3d05cc9ac98f1f9160274a39fe33',	'85746',	'857462',	'trainee',	'trainee',	'2011-02-09',	'married',	'indian',	'male',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2015-06-10',	'team ios',	'BE(CS)',	'2',	'2015-06-21',	'2017-06-21',	1),
(21,	'FxB-101',	'Abhi`sdafds',	'Abhisdf',	'abrt@gmail.com',	'6725fa800c08a79eb3c3ea00d9ecab2a',	'85746453',	'85746234',	'trainee',	'trainee',	'2011-02-09',	'married',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2015-06-10',	'team ios',	'BE(CS)',	'2',	'2015-06-21',	'2017-06-21',	1);

DROP TABLE IF EXISTS `user_leave`;
CREATE TABLE `user_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(255) DEFAULT NULL,
  `leave_type` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user_news`;
CREATE TABLE `user_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `tittle` varchar(255) DEFAULT NULL,
  `news_date` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user_policy`;
CREATE TABLE `user_policy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `policy_type` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `comment` text,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2017-06-13 13:00:07
