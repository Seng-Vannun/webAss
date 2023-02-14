<?php
include '../BackEnd/db.php';
if(isset($_POST['input'])){
    $input=$_POST['input'];
    $sqlStudentInformation="select * from tblstudentinfo where StudentID like '{$input}' or NameInLatin like '{$input}%' or NameInKHmer like '{$input}%'";
    $studentInformationQuery=mysqli_query($conn,$sqlStudentInformation);
    $sqlSex="select * from tblsex";
    $resultSex=mysqli_query($conn,$sqlSex);
    $sqlProgram="select * from tblprogram";
    $resultProgram=mysqli_query($conn,$sqlProgram);
    $sqlMajor="select * from tblmajor";
    $resultMajor=mysqli_query($conn,$sqlMajor);
    $sqlCampus = "Select *From tblCampus";
    $CampusQuery = mysqli_query($conn, $sqlCampus);
    $sqlYear = "Select *From tblyear";
    $YearQuery = mysqli_query($conn, $sqlYear);
    $sqlSemester = "Select *From tblsemester";
    $SemesterQuery = mysqli_query($conn, $sqlSemester);
    $sqlShift = "Select *From tblshift";
    $ShiftQuery = mysqli_query($conn, $sqlShift);
    $sqlStudentStatus="Select *From tblstudentstatus";
    $StudentStatusQuery=mysqli_query($conn,$sqlStudentStatus);
    $Student_Array=array();
    $Sex_array=array();
    $Major_array=array();
    $Program_array=array();
    $Campus_array=array();
    $Year_array=array();
    $Semester_array=array();
    $Shift_array=array();
    $StudentStatus_array=array();
    while($StudentRow=mysqli_fetch_assoc($studentInformationQuery)){
        $Student_Array[]=$StudentRow;
    }
    while($sex=mysqli_fetch_assoc($resultSex)){
        $Sex_array[]=$sex;
    }
    while($Major=mysqli_fetch_assoc($resultMajor)){
        $Major_array[]=$Major;
    }
    while($Program=mysqli_fetch_assoc($resultProgram)){
        $Program_array[]=$Program;
    }
    while($Campus=mysqli_fetch_assoc($CampusQuery)){
        $Campus_array[]=$Campus;
    }
    while($Year=mysqli_fetch_assoc($YearQuery)){
        $Year_array[]=$Year;
    }
    while($Semester=mysqli_fetch_assoc($SemesterQuery)){
        $Semester_array[]=$Semester;
    }
    while($Shift=mysqli_fetch_assoc($ShiftQuery)){
        $Shift_array[]=$Shift;
    }
    while($StudentStatus=mysqli_fetch_assoc($StudentStatusQuery)){
        $StudentStatus_array[]=$StudentStatus;
    }
        foreach($Student_Array as $StudentRow){
            if($StudentRow['StudentID']>0){
            $studentID=$StudentRow['StudentID'];
            $sexID=$StudentRow['SexID'];
            $YearId=null;
            $semesterId=null;
            $majorId=null;
            $shiftId=null;
            $campusId=null;
            $statusID=null;
            $disableID=null;
            foreach ($StudentStatus_array as $StudentStatus){
            $studentStatusID=$StudentStatus['StudentStatusID'];
                if($studentID==$studentStatusID)
                {
                $statusID=$StudentStatus['statusID'];
                $disableID=['StudentStatusID'];
                }
            }
            foreach ($Program_array as $Program)
            {
                $programID = $Program['ProgramID'];
                if ($studentID==$programID)
                {
                    $YearId = $Program['YearID'];
                    $semesterId = $Program['SemesterID'];
                    $majorId = $Program['MajorID'];
                    $shiftId = $Program['ShiftID'];
                    $campusId = $Program['CampusID'];
                }
            }
            ?>
            <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $StudentRow['StudentID']?></strong></td><!--id-->
                <td><?php echo $StudentRow['NameInLatin']?></td>
                <td><?php echo $StudentRow['NameInKHmer']?></td>
                <td><?php foreach ($Sex_array as $sex){$sexShow=$sex['SexID'];
                        if($sexShow==$sexID){echo $sex['SexEN'];}} ?>
                </td><!-- Sex-->
                <td><?php echo $StudentRow['PhoneNumber']?></td>
                <td>
                    <?php foreach ($Year_array as $Year){$YearShow=$Year['YearID'];
                        if($YearShow==$YearId){echo $Year['Year'];}} ?>
                </td> <!--year-->
                <td>
                    <?php foreach ($Semester_array as $Semester){$SemesterShow=$Semester['SemesterID'];
                        if($semesterId==$SemesterShow){echo $Semester['SemesterEN'];}} ?>
                </td> <!--semester-->
                <td>
                    <?php foreach ($Major_array as $Major){$MajorShow=$Major['MajorID'];
                        if($majorId==$MajorShow){echo $Major['MajorEN'];}} ?>
                </td> <!--Major-->
                <td>
                    <?php foreach ($Shift_array as $shift){$shiftShow=$shift['ShiftID'];
                        if($shiftId==$shiftShow){echo $shift['ShiftEN'];}} ?>
                </td> <!--shift-->
                <td>
                    <?php foreach ($Campus_array as $Campus){$CampusShow=$Campus['CampusID'];
                        if($campusId==$CampusShow){echo $Campus['CampusEN'];}} ?>
                </td> <!--Campus-->
                <td>
                    <?php if(1==$statusID){echo $StatusShow='<span class="badge rounded-pill bg-label-success">Active</span>';}
                    elseif(null==$statusID){echo $StatusShow='<span class="badge rounded-pill bg-label-warning">Pending</span>';}
                    elseif(2==$statusID){echo $StatusShow='<span class="badge rounded-pill bg-label-warning">Pending</span>';}
                    elseif(3==$statusID){echo$StatusShow='<span class="badge rounded-pill bg-label-danger">Disable</span>';}
                    ?>
                </td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-1"></i> ViewFull Information</a
                            >
                            <a class="dropdown-item" href="../FrontEnd/ViewInformation.php?EditID=<?php echo $StudentRow['StudentID']?>"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <a class="dropdown-item" href="../BackEnd/Disable.php?DisableID=<?php echo $StudentRow['StudentID']?>"
                            ><i class="bx bx-trash me-1"></i> Delete</a
                            >
                        </div>
                    </div>
                </td>
            </tr>
     <?php
        }else
            {
                echo "<td></i> <strong><h6 class='text-danger text-center mt-3'>NO DATA FOUND</h6></strong></td><!--id-->";
            }
    }
}
