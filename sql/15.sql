ALTER TABLE `organizations` CHANGE `open_bid` `open_bid` TINYINT(4) NOT NULL DEFAULT '1' COMMENT '0=closed bid 1=open bid';