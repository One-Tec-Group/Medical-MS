-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 05:18 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h6demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `acm_account`
--

CREATE TABLE `acm_account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acm_invoice`
--

CREATE TABLE `acm_invoice` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) NOT NULL,
  `total` float NOT NULL,
  `vat` float NOT NULL,
  `discount` float NOT NULL,
  `grand_total` float NOT NULL,
  `paid` float NOT NULL,
  `due` float NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acm_invoice_details`
--

CREATE TABLE `acm_invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `acm_payment`
--

CREATE TABLE `acm_payment` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `pay_to` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` float NOT NULL,
  `created_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `appointment_id` varchar(20) DEFAULT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `serial_no` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `problem` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `create_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` varchar(20) DEFAULT NULL,
  `bill_type` varchar(20) DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `discount` float DEFAULT 0,
  `tax` float DEFAULT 0,
  `total` float DEFAULT 0,
  `payment_method` varchar(10) DEFAULT NULL,
  `card_cheque_no` varchar(100) DEFAULT NULL,
  `receipt_no` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bill_admission`
--

CREATE TABLE `bill_admission` (
  `id` int(11) UNSIGNED NOT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `discharge_date` date DEFAULT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `policy_no` varchar(100) DEFAULT NULL,
  `agent_name` varchar(255) DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_relation` varchar(255) DEFAULT NULL,
  `guardian_contact` varchar(255) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bill_advanced`
--

CREATE TABLE `bill_advanced` (
  `id` int(11) UNSIGNED NOT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `patient_id` varchar(30) DEFAULT NULL,
  `amount` float DEFAULT 0,
  `payment_method` varchar(255) DEFAULT NULL,
  `cash_card_or_cheque` varchar(10) DEFAULT NULL COMMENT '1 cash, 2 card, 3 cheque',
  `receipt_no` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` varchar(20) DEFAULT NULL,
  `admission_id` varchar(20) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `quantity` float DEFAULT 0,
  `amount` float DEFAULT 0,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bill_package`
--

CREATE TABLE `bill_package` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `services` text DEFAULT NULL,
  `discount` float DEFAULT 0,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bill_service`
--

CREATE TABLE `bill_service` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` float DEFAULT 0,
  `amount` float DEFAULT 0,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bm_bed`
--

CREATE TABLE `bm_bed` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `limit` int(3) NOT NULL,
  `charge` float NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bm_bed_assign`
--

CREATE TABLE `bm_bed_assign` (
  `id` int(11) NOT NULL,
  `serial` varchar(20) DEFAULT NULL,
  `patient_id` varchar(20) NOT NULL,
  `bed_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `assign_date` date NOT NULL,
  `discharge_date` date NOT NULL,
  `assign_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cm_patient`
--

CREATE TABLE `cm_patient` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `case_manager_id` int(11) NOT NULL,
  `ref_doctor_id` int(11) DEFAULT NULL,
  `hospital_name` varchar(255) DEFAULT NULL,
  `hospital_address` text DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cm_status`
--

CREATE TABLE `cm_status` (
  `id` int(11) NOT NULL,
  `critical_status` varchar(255) NOT NULL DEFAULT '1',
  `cm_patient_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_sms_info`
--

CREATE TABLE `custom_sms_info` (
  `custom_sms_id` int(11) NOT NULL,
  `reciver` varchar(100) NOT NULL,
  `gateway` text NOT NULL,
  `message` text NOT NULL,
  `sms_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dprt_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `hidden_attach_file` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `upload_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ha_birth`
--

CREATE TABLE `ha_birth` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ha_category`
--

CREATE TABLE `ha_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ha_death`
--

CREATE TABLE `ha_death` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ha_investigation`
--

CREATE TABLE `ha_investigation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ha_medicine`
--

CREATE TABLE `ha_medicine` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `manufactured_by` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ha_operation`
--

CREATE TABLE `ha_operation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inc_insurance`
--

CREATE TABLE `inc_insurance` (
  `id` int(11) NOT NULL,
  `insurance_name` varchar(255) DEFAULT NULL,
  `service_tax` varchar(50) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `insurance_no` varchar(50) DEFAULT NULL,
  `insurance_code` varchar(50) DEFAULT NULL,
  `disease_charge` text DEFAULT NULL COMMENT 'array(name, charge)',
  `hospital_rate` varchar(50) DEFAULT NULL,
  `insurance_rate` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inc_limit_approval`
--

