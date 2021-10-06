$(document).ready(function() {

      let max_fields = 10; 

      let i = 1; 
      
      $('.add-new-item').click(function(e){ 
          e.preventDefault();
          if(i < max_fields){ 
              i++;
              let html = '<div class="input-group mb-3"><div class="form-floating form-floating-group flex-grow-1"> <input type="text" class="form-control" id="items_id" placeholder="Items" name="items[]"> <label for="items_id">Items</label></div> <span class="input-group-text remove-item" id="addon-wrapping" title="Remove items"> <i class="fas fa-times"></i> </span></div>';
              $('.new-items').append(html);
          }
      });

       $('.new-items').on("click",".remove-item", function(e){ 
           e.preventDefault(); 
           $(this).parent('div').remove(); 
           i--;
       })

  



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

    $('#items_id').each(function() {
      $(this).rules('add', {
          required: true,
          letters: true
      });
  });

  });



