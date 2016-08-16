<?php
/*
 * Validasi
 */

function IsUOMExist($_id)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    //Validate on Lookup
    $sql="select ID from INV_UNIT_CONVERSION where ID='$_id'";
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

function ValidateDelete($_id)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    return array('status'=>true,'table'=>'');
}

?>