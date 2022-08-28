/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 5.7.33 : Database - dealer_mobil
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tbl_bank` */

DROP TABLE IF EXISTS `tbl_bank`;

CREATE TABLE `tbl_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(255) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_bank` */

insert  into `tbl_bank`(`bank_id`,`nama_bank`) values 
(1,'BCA'),
(2,'BRI'),
(3,'BNI'),
(4,'MANDIRI'),
(5,'BSI'),
(6,'PERMATA'),
(7,'BUKOPIN');

/*Table structure for table `tbl_body_type` */

DROP TABLE IF EXISTS `tbl_body_type`;

CREATE TABLE `tbl_body_type` (
  `body_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `body_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`body_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_body_type` */

insert  into `tbl_body_type`(`body_type_id`,`body_type_name`) values 
(1,'Convertible'),
(2,'Coupe'),
(3,'Crossover'),
(4,'Hatchback'),
(5,'Minivan'),
(6,'Passenger/Cargo Vans'),
(7,'Sedan'),
(8,'SUV'),
(9,'Truck'),
(10,'Wagon');

/*Table structure for table `tbl_booking` */

DROP TABLE IF EXISTS `tbl_booking`;

CREATE TABLE `tbl_booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `pembeli_id` varchar(20) NOT NULL,
  `pembooking` varchar(200) NOT NULL,
  `nope` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `penjual` varchar(200) NOT NULL,
  `pembayaran` varchar(200) NOT NULL,
  `car_id` int(11) NOT NULL,
  `mobil` varchar(200) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `lama_cicil` varchar(20) NOT NULL,
  `lama_book` varchar(20) NOT NULL,
  `bukti_pembayaran` text,
  `status` varchar(200) DEFAULT 'Menunggu Konfirmasi',
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_booking` */

insert  into `tbl_booking`(`id_booking`,`pembeli_id`,`pembooking`,`nope`,`email`,`penjual`,`pembayaran`,`car_id`,`mobil`,`nama_bank`,`lama_cicil`,`lama_book`,`bukti_pembayaran`,`status`) values 
(12,'0','developer','+6289510056758','developers@gmail.com','6','Manual',17,' 2014 Aston Martin Rapide','BCA','1 Tahun','2 Hari',NULL,'Terverifikasi'),
(13,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Manual',22,'2014 Acura TL Sedan SH-AWD','BCA','1 Tahun','1 Hari',NULL,'Ditolak'),
(14,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Manual',15,'2015 BMW i8','-','-','2 Hari','uploads/bukti_pembayaran/1658570362_bukti-tf.jpg','Menunggu Konfirmasi'),
(15,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Manual',18,'2017 Honda BR-V','-','-','2 Hari','uploads/bukti_pembayaran/1658590217_bukti-tf2.jpg','Terverifikasi'),
(16,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Manual',13,'2017 Audi Q7','-','-','3 Hari','uploads/bukti_pembayaran/1658590311_bukti-tf.jpg','Ditolak'),
(17,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Manual',12,'2016 Audi Q3','-','-','1 Hari','uploads/bukti_pembayaran/1658631860_bukti-tf2.jpg','Ditolak'),
(18,'41315','Vino','0871823764','vino@gmail.com','6','Manual',8,'2017 Toyota RAV4 hybrid','-','-','1 Hari','uploads/bukti_pembayaran/1658663483_Bukti-Transfer-ATM-BCA.jpg','Terverifikasi'),
(19,'0','developer','+6289510056758','developers@gmail.com','6','Manual',18,'2017 Honda BR-V','-','-','2 Hari','uploads/bukti_pembayaran/1658674722_bukti-tf3.jpg','Ditolak'),
(20,'0','developer','+6289510056758','developers@gmail.com','6','Manual',18,'2017 Honda BR-V','-','-','3 Hari','uploads/bukti_pembayaran/1658675333_bukti-tf3.jpg','Terverifikasi'),
(21,'0','developer','+6289510056758','developers@gmail.com','6','Manual',16,' 2017 Aston Martin DB11','BCA','-','2 Hari','uploads/bukti_pembayaran/1658678621_Bukti-Transfer-ATM-BCA.jpg','Ditolak'),
(22,'0','developer','+6289510056758','developers@gmail.com','6','Manual',14,' 2017 BMW 3 Series Gran Turismo','BCA','-','1 Hari','uploads/bukti_pembayaran/1658702500_Bukti-Transfer-ATM-BCA.jpg','Terverifikasi');

/*Table structure for table `tbl_brand` */

DROP TABLE IF EXISTS `tbl_brand`;

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_brand` */

insert  into `tbl_brand`(`brand_id`,`brand_name`) values 
(1,'Acura'),
(2,'Alfa Romeo'),
(3,'AM General'),
(4,'Aston Martin'),
(5,'Audi'),
(6,'BMW'),
(7,'Genesis'),
(8,'Honda'),
(9,'Lamgorghini'),
(10,'Toyota'),
(12,'test1111');

/*Table structure for table `tbl_car` */

DROP TABLE IF EXISTS `tbl_car`;

CREATE TABLE `tbl_car` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `map` text NOT NULL,
  `car_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `body_type_id` int(11) NOT NULL,
  `fuel_type_id` int(11) NOT NULL,
  `transmission_type_id` int(11) NOT NULL,
  `vin` varchar(255) NOT NULL,
  `car_condition` varchar(10) NOT NULL,
  `engine` varchar(100) NOT NULL,
  `engine_size` varchar(100) NOT NULL,
  `exterior_color` varchar(100) NOT NULL,
  `interior_color` varchar(100) NOT NULL,
  `seat` varchar(100) NOT NULL,
  `door` varchar(100) NOT NULL,
  `top_speed` varchar(100) NOT NULL,
  `kilometer` varchar(100) NOT NULL,
  `mileage` varchar(100) NOT NULL,
  `year` int(4) NOT NULL,
  `warranty` varchar(100) NOT NULL,
  `featured_photo` varchar(255) NOT NULL,
  `regular_price` varchar(20) NOT NULL,
  `sale_price` varchar(20) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `availability_status` varchar(100) DEFAULT 'Tersedia',
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_car` */

