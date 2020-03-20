<?php

class sscolaire_Model extends Model {

    public $tbl="examensbd";
   
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	
	
	//*********************************************************// 
	
	
	
	public function createexamen($data) {
	
	$this->db->insert($this->tbl, array(
	            
				'IDELEVE'   => $data['IDELEVE'],
				'UDS'       => $data['UDS'],
				'ETABLIS'   => $data['ETABLIS'],
				'DATESBD'   => $this->dateFR2US($data['DATESBD']),
				'NIVEAUS'   => $data['NIVEAUS'],
				'HYGIENE'   => $data['HYGIENE'],
				'GINGIVITE' => $data['GINGIVITE'],
				'AODF'      => $data['AODF'],
				'C'         => $data['C'],
				'A'         => $data['A'],
				'O'         => $data['O'],
				'CAO'       => $data['CAO'],
				'PC'        => $data['PC'],
				'PA'        => $data['PA'],
				'PO'        => $data['PO'],
				'PCAO'      => $data['PCAO'],
				
				'OKRDV'     => $data['OKRDV'],
				'DATECSBD'  =>$this->dateFR2US($data['DATECSBD']),
				
		
        ));
        
		// echo '<pre>';print_r ($data);echo '<pre>';
		 
		return $last_id = $this->db->lastInsertId();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 public function listemedecin($id) {
        return $this->db->select('SELECT * FROM medecindeces WHERE structure = :id order by Nom desc limit 0,3 ', array(':id' => $id));
     } 
	 
	public function medecinSave($data) {
	$this->db->insert('medecindeces', array(
			'Nom'       => $data['Nom'],
            'Prenom'    => $data['Prenom'],
            'wilaya'    => $data['wilaya'],
			'structure' => $data['structure']
	
	 ));
        //echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	public function deletemedecin($id) {       
        $this->db->delete('medecindeces', "id = '$id'");
    }
	
	
	//*********************************************************************************************************************//
	public function userSearch($o, $q, $p, $l,$ad) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->tbl where STRUCTURED=$structure and $o like '$q%' order by $o $ad limit $p,$l ");// 
    }
    public function userSearch1($o, $q ,$ad) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->tbl where STRUCTURED=$structure and $o like '$q%' order by $o $ad ");//  
    }
	 public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->tbl WHERE id = :id", array(':id' => $id));
    }
	public function listeAprouve() {
	     $structure = Session::get("structure"); 
        return $this->db->select("SELECT * FROM $this->tbl where STRUCTURED=$structure  and  aprouve=0 ");
    } 
	
	public function createdeces($data) {
		$Date1 = $this->dateFR2US($data['DATENS']);//echo '</br>';
		$Date2 = $this->dateFR2US($data['DINS']);//echo '</br>';
		$Timestamp1 = $this->CalculateTimestampFromCurrDatetime($Date1);//echo '</br>';
		$Timestamp2 = $this->CalculateTimestampFromCurrDatetime($Date2);//echo '</br>';
		$DateDiff = $this->CalculateDateDifference($Timestamp1, $Timestamp2);//echo '</br>';
	    //echo '<pre>';print_r ($DateDiff);echo '<pre>';
		$Date11 = $this->dateFR2US($data['DATEHOSPI']);//echo '</br>';
		$Date22 = $this->dateFR2US($data['DINS']);//echo '</br>';
		$Timestamp11 = $this->CalculateTimestampFromCurrDatetime($Date11);//echo '</br>';
		$Timestamp22 = $this->CalculateTimestampFromCurrDatetime($Date22);//echo '</br>';
		$DateDiff1x = $this->CalculateDateDifference($Timestamp11, $Timestamp22);//echo '</br>';
		if ($DateDiff1x>=0) {$DateDiff1=$DateDiff1x;} else {$DateDiff1=0;} 
		//echo '<pre>';print_r ($DateDiff1);echo '<pre>';
		$this->db->insert($this->tbl, array(
			'WILAYAD'    => $data['WILAYAD'],
            'COMMUNED'   => $data['COMMUNED'],
            'STRUCTURED' => $data['STRUCTURED'],
			'DINS'   => $this->dateFR2US($data['DINS']),
            'HINS'   => $data['HINS'],
            'NOM'    => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
            'FILSDE' => $data['FILSDE'],
			'ETDE'   => $data['ETDE'],
			'SEX'    => $data['SEXE'],
			'DATENAISSANCE' => $this->dateFR2US($data['DATENS']),
			'Days' => $DateDiff['days'],
            'Weeks' => $DateDiff['weeks'],
            'Months' => $DateDiff['months'],
            'Years' => $DateDiff['years'],
			'WILAYA'   => $data['WILAYAN'],
            'COMMUNE'  => $data['COMMUNEN'],
            'WILAYAR'  => $data['WILAYAR'],
            'COMMUNER' => $data['COMMUNER'],
            'ADRESSE'  => $data['ADRESSE'],
			'CD'  => $data['CD'],
			'LD'  => $data['LD'],
			'AUTRES'  => $data['AUTRES'],
			'OMLI'  => $data['OMLI'],
			'MIEC'  => $data['MIEC'],
			'EPFP'  => $data['EPFP'],
			'CIM1'  => $data['CIM1'],
			'CIM2'  => $data['CIM2'],
			'CIM3'  => $data['CIM3'],
			'CIM4'  => $data['CIM4'],
			'CIM5'  => $data['CIM5'],
			'NDLM'  => $data['NDLM'],
			'NDLMAAP'  => $data['NDLMAAP'],
			'GM'  => $data['GM'],
			'MN'  => $data['MN'],
			'AGEGEST'  => $data['AGEGEST'],
			'POIDNSC'  => $data['POIDNSC'],
			'AGEMERE'  => $data['AGEMERE'],
			'DPNAT'  => $data['DPNAT'],
			'EMDPNAT'  => $data['EMDPNAT'],
			'DECEMAT'  => $data['DECEMAT'],
			'GRS'  => $data['GRS'],
			'POSTOPP'  => $data['POSTOPP'],
		    'DATEHOSPI'  => $this->dateFR2US($data['DATEHOSPI']), 
		    'HEURESHOSPI'  => $data['HEURESHOSPI'],
			'SERVICEHOSPIT'  => $data['SERVICEHOSPIT'],
		    'DUREEHOSPIT'  => $DateDiff1['days'],
            'MEDECINHOSPIT'  => $data['MEDECINHOSPIT'],
			'CODECIM0'  => $data['CODECIM0'],
			'CODECIM'  => $data['CODECIM'],
            'WRS'=> $data['WILAYA'],
            'SRS'=> $data['STRUCTURE'],
            'USER'=> $data['login'],
			'NOMAR'    => $data['NOMAR'],
            'PRENOMAR' => $data['PRENOMAR'],
            'FILSDEAR' => $data['FILSDEAR'],
			'ETDEAR'   => $data['ETDEAR'],
			'NOMPRENOMAR' => $data['NOMPRENOMAR'],
			'PROAR' => $data['PROAR'],
			'ADAR'   => $data['ADAR'],
			'Profession' => $data['Profession'],
			'aprouve' => "0"	
        ));
        //echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	public function editSave($data) {
		$Date1 = $this->dateFR2US($data['DATENS']) ;//echo '</br>';
		$Date2 = $this->dateFR2US($data['DINS']) ;//echo '</br>';
		$Timestamp1 = $this->CalculateTimestampFromCurrDatetime($Date1);//echo '</br>';
		$Timestamp2 = $this->CalculateTimestampFromCurrDatetime($Date2);//echo '</br>';
		$DateDiff = $this->CalculateDateDifference($Timestamp1, $Timestamp2);//echo '</br>';
	    //echo '<pre>';print_r ($DateDiff);echo '<pre>';
		$Date11 = $this->dateFR2US($data['DATEHOSPI']) ;//echo '</br>';
		$Date22 = $this->dateFR2US($data['DINS']);//echo '</br>';
		$Timestamp11 = $this->CalculateTimestampFromCurrDatetime($Date11);//echo '</br>';
		$Timestamp22 = $this->CalculateTimestampFromCurrDatetime($Date22);//echo '</br>';
		$DateDiff1x = $this->CalculateDateDifference($Timestamp11, $Timestamp22);//echo '</br>';
		if ($DateDiff1x>=0) {$DateDiff1=$DateDiff1x;} else {$DateDiff1=0;} 
		//echo '<pre>';print_r ($DateDiff1);echo '<pre>';
		 $postData = array(
			'WILAYAD'    => $data['WILAYAD'],
            'COMMUNED'   => $data['COMMUNED'],
            'STRUCTURED' => $data['STRUCTURED'],
			'DINS'   => $this->dateFR2US($data['DINS']),
            'HINS'   => $data['HINS'],
            'NOM'    => $data['NOM'],
            'PRENOM' => $data['PRENOM'],
            'FILSDE' => $data['FILSDE'],
			'ETDE'   => $data['ETDE'],
			'SEX'    => $data['SEXE'],
			'DATENAISSANCE' => $this->dateFR2US($data['DATENS']),
			'Days' => $DateDiff['days'],
            'Weeks' => $DateDiff['weeks'],
            'Months' => $DateDiff['months'],
            'Years' => $DateDiff['years'],
			'WILAYA'   => $data['WILAYAN'],
            'COMMUNE'  => $data['COMMUNEN'],
            'WILAYAR'  => $data['WILAYAR'],
            'COMMUNER' => $data['COMMUNER'],
            'ADRESSE'  => $data['ADRESSE'],
			'CD'  => $data['CD'],
			'LD'  => $data['LD'],
			'AUTRES'  => $data['AUTRES'],
			'OMLI'  => $data['OMLI'],
			'MIEC'  => $data['MIEC'],
			'EPFP'  => $data['EPFP'],
			'CIM1'  => $data['CIM1'],
			'CIM2'  => $data['CIM2'],
			'CIM3'  => $data['CIM3'],
			'CIM4'  => $data['CIM4'],
			'CIM5'  => $data['CIM5'],
			'NDLM'  => $data['NDLM'],
			'NDLMAAP'  => $data['NDLMAAP'],
			'GM'  => $data['GM'],
			'MN'  => $data['MN'],
			'AGEGEST'  => $data['AGEGEST'],
			'POIDNSC'  => $data['POIDNSC'],
			'AGEMERE'  => $data['AGEMERE'],
			'DPNAT'  => $data['DPNAT'],
			'EMDPNAT'  => $data['EMDPNAT'],
			'DECEMAT'  => $data['DECEMAT'],
			'GRS'  => $data['GRS'],
			'POSTOPP'  => $data['POSTOPP'],
		    'DATEHOSPI'  => $this->dateFR2US($data['DATEHOSPI']),
		    'HEURESHOSPI'  => $data['HEURESHOSPI'],
			'SERVICEHOSPIT'  => $data['SERVICEHOSPIT'],
		    'DUREEHOSPIT'  => $DateDiff1['days'],
            'MEDECINHOSPIT'  => $data['MEDECINHOSPIT'],
			'CODECIM0'  => $data['CODECIM0'],
			'CODECIM'  => $data['CODECIM'],
            'WRS'=> $data['WILAYA'],
            'SRS'=> $data['STRUCTURE'],
            'USER'=> $data['login'],
			'NOMAR'    => $data['NOMAR'],
            'PRENOMAR' => $data['PRENOMAR'],
            'FILSDEAR' => $data['FILSDEAR'],
			'ETDEAR'   => $data['ETDEAR'],
			'NOMPRENOMAR' => $data['NOMPRENOMAR'],
			'PROAR' => $data['PROAR'],
			'ADAR'   => $data['ADAR'],
			'Profession' => $data['Profession']
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
        $this->db->update($this->tbl, $postData, "id =" . $data['id'] . "");
		return $last_id = $data['id'];
    }
	
	public function deletedeces($id) {       
        $this->db->delete($this->tbl, "id = '$id'");
    }

	public function Aprouve($data) {
        $postData = array('aprouve' => $data['aprouve']);
        $this->db->update($this->tbl, $postData, "id =" . $data['id'] . "");
		//echo '<pre>';print_r ($postData);echo '<pre>'; 
    }
	
	public function mlegale($data) {
	$postData = array(
			'idd'    => $data['idd'],
            'poids'   => $data['poids'],
			'taille'   => $data['taille']
	 );
	 //echo '<pre>';print_r ($postData);echo '<pre>'; 
     //$this->db->update('deceshosp', $postData, "id =" . $data['id'] . "");
	
    }
	
}