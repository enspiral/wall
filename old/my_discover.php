<style>
    div.discover-left-sidebar {
        padding: 10px;
        margin-right: 5px;
        margin-bottom: 20px;
        background-color: #FFF;
        border-radius: 5px;
        box-shadow: 0px 0px 2px #888;
    }

    input[type="checkbox"]{
        margin-right: 10px;
    }

    .content-discover-project img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background-color: green;
    }

    div.content-discover-project {
        border-radius: 5px;
        padding:20px;
        margin-bottom:20px;
        background-color: white;
        box-shadow:0px 0px 2px #888888;
    }
    /*.tab.....*/
    
    .div-tab{
          background-color: #2AA9DE;
          padding-top: 4px;
          padding-right: 0px;
    }
    .div-tab ul li a{
        padding:10px;
        color: #ffffff;
    }
    .div-tab ul .title-tab{
        padding:10px;
        color: #ffffff; 
    }
    
    .div-tab .nav-tabs > li.active > a, .div-tab .nav-tabs > li.active > a:hover,.div-tab  .nav-tabs > li.active > a:focus{
        background-color: #ffffff;
        border-radius: 5px 5px 0px 0px;
    }
    
    .tab-content .media-body{
        width:100%;
    }
    .bold{
        font-weight: bold;
    }
    
  
</style>
<div class="row">
    <form method='post' action='' enctype="multipart/form-data">
        <div class="col-lg-12" style="  box-shadow: 0px 0px 2px #888;
  background-color: #fff;
  padding: 20px 10px;
  border-color: #dddddd 1px solid;
  margin-bottom: 10px;
  border-radius: 5px;">

            <table width="80%" class="table-form">
                <tr>
                    <td width="20%">
                        <select class="form-control">
                            <option value="">All Type</option>
                        </select>
                    </td>
                    <td width="30%"><input class="form-control" type="text" name="search_name" placeholder="What?" value="<?php echo $_POST['search_name']; ?>"></td>
                    <td width="40%"><input class="form-control" type="text" name="search_location" placeholder="Location" value="<?php echo $_POST['search_location']; ?>"></td>
