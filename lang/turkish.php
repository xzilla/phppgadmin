<?php

	/**
	 * Turkish language file for phpPgAdmin.  Use this as a basis
	 * for new translations.
	 *
	 * $Id: turkish.php,v 1.15 2007/04/24 11:42:07 soranzo Exp $
	 */

	// Language and character set
	$lang['applang'] = 'Türkçe';
	$lang['appcharset'] = 'ISO-8859-9';
	$lang['applocale'] = 'tr_TR';
  	$lang['appdbencoding'] = 'LATIN5';
	$lang['applangdir'] = 'ltr';

	// Basic strings
	$lang['strintro'] = 'phpPgAdmin\'e hoþgeldiniz.';
	$lang['strppahome'] = 'phpPgAdmin Ana Sayfasý';
	$lang['strpgsqlhome']  =  'PostgreSQL Ana Sayfasý';
	$lang['strpgsqlhome_url'] = 'http://www.postgresql.org/';
	$lang['strlocaldocs'] = 'PostgreSQL Belgeleri (yerel)';
	$lang['strreportbug'] = 'Hata Bildirin';
	$lang['strviewfaq'] = 'Sýkça Sorulan Sorular';
	$lang['strviewfaq_url'] = 'http://phppgadmin.sourceforge.net/?page=faq';
	
	// Basic strings
	$lang['strlogin']  =  'Giriþ';
	$lang['strloginfailed'] = 'Giriþ Baþarýsýz';
	$lang['strlogindisallowed']  =  'Güvenlik nedeniyle giriþe izin verilmedi.';
	$lang['strserver'] = 'Sunucu';
	$lang['strservers']  =  'Sunucular';
	$lang['strintroduction']  =  'Giriþ';
	$lang['strhost']  =  'Sunucu';
	$lang['strport']  =  'Port';
	$lang['strlogout'] = 'Çýkýþ';
	$lang['strowner'] = 'Sahibi';
	$lang['straction'] = 'Eylem';
	$lang['stractions'] = 'Eylemler';
	$lang['strname'] = 'Ad';
	$lang['strdefinition'] = 'Taným';
	$lang['strproperties'] = 'Özellikler';
	$lang['strbrowse'] = 'Gözat';
	$lang['strdrop'] = 'Sil';
	$lang['strdropped'] = 'Silindi';
	$lang['strnull'] = 'Null';
	$lang['strnotnull'] = 'Null/Null deðil';
	$lang['strprev'] = 'Önceki';
	$lang['strnext'] = 'Sonraki';
	$lang['strfirst'] = '<< Ýlk';
	$lang['strlast'] = 'Son >>';
	$lang['strfailed']  =  'Baþarýsýz oldu.';
	$lang['strcreate']  =  'Yarat';
	$lang['strcreated'] = 'Yaratýldý';
	$lang['strcomment'] = 'Yorum';
	$lang['strlength'] = 'Uzunluk';
	$lang['strdefault'] = 'Ön tanýmlý deðer';
	$lang['stralter'] = 'Deðiþtir';
	$lang['strok'] = 'Tamam';
	$lang['strcancel'] = 'Ýptal Et';
	$lang['strsave'] = 'Kaydet';
	$lang['strreset'] = 'Temizle';
	$lang['strinsert'] = 'Ekle';
	$lang['strselect'] = 'Seç';
	$lang['strdelete'] = 'Sil';
	$lang['strupdate'] = 'Güncelle';
	$lang['strreferences'] = 'References';
	$lang['stryes'] = 'Evet';
	$lang['strno'] = 'Hayýr';
	$lang['strtrue']  =  'TRUE';
	$lang['strfalse']  =  'FALSE';
	$lang['stredit'] = 'Düzenle';
	$lang['strcolumn']  =  'KolonF';
	$lang['strcolumns'] = 'Kolonlar';
	$lang['strrows'] = 'satýr';
	$lang['strrowsaff']  =  'satýr iþlendi.';
	$lang['strobjects']  =  'nesne(ler)';
	$lang['strback'] = 'Geri';
	$lang['strqueryresults'] = 'Sorgu sonuçlarý';
	$lang['strshow'] = 'Göster';
	$lang['strempty'] = 'Boþalt';
	$lang['strlanguage'] = 'Dil';
	$lang['strencoding'] = 'Karakter kodlamasý';
	$lang['strvalue'] = 'Deðer';
	$lang['strunique'] = 'Tekil';
	$lang['strprimary'] = 'Birincil';
	$lang['strexport'] = 'Export';
	$lang['strimport']  =  'Import';
	$lang['strallowednulls']  =  'Ýzin verilen NULL karakterler';
	$lang['strbackslashn']  =  '\N';
	$lang['strnull']  =  'Null';
	$lang['strnull']  =  'NULL (sözcük)';
	$lang['stremptystring']  =  'Boþ metin/alan';
	$lang['strsql'] = 'SQL';
	$lang['stradmin'] = 'Yönetici';
	$lang['strvacuum'] = 'Vacuum';
	$lang['stranalyze'] = 'Analyze';
	$lang['strclusterindex'] = 'Cluster';
	$lang['strclustered']  =  'Cluster edildi mi?';
	$lang['strreindex'] = 'Reindex';
	$lang['strrun'] = 'Çalýþtýr';
	$lang['stradd'] = 'Ekle';
	$lang['strremove']  =  'Kaldýr';
	$lang['strevent'] = 'Event';
	$lang['strwhere'] = 'Where';
	$lang['strinstead'] = 'Do Instead';
	$lang['strwhen'] = 'When';
	$lang['strformat'] = 'Format';
	$lang['strdata'] = 'Veri';
	$lang['strconfirm'] = 'Onayla';
	$lang['strexpression'] = 'Ýfade';
	$lang['strellipsis'] = '...';
	$lang['strseparator']  =  ': ';
	$lang['strexpand'] = 'Geniþlet';
	$lang['strcollapse']  =  'Dar görünüm';
	$lang['strexplain'] = 'Explain';
	$lang['strexplainanalyze']  =  'Explain Analyze';
	$lang['strfind'] = 'Bul';
	$lang['stroptions'] = 'Seçenekler';
	$lang['strrefresh'] = 'Yenile';
	$lang['strdownload'] = 'Ýndir';
	$lang['strdownloadgzipped']  =  'gzip ile sýkýþtýrýlmýþ halde indir';
	$lang['strinfo']  =  'Bilgi';
	$lang['stroids']  =  'OIDler';
	$lang['stradvanced']  =  'Geliþmiþ';
	$lang['strvariables']  =  'Deðiþkenler';
	$lang['strprocess']  =  'Süreç';
	$lang['strprocesses']  =  'Süreçler';
	$lang['strsetting']  =  'Ayar';
	$lang['streditsql']  =  'SQL Düzenle';
	$lang['strruntime']  =  'Toplam çalýþma süresi: %s ms';
	$lang['strpaginate']  =  'Sonuçlarý sayfalandýr.';
	$lang['struploadscript']  =  'ya da bir SQL betiði yükleyin:';
	$lang['strstarttime']  =  'Baþlangýç zamaný';
	$lang['strfile']  =  'Dosya';
	$lang['strfileimported']  =  'Dosya import edildi.';
	$lang['strtrycred']  =  'Giriþ bilgilerini tüm sunucular için kullan';

	// Error handling
	$lang['strnoframes']  =  'Bu uygulama en iyi olarak frame destekli bir tarayýcý ile kullanýlabilir; ancak frameler ile kullanmak istemiyorsanýz aþaðýdaki linke týklayabilirsiniz.';
	$lang['strnoframeslink']  =  'Frame olmadan kullan';
	$lang['strbadconfig'] = 'config.inc.php dosyaniz güncel deðil. Bu dosyayý yeni config.inc.php-dist dosyasýndan yaratmanýz gerekmektedir.';
	$lang['strnotloaded'] = 'PHP kurulumunuzda PostgreSQL desteði bulunamamýþtýr.';
        $lang['strpostgresqlversionnotsupported'] = 'Bu PostgreSQL sürümü desteklenmemektedir. Lütfen %s ya da üstü bir sürüme güncelleyiniz.';
	$lang['strbadschema'] = 'Geçersiz þema.';
	$lang['strbadencoding'] = 'Ýstemci dil kodlamasýný ayarlamaya çalýþýrken bir hata oluþtu.';
	$lang['strsqlerror'] = 'SQL hatasý:';
	$lang['strinstatement'] = 'Üstteki hata, aþaðýdaki ifade içinde oluþtu:';
	$lang['strinvalidparam'] = 'Geçersiz betik parametreleri.';
	$lang['strnodata'] = 'Satýr bulunamadý.';
	$lang['strnoobjects']  =  'Hiçbir nesne bulunamadý..';
	$lang['strrownotunique']  =  'Bu satýr için hiçbir tekil belirtici bulunamadý.';
	$lang['strnoreportsdb']  =  'reports veritabaný yaratýþmamýþ. Yönergeler için lütfen INSTALL dosyasýný okuyunuz.';
	$lang['strnouploads']  =  'Dosya yükleme özelliði etkin deðil.';
	$lang['strimporterror']  =  'Import hatasý.';
	$lang['strimporterror-fileformat']  =  'Import hatasý: Dosya tipi otomatik olarak belirlenemedi.';
	$lang['strimporterrorline']  =  '%s numaralý satýrda import hatasý.';
