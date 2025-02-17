<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/customer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Optionally, include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="padding:0px">
    <div class="main-container">
        <div class="row" style="margin-left:0px; margin-right:0px">
            <div class="col-sm-4 col-md-2 side-bar">
                <div class="logo-div">
                <img style="height: 70px" src="<?php echo base_url(); ?>/assets/images/car-logo1.png" alt="">

                    <h4><strong>RIDEONRENT</strong></h4>
                </div>
                <div class="side-image">
                    <img src="" alt="">
                </div>
            </div>
            <div class="col-sm-8 col-md-10 main-div">
                <div class="row">
                    <?php foreach($customer_details as $c) { ?>
                    <div class="col-sm-6">
                        <h5>Welcome, <?=ucfirst($c->customer_name)?> !</h5>
                        <p>Today is a great day for car rental service</p>
                    </div>
                    <div class="col-sm-6 notification">
                        <p><i style="font-size:20px" class="fa-regular fa-message " aria-hidden="true"></i></p>
                        <p><i style="font-size:20px" class="fa-regular fa-bell"></i></p>
                        <div class="profile">
                            <img src="<?php echo base_url(); ?>/assets/images/profile.jpg" alt="">
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="row">
                    <div class="col-sm-3 ">

                        <div class="veh-spec">
                            <img style="height:7vh" src="<?php echo base_url(); ?>/assets/images/engin1.png" alt="">
                            <div class="" style="line-height:0px">
                                <h6>Engine</h6>
                                <h5><strong>2600 cc</strong></h5>
                                <p>2.0L</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-3 ">
                        <div class="veh-spec">
                            <img style="height:8vh" src="<?php echo base_url(); ?>/assets/images/mileage.png" alt="">
                            <div class="" style="line-height:0px">
                                <h6>Mileage</h6>
                                <h5><strong>2600 cc</strong></h5>
                                <p>2.0L</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-3 ">
                        <div class="veh-spec">
                            <img style="height:8vh" src="<?php echo base_url(); ?>/assets/images/truck.png" alt="">
                            <div class="" style="line-height:0px">
                                <h6>Type</h6>
                                <h5><strong>2600 cc</strong></h5>
                                <p>2.0L</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 ">
                        <div class="veh-spec">
                            <img style="height:8vh" src="<?php echo base_url(); ?>/assets/images/transmission.png" alt="">
                            <div class="" style="line-height:0px">
                                <h6>Transmission</h6>
                                <h5><strong>2600 cc</strong></h5>
                                <p>2.0L</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 3vh;padding-left: 15px;">
                    <div class="col-sm-8 veh-book" style="">
                        <div class="row">
                            <div class="col-sm-7 veh-book-img">
                                <h5 style="font-family: serif;margin-top: 1vh;"><strong id="book_veh_name1">Vehicle Name</strong> </h5>
                                <div class="">
                                    <img style="height:26vh" src="<?php echo base_url(); ?>/assets/images/car3.png" alt="">
                                </div>
                            </div>
                            <div class="col-sm-5 veh-book-spec">
                                <div class="veh-spec-det">
                                    <div class="spec-details" style="background-color:#57eb624a">
                                        <img style="height:6vh;" src="<?php echo base_url(); ?>/assets/images/color.png" alt="">
                                        <p>Red</p>
                                    </div>
                                    <div class="spec-details"  style="background-color:#ff450038">
                                    <img style="height:6vh" src="<?php echo base_url(); ?>/assets/images/seating.png" alt="">
                                    <p>5</p>
                                    </div>
                                </div>
                                <div class="veh-spec-det">
                                    <div class="spec-details" style="background-color:#ffe40024">
                                    <img style="height:6vh" src="<?php echo base_url(); ?>/assets/images/fuel.png" alt="">
                                    <p>Diesel</p>
                                    </div>
                                    <div class="spec-details" style="background-color:#c37fb438">
                                    <img style="height:6vh" src="<?php echo base_url(); ?>/assets/images/fuel.png" alt="">
                                    <p>Petrol</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row next-veh" >
                            <div class="change_vehicle">
                                <button onclick="next_vehicle()">Next<i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-4">
                        <div class="veh-available">
                            <h6 ><strong>Check Vehicle Availability</strong></h6>
                            <div class="row">
                                <div class="col-sm-12"><label class="labels" for="">Select vehicle</label>
                                    <form action="" id="veh_avb_form">
                                        <select name="vehicle_id" id="">
                                        <?php foreach($vehicle as $v) { ?>
                                            <option value="<?=$v->vehicle_id?>"><?=$v->vehicle_name?></option>
                                        <?php }?>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-sm-6"><label class="labels" for="">From date</label><input type="date" name="" id=""></div>
                                <div class="col-sm-6"><label class="labels">To date</label><input type="date" name="" id=""></div>
                                <div class="col-sm-12 check-avb"><button onclick="check_veh_availability()" class="check-but">CHECK AVAILABILITY</button></div>
                            </div>
                        </div>
                    </div>
                    </div>
                <div class="row" style="margin-top: 3vh;padding-left: 15px;height: 27vh;">
                    <div class="col-sm-8 book-list">
                        <table class="veh-history-table">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Vehicle</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Replacement</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    $slno =1; foreach($booking as $b){
                                        if($b->status == 1 ){
                                            $status = "ACCEPTED";
                                            $color  = "green";
                                        }else if($b->status == 2){
                                            $status = "REJECTED";
                                            $color = "red";
                                        }else{
                                            $status = "PENDING";
                                            $color = "blue";
                                        }
                                ?>
                                <tr>
                                    <td><?=$slno?></td>
                                    <td><?=ucfirst($b->make )." ".ucfirst($b->model)?></td>
                                    <td><?= date('d-m-Y', strtotime($b->from_date));?></td>
                                    <td><?= date('d-m-Y', strtotime($b->to_date));?></td>
                                    <td><?=$b->booking_amount?></td>
                                    <td style="color:<?=$color?>"><?=$status?></td>
                                    <td>
                                    <button class="replacement" onclick="replacement(<?=$b->booking_id?>)">Replacement</button>
             
                                    </td>
                                </tr>
                                <?php $slno ++; }?>
                            </tbody>
                        </table>
                    </div>

                   <script>
                    funtion($booking_id){
                        window.location.href()="<?base_url()?>dashboard/replacement" +booking_id
                    }




                   </script>
                    <div class="col-sm-4 ">
                        <div class="last-div" style="padding:10px">
                            <form action="" id="veh_book_form">
                                <h6 id="book_veh_name">Vehicle Name</h6>
                                <input type="hidden" value="" name="vehicle_book_id" id="veh_book_id">
                                <div class="row">
                                    <div class="col-sm-6"><label class="labels" for="">From date</label><input type="date" name="book_from_date" id=""></div>
                                    <div class="col-sm-6"><label class="labels">To date</label><input type="date" name="book_to_date" id=""></div>
                                </div>
                                <h5 style="text-align:right;margin-top:10px"><strong id="book_price">₹ 0.00</strong></h5>
                            </form>
                                <div class="" style="display:flex; justify-content:center">
                                    <button class="check-but" onclick="book_vehicle()">BOOK NOW</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <script>
        function check_veh_availability(){
            var form_data = $('#veh_avb_form').serialize();
            $.ajax({
            url: "<?= base_url(); ?>customer/vehicle_availability/",  // URL to send the request to
            type: "POST",  // HTTP method (POST)
            data: form_data,  // Data to send with the request
            success: function(result) {  // Callback function on success
                var obj = JSON.parse(result);  // Parse the JSON response

                if (obj.status == 1) {  // If status is 1, success
                    Swal.fire({
                        position: "top-end",
                        icon: "success",  // Use 'icon' instead of 'type' for SweetAlert2
                        title: obj.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {  // If status is not 1, error
                    swal(obj.message);  // Display error message
                }
            },
            error: function(xhr, status, error) {  // Callback function for error
                console.log("AJAX Error: " + status + ": " + error);  // Log error if any
            }
        });
        }
        function next_vehicle(){
            var vehicle_id          =document.getElementById('veh_book_id').value;
            var path                = "<?= base_url(); ?>customer/next_vehicle/"+vehicle_id;
            $.post(path,function(information){
            var data = JSON.parse(information);                    
            if (data && data.length > 0) {
                document.getElementById('book_veh_name').innerHTML = data[0].make+data[0].model;
                document.getElementById('book_veh_name1').innerHTML = data[0].make+ data[0].model;
                document.getElementById('book_price').innerHTML = '₹'+data[0].daily_charge;
                document.getElementById('veh_book_id').value = data[0].vehicle_id;                
                }
            })
        }
        function book_vehicle(){
            var form_data = $('#veh_book_form').serialize();
            console.log(form_data); 
            $.ajax({
            url: "<?= base_url(); ?>customer/vehicle_booking/",  
            type: "POST",  // HTTP method (POST)
            data: form_data,  // Data to send with the request
            success: function(result) {  // Callback function on success
                var obj = JSON.parse(result);  // Parse the JSON response

                if (obj.status == 1) {  // If status is 1, success
                    Swal.fire({
                        position: "top-end",
                        icon: "success",  // Use 'icon' instead of 'type' for SweetAlert2
                        title: obj.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {  // If status is not 1, error
                    swal(obj.message);  // Display error message
                }
            },
            error: function(xhr, status, error) {  // Callback function for error
                console.log("AJAX Error: " + status + ": " + error);  // Log error if any
            }
        });
            
          
        }
   </script>
</body>
</html>