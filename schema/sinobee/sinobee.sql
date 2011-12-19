/*********************************************************************************************
/*  表必须有名为 id 的主键。
/*  如果表中包含 created 或 modified 列，cakephp 将自动填充字段（如果适用）。
/*  表名必须为复数的(users、products)。其相应的模型将具有单数的名称(user、product)。
/*  如果要将表关联起来，外键应当遵循 table_id 格式，且使用单数的表名。
/*  例如，user_id、product_id 将是表 user、product的外键。
/*  字段flag用于且仅用于最多表示两种状态。如：0：无效 1： 有效
/*  操作两种状态用status字段。如：0:无效 1:有效 2:拟转让 9:待审核
/*  在使用0和1表示状态的时候，如无特殊说明0始终表示无效，1始终表示有效。
/*********************************************************************************************/

-- ----------------------------
-- 行政区划
-- ----------------------------
create table `regions` (
  `id`               int(6)      not null                  comment '主键',
  `name`             varchar(30) not null                  comment '地区名称',
  `flag`             int(1)      not null    default 1     comment '0无效，1有效',
  primary key  (id)
) engine=myisam default charset=utf8 comment='行政区划';


-- ----------------------------
-- 文章表
-- ----------------------------
create table `posts` (
  `id`                       bigint(20) unsigned not null auto_increment,
  `post_author`              bigint(20) unsigned not null default '0',
  `post_date`                datetime            not null default '0000-00-00 00:00:00',
  `post_date_gmt`            datetime            not null default '0000-00-00 00:00:00',
  `post_content`             longtext            not null,
  `post_title`               text                not null,
  `post_excerpt`             text                not null,
  `post_status`              varchar(20)         not null default 'publish',
  `comment_status`           varchar(20)         not null default 'open',
  `ping_status`              varchar(20)         not null default 'open',
  `post_password`            varchar(20)         not null default '',
  `post_name`                varchar(200)        not null default '',
  `to_ping`                  text                not null,
  `pinged`                   text                not null,
  `post_modified`            datetime            not null default '0000-00-00 00:00:00',
  `post_modified_gmt`        datetime            not null default '0000-00-00 00:00:00',
  `post_content_filtered`    text                not null                              ,
  `post_parent`              bigint(20) unsigned not null default '0',
  `guid`                     varchar(255)        not null default '',
  `menu_order`               int(11)             not null default '0',
  `post_type`                varchar(20)         not null default 'post',
  `post_mime_type`           varchar(100)        not null default '',
  `comment_count`            bigint(20)          not null default '0',
  primary key  (id),
  key `post_name` (`post_name`),
  key `type_status_date` (`post_type`,`post_status`,`post_date`,`id`),
  key `post_parent` (`post_parent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- ----------------------------
-- 文章扩展属性表(可根据需求增删)
-- ----------------------------
create table post_metas (
  `id`               int(10)       not null  auto_increment  comment '主键，值同posts主键值',
  `author`           varchar(100)                            comment '作者',
  `elite`            tinyint(1)                              comment '推荐',
  `picture`          varchar(100)                            comment '文章微缩图',
  `source`           varchar(100)                            comment '文章来源',
  `category`         int(10)                                 comment '文章所属栏目(分类)',
  `type`             varchar(20)                             comment '文章分类',
  primary key (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- ----------------------------
-- 文章评论表(同时可做F&Q系统表)
-- ----------------------------
create table `comments` (
  `id`               bigint(20) unsigned not null auto_increment,
  `post_id`          bigint(20) unsigned not null default '0',
  `author`           tinytext            not null,
  `author_email`     varchar(100)        not null default '',
  `author_url`       varchar(200)        not null default '',
  `author_ip`        varchar(100)        not null default '',
  `content`          text                not null,
  `karma`            int(11)             not null default '0',
  `approved`         varchar(20)         not null default '1',
  `agent`            varchar(255)        not null default '',
  `type`             varchar(20)         not null default '',
  `parent`           bigint(20) unsigned not null default '0',
  `user_id`          bigint(20) unsigned not null default '0',
  `created`          datetime                                        comment '创建日期',
  `modified`         datetime                                        comment '修改日期',
  primary key  (id),
  key `approved` (`approved`),
  key `post_id` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- ----------------------------
-- 角色表
-- ----------------------------
create table roles (
  id                   int(10)         not null auto_increment comment '主键',
  name                 varchar(200)    not null                comment '角色名称',
  type                 int(1)          not null default 1      comment '类型',
  hierarchy            int(1)                                  comment '角色等级',
  parent_id            int(1)                                  comment '父亲角色',
  start_time           datetime                                comment '生效日期',
  end_time             datetime                                comment '终止日期',
  flag                 int(1)          not null default 1      comment '有效标志(1: 有效; 0: 无效)',
  remark               varchar(200)                            comment '备注',
  created              datetime                                comment '创建日期',
  modified             datetime                                comment '修改日期',
  primary key  (id)
) engine=myisam default charset=utf8 comment='角色';


-- ----------------------------
-- 栏目表
-- ----------------------------
create table modules (
  id              int(10)         not null auto_increment comment '主键',
  name            varchar(60)     not null                comment '栏目(功能) 名称',
  type            varchar(15)     default 'system'        comment '栏目(功能) 类型 (system:系统管理模块 website:网站栏目)',
  parent_id       int(10)                                 comment '上级栏目id',
  lef             int(10)                                 comment '左左',
  rght            int(10)                                 comment '右右',
  hierarchy       int(3)          default 1               comment '级别',
  node            tinyint(1)      default 0               comment '节点 (1:根  0:节点 )',
  module_image    varchar(200)    default 'icon-nav'      comment '栏目图标 (限止大小、长度、宽度)',
  url             varchar(200)                            comment '链接地址',
  target          varchar(20)                             comment '打开方式 (_top/_self/_parent/_winname/_blank)',
  delete_permit   tinyint(1)                              comment '此栏目是否允许删除(1：允许 0：不允许)',
  add_permit      tinyint(1)                              comment '此栏目是否允许新增子栏目(1：允许 0：不允许)',
  publish_permit  tinyint(1)                              comment '此栏目是否允许上文章',
  duty_person     varchar(200)                            comment '栏目责任人',
  duty_company    int(10)	                              comment '栏目责任单位',
  duty_leader     varchar(200)                            comment '栏目责任领导',
  ordering        int(3)                                  comment '栏目的排序',
  maximum         int(10)         default 5               comment '每页最大显示记录数',
  visit_count     int(10)                                 comment '栏目被访问的次数',
  display_style   varchar(100)                            comment '显示风格',
  setting         varchar(4000)                           comment '设置',
  description     varchar(2000)                           comment '简介',
  flag            tinyint(1)      default 1               comment '有效标志(1：有效  2：无效)',
  created         datetime                                comment '创建日期',
  modified        datetime                                comment '修改日期',
  primary key  (id)
 ) engine=myisam default charset=utf8 comment='栏目表';


-- ----------------------------
-- 角色所属栏目
-- ----------------------------
create table roles_modules (
  id              int(10)      not null auto_increment comment '主键',
  role_id         int(10)      not null ,  -- 角色id
  module_id       int(10)      not null ,  -- 功能id
  start_time      datetime              ,  -- 生效日期
  end_time        datetime              ,  -- 终止日期
  primary key  (id)
) engine=myisam default charset=utf8 comment='角色所属栏目';


-- ----------------------------
-- 文章栏目对应表
-- ----------------------------
create table posts_modules (
  post_id      int(10)      not null ,  -- 文章id
  module_id    int(10)      not null    -- 功能id
) engine=myisam default charset=utf8 comment='文章栏目对应表';


-- ----------------------------
-- 用户表(wordpress用户表)
-- ----------------------------
create table `users` (
  `ID`                     bigint(20) unsigned   not null auto_increment,
  `user_login`             varchar(60)           not null default '',
  `user_pass`              varchar(64)           not null default '',
  `user_nicename`          varchar(50)           not null default '',
  `user_email`             varchar(100)          not null default '',
  `user_url`               varchar(100)          not null default '',
  `user_registered`        datetime              not null default '0000-00-00 00:00:00',
  `user_activation_key`    varchar(60)           not null default '',
  `user_status`            int(11)               not null default '0',
  `display_name`           varchar(250)          not null default '',
  `spam`                   tinyint(2)            not null default '0',
  `deleted`                tinyint(2)            not null default '0',
  primary key (`id`),
  key `user_login_key` (`user_login`),
  key `user_nicename` (`user_nicename`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



-- ----------------------------
-- 用户表属性表
-- ----------------------------
create table user_metas(
  id               int(10)       not null  auto_increment  comment '主键，值同members主键值',
  role_id          int(6)        default 1                 comment '用户角色',
  department_id    int(10)                                 comment '部门ID'
  last_ip          varchar(64)                             comment '最后登录ip地址',
  login_count      int(6)                                  comment '登录次数',
  cookie_token     varchar(255)                            comment 'cookie令牌',
  avatar           varchar(255)                            comment '用户头像/相片',
  description      varchar(4000)                           comment '用户简介',  
  flag             tinyint(1)    not null default 1        comment '状态',
  created          datetime                                comment '创建日期',
  modified         datetime                                comment '修改日期',
  primary key (id)
) engine=myisam default charset=utf8 comment='用户扩展信息表';


-- ----------------------------
-- 会员表
-- ----------------------------
create table members(
  id                   int(10)         not null auto_increment comment '主键',
  name                 varchar(20)     not null                comment '姓名',
  gender               tinyint(1)      not null  default 1     comment '性别: 1:男 0:女',
  cell_number          varchar(50)                             comment '移动电话',
  company              varchar(100)                            comment '公司名称',
  address              varchar(500)                            comment '地址',
  city                 varchar(40)                             comment '城市',
  state                varchar(40)                             comment '省/州',
  postcode             varchar(10)                             comment '邮编',
  telphone_number      varchar(100)                            comment '电话号码',
  fax_number           varchar(100)                            comment '传真号码',
  site                 varchar(200)                            comment '公司网址',
  status               int(1)        not null default 1        comment '状态【1-等待审核 2-审核通过(正常) 3-审核未通过 4-锁定】',
  created              datetime                                comment '创建日期',
  modified             datetime                                comment '修改日期',
  primary key (id)
) engine=myisam default charset=utf8 comment='会员表';


-- ---------------------------------------
-- 部门表(部门性质、类别和属性见CODES表)
-- ---------------------------------------
create table departments (
  id                   int(10)          not null auto_increment comment '主键',
  name                 varchar(100)     not null                comment '名称',
  parent_id            int(10)                                  comment '上级部门ID', 
  lft                  int(10)                                  comment '左左',
  rght                 int(10)                                  comment '右右',
  short_name           varchar(50)                              comment '简称',
  english_name         varchar(100)                             comment '英文名称',
  hierarchy            int(3)                                   comment '级别',
  logo_url             varchar(100)                             comment '徽标',
  dept_character_id    int(10)                                  comment '性质表',
  dept_type_id         int(10)                                  comment '类别表',
  dept_attribute_id    int(10)                                  comment '属性表',
  nation_id            int(10)                                  comment '国家',
  region_id            int(10)                                  comment '地区',
  city_id              int(10)                                  comment '城市',
  address              varchar(100)                             comment '地址',
  postcode             varchar(100)                             comment '邮编',
  telephone            varchar(100)                             comment '电话',
  hotline              varchar(100)                             comment '服务热线',
  fax                  varchar(100)                             comment '传真',
  website              varchar(100)                             comment '网站',
  email                varchar(100)                             comment '电子邮件',
  linkman              varchar(100)                             comment '联系人',
  order_list           int(3)                                   comment '排序',
  description          text                                     comment '描述',
  flag                 int(1)           not null default 1      comment '状态  1有效  0无效',
  created              datetime                                 comment '创建日期',
  modified             datetime                                 comment '修改日期', 
  primary key  (id)
) engine=myisam default charset=utf8 comment='部门表';


-- ----------------------------
-- 用户所属部门表
-- ----------------------------
create table users_departments (
  user_id          int(10)      not null                       comment '用户ID',
  department_id    int(10)      not null                       comment '部门ID'
) engine=myisam default charset=utf8 comment='用户所属部门表';


-- ----------------------------
-- 访问日志表
-- ----------------------------
create table sys_logs (
  `id`                  int(10)             not null  auto_increment comment '主键',
  `user_id`             int(10)                                      comment '用户ID',
  `system_name`         varchar(50)                                  comment '操作系统',
  `brower_name`         varchar(100)                                 comment '浏览器',
  `ip`                  varchar(50)                                  comment 'ip地址',
  `page_name`           varchar(100)                                 comment '页面名称',
  `type`                int(1)                                       comment '访问页面类型',
  `module_id`           int(10)                                      comment '访问的栏目ID',
  `created`             datetime                                     comment '创建日期',
  primary key (id) 
) engine=myisam default charset=utf8 comment='访问日志表';


-- ----------------------------
-- 附件表
-- ----------------------------
CREATE TABLE `attachments`  (
  `id`                  int(10)      NOT NULL    AUTO_INCREMENT  COMMENT '主键',
  `name`                varchar(100) NOT NULL                    COMMENT '文件名称',
  `type_id`             int(10)                                  COMMENT '文件类型',
  `url`                 varchar(100)                             COMMENT '文件储存位置',
  `tag`                 varchar(1000)                            COMMENT 'TAG',
  `description`         varchar(1000)                            COMMENT '说明', 
  `created`             datetime                                 COMMENT '创建日期',  
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ----------------------------
-- 个人备忘表
-- ----------------------------
CREATE TABLE `memos`  (
  `id`                  int(10)      NOT NULL                    COMMENT '主键',
  `description`         varchar(4000)                            COMMENT '说明', 
  `created`             datetime                                 COMMENT '创建日期', 
  `modified`            datetime                                 comment '修改日期',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- ----------------------------
-- 链接表
-- ----------------------------
CREATE TABLE `interlinkages` (
  `id`                  int(10)      NOT NULL    AUTO_INCREMENT  COMMENT '主键',
  `name`                varchar(100) NOT NULL                    COMMENT '文件名称',
  `type_id`             int(10)                                  COMMENT '文件类型',
  `file_path`           varchar(100)                             COMMENT '文件储存位置',
  `url`                 varchar(100)                             COMMENT '链接资源',
  `tag`                 varchar(1000)                            COMMENT 'TAG',
  `description`         varchar(1000)                            COMMENT '说明', 
  `start_time`          datetime                                 COMMENT '生效日期',
  `end_time`            datetime                                 COMMENT '终止日期',  
  `created`             datetime                                 COMMENT '创建日期',
  PRIMARY KEY  (`id`)  
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



CREATE TABLE `settings` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `input_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'text',
  `editable` tinyint(1) NOT NULL DEFAULT '1',
  `weight` int(11) DEFAULT NULL,
  `params` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;