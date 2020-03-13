CREATE OR REPLACE PROCEDURE SP_PERFIL_ADMIN(
                  IN ppNombre VARCHAR(50),
                  IN psNombre VARCHAR(50),
                  IN ppApellido VARCHAR(50),
                  IN psApellido VARCHAR(50),
                  IN pcorreo VARCHAR(50),
                  IN pfechaNac VARCHAR(10),
                  IN pmunicipio INT,
                  IN idUsuario INT,
                  IN urlImg VARCHAR(50),
                  IN  accion VARCHAR(50),
                  OUT mensaje VARCHAR(100)) 
SP:BEGIN
  DECLARE conteo INT;
  DECLARE id INT;
  DECLARE idIM INT;
  DECLARE tempMensaje VARCHAR(100);
  SET autocommit=0;  
  SET tempMensaje='';
  START TRANSACTION;

  IF accion='' THEN
      SET tempMensaje='Accion ,';
  END IF;

  IF tempMensaje<>'' THEN
    SET mensaje=CONCAT('Campo requerido ',tempMensaje);
    LEAVE SP;
  END IF;
  

  IF accion="editar" THEN
    IF ppNombre='' or psNombre='' THEN
    SET tempMensaje='Nombre ,';
    END IF;
    IF ppApellido='' or psApellido THEN
        SET tempMensaje='Apellidos ,';
    END IF;
    IF pcorreo='' THEN
        SET tempMensaje='Correo ,';
    END IF;
    IF pmunicipio<1 THEN
        SET tempMensaje='Municipio ,';
    END IF;
    IF idUsuario='' or idUsuario=0 THEN
        SET tempMensaje='Id Usuario ,';
    END IF;
     
    IF tempMensaje<>'' THEN
      SET mensaje=CONCAT('Campo requerido ',tempMensaje);
      LEAVE SP;
    END IF;                     
      
  END IF;

  IF accion="eliminar" THEN
      IF idUsuario='' or idUsuario=0 THEN
        SET tempMensaje='Id Usuario ,';
      END IF;
       
      IF tempMensaje<>'' THEN
        SET mensaje=CONCAT('Campo requerido ',tempMensaje);
        LEAVE SP;
      END IF; 
  END IF;  

  IF accion="editarFoto" THEN
    IF urlImg='' THEN
        SET tempMensaje='foto ,';
    END IF; 
    IF idUsuario='' or idUsuario=0 THEN
        SET tempMensaje='id usuario ,';
      END IF; 
    IF tempMensaje<>'' THEN
        SET mensaje=CONCAT('Campo requerido ',tempMensaje);
        LEAVE SP;
    END IF;
  END IF;

  IF accion="obtenerFotos" THEN
    IF idUsuario='' or idUsuario=0 THEN
      SET tempMensaje='id usuario ,';
    END IF; 
    IF tempMensaje<>'' THEN
        SET mensaje=CONCAT('Campo requerido ',tempMensaje);
        LEAVE SP;
    END IF;
    SET mensaje='Exitoso';
  END IF;

  IF accion="obtenerActivos" THEN
      SELECT idPersona, primerNombre, segundoNombre, primerApellido, segundoApellido, 
      correo, fechaNac, contrasenia, idTipoUsuario, idMunicipio, estado 
      FROM persona WHERE estado='a';
      SET mensaje='Exitoso';
  END IF;

  IF accion="obtenerInactivos" THEN
      SELECT idPersona, primerNombre, segundoNombre, primerApellido, segundoApellido, 
      correo, fechaNac, contrasenia, idTipoUsuario, idMunicipio, estado 
      FROM persona WHERE estado='I';
      SET mensaje='Exitoso';
  END IF;

  IF accion="obtenerMunicipios" THEN
      SELECT idMunicipio, nombre, idDeptos FROM municipio;
      SET mensaje='Exitoso';
  END IF;

  IF accion="obtenerDeptos" THEN
      SELECT idDeptos, nombre FROM deptos;
      SET mensaje='Exitoso';
  END IF;

  IF accion="obtenerFotos" THEN
      SELECT * FROM fotosusuario WHERE idPersona=idUsuario;
      SET mensaje='Exitoso';
  END IF;

  IF accion="editar" THEN
    
    SELECT COUNT(*) INTO conteo FROM persona WHERE idPersona=idUsuario;

    IF conteo=0 THEN
      SET mensaje='No existe el usuario';
      LEAVE SP;
    END IF;

    IF conteo=1 THEN
      UPDATE persona SET primerNombre=ppNombre,segundoNombre=psNombre,
      primerApellido=ppApellido,segundoApellido=psApellido,correo=pcorreo,
      idMunicipio=pmunicipio WHERE idPersona=idUsuario;
      SET mensaje='Edicion exitosa';
      COMMIT;
    END IF;    

  END IF;

  IF accion="editarFoto" THEN

    SELECT COUNT(*) INTO conteo FROM fotosusuario WHERE idPersona=idUsuario;
    SELECT COUNT(*) INTO id FROM fotosusuario;

    SET idIM=id+1;

    IF conteo=0 THEN
      INSERT INTO fotosusuario(idFotos, urlFoto, idPersona) 
      VALUES (idIM,urlImg,idUsuario);
      SET mensaje='Foto guardada';
      COMMIT;
    END IF;

    IF conteo=1 THEN
      UPDATE fotosusuario SET urlFoto=urlImg 
      WHERE idPersona=idUsuario;
      SET mensaje='Foto editada';
      COMMIT;
    END IF;
  
  END IF;

  IF accion="eliminar" THEN
    SELECT COUNT(*) INTO conteo FROM persona WHERE idPersona=idUsuario;
    IF conteo=0 THEN
      SET mensaje='No existe el usuario';
      LEAVE SP;
    END IF;
    IF conteo=1 THEN
      UPDATE persona SET estado='I' WHERE idPersona=idUsuario;
      SET mensaje='Eliminado exitosamente';
      COMMIT;
    END IF;
  END IF;
  
END$$
