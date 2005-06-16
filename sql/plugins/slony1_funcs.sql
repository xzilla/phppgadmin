-- ----------------------------------------------------------------------
-- slony1_funcs.sql
--
--    Declaration of replication support functions.
--
--	Copyright (c) 2003-2004, PostgreSQL Global Development Group
--	Author: Jan Wieck, Afilias USA INC.
--
-- $Id: slony1_funcs.sql,v 1.2 2005/06/16 14:40:14 chriskl Exp $
-- ----------------------------------------------------------------------


-- **********************************************************************
-- * C functions in src/backend/slony1_base.c
-- **********************************************************************


-- ----------------------------------------------------------------------
-- FUNCTION createEvent (cluster_name, ev_type [, ev_data [...]])
--
--	Create an sl_event entry
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.createEvent (name, text)
	returns bigint
	as '$libdir/slony1_funcs', '_Slony_I_createEvent'
	language C
	called on null input;

create or replace function @NAMESPACE@.createEvent (name, text, text)
	returns bigint
	as '$libdir/slony1_funcs', '_Slony_I_createEvent'
	language C
	called on null input;

create or replace function @NAMESPACE@.createEvent (name, text, text, text)
	returns bigint
	as '$libdir/slony1_funcs', '_Slony_I_createEvent'
	language C
	called on null input;

create or replace function @NAMESPACE@.createEvent (name, text, text, text, text)
	returns bigint
	as '$libdir/slony1_funcs', '_Slony_I_createEvent'
	language C
	called on null input;

create or replace function @NAMESPACE@.createEvent (name, text, text, text, text, text)
	returns bigint
	as '$libdir/slony1_funcs', '_Slony_I_createEvent'
	language C
	called on null input;

create or replace function @NAMESPACE@.createEvent (name, text, text, text, text, text, text)
	returns bigint
	as '$libdir/slony1_funcs', '_Slony_I_createEvent'
	language C
	called on null input;

create or replace function @NAMESPACE@.createEvent (name, text, text, text, text, text, text, text)
	returns bigint
	as '$libdir/slony1_funcs', '_Slony_I_createEvent'
	language C
	called on null input;

create or replace function @NAMESPACE@.createEvent (name, text, text, text, text, text, text, text, text)
	returns bigint
	as '$libdir/slony1_funcs', '_Slony_I_createEvent'
	language C
	called on null input;

create or replace function @NAMESPACE@.createEvent (name, text, text, text, text, text, text, text, text, text)
	returns bigint
	as '$libdir/slony1_funcs', '_Slony_I_createEvent'
	language C
	called on null input;


-- ----------------------------------------------------------------------
-- FUNCTION denyAccess (cluster_name)
--
--	Trigger function to prevent modifications to a table on
--	a subscriber.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.denyAccess ()
	returns trigger
	as '$libdir/slony1_funcs', '_Slony_I_denyAccess'
	language C
	security definer;
grant execute on function @NAMESPACE@.denyAccess () to public;


-- ----------------------------------------------------------------------
-- FUNCTION lockedSet (cluster_name)
--
--	Trigger function to prevent modifications to a table before
--	and after a moveSet().
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.lockedSet ()
	returns trigger
	as '$libdir/slony1_funcs', '_Slony_I_lockedSet'
	language C;


-- ----------------------------------------------------------------------
-- FUNCTION getLocalNodeId (name)
--
--	
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.getLocalNodeId (name) returns int4
    as '$libdir/slony1_funcs', '_Slony_I_getLocalNodeId'
	language C
	security definer;
grant execute on function @NAMESPACE@.getLocalNodeId (name) to public;


-- ----------------------------------------------------------------------
-- FUNCTION getModuleVersion ()
--
--	Returns the compiled in version number of the Slony-I shared
--	object.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.getModuleVersion () returns text
    as '$libdir/slony1_funcs', '_Slony_I_getModuleVersion'
	language C
	security definer;
grant execute on function @NAMESPACE@.getModuleVersion () to public;


-- ----------------------------------------------------------------------
-- FUNCTION setSessionRole (name, role)
--
--	
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setSessionRole (name, text) returns text
    as '$libdir/slony1_funcs', '_Slony_I_setSessionRole'
	language C
	security definer;
grant execute on function @NAMESPACE@.setSessionRole (name, text) to public;


-- ----------------------------------------------------------------------
-- FUNCTION getSessionRole (name, role)
--
--	
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.getSessionRole (name) returns text
    as '$libdir/slony1_funcs', '_Slony_I_getSessionRole'
	language C
	security definer;
grant execute on function @NAMESPACE@.getSessionRole (name) to public;


-- ----------------------------------------------------------------------
-- FUNCTION logTrigger ()
--
--	
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.logTrigger () returns trigger
    as '$libdir/slony1_funcs', '_Slony_I_logTrigger'
	language C
	security definer;
grant execute on function @NAMESPACE@.logTrigger () to public;


-- ----------------------------------------------------------------------
-- FUNCTION terminateNodeConnections (name)
--
--	
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.terminateNodeConnections (name) returns int4
    as '$libdir/slony1_funcs', '_Slony_I_terminateNodeConnections'
	language C;


-- ----------------------------------------------------------------------
-- FUNCTION cleanupListener ()
--
--	
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.cleanupListener () returns int4
    as '$libdir/slony1_funcs', '_Slony_I_cleanupListener'
	language C;


-- **********************************************************************
-- * PL/pgSQL functions for administrative tasks
-- **********************************************************************


