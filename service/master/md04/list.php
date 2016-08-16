<?php
session_start();

require_once (__DIR__ .'/../../../application/configuration/global.message.inc');
require_once (__DIR__ .'/../../../init/initialize.php');
require_once (__DIR__ .'/../../bootstrap.php');

$filterRules = isset($_POST['filterRules']) ? ($_POST['filterRules']) : '';
$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'ID';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';

$_page = isset($_POST['page']) ? intval($_POST['page']) : DEFAULTPAGE;
$_rows = isset($_POST['rows']) ? intval($_POST['rows']) : DEFAULTPAGING;
if ($_page==1) {
	$_limit1 = 0;
	$_limit2 = $_rows;
} else {
	$_limit1 = $_rows * ($_page - 1) + 1;
	$_limit2 = $_rows * $_page;
}

$sqlcount="select COUNT(*) as TOTAL from INV_PRODUCT";

if (!empty($filterRules)){
    $sql = "SELECT outer.*  FROM (SELECT ROWNUM rn, inner.* FROM ( ";
    $sql .= "select * from INV_PRODUCT ";
    $filterRules = json_decode($filterRules);
    $isfirst=true;
    foreach($filterRules as $rule){
        $rule = get_object_vars($rule);
        $field = $rule['field'];
        $op = $rule['op'];
        $value = strtoupper($rule['value']);
        if (!empty($value)){
                if ($op == 'contains'){
                    if ($isfirst==true) {
                        $sql .= " where (UPPER($field) like '%$value%')";
                        $sqlcount .= " where (UPPER($field) like '%$value%')";
                    } else {
                        $sql .= " and (UPPER($field) like '%$value%')";
                        $sqlcount .= " and (UPPER($field) like '%$value%')";
                    }
                }
        }
        $isfirst=false;
    }
    $sql .= " ORDER BY ".$sort." ".$order;
    $sql .= " ) inner) outer WHERE outer.rn >= ".$_limit1." AND outer.rn <= ".$_limit2;
} else {
    //$sql = "select * from mst_kategori ORDER BY ".$sort." ".$order;
    $sql = "SELECT outer.*  FROM (SELECT ROWNUM rn, inner.* ".
        "FROM (select * ". 
        "from INV_PRODUCT ORDER BY ".$sort." ".$order." ) inner) outer WHERE outer.rn >= ".$_limit1." AND outer.rn <= ".$_limit2;
}

$dbh = $entityManager->getConnection();
$sth = $dbh->prepare($sqlcount);
$sth->execute();
$rows = $sth->fetchAll();
$result["total"] = $rows[0]['TOTAL'];

$sth = $dbh->prepare($sql);
$sth->execute();
$rows = $sth->fetchAll();
$data = array();
foreach ($rows as $row) {
    array_push($data, $row);
}
$result["rows"] = $data;
echo json_encode($result);
?>