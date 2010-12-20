<?php
/**
 * Mobile Skin for webkit mobile
 *
 * @author Hyun Lim
 */

if( !defined( 'MEDIAWIKI' ) )
	die( -1 );

/** */
require_once( dirname(__FILE__) . '/MonoBook.php' );

global $wgHooks, $wgEnableArticleCommentsExt, $wgEnableFacebookConnectExt,
	$wgEnableFacebookConnectPushing, $wgEnableMWSuggest, $wgAjaxWatch;

$wgEnableArticleCommentsExt = false;
$wgEnableFacebookConnectExt = false;
$wgEnableFacebookConnectPushing = false;
$wgEnableMWSuggest = false;
$wgAjaxWatch = false;

//$wgHooks['MakeGlobalVariablesScript'][] = 'SkinWikiaApp::onMakeGlobalVariablesScript';
//$wgHooks['SkinAfterContent'][] = 'SkinWikiaApp::onSkinAfterContent';
$wgHooks['SkinTemplateOutputPageBeforeExec'][] = 'SkinWikiaApp::onSkinTemplateOutputPageBeforeExec';

/**
 * @todo document
 * @ingroup Skins
 */
class SkinWikiaApp extends SkinTemplate {
	function __construct() {
		parent::__construct();
		$this->mRenderColumnOne = false;
	}
	
	function initPage( OutputPage $out ) {
		global $wgHooks, $wgUseSiteCss;
		SkinTemplate::initPage( $out );
		$this->skinname  = 'wikiaapp';
		$this->stylename = 'wikiaapp';
		$this->themename = 'wikiaapp';
		$this->template  = 'MonoBookTemplate';
		$wgUseSiteCss = false;
	}
	
	/*public static function onSkinAfterContent( &$data ) {
		global $wgCityId;
		
		$data .= <<< FOOTER
			<div id="fullsite"><a href="#" class="fullsite">View full site</a></div>
FOOTER;
		
		// load Google Analytics code
		$data .= AnalyticsEngine::track('GA_Urchin', AnalyticsEngine::EVENT_PAGEVIEW);

		// onewiki GA
		$data .= AnalyticsEngine::track('GA_Urchin', 'onewiki', array($wgCityId));
		return true;
	}*/
	
	public static function onSkinTemplateOutputPageBeforeExec( &$obj, &$tpl ){
		$tpl->set('skipColumnOne', true);
		$tpl->set('skipFooter', true);
		return true;
	}
	
	function setupSkinUserCss( OutputPage $out ){
		global $wgRequest;
		$out->addMeta("viewport", "width=320");
		
		$staticChute = new StaticChute( 'css' );
		$staticChute->useLocalChuteUrl();
		$out->addHTML( $staticChute->getChuteHtmlForPackage( 'wikiaapp_css' ) );
		//$out->addStyle( 'wikiaapp/main.css', 'screen,handheld' );
		//$out->addStyle( 'wikiaapp/skin.css', 'screen,handheld' );
		
		//$out->addScriptFile( '../common/jquery/jquery-1.4.4.min.js' );
		//$analitycsProvider = new AnalyticsProviderGA_Urchin();
		//$out->addScript( $analitycsProvider->getSetupHtml() );
		//$out->addScriptFile( '../wikiaphone/main.js' );
	}

	function printTopHtml() {
		global $wgRequest, $wgBlankImgUrl, $wgSitename, $wgBlankImgUrl;
		$themeSettings = new ThemeSettings();
		$settings = $themeSettings->getSettings();
		$this->wordmarkText = $settings["wordmark-text"];
		
		$this->mainPageURL = Title::newMainPage()->getLocalURL();
		
		//echo AdEngine::getInstance()->getAd('MOBILE_TOP_LEADERBOARD');
/*?>
			<div class="mobile-header">
				<img src="<?= $wgBlankImgUrl ?>">
				<form action="index.php?title=Special:Search" method="get">
					<input type="text" name="search" placeholder="<?= wfMsg('Tooltip-search', $wgSitename) ?>" accesskey="f" size="13">
					<input id="mobile-search-btn" type="image" src="<?= $wgBlankImgUrl ?>">
				</form>
				<?= View::specialPageLink('Random', 'oasis-button-random-page', array('accesskey' => 'x', 'class' => 'wikia-button secondary', 'data-id' => 'randompage'), 'blank.gif', null, 'sprite random') ?>
			</div>*/?>
			<h1 class="mobile-wikiname">
				<a href="<?= $this->mainPageURL ?>">
				<?= $this->wordmarkText ?>
				</a>
			</h1>
<?php
	}
	
	/*public static function onMakeGlobalVariablesScript( $vars ) {
		global $wgContLang;
		
		$vars['CategoryNamespaceMessage'] = $wgContLang->getNsText(NS_CATEGORY);
		$vars['SpecialNamespaceMessage'] = $wgContLang->getNsText(NS_SPECIAL);
		
		return true;
	}*/

}