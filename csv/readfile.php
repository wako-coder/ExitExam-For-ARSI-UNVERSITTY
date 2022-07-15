<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = '';

$database = 'mydatabase';
$table = 'user';

    if(isset($_POST['submit']))
    {
         $fname = $_FILES['sel_file']['name'];
         echo 'upload file name: '.$fname.' ';
         $chk_ext = explode(".",$fname);
        
         if(strtolower(end($chk_ext)) == "csv")
         {
        
             $filename = $_FILES['sel_file']['tmp_name'];
             $handle = fopen($filename, "r");
           ?>
           <table border="1">
           <tr><td>name</td>	<td>email</td>	<td>phone</td>	<td>age</td></tr>
          
           <?php
             while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
             {
               // $sql = "INSERT into user(name,email,phone) values('$data[0]','$data[1]','$data[2]')";
                //mysql_query($sql) or die(mysql_error());
                echo"<tr><td>$data[0]</td><td>$data[1]</td>	<td>$data[2]</td>	<td>$data[3]</td></tr>";
             }
         echo" </table>";
             fclose($handle);
             echo "Successfully Imported";
            
         }
         else
         {
             echo "Invalid File";
         }   
    }
    
    ?>
    <h1>Import CSV file</h1>
    <form action='' method='post' enctype="multipart/form-data">
        Import File : <input type='file' name='sel_file' size='20'>
        <input type='submit' name='submit' value='submit'>
    </form>