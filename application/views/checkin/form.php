<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/checkoutform.css">
    
</head>
<body>
    <?php
    if($mode=="add"){
        foreach($checkin as $c){
            $ordometer_out = $c->ordometer_out;
            $fuel_out = $c->fuel_out;
            $checkout_date = $c->checkout_date;
            $expected_checkin_date = $c->expected_checkin_date;
            $fixed_charge = $c->fixed_charge;
            $amount = $c->amount;
            $remark = $c->remark;
            $discount = $c->discount;
            $checkout_id = $c->checkout_id;
            $vehicle_id = $c->vehicle_id;
            $customer_id = $c->customer_id;
            $make = $c->make;
            $model = $c->model;
            $license_plate = $c->license_plate;
            $customer_name = $c->customer_name;
            $chekin_id = '';
    }}
    else{
        foreach($checkin as $c){
            $ordometer_out = $c->ordometer_in;
            $fuel_out = $c->fuel_in;
            $checkout_date = $c->checkout_date;
            $expected_checkin_date = $c->checkin_date;
            $fixed_charge = $c->fixed_charge;
            $amount = $c->amount;
            $remark = $c->notes;
            $discount = $c->discount;
            $checkout_id = $c->checkout_id;
            $vehicle_id = $c->vehicle_id;
            $customer_id = $c->customer_id;
            $customer_name = $c->customer_name;
            $make = $c->make;
            $model = $c->model;
            $license_plate = $c->license_plate;
            $checkin_id = $c->checkin_id;
        }
      
    }
    ?>












    <form action="<?=base_url()?>/checkin/process" id="registration_form" method="post">
        
    <div class="container">
        <!-- Left Section -->
        <div class="left">
        <input type="hidden" name="mode" value="<?=$mode?>" id="">
        <input type="hidden" name="checkout_id" value="<?=$checkout_id?>" id="">
        <input type="hidden" name="checkin_id" value="<?=$checkin_id?>" id="">
            <div class="form-group">
                    <label for="odometer">vehicle:</label>
                    <input type="hidden" id="vehicle_id" name="vehicle_id" value="<?=$vehicle_id?>" placeholder="">
                    <input type="text" readonly id="vehicle_name" name="vehicle_name" value="<?=$make .$model .$license_plate?>" placeholder="">
                </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="odometer">Odometer Reading:</label>
                    <input type="text" id="odometer" name="ordometer_in" value="<?=$ordometer_out?>" placeholder="Enter Odometer Reading">
                </div>

                <div class="form-group">
                    <label for="fuel">Fuel Reading:</label>
                    <input type="text" id="fuel" name="fuel_in" value="<?=$fuel_out?>" placeholder="Enter Fuel Reading">
                </div>
            </div>
        </div>

        <div class="line"></div>

        <!-- Right Section -->
        <div class="right">
        <div class="form-group">
                    <label for="duration">Select customer</label>
                    <input type="hidden" id="customer_id" value="<?=$customer_id?>">
                    <input type="text" readonly id="customer_name" value="<?=$customer_name?>" placeholder="">
        </div>
        
            <div class="form-row">
               
                <div class="form-group">
                    <label for="startDate">From Date:</label>
                    <input type="date" id="startDate" name="checkout_date" value="<?=$checkout_date?>">
                </div>
                <div class="form-group">
                    <label for="startTime">From Time:</label>
                    <input type="time" id="startTime" name="from_datetime">
                </div>
            </div>
            <div class="form-row">
               
                <div class="form-group">
                    <label for="endDate">To Date:</label>
                    <input type="date" id="endDate" name="expected_checkin_date" value="<?=$expected_checkin_date?>">
                </div>
                <div class="form-group">
                    <label for="endTime">To Time:</label>
                    <input type="time" id="endTime" name="to_datetime">
                </div>
            </div>
            <!-- <div class="form-row">

                <div class="form-group">
                    <label for="duration">Duration:</label>
                    <input type="text" id="duration" name="duration" placeholder="Enter Duration">
                </div>
            </div> -->
            <div class="form-row">
                <div class="form-group">
                    <label for="duration">Fixed Charge:</label>
                    <input type="text" id="duration" name="fixed_charge" value="<?=$fixed_charge?>">
                </div>
                <div class="form-group">
                    <label for="duration">Discount:</label>
                    <input type="text" id="duration" name="discount" value="<?=$discount?>">
                </div>
                <div class="form-group">
                    <label for="duration">Total Amount:</label>
                    <input type="text" id="duration" name="amount" value="<?=$amount?>" >
                </div>
            </div>
            <div class="form-group">
                <label for="remark">notes:</label>
                <textarea id="remark" name="notes" value="<?=$remark?>" rows="4" placeholder="Enter any remarks"><?=$remark?></textarea>
            </div>

            <button type="submit" class="button">confirm checkout</button>
        </div>
    </div>
    </form>
</body>
</html>
