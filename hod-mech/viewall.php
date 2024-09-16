<?php
    include '../db/db_con.php';
    $bt=$_GET['data'];
       
            $sql="select * from `gptc_mech` where batch='$bt'";
            $data=mysqli_query($con,$sql);
            
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
    </style>
    </head>
    <body>
        
        <div class="my">
        <h2> <?php echo $bt ?>- Students details</h2>
    </div>
   
        <table border="1" >           
            <tr>
                <th>  Name  </th>
                <th>  Register number  </th>
                <th>  Admission number  </th>
                <th>  Department  </th>
                <th>  Batch  </th> 
                <th>  Total amount of due pending  </th>
                <th>  Fluid lab  </th>
                <th>  Heat Engine lab  </th>
                <th>  IMS Lab  </th>
                <th>  BME Lab  </th>
                <th>  Carpentry  </th>
                <th>  Foundary  </th>
                <th>  Welding  </th>
                <th>  Fitting  </th>
                <th>  Smithy  </th>
                <th>  Sheetmetal  </th>
                <th>  Academic Section  </th>
                <th>  library  </th>
                <th>  co-op society  </th>
                <th>  physical education  </th>
                <th>  NSS  </th>
                <th>  accounts  </th>
                <th>  environmental lab  </th>
                <th>  stfs  </th>
                <th>  pta  </th>
                <th>  total days  </th>
                <th>  attendance  </th>
                <th>  last date  </th>
                <th>  character  </th>               
            </tr>
            <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <tr>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["regno"]; ?></td>
                <td><?php echo $row["admno"]; ?></td>
                <td><?php echo $row["department"]; ?></td>
                <td><?php echo $row["batch"]; ?></td>
                <td style="background-color:chartreuse;"><?php
                        $tl=$row["Total"];
                        if(is_null($tl)){
                            $tl="0";
                        }
                        echo $tl; 
                    ?></td>
                <td>
                    <?php
                        $lb1=$row["flulab"];
                        if(is_null($lb1)){
                            $lb1='NULL';
                        }
                        echo $lb1; 
                    ?>
                </td>
                <td>
                    <?php
                        $lb2=$row["helab"]; 
                        if(is_null($lb2)){
                            $lb2='NULL';
                        }
                        echo $lb2; 
                    ?>
                </td>
                <td>
                    <?php
                        $lb3=$row["imslab"]; 
                        if(is_null($lb3)){
                            $lb3='NULL';
                        }
                        echo $lb3; 
                    ?>
                </td>   
                <td>
                    <?php
                        $lb31=$row["bmslab"]; 
                        if(is_null($lb31)){
                            $lb3='NULL';
                        }
                        echo $lb31; 
                    ?>
                </td> 
                <td>
                    <?php
                        $l1=$row["wks_carpentry"]; 
                        if(is_null($l1)){
                            $l1='NULL';
                        }
                        echo $l1; 
                    ?>
                </td>
                <td>
                    <?php
                        $l2=$row["wks_foundary"]; 
                        if(is_null($l2)){
                            $l2='NULL';
                        }
                        echo $l2; 
                    ?>
                </td>
                <td>
                    <?php
                        $l3=$row["wks_welding"]; 
                        if(is_null($l3)){
                            $l3='NULL';
                        }
                        echo $l3; 
                    ?>
                </td>
                <td>
                    <?php
                        $l4=$row["wks_fitting"]; 
                        if(is_null($l4)){
                            $l4='NULL';
                        }
                        echo $l4; 
                    ?>
                </td>
                <td>
                    <?php
                        $l5=$row["wks_smithy"]; 
                        if(is_null($l5)){
                            $l5='NULL';
                        }
                        echo $l5; 
                    ?>
                </td>
                <td>
                    <?php
                        $l6=$row["wks_sheetmetal"]; 
                        if(is_null($l6)){
                            $l6='NULL';
                        }
                        echo $l6; 
                    ?>
                </td>      
                <td>
                    <?php
                        $l61=$row["academic_section"]; 
                        if(is_null($l61)){
                            $l61='NULL';
                        }
                        echo $l61; 
                    ?>
                </td>  
            <td>
                    <?php
                        $lbb=$row["library"]; 
                        if(is_null($lbb)){
                            $lbb='NULL';
                        }
                        echo $lbb; 
                    ?>
                </td>
                <td>
                    <?php
                        $cp=$row["co-op_socity"]; 
                        if(is_null($cp)){
                            $cp='NULL';
                        }
                        echo $cp; 
                    ?>
                </td>
                <td>
                    <?php
                        $py=$row["phy_edu"]; 
                        if(is_null($py)){
                            $py='NULL';
                        }
                        echo $py; 
                    ?>
                </td>
                <td>
                <?php
                        $ns=$row["nss"]; 
                        if(is_null($ns)){
                            $ns='NULL';
                        }
                        echo $ns; 
                    ?>
                </td>
                <td>
                    <?php
                        $ac=$row["accounts"]; 
                        if(is_null($ac)){
                            $ac='NULL';
                        }
                        echo $ac; 
                    ?>
                </td>
                <td>
                    <?php
                        $ev=$row["environmental_lab"]; 
                        if(is_null($ev)){
                            $ev='NULL';
                        }
                        echo $ev; 
                    ?>
                </td>
                <td>
                    <?php
                        $st=$row["stfs"]; 
                        if(is_null($st)){
                            $st='NULL';
                        }
                        echo $st; 
                    ?>
                </td>
                
            <td>
                    <?php
                        $pt=$row["pta"]; 
                        if(is_null($pt)){
                            $pt='NULL';
                        }
                        echo $pt; 
                    ?>
                </td>
                <td>
                    <?php
                        $td=$row["total_days"]; 
                        if(is_null($td)){
                            $td='NULL';
                        }
                        echo $td; 
                    ?>
                </td>
                <td>
                    <?php
                        $at=$row["attendence"]; 
                        if(is_null($at)){
                            $at='NULL';
                        }
                        echo $at; 
                    ?>
                </td>
                <td>
                <?php
                        $ld=$row["last_date"]; 
                        if(is_null($ld)){
                            $ld='NULL';
                        }
                        echo $ld; 
                    ?>
                </td>
                <td>
                <?php
                        $ch=$row["character"]; 
                        if(is_null($ch)){
                            $ch='NULL';
                        }
                        echo $ch; 
                    ?>
                </td>
            </tr>
            <?php } ?>          
        </table><br>
        
        <div class="due">
        Total amount of due collected from batch-<?php echo $bt ?> is :
        <?php 
            $qry="SELECT SUM(collection) as total FROM mechdue where batch='$bt'";
            $re=mysqli_query($con,$qry);
            $row=mysqli_fetch_array($re);
            $count=$row['total'];
            echo $count;
        ?>
        </div>
        <br>
    <a href="hod.php" class="back"style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
     </body>
</html>