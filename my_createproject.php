<style>
     .search_auto{
        border-radius: 0px;
        padding: 5px 6px 5px 27px;
        background: url("<?php echo $base_url.'wall_icons/wallicons.png'; ?>") no-repeat scroll -164px -213px ;
        background-color:white;
        text-indent: 20px;
     }
     #div-whole{
         background: white;
         width: 1045px;
         margin-left:auto;
         margin-right:auto;
     }
     #div-whole input, #div-whole textarea{
         /*width:300px;*/
     }
     #div-whole table tr td{
         padding:10px;
     }
     .div-new-community{
         //padding-left: 109px;
     }
     
     .div-new-ngo{
         padding-left: 80px;
     }
     
     .div-new-ngo .text-right{
         width:200px;
     }
             
     .add_new_com , .add_new_ngo, #hide_new_com, #hide_new_ngo{
         cursor: pointer;
     }
     .last-table{
         float: left;
         margin-left: 78px;
     }
     
     #div-whole .btn-submit{
         margin:30px;
         
     }
     
     .bootstrap-tagsinput{
         width: 302px !important;
     }
     
    div.div-new-community , div.div-new-ngo{
        margin-left:60px;
        border: 2px solid #a1a1a1;
        border-radius: 25px;
    }
    hr{
        margin: 0px;
    }
     
     
</style>

<div id="div-whole">
    <h2 class="text-center text-pink">Create a Page for Your <b>Project ! </b></h2>
    <p class="text-center">List your project so that we can continue helping after you have left</p>
     <hr class="header_line">
    <h3 class="each-text">Project Information</h3>

<form method='post' action='' enctype="multipart/form-data" class="form-horizontal">
 
<table class="table_project">
            <tr>
                <td><p class="right-text">What is Your Project's Name? </p></td>
                <td><input type="text" name='proj_name' value="<?php echo $_POST['proj_name']; ?>" class="form-control" required="" placeholder="E.g. Building School, Teaching English"/>
                </td>
                <td><label class="text-pink"><?php echo $error_info1; ?></label></td>
            </tr>
            <tr>
                <td><p class="right-text">When is the Start Date?</p></td>
                <td><input class="date-picker form-control" id="start-date" type="text" name="proj_start_date" value='<?php echo $_POST["proj_start_date"]; ?>' placeholder="E.g. 2015-May-12"/></td>
                <td><label for="start-date" class="add-on"></label></td>       
            </tr>
            <tr>
                <td><p class="right-text">When is the End Date?</p></td>
                <td><input class="date-picker form-control" id="end-date" type="text" name='proj_end_date' value="<?php echo $_POST['proj_end_date']; ?>" placeholder="E.g 2015-May-12" onClick="ValidateEndDate()"/></td>
                <td></td>
            </tr>
            <tr>
                <td><p class="right-text">What is languages do you use in the project?</p></td>
                <!-- <td><input class="date-picker form-control" id="end-date" type="text" name='proj_end_date' value="<?php //echo $_POST['proj_end_date']; ?>" placeholder="Your Project's End Date"/></td> -->
                <!-- <td><input type="text" name="proj_lang" class="form-control languages" placeholder="eg. Chinese, English, Khmer..." value="<?php //echo $_POST['proj_lang']; ?>"/></td> -->
                <td><input type="text" name="proj_lang" class="form-control" placeholder="E.g. English,Chinese, Khmer" value="<?php echo $_POST['proj_lang']; ?>"/></td>
                <td></td>
            </tr>
            <tr>
                <td><p class="right-text">Which skills do you required?</p></td>
                        <!-- <td><input type="text" name="skills" class="form-control skills" placeholder="eg. Teaching/Painting/Constrcuting..." value="<?php echo $_POST['skills']; ?>"/>  -->
                <td><input type="text" name="skills" class="form-control" placeholder="E.g. Teaching Skill,Programmer, Designer" value="<?php echo $_POST['skills']; ?>"/> 
                        </td>
                <td></td>
            </tr>
            <tr>
                <td><p class="right-text">What is your role ?</p></td>
                <td width="60%;"><input type="text" name="usr_role" class="form-control" placeholder="E.g. Project Leader,Team Leader" value="<?php echo $_POST['usr_role']; ?>"/>
                </td>
                <td></td>
            </tr>  

</table>
<h3 class="each-text">Community Information</h3>  
<table class="table_project">
 <tr>
        <td><p class="right-text">What is the community name?</p></td>
        <td width="60%;"><input type='text' name='new_com_name' value="<?php echo $_POST['new_com_name']; ?>" placeholder="E.g. Shy Village, Kandieng Village" maxlength="50" class="form-control"/>
        </td>
        <td></td>
    </tr>
<tr>
    <tr valign='top'>
        <td><p class="right-text">Community Address: </p></td>
        <td><textarea style="height: 100px !important;" name='new_com_add' class="textarea form-control" placeholder="E.g Shy Village, Kandieng Distict Pursat Province, Cambodia"><?php echo $_POST['new_com_add']; ?></textarea>
        </td>
        <td></td>
 </tr>
 <td><p class="right-text">Language(s) Spoken: </p></td>
  <td><input type='text' name='new_lang' value="<?php echo $_POST['new_lang']; ?>" placeholder="E.g. English, Chinese, Khmer" maxlength="50" class="form-control">
     </td>
     <td></td>
 </tr>
  
