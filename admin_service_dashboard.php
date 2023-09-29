<?php
include("data_class.php");
$adminid=$_SESSION["adminId"];

?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        
</head>
<style>
    
.imglogo{
    margin:auto;
    height:120px;
    width:75%;

}

body
{
margin:10px;    
background-image: url('images/b.jpg');

}
.bluebtn
{
    background-color: #009cff;
    color:white;
    width:95%;
    height:37px;
    margin-top:15px;
    border-radius:7px;
    border-color: #0449aa;
    font-family: Arial, Helvetica, sans-serif;
  
}
.leftinnerdiv{
    float:left;
    width:25%;
}
.rightinnerdiv{
    float:right;
    width:75%;
}
.innerdiv{
    text-align: center;
margin: none;
}
</style>
<body>
   
    <div class="container">
        <div class="innerdiv">
            <div class="row">
                <img class="imglogo" src="images/logo.png"/></div>
                <!--left part with all the buttons--> 
                <div class="leftinnerdiv">
                    <Button class="bluebtn">ADMIN</Button>
                    <Button class="bluebtn" onclick="openpart('addbook')" >  ADD BOOK</Button>
                <Button class="bluebtn" onclick="openpart('bookreport')" >  BOOK REPORT</Button>
                <Button class="bluebtn" onclick="openpart('bookrequestapprove')"> BOOK REQUESTS</Button>
                <Button class="bluebtn" onclick="openpart('addperson')">  ADD USER</Button>
                <Button class="bluebtn" onclick="openpart('studentrecord')"> STUDENT REPORT</Button>
                <Button class="bluebtn"  onclick="openpart('issuebook')">  ISSUE BOOK</Button>
                <Button class="bluebtn" onclick="openpart('issuebookreport')">  ISSUE REPORT</Button>
                 <a href="index.php"><Button class="bluebtn">LOGOUT</Button></a>
                </div>

<!--add book-->

                <div class="rightinnerdiv">   
            <div id="addbook" class="innerright portion" style="display:none;color:white">

            <Button class="bluebtn" >ADD NEW BOOK</Button>
            <br>
            <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
            <label>Book Name:</label><input type="text" name="bookname"/>
            </br> 
            <br>
            <label>Detail:</label><input  type="text" name="bookdetail"/></br>
            <Br>
            <label>Author:</label><input type="text" name="bookaudor"/></br>
            <Br>
            <label>Publication</label><input type="text" name="bookpub"/></br>
        
            <div><label>Branch:</label><input type="radio" name="branch" value="other"/>Other<input type="radio" name="branch" value="BSIT"/>BCA<div style="margin-left:80px"><input type="radio" name="branch" value="BSCS"/>B.Tech<input type="radio" name="branch" value="BSSE"/>BSC IT</div>
            </div>   
            <label>Price:</label><input  type="number" name="bookprice"/></br>
            <br>
            <label>Quantity:</label><input type="number" name="bookquantity"/></br>
            <label>Book Photo</label><input  type="file" name="bookphoto"/></br>
            </br>
            <input type="submit" value="SUBMIT" />
            </br>
            </br>

            </form>
            </div>
            </div>
           
<!--student report-->
<div class="rightinnerdiv">   
            <div id="studentrecord" class="innerright portion" style="display:none">
            <Button class="bluebtn" >Student RECORD</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;color:white;width: 110%;'><tr><th style=' 
            padding:10px;padding-left:30px;'> Name</th><th>Email</th><th>Type</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'><button type='button'class='btn btn-primary'>Delete</button></a></td>";
                $table.="</tr>";
              
            }
            $table.="</table>";
           
            echo $table;
            ?>

            </div>
            </div>
            <!--book report-->
            <div class="rightinnerdiv">   
            <div id="bookreport" class="innerright portion" style="display:none">
            <Button class="bluebtn" >BOOK RECORD</Button>
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbook();
            $recordset=$u->getbook();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;color:white;width: 120%;'><tr><th style=' 
            padding: 8px;color:white;'>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>View</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
                
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[10]</td>";
                $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View BOOK</button></a></td>";
                
                $table.="</tr>";
                
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <!--bookdetail-->
            <div class="rightinnerdiv">   
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            
            <Button class="bluebtn" >BOOK DETAIL</Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthor= $row[4];
               $bookpub= $row[5];
               $branch= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];

            }            
?>

            <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px' src="uploads/download.jpeg"<?php echo $bookimg?> "/>
            </br>
            <p style="color:white"><u>Book Name:</u> &nbsp&nbsp<?php echo $bookname ?></p>
            <p style="color:white"><u>Book Detail:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
            <p style="color:white"><u>Book Author:</u> &nbsp&nbsp<?php echo $bookauthor ?></p>
            <p style="color:white"><u>Book Publisher:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
            <p style="color:white"><u>Book Branch:</u> &nbsp&nbsp<?php echo $branch ?></p>
            <p style="color:white"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
            <p style="color:white"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookava ?></p>
            <p style="color:white"><u>Book Rent:</u> &nbsp&nbsp<?php echo $bookrent ?></p>
            </div>
            </div>
<!-- issue book -->
<div class="rightinnerdiv">   
            <div id="issuebook" class="innerright portion" style="display:none;color:white">
            <Button class="bluebtn" >ISSUE BOOK</Button>
            <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
            <br></br>
            <label for="book">Choose Book:</label>
         
           
            <select name="book" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();
            foreach($recordset as $row)
            {         
                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";        
            }            
            ?>
            </select>
            <br></br>
            <label for="Select Student">Select Student:</label>
            <select name="userselect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
            <br></br>
           <label>Days</label> <input type="number" name="days"/>

            <input type="submit" value="SUBMIT" class="input" />
            </form>
            </div>
            </div>
 <!--book request approvee-->
 <div class="rightinnerdiv">   
            <div id="bookrequestapprove" class="innerright portion" style="display:none;color:white;">
            <Button class="bluebtn" >BOOK REQUEST APPROVE</Button>
            <?php
            $u=new data;
            $u->setconnection();
            $u->requestbookdata();
            $recordset=$u->requestbookdata();

            $table="<table style='font-family: Arial;border-collapse: collapse;width: 100%;color:white'><tr><th style='
            padding: 8px;'>Person Name</th><th>person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";              
                $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved</button></a></td>";
                $table.="</tr>";              
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>
         
<!--issue book report-->
<div class="rightinnerdiv">   
            <div id="issuebookreport" class="innerright portion" style="display:none">
            <Button class="bluebtn" >Issue Book Record</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;color:white;width: 100%;'><tr><th style='  
            padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                
                $table.="</tr>";
              
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>




                <!--add person -->


            <div class="rightinnerdiv">   
            <div id="addperson" class="innerright portion" style="display:none ">
            <Button class="bluebtn" >ADD Person</Button>
            <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
            <Br>
            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <Br>
            <label>Password:</label><input type="password" name="addpass"/>
            </br>
            <Br>
            <label>Email:</label><input  type="email" name="addemail"/></br>
            <Br>
            <label for="type">Choose type:</label>
            <select name="type" >
                <option value="student">student</option>
                <option value="teacher">teacher</option>
            </select>

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            </div>
        </div>
    </div>
    <script>
        function openpart(portion)
        {
            var i;
            var x=document.getElementsByClassName("portion");
            for(i=0;i<x.length;i++)
            x[i].style.display="none";
            document.getElementById(portion).style.display = "block";
        }
    </script>
</body>
</html>