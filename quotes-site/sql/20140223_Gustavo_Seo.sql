-- SEO Categories
ALTER TABLE `dd_category`
ADD COLUMN `MetaDescription` varchar(1000) NOT NULL,
ADD COLUMN `MetaKeyword` varchar(160) NOT NULL;

ALTER TABLE `dd_category`
CHANGE COLUMN `MetaDescription` `MetaDescription` varchar(1000) NOT NULL;

UPDATE `dd_category` SET `MetaDescription` = '', `MetaKeyword` = 'air conditioning heating, air conditioning and heat, air conditioning services, heat air conditioning service, heat air conditioning maintanance' WHERE Id = 2;
UPDATE `dd_category` SET `MetaDescription` = '', `MetaKeyword` = 'architect, house design, architects auckland, interior design, infrastructure architect' WHERE Id = 3;
UPDATE `dd_category` SET `MetaDescription` = '', `MetaKeyword` = 'building services, building inspectors' WHERE Id = 4;
UPDATE `dd_category` SET `MetaDescription` = '', `MetaKeyword` = 'carpentry, carpenters, carpenter service, find a carpenter, carpentry companies' WHERE Id = 5;
UPDATE `dd_category` SET `MetaDescription` = '', `MetaKeyword` = 'ceiling repair, ceiling mouldings, ceiling tiles, ceiling services' WHERE Id = 6;
UPDATE `dd_category` SET `MetaDescription` = 'Are you looking for a trusted electrician but do not know who to trust? Tell us the specifics of the electrical job you need and we can provide you with free quotes from local trusted electricians.<br /><br />When you receive the quotes from the electricians - you also receive information from Done & Dusted regarding the electricians’ license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job. <br /><br />Get your electrical problem sorted! Tell us what you need done NOW! ', `MetaKeyword` = 'electricians, electrician services, local electricians, licensed electrician'
WHERE Id = 7;
UPDATE `dd_category` SET `MetaDescription` = '', `MetaKeyword` = 'fencing, fences, garage doors, security doors, gates and fences' WHERE Id = 8;
UPDATE `dd_category` SET `MetaDescription` = 'Do you have a broken a broken window or maybe you just want to replace your old windows? Don’t worry we have got you sorted. Just tell us the specifics of your window or glass you need and we can provide you with free quotes from local trusted Glass and Window experts.<br /><br />When you receive the quotes from the windows and glass experts - you also receive information from Done & Dusted regarding the windows and glass expert license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.', `MetaKeyword` = 'glass, glass repair, glass window repairs, glass and windows'
WHERE Id = 9;
UPDATE `dd_category` SET `MetaDescription` = 'Are you tired of doing all the repairs around your house by yourselves? Here is the solution to your problem. Just tell us what you need to repair in your home and we will provide you with free quotes from local trusted handyman.<br /><br />When you receive the quotes from the Handyman experts - you also receive information from Done & Dusted regarding the handyman license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 10;
UPDATE `dd_category` SET `MetaDescription` = 'Is your house really cold and your heating bills are going up and up? It is probably because you have bad insulation. Contact our friendly Done and Dusted team by giving us the specifics of how big you want your insulation to be. We will provide you with free quotes from local trusted Insulation experts<br /><br />When you receive the quotes from the Insulation experts - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 11;
UPDATE `dd_category` SET `MetaDescription` = 'Bored of how your place looks or maybe you are just looking for a change? Just tell the Done and Dusted team about what you want and your budget and we will provide you with free quotes from local trusted Interior Designers.<br /><br />When you receive the quotes from the Interior Designer - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 12;
UPDATE `dd_category` SET `MetaDescription` = 'Need to change your locks or you just need some new spare keys? Just tell the Done and Dusted team about what you want and your budget and we will provide you with free quotes from local trusted Locksmith.<br /><br />When you receive the quotes from the Locksmith - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 13;
UPDATE `dd_category` SET `MetaDescription` = 'It is time to throw out those old worn out outdoor tables and chairs. Just tell the Done and Dusted team about what you want and your budget and we will provide you with free quotes from local trusted Outdoor Structures.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 14;
UPDATE `dd_category` SET `MetaDescription` = 'Are your walls worn out or you just feel they need a change? Just tell the Done and Dusted team about what you want and your budget and we will provide you with free quotes from local trusted Painting and wallpaper experts.<br /><br />When you receive the quotes from the Painting and wallpaper experts - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 16;
UPDATE `dd_category` SET `MetaDescription` = 'You must be really annoyed with rats and other really annoying pests running around your home. It is time for some control. Just tell the Done and Dusted team about what you want and your budget and we will provide you with free quotes from local trusted Pest Control.<br /><br />When you receive the quotes from the Pest Control - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 17;
UPDATE `dd_category` SET `MetaDescription` = 'Are you building a new home or just need to replace the plastering? Just tell the Done and Dusted team about how big the plastering needs to be and your budget and we will provide you with free quotes from local trusted Plaster experts.<br /><br />When you receive the quotes from the plaster experts - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 18;
UPDATE `dd_category` SET `MetaDescription` = 'Are you looking for an experienced plumber? Finding trouble looking for who to trust? Done & Dusted provides you with free quotes from trusted plumbers in your local area. The more detailed your description is - the easier it is for plumbers to give you accurate quotes. We might give you a call if we require more information from you, prior to passing on to local plumbers.<br /><br />When you receive your plumbing quotes all in one place, you also receive information from Done & Dusted regarding the plumbers licences, their experience and their references and/or online reviews. When comparing quotes, make sure that it is a fixed quote; knowing what the plumber will be doing and what exactly you are paying for. Hiring a service provider has never been easier!<br /><br />Get your plumbing problem sorted! Tell us what you need done NOW!', `MetaKeyword` = ''
WHERE Id = 19;
UPDATE `dd_category` SET `MetaDescription` = 'Moving to a new place or you just want to clear the clutter around your place? Give us the specifics about it and we will provide you with free quotes from local trusted Removals.<br /><br />When you receive the quotes from the Removals experts - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 20;
UPDATE `dd_category` SET `MetaDescription` = 'Renovating your home but can’t find any people to help you out? Don’t worry we will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job'
WHERE Id = 21;
UPDATE `dd_category` SET `MetaDescription` = 'Need to replace your roofing and just a general maintenance for your roof? We will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 22;
UPDATE `dd_category` SET `MetaDescription` = 'It is time to take out the trash but you don’t know who to call to throw it out? The Done and Dusted team can solve this by finding your the best quotes for rubbish removal. Just tell us what you need to throw away.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 23;
UPDATE `dd_category` SET `MetaDescription` = 'Need some security for your party or just alarm systems around your home to be safe from those unexpected moments? We will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 24;
UPDATE `dd_category` SET `MetaDescription` = 'Are your tiles breaking apart but you can’t find the best quote to replace those? We will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 25;
UPDATE `dd_category` SET `MetaDescription` = 'Can’t find a welder that can give you what you need for the best price? We will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 26;

