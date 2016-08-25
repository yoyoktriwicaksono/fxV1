function saveOrg(){
    $('#fmorg').form('submit',{
        url: 'service/orgs/orgs/saveorg.php',
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $.messager.show({
                    title: 'Save Organization',
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