<?php include("nabvar_section.php"); 


    /* ---------- GET DATA TO SERVER ---------- */
    $sql="SELECT * FROM create_profiles ORDER BY Id";
    
    $result=mysqli_query($connect_to_database,$sql);    
    
    $profiles=mysqli_fetch_all($result,MYSQLI_ASSOC);
    /*
            session_start();
            $_SESSION['session_name']=$_POST['session_name'];//store data in server
            //Cokkies store data  in Computer
    */
    /* Searh for Username */
    $fname=$email_user=$id_user_search="";
    if (isset($_POST['search'])){
        $keyword=$_POST['searh_for_user'];
        $keyword=preg_replace("#[^0-9a-z]#i","",$keyword);
        $sql ="SELECT * From create_profiles WHERE  Names LIKE '%$keyword%'   ";
        $result=mysqli_query($connect_to_database,$sql); 
        while ($row=mysqli_fetch_array($result)){
           $fname=$row['Names'];
           $email_user=$row['Email'];
           $id_user_search=$row['Id'];
            }
    }

?>
    <div class="container">
            <div >  
            <nav class="navbar navbar-light ">
                <form class="form-inline"  action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                         <input type="text" name="searh_for_user"class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <input name="search" type="submit" class="btn btn-primary" value-"Search">
                </form>
                
            </nav>
            


            <div class="container table-responsive py-5">   
    <?php  if (isset($_POST['search'])){ 
     sleep(2); ?> 
<table class="table table-bordered table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">ID(Handel)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $fname; ?></td>
      <td><?php echo $email_user; ?></td>
      <td><?php echo $id_user_search; ?></td>
    </tr>
    <!-- More Search -->
    <!--
    <tr>
      <th scope="row">2</th>
    </tr>
    -->
  </tbody>
</table>
    <?php }else { ?>
    <?php } ?>
</div>

        
        <div class="global_profiles">
        <h4 class=" Explore_profile_h4">Explore Profile</h4>
            <div class="get_profiles">
            <?php foreach($profiles as $profile): ?>
                <div class="row">   
                    <div class="col-sm-3 col-md-6 col-lg-4 img_profile"> 
                            <img src="photo/<?php echo htmlspecialchars($profile['Images']);?>">
                    </div>
                    <div class="col-sm-3 col-md-6 col-lg-4">
                        <div class="profile_content ">
                            <h6> User Name :<?php  echo htmlspecialchars($profile['Names']); ?></h6>
                            <ul>
                                <?php foreach(explode(',',$profile['Locations']) as $unit) { ?>
                                        <li>From :<?php echo htmlspecialchars($unit); break;?> </li>
                                <?php  } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-6 col-lg-4">
                        <div class="item-action right-align">
                            <a class="btn btn-primary" href="moreinfo.php?id=<?php echo $profile['Id']; ?>">

                            More Info
                            </a>
                         </div>
                    </div>             
                </div>        
            <?php  endforeach; ?>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