-- ----------------------------------------------------------------------
-- FUNCTION slonyVersionMajor()
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.slonyVersionMajor()
returns int4
as '
begin
	return 1;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION slonyVersionMinor()
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.slonyVersionMinor()
returns int4
as '
begin
	return 0;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION slonyVersionPatchlevel()
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.slonyVersionPatchlevel()
returns int4
as '
begin
	return 5;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION slonyVersion()
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.slonyVersion()
returns text
as '
begin
	return ''''	|| @NAMESPACE@.slonyVersionMajor() || ''.''
				|| @NAMESPACE@.slonyVersionMinor() || ''.''
				|| @NAMESPACE@.slonyVersionPatchlevel();
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION initializeLocalNode (no_id, no_comment)
--
--	Initializes a new node.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.initializeLocalNode (int4, text)
returns int4
as '
declare
	p_local_node_id		alias for $1;
	p_comment			alias for $2;
	v_old_node_id		int4;
	v_first_log_no		int4;
	v_event_seq			int8;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Make sure this node is uninitialized or got reset
	-- ----
	select last_value::int4 into v_old_node_id from @NAMESPACE@.sl_local_node_id;
	if v_old_node_id != -1 then
		raise exception ''Slony-I: This node is already initialized'';
	end if;

	-- ----
	-- Set sl_local_node_id to the requested value and add our
	-- own system to sl_node.
	-- ----
	perform setval(''@NAMESPACE@.sl_local_node_id'', p_local_node_id);
	perform setval(''@NAMESPACE@.sl_rowid_seq'', 
			p_local_node_id::int8 * ''1000000000000000''::int8);
	perform @NAMESPACE@.storeNode_int (p_local_node_id, p_comment);
	
	return p_local_node_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION storeNode (no_id, no_comment)
--
--	Generate the STORE_NODE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.storeNode (int4, text)
returns bigint
as '
declare
	p_no_id			alias for $1;
	p_no_comment	alias for $2;
begin
	perform @NAMESPACE@.storeNode_int (p_no_id, p_no_comment);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''STORE_NODE'',
									p_no_id, p_no_comment);
end;
' language plpgsql
	called on null input;


-- ----------------------------------------------------------------------
-- FUNCTION storeNode_int (no_id, no_comment)
--
--	Process the STORE_NODE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.storeNode_int (int4, text)
returns int4
as '
declare
	p_no_id			alias for $1;
	p_no_comment	alias for $2;
	v_old_row		record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check if the node exists
	-- ----
	select * into v_old_row
			from @NAMESPACE@.sl_node
			where no_id = p_no_id
			for update;
	if found then 
		-- ----
		-- Node exists, update the existing row.
		-- ----
		update @NAMESPACE@.sl_node
				set no_comment = p_no_comment
				where no_id = p_no_id;
	else
		-- ----
		-- New node, insert the sl_node row
		-- ----
		insert into @NAMESPACE@.sl_node
				(no_id, no_active, no_comment) values
				(p_no_id, ''f'', p_no_comment);
	end if;

	return p_no_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION enableNode (no_id)
--
--	Generate the ENABLE_NODE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.enableNode (int4)
returns bigint
as '
declare
	p_no_id			alias for $1;
	v_local_node_id	int4;
	v_node_row		record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that we are the node to activate and that we are
	-- currently disabled.
	-- ----
	v_local_node_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
	select * into v_node_row
			from @NAMESPACE@.sl_node
			where no_id = p_no_id
			for update;
	if not found then 
		raise exception ''Slony-I: node % not found'', p_no_id;
	end if;
	if v_node_row.no_active then
		raise exception ''Slony-I: node % is already active'', p_no_id;
	end if;

	-- ----
	-- Activate this node and generate the ENABLE_NODE event
	-- ----
	perform @NAMESPACE@.enableNode_int (p_no_id);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''ENABLE_NODE'',
									p_no_id);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION enableNode_int (no_id)
--
--	Process the ENABLE_NODE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.enableNode_int (int4)
returns int4
as '
declare
	p_no_id			alias for $1;
	v_local_node_id	int4;
	v_node_row		record;
	v_sub_row		record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that the node is inactive
	-- ----
	select * into v_node_row
			from @NAMESPACE@.sl_node
			where no_id = p_no_id
			for update;
	if not found then 
		raise exception ''Slony-I: node % not found'', p_no_id;
	end if;
	if v_node_row.no_active then
		return p_no_id;
	end if;

	-- ----
	-- Activate the node and generate sl_confirm status rows for it.
	-- ----
	update @NAMESPACE@.sl_node
			set no_active = ''t''
			where no_id = p_no_id;
	insert into @NAMESPACE@.sl_confirm
			(con_origin, con_received, con_seqno)
			select no_id, p_no_id, 0 from @NAMESPACE@.sl_node
				where no_id != p_no_id
				and no_active;
	insert into @NAMESPACE@.sl_confirm
			(con_origin, con_received, con_seqno)
			select p_no_id, no_id, 0 from @NAMESPACE@.sl_node
				where no_id != p_no_id
				and no_active;

	-- ----
	-- Generate ENABLE_SUBSCRIPTION events for all sets that
	-- origin here and are subscribed by the just enabled node.
	-- ----
	v_local_node_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
	for v_sub_row in select SUB.sub_set, SUB.sub_provider from
			@NAMESPACE@.sl_set S,
			@NAMESPACE@.sl_subscribe SUB
			where S.set_origin = v_local_node_id
			and S.set_id = SUB.sub_set
			and SUB.sub_receiver = p_no_id
			for update of S
	loop
		perform @NAMESPACE@.enableSubscription (v_sub_row.sub_set,,
				v_sub_row.sub_provider, p_no_id);
	end loop;

	return p_no_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION disableNode (no_id)
--
--	Generate the DISABLE_NODE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.disableNode (int4)
returns bigint
as '
declare
	p_no_id			alias for $1;
begin
	-- **** TODO ****
	raise exception ''Slony-I: disableNode() not implemented'';
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION disableNode_int (no_id)
--
--	Process the DISABLE_NODE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.disableNode_int (int4)
returns int4
as '
declare
	p_no_id			alias for $1;
begin
	-- **** TODO ****
	raise exception ''Slony-I: disableNode_int() not implemented'';
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION dropNode (no_id)
--
--	Generate the DROP_NODE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.dropNode (int4)
returns bigint
as '
declare
	p_no_id			alias for $1;
	v_node_row		record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that this got called on a different node
	-- ----
	if p_no_id = @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: DROP_NODE cannot initiate on the dropped node'';
	end if;

	select * into v_node_row from @NAMESPACE@.sl_node
			where no_id = p_no_id
			for update;
	if not found then
		raise exception ''Slony-I: unknown node ID %'', p_no_id;
	end if;

	-- ----
	-- Make sure we do not break other nodes subscriptions with this
	-- ----
	if exists (select true from @NAMESPACE@.sl_subscribe
			where sub_provider = p_no_id)
	then
		raise exception ''Slony-I: Node % is still configured as data provider'',
				p_no_id;
	end if;

	-- ----
	-- Make sure no set originates there any more
	-- ----
	if exists (select true from @NAMESPACE@.sl_set
			where set_origin = p_no_id)
	then
		raise exception ''Slony-I: Node % is still origin of one or more sets'',
				p_no_id;
	end if;

	-- ----
	-- Call the internal drop functionality and generate the event
	-- ----
	perform @NAMESPACE@.dropNode_int(p_no_id);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''DROP_NODE'',
									p_no_id);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION dropNode_int (no_id)
--
--	Process the DROP_NODE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.dropNode_int (int4)
returns int4
as '
declare
	p_no_id			alias for $1;
	v_tab_row		record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- If the dropped node is a remote node, clean the configuration
	-- from all traces for it.
	-- ----
	if p_no_id <> @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		delete from @NAMESPACE@.sl_subscribe
				where sub_receiver = p_no_id;
		delete from @NAMESPACE@.sl_listen
				where li_origin = p_no_id
					or li_provider = p_no_id
					or li_receiver = p_no_id;
		delete from @NAMESPACE@.sl_path
				where pa_server = p_no_id
					or pa_client = p_no_id;
		delete from @NAMESPACE@.sl_confirm
				where con_origin = p_no_id
					or con_received = p_no_id;
		delete from @NAMESPACE@.sl_event
				where ev_origin = p_no_id;
		delete from @NAMESPACE@.sl_node
				where no_id = p_no_id;

		return p_no_id;
	end if;

	-- ----
	-- This is us ... deactivate the node for now, the daemon
	-- will call uninstallNode() in a separate transaction.
	-- ----
	update @NAMESPACE@.sl_node
			set no_active = false
			where no_id = p_no_id;

	return p_no_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION failedNode (failed_node, backup_node)
--
--	Initiate a failover. This function must be called on all nodes
--	and then waited for the restart of all node deamons.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.failedNode(int4, int4)
returns int4
as '
declare
	p_failed_node		alias for $1;
	p_backup_node		alias for $2;
	v_row				record;
	v_row2				record;
	v_n					int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- All consistency checks first
	-- Check that every system that has a path to the failed node
	-- also has a path to the backup node.
	-- ----
	for v_row in select P.pa_client
			from @NAMESPACE@.sl_path P
			where P.pa_server = p_failed_node
				and P.pa_client <> p_backup_node
				and not exists (select true from @NAMESPACE@.sl_path PP
							where PP.pa_server = p_backup_node
								and PP.pa_client = P.pa_client)
	loop
		raise exception ''Slony-I: cannot failover - node % has no path to the backup node'',
				v_row.pa_client;
	end loop;

	-- ----
	-- Check all sets originating on the failed node
	-- ----
	for v_row in select set_id
			from @NAMESPACE@.sl_set
			where set_origin = p_failed_node
	loop
		-- ----
		-- Check that the backup node is subscribed to all sets
		-- that origin on the failed node
		-- ----
		select into v_row2 sub_forward, sub_active
				from @NAMESPACE@.sl_subscribe
				where sub_set = v_row.set_id
					and sub_receiver = p_backup_node;
		if not found then
			raise exception ''Slony-I: cannot failover - node % is not subscribed to set %'',
					p_backup_node, v_row.set_id;
		end if;

		-- ----
		-- Check that the subscription is active
		-- ----
		if not v_row2.sub_active then
			raise exception ''Slony-I: cannot failover - subscription for set % is not active'',
					v_row.set_id;
		end if;

		-- ----
		-- If there are other subscribers, the backup node needs to
		-- be a forwarder too.
		-- ----
		select into v_n count(*)
				from @NAMESPACE@.sl_subscribe
				where sub_set = v_row.set_id
					and sub_receiver <> p_backup_node;
		if v_n > 0 and not v_row2.sub_forward then
			raise exception ''Slony-I: cannot failover - node % is not a forwarder of set %'',
					p_backup_node, v_row.set_id;
		end if;
	end loop;

	-- ----
	-- Terminate all connections of the failed node the hard way
	-- ----
	perform @NAMESPACE@.terminateNodeConnections(
			''_@CLUSTERNAME@_Node_'' || p_failed_node);

	-- ----
	-- Let every node that listens for something on the failed node
	-- listen for that on the backup node instead.
	-- ----
	for v_row in select * from @NAMESPACE@.sl_listen
			where li_provider = p_failed_node
				and li_receiver <> p_backup_node
	loop
		perform @NAMESPACE@.storeListen_int(v_row.li_origin,
				p_backup_node, v_row.li_receiver);
	end loop;

	-- ----
	-- Let the backup node listen for all events where the
	-- failed node did listen for it.
	-- ----
	for v_row in select li_origin, li_provider
			from @NAMESPACE@.sl_listen
			where li_receiver = p_failed_node
				and li_provider <> p_backup_node
	loop
		perform @NAMESPACE@.storeListen_int(v_row.li_origin,
				v_row.li_provider, p_backup_node);
	end loop;

	-- ----
	-- Remove all sl_listen entries that receive anything from the
	-- failed node.
	-- ----
	delete from @NAMESPACE@.sl_listen
			where li_provider = p_failed_node
				or li_receiver = p_failed_node;

	-- ----
	-- Move the sets
	-- ----
	for v_row in select S.set_id, (select count(*)
					from @NAMESPACE@.sl_subscribe SUB
					where S.set_id = SUB.sub_set
						and SUB.sub_receiver <> p_backup_node
						and SUB.sub_provider = p_failed_node)
					as num_direct_receivers 
			from @NAMESPACE@.sl_set S
			where S.set_origin = p_failed_node
			for update
	loop
		-- ----
		-- If the backup node is the only direct subscriber ...
		-- ----
		if v_row.num_direct_receivers = 0 then
raise notice ''failedNode: set % has no other direct receivers - move now'', v_row.set_id;
			-- ----
			-- backup_node is the only direct subscriber, move the set
			-- right now. On the backup node itself that includes restoring
			-- all user mode triggers, removing the protection trigger,
			-- adding the log trigger, removing the subscription and the
			-- obsolete setsync status.
			-- ----
			if p_backup_node = @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
				for v_row2 in select * from @NAMESPACE@.sl_table
						where tab_set = v_row.set_id
				loop
					perform @NAMESPACE@.alterTableRestore(v_row2.tab_id);
				end loop;
			end if;

			update @NAMESPACE@.sl_set set set_origin = p_backup_node
					where set_id = v_row.set_id;

			if p_backup_node = @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
				delete from @NAMESPACE@.sl_setsync
						where ssy_setid = v_row.set_id;

				for v_row2 in select * from @NAMESPACE@.sl_table
						where tab_set = v_row.set_id
				loop
					perform @NAMESPACE@.alterTableForReplication(v_row2.tab_id);
				end loop;
			end if;

			delete from @NAMESPACE@.sl_subscribe
					where sub_set = v_row.set_id
						and sub_receiver = p_backup_node;
		else
raise notice ''failedNode: set % has other direct receivers - change providers only'', v_row.set_id;
			-- ----
			-- Backup node is not the only direct subscriber. This
			-- means that at this moment, we redirect all direct
			-- subscribers to receive from the backup node, and the
			-- backup node itself to receive from another one.
			-- The admin utility will wait for the slon engine to
			-- restart and then call failedNode2() on the node with
			-- the highest SYNC and redirect this to it on
			-- backup node later.
			-- ----
			update @NAMESPACE@.sl_subscribe
					set sub_provider = (select min(SS.sub_receiver)
							from @NAMESPACE@.sl_subscribe SS
							where SS.sub_set = v_row.set_id
								and SS.sub_provider = p_failed_node
								and SS.sub_receiver <> p_backup_node
								and SS.sub_forward)
					where sub_set = v_row.set_id
						and sub_receiver = p_backup_node;
			update @NAMESPACE@.sl_subscribe
					set sub_provider = p_backup_node
					where sub_set = v_row.set_id
						and sub_provider = p_failed_node
						and sub_receiver <> p_backup_node;
		end if;
	end loop;

	-- ----
	-- Make sure the node daemon will restart
	-- ----
	notify "_@CLUSTERNAME@_Restart";

	-- ----
	-- That is it - so far.
	-- ----
	return p_failed_node;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION failedNode2 (failed_node, backup_node, set_id, ev_seqno, ev_seqfake)
--
--	On the node that has the highest sequence number of the failed node,
--	fake the FAILED_NODE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.failedNode2 (int4, int4, int4, int8, int8)
returns bigint
as '
declare
	p_failed_node		alias for $1;
	p_backup_node		alias for $2;
	p_set_id			alias for $3;
	p_ev_seqno			alias for $4;
	p_ev_seqfake		alias for $5;
	v_row				record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	select * into v_row
			from @NAMESPACE@.sl_event
			where ev_origin = p_failed_node
			and ev_seqno = p_ev_seqno;
	if not found then
		raise exception ''Slony-I: event %,% not found'',
				p_failed_node, p_ev_seqno;
	end if;

	insert into @NAMESPACE@.sl_event
			(ev_origin, ev_seqno, ev_timestamp,
			ev_minxid, ev_maxxid, ev_xip,
			ev_type, ev_data1, ev_data2, ev_data3)
			values 
			(p_failed_node, p_ev_seqfake, CURRENT_TIMESTAMP,
			v_row.ev_minxid, v_row.ev_maxxid, v_row.ev_xip,
			''FAILOVER_SET'', p_failed_node::text, p_backup_node::text,
			p_set_id::text);
	insert into @NAMESPACE@.sl_confirm
			(con_origin, con_received, con_seqno, con_timestamp)
			values
			(p_failed_node, @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@''),
			p_ev_seqfake, CURRENT_TIMESTAMP);
	notify "_@CLUSTERNAME@_Event";
	notify "_@CLUSTERNAME@_Confirm";
	notify "_@CLUSTERNAME@_Restart";

	perform @NAMESPACE@.failoverSet_int(p_failed_node,
			p_backup_node, p_set_id);

	return p_ev_seqfake;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION failoverSet_int (failed_node, backup_node, set_id)
--
--	Finish failover for one set.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.failoverSet_int (int4, int4, int4)
returns int4
as '
declare
	p_failed_node		alias for $1;
	p_backup_node		alias for $2;
	p_set_id			alias for $3;
	v_row				record;
	v_last_sync			int8;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Change the origin of the set now to the backup node.
	-- On the backup node this includes changing all the
	-- trigger and protection stuff
	-- ----
	if p_backup_node = @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		for v_row in select * from @NAMESPACE@.sl_table
				where tab_set = p_set_id
		loop
			perform @NAMESPACE@.alterTableRestore(v_row.tab_id);
		end loop;

		delete from @NAMESPACE@.sl_setsync
				where ssy_setid = p_set_id;
		delete from @NAMESPACE@.sl_subscribe
				where sub_set = p_set_id
					and sub_receiver = p_backup_node;
		update @NAMESPACE@.sl_set
				set set_origin = p_backup_node
				where set_id = p_set_id;

		for v_row in select * from @NAMESPACE@.sl_table
				where tab_set = p_set_id
		loop
			perform @NAMESPACE@.alterTableForReplication(v_row.tab_id);
		end loop;
	else
		delete from @NAMESPACE@.sl_subscribe
				where sub_set = p_set_id
					and sub_receiver = p_backup_node;
		update @NAMESPACE@.sl_set
				set set_origin = p_backup_node
				where set_id = p_set_id;
	end if;

	-- ----
	-- If we are a subscriber of the set ourself, change our
	-- setsync status to reflect the new set origin.
	-- ----
	if exists (select true from @NAMESPACE@.sl_subscribe
			where sub_set = p_set_id
				and sub_receiver = @NAMESPACE@.getLocalNodeId(
						''_@CLUSTERNAME@''))
	then
		delete from @NAMESPACE@.sl_setsync
				where ssy_setid = p_set_id;

		select coalesce(max(ev_seqno), 0) into v_last_sync
				from @NAMESPACE@.sl_event
				where ev_origin = p_backup_node
					and ev_type = ''SYNC'';
		if v_last_sync > 0 then
			insert into @NAMESPACE@.sl_setsync
					(ssy_setid, ssy_origin, ssy_seqno,
					ssy_minxid, ssy_maxxid, ssy_xip, ssy_action_list)
					select p_set_id, p_backup_node, v_last_sync,
					ev_minxid, ev_maxxid, ev_xip, NULL
					from @NAMESPACE@.sl_event
					where ev_origin = p_backup_node
						and ev_seqno = v_last_sync;
		else
			insert into @NAMESPACE@.sl_setsync
					(ssy_setid, ssy_origin, ssy_seqno,
					ssy_minxid, ssy_maxxid, ssy_xip, ssy_action_list)
					values (p_set_id, p_backup_node, ''0'',
					''0'', ''0'', '''', NULL);
		end if;
				
	end if;

	return p_failed_node;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION uninstallNode ()
--
--	Reset the whole database to standalone by removing the whole
--	replication system.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.uninstallNode ()
returns int4
as '
declare
	v_tab_row		record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- This is us ... time for suicide! Restore all tables to
	-- their original status.
	-- ----
	for v_tab_row in select * from @NAMESPACE@.sl_table loop
		perform @NAMESPACE@.alterTableRestore(v_tab_row.tab_id);
		perform @NAMESPACE@.tableDropKey(v_tab_row.tab_id);
	end loop;

	raise notice ''Slony-I: Please drop schema "_@CLUSTERNAME@"'';
	return 0;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION storePath (pa_server, pa_client, pa_conninfo, pa_connretry)
--
--	Generate the STORE_PATH event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.storePath (int4, int4, text, int4)
returns bigint
as '
declare
	p_pa_server		alias for $1;
	p_pa_client		alias for $2;
	p_pa_conninfo	alias for $3;
	p_pa_connretry	alias for $4;
begin
	perform @NAMESPACE@.storePath_int(p_pa_server, p_pa_client,
			p_pa_conninfo, p_pa_connretry);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''STORE_PATH'', 
			p_pa_server, p_pa_client, p_pa_conninfo, p_pa_connretry);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION storePath_int (pa_server, pa_client, pa_conninfo, pa_connretry)
--
--	Process the STORE_PATH event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.storePath_int (int4, int4, text, int4)
returns int4
as '
declare
	p_pa_server		alias for $1;
	p_pa_client		alias for $2;
	p_pa_conninfo	alias for $3;
	p_pa_connretry	alias for $4;
	v_dummy			int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check if the path already exists
	-- ----
	select 1 into v_dummy
			from @NAMESPACE@.sl_path
			where pa_server = p_pa_server
			and pa_client = p_pa_client
			for update;
	if found then
		-- ----
		-- Path exists, update pa_conninfo
		-- ----
		update @NAMESPACE@.sl_path
				set pa_conninfo = p_pa_conninfo,
					pa_connretry = p_pa_connretry
				where pa_server = p_pa_server
				and pa_client = p_pa_client;
	else
		-- ----
		-- New path
		--
		-- In case we receive STORE_PATH events before we know
		-- about the nodes involved in this, we generate those nodes
		-- as pending.
		-- ----
		if not exists (select 1 from @NAMESPACE@.sl_node
						where no_id = p_pa_server) then
			perform @NAMESPACE@.storeNode_int (p_pa_server, ''<event pending>'');
		end if;
		if not exists (select 1 from @NAMESPACE@.sl_node
						where no_id = p_pa_client) then
			perform @NAMESPACE@.storeNode_int (p_pa_client, ''<event pending>'');
		end if;
		insert into @NAMESPACE@.sl_path
				(pa_server, pa_client, pa_conninfo, pa_connretry) values
				(p_pa_server, p_pa_client, p_pa_conninfo, p_pa_connretry);
	end if;

	return 0;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION dropPath (pa_server, pa_client)
