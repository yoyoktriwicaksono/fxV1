<?php
require_once (__DIR__ ."/BaseClass.php");

/**
 * @Entity @Table(name="MST_USERS")
 **/
class MSTUser extends BaseClass
{
    /**
    * @Id 
    * @Column(name="IDUSER", type="string", length=50, nullable=false)
    */
    protected $IDUSER;
    public function getId(){
        return $this->IDUSER;
    }
    public function setId($idUser){
        $this->IDUSER = $idUser;
    }

    /**
    * @Column(name="NAMA", type="string", length=250)
    */
    protected $NAMA;
    public function getNama(){
        return $this->NAMA;
    }
    public function setNama($nama){
        $this->NAMA = $nama;
    }

    /**
    * @Column(name="PASSWORD", type="string", length=100)
    */
    protected $PASSWORD;
    public function getPassword(){
        return $this->PASSWORD;
    }
    public function setPassword($password){
        $this->PASSWORD = $password;
    }

    /**
    * @Column(name="GROUPMENUID", type="string", length=50)
    */
    protected $GROUPMENUID;
    public function getGroupMenuId(){
        return $this->GROUPMENUID;
    }
    public function setGroupMenuId($groupMenuId){
        $this->GROUPMENUID = $groupMenuId;
    }

    /**
    * @Column(name="THEME", type="string", length=20)
    */
    protected $THEME;
    public function getTheme(){
        return $this->THEME;
    }
    public function setTheme($theme){
        $this->THEME = $theme;
    }
    
    /**
    * @Column(name="ORG", type="string", length=20)
    */
    protected $ORG;
    public function getOrganization(){
        return $this->ORG;
    }
    public function setOrganization($organization){
        $this->ORG = $organization;
    }

    /**
    * @Column(name="SOFF", type="string", length=20)
    */
    protected $SOFF;
    public function getSalesOffice(){
        return $this->SOFF;
    }
    public function setSalesOffice($salesOffice){
        $this->SOFF = $salesOffice;
    }

    /**
    * @Column(name="EMPLOYEEID", type="string", length=20)
    */
    protected $EMPLOYEEID;
    public function getEmployeeId(){
        return $this->EMPLOYEEID;
    }
    public function setEmployeeId($employeeId){
        $this->EMPLOYEEID = $employeeId;
    }
    
}
?>