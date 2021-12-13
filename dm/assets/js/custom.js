  var isEmail =false
  var isPhone =false
  var ip_Address = '';

  $.getJSON('https://ipapi.co/json/', function(data) {
    if (data != null && data.ip != undefined && typeof (data.ip) == "string") {
      ip_Address = data.ip;
    }
  });


  window.onload = function onPageLoad() {
    document.getElementsByName("first_name")[0].value = getUrlParameter("firstname") || "";
   document.getElementsByName("last_name")[0].value = getUrlParameter("lastname")  || "";
   document.getElementsByName("email")[0].value = getUrlParameter("email")  || "";
   document.getElementsByName("telephone")[0].value = getUrlParameter("phone1")  || "";
  }

   var currentTab = 0; // Current tab is set to be the first tab (0)
  var sdsa = 3123
  showTab(currentTab); // Display the current tab
  formValidation = {}
 


  function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    fixStepIndicator(n)
  }

  $(function(){
    validate()
  })

  function backStep(n){
    if (currentTab > 0) {
      $('.nextStep').prop('disabled', false);
      var x = document.getElementsByClassName("tab");
      x[currentTab].style.display = "none";
      currentTab = currentTab + n;
      showTab(currentTab);
    }
  }
  
  function nextStep(n) {
    console.log("currentTab is");
    $('#dealform').parsley().whenValidate({
      group: 'block-' + currentTab
    }).done(function() {
    
        var x = document.getElementsByClassName("tab");
      x[currentTab].style.display = "none";
      currentTab = currentTab + n;

      if (currentTab >= x.length) {
       
        if (anOtherValidate() == true && isPhone == true && isEmail == true){
                 postData()
        }else{
          $('#dealform').parsley().validate()
        }
        return true
      }
      showTab(currentTab);
    })
  }
  function anOtherValidate(){
    
    if (document.getElementsByClassName('first_name')[0].value.length < 1 
        || document.getElementsByClassName('last_name')[0].value.length < 1 
    )
    {
      var x = document.getElementsByClassName("tab");
      x[0].style.display = "block";
      x[1].style.display = "none";
      x[2].style.display = "none";
      x[3].style.display = "none";
      x[4].style.display = "none";
      x[5].style.display = "none";
      x[6].style.display = "none";
      currentTab = 0
      $('#dealform').parsley().validate()
      return false
    }else if(currentTab===0){
      var x = document.getElementsByClassName("tab");
      x[1].style.display = "block";
      x[0].style.display = "none";
      x[2].style.display = "none";
      x[3].style.display = "none";
      x[4].style.display = "none";
      x[5].style.display = "none";
      x[6].style.display = "none";
      

      currentTab = 1
      $('#dealform').parsley().validate()
      return false
    }

else if( currentTab===1){
      var x = document.getElementsByClassName("tab");
      x[2].style.display = "block";
      x[1].style.display = "none";
      x[0].style.display = "none";
      x[3].style.display = "none";
      x[4].style.display = "none";
      x[5].style.display = "none";
      x[6].style.display = "none";
      
      currentTab = 2
      $('#dealform').parsley().validate()
      return false
    }
    else if( currentTab===2){
      var x = document.getElementsByClassName("tab");
      x[3].style.display = "block";
      x[1].style.display = "none";
      x[0].style.display = "none";
      x[2].style.display = "none";
      x[4].style.display = "none";
      x[5].style.display = "none";
      x[6].style.display = "none";
      
      currentTab = 3
      $('#dealform').parsley().validate()
      return false
    }
    else if( currentTab===3){
      var x = document.getElementsByClassName("tab");
      x[4].style.display = "block";
      x[1].style.display = "none";
      x[0].style.display = "none";
      x[3].style.display = "none";
      x[2].style.display = "none";
      x[5].style.display = "none";
      x[6].style.display = "none";
      
      currentTab = 4
      $('#dealform').parsley().validate()
      return false
    }
    else if( currentTab===4){
      var x = document.getElementsByClassName("tab");
      x[5].style.display = "block";
      x[1].style.display = "none";
      x[0].style.display = "none";
      x[3].style.display = "none";
      x[4].style.display = "none";
      x[2].style.display = "none";
      x[6].style.display = "none";
      
      currentTab = 5
      $('#dealform').parsley().validate()
      return false
    }
else if(document.getElementsByClassName('email')[0].value.length < 6 
      || document.getElementsByClassName('phone')[0].value.length < 6){
      var x = document.getElementsByClassName("tab");
      x[6].style.display = "block";
      x[0].style.display = "none";
      x[1].style.display = "none";
      x[2].style.display = "none";
      x[3].style.display = "none";
      x[5].style.display = "none";
      x[6].style.display = "none";
      
      currentTab = 6
      $('#dealform').parsley().validate()
      return false
    }
    
      return true
  }
  function validate(){
    formValidation = $('#dealform').parsley({
        trigger: "focusout",
        errorClass: 'error',
        successClass: 'valid',
        errorsWrapper: '<div class="parsley-error-list"></div>',
        errorTemplate: '<label class="error"></label>',
        errorsContainer (field) {
          if(field.$element.hasClass('approve')){
            return $('.error-checkbox')
          }
          return field.$element.parent()
        },
     })


    window.ParsleyValidator.addValidator('validemail', {
      validateString: function(value){
        var xhr = $.ajax(''+$('.email').val())
        return xhr.then(function(json) {
             console.log(json);
          if (json.status == "Valid") {
            isEmail = true
            return true
          }else{
            return $.Deferred().reject("Please Enter Valid Email Address");
          }
        })
      },
      messages: {
         en: 'Please Enter Valid Email Address',
      }
    });
    window.ParsleyValidator.addValidator('validphone', {
      validateString: function(value){
        var xhr = $.ajax(''+$('.phone').val())
        return xhr.then(function(json) {
                          console.log(json);

          if (json.status == "Valid") {
            isPhone = true
            return true
          }else{
            return $.Deferred().reject("Please Enter Valid UK Phone Number");
          }
        })
      },
      messages: {
         en: 'Please Enter Valid UK Phone Number',
      }
    });
      
    window.ParsleyValidator.addValidator('validPostcode', {
      validateString: function(value){
       return /([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([A-Za-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9][A-Za-z]?))))\s?[0-9][A-Za-z]{2})/i.test(value);
      },
      messages: {
         en: 'Please Enter Valid UK Postcode',
      }
    });
  }
   
  function fixStepIndicator(num) {
    var progress = document.getElementById('progressBar');
    if(num >= 0) {
      progress.style.width = (num*15)+"%";
      progress.innerText = "Progress " + (num*15) + "%";
      if( num ==  0){
        progress.innerText = '';
      }
    }
  }
  function getData() {
    var customer_type = isBadCustomer( getUrlParameter('keyword')) || (getUrlParameter('bc') == "yes");
      var e = JSON.parse(localStorage.getItem("parameters"))
        console.log(ip_Address);

        return  n = {
          firstname: $(".first_name").val(),
          lastname: $(".last_name").val(),
          email: $(".email").val(),
          phone1: $(".phone").val(),
    debt:$("#debt").val(),
         income:  $("input[name='income']:checked"). val(),    status:  $("input[name='status']:checked"). val(),
source: getUrlParameter('source') || '',
          c1: getUrlParameter('c1') || '',
          parameters: e
      };
      // localStorage.setItem("data", JSON.stringify(n))
  }
  function postData() {
      var e = getData();
      e['before_send'] = JSON.stringify(getData());
      console.log(e)
      $.ajax({
          type: "POST",
          url: "",
          data: e,
          success: function(e) {
              console.log(e),
             currentTab = 0;
              setTimeout(function(){
                           window.location = "thankyou.html";
                          }, 200);
          },
          dataType: "json"
      })
  }

  function getUrlParameter(sParam) {
      var sPageURL = window.location.search.substring(1),
          sURLVariables = sPageURL.split('&'),
          sParameterName,
          i;

      for (i = 0; i < sURLVariables.length; i++) {
          sParameterName = sURLVariables[i].split('=');

          if (sParameterName[0] === sParam) {
              return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
          }
      }
  };
  function getFormattedCurrentDate() {
    var date = new Date();

    var day = addZero(date.getDate());
    var monthIndex = addZero(date.getMonth() + 1);
    var year = date.getFullYear();
    var min = addZero(date.getMinutes());
    var hr = addZero(date.getHours());
    var ss = addZero(date.getSeconds());

    return day + '/' + monthIndex + '/' + year + ' ' + hr + ':' + min + ':' + ss;
  }

  function addZero(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
  }

  function isBadCustomer(query) { 
    if(query){
      var keywords = ["credit", "accepted", "bad", "score", "sunshine"];
      query = query.toLowerCase();

      for(var index in keywords) {
        var word = keywords[index];
        var matchedIndex = query.indexOf(word);
        if (matchedIndex != -1) {
          return true;
          break;
        }
      }
      return false;
    }
  }
  
  function check()
  {
      if($("input[name='income']:checked"))
      {
          nextStep(1);
      }
  }
 function check2()
  {
      if($("input[name='status']:checked"))
      {
          nextStep(1);
      }
  }
 function check2()
  {
      if($("input[name='debttypes']:checked"))
      {
          nextStep(1);
      }
  }
   function check2()
  {
      if($("input[name='live']:checked"))
      {
          nextStep(1);
      }
  }
   