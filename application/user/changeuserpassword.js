$(document).ready(function(){
   $('#USER_IDUSER').val(""); 
   $('#USER_PASSWORD').val(""); 
});
function saveUserPassword(){
    $('#fmchangeuserpassword').form('submit',{
        url: 'service/user/changeuserpassword/savechangeuserpassword.php',
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $.messager.show({
                    title: 'Change Password',
                    msg: result.msg
                });                
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}