$lang['strimporterrorline-badcolumnnum']  =  'Import error on line %s:  Line does not possess the correct number of columns.';
$lang['strimporterror-uploadedfile']  =  'Import error: File could not be uploaded to the server';
$lang['strcannotdumponwindows']  =  'Dumping of complex table and schema names on Windows is not supported.';

	// Tables
	$lang['strtable'] = 'Tablo';
	$lang['strtables'] = 'Tablolar';
	$lang['strshowalltables'] = 'Tüm tablolarý göster';
	$lang['strnotables'] = 'Veritabanýnda tablo bulunamadý.';
	$lang['strnotable'] = 'Veritabanýnda tablo bulunamadý.';
	$lang['strcreatetable'] = 'Yeni tablo yarat';
	$lang['strtablename'] = 'Tablo adý';
	$lang['strtableneedsname'] = 'Tablonuza bir ad vermeniz gerekmektedir.';
	$lang['strtableneedsfield'] = 'En az bir alan belirtmeniz gerekmektedir.';
	$lang['strtableneedscols'] = 'Geçerli miktarda kolon sayýsý belirtmeniz gerekmektedir.';
	$lang['strtablecreated'] = 'Tablo yaratýldý.';
	$lang['strtablecreatedbad'] = 'Tablo yaratýlamadý.';
	$lang['strconfdroptable'] = '"%s" tablosunu kaldýrmak istediðinizden emin misiniz?';
	$lang['strtabledropped'] = 'Tablo kaldýrýldý.';
	$lang['strtabledroppedbad'] = 'Tablo kaldýrýlamadý.';
	$lang['strconfemptytable'] = '"%s" tablosunu boþaltmak istediðinizden emin misiniz?';
	$lang['strtableemptied'] = 'Tablo boþaltýldý.';
	$lang['strtableemptiedbad'] = 'Tablo boþaltýlamadý.';
	$lang['strinsertrow'] = 'Yeni kayýt gir';
	$lang['strrowinserted'] = 'Yeni kayýt girildi.';
	$lang['strrowinsertedbad'] = 'Yeni kayýt girme iþlemi baþarýsýz oldu.';
	$lang['strrowduplicate']  =  'Satýr ekleme baþarýsýz oldu, birbirinin ayný iki kayýt girilmek istendi.';
	$lang['streditrow'] = 'Kayýdýn içeriðini deðiþtir.';
	$lang['strrowupdated'] = 'Kayýt güncellendi.';
	$lang['strrowupdatedbad'] = 'Kayýt güncelleme iþleme baþarýsýz oldu.';
	$lang['strdeleterow'] = 'Kaydý sil';
	$lang['strconfdeleterow'] = 'Bu kaydý silmek istediðinize emin misiniz?';
	$lang['strrowdeleted'] = 'Kayýt silindi.';
	$lang['strrowdeletedbad'] = 'Kayýt silinme iþlemi baþarýsýz oldu.';
        $lang['strinsertandrepeat'] = 'Ekle ve Tekrarla';
        $lang['strnumcols'] = 'Kolon sayýsý';
        $lang['strcolneedsname'] = 'Kolon için bir ad vermelisiniz.';
	$lang['strselectallfields']  =  'Tüm alanlarý seç';
	$lang['strselectneedscol'] = 'En az bir kolon iþaretlemelisiniz';
	$lang['strselectunary']  =  'Unary operatörlerin deðeri olamaz.';
	$lang['straltercolumn'] = 'Kolonu deðiþtir (alter)';
	$lang['strcolumnaltered'] = 'Kolon deðiþtirildi (alter)';
	$lang['strcolumnalteredbad'] = 'Kolon deðiþtirilme iþlemi baþarýsýz oldu.';
	$lang['strconfdropcolumn']  =  '"%s" kolonunu "%s" tablosundan silmek istediðinize emin misiniz?';
	$lang['strcolumndropped'] = 'Kolon silindi.';
	$lang['strcolumndroppedbad'] = 'Kolon silme iþlemi baþarýsýz oldu.';
	$lang['straddcolumn'] = 'Yeni kolon ekle';
	$lang['strcolumnadded'] = 'Kolon eklendi.';
	$lang['strcolumnaddedbad'] = 'Kolon eklenemedi.';
	$lang['strcascade']  =  'CASCADE';
	$lang['strtablealtered'] = 'Tablo alter edildi..';
	$lang['strtablealteredbad'] = 'Tablo alteration iþlemi baþarýsýz oldu.';
	$lang['strdataonly']  =  'Sadece veri';
	$lang['strstructureonly']  =  'Sadece yapý';
	$lang['strstructureanddata']  =  'Yapý ve veri';
	$lang['strtabbed']  =  'Tabbed';
	$lang['strauto']  =  'Otomatik';
	$lang['strconfvacuumtable'] = '"%s" tablosunu vakumlamak istediðiniz emin misiniz?';
        $lang['strestimatedrowcount'] = 'Yaklaþýk satýr sayýsý';

	// Users
	$lang['struser'] = 'Kullanýcý';
	$lang['strusers'] = 'Kullanýcýlar';
	$lang['strusername'] = 'Kullanýcý Adý';
	$lang['strpassword'] = 'Þifresi';
	$lang['strsuper'] = 'Superuser mý?';
	$lang['strcreatedb'] = 'Veritabaný yaratabilsin mi?';
	$lang['strexpires'] = 'Expires';
	$lang['strsessiondefaults']  =  'Oturum varsayýlanlarý';
	$lang['strnousers']  =  'Hiçbir kullanýcý bulunamadý.';
        $lang['struserupdated'] = 'Kullanýcý güncellendi.';
	$lang['struserupdatedbad'] = 'Kullanýcý güncelleme iþlemi baþarýsýz oldu.';
	$lang['strshowallusers'] = 'Tüm kullanýcýlarý göster.';
	$lang['strcreateuser'] = 'Yeni kullanýcý yarat';
	$lang['struserneedsname']  =  'Kullanýcýnýz için bir ad vermelisiniz.';
	$lang['strusercreated'] = 'Kullanýcý yaratýldý.';
	$lang['strusercreatedbad'] = 'Kullanýcý yaratýlma iþlemi baþarýsýz oldu.';
	$lang['strconfdropuser'] = '"%s" kullanýcýsýný silmek istediðinize emin misiniz?';
	$lang['struserdropped'] = 'Kullanýcý silindi.';
	$lang['struserdroppedbad'] = 'Kullanýcý silme iþlemi baþarýsýz oldu.';
	$lang['straccount'] = 'Hesap';
	$lang['strchangepassword'] = 'Þifre Deðiþtir';
	$lang['strpasswordchanged'] = 'Þifre deðiþtirildi.';
	$lang['strpasswordchangedbad'] = 'Þifre deðiþtirme baþarýsýz oldu.';
	$lang['strpasswordshort']  =  'Þifre çok kýsa.';
	$lang['strpasswordconfirm'] = 'Þifreler uyuþmadý.';
	
	// Groups
	$lang['strgroup'] = 'Grup';
	$lang['strgroups'] = 'Gruplar';
	$lang['strnogroup'] = 'Grup bulunamadý.';
	$lang['strnogroups'] = 'Grup bulunamadý.';
	$lang['strcreategroup'] = 'Yeni grup yarat';
	$lang['strshowallgroups'] = 'Tüm gruplarý göster';
	$lang['strgroupneedsname'] = 'Grup yaratabilmek için bir ad vermelisiniz.';
	$lang['strgroupcreated'] = 'Grup yaratýldý.';
	$lang['strgroupcreatedbad'] = 'Grup yaratma iþlemi baþarýsýz oldu.';	
	$lang['strconfdropgroup'] = '"%s" grubunu silmek istediðinize emin misiniz?';
	$lang['strgroupdropped'] = 'Grup silindi.';
	$lang['strgroupdroppedbad'] = 'Grup silme iþlemi baþarýsýz oldu.';
	$lang['strmembers'] = 'Üyeler';
	$lang['straddmember'] = 'Üye ekle';
	$lang['strmemberadded'] = 'Üye eklendi.';
	$lang['strmemberaddedbad'] = 'Üye ekleme baþarýsýz oldu.';
	$lang['strdropmember'] = 'Üyeyi kaldýr';
	$lang['strconfdropmember'] = '"%s" üyesini "%s" grubundan silmek istediðinize emin misiniz?';
	$lang['strmemberdropped'] = 'Üye silindi.';
	$lang['strmemberdroppedbad'] = 'Üye silme baþarýsýz oldu.';

	// Privilges
	$lang['strprivilege'] = 'Ýzni';
	$lang['strprivileges'] = 'Ýzinler';
	$lang['strnoprivileges'] = 'Bu nesnenin bir izni yoktur.';
	$lang['strgrant'] = 'Ýzni ver';
	$lang['strrevoke'] = 'Ýzni kaldýr';
	$lang['strgranted'] = 'Ýzimler verildi.';
	$lang['strgrantfailed'] = 'Ýzinlerin grant iþlemi baþarýsýz oldu.';

	$lang['strgrantbad'] = 'En az bir kullanýcý ya da grup ve en az bir izin belirtmelisiniz.';
	$lang['strgrantor'] = 'Grantor';
	$lang['strasterisk'] = '*';

	// Databases
	$lang['strdatabase'] = 'Veritabaný';
	$lang['strdatabases'] = 'Veritabanlarý';
	$lang['strshowalldatabases'] = 'Tüm veritabanlarýný göster';
	$lang['strnodatabase'] = 'Veritabaný bulunamadý.';
	$lang['strnodatabases'] = 'Veritabaný bulunamadý.';
	$lang['strcreatedatabase'] = 'Veritabaný yarat';
	$lang['strdatabasename'] = 'Veritabaný adý';
	$lang['strdatabaseneedsname'] = 'Veritabanýnýza bir ad vermelisiniz.';
	$lang['strdatabasecreated'] = 'Veritabaný yaratýldý.';
	$lang['strdatabasecreatedbad'] = 'Veritabaný yaratýlamadý.';	
	$lang['strconfdropdatabase'] = '"%s" veritabanýný kaldýrmak istediðinize emin misiniz?';
	$lang['strdatabasedropped'] = 'Veritabaný kaldýrýldý.';
	$lang['strdatabasedroppedbad'] = 'Veritabaný kaldýrma baþarýsýz oldu.';
	$lang['strentersql'] = 'Veritabaný üzerinde çalýþtýrýlacak sorgu/sorgularý aþaðýya yazýnýz:';
	$lang['strsqlexecuted'] = 'SQL çalýþtýrýldý.';
	$lang['strvacuumgood']  =  'Vacuum tamamlandý.';
	$lang['strvacuumbad'] = 'Vacuum iþlemi baþarýsýz oldu.';
	$lang['stranalyzegood'] = 'Analyze iþlemi tamamlandý.';
	$lang['stranalyzebad'] = 'Analyze iþlemi baþarýsýz oldu.';
	$lang['strreindexgood']  =  'Reindex tamamlandý.';
	$lang['strreindexbad']  =  'Reindex baþarýsýz oldu.';
	$lang['strfull']  =  'Full';
	$lang['strfreeze']  =  'Freeze';
	$lang['strforce']  =  'Force';
	$lang['strsignalsent'] = 'Sinyal gönderildi.';
        $lang['strsignalsentbad'] = 'Sinyal gönderme iþlemi baþarýsýz oldu';
        $lang['strallobjects'] = 'Tüm nesneler';
	$lang['strdatabasealtered']  =  'Veritabaný deðiþtirildi.';
	$lang['strdatabasealteredbad']  =  'Veritabaný deðiþtirme baþarýsýz oldu.';

	// Views
	$lang['strview'] = 'View';
	$lang['strviews'] = 'Viewlar';
	$lang['strshowallviews'] = 'Tüm viewlarý göster';
	$lang['strnoview'] = 'Bir view bulunamadý.';
	$lang['strnoviews'] = 'Bir view bulunamadý.';
	$lang['strcreateview'] = 'View yarat';
	$lang['strviewname'] = 'View adý';
	$lang['strviewneedsname'] = 'View için bir ad belirtmelisiniz.';
	$lang['strviewneedsdef'] = 'View için bir taným belirtmelisiniz.';
	$lang['strviewneedsfields']  =  'View içinde görünmesini istediðiniz kolonlarý belirtmelisiniz.';
 	$lang['strviewcreated'] = 'View yaratýldý.';
	$lang['strviewcreatedbad'] = 'View yaratma iþlemi baþarýsýz oldu.';
	$lang['strconfdropview'] = '"%s" viewini kaldýrmak istediðinize emin misiniz?';
	$lang['strviewdropped'] = 'View kaldýrýldý.';
	$lang['strviewdroppedbad'] = 'View kaldýrma iþlemi baþarýsýz oldu.';
	$lang['strviewupdated'] = 'View güncellendi.';
	$lang['strviewupdatedbad'] = 'View güncelleme iþlemi baþarýsýz oldu.';
	$lang['strviewlink']  =  'Linking Keys';
	$lang['strviewconditions']  =  'Ek durumlar';
	$lang['strcreateviewwiz']  =  'Sihirbaz ile view yaratýn';

	// Sequences
	$lang['strsequence'] = 'Sequence';
	$lang['strsequences'] = 'Sequences';
	$lang['strshowallsequences'] = 'Show all sequences';
	$lang['strnosequence'] = 'No sequence found.';
	$lang['strnosequences'] = 'No sequences found.';
	$lang['strcreatesequence'] = 'Create sequence';
	$lang['strlastvalue'] = 'Son deðer';
	$lang['strincrementby'] = 'Arttýrma deðeri';	
	$lang['strstartvalue'] = 'Baþlangýç Deðeri';
	$lang['strmaxvalue'] = 'Max Deðer';
	$lang['strminvalue'] = 'Min Deðer';
	$lang['strcachevalue'] = 'Cache Deðeri';
	$lang['strlogcount'] = 'Log Count';
	$lang['striscycled'] = 'Is Cycled?';
	$lang['strsequenceneedsname'] = 'Sequence için bir ad belirtmelisiniz.';
	$lang['strsequencecreated'] = 'Sequence yaratýldý.';
	$lang['strsequencecreatedbad'] = 'Sequence yaratma iþlemi baþarýsýz oldu.'; 
	$lang['strconfdropsequence'] = '"%s" sequence ini kaldýrmak istediðinize emin misiniz?';
	$lang['strsequencedropped'] = 'Sequence kaldýrýldý.';
	$lang['strsequencedroppedbad'] = 'Sequence kaldýrma iþlemi baþarýsýz oldu.';
	$lang['strsequencereset'] = 'Sequence sýfýrlandý.';
	$lang['strsequenceresetbad'] = 'Sequence sýfýrlama baþarýsýz oldu.';

	// Indexes
	$lang['strindex']  =  'Index';
	$lang['strindexes'] = 'Indeksler';
	$lang['strindexname'] = 'Indeks adý';
	$lang['strshowallindexes'] = 'Tüm indeksleri göster';
	$lang['strnoindex'] = 'Hiçbir indeks bulunamadý.';
	$lang['strnoindexes'] = 'Hiçbir indeks bulunamadý.';
	$lang['strcreateindex'] = 'Indeks yarat';
	$lang['strtabname'] = 'Tab Adý';
	$lang['strcolumnname'] = 'Kolon adý';
	$lang['strindexneedsname'] = 'Indeksinize bir ad vermeniz gerekmektedir.';
	$lang['strindexneedscols'] = 'Geçerli kolýn sayýsý vermeniz gerekmektedir.';
	$lang['strindexcreated'] = 'Indeks yaratýldý.';
	$lang['strindexcreatedbad'] = 'Index creation failed.';
	$lang['strconfdropindex'] = '"%s" indeksini kaldýrmak istediðinize emin misiniz?';
	$lang['strindexdropped'] = 'Indeks kaldýrýldý.';
	$lang['strindexdroppedbad'] = 'Indeks kaldýrýlamadý.';
	$lang['strkeyname'] = 'Anahtar adý';
	$lang['struniquekey'] = 'Tekil (Unique) Anahtar';
	$lang['strprimarykey'] = 'Birincil Anahtar (Primary Key)';
 	$lang['strindextype'] = 'Indeksin tipi';
	$lang['strtablecolumnlist'] = 'Tablodaki kolonlar';
	$lang['strindexcolumnlist'] = 'Indeksteki kolonlar';
	$lang['strconfcluster']  =  '"%s" tablosunu cluster etmek istiyor musunuz?';
	$lang['strclusteredgood']  =  'Cluster tamamlandý.';
	$lang['strclusteredbad']  =  'Cluster baþarýsýz oldu.';

	// Rules
	$lang['strrules'] = 'Rules';
	$lang['strrule'] = 'Rule';
	$lang['strshowallrules'] = 'Show all Rules';
	$lang['strnorule'] = 'Rule bulunamadý.';
	$lang['strnorules'] = 'Rule bulunamadý.';
	$lang['strcreaterule'] = 'Rule yarat';
	$lang['strrulename'] = 'Rule adý';
	$lang['strruleneedsname'] = 'Rule için bir ad belirtmelisiniz.';
	$lang['strrulecreated'] = 'Rule yaratýldý.';
	$lang['strrulecreatedbad'] = 'Rule yaratma iþlemi baþarýsýz oldu.';
	$lang['strconfdroprule'] = '"%s" kuralýný "%s" tablosundan silmek istediðinize emin misiniz?';
	$lang['strruledropped'] = 'Rule silindi';
	$lang['strruledroppedbad'] = 'Rule silinme iþlemi baþarýsýz oldu.';

	// Constraints
	$lang['strconstraint']  =  'Kýsýtlama';
	$lang['strconstraints'] = 'Kýsýtlamalar';
	$lang['strshowallconstraints'] = 'Tüm kýsýtlamalarý (constraint) göster.';
	$lang['strnoconstraints'] = 'Hiçbir kýsýtlama (constraint) bulunamadý.';
	$lang['strcreateconstraint'] = 'Kýsýtlama (Constraint) yarat';
	$lang['strconstraintcreated'] = 'Kýsýtlama (Constraint) yaratýldý.';
	$lang['strconstraintcreatedbad'] = 'Kýsýtlama (Constraint) yaratma iþlemi baþarýsýz oldu.';
	$lang['strconfdropconstraint'] = '"%s" üzerindeki "%s" kýsýtlamasýný (constraint) kaldýrmak istiyor musunuz?';
	$lang['strconstraintdropped'] = 'Kýsýtlama (Constraint) kaldýrýldý';
	$lang['strconstraintdroppedbad'] = 'Kýsýtlama (Constraint) iþlemi baþarýsýz oldu.';
	$lang['straddcheck'] = 'Kontrol (Check) ekle';
	$lang['strcheckneedsdefinition'] = 'Kontrol (Check) kýsýtlamasý (constraint) için bir taným girilmelidir.';
	$lang['strcheckadded'] = 'Kontrol kýsýtlamasý (Check constraint) eklendi.';
	$lang['strcheckaddedbad'] = 'Kontrol kýsýtlamasý (Check constraint) ekleme iþlemi baþarýsýz oldu.';
	$lang['straddpk'] = 'Birincil Anahtar Ekle';
	$lang['strpkneedscols'] = 'Birincil anahtar için en az bir kolon gereklidir.';
	$lang['strpkadded'] = 'Birincil anahtar eklendi.';
	$lang['strpkaddedbad'] = 'Birincil anahtar eklenemedi.';
	$lang['stradduniq'] = 'Tekil (Unique) anahtar ekle';
	$lang['struniqneedscols'] = 'Tekil anahtar yaratmak için en az bir kolon gerekir.';
	$lang['struniqadded'] = 'Tekil anahtar eklendi.';
	$lang['struniqaddedbad'] = 'Tekil anahtar eklenemedi.';
	$lang['straddfk'] = 'Ýkincil anahtar ekle';
	$lang['strfkneedscols'] = 'Ýkincil anahtar yaratmak için en az bir kolon gerekir.';
	$lang['strfkneedstarget'] = 'Ýkincil anahtar hedef bir tablo gerektirir.';
	$lang['strfkadded']  =  'Ýkincil anahtar eklendi.';
	$lang['strfkaddedbad'] = 'Ýkincil anahtar eklenemedi.';
	$lang['strfktarget'] = 'Hedef tablo';

	$lang['strfkcolumnlist'] = 'Anahtardaki kolonlar';
	$lang['strondelete'] = 'ON DELETE';
	$lang['stronupdate'] = 'ON UPDATE';
	// Functions
	$lang['strfunction'] = 'Fonksiyon';
	$lang['strfunctions'] = 'Fonksiyonlar';
	$lang['strshowallfunctions'] = 'Tüm fonksiyonlarý göster';
	$lang['strnofunction'] = 'Fonksiyon bulunamadý.';
	$lang['strnofunctions'] = 'Fonksiyon bulunamadý.';
	$lang['strcreateplfunction'] = 'SQL/PL fonksiyonu yarat';
        $lang['strcreateinternalfunction'] = 'Ýç (internal) fonksiyon yarat';
        $lang['strcreatecfunction'] = 'C fonksiyonu yarat';
	$lang['strfunctionname'] = 'Fonksiyon adý';
	$lang['strreturns'] = 'Dönderilen deðer';
	$lang['strarguments'] = 'Argümanlar';
	$lang['strproglanguage'] = 'Dil';
	$lang['strfunctionneedsname'] = 'Fonksiyona bir ad vermelisiniz.';
	$lang['strfunctionneedsdef'] = 'Fonksiyona bir taným vermelisiniz.';
	$lang['strfunctioncreated'] = 'Fonksiyon yaratýldý.';
	$lang['strfunctioncreatedbad'] = 'Fonksiyon yaratma iþlemi baþarýsýz oldu.';
	$lang['strconfdropfunction'] = '"%s" fonksiyonunu kaldýrmak istediðinize emin misiniz?';
	$lang['strfunctiondropped'] = 'Fonksiyon kaldýrýldý.';
	$lang['strfunctiondroppedbad'] = 'Fonksiyon kaldýrma iþlemi baþarýsýz oldu.';
	$lang['strfunctionupdated'] = 'Fonksiyon güncellendi.';
	$lang['strfunctionupdatedbad'] = 'Function güncelleme iþlemi baþarýsýz oldu.';
	$lang['strobjectfile'] = 'Nesne dosyasý';
        $lang['strlinksymbol'] = 'Baðlantý sembolü';

	// Triggers
	$lang['strtrigger'] = 'Trigger';
	$lang['strtriggers'] = 'Triggerlar';
	$lang['strshowalltriggers'] = 'Tüm triggerlarý göster';
	$lang['strnotrigger'] = 'Trigger bulunamadý.';
	$lang['strnotriggers'] = 'Trigger bulunamadý.';
	$lang['strcreatetrigger'] = 'Yeni trigger yarat';
	$lang['strtriggerneedsname'] = 'Trigger için bir ad belirtmelisiniz.';
	$lang['strtriggerneedsfunc'] = 'Trigger için bir fonksiyon belirtmelisiniz.';
	$lang['strtriggercreated'] = 'Trigger yaratýldý.';
	$lang['strtriggercreatedbad'] = 'Trigger yaratýlamadý.';
	$lang['strconfdroptrigger'] = '"%s" triggerini "%s" tablosundan kaldýrmak istediðinize emin misiniz?';
	$lang['strtriggerdropped'] = 'Trigger silindi.';
	$lang['strtriggerdroppedbad'] = 'Trigger silinme iþlemi baþarýsýz oldu.';
	$lang['strtriggeraltered']  =  'Trigger deðiþtirildi.';
	$lang['strtriggeralteredbad']  =  'Trigger deðiþtirilme iþlemi baþarýsýz oldu.';
	$lang['strforeach']  =  'Her bir';

	// Types
	$lang['strtype'] = 'Veri tipi';
	$lang['strtypes'] = 'Veri tipleri';
	$lang['strshowalltypes'] = 'Tüm veri tiplerini göster';
	$lang['strnotype'] = 'Hiç veri tipi bulunamadý.';
	$lang['strnotypes'] = 'Hiç veri tipi bulunamadý.';
	$lang['strcreatetype'] = 'Yeni veri tipi yarat';
        $lang['strcreatecomptype'] = 'Karmaþýk veri tipi yarat';
        $lang['strtypeneedsfield'] = 'En az bir alan belirtmelisiniz.';
        $lang['strtypeneedscols'] = 'Geçerli bir alan sayýsý belirtmelisiniz.';
	$lang['strtypename'] = 'Veri tipi adý';
	$lang['strinputfn'] = 'Giriþ (Input) fonksiyonu';
	$lang['stroutputfn'] = 'Çýkýþ (Output) fonksiyonu';
	$lang['strpassbyval'] = 'Passed by val?';
	$lang['stralignment'] = 'Alignment';
	$lang['strelement'] = 'Eleman';
	$lang['strdelimiter'] = 'Delimiter';
	$lang['strstorage'] = 'Storage';
	$lang['strfield']  =  'Alan';
	$lang['strnumfields']  =  'Alanlarýn sayýsý';

	$lang['strtypeneedsname'] = 'Veri tipi için bir ad vermelisiniz.';
	$lang['strtypeneedslen'] = 'Veri tipiniz için bir uzunluk belirtmelisiniz.';
	$lang['strtypecreated'] = 'Veri tipi yaratýldý';
	$lang['strtypecreatedbad'] = 'Veri tipi yaratýlamadý.';
	$lang['strconfdroptype'] = '"%s" veri tipini kaldýrmak istediðinize emin misiniz?';
	$lang['strtypedropped'] = 'Veri tipi kaldýrýldý.';
	$lang['strtypedroppedbad'] = 'Veri tipi kaldýrýlamadý.';
        $lang['strflavor'] = 'Flavor';
        $lang['strbasetype'] = 'Base';
        $lang['strcompositetype'] = 'Composite';
        $lang['strpseudotype'] = 'Pseudo';

	// Schemas
	$lang['strschema'] = 'Þema';
	$lang['strschemas'] = 'Þemalar';
	$lang['strshowallschemas'] = 'Tüm þemalarý göster';
	$lang['strnoschema'] = 'Bir þema bulunamadý.';
	$lang['strnoschemas'] = 'Bir þema bulunamadý.';
	$lang['strcreateschema'] = 'Þema yarat';
	$lang['strschemaname'] = 'Þema adý';
	$lang['strschemaneedsname'] = 'Þema için bir ad belirtmelisiniz.';
	$lang['strschemacreated'] = 'Þema yaratýldý';
	$lang['strschemacreatedbad'] = 'Þema yaratma iþlemi baþarýsýz oldu';
	$lang['strconfdropschema'] = '"%s" þemasýný kaldýrmak istediðinize emin misiniz?';
	$lang['strschemadropped'] = 'Þema kaldýrýldý.';
	$lang['strschemadroppedbad'] = 'Þema kaldýrma iþlemi baþarýsýz oldu.';
	$lang['strschemaaltered']  =  'Schema deðiþtirildi.';
	$lang['strschemaalteredbad']  =  'Schema deðiþtirilme iþlemi baþarýsýz oldu.';
	$lang['strsearchpath'] = 'Þema arama yolu';

	// Reports
	$lang['strreport'] = 'Rapor';
	$lang['strreports'] = 'Raporlar';
	$lang['strshowallreports'] = 'Tüm raporlarý göster';
	$lang['strnoreports'] = 'Hiçbir rapor bulunamadý';
	$lang['strcreatereport'] = 'Rapor yaratýldý.';
	$lang['strreportdropped'] = 'Rapor silindi';
	$lang['strreportdroppedbad'] = 'Rapor silme iþi baþarýsýz oldu.';
	$lang['strconfdropreport'] = '"%s" raporunu silmek istediðinize emin misiniz?';
	$lang['strreportneedsname'] = 'Raporunuza bir ad vermelisiniz.';
	$lang['strreportneedsdef'] = 'Raporunuz için SQL sorgularý yazmalýsýnýz.';
	$lang['strreportcreated'] = 'Rapor kaydedildi.';
	$lang['strreportcreatedbad'] = 'Rapor kaydetme baþarýsýz oldu.';
	$lang['strdomain'] = 'Domain';
	$lang['strdomains'] = 'Domainler';
	$lang['strshowalldomains'] = 'Tüm domainleri göster.';
	$lang['strnodomains'] = 'Hiçbir domain bulunamadý.';
	$lang['strcreatedomain'] = 'Domain yarat';
	$lang['strdomaindropped'] = 'Domain silindi.';
	$lang['strdomaindroppedbad'] = 'Domain silme baþarýsýz oldu.';
	$lang['strconfdropdomain'] = '"%s" domain\'ini silmek istediðinize emin misiniz??';
	$lang['strdomainneedsname'] = 'Domain için bir ad vermelisiniz.';
	$lang['strdomaincreated'] = 'Domain yaratýldý.';
	$lang['strdomaincreatedbad'] = 'Domain yaratma baþarýsýz oldu.';
	$lang['strdomainaltered'] = 'Domain alter edildi.';
	$lang['strdomainalteredbad'] = 'Domain alter iþlemi baþarýsýz oldu.';

	$lang['stroperator'] = 'Operatör';
	$lang['stroperators']  =  'Operatörler';
	$lang['strshowalloperators'] = 'Tüm operatörleri göster';
	$lang['strnooperator'] = 'Operatör bulunamadý.';
	$lang['strnooperators'] = 'Operatör bulunamadý.';
	$lang['strcreateoperator'] = 'Operatör yaratýldý.';
	$lang['strleftarg'] = 'Sol Arg Tipi';
	$lang['strrightarg'] = 'Sað Arg Tipi';
	$lang['strcommutator'] = 'Commutator';
	$lang['strnegator'] = 'Negator';
	$lang['strrestrict'] = 'Restrict';
	$lang['strjoin'] = 'Join';
	$lang['strhashes'] = 'Hashes';
	$lang['strmerges'] = 'Merges';
	$lang['strleftsort'] = 'Left sort';
	$lang['strrightsort'] = 'Right sort';
	$lang['strlessthan'] = 'küçüktür';
	$lang['strgreaterthan'] = 'büyüktür';
	$lang['stroperatorneedsname']  =  'Operatöre bir ad vermelisiniz.';
	$lang['stroperatorcreated']  =  'Operatör yaratýldý';
	$lang['stroperatorcreatedbad']  =  'Operatör yaratma iþlemi baþarýsýz oldu.';
	$lang['strconfdropoperator']  =  '"%s" operatörünü kaldýrmak istediðinize emin misiniz?';
	$lang['stroperatordropped']  =  'Operatör kaldýrýldý.';
	$lang['stroperatordroppedbad']  =  'Operator kaldýrma iþlemi baþarýsýz oldu.';

	// Casts
	$lang['strcasts'] = 'Casts';
	$lang['strnocasts'] = 'Hiç cast bulunamadý.';
	$lang['strsourcetype'] = 'Kaynak tip';
	$lang['strtargettype'] = 'Hedef tip';
	$lang['strimplicit'] = 'Implicit';
	$lang['strinassignment'] = 'In assignment';
	$lang['strbinarycompat'] = '(Binary uyumlu)';
	
	// Conversions
	$lang['strconversions'] = 'Dönüþümleri';
	$lang['strnoconversions'] = 'Hiç dönüþüm bulunamadý.';
	$lang['strsourceencoding'] = 'Kaynak dil kodlamasý';
	$lang['strtargetencoding'] = 'Hedef dil kodlamasý';
	
	// Languages
	$lang['strlanguages'] = 'Diller';
	$lang['strnolanguages'] = 'Hiç bir dil bulunamadý.';
	$lang['strtrusted'] = 'Güvenilir';
	
	// Info
	$lang['strnoinfo'] = 'Hiç bir bilgi yok.';
	$lang['strreferringtables'] = 'Referring tables';
	$lang['strparenttables'] = 'Parent tablolar';
	$lang['strchildtables'] = 'Child tablolar';
	
	// Aggregates
	$lang['straggregates']  =  'Aggregate';
	$lang['strnoaggregates'] = 'Hiç aggregate bulunamadý.';
	$lang['stralltypes'] = '(Tüm veri tipleri)';
	$lang['stropclasses'] = 'Op sýnýflarý';
	$lang['strnoopclasses'] = 'Hiç operatör sýnýfý bulunamadý.';
	$lang['straccessmethod'] = 'Eriþim Yöntemi';
	$lang['strrowperf'] = 'Satýr Baþarýmý';
	$lang['strioperf'] = 'I/O Baþarýmý';
	$lang['stridxrowperf'] = 'Index Satýr Baþarýmý';
	$lang['stridxioperf'] = 'Index I/O Baþarýmý';
	$lang['strpercent'] = '%';
	$lang['strsequential'] = 'Sequential';
	$lang['strscan'] = 'Scan';
	$lang['strread'] = 'Read';
	$lang['strfetch'] = 'Fetch';
	$lang['strheap'] = 'Heap';
	$lang['strtoast'] = 'TOAST';
	$lang['strtoastindex'] = 'TOAST Index';
	$lang['strcache'] = 'Cache';
	$lang['strdisk'] = 'Disk';
	$lang['strrows2'] = 'Rows';

	// Tablespaces
	$lang['strtablespace'] = 'Tablespace';
	$lang['strtablespaces'] = 'Tablespaceler';
	$lang['strshowalltablespaces'] = 'Tüm tablespaceleri göster';
	$lang['strnotablespaces'] = 'Hiç tablespace bulunamadý.';
	$lang['strcreatetablespace'] = 'Tablespace yarat';
	$lang['strlocation'] = 'Yer';
	$lang['strtablespaceneedsname'] = 'Tablespace\'e bir ad vermelisiniz.';
	$lang['strtablespaceneedsloc'] = 'Tablespace\'in yaratýlacaðý dizini belirtmelisiniz';
	$lang['strtablespacecreated'] = 'Tablespace yaratýldý.';
	$lang['strtablespacecreatedbad'] = 'Tablespace yaratýlamadý.';
	$lang['strconfdroptablespace'] = '"%s" adlý tablespace\'i kaldýrmak istediðinize emin misiniz?';
	$lang['strtablespacedropped'] = 'Tablespace kaldýrýldý.';
	$lang['strtablespacedroppedbad'] = 'Tablespace kaldýrýlamadý.';
	$lang['strtablespacealtered'] = 'Tablespace deðiþtirildi.';
	$lang['strtablespacealteredbad'] = 'Tablespace deðiþtirilemedi.';

	// Slony clusters
	$lang['strcluster']  =  'Küme';
	$lang['strnoclusters']  =  'Hiç küme bulunamadý.';
	$lang['strconfdropcluster']  =  '"%s" kümesini kaldýrmak istediðinize emin misiniz?';
	$lang['strclusterdropped']  =  'Küme kaldýrýldý.';
	$lang['strclusterdroppedbad']  =  'Küme kaldýrma iþlemi baþarýsýz oldu.';
	$lang['strinitcluster']  =  'Kümeyi ilklendir';
	$lang['strclustercreated']  =  'Küme ilklendirildi.';
	$lang['strclustercreatedbad']  =  'Küme ilklendirme baþarýsýz oldu.';
	$lang['strclusterneedsname']  =  'Küme için bir ad vermelisiniz.';
	$lang['strclusterneedsnodeid']  =  'Yerel uç için bir ID vermelisiniz.';
	
	// Slony nodes
	$lang['strnodes']  =  'Uçlar';
	$lang['strnonodes']  =  'Hiç uç bulunamadý.';
	$lang['strcreatenode']  =  'Uç yarat';
	$lang['strid']  =  'ID';
	$lang['stractive']  =  'Etkin';
	$lang['strnodecreated']  =  'Uç yaratýldý.';
	$lang['strnodecreatedbad']  =  'Uç yaratma baþarýsýz oldu.';
	$lang['strconfdropnode']  =  '"%s" adlý ucu kaldýrmak istediðinize emin misiniz?';
	$lang['strnodedropped']  =  'Uç kaldýrýldý.';
	$lang['strnodedroppedbad']  =  'Uç kaldýrma baþarýsýz oldu.';
	$lang['strfailover']  =  'Failover';
