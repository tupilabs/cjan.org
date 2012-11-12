DROP TABLE IF EXISTS `plugins`;
CREATE TABLE `plugins` (
    `name` VARCHAR (40) PRIMARY KEY, 
    `description` VARCHAR(255), 
    `active` BOOL NOT NULL DEFAULT FALSE
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_bin;

INSERT INTO `plugins` (`name`, `description`, `active`) VALUES('helloworld', 'Simple hello world plug-in', TRUE);