INSERT INTO `dd_category` VALUES (9, 'Glass & Windows', 'glass-and-windows', 1, 'Yes');
INSERT INTO `dd_category` VALUES (10, 'Handyman', 'handyman', 1, 'Yes');
INSERT INTO `dd_category` VALUES (11, 'Insulation', 'insulation', 1, 'Yes');
INSERT INTO `dd_category` VALUES (12, 'Interior Design', 'interior-design', 1, 'Yes');
INSERT INTO `dd_category` VALUES (13, 'Locksmith', 'locksmith', 1, 'Yes');
INSERT INTO `dd_category` VALUES (14, 'Outdoor Structures', 'outdoor-structures', 1, 'Yes');
INSERT INTO `dd_category` VALUES (15, 'Others', 'others', 1, 'Yes');
INSERT INTO `dd_category` VALUES (16, 'Painting & Wallpaper', 'painting-and-wallpaper', 1, 'Yes');
INSERT INTO `dd_category` VALUES (17, 'Pest Control', 'pest-control', 1, 'Yes');
INSERT INTO `dd_category` VALUES (18, 'Plastering', 'plastering', 1, 'Yes');
INSERT INTO `dd_category` VALUES (20, 'Removalist', 'removalist', 1, 'Yes');
INSERT INTO `dd_category` VALUES (21, 'Renovations', 'renovations', 1, 'Yes');
INSERT INTO `dd_category` VALUES (22, 'Roofing', 'roofing', 1, 'Yes');
INSERT INTO `dd_category` VALUES (23, 'Rubbish Removal', 'rubbish-removal', 1, 'Yes');
INSERT INTO `dd_category` VALUES (24, 'Security & Safety', 'security-and-safety', 1, 'Yes');
INSERT INTO `dd_category` VALUES (25, 'Tiler', 'tiler', 1, 'Yes');
INSERT INTO `dd_category` VALUES (26, 'Welding', 'welding', 1, 'Yes');


