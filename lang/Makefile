# 
# This Makefile recodes source lang files into HTML Unicode.
# You should add your encodings to this file.  You need to have GNU Recode
# installed.
# 
# It is important to fix first and last lines of the file <?php and ?>
# using 'awk'
# 
# $Id: Makefile,v 1.12 2003/04/07 05:46:38 chriskl Exp $
#
DESTDIR=./recoded

all:	polish english chinese dutch german spanish italian french russian japanese

polish:
	cat polish.php | recode latin2..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/polish.php

english:
	cat english.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/english.php

dutch:
	cat dutch.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/dutch.php

german:
	cat german.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/german.php

spanish:
	cat spanish.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/spanish.php

italian:
	cat italian.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/italian.php
chinese: chinese-tr-utf8 chinese-tr-big5 chinese-sim-utf8 chinese-sim-gb2312

chinese-tr-utf8:
	cat chinese-tr-utf8.php | recode utf8..html  | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/chinese-tr-utf8.php

chinese-tr-big5:
	cat chinese-tr-big5.php | recode big5..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/chinese-tr-big5.php

chinese-sim-utf8:
	cat chinese-sim-utf8.php | recode utf8..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/chinese-sim-utf8.php

chinese-sim-gb2312:
	cat chinese-sim-gb2312.php | recode gb2312..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/chinese-sim-gb2312.php

french:
	cat french.php | recode latin1..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/french.php

japanese: japanese-euc japanese-sjis

japanese-euc:
	cat japanese-euc.php | recode euc-jp..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/japanese-euc.php

japanese-sjis:
	cat japanese-sjis.php | recode sjis..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/japanese-sjis.php

russian: russian-cp1251 russian-koi8 

russian-cp1251:
	cat russian-cp1251.php | recode cp1251..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/russian-cp1251.php

russian-koi8:
	cat russian-koi8.php | recode koi8..html | \
		awk '{ gsub("&gt;",">"); gsub("&lt;","<"); print $0}' \
		> ${DESTDIR}/russian-koi8.php