insert  into `tbl_car`(`car_id`,`title`,`description`,`address`,`city`,`state`,`zip_code`,`country`,`map`,`car_category_id`,`brand_id`,`model_id`,`body_type_id`,`fuel_type_id`,`transmission_type_id`,`vin`,`car_condition`,`engine`,`engine_size`,`exterior_color`,`interior_color`,`seat`,`door`,`top_speed`,`kilometer`,`mileage`,`year`,`warranty`,`featured_photo`,`regular_price`,`sale_price`,`seller_id`,`status`,`availability_status`) values 
(3,'bmw x5','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',13,6,97,3,2,2,'','New Car','','','','','5','4','120','','35',2017,'','3.jpg','80000','80000',6,0,'Tersedia'),
(4,'2014 Acura RLX','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','London','USA','','USA','',8,1,1,2,2,2,'','Old Car','','','While','While','6','4','400','31','3',2014,'2','4.jpg','70','60',6,1,'Tersedia'),
(5,'2003 ACURA CL in Tucson','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','City: 17 | Hwy: 27 | Combined: 21','AZ','US, AZ','345','US, AZ','',1,1,1,8,2,2,'19UYA42423A003179','Old Car','6 Cyl','6 Cyl','Gold','Gold','6','4','400','33,799','30',2003,'1','5.jpg','100','90',6,1,'Tersedia'),
(6,'2012 Acura ZDX','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','USA','','USA','',8,1,17,4,2,2,'','Old Car','','1499 cc','White','White','6','4','100','','31',0,'1','6.jpg','60','50',6,1,'Tersedia'),
(7,'2012 Acura ZDX','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','USA','','USA','',8,1,17,4,2,2,'','Old Car','','1499 cc','White','White','6','4','100','','31',0,'1','7.jpg','70','65',6,1,'Tersedia'),
(8,'2017 Toyota RAV4 hybrid','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',6,10,133,8,2,2,'','New Car','','','','','6','4','','','30',0,'1','8.jpg','200','170',6,1,'Terbooking'),
(9,'2010 Acura MDX','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',4,1,5,4,2,2,'','Old Car','','','','','','','100','20,000','34',2012,'','9.jpg','60','40',6,1,'Tersedia'),
(10,'2006 Acura RSX Type-S','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',1,1,10,4,2,2,'','Old Car','','','','','6','4','','','34',2006,'','10.jpg','355','300',6,1,'Tersedia'),
(11,'2017 Acura RLX PAWS','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',4,1,9,4,2,2,'','New Car','','','','','','','150','','35',2017,'','11.jpg','600','500',6,1,'Tersedia'),
(12,'2016 Audi Q3','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',4,5,55,4,2,2,'','New Car','','','','','8','4','','','36',2016,'','12.jpg','400','380',6,1,'Tersedia'),
(13,'2017 Audi Q7','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','USA','','','','',4,5,58,4,2,2,'','New Car','','','','','6','4','','','',2017,'','13.jpg','540','500',6,1,'Tersedia'),
(14,' 2017 BMW 3 Series Gran Turismo','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',6,6,79,4,2,2,'','New Car','','','','','6','4','','','32',2017,'','14.jpg','880','790',6,1,'Terjual'),
(15,'2015 BMW i8','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','','',12,6,87,4,2,2,'','Old Car','','','','','','','','','',2015,'','15.jpg','900','870',6,1,'Tersedia'),
(16,' 2017 Aston Martin DB11','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','','',13,4,24,1,2,2,'','New Car','','','','','','','','','',2017,'','16.jpg','650','500',6,1,'Tersedia'),
(17,' 2014 Aston Martin Rapide','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',1,4,28,3,2,2,'','Old Car','','','','','8','4','120','15,000','30',2014,'','17.jpg','550','400',6,1,'Terjual'),
(18,'2017 Honda BR-V','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',7,8,110,4,1,2,'','New Car','','','','','8','4','120','','30',2017,'','18.jpg','134','120',6,1,'Terjual'),
(19,'2017 Honda Civic','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',6,8,110,4,2,2,'','New Car','','','','','8','4','100','','30',2017,'','19.png','680','600',6,1,'Tersedia'),
(20,'2017 Honda HR-V','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',3,8,120,3,2,2,'','New Car','','','','','6','4','125','','34',2017,'','20.jpg','200','180',6,1,'Tersedia'),
(21,' 2017 Honda Odyssey','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',4,8,122,4,2,2,'','New Car','','','','','6','4','120','','32',2017,'','21.jpg','200','179',6,1,'Tersedia'),
(22,'2014 Acura TL Sedan SH-AWD','Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.\r\n\r\nLiber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.\r\n\r\nVix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria. ','','','','','USA','',1,1,12,3,2,2,'','Old Car','','','','','6','4','120','','35',2014,'','22.jpg','560','490',6,1,'Tersedia'),
(23,'2018 BMW i8','','Jl. Sana','Kediri','Jawa Timur','64200','Indonesia','',12,6,87,1,3,2,'BXBXB','Old Car','Nice','1000','Putih','Hitam','2','2','1000','100','10',2018,'1','23.png','550','600',71213,1,'Tersedia');

/*Table structure for table `tbl_car_category` */

DROP TABLE IF EXISTS `tbl_car_category`;

