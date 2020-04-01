


CREATE OR REPLACE PROCEDURE SP_AGREGAR_PUB( 
                    IN nombreProducto VARCHAR(50),
                    IN caracteristicas VARCHAR(500),
                    IN idCategoria INT,
                    IN tipo VARCHAR(50),
                    IN precio INT,
                    IN idPersona INT,
                    IN idMoneda INT,
                    OUT mensaje VARCHAR(100)
                    ) 
SP:BEGIN

    DECLARE idPro INT;
    DECLARE idAnu INT;
    DECLARE conteoP INT;
    DECLARE conteoA INT;
    DECLARE tempMensaje VARCHAR(100);
    SET autocommit=0;  
    SET tempMensaje='';
    START TRANSACTION;  


    IF nombreProducto='' THEN
        SET tempMensaje='Nombre, ';
    END IF;
    IF caracteristicas=''  THEN
        SET tempMensaje='Caracteristicas, ';
    END IF;
    IF idCategoria='' THEN
        SET tempMensaje='Categoria,';
    END IF;
    IF precio='' THEN
        SET tempMensaje='Precio ,';
    END IF;
    IF tipo='' THEN
        SET tempMensaje='Tipo,';
    END IF;
    IF idPersona='' THEN
        SET tempMensaje='Persona,';
    END IF;
    IF idMoneda='' THEN
        SET tempMensaje='Moneda,';
    END IF;
    
    IF tempMensaje<>'' THEN
        SET mensaje=CONCAT('Campos requeridos ',tempMensaje);
        LEAVE SP;
    END IF;
    
        
        SELECT COUNT(*) INTO idPro FROM producto;
        SELECT COUNT(*) INTO idAnu FROM anuncios;
        SET conteoP=idPro+1;
        SET conteoA=idAnu+1;

        INSERT INTO `producto` (`idProducto`, `nombre`, `estado`, `caracteristicas`, `idCategorias`, `tipo`) 
        VALUES(conteoP,nombreProducto, "A",caracteristicas, idCategoria, tipo);

        INSERT INTO `anuncios`(`idAnuncios`,`titulo`,`descripcion`,`precio`,`idPersona`,`idMoneda`,`idProducto`,`estado`, `fecha`) 
        VALUES(conteoA,nombreProducto, caracteristicas, precio, idPersona, idMoneda, conteoP , "A",CURDATE());

        /*INSERT INTO `fotosAnuncios` (`idFotos`,`cantidad`, `urlFoto`, `idAnuncios`)
         VALUES(, 1, url, );*/

        SET mensaje='Registro exitoso';


        COMMIT;  
END$$
