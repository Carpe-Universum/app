<?php
/** Interlingua (Interlingua)
 *
 * See MessagesQqq.php for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 * @author Julian Mendez
 * @author Kaganer
 * @author Malafaya
 * @author McDutchie
 * @author Reedy
 * @author לערי ריינהארט
 */

$separatorTransformTable = array( ',' => "\xc2\xa0", '.' => ',' );

$namespaceNames = array(
	NS_MEDIA            => 'Multimedia',
	NS_SPECIAL          => 'Special',
	NS_TALK             => 'Discussion',
	NS_USER             => 'Usator',
	NS_USER_TALK        => 'Discussion_Usator',
	NS_PROJECT_TALK     => 'Discussion_$1',
	NS_FILE             => 'File',
	NS_FILE_TALK        => 'Discussion_File',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'Discussion_MediaWiki',
	NS_TEMPLATE         => 'Patrono',
	NS_TEMPLATE_TALK    => 'Discussion_Patrono',
	NS_HELP             => 'Adjuta',
	NS_HELP_TALK        => 'Discussion_Adjuta',
	NS_CATEGORY         => 'Categoria',
	NS_CATEGORY_TALK    => 'Discussion_Categoria',
);

$namespaceAliases = array(
	'Imagine' => NS_FILE,
	'Discussion_Imagine' => NS_FILE_TALK,
);

