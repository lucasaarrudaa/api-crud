
CREATE DATABASE apiphp

INSERT INTO `Membro` (`id`, `nome_membro`, `email_end`, `idade`, `cargo`, `data_entrada`) VALUES 
(1, 'Caio', 'caio123@gmail.com', 32, 'Médico', '2029-06-01 02:12:30'),
(2, 'Marcos', 'mrcs4@gmail.com', 29, 'Engenheiro', '2023-03-03 01:20:10'),
(3, 'Antonio', 'ants78@gmail.com', 36, 'Eletricista', '2028-09-20 03:10:25'),
(4, 'Pedro', 'pedr_1@gmail.com', 42, 'Designer', '2027-04-11 04:11:12'),
(5, 'Francisco', 'francs@gmail.com', 48, 'Developer', '2026-01-04 05:20:30'),
(6, 'Maria', 'mar@gmail.com', 37, 'CEO', '2022-01-10 06:40:10'),
(7, 'Antonia', 'ant@gmail.com', 44, 'PO', '2022-05-02 02:20:30'),
(8, 'Carla', 'car@gmail.com', 49, 'PM', '2025-01-04 05:15:35'),
(9, 'Mariana', 'mar@gmail.com', 51, 'Diretor Executivo', '2026-01-02 02:20:30'),
(10, 'Josiane', 'jos@gmail.com', 45, 'Diretor Comercial', '2028-02-01 06:22:50');

CREATE TABLE IF NOT EXISTS `Membro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_membro` VARCHAR(256) NOT NULL,
  `email_end` VARCHAR(50),
  `idade` INT(11) NOT NULL,
  `cargo` VARCHAR(255) NOT NULL,
  `data_entrada` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;
