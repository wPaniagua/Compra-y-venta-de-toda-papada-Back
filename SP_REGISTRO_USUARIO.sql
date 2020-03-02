CREATE PROCEDURE SP_REGISTRO_USUARIO(
                  IN ppNombre VARCHAR(50),
                  IN psNombre VARCHAR(50),
                  IN ppApellido VARCHAR(50),
                  IN psApellido VARCHAR(50),
                  IN pid INT,
                  IN pcorreo VARCHAR(50),
                  IN pcontrasenia VARCHAR(50),
                  IN pfechaNac DATETIME,
                  IN pfoto VARCHAR(100),
                  IN ptipoUsuario INT,
                  IN ptelefono VARCHAR(50),
                  IN pmunicipio INT,
                  IN pdepto INT,
                  IN pestado VARCHAR(50),
                  OUT mensaje VARCHAR(100)) 
SP:BEGIN
  DECLARE conteo INT;
  DECLARE id INT;
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
  IF ptipoUsuario='' THEN
    SET tempMensaje='Tipo usuario ,';
  END IF;
  IF ptelefono='' THEN
    SET tempMensaje='Telefono ,';
  END IF;
  IF pmunicipio='' THEN
    SET tempMensaje='Municipio ,';
  END IF;
  IF pdepto='' THEN
    SET tempMensaje='Departamento ,';
  END IF;
  IF pestado='' THEN
    SET tempMensaje='Estado ,';
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
    values(pid, ppNombre, psNombre, ppApellido, psApellido, pcorreo, pfechaNac, pcontrasenia, PtipoUsuario, pMunicipio, pestado);
    SET mensaje='Registro exitoso';
    COMMIT;
  ELSE
    SET mensaje='Ya existe usuario registrado con ese correo';
  END IF;  
END$$
