-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 09 月 06 日 09:52
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shujuku`
--

-- --------------------------------------------------------

--
-- 表的结构 `tpt_admin`
--

CREATE TABLE IF NOT EXISTS `tpt_admin` (
  `adminid` int(1) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `kouling` varchar(32) NOT NULL DEFAULT '',
  `validate` varchar(32) NOT NULL DEFAULT '',
  `adminhead` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tpt_admin`
--

INSERT INTO `tpt_admin` (`adminid`, `adminname`, `password`, `kouling`, `validate`, `adminhead`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'A2DF5GF33F96E', '/uploads/20170401/default.png');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_banner`
--

CREATE TABLE IF NOT EXISTS `tpt_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shows` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型',
  `time` varchar(32) NOT NULL DEFAULT '' COMMENT '时间',
  `pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `links` varchar(100) DEFAULT NULL COMMENT '连接',
  `description` varchar(200) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tpt_banner`
--

INSERT INTO `tpt_banner` (`id`, `shows`, `type`, `time`, `pic`, `title`, `links`, `description`, `content`) VALUES
(1, 1, 1, '1495089824', '/uploads/20170522/d2ce50908375898206cccbc610917155.jpg', '模块化网站内容管理系统', 'http://www.tpt360.com/', NULL, NULL),
(2, 1, 1, '1495089909', '/uploads/20170522/d4c1b4a3f09f2dd9b969fa4400ef733a.jpg', '模块化网站内容管理系统', 'http://www.tpt360.com/', NULL, NULL),
(3, 1, 1, '1495434528', '/uploads/20170522/96db883aa53a1942bcb186716e5c461c.jpg', '模块化网站内容管理系统', 'http://www.tpt360.com/', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tpt_category`
--

CREATE TABLE IF NOT EXISTS `tpt_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL COMMENT '上级',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '类型',
  `shows` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `sidebar` tinyint(1) NOT NULL DEFAULT '1' COMMENT '侧栏',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '名称',
  `time` varchar(32) NOT NULL COMMENT '时间',
  `pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `description` varchar(200) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `tpt_category`
--

