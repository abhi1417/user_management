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

INSERT INTO `leave_type` (`id`, `leave_name`, `total_leave`, `status`) VALUES
(1,	'casual',	'12',	1),
(2,	'sick',	'6',	1);

DROP TABLE IF EXISTS `user_admin1`;
CREATE TABLE `user_admin1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_admin1` (`id`, `name`, `email`, `password`) VALUES
(1,	'Abhishek',	'abhi123@gmail.com',	'abhi12345'),
(2,	'Meenesh',	'meenesh@gmail.com',	'meenesh12345');

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

INSERT INTO `user_bill` (`id`, `user_name`, `bill_name`, `bill_date`, `bill_file_path`, `bill_amount`, `bill_description`, `status`) VALUES
(1,	'FxB-01 : Abhishek',	'KYT MAY 2017',	'2016-07-11',	'1494412366-getting_the_most_from_your_therapy.pdf',	45,	'15 Members',	1),
(2,	'FxB-02 : Ritesh',	'Travel MAY 2017',	'2017-05-05',	'1494408614-6589-000KeyWatcherSystemIntegrationMethods.pdf',	12,	'Indore to Dewas',	1),
(3,	'FxB-03 : Gourav',	'Let Night Work',	'2017-06-06',	'1494412366-getting_the_most_from_your_therapy.pdf',	500,	'2 Members\r\nFood\r\noffice',	0);

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
  `user_type` enum('Admin','User') DEFAULT 'User',
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user_employee` (`id`, `employee_id`, `first_name`, `last_name`, `email`, `password`, `personal_number`, `emergency_number`, `role_type`, `employee_role`, `date_of_birth`, `marital_status`, `nationality`, `gender`, `residental_address`, `home_address`, `city`, `state`, `image`, `joining_date`, `project_team`, `education`, `bond`, `bond_duration_from`, `bond_duration_to`, `user_type`, `status`) VALUES
(1,	'FxB-01',	'Abhishek',	'Kothari',	'abhi123@gmail.com',	'e10adc3949ba59abbe56e057f20f883e',	'7879666524',	'8770711320',	'developer',	'developer php',	'1992-03-14',	'unmarried',	'indian',	'male',	'saket nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-03-01',	'team php',	'MCA',	'1',	'2017-03-01',	'2018-03-01',	'Admin',	1),
(2,	'FxB-02',	'Ritesh',	'paliwal',	'paliwal.ritesh@gmail.com',	'e10adc3949ba59abbe56e057f20f883e',	'8457693210',	'9875214630',	'developer',	'developer php',	'1989-07-21',	'married',	'indian',	'male',	'dewash naka indore',	'M>G. road,Bhopal',	'bhopal',	'madhya pradesh',	NULL,	'2016-01-06',	'team php',	'BE(CS)',	'2',	'2016-01-10',	'2018-01-10',	'User',	1),
(3,	'FxB-03',	'Gourav',	'Sharma',	'sharma@gmail.com',	'ed805647b7ec7ec8ec350e6c0d3bce3e',	'8974563510',	'9674258130',	'developer',	'developer ios',	'1990-09-15',	'unmarried',	'indian',	'male',	'Burhanpur ',	'Indore',	'indore',	'madhya pradesh',	NULL,	'2016-01-15',	'team ios',	'BE(CS)',	'2',	'2016-06-15',	'2018-06-15',	'User',	1),
(4,	'FxB-',	'',	'',	'abhik1424@gmail.com',	'63a9f0ea7bb98050796b649e85481845',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(5,	'FxB-',	'',	'',	'abhik1424@gmail.com',	'd41d8cd98f00b204e9800998ecf8427e',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(6,	'FxB-',	'',	'',	'abhik1424@gmail.com',	'd41d8cd98f00b204e9800998ecf8427e',	'',	'',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(7,	'FxB-06',	'qwerty',	'qwerty',	'qwerty@gmail.com',	'd8578edf8458ce06fbc5bb76a58c5ca4',	'7889657845',	'7964587123',	'developer',	'trainee',	'2017-06-08',	'married',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-01-02',	'team ios',	'BCA',	'fresher',	'2017-01-02',	'2018-01-02',	'User',	1),
(8,	'FxB-08',	'QA',	'QA',	'asdf@g.com',	'71f6ac3385ce284152a64208521c592b',	'9874563597',	'95475555522',	'trainee',	'trainee',	'2017-03-14',	'unmarried',	'indian',	'male',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-06-01',	'team ios',	'BCA',	'fresher',	'2017-06-01',	'2018-06-01',	'User',	1),
(9,	'FxB-FxB-65',	'afdsg',	'asdfg',	'abhi23434@gmail.com',	'5e2959aadf8d60e212998f01fbb7b09c',	'12345678',	'23145678954',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'',	'2017-06-07',	'2015-06-07',	'User',	1),
(10,	'FxB-FxB-66',	'afdsg',	'asdfg',	'abhi2334@gmail.com',	'bc6d0d7c0db3b78a92fd3086211b2b0b',	'12345678765',	'2314567895456756',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'',	'2017-06-07',	'2015-06-07',	'User',	1),
(11,	'FxB-60',	'afdsg',	'asdfg',	'abhi244@gmail.com',	'6464ded9e5d88ceb1503624cb00852b9',	'1234567875',	'2314567895456',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'',	'2017-06-07',	'2015-06-07',	'User',	1),
(12,	'FxB-61',	'afdsg',	'asdfg',	'abhi254@gmail.com',	'7e798bc2bd92a3518af1fbfe319e17d4',	'12345678754545',	'231456789544',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'',	'2017-06-07',	'2015-06-07',	'User',	1),
(13,	'FxB-FxB-62',	'afdsg',	'asdfg',	'abhi25466@gmail.com',	'afa245bd45bee80ab636c183a51cb6e1',	'123456787545',	'23145678954',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'',	'2017-06-07',	'2015-06-07',	'User',	1),
(14,	'FxB-26',	'afdsg',	'asdfg',	'abhi246@gmail.com',	'23ea098c47a7a0b804789b8502231735',	'12345678888',	'23166678954',	'developer',	'trainee',	'1991-03-14',	'unmarried',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-02-01',	'team ios',	'BCA',	'fresher',	'2017-06-07',	'2015-06-07',	'User',	1),
(15,	'FxB-88',	'aDFF',	'shF',	'abhik14241@gmail.com',	'26175673521d3894ac4a194b6df94208',	'898423567897',	'1234567890',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(16,	'FxB-89',	'aDFF',	'shF',	'dfd@s.com',	'48393425ea78877242682c54ecf64cb2',	'89842356789445',	'1234567890',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(17,	'FxB-FxB-FxB-FxB-85',	'aDFF',	'shF',	'abhik14424@gmail.com',	'0e419cb8655dd0769de1b7ff600dd766',	'23423567897',	'12345672890',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(18,	'FxB-90',	'gh',	'gfhf',	'root@d.com',	'827ccb0eea8a706c4c34a16891f84e7b',	'3534534343',	'654625252',	'senior developer',	'developer ios',	'2017-06-14',	'married',	'japanese',	'female',	'oluiliu',	'uiuu',	'',	'maharashtra',	NULL,	'2017-06-19',	'team android',	'',	'1',	'2017-06-12',	'2017-06-14',	'User',	1),
(19,	'FxB-FxB-90',	'gh1',	'gfhf1',	'root1@d.com',	'1f32aa4c9a1d2ea010adcf2348166a04',	'35345343431',	'6546252521',	'senior developer',	'developer ios',	'2017-06-14',	'married',	'japanese',	'female',	'oluiliu',	'uiuu',	'',	'maharashtra',	NULL,	'2017-06-19',	'team android',	'',	'1',	'2017-06-12',	'2017-06-14',	'User',	1),
(20,	'FxB-100',	'Abhi`',	'Abhi',	'ab@gmail.com',	'd76f3d05cc9ac98f1f9160274a39fe33',	'85746',	'857462',	'trainee',	'trainee',	'2011-02-09',	'married',	'indian',	'male',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2015-06-10',	'team ios',	'BE(CS)',	'2',	'2015-06-21',	'2017-06-21',	'User',	1),
(21,	'FxB-101',	'Abhi`sdafds',	'Abhisdf',	'abrt@gmail.com',	'6725fa800c08a79eb3c3ea00d9ecab2a',	'85746453',	'85746234',	'trainee',	'trainee',	'2011-02-09',	'married',	'indian',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2015-06-10',	'team ios',	'BE(CS)',	'2',	'2015-06-21',	'2017-06-21',	'User',	1),
(22,	'FxB-FxB-123456789',	'jain',	'meenesh',	'paliwal.ritesh1234567890@gmail.com',	'b9be11166d72e9e3ae7fd407165e4bd2',	'1234567890',	'234567890',	'',	'',	'1970-01-01',	'',	'',	'female',	'test',	'tet',	'',	'',	NULL,	'2001-02-01',	'',	'',	'',	'2001-02-01',	'1970-01-01',	'User',	1),
(23,	'FxB-u765',	'sam',	'test',	'root123456@gmail.com',	'e807f1fcf82d132f9bb018ca6738a19f',	'12345672222',	'1234567890',	'',	'',	'1970-01-01',	'',	'',	'female',	'12345678',	'234567890',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(24,	'FxB-111',	'sam',	'test',	'root1234561@gmail.com',	'cf5198b91fd9cee31a3286908bf784aa',	'123456722122',	'1234567890',	'',	'',	'1970-01-01',	'',	'',	'female',	'12345678',	'234567890',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(25,	'FxB-12222',	'sam',	'test',	'2222@gmail.com',	'fa89baaa2dbe6870ea9bca6e7c5337cf',	'1111111',	'222222',	'',	'',	'1970-01-01',	'',	'',	'female',	'12345678',	'234567890',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(26,	'FxB-122222222',	'sam',	'test',	'2222a@gmail.com',	'8c53fd29f19266f63eb069f6f6f0ad05',	'11111112',	'222222',	'',	'',	'1970-01-01',	'',	'',	'female',	'12345678',	'234567890',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(27,	'FxB-33',	'sam',	'test',	'2222ab@gmail.com',	'd08541cd526a0f1526284ea7b42763f4',	'1111111223',	'222222',	'',	'',	'1970-01-01',	'',	'',	'female',	'12345678',	'234567890',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(28,	'FxB-55',	'sam',	'test',	'2222abc@gmail.com',	'ff800ea878be3025ce3262f49baf2e4c',	'11111112233',	'222222',	'',	'',	'1970-01-01',	'',	'',	'female',	'12345678',	'234567890',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(29,	'FxB-FxB-55',	'samaaaa',	'testaaa',	'2222abcd@gmail.com',	'1873f25c62381d5e7a9f4b2eb94a5514',	'11111112233333',	'222222',	'',	'',	'1970-01-01',	'',	'',	'female',	'12345678333',	'234567890',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(30,	'FxB-FxB-FxB-55',	'samaaaa222',	'testaaa11',	'2222abc111d@gmail.com',	'6e337ee63474c02292d8ca8db52ee754',	'1111111223333322',	'222222',	'',	'',	'1970-01-01',	'',	'',	'female',	'12345678333aa',	'234567890',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(31,	'FxB-71',	'qwerty1',	'qwerty1',	'qwerty1@gmail.com',	'6725fa800c08a79eb3c3ea00d9ecab2a',	'7845963212',	'9669696964',	'trainee',	'trainee',	'2010-07-15',	'unmarried',	'sri_lankan',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'mumbai',	'andhra pradesh',	NULL,	'2015-07-16',	'team ios',	'BE(EC)',	'2',	'2015-07-20',	'2017-07-20',	'User',	1),
(32,	'FxB-72',	'Abhishek',	'paliwal',	'abhik144@gmail.com',	'ca73aa810d70a416dbe6cf13037607df',	'1345675467',	'5346789987654',	'',	'',	'2017-06-16',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(33,	'FxB-43',	'safd',	'asdf',	'abhik124@gmail.com',	'b9be11166d72e9e3ae7fd407165e4bd2',	'43256789',	'2345678',	'',	'',	'2017-06-15',	'',	'',	'female',	'sdadf',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(34,	'FxB-40',	'abhi`',	'abhi``',	'abhik14@gmail.com',	'6725fa800c08a79eb3c3ea00d9ecab2a',	'87456',	'4646',	'',	'',	'1970-01-01',	'',	'',	'female',	'vijay nagar indore',	'jag mohan das marg jhabua',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(35,	'FxB-21',	'sdfa',	'khjkj',	'abhi14@gmail.com',	'3403dc28538a64c46d0fcc6b040330a8',	'8549372349',	'437529084735',	'',	'',	'1970-01-01',	'married',	'',	'female',	'vijay nagar indore',	'',	'',	'',	NULL,	'1970-01-01',	'',	'',	'',	'1970-01-01',	'1970-01-01',	'User',	1),
(36,	'5243',	'xxax',	'saa',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'User',	1),
(37,	'FxB-18',	'abhi',	'abhi',	'abhi32@gmail.com',	'd76f3d05cc9ac98f1f9160274a39fe33',	'123456765',	'8967543212',	'trainee',	'trainee',	'2015-10-14',	'unmarried',	'indian',	'male',	'dewash naka indore',	'Bhopal',	'indore',	'andhra pradesh',	NULL,	'2017-05-04',	'team php',	'BE(CS)',	'1',	'2017-05-04',	'2018-05-04',	'User',	1),
(38,	'FxB-19',	'abhi',	'abhi',	'abhi34562@gmail.com',	'4450af79369dcf84dbdbd07e23965311',	'12345676588888',	'8967543212',	'trainee',	'trainee',	'2015-10-14',	'unmarried',	'indian',	'female',	'dewash naka indore',	'Bhopal',	'indore',	'andhra pradesh',	NULL,	'2017-06-14',	'team php',	'BE(CS)',	'1',	'2017-06-14',	'2017-06-14',	'User',	1),
(39,	'FxB-201',	'Abhishek',	'jain',	'kothari.abhishek22@fxbytes.com',	'e384bc1bc6dd6563503b62f0cee5213f',	'8989889898',	'9898989696',	'trainee',	'trainee',	'2015-08-05',	'unmarried',	'indian',	'female',	'indore',	'jag mohan das marg jhabua',	'indore',	'madhya pradesh',	NULL,	'2017-06-14',	'team php',	'MCA',	'1',	'2017-06-14',	'2017-06-14',	'User',	1),
(40,	'FxB-565',	'sdfsf',	'dfsf',	'root223@d.com',	'61a5935e5b33d0150f776ba4640f7ef4',	'625',	'14446',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'2017-06-14',	'',	'',	'',	'2017-06-14',	'2017-06-14',	'User',	1),
(41,	'FxB-96',	'qwerty',	'qwerty',	'jain.gourav@mailinator.com',	'9d0a7445f26ddcb89ef2f3ed05cb6380',	'987654',	'987654',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'2017-06-14',	'',	'',	'',	'2017-06-14',	'2017-06-14',	'User',	1),
(42,	'FxB-86',	'tesyt',	'sahdjka',	'jain.gourav1@mailinator.com',	'6eea9b7ef19179a06954edd0f6c05ceb',	'123456789999',	'',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'2017-06-14',	'',	'',	'',	'2017-06-14',	'2017-06-14',	'User',	1),
(43,	'FxB-23',	'asdff',	'',	'jain.gourav2@mailinator.com',	'63a9f0ea7bb98050796b649e85481845',	'0897654454',	'8976543',	'',	'',	'1970-01-01',	'',	'',	'female',	'',	'',	'',	'',	NULL,	'2017-06-14',	'',	'',	'',	'2017-06-14',	'2017-06-14',	'User',	1),
(44,	'FxB-22',	'test',	'test',	'test13@gmail.com',	'e10adc3949ba59abbe56e057f20f883e',	'21345764523',	'8975644567',	'developer',	'developer ios',	'2016-11-16',	'married',	'japanese',	'female',	'vijay nagar indore',	'Bhopal',	'ahmedabad',	'himachal pradesh',	NULL,	'2017-06-01',	'team php',	'BE(EC)',	'1',	'2017-06-01',	'2018-06-14',	'User',	1);

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

INSERT INTO `user_leave` (`id`, `employee_id`, `leave_type`, `from_date`, `to_date`, `status`, `comment`) VALUES
(1,	'FxB-01 : Abhishek',	'1',	'2017-06-05',	'2017-06-09',	NULL,	'hi'),
(2,	'FxB-02 : Ritesh',	'2',	'2017-06-12',	'2017-06-14',	NULL,	'ji'),
(3,	'FxB-01 : Abhishek',	'2',	'2017-07-03',	'2017-07-07',	NULL,	'hi'),
(4,	'FxB-02 : Ritesh',	'1',	'2017-05-31',	'2017-06-02',	'Active',	'hi'),
(5,	'FxB-01 : Abhishek',	'0',	'2017-05-31',	'2017-06-01',	'Active',	'hi'),
(6,	'FxB-02 : Ritesh',	'1',	'2017-06-01',	'2017-06-01',	'Active',	'hi'),
(7,	'FxB-01 : Abhishek',	'2',	'2017-05-31',	'2017-06-02',	'Active',	'hi'),
(8,	'FxB-02 : Ritesh',	'1',	'2017-06-01',	'2017-06-02',	'Active',	'hi'),
(9,	'FxB-01 : Abhishek',	'2',	'2017-06-01',	'2017-06-01',	'Active',	'hi'),
(10,	'FxB-02 : Ritesh',	'2',	'2017-06-01',	'2017-06-01',	'Active',	'hi'),
(11,	'FxB-01 : Abhishek',	'1',	'2017-06-01',	'2017-06-02',	'Active',	'hi'),
(12,	'FxB-02 : Ritesh',	'1',	'2017-06-01',	'2017-06-02',	'Active',	'hi'),
(13,	'FxB-02 : Ritesh',	'1',	'2017-06-01',	'2017-06-02',	'Active',	'hi'),
(14,	'FxB-02 : Ritesh',	'1',	'2017-06-15',	'2017-06-16',	'Active',	'fever'),
(15,	'FxB-02 : Ritesh',	'1',	'2017-06-15',	'2017-06-16',	'Active',	'fever'),
(16,	'FxB-02 : Ritesh',	'1',	'2017-06-15',	'2017-06-16',	'Active',	'fever');

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

INSERT INTO `user_news` (`id`, `image`, `tittle`, `news_date`, `description`, `status`) VALUES
(1,	NULL,	'Today',	NULL,	'',	0),
(2,	NULL,	'Today1',	NULL,	'tittle1',	0),
(3,	NULL,	'qwerty hi',	'2017-06-06',	'qwerty quert hii',	1),
(4,	NULL,	'qwerty',	'2017-06-06',	'qwerty',	1),
(5,	NULL,	'qwerty1',	'2017-06-06',	'qwerty1',	1),
(6,	NULL,	'qwerty1',	'2017-06-06',	'qwerty1',	0),
(7,	NULL,	'Today',	'2017-06-06',	'qwerty qwerty  ',	1),
(8,	'',	'asd',	'2017-06-01',	'asdsadsa',	1),
(9,	'Array',	'dfdsafsda',	'2017-06-01',	'asdfdasf',	1),
(10,	'Array',	'qwertyui',	'2017-06-09',	'sdfafasdf',	1),
(11,	'Array',	'pooi',	'2017-06-08',	'asdsa',	1),
(12,	'tree-images-HD7.jpg',	'tREE',	'2017-06-06',	'fdhdfgh',	1),
(13,	'tree.jpg',	'zxc',	'2017-06-06',	'zxczxc',	1),
(14,	'anniversary-quotes-696x583.jpg',	'abhi',	'2017-06-02',	'abhishek kothari',	1);

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

INSERT INTO `user_policy` (`id`, `policy_type`, `from_date`, `to_date`, `file_path`, `comment`, `status`) VALUES
(1,	'GDM1',	'2017-04-01',	'2017-06-01',	'',	'Group dis',	1),
(2,	'KYT',	'2017-06-02',	'2018-06-02',	NULL,	'Hiiiiii',	1),
(3,	'fgdgd',	'2017-06-07',	'2017-06-11',	'1494409336-NBNZoneManagementProposalAugust2016includingadditionalenhancementsFXB.pdf',	NULL,	1),
(4,	'leave',	'2017-06-07',	'2017-08-03',	'1494409336-NBNZoneManagementProposalAugust2016includingadditionalenhancementsFXB.pdf',	NULL,	1),
(5,	'asd',	'2017-06-07',	'2017-06-24',	'M_app02 (1).pdf',	NULL,	1);

-- 2017-06-14 14:07:23
