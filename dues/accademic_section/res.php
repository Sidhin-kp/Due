<?php
    include '../../db/db_con.php';
    $name=$r=$a=$de=$bt=$lr="";
    $dep=$_GET['key1'];
    $bt=$_GET['key2'];
            
            $sql="select * from `$dep` where batch='$bt'";
            $data=mysqli_query($con,$sql);
            if(!$data)
            {
                echo "<script>alert('failed')</script>";
            }
            else{
                if($dep=="gptc_ct")
                {
                    $class="Computer Engineering";
                    $d1="swlab";
                    $dis1="Software Lab";
                    $d2="hwlab";
                    $dis2="Hardware Lab";
                    $d3="ccf";
                    $dis3="CCF Lab";
                    
                }
                else if($dep=="gptc_che")
                {
                    $class="Computer Hardware Engineering";
                    $d1="swlab";
                    $dis1="Software Lab";
                    $d2="hwlab";
                    $dis2="Hatrdware Lab";
                    $d3="nwlab";
                    $dis3="Network Lab";
                }
                else if($dep=="gptc_el")
            {
                $class="Electroinic Engineering";
                $d1="culab";
                $dis1="Circuit Lab";
                $d2="dglab";
                $dis2="Digital Lab";
                $d3="swlab";
                $dis3="Software Lab";
            }
            else if($dep=="gptc_mech")
            {
                $class="Mechanical Engineering";
                $d1="flulab";
                $dis1="Fluid Lab";
                $d2="helab";
                $dis2="Heat Engine Lab";
                $d3="imslab";
                $dis3="IMS Lab";
                $d4="bmslab";
                $dis4="BME Lab";
            }
            else if($dep=="gptc_civil")
            {
                $class="Civil Engineering";
                $d1="constructionlab";
                $dis1="Construction Lab";
                $d2="coneretelab";
                $dis2="Conerete Lab";
                $d3="geolab";
                $dis3="Geotech Lab";
                $d4="envlab";
                $dis4="ENV Lab";
                $d5="surlab";
                $dis5="Survey Lab";
                $d6="mtlab";
                $dis6="MT Lab";
            }
            }
?>
<html>
    <head>
    <link rel="stylesheet" href="../../resource/des.css">
    <link rel="stylesheet" href="../../resource/style1.css">
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
        <h2> <?php echo $class; ?> - Students due details</h2>
    </div>
   
        <table border="1" style="width:100%; table-layoput:fixed;" >           
            <tr>
                <th>  Name  </th>
                <th>  Register number  </th>
                <th>  Admission number  </th>
                <th>  Department  </th>
                <th>  Batch  </th> 
                <th>  Total amount of due  </th>
                <th>  <?php echo $dis1; ?>  </th>
                <th>  <?php echo $dis2; ?>  </th>
                <th>  <?php echo $dis3; ?>  </th>
                <?php if($dep=="gptc_mech")
                {?>
                    <th>  <?php echo $dis4; ?>  </th>
               <?php }
                else if($dep=="gptc_civil")
                {?>
                    <th>  <?php echo $dis4; ?>  </th>
                    <th>  <?php echo $dis5; ?>  </th>
                    <th>  <?php echo $dis6; ?>  </th>
              <?php  }?>
                <th>  Academic Section  </th>
                <th>  Carpentry  </th>
                <th>  Foundary  </th>
                <th>  Welding  </th>
                <th>  Fitting  </th>
                <th>  Smithy  </th>
                <th>  Sheetmetal  </th>
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
                <td style="background-color:chartreuse;"><?php echo $row["Total"]; ?></td>
                <td>
                    <?php
                        $lb1=$row["$d1"];
                        if(is_null($lb1)){
                            $lb1='NULL';
                        }
                        echo $lb1; 
                    ?>
                </td>
                <td>
                    <?php
                        $lb2=$row["$d2"]; 
                        if(is_null($lb2)){
                            $lb2='NULL';
                        }
                        echo $lb2; 
                    ?>
                </td>
                <td>
                    <?php
                        $lb3=$row["$d3"]; 
                        if(is_null($lb3)){
                            $lb3='NULL';
                        }
                        echo $lb3; 
                    ?>
                </td>     
                <?php if($dep=="gptc_mech")
                {?>
                    <td>
                    <?php
                        $lb4=$row["$d4"]; 
                        if(is_null($lb)){
                            $lb4='NULL';
                        }
                        echo $lb4; 
                    ?>
                </td>     
           <?php     }
                else if($dep=="gptc_civil")
                {?>
                <td>
                    <?php
                        $lb4=$row["$d4"]; 
                        if(is_null($lb4)){
                            $lb4='NULL';
                        }
                        echo $lb4; 
                    ?>
                </td> 
                <td>
                    <?php
                        $lb5=$row["$d5"]; 
                        if(is_null($lb5)){
                            $lb5='NULL';
                        }
                        echo $lb5; 
                    ?>
                </td> 
                <td>
                    <?php
                        $lb6=$row["$d6"]; 
                        if(is_null($lb6)){
                            $lb6='NULL';
                        }
                        echo $lb6; 
                    ?>
                </td> 
           <?php     }?>
                    
                    <td>
                    <?php
                        $l1=$row["academic_section"]; 
                        if(is_null($l1)){
                            $l1='NULL';
                        }
                        echo $l1; 
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
        </table>  
    <a href="academic.php" class="back"  style="width:100px; height:30px; text-align:center;padding: 5px 0px;">back</a>
     </body>
</html>