INSERT INTO `tpt_category` (`id`, `tid`, `sort`, `type`, `shows`, `sidebar`, `name`, `time`, `pic`, `keywords`, `description`, `content`) VALUES
(1, 0, 1, 1, 1, 1, '新闻资讯', '1492058517', '', '新闻资讯', '新闻资讯', NULL),
(2, 1, 1, 1, 1, 1, '国内新闻', '1495435108', '', '国内新闻', '国内新闻', NULL),
(3, 1, 1, 1, 1, 1, '国际新闻', '1495435121', '', '国际新闻', '国际新闻', NULL),
(4, 0, 1, 1, 1, 1, '科技头条', '1495438498', '', '科技头条', '科技头条', NULL),
(5, 4, 1, 1, 1, 1, '人工智能', '1495438514', '', '人工智能', '人工智能', NULL),
(6, 4, 1, 1, 1, 1, '虚拟现实', '1495438524', '', '虚拟现实', '虚拟现实', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tpt_comment`
--

CREATE TABLE IF NOT EXISTS `tpt_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL COMMENT '上级评论',
  `uid` int(11) NOT NULL COMMENT '所属会员',
  `fid` int(11) NOT NULL COMMENT '所属帖子',
  `mid` int(11) NOT NULL DEFAULT '0' COMMENT '上级帖子',
  `mes` tinyint(1) NOT NULL DEFAULT '1' COMMENT '清理',
  `shows` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `time` varchar(11) NOT NULL COMMENT '时间',
  `praise` varchar(11) NOT NULL DEFAULT '0' COMMENT '赞',
  `reply` varchar(11) NOT NULL DEFAULT '0' COMMENT '回复',
  `pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `description` varchar(200) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tpt_comment`
--

INSERT INTO `tpt_comment` (`id`, `tid`, `uid`, `fid`, `mid`, `mes`, `shows`, `time`, `praise`, `reply`, `pic`, `description`, `content`) VALUES
(1, 0, 2, 1, 1, 0, 1, '1493188543', '0', '0', NULL, NULL, '<p>这是我回复的第一条帖子</p><p></p>'),
(2, 0, 1, 8, 8, 1, 1, '1495439281', '0', '0', NULL, NULL, '<p>谷歌的 VR/AR 故事，一切还要从 Carboard 说起。</p><p></p>'),
(3, 0, 1, 7, 7, 1, 1, '1495439532', '0', '0', NULL, NULL, '<p>所平台上还开发了企业与个人间的交易产品。</p><p></p>'),
(4, 0, 1, 7, 7, 1, 1, '1495439539', '0', '0', NULL, NULL, '<p>融入更多元的借款方和投资方</p><p></p>');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_content`
--

CREATE TABLE IF NOT EXISTS `tpt_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL COMMENT '上级',
  `uid` int(11) NOT NULL COMMENT '用户',
  `shows` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `choice` tinyint(1) NOT NULL DEFAULT '0' COMMENT '精贴',
  `settop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '顶置',
  `praise` varchar(11) NOT NULL DEFAULT '0' COMMENT '赞',
  `view` varchar(11) NOT NULL DEFAULT '1' COMMENT '浏览量',
  `time` varchar(11) NOT NULL COMMENT '时间',
  `reply` varchar(11) NOT NULL DEFAULT '0' COMMENT '回复',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `description` varchar(200) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `tpt_content`
--

INSERT INTO `tpt_content` (`id`, `tid`, `uid`, `shows`, `choice`, `settop`, `praise`, `view`, `time`, `reply`, `title`, `pic`, `keywords`, `description`, `content`) VALUES
(1, 2, 1, 1, 1, 1, '0', '46', '1495435549', '1', '死咬苹果，三星也正式宣布自研手机GPU', '/uploads/20170522/899feb7f61ce5b1569907b1c65723d5f_thumb_240_160.jpg', '新媒体,iphone8,游戏,视频,淘宝', '雷锋网公众号雷锋网按近日三星正式宣布将自主研发手机同时把项目立为集团重要战略方向目前三星主要采购的是和的而此次宣布自主研发后预计年后会正式推', '<p><img src="/uploads/20170522/899feb7f61ce5b1569907b1c65723d5f.jpg" alt="1" style="max-width:100%;"><font size="3"></font></p><p><font size="3">雷锋网(公众号：雷锋网)按：近日，三星正式宣布将自主研发手机GPU，同时把GPU项目立为集团重要战略方向。</font></p><p><font size="3">目前三星主要采购的是ARM Mali和Imagination的PowerVR GPU，而此次宣布自主研发GPU后，预计2-3年后会正式推出产品。</font></p><p><font size="3">现阶段三星正在与AMD和英伟达谈判通过许可图形IP来加于未来的Exynos处理器，其中英伟达已经在其Tegra品牌下使用GeForce图形核心构建了基于ARM的SoC;。</font></p><p><font size="3">在三星的Exynos SoC的历史上，该公司已经使用了两个主要的IP提供商：ARM用于CPU，以及ARM或Imagination for GPU。去年9月份，三星就与AMD和英伟达正式洽谈许可图形芯片技术事宜，而更早在3年前也有传言称三星有意许可AMD或英伟达的图形芯片技术，通过许可其他公司技术缩短开发图形芯片的时间。</font></p><p><font size="3">目前，英伟达移动图形芯片采用Pascal架构，由台积电利用16纳米FinFET工艺代工制造，AMD则利用14纳米FinFET工艺生产Polaris架构图形芯片。</font></p><p><font size="3">而三星最新设计的Exynos 8具有ARM的Cortex-A53 CPU内核和Mali-T880 GPU核心。</font></p><p><font size="3">随着苹果正式宣布停止PowerVR的授权，表明自己研发GPU的野心。而现在，三星也紧随其后，在潜水多年后正式公开进行自有GPU的研发。</font></p><p></p><p><font size="3">据消息人士透露，三星GPU研发地分别设在圣何塞和奥斯汀。</font></p><p></p>'),
(2, 2, 2, 1, 0, 1, '0', '28', '1495436543', '0', 'AAAI协会主席 Rao：中国AI研究进步喜人，创业风气无处不在 | GAIR 2017', '/uploads/20170522/933f738aa5481a9d007b802351b17cb8_thumb_240_160.jpg', '新媒体,小米,真人秀,综艺,网红,人工智能', '由中国计算机学会主办雷锋网与香港中文大学深圳全程承办的盛会全球人工智能与机器人峰会将于日在深圳召开为国内外学术业界专家提供一个广阔交流的平台', '<p><img src="/uploads/20170522/933f738aa5481a9d007b802351b17cb8.jpg" alt="3" style="max-width:100%;"><font size="3"></font></p><p><font size="3">由中国计算机学会（CCF）主办、雷锋网与香港中文大学（深圳）全程承办的 AI 盛会 --「全球人工智能与机器人峰会」（CCF-GAIR），将于 7.7-7.9 日在深圳召开。\n\nCCF-GAIR 为国内外学术、业界专家提供一个广阔交流的平台，既在宏观上把握全球人工智能趋势脉搏，也深入探讨人工智能在每一个垂直领域的应用实践细节。\n\n延续上一次大会的顶级嘉宾阵容，本次 CCF-GAIR 2017 将会迎来更多人工智能和机器人行业重磅专家。</font></p><p><font size="3">前段时间，雷锋网介绍了 AAAI 协会主席、亚利桑那州立大学教授 Subbarao Kambhampati (Rao) 的研究经历，日前，我们荣幸地邀请到 Rao 进行了一场对话，尝试了解他对人工智能、对中国 AI 的想法。</font></p><p><img src="/uploads/20170522/d256e9b59b3e310e4743452753ec3abe.jpg" alt="2" style="max-width:100%;"><font size="3"></font></p><p><font size="3">物种所面临的三个基本问题是：宇宙的起源，生命的起源和智慧的本质。\n\n而在 Rao 的眼中，人工智能正是能深入探索智慧本质的一个重要入口，这也让他一直对自己的工作感到非常骄傲。\n\nRao 本科毕业于印度理工学院电子工程专业，彼时人工智能正处于第二次浪潮。Rao 算得上赶上了好时候，他的论文题目就是关于语音识别的内容，针对一些容易混淆的词汇，Rao 构建了一个孤立词语音识别系统（isolated word recognition system）。&nbsp;\n</font></p><p><font size="3">而 Rao 向雷锋网(公众号：雷锋网)表示，DARPA 的语音理解项目对他产生了深远的影响。「当时受这个项目的影响，我深深认识到语音所涵盖的内容并不仅于信号处理。这也让我往 AI 的世界又迈进了一步。虽然我会在不同的工作领域中摇摆，但一直与 AI 紧密相关。这实在是一次非常伟大的旅程！」\n\n而他不遗余力地推崇的 HAAI，即 Human-Aware Artificial Intelligence，则希望能创造「能感知人类的人工智能」。人类的决策过程，在未来非常有可能需要依赖 AI 智能体的帮助，而这个过程的循环演进，会让 AI 智能体逐步融入人类的生活，成为不可或缺的一部分。&nbsp;\n</font></p><p><img src="/uploads/20170522/e37ae1a3a9a6493638b66509d3b7271c.jpg" alt="1" style="max-width:100%;"><font size="3"></font></p><p><font size="3">Rao 认为目前 HAAI 还存在非常多的挑战，而其中最难的地方在于，要为 AI 系统开发一个能与人类交互的心智理论，利用它预测人类的行为，并预测人类对自己所做行为的反应。\n\n「要创造出能与人类协同合作的机器，AI 需要习得我们已经习以为常的情感与社会智能，不仅包括理解面部表情与情绪的能力，从人类的行为和表达中识别其偏好与意图，并能将自己的目标和意图传达给人类。」在 Rao 眼中，智能助手就是一个非常典型的、需要理解人类情感的 AI 应用领域。&nbsp;\n</font></p><p><font size="3">而对于人类与机器并存的未来世界，Rao 提及了一个老生常谈的话题：「在 AI 研究领域有一个哲学话题：我们创造了技术，是为了取代我们（replace），还是只是为了增强我们自身的能力（augment）？我相信，HAAI 系统所做的研究，能够创造一个两者并存的世界。」</font></p><p></p>'),
(3, 3, 3, 1, 1, 1, '0', '22', '1495437482', '0', 'ZEALER布局短视频MCN，优质的泛科技视频都在这里', '/uploads/20170522/bcbfb625b22faf777e1859cda801d29f_thumb_240_160.jpg', '人工智能,大朋VR,机器人,真人秀,综艺', '如果说年是直播年那么年这个风口毫无争议是短视频直播的热浪逐渐褪去在时间进一步碎片化的时代短视频越来越成为人们获取信息最重要的渠道短视频是社交', '<p><img src="/uploads/20170522/bcbfb625b22faf777e1859cda801d29f.jpg" alt="1" style="max-width:100%;"><font size="3"></font></p><p><font size="3">如果说2016年是直播年，那么2017年这个风口毫无争议是短视频。直播的热浪逐渐褪去，在时间进一步碎片化的时代，短视频越来越成为人们获取信息最重要的渠道。短视频是社交+信息获取+娱乐消遣+碎片化阅读的综合体，所以在内容价值沉淀上短视频比直播更具优势。5月22日，“科技生活方式第一站”ZEALER宣布其战略升级为“科技生活方式第一平台”，并公布了其泛科技短视频MCN（Multi-Channel Network）战略“ZEALER X”，</font></p><p><font size="3"><b>这里将汇聚全球最优质的泛科技短视频内容和创业者。</b></font></p><p><font size="3">&nbsp;巨头纷纷入局短视频，ZEALER要切细致划分的泛科技领域\n\n短视频的热风在今年一直没有停过。今日头条孵化的火山小视频宣布投资10亿元补贴短视频创作者，百度旗下的百度视频、阿里旗下的土豆也在迎头直追，微博和秒拍也继续加码短视频，看上去短视频已成为巨头们参与的游戏。但是ZEALER创始人兼CEO王自如判断，短视频行业足够大，还有空间和时间做更细致的划分与布局，泛科技垂直领域的短视频就是“ZEALER X”此次的切入点。从电子消费品的测评视频切入战场，如今ZEALER已全面拓展品类，其视频已涵盖智能家居、汽车、游戏等可以和科技跨界、科技+一切的生活方式内容。而此次“ZEALER X”的发布可以看作ZEALER对其自己的第二次升级。</font></p><p></p>'),
(4, 3, 4, 1, 0, 0, '0', '11', '1495437586', '0', '揭秘中国X86 CPU两大阵营，海光、兆芯谁更强？', '/uploads/20170522/1883c6526eb97a9aa2e0696d82000458_thumb_240_160.jpg', '网红,视频,淘宝,雷军,大朋VR,人工智能,小米,综艺,自定义', '雷锋网公众号雷锋网按本文作者铁流雷锋网首发前不久永恒之蓝肆虐教育网和公安内网遭到攻击洛阳市公安官方甚至发文承认公安内网陷入瘫痪而在不久前表示', '<p><img src="/uploads/20170522/1883c6526eb97a9aa2e0696d82000458.jpg" alt="1" style="max-width:100%;"><font size="3"></font></p><p><font size="3">雷锋网(公众号：雷锋网)按：本文作者铁流，雷锋网首发\n\n前不久，永恒之蓝肆虐，教育网和公安内网遭到攻击，洛阳市公安官方甚至发文，承认公安内网陷入瘫痪。而Intel在不久前表示版本号为6.x、7.x、8.x、9.x、10.x、11.5、以及11.6系列的所有固件产品存在严重的漏洞，这就意味着英特尔近十年来的固件芯片都会受到影响。\n\n根据资料表明，国家已经制订了旨在使用国产化产品替代进口产品的计算机计划——全国党政系统的计算所实现国产化替代，从而保障国家的信息安全。</font></p><p><font size="3">不过，考虑到党政办公中，暂时还不可能一下子就彻底抛弃Windows，即便用Linux取代Windows也需要一个过渡期。而目前国内做X86 CPU的厂商中，海光和兆芯无疑是最受国家器重的企业。那么，面对如此庞大的市场，海光和兆芯谁能拔得头筹呢？&nbsp;</font></p><p><font size="3"><b>&nbsp;海光&nbsp;\n</b></font></p><p><font size="3">海光与AMD合资的事情非常低调。据业内人士披露，海光与AMD合资是一些人抱着重复高铁技术引进、消化吸收、再创新的想法，因而开展的项目。虽然中国方面鲜有相关消息，但据外媒报道，AMD与国内公司签订的协议预计可为AMD带来2.93亿美元许可费和版税收入。目前，海光资金以天津投资和曙光自有资金为主。</font></p><p><font size="3"><b>兆芯&nbsp;\n</b></font></p><p><font size="3">兆芯是一家国家大力扶持的IC设计公司，在十二五期间，承接了核高基01专项，获得了数十亿资金扶持。在2017年又拿到了核高基一大笔钱。因此，兆芯是一家不差钱的公司，即便无法盈利，也能过的很好。相对于海光来说，兆芯获得的国家资源要丰富的多——海光以天津投资和曙光自有资金为主，兆芯拿核高基的钱拿到手软。</font></p><p></p>'),
(5, 5, 5, 1, 1, 0, '0', '23', '1495437727', '0', 'AlphaGo 与柯洁华山论剑，人工智能一手遮天指日可待？', '/uploads/20170522/cf490ea3d1c5a9aa810e9870ab155cc7_thumb_240_160.jpg', '新媒体,iphone8,视频,游戏,淘宝,雷军', '如今人工智能的劲风势不可挡甚至在政府报告上都划为重点回顾年人工智能界的顶级盛事人机围棋大战绝对榜上有名面对人类棋手的失利机器人乘胜追击再下战', '<p align="center" style="text-align: center;"><img src="/uploads/20170522/cf490ea3d1c5a9aa810e9870ab155cc7.jpg" alt="1" style="max-width:100%;" class=""><font size="3"></font></p><p><font size="3">如今，人工智能的劲风势不可挡，甚至在政府报告上都划为重点。回顾2016年人工智能界的顶级盛事，人机围棋大战绝对榜上有名。面对人类棋手的失利，机器人 AlphaGo 乘胜追击、再下战书，挑战围棋顶级选手柯洁的消息一夜间走进世界的聚光灯下。然而懒人族表示：机器人都玩转围棋了！做家务可比下围棋简单多了，你们怎么还没造出一款能解放人类的全能家务机器人呢？&nbsp;\n</font></p><p><font size="3">其实，人工智能的发展还要打败很多大小怪兽。即便是战胜了人类围棋高手的AlphaGo目前也仅具备弱人工智能水平！虽然科幻电影里被机器人接管的世界距离我们还有些遥远，但科研人员们正在努力“打怪升级”，争取让能为人类提供服务的机器人早日来到我们身边。\n\n假如你说：“机器人，把桌上的苹果拿去洗洗，给大家吃吧！”为了听懂并服从这个命令，机器人到底要具备哪些本领呢？&nbsp;</font></p><p><font size="3">&nbsp;首先，机器人要理解这句话的含义。这就涉及到语音识别和自然语言处理两个研究领域。语言识别，就是把机器人听到的声波转成文字。自然语言处理，就是把一句按人类习惯说的话，解析成计算机能理解的信息。这一过程并不容易——Amazon近期发布的智能音箱Echo，重点攻关了远距离以及有噪音情况下的语音识别这一难题，但也只能进行有限的对话，更不用说像人类一样理解对话中复杂的情境和上下文了。&nbsp;\n</font></p><p><font size="3">假设机器人已经正确识别出这句话。接下来的难题是：什么叫“桌子”？“苹果”是什么？什么叫“洗洗”？谁是“大家”？什么叫“吃”？这些都属于人类知识库里的常识问题。 人和人的沟通大量依赖常识，而这些都是机器不具备的。这种常识的学习对机器人而言是挑战，因为这些知识既无法预测，也无法泛化，更无法预先植入。机器人必须具备某种持续的自主学习能力，才能推理出用户的命令究竟是什么意思。&nbsp;</font></p><p><font size="3">&nbsp;自然语言处理过程中的上下文问题，个人常识的搜集、表达和存储，以及如何利用这些常识实现人机自然交流——这些都是英特尔中国研究院的小伙伴们目前正在努力研究的课题。其中最大的挑战在于发现信息之间的相关性，并在适当时机，激活最可能相关的信息，为人机交流补足上下文。相信不久后就有更会聊天的机器人来陪伴你啦！\n\n假设机器人能正确识别出桌子和苹果，下一步就是找到苹果。这就涉及到计算机视觉难题——就是让计算机长出一双人类的眼睛，能分辨出人可以看到的景象，提取出人能提取的信息。假设机器人能够完美捕捉三维信息，接下来就是如何理解“看到”的图像。&nbsp;</font></p><p></p>'),
(6, 5, 6, 1, 0, 0, '0', '13', '1495437828', '0', '致力于让机器像人类大脑一样工作的Numenta，入选最值得关注100家AI公司', '/uploads/20170522/cfd0f0e99180a6330005a0705d00ee55_thumb_240_160.jpg', '人工智能,大朋VR,机器人,小米,综艺,自定义,真人秀', '雷锋网公众号雷锋网新智造按被称为世界科幻文学三巨头之一的罗伯特海因莱因于年出版了他著名的小说异乡异客在书中他杜撰了一个词来自拉丁文意为心灵年', '<p><img src="/uploads/20170522/cfd0f0e99180a6330005a0705d00ee55.jpg" alt="1" style="max-width:100%;"><font size="3"></font></p><p><font size="3">雷锋网(公众号：雷锋网)【新智造】按：被称为世界科幻文学“三巨头”之一的罗伯特·海因莱因，于1987年出版了他著名的小说《异乡异客》，在书中他杜撰了一个词——Numenta，来自拉丁文 mentis，意为“心灵”。2005年，美国计算机科学家与神经生物学家杰弗瑞·霍金（Jeffrey Hawkins），以此命名了他的新公司，致力于开发出一台和人类大脑工作原理相似的智能机器。此前，Numenta 公司上榜了调研公司 CBInsights 的“最值得关注的100家人工智能公司”榜单。</font></p><p><font size="3">Numenta 公司创建于2005年，其创始人 Jeffrey Hawkins 大名鼎鼎，既是计算机科学家，也是神经生物学家，同时还是Palm公司、Handspring公司、Redwood Neuroscience Institute 研究所的创办者。 \n</font></p><p><font size="3">创业的经历与其学术经历相符，早期创办的 Palm 和 Handspring 公司专注于制造移动设备，想必离不开其计算机科学的学术背景，此后分别创办于2002年和2005年的 Redwood Neuroscience 研究所和 Numenta 公司，则专注于研究新皮层处理信息的方式，并应用于计算机领域，这则归功于其神经生物学的背景。</font></p><p></p>'),
(7, 6, 7, 1, 0, 0, '0', '22', '1495437893', '2', '计葵生：从陆金所看金融科技的发展要点与未来', '/uploads/20170522/058eea7197f4c811b2d86e48f4058191_thumb_240_160.jpg', '新媒体,iphone8,游戏,视频,淘宝,雷军,网红', '雷锋网金融评论报道陆金所联席董事长兼计葵生先生于日前参与了普华永道举办的领导力嘉宾演讲系列活动并发表了金融科技的未来发展演讲他主要从时代背景', '<p><img src="/uploads/20170522/058eea7197f4c811b2d86e48f4058191.jpg" alt="1" style="max-width:100%;"><font size="3"></font></p><p><font size="3">雷锋网AI金融评论报道，陆金所联席董事长兼CEO计葵生先生于日前参与了普华永道You Plus 举办的领导力嘉宾演讲系列活动，并发表了“金融科技的未来发展”演讲。他主要从时代背景，发展现状以及未来展望三个方面入手，并结合陆金所多年的发展经验，深入浅出地作了分享。</font></p><p><font size="3">科技发展使新的业务模型成为可能\n\n\n计葵生表示，金融科技刚刚开始，一切尚在摸索和实践中。过去对金融科技的定义是从金融出发，加上科技的优势来创造新的业务模式。</font></p><p><font size="3">但在未来的5年，科技所占的比重会越来越大。过去fintech讲求的是风控做的好不好，产品透不透明，产品设计做的好不好，是不是能为客户提供方便，成本低等好的体验。而未来金融科技的方向将会逐渐依靠科技的数据处理能力来优化选择。&nbsp;</font></p><p><font size="3">&nbsp;金融科技发展需要不断地开发新模式\n\n要想把互联网经济做大就需要采用开发的模式，需要扩宽平台，开发更多元化的产品，融入更多元的借款方和投资方。就拿陆金所的业务模式来说，陆金所最开始只做P2P模式。到今天，陆金所P2P模式的业务量只占整体业务量的10%，主要业务量来自机构和机构之间的量。据雷锋网AI金融评论了解，除此之外，陆金所平台上还开发了企业与个人间的交易产品。&nbsp;\n</font></p><p><font size="3">后来计葵生发现，中国投资方和个人非常关注机会成本，偏向短期投资，而对长期投资所要求的回报率特别高，高到借款方不能接受。因此陆金所创造了二级市场，来满足市场的这一需求。由此可以看出，互联网金融需要不断依据市场需求，开发出更多元化的模式和产品。</font></p><p></p>'),
(8, 6, 8, 1, 1, 0, '0', '63', '1495438097', '1', '从 I/O 大会看谷歌如何推动 VR/AR 的生态发展和技术边界 | Google I/O 2017', '/uploads/20170522/ca5c823d63ed0ee6be50e495c0f4511a_thumb_240_160.jpg', '人工智能,大朋VR,机器人,小米,综艺,自定义,真人秀', '谷歌的故事一切还要从说起三年前大会上推出纸盒眼镜你可以自己拼装把手机放进去观看度的视频或是玩一款小游戏当时所有人都以为谷歌在跟大家开玩笑后来', '<p><img src="/uploads/20170522/ca5c823d63ed0ee6be50e495c0f4511a.jpg" alt="1" style="max-width:100%;"><font size="3"></font></p><p><font size="3">谷歌的 VR/AR 故事，一切还要从 Carboard 说起。\n\n三年前，Google I/O 大会上推出 Cardboard 纸盒眼镜，你可以自己拼装，把手机放进去观看 360 度的视频，或是玩一款小游戏。当时所有人都以为谷歌在跟大家开玩笑，后来的故事众所周知，便宜但不廉价的 Cardboard 让更多的人知道 VR，同时 1000万（谷歌官方 2017 年3 月宣布的数据）的销量证明，谷歌对 Cardboard，也可以说对 VR 非常认真。&nbsp;\n</font></p><p><font size="3">彼时，Facebook 刚刚以 20 亿美金收购 Oculus （后来经过官司事件爆出收购价为 30 亿美金），引起国内外对 VR 的追捧。2015 年，包括苹果、微软等在内的各大厂商相继在 VR、AR 领域投资布局，申请专利，或是推出产品。谷歌也不着急，这一年的 Google I/O 上继续升级 Cardboard，并且开始注重丰富 VR 内容，比如 YouTube 支持 360 度全景视频，并推出由 16 台相机构成的 Jump 拍摄平台。&nbsp;\n</font></p><p><font size="3">随后 2016 年的 Google I/O 上，谷歌终于发布了移动 VR 平台 Daydream，同年 10 月，Cardboard 的升级版 VR 眼镜 Daydream View 也正式推出，与此同时，谷歌还宣布与一些手机厂商合作推出支持 Daydream 的手机。但是，一年过去了，与 Cardboard 相比，Daydeam View 并没有卖出去多少，当时承诺的手机也未能按时登场。</font></p><p></p>');

-- --------------------------------------------------------

--
-- 表的结构 `tpt_links`
--

CREATE TABLE IF NOT EXISTS `tpt_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shows` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `name` varchar(32) NOT NULL COMMENT '名称',
  `time` varchar(32) NOT NULL COMMENT '时间',
  `pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `links` varchar(100) DEFAULT NULL COMMENT '连接',
  `description` varchar(200) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tpt_links`
--

INSERT INTO `tpt_links` (`id`, `shows`, `name`, `time`, `pic`, `links`, `description`, `content`) VALUES
(1, 1, '百度一下', '1492931403', '', 'https://www.baidu.com/', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tpt_member`
--

CREATE TABLE IF NOT EXISTS `tpt_member` (
  `userid` int(12) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '验证',
  `grades` tinyint(1) NOT NULL DEFAULT '0' COMMENT '等级',
  `usereal` tinyint(1) NOT NULL DEFAULT '0' COMMENT '认证',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型',
  `validate` varchar(32) NOT NULL DEFAULT '' COMMENT '登录验证',
  `openid` varchar(32) NOT NULL DEFAULT '' COMMENT '验证ID',
  `point` varchar(12) NOT NULL DEFAULT '0' COMMENT '积分',
  `userip` varchar(32) DEFAULT NULL COMMENT 'IP',
  `username` varchar(32) NOT NULL COMMENT '名称',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `userhead` varchar(100) NOT NULL COMMENT '头像',
  `usermail` varchar(32) DEFAULT NULL COMMENT '邮箱',
  `usertime` varchar(32) NOT NULL DEFAULT '' COMMENT '注册时间',
  `usertimes` varchar(32) NOT NULL DEFAULT '' COMMENT '登录时间',
  `count` varchar(6) NOT NULL DEFAULT '0' COMMENT '消息',
  `reply` varchar(6) NOT NULL DEFAULT '0' COMMENT '回复',
  `userhome` varchar(32) DEFAULT NULL COMMENT '家乡',
  `userqq` varchar(32) DEFAULT NULL COMMENT 'QQ',
  `userxm` varchar(32) DEFAULT NULL COMMENT '姓名',
  `usersid` varchar(32) DEFAULT NULL COMMENT '身份证号',
  `userzm` varchar(100) DEFAULT NULL COMMENT '证明图',
  `description` varchar(200) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `tpt_member`
--

INSERT INTO `tpt_member` (`userid`, `status`, `grades`, `usereal`, `sex`, `type`, `validate`, `openid`, `point`, `userip`, `username`, `password`, `userhead`, `usermail`, `usertime`, `usertimes`, `count`, `reply`, `userhome`, `userqq`, `userxm`, `usersid`, `userzm`, `description`) VALUES
(1, 1, 1, 0, 0, 0, 'A2DF5GF33F96E', '', '148', NULL, 'admin', '', '/uploads/20170401/0.jpg', '', '1494827898', '1495082018', '0', '0', '', '', '', '', '', ''),
(2, 1, 0, 0, 1, 0, '0', '', '100', NULL, '青春综合症', '', '/uploads/20170401/1.jpg', NULL, '1494827898', '1495082018', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 0, 0, 1, 0, '0', '', '100', NULL, '拥抱的问号', '', '/uploads/20170401/2.jpg', NULL, '1494827898', '1495082018', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 0, 0, 1, 0, '0', '', '100', NULL, '小爆发', '', '/uploads/20170401/3.jpg', NULL, '1494827898', '1495082018', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 0, 0, 1, 0, '0', '', '100', NULL, '守卟住、德嗳', '', '/uploads/20170401/4.jpg', NULL, '1494827898', '1495082018', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 0, 0, 1, 0, '0', '', '100', NULL, '怡然自得', '', '/uploads/20170401/5.jpg', NULL, '1494827898', '1495082018', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 0, 0, 1, 0, '0', '', '100', NULL, '人生若初见ゥ', '', '/uploads/20170401/6.jpg', NULL, '1494827898', '1495082018', '0', '2', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 0, 0, 1, 0, '0', '', '100', NULL, '再贱就再见', '', '/uploads/20170401/7.jpg', NULL, '1494827898', '1495082018', '0', '2', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 0, 0, 1, 0, '0', '', '100', NULL, '单身ン贵族', '', '/uploads/20170401/8.jpg', NULL, '1494827898', '1495082018', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 0, 0, 1, 0, '0', '', '100', NULL, '久无泪.', '', '/uploads/20170401/9.jpg', NULL, '1494827898', '1495082018', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 0, 0, 1, 0, '0', '', '100', NULL, '心酸的滋味', '', '/uploads/20170401/10.jpg', NULL, '1494827898', '1495082018', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, 0, 0, 1, 0, '0', '', '100', NULL, '不做毕剩客', '', '/uploads/20170401/11.jpg', NULL, '1494827898', '1495082018', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tpt_navtop`
--

CREATE TABLE IF NOT EXISTS `tpt_navtop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL COMMENT '上级导航',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `blank` tinyint(1) NOT NULL DEFAULT '0' COMMENT '窗口',
  `shows` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示',
  `surl` tinyint(1) NOT NULL DEFAULT '0' COMMENT '外链',
  `name` varchar(32) NOT NULL COMMENT '名称',
  `time` varchar(32) NOT NULL COMMENT '时间',
  `pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `links` varchar(100) DEFAULT NULL COMMENT '连接',
  `description` varchar(200) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `tpt_navtop`
--

INSERT INTO `tpt_navtop` (`id`, `tid`, `sort`, `blank`, `shows`, `surl`, `name`, `time`, `pic`, `links`, `description`, `content`) VALUES
(2, 0, 1, 0, 1, 0, '新闻资讯', '1493188854', NULL, '', NULL, NULL),
(3, 2, 1, 0, 1, 0, '国内新闻', '1495434959', NULL, '../view/2.html', NULL, NULL),
(4, 2, 2, 0, 1, 0, '国际新闻', '1495434975', NULL, '../view/3.html', NULL, NULL),
(5, 0, 2, 0, 1, 0, '科技头条', '1495438558', NULL, '', NULL, NULL),
(6, 5, 50, 0, 1, 0, '人工智能', '1495438572', NULL, '../view/5.html', NULL, NULL),
(7, 5, 50, 0, 1, 0, '虚拟现实', '1495438581', NULL, '../view/6.html', NULL, NULL),
(8, 0, 3, 1, 1, 0, '官网首页', '1495438830', NULL, 'http://www.tpt360.com/', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
