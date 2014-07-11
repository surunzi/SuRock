-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2014 at 03:07 下午
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `surock`
--

-- --------------------------------------------------------

--
-- Table structure for table `association`
--

CREATE TABLE IF NOT EXISTS `association` (
  `key` varchar(50) NOT NULL COMMENT '键',
  `value` text COMMENT '值',
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='存储社团基本信息，键值对';

--
-- Dumping data for table `association`
--

INSERT INTO `association` (`key`, `value`) VALUES
('association_intro', '学生会成立以来，一直遵循“自我教育、自我管理、自我服务”的三自原则。至今已经承办了多次大型的校园活动：从近年来承办的艺术节（14届），科技节（8届），科技文化节（8届），创业计划竞赛（5届），以及诗歌节、校园文明服务月、“索华奖”、“世纪木棉”学术系列讲座、“木棉花开”艺术博览、“校园之声”生活论坛、“STEP BY STEP”原创文学排行榜、美食节等一系列活动，并且配合我校成功承办了第八届"挑战杯"全国大学生课外学术科技作品竞赛、“广汽杯”第三届中国高校大学生汽车知识大奖赛等全国性学生竞赛活动。同时，学生会CI识别系统、激励制度、培训体系等内部组织建设也取得了成效。'),
('association_name', '华南理工大学学生会'),
('contact_email', '670785827@qq.co'),
('contact_phone', '13570225489');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dep_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `dep_name` varchar(45) NOT NULL COMMENT '部门名称',
  `dep_info` text COMMENT '部门介绍',
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='部门' AUTO_INCREMENT=13 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`, `dep_info`) VALUES
(8, '办公室', '本会的信息枢纽，负责本会的日常行政事务，负责指导各学院学生分会秘书部开展各项工作，负责科技文化节、红旗学生分会的评选及《年鉴》编写等重要工作。'),
(9, '调研部', '本会的智囊团，负责研究、论证、贯彻和落实学生会发展规划，并致力于通过调研来收集系统、客观的信息资讯，为学生会等学生组织、学校相关部门以及广大的华工人更好地做出决策提供有力的支持。'),
(10, '公共关系部', '是以处理公共关系为主要职能的部门，它既是学生会与外部沟通的桥梁，也是协调学生会内部联系的纽带。公关部主要为校内各项活动寻求社会赞助，负责协调整个学生会系统之间的关系，塑造学生会的良好形象。'),
(11, '女生工作部', '旨在服务女生，通过统筹送水队、女生小贴士等来关注华工女生的生活。在每年的3月份举办男女生交流节，11月份举办女生节，为男女生交流创建平台。'),
(12, '权益部', '维护学生权益，组织各种维权活动，开展不定期专项调研，宣传和推广有关维权的法律及相关知识，代表广大学生与学校职能部门进行沟通，建立学生与学校沟通桥梁。');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `doc_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `doc_name` varchar(200) NOT NULL COMMENT '位置兼名称，日期+名称',
  `doc_created` datetime NOT NULL COMMENT '上传日期',
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文档表' AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `msg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `msg_name` varchar(45) DEFAULT NULL,
  `msg_email` varchar(100) DEFAULT NULL,
  `msg_content` varchar(500) DEFAULT NULL,
  `msg_created` datetime NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='留言板' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `msg_name`, `msg_email`, `msg_content`, `msg_created`) VALUES