UPDATE `dd_category` SET `MetaDescription` = 'Having a hard time doing the number crunch with your taxes? We can help you out by finding the accountant you need whether it is for your business or personal. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes from the accountant - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 41;
UPDATE `dd_category` SET `MetaDescription` = 'Trying to get someone to help you out with your production control? We can help you out just give us the specifics on what you need and we will provide you with free quotes.  It is so easy that you would say why you didn’t think of this before.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 42;
UPDATE `dd_category` SET `MetaDescription` = 'Are you trying to send a package somewhere but you can’t find the cheapest quote to send your package? Don’t worry the Done and Dusted team can help you find the cheapest courier company that can send your package where you want. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes from the Courier companies - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 43;
UPDATE `dd_category` SET `MetaDescription` = 'Time to get your news published but don’t know how to do that? We can help you out just give us the specifics on what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 45;
UPDATE `dd_category` SET `MetaDescription` = 'Do you need legal advice or you just need a lawyer but can’t find a good lawyer that’s cheap? We can help you out just give us the specifics on what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 46;
UPDATE `dd_category` SET `MetaDescription` = 'Need supplies for your company but you don’t know where to get them from? We will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 47;
UPDATE `dd_category` SET `MetaDescription` = 'You need to print a lot of copies for your advertisements but you don’t know any company that is cheap. We will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 48;
UPDATE `dd_category` SET `MetaDescription` = 'Find a new home or selling your home? But you don’t know a good Real Estate Agent? DON’T PANIC! We got you covered. We will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 51;
UPDATE `dd_category` SET `MetaDescription` = 'New to the country and or just for a visit but you don’t know the language.  We can find you a translator. We will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 54;


INSERT INTO `dd_category` VALUES (40, 'Business & Consulting', 'business-and-consulting', null, 'Yes');
INSERT INTO `dd_category` VALUES (41, 'Accounting', 'accounting', 40, 'Yes');
INSERT INTO `dd_category` VALUES (42, 'Content Management & Production', 'content-management-production', 40, 'Yes');
INSERT INTO `dd_category` VALUES (43, 'Courier', 'courier', 40, 'Yes');
INSERT INTO `dd_category` VALUES (44, 'Others', 'others-bc', 40, 'Yes');
INSERT INTO `dd_category` VALUES (45, 'Press Support', 'press-support', 40, 'Yes');
INSERT INTO `dd_category` VALUES (46, 'Legal Services', 'legal-services', 40, 'Yes');
INSERT INTO `dd_category` VALUES (47, 'Office Support', 'office-support', 40, 'Yes');
INSERT INTO `dd_category` VALUES (48, 'Printing Services', 'printing-services', 40, 'Yes');
INSERT INTO `dd_category` VALUES (49, 'Professional Services', 'professional-services', 40, 'Yes');
INSERT INTO `dd_category` VALUES (50, 'Property Management', 'property-management', 40, 'Yes');
INSERT INTO `dd_category` VALUES (51, 'Real Estate Agent', 'real-estate-agent', 40, 'Yes');
INSERT INTO `dd_category` VALUES (52, 'Signwriter', 'signwriter', 40, 'Yes');
INSERT INTO `dd_category` VALUES (53, 'Specialised Consulting', 'specialised-consulting', 40, 'Yes');
INSERT INTO `dd_category` VALUES (54, 'Translation', 'translation', 40, 'Yes');


