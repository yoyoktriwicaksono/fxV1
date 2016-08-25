<?php
/**
 * @Entity @Table(name="LOOKUP")
 **/
class VLookup {
    /**
    * @Id 
    * @Column(name="IDLOOKUP", type="string", length=20, nullable=false)
    */
    protected $idlookup;
    public function getId(){
        return $this->idlookup;
    }
    public function setId($idlookup){
        $this->idlookup = $idlookup;
    }

    /**
    * @Column(name="DESKRIPSI", type="string", length=200)
    */
    protected $deskripsi;
    public function getDeskripsi(){
        return $this->deskripsi;
    }
    public function setDeskripsi($deskripsi){
        $this->deskripsi = $deskripsi;
    }

    /**
    * @Column(name="IDKATEGORI", type="string", length=50, nullable=false)
    */
    protected $idkategori;
    public function getIdKategori(){
        return $this->idkategori;
    }
    public function setIdKategori($idkategori){
        $this->idkategori = $idkategori;
    }
    
    /**
    * @Column(name="KATEGORI", type="string", length=200, nullable=false)
    */
    protected $kategori;
    public function getKategori(){
        return $this->kategori;
    }
    public function setKategori($kategori){
        $this->kategori = $kategori;
    }

}
?>