$(document).ready(function() {

    

    // $('.add-new-item').on('click', function(){
    //     let html = '<div class="input-group form-floating mb-3"> <input type="text" class="form-control" id="items_id" placeholder="Items" name="items"> <label for="items_id">Items</label> <span class="input-group-text add-new-item" id="addon-wrapping" title="Add new items"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16"> <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/> </svg> </span></div>';
    //     $('.new-items').append(html);
    // });

    $('#reportTable').DataTable();

    $.validator.addMethod("letters", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
      }, "Please enter text only."); 

    $.validator.addMethod("emValid", function(value, element)  {

        if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
            return true;
        } else {
            return false;
        }
    }, "Email address is not valid.");

    $.validator.addMethod("bdnumber", function(value, element) {
        return this.optional(element) || /^(?:\+88|88)?(01[3-9]\d{8})$/i.test(value);
      }, "Please enter valid phone no."); 


    $('#phone_id').change(function() {
        let total_length = this.value.length;
 
        if(total_length=='10'){
          $("#phone_id").val("880"+$("#phone_id").val());
        }
        else if(total_length=='11'){
            $("#phone_id").val("88"+$("#phone_id").val());
          }
        else{
           $("#phone_id").val();
        }
    });


    $("#report_form").validate({
      rules: {
        amount : {
          required: true,
          number: true
        },
        buyer : {
            required: true,
            maxlength: 20
        },
        receipt_id : {
            required: true,
            letters: true
        },
        items : {
            required: true,
            letters: true
        },
        buyer_email : {
            required: true,
            email: true,
            emValid: true
        },
        note : {
            required: true,
            maxlength: 30
        },
        city : {
            required: true,
            letters: true
        },
        phone : {
            required: true,
            number: true,
            bdnumber: true
        },
        entry_by : {
            required: true,
            number: true
        }
      },
      messages : {
        amount: {
            required: "Please Enter amount.",
            number: "Please enter numbers Only."
        },
        buyer: {
            required: "Please enter Buyer.",
            maxlength: "Please do not enter more than 20 characters."
        },
        buyer_email: {
            required: "Please enter Buyer Email."
        }, 
        note: {
            required: "Please enter Note.",
            maxlength: "Please do not enter more than 30 words."
        },
      },
      errorElement: "div",
        errorPlacement: function ( error, element ) {
            // Add the `help-block` class to the error element
            error.addClass( "invalid-feedback" );
            error.insertAfter( element );
        },
      highlight: function(element) {
        $(element).removeClass('is-valid').addClass('is-invalid');
      },
      unhighlight: function(element) {
        $(element).removeClass('is-invalid').addClass('is-valid');
      }
    });
  });