UPDATE `dd_category` SET `MetaDescription` = 'You have an event coming up but don’t know who to cater from? Don’t worry; the done and dusted team got you sorted. We can find you a Catering company. We will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 71;
UPDATE `dd_category` SET `MetaDescription` = 'What is a party without any music to liven up the mood? We will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 72;
UPDATE `dd_category` SET `MetaDescription` = 'Whether it’s a bouncing castle for your 5 year old or magicians for your party, we will take care of the hard work in finding them. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 73;
UPDATE `dd_category` SET `MetaDescription` = 'Need help in organising your party or you don’t know how to throw a party and you need help. Don’t panic done and dusted is here to help for that. Tell us the specifics of the party you want and we can provide you with free quotes from local trusted event planners.<br /><br />When you receive the quotes from the event planners - you also receive information from Done & Dusted regarding the electricians’ license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 75;
UPDATE `dd_category` SET `MetaDescription` = 'Capture every moment of your event by having a photographer or a videographer. Just give us your budget and we will take care of the hard work in finding them by providing you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 76;
UPDATE `dd_category` SET `MetaDescription` = 'You have to have a venue to throw any type of event. But you don’t know any places that are cheap? That’s okay; the done and dusted team has got you sorted. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 78;
UPDATE `dd_category` SET `MetaDescription` = 'The time has come in your life where you and your loved one are getting married. But you don’t know how to do it and you need help doing the wedding through till the reception. Here at done and dusted we are experts at this. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 79;

INSERT INTO `dd_category` VALUES (70, 'Events', 'events', null, 'Yes');
INSERT INTO `dd_category` VALUES (71, 'Catering', 'catering', 70, 'Yes');
INSERT INTO `dd_category` VALUES (72, 'Music, Bands, DJ', 'music-bands-dj', 70, 'Yes');
INSERT INTO `dd_category` VALUES (73, 'Party Entertainment', 'party-entertainment', 70, 'Yes');
INSERT INTO `dd_category` VALUES (74, 'Others', 'others-events', 70, 'Yes');
INSERT INTO `dd_category` VALUES (75, 'Party & Event Planning', 'party-and-event-planning', 70, 'Yes');
INSERT INTO `dd_category` VALUES (76, 'Photography and Videography', 'photography-and-videography', 70, 'Yes');
INSERT INTO `dd_category` VALUES (77, 'Security', 'security', 70, 'Yes');
INSERT INTO `dd_category` VALUES (78, 'Venues', 'venues', 70, 'Yes');
INSERT INTO `dd_category` VALUES (79, 'Wedding Services', 'wedding-services', 70, 'Yes');