--
--	Generate the DROP_PATH event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.dropPath (int4, int4)
returns bigint
as '
declare
	p_pa_server		alias for $1;
	p_pa_client		alias for $2;
	v_row			record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- There should be no existing subscriptions. Auto unsubscribing
	-- is considered too dangerous. 
	-- ----
	for v_row in select sub_set, sub_provider, sub_receiver
			from @NAMESPACE@.sl_subscribe
			where sub_provider = p_pa_server
			and sub_receiver = p_pa_client
	loop
		raise exception 
			''Slony-I: Path cannot be dropped, subscription of set % needs it'',
			v_row.sub_set;
	end loop;

	-- ----
	-- Drop all sl_listen entries that depend on this path
	-- ----
	for v_row in select li_origin, li_provider, li_receiver
			from @NAMESPACE@.sl_listen
			where li_provider = p_pa_server
			and li_receiver = p_pa_client
	loop
		perform @NAMESPACE@.dropListen(
				v_row.li_origin, v_row.li_provider, v_row.li_receiver);
	end loop;

	-- ----
	-- Now drop the path and create the event
	-- ----
	perform @NAMESPACE@.dropPath_int(p_pa_server, p_pa_client);
	return  @NAMESPACE@.createEvent (''_@CLUSTERNAME@'', ''DROP_PATH'',
			p_pa_server, p_pa_client);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION dropPath_int (pa_server, pa_client)
--
--	Process the DROP_NODE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.dropPath_int (int4, int4)
returns int4
as '
declare
	p_pa_server		alias for $1;
	p_pa_client		alias for $2;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Remove any dangling sl_listen entries with the server
	-- as provider and the client as receiver. This must have
	-- been cleared out before, but obviously was not.
	-- ----
	delete from @NAMESPACE@.sl_listen
			where li_provider = p_pa_server
			and li_receiver = p_pa_client;

	delete from @NAMESPACE@.sl_path
			where pa_server = p_pa_server
			and pa_client = p_pa_client;

	if found then
		return 1;
	else
		return 0;
	end if;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION storeListen (li_origin, li_provider, li_receiver)
--
--	Generate the STORE_LISTEN event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.storeListen (int4, int4, int4)
returns bigint
as '
declare
	p_li_origin		alias for $1;
	p_li_provider	alias for $2;
	p_li_receiver	alias for $3;
begin
	perform @NAMESPACE@.storeListen_int (p_li_origin, p_li_provider, p_li_receiver);
	return  @NAMESPACE@.createEvent (''_@CLUSTERNAME@'', ''STORE_LISTEN'',
			p_li_origin, p_li_provider, p_li_receiver);
end;
' language plpgsql
	called on null input;


-- ----------------------------------------------------------------------
-- FUNCTION storeListen_int (li_origin, li_provider, li_receiver)
--
--	Process the STORE_LISTEN event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.storeListen_int (int4, int4, int4)
returns int4
as '
declare
	p_li_origin		alias for $1;
	p_li_provider	alias for $2;
	p_li_receiver	alias for $3;
	v_exists		int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	select 1 into v_exists
			from @NAMESPACE@.sl_listen
			where li_origin = p_li_origin
			and li_provider = p_li_provider
			and li_receiver = p_li_receiver;
	if not found then
		-- ----
		-- In case we receive STORE_LISTEN events before we know
		-- about the nodes involved in this, we generate those nodes
		-- as pending.
		-- ----
		if not exists (select 1 from @NAMESPACE@.sl_node
						where no_id = p_li_origin) then
			perform @NAMESPACE@.storeNode_int (p_li_origin, ''<event pending>'');
		end if;
		if not exists (select 1 from @NAMESPACE@.sl_node
						where no_id = p_li_provider) then
			perform @NAMESPACE@.storeNode_int (p_li_provider, ''<event pending>'');
		end if;
		if not exists (select 1 from @NAMESPACE@.sl_node
						where no_id = p_li_receiver) then
			perform @NAMESPACE@.storeNode_int (p_li_receiver, ''<event pending>'');
		end if;

		insert into @NAMESPACE@.sl_listen
				(li_origin, li_provider, li_receiver) values
				(p_li_origin, p_li_provider, p_li_receiver);
	end if;

	return 0;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION dropListen (li_origin, li_provider, li_receiver)
--
--	Generate the DROP_LISTEN event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.dropListen (int4, int4, int4)
returns bigint
as '
declare
	p_li_origin		alias for $1;
	p_li_provider	alias for $2;
	p_li_receiver	alias for $3;
begin
	perform @NAMESPACE@.dropListen_int(p_li_origin, 
			p_li_provider, p_li_receiver);
	
	return  @NAMESPACE@.createEvent (''_@CLUSTERNAME@'', ''DROP_LISTEN'',
			p_li_origin, p_li_provider, p_li_receiver);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION dropListen_int (li_origin, li_provider, li_receiver)
--
--	Process the DROP_LISTEN event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.dropListen_int (int4, int4, int4)
returns int4
as '
declare
	p_li_origin		alias for $1;
	p_li_provider	alias for $2;
	p_li_receiver	alias for $3;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	delete from @NAMESPACE@.sl_listen
			where li_origin = p_li_origin
			and li_provider = p_li_provider
			and li_receiver = p_li_receiver;
	if found then
		return 1;
	else
		return 0;
	end if;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION storeSet (set_id, set_comment)
--
--	Generate the STORE_SET event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.storeSet (int4, text)
returns bigint
as '
declare
	p_set_id			alias for $1;
	p_set_comment		alias for $2;
	v_local_node_id		int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	v_local_node_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');

	insert into @NAMESPACE@.sl_set
			(set_id, set_origin, set_comment) values
			(p_set_id, v_local_node_id, p_set_comment);

	return @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''STORE_SET'', 
			p_set_id, v_local_node_id, p_set_comment);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION storeSet_int (set_id, set_origin, set_comment)
--
--	Process the STORE_SET event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.storeSet_int (int4, int4, text)
returns int4
as '
declare
	p_set_id			alias for $1;
	p_set_origin		alias for $2;
	p_set_comment		alias for $3;
	v_dummy				int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	select 1 into v_dummy
			from @NAMESPACE@.sl_set
			where set_id = p_set_id
			for update;
	if found then 
		update @NAMESPACE@.sl_set
				set set_comment = p_set_comment
				where set_id = p_set_id;
	else
		if not exists (select 1 from @NAMESPACE@.sl_node
						where no_id = p_set_origin) then
			perform @NAMESPACE@.storeNode_int (p_set_origin, ''<event pending>'');
		end if;
		insert into @NAMESPACE@.sl_set
				(set_id, set_origin, set_comment) values
				(p_set_id, p_set_origin, p_set_comment);
	end if;

	return p_set_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION lockSet (set_id)
--
--	Add a special trigger to all tables of a set that disables
--	access to it.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.lockSet (int4)
returns int4
as '
declare
	p_set_id			alias for $1;
	v_local_node_id		int4;
	v_set_row			record;
	v_tab_row			record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that the set exists and that we are the origin
	-- and that it is not already locked.
	-- ----
	v_local_node_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
	select * into v_set_row from @NAMESPACE@.sl_set
			where set_id = p_set_id
			for update;
	if not found then
		raise exception ''Slony-I: set % not found'', p_set_id;
	end if;
	if v_set_row.set_origin <> v_local_node_id then
		raise exception ''Slony-I: set % does not originate on local node'',
				p_set_id;
	end if;
	if v_set_row.set_locked notnull then
		raise exception ''Slony-I: set % is already locked'', p_set_id;
	end if;

	-- ----
	-- Place the lockedSet trigger on all tables in the set.
	-- ----
	for v_tab_row in select T.tab_id,
			"pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
			"pg_catalog".quote_ident(PGC.relname) as tab_fqname
			from @NAMESPACE@.sl_table T,
				"pg_catalog".pg_class PGC, "pg_catalog".pg_namespace PGN
			where T.tab_set = p_set_id
				and T.tab_reloid = PGC.oid
				and PGC.relnamespace = PGN.oid
			order by tab_id
	loop
		execute ''create trigger "_@CLUSTERNAME@_lockedset_'' || 
				v_tab_row.tab_id || 
				''" before insert or update or delete on '' ||
				v_tab_row.tab_fqname || '' for each row execute procedure
				@NAMESPACE@.lockedSet (''''_@CLUSTERNAME@'''');'';
	end loop;

	-- ----
	-- Remember our snapshots xmax as for the set locking
	-- ----
	update @NAMESPACE@.sl_set
			set set_locked = @NAMESPACE@.getMaxXid()
			where set_id = p_set_id;

	return p_set_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION unlockSet (set_id)
--
--	Remove the special trigger from all tables of a set that disables
--	access to it.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.unlockSet (int4)
returns int4
as '
declare
	p_set_id			alias for $1;
	v_local_node_id		int4;
	v_set_row			record;
	v_tab_row			record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that the set exists and that we are the origin
	-- and that it is not already locked.
	-- ----
	v_local_node_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
	select * into v_set_row from @NAMESPACE@.sl_set
			where set_id = p_set_id
			for update;
	if not found then
		raise exception ''Slony-I: set % not found'', p_set_id;
	end if;
	if v_set_row.set_origin <> v_local_node_id then
		raise exception ''Slony-I: set % does not originate on local node'',
				p_set_id;
	end if;
	if v_set_row.set_locked isnull then
		raise exception ''Slony-I: set % is not locked'', p_set_id;
	end if;

	-- ----
	-- Drop the lockedSet trigger from all tables in the set.
	-- ----
	for v_tab_row in select T.tab_id,
			"pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
			"pg_catalog".quote_ident(PGC.relname) as tab_fqname
			from @NAMESPACE@.sl_table T,
				"pg_catalog".pg_class PGC, "pg_catalog".pg_namespace PGN
			where T.tab_set = p_set_id
				and T.tab_reloid = PGC.oid
				and PGC.relnamespace = PGN.oid
			order by tab_id
	loop
		execute ''drop trigger "_@CLUSTERNAME@_lockedset_'' || 
				v_tab_row.tab_id || ''" on '' || v_tab_row.tab_fqname;
	end loop;

	-- ----
	-- Clear out the set_locked field
	-- ----
	update @NAMESPACE@.sl_set
			set set_locked = NULL
			where set_id = p_set_id;

	return p_set_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION moveSet (set_id, new_origin)
--
--	Generate the MOVE_SET event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.moveSet (int4, int4)
returns bigint
as '
declare
	p_set_id			alias for $1;
	p_new_origin		alias for $2;
	v_local_node_id		int4;
	v_set_row			record;
	v_sub_row			record;
	v_sync_seqno		int8;
	v_lv_row			record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that the set is locked and that this locking
	-- happened long enough ago.
	-- ----
	v_local_node_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
	select * into v_set_row from @NAMESPACE@.sl_set
			where set_id = p_set_id
			for update;
	if not found then
		raise exception ''Slony-I: set % not found'', p_set_id;
	end if;
	if v_set_row.set_origin <> v_local_node_id then
		raise exception ''Slony-I: set % does not originate on local node'',
				p_set_id;
	end if;
	if v_set_row.set_locked isnull then
		raise exception ''Slony-I: set % is not locked'', p_set_id;
	end if;
	if v_set_row.set_locked > @NAMESPACE@.getMinXid() then
		raise exception ''Slony-I: cannot move set % yet, transactions < % are still in progress'',
				p_set_id, v_set_row.set_locked;
	end if;

	-- ----
	-- Unlock the set
	-- ----
	perform @NAMESPACE@.unlockSet(p_set_id);

	-- ----
	-- Check that the new_origin is an active subscriber of the set
	-- ----
	select * into v_sub_row from @NAMESPACE@.sl_subscribe
			where sub_set = p_set_id
			and sub_receiver = p_new_origin;
	if not found then
		raise exception ''Slony-I: set % is not subscribed by node %'',
				p_set_id, p_new_origin;
	end if;
	if not v_sub_row.sub_active then
		raise exception ''Slony-I: subsctiption of node % for set % is inactive'',
				p_new_origin, p_set_id;
	end if;

	-- ----
	-- Reconfigure everything
	-- ----
	perform @NAMESPACE@.moveSet_int(p_set_id, v_local_node_id,
			p_new_origin);

	-- ----
	-- At this time we hold access exclusive locks for every table
	-- in the set. But we did move the set to the new origin, so the
	-- createEvent() we are doing now will not record the sequences.
	-- ----
	v_sync_seqno := @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''SYNC'');
	insert into @NAMESPACE@.sl_seqlog 
			(seql_seqid, seql_origin, seql_ev_seqno, seql_last_value)
			select seq_id, v_local_node_id, v_sync_seqno, seq_last_value
			from @NAMESPACE@.sl_seqlastvalue
			where seq_set = p_set_id;
					
	-- ----
	-- Finally we generate the real event
	-- ----
	return @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''MOVE_SET'', 
			p_set_id, v_local_node_id, p_new_origin);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION moveSet_int (set_id, old_origin, new_origin)
