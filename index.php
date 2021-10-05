<?php
    session_start();
    $title= "Report Form";

    include 'header.php';

    if(isset($_POST['submit'])) {
        $formObj->insertData($_POST);
    }
 
?>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <div class="form-title">
                    <h1>Report Form</h1>
                </div>

                <div class="form-menu d-flex justify-content-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="index.php" class="btn btn-primary">Home</a>
                        <a href="show.php" class="btn btn-primary">Show Data</a>
                    </div>
                </div>
                <div class="form-div">
                    <form action="index.php" id="report_form" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="amount_id" placeholder="Amount" name="amount">
                            <label for="amount_id">Amount</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="buyer_id" placeholder="Buyer" name="buyer">
                            <label for="buyer_id">Buyer</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="receipt_id" placeholder="Receipt ID" name="receipt_id">
                            <label for="receipt_id">Receipt ID</label>
                        </div>
                        <!-- <div class="new-items">
                            <div class="input-group form-floating mb-3">
                                <input type="text" class="form-control" id="items_id" placeholder="Items" name="items">
                                <label for="items_id">Items</label>
                                <span class="input-group-text add-new-item" id="addon-wrapping" title="Add new items">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </span>
                            </div>
                        </div> -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="items_id" placeholder="Items" name="items">
                            <label for="items_id">Items</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="buyer_email_id" placeholder="Buyer Email" name="buyer_email">
                            <label for="buyer_email_id">Buyer Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="note" id="note_id" cols="30" rows="10"></textarea>
                            <label for="note_id">Note</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="city_id" placeholder="City" name="city">
                            <label for="city_id">City</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="phone_id" placeholder="Phone" name="phone">
                            <label for="phone_id">Phone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="entry_by_id" value="<?php if(isset($_COOKIE['entry_by'])) echo $_COOKIE['entry_by'];?>" placeholder="Entry By" name="entry_by">
                            <label for="entry_by_id">Entry By</label>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary xp-submit-btn"/>
                        </div>
                    </form>
                </div>
            </div>
        <div class="col"></div>
    </div>
</div>
<?php 
include 'footer.php';
?>