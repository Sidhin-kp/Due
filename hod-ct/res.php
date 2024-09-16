<?php
    include '../db/db_con.php';
    $no=$_GET['data'];
            
            $sql="select * from `gptc_ct` where regno='$no'";
            $data=mysqli_query($con,$sql);
            if(mysqli_num_rows($data)>0)
            {
                $rows=mysqli_fetch_array($data);
                $name=$rows['name'];
                $r=$rows['regno'];
                $a=$rows['admno'];
                $de=$rows['department'];
                $bt=$rows['batch'];
                $tt=$rows['Total'];
                if($tt<1)
                {
                    $tt="0";
                }
                $sw=$rows['swlab'];
                if(is_null($sw))
                {
                    $sw="NULL";
                }
                $hw=$rows['hwlab'];
                if(is_null($hw))
                {
                    $hw="NULL";
                }
                $ccf=$rows['ccf'];
                if(is_null($ccf))
                {
                    $ccf="NULL";
                }
                $wc=$rows['wks_carpentry'];
                if(is_null($wc))
                {
                    $wc="NULL";
                }
                $wf=$rows['wks_foundary'];
                if(is_null($wf))
                {
                    $wf="NULL";
                }
                $ww=$rows['wks_welding'];
                if(is_null($ww))
                {
                    $ww="NULL";
                }
                $wfi=$rows['wks_fitting'];
                if(is_null($wfi))
                {
                    $wfi="NULL";
                }
                $ws=$rows['wks_smithy'];
                if(is_null($ws))
                {
                    $ws="NULL";
                }
                $wsh=$rows['wks_sheetmetal'];
                if(is_null($wsh))
                {
                    $wsh="NULL";
                }
                $wsh1=$rows['academic_section'];
                if(is_null($wsh1))
                {
                    $wsh1="NULL";
                }
                $li=$rows['library'];
                if(is_null($li))
                {
                    $li="NULL";
                }
                $co=$rows['co-op_socity'];
                if(is_null($co))
                {
                    $co="NULL";
                }
                $pe=$rows['phy_edu'];
                if(is_null($pe))
                {
                    $pe="NULL";
                }
                $ns=$rows['nss'];
                if(is_null($ns))
                {
                    $ns="NULL";
                }
                $ac=$rows['accounts'];
                if(is_null($ac))
                {
                    $ac="NULL";
                }
                $ev=$rows['environmental_lab'];
                if(is_null($ev))
                {
                    $ev="NULL";
                }
                $st=$rows['stfs'];
                if(is_null($st))
                {
                    $st="NULL";
                }
                $pt=$rows['pta'];
                if(is_null($pt))
                {
                    $pt="NULL";
                }
                $td=$rows['total_days'];
                if(is_null($td))
                {
                    $td="NULL";
                }
                $att=$rows['attendence'];
                if(is_null($att))
                {
                    $att="NULL";
                }
                $ld=$rows['last_date'];
                if(is_null($ld))
                {
                    $ld="NULL";
                }
                $ch=$rows['character'];
                if(is_null($ch))
                {
                    $ch="NULL";
                }
            }
?>
<html>
    <head>
    <link rel="stylesheet" href="../resource/des.css">
<link rel="stylesheet" href="../resource/style1.css">
    <style>
        .my{
            text-align: center;
            display: flex;
            justify-content: center;
            margin: auto;
        }
        td{
            padding: 15px;
        }
        caption{
            font-size: 25px;
            color: blue;
        }
        button{
            background-color:red;
            color:white;
        }
        .link1{
        text-decoration: none ;
        color: inherit ;
}
    </style>
    
    </head>
    <body>
        <div class="my">
        <table border="1">
            <caption>Student details</caption>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <?php echo $name; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Reg no
                </td>
                <td>
                    <?php echo $r; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Admission Number
                </td>
                <td>
                    <?php echo $a; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Department
                </td>
                <td>
                    <?php echo $de; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Batch
                </td>
                <td>
                    <?php echo $bt; ?>
                </td>
            </tr>
            <tr>
                <td style="background-color:chartreuse;">
                    Amount of due pending
                </td>
                <td style="background-color:chartreuse;">
                    <?php echo $tt; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Software Lab
                </td>
                <td>
                    <?php echo $sw; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Hardware Lab
                </td>
                <td>
                    <?php echo $hw; ?>
                </td>
            </tr>
            <tr>
                <td>
                    CCF
                </td>
                <td>
                    <?php echo $ccf; ?>
                </td>
            </tr>
            <tr>
            <tr>
                <td>
                    Carpentry
                </td>
                <td>
                    <?php echo $wc; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Foundary
                </td>
                <td>
                    <?php echo $wf; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Welding
                </td>
                <td>
                    <?php echo $ww; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Fitting
                </td>
                <td>
                    <?php echo $wfi; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Smithy
                </td>
                <td>
                    <?php echo $ws; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Sheetmetal
                </td>
                <td>
                    <?php echo $wsh; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Academic Section
                </td>
                <td>
                    <?php echo $wsh1; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Library
                </td>
                <td>
                    <?php echo $li; ?>
                </td>
            </tr>
            <tr>
                <td>
                    co-op society
                </td>
                <td>
                    <?php echo $co; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Physical Education
                </td>
                <td>
                    <?php echo $pe; ?>
                </td>
            </tr>
            <tr>
                <td>
                    NSS
                </td>
                <td>
                    <?php echo $ns; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Accounts
                </td>
                <td>
                    <?php echo $ac; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Environmental Lab
                </td>
                <td>
                    <?php echo $ev; ?>
                </td>
            </tr>
            <tr>
                <td>
                    STFS
                </td>
                <td>
                    <?php echo $st; ?>
                </td>
            </tr>
            <tr>
                <td>
                    PTA
                </td>
                <td>
                    <?php echo $pt; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Total number of working days
                </td>
                <td>
                    <?php echo $td; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Total number of days attendand
                </td>
                <td>
                    <?php echo $att; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Last date of attendance
                </td>
                <td>
                    <?php echo $ld; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Character and Conduct of the student
                </td>
                <td>
                    <?php echo $ch; ?>
                </td>
        </table>
        
    </div>
    
    <a href="search.php" class="back"style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
     </body>
</html>