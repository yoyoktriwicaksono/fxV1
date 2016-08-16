<?php
/*
 * Validasi
 */

function IsTCodeExist($_id)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    if ($_id != 'AUTO') {
        $sql="select IDMENU from MST_TCODE where IDMENU='$_id'";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
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