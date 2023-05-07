-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 11:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 - deactive, 1 - active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `username`, `email`, `first_name`, `last_name`, `image`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@gmail.com', 'Chennai', 'Curry House', '64211a0a3508c.jpg', '$2y$10$R6Y7vvwsmfOCDtK/SOSYTuu//4G.t8dUMn6uPaLG6SyexfnJzqBTC', 1, NULL, '2023-03-27 00:22:57'),
(11, 8, 'kitchen', 'kitchen@gmail.com', 'Kitchen', 'Manager', '60a934a18ff49.jpg', '$2y$10$PTTKwbg5AEHm4BBVUaes1uhlx1eZKeTJzD7M5pIQjPrDmGYaVzul2', 1, '2020-09-28 11:23:39', '2021-05-23 01:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `backups`
--

CREATE TABLE `backups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backups`
--

INSERT INTO `backups` (`id`, `filename`, `created_at`, `updated_at`) VALUES
(1, '5f561aad2dddb.sql', '2020-09-07 18:34:05', '2020-09-07 18:34:05'),
(2, '5f561cb6691ec.sql', '2020-09-07 18:42:46', '2020-09-07 18:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `basic_extendeds`
--

CREATE TABLE `basic_extendeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `cookie_alert_status` tinyint(4) NOT NULL DEFAULT 1,
  `cookie_alert_text` blob DEFAULT NULL,
  `cookie_alert_button_text` varchar(255) DEFAULT NULL,
  `to_mail` varchar(255) DEFAULT NULL,
  `default_language_direction` varchar(20) NOT NULL DEFAULT 'ltr' COMMENT 'ltr / rtl',
  `blogs_meta_keywords` text DEFAULT NULL,
  `blogs_meta_description` text DEFAULT NULL,
  `is_facebook_pexel` tinyint(4) NOT NULL DEFAULT 0,
  `facebook_pexel_script` text DEFAULT NULL,
  `theme_version` varchar(70) DEFAULT 'default_service_category',
  `from_mail` varchar(255) DEFAULT NULL,
  `from_name` varchar(255) DEFAULT NULL,
  `is_smtp` tinyint(4) NOT NULL DEFAULT 0,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(30) DEFAULT NULL,
  `encryption` varchar(30) DEFAULT NULL,
  `smtp_username` varchar(255) DEFAULT NULL,
  `smtp_password` varchar(255) DEFAULT NULL,
  `slider_shape_img` varchar(255) DEFAULT NULL,
  `slider_bottom_img` varchar(255) DEFAULT NULL,
  `footer_bottom_img` varchar(255) DEFAULT NULL,
  `menu_section_title` varchar(255) DEFAULT NULL,
  `menu_section_subtitle` varchar(255) DEFAULT NULL,
  `menu_section_img` varchar(50) DEFAULT NULL,
  `special_section_title` varchar(255) DEFAULT NULL,
  `special_section_subtitle` varchar(255) DEFAULT NULL,
  `testimonial_bg_img` varchar(255) NOT NULL,
  `table_section_title` varchar(255) NOT NULL,
  `table_section_subtitle` varchar(255) NOT NULL,
  `table_section_img` varchar(50) DEFAULT NULL,
  `base_currency_symbol` blob DEFAULT NULL,
  `base_currency_symbol_position` varchar(10) NOT NULL DEFAULT 'left',
  `base_currency_text` varchar(100) DEFAULT NULL,
  `base_currency_text_position` varchar(10) NOT NULL DEFAULT 'right',
  `base_currency_rate` decimal(8,2) NOT NULL DEFAULT 0.00,
  `hero_bg` varchar(50) DEFAULT NULL,
  `hero_section_bold_text` varchar(255) DEFAULT NULL,
  `hero_section_bold_text_font_size` int(11) NOT NULL DEFAULT 60,
  `hero_section_bold_text_color` varchar(20) NOT NULL DEFAULT 'FFFFFF',
  `hero_section_text` varchar(255) DEFAULT NULL,
  `hero_section_text_font_size` int(11) NOT NULL DEFAULT 18,
  `hero_section_text_color` varchar(20) NOT NULL DEFAULT 'FFFFFF',
  `hero_section_button_text` varchar(30) DEFAULT NULL,
  `hero_section_button_text_font_size` int(11) NOT NULL DEFAULT 14,
  `hero_section_button_color` varchar(20) NOT NULL DEFAULT 'FFFFFF',
  `hero_section_button_url` text DEFAULT NULL,
  `hero_section_button2_text` varchar(30) DEFAULT NULL,
  `hero_section_button2_text_font_size` int(11) NOT NULL DEFAULT 14,
  `hero_section_button2_url` text DEFAULT NULL,
  `hero_shape_img` varchar(50) DEFAULT NULL,
  `hero_bottom_img` varchar(50) DEFAULT NULL,
  `hero_section_video_link` varchar(255) DEFAULT NULL,
  `hero_side_img` varchar(50) DEFAULT NULL,
  `faq_title` varchar(255) DEFAULT NULL,
  `career_title` varchar(255) DEFAULT NULL,
  `career_details_title` varchar(255) DEFAULT NULL,
  `special_section_bg` varchar(50) DEFAULT NULL,
  `menu_version` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - menu with col-6, 2 - menu with col-12',
  `qrcode_url` text DEFAULT NULL,
  `qrcode_color` text DEFAULT NULL,
  `pusher_app_id` varchar(15) DEFAULT NULL,
  `pusher_app_key` varchar(30) DEFAULT NULL,
  `pusher_app_secret` varchar(30) DEFAULT NULL,
  `pusher_app_cluster` varchar(10) DEFAULT NULL,
  `is_facebook_login` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - Active, 0 - Deactive',
  `facebook_app_id` varchar(100) DEFAULT NULL,
  `facebook_app_secret` varchar(100) DEFAULT NULL,
  `is_google_login` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - Active, 0 - Deactive',
  `google_client_id` varchar(150) DEFAULT NULL,
  `google_client_secret` varchar(70) DEFAULT NULL,
  `timezone` varchar(125) DEFAULT 'UTC',
  `delivery_date_time_status` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_date_time_required` tinyint(4) NOT NULL DEFAULT 0,
  `qr_image` varchar(100) DEFAULT NULL,
  `qr_color` varchar(50) NOT NULL DEFAULT '0',
  `qr_size` int(11) NOT NULL DEFAULT 250,
  `qr_style` varchar(50) NOT NULL DEFAULT 'square',
  `qr_eye_style` varchar(50) NOT NULL DEFAULT 'square',
  `qr_margin` int(11) NOT NULL DEFAULT 0,
  `qr_text` varchar(255) DEFAULT NULL,
  `qr_text_color` varchar(50) NOT NULL DEFAULT '000000',
  `qr_text_size` int(11) NOT NULL DEFAULT 15,
  `qr_text_x` int(11) NOT NULL DEFAULT 50,
  `qr_text_y` int(11) NOT NULL DEFAULT 50,
  `qr_inserted_image` varchar(50) DEFAULT NULL,
  `qr_inserted_image_size` int(11) NOT NULL DEFAULT 20,
  `qr_inserted_image_x` int(11) NOT NULL DEFAULT 50,
  `qr_inserted_image_y` int(11) NOT NULL DEFAULT 50,
  `qr_type` varchar(50) NOT NULL DEFAULT 'default' COMMENT 'default, image, text',
  `order_close` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 - order closed, 0 - order open',
  `order_close_message` varchar(255) NOT NULL DEFAULT 'Order is closed now!'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_extendeds`
--

INSERT INTO `basic_extendeds` (`id`, `language_id`, `cookie_alert_status`, `cookie_alert_text`, `cookie_alert_button_text`, `to_mail`, `default_language_direction`, `blogs_meta_keywords`, `blogs_meta_description`, `is_facebook_pexel`, `facebook_pexel_script`, `theme_version`, `from_mail`, `from_name`, `is_smtp`, `smtp_host`, `smtp_port`, `encryption`, `smtp_username`, `smtp_password`, `slider_shape_img`, `slider_bottom_img`, `footer_bottom_img`, `menu_section_title`, `menu_section_subtitle`, `menu_section_img`, `special_section_title`, `special_section_subtitle`, `testimonial_bg_img`, `table_section_title`, `table_section_subtitle`, `table_section_img`, `base_currency_symbol`, `base_currency_symbol_position`, `base_currency_text`, `base_currency_text_position`, `base_currency_rate`, `hero_bg`, `hero_section_bold_text`, `hero_section_bold_text_font_size`, `hero_section_bold_text_color`, `hero_section_text`, `hero_section_text_font_size`, `hero_section_text_color`, `hero_section_button_text`, `hero_section_button_text_font_size`, `hero_section_button_color`, `hero_section_button_url`, `hero_section_button2_text`, `hero_section_button2_text_font_size`, `hero_section_button2_url`, `hero_shape_img`, `hero_bottom_img`, `hero_section_video_link`, `hero_side_img`, `faq_title`, `career_title`, `career_details_title`, `special_section_bg`, `menu_version`, `qrcode_url`, `qrcode_color`, `pusher_app_id`, `pusher_app_key`, `pusher_app_secret`, `pusher_app_cluster`, `is_facebook_login`, `facebook_app_id`, `facebook_app_secret`, `is_google_login`, `google_client_id`, `google_client_secret`, `timezone`, `delivery_date_time_status`, `delivery_date_time_required`, `qr_image`, `qr_color`, `qr_size`, `qr_style`, `qr_eye_style`, `qr_margin`, `qr_text`, `qr_text_color`, `qr_text_size`, `qr_text_x`, `qr_text_y`, `qr_inserted_image`, `qr_inserted_image_size`, `qr_inserted_image_x`, `qr_inserted_image_y`, `qr_type`, `order_close`, `order_close_message`) VALUES
(147, 176, 0, 0x596f757220657870657269656e6365206f6e207468697320736974652077696c6c20626520696d70726f76656420627920616c6c6f77696e6720636f6f6b6965732e, 'Allow Cookies', 'benkzy11332@gmail.com', 'ltr', 'lorem, dolor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 0, '<!-- Facebook Pixel Code -->\r\n<script>\r\n!function(f,b,e,v,n,t,s)\r\n{if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};\r\nif(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\';\r\nn.queue=[];t=b.createElement(e);t.async=!0;\r\nt.src=v;s=b.getElementsByTagName(e)[0];\r\ns.parentNode.insertBefore(t,s)}(window, document,\'script\',\r\n\'https://connect.facebook.net/en_US/fbevents.js\');\r\nfbq(\'init\', \'2723323421236702\');\r\nfbq(\'track\', \'PageView\');\r\n</script>\r\n<noscript><img height=\"1\" width=\"1\" style=\"display:none\"\r\nsrc=\"https://www.facebook.com/tr?id=2723323421236702&ev=PageView&noscript=1\"\r\n/></noscript>\r\n<!-- End Facebook Pixel Code -->', 'default_service_category', 'testingproject75@gmail.com', 'Chennai Curry House', 1, 'smtp.gmail.com', '587', 'TLS', 'testingproject75@gmail.com', 'yplonvaqrluaiuxx', NULL, NULL, '64206be389896.png', 'Our Menus', 'Food Menus', '1679882422.png', 'Our Special Offered Items Price', 'VIEW ALL MENU LIST', '1598017091.jpg', 'Table Reservation', 'Reserve Your Table', '1599811746.jpg', 0x524d, 'left', 'MYR', 'right', '1.00', '6420664e76599.jpg', 'Mexican Chicken Cheese Toaster Pizza', 60, 'FFFFFF', 'Nunc molestie mi nunc, nec accumsan libero dignissim sit amet. Fusce sit amet tincidunt metus. Nunc eu risus sus-cipit massa dapibu.', 18, 'FFFFFF', 'View Details', 14, 'FFFFFF', 'https://codecanyon.megasoft.biz/superv/menu/Beef-Cheese-Burger/25', 'Book a Table', 14, 'https://codecanyon.megasoft.biz/superv/reservation/form', NULL, NULL, 'https://www.youtube.com/watch?v=ZDQn-9cdx9Q', NULL, 'F.A.Q.', 'Career', 'Job Details', '1679882448.png', 2, 'https://codecanyon.kreativdev.com/superv/qr-menu', '3851FF', '1080494', 'bd457a6ed0c247922b06', '019547a8751eec9b83af', 'ap2', 1, '188100859706337', '73dc84a95f12657de1b1ebaa6cc7ba94', 1, '81856165251-cd0s41jcep43b3a33i3rc7pnp3jdvo0p.apps.googleusercontent.com', 'nLCYVG30u-bVIvhzSg-z52pi', 'Asia/Kuala_Lumpur', 1, 1, '60a926204834f.png', '00023D', 250, 'square', 'circle', 0, 'KreativQR', '114C05', 14, 50, 50, '60a92611aca0a.png', 20, 50, 50, 'text', 0, 'Order is closed now!'),
(148, 177, 1, 0xd8b3d98ad8aad98520d8aad8add8b3d98ad98620d8aad8acd8b1d8a8d8aad98320d8b9d984d98920d987d8b0d8a720d8a7d984d985d988d982d8b920d985d98620d8aed984d8a7d98420d8a7d984d8b3d985d8a7d8ad20d8a8d985d984d981d8a7d8aa20d8aad8b9d8b1d98ad98120d8a7d984d8a7d8b1d8aad8a8d8a7d8b7, 'السماح للكوكيز', 'benkzy11332@gmail.com', 'ltr', 'lorem, dolor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 0, '<!-- Facebook Pixel Code -->\r\n<script>\r\n!function(f,b,e,v,n,t,s)\r\n{if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};\r\nif(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\';\r\nn.queue=[];t=b.createElement(e);t.async=!0;\r\nt.src=v;s=b.getElementsByTagName(e)[0];\r\ns.parentNode.insertBefore(t,s)}(window, document,\'script\',\r\n\'https://connect.facebook.net/en_US/fbevents.js\');\r\nfbq(\'init\', \'2723323421236702\');\r\nfbq(\'track\', \'PageView\');\r\n</script>\r\n<noscript><img height=\"1\" width=\"1\" style=\"display:none\"\r\nsrc=\"https://www.facebook.com/tr?id=2723323421236702&ev=PageView&noscript=1\"\r\n/></noscript>\r\n<!-- End Facebook Pixel Code -->', 'default_service_category', 'testingproject75@gmail.com', 'Chennai Curry House', 1, 'smtp.gmail.com', '587', 'TLS', 'testingproject75@gmail.com', 'yplonvaqrluaiuxx', '5f3e41b24e6dd.png', '5fec665e8e248.png', '5f449d8ad6e85.png', 'قوائمنا', 'اكتشف قوائم الطعام', '1599809810.png', 'سعر العناصر المعروضة الخاصة بنا', 'عرض كل قائمة القائمة', '1598330897.jpg', 'طاولة حجز', 'احجز طاولتك', '1599810481.jpg', 0x524d, 'left', 'MYR', 'right', '1.00', '5f58bc1064b05.jpg', 'أفضل مكان لإصلاح سيارتك', 60, 'FFFFFF', 'سيلون لك في طائر الدجاجة قائلا الهيمنة البلدات الوحش على علاج الأعشاب الداكنة والظلمة التي صنعها والتي تواجه اللحوم.', 18, 'FFFFFF', 'daha fazla göster', 14, 'FFFFFF', 'https://codecanyon.megasoft.biz/superv/menu/Beef-Cheese-Burger/25', 'Book a Table', 14, 'https://codecanyon.megasoft.biz/superv/reservation/form', '5f58bc1064e31.png', '5f58bc10650ff.png', 'https://www.youtube.com/watch?v=ZDQn-9cdx9Q', '5f59d46793786.png', 'أسئلة مكررة', 'وظائف', 'تفاصيل الوظيفة', '1600010986.jpg', 1, 'https://codecanyon.kreativdev.com/superv/qr-menu', '3851FF', '1080494', 'bd457a6ed0c247922b06', '019547a8751eec9b83af', 'ap2', 1, '188100859706337', '73dc84a95f12657de1b1ebaa6cc7ba94', 1, '81856165251-cd0s41jcep43b3a33i3rc7pnp3jdvo0p.apps.googleusercontent.com', 'nLCYVG30u-bVIvhzSg-z52pi', 'Asia/Kuala_Lumpur', 1, 1, '60a926204834f.png', '00023D', 250, 'square', 'circle', 0, 'KreativQR', '114C05', 14, 50, 50, '60a92611aca0a.png', 20, 50, 50, 'text', 0, 'Order is closed now!');

-- --------------------------------------------------------

--
-- Table structure for table `basic_settings`
--

CREATE TABLE `basic_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `preloader_status` tinyint(4) NOT NULL COMMENT '0 - deactive, 1 - active',
  `preloader` varchar(50) DEFAULT NULL,
  `website_title` varchar(255) DEFAULT NULL,
  `base_color` varchar(30) DEFAULT NULL,
  `secondary_base_color` varchar(20) DEFAULT NULL,
  `support_email` varchar(100) DEFAULT NULL,
  `support_phone` varchar(30) DEFAULT NULL,
  `breadcrumb` varchar(50) DEFAULT NULL,
  `footer_logo` varchar(50) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `newsletter_text` varchar(255) DEFAULT NULL,
  `copyright_text` blob DEFAULT NULL,
  `intro_section_title` varchar(50) DEFAULT NULL,
  `intro_title` varchar(50) DEFAULT NULL,
  `intro_text` text DEFAULT NULL,
  `intro_contact_text` varchar(255) DEFAULT NULL,
  `intro_contact_number` varchar(255) DEFAULT NULL,
  `intro_video_image` varchar(191) DEFAULT NULL,
  `intro_signature` varchar(191) DEFAULT NULL,
  `intro_video_link` varchar(191) DEFAULT NULL,
  `intro_main_image` varchar(191) DEFAULT NULL,
  `team_section_title` varchar(255) DEFAULT NULL,
  `team_section_subtitle` varchar(255) DEFAULT NULL,
  `contact_form_title` varchar(255) DEFAULT NULL,
  `contact_address` text DEFAULT NULL,
  `contact_number` text DEFAULT NULL,
  `contact_mails` text DEFAULT NULL,
  `contact_text` varchar(255) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `longitude` varchar(191) DEFAULT NULL,
  `map_zoom` int(11) NOT NULL DEFAULT 10,
  `contact_info_title` varchar(191) DEFAULT NULL,
  `tawk_to_script` text DEFAULT NULL,
  `google_analytics_script` text DEFAULT NULL,
  `is_recaptcha` tinyint(4) NOT NULL DEFAULT 0,
  `google_recaptcha_site_key` varchar(255) DEFAULT NULL,
  `google_recaptcha_secret_key` varchar(255) DEFAULT NULL,
  `is_tawkto` tinyint(4) NOT NULL DEFAULT 1,
  `is_disqus` tinyint(4) NOT NULL DEFAULT 1,
  `disqus_script` text DEFAULT NULL,
  `is_analytics` tinyint(4) NOT NULL DEFAULT 1,
  `maintainance_mode` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 - active, 0 - deactive',
  `maintainance_text` text DEFAULT NULL,
  `ips` text DEFAULT NULL,
  `testimonial_title` varchar(255) DEFAULT NULL,
  `blog_section_title` varchar(255) DEFAULT NULL,
  `blog_section_subtitle` varchar(191) DEFAULT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_details_title` varchar(255) DEFAULT NULL,
  `gallery_title` varchar(255) DEFAULT NULL,
  `team_title` varchar(255) DEFAULT NULL,
  `contact_title` varchar(255) DEFAULT NULL,
  `menu_title` varchar(191) DEFAULT NULL,
  `reservation_title` varchar(191) DEFAULT NULL,
  `items_title` varchar(191) DEFAULT NULL,
  `menu_details_title` varchar(191) DEFAULT NULL,
  `cart_title` varchar(191) DEFAULT NULL,
  `checkout_title` varchar(191) DEFAULT NULL,
  `error_title` varchar(255) DEFAULT NULL,
  `home_version` varchar(30) DEFAULT NULL,
  `feature_section` tinyint(4) NOT NULL DEFAULT 1,
  `intro_section` tinyint(4) NOT NULL DEFAULT 1,
  `testimonial_section` tinyint(4) NOT NULL DEFAULT 1,
  `team_section` tinyint(4) NOT NULL DEFAULT 1,
  `news_section` tinyint(4) NOT NULL DEFAULT 1,
  `menu_section` int(11) NOT NULL DEFAULT 1,
  `special_section` int(11) NOT NULL DEFAULT 1,
  `instagram_section` int(11) NOT NULL DEFAULT 1,
  `table_section` int(11) NOT NULL DEFAULT 1,
  `top_footer_section` tinyint(4) NOT NULL DEFAULT 1,
  `copyright_section` tinyint(4) NOT NULL DEFAULT 1,
  `is_quote` tinyint(4) NOT NULL DEFAULT 1,
  `office_time` varchar(255) DEFAULT NULL,
  `is_appzi` tinyint(4) NOT NULL DEFAULT 0,
  `appzi_script` text DEFAULT NULL,
  `is_addthis` tinyint(4) NOT NULL DEFAULT 0,
  `addthis_script` text DEFAULT NULL,
  `token_no_start` int(11) NOT NULL DEFAULT 1,
  `token_no` int(11) NOT NULL DEFAULT 0,
  `postal_code` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - enabled, 0 - disabled',
  `qr_call_waiter` tinyint(4) NOT NULL DEFAULT 1,
  `website_call_waiter` tinyint(4) NOT NULL DEFAULT 1,
  `is_whatsapp` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - enable, 0 - disable',
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `whatsapp_header_title` varchar(255) NOT NULL DEFAULT 'Chat with us on WhatsApp!',
  `whatsapp_popup_message` text DEFAULT NULL,
  `whatsapp_popup` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - enable, 0 - disable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_settings`
--

INSERT INTO `basic_settings` (`id`, `language_id`, `favicon`, `logo`, `preloader_status`, `preloader`, `website_title`, `base_color`, `secondary_base_color`, `support_email`, `support_phone`, `breadcrumb`, `footer_logo`, `footer_text`, `newsletter_text`, `copyright_text`, `intro_section_title`, `intro_title`, `intro_text`, `intro_contact_text`, `intro_contact_number`, `intro_video_image`, `intro_signature`, `intro_video_link`, `intro_main_image`, `team_section_title`, `team_section_subtitle`, `contact_form_title`, `contact_address`, `contact_number`, `contact_mails`, `contact_text`, `latitude`, `longitude`, `map_zoom`, `contact_info_title`, `tawk_to_script`, `google_analytics_script`, `is_recaptcha`, `google_recaptcha_site_key`, `google_recaptcha_secret_key`, `is_tawkto`, `is_disqus`, `disqus_script`, `is_analytics`, `maintainance_mode`, `maintainance_text`, `ips`, `testimonial_title`, `blog_section_title`, `blog_section_subtitle`, `blog_title`, `blog_details_title`, `gallery_title`, `team_title`, `contact_title`, `menu_title`, `reservation_title`, `items_title`, `menu_details_title`, `cart_title`, `checkout_title`, `error_title`, `home_version`, `feature_section`, `intro_section`, `testimonial_section`, `team_section`, `news_section`, `menu_section`, `special_section`, `instagram_section`, `table_section`, `top_footer_section`, `copyright_section`, `is_quote`, `office_time`, `is_appzi`, `appzi_script`, `is_addthis`, `addthis_script`, `token_no_start`, `token_no`, `postal_code`, `qr_call_waiter`, `website_call_waiter`, `is_whatsapp`, `whatsapp_number`, `whatsapp_header_title`, `whatsapp_popup_message`, `whatsapp_popup`) VALUES
(153, 176, '642061a97a682.png', '64206197349d3.png', 0, '5fed71d9ebc96.gif', 'Chennai Curry House', 'FF6F00', '0A3041', 'benkzy11332@gmail.com', '+06 123456789', '6420fe133b303.png', '64206d3fae353.png', 'We are a awward winning multinaitonal Company. We Believe quality and standard worlwidex Consider.', 'Subscribe to gate Latest News, Offer and connect With Us.', 0x436f7079726967687420c2a920323032332e20416c6c20726967687473207265736572766564206279204368656e6e616920437572727920486f7573652e, 'Our Story', 'Chennai Curry House', 'As you step inside the curry restaurant, you are greeted by the warm and inviting atmosphere. The decor is simple but elegant, with bright colors and patterns that reflect the cultural origins of the cuisine. The staff members are friendly and knowledgeable, always happy to make recommendations and help diners navigate the menu.', 'Our 24/7 Phone Services', '012 3456789', '6420f84b175d3.jpg', '5f5b0ee606923.png', 'https://youtu.be/dVy40vybm9g', '6420f84b16624.png', 'Our Team', 'Our Expert Members', 'Leave Reply', '143, Jalan Lagenda 5, \r\nLagenda Heights, \r\n08000 Sungai Petani, Kedah', '0123456789', 'chennai@gmail.com', 'North and South Indian Restaurant serving quality Indian Food in a clean and comfortable setting.', 'MG52+J8 Sungai Petani, Kedah', 'MG52+J8 Sungai Petani, Kedah', 13, 'CONTACT INFO', '<!--Start of Tawk.to Script-->\r\n<script type=\"text/javascript\">\r\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\ns1.async=true;\r\ns1.src=\'https://embed.tawk.to/5f5e445f4704467e89ee918d/default\';\r\ns1.charset=\'UTF-8\';\r\ns1.setAttribute(\'crossorigin\',\'*\');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();\r\n</script>\r\n<!--End of Tawk.to Script-->', '<!-- Global site tag (gtag.js) - Google Analytics -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-137437974-2\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'UA-137437974-2\');\r\n</script>', 0, '6LcjhAMaAAAAAFLtkCjkA6FS7-NbntavN82GZJyM', '6LcjhAMaAAAAANU3McT887foMRKw04ZBec-rC6ma', 0, 1, '<script>\r\n    /**\r\n    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.\r\n    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */\r\n    /*\r\n    var disqus_config = function () {\r\n    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page\'s canonical URL variable\r\n    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page\'s unique identifier variable\r\n    };\r\n    */\r\n    (function() { // DON\'T EDIT BELOW THIS LINE\r\n    var d = document, s = d.createElement(\'script\');\r\n    s.src = \'https://superv-1.disqus.com/embed.js\';\r\n    s.setAttribute(\'data-timestamp\', +new Date());\r\n    (d.head || d.body).appendChild(s);\r\n    })();\r\n</script>', 0, 0, 'We are upgrading our site. We will come back soon. \r\nPlease stay with us.\r\nThank you....', '::1', 'What Our client Saying ?', 'Our Blog', 'Latest News Feeds', 'Latest Blog', 'Blog Details', 'Our Gallery', 'Team Members', 'Contact Us', 'Our Menu', 'Reserve Table', 'Our Items', 'Item Details', 'Cart', 'Checkout', '404 Not Found', 'slider', 1, 1, 0, 1, 0, 1, 1, 1, 0, 1, 1, 1, 'Mon to Friday  9am - 11 pm', 0, '<!-- Appzi: Capture Insightful Feedback -->\r\n<script async src=\"https://w.appzi.io/w.js?token=p5cpm\"></script>\r\n<!-- End Appzi -->', 0, '<!-- Go to www.addthis.com/dashboard to customize your tools -->\r\n<script type=\"text/javascript\" src=\"//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e74e0cf10c08cfa\"></script>', 1, 14, 1, 0, 0, 1, '+347347342', 'Chat with us on WhatsApp!', 'Admin can also disable WhatsApp Chat\r\n& enable Tawk.to chat\r\n(Admin can set any message here)', 1),
(154, 177, '642061a97a682.png', '64206197349d3.png', 0, '5fed71d9ebc96.gif', 'Chennai Curry House', 'FF6F00', '0A3041', 'info@geotechit.com', '+44 078 9101 1714', '6420fe133b303.png', '5f4b477743017.png', 'نحن شركة متعددة الأطراف فائزة بشكل كبير. نحن نؤمن بالجودة والمعايير التي نأخذها بعين الاعتبار.', 'Subscribe to gate Latest News, Offer and connect With Us.', 0xd8acd985d98ad8b920d8a7d984d8add982d988d98220d985d8add981d988d8b8d8a920c2a920323032302e, 'قصتنا', 'لدينا 20 عاما من الخبرة العملية في مقهى.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام', 'خدماتنا الهاتفية 24/7', '555 666 999 00', '5f3e498da6634.jpg', '5f3e498da6301.png', 'https://www.youtube.com/watch?v=GlrxcuEDyF8', '5f3e498da5f0f.png', 'فريقنا', 'الأعضاء الخبراء لدينا', 'اترك الرد', '143 طريق القلعة 517 حي,ميناء كييف جنوب كندا', '+3 123 456 789,00066668888', NULL, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل', '1.00000', '45425', 10, 'معلومات الاتصال', '<!--Start of Tawk.to Script-->\r\n<script type=\"text/javascript\">\r\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\ns1.async=true;\r\ns1.src=\'https://embed.tawk.to/5f5e445f4704467e89ee918d/default\';\r\ns1.charset=\'UTF-8\';\r\ns1.setAttribute(\'crossorigin\',\'*\');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();\r\n</script>\r\n<!--End of Tawk.to Script-->', '<!-- Global site tag (gtag.js) - Google Analytics -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-137437974-2\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'UA-137437974-2\');\r\n</script>', 0, '6LcjhAMaAAAAAFLtkCjkA6FS7-NbntavN82GZJyM', '6LcjhAMaAAAAANU3McT887foMRKw04ZBec-rC6ma', 0, 1, '<script>\r\n    /**\r\n    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.\r\n    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */\r\n    /*\r\n    var disqus_config = function () {\r\n    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page\'s canonical URL variable\r\n    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page\'s unique identifier variable\r\n    };\r\n    */\r\n    (function() { // DON\'T EDIT BELOW THIS LINE\r\n    var d = document, s = d.createElement(\'script\');\r\n    s.src = \'https://superv-1.disqus.com/embed.js\';\r\n    s.setAttribute(\'data-timestamp\', +new Date());\r\n    (d.head || d.body).appendChild(s);\r\n    })();\r\n</script>', 0, 0, 'We are upgrading our site. We will come back soon. \r\nPlease stay with us.\r\nThank you....', '::1', 'ماذا يقول عملائنا؟', 'أحدث الأخبار', 'تعرف على فريق الخبراء التنفيذيين لدينا ..', 'أحدث المدونات', 'تفاصيل المدونة', 'معرضنا', 'أعضاء الفريق', 'اتصل بنا', 'القائمة لدينا', 'حجز', 'العناصر لدينا', 'تفاصيل العنصر', 'عربة التسوق', 'الدفع', '404 غير موجود', 'slider', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'Mon to Friday  9am - 11 pm', 0, '<!-- Appzi: Capture Insightful Feedback -->\r\n<script async src=\"https://w.appzi.io/w.js?token=p5cpm\"></script>\r\n<!-- End Appzi -->', 0, '<!-- Go to www.addthis.com/dashboard to customize your tools -->\r\n<script type=\"text/javascript\" src=\"//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e74e0cf10c08cfa\"></script>', 1, 0, 1, 0, 0, 1, '+347347342', 'Chat with us on WhatsApp!', 'Admin can also disable WhatsApp Chat\r\n& enable Tawk.to chat\r\n(Admin can set any message here)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bcategories`
--

CREATE TABLE `bcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `serial_number` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bcategories`
--

INSERT INTO `bcategories` (`id`, `language_id`, `name`, `status`, `serial_number`) VALUES
(1, 176, 'Cooking', 1, 1),
(3, 176, 'Foods', 1, 2),
(4, 176, 'Burgers', 1, 3),
(5, 176, 'Fun & Jamming', 1, 4),
(6, 176, 'Recipes', 1, 5),
(7, 177, 'طبخ', 1, 1),
(8, 177, 'أغذية', 1, 2),
(9, 177, 'برجر', 1, 3),
(10, 177, 'المرح والتشويش', 1, 4),
(11, 177, 'وصفات', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `bcategory_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `content` blob DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `language_id`, `bcategory_id`, `title`, `slug`, `main_image`, `content`, `tags`, `meta_keywords`, `meta_description`, `serial_number`, `created_at`, `updated_at`) VALUES
(66, 176, 1, 'Fusce convallis enim non magna Duis lacus dignissim.', 'Fusce-convallis-enim-non-magna-Duis-lacus-dignissim.', '1598694784.jpg', 0x69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e, NULL, NULL, NULL, 1, '2020-08-29 03:47:49', '2020-08-29 03:53:04'),
(67, 176, 3, 'Non magna pharetra facilisis. lacus nulla dignissim.', 'Non-magna-pharetra-facilisis.-lacus-nulla-dignissim.', '1598694802.jpg', 0x69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e, NULL, NULL, NULL, 2, '2020-08-29 03:50:37', '2020-08-29 03:53:22'),
(68, 176, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', 'Lorem-ipsum-dolor-sit-amet,-consectetur-adipiscing-elit,-sed-do-eiusmod-tempor', '1598694694.jpg', 0x69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e, NULL, NULL, NULL, 3, '2020-08-29 03:51:34', '2020-08-29 03:51:34'),
(69, 176, 3, 'Fusce convallis enim non magna Duis lacus dignissim.', 'Fusce-convallis-enim-non-magna-Duis-lacus-dignissim.', '1598694769.jpg', 0x69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e, NULL, NULL, NULL, 4, '2020-08-29 03:52:49', '2020-08-29 03:52:49'),
(70, 176, 1, 'Non magna pharetra facilisis. lacus nulla dignissim.', 'Non-magna-pharetra-facilisis.-lacus-nulla-dignissim.', '1598694837.jpg', 0x69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e, NULL, NULL, NULL, 5, '2020-08-29 03:53:57', '2020-08-29 03:53:57'),
(71, 176, 5, 'Fusce convallis enim non magna Duis lacus dignissim.', 'Fusce-convallis-enim-non-magna-Duis-lacus-dignissim.', '1598694875.jpg', 0x69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e, NULL, NULL, NULL, 6, '2020-08-29 03:54:35', '2020-08-29 03:54:35'),
(72, 176, 3, 'Non magna pharetra facilisis. lacus nulla dignissim.', 'Non-magna-pharetra-facilisis.-lacus-nulla-dignissim.', '1598694928.jpg', 0x69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e, NULL, NULL, NULL, 7, '2020-08-29 03:55:28', '2020-08-29 03:55:28'),
(73, 176, 3, 'Non magna pharetra facilisis. lacus nulla dignissim.', 'Non-magna-pharetra-facilisis.-lacus-nulla-dignissim.', '1598694962.jpg', 0x69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e, NULL, NULL, NULL, 8, '2020-08-29 03:56:02', '2020-08-29 03:56:02'),
(74, 176, 1, 'Fusce convallis enim non magna Duis lacus dignissim.', 'Fusce-convallis-enim-non-magna-Duis-lacus-dignissim.', '1598695007.jpg', 0x69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e, NULL, NULL, NULL, 9, '2020-08-29 03:56:47', '2020-08-29 03:56:47'),
(75, 177, 7, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز', 'هناك-حقيقة-مثبتة-منذ-زمن-طويل-وهي-أن-المحتوى-المقروء-لصفحة-ما-سيلهي-القارئ-عن-التركيز', '1598773516.jpg', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, NULL, NULL, NULL, 1, '2020-08-30 01:45:16', '2020-08-30 01:45:16'),
(76, 177, 8, 'المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص', 'المحتوى)-ويُستخدم-في-صناعات-المطابع-ودور-النشر.-كان-لوريم-إيبسوم-ولايزال-المعيار-للنص', '1598773566.jpg', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, NULL, NULL, NULL, 2, '2020-08-30 01:46:06', '2020-08-30 01:46:06'),
(77, 177, 11, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز', 'هناك-حقيقة-مثبتة-منذ-زمن-طويل-وهي-أن-المحتوى-المقروء-لصفحة-ما-سيلهي-القارئ-عن-التركيز', '1598773612.jpg', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, NULL, NULL, NULL, 3, '2020-08-30 01:46:52', '2020-08-30 01:46:52'),
(78, 177, 8, 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس', 'لوريم-إيبسوم(Lorem-Ipsum)-هو-ببساطة-نص-شكلي-(بمعنى-أن-الغاية-هي-الشكل-وليس', '1598773671.jpg', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, NULL, NULL, NULL, 4, '2020-08-30 01:47:51', '2020-08-30 01:47:51');
INSERT INTO `blogs` (`id`, `language_id`, `bcategory_id`, `title`, `slug`, `main_image`, `content`, `tags`, `meta_keywords`, `meta_description`, `serial_number`, `created_at`, `updated_at`) VALUES
(79, 177, 7, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز', 'هناك-حقيقة-مثبتة-منذ-زمن-طويل-وهي-أن-المحتوى-المقروء-لصفحة-ما-سيلهي-القارئ-عن-التركيز', '1598773736.jpg', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, NULL, NULL, NULL, 5, '2020-08-30 01:48:56', '2020-08-30 01:48:56'),
(80, 177, 10, 'المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص', 'المحتوى)-ويُستخدم-في-صناعات-المطابع-ودور-النشر.-كان-لوريم-إيبسوم-ولايزال-المعيار-للنص', '1598773784.jpg', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, NULL, NULL, NULL, 6, '2020-08-30 01:49:44', '2020-08-30 01:49:44'),
(81, 177, 8, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز', 'هناك-حقيقة-مثبتة-منذ-زمن-طويل-وهي-أن-المحتوى-المقروء-لصفحة-ما-سيلهي-القارئ-عن-التركيز', '1598773832.jpg', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, NULL, NULL, NULL, 7, '2020-08-30 01:50:32', '2020-08-30 01:50:32'),
(82, 177, 8, 'المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص', 'المحتوى)-ويُستخدم-في-صناعات-المطابع-ودور-النشر.-كان-لوريم-إيبسوم-ولايزال-المعيار-للنص', '1598773871.jpg', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, NULL, NULL, NULL, 8, '2020-08-30 01:51:11', '2020-08-30 01:51:11'),
(83, 177, 7, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز', 'هناك-حقيقة-مثبتة-منذ-زمن-طويل-وهي-أن-المحتوى-المقروء-لصفحة-ما-سيلهي-القارئ-عن-التركيز', '1598773908.jpg', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, NULL, NULL, NULL, 9, '2020-08-30 01:51:48', '2020-08-30 01:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `bottomlinks`
--

CREATE TABLE `bottomlinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bottomlinks`
--

INSERT INTO `bottomlinks` (`id`, `language_id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(11, 169, 'Career', 'https://megasoft.biz/plusagency/services?category=9', NULL, NULL),
(12, 169, 'Terms of service', 'https://megasoft.biz/plusagency/services?category=9', NULL, NULL),
(13, 169, 'Refund policy', 'https://megasoft.biz/plusagency/services?category=9', NULL, NULL),
(14, 176, 'Privacy Policy', 'https://codecanyon.megasoft.biz/superv/Privacy-Policy/4/page', NULL, NULL),
(15, 176, 'Terms & Conditions', 'https://codecanyon.megasoft.biz/superv/Terms-&-Conditions/3/page', NULL, NULL),
(16, 176, 'About', 'https://codecanyon.megasoft.biz/superv/About-Us/1/page', NULL, NULL),
(17, 177, 'link 1', 'https://megasoft.biz/alphasoft/', NULL, NULL),
(18, 177, 'link 2', 'https://megasoft.biz/alphasoft/', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL COMMENT 'percentage, fixed',
  `value` decimal(11,2) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `minimum_spend` decimal(11,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `type`, `value`, `start_date`, `end_date`, `minimum_spend`, `created_at`, `updated_at`) VALUES
(4, 'Special', 'Special14', 'percentage', '14.00', '12/29/2020', '01/09/2021', '400.00', '2020-12-23 03:54:07', '2020-12-24 08:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(16, 'Benjamin', 'benkzy11332@gmail.com', '0123456789', NULL, '2023-03-26 22:21:49', '2023-03-27 00:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_type` varchar(100) DEFAULT NULL,
  `email_subject` text DEFAULT NULL,
  `email_body` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `email_type`, `email_subject`, `email_body`) VALUES
(2, 'email_verification', 'Verify Your Email', 0x3c70207374796c653d226c696e652d6865696768743a20312e363b223e48656c6c6f3c623e207b637573746f6d65725f6e616d657d3c2f623e2c3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e506c6561736520636c69636b20746865206c696e6b2062656c6f7720746f2076657269667920796f757220656d61696c2e3c2f703e3c703e3c627574746f6e20747970653d22627574746f6e223e7b766572696669636174696f6e5f6c696e6b7d3c2f627574746f6e3e3c2f703e3c703e3c62723e3c2f703e3c703e4265737420526567617264732c3c2f703e3c703e7b776562736974655f7469746c657d3c2f703e),
(3, 'order_received', 'Order Received', 0x3c70207374796c653d226c696e652d6865696768743a20312e363b223e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e596f7572206f7264657220686173206265656e2072656365697665642e3c62723e4f72646572204e756d6265723a20237b6f726465725f6e756d6265727d3c2f703e3c703e3c62723e506c6561736520636c69636b206f6e207468652062656c6f77206c696e6b20746f2073656520796f7572206f726465722064657461696c732e3c62723e7b6f726465725f6c696e6b7d3c2f703e3c703e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e),
(4, 'order_preparing', 'Preparing Your Order', 0x3c70207374796c653d226c696e652d6865696768743a20312e363b223e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e4368656620686173207374617274656420707265706172696e6720796f7572206f72646572656420666f6f64732e3c62723e4f72646572204e756d6265723a266e6273703b20237b6f726465725f6e756d6265727d3c2f703e3c703e3c62723e506c6561736520636c69636b206f6e207468652062656c6f77206c696e6b20746f2073656520796f7572206f726465722064657461696c732e3c62723e7b6f726465725f6c696e6b7d3c2f703e3c703e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e),
(5, 'order_ready_to_pickup', 'Your Order is Ready to Pickup', 0x3c70207374796c653d226c696e652d6865696768743a20312e363b223e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e596f7572206f7264657220697320726561647920746f207069636b75702e204f75722064656c6976657279206d616e2077696c6c207069636b20757020746865206f7264657220736f6f6e2e3c62723e4f72646572204e756d6265723a266e6273703b20237b6f726465725f6e756d6265727d3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e506c6561736520636c69636b206f6e207468652062656c6f77206c696e6b20746f2073656520796f7572206f726465722064657461696c732e3c62723e7b6f726465725f6c696e6b7d3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e),
(6, 'order_ready_to_pickup_pick_up', 'Your order is ready to pick up', 0x3c70207374796c653d226c696e652d6865696768743a20312e363b223e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e596f7572206f7264657220697320726561647920746f207069636b75702e20506c65617365207069636b757020796f7572206f7264657220617420796f75722063686f73656e206461746520262074696d652e3c62723e4f72646572204e756d6265723a266e6273703b20237b6f726465725f6e756d6265727d3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e506c6561736520636c69636b206f6e207468652062656c6f77206c696e6b20746f2073656520796f7572206f726465722064657461696c732e3c62723e7b6f726465725f6c696e6b7d3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e),
(7, 'order_pickedup', 'Order has been pickedup', 0x3c703e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c703e3c62723e596f7572206f72646572206973207069636b656420757020666f722064656c69766572792e2049742077696c6c206265206172726976656420696e206120666577206d6f6d656e74732e3c62723e4f72646572204e756d6265723a20237b6f726465725f6e756d6265727d3c2f703e3c703e3c62723e506c6561736520636c69636b206f6e207468652062656c6f77206c696e6b20746f2073656520796f7572206f726465722064657461696c732e3c62723e7b6f726465725f6c696e6b7d3c2f703e3c703e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e),
(8, 'order_pickedup_pick_up', 'You have picked up Ordered Food', 0x3c703e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c703e3c62723e596f75722068617665207069636b656420757020796f7572206f72646572656420466f6f642e3c62723e4f72646572204e756d6265723a20237b6f726465725f6e756d6265727d3c2f703e3c703e3c62723e506c6561736520636c69636b206f6e207468652062656c6f77206c696e6b20746f2073656520796f7572206f726465722064657461696c732e3c62723e7b6f726465725f6c696e6b7d3c2f703e3c703e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e),
(9, 'order_delivered', 'Order has been Delivered', 0x3c70207374796c653d226c696e652d6865696768743a20312e363b223e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e596f7572206f7264657220686173206265656e2064656c6976657265642e3c62723e4f72646572204e756d6265723a20237b6f726465725f6e756d6265727d3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e506c6561736520636c69636b206f6e207468652062656c6f77206c696e6b20746f2073656520796f7572206f726465722064657461696c732e3c62723e7b6f726465725f6c696e6b7d3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e),
(10, 'order_cancelled', 'Order is Cancelled', 0x3c70207374796c653d226c696e652d6865696768743a20312e363b223e48656c6c6f203c623e7b637573746f6d65725f6e616d657d3c2f623e2c3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e596f7572206f7264657220686173206265656e2063616e63656c6c65642e3c62723e4f72646572204e756d6265723a207b6f726465725f6e756d6265727d3c2f703e3c703e3c62723e506c6561736520636c69636b206f6e207468652062656c6f77206c696e6b20746f2073656520796f7572206f726465722064657461696c732e3c62723e7b6f726465725f6c696e6b7d3c2f703e3c703e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e3c623e7b776562736974655f7469746c657d3c2f623e3c2f703e),
(11, 'order_ready_to_serve', 'Your order is ready to serve on table', 0x3c703e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c703e3c62723e596f7572206f7264657220697320726561647920746f207365727665206f6e207461626c652e205761697465722077696c6c2073657276657220746865206f7264657220696e2061206d6f6d656e742e3c62723e4f72646572204e756d6265723a20237b6f726465725f6e756d6265727d3c2f703e3c703e3c62723e506c6561736520636c69636b206f6e207468652062656c6f77206c696e6b20746f2073656520796f7572206f726465722064657461696c732e3c62723e7b6f726465725f6c696e6b7d3c2f703e3c703e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e),
(12, 'order_served', 'You order is served on table', 0x3c703e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c703e3c62723e596f7572206f7264657220697320736572766564206f6e20796f7572207461626c652e20456e6a6f7920796f757220466f6f642e3c62723e4f72646572204e756d6265723a20237b6f726465725f6e756d6265727d3c2f703e3c703e3c62723e506c6561736520636c69636b206f6e207468652062656c6f77206c696e6b20746f2073656520796f7572206f726465722064657461696c732e3c62723e7b6f726465725f6c696e6b7d3c2f703e3c703e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e),
(13, 'food_checkout', 'Order has been placed', 0x3c70207374796c653d226c696e652d6865696768743a20312e363b223e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e596f7572206f7264657220686173206265656e20706c61636564207375636365737366756c6c792e205765206861766520617474616368656420616e20696e766f69636520696e2074686973206d61696c2e3c62723e4f72646572204e756d6265723a20237b6f726465725f6e756d6265727d3c2f703e3c703e3c62723e506c6561736520636c69636b206f6e207468652062656c6f77206c696e6b20746f2073656520796f7572206f726465722064657461696c732e3c62723e7b6f726465725f6c696e6b7d3c2f703e3c703e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e),
(14, 'reservation_accept', 'Reservation Request Accepted', 0x3c703e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c703e3c62723e596f75207265736572766174696f6e207265717565737420686173206265656e2061636365707465642e3c2f703e3c703e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e),
(15, 'reservation_reject', 'Reservation Request Rejected', 0x3c70207374796c653d226c696e652d6865696768743a20312e363b223e48656c6c6f207b637573746f6d65725f6e616d657d2c3c2f703e3c70207374796c653d226c696e652d6865696768743a20312e363b223e3c62723e596f75207265736572766174696f6e207265717565737420686173206265656e2072656a65637465642e3c2f703e3c703e3c62723e3c2f703e3c703e4265737420526567617264732c3c62723e7b776562736974655f7469746c657d3c2f703e);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `question` varchar(255) DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `language_id`, `question`, `answer`, `serial_number`) VALUES
(20, 176, 'Why this app is so awesome', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.', 1),
(21, 176, 'Why this app is so awesome', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.', 2),
(22, 176, 'Why this app is so awesome', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.', 3),
(23, 176, 'Why this app is so awesome', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.', 4),
(24, 176, 'Why this app is so awesome', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.', 5),
(25, 176, 'Why this app is so awesome', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.', 6),
(26, 176, 'Why this app is so awesome', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.', 7),
(27, 176, 'Why this app is so awesome', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.', 8),
(28, 176, 'Why this app is so awesome', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.', 9),
(29, 176, 'Why this app is so awesome', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.', 10),
(50, 177, 'لماذا هذا التطبيق رائع جدا', 'الرسوم المتحركة pariatur كليشيه reprehenderit ، enim eiusmod حياة عالية accusamus تيري ريتشاردسون الإعلانية الحبار. 3 الذئب القمر officia aute ، غير cupidatat غداء دولر لوح التزلج. شاحنة الغذاء الكينوا nesciunt labum eiusmod.', 1),
(51, 177, 'لماذا هذا التطبيق رائع جدا', 'الرسوم المتحركة pariatur كليشيه reprehenderit ، enim eiusmod حياة عالية accusamus تيري ريتشاردسون الإعلانية الحبار. 3 الذئب القمر officia aute ، غير cupidatat غداء دولر لوح التزلج. شاحنة الغذاء الكينوا nesciunt labum eiusmod.', 2),
(52, 177, 'لماذا هذا التطبيق رائع جدا', 'الرسوم المتحركة pariatur كليشيه reprehenderit ، enim eiusmod حياة عالية accusamus تيري ريتشاردسون الإعلانية الحبار. 3 الذئب القمر officia aute ، غير cupidatat غداء دولر لوح التزلج. شاحنة الغذاء الكينوا nesciunt labum eiusmod.', 3),
(53, 177, 'لماذا هذا التطبيق رائع جدا', 'الرسوم المتحركة pariatur كليشيه reprehenderit ، enim eiusmod حياة عالية accusamus تيري ريتشاردسون الإعلانية الحبار. 3 الذئب القمر officia aute ، غير cupidatat غداء دولر لوح التزلج. شاحنة الغذاء الكينوا nesciunt labum eiusmod.', 4),
(54, 177, 'لماذا هذا التطبيق رائع جدا', 'الرسوم المتحركة pariatur كليشيه reprehenderit ، enim eiusmod حياة عالية accusamus تيري ريتشاردسون الإعلانية الحبار. 3 الذئب القمر officia aute ، غير cupidatat غداء دولر لوح التزلج. شاحنة الغذاء الكينوا nesciunt labum eiusmod.', 5),
(55, 177, 'لماذا هذا التطبيق رائع جدا', 'الرسوم المتحركة pariatur كليشيه reprehenderit ، enim eiusmod حياة عالية accusamus تيري ريتشاردسون الإعلانية الحبار. 3 الذئب القمر officia aute ، غير cupidatat غداء دولر لوح التزلج. شاحنة الغذاء الكينوا nesciunt labum eiusmod.', 6),
(56, 177, 'لماذا هذا التطبيق رائع جدا', 'الرسوم المتحركة pariatur كليشيه reprehenderit ، enim eiusmod حياة عالية accusamus تيري ريتشاردسون الإعلانية الحبار. 3 الذئب القمر officia aute ، غير cupidatat غداء دولر لوح التزلج. شاحنة الغذاء الكينوا nesciunt labum eiusmod.', 7),
(57, 177, 'لماذا هذا التطبيق رائع جدا', 'الرسوم المتحركة pariatur كليشيه reprehenderit ، enim eiusmod حياة عالية accusamus تيري ريتشاردسون الإعلانية الحبار. 3 الذئب القمر officia aute ، غير cupidatat غداء دولر لوح التزلج. شاحنة الغذاء الكينوا nesciunt labum eiusmod.', 8),
(58, 177, 'لماذا هذا التطبيق رائع جدا', 'الرسوم المتحركة pariatur كليشيه reprehenderit ، enim eiusmod حياة عالية accusamus تيري ريتشاردسون الإعلانية الحبار. 3 الذئب القمر officia aute ، غير cupidatat غداء دولر لوح التزلج. شاحنة الغذاء الكينوا nesciunt labum eiusmod.', 9),
(59, 177, 'لماذا هذا التطبيق رائع جدا', 'الرسوم المتحركة pariatur كليشيه reprehenderit ، enim eiusmod حياة عالية accusamus تيري ريتشاردسون الإعلانية الحبار. 3 الذئب القمر officia aute ، غير cupidatat غداء دولر لوح التزلج. شاحنة الغذاء الكينوا nesciunt labum eiusmod.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `serial_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `language_id`, `image`, `title`, `serial_number`, `created_at`, `updated_at`) VALUES
(37, 176, '1598681069.png', 'Healthy Foods', 1, NULL, NULL),
(38, 176, '1599804681.png', 'Fresh Items', 2, NULL, NULL),
(42, 176, '1598681208.png', 'Tasty Foods', 3, NULL, NULL),
(43, 176, '1598681487.png', 'Sweet Cheeses', 4, NULL, NULL),
(50, 176, '1598681561.jpg', 'Best Pizzas', 5, NULL, NULL),
(51, 176, '1598681630.jpg', 'Hot Snacks', 6, NULL, NULL),
(52, 177, '1598709367.png', 'أغذية صحية', 1, NULL, NULL),
(53, 177, '1598709399.png', 'الأصناف الطازجة', 2, NULL, NULL),
(54, 177, '1598709420.png', 'Tasty Foods', 3, NULL, NULL),
(55, 177, '1598709446.png', 'جبن حلو', 4, NULL, NULL),
(56, 177, '1598709473.jpg', 'أفضل بيتزا', 5, NULL, NULL),
(57, 177, '1598709494.jpg', 'وجبات خفيفة ساخنة', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `language_id`, `title`, `image`, `serial_number`, `created_at`, `updated_at`) VALUES
(78, 176, 'Boti Kabab', '1598075956.jpg', 1, '2020-08-21 23:59:16', '2020-08-21 23:59:16'),
(79, 176, 'Chef Cooking', '1598076003.jpg', 2, '2020-08-22 00:00:03', '2020-08-22 00:00:03'),
(80, 176, 'Blackberry', '1598076734.jpg', 3, '2020-08-22 00:12:14', '2020-08-22 00:12:14'),
(81, 176, 'Cutting Vegetables', '1598076779.jpg', 4, '2020-08-22 00:12:59', '2020-08-22 00:12:59'),
(82, 176, 'Black Burger', '1598076815.jpg', 5, '2020-08-22 00:13:35', '2020-08-22 00:13:35'),
(83, 176, 'Wine Glasses', '1598076856.jpg', 6, '2020-08-22 00:14:16', '2020-08-22 00:14:16'),
(84, 176, 'Tomatoes', '1598076946.jpg', 7, '2020-08-22 00:15:46', '2020-08-22 00:15:46'),
(85, 177, 'بوتي كباب', '1598770469.jpg', 1, '2020-08-30 00:54:29', '2020-08-30 00:54:29'),
(86, 177, 'طاه الطبخ', '1598770506.jpg', 2, '2020-08-30 00:55:06', '2020-08-30 00:55:06'),
(87, 177, 'بلاك بيري', '1598770535.jpg', 3, '2020-08-30 00:55:35', '2020-08-30 00:55:35'),
(88, 177, 'تقطيع الخضار', '1598770563.jpg', 4, '2020-08-30 00:56:03', '2020-08-30 00:56:03'),
(89, 177, 'بلاك برجر', '1598770590.jpg', 5, '2020-08-30 00:56:30', '2020-08-30 00:56:30'),
(90, 177, 'كؤوس النبيذ', '1598770685.jpg', 6, '2020-08-30 00:58:05', '2020-08-30 00:58:05'),
(91, 177, 'طماطم', '1598770727.jpg', 7, '2020-08-30 00:58:47', '2020-08-30 00:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `endpoint` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `endpoint`, `created_at`, `updated_at`) VALUES
(3, 'https://fcm.googleapis.com/fcm/send/dRDyV7OmiFg:APA91bHVyRIr4Fex43DVFIM_CC6Ldo9hieQFcgewtgoLNGfK_fpIzFgGAAP_INoOTjnmOzSjg5K1qJUKKLefZuz5uQBj3YFFuyREw5YqWVQt7AJTeAfo-bfiFEz6-BytS3JoYseML_wt', '2020-12-26 07:38:28', '2020-12-26 07:38:28'),
(4, 'https://fcm.googleapis.com/fcm/send/dt--VeNXQpk:APA91bEXROqytusuQiBN-WidokRxoe_IH7kR6Qi6zXD1Ajx-XyQ4EtEoJxg62WwI-j0RFq2xUjBe-Is7h17zlUMntaf4mgCUeDFtLiW98h8xoOfL3ynutkpMHmyqoldRHVZDZGOQY98X', '2020-12-26 10:04:17', '2020-12-26 10:04:17'),
(5, 'https://fcm.googleapis.com/fcm/send/fetLuDtmxNg:APA91bHqqBZBZzCuFd8Ae3hGHo5q972ktIjfZuRzek59nJXiwdn88UBtnuU9IwaxVznCJGxn1SdhlOFZ8sIsGyVBoK-GIm6KCk0iTuvwc1e3o0H4hfunWZe-o98HQpIXpYDAkan0DiAy', '2021-03-24 07:37:03', '2021-03-24 07:37:03'),
(6, 'https://updates.push.services.mozilla.com/wpush/v2/gAAAAABgXhAyYoUVkJ8ymIaucMN78o9LdNIJ2ZhWATCMTUa79O7Q_6IWuwZlWOkNi33elgKb73GjntPc0ErLR7FF9b0UU0BNiDpJdsEv0uqcGKdNWkiYlAdlmNPaR0rKI8VivAkeCPzjYhykXGdYpXVpR3TxceTSpWBzxivvTpCTLQlUq72QNO8', '2021-03-26 11:47:44', '2021-03-26 11:47:44'),
(7, 'https://fcm.googleapis.com/fcm/send/cmWvhqu3tv8:APA91bFobMGJpxJvuqHpFU7Y5vtVZNcvsykv_So9xDDoCqKLewXINW8QbmIkpha9i7CJZPAoaZjST1cJPnwwa0rbp-VCk8LOWRoxcuIyyUlsOIFCMCOwysBSFZm_1eBbVV9aeyLSENGc', '2021-04-03 00:02:31', '2021-04-03 00:02:31'),
(8, 'https://fcm.googleapis.com/fcm/send/eh4uTNYjL8g:APA91bEX1UoNIWd9wkORCAREAofoRcvvbmRdDNMQwd1d-EZ0lbfCU5CUXewaZucNBK81XO0z6h0LnUaBFPHRlEDrUGm90vu_GHDd5lrndy3l6Otqf5i921YWUa-Xwn4i0MSW5uoPAeMQ', '2021-04-16 11:36:28', '2021-04-16 11:36:28'),
(9, 'https://fcm.googleapis.com/fcm/send/dObB80OmAaw:APA91bFv7cirSdv3z2G0IU7AlDsIylsVt5C2Z3q53ZUNLMlvlOIfQiOshMF-xKknu8706NDLq9PJyhl7eCdOZlzw-pxRrgsW-p2PjU9N1bePkHnYSIPnTp5a4g1N1tDQQQQWNDjy9slX', '2021-05-06 09:40:57', '2021-05-06 09:40:57'),
(10, 'https://fcm.googleapis.com/fcm/send/eZKf01giLZc:APA91bH4tmbQ3s4Lv-B9nztPSZW3yd7Y2uXC-60sHsGIhKkOlUxP6oC68n37Vtq-FBk-OlTVlU76weuJ_vrW0BliQoqvrNRb8xstdCONgBIs47-5fgbphTiuONZgUp1nDtX8LfcFM-Iy', '2021-05-23 00:31:34', '2021-05-23 00:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `jcategories`
--

CREATE TABLE `jcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jcategories`
--

INSERT INTO `jcategories` (`id`, `language_id`, `name`, `status`, `serial_number`, `created_at`, `updated_at`) VALUES
(22, 176, 'Web Developer', 1, 1, '2019-12-21 20:34:11', '2020-02-10 21:01:36'),
(23, 176, 'Web Designer', 1, 2, '2019-12-21 20:34:22', '2020-02-10 21:01:30'),
(24, 176, 'Team Leader', 1, 3, '2019-12-21 20:35:02', '2020-02-10 21:39:34'),
(25, 176, 'IOS Developer', 1, 4, NULL, NULL),
(26, 176, 'Andriod Developer', 1, 5, '2019-12-21 20:35:27', '2020-02-10 21:39:34'),
(34, 177, 'مطور ويب', 1, 1, '2019-12-29 23:49:09', '2020-02-10 21:40:10'),
(35, 177, 'مصمم الويب', 1, 2, '2019-12-29 23:49:23', '2020-02-10 21:40:10'),
(36, 177, 'رئيس الفريق', 1, 3, '2019-12-29 23:49:41', '2020-02-10 21:40:10'),
(37, 177, 'مطور IOS', 1, 4, '2019-12-29 23:49:54', '2020-02-10 21:40:10'),
(38, 177, 'الروبوت المطور', 1, 5, '2019-12-29 23:50:07', '2020-02-10 21:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jcategory_id` int(11) DEFAULT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `vacancy` int(11) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `job_responsibilities` blob DEFAULT NULL,
  `employment_status` varchar(255) DEFAULT NULL,
  `educational_requirements` blob DEFAULT NULL,
  `experience_requirements` blob DEFAULT NULL,
  `additional_requirements` blob DEFAULT NULL,
  `job_location` varchar(255) DEFAULT NULL,
  `salary` blob DEFAULT NULL,
  `benefits` blob DEFAULT NULL,
  `read_before_apply` blob DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `jcategory_id`, `language_id`, `title`, `slug`, `vacancy`, `deadline`, `experience`, `job_responsibilities`, `employment_status`, `educational_requirements`, `experience_requirements`, `additional_requirements`, `job_location`, `salary`, `benefits`, `read_before_apply`, `email`, `serial_number`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(17, 22, 176, 'Software Engineer - Laravel, Vue JS', 'software-engineer-laravel-vue-js', 3, '12/31/2019', '3 to 4 year(s)', 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206d75737420686176652070726163746963616c20657870657269656e6365206f6e204e6f64652e6a732c20547970655363726970742c207765627061636b20616e64205468697264207061727479206c6962726172792e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520616e20696e2d646570746820756e6465727374616e64696e67206f662063726f73732062726f7773657220636f6d7061746962696c69747920616e6420796f7520646f206e6f7420637265617465206275677320666f72207375636820726561736f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752061726520706978656c2d7065726665637420696e2064657369676e20636f6e76657273696f6e7320616e6420796f75207468696e6b206f66206d6f62696c652d666972737420696d706c656d656e746174696f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 'Full-time', 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520616e20696e2d646570746820756e6465727374616e64696e67206f662063726f73732062726f7773657220636f6d7061746962696c69747920616e6420796f7520646f206e6f7420637265617465206275677320666f72207375636820726561736f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752061726520706978656c2d7065726665637420696e2064657369676e20636f6e76657273696f6e7320616e6420796f75207468696e6b206f66206d6f62696c652d666972737420696d706c656d656e746174696f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 'Remote Job', 0x3c7370616e207374796c653d22666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e24323030303c2f7370616e3e3c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520616e20696e2d646570746820756e6465727374616e64696e67206f662063726f73732062726f7773657220636f6d7061746962696c69747920616e6420796f7520646f206e6f7420637265617465206275677320666f72207375636820726561736f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752061726520706978656c2d7065726665637420696e2064657369676e20636f6e76657273696f6e7320616e6420796f75207468696e6b206f66206d6f62696c652d666972737420696d706c656d656e746174696f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 0x3c62723e, 'drop_your_cv@plusagency.com', 1, NULL, NULL, '2019-12-21 20:44:00', '2020-02-10 21:49:54'),
(18, 22, 176, 'PHP Developer - Laravel, Codeigniter', 'php-developer-laravel-codeigniter', 2, '12/31/2019', '2 to 3 year(s)', 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206d75737420686176652070726163746963616c20657870657269656e6365206f6e204e6f64652e6a732c20547970655363726970742c207765627061636b20616e64205468697264207061727479206c6962726172792e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520616e20696e2d646570746820756e6465727374616e64696e67206f662063726f73732062726f7773657220636f6d7061746962696c69747920616e6420796f7520646f206e6f7420637265617465206275677320666f72207375636820726561736f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752061726520706978656c2d7065726665637420696e2064657369676e20636f6e76657273696f6e7320616e6420796f75207468696e6b206f66206d6f62696c652d666972737420696d706c656d656e746174696f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 'Full-time', 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206d75737420686176652070726163746963616c20657870657269656e6365206f6e204e6f64652e6a732c20547970655363726970742c207765627061636b20616e64205468697264207061727479206c6962726172792e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206d75737420686176652070726163746963616c20657870657269656e6365206f6e204e6f64652e6a732c20547970655363726970742c207765627061636b20616e64205468697264207061727479206c6962726172792e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520616e20696e2d646570746820756e6465727374616e64696e67206f662063726f73732062726f7773657220636f6d7061746962696c69747920616e6420796f7520646f206e6f7420637265617465206275677320666f72207375636820726561736f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752061726520706978656c2d7065726665637420696e2064657369676e20636f6e76657273696f6e7320616e6420796f75207468696e6b206f66206d6f62696c652d666972737420696d706c656d656e746174696f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 'California, USA', 0x3c7370616e207374796c653d22666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e2431303030202d2024313530303c2f7370616e3e3c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206d75737420686176652070726163746963616c20657870657269656e6365206f6e204e6f64652e6a732c20547970655363726970742c207765627061636b20616e64205468697264207061727479206c6962726172792e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520616e20696e2d646570746820756e6465727374616e64696e67206f662063726f73732062726f7773657220636f6d7061746962696c69747920616e6420796f7520646f206e6f7420637265617465206275677320666f72207375636820726561736f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752061726520706978656c2d7065726665637420696e2064657369676e20636f6e76657273696f6e7320616e6420796f75207468696e6b206f66206d6f62696c652d666972737420696d706c656d656e746174696f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 0x3c666f6e7420636f6c6f723d2223666633623330223e2a50686f746f67726170683c2f666f6e743e266e6273703b6d75737420626520656e636c6f73656420776974682074686520726573756d652e3c62723e, 'drop_your_cv@plusagency.com', 2, NULL, NULL, '2019-12-21 21:14:03', '2020-02-10 21:49:54');
INSERT INTO `jobs` (`id`, `jcategory_id`, `language_id`, `title`, `slug`, `vacancy`, `deadline`, `experience`, `job_responsibilities`, `employment_status`, `educational_requirements`, `experience_requirements`, `additional_requirements`, `job_location`, `salary`, `benefits`, `read_before_apply`, `email`, `serial_number`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(19, 23, 176, 'Front End Software Engineer', 'Front-End-Software-Engineer', 5, '12/27/2019', '2 to 5 year(s)', 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206d75737420686176652070726163746963616c20657870657269656e6365206f6e204e6f64652e6a732c20547970655363726970742c207765627061636b20616e64205468697264207061727479206c6962726172792e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520616e20696e2d646570746820756e6465727374616e64696e67206f662063726f73732062726f7773657220636f6d7061746962696c69747920616e6420796f7520646f206e6f7420637265617465206275677320666f72207375636820726561736f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752061726520706978656c2d7065726665637420696e2064657369676e20636f6e76657273696f6e7320616e6420796f75207468696e6b206f66206d6f62696c652d666972737420696d706c656d656e746174696f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 'Full-time', 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206d75737420686176652070726163746963616c20657870657269656e6365206f6e204e6f64652e6a732c20547970655363726970742c207765627061636b20616e64205468697264207061727479206c6962726172792e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520616e20696e2d646570746820756e6465727374616e64696e67206f662063726f73732062726f7773657220636f6d7061746962696c69747920616e6420796f7520646f206e6f7420637265617465206275677320666f72207375636820726561736f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752061726520706978656c2d7065726665637420696e2064657369676e20636f6e76657273696f6e7320616e6420796f75207468696e6b206f66206d6f62696c652d666972737420696d706c656d656e746174696f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 0x3120746f20332079656172733c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206d75737420686176652070726163746963616c20657870657269656e6365206f6e204e6f64652e6a732c20547970655363726970742c207765627061636b20616e64205468697264207061727479206c6962726172792e3c2f7370616e3e3c62723e, 'Paris, France', 0x3c7370616e207374796c653d22666f6e742d66616d696c793a20417269616c2c2048656c7665746963612c2073616e732d73657269662c20736f6c61696d616e6c6970693b223e4e65676f746961626c653c2f7370616e3e3c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c7370616e207374796c653d226261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c62723e3c7370616e207374796c653d226261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c62723e3c7370616e207374796c653d226261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b223e596f75206d75737420686176652070726163746963616c20657870657269656e6365206f6e204e6f64652e6a732c20547970655363726970742c207765627061636b20616e64205468697264207061727479206c6962726172792e3c2f7370616e3e3c62723e3c7370616e207374796c653d226261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c2f7370616e3e3c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206d75737420686176652070726163746963616c20657870657269656e6365206f6e204e6f64652e6a732c20547970655363726970742c207765627061636b20616e64205468697264207061727479206c6962726172792e3c2f7370616e3e3c62723e, 'drop_your_cv@plusagency.com', 3, NULL, NULL, '2019-12-21 21:15:20', '2020-02-10 21:49:54'),
(20, 24, 176, 'Agriculture Market Systems Leader', 'agriculture-market-systems-leader', 4, '12/28/2019', 'At least 7 year(s)', 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206d75737420686176652070726163746963616c20657870657269656e6365206f6e204e6f64652e6a732c20547970655363726970742c207765627061636b20616e64205468697264207061727479206c6962726172792e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520616e20696e2d646570746820756e6465727374616e64696e67206f662063726f73732062726f7773657220636f6d7061746962696c69747920616e6420796f7520646f206e6f7420637265617465206275677320666f72207375636820726561736f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752061726520706978656c2d7065726665637420696e2064657369676e20636f6e76657273696f6e7320616e6420796f75207468696e6b206f66206d6f62696c652d666972737420696d706c656d656e746174696f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 'Full-time', 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e6365642077697468205549206672616d65776f726b7320696e2067656e6572616c3b207765206c6f76652074686520416e67756c617220616e6420416e67756c6172206d6174657269616c2e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520746f20626520657870657269656e63656420696e206275696c64696e672053696e676c652050616765204170706c69636174696f6e732028535041292026616d703b20696e746567726174696e672057656220285265737429204150492e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e57656c6c20766572736564207769746820416e67756c6172206d6f64756c6573206f7220796f752068617665206372656174656420637573746f6d20616e642077656220636f6d706f6e656e747320627920796f757273656c662e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520616e20696e2d646570746820756e6465727374616e64696e67206f662063726f73732062726f7773657220636f6d7061746962696c69747920616e6420796f7520646f206e6f7420637265617465206275677320666f72207375636820726561736f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752061726520706978656c2d7065726665637420696e2064657369676e20636f6e76657273696f6e7320616e6420796f75207468696e6b206f66206d6f62696c652d666972737420696d706c656d656e746174696f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 'California, USA', 0x2431303030202d2024313530303c62723e, 0x3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f75206861766520616e20696e2d646570746820756e6465727374616e64696e67206f662063726f73732062726f7773657220636f6d7061746962696c69747920616e6420796f7520646f206e6f7420637265617465206275677320666f72207375636820726561736f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752061726520706978656c2d7065726665637420696e2064657369676e20636f6e76657273696f6e7320616e6420796f75207468696e6b206f66206d6f62696c652d666972737420696d706c656d656e746174696f6e732e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e3c62723e3c2f7370616e3e3c7370616e207374796c653d22666f6e742d73697a653a2031302e3570743b206261636b67726f756e642d696d6167653a20696e697469616c3b206261636b67726f756e642d706f736974696f6e3a20696e697469616c3b206261636b67726f756e642d73697a653a20696e697469616c3b206261636b67726f756e642d7265706561743a20696e697469616c3b206261636b67726f756e642d6174746163686d656e743a20696e697469616c3b206261636b67726f756e642d6f726967696e3a20696e697469616c3b206261636b67726f756e642d636c69703a20696e697469616c3b206c696e652d6865696768743a20323870783b20666f6e742d66616d696c793a20417269616c2c2073616e732d73657269663b223e596f752073686f756c642068617665206b6e6f776c65646765206f66204353532070726570726f636573736f72732c204d6564696120717565726965732c20496d61676520636f6d7072657373696f6e20616e6420626520676f6f64207769746820646562756767696e672e3c2f7370616e3e3c62723e, 0x3c62723e, 'drop_your_cv@plusagency.com', 4, NULL, NULL, '2019-12-21 21:16:28', '2020-02-10 21:49:54'),
(25, 34, 177, 'مهندس برمجيات - Laravel ، Vue JS', 'مهندس-برمجيات---Laravel-،-Vue-JS', 3, '01/07/2020', '3 الى 4 سنوات', 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d98ad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d8b9d985d984d98ad8a920d981d98a204e6f64652e6a7320d988205479706553637269707420d988207765627061636b20d988d985d983d8aad8a8d8a920d8a7d984d8b7d8b1d98120d8a7d984d8abd8a7d984d8ab2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed984d8afd98ad98320d981d987d98520d985d8aad8b9d985d98220d984d984d8aad988d8a7d981d98220d8b9d8a8d8b120d8a7d984d985d8b3d8aad8b9d8b1d8b620d988d984d98520d8aad982d98520d8a8d8a5d986d8b4d8a7d8a120d8a3d8aed8b7d8a7d8a120d984d987d8b0d98720d8a7d984d8a3d8b3d8a8d8a7d8a82e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8a3d986d8aa20d985d8abd8a7d984d98a20d984d984d8a8d98ad983d8b3d98420d981d98a20d8aad8add988d98ad984d8a7d8aa20d8a7d984d8aad8b5d985d98ad98520d988d8aad981d983d8b120d981d98a20d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d985d8add985d988d98420d8a7d984d8a3d988d984d9892e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d985d8b9d8b1d981d8a920d8a8d985d8b9d8a7d984d8acd8a7d8aa2043535320d8a7d984d8a3d988d984d98ad8a920d988d8a7d8b3d8aad8b9d984d8a7d985d8a7d8aa20d8a7d984d988d8b3d8a7d8a6d8b720d988d8b6d8bad8b720d8a7d984d8b5d988d8b120d988d8aad983d988d98620d8acd98ad8afd98bd8a720d981d98a20d8aad8b5d8add98ad8ad20d8a7d984d8a3d8aed8b7d8a7d8a12e3c2f666f6e743e3c2f6469763e, 'وقت كامل', 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d98ad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d8b9d985d984d98ad8a920d981d98a204e6f64652e6a7320d988205479706553637269707420d988207765627061636b20d988d985d983d8aad8a8d8a920d8a7d984d8b7d8b1d98120d8a7d984d8abd8a7d984d8ab2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed984d8afd98ad98320d981d987d98520d985d8aad8b9d985d98220d984d984d8aad988d8a7d981d98220d8b9d8a8d8b120d8a7d984d985d8b3d8aad8b9d8b1d8b620d988d984d98520d8aad982d98520d8a8d8a5d986d8b4d8a7d8a120d8a3d8aed8b7d8a7d8a120d984d987d8b0d98720d8a7d984d8a3d8b3d8a8d8a7d8a82e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8a3d986d8aa20d985d8abd8a7d984d98a20d984d984d8a8d98ad983d8b3d98420d981d98a20d8aad8add988d98ad984d8a7d8aa20d8a7d984d8aad8b5d985d98ad98520d988d8aad981d983d8b120d981d98a20d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d985d8add985d988d98420d8a7d984d8a3d988d984d9892e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d985d8b9d8b1d981d8a920d8a8d985d8b9d8a7d984d8acd8a7d8aa2043535320d8a7d984d8a3d988d984d98ad8a920d988d8a7d8b3d8aad8b9d984d8a7d985d8a7d8aa20d8a7d984d988d8b3d8a7d8a6d8b720d988d8b6d8bad8b720d8a7d984d8b5d988d8b120d988d8aad983d988d98620d8acd98ad8afd98bd8a720d981d98a20d8aad8b5d8add98ad8ad20d8a7d984d8a3d8aed8b7d8a7d8a12e3c2f666f6e743e3c2f6469763e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e, 'وظيفة عن بعد', 0x2420323030303c62723e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e, 0x3c62723e, 'drop_your_cv@plusagency.com', 1, NULL, NULL, '2020-01-01 21:24:25', '2020-02-10 21:50:44');
INSERT INTO `jobs` (`id`, `jcategory_id`, `language_id`, `title`, `slug`, `vacancy`, `deadline`, `experience`, `job_responsibilities`, `employment_status`, `educational_requirements`, `experience_requirements`, `additional_requirements`, `job_location`, `salary`, `benefits`, `read_before_apply`, `email`, `serial_number`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(26, 34, 177, 'مطور PHP - لارافيل', 'مطور-PHP---لارافيل', 2, '01/28/2020', '2 إلى 3 سنوات', 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d98ad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d8b9d985d984d98ad8a920d981d98a204e6f64652e6a7320d988205479706553637269707420d988207765627061636b20d988d985d983d8aad8a8d8a920d8a7d984d8b7d8b1d98120d8a7d984d8abd8a7d984d8ab2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed984d8afd98ad98320d981d987d98520d985d8aad8b9d985d98220d984d984d8aad988d8a7d981d98220d8b9d8a8d8b120d8a7d984d985d8b3d8aad8b9d8b1d8b620d988d984d98520d8aad982d98520d8a8d8a5d986d8b4d8a7d8a120d8a3d8aed8b7d8a7d8a120d984d987d8b0d98720d8a7d984d8a3d8b3d8a8d8a7d8a82e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8a3d986d8aa20d985d8abd8a7d984d98a20d984d984d8a8d98ad983d8b3d98420d981d98a20d8aad8add988d98ad984d8a7d8aa20d8a7d984d8aad8b5d985d98ad98520d988d8aad981d983d8b120d981d98a20d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d985d8add985d988d98420d8a7d984d8a3d988d984d9892e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d985d8b9d8b1d981d8a920d8a8d985d8b9d8a7d984d8acd8a7d8aa2043535320d8a7d984d8a3d988d984d98ad8a920d988d8a7d8b3d8aad8b9d984d8a7d985d8a7d8aa20d8a7d984d988d8b3d8a7d8a6d8b720d988d8b6d8bad8b720d8a7d984d8b5d988d8b120d988d8aad983d988d98620d8acd98ad8afd98bd8a720d981d98a20d8aad8b5d8add98ad8ad20d8a7d984d8a3d8aed8b7d8a7d8a12e3c2f666f6e743e3c2f6469763e, 'تعاقدي', 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d98ad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d8b9d985d984d98ad8a920d981d98a204e6f64652e6a7320d988205479706553637269707420d988207765627061636b20d988d985d983d8aad8a8d8a920d8a7d984d8b7d8b1d98120d8a7d984d8abd8a7d984d8ab2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed984d8afd98ad98320d981d987d98520d985d8aad8b9d985d98220d984d984d8aad988d8a7d981d98220d8b9d8a8d8b120d8a7d984d985d8b3d8aad8b9d8b1d8b620d988d984d98520d8aad982d98520d8a8d8a5d986d8b4d8a7d8a120d8a3d8aed8b7d8a7d8a120d984d987d8b0d98720d8a7d984d8a3d8b3d8a8d8a7d8a82e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8a3d986d8aa20d985d8abd8a7d984d98a20d984d984d8a8d98ad983d8b3d98420d981d98a20d8aad8add988d98ad984d8a7d8aa20d8a7d984d8aad8b5d985d98ad98520d988d8aad981d983d8b120d981d98a20d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d985d8add985d988d98420d8a7d984d8a3d988d984d9892e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d985d8b9d8b1d981d8a920d8a8d985d8b9d8a7d984d8acd8a7d8aa2043535320d8a7d984d8a3d988d984d98ad8a920d988d8a7d8b3d8aad8b9d984d8a7d985d8a7d8aa20d8a7d984d988d8b3d8a7d8a6d8b720d988d8b6d8bad8b720d8a7d984d8b5d988d8b120d988d8aad983d988d98620d8acd98ad8afd98bd8a720d981d98a20d8aad8b5d8add98ad8ad20d8a7d984d8a3d8aed8b7d8a7d8a12e3c2f666f6e743e3c2f6469763e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d98ad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d8b9d985d984d98ad8a920d981d98a204e6f64652e6a7320d988205479706553637269707420d988207765627061636b20d988d985d983d8aad8a8d8a920d8a7d984d8b7d8b1d98120d8a7d984d8abd8a7d984d8ab2e3c2f666f6e743e3c2f6469763e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d98ad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d8b9d985d984d98ad8a920d981d98a204e6f64652e6a7320d988205479706553637269707420d988207765627061636b20d988d985d983d8aad8a8d8a920d8a7d984d8b7d8b1d98120d8a7d984d8abd8a7d984d8ab2e3c2f666f6e743e3c2f6469763e, 'كاليفورنيا، الولايات المتحدة الأمريكية', 0x3130303020d8afd988d984d8a7d8b1202d203135303020d8afd988d984d8a7d8b13c62723e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d98ad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d8b9d985d984d98ad8a920d981d98a204e6f64652e6a7320d988205479706553637269707420d988207765627061636b20d988d985d983d8aad8a8d8a920d8a7d984d8b7d8b1d98120d8a7d984d8abd8a7d984d8ab2e3c2f666f6e743e3c2f6469763e, 0x2a20d98ad8acd8a820d8a5d8b1d981d8a7d98220d8a7d984d8b5d988d8b1d8a920d985d8b920d8a7d984d8b3d98ad8b1d8a920d8a7d984d8b0d8a7d8aad98ad8a92e3c62723e, 'drop_your_cv@plusagency.com', 2, NULL, NULL, '2020-01-01 21:28:01', '2020-02-10 21:50:44'),
(27, 35, 177, 'مهندس برمجيات الواجهة الأمامية', 'مهندس-برمجيات-الواجهة-الأمامية', 5, '01/31/2020', '2 إلى 5 سنوات', 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d98ad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d8b9d985d984d98ad8a920d981d98a204e6f64652e6a7320d988205479706553637269707420d988207765627061636b20d988d985d983d8aad8a8d8a920d8a7d984d8b7d8b1d98120d8a7d984d8abd8a7d984d8ab2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed984d8afd98ad98320d981d987d98520d985d8aad8b9d985d98220d984d984d8aad988d8a7d981d98220d8b9d8a8d8b120d8a7d984d985d8b3d8aad8b9d8b1d8b620d988d984d98520d8aad982d98520d8a8d8a5d986d8b4d8a7d8a120d8a3d8aed8b7d8a7d8a120d984d987d8b0d98720d8a7d984d8a3d8b3d8a8d8a7d8a82e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8a3d986d8aa20d985d8abd8a7d984d98a20d984d984d8a8d98ad983d8b3d98420d981d98a20d8aad8add988d98ad984d8a7d8aa20d8a7d984d8aad8b5d985d98ad98520d988d8aad981d983d8b120d981d98a20d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d985d8add985d988d98420d8a7d984d8a3d988d984d9892e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d985d8b9d8b1d981d8a920d8a8d985d8b9d8a7d984d8acd8a7d8aa2043535320d8a7d984d8a3d988d984d98ad8a920d988d8a7d8b3d8aad8b9d984d8a7d985d8a7d8aa20d8a7d984d988d8b3d8a7d8a6d8b720d988d8b6d8bad8b720d8a7d984d8b5d988d8b120d988d8aad983d988d98620d8acd98ad8afd98bd8a720d981d98a20d8aad8b5d8add98ad8ad20d8a7d984d8a3d8aed8b7d8a7d8a12e3c2f666f6e743e3c2f6469763e, 'وقت كامل', 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c62723e3c2f6469763e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c62723e3c2f6469763e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c62723e3c2f6469763e, 'باريس، فرنسا', 0x3120d8a5d984d989203320d8b3d986d988d8a7d8aa3c62723e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c62723e3c2f6469763e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d98ad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d8b9d985d984d98ad8a920d981d98a204e6f64652e6a7320d988205479706553637269707420d988207765627061636b20d988d985d983d8aad8a8d8a920d8a7d984d8b7d8b1d98120d8a7d984d8abd8a7d984d8ab2e3c2f666f6e743e3c2f6469763e, 'drop_your_cv@plusagency.com', 3, NULL, NULL, '2020-01-01 21:32:47', '2020-02-10 21:50:44'),
(28, 36, 177, 'زعيم نظم السوق الزراعية', 'زعيم-نظم-السوق-الزراعية', 4, '02/05/2020', 'على الأقل 7 سنوات', 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d98ad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d8b9d985d984d98ad8a920d981d98a204e6f64652e6a7320d988205479706553637269707420d988207765627061636b20d988d985d983d8aad8a8d8a920d8a7d984d8b7d8b1d98120d8a7d984d8abd8a7d984d8ab2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed984d8afd98ad98320d981d987d98520d985d8aad8b9d985d98220d984d984d8aad988d8a7d981d98220d8b9d8a8d8b120d8a7d984d985d8b3d8aad8b9d8b1d8b620d988d984d98520d8aad982d98520d8a8d8a5d986d8b4d8a7d8a120d8a3d8aed8b7d8a7d8a120d984d987d8b0d98720d8a7d984d8a3d8b3d8a8d8a7d8a82e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8a3d986d8aa20d985d8abd8a7d984d98a20d984d984d8a8d98ad983d8b3d98420d981d98a20d8aad8add988d98ad984d8a7d8aa20d8a7d984d8aad8b5d985d98ad98520d988d8aad981d983d8b120d981d98a20d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d985d8add985d988d98420d8a7d984d8a3d988d984d9892e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d985d8b9d8b1d981d8a920d8a8d985d8b9d8a7d984d8acd8a7d8aa2043535320d8a7d984d8a3d988d984d98ad8a920d988d8a7d8b3d8aad8b9d984d8a7d985d8a7d8aa20d8a7d984d988d8b3d8a7d8a6d8b720d988d8b6d8bad8b720d8a7d984d8b5d988d8b120d988d8aad983d988d98620d8acd98ad8afd98bd8a720d981d98a20d8aad8b5d8add98ad8ad20d8a7d984d8a3d8aed8b7d8a7d8a12e3c2f666f6e743e3c2f6469763e, 'وقت كامل', 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d9813c2f666f6e743e3c2f6469763e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e, 'كاليفورنيا، الولايات المتحدة الأمريكية', 0x3130303020d8afd988d984d8a7d8b1202d203135303020d8afd988d984d8a7d8b13c62723e, 0x3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d985d8aad985d8b1d8b3d98bd8a720d981d98a20d8a3d8b7d8b120d8b9d985d98420d988d8a7d8acd987d8a920d8a7d984d985d8b3d8aad8aed8afd98520d8a8d8b4d983d98420d8b9d8a7d98520d89b20d986d8add98620d986d8add8a820d8a7d984d8b2d8a7d988d98a20d988d8a7d984d985d988d8a7d8af20d8a7d984d8b2d8a7d988d98a2e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed98ad8acd8a820d8a3d98620d8aad983d988d98620d984d8afd98ad98320d8aed8a8d8b1d8a920d981d98a20d8a5d986d8b4d8a7d8a120d8aad8b7d8a8d98ad982d8a7d8aa20d8b5d981d8add8a920d988d8a7d8add8afd8a920285350412920d988d8afd985d8ac20d988d8a7d8acd987d8a920d8a8d8b1d985d8acd8a920d8aad8b7d8a8d98ad982d8a7d8aa20d8a7d984d988d98ad8a82028d8a7d984d8b1d8a7d8add8a9292e3c2f666f6e743e3c2f6469763e3c6469763e3c666f6e742073697a653d2234223ed8b6d984d98ad8b9d8a720d981d98a20d988d8add8afd8a7d8aa20d8a7d984d8b2d8a7d988d98a20d8a3d98820d982d985d8aa20d8a8d8a5d986d8b4d8a7d8a120d985d983d988d986d8a7d8aa20d985d8aed8b5d8b5d8a920d988d8b4d8a8d983d8a920d8a7d984d8a5d986d8aad8b1d986d8aa20d985d98620d982d8a8d98420d986d981d8b3d9832e3c2f666f6e743e3c2f6469763e, 0x3c62723e, 'drop_your_cv@plusagency.com', 4, NULL, NULL, '2020-01-01 21:35:15', '2020-02-24 00:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 1,
  `rtl` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - LTR, 1- RTL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `is_default`, `rtl`, `created_at`, `updated_at`) VALUES
(176, 'English', 'en', 1, 0, '2020-08-07 04:43:05', '2020-12-31 09:22:02'),
(177, 'عربى', 'ar', 0, 1, '2020-08-07 04:51:17', '2020-12-31 09:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `feature` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `language_id`, `name`, `rank`, `image`, `twitter`, `facebook`, `instagram`, `linkedin`, `feature`, `created_at`, `updated_at`) VALUES
(58, 177, 'سيلينا غوميز', 'الرئيس التنفيذي والمؤسس', '1597919376.jpg', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', 1, NULL, NULL),
(59, 177, 'أندريس بيرلو', 'مدير ، مشرف', '1597919908.jpg', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', 1, NULL, NULL),
(60, 177, 'كريستينا جريمي', 'رئيس الطباخين', '1597919925.jpg', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', 1, NULL, NULL),
(61, 177, 'روزا بيلا', 'برجر شيف', '1597919942.jpg', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', 0, NULL, NULL),
(65, 176, 'Chefs Of Chennai Curry House', 'CEO & Chefs of Chennai Curry House', '1679882549.jpg', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.instagram.com/', 1, NULL, NULL),
(66, 177, 'سيسك فابريجاس', 'تعيين رئيس الطهاة', '1598772306.jpg', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com', 'https://www.linkedin.com/', 0, NULL, NULL),
(67, 177, 'غوردون رامزي', 'شيف حلويات', '1598772340.jpg', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com', 'https://www.linkedin.com/', 0, NULL, NULL),
(68, 177, 'فرانك لامبارد', 'الشيف المشروبات', '1598772371.jpg', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com', 'https://www.linkedin.com/', 0, NULL, NULL),
(69, 177, 'شيستوفر هيلين', 'نادل مشرف', '1598772405.jpg', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com', 'https://www.linkedin.com/', 0, NULL, NULL),
(70, 177, 'كريسى كوستانزا', 'نادل مشرف', '1598772435.jpg', 'https://twitter.com/', 'https://www.facebook.com/', 'https://www.instagram.com', 'https://www.linkedin.com/', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `menus` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `language_id`, `menus`, `created_at`, `updated_at`) VALUES
(107, 177, '[{\"text\":\"الصفحة الرئيسية\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"home\"},{\"text\":\"قائمة طعام\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"menu_1\"},{\"text\":\"أغذية\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\",\"children\":[{\"text\":\"العناصر\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"items\"},{\"text\":\"عربة التسوق\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"cart\"},{\"text\":\"الدفع\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"checkout\"}]},{\"text\":\"حول\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\",\"children\":[{\"text\":\"صفحات ديناميكية\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\",\"children\":[{\"text\":\"معلومات عنا\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"5\"},{\"text\":\"البنود و الظروف\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"6\"},{\"text\":\"سياسة خاصة\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"7\"}]},{\"text\":\"صالة عرض\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"gallery\"},{\"text\":\"التعليمات\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"faq\"},{\"text\":\"وظائف\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"career\"},{\"text\":\"أعضاء الفريق\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"team\"},{\"text\":\"حجز\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"reservation\"},{\"text\":\"مستويات غير محدودة\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\",\"children\":[{\"text\":\"المستوى 3-1\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\"},{\"text\":\"المستوى 3-2\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\",\"children\":[{\"text\":\"المستوى 4-1\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\"},{\"text\":\"المستوى 4-2\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\"},{\"text\":\"المستوى 4-3\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\",\"children\":[{\"text\":\"المستوى 5-1\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\"},{\"text\":\"المستوى 5-2\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\"},{\"text\":\"المستوى 5-3\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\"}]}]},{\"text\":\"المستوى 3-3\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\"}]}]},{\"type\":\"blogs\",\"text\":\"المدونات\",\"href\":\"\",\"target\":\"_self\"},{\"type\":\"contact\",\"text\":\"اتصل\",\"href\":\"\",\"target\":\"_self\"}]', '2020-12-31 06:36:17', '2020-12-31 06:36:17'),
(111, 176, '[{\"text\":\"Home\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"home\"},{\"text\":\"Menu\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"menu_1\"},{\"type\":\"1\",\"text\":\"About Us\",\"href\":\"\",\"target\":\"_self\"},{\"text\":\"Contact\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"contact\"},{\"text\":\"Reservation\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"reservation\"}]', '2023-03-26 07:11:56', '2023-03-26 07:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_04_10_155226_add_pos_to_serving_methods', 1),
(5, '2021_04_10_161129_create_pos_payment_methods', 2),
(6, '2021_04_11_075502_create_customers_table', 3),
(7, '2021_04_11_151305_create_tables_table', 4),
(8, '2021_04_16_175547_add_qr_image_to_tables', 5),
(10, '2021_04_16_184950_add_qr_cols_to_table', 6),
(11, '2021_05_06_172702_add_image_to_tables', 7),
(12, '2021_05_06_182658_add_image_size_to_tables', 8),
(13, '2021_05_07_141846_change_defailt_image_size', 9),
(14, '2021_05_07_165729_drop_background_color_from_tables', 10),
(15, '2021_05_07_170622_add_image_position_cols_to_tables', 11),
(17, '2021_05_08_104914_add_type_and_text_cols_to_tables', 12),
(18, '2021_05_08_113457_add_default_value_to_text_color_in_tables', 13),
(19, '2021_05_08_174437_add_default_value_to_text_size_in_tables', 14),
(20, '2021_05_08_194033_add_qr_image_cols_to_basic_extendeds', 15),
(21, '2021_05_10_155349_add_gateway_type_to_product_orders', 16),
(24, '2021_05_11_180827_add_token_no_in_basic_settings', 17),
(25, '2021_05_11_181941_add_token_no_after_order_number_in_product_orders', 17),
(28, '2021_05_13_083313_create_postal_codes_table', 18),
(29, '2021_05_13_101831_add_postal_code_to_basic_settings', 19),
(32, '2021_05_16_105019_add_postal_code_to_product_orders', 20),
(33, '2021_05_18_130916_add_call_waiter_status_to_basic_settings', 21),
(34, '2021_05_18_194729_add_contact_infos_to_basic_settings', 22),
(36, '2021_05_19_081335_create_popups_table', 23),
(37, '2021_05_19_122217_drop_announcement_cols_from_basic_settings', 24),
(38, '2021_05_19_125220_drop_parent_link_col_from_basic_settings', 25),
(40, '2021_05_19_125534_add_whatsapp_chat_cols_to_basic_settings', 26),
(41, '2021_05_20_120604_add_order_close_cols_to_basic_extendeds', 27);

-- --------------------------------------------------------

--
-- Table structure for table `offline_gateways`
--

CREATE TABLE `offline_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `instructions` blob DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `is_receipt` tinyint(4) NOT NULL DEFAULT 1,
  `receipt` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offline_gateways`
--

INSERT INTO `offline_gateways` (`id`, `name`, `short_description`, `instructions`, `status`, `serial_number`, `is_receipt`, `receipt`, `created_at`, `updated_at`) VALUES
(3, 'Cash On Delivery', NULL, 0x3c703e3c62723e3c2f703e, 1, 3, 0, NULL, '2020-09-17 02:05:36', '2020-09-17 02:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `variations` text DEFAULT NULL,
  `addons` text DEFAULT NULL,
  `variations_price` decimal(11,2) NOT NULL DEFAULT 0.00,
  `addons_price` decimal(11,2) NOT NULL,
  `product_price` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_times`
--

CREATE TABLE `order_times` (
  `id` int(11) NOT NULL,
  `day` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `end_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_times`
--

INSERT INTO `order_times` (`id`, `day`, `start_time`, `end_time`) VALUES
(1, 'monday', '1:00 AM', '2:00 PM'),
(2, 'tuesday', '10:00 AM', '10:30 PM'),
(3, 'wednesday', '12:00 AM', '11:59 PM'),
(4, 'thursday', '8:30 AM', '2:00 PM'),
(5, 'friday', '11:00 AM', '9:00 PM'),
(6, 'saturday', '9:35 AM', '11:01 PM'),
(7, 'sunday', '12:00 AM', '11:59 PM');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `body` blob DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `meta_keywords` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `language_id`, `name`, `title`, `subtitle`, `slug`, `body`, `status`, `serial_number`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 176, 'About Us', 'About Us', 'About Us', 'About-Us', 0x3c6469763e3c623e3c753e3c62723e3c2f753e3c2f623e3c2f6469763e3c623e3c2f623e3c6469763e3c623e3c623e3c7370616e207374796c653d22666f6e742d66616d696c793a27417269616c20426c61636b273b223e3c753e4348454e4e414920435552525920484f5553453c2f753e3c2f7370616e3e3c2f623e3c2f623e3c2f6469763e3c623e3c2f623e3c70207374796c653d22746578742d616c69676e3a63656e7465723b223e3c62723e3c2f703e3c70207374796c653d22746578742d616c69676e3a63656e7465723b223e3c696d67207372633d22687474703a2f2f6c6f63616c686f73742f746573742f6173736574732f66726f6e742f696d672f73756d6d65726e6f74652f363432306666316538396139612e706e672220616c743d22363432306666316538396139612e706e67223e3c2f703e3c70207374796c653d22746578742d616c69676e3a63656e7465723b223e3c7370616e207374796c653d22636f6c6f723a7267622838362c38362c3836293b223e3c62723e3c2f7370616e3e3c2f703e3c6469763e4e6f72746820616e6420536f75746820496e6469616e2052657374617572616e742073657276696e67207175616c69747920496e6469616e20466f6f6420696e206120636c65616e20616e6420636f6d666f727461626c652073657474696e672e3c2f6469763e3c6469763e412064696e696e6720657870657269656e636520746861742069732064656c6967687466756c6c7920646966666572656e743c2f6469763e3c6469763e3c62723e3c2f6469763e3c6469763e3c62723e3c2f6469763e, 1, 1, NULL, NULL, '2020-08-21 04:06:16', '2023-03-26 22:34:21'),
(3, 176, 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', 'Terms-&-Conditions', 0x69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b, 1, 2, NULL, NULL, '2020-08-21 04:06:16', '2020-08-30 02:06:33'),
(4, 176, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 'Privacy-Policy', 0x3c703e4c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e672020696e6475737472792e200a0a4c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e200a0a4c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e0a0a204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e69732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b2e2069732073696d706c792064756d6d792074657874206f6620746865207072696e74696e6720616e64207479706573657474696e6720696e6475737472792e204c6f72656d20497073756d20686173206265656e2074686520696e6475737472792773207374616e646172642064756d6d79207465787420657665722073696e6365207468652031353030732c207768656e20616e20756e6b6e6f776e207072696e74657220746f6f6b20612067616c6c6579206f66207479706520616e6420736372616d626c656420697420746f206d616b65206120747970652073706563696d656e20626f6f6b3c2f703e, 1, 3, NULL, NULL, '2020-08-21 04:06:16', '2020-09-07 18:47:30'),
(5, 177, 'معلومات عنا', 'معلومات عنا', 'معلومات عنا', 'معلومات-عنا', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, 1, 1, NULL, NULL, '2020-08-30 02:07:32', '2020-08-30 02:07:32'),
(6, 177, 'البنود و الظروف', 'البنود و الظروف', 'البنود و الظروف', 'البنود-و-الظروف', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, 1, 2, NULL, NULL, '2020-08-30 02:09:42', '2020-08-30 02:09:42'),
(7, 177, 'سياسة خاصة', 'سياسة خاصة', 'سياسة خاصة', 'سياسة-خاصة', 0xd987d986d8a7d98320d8add982d98ad982d8a920d985d8abd8a8d8aad8a920d985d986d8b020d8b2d985d98620d8b7d988d98ad98420d988d987d98a20d8a3d98620d8a7d984d985d8add8aad988d98920d8a7d984d985d982d8b1d988d8a120d984d8b5d981d8add8a920d985d8a720d8b3d98ad984d987d98a20d8a7d984d982d8a7d8b1d8a620d8b9d98620d8a7d984d8aad8b1d983d98ad8b220d8b9d984d98920d8a7d984d8b4d983d98420d8a7d984d8aed8a7d8b1d8acd98a20d984d984d986d8b520d8a3d98820d8b4d983d98420d8aad988d8b6d8b920d8a7d984d981d982d8b1d8a7d8aa20d981d98a20d8a7d984d8b5d981d8add8a920d8a7d984d8aad98a20d98ad982d8b1d8a3d987d8a72e20d988d984d8b0d984d98320d98ad8aad98520d8a7d8b3d8aad8aed8afd8a7d98520d8b7d8b1d98ad982d8a920d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d984d8a3d986d987d8a720d8aad8b9d8b7d98a20d8aad988d8b2d98ad8b9d8a7d98e20d8b7d8a8d98ad8b9d98ad8a7d98e202dd8a5d984d98920d8add8af20d985d8a72d20d984d984d8a3d8add8b1d98120d8b9d988d8b6d8a7d98b20d8b9d98620d8a7d8b3d8aad8aed8afd8a7d9852022d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98ad88c20d987d986d8a720d98ad988d8acd8af20d985d8add8aad988d98920d986d8b5d98a2220d981d8aad8acd8b9d984d987d8a720d8aad8a8d8afd9882028d8a3d98a20d8a7d984d8a3d8add8b1d9812920d988d983d8a3d986d987d8a720d986d8b520d985d982d8b1d988d8a12e20d8a7d984d8b9d8afd98ad8af20d985d98620d8a8d8b1d8a7d985d8ad20d8a7d984d986d8b4d8b120d8a7d984d985d983d8aad8a8d98a20d988d8a8d8b1d8a7d985d8ad20d8aad8add8b1d98ad8b120d8b5d981d8add8a7d8aa20d8a7d984d988d98ad8a820d8aad8b3d8aad8aed8afd98520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8a8d8b4d983d98420d8a5d981d8aad8b1d8a7d8b6d98a20d983d986d985d988d8b0d8ac20d8b9d98620d8a7d984d986d8b5d88c20d988d8a5d8b0d8a720d982d985d8aa20d8a8d8a5d8afd8aed8a7d98420226c6f72656d20697073756d2220d981d98a20d8a3d98a20d985d8add8b1d98320d8a8d8add8ab20d8b3d8aad8b8d987d8b120d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d985d988d8a7d982d8b920d8a7d984d8add8afd98ad8abd8a920d8a7d984d8b9d987d8af20d981d98a20d986d8aad8a7d8a6d8ac20d8a7d984d8a8d8add8ab2e20d8b9d984d98920d985d8afd98920d8a7d984d8b3d986d98ad98620d8b8d987d8b1d8aa20d986d8b3d8ae20d8acd8afd98ad8afd8a920d988d985d8aed8aad984d981d8a920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b7d8b1d98ad98220d8a7d984d8b5d8afd981d8a9d88c20d988d8a3d8add98ad8a7d986d8a7d98b20d8b9d98620d8b9d985d8af20d983d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d8b9d8a8d8a7d8b1d8a7d8aa20d8a7d984d981d983d8a7d987d98ad8a920d8a5d984d98ad987d8a72e20d987d986d8a7d984d98320d8a7d984d8b9d8afd98ad8af20d985d98620d8a7d984d8a3d986d988d8a7d8b920d8a7d984d985d8aad988d981d8b1d8a920d984d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d985d88c20d988d984d983d98620d8a7d984d8bad8a7d984d8a8d98ad8a920d8aad98520d8aad8b9d8afd98ad984d987d8a720d8a8d8b4d983d98420d985d8a720d8b9d8a8d8b120d8a5d8afd8aed8a7d98420d8a8d8b9d8b620d8a7d984d986d988d8a7d8afd8b120d8a3d98820d8a7d984d983d984d985d8a7d8aa20d8a7d984d8b9d8b4d988d8a7d8a6d98ad8a920d8a5d984d98920d8a7d984d986d8b52e20d8a5d98620d983d986d8aa20d8aad8b1d98ad8af20d8a3d98620d8aad8b3d8aad8aed8afd98520d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d985d8a7d88c20d8b9d984d98ad98320d8a3d98620d8aad8aad8add982d98220d8a3d988d984d8a7d98b20d8a3d98620d984d98ad8b320d987d986d8a7d98320d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d985d8add8b1d8acd8a920d8a3d98820d8bad98ad8b120d984d8a7d8a6d982d8a920d985d8aed8a8d8a3d8a920d981d98a20d987d8b0d8a720d8a7d984d986d8b52e20d8a8d98ad986d985d8a720d8aad8b9d985d98420d8acd985d98ad8b920d985d988d984d991d8afd8a7d8aa20d986d8b5d988d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa20d8b9d984d98920d8a5d8b9d8a7d8afd8a920d8aad983d8b1d8a7d8b120d985d982d8a7d8b7d8b920d985d98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d986d981d8b3d98720d8b9d8afd8a920d985d8b1d8a7d8aa20d8a8d985d8a720d8aad8aad8b7d984d8a8d98720d8a7d984d8add8a7d8acd8a9d88c20d98ad982d988d98520d985d988d984d991d8afd986d8a720d987d8b0d8a720d8a8d8a7d8b3d8aad8aed8afd8a7d98520d983d984d985d8a7d8aa20d985d98620d982d8a7d985d988d8b320d98ad8add988d98a20d8b9d984d98920d8a3d983d8abd8b120d985d9862032303020d983d984d985d8a920d984d8a720d8aad98ad986d98ad8a9d88c20d985d8b6d8a7d98120d8a5d984d98ad987d8a720d985d8acd985d988d8b9d8a920d985d98620d8a7d984d8acd985d98420d8a7d984d986d985d988d8b0d8acd98ad8a9d88c20d984d8aad983d988d98ad98620d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8b0d98820d8b4d983d98420d985d986d8b7d982d98a20d982d8b1d98ad8a820d8a5d984d98920d8a7d984d986d8b520d8a7d984d8add982d98ad982d98a2e20d988d8a8d8a7d984d8aad8a7d984d98a20d98ad983d988d98620d8a7d984d986d8b520d8a7d984d986d8a7d8aad8ad20d8aed8a7d984d98a20d985d98620d8a7d984d8aad983d8b1d8a7d8b1d88c20d8a3d98820d8a3d98a20d983d984d985d8a7d8aa20d8a3d98820d8b9d8a8d8a7d8b1d8a7d8aa20d8bad98ad8b120d984d8a7d8a6d982d8a920d8a3d98820d985d8a720d8b4d8a7d8a8d9872e20d988d987d8b0d8a720d985d8a720d98ad8acd8b9d984d98720d8a3d988d98420d985d988d984d991d8af20d986d8b520d984d988d8b1d98ad98520d8a5d98ad8a8d8b3d988d98520d8add982d98ad982d98a20d8b9d984d98920d8a7d984d8a5d986d8aad8b1d986d8aa2e20, 1, 3, NULL, NULL, '2020-08-30 02:10:07', '2020-08-30 02:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'manual',
  `information` mediumtext DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `subtitle`, `title`, `details`, `name`, `type`, `information`, `keyword`, `status`) VALUES
(6, NULL, NULL, NULL, 'Flutterwave', 'automatic', '{\"public_key\":\"FLWPUBK_TEST-a34940f2f87746abbdd8c117caee81cf-X\",\"secret_key\":\"FLWSECK_TEST-1cb427c96e0b1e6772a04504be3638bd-X\",\"text\":\"Pay via your Flutterwave account.\"}', 'flutterwave', 1),
(9, NULL, NULL, NULL, 'Razorpay', 'automatic', '{\"key\":\"rzp_test_fV9dM9URYbqjm7\",\"secret\":\"nickxZ1du2ojPYVVRTDif2Xr\",\"text\":\"Pay via your Razorpay account.\"}', 'razorpay', 1),
(11, NULL, NULL, NULL, 'Paytm', 'automatic', '{\"merchant\":\"tkogux49985047638244\",\"secret\":\"LhNGUUKE9xCQ9xY8\",\"website\":\"WEBSTAGING\",\"industry\":\"Retail\",\"text\":\"Pay via your paytm account.\"}', 'paytm', 1),
(12, NULL, NULL, NULL, 'Paystack', 'automatic', '{\"key\":\"sk_test_45b0b207ffa006eeb5fc74ea35d01e673be15ade\",\"text\":\"Pay via your Paystack account.\"}', 'paystack', 1),
(13, NULL, NULL, NULL, 'Instamojo', 'automatic', '{\"key\":\"test_172371aa837ae5cad6047dc3052\",\"token\":\"test_4ac5a785e25fc596b67dbc5c267\",\"sandbox_check\":\"1\",\"text\":\"Pay via your Instamojo account.\"}', 'instamojo', 1),
(14, NULL, NULL, NULL, 'Stripe', 'automatic', '{\"key\":\"pk_test_51MpvJeGUQhgs9rg9AvNx36bBomYJSiAGVfP2CFOSubtDYwe1fleol9BPUYvFmYW52Xr3M8ZTdpczx8YAof2cxGHE005QL92SB0\",\"secret\":\"sk_test_51MpvJeGUQhgs9rg9uvr9LNo3KOdRUP7JkRCOGSGZWRV7hAvD61dGG7C8ST9Q4wsrP5IDS2hvuSm4UUgcRqMxQzIx0061nPLZQ7\",\"text\":\"Pay via your Credit account.\"}', 'stripe', 1),
(15, NULL, NULL, NULL, 'Paypal', 'automatic', '{\"client_id\":\"AVYKFEw63FtDt9aeYOe9biyifNI56s2Hc2F1Us11hWoY5GMuegipJRQBfWLiIKNbwQ5tmqKSrQTU3zB3\",\"client_secret\":\"EJY0qOKliVg7wKsR3uPN7lngr9rL1N7q4WV0FulT1h4Fw3_e5Itv1mxSdbtSUwAaQoXQFgq-RLlk_sQu\",\"sandbox_check\":\"1\",\"text\":\"Pay via your PayPal account.\"}', 'paypal', 1),
(17, NULL, NULL, NULL, 'Mollie Payment', 'automatic', '{\"key\":\"test_5HcWVs9qc5pzy36H9Tu9mwAyats33J\",\"text\":\"Pay via your Mollie Payment account.\"}', 'mollie', 1),
(18, NULL, NULL, NULL, 'PayUmoney', 'automatic', '{\"key\":\"gtKFFx\",\"salt\":\"eCwWELxi\",\"text\":\"Pay via your PayUmoney account.\"}', 'payumoney', 1),
(19, NULL, NULL, NULL, 'Mercado Pago', 'automatic', '{\"token\":\"TEST-705032440135962-041006-ad2e021853f22338fe1a4db9f64d1491-421886156\",\"sandbox_check\":\"1\",\"text\":\"Pay via your Mercado Pago account.\"}', 'mercadopago', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pcategories`
--

CREATE TABLE `pcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_feature` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pcategories`
--

INSERT INTO `pcategories` (`id`, `language_id`, `name`, `slug`, `image`, `status`, `is_feature`, `created_at`, `updated_at`) VALUES
(16, 177, 'قائمة الضبط', 'قائمة-الضبط', '5f4a6202bf8c7.png', 1, 1, '2020-08-29 08:11:14', '2020-08-29 08:19:32'),
(17, 177, 'برجر', 'برجر', '5f4a63a389c5c.png', 1, 1, '2020-08-29 08:18:11', '2020-08-29 08:19:28'),
(18, 177, 'الحلوى', 'الحلوى', '5f4a63c72bdf7.png', 1, 1, '2020-08-29 08:18:47', '2020-08-29 08:19:26'),
(19, 177, 'مشروب', 'مشروب', '5f4a63de44351.png', 1, 1, '2020-08-29 08:19:10', '2020-08-29 08:19:31'),
(21, 176, 'Chicken Dishes', 'Chicken-Dishes', '63f108a63d3d0.png', 1, NULL, '2023-02-18 08:43:21', '2023-02-18 09:19:34'),
(22, 176, 'Mutton and Lamb Dishes', 'Mutton-and-Lamb-Dishes', '63f10432334b3.png', 1, NULL, '2023-02-18 08:45:35', '2023-02-18 09:00:34'),
(23, 176, 'Set Meals Vegetarian', 'Set-Meals-Vegetarian', '63f109a2bc01a.png', 1, NULL, '2023-02-18 09:23:46', '2023-02-18 09:23:46'),
(24, 176, 'Set Meals Non-Vege', 'Set-Meals-Non-Vege', '63f10a22bb1da.png', 1, NULL, '2023-02-18 09:25:54', '2023-02-18 09:25:54'),
(25, 176, 'Pot Briyani\'s', 'Pot-Briyani\'s', '63f10abd85c62.png', 1, NULL, '2023-02-18 09:28:29', '2023-02-18 09:28:29'),
(26, 176, 'Beverages', 'Beverages', '63f10b4ccdfda.png', 1, NULL, '2023-02-18 09:30:52', '2023-02-18 09:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `popups`
--

CREATE TABLE `popups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `background_image` varchar(100) DEFAULT NULL,
  `background_color` varchar(100) DEFAULT NULL,
  `background_opacity` decimal(8,2) NOT NULL DEFAULT 1.00,
  `title` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_url` text DEFAULT NULL,
  `button_color` varchar(20) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `delay` int(11) NOT NULL DEFAULT 1000 COMMENT 'in milisconds',
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - active, 0 - deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popups`
--

INSERT INTO `popups` (`id`, `language_id`, `name`, `image`, `background_image`, `background_color`, `background_opacity`, `title`, `text`, `button_text`, `button_url`, `button_color`, `end_date`, `end_time`, `delay`, `serial_number`, `type`, `status`, `created_at`, `updated_at`) VALUES
(33, 177, 'Black Friday', '606d41536fa81.jpg', NULL, NULL, '1.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1500, 1, 1, 0, '2021-04-06 19:21:23', '2021-04-07 22:06:58'),
(34, 177, 'Monthend Sale', NULL, '606d41d50dd28.jpg', '451D53', '0.80', 'ENJOY 10% OFF', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Shop Now', 'http://example.com/', '451D53', NULL, NULL, 2000, 2, 2, 0, '2021-04-06 19:23:33', '2021-04-07 22:06:21'),
(35, 177, 'Summer Sale', NULL, '606d42e66ee81.jpg', 'FF2865', '0.70', 'Newsletter', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Subscribe', NULL, 'FF2865', NULL, NULL, 2000, 3, 3, 0, '2021-04-06 19:28:06', '2021-04-07 22:06:18'),
(36, 177, 'Winter Offer', '606d43711d16a.jpg', NULL, NULL, '1.00', 'Get 10% off your first order', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt', 'Shop Now', 'http://example.com/', 'FF2865', NULL, NULL, 1500, 4, 4, 0, '2021-04-06 19:30:25', '2021-04-25 04:18:04'),
(37, 177, 'Winter Sale', '606d43dfad35b.jpg', NULL, NULL, '1.00', 'Get 10% off your first order', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt', 'Subscribe', NULL, 'F8960D', NULL, NULL, 2000, 6, 5, 0, '2021-04-06 19:32:15', '2021-04-07 22:06:09'),
(38, 177, 'New Arrivals Saleu', NULL, '606d55f99176d.jpg', NULL, '1.00', 'Hurry, Sale Ends This Friday', 'This is your last chance to save 30%', 'Yes,I Want to Save 30%', 'http://example.com/', '29A19C', '03/14/2022', '3:00 AM', 1500, 7, 6, 0, '2021-04-06 19:34:08', '2021-05-23 01:00:12'),
(39, 177, 'Flash Sale', '606d5691a51bf.jpg', NULL, '930077', '1.00', 'Hurry, Sale Ends This Friday', 'This is your last chance to save 30%', 'Yes,I Want to Save 30%', 'http://example.com/', 'FA00CA', '04/09/2022', '10:00 AM', 1500, 8, 7, 0, '2021-04-06 19:36:04', '2021-04-07 22:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `postal_codes`
--

CREATE TABLE `postal_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  `charge` decimal(11,2) NOT NULL DEFAULT 0.00,
  `serial_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pos_payment_methods`
--

CREATE TABLE `pos_payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 - active, 0 - deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos_payment_methods`
--

INSERT INTO `pos_payment_methods` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'On Cash', 1, '2021-04-11 00:57:46', '2021-04-11 00:57:57'),
(4, 'Paypal', 1, '2021-05-10 11:30:28', '2021-05-10 11:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `feature_image` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `variations` text DEFAULT NULL,
  `addons` text DEFAULT NULL,
  `current_price` decimal(11,2) NOT NULL DEFAULT 0.00,
  `previous_price` decimal(11,2) DEFAULT 0.00,
  `rating` decimal(11,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_feature` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_special` tinyint(4) NOT NULL DEFAULT 0,
  `subcategory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `language_id`, `title`, `slug`, `category_id`, `feature_image`, `summary`, `description`, `variations`, `addons`, `current_price`, `previous_price`, `rating`, `status`, `is_feature`, `created_at`, `updated_at`, `is_special`, `subcategory_id`) VALUES
(39, 177, 'ضبط القائمة - 1', 'ضبط-القائمة---1', 16, '1598712240.jpg', 'يتكون من أرز مقلي بالبيض ، دجاج مقلي ، بصل و 2 قطعة دجاج مقلي.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.', '{\"Spice_Level\":[{\"name\":\"Mild\",\"price\":0},{\"name\":\"Medium\",\"price\":0},{\"name\":\"Spicy\",\"price\":0.5}],\"Ratio\":[{\"name\":\"1:1\",\"price\":0},{\"name\":\"1:2\",\"price\":1},{\"name\":\"1:3\",\"price\":2}]}', '[{\"name\":\"1 \\u0642\\u0637\\u0639\\u0629 \\u062f\\u062c\\u0627\\u062c\",\"price\":1},{\"name\":\"\\u0627\\u0644\\u062e\\u0636\\u0631\\u0648\\u0627\\u062a\",\"price\":0.5},{\"name\":\"\\u0628\\u064a\\u0636\\u0629\",\"price\":0.2}]', '2.00', NULL, '0.00', 1, 1, '2020-08-29 08:44:00', '2020-09-28 03:30:56', 0, 24),
(40, 177, 'ضبط القائمة - 2', 'ضبط-القائمة---2', 16, '1598712334.jpg', 'يتكون من أرز مقلي بالبيض وخضروات مشكلة و 2 قطعة دجاج مقلي.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', '{\"Ratio\":[{\"name\":\"1:1\",\"price\":0},{\"name\":\"1:2\",\"price\":1},{\"name\":\"1:3\",\"price\":2}]}', '[{\"name\":\"1 \\u0642\\u0637\\u0639\\u0629 \\u062f\\u062c\\u0627\\u062c\",\"price\":1},{\"name\":\"\\u0627\\u0644\\u062e\\u0636\\u0631\\u0648\\u0627\\u062a\",\"price\":0.5},{\"name\":\"\\u0628\\u064a\\u0636\\u0629\",\"price\":0.2}]', '3.00', '3.25', '0.00', 1, 1, '2020-08-29 08:45:34', '2020-08-29 22:37:00', 1, 25),
(41, 177, 'ضبط القائمة - 3', 'ضبط-القائمة---3', 16, '1598712404.jpg', 'يتكون من أرز مقلي بالبيض ، دجاج مقلي ، بصل و 2 قطعة دجاج مقلي.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', NULL, NULL, '3.50', '4.00', '0.00', 1, 1, '2020-08-29 08:46:44', '2020-08-30 03:56:52', 1, 24),
(42, 177, 'تعيين القائمة - 4', 'تعيين-القائمة---4', 16, '1598712465.jpg', 'يتكون من أرز مقلي بالبيض وخضروات مشكلة ودجاج ماسالا.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', '{\"Spice_Level\":[{\"name\":\"Mild\",\"price\":0},{\"name\":\"Medium\",\"price\":0},{\"name\":\"Spicy\",\"price\":0.5}]}', '[{\"name\":\"1 \\u0642\\u0637\\u0639\\u0629 \\u062f\\u062c\\u0627\\u062c\",\"price\":1},{\"name\":\"\\u0627\\u0644\\u062e\\u0636\\u0631\\u0648\\u0627\\u062a\",\"price\":0.5},{\"name\":\"\\u0628\\u064a\\u0636\\u0629\",\"price\":0.2}]', '4.00', NULL, '0.00', 1, 1, '2020-08-29 08:47:45', '2020-08-29 22:36:43', 0, 25),
(43, 177, 'تعيين القائمة - 5', 'تعيين-القائمة---5', 16, '1598712526.jpg', 'يتكون من أرز مقلي بالبيض ، خضار مشكلة ، دجاج حار ، بصل و 2 قطعة دجاج مقلي.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', NULL, NULL, '4.75', NULL, '0.00', 1, 1, '2020-08-29 08:48:46', '2020-08-29 22:37:30', 0, 24),
(44, 177, 'تعيين القائمة - 6', 'تعيين-القائمة---6', 16, '1598712590.jpg', 'يتكون من أرز مقلي بالبيض ، خضار مشكلة ، دجاج بصل حار ، كوكاكولا و 2 قطعة دجاج مقلي.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', '{\"Spice_Level\":[{\"name\":\"Mild\",\"price\":0},{\"name\":\"Medium\",\"price\":0},{\"name\":\"Spicy\",\"price\":0.5}],\"Ratio\":[{\"name\":\"1:1\",\"price\":0},{\"name\":\"1:2\",\"price\":1},{\"name\":\"1:3\",\"price\":2}]}', NULL, '5.00', NULL, '0.00', 1, 1, '2020-08-29 08:49:50', '2020-08-29 22:37:29', 0, 25),
(45, 177, 'برجر دجاج عادي', 'برجر-دجاج-عادي', 17, '1598713312.jpg', 'هذا البرجر الدجاج متبل بفتات الخبز والبصل والدجاج والفتات وزيت الزيتون والثوم', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', '{\"Spice_Level\":[{\"name\":\"Mild\",\"price\":0},{\"name\":\"Medium\",\"price\":0},{\"name\":\"Spicy\",\"price\":0}],\"Size\":[{\"name\":\"Regular\",\"price\":0},{\"name\":\"Large\",\"price\":1}]}', '[{\"name\":\"\\u062c\\u0628\\u0646\",\"price\":0.3},{\"name\":\"\\u0635\\u0644\\u0635\\u0629 \\u0634\\u0648\\u0627\\u0621\",\"price\":0.2},{\"name\":\"\\u0641\\u0637\\u064a\\u0631\\u0629\",\"price\":1},{\"name\":\"\\u0633\\u062c\\u0642\",\"price\":0.4},{\"name\":\"\\u0628\\u064a\\u0636\\u0629\",\"price\":0.2}]', '3.00', NULL, '0.00', 1, 1, '2020-08-29 09:01:52', '2020-08-29 22:37:27', 0, 17),
(46, 177, 'برجر لحم عادي', 'برجر-لحم-عادي', 17, '1598713396.jpg', 'لحم مفروم ، بقسماط ، فلفل أسود ، صلصة هاوس الخاصة.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.', '{\"Size\":[{\"name\":\"Regular\",\"price\":0},{\"name\":\"Large\",\"price\":1}]}', '[{\"name\":\"\\u062c\\u0628\\u0646\",\"price\":0.3},{\"name\":\"\\u0635\\u0644\\u0635\\u0629 \\u0634\\u0648\\u0627\\u0621\",\"price\":0.2},{\"name\":\"\\u0641\\u0637\\u064a\\u0631\\u0629\",\"price\":1},{\"name\":\"\\u0633\\u062c\\u0642\",\"price\":0.4},{\"name\":\"\\u0628\\u064a\\u0636\\u0629\",\"price\":0.2}]', '3.50', NULL, '0.00', 1, 1, '2020-08-29 09:03:16', '2020-09-28 03:35:02', 0, 18),
(47, 177, 'برجر دجاج مقرمش', 'برجر-دجاج-مقرمش', 17, '1598714296.jpg', 'جبنة جودة ، صدور دجاج ، جوهرة صغيرة ، ملفوف أبيض. برجر الدجاج المقلي مقرمش للغاية ومليء بالنكهة.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', '{\"Spice_Level\":[{\"name\":\"Mild\",\"price\":0},{\"name\":\"Medium\",\"price\":0},{\"name\":\"Spicy\",\"price\":0}]}', NULL, '4.00', '4.50', '0.00', 1, 1, '2020-08-29 09:18:16', '2020-08-29 22:38:20', 1, 17),
(48, 177, 'برجر دجاج بالجبنة', 'برجر-دجاج-بالجبنة', 17, '1598714456.jpg', 'صلصة رانش ، صدور دجاج ، أوراق سائبة ، صلصة صلصة ، جبن. الدجاج والجبن الذوق هو الأفضل', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', NULL, '[{\"name\":\"\\u062c\\u0628\\u0646\",\"price\":0.3},{\"name\":\"\\u0635\\u0644\\u0635\\u0629 \\u0634\\u0648\\u0627\\u0621\",\"price\":0.2},{\"name\":\"\\u0641\\u0637\\u064a\\u0631\\u0629\",\"price\":1},{\"name\":\"\\u0633\\u062c\\u0642\",\"price\":0.4},{\"name\":\"\\u0628\\u064a\\u0636\\u0629\",\"price\":0.2}]', '5.00', NULL, '0.00', 1, 1, '2020-08-29 09:20:56', '2020-08-29 22:37:21', 0, 17),
(49, 177, 'برجر لحم بالجبنة', 'برجر-لحم-بالجبنة', 17, '1598714525.jpg', 'لحم مفروم ، خبز ، شرائح جبن ، أوراق خس. شرائح الطماطم.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', '{\"Spice_Level\":[{\"name\":\"Mild\",\"price\":0},{\"name\":\"Medium\",\"price\":0},{\"name\":\"Spicy\",\"price\":0}],\"Size\":[{\"name\":\"Regular\",\"price\":0},{\"name\":\"Large\",\"price\":1}]}', NULL, '5.50', '6.00', '0.00', 1, 1, '2020-08-29 09:22:05', '2020-08-29 22:37:19', 0, 18),
(50, 177, 'برجر دجاج مشوي', 'برجر-دجاج-مشوي', 17, '1598714584.jpg', 'صلصة رانش ، صدور دجاج مشوية ، أوراق سائبة ، صلصة صلصة ، جبن. الدجاج والجبن الذوق هو الأفضل', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', '{\"Spice_Level\":[{\"name\":\"Mild\",\"price\":0},{\"name\":\"Medium\",\"price\":0},{\"name\":\"Spicy\",\"price\":0}],\"Size\":[{\"name\":\"Regular\",\"price\":0},{\"name\":\"Large\",\"price\":1}]}', '[{\"name\":\"\\u062c\\u0628\\u0646\",\"price\":0.3},{\"name\":\"\\u0635\\u0644\\u0635\\u0629 \\u0634\\u0648\\u0627\\u0621\",\"price\":0.2},{\"name\":\"\\u0641\\u0637\\u064a\\u0631\\u0629\",\"price\":1},{\"name\":\"\\u0633\\u062c\\u0642\",\"price\":0.4},{\"name\":\"\\u0628\\u064a\\u0636\\u0629\",\"price\":0.2}]', '6.00', '6.25', '0.00', 1, 1, '2020-08-29 09:23:04', '2020-08-29 22:37:18', 0, 17),
(51, 177, 'شوكولاتة نوتيلا', 'شوكولاتة-نوتيلا', 18, '1598761013.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', NULL, NULL, '2.00', NULL, '0.00', 1, 1, '2020-08-29 22:16:53', '2020-08-29 22:37:16', 0, 13),
(52, 177, 'حلويات جولابجامون', 'حلويات-جولابجامون', 18, '1598761088.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', '{\"Amount\":[{\"name\":\"400g\",\"price\":0},{\"name\":\"1kg\",\"price\":2}]}', NULL, '3.00', NULL, '0.00', 1, 1, '2020-08-29 22:18:08', '2020-08-29 22:37:15', 0, 14),
(53, 177, 'كوكيز شوكولاتة اللوز', 'كوكيز-شوكولاتة-اللوز', 18, '1598761155.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها.', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', NULL, NULL, '3.00', '3.50', '0.00', 1, 1, '2020-08-29 22:19:15', '2020-08-29 22:38:07', 1, 13),
(54, 177, 'مثلجات الفانيليا', 'مثلجات-الفانيليا', 18, '1598761462.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.', '{\"Amount\":[{\"name\":\"500 ML\",\"price\":0},{\"name\":\"1 L\",\"price\":2.5}]}', NULL, '3.50', '3.75', '0.00', 1, 1, '2020-08-29 22:24:22', '2020-08-30 03:34:35', 1, 16),
(55, 177, 'دونات كريمة الفراولة', 'دونات-كريمة-الفراولة', 18, '1598761527.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', NULL, NULL, '2.50', NULL, '0.00', 1, 1, '2020-08-29 22:25:27', '2020-08-29 22:37:45', 0, 15),
(56, 177, 'دونات عادي', 'دونات-عادي', 18, '1598761579.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', NULL, NULL, '1.50', '2.00', '0.00', 1, 1, '2020-08-29 22:26:19', '2020-08-29 22:37:43', 0, 15),
(57, 177, 'مثلج كوكاكولا', 'مثلج-كوكاكولا', 19, '1598761672.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', '{\"Size\":[{\"name\":\"600ML\",\"price\":0.6},{\"name\":\"1L\",\"price\":1}]}', '[{\"name\":\"\\u062c\\u0644\\u064a\\u062f\",\"price\":0},{\"name\":\"\\u0627\\u0644\\u0633\\u0643\\u0631\",\"price\":0.5}]', '1.00', NULL, '0.00', 1, 1, '2020-08-29 22:27:52', '2020-08-29 22:37:42', 0, 21),
(58, 177, 'عصير ليمون', 'عصير-ليمون', 19, '1598761890.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', '{\"Size\":[{\"name\":\"Small\",\"price\":0},{\"name\":\"Regular\",\"price\":1},{\"name\":\"Large\",\"price\":1.5}]}', '[{\"name\":\"\\u062c\\u0644\\u064a\\u062f\",\"price\":0},{\"name\":\"\\u0627\\u0644\\u0633\\u0643\\u0631\",\"price\":0.5}]', '2.00', '3.00', '0.00', 1, 1, '2020-08-29 22:28:43', '2020-08-30 03:34:44', 1, 19),
(59, 177, 'عصير البرتقال', 'عصير-البرتقال', 19, '1598761975.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', NULL, '[{\"name\":\"\\u062c\\u0644\\u064a\\u062f\",\"price\":0},{\"name\":\"\\u0627\\u0644\\u0633\\u0643\\u0631\",\"price\":0.5}]', '2.25', '2.50', '0.00', 1, 1, '2020-08-29 22:32:55', '2020-08-29 22:37:39', 0, 19),
(60, 177, 'عصير فواكه عضوي', 'عصير-فواكه-عضوي', 19, '1598762025.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', '{\"Size\":[{\"name\":\"Small\",\"price\":0},{\"name\":\"Regular\",\"price\":1},{\"name\":\"Large\",\"price\":1.5}]}', '[{\"name\":\"\\u062c\\u0644\\u064a\\u062f\",\"price\":0},{\"name\":\"\\u0627\\u0644\\u0633\\u0643\\u0631\",\"price\":0.5}]', '3.00', NULL, '0.00', 1, 1, '2020-08-29 22:33:45', '2020-08-29 22:37:38', 0, 19),
(61, 177, 'ميلك شيك', 'ميلك-شيك', 19, '1598762118.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت. ', NULL, '[{\"name\":\"\\u062c\\u0644\\u064a\\u062f\",\"price\":0},{\"name\":\"\\u0627\\u0644\\u0633\\u0643\\u0631\",\"price\":0.5}]', '4.00', '4.50', '0.00', 1, 1, '2020-08-29 22:35:18', '2020-08-29 22:38:01', 1, 20),
(62, 177, 'ليمونادة بالنعناع', 'ليمونادة-بالنعناع', 19, '1598762182.jpg', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها. هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.', '{\"Size\":[{\"name\":\"Small\",\"price\":0},{\"name\":\"Regular\",\"price\":1},{\"name\":\"Large\",\"price\":1.5}]}', '[{\"name\":\"\\u062c\\u0644\\u064a\\u062f\",\"price\":0},{\"name\":\"\\u0627\\u0644\\u0633\\u0643\\u0631\",\"price\":0.5}]', '2.00', NULL, '0.00', 1, 1, '2020-08-29 22:36:22', '2020-09-28 03:43:58', 0, 19),
(64, 176, 'Chicken Tanduri', 'Chicken-Tanduri', 21, '1679881395.jpg', 'Chicken Tanduri', '<p>Chicken Tanduri<br></p>', '[{\"name\":\"2 pax\",\"price\":3},{\"name\":\"4 pax\",\"price\":5},{\"name\":\"6 pax\",\"price\":10}]', '[{\"name\":\"Extra Gravy\",\"price\":2}]', '12.00', NULL, '0.00', 1, 1, '2023-03-26 19:43:15', '2023-03-26 19:43:24', 0, NULL),
(65, 176, 'Chicken Curry', 'Chicken-Curry', 21, '1679881475.jpg', 'Chicken Curry', '<p>Chicken Curry<br></p>', '[]', '[]', '12.00', NULL, '0.00', 1, 1, '2023-03-26 19:44:35', '2023-03-26 21:46:10', 0, NULL),
(66, 176, 'Chicken Vararul', 'Chicken-Vararul', 21, '1679881606.jpg', 'Chicken Vararul', '<p>Chicken Vararul<br></p>', '[]', '[]', '12.00', NULL, '0.00', 1, 1, '2023-03-26 21:46:46', '2023-03-26 22:07:03', 0, NULL),
(67, 176, 'Lamb', 'Lamb', 22, '1679882740.jpg', 'Lamb', '<p>Lamb<br></p>', '[]', '[]', '12.00', NULL, '0.00', 1, 1, '2023-03-26 22:05:40', '2023-03-26 22:07:01', 0, NULL),
(68, 176, 'Mango Lassi', 'Mango-Lassi', 26, '1679882865.jpg', 'Mango Lassi', '<p>Mango Lassi<br></p>', '[]', '[]', '12.00', NULL, '0.00', 1, 0, '2023-03-26 22:07:45', '2023-03-26 22:07:45', 0, NULL),
(69, 176, 'Fried Chicken', 'Fried-Chicken', 23, '1679882936.jpg', 'Fried Chicken', '<p>Fried Chicken<br></p>', '[]', '[]', '12.00', NULL, '0.00', 1, 0, '2023-03-26 22:08:56', '2023-03-26 22:08:56', 0, NULL),
(70, 176, 'Teh Tarik', 'Teh-Tarik', 26, '1679882974.png', 'Teh Tarik', '<p>Teh Tarik<br></p>', '[]', '[]', '12.00', NULL, '0.00', 1, 0, '2023-03-26 22:09:34', '2023-03-26 22:09:34', 0, NULL),
(71, 176, 'Flower Lassi', 'Flower-Lassi', 26, '1679883013.jpg', 'Flower Lassi', '<p>Flower Lassi<br></p>', '[]', '[]', '12.00', NULL, '0.00', 1, 0, '2023-03-26 22:10:13', '2023-03-26 22:10:13', 0, NULL),
(72, 176, 'Fish', 'Fish', 23, NULL, 'Fish', '<p>Fish<br></p>', '[]', '[]', '12.00', NULL, '0.00', 1, 0, '2023-03-26 22:10:53', '2023-03-26 22:10:53', 0, NULL),
(73, 176, 'Pot Chicken Briyani', 'Pot-Chicken-Briyani', 25, '1679883094.jpg', 'Pot Chicken Briyani', '<p>Pot Chicken Briyani<br></p>', '[]', '[]', '12.00', NULL, '0.00', 1, 0, '2023-03-26 22:11:34', '2023-03-26 22:11:34', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(194, 39, '5f4a68d955137.jpg', '2020-08-29 08:40:25', '2020-08-29 08:44:00'),
(195, 39, '5f4a68d96bb93.jpg', '2020-08-29 08:40:25', '2020-08-29 08:44:00'),
(196, 39, '5f4a68d9d9e62.jpg', '2020-08-29 08:40:25', '2020-08-29 08:44:00'),
(197, 39, '5f4a68d9ea812.jpg', '2020-08-29 08:40:25', '2020-08-29 08:44:00'),
(198, 39, '5f4a68da465d1.jpg', '2020-08-29 08:40:26', '2020-08-29 08:44:00'),
(199, 39, '5f4a68da543df.jpg', '2020-08-29 08:40:26', '2020-08-29 08:44:00'),
(200, 40, '5f4a69caeb230.jpg', '2020-08-29 08:44:26', '2020-08-29 08:45:34'),
(201, 40, '5f4a69caeb005.jpg', '2020-08-29 08:44:26', '2020-08-29 08:45:34'),
(202, 40, '5f4a69cb49e17.jpg', '2020-08-29 08:44:27', '2020-08-29 08:45:34'),
(203, 40, '5f4a69cb4f29e.jpg', '2020-08-29 08:44:27', '2020-08-29 08:45:34'),
(204, 40, '5f4a69cb97268.jpg', '2020-08-29 08:44:27', '2020-08-29 08:45:34'),
(205, 40, '5f4a69cb9ca9c.jpg', '2020-08-29 08:44:27', '2020-08-29 08:45:34'),
(206, 41, '5f4a6a2e1b842.jpg', '2020-08-29 08:46:06', '2020-08-29 08:46:44'),
(207, 41, '5f4a6a2e210a5.jpg', '2020-08-29 08:46:06', '2020-08-29 08:46:44'),
(208, 41, '5f4a6a2e67648.jpg', '2020-08-29 08:46:06', '2020-08-29 08:46:44'),
(209, 41, '5f4a6a2e6bfc9.jpg', '2020-08-29 08:46:06', '2020-08-29 08:46:44'),
(210, 41, '5f4a6a2eacd18.jpg', '2020-08-29 08:46:06', '2020-08-29 08:46:44'),
(211, 41, '5f4a6a2eae388.jpg', '2020-08-29 08:46:06', '2020-08-29 08:46:44'),
(212, 42, '5f4a6a6cc242b.jpg', '2020-08-29 08:47:08', '2020-08-29 08:47:45'),
(213, 42, '5f4a6a6cc2f5b.jpg', '2020-08-29 08:47:08', '2020-08-29 08:47:45'),
(214, 42, '5f4a6a6d1ee00.jpg', '2020-08-29 08:47:09', '2020-08-29 08:47:45'),
(215, 42, '5f4a6a6d2230c.jpg', '2020-08-29 08:47:09', '2020-08-29 08:47:45'),
(216, 42, '5f4a6a6d6aa9f.jpg', '2020-08-29 08:47:09', '2020-08-29 08:47:45'),
(217, 42, '5f4a6a6d6cb4e.jpg', '2020-08-29 08:47:09', '2020-08-29 08:47:45'),
(218, 43, '5f4a6aa87eb54.jpg', '2020-08-29 08:48:08', '2020-08-29 08:48:46'),
(219, 43, '5f4a6aa88b874.jpg', '2020-08-29 08:48:08', '2020-08-29 08:48:46'),
(220, 43, '5f4a6aa8d80dc.jpg', '2020-08-29 08:48:08', '2020-08-29 08:48:46'),
(221, 43, '5f4a6aa8e3900.jpg', '2020-08-29 08:48:08', '2020-08-29 08:48:46'),
(222, 43, '5f4a6aa95ede7.jpg', '2020-08-29 08:48:09', '2020-08-29 08:48:46'),
(223, 43, '5f4a6aa96034a.jpg', '2020-08-29 08:48:09', '2020-08-29 08:48:46'),
(224, 44, '5f4a6ae3d18f9.jpg', '2020-08-29 08:49:07', '2020-08-29 08:49:50'),
(225, 44, '5f4a6ae3d4b99.jpg', '2020-08-29 08:49:07', '2020-08-29 08:49:50'),
(226, 44, '5f4a6ae4759ad.jpg', '2020-08-29 08:49:08', '2020-08-29 08:49:50'),
(227, 44, '5f4a6ae47852e.jpg', '2020-08-29 08:49:08', '2020-08-29 08:49:50'),
(228, 44, '5f4a6ae4b05c0.jpg', '2020-08-29 08:49:08', '2020-08-29 08:49:50'),
(229, 44, '5f4a6ae4b3e2f.jpg', '2020-08-29 08:49:08', '2020-08-29 08:49:50'),
(230, 45, '5f4a6da3ca69b.jpg', '2020-08-29 09:00:51', '2020-08-29 09:01:52'),
(231, 45, '5f4a6da3e8058.jpg', '2020-08-29 09:00:51', '2020-08-29 09:01:52'),
(232, 45, '5f4a6da490c90.jpg', '2020-08-29 09:00:52', '2020-08-29 09:01:52'),
(233, 45, '5f4a6da49aaf1.jpg', '2020-08-29 09:00:52', '2020-08-29 09:01:52'),
(234, 45, '5f4a6da4dcedc.jpg', '2020-08-29 09:00:52', '2020-08-29 09:01:52'),
(235, 45, '5f4a6da4dff5c.jpg', '2020-08-29 09:00:52', '2020-08-29 09:01:52'),
(236, 46, '5f4a6e0253cfe.jpg', '2020-08-29 09:02:26', '2020-08-29 09:03:16'),
(237, 46, '5f4a6e0284cba.jpg', '2020-08-29 09:02:26', '2020-08-29 09:03:16'),
(238, 46, '5f4a6e02ec82d.jpg', '2020-08-29 09:02:26', '2020-08-29 09:03:16'),
(239, 46, '5f4a6e033477f.jpg', '2020-08-29 09:02:27', '2020-08-29 09:03:16'),
(240, 46, '5f4a6e035ff2d.jpg', '2020-08-29 09:02:27', '2020-08-29 09:03:16'),
(241, 47, '5f4a718bd9351.jpg', '2020-08-29 09:17:31', '2020-08-29 09:18:16'),
(242, 47, '5f4a718bda9a3.jpg', '2020-08-29 09:17:31', '2020-08-29 09:18:16'),
(243, 47, '5f4a718c2e0b9.jpg', '2020-08-29 09:17:32', '2020-08-29 09:18:16'),
(244, 47, '5f4a718c2eca7.jpg', '2020-08-29 09:17:32', '2020-08-29 09:18:16'),
(245, 47, '5f4a718c7ef05.jpg', '2020-08-29 09:17:32', '2020-08-29 09:18:16'),
(246, 47, '5f4a718c809f7.jpg', '2020-08-29 09:17:32', '2020-08-29 09:18:16'),
(247, 48, '5f4a7239b9b28.jpg', '2020-08-29 09:20:25', '2020-08-29 09:20:56'),
(248, 48, '5f4a7239bf231.jpg', '2020-08-29 09:20:25', '2020-08-29 09:20:56'),
(249, 48, '5f4a723a31b64.jpg', '2020-08-29 09:20:26', '2020-08-29 09:20:56'),
(250, 48, '5f4a723a4d102.jpg', '2020-08-29 09:20:26', '2020-08-29 09:20:56'),
(251, 48, '5f4a723aa7333.jpg', '2020-08-29 09:20:26', '2020-08-29 09:20:56'),
(252, 48, '5f4a723ace80a.jpg', '2020-08-29 09:20:26', '2020-08-29 09:20:56'),
(253, 49, '5f4a7278a313a.jpg', '2020-08-29 09:21:28', '2020-08-29 09:22:05'),
(254, 49, '5f4a7278b21d0.jpg', '2020-08-29 09:21:28', '2020-08-29 09:22:05'),
(255, 49, '5f4a7278e4908.jpg', '2020-08-29 09:21:28', '2020-08-29 09:22:05'),
(256, 49, '5f4a727903f5b.jpg', '2020-08-29 09:21:29', '2020-08-29 09:22:05'),
(257, 49, '5f4a72793dd44.jpg', '2020-08-29 09:21:29', '2020-08-29 09:22:05'),
(258, 49, '5f4a72794d5a9.jpg', '2020-08-29 09:21:29', '2020-08-29 09:22:05'),
(259, 50, '5f4a72b6e15d5.jpg', '2020-08-29 09:22:30', '2020-08-29 09:23:04'),
(260, 50, '5f4a72b70ad3f.jpg', '2020-08-29 09:22:31', '2020-08-29 09:23:04'),
(261, 50, '5f4a72b74a024.jpg', '2020-08-29 09:22:31', '2020-08-29 09:23:04'),
(262, 50, '5f4a72b75d446.jpg', '2020-08-29 09:22:31', '2020-08-29 09:23:04'),
(263, 50, '5f4a72b7a1f37.jpg', '2020-08-29 09:22:31', '2020-08-29 09:23:04'),
(264, 50, '5f4a72b7b3754.jpg', '2020-08-29 09:22:31', '2020-08-29 09:23:04'),
(265, 51, '5f4b27e87bd5f.jpg', '2020-08-29 22:15:36', '2020-08-29 22:16:53'),
(266, 51, '5f4b27e88316b.jpg', '2020-08-29 22:15:36', '2020-08-29 22:16:53'),
(267, 51, '5f4b27e8edba3.jpg', '2020-08-29 22:15:36', '2020-08-29 22:16:53'),
(268, 51, '5f4b27e900425.jpg', '2020-08-29 22:15:37', '2020-08-29 22:16:53'),
(269, 51, '5f4b27e9516b3.jpg', '2020-08-29 22:15:37', '2020-08-29 22:16:53'),
(270, 51, '5f4b27e951d77.jpg', '2020-08-29 22:15:37', '2020-08-29 22:16:53'),
(271, 52, '5f4b285c274a7.jpg', '2020-08-29 22:17:32', '2020-08-29 22:18:08'),
(272, 52, '5f4b285c2f7cc.jpg', '2020-08-29 22:17:32', '2020-08-29 22:18:08'),
(273, 52, '5f4b285c7e026.jpg', '2020-08-29 22:17:32', '2020-08-29 22:18:08'),
(274, 52, '5f4b285c880b5.jpg', '2020-08-29 22:17:32', '2020-08-29 22:18:08'),
(275, 52, '5f4b285cdfd06.jpg', '2020-08-29 22:17:32', '2020-08-29 22:18:08'),
(276, 52, '5f4b285ce7a4a.jpg', '2020-08-29 22:17:32', '2020-08-29 22:18:08'),
(277, 53, '5f4b289f862a9.jpg', '2020-08-29 22:18:39', '2020-08-29 22:19:15'),
(278, 53, '5f4b289f8649c.jpg', '2020-08-29 22:18:39', '2020-08-29 22:19:15'),
(279, 53, '5f4b289fcabeb.jpg', '2020-08-29 22:18:39', '2020-08-29 22:19:15'),
(280, 53, '5f4b289fd0a2e.jpg', '2020-08-29 22:18:39', '2020-08-29 22:19:15'),
(281, 53, '5f4b28a0238ce.jpg', '2020-08-29 22:18:40', '2020-08-29 22:19:15'),
(282, 53, '5f4b28a024363.jpg', '2020-08-29 22:18:40', '2020-08-29 22:19:15'),
(283, 54, '5f4b299bb4425.jpg', '2020-08-29 22:22:51', '2020-08-29 22:24:22'),
(284, 54, '5f4b299bb65ea.jpg', '2020-08-29 22:22:51', '2020-08-29 22:24:22'),
(285, 54, '5f4b299c3180e.jpg', '2020-08-29 22:22:52', '2020-08-29 22:24:22'),
(286, 54, '5f4b299c313e7.jpg', '2020-08-29 22:22:52', '2020-08-29 22:24:22'),
(287, 54, '5f4b299c8e154.jpg', '2020-08-29 22:22:52', '2020-08-29 22:24:22'),
(288, 54, '5f4b299c91e1b.jpg', '2020-08-29 22:22:52', '2020-08-29 22:24:22'),
(289, 55, '5f4b2a1b96496.jpg', '2020-08-29 22:24:59', '2020-08-29 22:25:27'),
(290, 55, '5f4b2a1b96d57.jpg', '2020-08-29 22:24:59', '2020-08-29 22:25:27'),
(291, 55, '5f4b2a1c04f45.jpg', '2020-08-29 22:25:00', '2020-08-29 22:25:27'),
(292, 55, '5f4b2a1c10526.jpg', '2020-08-29 22:25:00', '2020-08-29 22:25:27'),
(293, 55, '5f4b2a1c6b51c.jpg', '2020-08-29 22:25:00', '2020-08-29 22:25:27'),
(294, 55, '5f4b2a1c6db56.jpg', '2020-08-29 22:25:00', '2020-08-29 22:25:27'),
(295, 56, '5f4b2a505ec75.jpg', '2020-08-29 22:25:52', '2020-08-29 22:26:19'),
(296, 56, '5f4b2a506c7f9.jpg', '2020-08-29 22:25:52', '2020-08-29 22:26:19'),
(297, 56, '5f4b2a50ae311.jpg', '2020-08-29 22:25:52', '2020-08-29 22:26:19'),
(298, 56, '5f4b2a50bcafe.jpg', '2020-08-29 22:25:52', '2020-08-29 22:26:19'),
(299, 56, '5f4b2a51247f6.jpg', '2020-08-29 22:25:53', '2020-08-29 22:26:19'),
(300, 56, '5f4b2a512c12e.jpg', '2020-08-29 22:25:53', '2020-08-29 22:26:19'),
(308, 57, '5f4b2a9f73eb7.jpg', '2020-08-29 22:27:11', '2020-08-29 22:27:52'),
(309, 57, '5f4b2a9f75219.jpg', '2020-08-29 22:27:11', '2020-08-29 22:27:52'),
(310, 57, '5f4b2a9fd974b.jpg', '2020-08-29 22:27:11', '2020-08-29 22:27:52'),
(311, 57, '5f4b2a9fe1379.jpg', '2020-08-29 22:27:11', '2020-08-29 22:27:52'),
(312, 57, '5f4b2aa044d29.jpg', '2020-08-29 22:27:12', '2020-08-29 22:27:52'),
(313, 57, '5f4b2aa058bc1.jpg', '2020-08-29 22:27:12', '2020-08-29 22:27:52'),
(314, 58, '5f4b2acef13c5.jpg', '2020-08-29 22:27:58', '2020-08-29 22:28:43'),
(315, 58, '5f4b2acef1588.jpg', '2020-08-29 22:27:58', '2020-08-29 22:28:43'),
(316, 58, '5f4b2acf49269.jpg', '2020-08-29 22:27:59', '2020-08-29 22:28:43'),
(317, 58, '5f4b2acf4b7b7.jpg', '2020-08-29 22:27:59', '2020-08-29 22:28:43'),
(318, 58, '5f4b2acf81d65.jpg', '2020-08-29 22:27:59', '2020-08-29 22:28:43'),
(319, 58, '5f4b2acf867ef.jpg', '2020-08-29 22:27:59', '2020-08-29 22:28:43'),
(320, 59, '5f4b2bbee254c.jpg', '2020-08-29 22:31:58', '2020-08-29 22:32:55'),
(321, 59, '5f4b2bbeee61c.jpg', '2020-08-29 22:31:58', '2020-08-29 22:32:55'),
(322, 59, '5f4b2bbf52165.jpg', '2020-08-29 22:31:59', '2020-08-29 22:32:55'),
(323, 59, '5f4b2bbf5cd0c.jpg', '2020-08-29 22:31:59', '2020-08-29 22:32:55'),
(324, 59, '5f4b2bbfaa38b.jpg', '2020-08-29 22:31:59', '2020-08-29 22:32:55'),
(325, 59, '5f4b2bbfb7893.jpg', '2020-08-29 22:31:59', '2020-08-29 22:32:55'),
(326, 60, '5f4b2bff27214.jpg', '2020-08-29 22:33:03', '2020-08-29 22:33:45'),
(327, 60, '5f4b2bff4038b.jpg', '2020-08-29 22:33:03', '2020-08-29 22:33:45'),
(328, 60, '5f4b2bffb3e9b.jpg', '2020-08-29 22:33:03', '2020-08-29 22:33:45'),
(329, 60, '5f4b2bffc5894.jpg', '2020-08-29 22:33:03', '2020-08-29 22:33:45'),
(330, 60, '5f4b2c0022c9c.jpg', '2020-08-29 22:33:04', '2020-08-29 22:33:45'),
(331, 60, '5f4b2c003b127.jpg', '2020-08-29 22:33:04', '2020-08-29 22:33:45'),
(333, 61, '5f4b2c4b18612.jpg', '2020-08-29 22:34:19', '2020-08-29 22:35:18'),
(334, 61, '5f4b2c4b18663.jpg', '2020-08-29 22:34:19', '2020-08-29 22:35:18'),
(335, 61, '5f4b2c4b6b852.jpg', '2020-08-29 22:34:19', '2020-08-29 22:35:18'),
(336, 61, '5f4b2c4b6eccf.jpg', '2020-08-29 22:34:19', '2020-08-29 22:35:18'),
(337, 61, '5f4b2c4bc4329.jpg', '2020-08-29 22:34:19', '2020-08-29 22:35:18'),
(338, 61, '5f4b2c4bcd1c6.jpg', '2020-08-29 22:34:19', '2020-08-29 22:35:18'),
(339, 62, '5f4b2c8d416fa.jpg', '2020-08-29 22:35:25', '2020-08-29 22:36:22'),
(340, 62, '5f4b2c8d54c58.jpg', '2020-08-29 22:35:25', '2020-08-29 22:36:22'),
(341, 62, '5f4b2c8d91745.jpg', '2020-08-29 22:35:25', '2020-08-29 22:36:22'),
(342, 62, '5f4b2c8d9cf34.jpg', '2020-08-29 22:35:25', '2020-08-29 22:36:22'),
(343, 62, '5f4b2c8dd7bf6.jpg', '2020-08-29 22:35:25', '2020-08-29 22:36:22'),
(344, 62, '5f4b2c8de3157.jpg', '2020-08-29 22:35:25', '2020-08-29 22:36:22'),
(373, 64, '63f11070e9691.jpg', '2023-02-18 09:52:48', '2023-02-18 09:52:52'),
(375, 66, '63f1115a9391e.jpg', '2023-02-18 09:56:42', '2023-02-18 09:57:54'),
(376, 65, '63f111c1ddfd0.jpg', '2023-02-18 09:58:25', '2023-02-18 09:58:25'),
(377, 67, '63f1120a32b50.jpg', '2023-02-18 09:59:38', '2023-02-18 10:00:30'),
(378, 68, '63f112632c7e7.jpg', '2023-02-18 10:01:07', '2023-02-18 10:01:43'),
(379, 69, '63f1129660dfb.jpg', '2023-02-18 10:01:58', '2023-02-18 10:02:39'),
(380, 70, '63f112e388de5.jpg', '2023-02-18 10:03:15', '2023-02-18 10:03:55'),
(381, 71, '63f113404f0d4.jpg', '2023-02-18 10:04:48', '2023-02-18 10:05:35'),
(382, 72, '63f1137a8dc2e.jpg', '2023-02-18 10:05:46', '2023-02-18 10:06:26'),
(383, 73, '63f11428458f3.jpg', '2023-02-18 10:08:40', '2023-02-18 10:09:20'),
(384, 74, '63f1147214b7b.jpg', '2023-02-18 10:09:54', '2023-02-18 10:10:27'),
(385, 75, '63f1149d9d163.jpg', '2023-02-18 10:10:37', '2023-02-18 10:11:16'),
(386, 76, '63f2062acb2ae.jpg', '2023-02-19 03:21:14', '2023-02-19 03:21:19'),
(387, 77, '63f2067f65bce.jpg', '2023-02-19 03:22:39', '2023-02-19 03:23:18'),
(389, 78, '63f206be062ef.jpg', '2023-02-19 03:23:42', '2023-02-19 03:24:29'),
(391, 79, '63f207130f420.jpg', '2023-02-19 03:25:07', '2023-02-19 03:25:51'),
(392, 80, '63f2074cebbe9.jpg', '2023-02-19 03:26:04', '2023-02-19 03:27:04'),
(393, 81, '63f2079b8df66.jpg', '2023-02-19 03:27:23', '2023-02-19 03:28:06'),
(394, 82, '63f207db8eaf3.jpg', '2023-02-19 03:28:27', '2023-02-19 03:32:20'),
(395, 83, '63f208d857029.jpg', '2023-02-19 03:32:40', '2023-02-19 03:33:15'),
(396, 84, '63f209079e99b.jpg', '2023-02-19 03:33:27', '2023-02-19 03:34:06'),
(397, 85, '63f20934a23ef.jpg', '2023-02-19 03:34:12', '2023-02-19 03:34:59'),
(398, NULL, '6420a604dcb9c.jpg', '2023-03-26 14:07:32', '2023-03-26 14:07:32'),
(399, NULL, '6420a6ce7f5c1.jpg', '2023-03-26 14:10:54', '2023-03-26 14:10:54'),
(400, NULL, '6420a6f0e2964.jpg', '2023-03-26 14:11:28', '2023-03-26 14:11:28'),
(401, NULL, '6420aa944c8fb.jpg', '2023-03-26 14:27:00', '2023-03-26 14:27:00'),
(403, 64, '6420f44a6e61c.jpg', '2023-03-26 19:41:30', '2023-03-26 19:43:15'),
(404, 65, '6420f4e2c4067.jpg', '2023-03-26 19:44:02', '2023-03-26 19:44:35'),
(405, 66, '6420f56a06f56.jpg', '2023-03-26 21:46:18', '2023-03-26 21:46:46'),
(406, 67, '6420f9d09e12f.jpg', '2023-03-26 22:05:04', '2023-03-26 22:05:40'),
(407, 68, '6420fa52e1020.jpg', '2023-03-26 22:07:14', '2023-03-26 22:07:45'),
(408, 69, '6420fa81a5028.jpg', '2023-03-26 22:08:01', '2023-03-26 22:08:56'),
(409, 70, '6420fac3ba612.jpg', '2023-03-26 22:09:07', '2023-03-26 22:09:34'),
(410, 71, '6420fae9c96aa.jpg', '2023-03-26 22:09:45', '2023-03-26 22:10:13'),
(411, 72, '6420fb0e04f21.jpg', '2023-03-26 22:10:22', '2023-03-26 22:10:53'),
(412, 73, '6420fb377b760.jpg', '2023-03-26 22:11:03', '2023-03-26 22:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `billing_country` varchar(255) DEFAULT NULL,
  `billing_fname` varchar(255) DEFAULT NULL,
  `billing_lname` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_email` varchar(255) DEFAULT NULL,
  `billing_number` varchar(255) DEFAULT NULL,
  `shpping_country` varchar(255) DEFAULT NULL,
  `shpping_fname` varchar(255) DEFAULT NULL,
  `shpping_lname` varchar(255) DEFAULT NULL,
  `shpping_address` varchar(255) DEFAULT NULL,
  `shpping_city` varchar(255) DEFAULT NULL,
  `shpping_email` varchar(255) DEFAULT NULL,
  `shpping_number` varchar(255) DEFAULT NULL,
  `total` decimal(11,2) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `gateway_type` varchar(50) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `currency_code_position` varchar(20) DEFAULT NULL,
  `currency_symbol` blob DEFAULT NULL,
  `currency_symbol_position` varchar(20) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `token_no` int(11) DEFAULT NULL,
  `shipping_method` varchar(255) DEFAULT NULL,
  `shipping_charge` decimal(11,2) DEFAULT NULL,
  `postal_code` text DEFAULT NULL,
  `postal_code_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 - post code based delivery enabled, 0 - post code based delivery disabled',
  `payment_status` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `txnid` varchar(255) DEFAULT NULL,
  `charge_id` varchar(255) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `receipt` varchar(100) DEFAULT NULL,
  `order_notes` text DEFAULT NULL,
  `completed` varchar(20) NOT NULL DEFAULT 'no',
  `type` varchar(255) DEFAULT NULL,
  `serving_method` varchar(255) DEFAULT NULL,
  `pick_up_date` varchar(100) DEFAULT NULL,
  `pick_up_time` varchar(100) DEFAULT NULL,
  `waiter_name` varchar(255) DEFAULT NULL,
  `table_number` varchar(20) DEFAULT NULL,
  `tax` decimal(11,2) NOT NULL DEFAULT 0.00,
  `coupon` decimal(11,2) NOT NULL DEFAULT 0.00,
  `delivery_date` varchar(100) DEFAULT NULL,
  `delivery_time_start` varchar(100) DEFAULT NULL,
  `delivery_time_end` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `user_id`, `billing_country`, `billing_fname`, `billing_lname`, `billing_address`, `billing_city`, `billing_email`, `billing_number`, `shpping_country`, `shpping_fname`, `shpping_lname`, `shpping_address`, `shpping_city`, `shpping_email`, `shpping_number`, `total`, `method`, `gateway_type`, `currency_code`, `currency_code_position`, `currency_symbol`, `currency_symbol_position`, `order_number`, `token_no`, `shipping_method`, `shipping_charge`, `postal_code`, `postal_code_status`, `payment_status`, `order_status`, `txnid`, `charge_id`, `invoice_number`, `created_at`, `updated_at`, `receipt`, `order_notes`, `completed`, `type`, `serving_method`, `pick_up_date`, `pick_up_time`, `waiter_name`, `table_number`, `tax`, `coupon`, `delivery_date`, `delivery_time_start`, `delivery_time_end`) VALUES
(458, 15, NULL, 'Benjamin', NULL, NULL, NULL, 'benkzy11332@gmail.com', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '102.00', 'stripe', 'online', 'MYR', 'right', 0x524d, 'left', 'ZKbA-1683256171', 12, NULL, NULL, NULL, 0, 'Pending', 'pending', 'txn_aW7BzoPa1683256171', 'ch_jsk3KosgS1683256171', NULL, '2023-05-05 03:09:31', '2023-05-05 03:09:31', NULL, NULL, 'no', 'website', 'on_table', NULL, NULL, NULL, '1', '0.00', '0.00', NULL, NULL, NULL),
(459, 15, NULL, 'Benjamin', NULL, NULL, NULL, 'benkzy11332@gmail.com', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '102.00', 'paypal', 'online', 'MYR', 'right', 0x524d, 'left', 'WPrG-1683256182', 13, NULL, NULL, NULL, 0, 'Pending', 'pending', NULL, NULL, NULL, '2023-05-05 03:09:42', '2023-05-05 03:09:42', NULL, NULL, 'no', 'website', 'on_table', NULL, NULL, NULL, '1', '0.00', '0.00', NULL, NULL, NULL),
(460, 15, NULL, 'Benjamin', NULL, NULL, NULL, 'benkzy11332@gmail.com', '0123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '102.00', 'Cash On Delivery', 'offline', 'MYR', 'right', 0x524d, 'left', 'AMX4-1683256194', 14, NULL, NULL, NULL, 0, 'Pending', 'pending', 'txn_sdebzSxB1683256194', 'ch_vP5ckFq2s1683256194', NULL, '2023-05-05 03:09:54', '2023-05-05 03:09:54', NULL, NULL, 'no', 'website', 'on_table', NULL, NULL, NULL, '1', '0.00', '0.00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `review` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `push_subscriptions`
--

CREATE TABLE `push_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `subscribable_id` int(11) DEFAULT NULL,
  `subscribable_type` varchar(255) DEFAULT NULL,
  `endpoint` varchar(500) NOT NULL,
  `public_key` varchar(255) DEFAULT NULL,
  `auth_token` varchar(255) DEFAULT NULL,
  `content_encoding` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `push_subscriptions`
--

INSERT INTO `push_subscriptions` (`id`, `subscribable_id`, `subscribable_type`, `endpoint`, `public_key`, `auth_token`, `content_encoding`, `created_at`, `updated_at`) VALUES
(3, 4, 'App\\Models\\Guest', 'https://fcm.googleapis.com/fcm/send/dt--VeNXQpk:APA91bEXROqytusuQiBN-WidokRxoe_IH7kR6Qi6zXD1Ajx-XyQ4EtEoJxg62WwI-j0RFq2xUjBe-Is7h17zlUMntaf4mgCUeDFtLiW98h8xoOfL3ynutkpMHmyqoldRHVZDZGOQY98X', 'BEXtiHSUjJseqePlRDOqeeCDVSFvZdAyI8BupOIw0bIztqWL3W_pduNUd91A-3RzEHIYfmSfKjusX8B0JG1gOdk', 'GsDOuT4NTf6KGQt9RRVq0Q', NULL, '2020-12-26 10:04:17', '2020-12-26 10:04:17'),
(4, 5, 'App\\Models\\Guest', 'https://fcm.googleapis.com/fcm/send/fetLuDtmxNg:APA91bHqqBZBZzCuFd8Ae3hGHo5q972ktIjfZuRzek59nJXiwdn88UBtnuU9IwaxVznCJGxn1SdhlOFZ8sIsGyVBoK-GIm6KCk0iTuvwc1e3o0H4hfunWZe-o98HQpIXpYDAkan0DiAy', 'BBBfXhMcnTWXOPHP4l2UObEUf7RGMkxoOK5_G4nGhLC8kkXcBdMWNcuhxk0BsSIEdw0jWcZTQ_i_569oZDqEnc0', 'k-yJKI5UjvvHbYQACv-Nrw', NULL, '2021-03-24 07:37:03', '2021-03-24 07:37:03'),
(5, 6, 'App\\Models\\Guest', 'https://updates.push.services.mozilla.com/wpush/v2/gAAAAABgXhAyYoUVkJ8ymIaucMN78o9LdNIJ2ZhWATCMTUa79O7Q_6IWuwZlWOkNi33elgKb73GjntPc0ErLR7FF9b0UU0BNiDpJdsEv0uqcGKdNWkiYlAdlmNPaR0rKI8VivAkeCPzjYhykXGdYpXVpR3TxceTSpWBzxivvTpCTLQlUq72QNO8', 'BP6E_WEMY_Gq-nWKfidLIo4fI4kDlWB3XgnAPevTYRa8niS4TB0_OknMpwML1r_i-dWxE69eDU6e_TnUgufsd5E', 'yzcj6vcUg0WgFcQH6kC7kA', NULL, '2021-03-26 11:47:44', '2021-03-26 11:47:44'),
(6, 7, 'App\\Models\\Guest', 'https://fcm.googleapis.com/fcm/send/cmWvhqu3tv8:APA91bFobMGJpxJvuqHpFU7Y5vtVZNcvsykv_So9xDDoCqKLewXINW8QbmIkpha9i7CJZPAoaZjST1cJPnwwa0rbp-VCk8LOWRoxcuIyyUlsOIFCMCOwysBSFZm_1eBbVV9aeyLSENGc', 'BHKiK1CUzfBe51go0MhzpcrTdsa0qaLhyS4v-S-3U7p7piNG31Lv_awN0wHHqn4tK3KMACk1xiBS8d9vB1cgLKI', 'fgFmWWEiO9fQ1m-IDBOW3w', NULL, '2021-04-03 00:02:31', '2021-04-03 00:02:31'),
(7, 8, 'App\\Models\\Guest', 'https://fcm.googleapis.com/fcm/send/eh4uTNYjL8g:APA91bEX1UoNIWd9wkORCAREAofoRcvvbmRdDNMQwd1d-EZ0lbfCU5CUXewaZucNBK81XO0z6h0LnUaBFPHRlEDrUGm90vu_GHDd5lrndy3l6Otqf5i921YWUa-Xwn4i0MSW5uoPAeMQ', 'BMH-f875_KRifObIrwG57s-C4FT-X6NaQ0s8rTDEOK5kxlS_eCYT77cJjM2UsxuR3xAT49H_2ErlUPE1YnRtBUQ', 'x5mQe5dLhNw2H_x6j4jaOA', NULL, '2021-04-16 11:36:28', '2021-04-16 11:36:28'),
(8, 9, 'App\\Models\\Guest', 'https://fcm.googleapis.com/fcm/send/dObB80OmAaw:APA91bFv7cirSdv3z2G0IU7AlDsIylsVt5C2Z3q53ZUNLMlvlOIfQiOshMF-xKknu8706NDLq9PJyhl7eCdOZlzw-pxRrgsW-p2PjU9N1bePkHnYSIPnTp5a4g1N1tDQQQQWNDjy9slX', 'BD6AiJcjC3gwlLEYPJ2WBaozmaxp9-Q2XBtJOa9NvggCIhT2jN-cjkpGJS2uFMudkJJsvaxfQXpuhKjfYYrba3g', 'YywnXPOaIAiGmM_zru-29Q', NULL, '2021-05-06 09:40:57', '2021-05-06 09:40:57'),
(9, 10, 'App\\Models\\Guest', 'https://fcm.googleapis.com/fcm/send/eZKf01giLZc:APA91bH4tmbQ3s4Lv-B9nztPSZW3yd7Y2uXC-60sHsGIhKkOlUxP6oC68n37Vtq-FBk-OlTVlU76weuJ_vrW0BliQoqvrNRb8xstdCONgBIs47-5fgbphTiuONZgUp1nDtX8LfcFM-Iy', 'BB27dE5e2Bm7GTRujTwXihSJFtX1rwSXl1BUgLLWwI3jFdV5m-gvmSmbsVURyhtmbFmJrdUOAB4T8aVXJrUQsVo', 'gl9nLuDpTn82DcL_hIjndw', NULL, '2021-05-23 00:31:34', '2021-05-23 00:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_inputs`
--

CREATE TABLE `reservation_inputs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `type` tinyint(4) DEFAULT NULL COMMENT '1-text, 2-select, 3-checkbox, 4-textarea, 5-datepicker, 6-timepicker',
  `label` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `placeholder` varchar(255) DEFAULT NULL,
  `required` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1 - required, 0 - optional',
  `order_number` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_inputs`
--

INSERT INTO `reservation_inputs` (`id`, `language_id`, `type`, `label`, `name`, `placeholder`, `required`, `order_number`, `created_at`, `updated_at`) VALUES
(17, 177, 1, 'هاتف', 'هاتف', 'أدخل رقم الهاتف', 1, 1, '2020-09-13 04:12:46', '2020-09-13 04:12:46'),
(23, 177, 6, 'زمن', 'زمن', 'أدخل تاريخ الوصول', 1, 2, '2020-09-13 04:36:59', '2020-09-13 04:36:59'),
(24, 177, 5, 'تاريخ', 'تاريخ', 'أدخل تاريخ الوصول', 1, 3, '2020-09-13 08:28:11', '2020-09-13 08:28:11'),
(25, 177, 7, 'شخص', 'شخص', 'أدخل عدد الأشخاص', 1, 4, '2020-09-13 08:28:43', '2020-09-13 08:28:43'),
(30, 176, 1, 'Phone', 'Phone', 'Enter Phone Number', 1, 1, '2021-05-17 05:34:42', '2021-05-21 03:06:02'),
(31, 176, 1, 'Number of Persons', 'Number_of_Persons', 'Enter Number of Persons', 1, 2, '2021-05-17 05:34:53', '2021-05-21 03:06:02'),
(36, 176, 5, 'Check-in Date', 'Check-in_Date', 'Enter Check-in Date', 1, 3, '2021-05-17 05:58:05', '2021-05-17 05:58:05'),
(37, 176, 6, 'Check-in Time', 'Check-in_Time', 'Enter Check-in Time', 1, 4, '2021-05-17 05:58:16', '2021-05-17 05:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_input_options`
--

CREATE TABLE `reservation_input_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_input_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `permissions` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(7, 'Delivery Manager', '[\"Dashboard\",\"Order Management\"]', '2020-09-24 00:13:52', '2021-05-21 05:28:11'),
(8, 'Kitchen Manager', '[\"Dashboard\",\"Table Reservation\",\"Product Management\",\"Order Management\"]', '2020-09-28 11:23:56', '2020-12-31 05:45:18'),
(9, 'Staff', '[\"Dashboard\",\"Order Management\",\"Customers\",\"Product Management\",\"Table Reservation\",\"Table Reservation\",\"Website Pages\",\"Subscribers\"]', '2023-03-27 00:24:15', '2023-05-05 03:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `serving_methods`
--

CREATE TABLE `serving_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `gateways` text DEFAULT NULL,
  `serial_number` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `website_menu` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 - deactive on website menu, 1 - active on website menu',
  `qr_menu` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 - deactive on qr menu, 1 - active on qr menu',
  `qr_payment` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - deactive, 1 - active',
  `pos` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - active for POS, 0 - deactive for POS'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `serving_methods`
--

INSERT INTO `serving_methods` (`id`, `name`, `value`, `gateways`, `serial_number`, `note`, `website_menu`, `qr_menu`, `qr_payment`, `pos`) VALUES
(1, 'On Table', 'on_table', '[\"1\",\"2\",\"3\"]', 1, 'Choose this method, if you are in restaurant', 1, 1, 1, 1),
(2, 'Pick Up', 'pick_up', '[\"1\",\"2\",\"3\"]', 2, 'Choose this, if you want to pick up the food from Restaurant', 1, 1, 1, 1),
(3, 'Home Delivery', 'home_delivery', '[\"1\",\"2\",\"3\"]', 3, 'Choose this, if you want the order to be served at your doorstep.', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `charge` decimal(11,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `title`, `language_id`, `text`, `charge`, `created_at`, `updated_at`) VALUES
(7, 'Within 2 days', 176, 'Come & take a seat in Superv Restaurant', '1.00', '2020-08-30 07:51:46', '2020-12-13 07:16:36'),
(8, 'Within 4 days', 176, 'Come & grab your orders from Superv Restaurant', '2.00', '2020-08-30 07:52:30', '2020-12-13 07:16:23'),
(9, 'Urgent Delivery', 176, 'Order & your order will be arrived to your doorstep', '5.00', '2020-08-30 07:53:51', '2020-12-13 07:15:53'),
(10, 'تناول الطعام في', 177, 'تعال واجلس في مطعم SUPERV', '0.00', '2020-08-30 07:57:04', '2020-08-30 07:57:04'),
(11, 'يبعد', 177, 'تعال واحصل على طلباتك من مطعم Superv Restaurant', '0.00', '2020-08-30 07:57:28', '2020-08-30 07:57:28'),
(12, 'توصيل منزلي', 177, 'اطلب و سيصلك طلبك إلى عتبة داركم', '1.00', '2020-08-30 07:57:52', '2020-08-30 07:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `sitemaps`
--

CREATE TABLE `sitemaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitemap_url` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitemaps`
--

INSERT INTO `sitemaps` (`id`, `sitemap_url`, `filename`, `created_at`, `updated_at`) VALUES
(2, 'http://localhost/superv/without_license/superv-1.2/', 'sitemap5f5e377957033.xml', '2020-09-13 09:15:26', '2020-09-13 09:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_url` varchar(255) DEFAULT NULL,
  `button_text1` varchar(191) DEFAULT NULL,
  `button_url1` varchar(191) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bg_image` varchar(191) DEFAULT NULL,
  `serial_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_color` varchar(255) DEFAULT NULL,
  `text_color` varchar(255) DEFAULT NULL,
  `button_color` varchar(255) DEFAULT NULL,
  `title_font_size` int(11) NOT NULL DEFAULT 60,
  `text_font_size` int(11) NOT NULL DEFAULT 18,
  `button_text_font_size` int(11) NOT NULL DEFAULT 14,
  `button_text1_font_size` int(11) NOT NULL DEFAULT 14
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `language_id`, `text`, `title`, `button_text`, `button_url`, `button_text1`, `button_url1`, `image`, `bg_image`, `serial_number`, `created_at`, `updated_at`, `title_color`, `text_color`, `button_color`, `title_font_size`, `text_font_size`, `button_text_font_size`, `button_text1_font_size`) VALUES
(24, 176, 'Chicken Varavel', 'Chicken Varavel', 'Add to Cart', 'http://localhost/cchoos/cart', 'Book a Table', 'http://localhost/test/reservation/form', '1679882060.jpg', '1679882060.jpg', 3, '2020-08-17 03:49:17', '2023-03-26 21:54:20', 'FFFFFF', 'FFFFFF', 'FFFFFF', 60, 18, 14, 14),
(26, 177, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف', 'برجر كنج برجر دجاج مشوي ...', 'أضف إلى السلة', 'https://megasoft.biz/plusagency/about-us/page', 'احجز طاولة', 'https://megasoft.biz/plusagency/about-us/page', '1597915383.png', '1609328255.jpg', 2, '2020-08-20 03:23:03', '2020-12-30 11:37:35', 'FFFFFF', 'FFFFFF', 'FFFFFF', 60, 18, 14, 14),
(27, 177, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف', 'صب ساندوتش دجاج مشوي مكسيكي ...', 'أضف إلى السلة', 'https://megasoft.biz/plusagency/about-us/page', 'احجز طاولة', 'https://megasoft.biz/plusagency/about-us/page', '1598709117.png', '1609328243.jpg', 3, '2020-08-20 03:23:03', '2020-12-30 11:37:23', 'FFFFFF', 'FFFFFF', 'FFFFFF', 60, 18, 14, 14),
(28, 176, 'Chicken Curry', 'Chicken Curry', 'Add to Cart', 'http://localhost/cchoos/cart', 'Book a Table', 'http://localhost/test/reservation/form', '1679881959.jpg', '1679881959.jpg', 2, '2020-08-20 23:41:41', '2023-03-26 21:53:09', 'FFFFFF', 'FFFFFF', 'FFFFFF', 60, 18, 14, 14),
(29, 176, 'Chicken Tanduri', 'Chicken Tanduri', 'Add to Cart', 'http://localhost/test/cart', 'Book a Table', 'http://localhost/test/reservation/form', '1679881762.jpg', '1679846851.jpg', 1, '2020-08-20 23:41:41', '2023-03-26 21:49:22', 'FFFFFF', 'FFFFFF', 'FFFFFF', 60, 18, 14, 14),
(30, 177, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف', 'بيتزا محمصة دجاج مكسيكي بالجبن', 'أضف إلى السلة', 'https://megasoft.biz/plusagency/about-us/page', 'احجز طاولة', 'https://megasoft.biz/plusagency/about-us/page', '1598708979.png', '1609328232.jpg', 1, '2020-08-29 07:43:18', '2020-12-30 11:37:12', 'FFFFFF', 'FFFFFF', 'FFFFFF', 60, 18, 14, 14);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `icon`, `url`, `serial_number`) VALUES
(1, 'fab fa-facebook-f', 'https://www.facebook.com/', 1),
(2, 'fab fa-twitter', 'https://twitter.com/', 2),
(3, 'fab fa-linkedin-in', 'https://bd.linkedin.com/', 3),
(4, 'fab fa-instagram', 'https://www.instagram.com/', 4),
(5, 'fab fa-dribbble', 'https://dribbble.com/', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'user1@gmail.com', NULL, NULL),
(2, 'user5@gmail.com', NULL, NULL),
(8, 'ben@gmail.com', NULL, NULL),
(9, 'drop_your_cv@plusagency.com', NULL, NULL),
(10, 'user34@gmail.com', NULL, NULL),
(12, 'client@gmail.com', NULL, NULL),
(14, 'user@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_no` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - active, 2 - deactive',
  `qr_image` varchar(100) DEFAULT NULL,
  `color` varchar(50) NOT NULL DEFAULT '000000',
  `size` int(11) NOT NULL DEFAULT 250,
  `style` varchar(50) NOT NULL DEFAULT 'square',
  `eye_style` varchar(50) NOT NULL DEFAULT 'square',
  `margin` int(11) NOT NULL DEFAULT 0,
  `text` varchar(255) DEFAULT NULL,
  `text_color` varchar(50) DEFAULT '000000',
  `text_size` int(11) DEFAULT 15,
  `text_x` int(11) NOT NULL DEFAULT 50,
  `text_y` int(11) NOT NULL DEFAULT 50,
  `image` varchar(50) DEFAULT NULL,
  `image_size` int(11) NOT NULL DEFAULT 20,
  `image_x` int(11) NOT NULL DEFAULT 50,
  `image_y` int(11) NOT NULL DEFAULT 50,
  `type` varchar(50) NOT NULL DEFAULT 'default' COMMENT 'default, image, text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_no`, `status`, `qr_image`, `color`, `size`, `style`, `eye_style`, `margin`, `text`, `text_color`, `text_size`, `text_x`, `text_y`, `image`, `image_size`, `image_x`, `image_y`, `type`) VALUES
(7, 1, 1, '60a926ef3406d.png', '520606', 272, 'square', 'circle', 0, NULL, NULL, NULL, 50, 50, '60a926ea0a451.png', 20, 50, 50, 'text'),
(8, 2, 1, '60a92703adfed.png', '000000', 250, 'square', 'square', 0, NULL, '000000', 15, 50, 50, NULL, 20, 50, 50, 'text'),
(10, 3, 1, '60a9262e62d6b.png', '000000', 250, 'square', 'square', 0, NULL, '000000', 15, 50, 50, NULL, 20, 50, 50, 'default'),
(11, 4, 1, '60a9263865d0b.png', '000000', 250, 'square', 'square', 0, NULL, '000000', 15, 50, 50, NULL, 20, 50, 50, 'default'),
(12, 5, 1, '60a9263ea193e.png', '000000', 250, 'square', 'square', 0, NULL, '000000', 15, 50, 50, NULL, 20, 50, 50, 'default'),
(13, 6, 1, '60a9264514cdb.png', '000000', 250, 'square', 'square', 0, NULL, '000000', 15, 50, 50, NULL, 20, 50, 50, 'default'),
(14, 7, 1, '60a9264bc926e.png', '000000', 250, 'square', 'square', 0, NULL, '000000', 15, 50, 50, NULL, 20, 50, 50, 'default'),
(15, 8, 1, '60a92651a1323.png', '000000', 250, 'square', 'square', 0, NULL, '000000', 15, 50, 50, NULL, 20, 50, 50, 'default'),
(16, 9, 1, '60a92658b0ffd.png', '000000', 250, 'square', 'square', 0, NULL, '000000', 15, 50, 50, NULL, 20, 50, 50, 'default'),
(17, 10, 1, '60a9265ec7cd9.png', '000000', 250, 'square', 'square', 0, NULL, '000000', 15, 50, 50, NULL, 20, 50, 50, 'default'),
(18, 11, 1, '60a9266999054.png', '000000', 250, 'square', 'square', 0, NULL, '000000', 15, 50, 50, NULL, 20, 50, 50, 'default'),
(19, 12, 1, '60a92674c0125.png', '000000', 250, 'square', 'square', 0, NULL, '000000', 15, 50, 50, NULL, 20, 50, 50, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `table_books`
--

CREATE TABLE `table_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fields` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `serial_number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `language_id`, `image`, `comment`, `name`, `rank`, `rating`, `serial_number`, `created_at`, `updated_at`) VALUES
(24, 176, '1597736067.png', 'Donec ac quam non elit hendrerit placerat. Pellentesque a est id diam lacinia convallis. Etiam non quam sit amet odio pharetra lacinia. Donec purus enim, ornare ac imperdiet', 'Emma Watson', 'CEO, PlusAgency', 5, 1, NULL, NULL),
(25, 176, '1597749691.png', 'Donec ac quam non elit hendrerit placerat. Pellentesque a est id diam lacinia convallis. Etiam non quam sit amet odio pharetra lacinia. Donec purus enim, ornare ac imperdiet', 'Amelia Hanna', 'Manager, PlusAgency', 5, 4, NULL, NULL),
(28, 176, '1598692556.png', 'Donec ac quam non elit hendrerit placerat. Pellentesque a est id diam lacinia convallis. Etiam non quam sit amet odio pharetra lacinia. Donec purus enim, ornare ac imperdiet', 'Marcos Reus', 'Software Engineer', 5, 2, NULL, NULL),
(29, 176, '1598692612.png', 'Donec ac quam non elit hendrerit placerat. Pellentesque a est id diam lacinia convallis. Etiam non quam sit amet odio pharetra lacinia. Donec purus enim, ornare ac imperdiet', 'Rebeca Isabella', 'CTO, PlusAgency', 5, 3, NULL, NULL),
(30, 177, '1598772950.png', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام', 'إيما واتسون', 'الرئيس التنفيذي لشركة PlusAgency', 5, 1, NULL, NULL),
(31, 177, '1598772999.png', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام', 'اميليا حنا', 'مدير PlusAgency', 5, 2, NULL, NULL),
(32, 177, '1598773050.png', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام', 'ماركوس ريوس', 'مهندس برمجيات', 5, 3, NULL, NULL),
(33, 177, '1598773091.png', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام', 'ريبيكا إيزابيلا', 'CTO ، PlusAgency', 5, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `country_code` char(3) NOT NULL,
  `timezone` varchar(125) NOT NULL DEFAULT '',
  `gmt_offset` float(10,2) DEFAULT NULL,
  `dst_offset` float(10,2) DEFAULT NULL,
  `raw_offset` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`country_code`, `timezone`, `gmt_offset`, `dst_offset`, `raw_offset`) VALUES
('AD', 'Europe/Andorra', 1.00, 2.00, 1.00),
('AE', 'Asia/Dubai', 4.00, 4.00, 4.00),
('AF', 'Asia/Kabul', 4.50, 4.50, 4.50),
('AG', 'America/Antigua', -4.00, -4.00, -4.00),
('AI', 'America/Anguilla', -4.00, -4.00, -4.00),
('AL', 'Europe/Tirane', 1.00, 2.00, 1.00),
('AM', 'Asia/Yerevan', 4.00, 4.00, 4.00),
('AO', 'Africa/Luanda', 1.00, 1.00, 1.00),
('AQ', 'Antarctica/Casey', 8.00, 8.00, 8.00),
('AQ', 'Antarctica/Davis', 7.00, 7.00, 7.00),
('AQ', 'Antarctica/DumontDUrville', 10.00, 10.00, 10.00),
('AQ', 'Antarctica/Mawson', 5.00, 5.00, 5.00),
('AQ', 'Antarctica/McMurdo', 13.00, 12.00, 12.00),
('AQ', 'Antarctica/Palmer', -3.00, -4.00, -4.00),
('AQ', 'Antarctica/Rothera', -3.00, -3.00, -3.00),
('AQ', 'Antarctica/South_Pole', 13.00, 12.00, 12.00),
('AQ', 'Antarctica/Syowa', 3.00, 3.00, 3.00),
('AQ', 'Antarctica/Vostok', 6.00, 6.00, 6.00),
('AR', 'America/Argentina/Buenos_Aires', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Catamarca', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Cordoba', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Jujuy', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/La_Rioja', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Mendoza', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Rio_Gallegos', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Salta', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/San_Juan', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/San_Luis', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Tucuman', -3.00, -3.00, -3.00),
('AR', 'America/Argentina/Ushuaia', -3.00, -3.00, -3.00),
('AS', 'Pacific/Pago_Pago', -11.00, -11.00, -11.00),
('AT', 'Europe/Vienna', 1.00, 2.00, 1.00),
('AU', 'Antarctica/Macquarie', 11.00, 11.00, 11.00),
('AU', 'Australia/Adelaide', 10.50, 9.50, 9.50),
('AU', 'Australia/Brisbane', 10.00, 10.00, 10.00),
('AU', 'Australia/Broken_Hill', 10.50, 9.50, 9.50),
('AU', 'Australia/Currie', 11.00, 10.00, 10.00),
('AU', 'Australia/Darwin', 9.50, 9.50, 9.50),
('AU', 'Australia/Eucla', 8.75, 8.75, 8.75),
('AU', 'Australia/Hobart', 11.00, 10.00, 10.00),
('AU', 'Australia/Lindeman', 10.00, 10.00, 10.00),
('AU', 'Australia/Lord_Howe', 11.00, 10.50, 10.50),
('AU', 'Australia/Melbourne', 11.00, 10.00, 10.00),
('AU', 'Australia/Perth', 8.00, 8.00, 8.00),
('AU', 'Australia/Sydney', 11.00, 10.00, 10.00),
('AW', 'America/Aruba', -4.00, -4.00, -4.00),
('AX', 'Europe/Mariehamn', 2.00, 3.00, 2.00),
('AZ', 'Asia/Baku', 4.00, 5.00, 4.00),
('BA', 'Europe/Sarajevo', 1.00, 2.00, 1.00),
('BB', 'America/Barbados', -4.00, -4.00, -4.00),
('BD', 'Asia/Dhaka', 6.00, 6.00, 6.00),
('BE', 'Europe/Brussels', 1.00, 2.00, 1.00),
('BF', 'Africa/Ouagadougou', 0.00, 0.00, 0.00),
('BG', 'Europe/Sofia', 2.00, 3.00, 2.00),
('BH', 'Asia/Bahrain', 3.00, 3.00, 3.00),
('BI', 'Africa/Bujumbura', 2.00, 2.00, 2.00),
('BJ', 'Africa/Porto-Novo', 1.00, 1.00, 1.00),
('BL', 'America/St_Barthelemy', -4.00, -4.00, -4.00),
('BM', 'Atlantic/Bermuda', -4.00, -3.00, -4.00),
('BN', 'Asia/Brunei', 8.00, 8.00, 8.00),
('BO', 'America/La_Paz', -4.00, -4.00, -4.00),
('BQ', 'America/Kralendijk', -4.00, -4.00, -4.00),
('BR', 'America/Araguaina', -3.00, -3.00, -3.00),
('BR', 'America/Bahia', -3.00, -3.00, -3.00),
('BR', 'America/Belem', -3.00, -3.00, -3.00),
('BR', 'America/Boa_Vista', -4.00, -4.00, -4.00),
('BR', 'America/Campo_Grande', -3.00, -4.00, -4.00),
('BR', 'America/Cuiaba', -3.00, -4.00, -4.00),
('BR', 'America/Eirunepe', -5.00, -5.00, -5.00),
('BR', 'America/Fortaleza', -3.00, -3.00, -3.00),
('BR', 'America/Maceio', -3.00, -3.00, -3.00),
('BR', 'America/Manaus', -4.00, -4.00, -4.00),
('BR', 'America/Noronha', -2.00, -2.00, -2.00),
('BR', 'America/Porto_Velho', -4.00, -4.00, -4.00),
('BR', 'America/Recife', -3.00, -3.00, -3.00),
('BR', 'America/Rio_Branco', -5.00, -5.00, -5.00),
('BR', 'America/Santarem', -3.00, -3.00, -3.00),
('BR', 'America/Sao_Paulo', -2.00, -3.00, -3.00),
('BS', 'America/Nassau', -5.00, -4.00, -5.00),
('BT', 'Asia/Thimphu', 6.00, 6.00, 6.00),
('BW', 'Africa/Gaborone', 2.00, 2.00, 2.00),
('BY', 'Europe/Minsk', 3.00, 3.00, 3.00),
('BZ', 'America/Belize', -6.00, -6.00, -6.00),
('CA', 'America/Atikokan', -5.00, -5.00, -5.00),
('CA', 'America/Blanc-Sablon', -4.00, -4.00, -4.00),
('CA', 'America/Cambridge_Bay', -7.00, -6.00, -7.00),
('CA', 'America/Creston', -7.00, -7.00, -7.00),
('CA', 'America/Dawson', -8.00, -7.00, -8.00),
('CA', 'America/Dawson_Creek', -7.00, -7.00, -7.00),
('CA', 'America/Edmonton', -7.00, -6.00, -7.00),
('CA', 'America/Glace_Bay', -4.00, -3.00, -4.00),
('CA', 'America/Goose_Bay', -4.00, -3.00, -4.00),
('CA', 'America/Halifax', -4.00, -3.00, -4.00),
('CA', 'America/Inuvik', -7.00, -6.00, -7.00),
('CA', 'America/Iqaluit', -5.00, -4.00, -5.00),
('CA', 'America/Moncton', -4.00, -3.00, -4.00),
('CA', 'America/Montreal', -5.00, -4.00, -5.00),
('CA', 'America/Nipigon', -5.00, -4.00, -5.00),
('CA', 'America/Pangnirtung', -5.00, -4.00, -5.00),
('CA', 'America/Rainy_River', -6.00, -5.00, -6.00),
('CA', 'America/Rankin_Inlet', -6.00, -5.00, -6.00),
('CA', 'America/Regina', -6.00, -6.00, -6.00),
('CA', 'America/Resolute', -6.00, -5.00, -6.00),
('CA', 'America/St_Johns', -3.50, -2.50, -3.50),
('CA', 'America/Swift_Current', -6.00, -6.00, -6.00),
('CA', 'America/Thunder_Bay', -5.00, -4.00, -5.00),
('CA', 'America/Toronto', -5.00, -4.00, -5.00),
('CA', 'America/Vancouver', -8.00, -7.00, -8.00),
('CA', 'America/Whitehorse', -8.00, -7.00, -8.00),
('CA', 'America/Winnipeg', -6.00, -5.00, -6.00),
('CA', 'America/Yellowknife', -7.00, -6.00, -7.00),
('CC', 'Indian/Cocos', 6.50, 6.50, 6.50),
('CD', 'Africa/Kinshasa', 1.00, 1.00, 1.00),
('CD', 'Africa/Lubumbashi', 2.00, 2.00, 2.00),
('CF', 'Africa/Bangui', 1.00, 1.00, 1.00),
('CG', 'Africa/Brazzaville', 1.00, 1.00, 1.00),
('CH', 'Europe/Zurich', 1.00, 2.00, 1.00),
('CI', 'Africa/Abidjan', 0.00, 0.00, 0.00),
('CK', 'Pacific/Rarotonga', -10.00, -10.00, -10.00),
('CL', 'America/Santiago', -3.00, -4.00, -4.00),
('CL', 'Pacific/Easter', -5.00, -6.00, -6.00),
('CM', 'Africa/Douala', 1.00, 1.00, 1.00),
('CN', 'Asia/Chongqing', 8.00, 8.00, 8.00),
('CN', 'Asia/Harbin', 8.00, 8.00, 8.00),
('CN', 'Asia/Kashgar', 8.00, 8.00, 8.00),
('CN', 'Asia/Shanghai', 8.00, 8.00, 8.00),
('CN', 'Asia/Urumqi', 8.00, 8.00, 8.00),
('CO', 'America/Bogota', -5.00, -5.00, -5.00),
('CR', 'America/Costa_Rica', -6.00, -6.00, -6.00),
('CU', 'America/Havana', -5.00, -4.00, -5.00),
('CV', 'Atlantic/Cape_Verde', -1.00, -1.00, -1.00),
('CW', 'America/Curacao', -4.00, -4.00, -4.00),
('CX', 'Indian/Christmas', 7.00, 7.00, 7.00),
('CY', 'Asia/Nicosia', 2.00, 3.00, 2.00),
('CZ', 'Europe/Prague', 1.00, 2.00, 1.00),
('DE', 'Europe/Berlin', 1.00, 2.00, 1.00),
('DE', 'Europe/Busingen', 1.00, 2.00, 1.00),
('DJ', 'Africa/Djibouti', 3.00, 3.00, 3.00),
('DK', 'Europe/Copenhagen', 1.00, 2.00, 1.00),
('DM', 'America/Dominica', -4.00, -4.00, -4.00),
('DO', 'America/Santo_Domingo', -4.00, -4.00, -4.00),
('DZ', 'Africa/Algiers', 1.00, 1.00, 1.00),
('EC', 'America/Guayaquil', -5.00, -5.00, -5.00),
('EC', 'Pacific/Galapagos', -6.00, -6.00, -6.00),
('EE', 'Europe/Tallinn', 2.00, 3.00, 2.00),
('EG', 'Africa/Cairo', 2.00, 2.00, 2.00),
('EH', 'Africa/El_Aaiun', 0.00, 0.00, 0.00),
('ER', 'Africa/Asmara', 3.00, 3.00, 3.00),
('ES', 'Africa/Ceuta', 1.00, 2.00, 1.00),
('ES', 'Atlantic/Canary', 0.00, 1.00, 0.00),
('ES', 'Europe/Madrid', 1.00, 2.00, 1.00),
('ET', 'Africa/Addis_Ababa', 3.00, 3.00, 3.00),
('FI', 'Europe/Helsinki', 2.00, 3.00, 2.00),
('FJ', 'Pacific/Fiji', 13.00, 12.00, 12.00),
('FK', 'Atlantic/Stanley', -3.00, -3.00, -3.00),
('FM', 'Pacific/Chuuk', 10.00, 10.00, 10.00),
('FM', 'Pacific/Kosrae', 11.00, 11.00, 11.00),
('FM', 'Pacific/Pohnpei', 11.00, 11.00, 11.00),
('FO', 'Atlantic/Faroe', 0.00, 1.00, 0.00),
('FR', 'Europe/Paris', 1.00, 2.00, 1.00),
('GA', 'Africa/Libreville', 1.00, 1.00, 1.00),
('GB', 'Europe/London', 0.00, 1.00, 0.00),
('GD', 'America/Grenada', -4.00, -4.00, -4.00),
('GE', 'Asia/Tbilisi', 4.00, 4.00, 4.00),
('GF', 'America/Cayenne', -3.00, -3.00, -3.00),
('GG', 'Europe/Guernsey', 0.00, 1.00, 0.00),
('GH', 'Africa/Accra', 0.00, 0.00, 0.00),
('GI', 'Europe/Gibraltar', 1.00, 2.00, 1.00),
('GL', 'America/Danmarkshavn', 0.00, 0.00, 0.00),
('GL', 'America/Godthab', -3.00, -2.00, -3.00),
('GL', 'America/Scoresbysund', -1.00, 0.00, -1.00),
('GL', 'America/Thule', -4.00, -3.00, -4.00),
('GM', 'Africa/Banjul', 0.00, 0.00, 0.00),
('GN', 'Africa/Conakry', 0.00, 0.00, 0.00),
('GP', 'America/Guadeloupe', -4.00, -4.00, -4.00),
('GQ', 'Africa/Malabo', 1.00, 1.00, 1.00),
('GR', 'Europe/Athens', 2.00, 3.00, 2.00),
('GS', 'Atlantic/South_Georgia', -2.00, -2.00, -2.00),
('GT', 'America/Guatemala', -6.00, -6.00, -6.00),
('GU', 'Pacific/Guam', 10.00, 10.00, 10.00),
('GW', 'Africa/Bissau', 0.00, 0.00, 0.00),
('GY', 'America/Guyana', -4.00, -4.00, -4.00),
('HK', 'Asia/Hong_Kong', 8.00, 8.00, 8.00),
('HN', 'America/Tegucigalpa', -6.00, -6.00, -6.00),
('HR', 'Europe/Zagreb', 1.00, 2.00, 1.00),
('HT', 'America/Port-au-Prince', -5.00, -4.00, -5.00),
('HU', 'Europe/Budapest', 1.00, 2.00, 1.00),
('ID', 'Asia/Jakarta', 7.00, 7.00, 7.00),
('ID', 'Asia/Jayapura', 9.00, 9.00, 9.00),
('ID', 'Asia/Makassar', 8.00, 8.00, 8.00),
('ID', 'Asia/Pontianak', 7.00, 7.00, 7.00),
('IE', 'Europe/Dublin', 0.00, 1.00, 0.00),
('IL', 'Asia/Jerusalem', 2.00, 3.00, 2.00),
('IM', 'Europe/Isle_of_Man', 0.00, 1.00, 0.00),
('IN', 'Asia/Kolkata', 5.50, 5.50, 5.50),
('IO', 'Indian/Chagos', 6.00, 6.00, 6.00),
('IQ', 'Asia/Baghdad', 3.00, 3.00, 3.00),
('IR', 'Asia/Tehran', 3.50, 4.50, 3.50),
('IS', 'Atlantic/Reykjavik', 0.00, 0.00, 0.00),
('IT', 'Europe/Rome', 1.00, 2.00, 1.00),
('JE', 'Europe/Jersey', 0.00, 1.00, 0.00),
('JM', 'America/Jamaica', -5.00, -5.00, -5.00),
('JO', 'Asia/Amman', 2.00, 3.00, 2.00),
('JP', 'Asia/Tokyo', 9.00, 9.00, 9.00),
('KE', 'Africa/Nairobi', 3.00, 3.00, 3.00),
('KG', 'Asia/Bishkek', 6.00, 6.00, 6.00),
('KH', 'Asia/Phnom_Penh', 7.00, 7.00, 7.00),
('KI', 'Pacific/Enderbury', 13.00, 13.00, 13.00),
('KI', 'Pacific/Kiritimati', 14.00, 14.00, 14.00),
('KI', 'Pacific/Tarawa', 12.00, 12.00, 12.00),
('KM', 'Indian/Comoro', 3.00, 3.00, 3.00),
('KN', 'America/St_Kitts', -4.00, -4.00, -4.00),
('KP', 'Asia/Pyongyang', 9.00, 9.00, 9.00),
('KR', 'Asia/Seoul', 9.00, 9.00, 9.00),
('KW', 'Asia/Kuwait', 3.00, 3.00, 3.00),
('KY', 'America/Cayman', -5.00, -5.00, -5.00),
('KZ', 'Asia/Almaty', 6.00, 6.00, 6.00),
('KZ', 'Asia/Aqtau', 5.00, 5.00, 5.00),
('KZ', 'Asia/Aqtobe', 5.00, 5.00, 5.00),
('KZ', 'Asia/Oral', 5.00, 5.00, 5.00),
('KZ', 'Asia/Qyzylorda', 6.00, 6.00, 6.00),
('LA', 'Asia/Vientiane', 7.00, 7.00, 7.00),
('LB', 'Asia/Beirut', 2.00, 3.00, 2.00),
('LC', 'America/St_Lucia', -4.00, -4.00, -4.00),
('LI', 'Europe/Vaduz', 1.00, 2.00, 1.00),
('LK', 'Asia/Colombo', 5.50, 5.50, 5.50),
('LR', 'Africa/Monrovia', 0.00, 0.00, 0.00),
('LS', 'Africa/Maseru', 2.00, 2.00, 2.00),
('LT', 'Europe/Vilnius', 2.00, 3.00, 2.00),
('LU', 'Europe/Luxembourg', 1.00, 2.00, 1.00),
('LV', 'Europe/Riga', 2.00, 3.00, 2.00),
('LY', 'Africa/Tripoli', 2.00, 2.00, 2.00),
('MA', 'Africa/Casablanca', 0.00, 0.00, 0.00),
('MC', 'Europe/Monaco', 1.00, 2.00, 1.00),
('MD', 'Europe/Chisinau', 2.00, 3.00, 2.00),
('ME', 'Europe/Podgorica', 1.00, 2.00, 1.00),
('MF', 'America/Marigot', -4.00, -4.00, -4.00),
('MG', 'Indian/Antananarivo', 3.00, 3.00, 3.00),
('MH', 'Pacific/Kwajalein', 12.00, 12.00, 12.00),
('MH', 'Pacific/Majuro', 12.00, 12.00, 12.00),
('MK', 'Europe/Skopje', 1.00, 2.00, 1.00),
('ML', 'Africa/Bamako', 0.00, 0.00, 0.00),
('MM', 'Asia/Rangoon', 6.50, 6.50, 6.50),
('MN', 'Asia/Choibalsan', 8.00, 8.00, 8.00),
('MN', 'Asia/Hovd', 7.00, 7.00, 7.00),
('MN', 'Asia/Ulaanbaatar', 8.00, 8.00, 8.00),
('MO', 'Asia/Macau', 8.00, 8.00, 8.00),
('MP', 'Pacific/Saipan', 10.00, 10.00, 10.00),
('MQ', 'America/Martinique', -4.00, -4.00, -4.00),
('MR', 'Africa/Nouakchott', 0.00, 0.00, 0.00),
('MS', 'America/Montserrat', -4.00, -4.00, -4.00),
('MT', 'Europe/Malta', 1.00, 2.00, 1.00),
('MU', 'Indian/Mauritius', 4.00, 4.00, 4.00),
('MV', 'Indian/Maldives', 5.00, 5.00, 5.00),
('MW', 'Africa/Blantyre', 2.00, 2.00, 2.00),
('MX', 'America/Bahia_Banderas', -6.00, -5.00, -6.00),
('MX', 'America/Cancun', -6.00, -5.00, -6.00),
('MX', 'America/Chihuahua', -7.00, -6.00, -7.00),
('MX', 'America/Hermosillo', -7.00, -7.00, -7.00),
('MX', 'America/Matamoros', -6.00, -5.00, -6.00),
('MX', 'America/Mazatlan', -7.00, -6.00, -7.00),
('MX', 'America/Merida', -6.00, -5.00, -6.00),
('MX', 'America/Mexico_City', -6.00, -5.00, -6.00),
('MX', 'America/Monterrey', -6.00, -5.00, -6.00),
('MX', 'America/Ojinaga', -7.00, -6.00, -7.00),
('MX', 'America/Santa_Isabel', -8.00, -7.00, -8.00),
('MX', 'America/Tijuana', -8.00, -7.00, -8.00),
('MY', 'Asia/Kuala_Lumpur', 8.00, 8.00, 8.00),
('MY', 'Asia/Kuching', 8.00, 8.00, 8.00),
('MZ', 'Africa/Maputo', 2.00, 2.00, 2.00),
('NA', 'Africa/Windhoek', 2.00, 1.00, 1.00),
('NC', 'Pacific/Noumea', 11.00, 11.00, 11.00),
('NE', 'Africa/Niamey', 1.00, 1.00, 1.00),
('NF', 'Pacific/Norfolk', 11.50, 11.50, 11.50),
('NG', 'Africa/Lagos', 1.00, 1.00, 1.00),
('NI', 'America/Managua', -6.00, -6.00, -6.00),
('NL', 'Europe/Amsterdam', 1.00, 2.00, 1.00),
('NO', 'Europe/Oslo', 1.00, 2.00, 1.00),
('NP', 'Asia/Kathmandu', 5.75, 5.75, 5.75),
('NR', 'Pacific/Nauru', 12.00, 12.00, 12.00),
('NU', 'Pacific/Niue', -11.00, -11.00, -11.00),
('NZ', 'Pacific/Auckland', 13.00, 12.00, 12.00),
('NZ', 'Pacific/Chatham', 13.75, 12.75, 12.75),
('OM', 'Asia/Muscat', 4.00, 4.00, 4.00),
('PA', 'America/Panama', -5.00, -5.00, -5.00),
('PE', 'America/Lima', -5.00, -5.00, -5.00),
('PF', 'Pacific/Gambier', -9.00, -9.00, -9.00),
('PF', 'Pacific/Marquesas', -9.50, -9.50, -9.50),
('PF', 'Pacific/Tahiti', -10.00, -10.00, -10.00),
('PG', 'Pacific/Port_Moresby', 10.00, 10.00, 10.00),
('PH', 'Asia/Manila', 8.00, 8.00, 8.00),
('PK', 'Asia/Karachi', 5.00, 5.00, 5.00),
('PL', 'Europe/Warsaw', 1.00, 2.00, 1.00),
('PM', 'America/Miquelon', -3.00, -2.00, -3.00),
('PN', 'Pacific/Pitcairn', -8.00, -8.00, -8.00),
('PR', 'America/Puerto_Rico', -4.00, -4.00, -4.00),
('PS', 'Asia/Gaza', 2.00, 3.00, 2.00),
('PS', 'Asia/Hebron', 2.00, 3.00, 2.00),
('PT', 'Atlantic/Azores', -1.00, 0.00, -1.00),
('PT', 'Atlantic/Madeira', 0.00, 1.00, 0.00),
('PT', 'Europe/Lisbon', 0.00, 1.00, 0.00),
('PW', 'Pacific/Palau', 9.00, 9.00, 9.00),
('PY', 'America/Asuncion', -3.00, -4.00, -4.00),
('QA', 'Asia/Qatar', 3.00, 3.00, 3.00),
('RE', 'Indian/Reunion', 4.00, 4.00, 4.00),
('RO', 'Europe/Bucharest', 2.00, 3.00, 2.00),
('RS', 'Europe/Belgrade', 1.00, 2.00, 1.00),
('RU', 'Asia/Anadyr', 12.00, 12.00, 12.00),
('RU', 'Asia/Irkutsk', 9.00, 9.00, 9.00),
('RU', 'Asia/Kamchatka', 12.00, 12.00, 12.00),
('RU', 'Asia/Khandyga', 10.00, 10.00, 10.00),
('RU', 'Asia/Krasnoyarsk', 8.00, 8.00, 8.00),
('RU', 'Asia/Magadan', 12.00, 12.00, 12.00),
('RU', 'Asia/Novokuznetsk', 7.00, 7.00, 7.00),
('RU', 'Asia/Novosibirsk', 7.00, 7.00, 7.00),
('RU', 'Asia/Omsk', 7.00, 7.00, 7.00),
('RU', 'Asia/Sakhalin', 11.00, 11.00, 11.00),
('RU', 'Asia/Ust-Nera', 11.00, 11.00, 11.00),
('RU', 'Asia/Vladivostok', 11.00, 11.00, 11.00),
('RU', 'Asia/Yakutsk', 10.00, 10.00, 10.00),
('RU', 'Asia/Yekaterinburg', 6.00, 6.00, 6.00),
('RU', 'Europe/Kaliningrad', 3.00, 3.00, 3.00),
('RU', 'Europe/Moscow', 4.00, 4.00, 4.00),
('RU', 'Europe/Samara', 4.00, 4.00, 4.00),
('RU', 'Europe/Volgograd', 4.00, 4.00, 4.00),
('RW', 'Africa/Kigali', 2.00, 2.00, 2.00),
('SA', 'Asia/Riyadh', 3.00, 3.00, 3.00),
('SB', 'Pacific/Guadalcanal', 11.00, 11.00, 11.00),
('SC', 'Indian/Mahe', 4.00, 4.00, 4.00),
('SD', 'Africa/Khartoum', 3.00, 3.00, 3.00),
('SE', 'Europe/Stockholm', 1.00, 2.00, 1.00),
('SG', 'Asia/Singapore', 8.00, 8.00, 8.00),
('SH', 'Atlantic/St_Helena', 0.00, 0.00, 0.00),
('SI', 'Europe/Ljubljana', 1.00, 2.00, 1.00),
('SJ', 'Arctic/Longyearbyen', 1.00, 2.00, 1.00),
('SK', 'Europe/Bratislava', 1.00, 2.00, 1.00),
('SL', 'Africa/Freetown', 0.00, 0.00, 0.00),
('SM', 'Europe/San_Marino', 1.00, 2.00, 1.00),
('SN', 'Africa/Dakar', 0.00, 0.00, 0.00),
('SO', 'Africa/Mogadishu', 3.00, 3.00, 3.00),
('SR', 'America/Paramaribo', -3.00, -3.00, -3.00),
('SS', 'Africa/Juba', 3.00, 3.00, 3.00),
('ST', 'Africa/Sao_Tome', 0.00, 0.00, 0.00),
('SV', 'America/El_Salvador', -6.00, -6.00, -6.00),
('SX', 'America/Lower_Princes', -4.00, -4.00, -4.00),
('SY', 'Asia/Damascus', 2.00, 3.00, 2.00),
('SZ', 'Africa/Mbabane', 2.00, 2.00, 2.00),
('TC', 'America/Grand_Turk', -5.00, -4.00, -5.00),
('TD', 'Africa/Ndjamena', 1.00, 1.00, 1.00),
('TF', 'Indian/Kerguelen', 5.00, 5.00, 5.00),
('TG', 'Africa/Lome', 0.00, 0.00, 0.00),
('TH', 'Asia/Bangkok', 7.00, 7.00, 7.00),
('TJ', 'Asia/Dushanbe', 5.00, 5.00, 5.00),
('TK', 'Pacific/Fakaofo', 13.00, 13.00, 13.00),
('TL', 'Asia/Dili', 9.00, 9.00, 9.00),
('TM', 'Asia/Ashgabat', 5.00, 5.00, 5.00),
('TN', 'Africa/Tunis', 1.00, 1.00, 1.00),
('TO', 'Pacific/Tongatapu', 13.00, 13.00, 13.00),
('TR', 'Europe/Istanbul', 2.00, 3.00, 2.00),
('TT', 'America/Port_of_Spain', -4.00, -4.00, -4.00),
('TV', 'Pacific/Funafuti', 12.00, 12.00, 12.00),
('TW', 'Asia/Taipei', 8.00, 8.00, 8.00),
('TZ', 'Africa/Dar_es_Salaam', 3.00, 3.00, 3.00),
('UA', 'Europe/Kiev', 2.00, 3.00, 2.00),
('UA', 'Europe/Simferopol', 2.00, 4.00, 4.00),
('UA', 'Europe/Uzhgorod', 2.00, 3.00, 2.00),
('UA', 'Europe/Zaporozhye', 2.00, 3.00, 2.00),
('UG', 'Africa/Kampala', 3.00, 3.00, 3.00),
('UM', 'Pacific/Johnston', -10.00, -10.00, -10.00),
('UM', 'Pacific/Midway', -11.00, -11.00, -11.00),
('UM', 'Pacific/Wake', 12.00, 12.00, 12.00),
('US', 'America/Adak', -10.00, -9.00, -10.00),
('US', 'America/Anchorage', -9.00, -8.00, -9.00),
('US', 'America/Boise', -7.00, -6.00, -7.00),
('US', 'America/Chicago', -6.00, -5.00, -6.00),
('US', 'America/Denver', -7.00, -6.00, -7.00),
('US', 'America/Detroit', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Indianapolis', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Knox', -6.00, -5.00, -6.00),
('US', 'America/Indiana/Marengo', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Petersburg', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Tell_City', -6.00, -5.00, -6.00),
('US', 'America/Indiana/Vevay', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Vincennes', -5.00, -4.00, -5.00),
('US', 'America/Indiana/Winamac', -5.00, -4.00, -5.00),
('US', 'America/Juneau', -9.00, -8.00, -9.00),
('US', 'America/Kentucky/Louisville', -5.00, -4.00, -5.00),
('US', 'America/Kentucky/Monticello', -5.00, -4.00, -5.00),
('US', 'America/Los_Angeles', -8.00, -7.00, -8.00),
('US', 'America/Menominee', -6.00, -5.00, -6.00),
('US', 'America/Metlakatla', -8.00, -8.00, -8.00),
('US', 'America/New_York', -5.00, -4.00, -5.00),
('US', 'America/Nome', -9.00, -8.00, -9.00),
('US', 'America/North_Dakota/Beulah', -6.00, -5.00, -6.00),
('US', 'America/North_Dakota/Center', -6.00, -5.00, -6.00),
('US', 'America/North_Dakota/New_Salem', -6.00, -5.00, -6.00),
('US', 'America/Phoenix', -7.00, -7.00, -7.00),
('US', 'America/Shiprock', -7.00, -6.00, -7.00),
('US', 'America/Sitka', -9.00, -8.00, -9.00),
('US', 'America/Yakutat', -9.00, -8.00, -9.00),
('US', 'Pacific/Honolulu', -10.00, -10.00, -10.00),
('UY', 'America/Montevideo', -2.00, -3.00, -3.00),
('UZ', 'Asia/Samarkand', 5.00, 5.00, 5.00),
('UZ', 'Asia/Tashkent', 5.00, 5.00, 5.00),
('VA', 'Europe/Vatican', 1.00, 2.00, 1.00),
('VC', 'America/St_Vincent', -4.00, -4.00, -4.00),
('VE', 'America/Caracas', -4.50, -4.50, -4.50),
('VG', 'America/Tortola', -4.00, -4.00, -4.00),
('VI', 'America/St_Thomas', -4.00, -4.00, -4.00),
('VN', 'Asia/Ho_Chi_Minh', 7.00, 7.00, 7.00),
('VU', 'Pacific/Efate', 11.00, 11.00, 11.00),
('WF', 'Pacific/Wallis', 12.00, 12.00, 12.00),
('WS', 'Pacific/Apia', 14.00, 13.00, 13.00),
('YE', 'Asia/Aden', 3.00, 3.00, 3.00),
('YT', 'Indian/Mayotte', 3.00, 3.00, 3.00),
('ZA', 'Africa/Johannesburg', 2.00, 2.00, 2.00),
('ZM', 'Africa/Lusaka', 2.00, 2.00, 2.00),
('ZW', 'Africa/Harare', 2.00, 2.00, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `time_frames`
--

CREATE TABLE `time_frames` (
  `id` int(11) NOT NULL,
  `day` varchar(100) DEFAULT NULL,
  `start` varchar(100) DEFAULT NULL,
  `end` varchar(100) DEFAULT NULL,
  `max_orders` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_frames`
--

INSERT INTO `time_frames` (`id`, `day`, `start`, `end`, `max_orders`) VALUES
(1, 'monday', '10:00 AM', '11:00 AM', 20),
(3, 'monday', '02:00 PM', '03:00 PM', 7),
(4, 'wednesday', '10:00 AM', '12:00 PM', 30);

-- --------------------------------------------------------

--
-- Table structure for table `ulinks`
--

CREATE TABLE `ulinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulinks`
--

INSERT INTO `ulinks` (`id`, `language_id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(36, 176, 'Contact', 'https://codecanyon.megasoft.biz/superv/contact', NULL, NULL),
(37, 176, 'Blogs', 'https://codecanyon.megasoft.biz/superv/blogs', NULL, NULL),
(38, 176, 'Team', 'https://codecanyon.megasoft.biz/superv/team', NULL, NULL),
(39, 176, 'Gallery', 'https://codecanyon.megasoft.biz/superv/gallery', NULL, NULL),
(40, 177, 'link 1', 'https://megasoft.biz/alphasoft/', NULL, NULL),
(41, 177, 'link 2', 'https://megasoft.biz/alphasoft/', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `billing_fname` varchar(255) DEFAULT NULL,
  `billing_lname` varchar(255) DEFAULT NULL,
  `billing_photo` varchar(255) DEFAULT NULL,
  `billing_username` varchar(255) DEFAULT NULL,
  `billing_email` varchar(255) DEFAULT NULL,
  `billing_number` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `billing_country` varchar(255) DEFAULT NULL,
  `shpping_fname` varchar(255) DEFAULT NULL,
  `shpping_lname` varchar(255) DEFAULT NULL,
  `shpping_photo` varchar(255) DEFAULT NULL,
  `shpping_username` varchar(255) DEFAULT NULL,
  `shpping_email` varchar(255) DEFAULT NULL,
  `shpping_number` varchar(255) DEFAULT NULL,
  `shpping_city` varchar(255) DEFAULT NULL,
  `shpping_state` varchar(255) DEFAULT NULL,
  `shpping_address` varchar(255) DEFAULT NULL,
  `shpping_country` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `verification_link` text DEFAULT NULL,
  `email_verified` varchar(20) NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `photo`, `username`, `email`, `password`, `number`, `city`, `state`, `address`, `country`, `remember_token`, `billing_fname`, `billing_lname`, `billing_photo`, `billing_username`, `billing_email`, `billing_number`, `billing_city`, `billing_state`, `billing_address`, `billing_country`, `shpping_fname`, `shpping_lname`, `shpping_photo`, `shpping_username`, `shpping_email`, `shpping_number`, `shpping_city`, `shpping_state`, `shpping_address`, `shpping_country`, `status`, `verification_link`, `email_verified`, `created_at`, `updated_at`, `provider`, `provider_id`) VALUES
(13, NULL, NULL, NULL, 'benkzy', 'benkzy2222@gmail.com', '$2y$10$YWFXOzRZjupy08263P8zLumGLMxXRn0Brc8Is4aoH8r6pzhCyb.qO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ben', 'kzy', NULL, NULL, 'benkzy2222@gmail.com', '0123456789', 'New York', 'Florida', 'dcdc\r\ndccd', 'United States', 1, '51fa3ceed1f7317a6bcc1daa4b856268', 'Yes', '2023-03-26 10:44:07', '2023-03-26 13:25:26', NULL, NULL),
(14, NULL, NULL, NULL, 'benkzyw', 'benkzy11332@gmail.com', '$2y$10$Z/qCc4EF7uZ72poTGuiGhO1QYJrK7tTZhQWBfU9XsHfhpPdD6EsIS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'e87eda62d24a6a0b989191ce9ac3775f', 'Yes', '2023-03-27 00:11:47', '2023-03-27 00:12:41', NULL, NULL),
(15, NULL, NULL, NULL, 'benkzy2adsadsdas', 'benkzy11220@gmail.com', '$2y$10$P2RygViAmLrgtWijIW9lWuSrxLY/ZiySmeDf2Bqx5HQQEfCogajJK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '1f53ceedf62e7d7113412e5efab5aab1', 'Yes', '2023-05-05 03:07:20', '2023-05-05 03:08:18', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backups`
--
ALTER TABLE `backups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_extendeds`
--
ALTER TABLE `basic_extendeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_settings`
--
ALTER TABLE `basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guests_endpoint_unique` (`endpoint`);

--
-- Indexes for table `jcategories`
--
ALTER TABLE `jcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offline_gateways`
--
ALTER TABLE `offline_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_times`
--
ALTER TABLE `order_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postal_codes`
--
ALTER TABLE `postal_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postal_codes_language_id_foreign` (`language_id`);

--
-- Indexes for table `pos_payment_methods`
--
ALTER TABLE `pos_payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `push_subscriptions_endpoint_unique` (`endpoint`);

--
-- Indexes for table `reservation_inputs`
--
ALTER TABLE `reservation_inputs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_input_options`
--
ALTER TABLE `reservation_input_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serving_methods`
--
ALTER TABLE `serving_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitemaps`
--
ALTER TABLE `sitemaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_books`
--
ALTER TABLE `table_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`country_code`,`timezone`);

--
-- Indexes for table `time_frames`
--
ALTER TABLE `time_frames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulinks`
--
ALTER TABLE `ulinks`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `backups`
--
ALTER TABLE `backups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `basic_extendeds`
--
ALTER TABLE `basic_extendeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `basic_settings`
--
ALTER TABLE `basic_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `postal_codes`
--
ALTER TABLE `postal_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pos_payment_methods`
--
ALTER TABLE `pos_payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `push_subscriptions`
--
ALTER TABLE `push_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservation_inputs`
--
ALTER TABLE `reservation_inputs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reservation_input_options`
--
ALTER TABLE `reservation_input_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `serving_methods`
--
ALTER TABLE `serving_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sitemaps`
--
ALTER TABLE `sitemaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `table_books`
--
ALTER TABLE `table_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `time_frames`
--
ALTER TABLE `time_frames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ulinks`
--
ALTER TABLE `ulinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `postal_codes`
--
ALTER TABLE `postal_codes`
  ADD CONSTRAINT `postal_codes_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
