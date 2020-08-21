<?php include("nabvar_section.php"); 

    
$showing_error = array('email'=>'','name'=>'','message'=>'','empty'=>'','url'=>'','image'=>'','skills'=>'');
$Name=$Email=$Urls=$Location=$Skills=$Location=$Image=$Gender='';
$go_on=0;
$status="Create";
function Validation_Profile($Name,$Email,$Url,$Location,$skills,$Gender,$filename,$filetmp,$filetype,$showing_error) {
        if ((empty($Url))  || (empty($Name))  || (empty($Location)) || (empty($filename)) || (empty($Gender))  || (empty($Email))) {
            $showing_error['empty']="Please fill out the form <br/>";
        }
        /* <> Validation Name */
        if (!preg_match('/^[a-zA-Z\s+]+$/',$Name)){
            $showing_error['name']="Only letters and white space allowed <br/>";
        }
        /* </> Validation Name */

        /* <> URL Name */
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Url)) {
            $showing_error['url']="Invalid URL <br/>";
        }
        /* </> URL Name */

        /* <> Location Name */
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$skills)) {
            $showing_error['skills']="skills must be a comma separated list <br/>";
        }
        /* </> Location Name */

        /* <> Email Name */
        if (!filter_var($Email,FILTER_VALIDATE_EMAIL)){
            $showing_error['email']="Email is not valid <br/>";
        }
        /* </> Email Name */

        /* <> Validation Image */
        if($filetmp == "")
        {
                $showing_error['image']="please select a photo <br/>";
        }
        elseif ($filetype != "image/jpeg" && $filetype != "image/png" )
        {
            $showing_error['image']="Please upload jpg / png  <br/>";
        }
        /* </> Validation Image */
        
        /* <> Check Errors  */
                    /*  print all errors */
        
                foreach($showing_error as $key => $values)
                {
                    echo $key  . "      ". $values . "<br>";
                }
        
         /* </> Check Errors  */
        if (array_filter($showing_error)){
            $showing_error['message']="There are errors in a form <br/>";
            $validation_status=False;
        }
        else {
            $validation_status=True;
            /* </ > Successfull Validation   */
        }
        return $validation_status;
    }
    
    if (isset($_POST['done']))
    {
        
        $Name = $_REQUEST['name_create'];$Profession = $_REQUEST['profession_create'];
        $Url = $_REQUEST['url_create'];$Location = $_REQUEST['location_create'];
        $Gender = $_REQUEST['gender_create'];$Email = $_REQUEST['email_create'];
        $skills=$_REQUEST['skills_create'];
        $filetmp = $_FILES["image_create"]["tmp_name"];$filename = $_FILES["image_create"]["name"];
        $filetype = $_FILES["image_create"]["type"];$filepath = "photo/".$filename;
        $showing_error = array('email'=>'','name'=>'','location'=>'','message'=>'','empty'=>'','url'=>'','image'=>'');	
        if (Validation_Profile($Name,$Email,$Url,$Location,$skills,$Gender,$Location,$filename,$filetmp,$filetype,$showing_error)== True) {

            /* ---------- POST DATA TO SERVER ---------- */
            $name =mysqli_real_escape_string($connect_to_database,$_POST['name_create']);
            $profession = mysqli_real_escape_string($connect_to_database,$_POST['profession_create']);
            $urls = mysqli_real_escape_string($connect_to_database,$_POST['url_create']);
            $location = mysqli_real_escape_string($connect_to_database,$_POST['location_create']);
            $image =mysqli_real_escape_string($connect_to_database,$_POST['image_create']);
            $gender = mysqli_real_escape_string($connect_to_database,$_POST['gender_create']);
            $skills =mysqli_real_escape_string($connect_to_database,$_POST['skills_create']);
            $email = mysqli_real_escape_string($connect_to_database,$_POST['email_create']);
            //Save to DataBases
            $sql="INSERT INTO create_profiles(Names,Profession,Urls,Locations,Images,Gender,Skills,Email)
                VALUES('$name','$profession','$urls','$location','$filename','$gender','$skills','$email')";

            //Save  images
            move_uploaded_file($filetmp,$filepath);
            //Redirect 
            $result = mysqli_query($connect_to_database,$sql);
            
            if ($result){
                session_start();
                $_SESSION['user_name_session']=$Name;
                header('location: local_profiles.php');
                exit();
            }
            else {
                echo "Query error ". mysqli_error($connect_to_database);
            }
        }
       

    }
