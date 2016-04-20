-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 04 月 20 日 05:11
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bbs`
--
CREATE DATABASE `bbs` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bbs`;

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
  `introduce` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `createTime` date DEFAULT NULL,
  PRIMARY KEY (`forumID`),
  KEY `manager` (`manager`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `forum`
--

INSERT INTO `forum` (`forumID`, `forumName`, `manager`, `introduce`, `img`, `createTime`) VALUES
(1, '信息学院部落', '博勋', '这里是信息学院部落，欢迎信息学院的孩子们加入', 'xxxy.jpg', '2016-02-28'),
(2, '经管学院部落', '苏', '这里是经管学院', '', '2016-04-10'),
(3, '沸点工作室', '博勋', '这里是沸点工作室，专注web，Android，IOS开发', 'feidian.png', '2016-04-11');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

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
(27, 1, '博勋', '2016-03-08 09:43:19', '赞一个(≧∀≦)ゞ'),
(28, 3, '帅帅的凡哥', '2016-03-10 19:32:07', '傻逼玩意  '),
(29, 6, '博勋', '2016-03-11 00:54:23', '我去'),
(30, 6, '博勋', '2016-03-11 08:51:22', '我要去！'),
(31, 3, '博勋', '2016-03-11 08:52:14', '楼上的你是不是傻'),
(34, 7, '博勋', '2016-03-13 15:35:48', 'https://github-cloud.s3.amazonaws.com/releases/23216272/784ee77a-da47-11e5-8e2f-7e3c4e1fb888.exe?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAISTNZFOVBIJMK3TQ%2F20160313%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20160313T073256Z&X-Amz-Expires=300&X-Amz-Signature=a0b9e86973dbd04c5571363f48c7139ad7d1a2994f16bc64026b07f550ba4188&X-Amz-SignedHeaders=host&actor_id=0&response-content-disposition=attachment%3B%20filename%3DGit-2.7.2-32-bit.exe&response-content-type=application%2Foctet-stream'),
(35, 7, '博勋', '2016-03-13 15:36:48', 'https://github.com/git-for-windows/git/releases/download/v2.7.2.windows.1/Git-2.7.2-32-bit.exe'),
(36, 7, '博勋', '2016-04-10 10:25:57', '按时打算'),
(37, 7, '博勋', '2016-04-10 10:38:33', ''),
(38, 12, '博勋', '2016-04-10 10:45:31', ''),
(39, 2, '博勋', '2016-04-10 10:45:49', '牛逼'),
(40, 14, '博勋', '2016-04-11 12:23:58', '可以可以'),
(41, 16, '博勋', '2016-04-11 12:34:00', '哈哈'),
(42, 23, '博勋', '2016-04-20 12:56:06', '不错不错');

-- --------------------------------------------------------

--
-- 表的结构 `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `topicID` int(11) NOT NULL AUTO_INCREMENT,
  `topicName` varchar(50) DEFAULT NULL,
  `forumID` int(11) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `content` text,
  `zan` varchar(100) NOT NULL,
  `class` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`topicID`),
  KEY `fourmID` (`forumID`),
  KEY `author` (`author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `topic`
--

INSERT INTO `topic` (`topicID`, `topicName`, `forumID`, `author`, `time`, `content`, `zan`, `class`) VALUES
(1, '外媒评出全球50大创新公司 华为再次上榜', 1, '博勋', '2016-03-01 00:00:00', '美国知名商业杂志《Fast Company》最近评出了“全球50大创新公司”，今年排在首位的是新闻聚合网站BuzzFeed，上榜理由是为全球媒体行业带来了革命。\r\n\r\n中国公司华为再次上榜，位居第13位。这也是华为第三次跻身该排行榜，上榜理由是在全球激烈的智能手机竞争中占据了上风。', '4/3/6//1/', '一般贴'),
(2, '吴恩达：人工智能在百度应用超乎预想', 1, '123', '2016-03-01 00:00:00', '“我们没想到会这么快。”2月26日下午，面对媒体的百度首席科学家吴恩达难掩他的兴奋。\r\n\r\n过去一年中，百度在人工智能方面的研发成果，开始被应用到公司内部的各项业务当中，这超出了吴恩达的预想。\r\n\r\n吴恩达出生于1976年，是华裔美国人，2014年5月加盟百度，此前他是斯坦福大学计算机科学系和电子工程系副教授，人工智能实验室主任，是机器学习、特别是深度学习方面的领先学者之一。\r\n\r\n在百度，吴恩达领导的部门是位于美国硅谷的人工智能实验室，位于中国北京的深度学习实验室和百度大数据实验室，这些部门是百度未来科技的核心。2月26日下午，他首次在北京全程使用中文接受媒体专访，介绍百度人工智能的最新进展以及他对未来趋势的看法。\r\n\r\n自动驾驶+语音识别\r\n\r\n“我自己花时间最多的，是人工智能的两个方向：自动驾驶和语音识别。”吴恩达透露。\r\n\r\n人工智能的研究方向有很多，之所以选择这两个方向，他解释，主要是因为他认为这两个方向能够在很大程度上改变人们的生活。自动驾驶可以减少车祸，可以帮人们节省时间去做更多的事情。语音识别，可以改变人与设备交互的方式，这将是颠覆性的改变。\r\n\r\n2015年12月初，百度完成无人驾驶汽车混合道路上路测试，之后于12月4日宣布正式成立自动驾驶事业部，计划三年商用、五年量产。\r\n\r\n2015年底，百度硅谷人工智能实验室（SVAIL）开发出深度语音识别系统（Deep Speech 2，该系统能通过简单学习算法准确的识别英语和汉语，并且转录普通话片段的准确率有时可以超越人类。美国知名期刊《麻省理工科技评论》将语音接口列为2016年十大突破技术，百度最新研究成果DeepSpeech2位列其中。\r\n\r\n吴恩达告诉网易科技，目前在这两个领域，遇到的挑战是如何提高可靠性。\r\n\r\n他解释，在自动驾驶方面，最大的挑战是如何提高安全性。“把安全性从80%提高到99%是容易的，但是从99%提高到99.99%却非常困难。”\r\n\r\n同时，他坦言，2015年底取得的语音识别的成果，只是在转录普通话片段时的准确率有时可以超越人类，但是大段的语言识别却还达不到这个程度。“大段的语音识别的准确率不太好说。要距离近、发音清晰、普通话比较好，才可以识别出来，准确率还要提高。”\r\n\r\n2015年9月的百度世界大会上，吴恩达曾表示：“我相信语音有很大的潜力改变人与设备的交互方式，现在语音识别可能已达到95%的准确度，但要看你的口音等等来定，很多人没意识到95%的准确度到99%的准确度带来的不是量变是质变，是从你偶尔使用语音变到常常使用做到更自然，做到99%准确，将彻底改变人与设备交互，这个技术的进展让我对人与设备全新交互充满信心。”\r\n\r\n“没想到这么快”', '4/3/6/7/1/', '一般贴'),
(3, '求本周四下午二十四节气柱放风筝', 1, '博勋', '2016-03-01 07:31:46', '我是信息学院计科1401黄一凡，本周四下午想去二十四节气柱放风筝，有没有妹子想和我一起去的？请QQ联系我，qq号1060031655', '4/3/6/1/7/9/', '悬赏贴'),
(4, '你的手机何时能升级Win 10 Mobile？名单曝光', 1, '博勋', '2016-03-01 18:24:30', '微软在2月16日面向部分用户推送了Build 10586.107，因为去掉了Preivew的字样，所以应该就是正式版。后经知情人士爆料，Win 10 Mobile仍在小规模内测中，大规模推送仍要滞后一段时间。\r\n现在有消息曝光了Win 10 Mobile正式版的推送时间、机型信息，因尚未得到微软官方确认，仅供参考：\r\n·现在：Lumia 550、Lumia 650、Lumia 950、Lumia 950 XL等预装Win 10 Mobile系统新机已经正常推送中；\r\n·2016年2月-4月：Lumia 430、Lumia 435、Lumia 532、Lumia 535、Lumia 540、Lumia 635、Lumia 640/XL、Lumia 830、Lumia 930、Lumia 1320、HTC One M8、Lumia 1520、Lumia Icon等是第二批；\r\n·2016年3月：Lumia 530可通过Windows刷机工具手动升级；\r\n·2016年4月起：Lumia 520、Lumia 525、Lumia 620、Lumia 625、Lumia 630、Lumia 635、Lumia 720、Lumia 820、Lumia 920、Lumia 925、Lumia 1020是第三批；\r\n·无法升级Win10的机型：HTC 8X、HTC 8S、三星ATIV S、Yezz Billy 4、Yezz Billy 4.7。', '4/3/6/1/', '一般贴'),
(6, '找人去光谷玩', 1, '博勋', '2016-03-11 00:54:15', '没人拉到我自己去', '1/', '悬赏贴'),
(7, '666', 1, '博勋', '2016-03-11 08:53:36', '999999999999', '', '一般贴'),
(8, 'github简明教程', 1, '博勋', '2016-03-13 17:07:48', 'http://www.runoob.com/w3cnote/git-guide.html', '', '一般贴'),
(9, 'Github上如何给别人贡献代码', 1, '博勋', '2016-03-13 22:16:02', 'http://doc.okbase.net/azhuzhu/archive/38704.html', '', '一般贴'),
(10, '团队github', 1, '博勋', '2016-03-24 20:20:26', 'http://m.oschina.net/blog/388577#mobile.qq.com', '1/', '一般贴'),
(11, 'fork后', 1, '博勋', '2016-03-24 22:34:33', 'http://gevin.me/370.html', '1/', '一般贴'),
(12, 'git pull', 1, '博勋', '2016-03-26 15:48:18', 'http://blog.chinaunix.net/uid-10415985-id-4142896.html', '1/', '一般贴'),
(13, '经管第一条', 2, '博勋', '2016-04-11 12:19:10', '实打实大多数的方式', '1/', '一般贴'),
(14, '大家好', 2, '博勋', '2016-04-11 12:23:49', '哈哈今天天气不错', '', '一般贴'),
(15, '不错不错', 1, '博勋', '2016-04-11 12:24:29', '布吉岛', '', '一般贴'),
(16, '沸点加油', 3, '博勋', '2016-04-11 12:33:49', '沸点工作室的孩子们，大家加油呀！', '1/', '一般贴'),
(17, 'git pages', 3, '博勋', '2016-04-11 19:39:18', 'https://pages.github.com/', '', '一般贴'),
(18, '编码规范', 3, '博勋', '2016-04-11 20:01:02', 'http://codeguide.bootcss.com/#html-syntax', '', '一般贴'),
(19, 'Less 简介，如何下载使用，应用实例等等。', 3, '博勋', '2016-04-12 15:03:03', 'http://www.runoob.com/manual/lessguide/', '', '一般贴'),
(20, 'github pages', 3, '博勋', '2016-04-12 16:39:06', 'http://beiyuu.com/github-pages/', '', '一般贴'),
(21, 'ps6', 3, '博勋', '2016-04-13 21:27:06', '链接：http://pan.baidu.com/s/1pKBfhd5 密码：szb7', '', '一般贴'),
(22, '@font-face', 3, '博勋', '2016-04-13 21:29:42', 'http://www.w3cplus.com/content/css3-font-face', '', '一般贴'),
(23, 'jekyll', 3, '博勋', '2016-04-15 22:38:50', 'http://jingyan.baidu.com/article/67508eb4e596e89cca1ce49e.html?st=2&os=0&bd_page_type=1&net_type=2', '', '一般贴');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `sex` varchar(5) DEFAULT NULL COMMENT '性别',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `qq` decimal(15,0) DEFAULT NULL COMMENT 'qq',
  `rank` char(10) DEFAULT NULL COMMENT '等级',
  `nickname` varchar(20) NOT NULL COMMENT '昵称',
  `birthday` date NOT NULL COMMENT '生日',
  `habit` varchar(100) NOT NULL COMMENT '爱好',
  `address` varchar(100) NOT NULL COMMENT '所居地',
  `word` varchar(100) NOT NULL COMMENT '个性签名',
  `introduce` varchar(500) NOT NULL COMMENT '个人简介',
  `img` varchar(100) NOT NULL COMMENT '头像',
  PRIMARY KEY (`username`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `sex`, `email`, `qq`, `rank`, `nickname`, `birthday`, `habit`, `address`, `word`, `introduce`, `img`) VALUES
(5, '123', '123', '男', '123', '123', NULL, '', '0000-00-00', '', '', '', '', ''),
(6, 'test', '1234', '男', '123456789@qq.com', '123456789', NULL, '', '0000-00-00', '', '', '', '', ''),
(1, '博勋', '19970119', '男', '1060031655@qq.com', '1060031655', '99', '', '0000-00-00', '', '', '', '', '1461119229.jpg'),
(9, '帅帅的凡哥', 'spongebob97', '男', '2805141246@qq.com', '2805141246', NULL, '', '0000-00-00', '', '', '', '', ''),
(8, '苏', 'HHXXttxs201418', '女', '862669282@qq.com', '862669282', NULL, '', '0000-00-00', '', '', '', '', '');

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
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`forumID`) REFERENCES `forum` (`forumID`),
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`author`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
