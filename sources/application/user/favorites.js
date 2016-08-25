$(document).ready(function(){
    var panelHeight= $('#wp').height();
    $("#favdg").css({
        "height"    : (panelHeight-45) + "px"
    });

    $('#tfav').tree({
        onSelect: function(node){
            var idtcode = node.id;
            var header = node.text;
            var alamat = node.attributes.url; 
            var tipe = node.attributes.tipe;
            $('#favdg').datagrid('selectRecord',idtcode);
        },
        onLoadSuccess:function(node,data){
            if (data.length){
                $.post('service/menu/getrootid.php',0,function(result){
                    var id = eval(result.id);
                    var n = $('#tfav').tree('find', id);
                    $('#tfav').tree('select', n.target);
                    var node = $('#tfav').tree('getSelected');
                    if (node) {
                        $('#tfav').tree('expandAll', node.target);
                    }
                },'json');
            }
        }
    });
});

var url;
function favnewMenu(){
    var node = $('#tfav').tree('getSelected');
    if (node){
        var tipe = node.attributes.tipe;
        var idtrtcode = node.id;
        if (tipe =='FILE') {
            $.post('service/user/favorites/insert.php',{IDTRTCODE:idtrtcode},function(result){
                if (result.success){
                    $('#favdg').datagrid('reload');
                    $.post('service/user/favorites/reload.php',function(result){
                        if (result){
                            $('#mmfav').html(result);
                        }
                    },'html');
                    location.reload(true);
                } else {
                    $.messager.show({   
                        title: 'Error',
                        msg: result.msg
                    });
                }
            },'json');
        } else {
            $.messager.alert('Warning','Anda harus memilih File Menu bukan Folder','warning');
        }
    } else {
        $.messager.alert('Warning','Anda harus memilih File Menu untuk menambahkan Fvorites Menu','warning');
    }
}

function bpjsnewMenu(){
    var node = $('#tfav').tree('getSelected');
    if (node){
        var tipe = node.attributes.tipe;
        var idtrtcode = node.id;
        if (tipe =='FILE') {
            $.post('service/user/bpjs/insert.php',{IDTRTCODE:idtrtcode},function(result){
                if (result.success){
                    $('#bpjsdg').datagrid('reload');
                    $.post('service/user/bpjs/reload.php',function(result){
                        if (result){
                            $('#mmbpjs').html(result);
                        }
                    },'html');
                    location.reload(true);
                } else {
                    $.messager.show({   
                        title: 'Error',
                        msg: result.msg
                    });
                }
            },'json');
        } else {
            $.messager.alert('Warning','Anda harus memilih File Menu bukan Folder','warning');
        }
    } else {
        $.messager.alert('Warning','Anda harus memilih File Menu untuk menambahkan Fvorites Menu','warning');
    }
}


function favremoveMenu(){
    var row = $('#favdg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Anda Yakin akan menghapus menu favorite ?',function(r){
            if (r){
                $.post('service/user/favorites/delete.php',{FAVID:row.FAVID},function(result){
                    if (result.success){
                        $('#favdg').datagrid('reload');
                        location.reload(true);
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: result.msg
                        });
                    }
                },'json');
            }
        });
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih menu yang akan dihapus</b>'
        });
    }
}

function bpjsremoveMenu(){
    var row = $('#bpjsdg').datagrid('getSelected');
    if (row){
        $.messager.confirm('Confirm','Anda Yakin akan menghapus menu Bpjs ?',function(r){
            if (r){
                $.post('service/user/bpjs/delete.php',{FAVID:row.FAVID},function(result){
                    if (result.success){
                        $('#bpjsdg').datagrid('reload');
                        location.reload(true);
                    } else {
                        $.messager.show({
                            title: 'Error',
                            msg: result.msg
                        });
                    }
                },'json');
            }
        });
    } else {
        $.messager.show({
            title: 'Informasi',
            msg: '<b>Anda harus memilih menu yang akan dihapus</b>'
        });
    }
}