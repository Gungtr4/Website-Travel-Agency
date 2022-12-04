DROP TABLE airplane;

CREATE TABLE `airplane` (
  `id_airplane` varchar(10) NOT NULL,
  `airplane_name` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL,
  `eco_seat` int(10) NOT NULL,
  `business_seat` int(10) NOT NULL,
  PRIMARY KEY (`id_airplane`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE airport;

CREATE TABLE `airport` (
  `id_airport` varchar(10) NOT NULL,
  `airport_name` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  PRIMARY KEY (`id_airport`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO airport VALUES("APT00001","Ngurah Rai Airport","Denpasar");



DROP TABLE flight;

CREATE TABLE `flight` (
  `flight_no` varchar(10) NOT NULL,
  `depart` varchar(10) NOT NULL,
  `arrive` varchar(10) NOT NULL,
  `depart_date` date NOT NULL,
  `depart_time` time NOT NULL,
  `arrive_date` date NOT NULL,
  `arrive_time` time NOT NULL,
  `id_airplane` varchar(10) NOT NULL,
  PRIMARY KEY (`flight_no`),
  KEY `id_airplane` (`id_airplane`),
  KEY `depart` (`depart`),
  KEY `arrive` (`arrive`),
  CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`id_airplane`) REFERENCES `airplane` (`id_airplane`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `flight_ibfk_2` FOREIGN KEY (`depart`) REFERENCES `airport` (`id_airport`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `flight_ibfk_3` FOREIGN KEY (`arrive`) REFERENCES `airport` (`id_airport`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE flight_booking;

CREATE TABLE `flight_booking` (
  `id_flight_booking` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_fare_flight` varchar(10) NOT NULL,
  `passenger_total` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment` varchar(25) NOT NULL,
  PRIMARY KEY (`id_flight_booking`),
  KEY `id_user` (`id_user`),
  KEY `flight_no` (`id_fare_flight`),
  KEY `id_fare_flight` (`id_fare_flight`),
  CONSTRAINT `flight_booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `flight_booking_ibfk_2` FOREIGN KEY (`id_fare_flight`) REFERENCES `flight_fare` (`id_fare_flight`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE flight_fare;

CREATE TABLE `flight_fare` (
  `id_fare_flight` varchar(10) NOT NULL,
  `flight_no` varchar(10) NOT NULL,
  `class` varchar(25) NOT NULL,
  `fare` int(25) NOT NULL,
  PRIMARY KEY (`id_fare_flight`),
  KEY `flight_no` (`flight_no`),
  CONSTRAINT `flight_fare_ibfk_1` FOREIGN KEY (`flight_no`) REFERENCES `flight` (`flight_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE flight_passenger;

CREATE TABLE `flight_passenger` (
  `id_flight_passenger` varchar(10) NOT NULL,
  `id_flight_booking` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_number` int(25) NOT NULL,
  PRIMARY KEY (`id_flight_passenger`),
  KEY `id_no` (`id_number`),
  KEY `id_flight_booking` (`id_flight_booking`),
  CONSTRAINT `flight_passenger_ibfk_1` FOREIGN KEY (`id_flight_booking`) REFERENCES `flight_booking` (`id_flight_booking`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE station;

CREATE TABLE `station` (
  `id_station` varchar(10) NOT NULL,
  `city` varchar(25) NOT NULL,
  `station_name` varchar(25) NOT NULL,
  PRIMARY KEY (`id_station`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO station VALUES("STN00001","Bandung","Station Banjaran");
INSERT INTO station VALUES("STN00002","West Java","Babakan");
INSERT INTO station VALUES("STN00003","East Java","Babat");



DROP TABLE train;

CREATE TABLE `train` (
  `id_train` varchar(10) NOT NULL,
  `train_name` varchar(25) NOT NULL,
  `eco_seat` int(10) NOT NULL,
  `business_seat` int(10) NOT NULL,
  `exec_seat` int(10) NOT NULL,
  PRIMARY KEY (`id_train`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO train VALUES("IT00001","New Argo Jati","600","50","60");
INSERT INTO train VALUES("IT00002","Argo Bromo Anggrek","60","50","50");



DROP TABLE train_booking;

CREATE TABLE `train_booking` (
  `id_train_booking` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_fare_train` varchar(10) NOT NULL,
  `passenger_total` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment` varchar(25) NOT NULL,
  PRIMARY KEY (`id_train_booking`),
  KEY `id_user` (`id_user`),
  KEY `id_route` (`id_fare_train`),
  KEY `id_fare_train` (`id_fare_train`),
  CONSTRAINT `train_booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `train_booking_ibfk_2` FOREIGN KEY (`id_fare_train`) REFERENCES `train_fare` (`id_fare_train`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE train_fare;

CREATE TABLE `train_fare` (
  `id_fare_train` varchar(10) NOT NULL,
  `id_route` varchar(10) NOT NULL,
  `class` varchar(25) NOT NULL,
  `fare` int(10) NOT NULL,
  PRIMARY KEY (`id_fare_train`),
  KEY `id_route` (`id_route`),
  CONSTRAINT `train_fare_ibfk_1` FOREIGN KEY (`id_route`) REFERENCES `train_route` (`id_route`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO train_fare VALUES("IFR00001","TRO00001","Economy","80000");
INSERT INTO train_fare VALUES("IFR00002","TRO00001","Business","130000");
INSERT INTO train_fare VALUES("IFR00003","TRO00001","Executive","190000");



DROP TABLE train_passenger;

CREATE TABLE `train_passenger` (
  `id_train_passenger` varchar(10) NOT NULL,
  `id_train_booking` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_number` int(25) NOT NULL,
  PRIMARY KEY (`id_train_passenger`),
  KEY `id_no` (`id_number`),
  KEY `id_train_booking` (`id_train_booking`),
  CONSTRAINT `train_passenger_ibfk_1` FOREIGN KEY (`id_train_booking`) REFERENCES `train_booking` (`id_train_booking`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE train_route;

CREATE TABLE `train_route` (
  `id_route` varchar(10) NOT NULL,
  `depart` varchar(10) NOT NULL,
  `arrive` varchar(10) NOT NULL,
  `depart_date` date NOT NULL,
  `depart_time` time NOT NULL,
  `arrive_date` date NOT NULL,
  `arrive_time` time NOT NULL,
  `id_train` varchar(10) NOT NULL,
  PRIMARY KEY (`id_route`),
  KEY `id_train` (`id_train`),
  KEY `depart` (`depart`),
  KEY `arrive` (`arrive`),
  CONSTRAINT `train_route_ibfk_1` FOREIGN KEY (`id_train`) REFERENCES `train` (`id_train`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `train_route_ibfk_2` FOREIGN KEY (`depart`) REFERENCES `station` (`id_station`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `train_route_ibfk_3` FOREIGN KEY (`arrive`) REFERENCES `station` (`id_station`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO train_route VALUES("TRO00001","STN00001","STN00002","2018-02-10","13:30:00","2018-02-10","14:00:00","IT00002");



DROP TABLE user;

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `level` varchar(35) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("USR00001","administrator","admin@yahoo.com","admin","21232f297a57a5a743894a0e4a801fc3","Denpasar","Indonesia","Admin");
INSERT INTO user VALUES("USR00002","rio","rio@gmail.com","rio","d5ed38fdbf28bc4e58be142cf5a17cf5","rio","rio","customer");