$specialPageAliases = array(
	'Activeusers'               => array( 'Usatores_active' ),
	'Allmessages'               => array( 'Tote_le_messages' ),
	'Allpages'                  => array( 'Tote_le_paginas' ),
	'Ancientpages'              => array( 'Paginas_ancian' ),
	'Badtitle'                  => array( 'Titulo_invalide' ),
	'Blankpage'                 => array( 'Pagina_vacue' ),
	'Block'                     => array( 'Blocar', 'Blocar_IP', 'Blocar_usator' ),
	'Blockme'                   => array( 'Blocar_me' ),
	'Booksources'               => array( 'Fontes_de_libros' ),
	'BrokenRedirects'           => array( 'Redirectiones_rupte' ),
	'Categories'                => array( 'Categorias' ),
	'ChangeEmail'               => array( 'Cambiar_e-mail' ),
	'ChangePassword'            => array( 'Cambiar_contrasigno' ),
	'ComparePages'              => array( 'Comparar_paginas' ),
	'Confirmemail'              => array( 'Confirmar_e-mail' ),
	'Contributions'             => array( 'Contributiones' ),
	'CreateAccount'             => array( 'Crear_conto' ),
	'Deadendpages'              => array( 'Paginas_sin_exito' ),
	'DeletedContributions'      => array( 'Contributiones_delite' ),
	'Disambiguations'           => array( 'Disambiguationes' ),
	'DoubleRedirects'           => array( 'Redirectiones_duple' ),
	'EditWatchlist'             => array( 'Modificar_observatorio' ),
	'Emailuser'                 => array( 'Inviar_e-mail_a_un_usator' ),
	'Export'                    => array( 'Exportar' ),
	'Fewestrevisions'           => array( 'Le_minus_versiones' ),
	'FileDuplicateSearch'       => array( 'Recerca_de_files_duplice' ),
	'Filepath'                  => array( 'Cammino_al_file' ),
	'Import'                    => array( 'Importar' ),
	'Invalidateemail'           => array( 'Invalidar_e-mail' ),
	'BlockList'                 => array( 'Lista_de_blocadas', 'Lista_de_blocadas_IP' ),
	'LinkSearch'                => array( 'Recerca_de_ligamines' ),
	'Listadmins'                => array( 'Lista_de_administratores' ),
	'Listbots'                  => array( 'Lista_de_robots' ),
	'Listfiles'                 => array( 'Lista_de_files', 'Lista_de_imagines' ),
	'Listgrouprights'           => array( 'Lista_del_derectos_de_gruppos' ),
	'Listredirects'             => array( 'Lista_de_redirectiones' ),
	'Listusers'                 => array( 'Lista_de_usatores' ),
	'Lockdb'                    => array( 'Blocar_BDD' ),
	'Log'                       => array( 'Registro', 'Registros' ),
	'Lonelypages'               => array( 'Paginas_orphanate' ),
	'Longpages'                 => array( 'Paginas_longe' ),
	'MergeHistory'              => array( 'Fusionar_historia' ),
	'MIMEsearch'                => array( 'Recerca_MIME' ),
	'Mostcategories'            => array( 'Le_plus_categorias' ),
	'Mostimages'                => array( 'Files_le_plus_ligate', 'Le_plus_files', 'Le_plus_imagines' ),
	'Mostlinked'                => array( 'Paginas_le_plus_ligate', 'Le_plus_ligate' ),
	'Mostlinkedcategories'      => array( 'Categorias_le_plus_ligate', 'Categorias_le_plus_usate' ),
	'Mostlinkedtemplates'       => array( 'Patronos_le_plus_ligate', 'Patronos_le_plus_usate' ),
	'Mostrevisions'             => array( 'Le_plus_versiones' ),
	'Movepage'                  => array( 'Renominar_pagina' ),
	'Mycontributions'           => array( 'Mi_contributiones' ),
	'Mypage'                    => array( 'Mi_pagina' ),
	'Mytalk'                    => array( 'Mi_discussion' ),
	'Myuploads'                 => array( 'Mi_files_incargate' ),
	'Newimages'                 => array( 'Nove_files', 'Nove_imagines' ),
	'Newpages'                  => array( 'Paginas_nove', 'Nove_paginas' ),
	'PasswordReset'             => array( 'Reinitialisar_contrasigno' ),
	'PermanentLink'             => array( 'Ligamine_permanente' ),
	'Popularpages'              => array( 'Paginas_popular' ),
	'Preferences'               => array( 'Preferentias' ),
	'Prefixindex'               => array( 'Indice_de_prefixos' ),
	'Protectedpages'            => array( 'Paginas_protegite' ),
	'Protectedtitles'           => array( 'Titulos_protegite' ),
	'Randompage'                => array( 'Aleatori', 'Pagina_aleatori' ),
	'Randomredirect'            => array( 'Redirection_aleatori' ),
	'Recentchanges'             => array( 'Modificationes_recente' ),
	'Recentchangeslinked'       => array( 'Modificationes_recente_ligate', 'Modificationes_connexe' ),
	'Revisiondelete'            => array( 'Deletion_de_versiones' ),
	'RevisionMove'              => array( 'Displaciar_versiones' ),
	'Search'                    => array( 'Recerca' ),
	'Shortpages'                => array( 'Paginas_curte' ),
	'Specialpages'              => array( 'Paginas_special' ),
	'Statistics'                => array( 'Statisticas' ),
	'Tags'                      => array( 'Etiquettas' ),
	'Unblock'                   => array( 'Disblocar' ),
	'Uncategorizedcategories'   => array( 'Categorias_non_categorisate' ),
	'Uncategorizedimages'       => array( 'Files_non_categorisate', 'Imagines_non_categorisate' ),
	'Uncategorizedpages'        => array( 'Paginas_non_categorisate' ),
	'Uncategorizedtemplates'    => array( 'Patronos_non_categorisate' ),
	'Undelete'                  => array( 'Restaurar' ),
	'Unlockdb'                  => array( 'Disblocar_BDD' ),
	'Unusedcategories'          => array( 'Categorias_non_usate' ),
	'Unusedimages'              => array( 'Files_non_usate', 'Imagines_non_usate' ),
	'Unusedtemplates'           => array( 'Patronos_non_usate' ),
	'Unwatchedpages'            => array( 'Paginas_non_observate' ),
	'Upload'                    => array( 'Incargar', 'Cargar' ),
	'UploadStash'               => array( 'Pila_de_files_incargate' ),
	'Userlogin'                 => array( 'Aperir_session', 'Identificar' ),
	'Userlogout'                => array( 'Clauder_session', 'Disconnecter' ),
	'Userrights'                => array( 'Derectos_de_usatores' ),
	'Wantedcategories'          => array( 'Categorias_desirate' ),
	'Wantedfiles'               => array( 'Files_desirate' ),
	'Wantedpages'               => array( 'Paginas_desirate', 'Ligamines_rupte' ),
	'Wantedtemplates'           => array( 'Patronos_desirate' ),
	'Watchlist'                 => array( 'Observatorio' ),
	'Whatlinkshere'             => array( 'Referentias_a_iste_pagina' ),
	'Withoutinterwiki'          => array( 'Sin_interwiki' ),
);

