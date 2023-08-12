<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

        <input type="text" name="name" id="name">
        <input type="text" name="email" id="email">
        <input type="submit" id="submit">
        <h1>Enter otp here</h1>
        <input type="text" name="" id="otpveri">
        <input type="submit" id="submit" onclick="otpverify();">

</body>
<script>



document.getElementById("submit").addEventListener("click", function() {
        
        var email = document.getElementById("email").value;
      
          var xhr = new XMLHttpRequest();
          
         xhr.onreadystatechange = function() {
              if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText);
              }
          };
          
          
          xhr.open("GET", "send.php?email=" + email, true);
          xhr.send();
         
          
      });
      














    var getotpcode;
    function getotp(){
        const email = $('#email').val();
        const name = $('#name').val();
        console.log(email);
        var data = {'name':name, 'email':email};
        console.log(data);
        $.ajax({
            type: 'POST',
            url: 'send.php',
            //data: data,
            success: function(datas){
                console.log("this is your otp");
                console.log(datas);
                getotpcode = data;
            }
        })
    }

    function otpverify(){
        var otpveri = $('#otpveri').val();
       document.getElementById('va1').value = otpveri;
       document.getElementById('va2').value = otpveri;
        if(String(getotpcode).trim() === String(otpveri).trim()){
            console.log(otpveri,getotpcode);
            alert("Verification succesdfully");
        }else{
            console.log(otpveri,getotpcode);
            alert("otp not verify");
        }
    }




  function set_guest_coupon(){
    var guest_coupon = jQuery('#guest_coupon').val();
        
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("txtHint").innerHTML = this.responseText;
        coupon_value = this.responseText;
       // coupon_value = this.responseText;
      }
    };
   
  xmlhttp.open("GET", "guest_coupon.php?guest_coupon=" + guest_coupon);
  xmlhttp.send();
  }
</script>
</html>