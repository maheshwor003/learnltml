<?php
 session_start();
 
 include('includes/dbconfig.php');

 if(isset($_POST['delete_btn']))
  {
     $id =$_POST['id_key'];
     $ref_table ='posts/'.$id;
     $deleteData =$database->getReference($ref_table)->remove();

      if($deleteData)
       {
          $_SESSION['status']="Checkout Successfully";
          header('location: home.php');
        }
        else{
            $_SESSION['status']="Not Checkout";
            header('location: home.php');
        }
    }
?>
