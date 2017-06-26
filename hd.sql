-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2017 at 01:40 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_houzdealz`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city` varchar(50) NOT NULL,
  `state_code` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cities_extended`
--

CREATE TABLE `cities_extended` (
  `id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state_code` char(2) NOT NULL,
  `zip` int(5) UNSIGNED ZEROFILL NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `county` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `state_code` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appraisers`
--

CREATE TABLE `tbl_appraisers` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` int(11) NOT NULL,
  `state` varchar(11) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `licensed_state` varchar(3) NOT NULL,
  `license_number` varchar(25) NOT NULL,
  `classification` int(11) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `id_proof_attached` int(11) NOT NULL,
  `id_proof_attachment` varchar(255) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyers`
--

CREATE TABLE `tbl_buyers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` int(4) NOT NULL,
  `state` varchar(4) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_proof_attached` int(11) NOT NULL,
  `id_proof_attachment` varchar(255) NOT NULL,
  `marital_status` varchar(15) NOT NULL,
  `spouse_name` varchar(100) DEFAULT NULL,
  `telephone` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `need_mortgage` int(11) NOT NULL,
  `have_fund_proof` int(11) NOT NULL,
  `fund_proof_attachment` varchar(255) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_closing_attorneys`
--

CREATE TABLE `tbl_closing_attorneys` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(3) NOT NULL,
  `city` int(11) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `id_proof_attached` int(11) NOT NULL,
  `id_proof_attachment` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `experience` varchar(500) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `license_number` bigint(20) NOT NULL,
  `license_type` int(11) NOT NULL,
  `licensed_state` varchar(3) NOT NULL,
  `bar_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contractors`
--

CREATE TABLE `tbl_contractors` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` int(11) NOT NULL,
  `state` varchar(11) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `licensed_state` varchar(3) NOT NULL,
  `license_number` varchar(25) NOT NULL,
  `classification` int(11) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `id_proof_attached` int(11) NOT NULL,
  `id_proof_attachment` varchar(255) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inspectors`
--

CREATE TABLE `tbl_inspectors` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(3) NOT NULL,
  `city` int(11) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_proof_attached` int(11) NOT NULL,
  `id_proof_attachment` varchar(255) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `licensed_state` varchar(3) NOT NULL,
  `license_number` int(11) NOT NULL,
  `license_type` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mortgage_loan_officer`
--

CREATE TABLE `tbl_mortgage_loan_officer` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(3) NOT NULL,
  `city` int(11) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_proof_attached` int(11) NOT NULL,
  `id_proof_attachment` varchar(255) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `branch_nmls` varchar(255) NOT NULL,
  `nmls` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_professionals`
--

CREATE TABLE `tbl_professionals` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(3) NOT NULL,
  `city` int(11) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_proof_attached` int(11) NOT NULL,
  `id_proof_attachment` varchar(5000) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `licensed_state` varchar(3) NOT NULL,
  `license_number` varchar(30) NOT NULL,
  `license_type` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_properties`
--

CREATE TABLE `tbl_properties` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `property_type` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` int(11) NOT NULL,
  `state` varchar(3) NOT NULL,
  `zip_code` varchar(11) NOT NULL,
  `property_images` varchar(10000) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `square_feet` decimal(14,1) NOT NULL,
  `lot_square_feet` decimal(14,1) NOT NULL,
  `pool` enum('1','2') NOT NULL,
  `garage` enum('1','2') NOT NULL,
  `pool_shape` varchar(20) DEFAULT NULL,
  `pool_dimension` varchar(100) DEFAULT NULL,
  `garage_capacity` int(2) DEFAULT NULL,
  `description` text NOT NULL,
  `features` text NOT NULL,
  `floors` int(11) NOT NULL,
  `rating` int(1) NOT NULL DEFAULT '1',
  `nearby_location` int(11) DEFAULT NULL,
  `in_city` enum('1','2') NOT NULL,
  `in_city_school` decimal(5,2) DEFAULT NULL,
  `in_city_market` decimal(5,2) DEFAULT NULL,
  `in_city_hospital` decimal(5,2) DEFAULT NULL,
  `dis_from_main_city` decimal(5,2) DEFAULT NULL,
  `not_in_city_school` decimal(5,2) DEFAULT NULL,
  `not_in_city_market` decimal(5,2) DEFAULT NULL,
  `not_in_city_hospital` decimal(5,2) DEFAULT NULL,
  `built_in_year` int(11) NOT NULL,
  `estimated_payoff` decimal(20,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property_search_type`
