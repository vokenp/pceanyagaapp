<?php
 include("assets/bin/con_db.php");
  global $db;
  $db->debug=1;
  error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<pre>";
   $getData = $db->GetArray("select *from vw_contributions where MeetingID=3");
    
    foreach ($getData as $vkey => $value) {
    	$MemberID = $value["MemberID"];
    	$ContriTypes[$value["ContributionType"]] = 0;
    	$list[$MemberID][] = $value;
    }

     foreach ($list as $key => $val) {
     	$ct =array();
     	$rst["MemberID"] = $key;
     	$rst["FullName"] = $val[0]["FullName"];
     	$rst["ModeofPayment"] = $val[0]["ModeofPayment"];
     	   $tt = 0;
     	   $Ctype = array();
     	   for ($i=0; $i < count($val); $i++) { 
     	   	$Ctype[$val[$i]["ContributionType"]] = $val[$i]["AmountContributed"];
     	   	$tt += $val[$i]["AmountContributed"];
     	   }
     	 $ct = array_merge($ContriTypes,$Ctype);
     	 print_r($ct);
     	    
     	
     }

  
?>