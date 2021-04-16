<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Question</h4>
                            </div>
                            <div class="content">
                               <form action="<?php  echo base_url('admin/edit_question?question_id='.$_GET['question_id']); ?>" id="addquestiondata" method="post" class="middle-forms">   
								    
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                               <label>Question</label>
              									<input type="text" class="form-control" id="question" name="question" placeholder="question" value="<?php  if(set_value('question')){echo set_value('question');  }  elseif(isset($questiondata->question)) { echo trim($questiondata->question); }?>">
                                            </div>
                                        </div>  
                         <input type="hidden" class="form-control"  name="question_id" id="question_id" value="<?php if(isset($questiondata->question_id)) {echo $questiondata->question_id;} ?>">		               
                                    </div>
                                   <button  id="studentbtn" class="submit-btn"  style="float: left;">Update</button>
									
                                </form>    
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>