$lang['strnodefailedover']  =  'Node failed over.';
$lang['strnodefailedoverbad']  =  'Node failover failed.';
	
	// Slony paths	
$lang['strpaths']  =  'Paths';
$lang['strnopaths']  =  'No paths found.';
$lang['strcreatepath']  =  'Create path';
	$lang['strnodename']  =  'Uç adý';
$lang['strnodeid']  =  'Node ID';
$lang['strconninfo']  =  'Connection string';
	$lang['strconnretry']  =  'yeniden baðlanmadan önce kaç saniye gerekecek';
$lang['strpathneedsconninfo']  =  'You must give a connection string for the path.';
$lang['strpathneedsconnretry']  =  'You must give the number of seconds to wait before retry to connect.';
$lang['strpathcreated']  =  'Path created.';
$lang['strpathcreatedbad']  =  'Path creation failed.';
$lang['strconfdroppath']  =  'Are you sure you want to drop path "%s"?';
$lang['strpathdropped']  =  'Path dropped.';
$lang['strpathdroppedbad']  =  'Path drop failed.';

	// Slony listens
$lang['strlistens']  =  'Listens';
$lang['strnolistens']  =  'No listens found.';
$lang['strcreatelisten']  =  'Create listen';
$lang['strlistencreated']  =  'Listen created.';
$lang['strlistencreatedbad']  =  'Listen creation failed.';
$lang['strconfdroplisten']  =  'Are you sure you want to drop listen "%s"?';
$lang['strlistendropped']  =  'Listen dropped.';
$lang['strlistendroppedbad']  =  'Listen drop failed.';

	// Slony replication sets
	$lang['strrepsets']  =  'Replikasyon kümesi';
	$lang['strnorepsets']  =  'Hiç replikasyon kümesi bulunamadý.';
	$lang['strcreaterepset']  =  'Replikasyon kümesi yarat';
	$lang['strrepsetcreated']  =  'Replikasyon kümesi yaratýldý.';
	$lang['strrepsetcreatedbad']  =  'Replikasyon kümesi yaratma baþarýsýz oldu.';
