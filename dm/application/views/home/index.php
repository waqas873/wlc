<style type="text/css">
  .all_errors{
    color: red;
  }
  .please_select{
    margin-left: 48px;
  }
  .desc1{
      color:red;
      font-size:14px;
      display:block;
  }
</style>

<?php if($this->session->flashdata('success_message')) { ?>
  <script type="text/javascript">
    $(document).ready(function(){
      swal({
        type: 'success',
        title: 'Success!',
        text: "<?php echo $this->session->flashdata('success_message'); ?>"
      })
    });
  </script>
<?php } ?>
<?php if($this->session->flashdata('error_message')) { ?>
  <script type="text/javascript">
    $(document).ready(function(){
      swal({
        type: 'error',
        title: 'Error!',
        text: "<?php echo $this->session->flashdata('error_message'); ?>"
      })
    });
  </script>
<?php } ?>

<div id="questionBox">
        <form class="form" id="dealform" method="post" action="" novalidate>
          <div class="progress mb-5">
            <div class="progress-bar" id="progressBar" style="width: 0%"></div>
          </div>

          <!-- <div class="tab all_tabs" id="slide1" style="display: block;">
            <div class="row justify-content-center">
              <div class="form-group col-lg-7 col-sm-7  col-12">
                <h2>How much unsecured debt do you have?<span class="desc1">(Must be over £6,000 to qualify)</span>
                </h2>
                <input type="text" id="debt" name="debt" value="7000" />
              </div>
            </div>
          </div> -->

          <div class="tab all_tabs" id="slide1" style="display: block;padding:5px;">
            <div class="row justify-content-center"><h3 style="color:red;text-align:center;">We are not a loan providing service. We offer help and advice for debt help. Please only fill in the following if you need debt assistance. </h3>
              <div class="form-group col-lg-7 col-sm-7  col-12">
                <h2>How much unsecured debt do you have?
                </h2>
                         <ul>
              <li class="col-md-5 col-sm-12  col-xs-12 ul-li">
              <input class="with-font debt_cr" type="radio" id="debt0" value="below" name="debt">
              <label for="debt0">Below £5,000</label>
              </li>
              <li class="col-md-5 col-sm-12  col-xs-12 ul-li">
              <input class="with-font debt_cr" type="radio" id="debt1" value="above" name="debt" checked="checked">
              <label for="debt1">Above £5,000</label>
              </li>

              </ul>
              </div>
            </div>
          </div>
          
          <div class="tab all_tabs" id="slide2" style="display: none;">
            <div class="row justify-content-center">
              <div class="form-group col-lg-7  col-sm-7 col-12" >
              <h2>Have you lived in the UK for 5 years or more?</h2>
              <ul>
<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="livuk0" value="Yes" name="livuk" checked="checked">
<label for="livuk0">Yes</label>
</li>
<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="livuk1" value="No" name="livuk">
<label for="livuk1">No</label>
</li>

</ul>
                       </div>
            
          </div>
          </div>

          <div class="tab all_tabs" id="slide3" style="display: none;">
            <div class="row justify-content-center">
              <div class="form-group col-lg-7  col-sm-7 col-12" >
              <h2>What types of debt do you have?</h2>
                       <ul>
<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="checkbox" id="debttypes0" value="Credit Cards" name="debttypes" checked="checked">
<label for="debttypes0">Credit Cards</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="checkbox" id="debttypes1" value="Payday Loans" name="debttypes">
<label for="debttypes1">Payday Loans</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="checkbox" id="debttypes2" value="Personal Loans" name="debttypes">
<label for="debttypes2">Personal Loans</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="checkbox" id="debttypes3" value="Store Cards" name="debttypes">
<label for="debttypes3">Store Cards</label>
</li>
<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="checkbox" id="debttypes4" value="Overdrafts" name="debttypes">
<label for="debttypes4">Overdrafts</label>
</li>
</ul></div>
            </div>
          </div>

          <div class="tab all_tabs" id="slide4" style="display: none;">
            <div class="row justify-content-center">
              <div class="form-group col-lg-7 col-sm-7  col-12">
              <h2>How many creditors do you have?<span class="desc1">(You must have more than 2 creditors to qualify for a debt solution)</span></h2>
