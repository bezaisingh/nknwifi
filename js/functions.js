
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

function hideshow_contractual(){
  $(document).ready(function() {
    $("div.contractualll").hide();
    $('input[name$="staff_type"]').click(function() {

        var staffType = $(this).val();
        $("div.contractualll").hide();
        $("#" + staffType).show();               
    });
});
}

//Block Special Characters
function checkSpcialChar(event){
  if(!((event.keyCode >= 65) && (event.keyCode <= 90) || 
       (event.keyCode >= 97) && (event.keyCode <= 122) ||                  
       (event.keyCode > 31)  && (event.keyCode < 33) )){
     event.returnValue = false;
     return;
  }
  event.returnValue = true;
}
//Block Special Characters ends

//for popupform starts
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
//for popupform ends
