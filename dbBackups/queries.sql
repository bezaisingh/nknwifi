SELECT *, ROW_NUMBER() OVER (ORDER BY id DESC) AS SrNo FROM student_user JOIN data_uploads WHERE student_user.enrollNo = data_uploads.enrollNo  AND isApproved =0;

SET @count=0;
  SELECT *, ( @count:=@count+1) AS serial_number FROM `student_user` JOIN data_uploads WHERE 
    student_user.enrollNo = data_uploads.enrollNo  AND isApproved =0
    
  SELECT *, (@cnt := IF(@cnt IS NULL, 0,  @cnt) + 1) AS serial_number FROM `student_user` JOIN data_uploads WHERE 
    student_user.enrollNo = data_uploads.enrollNo  AND isApproved =0;    
    
    