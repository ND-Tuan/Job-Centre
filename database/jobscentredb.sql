-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: db
-- Thời gian đã tạo: Th7 12, 2023 lúc 02:56 PM
-- Phiên bản máy phục vụ: 8.0.33
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `jobscentredb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `application`
--

CREATE TABLE `application` (
  `apply_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `job_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `career`
--

CREATE TABLE `career` (
  `id` int NOT NULL,
  `career_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `career`
--

INSERT INTO `career` (`id`, `career_name`) VALUES
(1, 'SẢN XUẤT - CHẾ BIẾN'),
(2, 'CƠ KHÍ - KỸ THUẬT'),
(3, 'CÔNG NGHỆ - THÔNG TIN'),
(4, 'BÁO TRÍ - TRUYỀN THÔNG'),
(5, 'LUẬT - NHÂN VĂN'),
(6, 'KINH DOANH - QUẢN LÝ'),
(7, 'KIẾN TRÚC - XÂY DỰNG'),
(8, 'GIAO THÔNG - VẬN TẢI'),
(9, 'SƯ PHẠM'),
(10, 'THƯƠNG NGHIỆP'),
(11, ' DỊCH VỤ'),
(12, 'NGHỆ THUẬT - THẨM MĨ - ĐỒ HỌA'),
(13, 'Y - DƯỢC'),
(14, 'SƯ PHẠM'),
(15, 'KHÁC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` bigint NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `date-of-birth` date NOT NULL,
  `level` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Chưa Xác định',
  `language_level` text COLLATE utf8mb4_general_ci NOT NULL,
  `job-looking` int NOT NULL,
  `career` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `job-name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `exp` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `job-address` text COLLATE utf8mb4_general_ci NOT NULL,
  `turnOnAt` datetime NOT NULL,
  `C_avatar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'avatar.jpg',
  `address` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone_number`, `gender`, `date-of-birth`, `level`, `language_level`, `job-looking`, `career`, `job-name`, `type`, `exp`, `job-address`, `turnOnAt`, `C_avatar`, `address`, `password`) VALUES
(1, 'khách', 'customer@gmail.com', NULL, NULL, '0000-00-00', '', '', 0, '', '', '', '', '', '2023-06-29 23:41:23', 'avatar.jpg', NULL, '$2y$10$blYq4r7hehWYP12h0pKHD.U8Y3aMLouvaMKK2UzsyYSsndAvcdsoC'),
(3, 'Nguyễn Đức Tuân', 'ndtuan888266@gmail.com', '0336416009', 1, '2002-02-02', 'Không có trình độ chuyên môn kỹ thuật', 'Không', 1, 'CÔNG NGHỆ - THÔNG TIN', 'Kĩ sư', 'Toàn thời gian', 'Chưa có kinh nghiệm', '-Hà Đông, Hà Nội', '2023-07-05 18:15:53', 'avatar.jpg', 'xã Đồng Tiến đầu làng thôn Cao Mộc ', '$2y$10$blYq4r7hehWYP12h0pKHD.U8Y3aMLouvaMKK2UzsyYSsndAvcdsoC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer-education`
--

CREATE TABLE `customer-education` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `school-name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `major` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `graduatedOrNot` int NOT NULL,
  `start` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `end` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `edu-description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer-exp`
--

CREATE TABLE `customer-exp` (
  `id` int NOT NULL,
  `custumer_id` int NOT NULL,
  `company-name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `end_or_not` tinyint NOT NULL,
  `start_at` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `end_at` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `exp-description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer-skill`
--

CREATE TABLE `customer-skill` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `skill` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `rate` int NOT NULL,
  `skill-description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employer`
--

CREATE TABLE `employer` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'employer_avatar.jpg',
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `contact_info` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `employer`
--

INSERT INTO `employer` (`id`, `name`, `email`, `password`, `avatar`, `description`, `address`, `contact_info`) VALUES
(1, 'Công ty TRÁCH NHIỆM HỮU HẠN MỘT THÀNH VIÊN ABCDEFGHjk', 'company@gmail.com', '$2y$10$blYq4r7hehWYP12h0pKHD.U8Y3aMLouvaMKK2UzsyYSsndAvcdsoC', 'employer_avatar.jpg', '-Công ty TRÁCH NHIỆM HỮU HẠN MỘT THÀNH VIÊN ABCDEFGH là công ty chuyên ABCDEFG', '-Tầng XX tòa ADCB, số 54 Liễu Giai, Phường Cống Vị, Quận Ba Đình, Thành phố Hà Nội, Việt Nam\r\n', 'company@gmail.com'),
(4, 'Công ty TRÁCH NHIỆM HỮU HẠN A', 'companyA@gmail.com', '$2y$10$blYq4r7hehWYP12h0pKHD.U8Y3aMLouvaMKK2UzsyYSsndAvcdsoC', 'A.jpg', '-Công ty TRÁCH NHIỆM HỮU HẠN A là công ty chuyên kinh doanh trên lĩnh vực thời trang, may mặc công sở', '-Tòa XXX, số 54 , Đường AA, Quận 10, Thành phố Hồ Chí Minh, Việt Nam\n', 'companyA@gmail.com'),
(5, 'Công ty xây dựng Bee', 'companyBee@gmail.com', '$2y$10$blYq4r7hehWYP12h0pKHD.U8Y3aMLouvaMKK2UzsyYSsndAvcdsoC', 'B.jpg', '-Công ty xây dựng Bee là công ty chuyên cung cấp những giải pháp thiết kế, xây dựng chung cư, tòa văn phòng,... ', '-Tòa XXX, số 04 , Đường AA, Quận 4, Thành phố Hồ Chí Minh, Việt Nam\r\n', 'companyBee@gmail.com'),
(6, 'Công ty cổ phần ShE', 'companyC@gmail.com', '$2y$10$blYq4r7hehWYP12h0pKHD.U8Y3aMLouvaMKK2UzsyYSsndAvcdsoC', 'C.jpg', '-Công ty cổ phần ShE chuyên cung cấp sản phẫm mĩ phẫm, nước hoa uy tín, chĩnh hãng được nhập từ nước ngoài...', 'Thành phố Hồ Chí Minh, Việt Nam\r\n', 'companyC@gmail.com'),
(7, 'Công ty Cổ phần Tư vấn và Du học LTP', 'companyD@gmail.com', '$2y$10$blYq4r7hehWYP12h0pKHD.U8Y3aMLouvaMKK2UzsyYSsndAvcdsoC', 'D.jpg', '-Công ty Cổ phần Tư vấn và Du học LTP là công ty tư vấn du học', 'XQF7+CX9, Văn Khê, Khu đô thị Văn Khê, Hà Đông, Hà Nội', 'companyD@gmail.com'),
(8, 'Công ty cổ phần hợp tác Thành Công', 'companyE@gmail.com', '$2y$10$blYq4r7hehWYP12h0pKHD.U8Y3aMLouvaMKK2UzsyYSsndAvcdsoC', 'E.jpg', '-CÔNG TY CỔ PHẦN HỢP TÁC THÀNH CÔNG với Sản phẩm ống nhựa xoắn HDPE Tiến Công là sản phẩm hội tụ bởi chất lượng tin cậy ; giá cả cạnh tranh; dịch vụ chuyên nghiệp', 'CT1 Văn Khê, Khu đô thị Văn Khê, Hà Đông, Hà Nội', 'companyE@gmail.com'),
(9, 'CÔNG TY TNHH HTGOODS QUỐC TẾ', 'companyF@gmail.com', '$2y$10$blYq4r7hehWYP12h0pKHD.U8Y3aMLouvaMKK2UzsyYSsndAvcdsoC', 'F.jpg', '-HTGoods điểm đến tin cậy lĩnh vực Dụng cụ & Thiết bị công nghiệp cao cấp: 100% sản phẩm EU, G7 - Trên 500000 dải sản phẩm - trên 20 thương hiệu mạnh.', 'Số 6-LK218, Khu đô thị Văn Khê, Hà Đông, Hà Nội', 'companyF@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs_list`
--

CREATE TABLE `jobs_list` (
  `ID` int NOT NULL,
  `employer_id` int NOT NULL,
  `career_id` int NOT NULL,
  `job_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `wage` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int NOT NULL,
  `position` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `request` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` date NOT NULL,
  `num-of-apply` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs_list`
--

INSERT INTO `jobs_list` (`ID`, `employer_id`, `career_id`, `job_name`, `wage`, `type`, `num`, `position`, `gender`, `exp`, `job_address`, `job_description`, `request`, `interest`, `register_at`, `deadline`, `num-of-apply`) VALUES
(14, 1, 1, 'Nhân viên Marketing', 'Thỏa thuận', 'Toàn thời gian', 2, 'Nhân viên', 'Không', '1 năm', '      Hà Nội', '- Chủ động liên hệ học viên tiềm năng theo danh sách được cung cấp ổn định hàng ngày qua điện thoại, email, gặp trực tiếp tại văn phòng hoặc tự khai thác\r\n- Chủ động quản lí tốt danh sách học viên tiềm năng được giao\r\n- Tư vấn và thuyết phục khách hàng ký hợp đồng chương trình đào tạo du học của Trung tâm\r\n- Có trách nhiệm đảm bảo các hợp đồng tiềm năng được xử lí kịp thời. Đảm bảo chỉ tiêu theo kế hoạch kinh doanh được đề ra hàng tháng, hàng quý. Báo cáo chính xác, nhanh chóng với quản lí trực tiếp\r\n- Tham gia các dự án phát triển năng suất và tăng chất lượng sale\r\n- Hỗ trợ Marketing trong công tác tổ chức sự kiện\r\n- Thời gian làm việc 5 ngày / tuần', '- Độ tuổi: 22 - 30 tuổi (Nữ)\r\n- Tốt nghiệp cao đẳng/đại học. Chuyên ngành kinh tế, quản trị kinh doanh, quản trị nhà hàng khách sạn là một ưu tiên.\r\n- Có kinh nghiệm tư vấn tuyển sinh chương trình tư vấn du học.\r\n- Giọng nói chuẩn, dễ nghe, truyền cảm.\r\n- Kỹ năng giao tiếp tốt, diễn giải tốt, xử lí tình huống tốt\r\n- Yêu thích kinh doanh, không sợ mạo hiểm, không ngại bị từ chối.\r\n- Làm việc thoải mái dưới áp lực và đáp ứng mục tiêu\r\n- Tích cực, nhiệt tình và đầy năng lượng\r\n- Kỹ năng sử dụng vi tính văn phòng\r\n- Có thể đi làm cuối tuần và nghỉ trong tuần', '- Thu nhập từ 10 - 30 triệu đồng/ tháng\r\n- Thưởng năng suất, thưởng nóng, vinh danh hàng tháng/quý/năm các thành quả công việc theo đúng năng lực\r\n- Đãi ngộ hấp dẫn, tăng theo thâm niên làm việc\r\n- Được làm việc trong môi trường chuyên nghiêp, hiện đại, đồng nghiệp hỗ trợ nhau\r\n- Có điều kiện để phát triển kĩ năng bản thân. Được tham gia các khóa đào tạo tiếng anh miễn phí tại trung tâm\r\n- Cơ hội được đào tạo thành trưởng nhóm hoặc chuyên gia tư vấn sau 6 tháng - 1 năm đối với các chuyên viên tư vấn có thành tích xuất sắc\r\n- Được tham gia các hoạt động ngoại khóa của công ty hàng quý, hàng năm cho tất cả nhân viên\r\n- Được hưởng đầy đủ các phúc lợi theo quy định của Luật Lao động và của công ty.', '2023-05-31 00:00:00', '2023-07-28', 0),
(24, 4, 11, 'Nhân viên tư vấn khách  hàng', 'Thỏa thuận', 'Toàn thời gian', 2, 'Nhân viên', 'Không', '1 năm', '-Tòa XXX, số 54 , Đường AA, Quận 10, Thành phố Hồ Chí Minh, Việt Nam\r\n', '- Tư vấn các loại hình may mặc công \r\n\r\n- Tìm kiếm khách hàng dựa trên data công ty cung cấp.\r\n\r\n- Thời gian làm việc: 21:00 - 07:00. Tính chất công việc chỉ làm ca đêm', '- Độ tuổi: Từ 27-28 tuổi trở lên, có 1 năm kinh nghiệm\r\n\r\n- Làm được ca đêm tại văn phòng\r\n\r\n- Trình độ: Cao đẳng trở lên – Tiếng Anh căn bản\r\n\r\n- Ưu tiên có kinh nghiệm Telesales hoặc Tư vấn viên, nhân viên kinh doanh\r\n\r\n- Có định hướng phát triển sự nghiệp lâu dài.', '- Lương cơ bản: 6.000.000 -> 9.000.000 VNĐ (deal theo năng lực, không áp doanh số) + Hoa hồng + Thưởng tháng/quý.\r\n\r\n- Thu nhập tháng cao (Lương cơ bản + thưởng) không giới hạn, trung bình 20tr - 50tr với nhiều chính sách hoa hồng và thưởng khác nhau.\r\n\r\n- Môi trường làm việc năng động giúp phát triển kiến thức và tiếng Anh rất tốt.\r\n\r\n- Đồng nghiệp thân thiện, luôn sẵn sàng hỗ trợ tất cả thành viên.\r\n\r\n- Nhiều chế độ thưởng thêm hấp dẫn\r\n\r\n- Cơ hội du lịch\r\n\r\n- Các chính sách ưu đãi khác sẽ trao đổi trực tiếp khi phỏng vấn.', '2023-05-31 00:00:00', '2023-07-31', 0),
(25, 5, 7, 'Kiến Trúc Sư Tư Vấn Nội Ngoại Thất', 'Thỏa thuận', 'Toàn thời gian', 1, 'Nhân viên', 'Không', '1 năm', '-Tòa XXX, số 04 , Đường AA, Quận 4, Thành phố Hồ Chí Minh, Việt Nam\r\n', '1 Lập kế hoạch lộ trình các bước triển khai tổng thể cho dự án\r\n\r\n2 Lập hồ sơ khách hàng, tổng hợp hồ sơ thông tin cho Phòng thiết kế triển khai dự án\r\n\r\n3. Giám sát tiến độ thực hiện dự án theo quy định \r\n\r\n4. Tư vấn, lựa chọn vật liệu, trang thiết bị cho khách hàng \r\n\r\n5. Thuyết trình, trình bày phương án thiết kế và tư vấn thuyết phục khách hàng. \r\n\r\n6. Lập hồ sơ dự toán cơ sở \r\n\r\n7. Thực hiện nghiệm thu & quyết toán khách hàng.', '- Có khả năng thẩm mĩ, tư duy thẩm mĩ tốt\r\n\r\n- Kinh nghiệm tối thiểu 01 năm trong lĩnh vực tư vấn thiết kế, kiến trúc, xây dựng, nội thất… \r\n\r\n- Kỹ năng giao tiếp, kĩ năng đàm phán tốt. Luôn vận động, quyết liệt, không ngại việc, ham học hỏi, phát triển bản thân, không ngại đi tỉnh (trong ngày)\r\n\r\n- Có khả năng tư vấn các công trình chung cư trung cấp, biệt thự penhuse là lợi thế. \r\n\r\n- Tốt Nghiệp Đại học/Cao đẳng/trung cấp ngành kiến trúc, thiết kế nội thất/mỹ thuật\r\n\r\n- Sử dụng được các phần mềm: audocad, photoshop, word, PowerPoint ở mức độ cơ bản. Biết sử dụng các phần mềm đồ họa 3D là 1 lợi thế.', '- Mức lương cứng: Từ 10- 15 Triệu/ tháng \r\n\r\n- Hoa hồng: Hoa hồng thiết kế + hoa hồng thi công\r\n\r\n- Thưởng dự án: Quy định theo bảng KPI của từng dự án\r\n\r\n=> Tổng thu nhập: lương + hoa hồng + BHXH: trên 20 triệu. \r\n\r\n- Thưởng hoàn thành công việc theo các đợt Đánh giá của năm\r\n\r\n- Các chế độ khác như đóng BHXH, nghỉ phép, nghỉ lễ tết, hiếu hỉ…theo luật định. Chế độ công đoàn bao gồm: quà sinh nhật, quà trung thu, quà Noel, tết thiếu nhi, các chương trình gắn kết văn hóa như happy lunch hàng tuần, thiện nguyện, du lịch hàng năm...', '2023-05-31 00:00:00', '2023-08-30', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `report_id` int NOT NULL,
  `job_id` int NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `report`
--

INSERT INTO `report` (`report_id`, `job_id`, `create_at`) VALUES
(34, 14, '2023-07-11 05:28:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` bigint NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'avatar.jpg',
  `address` varchar(250) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone_number`, `gender`, `avatar`, `address`, `password`) VALUES
(2, 'tuan', 'admin@gmail.com', '0396396396', 2, 'tuan1681903673.png', 'dsd', '$2y$10$blYq4r7hehWYP12h0pKHD.U8Y3aMLouvaMKK2UzsyYSsndAvcdsoC');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`apply_id`);

--
-- Chỉ mục cho bảng `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer-education`
--
ALTER TABLE `customer-education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `customer-exp`
--
ALTER TABLE `customer-exp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custumer_id` (`custumer_id`);

--
-- Chỉ mục cho bảng `customer-skill`
--
ALTER TABLE `customer-skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jobs_list`
--
ALTER TABLE `jobs_list`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `employer_id` (`employer_id`),
  ADD KEY `career_id` (`career_id`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD UNIQUE KEY `job_id` (`job_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `application`
--
ALTER TABLE `application`
  MODIFY `apply_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `career`
--
ALTER TABLE `career`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `customer-education`
--
ALTER TABLE `customer-education`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `customer-exp`
--
ALTER TABLE `customer-exp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `customer-skill`
--
ALTER TABLE `customer-skill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `jobs_list`
--
ALTER TABLE `jobs_list`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `jobs_list`
--
ALTER TABLE `jobs_list`
  ADD CONSTRAINT `jobs_list_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`),
  ADD CONSTRAINT `jobs_list_ibfk_2` FOREIGN KEY (`career_id`) REFERENCES `career` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
