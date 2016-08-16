$(document).ready(function(){
    $('#dlglogin').dialog('open');
    $('#fmlogin').form('clear');

    $("#uname").focus();
    $('#uname').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            $('#pass').focus();
        }
    });
    $('#pass').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            Login();
        }
    });

    var isExpired = $("#expired").val();
    if (isExpired=="1") {
        alert ("expired");
        $("#expired").val("");
    }
    //location.reload();               
});

var loginurl = $('#URL_OTENTIFIKASI_LOGIN').val();
function Login(){
    $('#fmlogin').form('submit',{
        url: loginurl,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                location.reload(true);
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}
