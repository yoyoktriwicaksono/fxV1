function getMonthName(m) {
	var month = new Array();
	month[0] = "JAN";
	month[1] = "FEB";
	month[2] = "MAR";
	month[3] = "APR";
	month[4] = "MAY";
	month[5] = "JUN";
	month[6] = "JUL";
	month[7] = "AUG";
	month[8] = "SEP";
	month[9] = "OCT";
	month[10] = "NOV";
	month[11] = "DEC";

	return month[m];
}

function getMonthValue(m) {
        var month = {JAN:1, FEB:2, MAR:3, APR:4, MAY:5, JUN:6, JUL:7,AUG:8,SEP:9,OCT:10,NOV:11,DEC:12 };
        return month[m];
}

function myformatter(date){
        var y = date.getFullYear();
        var m = date.getMonth();
        var d = date.getDate();
        return d + ' ' + getMonthName(m) + ' ' + y;
}

function myparser(s){
        if (!s) return new Date();
        var ss = (s.split(' '));
        var d = parseInt(ss[0],10);
        var m = parseInt(getMonthValue(ss[1]),10);
        var y = parseInt(ss[2],10);
        if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
        } else {
                return new Date();
        }
}

function combineColumns(val,row){
    if (val < 20){
        return '<span style="color:red;">('+val+')</span>';
    } else {
        alert(row.NAMA);
    }
}

/*
function formatterdatebox(date){
    alert(date);
    var y = date.getFullYear();
    var m = date.getMonth();
    var d = date.getDate();
    return d + ' ' + getMonthName(m) + ' ' + y;
}
*/

/*
function myformatter(date){
    //alert(date);
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    //return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
    return d + ' ' + getMonthName(m) + ' ' + y;
}
function myparser(s){
    if (!s) return new Date();
    var ss = (s.split(' '));
    var y = parseInt(ss[0],10);
    var m = parseInt(ss[1],10);
    var d = parseInt(ss[2],10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
        return new Date(y,m-1,d);
    } else {
        return new Date();
    }
}
*/