<input type="text" id="creditor" name="creditor" value="7000" />
              </div>
                       </div>
          </div>

            <div class="tab all_tabs" id="slide5" style="display: none;">
            <div class="row justify-content-center">
              <div class="form-group col-lg-7  col-sm-7 col-12" >
              <h2>What is your employment status?<span class="desc1">(You must have an income to Qualify for one of our debt solutions)</span></h2>
                       <ul>
<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="status0" value="Employed" name="status" checked="checked">
<label for="status0">Employed</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="status1" value="Self Employed" name="status">
<label for="status1">Self Employed</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="status2" value="Pension" name="status">
<label for="status2">Pension</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="status3" value="Other" name="status">
<label for="status3">Other</label>
</li>

</ul></div>
            </div>
          </div>

          <div class="tab all_tabs" id="slide6" style="display: none;">
            <div class="row justify-content-center">
              <div class="form-group col-lg-7  col-sm-7 col-12" >
              <h2>Do you have monthly income of £700 or more?<span class="desc1">(You must be able to pay a minimum towards your debts)</span></h2>
               <ul>
<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="answer0" value="Yes" name="income" checked="checked">
<label for="answer0">Yes</label>
</li>
<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="answer1" value="No" name="income">
<label for="answer1">No</label>
</li>

</ul>              </div>
            </div>
          </div>

          <div class="tab all_tabs" id="slide7" style="display:none">
             <div class="row justify-content-center">
              <div class="form-group col-lg-7  col-sm-7 col-12" id="questionBox">
              <h2>Where do you live? 
</h2>
              <ul>
<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="live0" value="England" name="live" checked="checked">
<label for="live0">England</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="live1" value="Wales" name="live">
<label for="live1">Wales</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="live2" value="Scotland" name="live">
<label for="live2">Scotland</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="live3" value="Northern Ireland" name="live">
<label for="live3">Northern Ireland</label>
</li>

</ul>         
</div>
</div>
          </div>

          <div class="tab all_tabs" id="slide8" style="display: none;">
            <div class="row justify-content-center">
            <div class="form-group col-lg-7 col-sm-7  col-12">
                <input name="first_name" required="" type="text" class="first_name form-control hero-input ignoreStep3" placeholder="First Name">
                <div class="all_errors" id="first_name_error"></div>
              </div>
              <div class="form-group col-lg-7  col-sm-7 col-12">
                <input name="last_name" required="" type="text" class="form-control ignoreStep3 last_name" placeholder="Surname">
                 <div class="all_errors" id="last_name_error"></div>
              </div>
              <div class="form-group col-lg-7  col-sm-7 col-12">
                <input type="tel" name="phone_no" class="form-control phone mobile_number" placeholder="Mobile Number">
                <div class="all_errors" id="phone_no_error"></div>
              </div>
              <div class="form-group col-lg-7  col-sm-7 col-12">
                <div class="clearfix"></div>
                <input type="email" name="email" class="form-control nme_inpu email email_input" placeholder="Email Address">
                <div class="all_errors" id="email_error"></div>
              
              <div class="form-group col-lg-7  col-sm-7 col-12" id="questionBox">
              <h3>Preffered time to call you? 
</h3>
<ul>
<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="timecall0" value="9am - 1pm" name="timecall" checked="checked">
<label for="timecall0">9am-1pm</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="timecall1" value="1pm - 5pm" name="timecall">
<label for="timecall1">1pm-5pm</label>
</li>

<li class="col-md-5 col-sm-12  col-xs-12 ul-li">
<input class="with-font" type="radio" id="timecall2" value="5pm - 9pm" name="timecall">
<label for="timecall2">5pm-9pm</label>
</li>
</ul>  
<div class="all_errors please_select" id="privacy_policy_error"></div>
</div>

               
               
              </div>
              
            
                           <div class="input-group mb-3  col-lg-7 col-md-7">

             <ul class="list-client">