<!--                    <td width="40%">
                        <select class="form-control" name="search_location">
                            <option value="<?php echo $_POST['search_location']?$_POST['search_location']:''; ?>"><?php echo $_POST['search_location']?$_POST['search_location']:''; ?></option>
                            <?php foreach ($loc as $value_location) { ?>
                            <option value="<?php echo $value_location['location']; ?>"><?php echo $value_location['location']; ?></option>
                            <?php } ?>
                        </select>
                    </td>-->
                    <td width="10%"> <input class="btn btn-default btn-cps" type="submit" value="Discover" name = "top_search" class="btn btn-submit"/></td>
                </tr>
                <tr>
                    <td><i>Type (eg. projects or organizations)</i></td>
                    <td><i>Keywords (eg. names, interests, or skills)</i></td>
                    <td><i>Location (eg. community, village, district, province)</i></td>
                    <td><!--<i>Advanced</i>--></td>
                </tr>
            </table>
            <!-- <form>-->
        </div>

        <div class="col-lg-3">
            <div class="discover-left-sidebar">

                <h3 class="pinks">Location</h3>
                <p>Distance from Phnom Penh</p><br>
                <select><option value="">Exact location only</option></select><br>
                <p>Remote (e.g. work from home or local)<br>
                    <input type="radio" name="result" value="all">All results, including remote<br>
                    <input type="radio" name="result" value="local">Local results only<br>
                    <input type="radio" name="result" value="remote">Remote results only (Worldwide)<br>

            </div>

            <div class="discover-left-sidebar">
                <?php
                $all_area_focus = $Wall->Get_Social_Needs_keywords();
                $count_all = $Wall->Count_Social_Needs_keywords();
                ?>

                <h3 class="pinks">Area of focus</h3>
                <input type=checkbox name="">All<?php echo '('. $count_all .')'; ?><br>
                <div id="dynamicAreaFocus">
                    <?php
                    if ($all_area_focus) {
                        $count = 1;
                        $i = 0;
                        foreach ($all_area_focus as $f) {
                            $focus_kw = $f['one_tag'];
                            $focus_count = $f['cnt'];
                            //     if((strcmp($focus_kw, $_POST['area_focus'][$i])==0) && $i<sizeof($_POST['area_focus'])){
                            if (in_array($focus_kw, $_POST['area_focus'])) {

                                $check = 'checked = "checked"';
                                $i++;
                            } else {
                                $check = "";
                            }
                            $count++;
                            if ($count <= 4) {
                                echo '<input type=checkbox name="area_focus[]" ' . $check . ' value="' . $focus_kw . '">' . ucfirst($focus_kw) . '(' . $focus_count . ')<br>';
                            } else {
                                if (!empty($_POST['area_focus'])) {
                                    if ($check != "") {
                                        echo '<input type=checkbox name="area_focus[]" ' . $check . ' value="' . $focus_kw . '">' . ucfirst($focus_kw) . '(' . $focus_count . ')<br>';
                                    }
                                } else {
                                    break;
                                }
                            }
                        }
                    }
                    ?> 
                </div>

                <input type="text" class="text-input search_auto" name='search_area_focus' id='search_area_focus' placeholder="Search" onkeyup="autocomplete_area_focus()" autocomplete="off"/>
                <div id="search_area_focus_id">

                </div>
            </div>

            <div class="discover-left-sidebar">
                <?php
                $all_lang = $Wall->Get_Project_Langauges();
                $count_lang = $Wall->Count_Project_Languages();
                ?>

               <h3 class="pinks">Languages</h3>
                <input type=checkbox name="">All<?php echo '(' . $count_lang . ')'; ?><br>
                <div id="dynamicLanguage">
                    <?php
                    if ($all_lang) {
                        $count = 1;
                        //        $i = 0;
                        foreach ($all_lang as $f) {
                            $count++;
                            $each_lang = $f['one_tag'];
                            $one_lang = $f['cnt'];
                            if (in_array($each_lang, $_POST['language'])) {
                                $check = 'checked = "checked"';
                                //        $i++;
                            } else {
                                $check = "";
                            }

                            if ($count <= 4) {
                                echo '<input type=checkbox name="language[]" ' . $check . ' value="' . $each_lang . '">' . ucfirst($each_lang) . '(' . $one_lang . ')<br>';
                            } else {
                                if ($check != "") {
                                    echo '<input type=checkbox name="language[]" ' . $check . ' value="' . $each_lang . '">' . ucfirst($each_lang) . '(' . $one_lang . ')<br>';
                                }
                            }
                        }
                    }
                    ?> 
                </div>

                <input type="text" class="text-input search_auto" name='search_language' id='search_language' placeholder="Search" onkeyup="autocomplete_language()" autocomplete="off"/>
                <div id="search_language_id">

                </div>
            </div>



            <div class="discover-left-sidebar">
                <h3 class="pinks">Skills required</h3>
                <input type=checkbox name="">IT (Information Technology)<br>
                <input type=checkbox name="">Doctor<br>
                <input type=checkbox name="">Agriculture<br>     
            </div>

            <div class="discover-left-sidebar">
                <h3 class="pinks">Time Commitment</h3>
                <?php //$all_date = $Wall->Get_All_Project_Dates(); ?>
                <?php
