-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-20 19:11:04
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `team18`
--

DELIMITER $$
--
-- 函式
--
CREATE DEFINER=`root`@`localhost` FUNCTION `win_cnt` (`team_name` VARCHAR(40), `game_name` VARCHAR(40)) RETURNS INT(11)  RETURN
  (SELECT COUNT(contest.win_team) FROM contest 
   WHERE contest.win_team = team_name and game_name = contest.game_name)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- 資料表結構 `contest`
--

CREATE TABLE `contest` (
  `game_name` varchar(50) NOT NULL,
  `region` varchar(20) NOT NULL,
  `month` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `time` varchar(6) NOT NULL,
  `team1` varchar(40) NOT NULL,
  `team2` varchar(40) NOT NULL,
  `win_team` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `contest`
--

INSERT INTO `contest` (`game_name`, `region`, `month`, `date`, `time`, `team1`, `team2`, `win_team`) VALUES
('League of Legends', 'LCK', 6, 25, '1600', 'DK', 'T1', 'T1'),
('League of Legends', 'LCK', 7, 1, '1600', 'DRX', 'DK', 'DK'),
('League of Legends', 'LCK', 7, 1, '1900', 'Gen.G', 'HLE', 'Gen.G'),
('League of Legends', 'LCK', 7, 2, '1600', 'LSB', 'T1', 'T1'),
('League of Legends', 'LCK', 7, 2, '1900', 'KDF', 'KT', 'KDF'),
('League of Legends', 'LCK', 7, 3, '1600', 'LSB', 'DRX', 'DRX'),
('League of Legends', 'LCS', 3, 17, '1500', 'BYG', 'PSG', 'BYG'),
('League of Legends', 'LEC', 1, 2, '1344', 'BLG', 'AL', 'BLG'),
('League of Legends', 'PCS', 7, 1, '1700', 'BYG', 'CFO', 'CFO'),
('League of Legends', 'PCS', 7, 1, '1800', 'DCG', 'DWT', 'DCG'),
('League of Legends', 'PCS', 7, 1, '1900', 'JT', 'PSG', 'PSG'),
('League of Legends', 'PCS', 7, 1, '2000', 'SEM9', 'FAK', 'FAK'),
('League of Legends', 'PCS', 7, 1, '2100', 'IMP', 'MFT', 'IMP'),
('League of Legends', 'PCS', 8, 26, '1700', 'CFO', 'PSG', 'CFO'),
('mygame', 'TW', 2, 23, '1600', 'DWT', 'CFO', 'DWT'),
('mygame', 'TW', 3, 11, '1300', 'CFO', '001', 'CFO'),
('mygame', 'TW', 4, 3, '1200', 'JT', 'FAK', 'JT');

--
-- 觸發器 `contest`
--
DELIMITER $$
CREATE TRIGGER `c1` AFTER INSERT ON `contest` FOR EACH ROW BEGIN
IF (NEW.month > 12 OR NEW.month < 1)
THEN 
DELETE FROM contest WHERE
game_name=NEW.game_name AND
region=NEW.region AND
month=NEW.month AND
date=NEW.date AND
time=NEW.time AND
team1=NEW.team1 AND
team2=NEW.team2 AND
win_team=NEW.win_team;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `c2` AFTER INSERT ON `contest` FOR EACH ROW BEGIN
IF ((NEW.month = 1 OR NEW.month = 3 OR NEW.month = 5 OR NEW.month = 7 OR NEW.month = 8 OR NEW.month = 10 OR NEW.month = 12) AND (NEW.date > 31 OR NEW.date < 1))
THEN 
DELETE FROM contest WHERE
game_name=NEW.game_name AND
region=NEW.region AND
month=NEW.month AND
date=NEW.date AND
time=NEW.time AND
team1=NEW.team1 AND
team2=NEW.team2 AND
win_team=NEW.win_team;
ELSEIF ((NEW.month = 4 OR NEW.month = 6 OR NEW.month = 9 OR NEW.month = 11) AND (NEW.date > 30 OR NEW.date < 1) )
THEN
DELETE FROM contest WHERE
game_name=NEW.game_name AND
region=NEW.region AND
month=NEW.month AND
date=NEW.date AND
time=NEW.time AND
team1=NEW.team1 AND
team2=NEW.team2 AND
win_team=NEW.win_team;
ELSEIF (NEW.month = 2 AND(NEW.date > 28 OR NEW.date < 1) )
THEN
DELETE FROM contest WHERE
game_name=NEW.game_name AND
region=NEW.region AND
month=NEW.month AND
date=NEW.date AND
time=NEW.time AND
team1=NEW.team1 AND
team2=NEW.team2 AND
win_team=NEW.win_team;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `c3` AFTER INSERT ON `contest` FOR EACH ROW BEGIN
IF (SUBSTR(NEW.time,1,2)>'24' OR SUBSTR(NEW.time,1,2) < '0' OR SUBSTR(NEW.time,3,2)> '59' OR SUBSTR(NEW.time,3,2) < '0' )
THEN
DELETE FROM contest WHERE
game_name=NEW.game_name AND
region=NEW.region AND
month=NEW.month AND
date=NEW.date AND
time=NEW.time AND
team1=NEW.team1 AND
team2=NEW.team2 AND
win_team=NEW.win_team;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `c4` AFTER INSERT ON `contest` FOR EACH ROW BEGIN
IF (NEW.game_name = "" OR NEW.month = "" OR NEW.date = "" OR NEW.time = "" OR NEW.region = "" OR NEW.team1 = "" OR NEW.team2 = "" )
THEN 
DELETE FROM player WHERE
month=NEW.month AND
date=NEW.date AND
time=NEW.time AND
region=NEW.region AND
team1=NEW.team1 AND
team2=NEW.team2 AND
win_team=NEW.win_team AND
game_name=NEW.game_name;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 資料表結構 `game`
--

CREATE TABLE `game` (
  `game_name` varchar(50) NOT NULL,
  `developer` varchar(50) DEFAULT NULL,
  `logo_link` varchar(500) DEFAULT NULL,
  `game_description` varchar(1500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `game`
--

INSERT INTO `game` (`game_name`, `developer`, `logo_link`, `game_description`) VALUES
('League of Legends', 'Riot', 'https://i.pinimg.com/474x/ca/19/98/ca199818f18f7a6e778be38d733516c7.jpg', '一款5v5多人線上戰鬥技術型（MOBA）遊戲。'),
('mygame', 'me', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQePaKMGcz2fn0a--d6evLLCep1JNNXEHZuJA&usqp=CAU', 'aa'),
('跑跑', 'aa', 'https://img.ltn.com.tw/Upload/news/600/2022/11/01/phpeXAquf.jpg', 'hello');

--
-- 觸發器 `game`
--
DELIMITER $$
CREATE TRIGGER `g1` AFTER INSERT ON `game` FOR EACH ROW BEGIN
IF (NEW.game_name = "")
THEN 
DELETE FROM game WHERE
game_name=NEW.game_name AND
developer=NEW.developer AND
logo_link=NEW.logo_link AND
game_description=NEW.game_description;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 資料表結構 `player`
--

CREATE TABLE `player` (
  `name` varchar(40) NOT NULL,
  `country` varchar(40) DEFAULT NULL,
  `team` varchar(40) DEFAULT NULL,
  `game_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `player`
--

INSERT INTO `player` (`name`, `country`, `team`, `game_name`) VALUES
('369', 'China', 'JDG', 'League of Legends'),
('a', 'China', 'DK', 'League of Legends'),
('Canyon', 'Korea', 'DK', 'League of Legends'),
('Chovy', 'Korea', 'Gen.G', 'League of Legends'),
('Deft', 'Korea', 'DRX', 'League of Legends'),
('Faker', 'Korea', 'T1', 'League of Legends'),
('Fudge', 'Australia', 'C9', 'League of Legends'),
('Gumayusi', 'Korea', 'T1', 'League of Legends'),
('Hababi', 'Taiwan', 'PSG', 'League of Legends'),
('Johnny', 'Taiwan', 'AAS', 'mygame'),
('Keria', 'Korea', 'T1', 'League of Legends'),
('Kingen', 'Korea', 'DRX', 'League of Legends'),
('Liang', 'Taiwan', 'BYG', 'League of Legends'),
('Odoamne', 'Romania', 'RGE', 'League of Legends'),
('Oner', 'Korea', 'T1', 'League of Legends'),
('Rest', 'Taiwan', 'CFO', 'League of Legends'),
('Showmaker', 'Korea', 'DK', 'League of Legends'),
('Wako', 'Taiwan', 'BYG', 'League of Legends'),
('Zeka', 'Korea', 'DRX', 'League of Legends'),
('Zeus', 'Korea', 'T1', 'League of Legends');

--
-- 觸發器 `player`
--
DELIMITER $$
CREATE TRIGGER `p1` AFTER INSERT ON `player` FOR EACH ROW BEGIN
IF (NEW.name = "" OR NEW.game_name = "")
THEN 
DELETE FROM player WHERE
name=NEW.name AND
country=NEW.country AND
team=NEW.team AND
game_name=NEW.game_name;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 資料表結構 `region_name`
--

CREATE TABLE `region_name` (
  `game_name` varchar(50) NOT NULL,
  `region` varchar(20) NOT NULL,
  `season` varchar(20) NOT NULL,
  `begin_month` int(11) DEFAULT NULL,
  `begin_date` int(11) DEFAULT NULL,
  `end_month` int(11) DEFAULT NULL,
  `end_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `region_name`
--

INSERT INTO `region_name` (`game_name`, `region`, `season`, `begin_month`, `begin_date`, `end_month`, `end_date`) VALUES
('League of Legends', 'ddd', 'ff', 12, 21, 1, 15),
('League of Legends', 'DDD', 'sqweqr', 2, 25, 4, 25),
('League of Legends', 'LCK', 'spring', 1, 12, 4, 2),
('League of Legends', 'LCK', 'summer', 6, 15, 9, 3),
('League of Legends', 'LCS', 'spring', 2, 6, 4, 25),
('League of Legends', 'LCS', 'summer', 6, 17, 9, 12),
('League of Legends', 'LEC', 'spring', 1, 15, 4, 10),
('League of Legends', 'LEC', 'summer', 6, 17, 9, 11),
('League of Legends', 'LPL', 'spring', 1, 10, 4, 23),
('League of Legends', 'LPL', 'summer', 6, 11, 9, 4),
('League of Legends', 'PCS', 'spring', 2, 11, 4, 17),
('League of Legends', 'PCS', 'summer', 7, 1, 9, 5),
('mygame', 'TW', 'jjjbjbkjbkjb', 2, 22, 4, 25);

--
-- 觸發器 `region_name`
--
DELIMITER $$
CREATE TRIGGER `a1` AFTER INSERT ON `region_name` FOR EACH ROW BEGIN
IF (NEW.begin_month > 12 OR NEW.begin_month < 1)
THEN 
DELETE FROM region_name WHERE
game_name=NEW.game_name AND
region=NEW.region AND
season=NEW.season AND
begin_month=NEW.begin_month AND
begin_date=NEW.begin_date AND
end_month=NEW.end_month AND
end_date=NEW.end_date;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `a2` AFTER INSERT ON `region_name` FOR EACH ROW BEGIN
IF ((NEW.begin_month = 1 OR NEW.begin_month = 3 OR NEW.begin_month = 5 OR NEW.begin_month = 7 OR NEW.begin_month = 8 OR NEW.begin_month = 10 OR NEW.begin_month = 12) AND (NEW.begin_date > 31 OR NEW.begin_date < 1))
THEN 
DELETE FROM region_name WHERE
game_name=NEW.game_name AND
region=NEW.region AND
season=NEW.season AND
begin_month=NEW.begin_month AND
begin_date=NEW.begin_date AND
end_month=NEW.end_month AND
end_date=NEW.end_date;
ELSEIF ((NEW.begin_month = 4 OR NEW.begin_month = 6 OR NEW.begin_month = 9 OR NEW.begin_month = 11) AND (NEW.begin_date > 30 OR NEW.begin_date < 1) )
THEN
DELETE FROM region_name WHERE
game_name=NEW.game_name AND
region=NEW.region AND
season=NEW.season AND
begin_month=NEW.begin_month AND
begin_date=NEW.begin_date AND
end_month=NEW.end_month AND
end_date=NEW.end_date;
ELSEIF (NEW.begin_month = 2 AND(NEW.begin_date > 28 OR NEW.begin_date < 1) )
THEN
DELETE FROM region_name WHERE
game_name=NEW.game_name AND
region=NEW.region AND
season=NEW.season AND
begin_month=NEW.begin_month AND
begin_date=NEW.begin_date AND
end_month=NEW.end_month AND
end_date=NEW.end_date;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `a3` AFTER INSERT ON `region_name` FOR EACH ROW BEGIN
IF (NEW.end_month > 12 OR NEW.end_month < 1)
THEN 
DELETE FROM region_name WHERE
game_name=NEW.game_name AND
region=NEW.region AND
season=NEW.season AND
begin_month=NEW.begin_month AND
begin_date=NEW.begin_date AND
end_month=NEW.end_month AND
end_date=NEW.end_date;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `a4` AFTER INSERT ON `region_name` FOR EACH ROW BEGIN
IF ((NEW.end_month = 1 OR NEW.end_month = 3 OR NEW.end_month = 5 OR NEW.end_month = 7 OR NEW.end_month = 8 OR NEW.end_month = 10 OR NEW.end_month = 12) AND (NEW.end_date > 31 OR NEW.end_date < 1))
THEN 
DELETE FROM region_name WHERE
game_name=NEW.game_name AND
region=NEW.region AND
season=NEW.season AND
begin_month=NEW.begin_month AND
begin_date=NEW.begin_date AND
end_month=NEW.end_month AND
end_date=NEW.end_date;
ELSEIF ((NEW.end_month = 4 OR NEW.end_month = 6 OR NEW.end_month = 9 OR NEW.end_month = 11) AND (NEW.end_date > 30 OR NEW.end_date < 1) )
THEN
DELETE FROM region_name WHERE
game_name=NEW.game_name AND
region=NEW.region AND
season=NEW.season AND
begin_month=NEW.begin_month AND
begin_date=NEW.begin_date AND
end_month=NEW.end_month AND
end_date=NEW.end_date;
ELSEIF (NEW.end_month = 2 AND(NEW.end_date > 28 OR NEW.end_date < 1) )
THEN
DELETE FROM region_name WHERE
game_name=NEW.game_name AND
region=NEW.region AND
season=NEW.season AND
begin_month=NEW.begin_month AND
begin_date=NEW.begin_date AND
end_month=NEW.end_month AND
end_date=NEW.end_date;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `a5` AFTER INSERT ON `region_name` FOR EACH ROW BEGIN
IF (NEW.game_name = "" OR NEW.region = "" OR NEW.season = "")
THEN 
DELETE FROM player WHERE
season=NEW.season AND
region=NEW.region AND
begin_month=NEW.begin_month AND
begin_date=NEW.begin_date AND
end_month=NEW.end_month AND
end_date=NEW.end_date AND
game_name=NEW.game_name;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 資料表結構 `team_info`
--

CREATE TABLE `team_info` (
  `team` varchar(40) NOT NULL,
  `location` varchar(40) DEFAULT NULL,
  `game_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `team_info`
--

INSERT INTO `team_info` (`team`, `location`, `game_name`) VALUES
('001', 'UUU', 'League of Legends'),
('002', 'USA', 'mygame'),
('100T', 'USA', 'League of Legends'),
('AAS', 'USA', 'League of Legends'),
('AL', 'China', 'League of Legends'),
('AST', 'Danmark', 'League of Legends'),
('BDS', 'France', 'League of Legends'),
('BLG', 'China', 'League of Legends'),
('BRO', 'Korea', 'League of Legends'),
('BYG', 'Taiwan', 'League of Legends'),
('C9', 'USA', 'League of Legends'),
('CFO', 'Taiwan', 'League of Legends'),
('CLG', 'Canada', 'League of Legends'),
('DCG', 'Taiwan', 'League of Legends'),
('DIG', 'USA', 'League of Legends'),
('DK', 'Korea', 'League of Legends'),
('DRX', 'Korea', 'League of Legends'),
('DWT', 'Taiwan', 'League of Legends'),
('EDG', 'China', 'League of Legends'),
('EVL', 'USA', 'League of Legends'),
('FAK', 'Hongkong', 'League of Legends'),
('FLY', 'USA', 'League of Legends'),
('FNC', 'England', 'League of Legends'),
('FPX', 'China', 'League of Legends'),
('G2', 'Germany', 'League of Legends'),
('Gen.G', 'Korea', 'League of Legends'),
('GG', 'USA', 'League of Legends'),
('HLE', 'Korea', 'League of Legends'),
('IG', 'China', 'League of Legends'),
('IMM', 'USA', 'League of Legends'),
('IMP', 'Singapore', 'League of Legends'),
('JDG', 'China', 'League of Legends'),
('JT', 'Taiwan', 'League of Legends'),
('KDF', 'Korea', 'League of Legends'),
('KT', 'Korea', 'League of Legends'),
('LGD', 'China', 'League of Legends'),
('LNG', 'China', 'League of Legends'),
('LSB', 'Korea', 'League of Legends'),
('MAD', 'Spain', 'League of Legends'),
('MFT', 'Taiwan', 'League of Legends'),
('MSF', 'EU', 'League of Legends'),
('NS', 'Korea', 'League of Legends'),
('OMG', 'China', 'League of Legends'),
('PSG', 'HongKong', 'League of Legends'),
('RA', 'China', 'League of Legends'),
('RGE', 'EU', 'League of Legends'),
('RNG', 'China', 'League of Legends'),
('SEM9', 'Malaysia', 'League of Legends'),
('SK', 'Germany', 'League of Legends'),
('T1', 'Korea', 'League of Legends'),
('TES', 'China', 'League of Legends'),
('TL', 'USA', 'League of Legends'),
('TSM', 'USA', 'League of Legends'),
('TT', 'China', 'League of Legends'),
('UP', 'China', 'League of Legends'),
('V5', 'China', 'League of Legends'),
('VIT', 'France', 'League of Legends'),
('WBG', 'China', 'League of Legends'),
('WE', 'China', 'League of Legends'),
('XL', 'England', 'League of Legends');

--
-- 觸發器 `team_info`
--
DELIMITER $$
CREATE TRIGGER `t1` AFTER INSERT ON `team_info` FOR EACH ROW BEGIN
IF (NEW.team = "" OR NEW.game_name = "")
THEN 
DELETE FROM player WHERE
team=NEW.team AND
location=NEW.location AND
game_name=NEW.game_name;
END IF;
END
$$
DELIMITER ;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`game_name`,`region`,`month`,`date`,`time`,`team1`,`team2`),
  ADD KEY `team1` (`team1`),
  ADD KEY `team2` (`team2`),
  ADD KEY `game_name` (`game_name`),
  ADD KEY `region` (`region`);

--
-- 資料表索引 `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_name`);

--
-- 資料表索引 `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`name`,`game_name`),
  ADD KEY `team` (`team`),
  ADD KEY `game_name` (`game_name`);

--
-- 資料表索引 `region_name`
--
ALTER TABLE `region_name`
  ADD PRIMARY KEY (`game_name`,`region`,`season`),
  ADD KEY `game_name` (`game_name`),
  ADD KEY `region` (`region`);

--
-- 資料表索引 `team_info`
--
ALTER TABLE `team_info`
  ADD PRIMARY KEY (`team`,`game_name`),
  ADD KEY `game_name` (`game_name`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `contest`
--
ALTER TABLE `contest`
  ADD CONSTRAINT `contest_gamename` FOREIGN KEY (`game_name`) REFERENCES `game` (`game_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contest_region` FOREIGN KEY (`region`) REFERENCES `region_name` (`region`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contest_team1` FOREIGN KEY (`team1`) REFERENCES `team_info` (`team`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contest_team2` FOREIGN KEY (`team2`) REFERENCES `team_info` (`team`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_gamename` FOREIGN KEY (`game_name`) REFERENCES `game` (`game_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `player_team` FOREIGN KEY (`team`) REFERENCES `team_info` (`team`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `region_name`
--
ALTER TABLE `region_name`
  ADD CONSTRAINT `region_gamename` FOREIGN KEY (`game_name`) REFERENCES `game` (`game_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `team_info`
--
ALTER TABLE `team_info`
  ADD CONSTRAINT `team_info_gamename` FOREIGN KEY (`game_name`) REFERENCES `game` (`game_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
