<!DOCTYPE html>
<html>
   
    <head>                


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://jhollingworth.github.io/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
<script src="http://jhollingworth.github.io/bootstrap-wysihtml5/lib/js/bootstrap.min.js"></script>
<script src="http://jhollingworth.github.io/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

<link rel="stylesheet" type="text/css" href="http://jhollingworth.github.io/bootstrap-wysihtml5/lib/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://jhollingworth.github.io/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css">
    </head>
    <body>
        Hello World!
        <div>
     <textarea class="textarea-texteditor" placeholder="Enter text ..." style="width: 810px; height: 200px"></textarea>
<br><br><p onclick="alert($('.textarea-texteditor').val())">click me</p>
    
        </div>
    </body>
</html>

<script>

  $('.textarea-texteditor').wysihtml5();
</script>
