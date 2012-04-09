<?php /* Smarty version Smarty-3.0.8, created on 2011-10-17 23:00:37
         compiled from "../templates/admin/admin_head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3097924814e9c9775d81df5-59775717%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a27d343f638d830bbd2b18e7c7ccb4a16cd003e' => 
    array (
      0 => '../templates/admin/admin_head.tpl',
      1 => 1318885236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3097924814e9c9775d81df5-59775717',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<head>
	<!-- Meta-block -->
	<meta name="keywords" content="mooi, mooi ijsselstein, mooi-ijsselstein, body, body health, wilma, werf, wellness" />
	<meta name="description" content="site voor mooi-ijsselstein, Beauty- & Well-being center" />
	<meta name="author" content="navelpluisje.nl" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<!-- Title -->
	<title><?php echo $_smarty_tpl->getVariable('cPage')->value['page_title'];?>
</title>
	<!-- Javascript -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/scripts/tiny_mce/tiny_mce.js"></script>
	<script language="javascript" type="text/javascript">
		tinyMCE.init({
		    theme    : "advanced",
		    mode     : "exact",
		    elements : "body_text",
		    plugins : "pagebreak",
		    theme_advanced_toolbar_location : "top",
		    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,"
		    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
		    + "bullist,numlist,outdent,indent",
		    theme_advanced_buttons2 : "link,unlink,anchor,image,|,"
		    +"undo,redo,cleanup,code,|,sub,sup,charmap,|,pagebreak",
		    theme_advanced_buttons3 : "",
		    height:"350px",
		    width:"600px"
		});
	</script>

	<script type="text/javascript" src="/scripts/npSignature.js"></script>
	<script type="text/javascript" src="/scripts/npTooltip.js"></script>
	<script type="text/javascript" src="/scripts/admin.js"></script>
	<!-- Stylesheets -->
	<link rel="stylesheet" href="/style/admin.css" />
	<link rel="stylesheet" href="/style/np.css" />
</head>
