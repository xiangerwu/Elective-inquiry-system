<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="images/momoka.ico" rel="SHORTCUT ICON">
        <title>第三題</title>
        <link rel=stylesheet type="text/css" href="pds.css">
        <style>
        
        </style>
    </head>
    <body >
        <div class="center">
           <form class="ques">
           <?php
                require_once("dbtools.inc.php");
                $link=create_connection();
                $Instructor = $_POST["Instructor"];               
                $sql=
                "SELECT
                    S.Course_number as 課程名稱,
                    S.Semester as 學期,
                    S.Year as 年份,
                    COUNT(G.Section_identifider) AS 修課人數
                FROM
                    section AS S,
                    grade_report AS G
                WHERE
                    S.Instructor = '$Instructor' AND 
                    G.Section_identifider = S.Section_identifier
                GROUP BY
                	s.Section_identifier            
                ";
                $result=execute_sql("stust", $sql, $link);

                $total_fields = mysql_num_fields($result);
                echo "<table border='0' align='center' width='300'>";
                echo "<tr  align='center'>";         
                for ($i = 0; $i < $total_fields; $i++)
                echo "<th  align='center'>" . mysql_field_name($result, $i) . "</td>";   
                
                
                $j = 1;
                $records_per_page = 20;
                while ($row = mysql_fetch_row($result) and $j <= $records_per_page)
                {
                    echo "<tr>";      
                    for($i = 0; $i < $total_fields; $i++)    
                      echo "<td align='center'>$row[$i]</td>"; 
                    $j++;
                    echo "</tr>";     
                  }
                  echo "</table>" ;
                
                //????O??????
                mysql_free_result($result);
                mysql_close($link);
            ?>
           </form>
               
        </div>
    </body>
</html>