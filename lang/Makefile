# This Makefile recodes source lang files into HTML Unicode.
# You should add your encodings to this file.  You need to have GNU Recode
# installed.
# 
# It is important to fix the first and last lines of the file <?php and ?>
# using 'awk'
#
# Modifications by Dave Smith, 2003-11-10:
#	Added TARGETS variable for easy listing of all lang files.
#	Added 'prepare' target to check that 'recode' is installed.
#	Added 'clean' target to nuke recoded files. 
#	Surpressed verbose command line dumpage with '@'.
#	Added dependency checking for incremental recoding.
#	Added pretty "Recoding ..." messages.
#	Added 'chmod 644' to 'all' target for correct file permissions.
# 
# $Id: Makefile,v 1.30 2003/11/12 01:22:43 chriskl Exp $

DESTDIR=./recoded
TARGETS=${DESTDIR}/polish.php \
		${DESTDIR}/english.php \
		${DESTDIR}/chinese-tr.php \
		${DESTDIR}/chinese-sim.php \
		${DESTDIR}/dutch.php \
		${DESTDIR}/german.php \
		${DESTDIR}/spanish.php \
		${DESTDIR}/italian.php \
		${DESTDIR}/french.php \
		${DESTDIR}/russian.php \
		${DESTDIR}/japanese.php \
		${DESTDIR}/slovak.php \
		${DESTDIR}/turkish.php \
		${DESTDIR}/czech.php \
		${DESTDIR}/portuguese-br.php \
		${DESTDIR}/swedish.php \
		${DESTDIR}/afrikaans.php \
		${DESTDIR}/hungarian.php

all:	prepare ${TARGETS}
	@chmod 644 ${TARGETS}

prepare:
	@which recode >/dev/null 2>&1 || ( echo "You must have GNU 'recode' installed to use this Makefile,\
										but I could not find it in your path!" && exit 1 )

clean:
	@echo "Nuking recoded lang files..."
	@rm -fv ${TARGETS}

${DESTDIR}/polish.php:	polish.php
	@echo "Recoding polish..."
	@cat polish.php | recode latin2..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/polish.php

${DESTDIR}/english.php:	english.php
	@echo "Recoding english..."
	@cat english.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/english.php

${DESTDIR}/dutch.php:	dutch.php
	@echo "Recoding dutch..."
	@cat dutch.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/dutch.php

${DESTDIR}/german.php:	german.php
	@echo "Recoding german..."
	@cat german.php | recode utf-8..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/german.php

${DESTDIR}/spanish.php:	spanish.php
	@echo "Recoding spanish..."
	@cat spanish.php | recode iso-8859-1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/spanish.php

${DESTDIR}/italian.php:	italian.php
	@echo "Recoding italian..."
	@cat italian.php | recode iso-8859-1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/italian.php

${DESTDIR}/chinese-tr.php:	chinese-tr.php
	@echo "Recoding chinese-tr..."
	@cat chinese-tr.php | recode big5..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/chinese-tr.php

${DESTDIR}/chinese-sim.php:	chinese-sim.php
	@echo "Recoding chinese-sim..."
	@cat chinese-sim.php | recode gb2312..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/chinese-sim.php

${DESTDIR}/french.php:	french.php
	@echo "Recoding french..."
	@cat french.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/french.php

${DESTDIR}/japanese.php:	japanese.php
	@echo "Recoding japanese..."
	@cat japanese.php | recode euc-jp..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/japanese.php

${DESTDIR}/russian.php:	russian.php
	@echo "Recoding russian..."
	@cat russian.php | recode koi8..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/russian.php

${DESTDIR}/slovak.php:	slovak.php
	@echo "Recoding slovak..."
	@cat slovak.php | recode utf-8..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/slovak.php

${DESTDIR}/czech.php:	czech.php
	@echo "Recoding czech..."
	@cat czech.php | recode cp1250..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/czech.php

${DESTDIR}/turkish.php:	turkish.php
	@echo "Recoding turkish..."
	@cat turkish.php | recode iso-8859-9..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/turkish.php

${DESTDIR}/portuguese-br.php:	portuguese-br.php
	@echo "Recoding portuguese-br..."
	@cat portuguese-br.php | recode iso-8859-1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/portuguese-br.php

${DESTDIR}/swedish.php:	swedish.php
	@echo "Recoding swedish..."
	@cat swedish.php | recode iso-8859-1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/swedish.php

${DESTDIR}/afrikaans.php:	afrikaans.php
	@echo "Recoding afrikaans..."
	@cat afrikaans.php | recode iso-8859-1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/afrikaans.php

${DESTDIR}/hungarian.php:	hungarian.php
	@echo "Recoding hungarian..."
	@cat hungarian.php | recode utf-8..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/hungarian.php

