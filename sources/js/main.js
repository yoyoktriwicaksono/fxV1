$(document).ready(function(){
    $('#IDMENU').val('');
    $('#IDMENU').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            exec_idmenu();
        }
    });
    $('#IDMENU').focus(function() {
        $('#IDMENU').removeAttr("readonly");
    });

    var userMenuID = $("#userMenuID").val();
    $('#t-channels').tree({
        onBeforeLoad: function (node,param) { 
            param.GROUPMENUID=userMenuID; 
            return true;
        },
        onSelect: function(node){
            var header = node.text;
            var alamat = node.attributes.url;
            var tipe = node.attributes.tipe;
            if (tipe ==='FILE') {
                $('#wp').panel('setTitle',header);
                $('#wp').panel('open').panel('refresh',alamat);
            }
        },
        onLoadSuccess:function(node,data){
            /*
            if (data.length){
                var id = 1; //data[0].id;
                var n = $(this).tree('find', id);
                $(this).tree('select', n.target);
                var node = $('#t-channels').tree('getSelected');
                if (node) {
                    $('#t-channels').tree('expand', node.target);
                    //$('#t-channels').tree('expandAll', node.target);
                }
            }
            */
        }
    });
    
    // colaps west
    $('#ly').layout('collapse','west');
    //mainrefresh();
    $('#wp').panel('setTitle',$("#TITLE_LANDING_PAGE").val());
    $('#wp').panel('open').panel('refresh',$("#URL_LANDING_PAGE").val());
    // load menu favorites
    /*
    $.post('service/user/favorites/reload.php',function(result){
        if (result){
            $('#mmfav').html(result);
        }
    },'html');
    $.post('service/user/bpjs/reload.php',function(result){
        if (result){
            $('#mmbpjs').html(result);
        }
    },'html');
    */
});

function menuFavHandler(headerText,url) {
    $('#wp').panel('setTitle',headerText);
    $('#wp').panel('open').panel('refresh',url);
}

function exec_idmenu() {
    var idmenu = $("#IDMENU").val();
    if (idmenu!=='') {
        $.post($('#URL_EXEC_IDMENU').val(),{IDTCODE:idmenu},function(result){
            if (result.url){
                var alamat = result.url;
                $('#wp').panel('setTitle',result.header);
                $('#wp').panel('open').panel('refresh',alamat);
            } else {
                $.messager.show({   // show error message
                    title: 'Error',
                    msg: result.msg
                });
            }
        },'json');
    } else {
        $.messager.alert('Warning','Anda harus mengisi ID Menu','warning');
    }
}

function mainrefresh(){
    $.post($('#URL_MAIN_REFRESH').val(),0,function(result){
        if (result.id){
            /*
            var id = eval(result.id);
            var n = $('#t-channels').tree('find',id);
            $('#t-channels').tree('select', n.target);
            var node = $('#t-channels').tree('getSelected');
            if (node){
                $('#t-channels').tree('reload', node.target);
            } else {
                $('#t-channels').tree('reload');
            }
            */
            $('#t-channels').tree('reload');
        } else {
            $.messager.show({   // show error message
                title: 'Error',
                msg: result.msg
            });
        }
    },'json');
}

function userprofile() {
    $('#wp').panel('setTitle','User Profile');
    $('#wp').panel('open').panel('refresh',$('#URL_USERPROFILE').val());
}

function changepassword() {
    $('#wp').panel('setTitle','Change Password');
    $('#wp').panel('open').panel('refresh',$('#URL_USERPROFILE_CHANGEPASSWORD').val());
}

function editfavorites() {
    $('#wp').panel('setTitle','Edit Favorites');
    $('#wp').panel('open').panel('refresh',$('#URL_USERPROFILE_FAVORITES').val());
}