--
--	Process the MOVE_SET event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.moveSet_int (int4, int4, int4)
returns int4
as '
declare
	p_set_id			alias for $1;
	p_old_origin		alias for $2;
	p_new_origin		alias for $3;
	v_local_node_id		int4;
	v_tab_row			record;
	v_sub_row			record;
	v_sub_node			int4;
	v_sub_last			int4;
	v_sub_next			int4;
	v_last_sync			int8;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Get our local node ID
	-- ----
	v_local_node_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');

	-- ----
	-- If we are the old or new origin of the set, we need to
	-- remove the log trigger from all tables first.
	-- ----
	if v_local_node_id = p_old_origin or v_local_node_id = p_new_origin then
		for v_tab_row in select tab_id from @NAMESPACE@.sl_table
				where tab_set = p_set_id
				order by tab_id
		loop
			perform @NAMESPACE@.alterTableRestore(v_tab_row.tab_id);
		end loop;
	end if;

	-- ----
	-- Next we have to reverse the subscription path
	-- ----
	v_sub_last = p_new_origin;
	select sub_provider into v_sub_node
			from @NAMESPACE@.sl_subscribe
			where sub_receiver = p_new_origin;
	if not found then
		raise exception ''Slony-I: subscription path broken in moveSet_int'';
	end if;
	while v_sub_node <> p_old_origin loop
		-- ----
		-- Tracing node by node, the old receiver is now in
		-- v_sub_last and the old provider is in v_sub_node.
		-- ----

		-- ----
		-- Get the current provider of this node as next
		-- and change the provider to the previous one in
		-- the reverse chain.
		-- ----
		select sub_provider into v_sub_next
				from @NAMESPACE@.sl_subscribe
				where sub_set = p_set_id
					and sub_receiver = v_sub_node
				for update;
		if not found then
			raise exception ''Slony-I: subscription path broken in moveSet_int'';
		end if;
		update @NAMESPACE@.sl_subscribe
				set sub_provider = v_sub_last
				where sub_set = p_set_id
					and sub_receiver = v_sub_node;

		v_sub_last = v_sub_node;
		v_sub_node = v_sub_next;
	end loop;

	-- ----
	-- This includes creating a subscription for the old origin
	-- ----
	insert into @NAMESPACE@.sl_subscribe
			(sub_set, sub_provider, sub_receiver,
			sub_forward, sub_active)
			values (p_set_id, v_sub_last, p_old_origin, true, true);
	if v_local_node_id = p_old_origin then
		select coalesce(max(ev_seqno), 0) into v_last_sync 
				from @NAMESPACE@.sl_event
				where ev_origin = p_new_origin
					and ev_type = ''SYNC'';
		if v_last_sync > 0 then
			insert into @NAMESPACE@.sl_setsync
					(ssy_setid, ssy_origin, ssy_seqno,
					ssy_minxid, ssy_maxxid, ssy_xip, ssy_action_list)
					select p_set_id, p_new_origin, v_last_sync,
					ev_minxid, ev_maxxid, ev_xip, NULL
					from @NAMESPACE@.sl_event
					where ev_origin = p_new_origin
						and ev_seqno = v_last_sync;
		else
			insert into @NAMESPACE@.sl_setsync
					(ssy_setid, ssy_origin, ssy_seqno,
					ssy_minxid, ssy_maxxid, ssy_xip, ssy_action_list)
					values (p_set_id, p_new_origin, ''0'',
					''0'', ''0'', '''', NULL);
		end if;
	end if;

	-- ----
	-- Now change the ownership of the set.
	-- ----
	update @NAMESPACE@.sl_set
			set set_origin = p_new_origin
			where set_id = p_set_id;

	-- ----
	-- On the new origin, delete the obsolete setsync information
	-- and the subscription.
	-- ----
	if v_local_node_id = p_new_origin then
		delete from @NAMESPACE@.sl_setsync
				where ssy_setid = p_set_id;
	else
		if v_local_node_id <> p_old_origin then
			--
			-- On every other node, change the setsync so that it will
			-- pick up from the new origins last known sync.
			--
			delete from @NAMESPACE@.sl_setsync
					where ssy_setid = p_set_id;
			select coalesce(max(ev_seqno), 0) into v_last_sync
					from @NAMESPACE@.sl_event
					where ev_origin = p_new_origin
						and ev_type = ''SYNC'';
			if v_last_sync > 0 then
				insert into @NAMESPACE@.sl_setsync
						(ssy_setid, ssy_origin, ssy_seqno,
						ssy_minxid, ssy_maxxid, ssy_xip, ssy_action_list)
						select p_set_id, p_new_origin, v_last_sync,
						ev_minxid, ev_maxxid, ev_xip, NULL
						from @NAMESPACE@.sl_event
						where ev_origin = p_new_origin
							and ev_seqno = v_last_sync;
			else
				insert into @NAMESPACE@.sl_setsync
						(ssy_setid, ssy_origin, ssy_seqno,
						ssy_minxid, ssy_maxxid, ssy_xip, ssy_action_list)
						values (p_set_id, p_new_origin, ''0'',
						''0'', ''0'', '''', NULL);
			end if;
		end if;
	end if;
	delete from @NAMESPACE@.sl_subscribe
			where sub_set = p_set_id
			and sub_receiver = p_new_origin;

	-- ----
	-- If we are the new or old origin, we have to
	-- put all the tables into altered state again.
	-- ----
	if v_local_node_id = p_old_origin or v_local_node_id = p_new_origin then
		for v_tab_row in select tab_id from @NAMESPACE@.sl_table
				where tab_set = p_set_id
				order by tab_id
		loop
			perform @NAMESPACE@.alterTableForReplication(v_tab_row.tab_id);
		end loop;
	end if;

	return p_set_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION dropSet (set_id)
--
--	Generate the DROP_SET event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.dropSet (int4)
returns bigint
as '
declare
	p_set_id			alias for $1;
	v_origin			int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;
	
	-- ----
	-- Check that the set exists and originates here
	-- ----
	select set_origin into v_origin from @NAMESPACE@.sl_set
			where set_id = p_set_id;
	if not found then
		raise exception ''Slony-I: set % not found'', p_set_id;
	end if;
	if v_origin != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: set % does not originate on local node'',
				p_set_id;
	end if;

	-- ----
	-- Call the internal drop set functionality and generate the event
	-- ----
	perform @NAMESPACE@.dropSet_int(p_set_id);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''DROP_SET'', 
			p_set_id);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION dropSet_int (set_id)
--
--	Process the DROP_SET event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.dropSet_int (int4)
returns int4
as '
declare
	p_set_id			alias for $1;
	v_tab_row			record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;
	
	-- ----
	-- Restore all tables original triggers and rules and remove
	-- our replication stuff.
	-- ----
	for v_tab_row in select tab_id from @NAMESPACE@.sl_table
			where tab_set = p_set_id
			order by tab_id
	loop
		perform @NAMESPACE@.alterTableRestore(v_tab_row.tab_id);
		perform @NAMESPACE@.tableDropKey(v_tab_row.tab_id);
	end loop;

	-- ----
	-- Remove all traces of the set configuration
	-- ----
	delete from @NAMESPACE@.sl_sequence
			where seq_set = p_set_id;
	delete from @NAMESPACE@.sl_table
			where tab_set = p_set_id;
	delete from @NAMESPACE@.sl_subscribe
			where sub_set = p_set_id;
	delete from @NAMESPACE@.sl_setsync
			where ssy_setid = p_set_id;
	delete from @NAMESPACE@.sl_set
			where set_id = p_set_id;

	return p_set_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION mergeSet (set_id, add_id)
--
--	Generate the MERGE_SET event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.mergeSet (int4, int4)
returns bigint
as '
declare
	p_set_id			alias for $1;
	p_add_id			alias for $2;
	v_origin			int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;
	
	-- ----
	-- Check that both sets exist and originate here
	-- ----
	if p_set_id = p_add_id then
		raise exception ''Slony-I: merged set ids cannot be identical'';
	end if;
	select set_origin into v_origin from @NAMESPACE@.sl_set
			where set_id = p_set_id;
	if not found then
		raise exception ''Slony-I: set % not found'', p_set_id;
	end if;
	if v_origin != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: set % does not originate on local node'',
				p_set_id;
	end if;

	select set_origin into v_origin from @NAMESPACE@.sl_set
			where set_id = p_add_id;
	if not found then
		raise exception ''Slony-I: set % not found'', p_add_id;
	end if;
	if v_origin != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: set % does not originate on local node'',
				p_add_id;
	end if;

	-- ----
	-- Check that both sets are subscribed by the same set of nodes
	-- ----
	if exists (select true from @NAMESPACE@.sl_subscribe SUB1
				where SUB1.sub_set = p_set_id
				and SUB1.sub_receiver not in (select SUB2.sub_receiver
						from @NAMESPACE@.sl_subscribe SUB2
						where SUB2.sub_set = p_add_id))
	then
		raise exception ''Slony-I: subscriber lists of set % and % are different'',
				p_set_id, p_add_id;
	end if;

	if exists (select true from @NAMESPACE@.sl_subscribe SUB1
				where SUB1.sub_set = p_add_id
				and SUB1.sub_receiver not in (select SUB2.sub_receiver
						from @NAMESPACE@.sl_subscribe SUB2
						where SUB2.sub_set = p_set_id))
	then
		raise exception ''Slony-I: subscriber lists of set % and % are different'',
				p_add_id, p_set_id;
	end if;

	-- ----
	-- Also check that there are no unconfirmed enable subscriptions
	-- still lingering (prevents bug 896)
	-- ----
	if exists (select true from @NAMESPACE@.sl_event
				where ev_origin = v_origin
				and ev_type = ''ENABLE_SUBSCRIPTION''
				and ev_data1 = p_set_id
				and ev_seqno > (select min(max_con_seqno) from
					(select con_received, max(con_seqno) as max_con_seqno
							from @NAMESPACE@.sl_confirm
							where con_origin = v_origin
							group by con_received) as CON
					)
				)
	then
		raise exception ''Slony-I: set % cannot be merged because of pending subscription'',
				p_set_id;
	end if;

	if exists (select true from @NAMESPACE@.sl_event
				where ev_origin = v_origin
				and ev_type = ''ENABLE_SUBSCRIPTION''
				and ev_data1 = p_add_id
				and ev_seqno > (select min(max_con_seqno) from
					(select con_received, max(con_seqno) as max_con_seqno
							from @NAMESPACE@.sl_confirm
							where con_origin = v_origin
							group by con_received) as CON
					)
				)
	then
		raise exception ''Slony-I: set % cannot be merged because of pending subscription'',
				p_add_id;
	end if;

	-- ----
	-- Create a SYNC event, merge the sets, create a MERGE_SET event
	-- ----
	perform @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''SYNC'', NULL);
	perform @NAMESPACE@.mergeSet_int(p_set_id, p_add_id);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''MERGE_SET'', 
			p_set_id, p_add_id);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION mergeSet_int (set_id, add_id)
--
--	Process the MERGE_SET event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.mergeSet_int (int4, int4)
returns int4
as '
declare
	p_set_id			alias for $1;
	p_add_id			alias for $2;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;
	
	update @NAMESPACE@.sl_sequence
			set seq_set = p_set_id
			where seq_set = p_add_id;
	update @NAMESPACE@.sl_table
			set tab_set = p_set_id
			where tab_set = p_add_id;
	delete from @NAMESPACE@.sl_subscribe
			where sub_set = p_add_id;
	delete from @NAMESPACE@.sl_setsync
			where ssy_setid = p_add_id;
	delete from @NAMESPACE@.sl_set
			where set_id = p_add_id;

	return p_set_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION setAddTable (set_id, tab_id, tab_fqname, tab_idxname,
--					tab_comment)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setAddTable(int4, int4, text, name, text)
returns bigint
as '
declare
	p_set_id			alias for $1;
	p_tab_id			alias for $2;
	p_fqname			alias for $3;
	p_tab_idxname		alias for $4;
	p_tab_comment		alias for $5;
	v_set_origin		int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that we are the origin of the set
	-- ----
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = p_set_id;
	if not found then
		raise exception ''Slony-I: setAddTable(): set % not found'', p_set_id;
	end if;
	if v_set_origin != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: setAddTable(): set % has remote origin'', p_set_id;
	end if;

	if exists (select true from @NAMESPACE@.sl_subscribe
			where sub_set = p_set_id)
	then
		raise exception ''Slony-I: cannot add table to currently subscribed set %'',
				p_set_id;
	end if;

	-- ----
	-- Add the table to the set and generate the SET_ADD_TABLE event
	-- ----
	perform @NAMESPACE@.setAddTable_int(p_set_id, p_tab_id, p_fqname,
			p_tab_idxname, p_tab_comment);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''SET_ADD_TABLE'',
			p_set_id, p_tab_id, p_fqname,
			p_tab_idxname, p_tab_comment);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION setAddTable_int (set_id, tab_id, tab_fqname, tab_idxname,
--						tab_comment)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setAddTable_int(int4, int4, text, name, text)
returns int4
as '
declare
	p_set_id			alias for $1;
	p_tab_id			alias for $2;
	p_fqname			alias for $3;
	p_tab_idxname		alias for $4;
	p_tab_comment		alias for $5;
	v_local_node_id		int4;
	v_set_origin		int4;
	v_sub_provider		int4;
	v_relkind			char;
	v_tab_reloid		oid;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- For sets with a remote origin, check that we are subscribed 
	-- to that set. Otherwise we ignore the table because it might 
	-- not even exist in our database.
	-- ----
	v_local_node_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = p_set_id;
	if not found then
		raise exception ''Slony-I: setAddTable_int(): set % not found'',
				p_set_id;
	end if;
	if v_set_origin != v_local_node_id then
		select sub_provider into v_sub_provider
				from @NAMESPACE@.sl_subscribe
				where sub_set = p_set_id
				and sub_receiver = @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
		if not found then
			return 0;
		end if;
	end if;
	
	-- ----
	-- Get the tables OID and check that it is a real table
	-- ----
	select PGC.oid, PGC.relkind into v_tab_reloid, v_relkind
			from "pg_catalog".pg_class PGC, "pg_catalog".pg_namespace PGN
			where PGC.relnamespace = PGN.oid
			and p_fqname = "pg_catalog".quote_ident(PGN.nspname) ||
					''.'' || "pg_catalog".quote_ident(PGC.relname);
	if not found then
		raise exception ''Slony-I: setAddTable(): table % not found'', 
				p_fqname;
	end if;
	if v_relkind != ''r'' then
		raise exception ''Slony-I: setAddTable(): % is not a regular table'',
				p_fqname;
	end if;

	if not exists (select indexrelid
			from "pg_catalog".pg_index PGX, "pg_catalog".pg_class PGC
			where PGX.indrelid = v_tab_reloid
				and PGX.indexrelid = PGC.oid
				and PGC.relname = p_tab_idxname)
	then
		raise exception ''Slony-I: setAddTable(): table % has no index %'',
				p_fqname, p_tab_idxname;
	end if;

	-- ----
	-- Add the table to sl_table and create the trigger on it.
	-- ----
	insert into @NAMESPACE@.sl_table
			(tab_id, tab_reloid, tab_set, tab_idxname, 
			tab_altered, tab_comment) values
			(p_tab_id, v_tab_reloid, p_set_id, p_tab_idxname,
			false, p_tab_comment);
	perform @NAMESPACE@.alterTableForReplication(p_tab_id);

	return p_tab_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION setDropTable (tab_id)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setDropTable(int4)
returns bigint
as '
declare
	p_tab_id		alias for $1;
	v_set_id		int4;
	v_set_origin		int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

        -- ----
	-- Determine the set_id
        -- ----
	select tab_set into v_set_id from @NAMESPACE@.sl_table where tab_id = p_tab_id;

	-- ----
	-- Ensure table exists
	-- ----
	if not found then
		raise exception ''Slony-I: setDropTable_int(): table % not found'',
			p_tab_id;
	end if;

	-- ----
	-- Check that we are the origin of the set
	-- ----
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = v_set_id;
	if not found then
		raise exception ''Slony-I: setDropTable(): set % not found'', v_set_id;
	end if;
	if v_set_origin != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: setDropTable(): set % has remote origin'', v_set_id;
	end if;

	-- ----
	-- Drop the table from the set and generate the SET_ADD_TABLE event
	-- ----
	perform @NAMESPACE@.setDropTable_int(p_tab_id);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''SET_DROP_TABLE'', p_tab_id);
