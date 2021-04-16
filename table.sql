CREATE TABLE `beneficio_teste` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome_beneficio` VARCHAR(255) NULL,
	`cod_beneficio` INT NULL,
	`operadora` VARCHAR(50) NULL DEFAULT NULL,
    `tipo_beneficio` VARCHAR(150) NULL DEFAULT NULL,
	`valor_beneficio` FLOAT NULL DEFAULT NULL,
	`data_vencimento_contrato` DATE NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
;