$lang['strconfdroprepset']  =  'Are you sure you want to drop replication set "%s"?';
	$lang['strrepsetdropped']  =  'Replikasyon kümesi kaldýrýldý.';
	$lang['strrepsetdroppedbad']  =  'Replikasyon kümesi kaldýrma baþarýsýz oldu.';
$lang['strmerge']  =  'Merge';
$lang['strmergeinto']  =  'Merge into';
$lang['strrepsetmerged']  =  'Replication sets merged.';
$lang['strrepsetmergedbad']  =  'Replication sets merge failed.';
	$lang['strmove']  =  'Taþý';
$lang['strneworigin']  =  'New origin';
	$lang['strrepsetmoved']  =  'Replikasyon kümesi taþýndý.';
	$lang['strrepsetmovedbad']  =  'Replikasyon kümesi taþýma baþarýsýz oldu.';
	$lang['strnewrepset']  =  'Yeni replikasyon kümesi';
	$lang['strlock']  =  'Kilitle';
	$lang['strlocked']  =  'Kilitlendi';
	$lang['strunlock']  =  'Kilidi aç';
	$lang['strconflockrepset']  =  '"%s" replikasyon kümesini kilitlemek istediðinize emin misiniz?';
	$lang['strrepsetlocked']  =  'Replikasyon kümesi kilitlendi.';
	$lang['strrepsetlockedbad']  =  'Replikasyon kümesi kilitleme baþarýsýz oldu.';