(4, 'Lisa', 'qianlisa@hotmail.com', '[你好，我们是香港中文大学的学生，需要去贵校做问卷调查，请问有没有联络方式？我们想问一下周三通识课的上课时间。]', '2014-07-11 15:42:47'),
(5, 'Tara', 'chenkj@live.com', '您好！我是香港中文大学传播学院新媒体系学生。我们一个课题小组在做媒体研究，希望在贵校做问卷调查并得到学生会协助，请问该怎么联系你们？', '2014-07-11 15:43:19'),
(6, '深圳八马茶业', '103622931@qq.com', '你好，我是深圳市八马茶业连锁有限公司的，我司想与贵校合作策划一场产品设计赛的活动，可否提供联系方式？谢谢', '2014-07-11 15:43:58'),
(7, '1lsfd', 'surunzi1992@gmail.com', 'fdsfsdf ds', '2014-07-11 16:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `news_title` varchar(100) NOT NULL,
  `news_content` text NOT NULL,
  `news_created` datetime NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_content`, `news_created`) VALUES
(2, '【校学生会】你的感动我的梦——记“七色的彩虹 榜样的力量”华南理工大学学生工作创先争优“标杆工程”之“招商地产”2014年“十大感动华园大学生年度人物”评选活动颁奖典礼', '<p><img src="http://su.100steps.net/2007/attachment/news/800/news-20140621mV0qUc7X.jpg" alt="" /></p>\n<p>6月15日晚，“七色的彩虹 榜样的力量”华南理工大学学生工作创先争优“标杆工程”之“招商地产”2014年“十大感动华园大学生年度人物”评选活动颁奖典礼在五山校区海丽文体中心举行。本次活动共表彰了十名感动华园大学生年度评选获奖个人/团体，一个感动华园年度评选特别奖团体以及九名感动华园提名奖获得者。</p>\n<p>获得2011年教育部高校校园文化建设优秀成果一等奖的“标杆工程”项目包括：“十大三好学生标兵”、“十大杰出辅导员班主任”、“十大感动华园人物”、“十大优秀学生党员、共青团员”、“十大先进班集体”、“十大特色学生社团”、“十大卓越创新创业团队”。作为“标杆工程”的重头戏，感动华园年度人物评选已成为华工师生一年一度的“心灵收成”。</p>\n<p>电力学院2011级热能一班32名同学，当得知班上的董建鑫同学被查出急性淋巴性白血病后，在当晚紧急成立“关爱建鑫”小组，分为了“募捐组”、“血液组”、“新闻组”、“账目公开组”等。同学们有条不紊的忙碌着，不仅在短短的20多天中募集到了近60万元的善款，还建立了华工“血库”，让建鑫得以顺利进行治疗。</p>\n<p>黎瑞鑫，计算机科学与工程学院2011级本科生。作为在华工为数不多的台湾学生之一，他身体力行，促进两岸青年之间的交流与合作。参与创办了华工海外游学协会，举办多场台湾游学分享会。负责接待来华工交换学习的台湾交换生，使他们更好地融入在大陆的学习与生活中。他不仅仅只是搭建了一座桥梁，更通过自己的以身作则影响更多人一起为两岸学生交流做出努力。</p>\n<p>陈明，国际教育学院2011级博士研究生。被辅导员老师称为“从事留学生管理工作7年间见过的最为勤奋好学的学生”，他没有辜负祖国巴基斯坦的期望。读博期间在大环化合物的合成化学机理上取得突破并在化学类一区的顶级期刊发表论文，他没有愧对自己不分节假日在实验室日夜工作的辛劳。</p>\n<p>梁广文，土木与交通学院2011级本科生。独自完成百公里徒步，在运动场跑完99圈，广州马拉松全程……只是因为喜欢奔跑的感觉。他说人生就像马拉松，每前进一步都是自己努力的结果，差一步也到不了终点。正是凭着这执着的人生态度，他跑过一棒又一棒，从义工队队长、工程管理学社会长，到党建工作委员会常委。从华南理工大学一等奖学金，国家励志奖学金，再到第五届全国高等院校BIM建模大赛专项一等奖、全能二等奖，一步又一步，他享受着人生的马拉松。</p>\n<p>还有与死神插肩而过，深感生命的美好与宝贵的爱笑女孩郝静怡；兼顾家庭和工作，无畏生活的种种刁难的好男人刘升建；兄弟同心，携笔从戎的国防生标兵陈校、陈焕；克服年级专业之间的隔阂，日夜工作近两年只为实现心中的节能环保梦的中国国际太阳能十项全能竞赛华南理工大学代表队；创作了许多优秀的曲艺、音乐，成为学校历史上第一个能连续三年蝉联文艺花会一等奖的多面手申艺杰；家境平凡，但是对自己要求不平凡的体坛常胜将军刘英；有心去帮于是用心去做，最奢望的回报就是获助者的笑容的心光志愿队。他们用自己的言行践行青春梦想的宣言，汇集成我们心中感动的源泉。</p>\n<p>获得这一殊荣的，都是普通人，都是我们身边的同学，朋友。没有人是为了今天的荣誉而选择自己独特的生活。他们不知不觉中，做出了不平凡的举动，只是因为忠于自己的内心，缘于自己的追求。榜样的价值，从来都不是为了塑造一座座光芒四射可供膜拜的雕像。感动华园人物的真正意义和价值，在于激活校园内的正能量，在于唤醒每个人内心那深深的渴望与向往。当我们穿梭在各间教室里埋头于各种作业中，抱怨着繁重的课业和琐碎的烦恼时，我们身边正有人为了科研报告上的一点瑕疵而一遍遍改进，正有人为了下个月的用度而辗转于各种兼职，正有人克服重重阻碍紧紧团结在一起向同一个目标努力。更多时候，我们应该按下时间的暂停键，静静审视自己：我们想要什么？我们将要成为什么？</p>\n<p>今天，让我们为这些感动华园的人物致敬，也为奔流于每个人内心的梦想致敬。因为有了这些人物的存在，这个学校才有感动；因为有了大多数的梦想的奔涌，这个国家的未来才能充满希望。今天，我们接受精神史诗的洗礼，明天让我们每个人都遵从内心的信念，缔造属于自己的感动！</p>', '2014-07-11 15:38:37'),
(3, '【材料】青春不散场——记材料科学与工程学院2014年毕业宴', '<p><img src="http://su.100steps.net/2007/attachment/news/800/news-20140706uT7ldob0.jpg" alt="" /></p>\n<p><img src="http://su.100steps.net/2007/attachment/news/800/news-20140706sRtLVVQD.jpg" alt="" /></p>\n<p>2014年6月20日，在一场亲切温馨的毕业生交流会落下帷幕之后，热闹非凡的毕业宴也就在西湖苑一楼如约举行。材料科学党委马强书记，院长彭俊彪老师等院领导出席了毕业宴并给予毕业生亲切问候。 </p>\n<p>    五点半，毕业生陆续进场了，整个西湖苑一楼顿时沸腾起来。座位以班级为单位安排，相信对于大部分毕业生来说，这可能是最后一次在校期间的班级聚餐。这将会转化为最宝贵的回忆存留在青春的记忆里。 </p>\n<p>    首先，马强书记致辞，代表材料学院给予毕业生们祝福和慰问。随后，一道道美味佳肴上桌，聚餐正式开始了。看着一桌桌美味的佳肴和一张张满意的笑脸，这个毕业餐也同时预祝各位毕业生吃好喝好走好。聚餐本就是国人最常用的联系感情、交流感情的方式。在这临近毕业各奔东西之际，一场毕业餐给予了毕业生一个共叙同窗之情的机会，必会使大家终生难忘。 </p>\n<p>    在聚餐期间，学院领导和老师还走到每一桌的同学中间去，与他们共饮并亲切地给予祝福，将毕业宴的气氛推到了最高潮。同样，学院领导和老师也对今日的工作人员表示感谢。从学院领导无微不至的关怀中可见，学院对毕业生的重视和关心。 </p>\n<p>   七点左右，毕业宴也陆续结束了，正如鲜艳的横幅上所写，祝同学们：学业有成，前程似锦。这是母校对毕业生最深切的祝福，也是毕业宴的精髓所在。 </p>\n<p align="center">【材院历史由大家书写，材院精彩由我们记录，记者团竭诚为您服务】</p>', '2014-07-11 16:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE IF NOT EXISTS `notify` (
  `notify_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `notify_title` varchar(100) NOT NULL COMMENT '标题',
  `notify_content` text NOT NULL COMMENT '内容',
  `notify_created` datetime NOT NULL COMMENT '创建日期',
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`notify_id`, `notify_title`, `notify_content`, `notify_created`) VALUES
(15, '华南理工大学学生会二○一三年度优秀学生代表名单公示', '<p>为了让学生代表们更好地行使手中的权利，履行好相应的义务，现由各学院在征求基层班级及学生组织意见的基础上，经校学代会代表资格审查委员会审查，决定授予32名学生代表“优秀学生代表称号”。以此鼓励学生代表们更好地担当代表角色，为广大华南理工学子服务。名单公布如下： </p>\n<p><img src="http://su.100steps.net/2007/attachment/news/800/news-201304153h14IK4H.jpg" alt="" /></p>', '2014-07-11 15:46:30'),
(16, '【校学生会】华南理工大学第三十五届学生代表大会代表名单公示', '<p><span style="font-family:''宋体'';font-size:medium;">为积极推进华南理工大学学生会的民主建设，充分尊重华南理工大学学生代表大会代表的主体地位，有效发挥代表作用，现由各学院在征求各班级及学生组织意见的基础上，采取民主投票方式差额选举，并经华南理工大学第三十五次学生代表大会筹备委员会审查后，选举全校共352名学生代表，公布如下：　　</span></p>\n<p><span style="font-family:''宋体'';font-size:medium;">    代表应具备以下条件：<br />   （一）我校正式学籍的本科学生；<br />　 （二）具有良好的政治素质，坚持四项基本原则，爱国爱校；<br />   （三）热心社会工作，密切联系同学，并能及时反映同学的建议、要求，代表所在单位意见，具备一定的议事能力，在学生中享有一定的威信；<br />   （四）学习态度端正，成绩良好，有较高的综合素质；<br />   （五）遵守法律、法规和校规校纪，无违法违纪现象。</span></p>\n<p><span style="font-family:''宋体'';font-size:medium;">    请全校老师同学监督，若有异议或疑问请于2013年4月9日23：00前将详情发至校学生会权益部工作邮箱：<a href="mailto:quanyibu_scut@126.com">quanyibu_scut@126.com</a>。若无异议，此名单于4月9日23：00自动成为最终名单。</span></p>', '2014-07-11 15:48:48'),
(17, '【校学生会】华南理工大学2012-2013年度“红旗学生分会”和“表扬学生分会”名单公示', '<div class="Section0">  为表彰一年来工作成绩优异并作出突出贡献的学院学生分会，树立典型，确立榜样，进一步提升我校学生会工作的整体水平，经华南理工大学学生会对各学院学生分会一年工作的考核，决定授予机械与汽车工程学院学生分会等7个学生分会“红旗学生分会”称号，同时授予建筑学院学生分会等7个学生分会“表扬学生分会”称号。</div>\n<div class="Section0"><br />现将名单公示如下：<br />红旗学生分会：<br />机械与汽车工程学院学生分会   <br />轻工与食品学院学生分会</div>\n<div class="Section0">理学院学院学生分会       <br />经济与贸易学院学生分会</div>\n<div class="Section0">生物科学与工程学院学生分会  <br />工商管理学院学生分会<br />新闻与传播学院学生分会</div>\n<div class="Section0"><br />表扬学生分会：<br />建筑学院学生分会                <br />材料科学与工程学院学生分会</div>\n<div class="Section0">化学与化工学院学生分会           <br />自动化科学与工程学院学生分会<br />计算机科学与工程学院学生分会     <br />环境与能源学院学生分会<br />法学院、知识产权学院学生分会</div>\n<div class="Section0"><br />最佳组织奖：  <br />材料科学与工程学院学生分会       <br />软件学院学生分会</div>\n<div class="Section0"><br />最佳宣传奖：  <br />自动化科学与工程学院学生分会     <br />设计学院学生分会</div>\n<div class="Section0"><br />最佳进步奖：  <br />化学与化工学院学生分会          <br />轻工与食品学院学生分会<br />艺术学院学生分会</div>\n<div class="Section0"><br />最佳答辩奖： <br />建筑学院学生分会                 <br />新闻与传播学院学生分会</div>\n<div class="Section0"><br />     对以上公示名单如有异议或疑问请于2013年4月14日前将详情发至校学生会办公室工作邮箱：<a href="mailto:happyoffice@126.com">happyoffice@126.com</a>。若无异议，此名单于4月14日自动成为最终名单。</div>', '2014-07-11 15:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_login` varchar(15) NOT NULL COMMENT '登录名（学号）',
  `user_pass` varchar(32) NOT NULL COMMENT '密码（MD5加密）',
  `user_name` varchar(30) NOT NULL COMMENT '真实姓名',
  `user_phone` varchar(11) DEFAULT NULL COMMENT '手机号',
  `user_email` varchar(100) DEFAULT NULL COMMENT '电子邮件',
  `user_department` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属部门',
  `user_type` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户类型\n0为新用户\n1为超级管理员',
  `user_authority` varchar(200) NOT NULL COMMENT '权限，用逗号分隔',
  `user_created` datetime NOT NULL COMMENT '创建日期',
  `user_modified` datetime NOT NULL COMMENT '修改日期',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='存储用户基本信息' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_pass`, `user_name`, `user_phone`, `user_email`, `user_department`, `user_type`, `user_authority`, `user_created`, `user_modified`) VALUES
(6, '201130581289', '25d55ad283aa400af464c76d713c07ad', '苏润梓', '13570225489', 'surunzi1992@gmail.co', 0, 1, '5,7,9', '2014-07-06 10:55:09', '2014-07-11 16:11:49'),
(7, '201130581222', '25d55ad283aa400af464c76d713c07ad', '李四', '13570225489', '', 0, 0, '', '2014-07-07 00:16:32', '2014-07-07 17:47:13'),
(8, '201130581231', '25d55ad283aa400af464c76d713c07ad', '张三', NULL, NULL, 0, 0, '', '2014-07-07 13:26:21', '2014-07-07 13:26:21'),
(9, '201130581111', '25d55ad283aa400af464c76d713c07ad', '王二', '', '', 0, 2, '21', '2014-07-08 09:58:26', '2014-07-09 22:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_extra`
--

CREATE TABLE IF NOT EXISTS `user_extra` (
  `user_id` int(11) NOT NULL COMMENT 'ID',
  `user_sex` tinyint(1) NOT NULL DEFAULT '1' COMMENT '性别\n0为女\n1为男',
  `user_dormitory` varchar(30) DEFAULT NULL COMMENT '宿舍号',
  `user_birthday` date DEFAULT NULL COMMENT '生日',
  `user_major` varchar(60) DEFAULT NULL COMMENT '专业',
  `user_birthplace` varchar(60) DEFAULT NULL COMMENT '籍贯',
  `user_qq` varchar(10) DEFAULT NULL COMMENT 'qq号',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户额外信息';

--
-- Dumping data for table `user_extra`
--

INSERT INTO `user_extra` (`user_id`, `user_sex`, `user_dormitory`, `user_birthday`, `user_major`, `user_birthplace`, `user_qq`) VALUES
(6, 1, 'c12-54', '1994-10-19', '计算机科学与技', '广东潮', '67078582'),
(7, 1, '', NULL, '', '', ''),
(8, 1, NULL, NULL, NULL, NULL, NULL),
(9, 1, '', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `user_type_name` varchar(45) NOT NULL COMMENT '类型名称，用于显示',
  `user_type_authority` varchar(45) DEFAULT NULL COMMENT '该类型用户所具有权限\n用逗号分隔',
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户类型，用于预置权限' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_name`, `user_type_authority`) VALUES
(2, '部长', '10'),
(3, '主席', ''),
(4, '干事', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
