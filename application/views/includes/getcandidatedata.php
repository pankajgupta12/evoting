                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Candidate Name</th>
                                    	<th>Post</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									
									foreach($candidatelist as $candidate){ 
									$candidate_id =   base64_encode($candidate->candidate_id);
									?>
                                        <tr>
                                        	<td><?php echo $i; ?></td>
                                        	<td><?php echo $candidate->candidate_name; ?></td>
                                        	<td><?php echo $candidate->position_id; ?></td>
                                        	<td><a href="<?php echo base_url('admin/add_candidate?candidate_id='.$candidate_id); ?>" style="cursor: pointer;">Edit</a>  | <a Onclick="return deleteleCandidate('<?php echo $candidate->candidate_id; ?>','<?php echo $candidate->candidate_name; ?>');" style="cursor: pointer;">  Delete</a></td>
                                        </tr>
									<?php $i++; } ?>
                                    </tbody>
                                </table>