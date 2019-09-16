use zacharyvannoppen;

CREATE DATABASE IF NOT EXISTS zacharyvannoppen;

/*******EMPLOYEE TABLE********/
DROP TABLE IF EXISTS employee;
CREATE TABLE employee(
	employeeId			  INTEGER (10) 			AUTO_INCREMENT 		PRIMARY KEY,
	nom			  			  VARCHAR (50)			not null,
	specialty		  		  VARCHAR(50)			not null,
    phoneNumber		  INTEGER(12)			not null,
    address				  VARCHAR(100)		not null,
    email					  VARCHAR(100)		
);

ALTER TABLE employee AUTO_INCREMENT = 100;

INSERT INTO employee (nom, specialty, phoneNumber, address, email) 
			VALUES  ('Devante Adams','Resident Doctor', 6137980945,'1129 Meadowlands Dr, Nepean ON','devanteadams@gmail.com'),
							('John Smith','Nursing', 6132375678,'275 Somerset Dr, Ottawa ON','smithjohn@live.ca'),
							('Hazel Levesque','Nursing', 6132384568,'1275 Connaught Rd, Ottawa ON','hazel_levy@gmail.com'),
							('Sarah Smith','Nursing', 6131235678,'47 Hazeldean Rd, Kanata ON','ssmith@hotmail.com'),
							('Mike Woods','ER Doctor', 6132341267,'1969 Bank St, Ottawa ON','woodsmike@sympatico.ca'),
							('Amanda Keen','Surgeon', 6138764566,'1356 Broadview Ave, Ottawa ON','amandak12@hotmail.com'),
							('Julia Wilson','Resident Doctor ', 6139986755,'1265 Roberstson Rd, Ottawa ON','wilson.julia@hotmail.com'),
							('Tom Hills','Resident Doctor ', 6136549976,'345 Carling Ave, Ottawa ON','tomhills22@gmail.com'),
                            ('Tanya Robert ','ER Doctor', 6134158914,'3214 Sandyhill Crest, Ottawa ON','robtan23@hotmail.com'),
							('Max Jones','ER Doctor', 613-443-8974,'22 Klondike Rd, Kanata ON ','maxjones48@live.ca'),
							('Olivia Brown','Surgeon', 6139873321,'643 Centerpoint Dr, Nepean ON ','brown.oliva@gmail.com'),
							('Noah Davis ','Surgeon', 6133329844,'2343 Longfields Dr, Ottawa ON','noah_davis@sympatico.ca'),
							('Emily Moore','Specialist', 6139933345,'4 Donnelly Dr, Ottawa ON','emmoore@hotmail.com'),
							('Jacob Anderson','Specialist', 6132246644,'501 Radiant Pvt, Ottawa ON','anderson.jacob@live.ca'),
							('George White','Specialist', 6138859833,'165 Wesley Ave, Ottawa ON ','george.white@gmail.com');
                                                        
			
/*******NURSE INFORMATION TABLE********/
DROP TABLE IF EXISTS nurse_info;
CREATE TABLE nurse_info(
	employeeId			  INTEGER (10) 			PRIMARY KEY,
	shiftInfo				  VARCHAR(40)			not null
);

INSERT INTO nurse_info (employeeId, shiftInfo) 
			VALUES  (101,'Monday 5:00 a.m. - 5:00 p.m.'),
							(102,'Friday 5:00 a.m. - 5:00 p.m.'),
							(103,'Tuesday 5:00 a.m. - 5:00 p.m.');


/*******NURSE CNO TABLE********/
DROP TABLE IF EXISTS nurse_cno;
CREATE TABLE nurse_cno(
	employeeId			  INTEGER (10) 			PRIMARY KEY,
	cno				  		  INTEGER(8)			 	not null
);

INSERT INTO nurse_cno (employeeId, cno) 
			VALUES  (101,12345677),
							(102,12341287),
							(103,12347876);

