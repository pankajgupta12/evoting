<table class="table table-hover table-striped" id="getPostingData">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Post</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									
									foreach($positionlist as $positiondata){ ?>
                                        <tr>
                                        	<td><?php echo $i; ?></td>
                                        	<td><?php echo $positiondata->position_name	; ?></td>
                                        	<td><a href="<?php echo base_url('admin/add_post?position_id='.$position_id); ?>" style="cursor: pointer;">Edit</a>  | <a Onclick="return deletelePostListing('<?php echo $positiondata->position_id; ?>','<?php echo $positiondata->position_name; ?>');" style="cursor: pointer;">  Delete</a></td>
                                        </tr>
									<?php $i++; } ?>
                                    </tbody>
                                </table>