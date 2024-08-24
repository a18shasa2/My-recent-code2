<?php
// Ver 1 single files, ändra bara name="type"
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png","pdf","zip","mp4");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors="This extension not allowed. Please choose a JPEG or PNG file.";
         // OR "success"
      }
      
      if($file_size > 209715220971522097152) {
         $errors='File size must be excately 2 MB';
        // OR "success" or file 2097152
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploaded_files/".$file_name);
         $laddar_upp_good = "Klart! Filen har nu laddats upp!";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
        
<p id="demo" style=color:red></p>
<p style=color:green><?php echo $laddar_upp_good ?> </p>

<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "Filen laddas nu upp! Vänta!";
}
</script>
     
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name="image" />
         <input type = "submit" value="Ladda upp" onclick="myFunction()" />

         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
			
      </form>
      
   </body>
</html>