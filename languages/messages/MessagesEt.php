<?php
/** Estonian (eesti)
 *
 * See MessagesQqq.php for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 * @author Avjoska
 * @author Cylly1512
 * @author Hendrik
 * @author Hendrix
 * @author Jaan513
 * @author Kaganer
 * @author KaidoKikkas
 * @author KalmerE.
 * @author Ker
 * @author Kyng
 * @author Oop
 * @author Pikne
 * @author Silvar
 * @author Võrok
 * @author WikedKentaur
 * @author לערי ריינהארט
 */

$namespaceNames = array(
	NS_MEDIA            => 'Meedia',
	NS_SPECIAL          => 'Eri',
	NS_TALK             => 'Arutelu',
	NS_USER             => 'Kasutaja',
	NS_USER_TALK        => 'Kasutaja_arutelu',
	NS_PROJECT_TALK     => '{{GRAMMAR:genitive|$1}}_arutelu',
	NS_FILE             => 'Pilt',
	NS_FILE_TALK        => 'Pildi_arutelu',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'MediaWiki_arutelu',
	NS_TEMPLATE         => 'Mall',
	NS_TEMPLATE_TALK    => 'Malli_arutelu',
	NS_HELP             => 'Juhend',
	NS_HELP_TALK        => 'Juhendi_arutelu',
	NS_CATEGORY         => 'Kategooria',
	NS_CATEGORY_TALK    => 'Kategooria_arutelu',
);

$namespaceAliases = array(
	'$1_arutelu' => NS_PROJECT_TALK,
);

