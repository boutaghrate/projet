
<?php
//database conexion
	$conn=new PDO('mysql:host=localhost; dbname=test', 'root', '') or die(mysql_error());
    //form submit function apload
	if(isset($_POST['submit'])!=""){
	  $name=$_FILES['file']['name'];
	  $size=$_FILES['file']['size'];
	  $type=$_FILES['file']['type'];
	  $temp=$_FILES['file']['tmp_name'];
	  $fname = date("YmdHis").'_'.$name;
      //check if filename exist
	  $chk = $conn->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
	  if($chk){
	    $i = 1;
	    $c = 0;
		while($c == 0){
	    	$i++;
	    	$reversedParts = explode('.', strrev($name), 2);
            //new filename
	    	$tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
            //check if new filename is still exist in the database
	    	$chk2 = $conn->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
	    	if($chk2 == 0){
	    		$c = 1;
	    		$name = $tname;
	    	}
	    }
	}
	 $move =  move_uploaded_file($temp,"upload/".$fname);
	 if($move){
	 	$query=$conn->query("insert into upload(name,fname)values('$name','$fname')");
		if($query){
		header("location:insert.php");
		}
		else{
		die(mysql_error());
		}
	 }
	}
	?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert PDF</title>
    <style media="screen">
div{
            border: 2px solid black  ;
            width: 500px;
            margin-left: 300px;
            margin-top: 50px;
            padding: 30px;

 }
form{
    margin-left: 70px;
}

label{
    font-size: 20px;
    font-weight: bold;

}
#pdf{
    font-size: 20px;
    font-weight: bold;
    margin-top: 10px;

}
#upload{
 
    font-size: 20px;
    font-weight: bold;
    margin-left: 100px;
}

    </style>
</head>
<body>
    
    <div class="">
    <h3><b>Upload and download files</b></h3><br>
        <!-- <form action="insert.php" method="post" enctype="multipart/form-data">

        <label for="">Choose your PDF File</label><br>
        <input id="pdf" type="file" name="pdf" value="" required><br><br>
        <input id="upload" type="submit" name="submit" value="upload">

        </form> -->

        <form enctype="multipart/form-data" action="insert.php" name="form" method="post">
		Select File
			<input type="file" name="file" id="file" /></td>
			<input type="submit" name="submit" id="submit" value="Submit" />
	</form>
    <br>
    <!--Upload Files  -->
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
			$query=$conn->query("select * from upload order by id desc");
			while($row=$query->fetch()){
				$name=$row['name'];
			?>
			<tr>
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
					<button class="alert-success"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo 
                    $row['fname'] ?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		</table>
    </div>
    
</body>
</html>