/* ---------- Edit DATA From SERVER ---------- */
    if (isset($_GET['id_edit'])) {
        $status="Edit";
        $id=$_GET['id_edit'];
      
    }
    else {
     
    }

   



?>
    <div class="container">
        <section class="grey-text form_create_section">
            <h4 class=" create_profile_h4"><?php echo $status?> Profile</h4>
            <form class="form_create" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data"> 
                <div class="form-group">
                        <div class="showing_error_main">
                            <?php if (!$showing_error['empty'] == ''){ ?>
                                 <img src="unnamed.png" class="img_error" ><p><?php $go_on=1;echo $showing_error['empty']; ?></p>
                            <?php }  if ((!$showing_error['message'] == '') && ($go_on ==0)) {?>
                                <img src="unnamed.png" class="img_error" > <p><?php echo $showing_error['message']; ?></p>
                             <?php } ?>
                        </div>
                    <label>Name* : </label>
                    <input   type="text" name="name_create"  placeholder="Enter Your Name" class="form-control <?php if (!$showing_error['name']=="") { echo "test";} ?> " required >
                    <div class="showing_error"><p><?php echo $showing_error['name']; ?></p></div>
                    <br>
                    <label>Email* : </label>
                    <input   type="email" name="email_create"  placeholder="Enter Your Email"class="form-control <?php if (!$showing_error['email']=="") { echo "test";} ?> " required >
                    <div class="showing_error"><p><?php echo $showing_error['email']; ?></p></div>
                    <br>
                    <label>Profession*:  </label>
                    <select name="profession_create" class="form-control select" >
                        <option value="Student or Learning">Student or Learning</option>
                        <option value="Junior Developer">Junior Developer</option>
                        <option value="Senior Developer">Senior Developer</option>
                        <option value="Intern">Intern</option>
                    </select>
                    <br>
                    <label>URL*: </label>
                    <input type="text" name="url_create"  placeholder="Enter url link" class="form-control <?php if (!$showing_error['url']=="") { echo "test";} ?> " required  >
                    <div class="showing_error"><p><?php echo $showing_error['url']; ?></p></div>
                    <br>
                    <select name="gender_create" class="form-control select" >
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <br>
                    <label>location*: </label>
                    <input type="text" name="location_create"  placeholder="Enter Your Location (Comma splices)" class="form-control <?php if (!$showing_error['location']=="") { echo "test";} ?> " required  >
                    
                    <br>
                    <label>Skills*: </label>
                    <textarea class="form-control textarea   <?php if (!$showing_error['skills']=="") { echo "test";} ?>" name="skills_create" placeholder="Leave some of your skills" required> </textarea>
                    <div class="showing_error "><p><?php echo $showing_error['skills']; ?></p></div>
                    <br>
                    <label>Image*: </label>
                    <br>
                    <input type="file" name="image_create" required >
                    <div class="showing_error"><p><?php echo $showing_error['image']; ?></p></div>
                    <br> <br>
                    <input type="submit" name="done" value="Done" class="btn btn-primary z-depth-0">
                </div>
            </form>
        </section>
    </div>
</body>
</html>



<!-- 
# php -- BEGIN cPanel-generated handler, do not edit
# Set the “ea-php72” package as the default “PHP” programming language.
<IfModule mime_module>
  AddHandler application/x-httpd-ea-php72 .php .php7 .phtml 
</IfModule>
# php -- END cPanel-generated handler, do not edit

-->