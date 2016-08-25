<?php
session_start();
require_once (__DIR__ .'/application/configuration/global.config.php');
require_once (__DIR__ .'/application/configuration/service.config.php');
require_once (__DIR__ .'/init/initialize.php');
include_once (__DIR__ .'/service/user/favorites/listall.php');
include_once (__DIR__ .'/service/user/bpjs/listall.php');

if(isset($_SESSION[LEGAL]) && $_SESSION[LEGAL]!=200){
    header("Location:".APPLICATION_URL);
}
else
{
?>
</head>
<body id="ly" class="easyui-layout">
	<div region="north" border="false" >
            <div id="head" class="rtitle">
                <div id="title" class="ftitle_appName">
                      <?php echo APPLICATION_NAME; ?>
                </div>
                <div id="appinfo" class="ftitle_appversion" >
                    <?php echo 'build 20151213.1 version 1.0'; ?>
                </div>
            </div>
            <div id="userprofile" >
                <a href="#" class="easyui-menubutton" menu="#mmbpjs" iconCls="icon-system">
                    PCare
                </a>
                <a href="#" class="easyui-menubutton" menu="#mmfav" iconCls="icon-system">
                    Favorites
                </a>
                <a href="#" class="easyui-menubutton" menu="#mm1" iconCls="icon-system">
                    <?php 
                        $_iduser = $_SESSION["uname"];
                        if ($_iduser == 'super') {
                            echo $_SESSION["name"].' (Super User)';
                        } else {
                            echo $_SESSION["uname"].' ('.$_SESSION["name"].')';
                        }
                    ?>
                </a>
                <div id="mmfav">
                    <?php
                        foreach ($dataFav as $menuItem) {
                            $_displayText = $menuItem['DISPLAYTEXT'];
                            $_url = $menuItem['URL'];
                            echo "<div href='#' onclick=\"menuFavHandler('$_displayText','$_url')\">$_displayText</div>";
                        }
                    ?>
                </div>
                <div id="mmbpjs">
                    <?php
                        foreach ($dataBpjs as $menuBpjs) {
                            $_displayText = $menuBpjs['DISPLAYTEXT'];
                            $_url = $menuBpjs['URL'];
                            echo "<div href='#' onclick=\"menuFavHandler('$_displayText','$_url')\">$_displayText</div>";
                        }
                    ?>
                </div>
                <div id="mm1">
                    <div href="#" onclick="userprofile()">Profile</div>
                    <div href="#" onclick="changepassword()">Change Password</div>
                    <div class="menu-sep"></div>
                    <div href="#" onclick="editfavorites()">Edit favorites</div>
                    <div class="menu-sep"></div>
                    <div href="<?php echo URL_OTENTIFIKASI_LOGOUT; ?>" iconCls="icon-logout" >Logout</div>
                </div>
            </div>
	</div>
    <div region="west" title="Menu" split="true" border="false" style="width:300px;" collapsible="true" collapse="false">
        <div id="toolbarmain" style="border-bottom:solid 1px #AED0EA;">
            <a href="#" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="mainrefresh()">Refresh</a>
        </div>
        <ul id="t-channels" url="<?php echo MENU_FOLDER.'loadmenu.php'; ?>" border="true"></ul>
    </div>
	<div region="center" border="false">
		<div id="wp" fit="true" class="easyui-panel" title="Header" style="background:#fafafa;" data-options="iconCls:'',closable:false,collapsible:false,minimizable:false,maximizable:false">
		</div>	
	</div>
    <input type="hidden" id="userMenuID" name="userMenuID" value="<?php echo $_SESSION["groupmenuid"]; ?>">
    <input type="hidden" id="URL_USERPROFILE" value="<?php echo URL_USERPROFILE; ?>" />
    <input type="hidden" id="URL_USERPROFILE_CHANGEPASSWORD" value="<?php echo URL_USERPROFILE_CHANGEPASSWORD; ?>" />
    <input type="hidden" id="URL_USERPROFILE_FAVORITES" value="<?php echo URL_USERPROFILE_FAVORITES; ?>" />
    <input type="hidden" id="URL_MENU_FAVORITES" value="<?php echo URL_MENU_FAVORITES; ?>" />
    <input type="hidden" id="URL_EXEC_IDMENU" value="<?php echo URL_EXEC_IDMENU; ?>" />
    <input type="hidden" id="URL_MAIN_REFRESH" value="<?php echo URL_MAIN_REFRESH; ?>" />
    <input type="hidden" id="URL_LANDING_PAGE" value="<?php echo $_SESSION["landingpage_url"]; ?>" />
    <input type="hidden" id="TITLE_LANDING_PAGE" value="<?php echo $_SESSION["landingpage_displaytext"]; ?>" />
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<?php
}
?>