function savePassword(){
    $('#fmuserpassword').form('submit',{
        url: $('#URL_CHANGEPASSWORD_SAVE').val(),
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