$specialPageAliases = array(
	'Activeusers'               => array( 'Teguskasutajad' ),
	'Allmessages'               => array( 'Kõik_sõnumid' ),
	'Allpages'                  => array( 'Kõik_leheküljed' ),
	'Ancientpages'              => array( 'Vanimad_leheküljed' ),
	'Blankpage'                 => array( 'Tühi_leht' ),
	'Block'                     => array( 'Blokeerimine' ),
	'Booksources'               => array( 'Raamatuotsimine', 'Otsi_raamatut' ),
	'BrokenRedirects'           => array( 'Vigased_ümbersuunamised' ),
	'Categories'                => array( 'Kategooriad' ),
	'ChangeEmail'               => array( 'E-posti_aadressi_muutmine' ),
	'ChangePassword'            => array( 'Parooli_muutmine', 'Muuda_parool' ),
	'ComparePages'              => array( 'Lehekülgede_kõrvutamine' ),
	'Confirmemail'              => array( 'E-posti_aadressi_kinnitamine' ),
	'Contributions'             => array( 'Kaastöö' ),
	'CreateAccount'             => array( 'Konto_loomine' ),
	'Deadendpages'              => array( 'Edasipääsuta_leheküljed' ),
	'DeletedContributions'      => array( 'Kustutatud_kaastöö' ),
	'Disambiguations'           => array( 'Täpsustusleheküljed' ),
	'DoubleRedirects'           => array( 'Kahekordsed_ümbersuunamised' ),
	'EditWatchlist'             => array( 'Jälgimisloendi_redigeerimine' ),
	'Emailuser'                 => array( 'E-kirja_saatmine' ),
	'Export'                    => array( 'Lehekülgede_eksport' ),
	'Fewestrevisions'           => array( 'Vähim_muudatusi' ),
	'FileDuplicateSearch'       => array( 'Faili_duplikaatide_otsimine', 'Otsi_faili_duplikaate' ),
	'Filepath'                  => array( 'Failitee' ),
	'Import'                    => array( 'Lehekülgede_import' ),
	'Invalidateemail'           => array( 'E-posti_kinnituse_tühistamine', 'Tühista_e-posti_kinnitus' ),
	'JavaScriptTest'            => array( 'JavaScripti_katsetamine' ),
	'BlockList'                 => array( 'Blokeerimisloend' ),
	'LinkSearch'                => array( 'Välislinkide_otsimine', 'Otsi_välislinke' ),
	'Listadmins'                => array( 'Ülemaloend' ),
	'Listbots'                  => array( 'Robotiloend' ),
	'Listfiles'                 => array( 'Failide_loend' ),
	'Listgrouprights'           => array( 'Kasutajarühma_õigused' ),
	'Listredirects'             => array( 'Ümbersuunamised' ),
	'Listusers'                 => array( 'Kasutajate_loend' ),
	'Lockdb'                    => array( 'Andmebaasi_lukustamine', 'Lukusta_andmebaas' ),
	'Log'                       => array( 'Logid' ),
	'Lonelypages'               => array( 'Viitamata_leheküljed' ),
	'Longpages'                 => array( 'Pikad_leheküljed' ),
	'MergeHistory'              => array( 'Liitmisajalugu' ),
	'MIMEsearch'                => array( 'MIME_otsing' ),
	'Mostcategories'            => array( 'Enim_kategoriseeritud' ),
	'Mostimages'                => array( 'Kõige_kasutatumad_failid' ),
	'Mostlinked'                => array( 'Kõige_viidatumad_leheküljed' ),
	'Mostlinkedcategories'      => array( 'Kõige_viidatumad_kategooriad' ),
	'Mostlinkedtemplates'       => array( 'Kõige_viidatumad_mallid' ),
	'Mostrevisions'             => array( 'Enim_muudatusi' ),
	'Movepage'                  => array( 'Teisaldamine', 'Teisalda' ),
	'Mycontributions'           => array( 'Minu_kaastöö' ),
	'Mypage'                    => array( 'Minu_lehekülg' ),
	'Mytalk'                    => array( 'Minu_aruteluleht' ),
	'Myuploads'                 => array( 'Minu_üleslaaditu' ),
	'Newimages'                 => array( 'Uued_failid' ),
	'Newpages'                  => array( 'Uued_leheküljed' ),
	'PasswordReset'             => array( 'Parooli_lähtestamine' ),
	'Popularpages'              => array( 'Loetumad_leheküljed' ),
	'Preferences'               => array( 'Eelistused' ),
	'Prefixindex'               => array( 'Kõik_pealkirjad_eesliitega' ),
	'Protectedpages'            => array( 'Kaitstud_leheküljed' ),
	'Protectedtitles'           => array( 'Kaitstud_pealkirjad' ),
	'Randompage'                => array( 'Juhuslik_artikkel' ),
	'Randomredirect'            => array( 'Juhuslik_ümbersuunamine' ),
	'Recentchanges'             => array( 'Viimased_muudatused' ),
	'Recentchangeslinked'       => array( 'Seotud_muudatused' ),
	'Revisiondelete'            => array( 'Muudatuse_kustutamine', 'Kustuta_muudatus' ),
	'Search'                    => array( 'Otsimine', 'Otsi' ),
	'Shortpages'                => array( 'Lühikesed_leheküljed' ),
	'Specialpages'              => array( 'Erileheküljed' ),
	'Statistics'                => array( 'Arvandmestik' ),
	'Tags'                      => array( 'Märgised' ),
	'Unblock'                   => array( 'Blokeerimise_eemaldamine' ),
	'Uncategorizedcategories'   => array( 'Kategoriseerimata_kategooriad' ),
	'Uncategorizedimages'       => array( 'Kategoriseerimata_failid' ),
	'Uncategorizedpages'        => array( 'Kategoriseerimata_leheküljed' ),
	'Uncategorizedtemplates'    => array( 'Kategoriseerimata_mallid' ),
	'Undelete'                  => array( 'Lehekülje_taastamine', 'Taasta_lehekülg' ),
	'Unlockdb'                  => array( 'Andmebaasi_avamine', 'Ava_andmebaas' ),
	'Unusedcategories'          => array( 'Kasutamata_kategooriad' ),
	'Unusedimages'              => array( 'Kasutamata_failid' ),
	'Unusedtemplates'           => array( 'Kasutamata_mallid' ),
	'Unwatchedpages'            => array( 'Jälgimata_leheküljed' ),
	'Upload'                    => array( 'Faili_üleslaadimine' ),
	'UploadStash'               => array( 'Üleslaaditu_alghoidla' ),
	'Userlogin'                 => array( 'Sisselogimine' ),
	'Userlogout'                => array( 'Väljalogimine' ),
	'Userrights'                => array( 'Kasutaja_õigused' ),
	'Version'                   => array( 'Versioon' ),
	'Wantedcategories'          => array( 'Oodatud_kategooriad' ),
	'Wantedfiles'               => array( 'Oodatud_failid' ),
	'Wantedpages'               => array( 'Oodatud_leheküljed' ),
	'Wantedtemplates'           => array( 'Oodatud_mallid' ),
	'Watchlist'                 => array( 'Jälgimisloend' ),
	'Whatlinkshere'             => array( 'Lingid_siia' ),
	'Withoutinterwiki'          => array( 'Ilma_keelelinkideta' ),
);