</table>
<h3 class="each-text">Organization Information</h3>

 <table>
            <tr>
                <td><p class="right-text">Are you a part of the Organization?</p></td>
                <?php if ($_POST['have_org']=="no") {
                    $_POST['proj_org'] = ""; $error_info3 = "";
                    $_POST['new_org_name'] = ""; $_POST['new_org_add'] = ""; $_POST['new_org_web'] = "";
                    
                    ?>
                <td>
                    <input name="have_org" type="radio" value="yes" id="yes" style="width:30px;"/>Yes
                    <input name="have_org" type="radio" value="no" id="no" checked="check" style="width:30px;"/> No
              </td>
                <?php }else { ?>
               <td>
                    <input name="have_org" type="radio" value="yes" id="yes" checked="check" style="width:30px;"/>Yes
                    <input name="have_org" type="radio" value="no" id="no" style="width:30px;"/> No
              </td>
                <?php }?>
            </tr>
            </table>

            

            <div class="disable-ngo">
            <table class="table_project">
                    <tr>
                        <td><p class="right-text">What is organization name? </p></td>
                        <td width="60%;"><input class="form-control" type='text' name='new_org_name' value="<?php echo $_POST['new_org_name']; ?>" placeholder="E.g. National University of Singapore" maxlength="50"/>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p class="right-text">What is address organization? </p></td>
                        <td><textarea style="height: 100px !important;" placeholder="E.g 21 Lower Kent Ridag Rd, Singapore" name='new_org_add' class="textarea form-control"><?php echo $_POST['new_org_add']; ?></textarea>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td><p class="right-text">What is organization website? </p></td>
                        <td><input class="form-control" type='url' name='new_org_web' value="<?php echo $_POST['new_org_web']; ?>" placeholder="E.g www.nun.edu.sg" maxlength="50"/>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><p class="right-text">Do you have your Project Documents?<p/></td>
                        <td><input type="file" name="proj_file"/>
                        </td>

                       <td></td>
                    </tr>

                </table>
        </div>
<div style="  text-align: center;">
        <input type="hidden" name="proj_com_id" id="proj_com_id" value="<?php echo $_POST['proj_com_id']; ?>" />
        <input type="hidden" name="proj_oid" id="proj_oid" value="<?php echo $_POST['proj_oid']; ?>" />
        <input type="submit" value="show me my project" class="btn-submit btn btn-post"/>
</div>

</form>

<!-- Test limit datepicker -->


<!-- End of test limit datepic -->
</div>
<script type="text/javascript">
    
    $("input.languages").val();
    $("input.languages").tagsinput('items');

    $("input.skills").val();
    $("input.skills").tagsinput('items');

//     function ValidateEndDate(){}
//     var startDate = $("start-date").val();
//     var endDate = $("end-date").val();
//          if (startDate != '' && endDate !='') {
//              if (Date.parse(startDate) > Date.parse(endDate)) {
//                  // x$("txttodate").val('');
//                  alert("Start date should not be greater than end date");
//              }
//          }
//          return false;
// }
    

  
    $("#start-date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    }).on('changeDate', function (selected) {
        var startDate = new Date(selected.date.valueOf());
        $('#end-date').datepicker('setStartDate', startDate);
    }).on('clearDate', function (selected) {
        $('#end-date').datepicker('setStartDate', null);
    });

    $("#end-date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    }).on('changeDate', function (selected) {
        var endDate = new Date(selected.date.valueOf());
        $('#start-date').datepicker('setEndDate', endDate);
    }).on('clearDate', function (selected) {
        $('#end-date').datepicker('setEndDate', null);
    });

    $('body').on('change', '#start-date, #end-date', function(){
      var endDate = new Date($('#end-date').val())
      var startDate = new Date($('#start-date').val())
      if (startDate > endDate) {
        alert("Start date should not be greater than end date");
      }
    })
    
    
    $(".div-new-community").hide();
    $(".add_new_com").click(function(){
       $('.div-new-community').slideToggle(1500);
    });
    $("#hide_new_com").click(function(){
       $('.div-new-community').slideToggle(1500);
    });
    
    //$(".div-new-ngo").hide();
    // $(".add_new_ngo").click(function(){
    //    $('.disable-ngo').slideToggle(1500);
    // });
    // $("#hide_new_ngo").click(function(){
    //    $('.disable-ngo').slideToggle(1500);
    // });
    
    
    $('input:radio[name=have_org]').click(function() {
         if($('#yes').attr('checked')) {
             $('.disable-ngo').show();
           } else if ($('#no').attr('checked')) {
             // $('#show_hide_org').hide();
              $('.disable-ngo').hide();
          }

    });
        
    function autocomplet() {
            var min_length = 0; // min caracters to display the autocomplete
            var keyword = $('#proj_community').val();
            if (keyword.length > min_length) {
                    $.ajax({
                            url: 'create_search_autocomplete.php',
                            type: 'POST',
                            data: {keyword:keyword},
                            success:function(data){
                                    $('#proj_community_id').show();
                                    $('#proj_community_id').html(data);
                            }
                    });
            } else {
                    $('#proj_community_id').hide();
            }
    }

    // set_item : this function will be executed when we select an item
    function set_item(item1, item2) {
            // change input value
            $('#proj_community').val(item1);
            $('#proj_com_id').val(item2);
            // hide proposition list
            $('#proj_community_id').hide();
    }

    function autocomplet_org() {
            var min_length = 0; // min caracters to display the autocomplete
            var keyword = $('#proj_org').val();
            if (keyword.length > min_length) {
                    $.ajax({
                            url: 'create_search_autocomplete_org.php',
                            type: 'POST',
                            data: {keyword:keyword},
                            success:function(data){
                                    $('#proj_org_id').show();
                                    $('#proj_org_id').html(data);
                            }
                    });
            } else {
                    $('#proj_org_id').hide();
            }
    }

    function set_item_org(item1, item2){
            // change input value
            $('#proj_org').val(item1);
            $('#proj_oid').val(item2);
            // hide proposition list
            $('#proj_org_id').hide();
    }
</script>