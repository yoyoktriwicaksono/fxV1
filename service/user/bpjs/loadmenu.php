<?php
session_start();
require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ .'/../../bootstrap.php');

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$_groupmenuid = $_SESSION["groupmenuid"];
$result = array();  
if ($_groupmenuid=='') {
    $sql = "select trmenu.*,'' GROUPMENUID from trmenu where trmenu.PARENTID=$id order by trmenu.urutan";
} else {
    $sql= "select distinct a.*,b.groupmenuid from trmenu a left outer join mst_usertcode_groupmenu b on a.idtrtcode=b.idtrtcode where (b.groupmenuid ='$_groupmenuid' or b.groupmenuid is null) and a.PARENTID=$id";
}
$dbh = $entityManager->getConnection();
$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();
foreach ($rows as $row) {
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
        $node['state'] = 'closed';  
    }
    if (has_childfav($row['IDTRTCODE'])) {
        $node['children'] = load_childfav($row['IDTRTCODE']);
    }
    array_push($result,$node);
}
echo json_encode($result);  

function has_childfav($id){
    global $entityManager;
    $sql = "select count(*) as TOTAL from mst_tr_tcode where PARENTID=$id";
    $dbh = $entityManager->getConnection();
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll();
    return $row[0] > 0 ? true : false;  
}

function load_childfav($id2) {
    global $entityManager,$_groupmenuid;
    $hasil=array();
    if ($_groupmenuid=='') {
        $sql = "select trmenu.*,'' GROUPMENUID from trmenu where trmenu.PARENTID=$id2 order by trmenu.urutan";
    } else {
        $sql= "select distinct a.*,b.groupmenuid from trmenu a left outer join mst_usertcode_groupmenu b on a.idtrtcode=b.idtrtcode where (b.groupmenuid ='$_groupmenuid' or b.groupmenuid is null) and a.PARENTID=$id2";
    }
    $dbh = $entityManager->getConnection();
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $rows = $sth->fetchAll();
    foreach ($rows as $row) {
        $node = array();
        $_attr = array();
        $node['id'] = $row['IDTRTCODE'];
        $node['text'] = $row['DISPLAYTEXT'];
        if ($row['GROUPMENUID']=='') {
            $node['checked']=false;
        } else {
            $node['checked']=true;
        }
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
            $node['state'] = 'closed';
        }
        if (has_childfav($row['IDTRTCODE'])) {
            $node['children'] = load_childfav($row['IDTRTCODE']);
        }
        array_push($hasil,$node);
    }
    return $hasil;
}
?>  