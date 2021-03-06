<?php
    /* To connect to db */
    include ("../config/dbConfig.php");

$from=$_POST['export-from'];;
$to=$_POST['export-to'];


 ////////////////////////////// Export Part Starts for Approved Staffs ///////////////////////



 if(isset($_POST["Export-Approved-Staff"])){
     

    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=staff-data.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('Sr No',
                                'ID', 
                                'Campus', 
                                'Staff Id', 
                                'First Name', 
                                'Last Name', 
                                'Father Name', 
                                'Gender', 
                                'Email', 
                                'Mobile No', 
                                'Address', 
                                'Date of Birth', 
                                'Department', 
                                'Designation',
                                'Joining Date', 
                                'Is Permanent', 
                                'Contract End Date', 
                                'Applied On', 
                                'Approved on' ));  
    // $query = "SELECT id, campus, enrollNo,firstName,lastName FROM student_user ORDER BY id DESC";  
    // $result = mysqli_query($conn, $query);  

    if(empty($from) || empty($to) ){
                    $sql="SELECT   @ab:=@ab+1 AS SrNo,   
                            id,
                            campus,
                            staffId,
                            firstName,
                            lastName,
                            fatherName,
                            gender,
                            email,
                            mobNo,
                            address,
                            dob,
                            department,
                            designation,
                            joiningDate,
                            isPermanent,
                            contractEndDate,
                            appliedOn,
                            approvedOn 
                            FROM staff_user, (SELECT @ab:= 0)
                            AS ab where isApproved =1";

                $sqli_run=mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($sqli_run))  
                {  
                fputcsv($output, $row);  
                }  
                fclose($output);  
    }else{
                $sql="SELECT @ab:=@ab+1 AS SrNo,
                                id,
                                campus,
                                staffId,
                                firstName,
                                lastName,
                                fatherName,
                                gender,
                                email,
                                mobNo,
                                address,
                                dob,
                                department,
                                designation,
                                joiningDate,
                                isPermanent,
                                contractEndDate,
                                appliedOn,
                                approvedOn     
                FROM staff_user, (SELECT @ab:= 0)
                AS ab WHERE approvedOn between '$from' and '$to'";

            $sqli_run=mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($sqli_run))  
            {  
            fputcsv($output, $row);  
            }  
            fclose($output); 
    }

 
}  

 ////////////////////////////// Export Part Ends for Approved Staffs ///////////////////////




  ////////////////////////////// Export Part Starts for Approved Students ///////////////////////
  if(isset($_POST["Export-Approved-Students"])){
     
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=student-data.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('Sr No',
                                'ID', 
                                'Campus', 
                                'Enroll No', 
                                'First Name', 
                                'Last Name', 
                                'Father Name', 
                                'Gender', 
                                'Email', 
                                'Mobile No', 
                                'Address', 
                                'Date of Birth', 
                                'Department', 
                                'Course Name', 
                                'Expected Year of Completion', 
                                'Semester', 
                                'Hostel No', 
                                'Applied On', 
                                'Approved on' ));  
    // $query = "SELECT id, campus, enrollNo,firstName,lastName FROM student_user ORDER BY id DESC";  
    // $result = mysqli_query($conn, $query);  

    if(empty($from) || empty($to) ){
                    $sql="SELECT @ab:=@ab+1 AS SrNo,
                    id,
                    campus,
                    enrollNo,
                    firstName,
                    lastName,
                    fatherName,
                    gender,
                    email,
                    mobNo,
                    address,
                    dob,
                    department,
                    courseName,
                    yearOfCompletion,
                    semester,
                    hostelNo,
                    appliedOn,
                    approvedOn            
                FROM student_user, (SELECT @ab:= 0)
                AS ab WHERE isApproved =1";

            $sqli_run=mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($sqli_run))  
            {  
            fputcsv($output, $row);  
            }  
            fclose($output); 
                }  
                else{
                    $sql="SELECT @ab:=@ab+1 AS SrNo,
                    id,
                    campus,
                    enrollNo,
                    firstName,
                    lastName,
                    fatherName,
                    gender,
                    email,
                    mobNo,
                    address,
                    dob,
                    department,
                    courseName,
                    yearOfCompletion,
                    semester,
                    hostelNo,
                    appliedOn,
                    approvedOn            
                FROM student_user, (SELECT @ab:= 0) AS ab 
                WHERE approvedOn between '$from' and '$to'";

            $sqli_run=mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($sqli_run))  
            {  
            fputcsv($output, $row);  
            }  
            fclose($output); 

                }
}  

 ////////////////////////////// Export Part Ends for Approved Students ///////////////////////

?>