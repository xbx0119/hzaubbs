-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-03-08 07:29:40
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bbs`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` decimal(15,0) DEFAULT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`adminID`, `password`, `email`, `tel`) VALUES
('hyf', '19970119', '1060031655@qq.com', '15927690835');

-- --------------------------------------------------------

--
-- 表的结构 `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `forumID` int(11) NOT NULL AUTO_INCREMENT,
  `forumName` varchar(20) DEFAULT NULL,
  `manager` varchar(50) DEFAULT NULL,
  `createTime` date DEFAULT NULL,
  PRIMARY KEY (`forumID`),
  KEY `manager` (`manager`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `forum`
--

INSERT INTO `forum` (`forumID`, `forumName`, `manager`, `createTime`) VALUES
(1, '信息学院讨论区', '博勋', '2016-02-28');

-- --------------------------------------------------------

--
-- 表的结构 `response`
--

CREATE TABLE IF NOT EXISTS `response` (
  `responseID` int(11) NOT NULL AUTO_INCREMENT,
  `topicID` int(11) NOT NULL,
  `responser` varchar(50) DEFAULT NULL,
  `resTime` datetime DEFAULT NULL,
  `resContent` text,
  PRIMARY KEY (`responseID`),
  KEY `topicID` (`topicID`),
  KEY `responser` (`responser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `response`
--

INSERT INTO `response` (`responseID`, `topicID`, `responser`, `resTime`, `resContent`) VALUES
(1, 4, '123', '2016-03-03 11:29:39', '借助RealSense，英特尔能够给设备加入更多的视觉功能。其3D摄像头元件最初只是用来提升PC，如让用户能够通过手势控制游戏中的动作，又或者用于在现实世界追踪和测量物体和距离。'),
(2, 4, '博勋', '2016-03-03 08:30:31', 'Wall Street Forensics首席分析师麦特·马格里斯（Matt Margolis）估计，英特尔在该领域的收购和投资总额超过3亿美元，可能最高达到5亿美元。该公司没有公布这方面的数据。'),
(3, 4, '博勋', '2016-03-03 09:21:38', '在CEO科再奇（Brian Krzanich）的领导下，英特尔一直在为可穿戴运动追踪设备、智能珠宝、无人机等新市场开发元件。增强现实同样也是一大商机，相关设备不仅仅需要该公司的微处理器，还需要专门的图像处理芯片和3D摄像头元件。'),
(4, 3, '博勋', '2016-03-06 12:03:14', '哈哈哈'),
(5, 3, '博勋', '2016-03-06 12:03:48', '我去'),
(6, 4, '博勋', '2016-03-06 12:03:13', '444'),
(7, 3, '博勋', '2016-03-06 12:03:23', '测试时间'),
(8, 3, '博勋', '2016-03-06 00:54:30', '测试时间222'),
(9, 2, '博勋', '2016-03-06 00:54:55', '不错不错'),
(10, 2, '博勋', '2016-03-06 00:56:05', '不错不错哈哈哈'),
(11, 2, '博勋', '2016-03-06 00:57:12', '再试一次'),
(12, 1, '博勋', '2016-03-07 16:32:57', 'asdas'),
(13, 1, '博勋', '2016-03-07 19:13:12', '可以可以'),
(14, 1, '博勋', '2016-03-07 19:14:46', '6翻了'),
(15, 1, '博勋', '2016-03-07 19:15:11', '6666666'),
(16, 2, '博勋', '2016-03-07 19:19:49', '可以可以'),
(17, 1, '123', '2016-03-08 14:22:00', 'hahah');

-- --------------------------------------------------------

--
-- 表的结构 `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `topicID` int(11) NOT NULL AUTO_INCREMENT,
  `topicName` varchar(50) DEFAULT NULL,
  `fourmID` int(11) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `content` text,
  `zan` varchar(100) NOT NULL,
  `class` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`topicID`),
  KEY `fourmID` (`fourmID`),
  KEY `author` (`author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `topic`
--

