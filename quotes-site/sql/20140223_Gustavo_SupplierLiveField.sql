-- Initial field - it may be passed to another table later to record payment
ALTER TABLE `dd_user`
ADD COLUMN  `ShowOnDirectory` enum('Yes','No') DEFAULT 'No';
