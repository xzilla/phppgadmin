-- SQL script to create reports database for PostgreSQL
-- 
-- To run, type: psql template1 < reports-pgsql.sql
--
-- $Id: reports-pgsql.sql,v 1.3 2003/10/23 08:32:20 chriskl Exp $

CREATE DATABASE phppgadmin;

\connect phppgadmin

CREATE TABLE ppa_reports (
	report_id SERIAL,
	report_name varchar(255) NOT NULL,
	db_name varchar(255) NOT NULL,
	date_created date DEFAULT NOW() NOT NULL,
	created_by varchar(255) NOT NULL,
	descr text,
	report_sql text NOT NULL,
	PRIMARY KEY (report_id)
);

-- Allow everyone to do everything with reports.  This may
-- or may not be what you want.
GRANT SELECT,INSERT,UPDATE,DELETE ON ppa_reports TO PUBLIC;
GRANT SELECT,UPDATE ON ppa_reports_report_id_seq TO PUBLIC;