$lang['strconfunlockrepset']  =  'Are you sure you want to unlock replication set "%s"?';
	$lang['strrepsetunlocked']  =  'Replikasyon kümesinin kilidi açýldý.';
$lang['strrepsetunlockedbad']  =  'Replikasyon kümesi kilit açma baþarýsýz oldu.';
$lang['strexecute']  =  'Execute';
$lang['stronlyonnode']  =  'Only on node';
	$lang['strddlscript']  =  'DDL betiði';
$lang['strscriptneedsbody']  =  'You must supply a script to be executed on all nodes.';
$lang['strscriptexecuted']  =  'Replication set DDL script executed.';
$lang['strscriptexecutedbad']  =  'Failed executing replication set DDL script.';
$lang['strtabletriggerstoretain']  =  'The following triggers will NOT be disabled by Slony:';

	// Slony tables in replication sets
	$lang['straddtable']  =  'Tablo ekle';
$lang['strtableneedsuniquekey']  =  'Table to be added requires a primary or unique key.';
$lang['strtableaddedtorepset']  =  'Table added to replication set.';
$lang['strtableaddedtorepsetbad']  =  'Failed adding table to replication set.';
$lang['strconfremovetablefromrepset']  =  'Are you sure you want to remove the table "%s" from replication set "%s"?';
$lang['strtableremovedfromrepset']  =  'Table removed from replication set.';
$lang['strtableremovedfromrepsetbad']  =  'Failed to remove table from replication set.';

	// Slony sequences in replication sets
