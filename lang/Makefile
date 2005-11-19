# This Makefile recodes source lang files into HTML Unicode.
# You should add your encodings to this file.  You need to have GNU Recode
# installed.
# 
# It is important to:
# - fix the delimiters of php code: <?php and ?>
# - convert CRLF -> LF
# - remove all text before first <?php
# - remove all text after last ?>
# using 'convert.awk'
#
# Modifications by Dave Smith, 2003-11-10:
#	Added TARGETS variable for easy listing of all lang files.
#	Added 'prepare' target to check that 'recode' is installed.
#	Added 'clean' target to nuke recoded files. 
#	Surpressed verbose command line dumpage with '@'.
#	Added dependency checking for incremental recoding.
#	Added pretty "Recoding ..." messages.
#	Added 'chmod 644' to 'all' target for correct file permissions.
# Modifications by Rafal Slubowski, 2003-12-12:
#       All conversions of recoded text moved to convert.awk script
# 
# $Id: Makefile,v 1.43.2.1 2005/11/19 09:51:27 chriskl Exp $

DESTDIR=./recoded
TARGETS=polish \
	english \
	chinese-tr \
	chinese-sim \
	danish \
	dutch \
	german \
	spanish \
	italian \
	french \
	russian \
	japanese \
	slovak \
	turkish \
	czech \
	portuguese-br \
	portuguese-pt \
	swedish \
	afrikaans \
	arabic \
	mongol \
	ukrainian \
	hungarian \
	hebrew \
	romanian

all:	prepare ${TARGETS}
	@for p in ${TARGETS} ; do chmod 644 ${DESTDIR}/$$p.php ; done

prepare:
	@which recode >/dev/null 2>&1 || ( echo "You must have GNU 'recode' installed to use this Makefile,\
						but I could not find it in your path!" && exit 1 )
	@which sed >/dev/null 2>&1 || ( echo "You must have sed installed to use this Makefile,\
						but I could not find it in your path!" && exit 1 )
	@which awk >/dev/null 2>&1 || ( echo "You must have awk installed to use this Makefile,\
						but I could not find it in your path!" && exit 1 )

clean:
	@echo "Nuking recoded lang files..."
	@for p in ${TARGETS} ; do rm -fv ${DESTDIR}/$$p.php ; done

polish:	polish.php
	@echo "Recoding polish..."
	@cat polish.php | recode utf-8..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/polish.php
	@chmod 644 polish.php ${DESTDIR}/polish.php

english:	english.php
	@echo "Recoding english..."
	@cat english.php | recode latin1..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/english.php
	@chmod 644 english.php ${DESTDIR}/english.php

dutch:	dutch.php
	@echo "Recoding dutch..."
	@cat dutch.php | recode latin1..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/dutch.php
	@chmod 644 dutch.php ${DESTDIR}/dutch.php

danish:	danish.php
	@echo "Recoding danish..."
	@cat danish.php | recode latin1..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/danish.php
	@chmod 644 danish.php ${DESTDIR}/danish.php

german:	german.php
	@echo "Recoding german..."
	@cat german.php | recode utf-8..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/german.php
	@chmod 644 german.php ${DESTDIR}/german.php

spanish:	spanish.php
	@echo "Recoding spanish..."
	@cat spanish.php | recode iso-8859-1..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/spanish.php
	@chmod 644 spanish.php ${DESTDIR}/spanish.php

italian:	italian.php
	@echo "Recoding italian..."
	@cat italian.php | recode iso-8859-1..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/italian.php
	@chmod 644 italian.php ${DESTDIR}/italian.php

chinese-tr:	chinese-tr.php
	@echo "Recoding chinese-tr..."
	@cat chinese-tr.php | recode big5..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/chinese-tr.php
	@chmod 644 chinese-tr.php ${DESTDIR}/chinese-tr.php

chinese-sim:	chinese-sim.php
	@echo "Recoding chinese-sim..."
	@cat chinese-sim.php | recode gb2312..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/chinese-sim.php
	@chmod 644 chinese-sim.php ${DESTDIR}/chinese-sim.php

french:	french.php
	@echo "Recoding french..."
	@cat french.php | recode latin1..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/french.php
	@chmod 644 french.php ${DESTDIR}/french.php

japanese:	japanese.php
	@echo "Recoding japanese..."
	@cat japanese.php | recode euc-jp..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/japanese.php
	@chmod 644 japanese.php ${DESTDIR}/japanese.php

russian:	russian.php
	@echo "Recoding russian..."
	@cat russian.php | recode koi8..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/russian.php
	@chmod 644 russian.php ${DESTDIR}/russian.php

slovak:	slovak.php
	@echo "Recoding slovak..."
	@cat slovak.php | recode utf-8..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/slovak.php
	@chmod 644 slovak.php ${DESTDIR}/slovak.php

czech:	czech.php
	@echo "Recoding czech..."
	@cat czech.php | recode utf-8..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/czech.php
	@chmod 644 czech.php ${DESTDIR}/czech.php

turkish:	turkish.php
	@echo "Recoding turkish..."
	@cat turkish.php | recode iso-8859-9..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/turkish.php
	@chmod 644 turkish.php ${DESTDIR}/turkish.php

portuguese-br:	portuguese-br.php
	@echo "Recoding portuguese-br..."
	@cat portuguese-br.php | recode iso-8859-1..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/portuguese-br.php
	@chmod 644 portuguese-br.php ${DESTDIR}/portuguese-br.php

portuguese-pt:	portuguese-pt.php
	@echo "Recoding portuguese-pt..."
	@cat portuguese-pt.php | recode iso-8859-15..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/portuguese-pt.php
	@chmod 644 portuguese-pt.php ${DESTDIR}/portuguese-pt.php

swedish:	swedish.php
	@echo "Recoding swedish..."
	@cat swedish.php | recode iso-8859-1..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/swedish.php
	@chmod 644 swedish.php ${DESTDIR}/swedish.php

afrikaans:	afrikaans.php
	@echo "Recoding afrikaans..."
	@cat afrikaans.php | recode iso-8859-1..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/afrikaans.php
	@chmod 644 afrikaans.php ${DESTDIR}/afrikaans.php

hungarian:	hungarian.php
	@echo "Recoding hungarian..."
	@cat hungarian.php | recode utf-8..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/hungarian.php
	@chmod 644 hungarian.php ${DESTDIR}/hungarian.php

arabic:		arabic.php
	@echo "Recoding arabic..."
	@cat arabic.php | recode utf-8..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/arabic.php
	@chmod 644 arabic.php ${DESTDIR}/arabic.php

mongol:		mongol.php
	@echo "Recoding mongol..."
	@cat mongol.php | recode iso-8859-5..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/mongol.php
	@chmod 644 mongol.php ${DESTDIR}/mongol.php

ukrainian:	ukrainian.php
	@echo "Recoding ukrainian..."
	@cat ukrainian.php | recode koi8-r..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/ukrainian.php
	@chmod 644 ukrainian.php ${DESTDIR}/ukrainian.php

hebrew:	hebrew.php
	@echo "Recoding hebrew..."
	@cat hebrew.php | recode utf-8..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/hebrew.php
	@chmod 644 hebrew.php ${DESTDIR}/hebrew.php

romanian:		romanian.php
	@echo "Recoding romanian..."
	@cat romanian.php | recode utf-8..xml | sed -e "s/&apos;/'/g" | ./convert.awk \
		> ${DESTDIR}/romanian.php
	@chmod 644 romanian.php ${DESTDIR}/romanian.php

