
ALTER TABLE dd_customer_enquiry_note ADD COLUMN `Added` DATETIME NOT NULL;

ALTER TABLE dd_customer_enquiry_note MODIFY `Note` varchar(1256) DEFAULT NULL;