//                if ($all_date) {
//                    $count = 1;
//                    foreach ($all_date as $f) {
//                        $each_date = $f['end_date'];
//                        $count_date = $f['total'];
//
//                        echo '<input type=checkbox name="">' . $each_date . '(' . $count_date . ')<br>';
//
//                        if ($count++ == 5)
//                            break;
//                    }
//                }
                
                ?>    
                 Start Date: <input class="date-picker" id="date1" type="text" name="proj_date1" value='<?php echo $_POST["proj_date1"]; ?>' placeholder="Your Project's Start Date"/>
                        <label for="date1" class="add-on"><i class="glyphicon glyphicon-calendar"></i></label>
                 End Date: <input class="date-picker" id="date2" type="text" name="proj_date2" value='<?php echo $_POST["proj_date2"]; ?>' placeholder="Your Project's End Date"/>
                        <label for="date2" class="add-on"><i class="glyphicon glyphicon-calendar"></i></label>      
            </div>

            <div class="discover-left-sidebar">
               <h3 class="pinks">Organization Adopted</h3>
                <input type=checkbox name="">ABC<br>
                <input type=checkbox name="">DDD<br>
                <input type=checkbox name="">KKK<br>      
            </div>
            <input type="submit" value="Search" name="left_search" class="btn btn-default btn-cps"/>

        </div>
    </form>

     
    <div class="col-lg-9" id="search-content">
        <div class="container div-tab">
            <ul class="nav nav-tabs pull-right" role="tablist" id="myTab">
                <li class="title-tab">View by :</li>
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Volunteering Opportunities</a></li>
                <li role="presentation"><a href="#baneficiary" aria-controls="baneficiary" role="tab" data-toggle="tab">Beneficiaries</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Projects and Teams</a></li>
            </ul> 
        </div><br/>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div id="data-discover-social-need">            
                        <?php
                        if ($data_socailneed) {
                            foreach ($data_socailneed as $res) {
                                
                                if ($res['sn_image']) {
                                    $sn_image = $base_url . 'images/' . $res['sn_image'];
                                } else {
                                    $sn_image = $base_url . 'wall_icons/default.png';
                                }
                                $sn_title = $res['msg_title'];
                                $sn_content = $res['message'];
                                $sn_keywords = $res['sn_keywords'];
                                ?>
                                <div class="content-discover-project">

                                    <div class="media-left media-middle">
                                        <a href="<?php echo $base_url . 'group.php?gid=' . $res['group_id'] . '&ptab=contents' ?>">
                                            <img class="media-object" src="<?php echo $sn_image; ?>" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading text-primary"><?php echo $sn_title; ?></h4>
                                       
                                        <p>Keywords : <?php echo "#".str_replace(","," #",$sn_keywords); ?></p>
                                         <p><?php echo $sn_content; ?></p>
                                        <p class="bold"> <?php echo $res['com_location'].' ('.$res['language'].')'; ?></p>
                                        <p>Status : </p>
                                        <button class="btn btn-default btn-cps">Get Involved</button>
                                        <button class="btn btn-default btn-cps btn-share">Share</button>&nbsp;&nbsp;
                                        <button class="btn btn-default btn-cps btn-follow">Follow</button>
                                   </div>

                                </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="baneficiary">
                    <!--        <input id="Button1" type="button" value="Click" onclick="switchVisible();"/>-->
                    <div id="data-discover-project">
                        <?php
                        foreach ($data_community as $community) {
                                $com_pic = $community['group_pic'];
                                if ($community['group_pic']) {
                                    $com_pic = $base_url . 'uploads/' . $community['group_pic'];
                                } else {
                                    $com_pic = $base_url . 'wall_icons/default.png';
                                }
                                $com_name = $community['group_name'];
                                $com_content = $community['group_desc'];
                                $com_language = $community['language'];
                                $com_loc = $community['location'];
                                ?>
                                <div class="content-discover-project">

                                    <div class="media-left media-middle">
                                        <a href="<?php echo $base_url . 'group.php?gid=' . $community['group_id'] ?>">
                                            <img class="media-object" src="<?php echo $com_pic; ?>" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading text-primary"><?php echo $com_name; ?></h4>
                                        <p><?php echo $com_content; ?>
                                        </p>
                                        <p class="bold"><?php echo  $com_loc." | (".$com_language.")"; ?></p>
                                        <button class="btn btn-default btn-invole">Get Involved</button>
                                        <button class="btn btn-default btn-share">Share</button>
                                        <button class="btn btn-default btn-follow">Follow</button>
                                    </div>
                                </div>
                            <?php
                            }
                     
                        ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <!--        <input id="Button1" type="button" value="Click" onclick="switchVisible();"/>-->
                    <div id="data-discover-project">
                        <?php
                        if ($data_project) {
                            foreach ($data_project as $data_pro) {
                                $group_pic = $data_pro['group_pic'];
                                if ($data_pro['group_pic']) {
                                    $group_pic = $base_url . 'uploads/' . $data_pro['group_pic'];
                                } else {
                                    $group_pic = $base_url . 'wall_icons/default.png';
                                }
                                //$p_keywords = $data_pro['sn_keywords'];
                               
                                ?>
                                <div class="content-discover-project">

                                    <div class="media-left media-middle">
                                        <a href="<?php echo $base_url . 'group.php?gid='.$data_pro['group_id'];?>">
                                            <img class="media-object" src="<?php echo $group_pic; ?>" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading text-primary"><?php echo $data_pro['group_name']; ?></h4>
                                        <p><?php echo $data_pro['proj_intro']; ?></p>
                                        <p>Keywords : 
                                        <?php 
                                       // echo $data_pro['keywords'];
                                        $array_keyword = array_unique(explode(',', $data_pro['keywords'])); ?>
                                         
                                            <?php
                                            if ($array_keyword && strlen($data_pro['keywords'])>0) {
                                                $count = 1;
                                                foreach ($array_keyword as $f) {
                                                    $kw = $f;

                                                    echo '<a href="" >' .'#'. ucfirst($kw) . '</a>';
                                                    if ($count < count($array_keyword)) {
                                                        echo ", ";
                                                        $count++;
                                                    }
                                                }
                                            }
                                            ?>

                                        </p>
                                         <p>Status :</p>
                                        <?php
//                                        $pro_id = $data_pro['proj_id'];
//                                        $query_keyword = mysqli_query($db, "SELECT sn_keywords FROM proj_social_needs WHERE proj_social_needs.sn_pid = '$pro_id'");
//                                        foreach ($query_keyword as $keyword_value) {
//                                        echo "#".str_replace(","," #",$keyword_value['sn_keywords'])." "; }
                                        ?>
                                        </p>
                                         <?php 
                                            $array_lang = explode(',', $data_pro['language']); 
                                         ?>
                                        <p class="bold"><?php echo $data_pro['location']." | ";
                                        if ($array_lang && strlen($data_pro['language'])>0) {
                                                $count = 1;
                                                foreach ($array_lang as $f) {
                                                    $language = $f;

                                                    echo '<a href="" >' .'#'. ucfirst($language) . '</a>';
                                                    if ($count < count($array_lang)) {
                                                        echo ", ";
                                                        $count++;
                                                    }
                                                }
                                            }
                                        ?></p>
                                        <p><?php echo $data_pro['start_date'] . " to " . $data_pro['end_date']; ?></p>
                                       
                                        <button class="btn btn-default btn-cps btn-invole">Get Involved</button>
                                        <button class="btn btn-default btn-cps btn-share">Share</button>
                                        <button class="btn btn-default btn-cps btn-follow">Follow</button>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
    </div>
</div>

<script>
    
      $("#date1").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    }).on('changeDate', function (selected) {
        var startDate = new Date(selected.date.valueOf());
        $('#date2').datepicker('setStartDate', startDate);
    }).on('clearDate', function (selected) {
        $('#date2').datepicker('setStartDate', null);
    });

    $("#date2").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    }).on('changeDate', function (selected) {
        var endDate = new Date(selected.date.valueOf());
        $('#date1').datepicker('setEndDate', endDate);
    }).on('clearDate', function (selected) {
        $('#date2').datepicker('setEndDate', null);
    });
    
                    function autocomplete_area_focus() {
                        var min_length = 0; // min caracters to display the autocomplete
                        var keyword = $('#search_area_focus').val();
                        if (keyword.length > min_length) {
                            $.ajax({
                                url: 'autocomplete_area_focus.php',
                                type: 'POST',
                                data: {keyword: keyword},
                                success: function(data) {
                                    $('#search_area_focus_id').show();
                                    $('#search_area_focus_id').html(data);
                                }
                            });
                        } else {
                            $('#search_area_focus_id').hide();
                        }
                    }

                    // set_item : this function will be executed when we select an item
                    function set_item_area_focus(item1, item2) {
                        // change input value
                        $('#search_area_focus').val("");

                        var input = document.getElementsByName("area_focus[]");
                        var values = [];
                        for (var i = 0, iLen = input.length; i < iLen; i++) {
                            values.push(input[i].value);
                        }
                        //         if(jQuery.inArray(item1, input)<0)
                        if (jQuery.inArray(item1, values) !== -1) {
                            var j = jQuery.inArray(item1, values);
                            document.getElementsByName("area_focus[]")[j].checked = true;
                        } else {
                            var newdiv = document.createElement('div');
                            newdiv.innerHTML = "<input type=checkbox name='area_focus[]' checked='checked' value='" + item1 + "' />" + ucFirst(item1) + "(" + item2 + ")" + "<br>";
                            document.getElementById('dynamicAreaFocus').appendChild(newdiv);
                        }
                        // hide proposition list
                        $('#search_area_focus_id').hide();
                    }

                    function autocomplete_language() {
                        var min_length = 0; // min caracters to display the autocomplete
                        var keyword = $('#search_language').val();
                        if (keyword.length > min_length) {
                            $.ajax({
                                url: 'autocomplete_language.php',
                                type: 'POST',
                                data: {keyword: keyword},
                                success: function(data) {
                                    $('#search_language_id').show();
                                    $('#search_language_id').html(data);
                                }
                            });
                        } else {
                            $('#search_language_id').hide();
                        }
                    }

                  
