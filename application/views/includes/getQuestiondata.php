<table class="table table-hover table-striped">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Question</th>
                                    	<th>Status</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									
									foreach($questionlist as $questiondata){ 
									 $question_id = base64_encode($questiondata->question_id);
									?>
                                        <tr>
                                        	<td><?php echo $i; ?></td>
                                        	<td><?php echo $questiondata->question; ?></td>
                                        	<td><?php if($questiondata->show_hide == '1') {echo "Active"; }else{ echo "Deactive";}?></td>
                                        	<td><a href="<?php echo base_url('admin/edit_question?question_id='.$question_id); ?>" style="cursor: pointer;">Edit</a>  | <a Onclick="return deleteleAddQuestion11('<?php echo $questiondata->question_id; ?>');" style="cursor: pointer;">  Delete</a></td>
                                        </tr>
									<?php $i++; } ?>
                                    </tbody>
                                </table>