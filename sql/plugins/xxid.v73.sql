-- ----------
-- xxid.v73.sql.in
--
--	SQL script for loading the transaction ID compatible datatype 
--
--	Copyright (c) 2003-2004, PostgreSQL Global Development Group
--	Author: Jan Wieck, Afilias USA INC.
--
-- $Id: xxid.v73.sql,v 1.1.2.1 2005/06/12 14:36:26 chriskl Exp $
-- ----------

--
-- Type specific input and output functions
--
CREATE FUNCTION @NAMESPACE@."xxidin"(cstring) RETURNS @NAMESPACE@."xxid"
	AS '$libdir/xxid', '_Slony_I_xxidin'
	LANGUAGE C;
CREATE FUNCTION @NAMESPACE@."xxidout"(@NAMESPACE@."xxid") RETURNS cstring
	AS '$libdir/xxid', '_Slony_I_xxidout'
	LANGUAGE C;


--
-- The data type itself
--
CREATE TYPE @NAMESPACE@."xxid" (
	INPUT = @NAMESPACE@."xxidin",
	OUTPUT = @NAMESPACE@."xxidout",
	EXTERNALLENGTH = 12,
	INTERNALLENGTH = 4,
	PASSEDBYVALUE,
	ALIGNMENT = int4
);


--
-- Since our xxid type has special cases for values 0-3, it
-- in fact IS xid, so allow implicit type casting to and from.
--
CREATE CAST (xid AS @NAMESPACE@.xxid)
	WITHOUT FUNCTION AS IMPLICIT;
CREATE CAST (@NAMESPACE@.xxid AS xid)
	WITHOUT FUNCTION AS IMPLICIT;


--
-- Comparision functions for the new datatype
--
CREATE FUNCTION @NAMESPACE@."xxideq"(@NAMESPACE@."xxid", @NAMESPACE@."xxid") RETURNS boolean
	AS '$libdir/xxid', '_Slony_I_xxideq'
	LANGUAGE C;
CREATE FUNCTION @NAMESPACE@."xxidne"(@NAMESPACE@."xxid", @NAMESPACE@."xxid") RETURNS boolean
	AS '$libdir/xxid', '_Slony_I_xxidne'
	LANGUAGE C;
CREATE FUNCTION @NAMESPACE@."xxidlt"(@NAMESPACE@."xxid", @NAMESPACE@."xxid") RETURNS boolean
	AS '$libdir/xxid', '_Slony_I_xxidlt'
	LANGUAGE C;
CREATE FUNCTION @NAMESPACE@."xxidle"(@NAMESPACE@."xxid", @NAMESPACE@."xxid") RETURNS boolean
	AS '$libdir/xxid', '_Slony_I_xxidle'
	LANGUAGE C;
CREATE FUNCTION @NAMESPACE@."xxidgt"(@NAMESPACE@."xxid", @NAMESPACE@."xxid") RETURNS boolean
	AS '$libdir/xxid', '_Slony_I_xxidgt'
	LANGUAGE C;
CREATE FUNCTION @NAMESPACE@."xxidge"(@NAMESPACE@."xxid", @NAMESPACE@."xxid") RETURNS boolean
	AS '$libdir/xxid', '_Slony_I_xxidge'
	LANGUAGE C;
CREATE FUNCTION @NAMESPACE@."btxxidcmp"(@NAMESPACE@."xxid", @NAMESPACE@."xxid") RETURNS int4
	AS '$libdir/xxid', '_Slony_I_btxxidcmp'
	LANGUAGE C;
CREATE FUNCTION @NAMESPACE@.getCurrentXid() RETURNS @NAMESPACE@."xxid"
	AS '$libdir/xxid', '_Slony_I_getCurrentXid'
	LANGUAGE C;
CREATE FUNCTION @NAMESPACE@.getMinXid() RETURNS @NAMESPACE@."xxid"
	AS '$libdir/xxid', '_Slony_I_getMinXid'
	LANGUAGE C;
CREATE FUNCTION @NAMESPACE@.getMaxXid() RETURNS @NAMESPACE@."xxid"
	AS '$libdir/xxid', '_Slony_I_getMaxXid'
	LANGUAGE C;


