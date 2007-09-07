\i data/config.sql
\connect postgres

CREATE ROLE :guestuser;
ALTER ROLE :guestuser WITH NOSUPERUSER INHERIT NOCREATEROLE NOCREATEDB LOGIN ENCRYPTED PASSWORD 'guest' VALID UNTIL 'infinity';
CREATE ROLE :poweruser;
ALTER ROLE :poweruser WITH NOSUPERUSER INHERIT NOCREATEROLE CREATEDB LOGIN ENCRYPTED PASSWORD 'power' VALID UNTIL 'infinity';
CREATE ROLE :superuser;
ALTER ROLE :superuser WITH SUPERUSER INHERIT CREATEROLE CREATEDB LOGIN ENCRYPTED PASSWORD 'super' VALID UNTIL 'infinity';

CREATE DATABASE :dbname WITH TEMPLATE = template0 OWNER = :poweruser ENCODING = 'UTF8';

\connect :dbname

COMMENT ON DATABASE :dbname IS 'Tests database for PhpPgAdmin';


COMMENT ON SCHEMA public IS 'Standard public schema';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

CREATE SEQUENCE student_id_seq;

CREATE TABLE student (
    id integer NOT NULL DEFAULT nextval('student_id_seq'),
    name character varying,
    birthday date,
    resume text
);


ALTER TABLE public.student OWNER TO :poweruser;

COPY student (id, name, birthday, resume) FROM stdin;
2	testname	2007-08-04	test resume.
\.

SELECT setval('student_id_seq', 2);

ALTER TABLE ONLY student
    ADD CONSTRAINT student_pkey PRIMARY KEY (id);


REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM :poweruser;
GRANT ALL ON SCHEMA public TO :poweruser;
GRANT ALL ON SCHEMA public TO PUBLIC;