/*******PATIENT TABLE********/
DROP TABLE IF EXISTS patient;
CREATE TABLE patient(
	patientId			  		INTEGER (10) 			AUTO_INCREMENT 		PRIMARY KEY,
	nom			  			  	VARCHAR (50)			not null,
	sex		  		  			VARCHAR(6)				not null,
    dob	  						DATE							not null,
    phoneNumber			INTEGER(12)				not null,
    address					VARCHAR(100)			not null,
    email						VARCHAR(100),
    carrierNumber 		INTEGER(10)				not null,
    healthCardNumber VARCHAR(15)				not null
);

INSERT INTO patient (nom, sex, dob, phoneNumber,address, email, carrierNumber, healthCardNumber) 
			VALUES  ('Zoe Murphy','Female', '2002-01-12',6138769872, '34 Greenwhich Dr, Ottawa ON','zmurph@live.ca', 03456345, '1234-567-890-HE'),
							('Alex Samson','Male', '1997-08-20',6131929865, '28 Stranherd Dr, Ottawa ON','alex@gmail.com', 76584900, '3546-123-231-SE'),
							('Ava Gordy','Female', '1987-11-26',6137654987, '12 Fallowfield Dr, Ottawa ON','ava@gmail.com', 03456345, '7546-564-457-HL');

ALTER TABLE employee AUTO_INCREMENT = 1000;

/*******PATIENT INSURANCE COMPANY********/
DROP TABLE IF EXISTS patientInsuranceCompany;
CREATE TABLE patientInsuranceCompany(
    carrierNumber 		INTEGER(10)				PRIMARY KEY,
    insuranceCompany VARCHAR(25)			not null
);

INSERT INTO patientInsuranceCompany (carrierNumber, insuranceCompany) 
			VALUES  (03456345,'Manulife'),
							(76584900,'Desjardins'),
							(23456355,'Sunlife');



/*******PATIENT INSURANCE INFORMATION*******/
DROP TABLE IF EXISTS patientInsuranceInfo;
CREATE TABLE patientInsuranceInfo(
    carrierNumber 		INTEGER(10)				not null,				
    clientId						VARCHAR(7) 				not null
);

INSERT INTO patientInsuranceInfo (carrierNumber, clientId) 
			VALUES  (03456345,1),
							(76584900,2),
							(23456355,3);


/*******PATIENT HEALTH CARD******/
DROP TABLE IF EXISTS patientHealthCard;
CREATE TABLE patientHealthCard(
    healthCardNumber  VARCHAR(15)			PRIMARY KEY,		
    healthCardExpiry	 DATE 							not null
);

INSERT INTO patientHealthCard (healthCardNumber, healthCardExpiry) 
			VALUES 	('1234-567-890-HE','2019-01-12'),
							('3546-123-231-SE','2021-09-23'),
							(' 7546-564-457-HL','2030-02-11');

/*******DOCTOR TABLE*******/
DROP TABLE IF EXISTS doctor;
CREATE TABLE doctor(
			employeeId							INTEGER(10) 		PRIMARY KEY,
            cpso			 						INTEGER(5)			not null
);

INSERT INTO doctor(employeeId,cpso)
			VALUES	(100,12345),
							(104, 34567),
                            (105, 12678),
                            (106,10305),
                            (107, 16789),
                            (108, 15432),
                            (109, 45742),
                            (110, 87453),
                            (111, 45671),
							(112, 64354),
							(113, 76432),
							(114, 54389);

/*******RESIDENT TABLE*******/
DROP TABLE IF EXISTS resident;
CREATE TABLE resident(
			cpso									INTEGER(5)			PRIMARY KEY,
			university 							VARCHAR(100)		not null
);

INSERT INTO resident(cpso, university)
			VALUES	(34567, 'Ryerson'),
							(10305, 'Duke'),
							(16789, 'Cambridge');

/*******ER_DOCTOR TABLE*******/
DROP TABLE IF EXISTS er_doctor;
CREATE TABLE er_doctor(
			cpso									INTEGER(5)			PRIMARY KEY,
            emergencyRoomNumber	INTEGER(5)			not null
);

INSERT INTO er_doctor(cpso, emergencyRoomNumber)
			VALUES	(34567, 102),
							(15432, 104),
							(45742, 103);

