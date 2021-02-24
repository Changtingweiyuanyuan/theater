-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021 年 02 月 24 日 17:15
-- 伺服器版本： 10.4.17-MariaDB
-- PHP 版本： 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `theater`
--

-- --------------------------------------------------------

--
-- 資料表結構 `theater_admin`
--

CREATE TABLE `theater_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `theater_admin`
--

INSERT INTO `theater_admin` (`id`, `acc`, `pw`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `theater_heartlog`
--

CREATE TABLE `theater_heartlog` (
  `id` int(11) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL,
  `movie_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `theater_mem`
--

CREATE TABLE `theater_mem` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `heart` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `buycart` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `theater_mem`
--

INSERT INTO `theater_mem` (`id`, `acc`, `pw`, `name`, `email`, `tel`, `heart`, `buycart`) VALUES
(1, 'chel', '12345', '庭瑋', 'yuan097@kimo.com', '0930931022', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `theater_movie`
--

CREATE TABLE `theater_movie` (
  `id` int(11) UNSIGNED NOT NULL,
  `name_c` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_e` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ondate` date NOT NULL,
  `actor` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(11) UNSIGNED NOT NULL,
  `heart` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `theater_movie`
--

INSERT INTO `theater_movie` (`id`, `name_c`, `name_e`, `length`, `level`, `type`, `ondate`, `actor`, `poster`, `background`, `trailer`, `intro`, `sh`, `rank`, `heart`) VALUES
(2, '銀龍出任務', 'Dragon Rider', '91', '普遍級', 'a:2:{i:0;s:9:\"卡通片\";i:1;s:9:\"喜劇片\";}', '2021-02-23', '湯瑪士桑斯特(Thomas Brodie-Sangster)、\r\n費莉絲蒂瓊斯(Felicity Jones)、\r\n派屈克史都華(Patrick Stewart)、\r\n佛萊迪海默爾(Freddie Highmore)', 'dragonRider.jpg', 'dragonRiderB.jpg', 'NULL', '《銀龍出任務》故事描述被龍族包袱困柱而成長的銀龍「飛克」，因人類即將入侵龍族隱居的家園，決定與同住於森林的精靈族兼摯友「黃小玲」挺身行動，尋找傳說中的飛龍聖地-「天堂之境」。兩人誤闖人類世界，以為可以透由「智慧大神－網路」找到線索，沒想到卻認識了意圖不明，自稱「龍騎士」的男孩，一心尋求友好信任的飛克、與對人類充滿不信任的小玲，就這樣與「龍騎士」組隊。不太靠譜的三人搭檔，在廣大的天際，與緊鄰的危機中，勇闖世界盡頭，展開橫跨歐亞非的冒險，向龍族的最後樂土，傳說中的「天堂之境」前進… ', 1, 4, 0),
(3, '湯姆貓與傑利鼠', 'Tom and Jerry', '101', '普遍級', 'a:2:{i:0;s:9:\"卡通片\";i:1;s:9:\"喜劇片\";}', '2021-02-23', '克蘿伊摩蕾茲(Chloe Grace Moretz)、\r\n麥可潘納(Michael Peña)、\r\n鄭肯(Ken Jeong)、\r\n喬丹博爾傑(Jordan Bolger)', 'tomandjerry.jpg', 'tomandjerryB.jpg', 'NULL', '湯姆貓與傑利鼠轉戰大城市，來到紐約展開新生活，並在一間豪華飯店遇上「超殺女」克蘿伊摩蕾茲扮演的飯店新員工。她即將協助舉辦世紀婚禮，而且必須在婚禮前驅逐傑利鼠，於是找到湯姆貓來幫助她，但是計畫當然不是這麼簡單，湯姆貓與傑利鼠這對冤家在飯店裡追追跑跑，展開新的爆笑追逐。', 1, 1, 0),
(4, '我沒有談的那場戀愛', 'I Missed You', '99', '普遍級', 'a:2:{i:0;s:9:\"愛情片\";i:1;s:9:\"喜劇片\";}', '2021-02-23', '吳慷仁、艾怡良、傅孟柏、9m88', 'imissedyou.jpg', 'imissedyouB.jpg', 'NULL', '劇情從「臉書的封鎖名單」展開，探討封鎖一個人，是因為一時任性？還是徹底不願再得知對方的任何消息？封鎖之後，就真的可以忘記嗎？\r\n \r\n男主角吳慷仁顛覆了以往偏愛的嚴肅角色，改以「花形壯美男」的形象詮釋一名桃花滿天的廣告才子，總是嘻皮笑臉的遊戲人間，一出口就是讓人分不清是實話還是玩笑話的人生金句。而在他跌落谷底之際，雖有眾多女友卻無處可歸，只好吃定了臉臭心善的女主角艾怡良，硬是賴在她的人生裡。', 1, 2, 0),
(5, '鬼鄰居', 'The Other Side', '未提供', '限制級', 'a:2:{i:0;s:9:\"驚悚片\";i:1;s:9:\"恐怖片\";}', '2021-02-23', '蒂蓮葛溫(Dilan Gwyn)、萊納斯華格倫(Niklas Jarneheim)', 'theotherside.jpg', 'theothersideB.jpg', 'NULL', '一位父親帶著5歲兒子盧卡斯，還有認識多年的女友席琳一起搬到郊外的別墅，準備展開新的家庭生活。當父親離家上班，隔壁早已荒廢多時、久無人居的屋宅時常傳出神秘的聲響，使人夜不能眠；盧卡斯更時常和不知哪來的「新朋友」對話、玩耍。席琳偶然從鄰居口中得知自己新家的秘密：前屋主入住後小孩失蹤、女主人精神異常因而搬離，席琳這才驚覺自家黑暗處有恐怖形體在騷動…', 1, 7, 0),
(6, '噪反', 'Chaos Walking', '未提供', '輔導級', 'a:2:{i:0;s:9:\"驚悚片\";i:1;s:9:\"科幻片\";}', '2021-02-23', '麥斯米克森(Mads Mikkelsen)、湯姆霍蘭德(Tom Holland)、黛西蕾德莉(Daisy Ridley)、大衛歐洛沃(David Oyelowo)、德米安畢齊(Demián Bichir)、尼克強納斯(Nick Jonas)、辛西婭艾利沃(Cynthia Erivo)', 'chaosWalking.jpg', 'chaosWalkingB.jpg', 'NULL', '描述距今不遠的「近未來」時空，人類移居至的星球飽受「噪音菌」侵害，女人皆已滅亡，男人則可以相互竊聽彼此內心的聲音。一日，少年陶德（湯姆荷蘭德飾）竟遇見一位從天而降的神秘女孩薇拉，兩人身處危機四伏的人類小鎮，為保衛薇拉的安危只得奔走逃亡，卻也意外發現牽動世界安危的暗黑祕密。', 1, 5, 0),
(7, '俘虜', 'Merry Christmas, Mr Lawrence', '123', '輔導級', 'a:1:{i:0;s:9:\"戰爭片\";}', '2021-02-23', '大衛鮑伊(David Bowie)、坂本龍一(Ryuichi Sakamoto)、北野武(Takeshi Kitano)', 'MrLawrenc.jpg', 'MrLawrencB.jpg', 'NULL', '1942年爪哇日軍戰俘營裡，被俘的英軍上校勞倫斯(湯姆康提飾)因熟悉日語，經常擔任日軍與戰俘間的翻譯，減少兩方因觀念差異而造成的衝突，也因此與日方軍官關係不錯。直到某日，戰俘營長官世野井上尉(坂本龍一飾)帶回一名戰俘傑克(大衛鮑伊飾)，傑克狂放不羈又具煽動性的態度讓日軍與戰俘間的關係更為緊張，也讓居於中間的勞倫斯疲於奔命，而世野井與傑克之間隱晦的情愫卻悄悄展開…', 1, 8, 0),
(8, '杏林醫院', 'Hospital', '90', '輔導級', 'a:2:{i:0;s:9:\"驚悚片\";i:1;s:9:\"恐怖片\";}', '2021-02-23', '林柏宏、太保(Tai-Bo)、朱芷瑩、徐立期', 'Hospital.jpg', 'HospitalB.jpg', 'NULL', '由台南最負盛名的法師帶隊，曉玲與妙如，她們各懷目的，義無反顧踏入醫院，曾經在這發生的過往，逐漸湧上眼前。不料，醫院陰氣太重，壓的眾人喘不過氣；無法投胎的怨魂糾纏，生死危在旦夕…', 1, 9, 0),
(9, '女巫們', 'The Witches', '104', '普遍級', 'a:1:{i:0;s:9:\"科幻片\";}', '2021-02-23', '安海瑟威(Anne Hathaway)、奧塔薇亞史班森(Octavia Spencer)、史丹利圖奇(Stanley Tucci)、克里斯洛克(Chris Rock)', 'TheWitches.jpg', 'TheWitchesB.jpg', 'NULL', '這部作品以黑色幽默又暖人心房的手法，述說在1967年年底，有一個孤苦伶仃的男童（賈瑟布魯諾 飾）來到阿拉巴馬州鄉下的迪莫波利斯鎮，去跟他親愛的奶奶（奧塔薇亞史班森 飾）一起住。男孩與奶奶遇到一群神祕、迷人卻又殘忍的女巫，機靈的奶奶很快帶著孫子逃到一處熱鬧的海濱名勝。好巧不巧，就在他們抵達時，世上最厲害的「高階女巫」（安海瑟葳 飾）召集了她在全世界的同伴來到這裡，她們都做了偽裝，要一同展開高階女巫的邪惡計劃。', 1, 3, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `theater_news`
--

CREATE TABLE `theater_news` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `theater_news`
--

INSERT INTO `theater_news` (`id`, `title`, `content`, `tags`, `sh`, `date`) VALUES
(1, '秋冬防疫專案啟動', '出入電影院請佩戴口罩！\r\n影城防疫措施：\r\n員工出勤前均測量體溫、值勤時全程配戴口罩及定時手部清潔\r\n每日定時進行場域消毒並於主要出入口提供手部消毒用品\r\n定時請專案公司消毒所有公共區域', '未佩戴且勸導不聽者，由地方政府柴裁罰新台幣三千以上一萬五以下罰鍰', 1, '2021-02-16'),
(2, '影廳內注意事項', '影廳內、電影正片（含片尾），均禁止拍照、錄音、錄影\r\n任何未經授權之攝錄行為，已觸犯著作權法第91條\r\n最高可處5年有期徒刑\r\n', '檢舉專線0800-016-597', 1, '2021-02-16');

-- --------------------------------------------------------

--
-- 資料表結構 `theater_order`
--

CREATE TABLE `theater_order` (
  `id` int(11) UNSIGNED NOT NULL,
  `num` int(11) UNSIGNED NOT NULL,
  `movie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `moviedate` date NOT NULL,
  `session` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderdate` date NOT NULL,
  `seat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt` int(2) UNSIGNED NOT NULL,
  `food` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `theater_admin`
--
ALTER TABLE `theater_admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `theater_heartlog`
--
ALTER TABLE `theater_heartlog`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `theater_mem`
--
ALTER TABLE `theater_mem`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `theater_movie`
--
ALTER TABLE `theater_movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `theater_news`
--
ALTER TABLE `theater_news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `theater_order`
--
ALTER TABLE `theater_order`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `theater_admin`
--
ALTER TABLE `theater_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `theater_heartlog`
--
ALTER TABLE `theater_heartlog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `theater_mem`
--
ALTER TABLE `theater_mem`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `theater_movie`
--
ALTER TABLE `theater_movie`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `theater_news`
--
ALTER TABLE `theater_news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `theater_order`
--
ALTER TABLE `theater_order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
