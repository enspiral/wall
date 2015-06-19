<?php 
  $all_com_welcome_post = mysqli_query($db,"select * from com_tab_welcome WHERE com_id='$com_id';");
 ?>
<h3 class="text-center text-pink">Edit Your Communities Welcome Post </h3><br>

<div id="div-whole" align="center">  
   
        <table border="1">
            <tr>
                <td valign='top' class="text-center" width='50'>No </td>
                <td valign='top' class="text-center" width='300'>Title </td>
                <td valign='top' class="text-center" width='600'>Description </td>
                <td valign='top' class="text-center" width='200'>Image </td>
                <td valign='top' class="text-center" width='100'>Action </td>
            </tr>
             <?php if($all_com_welcome_post){
            $count=1;
            foreach ($all_com_welcome_post as $res) {
                $post_id = $res['id'];
                $post_title = $res['title'];
                $post_content = $res['decription'];
                $post_img = $res['image'];
                echo '<tr>';
                echo '<td valign="center" class="text-center" width="50">'.$count.'</td>';
                echo '<td valign="center" class="text-center" width="700">'.$post_title.'</td>';
                echo '<td valign="center" class="text-center" width="380">'.$post_content.'</td>';
                echo '<td valign="center" class="text-center" width="380"><img width="98" height="auto" src="'.$base_url.'images/commnunities/welcome/'.$post_img.'"></td>';
                echo '<td valign="center" class="text-center" width="120"><a href="'.$base_url.'community/community.php?com=dashboard&side=health&tab=edit_com_welcome_post&post_id='.$post_id.'">Edit</a></td>';
                echo '</tr>';
                $count++;
            }
        } ?>
        </table>
    </div>