UPDATE `dd_category` SET `MetaDescription` = 'You worked so hard that you pulled your muscles but can’t find a cheap chiropractor to help you out. Don’t worry Done & Dusted can help you out. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 92;
UPDATE `dd_category` SET `MetaDescription` = 'Can’t find a tailor that can help you fit into you cloths? Don’t worry Done & Dusted can help you out. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 93;
UPDATE `dd_category` SET `MetaDescription` = 'The special occasion is here but you can’t find a cheap hairdresser to do your hair. IT’S OKAY. DON’T PANIC! Just tell us what it is for and how you want your hair to be done and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 95;
UPDATE `dd_category` SET `MetaDescription` = 'Make your nails stand out from others. Just tell the Done & Dusted team about the specifications and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 96;
UPDATE `dd_category` SET `MetaDescription` = 'The special occasion is here but you can’t find a cheap makeup artist to do what you want. IT’S OKAY. DON’T PANIC! Just tell us what it is for and how you want your hair to be done and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 97;
UPDATE `dd_category` SET `MetaDescription` = 'Relax your body by getting a massage. But you don’t know any places that are cheap? That’s okay; the done and dusted team has got you sorted. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 98;
UPDATE `dd_category` SET `MetaDescription` = 'It is time to lose that winter fat and get into shape for the summer.  Just tell us what you need and we will provide you with free quotes of the best cheap trainers that can help you out.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 99;
UPDATE `dd_category` SET `MetaDescription` = 'Don’t know any physiotherapist that is cheap to help you out with your problem? Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 100;
UPDATE `dd_category` SET `MetaDescription` = 'Show your body to the world during summer by waxing it. Make it look clean and feel good about yourself. But you don’t know any place that does it cheap. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 101;
UPDATE `dd_category` SET `MetaDescription` = 'Can’t find a nutritionist that is cheap? Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 102;

INSERT INTO `dd_category` VALUES (90, 'Health & Beauty', 'health-and-beauty', null, 'Yes');
INSERT INTO `dd_category` VALUES (91, 'Alternative Services', 'alternative-services', 90, 'Yes');
INSERT INTO `dd_category` VALUES (92, 'Chiropractor/ Osteopath', 'chiropractor-osteopath', 90, 'Yes');
INSERT INTO `dd_category` VALUES (93, 'Clothes Alteration', 'clothes-alteration', 90, 'Yes');
INSERT INTO `dd_category` VALUES (94, 'Esoteric', 'esoteric', 90, 'Yes');
INSERT INTO `dd_category` VALUES (95, 'Hairdresser', 'hairdresser', 90, 'Yes');
INSERT INTO `dd_category` VALUES (96, 'Manicure & Pedicure', 'manicure-and-pedicure', 90, 'Yes');
INSERT INTO `dd_category` VALUES (97, 'Makeup Artist ', 'makeup-artist', 90, 'Yes');
INSERT INTO `dd_category` VALUES (98, 'Massage ', 'massage', 90, 'Yes');
INSERT INTO `dd_category` VALUES (99, 'Personal Trainer', 'personal-trainer', 90, 'Yes');
INSERT INTO `dd_category` VALUES (100, 'Physiotherapy', 'physiotherapy', 90, 'Yes');
INSERT INTO `dd_category` VALUES (101, 'Waxing', 'waxing', 90, 'Yes');
INSERT INTO `dd_category` VALUES (102, 'Nutritionist', 'nutritionist', 90, 'Yes');

UPDATE `dd_category` SET `MetaDescription` = 'Your computer has a problem and a virus issue? Just tell us what you need and we will provide you with free quotes of the best cheap computer repair experts that can help you out.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 122;
UPDATE `dd_category` SET `MetaDescription` = 'You need to design your computer logo or adverts to put up. But you don’t now where to find a graphic designer. Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 123;
UPDATE `dd_category` SET `MetaDescription` = 'Need to make your company mobile app but cant find an app developer that is cheap to help you out? Just tell us what you need and we will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 124;
UPDATE `dd_category` SET `MetaDescription` = 'Having problems with your phone or it just doesn’t work at all? Tell the Done & Dusted the problem and we will provide you free quotes of phone repair experts in your area.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 126;
UPDATE `dd_category` SET `MetaDescription` = 'Expand your company business by putting it on the web. Tell the Done & Dusted the problem and we will provide you free quotes of Web Developers in your area.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 127;

