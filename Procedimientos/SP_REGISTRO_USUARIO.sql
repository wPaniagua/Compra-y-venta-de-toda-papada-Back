CREATE PROCEDURE SP_REGISTRO_USUARIO_ADMINISTRADOR(
                    IN ppNombre VARCHAR(50),
                    IN psNombre VARCHAR(50),
                    IN ppApellido VARCHAR(50),
                    IN psApellido VARCHAR(50),
                    IN pcorreo VARCHAR(50),
                    IN pcontrasenia VARCHAR(50),
                    IN pfechaNac VARCHAR(10),
                    IN ptipoUsuario INT,
                    IN pmunicipio INT,
                    OUT mensaje VARCHAR(100),
                    OUT codigo VARCHAR(2),
                    OUT idUsuario INT) 
SP:BEGIN
    DECLARE conteo INT;
    DECLARE id INT;
    DECLARE pid INT;

    DECLARE tempMensaje VARCHAR(100);
    SET autocommit=0;  
    SET tempMensaje='';
    START TRANSACTION;  


    IF ppNombre='' or psNombre='' THEN
        SET tempMensaje='Nombre ,';
    END IF;
    IF ppApellido='' or psApellido THEN
        SET tempMensaje='Apellidos ,';
    END IF;
    IF pcorreo='' THEN
        SET tempMensaje='Correo ,';
    END IF;
    IF pcontrasenia='' THEN
        SET tempMensaje='Contrasenia ,';
    END IF;
    IF pfechaNac='' THEN
        SET tempMensaje='Fecha nacimiento ,';
    END IF;
    IF pmunicipio<1 THEN
        SET tempMensaje='Municipio ,';
    END IF;
    
    IF tempMensaje<>'' THEN
        SET mensaje=CONCAT('Campos requeridos ',tempMensaje);
        LEAVE SP;
    END IF;
    
    SELECT count(*) INTO conteo FROM persona
    WHERE correo=pcorreo;
    
    IF conteo=0 THEN
        SELECT COUNT(idPersona) into id FROM `persona`;
    
        SET pid=id+1; 
        insert into `persona` (`idPersona`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `correo`, `fechaNac`, `contrasenia`, `idTipoUsuario`, `idMunicipio`, `estado`) 
        values(pid, ppNombre, psNombre, ppApellido, psApellido, pcorreo, pfechaNac, pcontrasenia, ptipoUsuario, pMunicipio, "A");

        SET mensaje='Registro exitoso';
        SET codigo=1;
        SET idUsuario = pid;

        COMMIT;
    ELSE
        SET mensaje='Ya existe usuario registrado con ese correo';
        SET codigo=0;
        SET idUsuario = 0;
    END IF;  
END$$

SET @p0='Wilson'; SET @p1='Geovanny'; SET @p2='Paniagua';  SET @p3='Sierra';  SET @p4='paniagua2015@hotmail.com'; SET @p5='asd.456';  SET @p6='1986-01-10'; SET @p7=3; SET @p8=15; 

CALL `SP_REGISTRO_USUARIO`(@p0, @p1, @p2, @p3, @p4, @p5, @p6, @p7, @p8, @p9, @p10, @p11); SELECT @p9 AS `mensaje`, @p10 AS `codigo`, @p11 AS `idUsuario`;