--

CREATE TABLE `tbl_property_search_type` (
  `id` int(11) NOT NULL,
  `search_type` varchar(100) NOT NULL,
  `search_slug` varchar(100) NOT NULL,
  `is_enabled` enum('1','2') NOT NULL,
  `search_params` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property_type`
--

CREATE TABLE `tbl_property_type` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(50) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `description` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_realtors`
--

CREATE TABLE `tbl_realtors` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(3) NOT NULL,
  `city` int(11) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_proof_attached` int(11) NOT NULL,
  `id_proof_attachment` varchar(5000) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `licensed_state` varchar(3) NOT NULL,
  `license_number` varchar(30) NOT NULL,
  `license_type` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sellers`
--

CREATE TABLE `tbl_sellers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` int(4) NOT NULL,
  `state` varchar(3) NOT NULL,
  `zip_code` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_proof_attached` int(11) NOT NULL,
  `id_proof_attachment` varchar(255) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surveyors`
--

CREATE TABLE `tbl_surveyors` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(3) NOT NULL,
  `city` int(11) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_proof_attached` int(11) NOT NULL,
  `id_proof_attachment` varchar(255) NOT NULL,
  `profile_pic` varchar(1000) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `experience` varchar(500) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `licensed_state` varchar(3) NOT NULL,
  `license_number` int(11) NOT NULL,
  `license_type` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_title_companies`
--

CREATE TABLE `tbl_title_companies` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(3) NOT NULL,
  `city` int(11) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_proof_attached` int(11) NOT NULL,
  `id_proof_attachment` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_pic` varchar(500) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `licensed_state` varchar(3) NOT NULL,
  `license_number` int(11) NOT NULL,
  `license_type` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `naic` int(11) NOT NULL,
  `npn` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `terms` varchar(10) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities_extended`
--
ALTER TABLE `cities_extended`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_appraisers`
--
ALTER TABLE `tbl_appraisers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_buyers`
--
ALTER TABLE `tbl_buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_closing_attorneys`
--
ALTER TABLE `tbl_closing_attorneys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contractors`
--
ALTER TABLE `tbl_contractors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inspectors`
--
ALTER TABLE `tbl_inspectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mortgage_loan_officer`
--
ALTER TABLE `tbl_mortgage_loan_officer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_professionals`
--
ALTER TABLE `tbl_professionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_properties`
--
ALTER TABLE `tbl_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_property_search_type`
--
ALTER TABLE `tbl_property_search_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_property_type`
--
ALTER TABLE `tbl_property_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_realtors`
--
ALTER TABLE `tbl_realtors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sellers`
--
ALTER TABLE `tbl_sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_surveyors`
--
ALTER TABLE `tbl_surveyors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_title_companies`
--
ALTER TABLE `tbl_title_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities_extended`
--
ALTER TABLE `cities_extended`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41756;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_appraisers`
--
ALTER TABLE `tbl_appraisers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_buyers`
--
ALTER TABLE `tbl_buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_closing_attorneys`
--
ALTER TABLE `tbl_closing_attorneys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_contractors`
--
ALTER TABLE `tbl_contractors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_inspectors`
--
ALTER TABLE `tbl_inspectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_mortgage_loan_officer`
--
ALTER TABLE `tbl_mortgage_loan_officer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_professionals`
--
ALTER TABLE `tbl_professionals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_properties`
--
ALTER TABLE `tbl_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_property_search_type`
--
ALTER TABLE `tbl_property_search_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_property_type`
--
ALTER TABLE `tbl_property_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_realtors`
--
ALTER TABLE `tbl_realtors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_sellers`
--
ALTER TABLE `tbl_sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_surveyors`
--
ALTER TABLE `tbl_surveyors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_title_companies`
--
ALTER TABLE `tbl_title_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
