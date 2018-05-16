<!--------------------- Header and Side nav bar code ---------------->
<?php
session_start();
if(!isset($_SESSION["uname"]))
    {
        $msg = 'Enter Username and Password First to use edit page of Portal';
        include 'wrong_login.php';
    }
    else
    {
        $name = 'Edit Quiz';
        include 'side_nav_and_header.php'; 
       
		
?>
<!--------------------------- main body -------------------------------->
	<?php 
        if(isset($_POST['selected_quiz']) || isset($selected_quiz))
        {
            if(isset($_POST['selected_quiz']))
            $selected_quiz=$_POST['selected_quiz'];
                
        }
?>

		<div  style="background-color:">
		<div class="row">
			<div class="col s12 center hoverable">
				<div class="row"></div>

                
<!----------------------------------- list of Quizes----------------------------------------------- -->
                 <form action="edit.php" method="post">
                <div class="col s6 offset-s1">
				    <?php include 'quiz_list.php'; ?>
                </div>
                <div class="col s1">
                        <button class="btn waves-effect waves-light" type="submit" name="action">GO
                        <i class="material-icons right">send</i>
                        </button> 
                </div>
                </form>
		</div>
		</div>
	</div>	

<!---------------------------------------Print Status Message--------------------------------------------->
    
           <div class="center"><h5>
               <span class="card-title activator grey-text text-darken-4"><b style="color:red"><?php if(isset($msg)){?><i class="material-icons prefix">priority_high</i> <?php echo $msg; } ?></b></span></h5>
</div>
	

<!------------------------------------------ Update Tables --------------------------------->
	
                
                
        <div class="row" style="margin-right:4.2%; margin-left:-4.2%;">
			<form action="upload_question.php" method="post" enctype="multipart/form-data"> 
			<?php if(isset($selected_quiz)) { ?><input type="hidden" name="selected_quiz" value="<?php echo $selected_quiz; ?>"> <?php } ?>
            <div class="col m3	offset-m1 hoverable z-depth-1" >
			<div class="container">
				<div class="row"></div>
				<div class="row" style="background-color:#f5f5f5">
					Update Questions
				</div>
				<div class="divider"></div>
				<div class="row">
					<div class = "file-field input-field">
						<div class = "btn"><i class="material-icons left">file_upload</i>
							<span>Browse</span>
							<input type = "file" />
						</div>
						<div class="row"></div>
						<div class = "file-path-wrapper">
							<input class = "file-path validate" name="file" type = "file" placeholder = "Drag and Drop Or Select file" />
						</div>
					</div>
				</div>
				<div class="row">
					<button type="reset" value="Reset" class="waves-effect waves-light btn"><i class="material-icons left">cancel</i>Clear</button>
						<button type="submit" value="Submit" class="waves-effect waves-light btn"><i class="material-icons left">file_upload</i>Upload</button>
				</div>
				<div class="row"></div>
				<div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                
				
			</div>
			</div>
			
			</form>
			
			
            <form action="upload_user.php" method="post" enctype="multipart/form-data"> 
			<?php if(isset($selected_quiz)) { ?><input type="hidden" name="selected_quiz" value="<?php echo $selected_quiz; ?>"> <?php } ?>
         
			<div class="col s3 hoverable offset-s1 z-depth-1">
			<div class="container">
				<div class="row"></div>
				<div class="row" style="background-color:#f5f5f5">
					Upload User Data
				</div>
				<div class="divider"></div>
				<div class="row">
					<div class = "file-field input-field">
						<div class = "btn"><i class="material-icons left">file_upload</i>
							<span>Browse</span>
							<input type = "file" />
						</div>
						<div class="row"></div>
						<div class = "file-path-wrapper">
							<input class = "file-path validate" name="file" type = "file" placeholder = "Drag and Drop Or Select file" />
						</div>
					</div>
				</div>
				<div class="row">
					<button type="reset" value="Reset" class="waves-effect waves-light btn"><i class="material-icons left">cancel</i>Clear</button>
						<button type="submit" value="submit" class="waves-effect waves-light btn"><i class="material-icons left">file_upload</i>Upload</button>
				</div>
				<div class="row"></div>
				<div class="row"></div><div class="row"></div><div class="row"></div><div class="row"></div>
			</div>
			</div>
			</form>
			
            
			
         
			<div class="col s3	offset-s1 hoverable z-depth-1" >
			<div class="container">
				<div class="row"></div>
				<div class="row" style="background-color:#f5f5f5">
					Operations
				</div>
	               <div class="row">			
                       <div class="col s3">
                           <div class="row">
                               <div class="col s1"><i class="material-icons left">cancel</i></div>
                               <div class="col s2 offset-s1" >
				<form action="disable.php" method="post"> 
			     <?php if(isset($selected_quiz)) { ?><input type="hidden" name="selected_quiz" value="<?php echo $selected_quiz; ?>" /> <?php } ?>
                    
					<input type="submit" style="font-size:18px;color:white" value="Disable"  class="teal lighten-2" />
                                   </form></div></div></div>
                        <div class="col s3 offset-s3">
                            <div class="row"><div class="col s1"><i class="material-icons  lightblue left">check</i></div>
                                <div class="col s2 offset-s1">
                                <form action="Enable.php" method="post"> 
			     <?php if(isset($selected_quiz)) { ?><input type="hidden" name="selected_quiz" value="<?php echo $selected_quiz; ?>"> <?php } ?>
                  
                           <input type="submit" style="font-size:18px;color:white" class="teal lighten-2" value="Enable" class="" />
                                    </form></div></div>
                </div>
                <form action="delete.php" method="post"> 
                <?php if(isset($selected_quiz)) { ?><input type="hidden" name="selected_quiz" value="<?php echo $selected_quiz; ?>"> <?php } ?>
				<div class="row">
					<button type="submit"  class="waves-effect waves-light btn"><i class="material-icons left">delete_forever</i>Delete</button>
                    </div></form>
                <form action="time.php" method="post"> 
				<?php if(isset($selected_quiz)) { if($resultset = $database_handler->query("SELECT * from quiz where quiz_id='$selected_quiz';"))
                           {
                            $row = $resultset->fetch_assoc();
                           $duration= $row['duration'];
                           }
                             ?><input type="hidden" name="selected_quiz" value="<?php echo $selected_quiz; ?>"> <?php } ?>
                    <div class="row">
					<div class="input-field col s6">
					  <i class="material-icons prefix">update</i>
					  <input id="icon_prefix" name="duration" value="<?php echo $duration; ?>" type="number" min="0" class="validate">
					  
					</div>
                    <div class="col s1 input-field"><label for="icon_prefix">seconds</label></div>
				</div>
				<div class="row">
					<button type="submit" value="submit" class="waves-effect waves-light btn"><i class="material-icons left">file_upload</i>Upload</button>
				</div>
                </form>
                </div></div>
			
		</div>	
            </div></div></div>

<!---------------------- Footer--------------------------------------->
<?php include 'footer.php'; }?>
	