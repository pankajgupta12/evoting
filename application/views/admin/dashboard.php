<?php  
$string = "11_0,12_0,13_0,14_others";

$str = explode(',',$string);
//SELECT * FROM `tbl_users_answer` where  find_in_set('11_0',answer) OR find_in_set('11_1',answer) OR find_in_set('11_others',answer) 
  
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
				<?php 
				$i=0;
				$Question_details =$this->db->select('*')->get_where('tbl_question',array('show_hide'=>1))->result();
				foreach($Question_details as $Question_details)
				{
					$question_id= $Question_details->question_id;
				
					 $getansQuery = $this->db->query("SELECT * FROM `tbl_users_answer` where  find_in_set('".$question_id."_0',answer) OR find_in_set('".$question_id."_1',answer) OR find_in_set('".$question_id."_others',answer)")->result();
					 if(!empty($getansQuery)){
					 $i++;
					// print_r($getansQuery);
					 $countUser = count($getansQuery);
					 // echo $countUser;
					//foreach($getansQuery as $getansQuery1)
					//{
						$getansQuery_yes = $this->db->query("SELECT * FROM `tbl_users_answer` where  find_in_set('".$question_id."_1',answer)")->result();
						//echo  $this->db->last_query();
						// print_r($getansQuery_yes);
						$getansQuery_no = $this->db->query("SELECT * FROM `tbl_users_answer` where  find_in_set('".$question_id."_0',answer)")->result();
					//print_r($getansQuery_no);

						//echo count($getansQuery_no);
					//	echo "<pre>"; print_r($getansQuery_no);
						$getansQuery_others = $this->db->query("SELECT * FROM `tbl_users_answer` where  find_in_set('".$question_id."_others',answer)")->result();
                      // print_r($getansQuery_others);
					   //$answer = $getansQuery1->answer;
					   //	echo  $this->db->last_query(); 
					  // echo count($getansQuery_no);
						$countUSer_yes =count($getansQuery_yes);
						$countUSer_no =count($getansQuery_no);
						$countUSer_others =count($getansQuery_others);
						if($countUser==0){
						$total_countUser=1;
						}
						else{
						$total_countUser =$countUser;
						}
						$percentage_yes=(($countUSer_yes*100)/$total_countUser);
						$percentage_no=(($countUSer_no*100)/$total_countUser);
						$percentage_others=(($countUSer_others*100)/$total_countUser);
					
					// }  
				?>
					<div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Voting Statistics</h4><hr>
                                <p class="category">Question <?php echo $i; ?></p>
                            </div>
                            <div class="content">
                                <!--<div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>-->
								<div id="chartContainer_<?php echo $i; ?>" style="height: 300px; width: 100%;"></div>

                                <div class="footer">
                                    <!---<div class="legend">
                                        <i class="fa fa-circle text-info"></i> Agree
                                        <i class="fa fa-circle text-danger"></i> Disagree
                                        <i class="fa fa-circle text-warning"></i> No Answer
                                    </div> ---->
                                    <hr>
                                    <div class="stats" style="font-size: 9px;">
                                        <i class=""></i><?php echo $Question_details->question ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?php 
				}}
			?>    
            </div>
			<?php 
	
	
			
 	$post_list=$this->db->select('distinct(position_id) as PositionID')->from('tbl_uer_positionvoting')->get()->result();
	$k = 0;
	foreach($post_list as $post_list){
	 
	   $position_id = $post_list->PositionID;
	   
	   $getpositionName = $this->db->select('*')->get_where('tbl_position',array('position_id'=>$position_id,'status'=>1))->row();
	//  echo $getpositionName->position_name;
	//	echo "<br>";
	   if(!empty($getpositionName)){
	   $k++;
	   
	   $voting_details=$this->db->select('*')->get_where('tbl_uer_positionvoting',array('position_id'=>$position_id))->result();
   	  $total_votes = count($voting_details);	       
		// echo substr($total_votes,-1,1);
		 // echo  $string[$countNumber - 1];
	$post_list1=$this->db->select('distinct(position_id) as PositionID')->from('tbl_uer_positionvoting')->get()->result();

	// foreach($voting_details as $candidate_details){
		//$candidate_name =$candidate_details->candidate_name;
		
		// $voting_details_candidate_wise=$this->db->select('*')->get_where('tbl_uer_positionvoting',array('position_id'=>$position_id,'candidate_id'=>$candidate_details->candidate_id))->result();
		
		// $getCanditateName = $this->db->select('*')->get_where('tbl_candidate',array('candidate_id'=>$candidate_details->candidate_id))->row();
		
		// print_r($getCanditateName);
		
		// print_r($voting_details_candidate_wise);
		// echo $user_wise_vote_count = count($voting_details_candidate_wise);
		 
	//	} 
	 $CanditateList_PostWise = $this->db->select('*')->get_where('tbl_candidate',array('position_id'=>$position_id))->result();
	 foreach($CanditateList_PostWise as $CanditateList_PostWise)
	 {
		$voting_details_candidate_wise=$this->db->select('*')->get_where('tbl_uer_positionvoting',array('position_id'=>$position_id,'candidate_id'=>$CanditateList_PostWise->candidate_id))->result();
		// print_r($voting_details_candidate_wise);
		// echo count($voting_details_candidate_wise);
	 }
		
    ?>
			<div class="card">
			<div class="content">
			   <div id="chartContainer_bar_chart_<?php echo $k; ?>" style="height: 300px; width: 100%;"></div>
			</div>
			</div>
       <?php }} ?>
        </div>
    </div>
	