end;
' language plpgsql;
comment on function @NAMESPACE@.setDropTable(int4) is
'setDropTable (tab_id)

Drop table tab_id from set on origin node, and generate SET_DROP_TABLE
event to allow this to propagate to other nodes.';

-- ----------------------------------------------------------------------
-- FUNCTION setDropTable_int (tab_id)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setDropTable_int(int4)
returns int4
as '
declare
	p_tab_id		alias for $1;
	v_set_id		int4;
	v_local_node_id		int4;
	v_set_origin		int4;
	v_sub_provider		int4;
	v_tab_reloid		oid;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

        -- ----
	-- Determine the set_id
        -- ----
	select tab_set into v_set_id from @NAMESPACE@.sl_table where tab_id = p_tab_id;

	-- ----
	-- Ensure table exists
	-- ----
	if not found then
		return 0;
	end if;

	-- ----
	-- For sets with a remote origin, check that we are subscribed 
	-- to that set. Otherwise we ignore the table because it might 
	-- not even exist in our database.
	-- ----
	v_local_node_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = v_set_id;
	if not found then
		raise exception ''Slony-I: setDropTable_int(): set % not found'',
				v_set_id;
	end if;
	if v_set_origin != v_local_node_id then
		select sub_provider into v_sub_provider
				from @NAMESPACE@.sl_subscribe
				where sub_set = v_set_id
				and sub_receiver = @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
		if not found then
			return 0;
		end if;
	end if;
	
	-- ----
	-- Drop the table from sl_table and drop trigger from it.
	-- ----
	perform @NAMESPACE@.alterTableRestore(p_tab_id);
	perform @NAMESPACE@.tableDropKey(p_tab_id);
	delete from @NAMESPACE@.sl_table where tab_id = p_tab_id;
	return p_tab_id;
end;
' language plpgsql;
comment on function @NAMESPACE@.setDropTable_int(int4) is
'setDropTable_int (tab_id)

This function processes the SET_DROP_TABLE event on remote nodes,
dropping a table from replication if the remote node is subscribing to
its replication set.';

-- ----------------------------------------------------------------------
-- FUNCTION setAddSequence (set_id, seq_id, seq_fqname, seq_comment)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setAddSequence (int4, int4, text, text)
returns bigint
as '
declare
	p_set_id			alias for $1;
	p_seq_id			alias for $2;
	p_fqname			alias for $3;
	p_seq_comment		alias for $4;
	v_set_origin		int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that we are the origin of the set
	-- ----
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = p_set_id;
	if not found then
		raise exception ''Slony-I: setAddSequence(): set % not found'', p_set_id;
	end if;
	if v_set_origin != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: setAddSequence(): set % has remote origin'', p_set_id;
	end if;

	if exists (select true from @NAMESPACE@.sl_subscribe
			where sub_set = p_set_id)
	then
		raise exception ''Slony-I: cannot add sequence to currently subscribed set %'',
				p_set_id;
	end if;

	-- ----
	-- Add the sequence to the set and generate the SET_ADD_SEQUENCE event
	-- ----
	perform @NAMESPACE@.setAddSequence_int(p_set_id, p_seq_id, p_fqname,
			p_seq_comment);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''SET_ADD_SEQUENCE'',
			p_set_id, p_seq_id, p_fqname, p_seq_comment);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION setAddSequence_int (set_id, seq_id, seq_fqname, seq_comment
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setAddSequence_int(int4, int4, text, text)
returns int4
as '
declare
	p_set_id			alias for $1;
	p_seq_id			alias for $2;
	p_fqname			alias for $3;
	p_seq_comment		alias for $4;
	v_local_node_id		int4;
	v_set_origin		int4;
	v_sub_provider		int4;
	v_relkind			char;
	v_seq_reloid		oid;
	v_sync_row			record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- For sets with a remote origin, check that we are subscribed 
	-- to that set. Otherwise we ignore the sequence because it might 
	-- not even exist in our database.
	-- ----
	v_local_node_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = p_set_id;
	if not found then
		raise exception ''Slony-I: setAddSequence_int(): set % not found'',
				p_set_id;
	end if;
	if v_set_origin != v_local_node_id then
		select sub_provider into v_sub_provider
				from @NAMESPACE@.sl_subscribe
				where sub_set = p_set_id
				and sub_receiver = @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
		if not found then
			return 0;
		end if;
	end if;
	
	-- ----
	-- Get the sequences OID and check that it is a sequence
	-- ----
	select PGC.oid, PGC.relkind into v_seq_reloid, v_relkind
			from "pg_catalog".pg_class PGC, "pg_catalog".pg_namespace PGN
			where PGC.relnamespace = PGN.oid
			and p_fqname = "pg_catalog".quote_ident(PGN.nspname) ||
					''.'' || "pg_catalog".quote_ident(PGC.relname);
	if not found then
		raise exception ''Slony-I: setAddSequence_int(): sequence % not found'', 
				p_fqname;
	end if;
	if v_relkind != ''S'' then
		raise exception ''Slony-I: setAddSequence_int(): % is not a sequence'',
				p_fqname;
	end if;

	-- ----
	-- Add the sequence to sl_sequence
	-- ----
	insert into @NAMESPACE@.sl_sequence
			(seq_id, seq_reloid, seq_set, seq_comment) values
			(p_seq_id, v_seq_reloid, p_set_id, p_seq_comment);

	-- ----
	-- On the set origin, fake a sl_seqlog row for the last sync event
	-- ----
	if v_set_origin = v_local_node_id then
		for v_sync_row in select coalesce (max(ev_seqno), 0) as ev_seqno
				from @NAMESPACE@.sl_event
				where ev_origin = v_local_node_id
					and ev_type = ''SYNC''
		loop
			insert into @NAMESPACE@.sl_seqlog
					(seql_seqid, seql_origin, seql_ev_seqno, 
					seql_last_value) values
					(p_seq_id, v_local_node_id, v_sync_row.ev_seqno,
					@NAMESPACE@.sequenceLastValue(p_fqname));
		end loop;
	end if;

	return p_seq_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION setDropSequence (seq_id)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setDropSequence (int4)
returns bigint
as '
declare
	p_seq_id		alias for $1;
	v_set_id		int4;
	v_set_origin		int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Determine set id for this sequence
	-- ----
	select seq_set into v_set_id from @NAMESPACE@.sl_sequence where seq_id = p_seq_id;

	-- ----
	-- Ensure sequence exists
	-- ----
	if not found then
		raise exception ''Slony-I: setDropSequence_int(): sequence % not found'',
			p_seq_id;
	end if;

	-- ----
	-- Check that we are the origin of the set
	-- ----
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = v_set_id;
	if not found then
		raise exception ''Slony-I: setDropSequence(): set % not found'', v_set_id;
	end if;
	if v_set_origin != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: setDropSequence(): set % has remote origin'', v_set_id;
	end if;

	-- ----
	-- Add the sequence to the set and generate the SET_ADD_SEQUENCE event
	-- ----
	perform @NAMESPACE@.setDropSequence_int(p_seq_id);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''SET_DROP_SEQUENCE'',
			p_seq_id);
end;
' language plpgsql;
comment on function @NAMESPACE@.setDropSequence (int4) is
'setDropSequence (seq_id)

On the origin node for the set, drop sequence seq_id from replication
set, and raise SET_DROP_SEQUENCE to cause this to replicate to
subscriber nodes.';

-- ----------------------------------------------------------------------
-- FUNCTION setDropSequence_int (seq_id)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setDropSequence_int(int4)
returns int4
as '
declare
	p_seq_id		alias for $1;
	v_set_id		int4;
	v_local_node_id		int4;
	v_set_origin		int4;
	v_sub_provider		int4;
	v_relkind			char;
	v_sync_row			record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Determine set id for this sequence
	-- ----
	select seq_set into v_set_id from @NAMESPACE@.sl_sequence where seq_id = p_seq_id;

	-- ----
	-- Ensure sequence exists
	-- ----
	if not found then
		return 0;
	end if;

	-- ----
	-- For sets with a remote origin, check that we are subscribed 
	-- to that set. Otherwise we ignore the sequence because it might 
	-- not even exist in our database.
	-- ----
	v_local_node_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = v_set_id;
	if not found then
		raise exception ''Slony-I: setDropSequence_int(): set % not found'',
				v_set_id;
	end if;
	if v_set_origin != v_local_node_id then
		select sub_provider into v_sub_provider
				from @NAMESPACE@.sl_subscribe
				where sub_set = v_set_id
				and sub_receiver = @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
		if not found then
			return 0;
		end if;
	end if;

	-- ----
	-- drop the sequence from sl_sequence, sl_seqlog
	-- ----
	delete from @NAMESPACE@.sl_seqlog where seql_seqid = p_seq_id;
	delete from @NAMESPACE@.sl_sequence where seq_id = p_seq_id;

	return p_seq_id;
end;
' language plpgsql;
comment on function @NAMESPACE@.setDropSequence_int(int4) is
'setDropSequence_int (seq_id)

This processes the SET_DROP_SEQUENCE event.  On remote nodes that
subscribe to the set containing sequence seq_id, drop the sequence
from the replication set.';


-- ----------------------------------------------------------------------
-- FUNCTION setMoveTable (tab_id, new_set_id)
--
--	Generate the SET_MOVE_TABLE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setMoveTable (int4, int4)
returns bigint
as '
declare
	p_tab_id			alias for $1;
	p_new_set_id		alias for $2;
	v_old_set_id		int4;
	v_origin			int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Get the tables current set
	-- ----
	select tab_set into v_old_set_id from @NAMESPACE@.sl_table
			where tab_id = p_tab_id;
	if not found then
		raise exception ''Slony-I: table %d not found'', p_tab_id;
	end if;
	
	-- ----
	-- Check that both sets exist and originate here
	-- ----
	if p_new_set_id = v_old_set_id then
		raise exception ''Slony-I: set ids cannot be identical'';
	end if;
	select set_origin into v_origin from @NAMESPACE@.sl_set
			where set_id = p_new_set_id;
	if not found then
		raise exception ''Slony-I: set % not found'', p_new_set_id;
	end if;
	if v_origin != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: set % does not originate on local node'',
				p_new_set_id;
	end if;

	select set_origin into v_origin from @NAMESPACE@.sl_set
			where set_id = v_old_set_id;
	if not found then
		raise exception ''Slony-I: set % not found'', v_old_set_id;
	end if;
	if v_origin != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: set % does not originate on local node'',
				v_old_set_id;
	end if;

	-- ----
	-- Check that both sets are subscribed by the same set of nodes
	-- ----
	if exists (select true from @NAMESPACE@.sl_subscribe SUB1
				where SUB1.sub_set = p_new_set_id
				and SUB1.sub_receiver not in (select SUB2.sub_receiver
						from @NAMESPACE@.sl_subscribe SUB2
						where SUB2.sub_set = v_old_set_id))
	then
		raise exception ''Slony-I: subscriber lists of set % and % are different'',
				p_new_set_id, v_old_set_id;
	end if;

	if exists (select true from @NAMESPACE@.sl_subscribe SUB1
				where SUB1.sub_set = v_old_set_id
				and SUB1.sub_receiver not in (select SUB2.sub_receiver
						from @NAMESPACE@.sl_subscribe SUB2
						where SUB2.sub_set = p_new_set_id))
	then
		raise exception ''Slony-I: subscriber lists of set % and % are different'',
				v_old_set_id, p_new_set_id;
	end if;

	-- ----
	-- Also check that there are no unconfirmed enable subscriptions
	-- still lingering (prevents bug 896)
	-- ----
	if exists (select true from @NAMESPACE@.sl_event
				where ev_origin = v_origin
				and ev_type = ''ENABLE_SUBSCRIPTION''
				and ev_data1 = v_old_set_id
				and ev_seqno > (select min(max_con_seqno) from
					(select con_received, max(con_seqno) as max_con_seqno
							from @NAMESPACE@.sl_confirm
							where con_origin = v_origin
							group by con_received) as CON
					)
				)
	then
		raise exception ''Slony-I: table cannot be moved because of pending subscription'';
	end if;

	if exists (select true from @NAMESPACE@.sl_event
				where ev_origin = v_origin
				and ev_type = ''ENABLE_SUBSCRIPTION''
				and ev_data1 = p_new_set_id
				and ev_seqno > (select min(max_con_seqno) from
					(select con_received, max(con_seqno) as max_con_seqno
							from @NAMESPACE@.sl_confirm
							where con_origin = v_origin
							group by con_received) as CON
					)
				)
	then
		raise exception ''Slony-I: table cannot be moved because of pending subscription'';
	end if;

	-- ----
	-- Change the set the table belongs to
	-- ----
	perform @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''SYNC'', NULL);
	perform @NAMESPACE@.setMoveTable_int(p_tab_id, p_new_set_id);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''SET_MOVE_TABLE'', 
			p_tab_id, p_new_set_id);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION setMoveTable_int (tab_id, new_set_id)
--
--	Process the SET_MOVE_TABLE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setMoveTable_int (int4, int4)
returns int4
as '
declare
	p_tab_id			alias for $1;
	p_new_set_id		alias for $2;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;
	
	-- ----
	-- Move the table to the new set
	-- ----
	update @NAMESPACE@.sl_table
			set tab_set = p_new_set_id
			where tab_id = p_tab_id;

	return p_tab_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION setMoveSequence (seq_id, new_set_id)
