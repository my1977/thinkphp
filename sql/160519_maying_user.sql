CREATE TABLE `zt_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL DEFAULT '' COMMENT '邮件',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '密码',
  `name` varchar(10) NOT NULL DEFAULT '' COMMENT '姓名',
  `sex` tinyint(4) NOT NULL DEFAULT '0' COMMENT '性别 1:男 2:女',
  `age` tinyint(4) NOT NULL DEFAULT '0' COMMENT '年龄',
  `address` varchar(100) NOT NULL DEFAULT '' COMMENT '地址',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态 0:正常 -1删除',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;