-- SQL script to create reports database for PostgreSQL
-- 
-- To run, type: psql template1 < reports-pgsql.sql
--
-- $Id: reports-pgsql.sql,v 1.1 2003/03/10 02:29:17 chriskl Exp $

CREATE DATABASE phppgadmin;

\c phppgadmin

CREATE TABLE ppa_reports (
	report_id SERIAL,
	report_name varchar(255) NOT NULL,
	db_name varchar(255) NOT NULL,
	date_created date DEFAULT 'now' NOT NULL,
	created_by varchar(255) NOT NULL,
	descr text,
	report_sql text NOT NULL,
	PRIMARY KEY (report_id)
);

-- Allow everyone to do everything with reports.  This may
-- or may not be what you want.
GRANT SELECT,INSERT,UPDATE,DELETE ON ppa_reports TO PUBLIC;