--
--	Generate the SET_MOVE_SEQUENCE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setMoveSequence (int4, int4)
returns bigint
as '
declare
	p_seq_id			alias for $1;
	p_new_set_id		alias for $2;
	v_old_set_id		int4;
	v_origin			int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Get the sequences current set
	-- ----
	select seq_set into v_old_set_id from @NAMESPACE@.sl_sequence
			where seq_id = p_seq_id;
	if not found then
		raise exception ''Slony-I: sequence %d not found'', p_seq_id;
	end if;
	
	-- ----
	-- Check that both sets exist and originate here
	-- ----
	if p_new_set_id = v_old_set_id then
		raise exception ''Slony-I: set ids cannot be identical'';
	end if;
	select set_origin into v_origin from @NAMESPACE@.sl_set
			where set_id = p_new_set_id;
	if not found then
		raise exception ''Slony-I: set % not found'', p_new_set_id;
	end if;
	if v_origin != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: set % does not originate on local node'',
				p_new_set_id;
	end if;

	select set_origin into v_origin from @NAMESPACE@.sl_set
			where set_id = v_old_set_id;
	if not found then
		raise exception ''Slony-I: set % not found'', v_old_set_id;
	end if;
	if v_origin != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: set % does not originate on local node'',
				v_old_set_id;
	end if;

	-- ----
	-- Check that both sets are subscribed by the same set of nodes
	-- ----
	if exists (select true from @NAMESPACE@.sl_subscribe SUB1
				where SUB1.sub_set = p_new_set_id
				and SUB1.sub_receiver not in (select SUB2.sub_receiver
						from @NAMESPACE@.sl_subscribe SUB2
						where SUB2.sub_set = v_old_set_id))
	then
		raise exception ''Slony-I: subscriber lists of set % and % are different'',
				p_new_set_id, v_old_set_id;
	end if;

	if exists (select true from @NAMESPACE@.sl_subscribe SUB1
				where SUB1.sub_set = v_old_set_id
				and SUB1.sub_receiver not in (select SUB2.sub_receiver
						from @NAMESPACE@.sl_subscribe SUB2
						where SUB2.sub_set = p_new_set_id))
	then
		raise exception ''Slony-I: subscriber lists of set % and % are different'',
				v_old_set_id, p_new_set_id;
	end if;

	-- ----
	-- Also check that there are no unconfirmed enable subscriptions
	-- still lingering (prevents bug 896)
	-- ----
	if exists (select true from @NAMESPACE@.sl_event
				where ev_origin = v_origin
				and ev_type = ''ENABLE_SUBSCRIPTION''
				and ev_data1 = v_old_set_id
				and ev_seqno > (select min(max_con_seqno) from
					(select con_received, max(con_seqno) as max_con_seqno
							from @NAMESPACE@.sl_confirm
							where con_origin = v_origin
							group by con_received) as CON
					)
				)
	then
		raise exception ''Slony-I: sequence cannot be moved because of pending subscription'';
	end if;

	if exists (select true from @NAMESPACE@.sl_event
				where ev_origin = v_origin
				and ev_type = ''ENABLE_SUBSCRIPTION''
				and ev_data1 = p_new_set_id
				and ev_seqno > (select min(max_con_seqno) from
					(select con_received, max(con_seqno) as max_con_seqno
							from @NAMESPACE@.sl_confirm
							where con_origin = v_origin
							group by con_received) as CON
					)
				)
	then
		raise exception ''Slony-I: sequence cannot be moved because of pending subscription'';
	end if;

	-- ----
	-- Change the set the sequence belongs to
	-- ----
	perform @NAMESPACE@.setMoveSequence_int(p_seq_id, p_new_set_id);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''SET_MOVE_SEQUENCE'', 
			p_seq_id, p_new_set_id);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION setMoveSequence_int (seq_id, new_set_id)
--
--	Process the SET_MOVE_SEQUENCE event.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.setMoveSequence_int (int4, int4)
returns int4
as '
declare
	p_seq_id			alias for $1;
	p_new_set_id		alias for $2;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;
	
	-- ----
	-- Move the sequence to the new set
	-- ----
	update @NAMESPACE@.sl_sequence
			set seq_set = p_new_set_id
			where seq_id = p_seq_id;

	return p_seq_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION sequenceSetValue (seq_id, seq_origin, ev_seqno, last_value)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.sequenceSetValue(int4, int4, int8, int8) returns int4
as '
declare
	p_seq_id			alias for $1;
	p_seq_origin		alias for $2;
	p_ev_seqno			alias for $3;
	p_last_value		alias for $4;
	v_fqname			text;
begin
	-- ----
	-- Get the sequences fully qualified name
	-- ----
	select "pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
			"pg_catalog".quote_ident(PGC.relname) into v_fqname
		from @NAMESPACE@.sl_sequence SQ,
			"pg_catalog".pg_class PGC, "pg_catalog".pg_namespace PGN
		where SQ.seq_id = p_seq_id
			and SQ.seq_reloid = PGC.oid
			and PGC.relnamespace = PGN.oid;
	if not found then
		raise exception ''Slony-I: sequence % not found'', p_seq_id;
	end if;

	-- ----
	-- Update it to the new value
	-- ----
	execute ''select setval('''''' || v_fqname ||
			'''''', '''''' || p_last_value || '''''')'';

	insert into @NAMESPACE@.sl_seqlog
			(seql_seqid, seql_origin, seql_ev_seqno, seql_last_value)
			values (p_seq_id, p_seq_origin, p_ev_seqno, p_last_value);

	return p_seq_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION storeTrigger (trig_tabid, trig_tgname)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.storeTrigger (int4, name)
returns bigint
as '
declare
	p_trig_tabid		alias for $1;
	p_trig_tgname		alias for $2;
begin
	perform @NAMESPACE@.storeTrigger_int(p_trig_tabid, p_trig_tgname);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''STORE_TRIGGER'',
			p_trig_tabid, p_trig_tgname);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION storeTrigger_int (trig_tabid, trig_tgname)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.storeTrigger_int (int4, name)
returns int4
as '
declare
	p_trig_tabid		alias for $1;
	p_trig_tgname		alias for $2;
	v_tab_altered		boolean;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Get the current table status (altered or not)
	-- ----
	select tab_altered into v_tab_altered
			from @NAMESPACE@.sl_table where tab_id = p_trig_tabid;
	if not found then
		-- ----
		-- Not found is no hard error here, because that might
		-- mean that we are not subscribed to that set
		-- ----
		return 0;
	end if;

	-- ----
	-- If the table is modified for replication, restore the original state
	-- ----
	if v_tab_altered then
		perform @NAMESPACE@.alterTableRestore(p_trig_tabid);
	end if;

	-- ----
	-- Make sure that an entry for this trigger exists
	-- ----
	delete from @NAMESPACE@.sl_trigger
			where trig_tabid = p_trig_tabid
			  and trig_tgname = p_trig_tgname;
	insert into @NAMESPACE@.sl_trigger (
				trig_tabid, trig_tgname
			) values (
				p_trig_tabid, p_trig_tgname
			);

	-- ----
	-- Put the table back into replicated state if it was
	-- ----
	if v_tab_altered then
		perform @NAMESPACE@.alterTableForReplication(p_trig_tabid);
	end if;

	return p_trig_tabid;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION dropTrigger (trig_tabid, trig_tgname)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.dropTrigger (int4, name)
returns bigint
as '
declare
	p_trig_tabid		alias for $1;
	p_trig_tgname		alias for $2;
begin
	perform @NAMESPACE@.dropTrigger_int(p_trig_tabid, p_trig_tgname);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''DROP_TRIGGER'',
			p_trig_tabid, p_trig_tgname);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION dropTrigger_int (trig_tabid, trig_tgname)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.dropTrigger_int (int4, name)
returns int4
as '
declare
	p_trig_tabid		alias for $1;
	p_trig_tgname		alias for $2;
	v_tab_altered		boolean;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Get the current table status (altered or not)
	-- ----
	select tab_altered into v_tab_altered
			from @NAMESPACE@.sl_table where tab_id = p_trig_tabid;
	if not found then
		-- ----
		-- Not found is no hard error here, because that might
		-- mean that we are not subscribed to that set
		-- ----
		return 0;
	end if;

	-- ----
	-- If the table is modified for replication, restore the original state
	-- ----
	if v_tab_altered then
		perform @NAMESPACE@.alterTableRestore(p_trig_tabid);
	end if;

	-- ----
	-- Remove the entry from sl_trigger
	-- ----
	delete from @NAMESPACE@.sl_trigger
			where trig_tabid = p_trig_tabid
			  and trig_tgname = p_trig_tgname;

	-- ----
	-- Put the table back into replicated state if it was
	-- ----
	if v_tab_altered then
		perform @NAMESPACE@.alterTableForReplication(p_trig_tabid);
	end if;

	return p_trig_tabid;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION ddlScript (set_id, script)
--
--	Generate the DDL_SCRIPT event
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.ddlScript (int4, text)
returns bigint
as '
declare
	p_set_id			alias for $1;
	p_script			alias for $2;
	v_set_origin		int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that the set exists and originates here
	-- ----
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = p_set_id
			for update;
	if not found then
		raise exception ''Slony-I: set % not found'', p_set_id;
	end if;
	if v_set_origin <> @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: set % does not originate on local node'',
				p_set_id;
	end if;

	-- ----
	-- Create a SYNC event, run the script and generate the DDL_SCRIPT event
	-- ----
	perform @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''SYNC'', NULL);
	perform @NAMESPACE@.ddlScript_int(p_set_id, p_script);
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''DDL_SCRIPT'', 
			p_set_id, p_script);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION ddlScript_int (set_id, script)
--
--	Process the DDL_SCRIPT event
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.ddlScript_int (int4, text)
returns int4
as '
declare
	p_set_id			alias for $1;
	p_script			alias for $2;
	v_set_origin		int4;
	v_no_id				int4;
	v_row				record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that we either are the set origin or a current
	-- subscriber of the set.
	-- ----
	v_no_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = p_set_id
			for update;
	if not found then
		raise exception ''Slony-I: set % not found'', p_set_id;
	end if;
	if v_set_origin <> v_no_id
			and not exists (select 1 from @NAMESPACE@.sl_subscribe
						where sub_set = p_set_id
						and sub_receiver = v_no_id)
	then
		return 0;
	end if;

	-- ----
	-- Restore all original triggers and rules
	-- ----
	for v_row in select * from @NAMESPACE@.sl_table
			where tab_set = p_set_id
	loop
		perform @NAMESPACE@.alterTableRestore(v_row.tab_id);
	end loop;

	-- ----
	-- Run the script
	-- ----
	execute p_script;

	-- ----
	-- Put all tables back into replicated mode
	-- ----
	for v_row in select * from @NAMESPACE@.sl_table
			where tab_set = p_set_id
	loop
		perform @NAMESPACE@.alterTableForReplication(v_row.tab_id);
	end loop;

	return p_set_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION alterTableForReplication (tab_id)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.alterTableForReplication (int4)
