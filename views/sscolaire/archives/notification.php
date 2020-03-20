<script type="text/javascript">
    var ROOT ="framework";
	function myFunction() {
		$.ajax({
			url: "/"+ROOT+"/public/js/view_notification.PHP", 
			type: "POST",
			processData:false,
			success: function(data){
				$("#notification-count").remove();					
				$("#notification-latest").show();$("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 
	  $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});
	 
	 }	 
</script>
<?php
$conn = new mysqli("localhost","root","","blog_samples");
$count=0;
if(!empty($_POST['add'])) {
	$subject = mysqli_real_escape_string($conn,$_POST["subject"]);
	$comment = mysqli_real_escape_string($conn,$_POST["comment"]);
	$sql = "INSERT INTO comments (subject,comment) VALUES('" . $subject . "','" . $comment . "')";
	mysqli_query($conn, $sql);
}
$sql2="SELECT * FROM comments WHERE status = 0";
$result=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result);
?>

<div class="sheader1l"><p id="dashboard"><?php echo "Gérer les certificats de décès";?></p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">
<div id="notification-header">
			   <div style="position:relative">
			   <button id="notification-icon" name="button" onclick="myFunction()" class="dropbtn"><span id="notification-count"><?php if($count>0) { echo $count; } ?></span><img src="<?php echo URL;?>public/images/notification-icon.png?t=<?php echo time();?>" /></button>
			   <div id="notification-latest"></div>
			   </div>			
</div>
</div>
<div class="sheader2r"></div>
<div class="listl">
		<form name="frmNotification" id="frmNotification" action="" method="post" >
			<div id="form-header" class="form-row">Add New Message</div>
			<div class="form-row">
				<div class="form-label">Subject:</div><div class="error" id="subject"></div>
				<div class="form-element">
					<input type="text"  name="subject" id="subject" required>
					
				</div>
			</div>
			<div class="form-row">
				<div class="form-label">Comment:</div><div class="error" id="comment"></div>
				<div class="form-element">
					<textarea rows="4" cols="30" name="comment" id="comment"></textarea>
				</div>
			</div>
			<div class="form-row">
				<div class="form-element">
					<input type="submit" name="add" id="btn-send" value="Submit">
				</div>
			</div>
		</form>

</div>
<div class="scontentl2"></div>
<div class="scontentl3"></div>
<div class="scontentr1"><?php echo dsp; ?></div>