INSERT INTO `dd_category` VALUES (120, 'Computer and Technology', 'computer-and-technology', null, 'Yes');
INSERT INTO `dd_category` VALUES (121 'Audio & Video Production', 'audio-and-video-production', 120, 'Yes');
INSERT INTO `dd_category` VALUES (122, 'Computer Repair', 'computer-repair', 120, 'Yes');
INSERT INTO `dd_category` VALUES (123, 'Graphic Design ', 'graphic-design', 120, 'Yes');
INSERT INTO `dd_category` VALUES (124, 'Mobile Apps ', 'mobile-apps', 120, 'Yes');
INSERT INTO `dd_category` VALUES (125, 'Online Marketing ', 'online-marketing', 120, 'Yes');
INSERT INTO `dd_category` VALUES (126, 'Phone Systems', 'phone-systems', 120, 'Yes');
INSERT INTO `dd_category` VALUES (127, 'Web Services', 'web-services', 120, 'Yes');

UPDATE `dd_category` SET `MetaDescription` = 'Need help cleaning your place but you don’t have any time because you’re always super busy? Tell the Done & Dusted the problem and we will provide you free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 141;
UPDATE `dd_category` SET `MetaDescription` = 'Training your dog is the hardest thing to do especially if they don’t want to listen to you. The Done & Dusted team can help you find a dog trainer that can help you and your dog. We will provide you with free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 142;
UPDATE `dd_category` SET `MetaDescription` = 'Your dog needs to walk everyday but you just don’t have enough time because you’re always super busy? Tell the Done & Dusted the problem and we will provide you free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 143;
UPDATE `dd_category` SET `MetaDescription` = 'Need an extra hand in your gardening? Tell the Done & Dusted your specifications and we will provide you free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 144;
UPDATE `dd_category` SET `MetaDescription` = 'You are going for a holiday but you don’t know any place to keep your pet while you are gone. Tell the Done & Dusted your specifications and we will provide you free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 147;
UPDATE `dd_category` SET `MetaDescription` = 'Your pet needs grooming just like us but you just don’t have enough time or just don’t know how to do it. That’s okay call in the experts. Tell the Done & Dusted your specifications and we will provide you free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 148;
UPDATE `dd_category` SET `MetaDescription` = 'Need a pool or a spa in your home but don\'t know any place to find a cheap company that will provide you with a cheap yet a really good pool or spa. Tell the Done & Dusted your specifications and we will provide you free quotes.<br /><br />When you receive the quotes - you also receive information from Done & Dusted regarding their license, their experience, references and/or online reviews. With all this information in one place, it becomes easy to make a quick decision on who to hire for your job.'
WHERE Id = 150;

INSERT INTO `dd_category` VALUES (140, 'Home/Family & Pets', 'home-family-and-pets', null, 'Yes');
INSERT INTO `dd_category` VALUES (141, 'Cleaning', 'cleaning', 140, 'Yes');
INSERT INTO `dd_category` VALUES (142, 'Dog Training', 'dog-training', 140, 'Yes');
INSERT INTO `dd_category` VALUES (143, 'Dog Walker', 'dog-walker', 140, 'Yes');
INSERT INTO `dd_category` VALUES (144, 'Gardening', 'gardening', 140, 'Yes');
INSERT INTO `dd_category` VALUES (145, 'Home Appliances', 'home-appliances', 140, 'Yes');
INSERT INTO `dd_category` VALUES (146, 'Landscaping', 'landscaping', 140, 'Yes');
INSERT INTO `dd_category` VALUES (147, 'Pet Boarding', 'pet-boarding', 140, 'Yes');
INSERT INTO `dd_category` VALUES (148, 'Pet Grooming', 'pet-grooming', 140, 'Yes');
INSERT INTO `dd_category` VALUES (149, 'Pet Sitting', 'pet-sitting', 140, 'Yes');
INSERT INTO `dd_category` VALUES (150, 'Pool & Spa', 'pool-and-spa', 140, 'Yes');
