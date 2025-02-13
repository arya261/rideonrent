<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking List</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bookinglist.css">
<body>
    <div class="container">
        <h1>Booking List</h1>
        <table>
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Customer Name</th>
                    <th>Vehicle Name</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            <?php $sl_no=1; foreach($booking as $b){?>
                    <td><?=$sl_no?></td>
                    <td><?=$b->customer_name?></td>
                    <td><?=$b->make." ".$b->model?></td>
                    <td><?=$b->from_date?></td>
                    <td><?=$b->to_date?></td>
                    <td>
                        <button  class="accept-btn">Accept</button>
                        <button class="reject-btn" onclick="reject(<?=$b->booking_id?>">Reject</button>
                    </td>
                </tr>
                <?php $sl_no ++;}?>
                
            </tbody>
        </table>
    </div>
</body>
</html>