CREATE TABLE `tbl_car_category` (
  `car_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`car_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_car_category` */

insert  into `tbl_car_category`(`car_category_id`,`car_category_name`) values 
(1,'Classic'),
(2,'Commuter'),
(3,'Electric'),
(4,'Family'),
(5,'Fuel Efficient'),
(6,'Hybrid'),
(7,'Large'),
(8,'Luxury'),
(9,'Muscle'),
(10,'Off Road'),
(11,'Small'),
(12,'Sport'),
(13,'Supercar');

/*Table structure for table `tbl_car_photo` */

DROP TABLE IF EXISTS `tbl_car_photo`;

CREATE TABLE `tbl_car_photo` (
  `car_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  `car_id` int(11) NOT NULL,
  PRIMARY KEY (`car_photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_car_photo` */

insert  into `tbl_car_photo`(`car_photo_id`,`photo`,`car_id`) values 
(13,'13.jpg',4),
(14,'14.jpg',4),
(15,'15.jpg',4),
(16,'16.jpg',6),
(17,'17.jpg',6),
(18,'18.jpg',6),
(19,'19.jpg',7),
(20,'20.jpg',7),
(21,'21.jpg',7),
(23,'23.jpg',8),
(24,'24.jpg',8),
(25,'25.jpg',9),
(26,'26.jpg',9),
(27,'27.jpg',9),
(28,'28.jpg',10),
(29,'29.jpg',10),
(30,'30.jpg',10),
(31,'31.jpg',11),
(32,'32.jpg',11),
(33,'33.jpg',11),
(34,'34.jpg',12),
(35,'35.jpg',12),
(36,'36.jpg',13),
(37,'37.jpg',13),
(38,'38.jpg',15),
(39,'39.jpg',15),
(40,'40.jpg',16),
(41,'41.jpg',16),
(42,'42.jpg',17),
(43,'43.jpg',17),
(44,'44.jpg',19),
(45,'45.jpg',19),
(46,'46.jpg',20),
(47,'47.jpg',20),
(48,'48.jpg',21),
(49,'49.jpg',21),
(50,'50.jpg',3);

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_category` */

insert  into `tbl_category`(`category_id`,`category_name`,`category_slug`,`meta_title`,`meta_keyword`,`meta_description`) values 
(1,'Komersil','komersil','Komersil','',''),
(2,'Perumahan','perumahan','Perumahan','',''),
(3,'Ekonomi','ekonomi','Ekonomi','',''),
(4,'Spare Part Dan Alat','spare-part-dan-alat','Spare Part Dan Alat','','');

/*Table structure for table `tbl_comment` */

DROP TABLE IF EXISTS `tbl_comment`;

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_body` text NOT NULL,
  `code_main` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_comment` */

insert  into `tbl_comment`(`id`,`code_body`,`code_main`) values 
(1,'<div id=\"fb-root\"></div>\r\n<script>(function(d, s, id) {\r\n  var js, fjs = d.getElementsByTagName(s)[0];\r\n  if (d.getElementById(id)) return;\r\n  js = d.createElement(s); js.id = id;\r\n  js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=323620764400430\";\r\n  fjs.parentNode.insertBefore(js, fjs);\r\n}(document, \'script\', \'facebook-jssdk\'));</script>','<div class=\"fb-comments\" data-href=\"https://developers.facebook.com/docs/plugins/comments#configurator\" data-numposts=\"5\"></div>');

/*Table structure for table `tbl_credit` */

DROP TABLE IF EXISTS `tbl_credit`;

CREATE TABLE `tbl_credit` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pembelian_id` int(11) DEFAULT NULL,
  `nama_mobil` text NOT NULL,
  `harga_mobil` varchar(255) NOT NULL,
  `cicilan` varchar(255) NOT NULL,
  `bunga` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `lama_cicilan` varchar(255) NOT NULL,
  `pembeli_id` varchar(255) NOT NULL,
  `down_payment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_credit` */

insert  into `tbl_credit`(`id`,`pembelian_id`,`nama_mobil`,`harga_mobil`,`cicilan`,`bunga`,`total_harga`,`lama_cicilan`,`pembeli_id`,`down_payment`) values 
(1,NULL,' 2017 Honda Odyssey','179000000','14916667','6','24916667','12','','10000000'),
(2,NULL,' 2017 Honda Odyssey','179000000','14916667','11','34916667','12','0','20000000'),
(3,NULL,'2017 Honda Civic','600000000','25000000','3','45000000','24','0','20000000'),
(4,NULL,' 2017 Honda Odyssey','179000000','14916667','6','24916667','12','0','10000000'),
(5,NULL,' 2017 Honda Odyssey','179000000','14916667','11','34916667','12','0','20000000'),
(6,NULL,' 2017 Honda Odyssey','179000000','7458333','8','22458333','24','0','15000000'),
(7,NULL,'2017 Acura RLX PAWS','500000000','','','','12','64535','200000000'),
(8,NULL,'2006 Acura RSX Type-S','300000000','25000000','40','145000000','12','64535','120000000'),
(10,6,'2017 Honda Civic','600000000','25000000','46','300000000','24','64535','275000000'),
(11,7,' 2017 Honda Odyssey','179000000','7458333','56','107458333','24','64535','100000000'),
(12,8,'2017 Honda HR-V','180000000','7500000','44','87500000','24','64535','80000000'),
(13,11,'2012 Acura ZDX','65000000','2708333','69','47708333','24','64535','45000000'),
(14,13,'2006 Acura RSX Type-S','300000000','25000000','58','200000000','12','64535','175000000'),
(16,15,'2017 Acura RLX PAWS','500000000','20833333','50','270833333','24','41315','250000000'),
(17,16,'2017 Audi Q7','500000000','41666667','40','241666667','12','41315','200000000'),
(18,18,'2017 Honda BR-V','120000000','5000000','63','80000000','24','0','75000000'),
(19,19,'2017 Honda BR-V','120000000','5000000','63','80000000','24','0','75000000');

/*Table structure for table `tbl_credit_items` */

DROP TABLE IF EXISTS `tbl_credit_items`;

CREATE TABLE `tbl_credit_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_id` int(11) DEFAULT NULL,
  `pembelian_id` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `bukti_pembayaran` text,
  `status` varchar(100) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_credit_items` */

insert  into `tbl_credit_items`(`id`,`credit_id`,`pembelian_id`,`nominal`,`nama_bank`,`bukti_pembayaran`,`status`,`created_at`) values 
(1,16,15,250000000,'BCA','uploads/bukti_pembayaran/1658650067_bukti-tf2.jpg','Completed','2022-07-24 15:46:58'),
(2,17,16,200000000,'MANDIRI','uploads/bukti_pembayaran/1658651972_bukti-tf.jpg','Pending','2022-07-24 15:46:58'),
(4,16,15,250000000,'MANDIRI','uploads/bukti_pembayaran/1658661435_bukti-tf.jpg','Completed','2022-07-24 18:17:15'),
(5,16,15,250000000,'BRI','uploads/bukti_pembayaran/1658661806_bukti-tf3.jpg','Reject','2022-07-24 18:23:26'),
(6,18,18,75000000,'BUKOPIN','uploads/bukti_pembayaran/1658675855_bukti-tf.jpg','Pending','2022-07-24 22:17:35'),
(7,19,19,75000000,'BSI','uploads/bukti_pembayaran/1658675946_bukti-tf4.png','Completed','2022-07-24 22:19:06'),
(8,19,19,5000000,'MANDIRI','uploads/bukti_pembayaran/1658677313_bukti-tf3.jpg','Pending','2022-07-24 22:41:53'),
(9,19,19,5000000,'BCA','uploads/bukti_pembayaran/1658677604_Bukti-Transfer-ATM-BCA.jpg','Pending','2022-07-24 22:46:44'),
(10,19,19,5000000,'BCA','uploads/bukti_pembayaran/1658677672_bukti-tf2.jpg','Pending','2022-07-24 22:47:52'),
(11,19,19,5000000,'MANDIRI','uploads/bukti_pembayaran/1658677749_bukti-tf.jpg','Pending','2022-07-24 22:49:09');

/*Table structure for table `tbl_faq` */

DROP TABLE IF EXISTS `tbl_faq`;

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_title` varchar(255) NOT NULL,
  `faq_content` text NOT NULL,
  `faq_category_id` int(11) NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_faq` */

insert  into `tbl_faq`(`faq_id`,`faq_title`,`faq_content`,`faq_category_id`) values 
(1,'Question Title 1','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',1),
(2,'Question Title 2','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',1),
(3,'Question Title 3','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',2),
(4,'Question Title 4','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',2),
(5,'Question Title 5','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',2),
(6,'Question Title 6','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',3),
(7,'Question Title 7','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',3),
(8,'Question Title 8','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',3);

/*Table structure for table `tbl_faq_category` */

DROP TABLE IF EXISTS `tbl_faq_category`;

CREATE TABLE `tbl_faq_category` (
  `faq_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`faq_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_faq_category` */

insert  into `tbl_faq_category`(`faq_category_id`,`faq_category_name`) values 
(1,'Pertanyaan Umum'),
(2,'Tanggapan Pembeli'),
(3,'Pertanyaan Teknis');

/*Table structure for table `tbl_file` */

DROP TABLE IF EXISTS `tbl_file`;

CREATE TABLE `tbl_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_file` */

insert  into `tbl_file`(`file_id`,`file_title`,`file_name`) values 
(2,'search','file-2.jpg'),
(3,'testimonial','file-3.png');

/*Table structure for table `tbl_fuel_type` */

DROP TABLE IF EXISTS `tbl_fuel_type`;

CREATE TABLE `tbl_fuel_type` (
  `fuel_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `fuel_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`fuel_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_fuel_type` */

insert  into `tbl_fuel_type`(`fuel_type_id`,`fuel_type_name`) values 
(1,'Diesel'),
(2,'Petrol'),
(3,'Electric');

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_type` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `category_or_page_slug` varchar(255) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`menu_id`,`menu_type`,`menu_name`,`category_or_page_slug`,`menu_order`,`menu_parent`,`menu_url`) values 
(46,'Page','Mobil','mobil-lama',2,0,'#'),
(48,'PageOld','Mobil Bekas','mobil-lama',44,0,''),
(49,'Page','Berita\r\n','blog',3,0,''),
(51,'PageOld','Harga','harga',6,0,''),
(54,'Other','Beranda','',1,0,'index.php');

/*Table structure for table `tbl_metode` */

DROP TABLE IF EXISTS `tbl_metode`;

CREATE TABLE `tbl_metode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `me_pembayaran` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_metode` */

insert  into `tbl_metode`(`id`,`me_pembayaran`) values 
(1,'Manual'),
(3,'Midtrans');

/*Table structure for table `tbl_model` */

DROP TABLE IF EXISTS `tbl_model`;

CREATE TABLE `tbl_model` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_model` */

insert  into `tbl_model`(`model_id`,`model_name`,`brand_id`) values 
(1,'CL',1),
(2,'ILX',1),
(3,'Integra',1),
(4,'Legend',1),
(5,'MDX',1),
(6,'NSX',1),
(7,'RDX',1),
(8,'RL',1),
(9,'RLX',1),
(10,'RSX',1),
(11,'SLX',1),
(12,'TL',1),
(13,'TLX',1),
(14,'TSX',1),
(15,'TSX Sport Wagon',1),
(16,'Vigor',1),
(17,'ZDX',1),
(18,'4C',2),
(19,'Guilia',2),
(20,'GTV6',2),
(21,'Milano',2),
(22,'Spider',2),
(23,'Hummer',3),
(24,'DB11',4),
(25,'DB7',4),
(26,'DB9',4),
(27,'DBS',4),
(28,'Rapide',4),
(29,'Rapide S',4),
(30,'V12 Vanquish',4),
(31,'V12 Vantage',4),
(32,'V12 Vantage S',4),
(33,'V8 Vantage',4),
(34,'Vanquish',4),
(35,'Virage',4),
(36,'100',5),
(37,'200',5),
(38,'4000',5),
(39,'5000',5),
(40,'80',5),
(41,'90',5),
(42,'A3',5),
(43,'A3 Sportback e-tron',5),
(44,'A4',5),
(45,'A4 Allroad',5),
(46,'A5',5),
(47,'A5 Sportback',5),
(48,'A6',5),
(49,'A7',5),
(50,'A8',5),
(51,'A8 L',5),
(52,'Allroad Quattro',5),
(53,'Cabriolet',5),
(54,'Coupe',5),
(55,'Q3',5),
(56,'Q5',5),
(57,'Q5 Hybrid',5),
(58,'Q7',5),
(59,'R8',5),
(60,'RS 3',5),
(61,'RS 4',5),
(62,'RS 5',5),
(63,'RS 6',5),
(64,'RS 7',5),
(65,'S3',5),
(66,'S4',5),
(67,'S5',5),
(68,'S5 Sportback',5),
(69,'S6',5),
(70,'S7',5),
(71,'S8',5),
(72,'SQ5',5),
(73,'TT',5),
(74,'TT RS',5),
(75,'TTS',5),
(76,'V8',5),
(77,'1 Series',6),
(78,'2 Series',6),
(79,'3 Series',6),
(80,'4 Series',6),
(81,'5 Series',6),
(82,'6 Series',6),
(83,'7 Series',6),
(84,'8 Series',6),
(85,'ActiveE',6),
(86,'i3',6),
(87,'i8',6),
(88,'M',6),
(89,'M2',6),
(90,'M3',6),
(91,'M4',6),
(92,'M5',6),
(93,'M6',6),
(94,'X1',6),
(95,'X3',6),
(96,'X4',6),
(97,'X5',6),
(98,'X5 M',6),
(99,'X6',6),
(100,'X6 M',6),
(101,'Z3',6),
(102,'Z4',5),
(103,'Z4 M',6),
(104,'Z8',6),
(105,'G80',7),
(106,'G90',7),
(107,'Accord',8),
(108,'Accord Hybrid',8),
(109,'Accord Plug-in',8),
(110,'Civic',8),
(111,'Civic CRX',8),
(112,'Civic Del sol',8),
(113,'Clarity Fuel Cell',8),
(114,'CR-V',8),
(115,'CR-Z',8),
(116,'Crosstour',8),
(117,'Element',8),
(118,'FCX Clarity',8),
(119,'Fit Fit EV',8),
(120,'HR-V',8),
(121,'Insight',8),
(122,'Odyssey',8),
(123,'Passport',8),
(124,'Pilot',8),
(125,'Prelude',8),
(126,'Ridgeline',8),
(127,'S2000',8),
(128,'Aventador',9),
(129,'Diablo',9),
(130,'Gallardo',9),
(131,'Huracan',9),
(132,'Murcielago',9),
(133,'RAV4',10),
(134,'Camry',10),
(135,'Corolla Altis',10),
(136,'w1w1w1',12);

/*Table structure for table `tbl_news` */

DROP TABLE IF EXISTS `tbl_news`;

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_slug` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_date` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT '1',
  `publisher` varchar(255) NOT NULL,
  `total_view` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_news` */

insert  into `tbl_news`(`news_id`,`news_title`,`news_slug`,`news_content`,`news_date`,`photo`,`category_id`,`publisher`,`total_view`,`meta_title`,`meta_keyword`,`meta_description`) values 
(1,'Cu vel choro exerci pri et oratio iisque','cu-vel-choro-exerci-pri-et-oratio-iisque','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-1.jpg',3,'John Doe',14,'Cu vel choro exerci pri et oratio iisque','',''),
(2,'Epicurei necessitatibus eu facilisi postulant ','epicurei-necessitatibus-eu-facilisi-postulant-','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-2.jpg',3,'John Doe',9,'Epicurei necessitatibus eu facilisi postulant ','',''),
(3,'Mei ut errem legimus periculis eos liber','mei-ut-errem-legimus-periculis-eos-liber','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-3.jpg',3,'John Doe',2,'Mei ut errem legimus periculis eos liber','',''),
(4,'Id pro unum pertinax oportere vel','id-pro-unum-pertinax-oportere-vel','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-4.jpg',4,'John Doe',0,'Id pro unum pertinax oportere vel','',''),
(5,'Tollit cetero cu usu etiam evertitur','tollit-cetero-cu-usu-etiam-evertitur','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-5.jpg',4,'John Doe',22,'Tollit cetero cu usu etiam evertitur','',''),
(6,'Omnes ornatus qui et te aeterno','omnes-ornatus-qui-et-te-aeterno','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-6.jpg',4,'John Doe',2,'Omnes ornatus qui et te aeterno','',''),
(7,'Vix tale noluisse voluptua ad ne','vix-tale-noluisse-voluptua-ad-ne','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-7.jpg',2,'John Doe',0,'Vix tale noluisse voluptua ad ne','',''),
(8,'Liber utroque vim an ne his brute','liber-utroque-vim-an-ne-his-brute','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-8.jpg',2,'John Doe',16,'Liber utroque vim an ne his brute','',''),
(9,'Nostrum copiosae argumentum has','nostrum-copiosae-argumentum-has','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-9.jpg',1,'John Doe',12,'Nostrum copiosae argumentum has','',''),
(10,'An labores explicari qui eu','an-labores-explicari-qui-eu','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-10.jpg',1,'John Doe',5,'An labores explicari qui eu','',''),
(11,'Lorem ipsum dolor sit amet','lorem-ipsum-dolor-sit-amet','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-11.jpg',1,'John Doe',18,'Lorem ipsum dolor sit amet','','');

/*Table structure for table `tbl_page` */

DROP TABLE IF EXISTS `tbl_page`;

CREATE TABLE `tbl_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `page_layout` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_page` */

insert  into `tbl_page`(`page_id`,`page_name`,`page_slug`,`page_content`,`page_layout`,`banner`,`status`,`meta_title`,`meta_keyword`,`meta_description`) values 
(1,'Tentang Kami','tentang-kami','<p>Ini adalah sistem penjualan mobil berbasis web yang menyajikan berbagai macam mobil pilihan dari para penjual mobil di seluruh Indonesia.&nbsp;</p>\r\n','Full Width Page Layout','page-banner-1.jpg','Active','Tentang Kami - Dealer Mobil','',''),
(2,'Hubungi Kami','hubungi-kami','','Contact Us Page Layout','page-banner-2.jpg','Active','Hubungi Kami - Dealer Mobil','',''),
(7,'FAQ','faq','','FAQ Page Layout','page-banner-7.jpg','Active','FAQ - Dealer Mobil','',''),
(9,'Blog','blog','','Blog Page Layout','page-banner-9.jpg','Active','Blog - Dealer Mobil','',''),
(11,'Testimonial','testimonial','','Testimonial Page Layout','page-banner-11.jpg','Active','Testimonial - Dealer Mobil','',''),
(12,'Mobil Baru','mobil-baru','','New Car Page Layout','page-banner-12.jpg','Active','Mobil Baru - Dealer Mobil','',''),
(13,'Mobil Bekas','mobil-lama','','Old Car Page Layout','page-banner-13.jpg','Active','Mobil Bekas - Dealer Mobil','',''),
(15,'Harga Paket','harga','','Pricing Page Layout','page-banner-15.jpg','Active','Harga - Dealer Mobil','','');

/*Table structure for table `tbl_payment` */

DROP TABLE IF EXISTS `tbl_payment`;

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `payment_date` varchar(20) NOT NULL,
  `expire_date` varchar(20) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `pricing_plan_id` int(11) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `bukti_pembayaran` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_payment` */

insert  into `tbl_payment`(`id`,`seller_id`,`payment_date`,`expire_date`,`txnid`,`paid_amount`,`pricing_plan_id`,`payment_status`,`payment_id`,`bukti_pembayaran`) values 
(1,10,'2017-12-17','2022-12-27','3VW96364K6934123M',10,1,'Completed','1513472506',NULL),
(2,10,'2017-12-30','2018-01-09','74G405774B946000A',10,1,'Completed','1513476596',NULL),
(3,10,'2017-12-01','2017-12-11','',10,1,'Pending','1513478974',NULL),
(4,6,'2017-12-17','2017-12-27','',10,1,'Pending','1513483925',NULL),
(5,6,'2017-12-17','2017-12-27','',10,1,'Pending','1513487335',NULL),
(6,6,'2017-12-17','2022-12-27','1G785796W6728403S',10,1,'Completed','1513487537',NULL),
(7,6,'2018-02-01','2018-02-11','',10,1,'Pending','1513679014',NULL),
(8,6,'2022-06-24','2022-07-04','',10,1,'Pending','1656047374',NULL),
(9,6,'2022-09-30','2022-10-10','',10,1,'Pending','1656061363',NULL),
(10,6,'2022-06-24','2022-07-04','',10,1,'Pending','1656063196',NULL),
(11,6,'2022-06-24','2022-07-04','',10,1,'Pending','1656063709',NULL),
(12,6,'2022-06-24','2022-07-24','',30,3,'Pending','1656064166',NULL),
(13,6,'2022-06-24','2022-07-24','',30,3,'Pending','1656064187',NULL),
(15,71213,'2022-07-24','2022-08-13','',20,2,'Completed','1658627527','uploads/bukti_pembayaran/1658627527_bukti-tf2.jpg');

/*Table structure for table `tbl_payment_pembeli` */

DROP TABLE IF EXISTS `tbl_payment_pembeli`;

CREATE TABLE `tbl_payment_pembeli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembeli_id` int(11) NOT NULL,
  `payment_date` varchar(20) NOT NULL,
  `expire_date` varchar(20) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `pricing_plan_id` int(11) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_payment_pembeli` */

insert  into `tbl_payment_pembeli`(`id`,`pembeli_id`,`payment_date`,`expire_date`,`txnid`,`paid_amount`,`pricing_plan_id`,`payment_status`,`payment_id`) values 
(1,0,'2017-12-17','2022-12-27','3VW96364K6934123M',10,1,'Completed','1513472506'),
(2,10,'2017-12-30','2018-01-09','74G405774B946000A',10,1,'Completed','1513476596'),
(3,10,'2017-12-01','2017-12-11','',10,1,'Pending','1513478974'),
(4,6,'2017-12-17','2017-12-27','',10,1,'Pending','1513483925'),
(5,6,'2017-12-17','2017-12-27','',10,1,'Pending','1513487335'),
(6,6,'2017-12-17','2017-12-27','1G785796W6728403S',10,1,'Completed','1513487537'),
(7,6,'2018-02-01','2018-02-11','',10,1,'Pending','1513679014'),
(8,0,'2022-06-27','2022-07-07','',10,1,'Pending','1656336339'),
(9,0,'2022-06-27','2022-07-17','',20,2,'Pending','1656336498'),
(10,0,'2022-06-27','2022-07-07','',10,1,'Pending','1656336532');

/*Table structure for table `tbl_pembeli` */

DROP TABLE IF EXISTS `tbl_pembeli`;

CREATE TABLE `tbl_pembeli` (
  `pembeli_id` int(11) NOT NULL,
  `pembeli_name` varchar(100) NOT NULL,
  `pembeli_email` varchar(100) NOT NULL,
  `pembeli_phone` varchar(100) NOT NULL,
  `pembeli_address` text NOT NULL,
  `pembeli_city` varchar(255) NOT NULL,
  `pembeli_state` varchar(255) NOT NULL,
  `pembeli_country` varchar(255) NOT NULL,
  `pembeli_ktp` text,
  `pembeli_password` varchar(255) NOT NULL,
  `pembeli_token` varchar(255) NOT NULL,
  `pembeli_time` varchar(255) NOT NULL,
  `pembeli_access` int(11) NOT NULL,
  `pembeli_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pembeli` */

insert  into `tbl_pembeli`(`pembeli_id`,`pembeli_name`,`pembeli_email`,`pembeli_phone`,`pembeli_address`,`pembeli_city`,`pembeli_state`,`pembeli_country`,`pembeli_ktp`,`pembeli_password`,`pembeli_token`,`pembeli_time`,`pembeli_access`,`pembeli_status`) values 
(0,'developer','developers@gmail.com','+6289510056758','Jatim','Nganjuk','Jawa Timur','Indonesia',NULL,'81dc9bdb52d04dc20036dbd8313ed055','943cbdb9298304fa5ae8f0f08ddb4bd3','1656313872',1,1),
(64535,'Yusuf','spada.genk02@gmail.com','089670752600','JL. Markawi','Kediri','Jawa Timur','Indonesia',NULL,'25d55ad283aa400af464c76d713c07ad','e0c79d99ee375ed5ae7f77eb0e469957','1658508615',1,1),
(41315,'Vino','vino@gmail.com','0871823764','Jl. Sana Sini','Kediri','Jawa Timur','Indonesia','uploads/data_ktp/1658621149_contoh-scanktp.png','81dc9bdb52d04dc20036dbd8313ed055','02c29fad5f164d62227212fbb95e02f1','1658621149',1,1);

/*Table structure for table `tbl_pembelian` */

DROP TABLE IF EXISTS `tbl_pembelian`;

CREATE TABLE `tbl_pembelian` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `pembeli_id` varchar(20) NOT NULL,
  `pembooking` varchar(200) NOT NULL,
  `nope` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `penjual` varchar(200) NOT NULL,
  `pembayaran` varchar(200) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `mobil` varchar(200) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `lama_cicil` varchar(20) NOT NULL,
  `bukti_pembayaran` text,
  `status` varchar(200) DEFAULT 'Menunggu Konfirmasi',
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_pembelian` */

insert  into `tbl_pembelian`(`id_booking`,`pembeli_id`,`pembooking`,`nope`,`email`,`penjual`,`pembayaran`,`car_id`,`mobil`,`nama_bank`,`lama_cicil`,`bukti_pembayaran`,`status`) values 
(1,'0','developer','+6289510056758','developers@gmail.com','6','Tunai',17,' 2014 Aston Martin Rapide','BCA','1 Tahun','uploads/bukti_pembayaran/1658588007_bukti-tf.jpg','Terverifikasi'),
(2,'0','developer','+6289510056758','developers@gmail.com','6','Tunai',17,' 2014 Aston Martin Rapide','BCA','1 Tahun','uploads/bukti_pembayaran/1658588007_bukti-tf.jpg','Ditolak'),
(3,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Tunai',19,'2017 Honda Civic','MANDIRI','0 Tahun','uploads/bukti_pembayaran/1658588007_bukti-tf.jpg','Terverifikasi'),
(4,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Tunai',9,'2010 Acura MDX','BCA','0 Tahun','uploads/bukti_pembayaran/1658588007_bukti-tf.jpg','Terverifikasi'),
(5,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Tunai',9,'2010 Acura MDX','MANDIRI','0 Tahun','uploads/bukti_pembayaran/1658588007_bukti-tf.jpg','Ditolak'),
(6,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Kredit',19,'2017 Honda Civic','-','24 Bulan','uploads/bukti_pembayaran/1658588007_bukti-tf.jpg','Ditolak'),
(7,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Kredit',21,' 2017 Honda Odyssey','MANDIRI','24 Bulan','uploads/bukti_pembayaran/1658588007_bukti-tf.jpg','Ditolak'),
(8,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Kredit',20,'2017 Honda HR-V','MANDIRI','24 Bulan','uploads/bukti_pembayaran/1658588007_bukti-tf.jpg','Terverifikasi'),
(9,'0','developer','+6289510056758','developers@gmail.com','6','Tunai',21,' 2017 Honda Odyssey','BCA','0 Tahun','uploads/bukti_pembayaran/1658591481_bukti-tf2.jpg','Terverifikasi'),
(10,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Tunai',5,'2003 ACURA CL in Tucson','BCA','0 Tahun','uploads/bukti_pembayaran/1658638356_bukti-tf2.jpg','Menunggu Konfirmasi'),
(11,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Kredit',7,'2012 Acura ZDX','MANDIRI','24 Bulan','uploads/bukti_pembayaran/1658638425_bukti-tf.jpg','Ditolak'),
(13,'64535','Yusuf','089670752600','spada.genk02@gmail.com','6','Kredit',10,'2006 Acura RSX Type-S','BCA','12 Bulan','uploads/bukti_pembayaran/1658639220_bukti-tf2.jpg','Ditolak'),
(15,'41315','Vino','0871823764','vino@gmail.com','6','Kredit',11,'2017 Acura RLX PAWS','BCA','24 Bulan','uploads/bukti_pembayaran/1658650067_bukti-tf2.jpg','Terverifikasi'),
(16,'41315','Vino','0871823764','vino@gmail.com','6','Kredit',13,'2017 Audi Q7','MANDIRI','12 Bulan','uploads/bukti_pembayaran/1658651972_bukti-tf.jpg','Ditolak'),
(17,'41315','Vino','0871823764','vino@gmail.com','6','Tunai',17,' 2014 Aston Martin Rapide','BRI','0 Tahun','uploads/bukti_pembayaran/1658663159_bukti-tf3.jpg','Terverifikasi'),
(18,'0','developer','+6289510056758','developers@gmail.com','6','Kredit',18,'2017 Honda BR-V','BUKOPIN','24 Bulan','uploads/bukti_pembayaran/1658675855_bukti-tf.jpg','Ditolak'),
(19,'0','developer','+6289510056758','developers@gmail.com','6','Kredit',18,'2017 Honda BR-V','BSI','24 Bulan','uploads/bukti_pembayaran/1658675946_bukti-tf4.png','Terverifikasi'),
(20,'0','developer','+6289510056758','developers@gmail.com','6','Tunai',14,' 2017 BMW 3 Series Gran Turismo','MANDIRI','0 Tahun','uploads/bukti_pembayaran/1658702864_bukti-tf.jpg','Terverifikasi');

/*Table structure for table `tbl_pricing_plan` */

DROP TABLE IF EXISTS `tbl_pricing_plan`;

CREATE TABLE `tbl_pricing_plan` (
  `pricing_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pricing_plan_name` varchar(255) NOT NULL,
  `pricing_plan_price` varchar(20) NOT NULL,
  `pricing_plan_day` varchar(100) NOT NULL,
  `pricing_plan_item_allow` varchar(10) NOT NULL,
  `pricing_plan_description` text NOT NULL,
  PRIMARY KEY (`pricing_plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pricing_plan` */

insert  into `tbl_pricing_plan`(`pricing_plan_id`,`pricing_plan_name`,`pricing_plan_price`,`pricing_plan_day`,`pricing_plan_item_allow`,`pricing_plan_description`) values 
(1,'Basic','10','10','20','<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n'),
(2,'Gold','20','20','40','<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n'),
(3,'Platinum','30','30','60','<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n');

/*Table structure for table `tbl_seller` */

DROP TABLE IF EXISTS `tbl_seller`;

CREATE TABLE `tbl_seller` (
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(100) NOT NULL,
  `seller_email` varchar(100) NOT NULL,
  `seller_phone` varchar(100) NOT NULL,
  `seller_address` text NOT NULL,
  `seller_city` varchar(255) NOT NULL,
  `seller_state` varchar(255) NOT NULL,
  `seller_country` varchar(255) NOT NULL,
  `seller_ktp` text,
  `seller_password` varchar(255) NOT NULL,
  `seller_token` varchar(255) NOT NULL,
  `seller_time` varchar(255) NOT NULL,
  `seller_access` int(11) NOT NULL,
  `seller_status` int(11) DEFAULT '0',
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91609 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_seller` */

insert  into `tbl_seller`(`seller_id`,`seller_name`,`seller_email`,`seller_phone`,`seller_address`,`seller_city`,`seller_state`,`seller_country`,`seller_ktp`,`seller_password`,`seller_token`,`seller_time`,`seller_access`,`seller_status`) values 
(6,'Dony','seller@gmail.com','+6285707125766','Nganjuk','Nganjuk','Jawa Timur','Indonesia',NULL,'81dc9bdb52d04dc20036dbd8313ed055','','',1,1),
(10,'Charles Saddler','per111@shop.com','770-507-2798','1965 Elk Creek Road','Stockbridge','GA','USA',NULL,'c4ca4238a0b923820dcc509a6f75849b','','',1,1),
(21941,'Hay','hay@gmail.com','082287','Jl. Ini','Surabaya','Jawa Timur','Indonesia','uploads/data_ktp/1658624052_contoh-scanktp.png','81dc9bdb52d04dc20036dbd8313ed055','3f13cf4ddf6fc50c0d39a1d5aeb57dd8','1658624052',1,1),
(24625,'John','john@gmail.com','89128749','This Street','New York','New York','USA',NULL,'81dc9bdb52d04dc20036dbd8313ed055','eb34af4ce823816fb07be4c925656a10','1658536706',1,1),
(33797,'Narin','narin@gmail.com','0893482','Jl. Anu','Surabaya','Jawa Timur','Indonesia','uploads/data_ktp/1658624525_ktp.png','81dc9bdb52d04dc20036dbd8313ed055','b1e7ba607de39c888c12b9dd4a546cac','1658624525',0,0),
(71213,'Roy','roy@gmail.com','08187329','Jl. Situ','Kediri','Jawa Timur','Indonesia','uploads/data_ktp/1658621943_v5SD9sysRa7LSRxKbGgjko9wVZHEstT7YpLYZjPB.jpeg','81dc9bdb52d04dc20036dbd8313ed055','c98a4a487b0f1b42715b517ede29082e','1658621943',1,1),
(91608,'Anisa','anisa@gmail.com','081738271','Jl. Itu','Nganjuk','Jawa Timur','Indonesia','uploads/data_ktp/1658624192_riau24_1608090142.jpeg','81dc9bdb52d04dc20036dbd8313ed055','cef4abbb1a22ebc0982da5fd5e6d6f76','1658624192',0,0);

/*Table structure for table `tbl_settings` */

DROP TABLE IF EXISTS `tbl_settings`;

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footer_about` text NOT NULL,
  `footer_copyright` text NOT NULL,
  `contact_address` text NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_fax` varchar(255) NOT NULL,
  `contact_map_iframe` text NOT NULL,
  `receive_email` varchar(255) NOT NULL,
  `receive_email_subject` varchar(255) NOT NULL,
  `receive_email_thank_you_message` text NOT NULL,
  `seller_email_subject` varchar(255) NOT NULL,
  `seller_email_thank_you_message` text NOT NULL,
  `forget_password_message` text NOT NULL,
  `total_recent_news_footer` int(10) NOT NULL,
  `total_popular_news_footer` int(10) NOT NULL,
  `total_recent_news_sidebar` int(11) NOT NULL,
  `total_popular_news_sidebar` int(11) NOT NULL,
  `total_recent_news_home_page` int(11) NOT NULL,
  `meta_title_home` text NOT NULL,
  `meta_keyword_home` text NOT NULL,
  `meta_description_home` text NOT NULL,
  `banner_login` varchar(255) NOT NULL,
  `banner_registration` varchar(255) NOT NULL,
  `banner_forget_password` varchar(255) NOT NULL,
  `banner_blog` varchar(255) NOT NULL,
  `banner_car` varchar(255) NOT NULL,
  `banner_search` varchar(255) NOT NULL,
  `search_title` varchar(255) NOT NULL,
  `search_photo` varchar(255) NOT NULL,
  `testimonial_photo` varchar(255) NOT NULL,
  `newsletter_text` text NOT NULL,
  `mod_rewrite` varchar(10) NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_settings` */

insert  into `tbl_settings`(`id`,`logo`,`favicon`,`footer_about`,`footer_copyright`,`contact_address`,`contact_email`,`contact_phone`,`contact_fax`,`contact_map_iframe`,`receive_email`,`receive_email_subject`,`receive_email_thank_you_message`,`seller_email_subject`,`seller_email_thank_you_message`,`forget_password_message`,`total_recent_news_footer`,`total_popular_news_footer`,`total_recent_news_sidebar`,`total_popular_news_sidebar`,`total_recent_news_home_page`,`meta_title_home`,`meta_keyword_home`,`meta_description_home`,`banner_login`,`banner_registration`,`banner_forget_password`,`banner_blog`,`banner_car`,`banner_search`,`search_title`,`search_photo`,`testimonial_photo`,`newsletter_text`,`mod_rewrite`,`paypal_email`) values 
(1,'logo3.png','favicon.png','<p>Marketplace Jual Beli Mobil Bekas Termurah Dan Terpercaya Se-Indonesia</p>\r\n','Copyright DT Auto Cars © 2022. All Rights Reserved.','Dsn Sumbersari, Jl. Patimura Desa Jabang, Kec Kras, Kab Kediri, 64172','dtautocars@gmail.com','6285233794526','6285233794526','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387142.84040262736!2d-74.25819605476612!3d40.70583158628177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1485712851643\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','dtautocars@gmail.com','Pesan Email Pengunjung','Terimakasih Sudah Mengirim Pesan Kepada Kami. Mohon Tunggu Balasan Yah..','DT Auto Cars - Bagian Pesan Penjual','Sip, Emailmu berhasil terkirim !','Link konfirmasi sudah dikirim ke email anda. Kamu akan mendapatkan password untuk setel ulang kata sandi.',3,3,4,4,7,'DT Auto Cars - Marketplace Mobil Bekas Terpercaya','auto, automotive, car, cab, truck, car listing, car directory, car selling, finance, car business, inventory, car rent, old car, used car, new car','DT Auto Cars - Marketplace Mobil Bekas Terpercaya','banner_login.jpg','banner_registration.jpg','banner_forget_password.jpg','banner_blog.jpg','banner_car.jpg','banner_search.jpg','DT Auto Cars - Marketplace Mobil Bekas Terpercaya','search.jpg','testimonial.png','Silahkan Masukkan Email Anda Untuk Mendapatkan Kabar Terbaru Dari Kami Ya','Off','masmutofficial@gmail.com');

/*Table structure for table `tbl_social` */

DROP TABLE IF EXISTS `tbl_social`;

CREATE TABLE `tbl_social` (
  `social_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_name` varchar(30) NOT NULL,
  `social_url` varchar(255) NOT NULL,
  `social_icon` varchar(30) NOT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_social` */

insert  into `tbl_social`(`social_id`,`social_name`,`social_url`,`social_icon`) values 
(1,'Facebook','#','fa fa-facebook'),
(2,'Twitter','#','fa fa-twitter'),
(3,'LinkedIn','#','fa fa-linkedin'),
(4,'Google Plus','#','fa fa-google-plus'),
(5,'Pinterest','#','fa fa-pinterest'),
(6,'YouTube','','fa fa-youtube'),
(7,'Instagram','','fa fa-instagram'),
(8,'Tumblr','','fa fa-tumblr'),
(9,'Flickr','','fa fa-flickr'),
(10,'Reddit','','fa fa-reddit'),
(11,'Snapchat','','fa fa-snapchat'),
(12,'WhatsApp','','fa fa-whatsapp'),
(13,'Quora','','fa fa-quora'),
(14,'StumbleUpon','','fa fa-stumbleupon'),
(15,'Delicious','','fa fa-delicious'),
(16,'Digg','','fa fa-digg');

/*Table structure for table `tbl_subscriber` */

DROP TABLE IF EXISTS `tbl_subscriber`;

CREATE TABLE `tbl_subscriber` (
  `subs_id` int(11) NOT NULL AUTO_INCREMENT,
  `subs_email` varchar(255) NOT NULL,
  `subs_date` varchar(100) NOT NULL,
  `subs_date_time` varchar(100) NOT NULL,
  `subs_hash` varchar(255) NOT NULL,
  `subs_active` int(11) NOT NULL,
  PRIMARY KEY (`subs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_subscriber` */

insert  into `tbl_subscriber`(`subs_id`,`subs_email`,`subs_date`,`subs_date_time`,`subs_hash`,`subs_active`) values 
(4,'jbbr.1990@gmail.com','2017-08-10','2017-08-10 07:44:23','',1);

/*Table structure for table `tbl_testdrive` */

DROP TABLE IF EXISTS `tbl_testdrive`;

CREATE TABLE `tbl_testdrive` (
  `id_testdrive` int(11) NOT NULL AUTO_INCREMENT,
  `pembeli_id` varchar(20) NOT NULL,
  `pengaju` varchar(200) NOT NULL,
  `nope` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `penjual` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `mobil` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Menunggu Persetujuan',
  PRIMARY KEY (`id_testdrive`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_testdrive` */

insert  into `tbl_testdrive`(`id_testdrive`,`pembeli_id`,`pengaju`,`nope`,`email`,`tanggal`,`penjual`,`lokasi`,`mobil`,`alamat`,`status`) values 
(1,'0','developer','+6289510056758','developers@gmail.com','2022-07-01','6','fdss',' 2014 Aston Martin Rapide','jhkdaa','Disetujui'),
(3,'64535','Yusuf','089670752600','spada.genk02@gmail.com','2022-07-24','6','100,100','2015 BMW i8','Jl. Sana','Dibatalkan'),
(4,'64535','Yusuf','089670752600','spada.genk02@gmail.com','2022-07-23','6','102.100','2006 Acura RSX Type-S','Jl. Sini','Disetujui');

/*Table structure for table `tbl_testimonial` */

DROP TABLE IF EXISTS `tbl_testimonial`;

CREATE TABLE `tbl_testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_testimonial` */

insert  into `tbl_testimonial`(`id`,`name`,`designation`,`company`,`photo`,`comment`) values 
(1,'Ahmad Nurhuda','Direktur','PT Maju Jaya Abadi','testimonial-1.jpeg','Mantap pelayanan dan kualitasnya terbaik.'),
(2,'Leo Wijaya','Digital Marketer','SS Multimedia','testimonial-2.jpg','Mantap... Mobilnya keren walaupun second'),
(3,'Andre Gus Asrori','Karyawan Bank','PT Lentera Abadi','testimonial-3.jpg','sesuai sama ekspektasi.. nggak nyesel beli disini'),
(4,'Joelyan Vicky','SPV','PT Informatika Nusantara','testimonial-4.jpg','Best Seller !! Terbaik');

/*Table structure for table `tbl_tipe` */

DROP TABLE IF EXISTS `tbl_tipe`;

CREATE TABLE `tbl_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe_pembelian` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_tipe` */

insert  into `tbl_tipe`(`id`,`tipe_pembelian`) values 
(1,'Lunas'),
(2,'Kredit');

/*Table structure for table `tbl_transmission_type` */

DROP TABLE IF EXISTS `tbl_transmission_type`;

CREATE TABLE `tbl_transmission_type` (
  `transmission_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `transmission_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`transmission_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_transmission_type` */

insert  into `tbl_transmission_type`(`transmission_type_id`,`transmission_type_name`) values 
(1,'Manual'),
(2,'Automatic');

/*Table structure for table `tbl_tunai` */

DROP TABLE IF EXISTS `tbl_tunai`;

CREATE TABLE `tbl_tunai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembeli` varchar(255) DEFAULT NULL,
  `total_bayar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_tunai` */

insert  into `tbl_tunai`(`id`,`id_pembeli`,`total_bayar`) values 
(1,'0',NULL),
(2,'0',NULL),
(3,'0',NULL),
(4,'0',NULL),
(5,'0',NULL),
(6,'0',NULL),
(7,'0','179000000'),
(8,'0','790000000'),
(9,'64535','380000000'),
(11,'64535','600000000'),
(12,'64535','40000000'),
(13,'64535','40000000'),
(14,'0','179000000'),
(15,'64535','90000000'),
(16,'41315','400000000'),
(17,'0','790000000');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`full_name`,`email`,`phone`,`password`,`photo`,`role`,`status`) values 
(1,'Tony','tony1234@gmail.com','6285233794526','81dc9bdb52d04dc20036dbd8313ed055','user-1.jpg','Super Admin','Active');

/*Table structure for table `tbl_waktu_booking` */

DROP TABLE IF EXISTS `tbl_waktu_booking`;

CREATE TABLE `tbl_waktu_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lama_booking` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_waktu_booking` */

insert  into `tbl_waktu_booking`(`id`,`lama_booking`) values 
(1,'1 Hari'),
(2,'2 Hari'),
(3,'3 Hari');

/*Table structure for table `tbl_waktu_cicilan` */

DROP TABLE IF EXISTS `tbl_waktu_cicilan`;

CREATE TABLE `tbl_waktu_cicilan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lama_cicilan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_waktu_cicilan` */

insert  into `tbl_waktu_cicilan`(`id`,`lama_cicilan`) values 
(1,'1 Tahun'),
(2,'2 Tahun'),
(3,'3 Tahun');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
