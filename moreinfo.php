<?php 
include("nabvar_section.php");



    /* ---------- GET DATA From SERVER ---------- */
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $sql="SELECT * FROM create_profiles WHERE ID='$id'";
        $result=mysqli_query($connect_to_database,$sql);    
        $profiles=mysqli_fetch_all($result,MYSQLI_ASSOC);
        if(count($profiles) != 1){
            header("location:global_profiles.php");
        }
    }
    else {
        header("location:global_profiles.php");
    }
    /* Or  you want the get the value after the ?
    $_SERVER['QUERY_STRING'] helps you to determine the part the string after the ?
    $sql="SELECT * FROM create_profiles WHERE ID='$_SERVER['QUERY_STRING']'";
    */
    
    $counter=0;
    /* ----------Delete Data From SERVER -------*/
    if (isset($_POST['id_delete_done']))  {
        $id_delete=mysqli_real_escape_string($connect_to_database,$_POST['id_account']);
        $sql="DELETE FROM create_profiles WHERE id=$id_delete";
        if (mysqli_query($connect_to_database,$sql)) {
            //success
            header('location:global_profiles.php');
        }else {
            echo "Query Error".mysqli_error($connect_to_database);   
        }
    }
?>


   <style type="text/css">

    .list-group .list-group-item:first-child strong {
         margin:0 45%;
        }

    .list-group-item {
        position: relative;
        display: block;
        padding: 0.75rem 1.25rem;
        margin-bottom: -1px;
        background-color: #fff;
         border: 1px solid rgba(0,0,0,0.125);
        }
    .list-group {
        padding-left:42px !important;
    }
    .profile-left img {
        max-width:100%;
        height: 450px;
    }
   </style>

<div class="container">
<header style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
    <?php foreach($profiles as $profile): ?>  
    <h3 style="font-weight: bold">Profile</h3>
  <div class='btn-group'>
    <a class="btn btn-outline-primary" href="local_profiles.php?id_edit=<?php  echo $profile['Id'] ?>">
    Edit Profile </a>
  </div>
</header>
<br>
</div>
<div class="container">
<div class='profile'>
    
  <div style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 1rem; ">
    <div class="profile-left">
      <img src="photo/<?php echo htmlspecialchars($profile['Images']); ?>" alt="">
      <br>
      <br>
      <h4><?php echo htmlspecialchars($profile['Names']);?></h4>
      <p class="lead"><?php foreach(explode(',',$profile['Locations']) as $unit) { ?>
         <li  style="list-style-type:none">From :<?php echo htmlspecialchars($unit); break;?> </li>
       <?php  } ?></p>
    </div>
    <div class="profile-right">
      <ul class="lis-group">
        <li class="list-group-item">
          <h4 class="text-center"><?php echo htmlspecialchars($profile['Profession']);?></h4>
        </li>
        <hr>
        <li class="list-group-item">
          <strong>User name</strong>
          <span class="float-right"><?php echo htmlspecialchars($profile['Names']);?></span>
        </li>
        <li class="list-group-item">
          <strong>Gender</strong>
          <span class="float-right"><?php 
            if ($profile['Gender']=="M") 
                echo  "Male";
            else 
                echo  "Female";?></span>
        </li>
        <li class="list-group-item">
          <strong>Location</strong>
          <span class="float-right"><?php echo htmlspecialchars($profile['Locations']);?></span>
        </li>
        <li class="list-group-item">
          <strong>Email</strong>
          <span class="float-right"><?php echo htmlspecialchars($profile['Email']);?></span>
        </li>
      </ul>
      <ul class="list-group">
        <li class="list-group-item">
          <strong>Skills</strong>
        </li>
        <?php foreach(explode(',',$profile['Skills']) as $unit) { 
            $counter++;?>
        <li class="list-group-item">
          <strong><?php echo htmlspecialchars($counter); ?>.<?php echo htmlspecialchars($unit); ?> </li></strong>
          <span class="" ><li style="list-style-type:none"></span>
        </li>
        <?php  } ?>
        <?php $counter=0; ?>
      </ul>
    </div>
  </div>
  <br>

  <li class="list-group-item" style="height:120px;">
          <strong>Website</strong>
          <br>
          <span ><?php echo htmlspecialchars($profile['Urls']);?></span>
    </li>
    <hr>
  <div class="profile-bottom">
    <p>
      <div class="card border-danger text-center p-4">
        <div class="card-body">
          <p class="lead">Privacy Zone</p>
          <p class="lead">You can not go back once the action done!</p>
          <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <input type="hidden" name="id_account"  value="<?php echo htmlspecialchars($profile['Id']);?>"> 
                <input class="btn btn-danger btn-lg" type="submit" name="id_delete_done" value="Delete Account" class="btn btn-primary">
          </form>

        </div>
      </div>
    </p>
  </div>

</div>
<?php  endforeach; ?>

</body>
</html>

<!-- 

-->