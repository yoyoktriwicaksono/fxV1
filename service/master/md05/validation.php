<?php
/*
 * Validasi
 */

function IsWarehouseExist($_entityid)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    //Validate on Lookup
    $sql="select ENTITYID from MST_WAREHOUSE where ENTITYID='$_entityid'";
    $sth = $dbh->prepare($sql);
	$sth->execute();
    $result = $sth->fetchAll();
	$count = $sth->rowCount();
    if ($count > 0) {
        return true;
    } else {
        return false;
    }
}

function ValidateDelete($_entityid)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    return array('status'=>true,'table'=>'');
}

?>