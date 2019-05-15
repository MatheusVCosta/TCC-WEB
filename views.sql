CREATE VIEW `view_num_locacao` AS
    SELECT 
        COUNT(`locacao`.`id_anuncio`) AS `numero_locacao`,
        `locacao`.`id_anuncio` AS `id_anuncio`
    FROM
        `tbl_locacao` `locacao`
    GROUP BY `locacao`.`id_anuncio`;

CREATE VIEW `view_anuncios` AS
    SELECT 
        IF(ISNULL(`avaliacao_servico`.`id_avaliacao_servico`),
            0,
            AVG(`avaliacao_servico`.`nota`)) AS `avaliacao`,
        `num_locacao`.`numero_locacao` AS `numero_locacao`,
        `anuncio`.`id_anuncio` AS `id_anuncio`,
        `tipo_veiculo`.`id_tipo_veiculo` AS `id_tipo_veiculo`,
        `marca_tipo`.`id_tipo_marca` AS `id_tipo_marca`,
        `modelo_veiculo`.`id_modelo` AS `id_modelo`,
        `cliente`.`nome_cliente` AS `locador`,
        `cliente`.`cpf` AS `cpf`,
        `cliente`.`telefone` AS `telefone`,
        `cliente`.`celular` AS `celular`,
        `cliente`.`cnh_foto` AS `cnh_foto`,
        `cliente`.`foto_cliente` AS `foto_cliente`,
        `cliente`.`rua` AS `rua`,
        `cliente`.`bairro` AS `bairro`,
        `cliente`.`cep` AS `cep`,
        `cliente`.`cidade` AS `cidade`,
        `cliente`.`complemento` AS `complemento`,
        `cliente`.`uf` AS `uf`,
        `cliente`.`email` AS `email`,
        `cliente`.`dt_nascimento` AS `dt_nascimento`,
        `veiculo`.`ano` AS `ano`,
        `veiculo`.`placa` AS `placa`,
        `veiculo`.`quilometragem` AS `quilometragem`,
        `veiculo`.`renavam` AS `renavam`,
        `tipo_veiculo`.`nome_tipo_veiculo` AS `nome_tipo_veiculo`,
        `foto_veiculo`.`nome_foto` AS `nome_foto`,
        `marca_veiculo`.`nome_marca` AS `nome_marca`,
        `modelo_veiculo`.`nome_modelo` AS `nome_modelo`,
        `anuncio`.`data_inicial` AS `data_inicial`,
        `anuncio`.`data_final` AS `data_final`,
        `anuncio`.`descricao` AS `descricao`,
        `anuncio`.`horario_inicio` AS `horario_inicio`,
        `anuncio`.`horario_termino` AS `horario_termino`,
        `anuncio`.`valor_hora` AS `valor_hora`
    FROM
        (((((((((((`tbl_anuncio` `anuncio`
        JOIN `tbl_cliente` `cliente` ON ((`cliente`.`id_cliente` = `anuncio`.`id_cliente_locador`)))
        JOIN `tbl_veiculo` `veiculo` ON (((`veiculo`.`id_cliente` = `cliente`.`id_cliente`)
            AND (`veiculo`.`id_veiculo` = `anuncio`.`id_veiculo`))))
        JOIN `tbl_tipo_veiculo` `tipo_veiculo` ON ((`tipo_veiculo`.`id_tipo_veiculo` = `veiculo`.`id_tipo_veiculo`)))
        JOIN `tbl_marca_veiculo` `marca_veiculo` ON ((`marca_veiculo`.`id_marca_veiculo` = `veiculo`.`id_marca_veiculo`)))
        JOIN `tbl_modelo_veiculo` `modelo_veiculo` ON ((`veiculo`.`id_modelo_veiculo` = `modelo_veiculo`.`id_modelo`)))
        JOIN `tbl_marca_veiculo_tipo_veiculo` `marca_tipo` ON ((`marca_tipo`.`id_tipo_marca` = `modelo_veiculo`.`id_marca_tipo`)))
        JOIN `tbl_foto_veiculo` `foto_veiculo` ON ((`foto_veiculo`.`id_veiculo` = `veiculo`.`id_veiculo`)))
        JOIN `tbl_aprovacao_anuncio` `aprovacao_anuncio` ON ((`aprovacao_anuncio`.`id_anuncio` = `anuncio`.`id_anuncio`)))
        LEFT JOIN `tbl_locacao` `locacao` ON ((`locacao`.`id_anuncio` = `anuncio`.`id_anuncio`)))
        LEFT JOIN `tbl_avaliacao_servico` `avaliacao_servico` ON ((`locacao`.`id_locacao` = `avaliacao_servico`.`id_locacao`)))
        LEFT JOIN `view_num_locacao` `num_locacao` ON ((`num_locacao`.`id_anuncio` = `anuncio`.`id_anuncio`)))
    WHERE
        ((`cliente`.`status` = 1)
            AND (`aprovacao_anuncio`.`status_aprovacao` = 1))
    GROUP BY `anuncio`.`id_anuncio` , `num_locacao`.`id_anuncio`
    ORDER BY (AVG(`avaliacao_servico`.`nota`) > 4) DESC;
    
    
    CREATE VIEW `view_meus_veiculo` AS
    SELECT 
        `veiculo`.`ano` AS `ano`,
        `veiculo`.`placa` AS `placa`,
        `veiculo`.`quilometragem` AS `quilometragem`,
        `veiculo`.`renavam` AS `renavam`,
        `tipo_veiculo`.`nome_tipo_veiculo` AS `nome_tipo_veiculo`,
        `marca_veiculo`.`nome_marca` AS `nome_marca`,
        `modelo_veiculo`.`nome_modelo` AS `nome_modelo`,
        `foto_veiculo`.`nome_foto` AS `nome_foto`,
        `veiculo`.`id_cliente` AS `id_cliente`
    FROM
        ((((`tbl_veiculo` `veiculo`
        JOIN `tbl_tipo_veiculo` `tipo_veiculo` ON ((`tipo_veiculo`.`id_tipo_veiculo` = `veiculo`.`id_tipo_veiculo`)))
        JOIN `tbl_marca_veiculo` `marca_veiculo` ON ((`marca_veiculo`.`id_marca_veiculo` = `veiculo`.`id_marca_veiculo`)))
        JOIN `tbl_modelo_veiculo` `modelo_veiculo` ON ((`modelo_veiculo`.`id_modelo` = `veiculo`.`id_modelo_veiculo`)))
        JOIN `tbl_foto_veiculo` `foto_veiculo` ON ((`foto_veiculo`.`id_veiculo` = `veiculo`.`id_veiculo`)))
    WHERE
        (`veiculo`.`id_cliente` = 1)
    GROUP BY `foto_veiculo`.`id_veiculo`;
    
    
    
    CREATE VIEW `view_tipo_marca` AS
    SELECT 
        `tbl_tipo_veiculo`.`id_tipo_veiculo` AS `id_tipo_veiculo`,
        `tbl_marca_veiculo_tipo_veiculo`.`id_marca_veiculo` AS `id_marca_veiculo`,
        `tbl_marca_veiculo_tipo_veiculo`.`id_tipo_marca` AS `id_tipo_marca`,
        `tbl_marca_veiculo`.`nome_marca` AS `nome_marca`
    FROM
        ((`tbl_tipo_veiculo`
        JOIN `tbl_marca_veiculo_tipo_veiculo` ON ((`tbl_marca_veiculo_tipo_veiculo`.`id_tipo_veiculo` = `tbl_tipo_veiculo`.`id_tipo_veiculo`)))
        JOIN `tbl_marca_veiculo` ON ((`tbl_marca_veiculo`.`id_marca_veiculo` = `tbl_marca_veiculo_tipo_veiculo`.`id_marca_veiculo`)))
    WHERE
        ((`tbl_marca_veiculo_tipo_veiculo`.`excluido` = 0)
            AND (`tbl_marca_veiculo`.`status` = 1));