CREATE TABLE `inc_limit_approval` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(30) DEFAULT NULL,
  `room_no` varchar(100) DEFAULT NULL,
  `disease_details` text DEFAULT NULL COMMENT 'name, description',
  `consultant_id` int(11) DEFAULT NULL COMMENT 'doctor list',
  `policy_name` varchar(255) DEFAULT NULL,
  `policy_no` varchar(100) DEFAULT NULL,
  `policy_holder_name` varchar(255) DEFAULT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `approval_breakup` text DEFAULT NULL COMMENT 'name, charge',
  `total` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) UNSIGNED NOT NULL,
  `phrase` text NOT NULL,
  `english` text DEFAULT NULL,
  `arabic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `phrase`, `english`, `arabic`) VALUES
(1, 'email', 'Email Address', ''),
(2, 'password', 'Password', ''),
(3, 'login', 'Log In', ''),
(4, 'incorrect_email_password', 'Incorrect Email/Password!', ''),
(5, 'user_role', 'User Role', ''),
(6, 'please_login', 'Please Log In', ''),
(7, 'setting', 'Setting', ''),
(8, 'profile', 'Profile', ''),
(9, 'logout', 'Log Out', ''),
(10, 'please_try_again', 'Please Try Again', ''),
(11, 'admin', 'Admin', ''),
(12, 'doctor', 'Doctor', ''),
(13, 'representative', 'Representative', ''),
(14, 'dashboard', 'Dashboard', ''),
(15, 'department', 'Department', ''),
(16, 'add_department', 'Add Department', ''),
(17, 'department_list', 'Department List', ''),
(18, 'add_doctor', 'Add Doctor', ''),
(19, 'doctor_list', 'Doctor List', ''),
(20, 'add_representative', 'Add Representative', ''),
(21, 'representative_list', 'Representative List', ''),
(22, 'patient', 'Patient', ''),
(23, 'add_patient', 'Add Patient', ''),
(24, 'patient_list', 'Patient List', ''),
(25, 'schedule', 'Schedule', ''),
(26, 'add_schedule', 'Add Schedule', ''),
(27, 'schedule_list', 'Schedule List', ''),
(28, 'appointment', 'Appointment', ''),
(29, 'add_appointment', 'Add Appointment', 'إضافة موعد'),
(30, 'appointment_list', 'Appointment List', ''),
(31, 'enquiry', 'Enquiry', ''),
(32, 'language_setting', 'Language Setting', ''),
(33, 'appointment_report', 'Appointment Report', ''),
(34, 'assign_by_all', 'Assign by All', ''),
(35, 'assign_by_doctor', 'Assign by Doctor', ''),
(36, 'assign_to_doctor', 'Assign to Doctor', ''),
(37, 'assign_by_representative', 'Assign by Representative', ''),
(38, 'report', 'Report', ''),
(39, 'assign_by_me', 'Assign by Me', ''),
(40, 'assign_to_me', 'Assign to Me', ''),
(41, 'website', 'Website', ''),
(42, 'slider', 'Slider', ''),
(43, 'section', 'Section', ''),
(44, 'section_item', 'Section Item', ''),
(45, 'comments', 'Comment', ''),
(46, 'latest_enquiry', 'Latest Enquiry', ''),
(47, 'total_progress', 'Total Progress', ''),
(48, 'last_year_status', 'Showing status from the last year', ''),
(49, 'department_name', 'Department Name', ''),
(50, 'description', 'Description', ''),
(51, 'status', 'Status', ''),
(52, 'active', 'Active', 'فعال'),
(53, 'inactive', 'Inactive', ''),
(54, 'cancel', 'Cancel', ''),
(55, 'save', 'Save', ''),
(56, 'serial', 'SL.NO', ''),
(57, 'action', 'Action', 'الحدث'),
(58, 'edit', 'Edit ', ''),
(59, 'delete', 'Delete', ''),
(60, 'save_successfully', 'Save Successfully!', ''),
(61, 'update_successfully', 'Update Successfully!', ''),
(62, 'department_edit', 'Department Edit', ''),
(63, 'delete_successfully', 'Delete successfully!', ''),
(64, 'are_you_sure', 'Are You Sure ? ', ''),
(65, 'first_name', 'First Name', ''),
(66, 'last_name', 'Last Name', ''),
(67, 'phone', 'Phone No', ''),
(68, 'mobile', 'Mobile No', ''),
(69, 'blood_group', 'Blood Group', ''),
(70, 'sex', 'Sex', ''),
(71, 'date_of_birth', 'Date of Birth', ''),
(72, 'address', 'Address', 'العنوان'),
(73, 'invalid_picture', 'Invalid Picture', ''),
(74, 'doctor_profile', 'Doctor Profile', ''),
(75, 'edit_profile', 'Edit Profile', ''),
(76, 'edit_doctor', 'Edit Doctor', ''),
(77, 'designation', 'Designation', ''),
(78, 'short_biography', 'Short Biography', ''),
(79, 'picture', 'Picture', ''),
(80, 'specialist', 'Specialist', ''),
(81, 'male', 'Male', ''),
(82, 'female', 'Female', ''),
(83, 'education_degree', 'Education/Degree', ''),
(84, 'create_date', 'Create Date', ''),
(85, 'view', 'View', ''),
(86, 'doctor_information', 'Doctor Information', ''),
(87, 'update_date', 'Update Date', ''),
(88, 'print', 'Print', ''),
(89, 'representative_edit', 'Representative Edit', ''),
(90, 'patient_information', 'Patient Information', ''),
(91, 'other', 'Other', ''),
(92, 'patient_id', 'Patient ID', ''),
(93, 'age', 'Age', ''),
(94, 'patient_edit', 'Patient Edit', ''),
(95, 'id_no', 'ID No.', ''),
(96, 'select_option', 'Select Option', ''),
(97, 'doctor_name', 'Doctor Name', ''),
(98, 'day', 'Day', ''),
(99, 'start_time', 'Start Time', ''),
(100, 'end_time', 'End Time', ''),
(101, 'per_patient_time', 'Per Patient Time', ''),
(102, 'serial_visibility_type', 'Serial Visibility', ''),
(103, 'sequential', 'Sequential', ''),
(104, 'timestamp', 'Timestamp', ''),
(105, 'available_days', 'Available Days', 'الأيام المتاحة'),
(106, 'schedule_edit', 'Schedule Edit', ''),
(107, 'available_time', 'Available Time', 'المواعيد المتاحة'),
(108, 'serial_no', 'Serial No', ''),
(109, 'problem', 'Problem', ''),
(110, 'appointment_date', 'Appointment Date', ''),
(111, 'you_are_already_registered', 'You Are Already Registered', ''),
(112, 'invalid_patient_id', 'Invalid patient ID', ''),
(113, 'invalid_input', 'Invalid Input', ''),
(114, 'no_doctor_available', 'No Doctor Available', ''),
(115, 'invalid_department', 'Invalid Department!', ''),
(116, 'no_schedule_available', 'No Schedule Available', ''),
(117, 'please_fillup_all_required_fields', 'Please fillup all required filelds', ''),
(118, 'appointment_id', 'Appointment ID', ''),
(119, 'schedule_time', 'Schedule Time', ''),
(120, 'appointment_information', 'Appointment Information', ''),
(121, 'full_name', 'Full Name', ''),
(122, 'read_unread', 'Read / Unread', ''),
(123, 'date', 'Date', ''),
(124, 'ip_address', 'IP Address', ''),
(125, 'user_agent', 'User Agent', ''),
(126, 'checked_by', 'Checked By', ''),
(127, 'enquiry_date', 'Enquirey Date', ''),
(128, 'enquiry_list', 'Enquiry List', ''),
(129, 'filter', 'Filter', ''),
(130, 'start_date', 'Start Date', ''),
(131, 'end_date', 'End Date', ''),
(132, 'application_title', 'Application Title', ''),
(133, 'favicon', 'Favicon', ''),
(134, 'logo', 'Logo', ''),
(135, 'footer_text', 'Footer Text', ''),
(136, 'language', 'Language', ''),
(137, 'appointment_assign_by_all', 'Appointment Assign by All', ''),
(138, 'appointment_assign_by_doctor', 'Appointment Assign by Doctor', ''),
(139, 'appointment_assign_by_representative', 'Appointment Assign by Representative', ''),
(140, 'appointment_assign_to_all_doctor', 'Appointment Assign to All Doctor', ''),
(141, 'appointment_assign_to_me', 'Appointment Assign to Me', ''),
(142, 'appointment_assign_by_me', 'Appointment Assign by Me', ''),
(143, 'type', 'Type', ''),
(144, 'website_title', 'Website Title', ''),
(145, 'invalid_logo', 'Invalid Logo', ''),
(146, 'details', 'Details', ''),
(147, 'website_setting', 'Website Setting', ''),
(148, 'submit_successfully', 'Submit Successfully!', ''),
(149, 'application_setting', 'Application Setting', ''),
(150, 'invalid_favicon', 'Invalid Favicon', ''),
(151, 'new_enquiry', 'New Enquiry', ''),
(152, 'information', 'Information', ''),
(153, 'home', 'Home', ''),
(154, 'select_department', 'Select Department', ''),
(155, 'select_doctor', 'Select Doctor', ''),
(156, 'select_representative', 'Select Representative', ''),
(157, 'post_id', 'Post ID', ''),
(158, 'thank_you_for_your_comment', 'Thank you for your comment!', ''),
(159, 'comment_id', 'Comment ID', ''),
(160, 'comment_status', 'Comment Status', ''),
(161, 'comment_added_successfully', 'Comment Added Successfully', ''),
(162, 'comment_remove_successfully', 'Comment Remove Successfully', ''),
(163, 'select_item', 'Section Item', ''),
(164, 'add_item', 'Add Item', ''),
(165, 'menu_name', 'Menu Name', ''),
(166, 'title', 'Title', ''),
(167, 'position', 'Position', ''),
(168, 'invalid_icon_image', 'Invalid Icon Image!', ''),
(169, 'about', 'About', 'حول'),
(170, 'blog', 'Blog', ''),
(171, 'service', 'Service', ''),
(172, 'item_edit', 'Item Edit', ''),
(173, 'registration_successfully', 'Registration Successfully', ''),
(174, 'add_section', 'Add Section', ''),
(175, 'section_name', 'Section Name', ''),
(176, 'invalid_featured_image', 'Invalid Featured Image!', ''),
(177, 'section_edit', 'Section Edit', ''),
(178, 'meta_description', 'Meta Description', ''),
(179, 'twitter_api', 'Twitter Api', ''),
(180, 'google_map', 'Google Map', ''),
(181, 'copyright_text', 'Copyright Text', ''),
(182, 'facebook_url', 'Facebook URL', ''),
(183, 'twitter_url', 'Twitter URL', ''),
(184, 'vimeo_url', 'Vimeo URL', ''),
(185, 'instagram_url', 'Instagram Url', ''),
(186, 'dribbble_url', 'Dribbble URL', ''),
(187, 'skype_url', 'Skype URL', ''),
(188, 'add_slider', 'Add Slider', ''),
(189, 'subtitle', 'Sub Title', ''),
(190, 'slide_position', 'Slide Position', ''),
(191, 'invalid_image', 'Invalid Image', ''),
(192, 'image_is_required', 'Image is required', ''),
(193, 'slider_edit', 'Slider Edit', ''),
(194, 'meta_keyword', 'Meta Keyword', ''),
(195, 'year', 'Year', ''),
(196, 'month', 'Month', ''),
(197, 'recent_post', 'Recent Post', ''),
(198, 'leave_a_comment', 'Leave a Comment', ''),
(199, 'submit', 'Submit', ''),
(200, 'google_plus_url', 'Google Plus URL', ''),
(201, 'website_status', 'Website Status', ''),
(202, 'new_slide', 'New Slide', ''),
(203, 'new_section', 'New Section', ''),
(204, 'subtitle_description', 'Sub Title / Description', ''),
(205, 'featured_image', 'Featured Image', ''),
(206, 'new_item', 'New Item', ''),
(207, 'item_position', 'Item Position', ''),
(208, 'icon_image', 'Icon Image', ''),
(209, 'post_title', 'Post Title', ''),
(210, 'add_to_website', 'Add to Website', ''),
(211, 'read_more', 'Read More', ''),
(212, 'registration', 'Registration', ''),
(213, 'appointment_form', 'Appointment Form', ''),
(214, 'contact', 'Contact', ''),
(215, 'optional', 'Optional', ''),
(216, 'customer_comments', 'Customer Comments', ''),
(217, 'need_a_doctor_for_checkup', 'Need a Doctor for Check-up?', ''),
(218, 'just_make_an_appointment_and_you_are_done', 'JUST MAKE AN APPOINTMENT & YOU\'RE DONE ! ', ''),
(219, 'get_an_appointment', 'Get an appointment', ''),
(220, 'latest_news', 'Latest News', ''),
(221, 'latest_tweet', 'Latest Tweet', ''),
(222, 'menu', 'Menu', ''),
(223, 'select_user_role', 'Select User Role', ''),
(224, 'site_align', 'Website Align', ''),
(225, 'right_to_left', 'Right to Left', ''),
(226, 'left_to_right', 'Left to Right', ''),
(227, 'account_manager', 'Account Manager', 'مدير الحساب'),
(228, 'add_invoice', 'Add Invoice', ''),
(229, 'invoice_list', 'Invoice List', ''),
(230, 'account_list', 'Account List', 'قائمة الحساب'),
(231, 'add_account', 'Add Account', 'اضافة حساب'),
(232, 'account_name', 'Account Name', 'إسم الحساب'),
(233, 'credit', 'Credit', ''),
(234, 'debit', 'Debit', ''),
(235, 'account_edit', 'Account Edit', 'تعديل الحسابات'),
(236, 'quantity', 'Quantity', ''),
(237, 'price', 'Price', ''),
(238, 'total', 'Total', ''),
(239, 'remove', 'Remove', ''),
(240, 'add', 'Add', 'إضافة'),
(241, 'subtotal', 'Sub Total', ''),
(242, 'vat', 'Vat', ''),
(243, 'grand_total', 'Grand Total', ''),
(244, 'discount', 'Discount', ''),
(245, 'paid', 'Paid', ''),
(246, 'due', 'Due', ''),
(247, 'reset', 'Reset', ''),
(248, 'add_or_remove', 'Add / Remove', ''),
(249, 'invoice', 'Invoice', ''),
(250, 'invoice_information', 'Invoice Information', ''),
(251, 'invoice_edit', 'Invoice Edit', ''),
(252, 'update', 'Update', ''),
(253, 'all', 'All', ''),
(254, 'patient_wise', 'Patient Wise', ''),
(255, 'account_wise', 'Account Wise', ''),
(256, 'debit_report', 'Debit Report', ''),
(257, 'credit_report', 'Credit Report', ''),
(258, 'payment_list', 'Payment List', ''),
(259, 'add_payment', 'Add Payment', ''),
(260, 'payment_edit', 'Payment Edit', ''),
(261, 'pay_to', 'Pay To', ''),
(262, 'amount', 'Amount', ''),
(263, 'bed_type', 'Bed Type', ''),
(264, 'bed_limit', 'Bed Capacity', ''),
(265, 'charge', 'Charge', ''),
(266, 'bed_list', 'Bed List', ''),
(267, 'add_bed', 'Add Bed', ''),
(268, 'bed_manager', 'Bed Manager', ''),
(269, 'bed_edit', 'Bed Edit', ''),
(270, 'bed_assign', 'Bed Assign', 'السرير المخصص'),
(271, 'assign_date', 'Assign Date', ''),
(272, 'discharge_date', 'Discharge Date', ''),
(273, 'bed_assign_list', 'Bed Assign List', 'قائمة السراير المخصصة'),
(274, 'assign_by', 'Assign By', ''),
(275, 'bed_available', 'Bed is Available', 'سرير متاح'),
(276, 'bed_not_available', 'Bed is Not Available', ''),
(277, 'invlid_input', 'Invalid Input', ''),
(278, 'allocated', 'Allocated', ''),
(279, 'free_now', 'Free', ''),
(280, 'select_only_avaiable_days', 'Select Only Avaiable Days', ''),
(281, 'human_resources', 'Human Resources', ''),
(282, 'nurse_list', 'Nurse List', ''),
(283, 'add_employee', 'Add Employee', ''),
(284, 'user_type', 'User Type', ''),
(285, 'employee_information', 'Employee Information', ''),
(286, 'employee_edit', 'Edit Employee', ''),
(287, 'laboratorist_list', 'Laboratorist List', ''),
(288, 'accountant_list', 'Accountant List', 'قائمة الحسابات'),
(289, 'receptionist_list', 'Receptionist List', ''),
(290, 'pharmacist_list', 'Pharmacist List', ''),
(291, 'nurse', 'Nurse', ''),
(292, 'laboratorist', 'Laboratorist', ''),
(293, 'pharmacist', 'Pharmacist', ''),
(294, 'accountant', 'Accountant', 'الحسابات'),
(295, 'receptionist', 'Receptionist', ''),
(296, 'noticeboard', 'Noticeboard', ''),
(297, 'notice_list', 'Notice List', ''),
(298, 'add_notice', 'Add Notice', ''),
(299, 'hospital_activities', 'Hospital Activities', ''),
(300, 'death_report', 'Death Report', ''),
(301, 'add_death_report', 'Add Death Report', ''),
(302, 'death_report_edit', 'Death Report Edit', ''),
(303, 'birth_report', 'Birth Report', ''),
(304, 'birth_report_edit', 'Birth Report Edit', ''),
(305, 'add_birth_report', 'Add Birth Report', ''),
(306, 'add_operation_report', 'Add Operation Report', ''),
(307, 'operation_report', 'Operation Report', ''),
(308, 'investigation_report', 'Investigation Report', ''),
(309, 'add_investigation_report', 'Add Investigation Report', ''),
(310, 'add_medicine_category', 'Add Medicine Category', ''),
(311, 'medicine_category_list', 'Medicine Category List', ''),
(312, 'category_name', 'Category Name', ''),
(313, 'medicine_category_edit', 'Medicine Category Edit', ''),
(314, 'add_medicine', 'Add Medicine', ''),
(315, 'medicine_list', 'Medicine List', ''),
(316, 'medicine_edit', 'Medicine Edit', ''),
(317, 'manufactured_by', 'Manufactured By', ''),
(318, 'medicine_name', 'Medicine Name', ''),
(319, 'messages', 'Messages', ''),
(320, 'inbox', 'Inbox', ''),
(321, 'sent', 'Sent', ''),
(322, 'new_message', 'New Message', ''),
(323, 'sender', 'Sender Name', ''),
(324, 'message', 'Message', ''),
(325, 'subject', 'Subject', ''),
(326, 'receiver_name', 'Send To', ''),
(327, 'select_user', 'Select User', ''),
(328, 'message_sent', 'Messages Sent', ''),
(329, 'mail', 'Mail', ''),
(330, 'send_mail', 'Send Mail', ''),
(331, 'mail_setting', 'Mail Setting', ''),
(332, 'protocol', 'Protocol', ''),
(333, 'mailpath', 'Mail Path', ''),
(334, 'mailtype', 'Mail Type', ''),
(335, 'validate_email', 'Validate Email Address', ''),
(336, 'true', 'True', ''),
(337, 'false', 'False', ''),
(338, 'attach_file', 'Attach File', ''),
(339, 'wordwrap', 'Enable Word Wrap', ''),
(340, 'send', 'Send', ''),
(341, 'upload_successfully', 'Upload Successfully!', ''),
(342, 'app_setting', 'App Setting', ''),
(343, 'case_manager', 'Case Manager', ''),
(344, 'patient_status', 'Patient Status', ''),
(345, 'patient_status_edit', 'Edit Patient Status', ''),
(346, 'add_patient_status', 'Add Patient Status', ''),
(347, 'add_new_status', 'Add New Status', ''),
(348, 'case_manager_list', 'Case Manager List', ''),
(349, 'hospital_address', 'Hospital Address', ''),
(350, 'ref_doctor_name', 'Ref. Doctor Name', ''),
(351, 'hospital_name', 'Hospital Name', ''),
(352, 'patient_name', 'Patient  Name', ''),
(353, 'document_list', 'Document List', ''),
(354, 'add_document', 'Add Document', ''),
(355, 'upload_by', 'Upload By', ''),
(356, 'documents', 'Documents', ''),
(357, 'prescription', 'Prescription', ''),
(358, 'add_prescription', 'Add Prescription', ''),
(359, 'prescription_list', 'Prescription List', ''),
(360, 'add_insurance', 'Add Insurance', ''),
(361, 'insurance_list', 'Insurance List', ''),
(362, 'insurance_name', 'Insurance Name', ''),
(366, 'add_patient_case_study', 'Add Patient Case Study', ''),
(367, 'patient_case_study_list', 'Patient Case Study List', ''),
(368, 'food_allergies', 'Food Allergies', ''),
(369, 'tendency_bleed', 'Tendency Bleed', ''),
(370, 'heart_disease', 'Heart Disease', ''),
(371, 'high_blood_pressure', 'High Blood Pressure', ''),
(372, 'diabetic', 'Diabetic', ''),
(373, 'surgery', 'Surgery', ''),
(374, 'accident', 'Accident', 'حادث'),
(375, 'others', 'Others', ''),
(376, 'family_medical_history', 'Family Medical History', ''),
(377, 'current_medication', 'Current Medication', ''),
(378, 'female_pregnancy', 'Female Pregnancy', ''),
(379, 'breast_feeding', 'Breast Feeding', ''),
(380, 'health_insurance', 'Health Insurance', ''),
(381, 'low_income', 'Low Income', ''),
(382, 'reference', 'Reference', ''),
(385, 'instruction', 'Instruction', ''),
(386, 'medicine_type', 'Medicine Type', ''),
(387, 'days', 'Days', ''),
(388, 'weight', 'Weight', ''),
(389, 'blood_pressure', 'Blood Pressure', ''),
(390, 'old', 'Old', ''),
(391, 'new', 'New', ''),
(392, 'case_study', 'Case Study', ''),
(393, 'chief_complain', 'Chief Complain', ''),
(394, 'patient_notes', 'Patient Notes', ''),
(395, 'visiting_fees', 'Visiting Fees', ''),
(396, 'diagnosis', 'Diagnosis', ''),
(397, 'prescription_id', 'Prescription ID', ''),
(398, 'name', 'Name', ''),
(399, 'prescription_information', 'Prescription Information', ''),
(400, 'sms', 'SMS', ''),
(401, 'gateway_setting', 'Gateway Setting', ''),
(402, 'time_zone', 'Time Zone', ''),
(403, 'username', 'User Name', ''),
(404, 'provider', 'Provider', ''),
(405, 'sms_template', 'SMS Template', ''),
(406, 'template_name', 'Template Name', ''),
(407, 'sms_schedule', 'SMS Schedule', ''),
(408, 'schedule_name', 'Schedule Name', ''),
(409, 'time', 'Time', ''),
(410, 'already_exists', 'Already Exists', ''),
(411, 'send_custom_sms', 'Send Custom SMS', ''),
(412, 'sms_sent', 'SMS Sent!', ''),
(413, 'custom_sms_list', 'Custom SMS List', ''),
(414, 'reciver', 'Reciver', ''),
(415, 'auto_sms_report', 'Auto SMS Report', ''),
(417, 'user_sms_list', 'User SMS List', ''),
(418, 'send_sms', 'Send SMS', ''),
(419, 'new_sms', 'New SMS', ''),
(420, 'sms_list', 'SMS List', ''),
(421, 'insurance', 'Insurance', ''),
(422, 'add_limit_approval', 'Add Limit Approval', ''),
(423, 'limit_approval_list', 'Limit Approval List', ''),
(424, 'service_tax', 'Service Tax', ''),
(425, 'remark', 'Remark', ''),
(426, 'insurance_no', 'Insurance No.', ''),
(427, 'insurance_code', 'Insurance Code', ''),
(428, 'hospital_rate', 'Hospital Rate', ''),
(429, 'insurance_rate', 'Insurance Rate', ''),
(430, 'disease_charge', 'Disease Charge', ''),
(431, 'disease_name', 'Disease Name', ''),
(432, 'room_no', 'Room No', ''),
(433, 'disease_details', 'Disease Details', ''),
(434, 'consultant_name', 'Consultant Name', ''),
(435, 'policy_name', 'Policy Name', ''),
(436, 'policy_no', 'Policy No.', ''),
(437, 'policy_holder_name', 'Policy Holder Name', ''),
(438, 'approval_breakup', ' Approval Charge Break up', ''),
(439, 'limit_approval', 'Limit Approval', ''),
(440, 'insurance_limit_approval', 'Insurance Limit Approval', ''),
(441, 'billing', 'Billing', ''),
(442, 'add_admission', 'Add Patient Admission', ''),
(443, 'add_service', 'Add Service', ''),
(444, 'service_list', 'Service List', ''),
(445, 'service_name', 'Service Name', ''),
(446, 'add_package', 'Add Package', ''),
(447, 'package_list', 'Package List', ''),
(448, 'package_name', 'Package Name', ''),
(449, 'package_details', 'Package Details', ''),
(450, 'edit_package', 'Edit Package', ''),
(451, 'admission_date', 'Admission Date', ''),
(452, 'guardian_name', 'Guardian Name', ''),
(453, 'agent_name', 'Agent Name', ''),
(454, 'guardian_relation', 'Guardian Relation', ''),
(455, 'guardian_contact', 'Guardian Contact', ''),
(456, 'guardian_address', 'Guardian Address', ''),
(457, 'admission_list', 'Patient Admission List', ''),
(458, 'admission_id', 'AID', ''),
(459, 'edit_admission', 'Edit Admission', ''),
(460, 'add_advance', 'Add Advance Payment', ''),
(461, 'advance_list', 'Advance Payment List', ''),
(462, 'receipt_no', 'Receipt No', ''),
(463, 'cash_card_or_cheque', 'Cash / Card / Cheque', ''),
(464, 'payment_method', 'Payment Method', ''),
(465, 'add_bill', 'Add Bill', 'إضافة فاتورة'),
(466, 'bill_list', 'Bill List', ''),
(467, 'bill_date', 'Bill Date', ''),
(468, 'total_days', 'Total Days', ''),
(469, 'advance_payment', 'Advance Payment', ''),
(470, 'cash', 'Cash', ''),
(471, 'card', 'Card', ''),
(472, 'cheque', 'Cheque', ''),
(473, 'card_cheque_no', 'Card / Cheque No.', ''),
(474, 'receipt', 'Receipt', ''),
(475, 'tax', 'Tax', ''),
(476, 'pay_advance', 'Pay Advance', ''),
(477, 'payable', 'Payable', ''),
(478, 'notes', 'Notes', ''),
(479, 'rate', 'Rate', ''),
(480, 'bill_id', 'Bill ID.', ''),
(481, 'paid', 'Paid', ''),
(482, 'unpaid', 'Unpaid', ''),
(483, 'bill_details', 'Bill Details', ''),
(484, 'signature', 'Signature', ''),
(485, 'update_bill', 'Update Bill', ''),
(486, 'captcha', 'Captcha', ''),
(487, 'percentage', 'Percentage', NULL),
(488, 'more_info', 'More Info', NULL),
(489, 'account', 'Account', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mail_setting`
--

