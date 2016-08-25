<?php
/*
 * Validasi
 */
function IsEmployeeIDExist($_idEmployee)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    //Validate on Employee
    $sql="select EMPLOYEEID from PAY_EMPLOYEE where EMPLOYEEID='$_idEmployee'";
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

function ValidateDelete($_idEmployee)
{
    global $entityManager;
    $dbh = $entityManager->getConnection();

    //Validate on MST_USERS
    $sql="select EMPLOYEEID from MST_USERS where EMPLOYEEID='$_idEmployee'";
    $sth = $dbh->prepare($sql);
	$sth->execute();
    $result = $sth->fetchAll();
	$count = $sth->rowCount();
    if ($count > 0) {
        return array('status'=>false,'table'=>'MST_USERS');
    }

    // Validate on PAY_TIMESHEET
    /*
    $sql="select EMPLOYEEID from PAY_TIMESHEET where EMPLOYEEID='$_idEmployee'";
    $sth = $dbh->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll();
	$count = $sth->rowCount();
    if ($count > 0) {
        return array('status'=>false,'table'=>'PAY_TIMESHEET');
    }
    */
    return array('status'=>true,'table'=>'');
}
?>