returns int4
as '
declare
	p_tab_id			alias for $1;
	v_no_id				int4;
	v_tab_row			record;
	v_tab_fqname		text;
	v_tab_attkind		text;
	v_n					int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Get our local node ID
	-- ----
	v_no_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');

	-- ----
	-- Get the sl_table row and the current tables origin. Check
	-- that the table currently is NOT in altered state.
	-- ----
	select T.tab_reloid, T.tab_set, T.tab_idxname, T.tab_altered,
			S.set_origin, PGX.indexrelid,
			"pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
			"pg_catalog".quote_ident(PGC.relname) as tab_fqname
			into v_tab_row
			from @NAMESPACE@.sl_table T, @NAMESPACE@.sl_set S,
				"pg_catalog".pg_class PGC, "pg_catalog".pg_namespace PGN,
				"pg_catalog".pg_index PGX, "pg_catalog".pg_class PGXC
			where T.tab_id = p_tab_id
				and T.tab_set = S.set_id
				and T.tab_reloid = PGC.oid
				and PGC.relnamespace = PGN.oid
				and PGX.indrelid = T.tab_reloid
				and PGX.indexrelid = PGXC.oid
				and PGXC.relname = T.tab_idxname
				for update;
	if not found then
		raise exception ''Slony-I: Table with id % not found'', p_tab_id;
	end if;
	v_tab_fqname = v_tab_row.tab_fqname;
	if v_tab_row.tab_altered then
		raise exception ''Slony-I: Table % is already in altered state'',
				v_tab_fqname;
	end if;

	v_tab_attkind := @NAMESPACE@.determineAttKindUnique(v_tab_row.tab_fqname, 
						v_tab_row.tab_idxname);

	execute ''lock table '' || v_tab_fqname || '' in access exclusive mode'';

	-- ----
	-- Procedures are different on origin and subscriber
	-- ----
	if v_no_id = v_tab_row.set_origin then
		-- ----
		-- On the Origin we add the log trigger to the table and done
		-- ----
		execute ''create trigger "_@CLUSTERNAME@_logtrigger_'' || 
				p_tab_id || ''" after insert or update or delete on '' ||
				v_tab_fqname || '' for each row execute procedure
				@NAMESPACE@.logTrigger (''''_@CLUSTERNAME@'''', '''''' || 
					p_tab_id || '''''', '''''' || 
					v_tab_attkind || '''''');'';
	else
		-- ----
		-- On the subscriber the thing is a bit more difficult. We want
		-- to disable all user- and foreign key triggers and rules.
		-- ----


		-- ----
		-- Disable all existing triggers
		-- ----
		update "pg_catalog".pg_trigger
				set tgrelid = v_tab_row.indexrelid
				where tgrelid = v_tab_row.tab_reloid
				and not exists (
						select true from @NAMESPACE@.sl_table TAB,
								@NAMESPACE@.sl_trigger TRIG
								where TAB.tab_reloid = tgrelid
								and TAB.tab_id = TRIG.trig_tabid
								and TRIG.trig_tgname = tgname
					);
		get diagnostics v_n = row_count;
		if v_n > 0 then
			update "pg_catalog".pg_class
					set reltriggers = reltriggers - v_n
					where oid = v_tab_row.tab_reloid;
		end if;

		-- ----
		-- Disable all existing rules
		-- ----
		update "pg_catalog".pg_rewrite
				set ev_class = v_tab_row.indexrelid
				where ev_class = v_tab_row.tab_reloid;
		get diagnostics v_n = row_count;
		if v_n > 0 then
			update "pg_catalog".pg_class
					set relhasrules = false
					where oid = v_tab_row.tab_reloid;
		end if;

		-- ----
		-- Add the trigger that denies write access to replicated tables
		-- ----
		execute ''create trigger "_@CLUSTERNAME@_denyaccess_'' || 
				p_tab_id || ''" before insert or update or delete on '' ||
				v_tab_fqname || '' for each row execute procedure
				@NAMESPACE@.denyAccess (''''_@CLUSTERNAME@'''');'';
	end if;

	-- ----
	-- Mark the table altered in our configuration
	-- ----
	update @NAMESPACE@.sl_table
			set tab_altered = true where tab_id = p_tab_id;

	return p_tab_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION alterTableRestore (tab_id)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.alterTableRestore (int4)
returns int4
as '
declare
	p_tab_id			alias for $1;
	v_no_id				int4;
	v_tab_row			record;
	v_tab_fqname		text;
	v_n					int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Get our local node ID
	-- ----
	v_no_id := @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'');

	-- ----
	-- Get the sl_table row and the current tables origin. Check
	-- that the table currently IS in altered state.
	-- ----
	select T.tab_reloid, T.tab_set, T.tab_altered,
			S.set_origin, PGX.indexrelid,
			"pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
			"pg_catalog".quote_ident(PGC.relname) as tab_fqname
			into v_tab_row
			from @NAMESPACE@.sl_table T, @NAMESPACE@.sl_set S,
				"pg_catalog".pg_class PGC, "pg_catalog".pg_namespace PGN,
				"pg_catalog".pg_index PGX, "pg_catalog".pg_class PGXC
			where T.tab_id = p_tab_id
				and T.tab_set = S.set_id
				and T.tab_reloid = PGC.oid
				and PGC.relnamespace = PGN.oid
				and PGX.indrelid = T.tab_reloid
				and PGX.indexrelid = PGXC.oid
				and PGXC.relname = T.tab_idxname
				for update;
	if not found then
		raise exception ''Slony-I: Table with id % not found'', p_tab_id;
	end if;
	v_tab_fqname = v_tab_row.tab_fqname;
	if not v_tab_row.tab_altered then
		raise exception ''Slony-I: Table % is not in altered state'',
				v_tab_fqname;
	end if;

	execute ''lock table '' || v_tab_fqname || '' in access exclusive mode'';

	-- ----
	-- Procedures are different on origin and subscriber
	-- ----
	if v_no_id = v_tab_row.set_origin then
		-- ----
		-- On the Origin we just drop the trigger we originally added
		-- ----
		execute ''drop trigger "_@CLUSTERNAME@_logtrigger_'' || 
				p_tab_id || ''" on '' || v_tab_fqname;
	else
		-- ----
		-- On the subscriber drop the denyAccess trigger
		-- ----
		execute ''drop trigger "_@CLUSTERNAME@_denyaccess_'' || 
				p_tab_id || ''" on '' || v_tab_fqname;
				
		-- ----
		-- Restore all original triggers
		-- ----
		update "pg_catalog".pg_trigger
				set tgrelid = v_tab_row.tab_reloid
				where tgrelid = v_tab_row.indexrelid;
		get diagnostics v_n = row_count;
		if v_n > 0 then
			update "pg_catalog".pg_class
					set reltriggers = reltriggers + v_n
					where oid = v_tab_row.tab_reloid;
		end if;

		-- ----
		-- Restore all original rewrite rules
		-- ----
		update "pg_catalog".pg_rewrite
				set ev_class = v_tab_row.tab_reloid
				where ev_class = v_tab_row.indexrelid;
		get diagnostics v_n = row_count;
		if v_n > 0 then
			update "pg_catalog".pg_class
					set relhasrules = true
					where oid = v_tab_row.tab_reloid;
		end if;

	end if;

	-- ----
	-- Mark the table not altered in our configuration
	-- ----
	update @NAMESPACE@.sl_table
			set tab_altered = false where tab_id = p_tab_id;

	return p_tab_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION subscribeSet (sub_set, sub_provider, sub_receiver, sub_forward)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.subscribeSet (int4, int4, int4, bool)
returns bigint
as '
declare
	p_sub_set			alias for $1;
	p_sub_provider		alias for $2;
	p_sub_receiver		alias for $3;
	p_sub_forward		alias for $4;
	v_set_origin		int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that this is called on the receiver node
	-- ----
	if p_sub_receiver != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: subscribeSet() must be called on receiver'';
	end if;

	-- ----
	-- Check that the origin and provider of the set are remote
	-- ----
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = p_sub_set;
	if not found then
		raise exception ''Slony-I: set % not found'', p_sub_set;
	end if;
	if v_set_origin = p_sub_receiver then
		raise exception 
				''Slony-I: set origin and receiver cannot be identical'';
	end if;
	if p_sub_receiver = p_sub_provider then
		raise exception 
				''Slony-I: set provider and receiver cannot be identical'';
	end if;

	-- ----
	-- Call the internal procedure to store the subscription
	-- ----
	perform @NAMESPACE@.subscribeSet_int(p_sub_set, p_sub_provider,
			p_sub_receiver, p_sub_forward);

	-- ----
	-- Create the SUBSCRIBE_SET event
	-- ----
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''SUBSCRIBE_SET'', 
			p_sub_set, p_sub_provider, p_sub_receiver, 
			case p_sub_forward when true then ''t'' else ''f'' end);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION subscribeSet_int (sub_set, sub_provider, sub_receiver, sub_forward)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.subscribeSet_int (int4, int4, int4, bool)
returns int4
as '
declare
	p_sub_set			alias for $1;
	p_sub_provider		alias for $2;
	p_sub_receiver		alias for $3;
	p_sub_forward		alias for $4;
	v_set_origin		int4;
	v_sub_row			record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Provider change is only allowed for active sets
	-- ----
	if p_sub_receiver = @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		select sub_active into v_sub_row from @NAMESPACE@.sl_subscribe
				where sub_set = p_sub_set
				and sub_receiver = p_sub_receiver;
		if found then
			if not v_sub_row.sub_active then
				raise exception ''Slony-I: set % is not active, cannot change provider'',
						p_sub_set;
			end if;
		end if;
	end if;

	-- ----
	-- Try to change provider and/or forward for an existing subscription
	-- ----
	update @NAMESPACE@.sl_subscribe
			set sub_provider = p_sub_provider,
				sub_forward = p_sub_forward
			where sub_set = p_sub_set
			and sub_receiver = p_sub_receiver;
	if found then
		return p_sub_set;
	end if;

	-- ----
	-- Not found, insert a new one
	-- ----
	if not exists (select true from @NAMESPACE@.sl_path
			where pa_server = p_sub_provider
			and pa_client = p_sub_receiver)
	then
		insert into @NAMESPACE@.sl_path
				(pa_server, pa_client, pa_conninfo, pa_connretry)
				values 
				(p_sub_provider, p_sub_receiver, 
				''<event pending>'', 10);
	end if;
	insert into @NAMESPACE@.sl_subscribe
			(sub_set, sub_provider, sub_receiver, sub_forward, sub_active)
			values (p_sub_set, p_sub_provider, p_sub_receiver,
				p_sub_forward, false);

	-- ----
	-- If the set origin is here, then enable the subscription
	-- ----
	select set_origin into v_set_origin
			from @NAMESPACE@.sl_set
			where set_id = p_sub_set;
	if not found then
		raise exception ''Slony-I: set % not found'', p_sub_set;
	end if;

	if v_set_origin = @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		perform @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''ENABLE_SUBSCRIPTION'', 
				p_sub_set, p_sub_provider, p_sub_receiver, 
				case p_sub_forward when true then ''t'' else ''f'' end);
		perform @NAMESPACE@.enableSubscription(p_sub_set, 
				p_sub_provider, p_sub_receiver);
	end if;

	return p_sub_set;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION unsubscribeSet (sub_set, sub_receiver)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.unsubscribeSet (int4, int4)
returns bigint
as '
declare
	p_sub_set			alias for $1;
	p_sub_receiver		alias for $2;
	v_tab_row			record;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Check that this is called on the receiver node
	-- ----
	if p_sub_receiver != @NAMESPACE@.getLocalNodeId(''_@CLUSTERNAME@'') then
		raise exception ''Slony-I: unsubscribeSet() must be called on receiver'';
	end if;

	-- ----
	-- Check that this does not break any chains
	-- ----
	if exists (select true from @NAMESPACE@.sl_subscribe
			where sub_set = p_sub_set
				and sub_provider = p_sub_receiver)
	then
		raise exception ''Slony-I: Cannot unsubscibe set % while being provider'',
				p_sub_set;
	end if;

	-- ----
	-- Restore all tables original triggers and rules and remove
	-- our replication stuff.
	-- ----
	for v_tab_row in select tab_id from @NAMESPACE@.sl_table
			where tab_set = p_sub_set
			order by tab_id
	loop
		perform @NAMESPACE@.alterTableRestore(v_tab_row.tab_id);
		perform @NAMESPACE@.tableDropKey(v_tab_row.tab_id);
	end loop;

	-- ----
	-- Remove the setsync status. This will also cause the
	-- worker thread to ignore the set and stop replicating
	-- right now.
	-- ----
	delete from @NAMESPACE@.sl_setsync
			where ssy_setid = p_sub_set;

	-- ----
	-- Remove all sl_table and sl_sequence entries for this set.
	-- Should we ever subscribe again, the initial data
	-- copy process will create new ones.
	-- ----
	delete from @NAMESPACE@.sl_table
			where tab_set = p_sub_set;
	delete from @NAMESPACE@.sl_sequence
			where seq_set = p_sub_set;

	-- ----
	-- Call the internal procedure to drop the subscription
	-- ----
	perform @NAMESPACE@.unsubscribeSet_int(p_sub_set, p_sub_receiver);

	-- ----
	-- Create the UNSUBSCRIBE_SET event
	-- ----
	return  @NAMESPACE@.createEvent(''_@CLUSTERNAME@'', ''UNSUBSCRIBE_SET'', 
			p_sub_set, p_sub_receiver);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION unsubscribeSet_int (sub_set, sub_receiver)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.unsubscribeSet_int (int4, int4)
returns int4
as '
declare
	p_sub_set			alias for $1;
	p_sub_receiver		alias for $2;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- All the real work is done before event generation on the
	-- subscriber.
	-- ----
	delete from @NAMESPACE@.sl_subscribe
			where sub_set = p_sub_set
				and sub_receiver = p_sub_receiver;

	return p_sub_set;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION enableSubscription (sub_set, sub_provider, sub_receiver)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.enableSubscription (int4, int4, int4)
returns int4
as '
declare
	p_sub_set			alias for $1;
	p_sub_provider		alias for $2;
	p_sub_receiver		alias for $3;
begin
	return  @NAMESPACE@.enableSubscription_int (p_sub_set, 
			p_sub_provider, p_sub_receiver);
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION enableSubscription_int (sub_set, sub_provider, sub_receiver)
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.enableSubscription_int (int4, int4, int4)
returns int4
as '
declare
	p_sub_set			alias for $1;
	p_sub_provider		alias for $2;
	p_sub_receiver		alias for $3;
	v_n					int4;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- The real work is done in the replication engine. All
	-- we have to do here is remembering that it happened.
	-- ----
	update @NAMESPACE@.sl_subscribe
			set sub_active = ''t''
			where sub_set = p_sub_set
			and sub_receiver = p_sub_receiver;
	get diagnostics v_n = row_count;
	if v_n = 0 then
		insert into @NAMESPACE@.sl_subscribe
				(sub_set, sub_provider, sub_receiver,
				sub_forward, sub_active)
				values
				(p_sub_set, p_sub_provider, p_sub_receiver,
				false, true);
	end if;

	return p_sub_set;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION forwardConfirm ()
--
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.forwardConfirm (int4, int4, int8, timestamp)
returns bigint
as '
declare
	p_con_origin	alias for $1;
	p_con_received	alias for $2;
	p_con_seqno		alias for $3;
	p_con_timestamp	alias for $4;
	v_max_seqno		bigint;
begin
	select into v_max_seqno coalesce(max(con_seqno), 0)
			from @NAMESPACE@.sl_confirm
			where con_origin = p_con_origin
			and con_received = p_con_received;
	if v_max_seqno < p_con_seqno then
		insert into @NAMESPACE@.sl_confirm 
				(con_origin, con_received, con_seqno, con_timestamp)
				values (p_con_origin, p_con_received, p_con_seqno,
					p_con_timestamp);
		notify "_@CLUSTERNAME@_Confirm";
		v_max_seqno = p_con_seqno;
	end if;

	return v_max_seqno;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION cleanupEvent ()
--
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.cleanupEvent ()
returns int4
as '
declare
	v_max_row	record;
	v_min_row	record;
	v_max_sync	int8;
begin
	-- ----
	-- First remove all but the oldest confirm row per origin,receiver pair
	-- ----
	delete from @NAMESPACE@.sl_confirm
				where con_origin not in (select no_id from @NAMESPACE@.sl_node);
	delete from @NAMESPACE@.sl_confirm
				where con_received not in (select no_id from @NAMESPACE@.sl_node);
	-- ----
	-- Next remove all but the oldest confirm row per origin,receiver pair.
	-- Ignore confirmations that are younger than 10 minutes. We currently
	-- have an not confirmed suspicion that a possibly lost transaction due
	-- to a server crash might have been visible to another session, and
	-- that this led to log data that is needed again got removed.
	-- ----
	for v_max_row in select con_origin, con_received, max(con_seqno) as con_seqno
				from @NAMESPACE@.sl_confirm
				where con_timestamp < (CURRENT_TIMESTAMP - ''10 min''::interval)
				group by con_origin, con_received
	loop
		delete from @NAMESPACE@.sl_confirm
				where con_origin = v_max_row.con_origin
				and con_received = v_max_row.con_received
				and con_seqno < v_max_row.con_seqno;
	end loop;

	-- ----
	-- Then remove all events that are confirmed by all nodes in the
	-- whole cluster up to the last SYNC
	-- ----
	for v_min_row in select con_origin, min(con_seqno) as con_seqno
				from @NAMESPACE@.sl_confirm
				group by con_origin
	loop
		select coalesce(max(ev_seqno), 0) into v_max_sync
				from @NAMESPACE@.sl_event
				where ev_origin = v_min_row.con_origin
				and ev_seqno <= v_min_row.con_seqno
				and ev_type = ''SYNC'';
		if v_max_sync > 0 then
			delete from @NAMESPACE@.sl_event
					where ev_origin = v_min_row.con_origin
					and ev_seqno < v_max_sync;
		end if;
	end loop;

	return 0;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION tableAddKey (tab_fqname)
--
--	If the specified table does not have a column 
--	"_Slony-I_<clustername>_rowID", then add it as a bigint
--	with default nextval('"_<clustername>".sl_rowid_seq').
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.tableAddKey(text) returns text
as '
declare
	p_tab_fqname	alias for $1;
	v_attkind		text default '''';
	v_attrow		record;
	v_have_serial	bool default ''f'';
begin
	--
	-- Loop over the attributes of this relation
	-- and add a "v" for every user column, and a "k"
	-- if we find the Slony-I special serial column.
	--
	for v_attrow in select PGA.attnum, PGA.attname
			from "pg_catalog".pg_class PGC,
			    "pg_catalog".pg_namespace PGN,
				"pg_catalog".pg_attribute PGA
			where "pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
			    "pg_catalog".quote_ident(PGC.relname) = p_tab_fqname
				and PGN.oid = PGC.relnamespace
				and PGA.attrelid = PGC.oid
				and not PGA.attisdropped
				and PGA.attnum > 0
			order by attnum
	loop
		if v_attrow.attname = ''_Slony-I_@CLUSTERNAME@_rowID'' then
		    v_attkind := v_attkind || ''k'';
			v_have_serial := ''t'';
		else
			v_attkind := v_attkind || ''v'';
		end if;
	end loop;
	
	--
	-- A table must have at least one attribute, so not finding
	-- anything means the table does not exist.
	--
	if not found then
		raise exception ''Slony-I: table % not found'', p_tab_fqname;
	end if;

	--
	-- If it does not have the special serial column, we
	-- have to add it. This will be only half way done.
	-- The function to add the table to the set must finish
	-- these definitions with NOT NULL and UNIQUE after
	-- updating all existing rows.
	--
	if not v_have_serial then
		execute ''lock table '' || p_tab_fqname ||
			'' in access exclusive mode'';
		execute ''alter table only '' || p_tab_fqname ||
			'' add column "_Slony-I_@CLUSTERNAME@_rowID" bigint;'';
		execute ''alter table only '' || p_tab_fqname ||
			'' alter column "_Slony-I_@CLUSTERNAME@_rowID" '' ||
			'' set default "pg_catalog".nextval(''''@NAMESPACE@.sl_rowid_seq'''');'';

		v_attkind := v_attkind || ''k'';
	end if;

	--
	-- Return the resulting Slony-I attkind
	--
	return v_attkind;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION tableDropKey (tab_id)
--
--	If the specified table does not have a column 
--	"_Slony-I_<clustername>_rowID", then add it as a bigint
--	with default nextval('"_<clustername>".sl_rowid_seq').
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.tableDropKey(int4) returns int4
as '
declare
	p_tab_id		alias for $1;
	v_tab_fqname	text;
	v_tab_oid		oid;
begin
	-- ----
	-- Grab the central configuration lock
	-- ----
	lock table @NAMESPACE@.sl_config_lock;

	-- ----
	-- Construct the tables fully qualified name and get its oid
	-- ----
	select "pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
				"pg_catalog".quote_ident(PGC.relname),
				PGC.oid into v_tab_fqname, v_tab_oid
			from @NAMESPACE@.sl_table T,
				"pg_catalog".pg_class PGC,
				"pg_catalog".pg_namespace PGN
			where T.tab_id = p_tab_id
				and T.tab_reloid = PGC.oid
				and PGC.relnamespace = PGN.oid;
	if not found then
		raise exception ''Slony-I: table with ID % not found'', p_tab_id;
	end if;

	-- ----
	-- Drop the special serial ID column if the table has it
	-- ----
	if exists (select true from "pg_catalog".pg_attribute
			where attrelid = v_tab_oid
				and attname = ''_Slony-I_@CLUSTERNAME@_rowID'')
	then
		execute ''lock table '' || v_tab_fqname ||
				'' in access exclusive mode'';
		execute ''alter table '' || v_tab_fqname ||
				'' drop column "_Slony-I_@CLUSTERNAME@_rowID"'';
	end if;

	return p_tab_id;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION determineIdxnameUnique (tab_fqname, indexname)
--
--	Given a tablename, check that a unique index exists or return
--	the tables primary key index name.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.determineIdxnameUnique(text, name) returns name
as '
declare
	p_tab_fqname	alias for $1;
	p_idx_name		alias for $2;
	v_idxrow		record;
begin
	--
	-- Lookup the tables primary key or the specified unique index
	--
	if p_idx_name isnull then
		select PGXC.relname
				into v_idxrow
				from "pg_catalog".pg_class PGC,
					"pg_catalog".pg_namespace PGN,
					"pg_catalog".pg_index PGX,
					"pg_catalog".pg_class PGXC
				where "pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
					"pg_catalog".quote_ident(PGC.relname) = p_tab_fqname
					and PGN.oid = PGC.relnamespace
					and PGX.indrelid = PGC.oid
					and PGX.indexrelid = PGXC.oid
					and PGX.indisprimary;
		if not found then
			raise exception ''Slony-I: table % has no primary key'',
					p_tab_fqname;
		end if;
	else
		select PGXC.relname
				into v_idxrow
				from "pg_catalog".pg_class PGC,
					"pg_catalog".pg_namespace PGN,
					"pg_catalog".pg_index PGX,
					"pg_catalog".pg_class PGXC
				where "pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
					"pg_catalog".quote_ident(PGC.relname) = p_tab_fqname
					and PGN.oid = PGC.relnamespace
					and PGX.indrelid = PGC.oid
					and PGX.indexrelid = PGXC.oid
					and PGX.indisunique
					and PGXC.relname = p_idx_name;
		if not found then
			raise exception ''Slony-I: table % has no unique index %'',
					p_tab_fqname, p_idx_name;
		end if;
	end if;

	--
	-- Return the found index name
	--
	return v_idxrow.relname;
end;
' language plpgsql called on null input;


-- ----------------------------------------------------------------------
-- FUNCTION determineIdxnameSerial (tab_fqname)
--
--	Given a tablename, construct the serial columns index name
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.determineIdxnameSerial(text) returns name
as '
declare
	p_tab_fqname	alias for $1;
	v_row			record;
begin
	--
	-- Lookup the table name alone
	--
	select PGC.relname
			into v_row
			from "pg_catalog".pg_class PGC,
				"pg_catalog".pg_namespace PGN
			where "pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
				"pg_catalog".quote_ident(PGC.relname) = p_tab_fqname
				and PGN.oid = PGC.relnamespace;
	if not found then
		raise exception ''Slony-I: table % not found'',
				p_tab_fqname;
	end if;

	--
	-- Return the found index name
	--
	return v_row.relname || ''__Slony-I_@CLUSTERNAME@_rowID_key'';
end;
' language plpgsql called on null input;


-- ----------------------------------------------------------------------
-- FUNCTION determineAttKindUnique (tab_fqname, indexname)
--
--	Given a tablename, return the Slony-I specific attkind (used for
--	the log trigger) of the table. Use the specified unique index or
--	the primary key (if indexname is NULL).
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.determineAttkindUnique(text, name) returns text
as '
declare
	p_tab_fqname	alias for $1;
	p_idx_name		alias for $2;
	v_idxrow		record;
	v_attrow		record;
	v_i				integer;
	v_attno			int2;
	v_attkind		text default '''';
	v_attfound		bool;
begin
	--
	-- Lookup the tables primary key or the specified unique index
	--
	if p_idx_name isnull then
		raise exception ''Slony-I: index name must be specified'';
	else
		select PGXC.relname, PGX.indexrelid, PGX.indkey
				into v_idxrow
				from "pg_catalog".pg_class PGC,
					"pg_catalog".pg_namespace PGN,
					"pg_catalog".pg_index PGX,
					"pg_catalog".pg_class PGXC
				where "pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
					"pg_catalog".quote_ident(PGC.relname) = p_tab_fqname
					and PGN.oid = PGC.relnamespace
					and PGX.indrelid = PGC.oid
					and PGX.indexrelid = PGXC.oid
					and PGX.indisunique
					and PGXC.relname = p_idx_name;
		if not found then
			raise exception ''Slony-I: table % has no unique index %'',
					p_tab_fqname, p_idx_name;
		end if;
	end if;

	--
	-- Loop over the tables attributes and check if they are
	-- index attributes. If so, add a "k" to the return value,
	-- otherwise add a "v".
	--
	for v_attrow in select PGA.attnum, PGA.attname
			from "pg_catalog".pg_class PGC,
			    "pg_catalog".pg_namespace PGN,
				"pg_catalog".pg_attribute PGA
			where "pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
			    "pg_catalog".quote_ident(PGC.relname) = p_tab_fqname
				and PGN.oid = PGC.relnamespace
				and PGA.attrelid = PGC.oid
				and not PGA.attisdropped
				and PGA.attnum > 0
			order by attnum
	loop
		v_attfound = ''f'';

		v_i := 0;
		loop
			select indkey[v_i] into v_attno from "pg_catalog".pg_index
					where indexrelid = v_idxrow.indexrelid;
			if v_attno = 0 then
				exit;
			end if;
			if v_attrow.attnum = v_attno then
				v_attfound = ''t'';
				exit;
			end if;
			v_i := v_i + 1;
		end loop;

		if v_attfound then
			v_attkind := v_attkind || ''k'';
		else
			v_attkind := v_attkind || ''v'';
		end if;
	end loop;

	--
	-- Return the resulting attkind
	--
	return v_attkind;
end;
' language plpgsql called on null input;


-- ----------------------------------------------------------------------
-- FUNCTION determineAttKindSerial (tab_fqname)
--
--	A table was that was specified without a primary key is added
--	to the replication. Assume that tableAddKey() was called before
--	and finish the creation of the serial column. The return an
--	attkind according to that.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.determineAttkindSerial(text)
returns text
as '
declare
	p_tab_fqname	alias for $1;
	v_attkind		text default '''';
	v_attrow		record;
	v_have_serial	bool default ''f'';
begin
	--
	-- Loop over the attributes of this relation
	-- and add a "v" for every user column, and a "k"
	-- if we find the Slony-I special serial column.
	--
	for v_attrow in select PGA.attnum, PGA.attname
			from "pg_catalog".pg_class PGC,
			    "pg_catalog".pg_namespace PGN,
				"pg_catalog".pg_attribute PGA
			where "pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
			    "pg_catalog".quote_ident(PGC.relname) = p_tab_fqname
				and PGN.oid = PGC.relnamespace
				and PGA.attrelid = PGC.oid
				and not PGA.attisdropped
				and PGA.attnum > 0
			order by attnum
	loop
		if v_attrow.attname = ''_Slony-I_@CLUSTERNAME@_rowID'' then
		    v_attkind := v_attkind || ''k'';
			v_have_serial := ''t'';
		else
			v_attkind := v_attkind || ''v'';
		end if;
	end loop;
	
	--
	-- A table must have at least one attribute, so not finding
	-- anything means the table does not exist.
	--
	if not found then
		raise exception ''Slony-I: table % not found'', p_tab_fqname;
	end if;

	--
	-- If it does not have the special serial column, we
	-- should not have been called in the first place.
	--
	if not v_have_serial then
		raise exception ''Slony-I: table % does not have the serial key'',
				p_tab_fqname;
	end if;

	execute ''update '' || p_tab_fqname ||
		'' set "_Slony-I_@CLUSTERNAME@_rowID" ='' ||
		'' "pg_catalog".nextval(''''@NAMESPACE@.sl_rowid_seq'''');'';
	execute ''alter table only '' || p_tab_fqname ||
		'' add unique ("_Slony-I_@CLUSTERNAME@_rowID");'';
	execute ''alter table only '' || p_tab_fqname ||
		'' alter column "_Slony-I_@CLUSTERNAME@_rowID" '' ||
		'' set not null;'';

	--
	-- Return the resulting Slony-I attkind
	--
	return v_attkind;
end;
' language plpgsql;


-- ----------------------------------------------------------------------
-- FUNCTION tableHasSerialKey (tab_fqname)
--
--	Checks if a table has our special serial key column that is
--	used if the table has no natural unique constraint.
-- ----------------------------------------------------------------------
create or replace function @NAMESPACE@.tableHasSerialKey(text) 
returns bool
as '
declare
	p_tab_fqname	alias for $1;
	v_attnum		int2;
begin
	select PGA.attnum into v_attnum
			from "pg_catalog".pg_class PGC,
				"pg_catalog".pg_namespace PGN,
				"pg_catalog".pg_attribute PGA
			where "pg_catalog".quote_ident(PGN.nspname) || ''.'' ||
				"pg_catalog".quote_ident(PGC.relname) = p_tab_fqname
				and PGC.relnamespace = PGN.oid
				and PGA.attrelid = PGC.oid
				and PGA.attname = ''_Slony-I_@CLUSTERNAME@_rowID''
				and not PGA.attisdropped;
	return found;
end;
' language plpgsql;


-- **********************************************************************
-- * Views
-- **********************************************************************


-- ----------------------------------------------------------------------
-- VIEW sl_status
--
--	This view shows the local nodes last event sequence number
--	and how far all remote nodes have processed events.
-- ----------------------------------------------------------------------
create or replace view @NAMESPACE@.sl_status as select
	E.ev_origin as st_origin,
	C.con_received as st_received,
	E.ev_seqno as st_last_event,
	E.ev_timestamp as st_last_event_ts,
	C.con_seqno as st_last_received,
	C.con_timestamp as st_last_received_ts,
	CE.ev_timestamp as st_last_received_event_ts,
	E.ev_seqno - C.con_seqno as st_lag_num_events,
	current_timestamp - CE.ev_timestamp as st_lag_time
	from @NAMESPACE@.sl_event E, @NAMESPACE@.sl_confirm C,
		@NAMESPACE@.sl_event CE
	where E.ev_origin = C.con_origin
	and CE.ev_origin = E.ev_origin
	and CE.ev_seqno = C.con_seqno
	and (E.ev_origin, E.ev_seqno) in 
		(select ev_origin, max(ev_seqno)
			from @NAMESPACE@.sl_event
			where ev_origin = @NAMESPACE@.getLocalNodeId('_@CLUSTERNAME@')
			group by 1
		)
	and (C.con_origin, C.con_received, C.con_seqno) in
		(select con_origin, con_received, max(con_seqno)
			from @NAMESPACE@.sl_confirm
			where con_origin = @NAMESPACE@.getLocalNodeId('_@CLUSTERNAME@')
			group by 1, 2
		);


