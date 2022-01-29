<?php

$conn = mysqli_connect("localhost" , "root" , "","dbsdb");

if(isset($_POST["import"]))
{
    $filename=$_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"]>0){
        $file=fopen($filename,"r");
        while(($column=fgetcsv($file,1000,","))!=FALSE){
            $myquery="Insert into user (LIST_ID , ENTITY_KEY) values ('" . $column[0]. "','" . $column[1] ."')";
            $result=mysqli_query($conn,$mysqery);

            if(!empty($result)){
                echo "CSV Data Imported into database";
            }
            else{
                echo"Problem in importing data";
            }
        }
    }
}
?>


<form class="myform" action="" method="post" name="uploadcsv" enctype="multipart/form-data">
<div>
    <label> choose csv file</label>
    <input type="file" name"file" accept=".csv">
    <button type="submit" name="import">Import</button>
</div>

</form>