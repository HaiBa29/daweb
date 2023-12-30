
INSERT INTO `admin_accounts` (`admin_id`, `username`, `password`) VALUES
(1, 'hiihiihihih', '0'),
(3, 'admin', '123'),
(4, 'hai', '123'),
(5, 'haiba', '123'),
(6, 'hihi', '$2y$10$Crg4E9d9iy9dsJ8Rc29BTOkMj5TF8u7xG59pUbIj0rlQJUl6SSykq'),
(7, 'hsi', '$2y$10$w6bupW5tC0PhqJPAqCNRdOx5J1bCRpXRQFgXFdeaGJoLaL6Rz1UNC'),
(8, 'haii', '$2y$10$Z5p3sySq6QLeeTVw4XpFrOn0JbWXnQKz0MVkDVinYE166qfdMiyIO'),
(9, 'hii', '$2y$10$5FQnQR6dKPDT0Fru5X0exeH1HaRY41vEviDdC1WaD36BbohMxPmHm');


--
-- Cấu trúc bảng cho bảng `bikes`
--

CREATE TABLE `bikes` (
  `bike_id` int(11) NOT NULL,
  `bike_name` varchar(255) NOT NULL,
  `frame` varchar(255) NOT NULL,
  `frame_size` varchar(10) NOT NULL,
  `fork` varchar(255) NOT NULL,
  `derailleur` varchar(255) NOT NULL,
  `brakes` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `discounted_price` decimal(10,2) NOT NULL,
  `sample_image_url` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_description` text DEFAULT NULL,
  `sale` decimal(5,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bikes`
--

INSERT INTO `bikes` (`bike_id`, `bike_name`, `frame`, `frame_size`, `fork`, `derailleur`, `brakes`, `price`, `image_url`, `admin_id`, `vehicle_type`, `discounted_price`, `sample_image_url`, `quantity`, `product_description`, `sale`) VALUES
(1, 'Cannondale Topstone 2', ' SmartForm C2 Alloy', 'X, L, M, X', 'Topstone Carbon', 'FSA Omega AGX+ Alloy, 46/30', 'Shimano GRX 400 hydraulic disc, 160/160mm RT54 rotors', 2450.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2024/SCULTURA_8000_redblk_MY24.tif?p3', NULL, 'Sport bicycle', 2156.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2024/ONE-FORTY_8000_ornblk_MY24.tif?p3', 5, 'Trail riding has evolved a long way in a short space of time, but our ONE-FORTY 8000 represents a radical shift in what such a bike can be expected to do. The lightweight, all-carbon frame has a hyper-modern trail geometry to deliver out-of-this-world climbing performance with utterly planted downhill capability thanks to our test and award-winning sizing system that pairs riders perfectly with the handling they want. Full 29er wheels and Fox Performance suspension plus SRAM GX T-Type wireless drivetrain offer flawless performance to match.', 12.00),
(3, 'eSPRESSO L 775 EQ', 'eSPRESSO L HV EQ', 'M,L , XL', 'MERIDA EXPERT', 'Sunnywheel SW-CG-173A', 'Sunnywheel SW-CG-173A', 200.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-zoom-img//master/bikes/2024/eSPRESSO_L_775_EQ_telblk_MY24.tif?p3', NULL, 'Bicycle racing', 122.00, 'https://www.sefiles.net/images/library/small/roll-bicycle-company-a1r-adventure-road-bike-405431-1.png', 4, 'Getting around the city shouldn\'t be a drag - and with the eSPRESSO L 775 EQ, it never will be. Even if you\'re on your way to work, coming back fully laden from the shops or just off to visit friends, our high-quality aluminium frame paired with the new 85 Nm Shimano EP6 drive unit and extra high-capacity 750 Wh battery will make it easy. The low-maintenance Shimano Nexus hub gear delivers huge gear range options without the complexity of a traditional drivetrain, while hydraulic disc brakes offer predictable power in all conditions.\r\n\r\nThe eSPRESSO L range is the perfect partner for urban riding, offering comfort and practicality. Standard-fit mudguards, lights, lock, rack and kickstand mean you\'re ready to go from the moment you leave the shop. Choose between frames with internally mounted batteries of either 750 Wh, 630 Wh or 504 Wh capacity or a more economical, 504 Wh semi-integrated design. All use a range of powerful Shimano STEPS drive units, with the option of the sporty lightweight EP801 and new, powerful EP6 units. Low step-through frame options on all models help ease mounting and dismounting. Suspension forks offer improved control, while powerful hydraulic disc brakes give reliable and controllable stopping power in all weather conditions. The 700c wheels have wide 50 mm tyres for extra grip and comfort, plus reflective sidewalls strips improve rider safety in low light. Internally routed cables give a sleek look, while a 150 kg maximum system weight means plenty of carrying capacity.', 39.00),
(4, 'Cuda Trace Pavement', 'Lightweight SmartForm', 'X,M,L,XL', 'Low step-through frame option available', 'Short reach alloy brake levers to make pulling the brakes possible', 'Short cranks and lower bottom bracket to help with pedal effiency', 640.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2024/MATTS_J_24_grntrq_MY24.tif?p3', NULL, 'mountainbike', 371.20, 'https://www.cycleking.co.uk/images/products/1/1K/1K1876.png?width=480&height=480&format=jpg&quality=70&scale=both', 3, 'Life can feel awfully busy at times, which is why the eSPRESSO L 500 EQ is designed to get you where you need to go with a minimum of fuss. The latest 85 Nm Shimano EP6 drive unit is paired with a long-lasting 630 Wh battery to give smooth, time-saving pedal-assistance. Whether it\'s getting across town to see friends, commuting to work or carrying the shopping home, it\'s equipped to keep you safe and secure thanks to a long list of standard fit accessories, while a suspension fork delivers extra comfort and control. The smooth Shimano 10-speed drivetrain gives a wide range of gears for all kinds of terrain, while powerful hydraulic disc brakes are low maintenance too.\r\n\r\nThe eSPRESSO L range is the perfect partner for urban riding, offering comfort and practicality. Standard-fit mudguards, lights, lock, rack and kickstand mean you\'re ready to go from the moment you leave the shop. Choose between frames with internally mounted batteries of either 750 Wh, 630 Wh or 504 Wh capacity or a more economical, 504 Wh semi-integrated design. All use a range of powerful Shimano STEPS drive units, with the option of the sporty lightweight EP801 and new, powerful EP6 units. Low step-through frame options on all models help ease mounting and dismounting. Suspension forks offer improved control, while powerful hydraulic disc brakes give reliable and controllable stopping power in all weather conditions. The 700c wheels have wide 50 mm tyres for extra grip and comfort, plus reflective sidewalls strips improve rider safety in low light. Internally routed cables give a sleek look, while a 150 kg maximum system weight means plenty of carrying capacity.', 42.00),
(19, 'REACTO 9000', 'Low step-through frame option available', 'S, M, L', 'Low step-through frame option available', 'DISC COOLER technology', 'MERIDA S-FLEX carbon aero post', 1000.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2024/REACTO_9000_whttel_MY24.tif?p3', NULL, 'Sport bicycle', 1000.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2024/SCULTURA_RIVAL-EDITION_bluslv_MY24.tif?p3', 3, 'Only the latest equipment from SRAM, Reynolds and Continental is good enough to turn our super-light CF5 carbon frame into a top-end aero race machine. Outstanding acceleration and power transfer paired with low weight, impressive aerodynamics, perfect cable integration, and remarkable aero bike comfort set the REACTO 9000 apart from the rest. Racing, long-distance rides or challenging club outings, the REACTO will take your riding to the next level.\r\n\r\nUnadulterated aero road speed. The latest version of the REACTO took the cycling press by storm. A long string of test wins, perfect scores and awards confirm our successful symbiosis of the race-proven DNA of the previous model with the latest trends and technologies. Cycling Weekly calls it \'without doubt one of the most complete bikes available on the market\', Cyclingnews \'an utterly brilliant and faultless machine\' and Cycling Plus were \'hugely impressed\'. From serious racer via enthusiast to the ambitious road rider, the REACTO is a great bike for many people. Its outstanding aerodynamic performance, reduced weight, sharp handling and super quick acceleration makes it the perfect bike for criterium racers and sprinters. At the same time, the class-leading comfort gives it the ability to play out its aerodynamic advantage also on the cobblestones – or the idyllic but potholed littered lanes of your favourite training ride.', 0.00),
(20, 'REACTO 7000\r\n', 'FSA ACR SMR stem/MERIDA EXPERT CW handlebar combination', 'S, M, L', 'SRAM Rival 12-speed eTAP AXS wireless groupset', 'Lightweight CF3 carbon aero frame (approx. 1,150 g - in size M)', 'Smooth 9-speed Shimano drivetrain', 1040.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-zoom-img//master/bikes/2024/REACTO_7000_redblk_MY24.tif?p3', NULL, 'Sport bicycle', 936.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2022/REACTO_TEAM_BAHRAIN_R_MY2022.tif?p3', 10, 'Featuring our MERIDA EXPERT SL45 carbon wheelset and the latest SRAM Rival 12-speed wireless groupset with an integrated power meter, our REACTO 7000 is one of the top aero bikes in our line-up. If you want to win races or just be the fastest out of all your riding friends, this is the bike to get you there. The tyre clearance of up to 30 mm wide tyres and the well-proven MERIDA S-FLEX seat post for maximum comfort and limit fatigue.\r\n\r\nUnadulterated aero road speed. The latest version of the REACTO took the cycling press by storm. A long string of test wins, perfect scores and awards confirm our successful symbiosis of the race-proven DNA of the previous model with the latest trends and technologies. Cycling Weekly calls it \'without doubt one of the most complete bikes available on the market\', Cyclingnews \'an utterly brilliant and faultless machine\' and Cycling Plus were \'hugely impressed\'. From serious racer via enthusiast to the ambitious road rider, the REACTO is a great bike for many people. Its outstanding aerodynamic performance, reduced weight, sharp handling and super quick acceleration makes it the perfect bike for criterium racers and sprinters.', 10.00),
(21, 'eSPRESSO L 500 EQ', 'dqwđqd', 'S,M,L,XL,X', 'Low step-through frame option available', 'Fast-rolling 700c wheels and comfortable, grippy 50 mm tyres', 'Wide range Shimano 10-speed drivetrain', 1200.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-zoom-img//master/bikes/2024/eSPRESSO_L_575_EQ_slvblk_MY24.tif?p3', NULL, 'Bicycle racing', 720.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2022/REACTO_TEAM_BAHRAIN_R_MY2022.tif?p3', 20, 'Life can feel awfully busy at times, which is why the eSPRESSO L 500 EQ is designed to get you where you need to go with a minimum of fuss. The latest 85 Nm Shimano EP6 drive unit is paired with a long-lasting 630 Wh battery to give smooth, time-saving pedal-assistance. Whether it\'s getting across town to see friends, commuting to work or carrying the shopping home, it\'s equipped to keep you safe and secure thanks to a long list of standard fit accessories, while a suspension fork delivers extra comfort and control. The smooth Shimano 10-speed drivetrain gives a wide range of gears for all kinds of terrain, while powerful hydraulic disc brakes are low maintenance too.\r\n\r\nThe eSPRESSO L range is the perfect partner for urban riding, offering comfort and practicality. Standard-fit mudguards, lights, lock, rack and kickstand mean you\'re ready to go from the moment you leave the shop. Choose between frames with internally mounted batteries of either 750 Wh, 630 Wh or 504 Wh capacity or a more economical, 504 Wh semi-integrated design. All use a range of powerful Shimano STEPS drive units, with the option of the sporty lightweight EP801 and new, powerful EP6 units. Low step-through frame options on all models help ease mounting and dismounting. Suspension forks offer improved control, while powerful hydraulic disc brakes give reliable and controllable stopping power in all weather conditions. The 700c wheels have wide 50 mm tyres for extra grip and comfort, plus reflective sidewalls strips improve rider safety in low light. Internally routed cables give a sleek look, while a 150 kg maximum system weight means plenty of carrying capacity.', 40.00),
(23, 'MATTS J. 20+', 'Hydraulic disc brakes', 'S,M,L,Xl', 'Shimano drivetrain', 'Rigid fork helps keep weight down', 'Shimano drivetrain', 100.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-zoom-img//master/bikes/2024/MATTS_J_20_PLUS_grnred_MY24.tif?p3', NULL, 'mountainbike', 80.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-zoom-img//master/bikes/2024/MATTS_J_20_PLUS_grnred_MY24.tif?p3', 10, 'The MATTS J20 Plus is a fat-tyred monster truck that offers the control and grip of chunky 20', 20.00),
(25, 'eSPRESSO 300 EQ SE 504Wh', 'uality Shimano E5000', 'S,M,L,XL,X', 'Lightweight frame with semi-integrated 504 Wh battery', 'Low step-through frame option available', 'Smooth 9-speed Shimano drivetrain', 231.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-zoom-img//master/bikes/2024/eSPRESSO_300_SE_EQ_grnblk_MY24.tif?p3', NULL, 'Bicycle racing', 184.80, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2024/MATTS_J_16_square_prpwht_MY2024.tif?p3', 0, 'The eSPRESSO 300 EQ SE is our high-value city e-bike, with a budget-friendly semi-integrated battery frame paired with equipment that gets the job done without fuss. The Shimano E5000 drive unit offers a reliable helping hand, while the 504 Wh battery gives plenty of range, even when you\'ve loaded up the standard-fit rack. With a smooth 9-speed Shimano drivetrain and powerful but easily controlled hydraulic disc brakes, along with a smooth suspension fork for extra comfort and control, it\'s ready when you are.\r\n\r\nThe eSPRESSO range is the perfect partner for urban riding, offering comfort and practicality. Standard-fit mudguards, lights, lock, rack and kickstand mean you\'re ready to go from the moment you leave the shop. Choose between frames with internally mounted batteries of either 750 Wh, 630 Wh or 504 Wh capacity or a more economical, 504 Wh semi-integrated design. All use a range of powerful Shimano STEPS drive units, with the option of the sporty EP801 motor on some models. Low step-through frame options on all models help ease mounting and dismounting. Suspension forks offer improved control, while powerful hydraulic disc brakes give reliable and controllable stopping power in all weather conditions. TInternally routed cables give a sleek look, while a 150 kg maximum system weight means plenty of carrying capacity.', 20.00),
(26, 'eSPRESSO L 775 EQ\r\n', '142x12 mm axle standard', 'S,M,L', 'Low step-through frame option available', 'DISC COOLER technology', 'MERIDA 8156', 900.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-zoom-img//master/bikes/2024/REACTO_RIVAL-EDITION_cmpblu_MY24.tif?p3', NULL, 'Sport bicycle', 630.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-zoom-img//master/bikes/2024/eSPRESSO_775_EQ_telblk_MY24.tif?p3', 3, 'Built around the latest wireless Rival groupset from SRAM the REACTO RIVAL EDITION takes clean lines to new heights. While all cables already run neatly through the FSA stem and aero carbon frame, the wireless setup doesn\'t even show the slightest stretch of cable near the two derailleurs. Perfect aerodynamics paired with impressive handling and remarkable aero bike comfort make the RIVAL EDITION a true aero bike allrounder.\r\n\r\nUnadulterated aero road speed. The latest version of the REACTO took the cycling press by storm. A long string of test wins, perfect scores and awards confirm our successful symbiosis of the race-proven DNA of the previous model with the latest trends and technologies. Cycling Weekly calls it \'without doubt one of the most complete bikes available on the market\', Cyclingnews \'an utterly brilliant and faultless machine\' and Cycling Plus were \'hugely impressed\'', 30.00),
(27, 'sđá', 'ads', 'x', 'x', 'x', 'x', 12.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2024/ONE-SIXTY_8000_blublk_MY24.tif?p3', NULL, 'dw', 12.00, 'wqw', 2, 'e2', 0.00),
(28, 'qw', 'wqw', 'x', 'wqeqe', 'qew', 'qweqe', 100.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2024/ONE-SIXTY_8000_blublk_MY24.tif?p3', NULL, '12212', 80.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2024/ONE-SIXTY_8000_blublk_MY24.tif?p3', 3, 'w2313', 20.00);

--
-- Bẫy `bikes`
--
DELIMITER $$
CREATE TRIGGER `update_discounted_price_before_insert` BEFORE INSERT ON `bikes` FOR EACH ROW BEGIN
    SET NEW.discounted_price = NEW.price - (NEW.price * CAST(NEW.sale AS DECIMAL(5,2)) / 100);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_discounted_price_before_update` BEFORE UPDATE ON `bikes` FOR EACH ROW BEGIN
    SET NEW.discounted_price = NEW.price - (NEW.price * CAST(NEW.sale AS DECIMAL(5,2)) / 100);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_discounted_price_new` BEFORE INSERT ON `bikes` FOR EACH ROW SET NEW.discounted_price = NEW.price - (NEW.price * CAST(NEW.sale AS DECIMAL(5,2)) / 100)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bike_id` int(11) NOT NULL,
  `bike_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discounted_price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `frame_size` varchar(50) NOT NULL,
  `total_discount` decimal(10,2) GENERATED ALWAYS AS (`discounted_price` * `quantity`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `bike_id`, `bike_name`, `price`, `discounted_price`, `image_url`, `quantity`, `frame_size`) VALUES
(35, 6, 3, 'A:1R Adventure Road Bike', 1190.00, 725.90, 'https://www.sefiles.net/images/library/small/roll-bicycle-company-a1r-adventure-road-bike-405431-1.png', 1, 'M'),
(36, 6, 1, 'Cannondale Topstone 2', 2450.00, 2156.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-card//master/bikes/2024/ONE-FORTY_6000_blured_MY24.tif?p3', 1, 'X'),
(176, 4, 20, 'REACTO 7000\r\n', 1040.00, 936.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-zoom-img//master/bikes/2024/REACTO_7000_redblk_MY24.tif?p3', 1, 'S'),
(177, 4, 26, 'eSPRESSO L 775 EQ\r\n', 900.00, 630.00, 'https://d2lljesbicak00.cloudfront.net/merida-v2/crud-zoom-img//master/bikes/2024/REACTO_RIVAL-EDITION_cmpblu_MY24.tif?p3', 1, 'L');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Cấu trúc bảng cho bảng `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `expiration_datetime` datetime NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `quantity` int(11) NOT NULL DEFAULT 1,
  `percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `code`, `expiration_datetime`, `status`, `quantity`, `percentage`) VALUES
(13, '4hYZ53N3', '2023-02-22 14:22:00', 'Expired', 1, 0.10),
(16, 'waJ1YLIv', '2023-12-29 14:22:00', 'Active', 1, 0.05);

--
-- Bẫy `discount_codes`
--
DELIMITER $$
CREATE TRIGGER `before_insert_discount_codes` BEFORE INSERT ON `discount_codes` FOR EACH ROW BEGIN
    -- Kiểm tra nếu percentage không được cung cấp, không thay đổi gì
    IF NEW.percentage IS NOT NULL THEN
        -- Chia giá trị percentage cho 100 và cập nhật giá trị mới
        SET NEW.percentage = NEW.percentage / 100;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_update_discount_codes` BEFORE UPDATE ON `discount_codes` FOR EACH ROW BEGIN
    -- Kiểm tra nếu percentage không được cung cấp, không thay đổi gì
    IF NEW.percentage IS NOT NULL THEN
        -- Chia giá trị percentage cho 100 và cập nhật giá trị mới
        SET NEW.percentage = NEW.percentage / 100;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `cart_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `note` varchar(255) NOT NULL,
  `approved` int(11) DEFAULT 0,
  `quantity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`cart_id`, `id`, `total_amount`, `payment_status`, `created_at`, `customer_name`, `customer_address`, `customer_phone`, `customer_email`, `payment_method`, `note`, `approved`, `quantity`) VALUES
(113477, 4, 4609.80, 'Pending', '2023-12-24 03:09:05', 'Nguyễn Bá Hải', '29', '2222222222', 'haiba@gmail.com', '', '', 0, '5'),
(113478, 4, 4609.80, 'Pending', '2023-12-24 03:11:41', 'Nguyễn Bá Hải', '29', '2222222222', 'haiba@gmail.com', '', '', 0, '5'),
(113487, 4, 1659.30, 'Pending', '2023-12-28 15:44:57', 'qd', '29', '2222222222', 'haiba@gmail.com', '', '', 0, '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `bike_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `frame_size` varchar(50) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `cart_id`, `user_id`, `bike_id`, `quantity`, `frame_size`, `total_price`) VALUES
(15, NULL, 4, 23, 1, 'Xl', 0.00),
(16, NULL, 4, 1, 1, ' M', 0.00),
(17, NULL, 4, 26, 1, 'M', 0.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`) VALUES
(4, 'dat', '$2y$10$8MitD/ydaGgi.IzI1eMiU.3LFM8LaAzFEPSIVuH0ySzN5BSkfl8Kq', 0),
(6, 'bahai', '$2y$10$lG0Em67PyLvQEZtLYHwOGu/q8H8vMZIpWVxOPDT75WBpAC4mgZf7a', 0),
(7, 'quocdat', '123', 0),
(9, 'haiba', '$2y$10$ETiY4O6Qcy6774o4.RJZAuthPhBmDpZyn343GylinmCS3GCOLmRoi', 0),
(11, 'admin', '$2y$10$DxHfMGKN2Ftr12yqr7M85uItAGi3Tki16vsVeAJOVgRjiLevjtWuK', 1),
(13, 'haihii', '$2y$10$wRVjWrKnL3TArsBh0ahpSeedeJigfX1oRxjGsiQM2YvxEgCxb73Vy', 0),
(14, 'hai', '$2y$10$hghPXKbTJLvx471xPVYd3u/USuD6EJF/vjple.0ez3Q.rcUUDnkp6', 0);

-- --------------------------------------------------------


--
-- Cấu trúc bảng cho bảng `user_favorite_cart`
--

CREATE TABLE `user_favorite_cart` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



--
-- Chỉ mục cho bảng `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`bike_id`),
  ADD KEY `fk_admin` (`admin_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `id` (`user_id`),
  ADD KEY `fk_cart_bike` (`bike_id`);


--
-- Chỉ mục cho bảng `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_users_id` (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `fk_order_details_cart_id` (`cart_id`),
  ADD KEY `fk_bikes_bike_id` (`bike_id`),
  ADD KEY `fk_users_user_id` (`user_id`);


--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


--
-- Chỉ mục cho bảng `user_favorite_cart`
--
ALTER TABLE `user_favorite_cart`
  ADD PRIMARY KEY (`id`,`cart_id`),
  ADD KEY `fk_user_favorite_cart_cart` (`cart_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--


--
-- AUTO_INCREMENT cho bảng `bikes`
--
ALTER TABLE `bikes`
  MODIFY `bike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;


--
-- AUTO_INCREMENT cho bảng `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113488;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;


--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;


--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bikes`
--
ALTER TABLE `bikes`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin_accounts` (`admin_id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_bike` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`bike_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_bikes_bike_id` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`bike_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_details_cart_id` FOREIGN KEY (`cart_id`) REFERENCES `order_details` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