CREATE TABLE `mail_setting` (
  `id` int(11) NOT NULL,
  `protocol` varchar(20) NOT NULL,
  `mailpath` varchar(255) NOT NULL,
  `mailtype` varchar(20) NOT NULL,
  `validate_email` varchar(20) NOT NULL,
  `wordwrap` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail_setting`
--

INSERT INTO `mail_setting` (`id`, `protocol`, `mailpath`, `mailtype`, `validate_email`, `wordwrap`) VALUES
(5, 'sendmail', '/usr/sbin/sendmail', 'html', 'false', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `sender_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unseen, 1=seen, 2=delete',
  `receiver_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unseen, 1=seen, 2=delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `assign_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `affliate` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pr_case_study`
--

CREATE TABLE `pr_case_study` (
  `id` int(11) UNSIGNED NOT NULL,
  `patient_id` varchar(30) DEFAULT NULL,
  `food_allergies` varchar(255) DEFAULT NULL,
  `tendency_bleed` varchar(255) DEFAULT NULL,
  `heart_disease` varchar(255) DEFAULT NULL,
  `high_blood_pressure` varchar(255) DEFAULT NULL,
  `diabetic` varchar(255) DEFAULT NULL,
  `surgery` varchar(255) DEFAULT NULL,
  `accident` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `family_medical_history` varchar(255) DEFAULT NULL,
  `current_medication` varchar(255) DEFAULT NULL,
  `female_pregnancy` varchar(255) DEFAULT NULL,
  `breast_feeding` varchar(255) DEFAULT NULL,
  `health_insurance` varchar(255) DEFAULT NULL,
  `low_income` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pr_prescription`
--

CREATE TABLE `pr_prescription` (
  `id` int(11) UNSIGNED NOT NULL,
  `appointment_id` varchar(30) DEFAULT NULL,
  `patient_id` varchar(30) NOT NULL,
  `patient_type` varchar(50) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `chief_complain` text DEFAULT NULL,
  `insurance_id` int(11) DEFAULT NULL,
  `policy_no` varchar(255) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `blood_pressure` varchar(255) DEFAULT NULL,
  `medicine` text DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `visiting_fees` float DEFAULT NULL,
  `patient_notes` text DEFAULT NULL,
  `reference_by` varchar(50) DEFAULT NULL,
  `reference_to` varchar(50) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `available_days` varchar(50) DEFAULT NULL,
  `per_patient_time` time DEFAULT NULL,
  `serial_visibility_type` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `site_align` varchar(50) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `time_zone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `title`, `description`, `email`, `phone`, `logo`, `favicon`, `language`, `site_align`, `footer_text`, `time_zone`) VALUES
(2, 'Demo Hospital Limited', '98 Green Road, Farmgate, Dhaka-1215', 'bdtask@gmail.com', '1922296392', 'assets/images/apps/6ad86a8c4f91354fe6b6d71f51b5d209.png', 'assets/images/icons/a0ed8ec88e07205e07116f9098844bb8.ico', 'english', 'LTR', '2017Â©Copyright bdtask', 'Asia/Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `sms_delivery`
--

CREATE TABLE `sms_delivery` (
  `sms_delivery_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  `delivery_date_time` datetime NOT NULL,
  `sms_info_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sms_gateway`
--

CREATE TABLE `sms_gateway` (
  `gateway_id` int(11) NOT NULL,
  `provider_name` text NOT NULL,
  `user` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `authentication` text NOT NULL,
  `link` text NOT NULL,
  `default_status` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_gateway`
--

INSERT INTO `sms_gateway` (`gateway_id`, `provider_name`, `user`, `password`, `authentication`, `link`, `default_status`, `status`) VALUES
(1, 'nexmo', '1d286ff1', '11a8b67955d4482f', 'Hospital', 'https://www.nexmo.com/', 1, 1),
(2, 'clickatell', 'clickatell', '9d2e2d3aa558ddcb', 'Hospital', 'https://www.clickatell.com/', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_info`
--

CREATE TABLE `sms_info` (
  `sms_info_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `appointment_id` varchar(30) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `sms_counter` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sms_schedule`
--

CREATE TABLE `sms_schedule` (
  `ss_id` int(11) NOT NULL,
  `ss_teamplate_id` int(11) NOT NULL,
  `ss_name` text NOT NULL,
  `ss_schedule` varchar(100) NOT NULL,
  `ss_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_schedule`
--

INSERT INTO `sms_schedule` (`ss_id`, `ss_teamplate_id`, `ss_name`, `ss_schedule`, `ss_status`) VALUES
(1, 2, 'One', '1:1:1', 1),
(2, 9, 'Summer offer', '10:3:0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_setting`
--

CREATE TABLE `sms_setting` (
  `id` int(11) UNSIGNED NOT NULL,
  `appointment` tinyint(1) DEFAULT NULL,
  `registration` tinyint(1) DEFAULT NULL,
  `schedule` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_setting`
--

INSERT INTO `sms_setting` (`id`, `appointment`, `registration`, `schedule`) VALUES
(2, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sms_teamplate`
--

CREATE TABLE `sms_teamplate` (
  `teamplate_id` int(11) NOT NULL,
  `teamplate_name` text DEFAULT NULL,
  `teamplate` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `default_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_teamplate`
--

INSERT INTO `sms_teamplate` (`teamplate_id`, `teamplate_name`, `teamplate`, `type`, `status`, `default_status`) VALUES
(1, 'Appointment Template', 'Doctor, %doctor_name%. \r\nHello, %patient_name%. \r\nYour ID: %patient_id%, Appointment ID: %appointment_id%, Serial: %sequence% and Appointment Date: %appointment_date%. \r\nThank you for the Appointment.', 'Appointment', 1, 1),
(2, 'Schedule', 'Doctor, %doctor_name%. \r\nHello, %patient_name%. \r\nYour ID: %patient_id%, Appointment ID: %appointment_id%, Serial: %sequence% and Appointment Date: %appointment_date%. \r\nThank you for the Appointment.', 'Schedule', 1, 1),
(3, 'Registration', 'Hello, %patient_name%. \r\nYour ID: %patient_id%,  \r\nThank you for the registration.', 'Registration', 1, 1),
(4, 'Summer Offer', 'Hello, %patient_name%. Your ID: %patient_id%,\r\nYour promo code is 1010101.\r\nContact with us.\r\nThanks', 'Schedule', 1, 0),
(6, 'degr', 'dtft', 'Appointment', 1, 0),
(7, 'rrr', 'test', 'Appointment', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_users`
--

CREATE TABLE `sms_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `user_role` tinyint(1) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `short_biography` text DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `specialist` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acm_account`
--
ALTER TABLE `acm_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acm_invoice`
--
ALTER TABLE `acm_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acm_invoice_details`
--
ALTER TABLE `acm_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acm_payment`
--
ALTER TABLE `acm_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Index 3` (`bill_id`),
  ADD KEY `Index 2` (`admission_id`);

--
-- Indexes for table `bill_admission`
--
ALTER TABLE `bill_admission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Index 2` (`admission_id`);

--
-- Indexes for table `bill_advanced`
--
ALTER TABLE `bill_advanced`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ipd_bill_advanced_ipd_admission` (`admission_id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Key As Bill_ID` (`bill_id`),
  ADD KEY `Admission ID` (`admission_id`);

--
-- Indexes for table `bill_package`
--
ALTER TABLE `bill_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_service`
--
ALTER TABLE `bill_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_bed`
--
ALTER TABLE `bm_bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_bed_assign`
--
ALTER TABLE `bm_bed_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_patient`
--
ALTER TABLE `cm_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cm_status`
--
ALTER TABLE `cm_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_sms_info`
--
ALTER TABLE `custom_sms_info`
  ADD PRIMARY KEY (`custom_sms_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dprt_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ha_birth`
--
ALTER TABLE `ha_birth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ha_category`
--
ALTER TABLE `ha_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ha_death`
--
ALTER TABLE `ha_death`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ha_investigation`
--
ALTER TABLE `ha_investigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ha_medicine`
--
ALTER TABLE `ha_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ha_operation`
--
ALTER TABLE `ha_operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inc_insurance`
--
ALTER TABLE `inc_insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inc_limit_approval`
--
ALTER TABLE `inc_limit_approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_setting`
--
ALTER TABLE `mail_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr_case_study`
--
ALTER TABLE `pr_case_study`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pr_prescription`
--
ALTER TABLE `pr_prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `sms_delivery`
--
ALTER TABLE `sms_delivery`
  ADD PRIMARY KEY (`sms_delivery_id`);

--
-- Indexes for table `sms_gateway`
--
ALTER TABLE `sms_gateway`
  ADD PRIMARY KEY (`gateway_id`);

--
-- Indexes for table `sms_info`
--
ALTER TABLE `sms_info`
  ADD PRIMARY KEY (`sms_info_id`);

--
-- Indexes for table `sms_schedule`
--
ALTER TABLE `sms_schedule`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `sms_setting`
--
ALTER TABLE `sms_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_teamplate`
--
ALTER TABLE `sms_teamplate`
  ADD PRIMARY KEY (`teamplate_id`);

--
-- Indexes for table `sms_users`
--
ALTER TABLE `sms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acm_account`
--
ALTER TABLE `acm_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acm_invoice`
--
ALTER TABLE `acm_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acm_invoice_details`
--
ALTER TABLE `acm_invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acm_payment`
--
ALTER TABLE `acm_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_admission`
--
ALTER TABLE `bill_admission`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_advanced`
--
ALTER TABLE `bill_advanced`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_package`
--
ALTER TABLE `bill_package`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_service`
--
ALTER TABLE `bill_service`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bm_bed`
--
ALTER TABLE `bm_bed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bm_bed_assign`
--
ALTER TABLE `bm_bed_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cm_patient`
--
ALTER TABLE `cm_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cm_status`
--
ALTER TABLE `cm_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_sms_info`
--
ALTER TABLE `custom_sms_info`
  MODIFY `custom_sms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dprt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ha_birth`
--
ALTER TABLE `ha_birth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ha_category`
--
ALTER TABLE `ha_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ha_death`
--
ALTER TABLE `ha_death`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ha_investigation`
--
ALTER TABLE `ha_investigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ha_medicine`
--
ALTER TABLE `ha_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ha_operation`
--
ALTER TABLE `ha_operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inc_insurance`
--
ALTER TABLE `inc_insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inc_limit_approval`
--
ALTER TABLE `inc_limit_approval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=490;

--
-- AUTO_INCREMENT for table `mail_setting`
--
ALTER TABLE `mail_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pr_case_study`
--
ALTER TABLE `pr_case_study`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pr_prescription`
--
ALTER TABLE `pr_prescription`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sms_delivery`
--
ALTER TABLE `sms_delivery`
  MODIFY `sms_delivery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_gateway`
--
ALTER TABLE `sms_gateway`
  MODIFY `gateway_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sms_info`
--
ALTER TABLE `sms_info`
  MODIFY `sms_info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_schedule`
--
ALTER TABLE `sms_schedule`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sms_setting`
--
ALTER TABLE `sms_setting`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sms_teamplate`
--
ALTER TABLE `sms_teamplate`
  MODIFY `teamplate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sms_users`
--
ALTER TABLE `sms_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `FK_ipd_bill_ipd_admission` FOREIGN KEY (`admission_id`) REFERENCES `bill_admission` (`admission_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `bill_advanced`
--
ALTER TABLE `bill_advanced`
  ADD CONSTRAINT `FK_ipd_bill_advanced_ipd_admission` FOREIGN KEY (`admission_id`) REFERENCES `bill_admission` (`admission_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `fk_ipd_bill_details_ipd_admission` FOREIGN KEY (`admission_id`) REFERENCES `bill_admission` (`admission_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ipd_bill_details_ipd_bill` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
