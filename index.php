<?php
 $Msg_id = substr(md5(uniqid(),false),0,11);
 $Sub_msg_id =substr(md5($Msg_id),0,11);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>php project</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>
<?php
/*
$start=date('2014-01-20');
$end = date('2013-12-14');
$day = strtotime($start)-strtotime($end);
echo $day/(60*60*24);
*/
?>
<script>
 $(document).ready(function() {
   $('button[name="new_msg"]').click(function (){
	   $('div#new_msg').fadeToggle();
	   }); 
  $('p.successfully_sent').fadeOut(2000);
});
</script>

<button type="button" name="new_msg">New Message</button>
<div id="new_msg" style="display:none">
<form name="chatting_sys" action="" method="post" enctype="multipart/form-data" accept-charset="utf-8">
 <input type="text" name="User_Name" placeholder="User Name" size="40" required>
 <br/>
 <textarea name="User_Msg" maxlength="1000" minlength="1" placeholder="Type your message here..." style="width:260px" required></textarea>
 <br/>
 
<input type="submit" name="send" value="Send">
 
</form>
</div>
<br/>
<div class="chat_list">
  <ul>
  
<?php
   try
   {
	include("connection.php");
	$fetch_chat = $conn->prepare("select * from comment_sys_main order by commented_on desc");
    $fetch_chat->setFetchMode(PDO::FETCH_ASSOC);
	$fetch_chat->execute();
    
	//sub chat
	foreach($fetch_chat as $values)
	{
	echo '<li><b>'.$values['User_Name'].'</b>:'.$values['User_Msg'];
	$Msg = $values['Msg_id'];	 
	$fetch_sub_chat = $conn->prepare("select * from comment_sys_sub where Msg_id='$Msg' order by commented_on desc");
    $fetch_sub_chat->setFetchMode(PDO::FETCH_ASSOC);
	$fetch_sub_chat->execute();
?>
<ul class="subchat">
<?php  
	foreach($fetch_sub_chat as $sub_values)
	{
		
		echo '<li><b>'.$sub_values['User_Name'].'</b>:'.$sub_values['User_Msg'].'</li>';
	}
	
	   ?>
</ul>       
       <br/>
       <button name="reply" id="b<?php echo $values['Msg_id']; ?>" class="replyBtn" type="button">Reply</button>
       <div id="d<?php echo $values['Msg_id']; ?>" class="replyContainer" data-id="" style="display:none">
         <form name="reply" action="" method="post">
           <input type="text" name="User_Name" placeholder="User Name" size="40" required>
           <br/>
          <textarea name="User_Msg" maxlength="1000" minlength="1" placeholder="Type your message here..." style="width:260px" required></textarea>
          <input type="hidden" name="Msg_Main_id" value="<?php echo $values['Msg_id']; ?>">
 <br/>
   <input type="submit" name="Reply" value="Send">
         </form>
       </div>
       <?php
	   echo '</li>';
	   
?>
<script>	   
/*$(document).ready(function() {
   $("button#b<?php echo $values['Msg_id']; ?>").click(function (){
	   $('div#d<?php echo $values['Msg_id']; ?>').fadeToggle();
	   }); 
  $('p.successfully_sent_reply').fadeOut(2000);
  
});*/
</script>   
<?php	    
	}
   }
   catch(PDOException $e)
   {
	   echo $e->__toString();
   }
  ?>
  
  </ul>
</div>
<?php
if(isset($_POST['send']))
{	
include("connection.php");
$User_Name =$_POST['User_Name'];
$User_Msg = $_POST['User_Msg'];
$insert_msg = $conn->prepare('insert into comment_sys_main(User_Name,User_Msg,Msg_id) values(:User_Name,:User_Msg,:Msg_id)');
$insert_msg->bindParam(':User_Name',$User_Name);
$insert_msg->bindParam(':User_Msg',$User_Msg);
$insert_msg->bindParam(':Msg_id',$Msg_id);

$insert_msg->execute();
if($insert_msg==true)
{?>
	<p class='successfully_sent'>Your Msg Sent Successfully.</p>
<?php
}
}
else if(isset($_POST['Reply']))
{
include("connection.php");
$User_Name =$_POST['User_Name'];
$User_Msg = $_POST['User_Msg'];	
$Msg_Main_id = $_POST['Msg_Main_id'];
$insert_msg = $conn->prepare('insert into comment_sys_sub(User_Name,User_Msg,Msg_id,Sub_msg_id) values(:User_Name,:User_Msg,:Msg_id,:Sub_msg_id)');
$insert_msg->bindParam(':User_Name',$User_Name);
$insert_msg->bindParam(':User_Msg',$User_Msg);
$insert_msg->bindParam(':Msg_id',$Msg_Main_id);
$insert_msg->bindParam(':Sub_msg_id',$Sub_msg_id);

$insert_msg->execute();
if($insert_msg==true)
{?>
	<p class='successfully_sent_reply'>Your Msg Sent Successfully.</p>
<?php
}
}
?>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		$(".replyBtn").click(function () {
			$(this).next(".replyContainer").toggle();
		});
	});
</script>