//                    function set_item_language(item1, item2) {
//                        $('#search_language').val("");
//
//                        var newdiv = document.createElement('div');
//                        newdiv.innerHTML = "<input type=checkbox name='language[]' checked='checked' value='" + item1 + "'>" + item1 + "(" + item2 + ")" + "<br>";
//                        document.getElementById('dynamicLanguage').appendChild(newdiv);
//
//                        $('#search_language_id').hide();
//                    }

                    function set_item_language(item1, item2) {
                        $('#search_language').val("");

                        var all_lang = document.getElementsByName("language[]");
                        var lang = [];
                        for (var i=0, iLength=all_lang.length; i<iLength; i++) {
                             lang.push(all_lang[i].value);
                        }
                        if((jQuery.inArray(item1, lang))!==-1){
                            var k = jQuery.inArray(item1, lang);
                            document.getElementsByName("language[]")[k].checked = true;
                        }else{
                            var newdivLang = document.createElement('div');
                            newdivLang.innerHTML = "<input type=checkbox checked='checked' value='"+item1+"' name='language[]'>"+ucFirst(item1)+"("+item2+")"+"<br>";
                            document.getElementById('dynamicLanguage').appendChild(newdivLang);
                        }    
                        $('#search_language_id').hide();
                    }

                    function switchVisible() {
                        if (document.getElementById('data-discover-project')) {

                            if (document.getElementById('data-discover-project').style.display == 'none') {
                                document.getElementById('data-discover-project').style.display = 'block';
                                document.getElementById('data-discover-social-need').style.display = 'none';
                            }
                            else {
                                document.getElementById('data-discover-project').style.display = 'none';
                                document.getElementById('data-discover-social-need').style.display = 'block';
                            }
                        }
                    }

                    function ucFirst(string) {
                        return string.substring(0, 1).toUpperCase() + string.substring(1).toLowerCase();
                    }
</script>