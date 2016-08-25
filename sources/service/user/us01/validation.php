<?php
/*
 * Validasi
 */

function IsUserExist($_id)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    $sql="select IDUSER from MST_USERS where IDUSER='$_id'";
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