/* Database export results for db absensireska */

/* Preserve session variables */
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS=0;

/* Export data */

truncate table `mst_groupmenu`;

drop table if exists `mst_groupmenu`;

/* Table structure for mst_groupmenu */
CREATE TABLE `mst_groupmenu` (
  `GROUPMENUID` varchar(50) NOT NULL,
  `DESKRIPSI` varchar(255) DEFAULT NULL,
  `CREATEDDATE` date DEFAULT NULL,
  `CREATEDUSER` varchar(50) DEFAULT NULL,
  `UPDATEDDATE` date DEFAULT NULL,
  `UPDATEDUSER` varchar(50) DEFAULT NULL,
  `ISDELETED` char(1) DEFAULT NULL,
  `DELETEDDATE` date DEFAULT NULL,
  `DELETEDUSER` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`GROUPMENUID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/* data for Table mst_groupmenu */

truncate table `mst_kategori`;

drop table if exists `mst_kategori`;

/* Table structure for mst_kategori */
CREATE TABLE `mst_kategori` (
  `IDKATEGORI` varchar(50) NOT NULL,
  `DESKRIPSI` varchar(200) NOT NULL,
  `CREATEDDATE` date DEFAULT NULL,
  `CREATEDUSER` varchar(50) DEFAULT NULL,
  `UPDATEDDATE` date DEFAULT NULL,
  `UPDATEDUSER` varchar(50) DEFAULT NULL,
  `ISDELETED` char(1) DEFAULT NULL,
  `DELETEDDATE` date DEFAULT NULL,
  `DELETEDUSER` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDKATEGORI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/* data for Table mst_kategori */
INSERT INTO `mst_kategori` VALUES ("CHR","Kategori Pegawai","2016-08-09","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_kategori` VALUES ("DAOP","Daerah Operasional","2016-08-09","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_kategori` VALUES ("DEPT","Department","2015-12-09","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_kategori` VALUES ("GHR","Kelompok Pegawai","2016-08-09","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_kategori` VALUES ("KERETA","Kereta Api","2016-08-09","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_kategori` VALUES ("KOTA","Kota","2015-12-09","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_kategori` VALUES ("PRESENSI","Status Kehadiran","2016-08-09","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_kategori` VALUES ("SHR","Status Pegawai","2016-08-09","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_kategori` VALUES ("THEME","Profile Theme","2015-12-09","super",NULL,NULL,NULL,NULL,NULL);

truncate table `mst_lookup`;

drop table if exists `mst_lookup`;

/* Table structure for mst_lookup */
CREATE TABLE `mst_lookup` (
  `IDLOOKUP` varchar(20) NOT NULL,
  `DESKRIPSI` varchar(200) DEFAULT NULL,
  `IDKATEGORI` varchar(50) DEFAULT NULL,
  `CREATEDDATE` date DEFAULT NULL,
  `CREATEDUSER` varchar(50) DEFAULT NULL,
  `UPDATEDDATE` date DEFAULT NULL,
  `UPDATEDUSER` varchar(50) DEFAULT NULL,
  `ISDELETED` char(1) DEFAULT NULL,
  `DELETEDDATE` date DEFAULT NULL,
  `DELETEDUSER` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDLOOKUP`),
  KEY `mst_lookup_fk` (`IDKATEGORI`),
  CONSTRAINT `mst_lookup_fk` FOREIGN KEY (`IDKATEGORI`) REFERENCES `mst_kategori` (`IDKATEGORI`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/* data for Table mst_lookup */
INSERT INTO `mst_lookup` VALUES ("BDG01","Bandung Kota","KOTA","2015-12-09","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("bootstrap","bootstrap Theme","THEME",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("CHR01","Staff","CHR","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("CHR02","Operasional","CHR","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("CHR03","Kru Lintas","CHR","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("DAOP1","DAOP 1","DAOP","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("DAOP2","DAOP 2","DAOP","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("DAOP3","DAOP 3","DAOP","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("DAOP4","DAOP 4","DAOP","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("DEP01","Departemen IT","DEPT","2015-12-09","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("GHR01","Pegawai Tetap","GHR","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("GHR02","Pegawai Kontrak","GHR","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("GHR03","Pegawai Harian","GHR","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("metro-blue","Metro-blue Theme","THEME",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("metro-gray","Metro-gray Theme","THEME",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("metro-green","metro-green Theme","THEME",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("metro-orange","metro-orange Theme","THEME",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("metro-red","metro-red Theme","THEME",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("PRS01","Ijin","PRESENSI","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("PRS02","Sakit","PRESENSI","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("PRS03","Hadir","PRESENSI","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("PRS04","Alpha (Tanpa Keterangan)","PRESENSI","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("SHR01","Aktif","SHR","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("SHR02","Tidak Aktif","SHR","2016-08-10","super",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("ui-cupertino","ui-cupertino theme","THEME",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("ui-pepper-grinder","ui-pepper-grinder theme","THEME",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_lookup` VALUES ("ui-sunny","ui-sunny theme","THEME",NULL,NULL,NULL,NULL,NULL,NULL,NULL);

truncate table `mst_org`;

drop table if exists `mst_org`;

/* Table structure for mst_org */
CREATE TABLE `mst_org` (
  `ENTITYID` varchar(20) NOT NULL,
  `NAMA` varchar(200) NOT NULL,
  `DESKRIPSI` varchar(200) DEFAULT NULL,
  `CREATEDDATE` date DEFAULT NULL,
  `CREATEDUSER` varchar(50) DEFAULT NULL,
  `UPDATEDDATE` date DEFAULT NULL,
  `UPDATEDUSER` varchar(50) DEFAULT NULL,
  `ISDELETED` char(1) DEFAULT NULL,
  `DELETEDDATE` date DEFAULT NULL,
  `DELETEDUSER` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ENTITYID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/* data for Table mst_org */
INSERT INTO `mst_org` VALUES ("RESKA","PT RESKA","PT RESKA",NULL,NULL,"2015-12-09","super",NULL,NULL,NULL);

truncate table `mst_soff`;

drop table if exists `mst_soff`;

/* Table structure for mst_soff */
CREATE TABLE `mst_soff` (
  `ENTITYID` varchar(20) NOT NULL,
  `NAMA` varchar(200) NOT NULL,
  `ALAMAT` varchar(200) DEFAULT NULL,
  `KOTA` varchar(20) DEFAULT NULL,
  `REGION` varchar(20) DEFAULT NULL,
  `KODEPOS` varchar(20) DEFAULT NULL,
  `TELP1` varchar(20) DEFAULT NULL,
  `TELP2` varchar(20) DEFAULT NULL,
  `CREATEDDATE` date DEFAULT NULL,
  `CREATEDUSER` varchar(50) DEFAULT NULL,
  `UPDATEDDATE` date DEFAULT NULL,
  `UPDATEDUSER` varchar(50) DEFAULT NULL,
  `ISDELETED` char(1) DEFAULT NULL,
  `DELETEDDATE` date DEFAULT NULL,
  `DELETEDUSER` varchar(50) DEFAULT NULL,
  `ORGID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ENTITYID`),
  KEY `mst_soff_fk` (`ORGID`),
  CONSTRAINT `mst_soff_fk` FOREIGN KEY (`ORGID`) REFERENCES `mst_org` (`ENTITYID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/* data for Table mst_soff */
INSERT INTO `mst_soff` VALUES ("PST","KANTOR PUSAT",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,"RESKA");

truncate table `mst_tcode`;

drop table if exists `mst_tcode`;

/* Table structure for mst_tcode */
CREATE TABLE `mst_tcode` (
  `IDMENU` varchar(50) NOT NULL,
  `DISPLAYTEXT` varchar(100) DEFAULT NULL,
  `FORMAPLIKASI` varchar(200) DEFAULT NULL,
  `TIPE` varchar(50) DEFAULT NULL,
  `IMAGE` varchar(100) DEFAULT NULL,
  `PARAMETERFORM` varchar(200) DEFAULT NULL,
  `GUIID` varchar(50) DEFAULT NULL,
  `URL` varchar(250) DEFAULT NULL,
  `CREATEDDATE` date DEFAULT NULL,
  `CREATEDUSER` varchar(50) DEFAULT NULL,
  `UPDATEDDATE` date DEFAULT NULL,
  `UPDATEDUSER` varchar(50) DEFAULT NULL,
  `ISDELETED` char(1) DEFAULT NULL,
  `DELETEDDATE` date DEFAULT NULL,
  `DELETEDUSER` varchar(50) DEFAULT NULL,
  `ISUSED` bit(1) DEFAULT NULL,
  PRIMARY KEY (`IDMENU`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/* data for Table mst_tcode */
INSERT INTO `mst_tcode` VALUES ("EMP01","Pegawai","","FILE","","","","application/employee/emp01.php",NULL,NULL,"2016-08-14","super",NULL,NULL,NULL,"1");
INSERT INTO `mst_tcode` VALUES ("HR01","Pegawai","","FILE","","","","application/employee/emp01.php","2016-08-10","super","2016-08-14","super",NULL,NULL,NULL,NULL);
INSERT INTO `mst_tcode` VALUES ("HR02","Kategori Pegawai","","FILE","","","","application/maintenance/underconstruction.php","2016-08-10","super",NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tcode` VALUES ("MASTER","Master","","FOLDER","","","","","2016-08-10","super",NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tcode` VALUES ("MD01","Master Category",NULL,"FILE",NULL,NULL,NULL,"application/Master/md01.php",NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
INSERT INTO `mst_tcode` VALUES ("MD02","Master Lookup",NULL,"FILE",NULL,NULL,NULL,"application/Master/md02.php",NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
INSERT INTO `mst_tcode` VALUES ("MDATA","Global Data",NULL,"FOLDER",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
INSERT INTO `mst_tcode` VALUES ("MENU","Menus","","FOLDER","","","","",NULL,NULL,"2016-08-05","super",NULL,NULL,NULL,"0");
INSERT INTO `mst_tcode` VALUES ("MN01","Master Menu",NULL,"FILE",NULL,NULL,NULL,"application/Menu/mn01.php",NULL,NULL,NULL,NULL,NULL,NULL,NULL,"0");
INSERT INTO `mst_tcode` VALUES ("MN02","Setting Menu",NULL,"FILE",NULL,NULL,NULL,"application/Menu/mn02.php",NULL,NULL,NULL,NULL,NULL,NULL,NULL,"0");
INSERT INTO `mst_tcode` VALUES ("MN03","Group Menu",NULL,"FILE",NULL,NULL,NULL,"application/Menu/mn03.php",NULL,NULL,NULL,NULL,NULL,NULL,NULL,"0");
INSERT INTO `mst_tcode` VALUES ("ORG","Organization",NULL,"FILE",NULL,NULL,NULL,"application/orgs/org.php",NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
INSERT INTO `mst_tcode` VALUES ("ORGF","Organization & Office",NULL,"FOLDER",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
INSERT INTO `mst_tcode` VALUES ("PRSC01","Presensi","","FILE","","","","application/maintenance/underconstruction.php","2016-08-10","super",NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tcode` VALUES ("ROOT","Menu Utama",NULL,"FOLDER",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
INSERT INTO `mst_tcode` VALUES ("RPT","Laporan","","FOLDER","","","","","2016-08-10","super",NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tcode` VALUES ("SCHD01","Jadwal Kereta","","FILE","","","","application/maintenance/underconstruction.php","2016-08-10","super",NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tcode` VALUES ("SCHD02","Jadwal","","FILE","","","","application/maintenance/underconstruction.php","2016-08-10","super",NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tcode` VALUES ("SET","Setting",NULL,"FOLDER",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
INSERT INTO `mst_tcode` VALUES ("SOFF","Sales Office",NULL,"FILE",NULL,NULL,NULL,"application/orgs/soff.php",NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
INSERT INTO `mst_tcode` VALUES ("STS","Station","","FILE","","","","application/maintenance/underconstruction.php","2016-08-10","super",NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tcode` VALUES ("TRANS","Transaksi","","FOLDER","","","","","2016-08-10","super",NULL,NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tcode` VALUES ("US01","Master User",NULL,"FILE",NULL,NULL,NULL,"application/User/us01.php",NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
INSERT INTO `mst_tcode` VALUES ("US02","Change User Password",NULL,"FILE",NULL,NULL,NULL,"application/User/changeuserpassword.php",NULL,NULL,NULL,NULL,NULL,NULL,NULL,"1");
INSERT INTO `mst_tcode` VALUES ("USER","Setting User",NULL,"FOLDER",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,"0");

truncate table `mst_tr_tcode`;

drop table if exists `mst_tr_tcode`;

/* Table structure for mst_tr_tcode */
CREATE TABLE `mst_tr_tcode` (
  `IDTRTCODE` int(11) NOT NULL AUTO_INCREMENT,
  `PARENTID` int(11) DEFAULT NULL,
  `TCODEID` varchar(50) NOT NULL,
  `URUTAN` int(11) DEFAULT NULL,
  `CREATEDDATE` date DEFAULT NULL,
  `CREATEDUSER` varchar(50) DEFAULT NULL,
  `UPDATEDDATE` date DEFAULT NULL,
  `UPDATEDUSER` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDTRTCODE`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/* data for Table mst_tr_tcode */
INSERT INTO `mst_tr_tcode` VALUES (1,0,"ROOT",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (2,1,"SET",4,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (3,2,"MENU",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (4,3,"MN01",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (5,3,"MN02",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (6,3,"MN03",NULL,NULL,NULL,NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (7,2,"USER",2,"2016-08-05","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (8,7,"US01",0,"2016-08-05","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (9,7,"US02",1,"2016-08-05","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (10,7,"EMP01",2,"2016-08-05","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (11,2,"ORGF",2,"2016-08-05","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (12,11,"ORG",0,"2016-08-05","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (13,11,"SOFF",1,"2016-08-05","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (14,1,"MDATA",2,"2016-08-05","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (15,14,"MD01",0,"2016-08-05","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (16,14,"MD02",1,"2016-08-05","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (17,1,"MASTER",0,"2016-08-10","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (18,1,"TRANS",0,"2016-08-10","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (19,17,"HR01",0,"2016-08-10","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (20,17,"HR02",0,"2016-08-10","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (21,17,"STS",0,"2016-08-10","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (22,17,"SCHD01",0,"2016-08-10","super","2016-08-10","super");
INSERT INTO `mst_tr_tcode` VALUES (23,17,"SCHD02",0,"2016-08-10","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (24,18,"PRSC01",0,"2016-08-10","super",NULL,NULL);
INSERT INTO `mst_tr_tcode` VALUES (25,1,"RPT",0,"2016-08-10","super",NULL,NULL);

truncate table `mst_users`;

drop table if exists `mst_users`;

/* Table structure for mst_users */
CREATE TABLE `mst_users` (
  `IDUSER` varchar(50) NOT NULL,
  `NAMA` varchar(250) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `GROUPMENUID` varchar(50) DEFAULT NULL,
  `CREATEDDATE` date DEFAULT NULL,
  `CREATEDUSER` varchar(50) DEFAULT NULL,
  `UPDATEDDATE` date DEFAULT NULL,
  `UPDATEDUSER` varchar(50) DEFAULT NULL,
  `ISDELETED` char(1) DEFAULT NULL,
  `DELETEDDATE` date DEFAULT NULL,
  `DELETEDUSER` varchar(50) DEFAULT NULL,
  `THEME` varchar(20) DEFAULT NULL,
  `ORG` varchar(20) DEFAULT NULL,
  `SOFF` varchar(20) DEFAULT NULL,
  `EMPLOYEEID` varchar(20) DEFAULT NULL,
  `LANDINGPAGE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDUSER`),
  KEY `mst_users_fk` (`THEME`),
  CONSTRAINT `mst_users_fk` FOREIGN KEY (`THEME`) REFERENCES `mst_lookup` (`IDLOOKUP`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/* data for Table mst_users */
INSERT INTO `mst_users` VALUES ("super","super","5f4dcc3b5aa765d61d8327deb882cf99",NULL,NULL,NULL,"2016-08-05","super",NULL,NULL,NULL,"bootstrap","RESKA",NULL,NULL,"");

truncate table `mst_users_favorites`;

drop table if exists `mst_users_favorites`;

/* Table structure for mst_users_favorites */
CREATE TABLE `mst_users_favorites` (
  `FAVID` int(11) NOT NULL AUTO_INCREMENT,
  `TCODEID` varchar(50) NOT NULL,
  `CREATEDDATE` date DEFAULT NULL,
  `CREATEDUSER` varchar(50) DEFAULT NULL,
  `IDUSER` varchar(50) NOT NULL,
  `Tipe` char(1) DEFAULT NULL,
  PRIMARY KEY (`FAVID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/* data for Table mst_users_favorites */
INSERT INTO `mst_users_favorites` VALUES (1,"MN01","2016-08-05","super","super","F");
INSERT INTO `mst_users_favorites` VALUES (2,"MN02","2016-08-05","super","super","F");
INSERT INTO `mst_users_favorites` VALUES (3,"MD01","2016-08-05","super","super","F");
INSERT INTO `mst_users_favorites` VALUES (4,"MD02","2016-08-05","super","super","F");
INSERT INTO `mst_users_favorites` VALUES (5,"HR01","2016-08-14","super","super","F");

truncate table `mst_usertcode_groupmenu`;

drop table if exists `mst_usertcode_groupmenu`;

/* Table structure for mst_usertcode_groupmenu */
CREATE TABLE `mst_usertcode_groupmenu` (
  `GROUPMENUID` varchar(50) NOT NULL,
  `IDTRTCODE` bigint(20) NOT NULL,
  `CREATEDDATE` date DEFAULT NULL,
  `CREATEDUSER` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`GROUPMENUID`,`IDTRTCODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/* data for Table mst_usertcode_groupmenu */

truncate table `pay_employee`;

drop table if exists `pay_employee`;

/* Table structure for pay_employee */
CREATE TABLE `pay_employee` (
  `EMPLOYEEID` varchar(20) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `ALAMAT` varchar(200) DEFAULT NULL,
  `DEPT` varchar(20) NOT NULL,
  `CREATEDDATE` date DEFAULT NULL,
  `CREATEDUSER` varchar(50) DEFAULT NULL,
  `UPDATEDDATE` date DEFAULT NULL,
  `UPDATEDUSER` varchar(50) DEFAULT NULL,
  `ISDELETED` char(1) DEFAULT NULL,
  `DELETEDDATE` date DEFAULT NULL,
  `DELETEDUSER` varchar(50) DEFAULT NULL,
  `TELP1` varchar(20) DEFAULT NULL,
  `TELP2` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TGLLAHIR` date DEFAULT NULL,
  `TMPLAHIR` varchar(100) DEFAULT NULL,
  `GHR` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`EMPLOYEEID`),
  KEY `pay_employee_fk` (`DEPT`),
  CONSTRAINT `pay_employee_fk` FOREIGN KEY (`DEPT`) REFERENCES `mst_lookup` (`IDLOOKUP`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/* data for Table pay_employee */
INSERT INTO `pay_employee` VALUES ("EMP01","Yoyok Tri Wicaksono","Bandung","DEP01","2015-12-11","super","2016-08-14","super",NULL,NULL,NULL,"","","","1980-01-23","","GHR01");
INSERT INTO `pay_employee` VALUES ("TEST","TEST","TEST","DEP01","2016-08-14","super",NULL,NULL,NULL,NULL,NULL,"312312","12312312","TEST@TEST.COM","2016-08-14","TEST","GHR02");

drop view if exists `lookup`;

/* create command for lookup */

DELIMITER $$
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lookup` AS select `a`.`IDLOOKUP` AS `IDLOOKUP`,`a`.`DESKRIPSI` AS `DESKRIPSI`,`a`.`IDKATEGORI` AS `IDKATEGORI`,`c`.`DESKRIPSI` AS `KATEGORI` from (`mst_lookup` `a` join `mst_kategori` `c` on((`a`.`IDKATEGORI` = `c`.`IDKATEGORI`)))$$

DELIMITER ;

drop view if exists `trmenu`;

/* create command for trmenu */

DELIMITER $$
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trmenu` AS select `a`.`IDTRTCODE` AS `IDTRTCODE`,`a`.`PARENTID` AS `PARENTID`,`a`.`TCODEID` AS `TCODEID`,`a`.`URUTAN` AS `URUTAN`,`b`.`DISPLAYTEXT` AS `DISPLAYTEXT`,`b`.`URL` AS `URL`,`b`.`TIPE` AS `TIPE` from (`mst_tr_tcode` `a` join `mst_tcode` `b`) where (`a`.`TCODEID` = `b`.`IDMENU`)$$

DELIMITER ;

drop view if exists `vfavoritemenus`;

/* create command for vfavoritemenus */

DELIMITER $$
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vfavoritemenus` AS select `f`.`FAVID` AS `FAVID`,`f`.`IDUSER` AS `IDUSER`,`f`.`TCODEID` AS `TCODEID`,`f`.`Tipe` AS `Tipe`,`t`.`DISPLAYTEXT` AS `DISPLAYTEXT`,`t`.`URL` AS `URL` from (`mst_users_favorites` `f` join `mst_tcode` `t` on((`f`.`TCODEID` = `t`.`IDMENU`)))$$

DELIMITER ;

drop view if exists `vlogin`;

/* create command for vlogin */

DELIMITER $$
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vlogin` AS select `a`.`IDUSER` AS `iduser`,`a`.`PASSWORD` AS `password`,`a`.`NAMA` AS `nama`,`a`.`GROUPMENUID` AS `groupmenuid`,`a`.`THEME` AS `theme`,`a`.`ORG` AS `org`,`b`.`NAMA` AS `namaorg`,`b`.`DESKRIPSI` AS `deskripsi`,`a`.`SOFF` AS `soff`,`c`.`NAMA` AS `namasoff`,`u`.`DISPLAYTEXT` AS `DISPLAYTEXT`,`u`.`URL` AS `URL` from (((`mst_users` `a` join `mst_org` `b` on((`a`.`ORG` = `b`.`ENTITYID`))) left join `mst_soff` `c` on((`a`.`SOFF` = `c`.`ENTITYID`))) left join `mst_tcode` `u` on((`a`.`LANDINGPAGE` = `u`.`IDMENU`)))$$

DELIMITER ;

drop view if exists `vuser`;

/* create command for vuser */

DELIMITER $$
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vuser` AS select `a`.`IDUSER` AS `IDUSER`,`a`.`NAMA` AS `NAMA`,`a`.`PASSWORD` AS `PASSWORD`,`a`.`GROUPMENUID` AS `GROUPMENUID`,`a`.`CREATEDDATE` AS `CREATEDDATE`,`a`.`CREATEDUSER` AS `CREATEDUSER`,`a`.`UPDATEDDATE` AS `UPDATEDDATE`,`a`.`UPDATEDUSER` AS `UPDATEDUSER`,`a`.`ISDELETED` AS `ISDELETED`,`a`.`DELETEDDATE` AS `DELETEDDATE`,`a`.`DELETEDUSER` AS `DELETEDUSER`,`a`.`THEME` AS `THEME`,`a`.`ORG` AS `ORG`,`a`.`SOFF` AS `SOFF`,`a`.`EMPLOYEEID` AS `EMPLOYEEID`,`a`.`LANDINGPAGE` AS `LANDINGPAGE`,`b`.`NAMA` AS `NAMASOFF`,`c`.`NAMA` AS `NAMAEMPLOYEE` from ((`mst_users` `a` left join `mst_soff` `b` on((`a`.`SOFF` = `b`.`ENTITYID`))) left join `pay_employee` `c` on((`a`.`EMPLOYEEID` = `c`.`EMPLOYEEID`)))$$

DELIMITER ;

/* Restore session variables to original values */
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
