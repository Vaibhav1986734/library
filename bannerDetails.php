<?php
     header("Cache-Control: no-cache, must-revalidate");

     if (session_status() == PHP_SESSION_NONE) 
             session_start();

          $lrole="Administrator";

      include("shared/checkuserlogin.php");
      include("shared/conn.php");
?>

<!DOCTYPE html>
  <html>

  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, 
       shrink-to-fit=no" charset="utf-8" />
       <title>Dashboard - Banner Details</title>

       <link rel="stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/admincss.css" />
   </head>

  <body class="sb-nav-fixed">

    <?php include_once("shared/adminpagetop.php") ?>

    <div id="layoutSidenav">
        <?php include_once("shared/adminsidenav.php") ?>

        <div id="layoutSidenav_content">

            <main>

     <div class="container mt-3">

      <div class="row">

        <div class="col-6 col-sm-7 col-md-8 " style="font-size: 25px;
         font-weight: bold;">Banner Slider</div>

          <div class="col-6 col-sm-5 col-md-4 text-right">
           <a href="ManageBanner?flag=a" class="btn btn-outline-info  " >
	                 		 <i class='fa fa-plus-square'></i>   Add New Banner
           </a>
          </div>
          



         </div>
         

       <hr/>

     <div class="row table-responsive">
       <div class="col md-12">

  <?php

       $rs=mysqli_query($con,"select * from banner order by bannerid desc")
       or die("Error: ".mysqli_error($con));
 
      $str="";
 
      $BannerId=1;

       while($row=mysqli_fetch_array($rs))
          {
                $str=$str."<tr>
                               <td width='50px'>$BannerId</td>
                               <td>$row[1]</td>
                               <td width='150px'><img src='$row[2]'  class='img img-thumbnail'</td>

                               

                                <td class='text-center'>

                        <a href='ManageBanner?flag=e&BannerId=$row[0]'
                                class='btn btn-outline-success'>
                              <i class='fa fa-edit'>
                                   Edit
                              </i>
                         </a>

                         <td class='text-center'>
                         <a href='ManageBanner?flag=d&BannerId=$row[0]' class='btn btn-outline-danger deleteuser'                    
                               onclick='return confirm(\"Do you want to Delete this  Record..?\")'>
                          <i class='fa fa-trash'> 
                               Delete
                          </i>
                       </a>

                        </td>

      				

                             
                         </tr>";

                        $BannerId++;
             }

 
     $tbl="";

      if($str)
       {
          $tbl=$tbl."<table class='table table-bordered'>
             <tr class='bg-info text-white'>
               <th>Sno.</th>
               <th>Banner Name</th>
               <th> Banner Image</th>
               <th colspan='2' class='w-25 text-center'>Choice</th>
            </tr>
                     $str
           </table>";
        }

       if($tbl)
               echo $tbl;
        else
             echo "No Banner Found...!!";
    ?>
       </div>
     </div>
   </div>

   </main>
          
          <?php
                  mysqli_close($con); 
                include_once("shared/adminpagebottom.php") 
                ?>
            </div>
        </div>
        
      </body>
      </html>