INSERT INTO `topic` (`topicID`, `topicName`, `fourmID`, `author`, `time`, `content`, `zan`, `class`) VALUES
(1, '外媒评出全球50大创新公司 华为再次上榜', 1, '博勋', '2016-03-01 00:00:00', '美国知名商业杂志《Fast Company》最近评出了“全球50大创新公司”，今年排在首位的是新闻聚合网站BuzzFeed，上榜理由是为全球媒体行业带来了革命。\r\n\r\n中国公司华为再次上榜，位居第13位。这也是华为第三次跻身该排行榜，上榜理由是在全球激烈的智能手机竞争中占据了上风。', '4/3/6/1/', '一般贴'),
(2, '吴恩达：人工智能在百度应用超乎预想', 1, '123', '2016-03-01 00:00:00', '“我们没想到会这么快。”2月26日下午，面对媒体的百度首席科学家吴恩达难掩他的兴奋。\r\n\r\n过去一年中，百度在人工智能方面的研发成果，开始被应用到公司内部的各项业务当中，这超出了吴恩达的预想。\r\n\r\n吴恩达出生于1976年，是华裔美国人，2014年5月加盟百度，此前他是斯坦福大学计算机科学系和电子工程系副教授，人工智能实验室主任，是机器学习、特别是深度学习方面的领先学者之一。\r\n\r\n在百度，吴恩达领导的部门是位于美国硅谷的人工智能实验室，位于中国北京的深度学习实验室和百度大数据实验室，这些部门是百度未来科技的核心。2月26日下午，他首次在北京全程使用中文接受媒体专访，介绍百度人工智能的最新进展以及他对未来趋势的看法。\r\n\r\n自动驾驶+语音识别\r\n\r\n“我自己花时间最多的，是人工智能的两个方向：自动驾驶和语音识别。”吴恩达透露。\r\n\r\n人工智能的研究方向有很多，之所以选择这两个方向，他解释，主要是因为他认为这两个方向能够在很大程度上改变人们的生活。自动驾驶可以减少车祸，可以帮人们节省时间去做更多的事情。语音识别，可以改变人与设备交互的方式，这将是颠覆性的改变。\r\n\r\n2015年12月初，百度完成无人驾驶汽车混合道路上路测试，之后于12月4日宣布正式成立自动驾驶事业部，计划三年商用、五年量产。\r\n\r\n2015年底，百度硅谷人工智能实验室（SVAIL）开发出深度语音识别系统（Deep Speech 2，该系统能通过简单学习算法准确的识别英语和汉语，并且转录普通话片段的准确率有时可以超越人类。美国知名期刊《麻省理工科技评论》将语音接口列为2016年十大突破技术，百度最新研究成果DeepSpeech2位列其中。\r\n\r\n吴恩达告诉网易科技，目前在这两个领域，遇到的挑战是如何提高可靠性。\r\n\r\n他解释，在自动驾驶方面，最大的挑战是如何提高安全性。“把安全性从80%提高到99%是容易的，但是从99%提高到99.99%却非常困难。”\r\n\r\n同时，他坦言，2015年底取得的语音识别的成果，只是在转录普通话片段时的准确率有时可以超越人类，但是大段的语言识别却还达不到这个程度。“大段的语音识别的准确率不太好说。要距离近、发音清晰、普通话比较好，才可以识别出来，准确率还要提高。”\r\n\r\n2015年9月的百度世界大会上，吴恩达曾表示：“我相信语音有很大的潜力改变人与设备的交互方式，现在语音识别可能已达到95%的准确度，但要看你的口音等等来定，很多人没意识到95%的准确度到99%的准确度带来的不是量变是质变，是从你偶尔使用语音变到常常使用做到更自然，做到99%准确，将彻底改变人与设备交互，这个技术的进展让我对人与设备全新交互充满信心。”\r\n\r\n“没想到这么快”', '4/3/6/1/', '一般贴'),
(3, '求本周四下午二十四节气柱放风筝', 1, '博勋', '2016-03-01 07:31:46', '我是信息学院计科1401黄一凡，本周四下午想去二十四节气柱放风筝，有没有妹子想和我一起去的？请QQ联系我，qq号1060031655', '4/3/6/1/', '悬赏贴'),
(4, '你的手机何时能升级Win 10 Mobile？名单曝光', 1, '博勋', '2016-03-01 18:24:30', '微软在2月16日面向部分用户推送了Build 10586.107，因为去掉了Preivew的字样，所以应该就是正式版。后经知情人士爆料，Win 10 Mobile仍在小规模内测中，大规模推送仍要滞后一段时间。\r\n现在有消息曝光了Win 10 Mobile正式版的推送时间、机型信息，因尚未得到微软官方确认，仅供参考：\r\n·现在：Lumia 550、Lumia 650、Lumia 950、Lumia 950 XL等预装Win 10 Mobile系统新机已经正常推送中；\r\n·2016年2月-4月：Lumia 430、Lumia 435、Lumia 532、Lumia 535、Lumia 540、Lumia 635、Lumia 640/XL、Lumia 830、Lumia 930、Lumia 1320、HTC One M8、Lumia 1520、Lumia Icon等是第二批；\r\n·2016年3月：Lumia 530可通过Windows刷机工具手动升级；\r\n·2016年4月起：Lumia 520、Lumia 525、Lumia 620、Lumia 625、Lumia 630、Lumia 635、Lumia 720、Lumia 820、Lumia 920、Lumia 925、Lumia 1020是第三批；\r\n·无法升级Win10的机型：HTC 8X、HTC 8S、三星ATIV S、Yezz Billy 4、Yezz Billy 4.7。', '4/3/6/1/', '一般贴');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `sex` varchar(5) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `qq` decimal(15,0) DEFAULT NULL,
  `rank` char(10) DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `sex`, `email`, `qq`, `rank`) VALUES
(5, '123', '123', '男', '123', '123', NULL),
(6, 'test', '1234', '男', '123456789@qq.com', '123456789', NULL),
(1, '博勋', '19970119', '男', '1060031655@qq.com', '1060031655', '99');

--
-- 限制导出的表
--

--
-- 限制表 `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`manager`) REFERENCES `user` (`username`);

--
-- 限制表 `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`topicID`) REFERENCES `topic` (`topicID`),
  ADD CONSTRAINT `response_ibfk_2` FOREIGN KEY (`responser`) REFERENCES `user` (`username`);

--
-- 限制表 `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`fourmID`) REFERENCES `forum` (`forumID`),
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`author`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
