<?php
include_once 'includes.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset="utf-8">
<?php
include_once 'project_title.php';
include_once 'js.php';
?>
<style>
    .find-content{
        width:980px;
        margin: 0 auto;
        padding-top:30px;
    }
     /* search form */
    .cps-searchform {
        background-color: transparent;
        border: none;  
        margin: 0 auto;  
        width: 500px;  
    }
    .cps-searchform input.textbox { 
        width: 400px;
        color: #777; 
        height: 30px;
        border: 1px solid #E5E5E5;
        margin-bottom: 20px;
        
    }
    .cps-searchform input.button { 
        width: 60px;
        height: 24px;

    }

</style>
</head>

<body>
    <?php include_once 'block_logo_menu.php'; ?>
    <div id="main">
        <h1><center>I want to...</center></h1>  
       <div class="find-content">
             
      <form action="#" class="cps-searchform">
         
          <center><input name="search_query" class="textbox" type="text" /></center>
          <center><input name="search" class="button" value="Search" type="submit" /></center>
              
      </form>  
       </div>

    <?php include_once 'block_footer.php';?>
    </div>

</body>
</html>
