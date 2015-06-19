<?php 
    $vol_opps = mysqli_query($db,"select * from com_volunteer_opp where com_id= ".$com_id.";");
?>
<h3 class="text-center text-pink">Edit Your Communities Welcome Post </h3><br>

<div id="div-whole" align="center">  
   
        <table border="1">
            <tr>
                <td valign='top' class="text-center" width='50'>No </td>
                <td valign='top' class="text-center" width='300'>Title </td>
                <td valign='top' class="text-center" width='600'>Decription </td>
                <td valign='top' class="text-center" width='200'>Image </td>
                <td valign='top' class="text-center" width='100'>Action </td>
            </tr>
             <?php if($vol_opps){
            $count=1;
            foreach ($vol_opps as $vol_opp) {
                $id = $vol_opp['id'];
                 $post_title = $vol_opp['title'];
                 $post_content = $vol_opp['content'];
                 $post_img = $vol_opp['img'];
                echo '<tr>';
                echo '<td valign="center" class="text-center" width="50">'.$count.'</td>';
                echo '<td valign="center" class="text-center" width="700">'.$post_title.'</td>';
                echo '<td valign="center" class="text-center" width="380">'.$post_content.'</td>';
                echo '<td valign="center" class="text-center" width="380"><img width="98" height="auto" src="'.$base_url.'images/commnunities/volunteer/'.$post_img.'"></td>';
                echo '<td valign="center" class="text-center" width="120"><a href="'.$base_url.'community/community.php?com=dashboard&side=health&tab=volunteer&volunteer=edit_home_post&post_id='.$id.'">Edit</a></td>';
                echo '</tr>';
                $count++;
            }
        } ?>
        </table>
    </div>