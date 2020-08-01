USE NCAA;

DROP TRIGGER IF EXISTS nullMinutes;

DELIMITER //

CREATE TRIGGER nullMinutes
BEFORE INSERT
ON megatable
FOR EACH ROW
BEGIN
	IF (NEW.minutes IS NULL) THEN
		SET NEW.minutes = '00:00';
	END IF;
	IF (NEW.minutes_int64 IS NULL) THEN
		SET NEW.minutes_int64 = 0;
	END IF;
END //

