-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2019 at 12:16 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `ApplicationId` int(10) UNSIGNED NOT NULL,
  `SeekerId` int(10) UNSIGNED NOT NULL,
  `ProviderId` int(10) UNSIGNED NOT NULL,
  `JobId` int(11) NOT NULL,
  `Status` varchar(45) NOT NULL DEFAULT '0',
  `ApplicationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`ApplicationId`, `SeekerId`, `ProviderId`, `JobId`, `Status`, `ApplicationDate`) VALUES
(1, 1, 1, 1, 'None', '2015-05-12'),
(2, 1, 1, 4, 'None', '2015-05-12'),
(3, 8, 1, 1, 'None', '2019-07-31'),
(4, 8, 1, 1, 'None', '2019-07-31'),
(5, 8, 1, 1, 'None', '2019-07-31'),
(6, 8, 1, 1, 'None', '2019-07-31'),
(7, 8, 1, 4, 'None', '2019-07-31'),
(8, 8, 1, 4, 'None', '2019-07-31'),
(9, 8, 3, 3, 'None', '2019-07-31'),
(10, 8, 3, 3, 'None', '2019-07-31'),
(11, 8, 3, 3, 'None', '2019-07-31'),
(12, 8, 3, 3, 'None', '2019-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `JobId` int(10) UNSIGNED NOT NULL,
  `ProviderId` int(10) UNSIGNED NOT NULL,
  `AreaOfWork` varchar(45) NOT NULL,
  `Post` varchar(50) NOT NULL,
  `JobDescription` varchar(1000) NOT NULL,
  `ExperienceRequired` varchar(20) NOT NULL,
  `SkillsRequired` varchar(45) NOT NULL,
  `JobLocation` varchar(40) NOT NULL,
  `Salary` varchar(45) NOT NULL,
  `OpenDate` date NOT NULL,
  `CloseDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`JobId`, `ProviderId`, `AreaOfWork`, `Post`, `JobDescription`, `ExperienceRequired`, `SkillsRequired`, `JobLocation`, `Salary`, `OpenDate`, `CloseDate`) VALUES