/*******SPECIALIST TABLE*******/
DROP TABLE IF EXISTS specialist;
CREATE TABLE specialist(
			cpso 									INTEGER(5) 			PRIMARY KEY,
            designation	 						VARCHAR(100)		not null
);

INSERT INTO specialist(cpso, designation)
			VALUES	(64354, 'Endocrinologist '),
							(76432, 'ICU Physician'),
							(54389, 'Radiologist');

/*******SURGEON TABLE*******/
DROP TABLE IF EXISTS surgeon;
CREATE TABLE surgeon(
			cpso									INTEGER(5) 			PRIMARY KEY,
            typ 										VARCHAR(100)		not null
);

INSERT INTO surgeon(cpso, typ)
			VALUES	(16789, 'Orthopedic'),
							(87453, 'Neurologist'),
							(45671, 'Cardiologist');

/*******RECORD TABLE*******/
DROP TABLE IF EXISTS record;
CREATE TABLE record(
			recordId								INTEGER(10)			AUTO_INCREMENT 			PRIMARY KEY,
            employeeId							INTEGER(10)			not null,
            patientId								INTEGER(10)			not null
);

INSERT INTO record(employeeId, patientId)
			VALUES	(102, 1000),
							(102, 1001),
							(103, 1002);


/*******MEDICAL TABLE*******/
DROP TABLE IF EXISTS medical;
CREATE TABLE medical(
			recordId								INTEGER(10)			PRIMARY KEY,
			immunization						VARCHAR(100)		not null
);

INSERT INTO medical(recordId, immunization)
			VALUES 	(1, 'Tetanus'),
							(2, 'Shinrix'),
							(3, 'Varivax');

/*******PROCEDURAL TABLE*******/
DROP TABLE IF EXISTS procedural;
CREATE TABLE procedural(
			recordId								INTEGER(10)			PRIMARY KEY,
            testResults	 						VARCHAR(100)		not null
);

INSERT INTO procedural(recordId, testResults)
			VALUES	(1, 'Positive'),
							(2, 'Negative'),
                            (3, 'Positive');

/*******PATIENT_PROFILE TABLE*******/
DROP TABLE IF EXISTS patient_profile;
CREATE TABLE patient_profile(
			recordId								INTEGER(10)			PRIMARY KEY,
            familyHistory						VARCHAR(100)		
);

INSERT INTO patient_profile(recordId, familyHistory)
			VALUES	(1, 'Cancer'),
							(2, 'Alzheimers'),
                            (3,'');

/*******DEPARTMENT_INFO TABLE*******/
DROP TABLE IF EXISTS department_info;
CREATE TABLE department_info(
			departmentId						INTEGER(10)			AUTO_INCREMENT 				PRIMARY KEY,
			nom										VARCHAR(50)		not null
);

ALTER TABLE employee AUTO_INCREMENT = 10000;

INSERT INTO department_info(nom)
			VALUES	('Endocrinology'),
							('General Surgery'),
                            ('Pediatric General Care'),
                            ('Intensive Care Unit'),
                            ('Medical Imaging');
                            
/*******DEPARTMENT_EMPLOYEE TABLE*******/
DROP TABLE IF EXISTS department_employee;
CREATE TABLE department_employee(
			departmentId						INTEGER(10)			not null,
			employeeId			  				INTEGER (10)		not null
);


INSERT INTO department_employee (departmentId, employeeId)
			VALUES	(10000,112),
							(10000,101),
                            (10001,110),
                            (10003,113),
                            (10004,114);

/*******DEPARTMENT_LEAD TABLE*******/
DROP TABLE IF EXISTS department_head;
CREATE TABLE department_head(
			departmentHead					VARCHAR(50)		PRIMARY KEY,
            employeeId							INTEGER(10)			not null
);

INSERT INTO department_head(departmentHead, employeeId)
			VALUES	('John Smith', 101),
							('Olivia Brown', 110),
                            ('Amanda Keen', 105),
							('Emily Moore', 112),
							('Jacob Anderson', 113);
                            

