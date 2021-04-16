                                <div id="questionid_<?php echo $divsize; ?>">   
								   <div class="col-md-7">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="placeholder"  name="question[]" value="" id="question<?php echo $divsize; ?>">
                                            </div>
                                        </div>
										<!--<div class="col-md-1">
                                            <div class="form-group">
                                                <input type="checkbox" class="form-control"  name="show_hide[]" id="show_hide<?php echo $divsize; ?>" value="1" checked>
                                            </div>
                                        </div>-->
									   <div class="col-md-1">
                                          <div class="form-group">	
									        <button type="button" style="margin-top: 9px;" id="remove_id" class="submit-btn" onclick="removeQuestion('<?php echo $divsize; ?>');"  >Remove</button>
                                          </div>									
                                        </div>									
								</div>		
									