<li>
<input class="with-font" type="checkbox" id="answer0x" value="Yes" name="fds_offer">
<label for="answer0x">Please select to agree to be contacted by one of our friendly advisors.<br/>
 </label>
 <div class="all_errors please_select" id="fds_offer_error"></div>
</li>
<li>
<input class="with-font" type="checkbox" id="answer1x" value="Yes" required="" name="privacy_policy">
<label for="answer1x">Please select here to agree to our Privacy Policy.<br/>
</label>
<div class="all_errors please_select" id="privacy_policy_error"></div>
</li>
</ul>
      <span class="desc1">(It might take a second or two once you press continue. Please hold tight)</span>
</div> </div>
          </div>

          <div class="col-lg-7 col-sm-7  col-12 btn-div justify-content-center">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                <!-- <button type="button" id="backStep" class="btn btn-primary btn-lg o-btn">Back</button> -->
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-center">
            
                <i class="lodr but_loader" style="display:none; position: absolute;left: 42%;margin-top: 11px;"> 
                  <img src="assets/images/button-ajax-loader.html">
                </i>
                <button type="submit" style="display: none;" id="submit_btn" class="btn btn-success btn-lg o-btn">Submit</button>
                <h5 class="waiting">Please Wait...</h5>
                <button type="button" id="nextStep" class="btn btn-success btn-lg o-btn nextStep cnt_btn">Continue</button>
              </div>
            </div>
          </div>
                            </form>

          <?php $this->load->view('home/loan');?>

      </div>
      

      
      <div class="debt-ftrs">
    <div class="container ftrs">
      <div class="row">

        <h2>How Can Consumer Care Help You With Your Debt?
</h2>
<p class="debttext">Our debt advisors have helped 1,000’s of people become debt free,<span>
 and can offer you a debt solution to help you write off your unaffordable debts.</span>
</p>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <p style="text-align: center; color: white;">One Affordable<br>
<span class="text-orange">monthly</span>&nbsp;payment</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <p style="text-align: center; color: white;">Write off&nbsp;<span class="text-orange">up to 75%*</span><br>
of your total debt</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <p style="text-align: center; color: white;"><span class="text-orange">Minimise or stop </span><br>
collection calls</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <p style="text-align: center; color: white;">Become&nbsp;<span class="text-orange">debt free</span><br>
in up to 5 years</p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="debt-ftrs2">
    <div class="container ftrs">
              <h2 class="headingnew">According to the terms previously agreed by your creditors</h2>

<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
<h3>What Exactly Is An&nbsp;<span class="text-orange">IVA?</span></h3>

<p>It’s very simple. All you do is make one affordable monthly payment to a qualified legal professional, who in turn distributes the payments according to the amounts previously agreed by your creditors in an IVA proposal.</p>
<p>You do this every month, for 60 months, and at the end of the term any debt balances you still owe are written off. You don’t have to deal with creditors any more, and all the hard work is done for you. And since an IVA is a legally binding agreement, your creditors can’t back out or change the terms after they agree to them.</p>
<h3>What Are&nbsp;<span class="text-orange">The Benefits?</span></h3>
<p>An IVA is often considered to be a great option for people who find themselves in debt.</p>
<p class="text-blue">Here’s why:</p>
<ul class="info__checklist" style="list-style: none;">
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;Have up to 75%* of your unsecured debt legally written off</p>
</li>
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;Substantially reduce your monthly bill payments</p>
</li>
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;Interest and late payment charges are instantly frozen</p>
</li>
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;Creditors are forced to stop all communication with you</p>
</li>
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;You will be completely debt free in just 60 months (this depends on your personal circumstances and applies to debts within the IVA agreement only)</p>
</li>
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;You make just one monthly payment for all of your debts</p>
</li>
</ul>
</div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <img style="width:350px;height:auto;" src="assets/images/Couple-480x722.png" >
    </div>
</div>
</div>
</div>
<div class="container ftrs">
              <h2 class="headingnew">IVA Qualifications</h2>