/*******PATIENT DRUGS TABLE******/
DROP TABLE IF EXISTS drugs;
CREATE TABLE drugs(
    dinNumber  			INTEGER(8)				PRIMARY KEY,		
    nom	 						VARCHAR(50)			not null,
    cost							FLOAT(6)					not null,
    lotNumber				INTEGER(8)				not null,
    sideEffects				VARCHAR(200)
);

INSERT INTO drugs (dinNumber, nom, cost, lotNumber,sideEffects) 
			VALUES 	(92345678,'Amoxiclav',20.34,15000000,''),
							(93455688,'Morphine',50.45,42860074, 'Nausea'),
							(99785423,'Advil',30.45,78100445, 'Drowsiness');



/*******DRUGS TREATMENT TABLE*******/
DROP TABLE IF EXISTS drugs_treatment;
CREATE TABLE drugs_treatment(
    treatmentId  			INTEGER(5)				AUTO_INCREMENT			PRIMARY KEY,		
     dinNumber  			INTEGER(8)				not null
);

INSERT INTO drugs_treatment (dinNumber) 
			VALUES 	(92345678),
							(93455688),
							(99785423);



/*******DRUGS BATCH TABLE*******/
DROP TABLE IF EXISTS drugs_batch;
CREATE TABLE drugs_batch(
    lotNumber				INTEGER(8)				PRIMARY KEY,		
	quantity  					INTEGER(5)				not null,
    expiryDate				DATE							not null
);

INSERT INTO drugs_batch (lotNumber, quantity, expiryDate) 
			VALUES 	(15000000, 10, '2021-10-12'),
							(23455678, 40, '2023-11-13'),
							(09785423, 34, '2021-04-21');



/*******PRESCRITPTION TABLE*******/
DROP TABLE IF EXISTS prescription;
CREATE TABLE prescription(
	dinNumber  			INTEGER(8)				PRIMARY KEY,		
	dosage  					VARCHAR(100)			not null,
    interactions				VARCHAR(200)
);

INSERT INTO prescription (dinNumber, dosage, interactions) 
			VALUES 	(92345678, '1 TAB BID F7D', 'Sulfa'),
							(93455688, '1 CAP 1D', 'Amoxicillin'),
							(99785423, '2 CAP TID F5D', 'Iron');



/*******OVER THE COUNTER TABLE*******/
DROP TABLE IF EXISTS over_the_counter;
CREATE TABLE over_the_counter (
	dinNumber  			INTEGER(8)				PRIMARY KEY,		
	frequency  				VARCHAR(100)			not null
);

INSERT INTO over_the_counter (dinNumber, frequency) 
			VALUES 	(92225674, '1-2 TAB EVERY 4-6 HOURS'),
							(93455633, '1 TAB EVERY 4 HOURS'),
							(99785980, '1 TAB DAILY');


/*******TREATEMENT NAME TABLE*******/
DROP TABLE IF EXISTS treatment_name;
CREATE TABLE treatment_name(
	treatmentId 				INTEGER(10) 			AUTO_INCREMENT		 PRIMARY KEY,
	nom 						VARCHAR(200) 			not null
);

INSERT INTO treatment_name (nom) 
			VALUES	('Tracheotomy'),
							('Injection lipolysis'),
							('Fluid replacement'),
							('Laparoscopy');



/*******TREATEMENT TYPE TABLE*******/
DROP TABLE IF EXISTS treatment_type;
CREATE TABLE treatment_type(
	nom 				VARCHAR(50) 			PRIMARY KEY,
	typ 					VARCHAR(100) 			not null
);

INSERT INTO treatment_type (nom, typ) 
			VALUES	('Tracheotomy', 'Surgical'),
							('Injection lipolysis', 'Surgical'),
							('Fluid replacement', 'Minimally Invasive'),
							('Laparoscopy', 'Acupuncture');


/*******TREATEMENT DRUG TABLE*******/
DROP TABLE IF EXISTS treatment_drug;
CREATE TABLE treatment_drug(
	nom 				VARCHAR(50) 			PRIMARY KEY,
	dinNumber 		INTEGER(10) 			not null
);


