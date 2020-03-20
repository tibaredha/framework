<?php
class naissance_Model extends Model {

    public $tbl="naissance";
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	
	public function userSearch($o, $q, $p, $l) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM naissance where STRUCTURED=$structure and $o like '$q%' order by DINS1 limit $p,$l ");// 
    }
    public function userSearch1($o, $q) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM naissance where STRUCTURED=$structure and $o like '$q%' order by DINS1");//  
    }
	 public function userSingleList($id) {
        return $this->db->select('SELECT * FROM naissance WHERE id = :id', array(':id' => $id));
     }
	
	public function Aprouve($data) {
        $postData = array(
			'aprouve' => $data['aprouve']	
		);
        $this->db->update('naissance', $postData, "id =" . $data['id'] . "");
		//echo '<pre>';print_r ($postData);echo '<pre>'; 
    }
	
	public function listesagefemme($id) {
        return $this->db->select('SELECT * FROM sagefemme WHERE structure = :id order by Nom desc limit 0,3 ', array(':id' => $id));
    } 
	
    public function listeAprouve() {
	     $structure = Session::get("structure"); 
        return $this->db->select("SELECT * FROM naissance where STRUCTURED=$structure  and  aprouve=0 ");
    } 

	public function sagefemmeSave($data) {
	$this->db->insert('sagefemme', array(
			'Nom'       => $data['Nom'],
            'Prenom'    => $data['Prenom'],
            'wilaya'    => $data['wilaya'],
			'structure' => $data['structure']
	
	 ));
        //echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }

	 public function createnaissance($data) {
	  
		$this->db->insert('naissance', array(
            'WILAYA1'    => $data['WILAYA1'],
            'COMMUNE1'   => $data['COMMUNE1'],
            'STRUCTURED' => $data['STRUCTURED'],
			'DINS1'      => $this->dateFR2US($data['DINS1']),
            'HINS1'      => $data['HINS1'],
			'LOGIN'      => $data['LOGIN'],
			'NOM2'       => $data['NOM2'],
            'PRENOM2'    => $data['PRENOM2'],
            'DATENS2'    => $this->dateFR2US($data['DATENS2']),
			'AGE2'       => date('Y')-substr($this->dateFR2US($data['DATENS2']),0,4),
			'WILAYA2'    => $data['WILAYA2'],
			'COMMUNE2'   => $data['COMMUNE2'],
			'PROFESSION2'=> $data['PROFESSION2'],
			'GROUPAGE'   => $data['GROUPAGE'],
			'RH'         => $data['RH'],
			'TELMERE'    => $data['TELMERE'],
			'NSSMERE'    => $data['NSSMERE'],
			'NOM3'       => $data['NOM3'],
            'PRENOM3'    => $data['PRENOM3'],
            'DATENS3'    => $this->dateFR2US($data['DATENS3']),
			'AGE3'       => date('Y')-substr($this->dateFR2US($data['DATENS3']),0,4),
			'WILAYA3'    => $data['WILAYA3'],
			'COMMUNE3'   => $data['COMMUNE3'],
			'PROFESSION3'=> $data['PROFESSION3'],
			'GROUPAGEP'  => $data['GROUPAGEP'],
			'RHP'        => $data['RHP'],
			'TELPERE'    => $data['TELPERE'],
			'NSSPERE'    => $data['NSSPERE'],
			'WILAYA4'    => $data['WILAYA4'],
			'COMMUNE4'   => $data['COMMUNE4'],
			'ADRESSE4'   => $data['ADRESSE4'], 
			'NUMLF'      => $data['NUMLF'],
			'DNUMLF'     => $this->dateFR2US($data['DNUMLF']),
			'WILAYALF'   => $data['WILAYALF'],
			'COMMUNELF'  => $data['COMMUNELF'],
			'GESTE'      => $data['GESTE'],
			'PARITE'     => $data['PARITE'],
			'ABRT'       => $data['ABRT'],
			'CESA'       => $data['CESA'],
			'EVBP'       => $data['EVBP'],
			'NOMARM'     => $data['NOMARM'],
			'PRENOMARM'  => $data['PRENOMARM'],
			'NOMARP'     => $data['NOMARP'],
			'PRENOMARP'  => $data['PRENOMARP'],
			'DT12'       => $data['DT12'],
			'HTA'        => $data['HTA'],
			'CRD'        => $data['CRD'],
			'EPL'        => $data['EPL'],
			'AUT'        => $data['AUT'],
			'ADARPM'     => $data['ADARPM']
        ));
		$last_id0 = $this->db->lastInsertId();
		//mise ajoure changement de service si meme service annuler opperation 
		// $this->db->insert('chaser', array(
			// 'datechaser'    => $this->dateFR2US($data['HOSPI']),
            // 'heurechaser'   => $data['HHOSP'], 
			// 'idn'           => $last_id0 ,
			// 'schaser'       => $data['SERVI'],
			// 'nlitchaser'    => $data['NLIT'], 	
			// 'medecin'       => $data['SAGEFEMME5']		
	    // ));
		return $last_id = $last_id0;
		//echo '<pre>';print_r ($data);echo '<pre>';
		 
    }
	
	public function deletenaissance($id) {
        //1avant de suprimer il faut avoir  le numero de id lit avant la supression avec un select 
		//2mise ajour2 lit liberer l ancien lit//
	      $postData2 = array('idpt'    => '0' );
          $this->db->update('lit', $postData2, "id = ".$this->numlit($id)."");
		//3faire une supression multiple dans table chaser
		  $this->db->deletem('chaser',"idn = '$id'");
		//4faire une supression 
          $this->db->delete('naissance', "id = '$id'");
    }
	
	public function numlit($id) {
	$cnx = mysql_connect(DB_HOST,DB_USER,DB_PASS)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db(DB_NAME,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	$result = $result = mysql_query("SELECT * FROM naissance where id =".$id );
	$row=mysql_fetch_object($result);
	$NLIT=$row->NLIT;
	return $NLIT;
	}
	
	public function editSave($data) {
		
		//faire une mise ajour//
		 $postData = array(
			'WILAYA1'    => $data['WILAYA1'],
            'COMMUNE1'   => $data['COMMUNE1'],
            'STRUCTURED' => $data['STRUCTURED'],
			'DINS1'      => $this->dateFR2US($data['DINS1']),
            'HINS1'      => $data['HINS1'],
			'LOGIN'      => $data['LOGIN'],
			'NOM2'       => $data['NOM2'],
            'PRENOM2'    => $data['PRENOM2'],
            'DATENS2'    => $this->dateFR2US($data['DATENS2']),
			'AGE2'       => date('Y')-substr($this->dateFR2US($data['DATENS2']),0,4),
			'WILAYA2'    => $data['WILAYA2'],
			'COMMUNE2'   => $data['COMMUNE2'],
			'PROFESSION2'=> $data['PROFESSION2'],
			'GROUPAGE'   => $data['GROUPAGE'],
			'RH'         => $data['RH'],
			'TELMERE'    => $data['TELMERE'],
			'NSSMERE'    => $data['NSSMERE'],
			'NOM3'       => $data['NOM3'],
            'PRENOM3'    => $data['PRENOM3'],
            'DATENS3'    => $this->dateFR2US($data['DATENS3']),
			'AGE3'       => date('Y')-substr($this->dateFR2US($data['DATENS3']),0,4),
			'WILAYA3'    => $data['WILAYA3'],
			'COMMUNE3'   => $data['COMMUNE3'],
			'PROFESSION3'=> $data['PROFESSION3'],
			'GROUPAGEP'  => $data['GROUPAGEP'],
			'RHP'        => $data['RHP'],
			'TELPERE'    => $data['TELPERE'],
			'NSSPERE'    => $data['NSSPERE'],
			'WILAYA4'    => $data['WILAYA4'],
			'COMMUNE4'   => $data['COMMUNE4'],
			'ADRESSE4'   => $data['ADRESSE4'], 
			'NUMLF'      => $data['NUMLF'],
			'DNUMLF'     => $this->dateFR2US($data['DNUMLF']),
			'WILAYALF'   => $data['WILAYALF'],
			'COMMUNELF'  => $data['COMMUNELF'],
			'GESTE'      => $data['GESTE'],
			'PARITE'     => $data['PARITE'],
			'ABRT'       => $data['ABRT'],
			'CESA'       => $data['CESA'],
			'EVBP'       => $data['EVBP'],
			'NOMARM'     => $data['NOMARM'],
			'PRENOMARM'  => $data['PRENOMARM'],
			'NOMARP'     => $data['NOMARP'],
			'PRENOMARP'  => $data['PRENOMARP'],
			'DT12'       => $data['DT12'],
			'HTA'        => $data['HTA'],
			'CRD'        => $data['CRD'],
			'EPL'        => $data['EPL'],
			'AUT'        => $data['AUT'],
			'ADARPM'     => $data['ADARPM']
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
        $this->db->update('naissance', $postData, "id =" . $data['id'] . "");
		return $last_id = $data['id'];
    }
	
	public function apgaredite($data) {
		
		 $postData = array(
			'res'    => $data['res']  
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update('naissance', $postData, "id =" . $data['id'] . "");
	   return $last_id = $data['id'];
    }
	
	public function createmedfn($data) {
	
     $this->db->insert('medfn', array(
	        'DATE'    => $data['DATE'],
            'MED1'    => $data['MED1'], 
            'codemed' => $data['codemed'], 
			'QUT1'    => $data['QUT1'], 
			'idp'     => $data['idp'] 	
	 ));	
       //echo '<pre>';print_r ($data);echo '<pre>'; 
	   return $last_id = $data['id'];
    }
	
	public function editSaveEntrer($data) {
			
		//*******mise ajour occuper le lit*********//
	    $postData = array(
			'idpt'    => $data['NOM2'].'_'.$data['PRENOM2']
		  );
        $this->db->update('lit', $postData, "id =" . $data['NLIT'] . "");	
		//******faire une mise ajour changement de service  si meme service annuler opperation*****// 
		 $annlit=$this->numlit($data['id']);
		 $nvnlit=$data['NLIT'];
		 if($annlit==$nvnlit) 
		 {
		 
		 } 
		 else 
		 {
		 $postData2 = array('idpt'    => '0' );
            $this->db->update('lit', $postData2, "id = ".$this->numlit($data['id'])."");
		  
		  $this->db->insert('chaser', array(
			'datechaser'    => $this->dateFR2US($data['HOSPI']),
            'heurechaser'   => $data['HHOSP'], 
			'idn'           => $data['id'],
			'schaser'       => $data['SERVI'],
			'nlitchaser'    => $data['NLIT'], 	
			'medecin'       => $data['SAGEFEMME5']		
	     ));
		 }
		 //*******ajouter hospitalisation*********//
			$postData = array(
			'HOSPI'      => $this->dateFR2US($data['HOSPI']),
			'HHOSP'      => $data['HHOSP'], 
			'SERVI'      => $data['SERVI'], 
			'NLIT'       => $data['NLIT'], 
			'MATRI'      => $data['MATRI'], 
			'NDOSS'      => $data['NDOSS'], 
			'MODEE'      => $data['MODEE'], 
			'MOTIF'      => $data['MOTIF'], 
			'DGCNS'      => $data['DGCNS'] 	
        );
       //echo '<pre>';print_r ($data);echo '<pre>'; 
       $this->db->update('naissance', $postData, "id =" . $data['id'] . "");
	   return $last_id = $data['id'];
	
	}
	public function listennee($id) {
         $structure = Session::get("structure");
		return $this->db->select('SELECT * FROM nne WHERE IDF = :id order by id desc limit 0,10 ', array(':id' => $id));
    } 
	public function editSaveNnee($data) {
			
			$this->db->insert('nne', array(
            'IDF'        => $data['id'],
			'SA'         => $data['SA'],
			'WILAYA1'    => $data['WILAYA1'],
            'COMMUNE1'   => $data['COMMUNE1'],
			'DINS1'      => $this->dateFR2US($data['DINS1']),
            'HINS1'      => $data['HINS1'],
			'SEXE5'      => $data['SEXE5'],
			'PRENOM5'    => $data['PRENOM5'],
			'SAGEFEMME5' => $data['SAGEFEMME5'],
			'MAC'        => $data['MAC'],
			'VMN'        => $data['VMN'],
			'POIDS'      => $data['POIDS'],
			'APGAR'      => $data['APGAR'],
			'GROUPAGENN' => $data['GROUPAGENN'],
			'RHNN'       => $data['RHNN'],
			'PRENOMARE'  => $data['PRENOMARE']
            ));
			echo '<pre>';print_r ($data);echo '<pre>'; 
			$postData = array(
			'SA'         => $data['SA'],
			'WILAYA1'    => $data['WILAYA1'],
            'COMMUNE1'   => $data['COMMUNE1'],
			'DINS1'      => $this->dateFR2US($data['DINS1']),
            'HINS1'      => $data['HINS1'],
			'SEXE5'      => $data['SEXE5'],
			'PRENOM5'    => $data['PRENOM5'],
			'SAGEFEMME5' => $data['SAGEFEMME5'],
			'MAC'        => $data['MAC'],
			'VMN'        => $data['VMN'],
			'POIDS'      => $data['POIDS'],
			'APGAR'      => $data['APGAR'],
			'GROUPAGENN' => $data['GROUPAGENN'],
			'RHNN'       => $data['RHNN'],
			'PRENOMARE'  => $data['PRENOMARE']	
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update('naissance', $postData, "id =" . $data['id'] . "");
	   return $last_id = $data['id'];
	
	}
	
	 public function deletenne($id) {
          $this->db->delete('nne', "id = '$id'");
    } 

	public function editSaveSortir($data) {
			//mise ajour lit liberer l ancien lit//
	        $postData2 = array('idpt'    => '0' );
            $this->db->update('lit', $postData2, "id = ".$this->numlit($data['id'])."");
			
			$postData = array(
			'SORT'       => $this->dateFR2US($data['SORT']),
			'HSORT'      => $data['HSORT'], 
			'MSORT'      => $data['MSORT']
        );
       // echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update('naissance', $postData, "id =" . $data['id'] . "");
	   return $last_id = $data['id'];
	
	}

    public function createtrav($data) {
	  
		$this->db->insert('trav', array(
            'IDF'   => $data['IDF'],
			'DHE1'  => $this->dateFR2US($data['DHE1']),
		    'DHE2'  => $data['DHE2'],
			'RCF'   => $data['RCF'],
			'LA'    => $data['LA'],
			'DC'    => $data['DC'],
			'DIC'   => $data['DIC'],
			'DEP'   => $data['DEP'],
			'NDC'   => $data['NDC'],
			'POOLS' => $data['POOLS'],
			'TAS'   => $data['TAS'],
			'TAD'   => $data['TAD'],
			'TEMP'  => $data['TEMP'],
			'PRTU'  => $data['PRTU'],
			'ACU'   => $data['ACU'],
			'VU'    => $data['VU'],
            'OXY'   => $data['OXY'],	
			'NOXY'  => $data['NOXY'],
			'DCU'   => $data['DCU']	
        ));
		$last_id = $this->db->lastInsertId();
		return $last_id;
		//echo '<pre>';print_r ($data);echo '<pre>';	 
    }

   public function listeTrav($id) {
         $structure = Session::get("structure");
		return $this->db->select('SELECT * FROM trav WHERE idf = :id order by id desc limit 0,10 ', array(':id' => $id));
    } 
   public function lastTrav($id) {
         $structure = Session::get("structure");
		return $this->db->select('SELECT * FROM trav WHERE idf = :id order by id desc limit 0,1 ', array(':id' => $id));
    } 
	
	 public function trav($id) {
         $structure = Session::get("structure");
		return $this->db->select('SELECT * FROM trav WHERE idf = :id order by DHE2 asc ', array(':id' => $id));
    } 
	
   public function deletetrav($id) {
          $this->db->delete('trav', "id = '$id'");
    } 

     public function listeobser($id) {
         $structure = Session::get("structure");
		return $this->db->select('SELECT * FROM obser WHERE idf = :id order by id desc limit 0,10 ', array(':id' => $id));
    }
	 public function obser($id) {
         $structure = Session::get("structure");
		return $this->db->select('SELECT * FROM obser WHERE idf = :id order by DHE1 asc ', array(':id' => $id));
    } 
	 public function lastobser($id) {
         $structure = Session::get("structure");
		return $this->db->select('SELECT * FROM obser WHERE idf = :id order by id desc limit 0,1 ', array(':id' => $id));
    } 
	
    public function createobser($data) {
	  
		$this->db->insert('obser', array(
            'IDF'   => $data['IDF'],
			'DHE1'  => $data['DHE1'],
		    // 'DHE2'  => $data['DHE2'],
			// 'RCF'   => $data['RCF'],
			// 'LA'    => $data['LA'],
			// 'DC'    => $data['DC'],
			// 'DIC'   => $data['DIC'],
			'BIP'   => $data['BIP'],
			'HB'  => $data['HB'],
			'POOLS' => $data['POOLS'],
			'TAS'   => $data['TAS'],
			'TAD'   => $data['TAD'],
			'TEMP'  => $data['TEMP']
			// 'PRTU'  => $data['PRTU'],
			// 'ACU'   => $data['ACU'],
			// 'VU'    => $data['VU'],
            // 'OXY'   => $data['OXY'],	
			// 'NOXY'  => $data['NOXY'],
			// 'DCU'   => $data['DCU']	
        ));
		$last_id = $this->db->lastInsertId();
		return $last_id;
		// echo '<pre>';print_r ($data);echo '<pre>';	 
    }

   public function deleteobser($id) {
          $this->db->delete('obser', "id = '$id'");
    } 
	
}