CREATE DATABASE `jhkmCreations`
CHARACTER SET 'utf8';
USE `jhkmCreations`;
#------------------------------------------------------------
# Table: j5z9g2_categories
#------------------------------------------------------------

CREATE TABLE `j5z9g2_categories`(
        `id`           Int  Auto_increment  NOT NULL ,
        `categoryName` Varchar (50) NOT NULL
	,CONSTRAINT categories_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: j5z9g2_products
#------------------------------------------------------------

CREATE TABLE `j5z9g2_products`(
        `id`                   Int  Auto_increment  NOT NULL ,
        `productName`          Varchar (50) NOT NULL ,
        `description`          Varchar (150) NOT NULL ,
        `productReference`      Varchar (10) NOT NULL ,
        `price`                DECIMAL (15,3)  NOT NULL ,
        `id_categories` Int NOT NULL
	,CONSTRAINT products_PK PRIMARY KEY (`id`)

	,CONSTRAINT products_categories_FK FOREIGN KEY (`id_categories`) REFERENCES `j5z9g2_categories`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: j5z9g2_delivery
#------------------------------------------------------------

CREATE TABLE `j5z9g2_delivery`(
        `id`              Int  Auto_increment  NOT NULL ,
        `address`         Varchar (50) NOT NULL ,
        `postalCode`      Varchar (5) NOT NULL ,
        `city`            Varchar (15) NOT NULL ,
        `telephoneNumber` Varchar(15) NOT NULL
	,CONSTRAINT delivery_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: j5z9g2_deliveryOptions
#------------------------------------------------------------

CREATE TABLE `j5z9g2_deliveryOptions`(
        `id`                 Int  Auto_increment  NOT NULL ,
        `name`               Varchar (50) NOT NULL ,
        `id_delivery` Int NOT NULL
	,CONSTRAINT `deliveryOptions_PK` PRIMARY KEY (`id`)

	,CONSTRAINT `deliveryOptions_delivery_FK` FOREIGN KEY (`id_delivery`) REFERENCES `j5z9g2_delivery`(`id`)
	,CONSTRAINT `deliveryOptions_delivery_AK` UNIQUE (`id_delivery`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: j5z9g2_roles
#------------------------------------------------------------

CREATE TABLE `j5z9g2_roles`(
        `id`   Int  Auto_increment  NOT NULL ,
        `name` Varchar (50) NOT NULL
	,CONSTRAINT `roles_PK` PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: j5z9g2_users
#------------------------------------------------------------

CREATE TABLE `j5z9g2_users`(
        `id`              Int  Auto_increment  NOT NULL ,
        `email`           Varchar (255) NOT NULL ,
        `password`        Varchar (255) NOT NULL ,
        `id_roles` Int NOT NULL
	,CONSTRAINT `users_PK` PRIMARY KEY (`id`)

	,CONSTRAINT `users_roles_FK` FOREIGN KEY (`id_roles`) REFERENCES `j5z9g2_roles`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: j5z9g2_clients
#------------------------------------------------------------

CREATE TABLE `j5z9g2_clients`(
        `id`              Int  Auto_increment  NOT NULL ,
        `firstName`       Varchar (50) NOT NULL ,
        `lastName`        Varchar (50) NOT NULL ,
        `address`         Varchar (50) NOT NULL ,
        `telephoneNumber` Varchar(15) NOT NULL,
        `postalCode`      Varchar (5) NOT NULL ,
        `city`            Varchar (15) NOT NULL ,
        `id_users`        Int NOT NULL
	,CONSTRAINT `clients_PK` PRIMARY KEY (`id`)

	,CONSTRAINT `clients_users_FK` FOREIGN KEY (`id_users`) REFERENCES `j5z9g2_users`(`id`)
	,CONSTRAINT `clients_users_AK` UNIQUE (`id_users`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: j5z9g2_orders
#------------------------------------------------------------

CREATE TABLE `j5z9g2_orders`(
        `id`                 Int  Auto_increment  NOT NULL ,
        `orderDate`          Date NOT NULL ,
        `totalPrice`         DECIMAL (15,3)  NOT NULL ,
        `trackingNumber`     Varchar (50) NOT NULL ,
        `id_clients`  Int NOT NULL ,
        `id_delivery` Int NOT NULL
	,CONSTRAINT `orders_PK` PRIMARY KEY (id)

	,CONSTRAINT `orders_clients_FK` FOREIGN KEY (`id_clients`) REFERENCES `j5z9g2_clients`(`id`)
	,CONSTRAINT `orders_delivery_FK` FOREIGN KEY (`id_delivery`) REFERENCES `j5z9g2_delivery`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: `j5z9g2_comments`
#------------------------------------------------------------

CREATE TABLE `j5z9g2_comments`(
        `id`                 Int  Auto_increment  NOT NULL ,
        `comment`            Text NOT NULL ,
        `id_clients`  Int NOT NULL ,
        `id_products` Int NOT NULL
	,CONSTRAINT `comments_PK` PRIMARY KEY (id)

	,CONSTRAINT `comments_clients_FK` FOREIGN KEY (`id_clients`) REFERENCES `j5z9g2_clients`(`id`)
	,CONSTRAINT `comments_products_FK` FOREIGN KEY (`id_products`) REFERENCES `j5z9g2_products`(`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: j5z9g2_ordersPlaced
#------------------------------------------------------------

CREATE TABLE `j5z9g2_ordersPlaced`(
        `id`                 Int NOT NULL ,
        `id_products` Int NOT NULL
	,CONSTRAINT `ordersPlaced_PK` PRIMARY KEY (`id`,`id_products`)

	,CONSTRAINT `ordersPlaced_orders_FK` FOREIGN KEY (id) REFERENCES `j5z9g2_orders`(`id`)
	,CONSTRAINT `ordersPlaced_products_FK` FOREIGN KEY (`id_products`) REFERENCES `j5z9g2_products`(`id`)
)ENGINE=InnoDB;