INSERT INTO treatment_drug (nom, dinNumber) 
			VALUES	('Tracheotomy', 92345678),
							('Injection lipolysis', 93455688),
							('Fluid replacement', 99785423),
							('Laparoscopy', 93455688);
                            

/*******TREATEMENT EMPLOYEES TABLE*******/
DROP TABLE IF EXISTS treatment_employees;
CREATE TABLE treatment_employees(
	typ 					VARCHAR(100) 					not null,
	employeeId 	INTEGER(10) 					not null
);

INSERT INTO treatment_employees (typ, employeeId) 
			VALUES	('Surgical', 110),
							('Surgical', 111),
							('Surgical', 105),
							('Minimally Invasive', 100),
							('Minimally Invasive', 101),
							('Minimally Invasive', 102),
							('Minimally Invasive', 103),
							('Minimally Invasive', 104),
							('Minimally Invasive', 113);
                            
                            

/*******DIAGNOSIS TABLE*******/
DROP TABLE IF EXISTS diagnosis;
CREATE TABLE diagnosis(
	diagnosisId 				INTEGER(10) 		AUTO_INCREMENT		 PRIMARY KEY,
	nom 						VARCHAR(50) 		not null,
	urgency 					VARCHAR(50)
);

INSERT INTO diagnosis (nom, urgency) 
			VALUES	('Cancer', 'High'),
							('Heart Failure', 'High'),
							('Flu','Low');



/*******DIAGNOSIS DEPARTMENT TABLE*******/
DROP TABLE IF EXISTS diagnosis_department;
CREATE TABLE diagnosis_department(
	nom 					VARCHAR(50)				not null,
	departmentId 		INTEGER(10) 				not null
);


INSERT INTO diagnosis_department (nom, departmentId) 
VALUES	('Cancer', 10000),
				('Heart Failure', 10001),
				('Flu',10002);

	
/*******DIAGNOSIS PATIENT TABLE*******/
DROP TABLE IF EXISTS diagnosis_patient;
CREATE TABLE diagnosis_patient(
	patientId 				INTEGER(10) 				not null,
	diagnosisId 			INTEGER(10) 				not null
);


INSERT INTO diagnosis_patient (patientId, diagnosisId) 
	VALUES	(1000,1),
					(1001,2),
					(1002,3);


/*******DIAGNOSIS DOCTOR TABLE*******/
DROP TABLE IF EXISTS diagnosis_doctor;
CREATE TABLE diagnosis_doctor(
	cspo 					INTEGER(10)				 	not null,
	diagnosisId 			INTEGER(10) 					not null
);

INSERT INTO diagnosis_doctor(cspo, diagnosisId) 
			VALUES	(12345,1),
							(34567,2),
							(12765,3);
                            
						

/*******VISITOR INFO TABLE*******/
DROP TABLE IF EXISTS visitor_info;
CREATE TABLE visitor_info(
	visitorId 					INTEGER(10) 			AUTO_INCREMENT 				PRIMARY KEY,
	nom 						VARCHAR(50) 			not null,
	phoneNumber 		INTEGER(12) 			not null,
	address 					VARCHAR(200) 			not null,
	email 						VARCHAR(100) 			not null
);

ALTER TABLE employee AUTO_INCREMENT = 100;

INSERT INTO visitor_info (nom, phoneNumber, address, email) 
			VALUES	('Jackson Todd', 6132349876, '2345 Woodroffe Ave, Ottawa ON', 'jacktodd@gmail.com'),
							('Maryam Ali', 6134567886, '42 State Dr, Ottawa ON', 'alimar2@hotmail.com'),
							('Jessie Miller', 6137659845, '3245 Crystal Rd, Ottawa ON', 'jessmiller@gmail.com'); 


/*******PATIENT VISITOR TABLE*******/
DROP TABLE IF EXISTS patient_visitor;
CREATE TABLE patient_visitor(
	patientId 					INTEGER(10) 				PRIMARY KEY,
	visitorId 					INTEGER(10) 				not null
);

INSERT INTO patient_visitor (patientId, visitorId) 
			VALUES	(1000,100),
							(1001,101),
							(1002,103);
                            
SELECT * FROM employee;