<script type="text/javascript" src="<?php echo base_url();?>/files/chart/canvasjs.min.js"></script>		
<script type="text/javascript">
window.onload = function () 
    {
		<?php 
			$j=1;
			$Question_details1 =$this->db->select('*')->get_where('tbl_question',array('show_hide'=>1))->result();
			foreach($Question_details1 as $Question_details1)
			{
			$question_id1= $Question_details1->question_id;
			$getansQuery1 = $this->db->query("SELECT * FROM `tbl_users_answer` where  find_in_set('".$question_id1."_0',answer) OR find_in_set('".$question_id1."_1',answer) OR find_in_set('".$question_id1."_others',answer)")->result();
			if(!empty($getansQuery1)){
					 
			$countUser1 = count($getansQuery1);
					//foreach($getansQuery as $getansQuery) {
					    $getansQuery_yes1 = $this->db->query("SELECT * FROM `tbl_users_answer` where  find_in_set('".$question_id1."_1',answer)")->result();
						
						$getansQuery_no1 = $this->db->query("SELECT * FROM `tbl_users_answer` where  find_in_set('".$question_id1."_0',answer)")->result();
						
						$getansQuery_others1 = $this->db->query("SELECT * FROM `tbl_users_answer` where  find_in_set('".$question_id1."_others',answer)")->result();
						
                       //$answer = $getansQuery1->answer;
					   if(!empty($getansQuery_yes1)){
							$countUSer_yes1 =count($getansQuery_yes1);
					   }
					   else{
							$countUSer_yes1 =0;
					   }
						if(!empty($getansQuery_no1)){
							$countUSer_no1 =count($getansQuery_no1);
					   }
					   else{
							$countUSer_no1 =0;
					   }
					   if(!empty($getansQuery_others1)){
							$countUSer_others1 =count($getansQuery_others1);
					   }
					   else{
							$countUSer_others1 =0;
					   }						
						
						if($countUser1==0){
						$total_countUser1=1;
						}
						else{
						$total_countUser1 =$countUser1;
						}
						
						$percentage_yes1=(($countUSer_yes1*100)/$total_countUser1);
						$percentage_no1=(($countUSer_no1*100)/$total_countUser1);
						$percentage_others1=(($countUSer_others1*100)/$total_countUser1);
					
					//}
					
					
		?>
		// alert('<?php  echo $countUser1; ?>');
	var id = '<?php echo $j; ?>';
	var percentage_yes = parseInt('<?php echo $percentage_yes1; ?>');
	var	percentage_no =	parseInt('<?php echo $percentage_no1; ?>');
	var	percentage_others =	parseInt('<?php echo $percentage_others1; ?>');
	// alert(percentage_yes);
	// alert(percentage_no);
	// alert(percentage_others);
	var chart = new CanvasJS.Chart('chartContainer_'+id,
	{
		title:{
			//text: "How my time is spent in a week?",
			fontFamily: "arial black",
			fontSize: 50
		},
                animationEnabled: true,
		legend: {
			verticalAlign: "bottom",
			horizontalAlign: "center",
			fontSize: 15
		},
		theme: "theme1",
		data: [
		{        
			type: "pie",
			indexLabelFontFamily: "Garamond",       
			indexLabelFontSize: 20,
			indexLabelFontWeight: "bold",
			startAngle:0,
			indexLabelFontColor: "MistyRose",       
			indexLabelLineColor: "darkgrey", 
			indexLabelPlacement: "inside", 
			toolTipContent: "{name}: {y}%",
			showInLegend: true,
			indexLabel: "#percent%", 
			dataPoints: [
				{  y: percentage_yes, name: "Agree", legendMarkerType: "triangle"},
				{  y: percentage_no, name: "Disagree ", legendMarkerType: "square"},
				{  y: percentage_others, name: "Others", legendMarkerType: "circle"}
			]
		}
		]
	});
	chart.render();
	<?php   $j++; }}  ?>
<?php 
$post_list1=$this->db->select('distinct(position_id) as PositionID')->from('tbl_uer_positionvoting')->get()->result();
	$k1 = 0;
	foreach($post_list1 as $post_list2){
	 
	   $position_id1 = $post_list2->PositionID;
	   
	   $getpositionName1 = $this->db->select('*')->get_where('tbl_position',array('position_id'=>$position_id1,'status'=>1))->row();
	    // echo $getpositionName1->position_name;
		// echo "<br>";
	   if(!empty($getpositionName1)){ 
	   $k1++;
	   $voting_details1=$this->db->select('*')->get_where('tbl_uer_positionvoting',array('position_id'=>$position_id1))->result();
		$total_votes1 = count($voting_details1);
		$lastDigit = substr($total_votes,-1,1);
		$maximum_votes=$total_votes1+(10-$lastDigit);
		if($maximum_votes==10)
		{
			$maximum =20;
		}
		else
		{
			$maximum = $maximum_votes;
		}
		//$maximum
	 /* foreach($voting_details1 as $candidate_details1){
		//$candidate_name =$candidate_details->candidate_name;
		
		$voting_details_candidate_wise1=$this->db->select('*')->get_where('tbl_uer_positionvoting',array('position_id'=>$position_id1,'candidate_id'=>$candidate_details1->candidate_id))->result();
		
		$getCanditateName1 = $this->db->select('*')->get_where('tbl_candidate',array('candidate_id'=>$candidate_details1->candidate_id))->row();
		
		// print_r($getCanditateName);
		
		 //echo "<pre>"; print_r($voting_details_candidate_wise);
		// echo $user_wise_vote_count = count($voting_details_candidate_wise);
		 
		} */
		$CanditateList_PostWise1 = $this->db->select('*')->get_where('tbl_candidate',array('position_id'=>$position_id1))->result();
		
?>	
	var postID = '<?php echo $k1; ?>';
	var position_name ='<?php echo $getpositionName1->position_name; ?>';
    var chart = new CanvasJS.Chart('chartContainer_bar_chart_'+postID,
    {
      title:{
        text: "Voting Result: "+position_name
      },
      axisY: {
        title: "No. of Votes",
        maximum: <?php echo $maximum; ?>
      },
	  theme: "theme1",
      data: [
      {
        type: "bar",
        showInLegend: true,
        legendText: "Votes",
        color: "gold",
        dataPoints: [
		
	    <?php 
			foreach($CanditateList_PostWise1 as $CanditateList_PostWise1){
			$voting_details_candidate_wise1=$this->db->select('*')->get_where('tbl_uer_positionvoting',array('position_id'=>$position_id1,'candidate_id'=>$CanditateList_PostWise1->candidate_id))->result();
			// print_r($voting_details_candidate_wise);
			$count_user_wise_vote1 = count($voting_details_candidate_wise1); 		
			// $count_user_wise_vote = 10; 		
		?> 	 

        { y:<?php echo $count_user_wise_vote1; ?>, label:'<?php echo $CanditateList_PostWise1->candidate_name; ?>'},
		<?php  } ?>
        ]
      }
      ]
    });

chart.render();
<?php  }} ?>
}
</script>
