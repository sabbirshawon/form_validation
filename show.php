<?php
    $title = 'Show Data - Report Form';
    
    include 'header.php'; 
?> 
<div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <div class="form-title">
                    <h1>Report Form</h1>
                </div>

                <div class="form-menu d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="index.php" class="btn btn-primary">Home</a>
                        <a href="show.php" class="btn btn-primary">Show Data</a>
                    </div>
                </div>
                
                <br>
                <?php
                    if (isset($_GET['success']) == "insert") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Report</strong> added successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                    } 
                ?>
                
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="reportTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Buyer</th>
                                <th>Receipt ID</th>
                                <th>Items</th>
                                <th>Buyer Email</th>
                                <th>Note</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Entry at</th>
                                <th>IP</th>
                                <th>Entry By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $reports = $formObj->showData(); 
                            foreach ($reports as $res) {
                            ?>
                            <tr>
                                <td><?php echo $res['id'] ?></td>
                                <td><?php echo $res['amount'] ?></td>
                                <td><?php echo $res['buyer'] ?></td>
                                <td><?php echo $res['receipt_id'] ?></td>
                                <td><?php echo $res['items'] ?></td>
                                <td><?php echo $res['buyer_email'] ?></td>
                                <td><?php echo $res['note'] ?></td>
                                <td><?php echo $res['city'] ?></td>
                                <td><?php echo $res['phone'] ?></td>
                                <td><?php echo $res['entry_at'] ?></td>
                                <td><?php echo $res['buyer_ip'] ?></td>
                                <td><?php echo $res['entry_by'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <div class="col"></div>
    </div>
</div>
<?php 
include 'footer.php';
?>