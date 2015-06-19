<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8">
<?php
include_once 'project_title.php';
include_once 'js.php';
?>
<style>
    div.showcase{
        padding-left:20px;
        float:left;
    }
    
    div.showcase-left{
        float:left;
        width:590px;
    }
   
    div.showcase-right{
        float:left;
        width:190px;
    }
    
    .showcase-content{
        width:580px;
        float:left;
        margin-bottom:20px;
    }
    
    .article{
        border: 2px solid black; 
        padding:10px; 
        margin-top:10px;
    }
    

    .article .text, textstyle{
        font-size: 12px;
        line-height: 17px;
        font-family: arial;
    }
    
    .readMore{
        margin-top:20px;
        margin-left:450px;
    }
    
     .community_profile{
        width:180px;
        float:left;
        margin-right:10px;
    }
    
    .community_profile img{
        width:170px !important;
        height:170px;
    }
    
    .community_blogpost{
        float:left;
        width:390px;
    }
        
    div.community_overview{
        width:380px;
        margin-right:20px;
        float:left;
    }
    
    div.community_factsheet{
        width:180px;
        float:left;
    }
    
    div.partner_logos img{
        width:100px !important;
        height:100px !important;
    }
    
    div.current-need, div.community-contact-us, div.community-join-us{
        width:180px;
        margin-bottom:20px;
    }
    
    .tansa, .arrow {
        display:none;
        position:absolute;
        left:400px; /*[wherever you want it]*/
    }

    .profile_show div{
        float:left;   
    }

    .profile_show{
        width:380px;
    }
    
</style>

</head>
<body>
    <?php include_once 'block_logo_menu.php'; ?>
    <div id="main">
        <?php include_once 'block_timeline.php'; ?>
		
<div id="tabs" style="width:100%;">
    <ul>
        <li>
            <a href="#A">Village Introduction</a>
        </li>
        <li>
            <a>Pathway out of Poverty</a>
        </li>
        <li>
            <a href="#B" style="color:red;">&nbsp;&nbsp;&nbsp;A. Theory of Change Dashboard</a>
        </li>
        <li>
            <a href="#C" style="color:red;">&nbsp;&nbsp;&nbsp;B. Needs & Aspirations</a>
        </li>
        <li>
            <a href="#D" style="color:red;">&nbsp;&nbsp;&nbsp;C. Contributions</a>
        </li>
         <li>
            <a href="#E" style="color:red;">&nbsp;&nbsp;&nbsp;D. CPS Audit</a>
        </li>
        <li>
            <a href="#F">Get Involved</a>
        </li>
        <li>
            <a href="#G">Accommodation</a>
        </li>
         <li>
            <a href="#H">Support Us</a>
        </li>
        <li>
            <a href="#I">Contact us</a>
        </li>
    </ul>
    <div id="A">
      <?php include_once 'cps_showcase/cps_showcase_c1.php'; ?>
    </div>
    <div id="B">
       <?php include_once 'cps_showcase/cps_showcase_c2.php'; ?>
    </div>
    <div id="C">
       <?php include_once 'cps_showcase/cps_showcase_c3.php'; ?>
    </div>
    <div id="D">
        <?php include_once 'cps_showcase/cps_showcase_c4.php'; ?>
    </div>
     <div id="E">
        <?php include_once 'cps_showcase/cps_showcase_c5.php'; ?>
    </div>
    <div id="F">
      <?php include_once 'cps_showcase/cps_showcase_c6.php'; ?>
    </div>
    <div id="G">
        <?php include_once 'cps_showcase/cps_showcase_c7.php'; ?>
    </div>
    <div id="H">
        <?php include_once 'cps_showcase/cps_showcase_c8.php'; ?>
    </div>
    <div id="I">
        <?php include_once 'cps_showcase/cps_showcase_c9.php'; ?>
    </div>
</div>


<?php include_once 'block_footer.php';?>
	</div>
	</body>
<script type="text/javascript">
    $('#tabs')
     .tabs()
     .addClass('ui-tabs-vertical ui-helper-clearfix');
     
/*function showMoreOrLess(thisObj,bonusContent){
    var caption = thisObj.innerHTML;
    //alert(caption);
    if ( caption == "Read more" ) {
        document.getElementById(bonusContent).style.display = "inline";
        thisObj.innerHTML = "Read less";
    } else {
        document.getElementById(bonusContent).style.display = "none";
        thisObj.innerHTML = "Read more";
    }
}*/
    
</script>
	</html>