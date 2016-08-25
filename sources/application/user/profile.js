$(function(){
    $('#THEME').combogrid({
        panelWidth:450,
        //delay: 100,
        mode: 'remote',
        url: $('#URL_COMBO_THEME_LOAD').val(),
        idField: 'IDLOOKUP',
        textField: 'DESKRIPSI',
        fitColumns:true,
        columns: [[
            {field:'IDLOOKUP',title:'ID',width:100},
            {field:'DESKRIPSI',title:'Deskripsi',width:200}
        ]]
    });
    var themeid = $('#themeid').val();
    $('#fmuser').form('load',{THEME:themeid});
});

function saveProfile(){
    $('#fmuser').form('submit',{
        url: $('#URL_PROFILE_SAVE').val(),
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $.messager.show({
                    title: 'Save Profile',
                    msg: result.msg
                });
                location.reload();               
            } else {
                $.messager.show({
                    title: 'Error',
                    msg: result.msg
                });
            }
        }
    });
}
