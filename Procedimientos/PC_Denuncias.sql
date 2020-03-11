
/*procedimiento denuncias
*/

CREATE OR REPLACE PROCEDURE SP_DENUNCIAS(
                  IN accion VARCHAR(45),
                  IN id INT,
                  IN valor VARCHAR(100),
                  IN estado VARCHAR(2),
                  OUT mensaje VARCHAR(100)) 
SP:BEGIN
  DECLARE conteo INT;
  DECLARE tempMensaje VARCHAR(100);
  SET autocommit=0;  
  SET tempMensaje='';
  START TRANSACTION;
  IF accion='' THEN
    SET tempMensaje='Accion ';
  END IF;  
  IF tempMensaje<>'' THEN
    SET mensaje=CONCAT('Campo requerido ',tempMensaje);
    LEAVE SP;
  END IF;
  

  IF accion="eliminar" THEN
      IF id='' OR id=0  THEN
        SET tempMensaje='Id denuncia ,';
      END IF; 
      IF tempMensaje<>'' THEN
        SET mensaje=CONCAT('Campo requerido ',tempMensaje);
        LEAVE SP;
      END IF;
  END IF;  

  IF accion="obtenerTodos" THEN
      SELECT d.idDenuncias, d.fecha,d.razones, a.titulo, d.estado,p.primerNombre,p.segundoApellido FROM denuncias d
	  INNER JOIN anuncios a on a.idAnuncios=d.idAnuncios
	  INNER JOIN persona p on p.idPersona=a.idPersona WHERE d.estado="A";
      SET mensaje='Exitoso';
      COMMIT;
  END IF;

  IF accion="eliminar" THEN
    SELECT COUNT(*) INTO conteo FROM denuncias WHERE idDenuncias=id;
    IF conteo=0 THEN
      SET mensaje='No existe la denuncia';
      LEAVE SP;
    END IF;
    IF conteo=1 THEN
      UPDATE   denuncias SET estado="I" WHERE idDenuncias=id;
      SET mensaje='Eliminado exitosamente';
      COMMIT;
    END IF;
  END IF;
END$$
