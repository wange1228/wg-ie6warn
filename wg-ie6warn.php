<?php
/*
Plugin Name: 万戈牌 Fuck IE6
Plugin URI: http://wange.im/wg-ie6warn.html
Description: 干死他喵的 IE6！ ╭∩╮(︶︿︶)╭∩╮
Version: 第一插
Author: 万戈
Author URI: http://wange.im
License: GPL
*/

add_action('wp_head', 'ie6warn_js_css');
function ie6warn_js_css(){
	//CSS
	$ie6warnStyleUrl = WP_PLUGIN_URL . '/wg-ie6warn/style.css';
	wp_register_style('ie6warnStyleSheet', $ie6warnStyleUrl);
	wp_print_styles( 'ie6warnStyleSheet');
	
	//jQuery
	if (!is_admin()) {
		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', plugins_url('/js/jquery.js', __FILE__), '', '1.3.1', 0 );
		wp_print_scripts( 'jquery' );
	}
?>
<script type="text/javascript">
window.onload = function(){
	var ie = (function(){
		var undef,
		v = 3,
		div = document.createElement('div'),
		all = div.getElementsByTagName('i');
		while (
			div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
			all[0]
		);
		return v > 4 ? v : undef;
	}());
	if ( ie === 6 ) {
		var ie6warn = '<div id="ie6warn"><p id="wgIE6">IE6 经常有 Bug！有木有！你居然在用 IE6！有木有！还在用 IE6 的用户乃们伤不起啊！还不赶紧换！！！</p><ul id="wgBrowser"><li><a href="http://www.mozillaonline.com/" id="wgFirefox" target="_blank" title="Firefox"></a></li><li><a href="http://www.google.com/chrome/" id="wgChrome" target="_blank" title="Chrome"></a></li><li><a href="http://www.apple.com.cn/safari/download/" id="wgSafari" target="_blank" title="Safari"></a></li><li><a href="http://www.operachina.com/" id="wgOpera" target="_blank" title="Opera"></a></li><li><a href="http://www.microsoft.com/windows/internet-explorer/ie7/" id="wgIE" target="_blank" title="IE"></a></li></ul></div>';
		jQuery(document).ready(function($){
			$('body').append( ie6warn );
		});
	}
};
</script>
<?php }
?>