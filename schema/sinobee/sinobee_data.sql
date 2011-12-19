insert into `members`(`id`,`name`,`gender`,`cell_number`,`company`,`address`,`city`,`state`,`postcode`,`telphone_number`,`fax_number`,`site`,`status`,`created`,`modified`) values (1,'系统管理员',1,'',null,null,null,null,null,'',null,'',1,'2009-08-30 21:01:55','2009-08-30 21:01:55');

insert into `users`(`ID`,`user_login`,`user_pass`,`user_nicename`,`user_email`,`user_url`,`user_registered`,`user_activation_key`,`user_status`,`display_name`,`spam`,`deleted`) values (1,'admin','$P$BY0gql/UvrzHEATGjD/sQxszqL/Oc/.','系统管理员','admin@admin.com','','2010-08-30 21:00:00','',0,'系统管理员',0,0);

insert into `user_metas`(`id`,`role_id`,`last_ip`,`login_count`,`cookie_token`,`flag`,`created`,`modified`) values (1,0,null,null,null,1,'2010-08-30 21:01:56','2010-08-30 21:01:56');

insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (6,'Site.title','Croogo','','','',1,1,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (7,'Site.tagline','A CakePHP powered Content Management System.','','','textarea',1,2,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (8,'Site.email','you@your-site.com','','','',1,3,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (9,'Site.status','1','','','checkbox',1,5,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (12,'Meta.robots','index, follow','','','',1,6,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (13,'Meta.keywords','croogo, Croogo','','','textarea',1,7,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (14,'Meta.description','Croogo - A CakePHP powered Content Management System','','','textarea',1,8,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (15,'Meta.generator','Croogo - Content Management System','','','',0,9,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (16,'Service.akismet_key','your-key','','','',1,11,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (17,'Service.recaptcha_public_key','your-public-key','','','',1,12,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (18,'Service.recaptcha_private_key','your-private-key','','','',1,13,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (19,'Service.akismet_url','http://your-blog.com','','','',1,10,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (20,'Site.theme','','','','',0,14,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (21,'Site.feed_url','','','','',0,15,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (22,'Reading.nodes_per_page','5','','','',1,16,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (23,'Writing.wysiwyg','1','Enable WYSIWYG editor','','checkbox',1,17,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (24,'Comment.level','1','','levels deep (threaded comments)','',1,18,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (25,'Comment.feed_limit','10','','number of comments to show in feed','',1,19,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (26,'Site.locale','eng','','','text',0,20,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (27,'Reading.date_time_format','D, M d Y H:i:s','','','',1,21,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (28,'Comment.date_time_format','M d, Y','','','',1,22,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (29,'Site.timezone','0','','zero (0) for GMT','',1,4,'');
insert into `settings`(`id`,`key`,`value`,`title`,`description`,`input_type`,`editable`,`weight`,`params`) values (32,'Hook.bootstraps','','','','',0,23,'');