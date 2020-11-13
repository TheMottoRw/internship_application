--Changes -> table admin
ALTER TABLE admin add column regdate datetime DEFAULT current_timestamp;
--table company
ALTER TABLE company CHANGE Company_id company_id int(11) not null primary key auto_increment;
ALTER TABLE company ADD COLUMN gps_location varchar(255) default "0:0";
ALTER TABLE  company CHANGE reg_date regdate datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE company change password password varchar(255) not null;
ALTER TABLE company change website website varchar(255) not null;

--table company internship
ALTER TABLE  company_internship CHANGE reg_date regdate datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE  company_internship change description description text(500) not null;
ALTER TABLE  company_internship change eligibility eligibility text(500) not null;
ALTER TABLE company_internship change status status enum('pending','published','closed','deleted') DEFAULT 'pending';

--table applicant
ALTER TABLE applicant CHANGE reg_date regdate datetime default CURRENT_TIMESTAMP;
ALTER TABLE applicant CHANGE Email email varchar(50);
ALTER TABLE applicant CHANGE  password password varchar(255);
--table application
ALTER TABLE application CHANGE date regdate datetime DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE application CHANGE response response text(1500);
ALTER TABLE application CHANGE status status enum('pending','approved','rejected','deleted') DEFAULT 'pending';
