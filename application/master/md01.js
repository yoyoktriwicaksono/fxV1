$(document).ready(function(){
    var panelHeight= $('#wp').height();
    var panelWidth= $('#wp').width();
    $("#dg").css({
        "height" 	: (panelHeight) + "px",
        "width" 	: (panelWidth) + "px"
    });

    $('#dg').datagrid({
        url:$('#URL_KATEGORI_LIST').val(),
        remoteFilter:true,
        pageSize:20,
        pageList: [10,20,30,40,50]        
    }).datagrid("enableFilter",{remoteFilter:true});

});

var url;
var entityName = $('#ENTITY_KATEGORI').val();
function newMD01(){
    $('#dlgmd01').dialog('open').dialog('setTitle','New ' + entityName);
    $('#fm').form('clear');
    $('#IDKATEGORI').removeAttr("readonly");
    url = $('#URL_KATEGORI_INSERT').val();
}

function editMD01(){
    var row = $('#dg').datagrid('getSelected');
    if (row){
        $('#dlgmd01').dialog('open').dialog('setTitle','Edit ' + entityName);
        $('#fm').form('load',row);
        url = $('#URL_KATEGORI_EDIT').val() + '?id='+row.id;
        $('#IDKATEGORI').attr("readonly",true);
    } else {
        var msgEdit = $('#INFO_CHOOSEROWBEFOREREEDIT').val();
        $.messager.show({
            title: $('#MSG_INFORMATION').val(),
            msg: msgEdit,
            showType:'show',
            style:{
                right:'',
                top:document.body.scrollTop+document.documentElement.scrollTop,
                bottom:''
            }
        });
    }
}
function saveMD01(){
    $('#fm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.success){
                $('#dlgmd01').dialog('close');
                $('#dg').datagrid('reload');
                $.messager.show({
                    title: $('#MSG_INFORMATION').val(),
                    msg: result.msg
                });
            } else {
                $.messager.show({
                    title: $('#MSG_ERROR').val(),
                    msg: result.msg
                });
            }
        }
    });
}
function removeMD01(){
    var row = $('#dg').datagrid('getSelected');
    var msgConfirmRemove = $('#CONFIRM_DELETE').val() + entityName + '?';
    url = $('#URL_KATEGORI_DELETE').val();
    if (row){
        $.messager.confirm('Confirm',msgConfirmRemove,function(r){
            if (r){
                $.post(url,{IDKATEGORI:row.IDKATEGORI},function(result){
                    if (result.success){
                        $('#dg').datagrid('reload');
                        $.messager.show({
                            title: $('#MSG_INFORMATION').val(),
                            msg: result.msg
                        });
                    } else {
                        if (result.warning){
                            $.messager.show({
                                title: $('#MSG_WARNING').val(),
                                msg: result.msg
                            });
                        } else {
                            $.messager.show({
                                title: $('#MSG_ERROR').val(),
                                msg: result.msg
                            });
                        }
                    }
                },'json');
            }
        });
    } else {
        var msgDelete = $('#INFO_CHOOSEROWBEFOREREMOVE').val();
        $.messager.show({
            title: $('#MSG_INFORMATION').val(),
            msg: msgDelete
        });
    }
}

