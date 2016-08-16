<?php
session_start();

require_once (__DIR__ .'/application/configuration/global.config.php');
require_once (__DIR__ .'/application/configuration/service.config.php');
require_once (__DIR__ .'/init/initialize.php');
?>

<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo APPLICATION_TITLE; ?></title>
        <link rel="stylesheet" type="text/css" href="css/form.css">
        <link rel="stylesheet" type="text/css" href="themes/icon.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
<?php
if(isset($_SESSION[LEGAL]) && $_SESSION[LEGAL]==200){
    echo '<link rel="stylesheet" type="text/css" href="themes/'.$_SESSION["theme"].'/easyui.css">';
    include("main.php");
}
else
{
        echo '<link rel="stylesheet" type="text/css" href="themes/'.THEME.'/easyui.css">';
        ?>
    </head>
     <body >
            <div id="dlglogin" url ="<?php echo URL_OTENTIFIKASI_LOGIN; ?>" title="<?php echo APPLICATION_TITLE; ?>" closed="false"  class="easyui-dialog" 
                 style="width:320px;height:200px;padding:5px;spacing:3px;top:250px"  
                 data-options="modal:false,closable:false"  
                 buttons="#dlg-buttons">
                <div class="ftitle">Login</div>
                <form id="fmlogin" method="post" novalidate>
                    <div class="fitem">
                        <label>User Name:</label>
                        <input id="uname" name="uname" style="width:150px;" class="easyui-validatebox textbox" data-options="required:true">
                    </div>
                    <div class="fitem">
                        <label>Password:</label>
                        <input id="pass" name="pass" type="password" style="width:150px;" class="easyui-validatebox textbox" data-options="required:true" autocomplete="off">
                    </div>
                </form>
            </div>
            <div id="dlg-buttons">
                 <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onclick="Login()">Login</a>
            </div>
         <input type="hidden" id="URL_OTENTIFIKASI_LOGIN" value="<?php echo URL_OTENTIFIKASI_LOGIN; ?>" />
         <input type="hidden" id="expired" value="<?php echo $_REQUEST['sessionexpired']; ?>" />
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript">
        var isExpired = $("#expired").val();
        if (isExpired=="1") {
            $("#expired").val("");
            window.location.reload();
        }
        </script>

    </body>
    <?php 
}
?>
</html>