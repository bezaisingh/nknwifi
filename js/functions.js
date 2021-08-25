// <!-- javascript code for autofill     -->

// 1. Below JS code is for Select box Autofill Starts...
function autofill(){
          var select= document.getElementById("meter_no");
        var sid=  select.options[select.selectedIndex].value;

          //var sid = $(this).val();
				//alert(sid);
                var data_String = 'sid=' + sid;
                $.get('queryFiles/autofill.php', data_String, function(result) {

                    $.each(result, function(){
                        $('#id').val(this.id);
                        $('#meter_no').val(this.meter_no);
                        $('#qtr_no').val(this.qtr_no);
                        $('#fname').val(this.fname +' '+ this.lname) ;
						            $('#lname').val(this.lname);
					              $('#designation').val(this.designation);
						            $('#dept').val(this.dept);
                        $('#mob_no').val(this.mob_no);
						            $('#email').val(this.email);
                        $('#prevReading').val(this.current_reading);
                        $('#arrearAmt').val(this.balance_amt);
					            
                    });
                    //$consumerName= "Bijay";
                });

          //alert(select.options[select.selectedIndex].value);    
}

// Above JS code is for Select box Autofill Ends...



// 2. Below JS code is for Inputbox Autofill Starts..............


        $(document).ready(function () {
            $('#meter_no').keyup(function() {  
                var sid = $(this).val();
				//alert(sid);
                var data_String = 'sid=' + sid;
                $.get('queryFiles/autofill.php', data_String, function(result) {

                    $.each(result, function(){
                        $('#id').val(this.id);
                        $('#meter_no').val(this.meter_no);
                        $('#qtr_no').val(this.qtr_no);
                         $('#fname').val(this.fname +' '+ this.lname) ;
						             $('#lname').val(this.lname);
					            	 $('#designation').val(this.designation);
						             $('#dept').val(this.dept);
                         $('#mob_no').val(this.mob_no);
						             $('#email').val(this.email);
                         $('#prevReading').val(this.current_reading);
                         $('#arrearAmt').value(this.balance_amt);
					            
                    });
                    //$consumerName= "Bijay";
                });
            });
        });

      // Above JS code is for Input box Autofill Ends...

// <!-- javascript code for autofill ends here -->

// ---------------------------------------------------------------------------------------------

// <!-- javascript code for Rate Calculation starts here -->
function calculateTotal()
{
  let unit_price={
    slab1: 5.40,
    slab2: 6.65,
    slab3: 7.65,
    //slab4:7.20   
    fixedCharges: 40 
  };
  let item_price={}

  var total_units=document.getElementById("total_units").value;
 
  if(total_units>120){
    $("#slab1_units").val(120);
  }
  else{
    $("#slab1_units").val(total_units);
  }
  item_price.slab1 = ($("#slab1_units").val() * unit_price.slab1 )
  $("#slab1_price").val(item_price.slab1);


  if (total_units>120 && total_units<240) {
        $("#slab2_units").val(total_units-120);
  } else if(total_units<120) {
        $("#slab2_units").val(0);
  } else {
        $("#slab2_units").val(120);
  }
  item_price.slab2 = ($("#slab2_units").val() * unit_price.slab2 )
  $("#slab2_price").val(item_price.slab2);


  if (total_units>240) {
      $("#slab3_units").val(total_units-240);
  } else {
      $("#slab3_units").val(0);
  }
  item_price.slab3 = ($("#slab3_units").val() * unit_price.slab3 )
  $("#slab3_price").val(item_price.slab3);  
  
  //item_price.slab4 = ($("#slab4_units").val() * unit_price.slab4 )
  //$("#slab4_price").val(item_price.slab4);  
  
  item_price.fixedCharges = ($("#fixedChargesUnits").val() * unit_price.fixedCharges )
  $("#fixedChargesPrice").val(item_price.fixedCharges); 

  let total =  item_price.slab1 +
               item_price.slab2 + 
               item_price.slab3 +
               item_price.fixedCharges; //+ item_price.slab4;

   //$("#total_value").text(total); //For Span 
  $("#total_value").val(total); //for input box

}

// $(function()
//  {
//    
// })

$(function()
 {

  jQuery('.qty').change(calculateTotal, net_Pay_Amt).keyup(calculateTotal, net_Pay_Amt);

   // $(".qty").on("change keyup",calculateTotal) // Original
   // $(".qty").on("keyup change",calculateTotal) // Tried on 12th July 2021 It Works

})

// <!-- javascript code for Rate Calculation ends here -->

// ---------------------------------------------------------------------------------------------


