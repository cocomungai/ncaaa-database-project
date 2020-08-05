USE NCAA;

DROP TRIGGER IF EXISTS megatable_before_insert;

DELIMITER //

CREATE TRIGGER megatable_before_insert
BEFORE INSERT
ON megatable
FOR EACH ROW
BEGIN
	IF (NEW.minutes = '') THEN
		SET NEW.minutes = '00:00';
	END IF;
    IF (NEW.tournament = '') THEN
		SET NEW.tournament = NULL;
	END IF;
END //