
<?php  
    include 'loggedheader.php';
    include 'connect.php';
    include 'function.php';
    include 'loginchecker/adminMenu.php';
    include 'loginchecker/admin.php';
    date_default_timezone_set("Asia/Hong_Kong");

   $year = date("Y");

?>

<!DOCTYPE html>  
<html>  
<head>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>  
<body>  
<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>
<br>
    <form method="POST">
                <div class="col-md-2">  
                     <input type="text" name="from" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-2">  
                     <input type="text" name="to" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-2">  
                     <input type="submit" name="filter" value="Filter" class="btn btn-info" />  
                </div><br><br>
            </form>
    <div class="container" id="print">  

        <?php  
            if (isset($_POST['filter'])){

                $from=mysqli_real_escape_string($con,$_POST['from']);
                $to=mysqli_real_escape_string($con,$_POST['to']);

                $select20 = "SELECT *,COUNT(sets) as total20 FROM hikerlist WHERE attendance='Present' AND sets='20' AND departureDate BETWEEN '$from' AND '$to'";
                                    $response = mysqli_query($con,$select20);

                                    if($response){
                                        while($row = mysqli_fetch_array($response)){
                                            $total20=$row['total20'];

                                        }
                                    }

            $select21 = "SELECT *,COUNT(sets) as total21 FROM hikerlist WHERE attendance='Present' AND sets='21' AND departureDate BETWEEN '$from' AND '$to'";
                                    $response = mysqli_query($con,$select21);

                                    if($response){
                                        while($row = mysqli_fetch_array($response)){
                                            $total21=$row['total21'];

                                        }
                                    }

            $select25= "SELECT *,COUNT(sets) as total25 FROM hikerlist WHERE attendance='Present' AND sets='25' AND departureDate BETWEEN '$from' AND '$to'";
                                    $response = mysqli_query($con,$select25);

                                    if($response){
                                        while($row = mysqli_fetch_array($response)){
                                            $total25=$row['total25'];

                                        }
                                    }

            $select26 ="SELECT *,COUNT(sets) as total26 FROM hikerlist WHERE attendance='Present' AND sets='26' AND departureDate BETWEEN '$from' AND '$to'";
                                    $response = mysqli_query($con,$select26);

                                    if($response){
                                        while($row = mysqli_fetch_array($response)){
                                            $total26=$row['total26'];

                                        }
                                    }

             $select20 = "SELECT *,COUNT(setspot_id) as total20 FROM register WHERE setspot_id='20' AND datenow BETWEEN '$from' AND '$to'";
            $response = mysqli_query($con,$select20);

                                    if($response){
                                        while($row = mysqli_fetch_array($response)){
                                            $total20d=$row['total20'];

                                        }
                                    }

            $select21 = "SELECT *,COUNT(setspot_id) as total21 FROM register WHERE setspot_id='21' AND datenow BETWEEN '$from' AND '$to'";
                                    $response = mysqli_query($con,$select21);

                                    if($response){
                                        while($row = mysqli_fetch_array($response)){
                                            $total21d=$row['total21'];

                                        }
                                    }

            $select25= "SELECT *,COUNT(setspot_id) as total25 FROM register WHERE setspot_id='25' AND datenow BETWEEN '$from' AND '$to'";
                                    $response = mysqli_query($con,$select25);

                                    if($response){
                                        while($row = mysqli_fetch_array($response)){
                                            $total25d=$row['total25'];

                                        }
                                    }

            $select26 = "SELECT *,COUNT(setspot_id) as total26 FROM register WHERE setspot_id='26' AND datenow BETWEEN '$from' AND '$to'";
                                    $response = mysqli_query($con,$select26);

                                    if($response){
                                        while($row = mysqli_fetch_array($response)){
                                            $total26d=$row['total26'];

                                        }
                                    }
                                    ?>
           <h2 align="center" style="font-size: 50px;"><img src="images/logo.png" width="100" height="60"> HikeNaKo Co.</h2>             
<h1 style="text-align: center;">Total Hiked (<?php echo  'From '. date("F d Y",strtotime($from)).' to '. date("F d Y",strtotime($to));?>)</h1>
    <div id='chart'></div><br><br>
<h1 style="text-align: center;">Total Hiked This Month(<?php echo  'From '. date("F d Y",strtotime($from)).' to '. date("F d Y",strtotime($to));?>)</h1>
    <div id='chart1'></div>
    </div>

    <div class="container" style="padding-bottom: 10px;" align="center" >
                <br>
                <p><button class="btn btn-primary" onclick="printContent('print')">Print Reports</button></p>
              </div>

              <?php
            }











    ?>  


                

       

<script>
Morris.Bar({
  element: 'chart',
  data: [
    { y: 'Mt. Daraitan', a: <?php echo $total20; ?>},
    { y: 'Mt. Pamitinan', a: <?php echo $total21; ?>},
    { y: 'Mt. Tagapo', a: <?php echo $total25; ?>},
    { y: 'Mt.Maynoba', a: <?php echo $total26; ?>},
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Total Hiked']
});

Morris.Bar({
  element: 'chart1',
  data: [
    { x: 'Mt. Daraitan', b: <?php echo $total20d; ?>},
    { x: 'Mt. Pamitinan', b: <?php echo $total21d; ?>},
    { x: 'Mt. Tagapo', b: <?php echo $total25d; ?>},
    { x: 'Mt.Maynoba', b: <?php echo $total26d; ?>},
  ],
  xkey: 'x',
  ykeys: ['b'],
  labels: ['Total Request']
});
</script>

 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
          
      });  
 </script>