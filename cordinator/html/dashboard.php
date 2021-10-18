<?php
include('..\php\addWorkshop.php');
?>
<!DOCTYPE html>
<htmls>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DashBoard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/login_css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <!-- <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
</head>

<body>

    <div class="login-dark">

    <!-- <div class="container-fluid"> -->

          <!-- Page Heading -->
          <br><br>
          <div class="form-group">
<a  style="margin-left:17px;"  class="btn btn-light" data-toggle="modal" href="#AddNewModal">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
</svg>
                Add new workshop
</a>
<a  style="margin-left:17px; float:right;margin-right:17px;"  class="btn btn-light" data-toggle="modal" href="#MonthlyReport">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"></path>
</svg>
                Add monthly report
</a>
          
</div>

          <h2 style="margin-left:15px;color:#e8eef3">Upcoming Workshops</h2>
          <!-- DataTales Example -->
          <!-- <div class="card shadow mb-4"> -->
            
            
                <!-- <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Movie Name</th>
                      <th>Genre</th>
                      <th>Cast</th>
                      <th>Release Date</th>
                      <th>Budget Range ₹</th>
                      <th></th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <tr>
                      <td>Co-Branding</td>
                      <td>Tiger Zinda Hai</td>
                      <td>Action, Drama </td>
                      <td>Salman Khan, Katrina Kaif</td>
                      <td>2019/15/08</td>
                      <td>10,00,000 to 1,00,00,000</td>
                      <td>
                      <a class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" href="#portfolioModal1"> <span class="text">Edit</span></a>
                      <a class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" href="#"> <span class="text">Delete</span></a>
                      </td>
                    </tr> -->
                
                    <!-- <tr>
                      <td>In-Film</td>
                      <td>Cara Stevens</td>
                      <td>Sales Assistant</td>
                      <td>New York</td>
                      <td>2011/12/06</td>
                      <td>10,000 to 1,00,000</td>   
                     <td>
                      <a class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" href="#portfolioModal1"> <span class="text">Edit</span></a>
                      <a class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" href="#"> <span class="text">Delete</span></a>
                      </td>
                    </tr> -->
                   
                   
                    
                  <!-- </tbody>
                </table> -->
                <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                      <th style="width:25%">Date</th>
                      <th style="width:25%">Type & Participants</th>
                      <th style="width:25%">Expected no. of participants & Category</th>
                      <th style="width:25%">Disciplines</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                      $data = $conn->query("SELECT * FROM workshop_details where date>curDate()")->fetchAll();
                      foreach ($data as $row) 
                    {
                      $dateValue=$row['date'];
                      $thedate = explode("-", $dateValue);

                      // retrieve the values
                      $time=strtotime($dateValue);
                      $month=date("F",$time);
                      // $month = $thedate[1]; // 25
                      $day = $thedate[2]; // 09
                      $year = $thedate[0]; // 2012
                      $printdate=$month." ".$day.", ".$year;
                      $t_and_p= $row['type']." | ".$row['participants'];
                      $disciplines=$row['discipline'];
                      $departments=explode(",", $disciplines);

                  ?>
                    <tr>
                      <td><?php echo $printdate; ?></td>
                      <td><?php echo $t_and_p; ?></td>
                      <td><?php echo $row['expected_no']; ?></td>
                      <td><?php
                        foreach($departments as $department) 
                        {
                          echo nl2br($department." "."engineering"."<br />");
                        }
                        ?></td>
                      <!-- <td>
                      <a class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" href="#portfolioModal1"> <span class="text">Edit</span></a>
                      <a class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" href="#"> <span class="text">Delete</span></a>
                      
                      </td> -->
                    </tr>
                    <?php 
                      }
                    ?> 
                    </tbody>
</table>
              </div>
            </div>
          <!-- </div> -->

        <!-- </div> -->
        <!-- /.container-fluid -->
        <h2 style="margin-left:15px;color:#e8eef3">Pending Workshops</h2>
        <div class="card-body">
              <div class="table-responsive">
      <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                    <th style="width:25%">Date</th>
                      <th style="width:25%">Type & Participants</th>
                      <th style="width:25%">Expected no. of participants & Category</th>
                      <th style="width:25%">Reports</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  <?php
                      $data = $conn->query("SELECT * FROM workshop_details where date<=curDate()")->fetchAll();
                      foreach ($data as $row) 
                    {
                      $dateValue=$row['date'];
                      $thedate = explode("-", $dateValue);

                      // retrieve the values
                      $time=strtotime($dateValue);
                      $month=date("F",$time);
                      // $month = $thedate[1]; // 25
                      $day = $thedate[2]; // 09
                      $year = $thedate[0]; // 2012
                      $printdate=$month." ".$day.", ".$year;
                      $t_and_p= $row['type']." | ".$row['participants']
                  ?>
                    <tr>
                      <td><?php echo $printdate; ?></td>
                      <td><?php echo $t_and_p; ?></td>
                      <td><?php echo $row['expected_no']; ?></td>
                      <td>
                      <!-- <a class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" href="#portfolioModal1"> <span class="text">Edit</span></a>
                      <a class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" href="#"> <span class="text">Delete</span></a> -->
                      <!-- <a class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" href="#">Upload documents</a> -->
                      <!-- <p class="mb-4"><a class="btn btn-light btn-icon-split btn-sm" data-toggle="modal" href="#UploadReport"> <span class="text">Upload Report<i class="bi bi-arrow-up"></i></span></a></p> -->
                      <a class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" href="#UploadReport">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"></path>
</svg>
                Upload Reports
                    </a>
                    </td>
                    </tr> 
                    <?php 
                      }
                    ?> 
                    </tbody>
                    
