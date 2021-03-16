  <?php 
      $getGStats = $db->GetArray("SELECT * FROM vw_memberagerange");
        $Gender = array("Male"=>0,"Female"=>0);
         $Dist = array();
         $ageranges = array("0-13"=>0,"14-35"=>0,"35-65"=>0,"Above-65"=>0,"DTotal"=>0);
       foreach ($getGStats as $key => $val) {
       	$Gender[$val["Gender"]] += $val["NumCount"];
          if (!isset($Dist[$val["DistrictName"]])) {
          	$Dist[$val["DistrictName"]] = $ageranges;
          }
       	$Dist[$val["DistrictName"]][$val["age_range"]] += $val["NumCount"];
       	$Dist[$val["DistrictName"]]["DTotal"] += $val["NumCount"];
       }
      
  ?>
<div class="page-header">
  <h1>
    Dashboard
    <small>
      <i class="ace-icon fa fa-angle-double-right"></i></small>
  
  </h1>
  
</div><!-- /.page-header -->
<div class="page-content">
  <div class="row">
   
    <div class="col-sm-5">
				
				<div class="widget-box">
				<div class="widget-header widget-header-flat widget-header-small">
					<h5 class="widget-title">
						<i class="ace-icon fa fa-signal"></i>
						Membership Stats
					</h5>
				</div><!-- End Widget-header -->
              <div class="widget-body">
				<div class="widget-main">
				     <div class="row">
				<div class="col-sm-12 infobox-container">
					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-users"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo $Gender["Male"];?></span>
							<div class="infobox-content">Male Members</div>
						</div>
					</div>

					<div class="infobox infobox-pink">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-users"></i>
						</div>

						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo $Gender["Female"];?></span>
							<div class="infobox-content">Female Members</div>
						</div>
					</div>
				</div><!-- End InfoBox Container -->
				</div><!-- End Row -->

				<div class="row">
					<table class="table table-bordered table-striped">
					<thead class="thin-border-bottom">
						<tr>
							<th>District</th>
							<th>Age 0-13</th>
							<th>Age 14-35</th>
							<th>Age 35-65</th>
							<th>Above 65</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						 <?php
						    $html = "";
						    $labels = array("label-danger","label-success","label-info","label-warning","label-default");
                            foreach ($Dist as $key => $valu) {
                            	$rand_keys = array_rand($labels, 1);
                            	$lbl = $labels[$rand_keys];
                               $html .= "<tr>";
                               $html .= "<td> <span class='label $lbl arrowed-in arrowed-in-right'>$key</span></td>";
                               $html .= "<td>".$valu["0-13"]."</td>";
                               $html .= "<td>".$valu["14-35"]."</td>";
                               $html .= "<td>".$valu["35-65"]."</td>";
                               $html .= "<td>".$valu["Above-65"]."</td>";
                               $html .= "<td>".$valu["DTotal"]."</td>";
                               $html .= "</tr>";
                            }
                            echo $html;
						 ?>
					</tbody>
				</table>
				</div>

		        </div><!-- Widget-main -->
	      </div> <!-- End Widget-body -->
	    </div> <!-- End WidgetBox -->

				
   </div>  <!-- End Col-6 -->
 </div>

</div><!-- End Page-Content -->