# Lisasin eestimaised poed, aga võõramaiseid ei julenud kustutada.
$bookstoreList = array(
	'Apollo' => 'http://www.apollo.ee/search.php?keyword=$1&search=OTSI',
	'minu Raamat' => 'http://www.raamat.ee/advanced_search_result.php?keywords=$1',
	'Raamatukoi' => 'http://www.raamatukoi.ee/cgi-bin/index?valik=otsing&paring=$1',
	'AddALL' => 'http://www.addall.com/New/Partner.cgi?query=$1&type=ISBN',
	'PriceSCAN' => 'http://www.pricescan.com/books/bookDetail.asp?isbn=$1',
	'Barnes & Noble' => 'http://search.barnesandnoble.com/bookSearch/isbnInquiry.asp?isbn=$1',
	'Amazon.com' => 'http://www.amazon.com/exec/obidos/ISBN=$1'
);

$magicWords = array(
	'redirect'                => array( '0', '#suuna', '#REDIRECT' ),
	'notoc'                   => array( '0', '__SISUKORRATA__', '__NOTOC__' ),
	'nogallery'               => array( '0', '__GALERIITA__', '__NOGALLERY__' ),
	'forcetoc'                => array( '0', '__SISUKORDEES__', '__FORCETOC__' ),
	'toc'                     => array( '0', '__SISUKORD__', '__TOC__' ),
	'noeditsection'           => array( '0', '__ALAOSALINGITA__', '__NOEDITSECTION__' ),
	'currentmonth'            => array( '1', 'HETKEKUU', 'CURRENTMONTH', 'CURRENTMONTH2' ),
	'currentmonth1'           => array( '1', 'HETKEKUU1', 'CURRENTMONTH1' ),
	'currentmonthname'        => array( '1', 'HETKEKUUNIMETUS', 'CURRENTMONTHNAME' ),
	'currentday'              => array( '1', 'HETKEKUUPÄEV', 'CURRENTDAY' ),
	'currentday2'             => array( '1', 'HETKEKUUPÄEV2', 'CURRENTDAY2' ),
	'currentdayname'          => array( '1', 'HETKENÄDALAPÄEV', 'CURRENTDAYNAME' ),
	'currentyear'             => array( '1', 'HETKEAASTA', 'CURRENTYEAR' ),
	'currenttime'             => array( '1', 'HETKEAEG', 'CURRENTTIME' ),
	'currenthour'             => array( '1', 'HETKETUND', 'CURRENTHOUR' ),
	'localmonth'              => array( '1', 'KOHALIKKUU', 'LOCALMONTH', 'LOCALMONTH2' ),
	'localmonth1'             => array( '1', 'KOHALIKKUU1', 'LOCALMONTH1' ),
	'localmonthname'          => array( '1', 'KOHALIKKUUNIMETUS', 'LOCALMONTHNAME' ),
	'localday'                => array( '1', 'KOHALIKKUUPÄEV', 'LOCALDAY' ),
	'localday2'               => array( '1', 'KOHALIKKUUPÄEV2', 'LOCALDAY2' ),
	'localdayname'            => array( '1', 'KOHALIKNÄDALAPÄEV', 'LOCALDAYNAME' ),
	'localyear'               => array( '1', 'KOHALIKAASTA', 'LOCALYEAR' ),
	'localtime'               => array( '1', 'KOHALIKAEG', 'LOCALTIME' ),
	'localhour'               => array( '1', 'KOHALIKTUND', 'LOCALHOUR' ),
	'numberofpages'           => array( '1', 'LEHEMÄÄR', 'NUMBEROFPAGES' ),
	'numberofarticles'        => array( '1', 'ARTIKLIMÄÄR', 'NUMBEROFARTICLES' ),
	'numberoffiles'           => array( '1', 'FAILIMÄÄR', 'NUMBEROFFILES' ),
	'numberofusers'           => array( '1', 'KASUTAJAMÄÄR', 'NUMBEROFUSERS' ),
	'numberofactiveusers'     => array( '1', 'TEGUSKASUTAJAMÄÄR', 'NUMBEROFACTIVEUSERS' ),
	'numberofedits'           => array( '1', 'REDIGEERIMISMÄÄR', 'NUMBEROFEDITS' ),
	'numberofviews'           => array( '1', 'VAATAMISTEARV', 'NUMBEROFVIEWS' ),
	'pagename'                => array( '1', 'LEHEKÜLJENIMI', 'PAGENAME' ),
	'pagenamee'               => array( '1', 'LEHEKÜLJENIMI1', 'PAGENAMEE' ),
	'namespace'               => array( '1', 'NIMERUUM', 'NAMESPACE' ),
	'namespacee'              => array( '1', 'NIMERUUM1', 'NAMESPACEE' ),
	'talkspace'               => array( '1', 'ARUTELUNIMERUUM', 'TALKSPACE' ),
	'talkspacee'              => array( '1', 'ARUTELUNIMERUUM1', 'TALKSPACEE' ),
	'subjectspace'            => array( '1', 'SISUNIMERUUM', 'SUBJECTSPACE', 'ARTICLESPACE' ),
	'subjectspacee'           => array( '1', 'SISUNIMERUUM1', 'SUBJECTSPACEE', 'ARTICLESPACEE' ),
	'fullpagename'            => array( '1', 'KOGULEHEKÜLJENIMI', 'FULLPAGENAME' ),
	'fullpagenamee'           => array( '1', 'KOGULEHEKÜLJENIMI1', 'FULLPAGENAMEE' ),
	'subpagename'             => array( '1', 'ALAMLEHEKÜLJENIMI', 'SUBPAGENAME' ),
	'subpagenamee'            => array( '1', 'ALAMLEHEKÜLJENIMI1', 'SUBPAGENAMEE' ),
	'basepagename'            => array( '1', 'NIMERUUMITANIMI', 'BASEPAGENAME' ),
	'basepagenamee'           => array( '1', 'NIMERUUMITANIMI1', 'BASEPAGENAMEE' ),
	'talkpagename'            => array( '1', 'ARUTELUNIMI', 'TALKPAGENAME' ),
	'talkpagenamee'           => array( '1', 'ARUTELUNIMI1', 'TALKPAGENAMEE' ),
	'subst'                   => array( '0', 'ASENDA:', 'SUBST:' ),
	'img_thumbnail'           => array( '1', 'pisi', 'pisipilt', 'thumbnail', 'thumb' ),
	'img_manualthumb'         => array( '1', 'pisi=$1', 'pisipilt=$1', 'thumbnail=$1', 'thumb=$1' ),
	'img_right'               => array( '1', 'paremal', 'right' ),
	'img_left'                => array( '1', 'vasakul', 'left' ),
	'img_none'                => array( '1', 'tühi', 'none' ),
	'img_center'              => array( '1', 'keskel', 'center', 'centre' ),
	'img_framed'              => array( '1', 'raam', 'framed', 'enframed', 'frame' ),
	'img_frameless'           => array( '1', 'raamita', 'frameless' ),
	'img_page'                => array( '1', 'lehekülg=$1', 'lehekülg_$1', 'page=$1', 'page $1' ),
	'img_border'              => array( '1', 'ääris', 'border' ),
	'sitename'                => array( '1', 'KOHANIMI', 'SITENAME' ),
	'ns'                      => array( '0', 'NR:', 'NS:' ),
	'nse'                     => array( '0', 'NR1:', 'NSE:' ),
	'localurl'                => array( '0', 'KOHALIKURL', 'LOCALURL:' ),
	'localurle'               => array( '0', 'KOHALIKURL1', 'LOCALURLE:' ),
	'servername'              => array( '0', 'SERVERINIMI', 'SERVERNAME' ),
	'gender'                  => array( '0', 'SUGU:', 'GENDER:' ),
	'currentweek'             => array( '1', 'HETKENÄDAL', 'CURRENTWEEK' ),
	'currentdow'              => array( '1', 'HETKENÄDALAPÄEV1', 'CURRENTDOW' ),
	'localweek'               => array( '1', 'KOHALIKNÄDAL', 'LOCALWEEK' ),
	'localdow'                => array( '1', 'KOHALIKNÄDALAPÄEV1', 'LOCALDOW' ),
	'fullurl'                 => array( '0', 'KOGUURL:', 'FULLURL:' ),
	'fullurle'                => array( '0', 'KOGUURL1:', 'FULLURLE:' ),
	'lcfirst'                 => array( '0', 'ESIVT:', 'LCFIRST:' ),
	'ucfirst'                 => array( '0', 'ESIST:', 'UCFIRST:' ),
	'lc'                      => array( '0', 'VT:', 'LC:' ),
	'uc'                      => array( '0', 'ST:', 'UC:' ),
	'displaytitle'            => array( '1', 'PEALKIRI', 'DISPLAYTITLE' ),
	'newsectionlink'          => array( '1', '__UUEALAOSALINK__', '__NEWSECTIONLINK__' ),
	'nonewsectionlink'        => array( '1', '__UUEALAOSALINGITA__', '__NONEWSECTIONLINK__' ),
	'currenttimestamp'        => array( '1', 'HETKEAJATEMPEL', 'CURRENTTIMESTAMP' ),
	'localtimestamp'          => array( '1', 'KOHALIKAJATEMPEL', 'LOCALTIMESTAMP' ),
	'language'                => array( '0', '#KEEL:', '#LANGUAGE:' ),
	'contentlanguage'         => array( '1', 'VAIKEKEEL', 'CONTENTLANGUAGE', 'CONTENTLANG' ),
	'pagesinnamespace'        => array( '1', 'LEHEKÜLGINIMERUUMIS', 'PAGESINNAMESPACE:', 'PAGESINNS:' ),
	'numberofadmins'          => array( '1', 'ÜLEMAMÄÄR', 'NUMBEROFADMINS' ),
	'formatnum'               => array( '0', 'ARVUVORMINDUS', 'FORMATNUM' ),
	'defaultsort'             => array( '1', 'JÄRJESTA:', 'DEFAULTSORT:', 'DEFAULTSORTKEY:', 'DEFAULTCATEGORYSORT:' ),
	'hiddencat'               => array( '1', '__PEIDETUDKAT__', '__HIDDENCAT__' ),
	'pagesincategory'         => array( '1', 'LEHEKÜLGIKATEGOORIAS', 'PAGESINCATEGORY', 'PAGESINCAT' ),
	'index'                   => array( '1', 'INDEKSIGA', '__INDEX__' ),
	'noindex'                 => array( '1', 'INDEKSITA', '__NOINDEX__' ),
	'numberingroup'           => array( '1', 'KASUTAJAIDRÜHMAS', 'NUMBERINGROUP', 'NUMINGROUP' ),
	'protectionlevel'         => array( '1', 'KAITSETASE', 'PROTECTIONLEVEL' ),
	'formatdate'              => array( '0', 'kuupäevavormindus', 'formatdate', 'dateformat' ),
);

$separatorTransformTable = array( ',' => "\xc2\xa0", '.' => ',' );
$linkTrail = '/^([äöõšüža-z]+)(.*)$/sDu';

$datePreferences = array(
	'default',
	'et numeric',
	'dmy',
	'et roman',
	'ISO 8601'
);

$datePreferenceMigrationMap = array(
	'default',
	'et numeric',
	'dmy',
	'et roman',
);

$defaultDateFormat = 'dmy';

$dateFormats = array(
	'et numeric time' => 'H:i',
	'et numeric date' => 'd.m.Y',
	'et numeric both' => 'd.m.Y, "kell" H:i',

	'dmy time' => 'H:i',
	'dmy date' => 'j. F Y',
	'dmy both' => 'j. F Y, "kell" H:i',

	'et roman time' => 'H:i',
	'et roman date' => 'j. xrm Y',
	'et roman both' => 'j. xrm Y, "kell" H:i',
);

