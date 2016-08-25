<?php
// Date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

include '../Configuration/config.php'; 

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$_groupmenuid = $_REQUEST['GROUPMENUID'];
$result = array();  
$con = oci_connect($username, $password, $database);
if (!$con)
{
  echo "koneksi gagal dilakukan";
  die(oci_error()); 
}
$sql= "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b,mst_usertcode_groupmenu c where a.TCODEID=b.IDMENU and a.idtrtcode=c.idtrtcode and c.groupmenuid='$_groupmenuid' and PARENTID=$id order by urutan";
//print_r($sql);
$statement = oci_parse($con, $sql);
oci_execute($statement);
while($row = oci_fetch_array($statement, OCI_BOTH+OCI_RETURN_NULLS)){  
	$node = array();  
    $_attr = array();
	$node['id'] = $row['IDTRTCODE'];  
    $node['text'] = $row['DISPLAYTEXT'];
    if ($row['TIPE']=='FILE') {
    	$_attr['tipe'] = $row['TIPE'];
    	$_attr['url'] = $row['URL'].'?frmx='.$row['DISPLAYTEXT'];
    	$node['attributes'] = $_attr;
    } else {
    	$_attr['tipe'] = $row['TIPE'];
    	$_attr['url'] = $row['URL'];
    	$_attr['parentid'] = $row['PARENTID'];
    	$_attr['urutan'] = $row['URUTAN'];
    	$node['attributes'] = $_attr;
   	}  
   	if ($row['TIPE']=='FOLDER') {
   		$node['state'] = 'closed'; //has_childmn02($row['IDTRTCODE']) ? 'closed' : 'open';  
   	}
    if (has_childmn03($row['IDTRTCODE'])) {
        $node['children'] = load_childmn03($row['IDTRTCODE']);
    }
	array_push($result,$node);
}  
oci_free_statement($statement);
oci_close($con);
echo json_encode($result);  

function has_childmn03($id){
    global $con;
    $statement = oci_parse($con, "select count(*) from mst_tr_tcode where PARENTID=$id");
    oci_execute($statement);
    $row = oci_fetch_array($statement, OCI_BOTH+OCI_RETURN_NULLS);
    return $row[0] > 0 ? true : false;  
}

function load_childmn03($id2) {
    global $con,$_groupmenuid;
    $hasil=array();
    $statement = oci_parse($con, "select a.*,b.DISPLAYTEXT,b.URL,b.TIPE from mst_tr_tcode a, mst_tcode b,mst_usertcode_groupmenu c where a.TCODEID=b.IDMENU and a.idtrtcode=c.idtrtcode and c.groupmenuid='$_groupmenuid' and PARENTID=$id2 order by urutan");
    oci_execute($statement);
    while($row = oci_fetch_array($statement, OCI_BOTH+OCI_RETURN_NULLS)){
        $node = array();
        $_attr = array();
        $node['id'] = $row['IDTRTCODE'];
        $node['text'] = $row['DISPLAYTEXT'];
        if ($row['TIPE']=='FILE') {
            $_attr['tipe'] = $row['TIPE'];
            $_attr['url'] = $row['URL'].'?frmx='.$row['DISPLAYTEXT'];
            $node['attributes'] = $_attr;
        } else {
            $_attr['tipe'] = $row['TIPE'];
            $_attr['url'] = $row['URL'];
            $_attr['parentid'] = $row['PARENTID'];
            $_attr['urutan'] = $row['URUTAN'];
            $node['attributes'] = $_attr;
        }
        if ($row['TIPE']=='FOLDER') {
            $node['state'] = 'closed'; //has_childmn02($row['IDTRTCODE']) ? 'closed' : 'open';
        }
        if (has_childmn03($row['IDTRTCODE'])) {
            $node['children'] = load_childmn03($row['IDTRTCODE']);
        }
        array_push($hasil,$node);
    }
    return $hasil;
}
?>  