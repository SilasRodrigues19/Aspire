-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela aspire.email
CREATE TABLE IF NOT EXISTS `email` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_secret` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar senhas do gmail';

-- Copiando dados para a tabela aspire.email: ~0 rows (aproximadamente)
INSERT INTO `email` (`email_id`, `email_secret`, `created_at`) VALUES
	(1, 'ricikqbswcvtxqqi', '2023-05-11 01:37:12');

-- Copiando estrutura para tabela aspire.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` varchar(32) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_requirements` varchar(255) NOT NULL,
  `job_link` varchar(255) NOT NULL,
  `job_level` enum('Senior','Pleno','Junior','Trainee','Estágio','Não informado') NOT NULL DEFAULT 'Não informado',
  `job_salary` varchar(255) NOT NULL,
  `job_currency` enum('Real','Dollar','Euro') NOT NULL DEFAULT 'Real',
  `job_mode` enum('Remoto','Presencial','Híbrido','Não informado') NOT NULL DEFAULT 'Não informado',
  `job_contract` enum('PJ','CLT','Não listado') NOT NULL DEFAULT 'Não listado',
  `job_email` varchar(255) DEFAULT NULL,
  `job_experience` tinyint(1) NOT NULL DEFAULT 0,
  `job_is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `job_observation` varchar(255) DEFAULT NULL,
  `job_post_user` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações sobre as vagas';

-- Copiando dados para a tabela aspire.jobs: ~1 rows (aproximadamente)

-- Copiando estrutura para tabela aspire.report
CREATE TABLE IF NOT EXISTS `report` (
  `report_id` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_job_id` varchar(255) NOT NULL,
  `report_reason` enum('Fraudulent','Misleading','Discriminatory','Illegal','Invalid','Default') NOT NULL DEFAULT 'Default',
  `report_observation` varchar(255) DEFAULT NULL,
  `report_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações de vagas reportadas';

-- Copiando dados para a tabela aspire.report: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela aspire.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_level` enum('User','Mod','Admin') NOT NULL DEFAULT 'User',
  `user_is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações de usuários';

-- Copiando dados para a tabela aspire.users: ~1 rows (aproximadamente)
INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_level`, `user_is_active`, `created_at`) VALUES
	('9b47c64fffa91913b4b1ad327be0686a', 'user', '$argon2i$v=19$m=65536,t=4,p=1$WWJTcERKMy5TT0M5REZMWQ$rYY21321321', 'silasrodrigues.fatec@gmail.com', 'User', 1, '2023-05-02 23:09:34'),
	('d2be33b030acfc40e4d31192b0f18023', 'joao', '$argon2i$v=19$m=65536,t=4,p=1$WWJTcERKMy5TT0M5REZMWQ$rYYWw4CBAlyKmY6hIK0ID8Wps0smzLHyakLca1rv0ik', 'joao@mail.com', 'User', 1, '2023-04-30 17:02:19');

-- Copiando estrutura para tabela aspire.validemails
CREATE TABLE IF NOT EXISTS `validemails` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_domain` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para guardar informações de e-mails confiáveis e não temporários';

-- Copiando dados para a tabela aspire.validemails: ~15 rows (aproximadamente)
INSERT INTO `validemails` (`email_id`, `email_domain`, `created_at`) VALUES
	(1, '@gmail', '2023-04-18 22:27:31'),
	(2, '@hotmail', '2023-04-18 22:27:31'),
	(3, '@outlook', '2023-04-18 22:27:31'),
	(4, '@yahoo', '2023-04-18 22:27:31'),
	(5, '@protonmail', '2023-04-18 22:27:31'),
	(6, '@zoho', '2023-04-18 22:27:31'),
	(7, '@icloud', '2023-04-18 22:27:31'),
	(8, '@aol', '2023-04-18 22:27:31'),
	(9, '@uol', '2023-04-18 22:27:31'),
	(10, '@gmx', '2023-04-18 22:27:31'),
	(11, '@fastmail', '2023-04-18 22:27:31'),
	(12, '@mail', '2023-04-18 22:27:31'),
	(13, '@hustmail', '2023-04-18 22:27:31'),
	(14, '@yandex', '2023-04-18 22:27:31'),
	(15, '@tutanota', '2023-04-18 22:27:31');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