</table>
</div>

</div>
      </div>
      
<form method="post" enctype="multipart/form-data" >    
<div class="portfolio-modal-lg modal fade" id="AddNewModal" tabindex="-1" role="dialog" aria-hidden="true">
 
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
        <center>
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <div class="modal-body">
               
               
                <ul class="list-inline">
                    
                
                    <div class="form-group">
                      <!-- <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Movie/Series Title"> -->
                      <input type="date"  class="form-control form-control-user" id="myDate" name="date" min="2015-10-28" >
                      <!-- <input type="date" class="form-control form-control-user" id="date" name="date" placeholder="Enter date of workshop"> -->
                    </div>
                    <div class="form-group">
                     <select class="form-control custom-select" name="type" data-toggle="tooltip" data-placement="top" title="Production Type">
                        <option value="" selected disabled>Type of Workshop</option>
                        <option value="In-house">In-house</option>
                        <option value="Outreach">Outreach</option>
      
                    </select>
                    </div>

                    <div class="form-group">
                     <select class="form-control custom-select" name="participants" data-toggle="tooltip" data-placement="top" title="Production Type">
                        <option value="" selected disabled>Participants</option>
                        <option value="Students">Students</option>
                        <option value="Faculties">Faculties</option>
      
                    </select>
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="expected_no" aria-describedby="emailHelp" placeholder="Enter expected no. of participants">
                    </div>

                    <div class="form-group">
                    <!-- <label for="cars">Select Disciplines:</label> -->
                     <select class="form-control custom-select" name="Discipline[]" data-toggle="tooltip" data-placement="top" title="Discipline" multiple size = 7>
                        <option value="" selected disabled>Discipline</option>
                        <option value="Computer">Computer Science and Engineering</option>
                        <option value="Chemical">Chemical engineering</option>
                        <option value="Civil">Civil engineering</option>
                        <option value="Electronic">Electronic engineering</option>
                        <option value="Mechanical">Mechanical engineering</option>
                        <option value="Aeronautical">Aeronautical engineering</option>
                    </select>
                    </div>
                <button class="btn btn-primary" type="submit"  id='submit' name="add_workshop">Add Workshop</button>                    
                <!-- <button class="btn btn-primary" data-dismiss="modal" type="submit" name="add_workshop">Add Workshop</button> -->
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                <i class="fa fa-close"></i>
                  Close</button>
                </ul> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<form action="../php/upload.php" method="post"  enctype="multipart/form-data" >    
<div class="portfolio-modal-lg modal fade" id="UploadReport" tabindex="-1" role="dialog" aria-hidden="true">
 
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
        <center>
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <div class="modal-body">
               
               
                <ul class="list-inline">
                    
                
                    <div class="form-group">
                    <label for="formFileMultiple" class="form-label">Upload Reports</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="report" multiple />
                    </div>
                    
                    
                    
                    
                <button class="btn btn-primary" type="submit"  id='submit' name="upload_reports">Submit</button>                    
                <!-- <button class="btn btn-primary" data-dismiss="modal" type="submit" name="add_workshop">Add Workshop</button> -->
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close</button>
                </ul> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<form action="../php/upload.php" method="post"  enctype="multipart/form-data" >    
<div class="portfolio-modal-lg modal fade" id="MonthlyReport" tabindex="-1" role="dialog" aria-hidden="true">
 
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
        <center>
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <div class="modal-body">
                <ul class="list-inline">
                    <div class="form-group">
                    <label for="formFileMultiple" class="form-label">Upload Monthly</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="report" multiple />
                    </div>  
                <button class="btn btn-primary" type="submit"  id='submit' name="upload_reports">Submit</button>                    
                <!-- <button class="btn btn-primary" data-dismiss="modal" type="submit" name="add_workshop">Add Workshop</button> -->
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close</button>
                </ul> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
<script>
  document.getElementById("myDate").min = new Date().getFullYear() + "-" +  parseInt(new Date().getMonth() + 1 ) + "-" + new Date().getDate()
</script>

</html>