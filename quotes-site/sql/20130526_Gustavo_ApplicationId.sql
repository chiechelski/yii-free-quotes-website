ALTER TABLE st4_user 
DROP COLUMN FacebookId,
ADD COLUMN `ApplicationType` set('st4me','facebook','google') DEFAULT 'st4me',
ADD COLUMN `ApplicationId` varchar(50) DEFAULT NULL;