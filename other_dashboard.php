<?php
include_once 'includes.php';
include_once 'oauth_redirection.php';

if($_GET['username'])
{
    $username=$_GET['username'];
    include_once 'public.php';
    if($profile_uid==$uid){
        header( "Location: $base_url"."index.php" );
    }
    if(empty($profile_uid))
    {
        header("Location:$url404");
    }
}
else
{
header("Location:$url404");
}
?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <?php
        include_once 'project_title.php';
        include_once 'js.php';
        ?>
        <script>
            $(function(){
                $('.date-picker').datepicker({
                    format: 'mm-dd-yyyy',
                    endDate: '+0d',
                    autoclose: true
                });
            });

            function showHideProject(){
                 $('.dashboard-left-project').slideToggle();
            }

            function showHideOrg(){
                 $('.dashboard-left-org').slideToggle();
            }

            function showHideCom(){
                 $('.dashboard-left-com').slideToggle();
            }
             function showProFlo(){
           $('.dashboard-left-project-following').slideToggle();
          }
        </script>
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <?php include_once 'header_for_other.php'; ?>
                <div class="div-content">
                   
                       <?php include_once 'my_dashboard.php'; ?>
                   
                </div>
                <?php include_once 'block_footer.php'; ?>
            </div>
        </div>
    </body>
</html>

<?php
if($session_tour==0)
{
echo '<script>introJs().start();</script>';
}
?>