$lang['straddsequence']  =  'Add sequence';
$lang['strsequenceaddedtorepset']  =  'Sequence added to replication set.';
$lang['strsequenceaddedtorepsetbad']  =  'Failed adding sequence to replication set.';
$lang['strconfremovesequencefromrepset']  =  'Are you sure you want to remove the sequence "%s" from replication set "%s"?';
$lang['strsequenceremovedfromrepset']  =  'Sequence removed from replication set.';
$lang['strsequenceremovedfromrepsetbad']  =  'Failed to remove sequence from replication set.';

	// Slony subscriptions
	$lang['strsubscriptions']  =  'Üyelikler';
	$lang['strnosubscriptions']  =  'Üyelik bulunamadý.';

	// Miscellaneous
	$lang['strtopbar']  =  '%s, %s:%s üzerinde çalýþýyor-- "%s" kullanýcýsý ile sisteme giriþ yaptýnýz.';
        $lang['strtimefmt']  =  'jS M, Y g:iA';
        $lang['strhelp']  =  'Yardým';
	$lang['strhelpicon'] = '?';
	$lang['strlogintitle']  =  '%s\'e giriþ yap';
	$lang['strlogoutmsg']  =  '%s\'den çýkýldý.';
	$lang['strloading']  =  'Yükleniyor...';
	$lang['strerrorloading']  =  'Yükleme hatasý';
	$lang['strclicktoreload']  =  'Yeniden yüklemek için týklayýn.';

?>

