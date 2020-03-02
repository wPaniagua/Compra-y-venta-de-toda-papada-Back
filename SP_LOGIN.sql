CREATE OR REPLACE PROCEDURE SP_LOGIN(
                  IN pcorreo VARCHAR(50),
                  IN pcontrasenia VARCHAR(50),
                  OUT pid INT,
                  OUT mensaje VARCHAR(100),
                  OUT existe INT) 
SP:BEGIN
  DECLARE conteo INT;
  DECLARE contra INT;
  DECLARE id INT;
  DECLARE tempMensaje VARCHAR(100);
  SET id=0;  
  SET tempMensaje='';
  START TRANSACTION;  
  IF pcorreo=''  THEN
    SET tempMensaje='Correo ,';
  END IF;
  IF pcontrasenia='' THEN
    SET tempMensaje='Contrasenia ,';
  END IF;
  IF tempMensaje<>'' THEN
    SET mensaje=CONCAT('Campos requeridos ',tempMensaje);
    LEAVE SP;
  END IF;
  
  SELECT count(*) INTO conteo FROM persona
  WHERE correo=pcorreo;

  IF conteo=0 THEN
    SET mensaje='No existe usuario registrado con ese correo';
    SET existe=0;
    LEAVE SP;
  END IF; 

  SELECT COUNT(*) INTO conteo FROM `persona`
  WHERE correo=pcorreo and contrasenia=pcontrasenia;

  IF conteo=0 THEN
    SET mensaje='Contrasenia invalida';
    SET existe=0;
    LEAVE SP;
  END IF;  
  IF conteo=1 THEN
    SELECT idPersona INTO id FROM `persona` WHERE correo=pcorreo;
    SET mensaje='Usuario registrado';
    SET existe=1;
    SET pid=id;
    COMMIT;
  END IF;
END$$