<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-4">
      <img style="width:350px;height:auto;" src="assets/images/qualify-image.png" >
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8">
<h3>Debts that&nbsp;<span class="text-orange">can be included?</span></h3>

<p>You can include any of the following debts in an IVA:

</p><ul class="info__checklist" style="list-style: none;">
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;Credit Cards</p>
</li>
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;Store Cards</p>
</li>
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;Payday Loans</p>
</li>
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;Overdrafts</p>
</li>
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;Personal Loans</p>
</li>
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;Lines Of Credit</p>
</li>
<li class="info__checklist--item">
<p class="info__content--text info__checklist--text"><i class="fa fa-check text-orange"></i>&nbsp;Catalogues</p>
</li>
</ul>

</div>
    
</div>
</div>

  

<script type="text/javascript">
  
  function progress_bar(num){
    var progress = document.getElementById('progressBar');
    if(num >= 0) {
      progress.style.width = (num*10)+"%";
      progress.innerText = "Progress " + (num*10) + "%";
      if( num ==  0){
        progress.innerText = '';
      }
    }
  }

$(document).ready(function(){
  
  $('.waiting').hide();

  $('#loanform').hide();

  progress_bar(tab);

  $(document).on('click', '#nextStep', function (e) {

    if(tab == 1){
      var debt = $("input[name='debt']:checked").val();
      if(debt=="below"){
        $('#dealform').hide();
        $('.all_errors').empty();
        $('#loanform').fadeIn();
      }
    }

    if(tab < 8){
      if(tab==6 || tab==2){
        var swl_msg;
        if(tab==2){
          var answer = $("input[name='livuk']:checked").val();
          swl_msg = "Sorry at this point we cant help if you have not been Living in UK for five years."
        }
        if(tab==6){
          var answer = $("input[name='income']:checked").val();
          swl_msg = "Sorry at this point we cant help if you don't have a monthly income of £700 or above."
        }
        if(answer=="Yes"){
          tab = tab+1;
          $('.all_tabs').hide();
          $('#slide'+tab).show();
          progress_bar(tab);
        }
        else{
          swal({
           type: 'error',
           title: 'Sorry We Cant Help',
           text: swl_msg
          })
        }
      }
      else{
          tab = tab+1;
          $('.all_tabs').hide();
          $('#slide'+tab).show();
          progress_bar(tab);
      }
    }
    else{
      $('.all_errors').empty();
      $(".cnt_btn").hide();
      $('.waiting').fadeIn();
      $url = base_url + "index.php/home/process_add";
      $.ajax({
          url: $url,
          type: "POST",
          dataType: 'json',
          data: $('#dealform').serializeArray(),
          success: function (data) {
            if(data.response){
              // var progress = document.getElementById('progressBar');
              // progress.style.width = "100%";
              // progress.innerText = "Progress 100%";
              // $('.all_tabs').hide();
              // $('#slide1').show();
              $('#dealform').trigger("reset");
              var redirect = base_url + "home/thank_you";
              window.location.replace(redirect);
              // tab = 1;
              // swal({
              //   type: 'success',
              //   title: 'Success!',
              //   text: "Your request submitted successfully."
              // })
            }
            else{
              $('.waiting').hide();
              $(".cnt_btn").fadeIn();
              $('#first_name_error').html(data.first_name_error);
              $('#last_name_error').html(data.last_name_error);
              $('#email_error').html(data.email_error);
              $('#phone_no_error').html(data.phone_no_error);
              $('#privacy_policy_error').html(data.privacy_policy_error);
              $('#timecall_error').html(data.timecall_error);
              $('#fds_offer_error').html(data.fds_offer_error);
            }
          }
      });
    }
  });

  $(document).on('click', '#backStep', function (e) {
    if(tab > 1){
      tab = tab-1;
      $('.all_tabs').hide();
      $('#slide'+tab).show();
      progress_bar(tab);
      $('#nextStep').show();
      $('#submit_btn').hide();
    }
  });

});
</script>