<?php
/**
 * User: yoyok
 * Date: 3/15/15
 * Time: 4:31 PM
 */

/**
 * @Entity @Table(name="VLOGIN")
 **/
class VLogin {
    /**
     * @Id
     * @Column(name="IDUSER", type="string", length=50, nullable=false)
     */
    protected $IDUSER;
    public function getIdUser(){
        return $this->IDUSER;
    }
    public function setIdUser($IDUSER){
        $this->IDUSER = $IDUSER;
    }

    /**
     * @Column(name="PASSWORD", type="string", length=100)
     */
    protected $PASSWORD;
    public function getPassword(){
        return $this->PASSWORD;
    }
    public function setPassword($PASSWORD){
        $this->PASSWORD = $PASSWORD;
    }

    /**
     * @Column(name="NAMA", type="string", length=250)
     */
    protected $NAMA;
    public function getNama(){
        return $this->NAMA;
    }
    public function setNama($NAMA){
        $this->NAMA = $NAMA;
    }

    /**
     * @Column(name="GROUPMENUID", type="string", length=50)
     */
    protected $GROUPMENUID;
    public function getGroupMenuId(){
        return $this->GROUPMENUID;
    }
    public function setGroupMenuId($GROUPMENUID){
        $this->GROUPMENUID = $GROUPMENUID;
    }

    /**
     * @Column(name="THEME", type="string", length=20)
     */
    protected $THEME;
    public function getTheme(){
        return $this->THEME;
    }
    public function setTheme($THEME){
        $this->THEME = $THEME;
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
     * @Column(name="NAMAORG", type="string", length=200)
     */
    protected $NAMAORG;
    public function getNamaOrganization(){
        return $this->NAMAORG;
    }
    public function setNamaOrganization($namaOrganization){
        $this->NAMAORG = $namaOrganization;
    }

    /**
     * @Column(name="DESKRIPSI", type="string", length=200)
     */
    protected $DESKRIPSI;
    public function getDeskripsi(){
        return $this->DESKRIPSI;
    }
    public function setDeskripsi($deskripsi){
        $this->DESKRIPSI = $deskripsi;
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
     * @Column(name="NAMASOFF", type="string", length=200)
     */
    protected $NAMASOFF;
    public function getNamaSalesOffice(){
        return $this->NAMASOFF;
    }
    public function setNamaSalesOffice($namaSalesOffice){
        $this->NAMASOFF = $namaSalesOffice;
    }

    /**
     * @Column(name="DISPLAYTEXT", type="string", length=100)
     */
    protected $DISPLAYTEXT;
    public function getDISPLAYTEXT(){
        return $this->DISPLAYTEXT;
    }
    public function setDISPLAYTEXT($DISPLAYTEXT){
        $this->DISPLAYTEXT = $DISPLAYTEXT;
    }

    /**
     * @Column(name="URL", type="string", length=250)
     */
    protected $URL;
    public function getURL(){
        return $this->URL;
    }
    public function setURL($URL){
        $this->URL = $URL;
    }

}
?>