(1, 1, 'IT', 'Junior Software Developer', 'The person is responsible for the growth of the organization and should be willing to learn in a progressive manner', '0', 'Java', 'Pune, India', '3 lacs', '2015-05-05', '2015-05-15'),
(2, 2, 'Accounting', 'Finance Manager', 'The person is responsible for the growth of the organization and should be willing to learn in a progressive manner', '1 year', 'PHP', 'Punjab', '4 lacs', '2015-05-06', '2015-05-16'),
(3, 3, 'Finance', 'Manager', 'The person is responsible for the growth of the organization and should be willing to learn in a progressive manner', '5 years', 'Asp.net', 'Dehradun', '3-8 lacs', '2015-05-14', '2015-05-29'),
(5, 2, 'Marketing', 'Marketing Executive', 'The person is responsible for the growth of the organization and should be willing to learn in a progressive manner', '2 years', 'C, C++', 'Delhi', '4 lacs', '2015-05-04', '2015-05-08'),
(6, 3, 'Teaching', 'Trainer', 'The person should be comfortable in working 24 by 7 working hours', '4 years', 'Java', 'Sikkim', '6 lacs', '2015-05-20', '2015-05-31'),
(7, 1, 'Management', 'COO', 'Manageming our company at the 2nd level.', '2 Years exp. with un', 'Team Player', 'India', '55000', '1970-01-01', '1970-01-01'),
(8, 19, 'Management', 'Delivery Incharge', 'Manage the delivery staff.', '2 Years exp. with sw', 'Good Manager', 'Singapore', '49000', '1970-01-01', '1970-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `job_areas`
--

CREATE TABLE `job_areas` (
  `AreaOfWork` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_areas`
--

INSERT INTO `job_areas` (`AreaOfWork`) VALUES
('Accounting'),
('Finance'),
('IT'),
('Management'),
('Marketing'),
('Teaching');

-- --------------------------------------------------------

--
-- Table structure for table `job_providers`
--

CREATE TABLE `job_providers` (
  `ProviderId` int(10) UNSIGNED NOT NULL,
  `UserName` varchar(40) NOT NULL,
  `CompanyName` varchar(45) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Country` varchar(45) NOT NULL,
  `Website` varchar(45) NOT NULL,
  `HRName` varchar(45) NOT NULL,
  `HREmail` varchar(45) NOT NULL,
  `HRPhone` varchar(45) NOT NULL,
  `Logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_providers`
--

INSERT INTO `job_providers` (`ProviderId`, `UserName`, `CompanyName`, `Address`, `City`, `Country`, `Website`, `HRName`, `HREmail`, `HRPhone`, `Logo`) VALUES
(1, 'unisoft', 'Unisoft Technologies', 'Ballupur Chowk', 'Dehradun', 'India', 'http://www.unisoft.com', 'Alok Bisht', 'alokbisht@gmail.com', '9876543210', 'provider/logo/unisoft.jpg'),
(2, 'wipro', 'Wipro Technologies', 'Lajpat Nagar', 'Delhi', 'India', 'http://www.wipro.com', 'Rahul Kushwaha', 'rahul@gmail.com', '9786123556', 'provider/logo/wipro.jpg'),
(3, 'pentasoft', 'Pentasoft Technologies', 'Yamuna Colony', 'Bangalore', 'India', 'http://www.pentasoft.com', 'Amit Sharma', 'amitsharma123@gmail.com', '9411235510', 'provider/logo/pentasoft.jpg'),
(4, 'accenture', 'Accenture', 'M G Road', 'Bangalore', 'India', 'http://www.accenture.com', 'D P Suresh', 'hr@accenture.com', '9456943848', 'provider/logo/accenture.jpg'),
(5, 'infosys', 'Infosys', '13, A R Road, IT Park', 'Bangalore', 'India', 'http://www.infosys.com', 'A S R Prasad', 'hr@infosys.com', '9934594354', 'provider/logo/infosys.jpg'),
(19, 'zomato', 'Zomato Foods', 'near Big Cinemas', 'Jalandhar', 'India', 'http://www.zomato.com', 'Ravi Tej', 'ravi@zomato.hr.in', '9856715341', 'provider/logo/zomato.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_seekers`
--

CREATE TABLE `job_seekers` (
  `SeekerId` int(10) UNSIGNED NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Phone` varchar(45) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Country` varchar(45) NOT NULL,
  `Qualification` varchar(45) NOT NULL,
  `Experience` varchar(45) NOT NULL,
  `Objective` varchar(250) NOT NULL,
  `Skills` varchar(45) NOT NULL,
  `BioData` varchar(45) NOT NULL,
  `Photo` varchar(45) NOT NULL,
  `AreaOfWork` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_seekers`
--

INSERT INTO `job_seekers` (`SeekerId`, `UserName`, `Gender`, `Email`, `Phone`, `DateOfBirth`, `Address`, `City`, `Country`, `Qualification`, `Experience`, `Objective`, `Skills`, `BioData`, `Photo`, `AreaOfWork`) VALUES
(1, 'mahima', 'Female', 'mahimasharma.geu@gmail.com', '8267897224', '1994-05-19', 'Bell Road Clemem Town Dehradun', 'Dehradun', 'India', 'MCA', '1 Year', 'Become a Software developer....', 'PHP', 'seeker/biodata/mahima.docx', 'seeker/photos/mahima.jpg', 'IT'),
(3, 'rashmi', 'Female', 'rashmi.chaubey13@gmail.com', '9917679125', '1992-08-25', 'House No. 9, Saraswati Enclave', 'Dehradun', 'India', 'MCA', '0', 'To grow up and learn with a progressive firm', 'Java', 'seeker/biodata/rashmi.docx', 'seeker/photos/rashmi.jpg', 'IT'),
(4, 'nagendra', 'Male', 'ndhagarra@gmail.com', '9319056587', '1996-05-21', 'Mohit Nagar', 'Dehradun', 'India', 'M.Tech.', '3 Years', 'To become a good software developer.', 'Java', 'seeker/biodata/nagendra.docx', 'seeker/photos/nagendra.jpg', 'IT'),
(7, 'akshat', 'Male', 'akshat@gmail.com', '9319056587', '1996-05-28', 'M G Road', 'Bangluru', 'India', 'B.Tech.', '2 Years', 'To become a Software Developer..', 'Java, Android', 'seeker/biodata/akshat.docx', 'seeker/photos/akshat.jpg', 'Accounting'),
(8, 'bharat', 'Male', 'bharatgoel456@gmail.com', '7017179202', '2000-08-02', '72, THDC Colony', 'Dehradun', 'India', 'B.Tech CSE-AI&ML', '2 Years exp. with unisoft tech.', 'To help my company grow.', 'Java Expert', 'seeker/biodata/bharat.docx', 'seeker/photos/bharat.jpg', 'Finance'),
(10, 'shubham', 'Male', 'shubhamsanghi15@gmail.com', '9634498226', '1999-05-11', 'Dalanwala, Dehradun', 'Dehradun', 'India', 'B.Tech CSE-AI&ML', '2 Years exp. with unisoft tech.', 'To help my company gain profits.', 'Team Player', 'seeker/biodata/shubham.docx', 'seeker/photos/shubham.jpg', 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageId` int(10) UNSIGNED NOT NULL,
  `ProviderId` varchar(45) NOT NULL,
  `SeekerId` varchar(45) NOT NULL,
  `MessageText` varchar(500) NOT NULL,
  `MessageDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageId`, `ProviderId`, `SeekerId`, `MessageText`, `MessageDate`) VALUES
(1, '1', '1', 'Hi, Interview on 10-June-2015', '2015-05-19 00:00:00'),
(2, '1', '1', 'Hi, interview on 15-June-2015. Other details will be sent via email.', '2015-05-19 00:00:00'),
(3, '1', '1', 'Hi', '2015-05-19 00:00:00'),
(4, '1', '1', 'Hello', '2015-05-19 00:00:00'),
(5, '1', '8', 'You are hired', '2019-07-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserName` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `RoleName` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `SecretQuestion` varchar(200) NOT NULL,
  `Answer` varchar(100) NOT NULL,
  `ProfileComplete` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserName`, `Password`, `RoleName`, `Email`, `Name`, `SecretQuestion`, `Answer`, `ProfileComplete`) VALUES
('accenture', 'abc123', 'JobProvider', 'accenture@gmail.com', 'Accenture', 'Favourite Color', 'red', 1),
('akshat', 'abc123', 'JobSeeker', 'akshat@gmail.com', 'Akshat Sharma', 'Favorite Color', 'red', 1),
('bharat', 'abc123', 'JobSeeker', 'bharatgoel456@gmail.com', 'Bharat Goyal', 'Favorite Color', 'Black', 1),
('infosys', 'abc123', 'JobProvider', 'infosys@gmail.com', 'Infosys', 'Favourite Color', 'red', 1),
('mahima', 'abc123', 'JobSeeker', 'mahimasharma.geu@gmail.com', 'Mahima Sharma', 'favorite color', 'red', 1),
('nagendra', 'abc123', 'JobSeeker', 'ndhagarra@gmail.com', 'Nagendra Dhagarra', 'Favorite Color', 'red', 1),
('pentasoft', 'abc123', 'JobProvider', 'pentasoft@gmail.com', 'Pentasoft Technologies', 'favorite color', 'red', 1),
('rashmi', 'abc123', 'JobSeeker', 'rashmi.chaubey13@gmail.com', 'RashmiChaubey', 'favorite color', 'red', 1),
('shubham', 'abc123', 'JobSeeker', 'shubhamsanghi15@gmail.com', 'Shubham Sanghi', 'Favorite Color', 'Black', 1),
('unisoft', 'abc123', 'JobProvider', 'unisoft@gmail.com', 'Unisoft Technologies', 'favorite color', 'red', 1),
('wipro', 'abc123', 'JobProvider', 'wipro@gmail.com', 'Wipro Technologies', 'favorite color', 'red', 1),
('zomato', 'abc123', 'JobProvider', 'zomato@gmail.com', 'Zomato Foods', 'Favorite Color', 'Black', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`ApplicationId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`JobId`);

--
-- Indexes for table `job_areas`
--
ALTER TABLE `job_areas`
  ADD PRIMARY KEY (`AreaOfWork`);

--
-- Indexes for table `job_providers`
--
ALTER TABLE `job_providers`
  ADD PRIMARY KEY (`ProviderId`);

--
-- Indexes for table `job_seekers`
--
ALTER TABLE `job_seekers`
  ADD PRIMARY KEY (`SeekerId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `ApplicationId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `JobId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_providers`
--
ALTER TABLE `job_providers`
  MODIFY `ProviderId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `job_seekers`
--
ALTER TABLE `job_seekers`
  MODIFY `SeekerId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
