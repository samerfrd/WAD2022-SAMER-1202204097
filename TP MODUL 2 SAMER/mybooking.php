<?php
$id_data = $_POST['Car_type'];
$book = array( array("id" => 1,"url"=>"/img/1.jpeg", "name"=>"Nusantara Hall" , "price"=>2000, "capacity" => 5000,"parkir" => "Free Parking", "ac" => "Full AC","service" => "Cleaning Service", "covid19" => "Covid-19 Health Protocol"),
               array("id" => 2,"url"=>"/img/2.jpeg", "name"=>"Garuda Hall" , "price"=>1000, "capacity" => 1000, "parkir" => "Free Parking", "ac" => "Full AC","service" => "No Cleaning Service", "covid19" => "Covid-19 Health Protocol"),
               array("id" => 3,"url"=>"/img/3.jpeg", "name"=>"Gedung Serba Guna" , "price"=>500, "capacity" => 500, "parkir" => "No Free Parking", "ac" => "No Full AC","service" => "No Cleaning Service", "covid19" => "Covid-19 Health Protocol") 
             ); 
$a = $id_data - 1;
$data_price = $book[$a]['price'];
$data_name = $book[$a]['name'];


$id_booking = rand();
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$duration = $_POST['duration'];
$Car_type = $data_name;
$price = $data_price;
$phone_number = $_POST['phone_number'];
$for_query = '';
$service_catering = 0;
$service_decor = 0;   
$service_sound = 0; 
if(!empty($_POST["service"])){

    foreach($_POST["service"] as $service){

     $for_query .= $service . ', ';

        if($service == "Catering"){
            $service_catering = 700;
        }elseif($service == "Decoration"){
            $service_decor = 450;   
        }elseif($service == "Sound System"){
            $service_sound = 250;   
        }
    }
    $total = $price + $service_catering + $service_decor + $service_sound;
}else{
    $for_query = "no service";
    $total = $price + $service_catering + $service_decor + $service_sound;
}
$checkin = date('d-m-Y H:i:s', strtotime("$date $time"));

$timestamp = strtotime($time) + 60*60*$duration;

$timecheckout = date('H:i', $timestamp);

$checkout = date('d-m-Y H:i:s', strtotime("$date $timecheckout"));

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <section id="Booking">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-center">
            <div class="navbar-center" id="navbarNav">
                 <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link" href="home..php">Home </a>
                    </li>
                      <li class="nav-item">
                           <a class="nav-link" href="booking.php">Booking</a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="mybooking.php">My Booking <span class="sr-only">(current)</span></a>
                      </li>
                 </ul>
            </div>
       </nav>
        <section id="Table">
           <center><h1>Thank you <?php echo $name;?> for Reserving</h1></center>
           <br/>
           <center><h5>Please Check Your Reservation Details</h5></center>
           <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Booking Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check-Out</th>
                    <th scope="col">Car Type</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Service</th>
                    <th scope="col">Total Service</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row"><?php echo $id_booking?></th>
                    <td><?php echo $name?></td>
                    <td><?php echo $checkin?></td>
                    <td><?php echo $checkout?></td>
                    <td><?php echo $Car_type?></td>
                    <td><?php echo $phone_number?></td>
                    <td><?php echo $for_query?></td>
                    <td><?php echo $total?></td>
                    </tr>
                </tbody>
            </table>
        </section>
</body>

<Footer style="margin-top: 50px;">
    <div style="width: auto;">
      <p style="text-align: center;">
        Created by SAMER_1202202097
      </p>
    </div>
</Footer>

</html>