// <!-- javascript code for Difference in Days Calculation starts here -->
function daysDifference() {  
  //define two variables and fetch the input from HTML form  
  var startDate = document.getElementById("startDate").value;  
  var endDate = document.getElementById("endDate").value;  

 //define two date object variables to store the date values  
  var date1 = new Date(startDate);  
  var date2 = new Date(endDate);  

 //calculate time difference  
  var time_difference = date2.getTime() - date1.getTime();  

  //calculate days difference by dividing total milliseconds in a day  
  var result = time_difference / (1000 * 60 * 60 * 24);  

  //alert(result);

  var noOfDays= document.getElementById("noOfDays").value = result + 1;

  //To check No of days from bill period  -->
  // return document.getElementById("result").innerHTML =    
  //      result + " days between both dates. ";  
             }  

// <!-- javascript code for Difference in Days Calculation ends here -->

// ---------------------------------------------------------------------------------------------

// <!-- javascript code for Due Date Calculation starts here -->
function addDays() {

  var days=15;
  var billDate = document.getElementById("billDate").value; 
  var result = new Date(billDate); 
  result.setDate(result.getDate() + days);
  var noTime= result.getDate()+'-'+(result.getMonth()+1)+'-'+result.getFullYear(); 

  
  // var result = new Date(billDate); //today

//  result.setDate(result.getDate() + days);// today

 // alert(noTime) //Disabled on 10July 2021
  document.getElementById("dueDate").value = noTime;

      // return document.getElementById("duedate_test").innerHTML =    
      // result; 
}
// <!-- javascript code for Due Date Calculation ends here -->

// ---------------------------------------------------------------------------------------------

// <!-- javascript code for Net Payable Amount Calculation starts here -->
function net_Pay_Amt()
{
  const totEnergyCharge=parseFloat(document.getElementById("total_value").value); 
  const arrAmt=parseFloat(document.getElementById("arrearAmt").value);

  const net_PayAmt=arrAmt + totEnergyCharge;
  document.getElementById("netPayAmt").value = net_PayAmt;
 // alert(arrAmt);


}

// <!-- javascript code for Net Payable Amount Calculation starts here -->
// ---------------------------------------------------------------------------------------------

// <!-- javascript code for Difference in Reading Calculation starts here -->
function dfferece_in_readings()
{
  var currentReading=document.getElementById("currentReading").value; 
  var prevReading=document.getElementById("prevReading").value;

  var differenceInReading=currentReading - prevReading;
  document.getElementById("diffInReading").value = differenceInReading;
  document.getElementById("unitsConsumed").value = differenceInReading;
  document.getElementById("total_units").value = differenceInReading;

  //alert(differenceInReading);

}
// <!-- javascript code for Difference in Reading Calculation ends here -->
// ---------------------------------------------------------------------------------------------

// <!-- javascript code for Balance Calculation starts here -->

function balanceCalc()
{
  const net_PayAmt=parseFloat(document.getElementById("netPayAmt").value); 
  const installmentAmt=parseFloat(document.getElementById("instAmt").value);

  const balanceAmt=net_PayAmt - installmentAmt;
  document.getElementById("balAmt").value = balanceAmt;

}

$(function()
 {

  jQuery('.dynamic').change(net_Pay_Amt).keyup(net_Pay_Amt);

    $(".qty").on("change keyup",net_Pay_Amt, calculateTotal) // Original
   // $(".qty").on("keyup change",calculateTotal) // Tried on 12th July 2021 It Works

})


// ---------------------------------------------------------------------------------------------

// <!-- javascript code for Phone Number Validation starts here -->
function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    alert("Please enter only Numbers.");
    return false;
  }

  return true;
}

function ValidateNo() {
  var phoneNo = document.getElementById('mobno');

  if (phoneNo.value == "" || phoneNo.value == null) {
    alert("Please enter your Mobile No.");
    return false;
  }
  if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
    alert("Mobile No. is not valid, Please Enter 10 Digit Mobile No.");
    phoneNo.value=null;
    return false;
  }

  // alert("Mobile No is correct ");
  return true;
}

// <!-- javascript code for Phone Number Validation ends here -->
// ---------------------------------------------------------------------------------------------




// <!-- javascript code to fix floating Number upto 2 decimal places Starts here -->
$(document).ready(function () {
  $(".floatNumberField").change(function() {
      $(this).val(parseFloat($(this).val()).toFixed(2));
  });
});
// <!-- javascript code to fix floating Number upto 2 decimal places ends here -->
// ---------------------------------------------------------------------------------------------

function callMultiFunctioins() {
  calculateTotal();
  dfferece_in_readings();
  net_Pay_Amt();
}

