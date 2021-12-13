<style type="text/css">
  .loan_heading{
    text-align: center;
    margin-bottom: 50px;
  }
</style>
<form class="form" id="loanform" method="post" action="" novalidate>
          
          <h3 class="loan_heading">If your debt level is below £5,000 we can’t help with a debt solution but can help you with a consolidation solution.</h3>
         
          <div class="tab" id="loanslide">
            <div class="row justify-content-center">
            <div class="form-group col-lg-7 col-sm-7  col-12">
                <input name="first_name" required="" type="text" class="name form-control hero-input ignoreStep3" placeholder="Name">
                <div class="all_errors" id="first_name_error2"></div>
              </div>
              <div class="form-group col-lg-7  col-sm-7 col-12">
                <input type="tel" name="phone_no" class="form-control phone mobile_number" placeholder="Mobile Number">
                <div class="all_errors" id="phone_no_error2"></div>
              </div>
              <div class="form-group col-lg-7  col-sm-7 col-12">
                <div class="clearfix"></div>
                <input type="email" name="email" class="form-control email email_input" placeholder="Email Address">
                <div class="all_errors" id="email_error2"></div>
              </div>
              <div class="form-group col-lg-7  col-sm-7 col-12">
                <div class="clearfix"></div>
                <input type="number" name="loan_amount" class="form-control email" placeholder="What is your current debt level">
                <div class="all_errors" id="loan_amount_error"></div>
              </div>
              
              <div class="form-group col-lg-7  col-sm-7 col-12">
              <h3>Preffered time to call you? 
</h3>
<ul>
<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="timecall02" value="9am - 1pm" name="timecall" checked="checked">
<label for="timecall02">9am-1pm</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="timecall12" value="1pm - 5pm" name="timecall">
<label for="timecall12">1pm-5pm</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="timecall22" value="5pm - 9pm" name="timecall">
<label for="timecall22">5pm-9pm</label>
</li>
</ul>
</div>

               
               
              
              
            
                            </div>
          </div>

          <div class="col-lg-7 col-sm-7  col-12 btn-div justify-content-center">
            <div class="row justify-content-center">
              <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center" style="text-align: right !important;">
            
                <i class="lodr but_loader" style="display:none; position: absolute;left: 42%;margin-top: 11px;"> 
                  <img src="assets/images/button-ajax-loader.html">
                </i>
                <button type="button" id="back_btn" class="btn btn-info o-btn">Back</button>
                <h5 class="waiting">Please Wait...</h5>
                <button type="button" id="loan_submit_btn" class="btn btn-success o-btn">Submit</button>
              </div>
            </div>
          </div>
                            </form>

<script type="text/javascript">

var tab = 1;

$(document).ready(function(){

  $(document).on('click', '#loan_submit_btn', function (e) {
      $('.all_errors').empty();
      $("#loan_submit_btn").hide();
      $('.waiting').fadeIn();
      $url = base_url + "home/process_add_loan";
      $.ajax({
          url: $url,
          type: "POST",
          dataType: 'json',
          data: $('#loanform').serializeArray(),
          success: function (data) {
            if(data.response){
              $('#loanform').trigger("reset");
              swal({
                type: 'success',
                title: 'Success!',
                text: 'Your request has been submitted successfully.'
              })
            }
            else{
              $('#first_name_error2').html(data.first_name_error);
              $('#email_error2').html(data.email_error);
              $('#phone_no_error2').html(data.phone_no_error);
              $('#loan_amount_error').html(data.loan_amount_error);
            }
            $('.waiting').hide();
            $("#loan_submit_btn").fadeIn();
          }
      });
  });

  $(document).on('click', '#back_btn', function (e){
    tab = 1;
    $('#loanform').hide();
    $('#dealform').fadeIn();
    $('.all_tabs').hide();
    $('#slide1').fadeIn();
  });

});
</script>