--
-- Operators on these comparision functions
--
CREATE OPERATOR < (
	PROCEDURE = @NAMESPACE@."xxidlt",
	LEFTARG = @NAMESPACE@."xxid",
	RIGHTARG = @NAMESPACE@."xxid",
	COMMUTATOR = >, NEGATOR = >=,
	RESTRICT = scalarltsel, JOIN = scalarltjoinsel
);
CREATE OPERATOR = (
	PROCEDURE = @NAMESPACE@."xxideq",
	LEFTARG = @NAMESPACE@."xxid",
	RIGHTARG = @NAMESPACE@."xxid",
	COMMUTATOR = =, NEGATOR = <>,
	RESTRICT = eqsel, JOIN = eqjoinsel,
	SORT1 = <, SORT2 = <,
	HASHES
);
CREATE OPERATOR <> (
	PROCEDURE = @NAMESPACE@."xxidne",
	LEFTARG = @NAMESPACE@."xxid",
	RIGHTARG = @NAMESPACE@."xxid",
	COMMUTATOR = <>, NEGATOR = =,
	RESTRICT = neqsel, JOIN = neqjoinsel
);
CREATE OPERATOR > (
	PROCEDURE = @NAMESPACE@."xxidgt",
	LEFTARG = @NAMESPACE@."xxid",
	RIGHTARG = @NAMESPACE@."xxid",
	COMMUTATOR = <, NEGATOR = <=,
	RESTRICT = scalargtsel, JOIN = scalargtjoinsel
);
CREATE OPERATOR <= (
	PROCEDURE = @NAMESPACE@."xxidle",
	LEFTARG = @NAMESPACE@."xxid",
	RIGHTARG = @NAMESPACE@."xxid",
	COMMUTATOR = >=, NEGATOR = >,
	RESTRICT = scalarltsel, JOIN = scalarltjoinsel
);
CREATE OPERATOR >= (
	PROCEDURE = @NAMESPACE@."xxidge",
	LEFTARG = @NAMESPACE@."xxid",
	RIGHTARG = @NAMESPACE@."xxid",
	COMMUTATOR = <=, NEGATOR = <,
	RESTRICT = scalargtsel, JOIN = scalargtjoinsel
);


--
-- Finally the default operator class so that we can use our
-- new data type in btree indexes.
--
CREATE OPERATOR CLASS @NAMESPACE@."xxid_ops"
	DEFAULT FOR TYPE @NAMESPACE@."xxid" USING btree AS
	OPERATOR 1 <  (@NAMESPACE@."xxid", @NAMESPACE@."xxid"),
	OPERATOR 2 <= (@NAMESPACE@."xxid", @NAMESPACE@."xxid"),
	OPERATOR 3 =  (@NAMESPACE@."xxid", @NAMESPACE@."xxid"),
	OPERATOR 4 >= (@NAMESPACE@."xxid", @NAMESPACE@."xxid"),
	OPERATOR 5 >  (@NAMESPACE@."xxid", @NAMESPACE@."xxid"),
	FUNCTION 1 @NAMESPACE@."btxxidcmp" (@NAMESPACE@."xxid", @NAMESPACE@."xxid");


--
-- A special transaction snapshot data type for faster visibility checks
--
CREATE FUNCTION @NAMESPACE@."xxid_snapshot_in"(cstring)
RETURNS @NAMESPACE@."xxid_snapshot"
	AS '$libdir/xxid', '_Slony_I_xxid_snapshot_in'
	LANGUAGE C;
CREATE FUNCTION @NAMESPACE@."xxid_snapshot_out"(@NAMESPACE@."xxid_snapshot")
RETURNS cstring
	AS '$libdir/xxid', '_Slony_I_xxid_snapshot_out'
	LANGUAGE C;


--
-- The data type itself
--
CREATE TYPE @NAMESPACE@."xxid_snapshot" (
	INPUT = @NAMESPACE@."xxid_snapshot_in",
	OUTPUT = @NAMESPACE@."xxid_snapshot_out",
	INTERNALLENGTH = variable,
	ALIGNMENT = int4
);


--
-- Special comparision functions used by the remote worker
-- for sync chunk selection
--
CREATE FUNCTION @NAMESPACE@."xxid_lt_snapshot"(
		@NAMESPACE@."xxid",
		@NAMESPACE@."xxid_snapshot")
RETURNS boolean
	AS '$libdir/xxid', '_Slony_I_xxid_lt_snapshot'
	LANGUAGE C;

CREATE FUNCTION @NAMESPACE@."xxid_ge_snapshot"(
		@NAMESPACE@."xxid",
		@NAMESPACE@."xxid_snapshot")
RETURNS boolean
	AS '$libdir/xxid', '_Slony_I_xxid_ge_snapshot'
	LANGUAGE C;


