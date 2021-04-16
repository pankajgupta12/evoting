<?php  //print_r($mobilelist); die; ?>                           
						   <table class="table table-hover table-striped">
                                    <thead>
                                        <th>S.N.</th>
                                    	<th>Mobile Number</th>
                                    	<th>Action</th>
                                    </thead>
                                    <tbody>
									<?php  $i= 1;
									
									foreach($mobilelist as $mobiledata){ ?>
                                        <tr>
                                        	<td><?php echo $i; ?></td>
                                        	<td><?php echo $mobiledata->mobile_number; ?></td>
                                        	<td><a href="#" style="cursor: pointer;">Edit</a>  | <a Onclick="return deletelesendLink('<?php echo $mobiledata->mobile_id; ?>','<?php echo $mobiledata->mobile_number; ?>');" style="cursor: pointer;">  Delete</a></td>
                                        </tr>
									<?php $i++; } ?>
                                    </tbody>
                                </table>