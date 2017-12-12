<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>第五題</title>
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
                $Grade= $_POST["Grade"];        
                $sql=
                "SELECT
                    s.Name as 學生,
                    s.Major as 主修系所
                FROM
                    student AS s,
                    grade_report AS g,
                    (SELECT
                            g.Student_number AS a,
                            COUNT(s.Student_number) AS b
                        FROM
                            student AS s,
                            grade_report AS g
                        WHERE
                            s.Student_number = g.Student_number
                        GROUP BY
                            g.Student_number) AS T1,
                    (SELECT
                            g.Student_number AS i,
                            COUNT(s.Student_number) AS j
                        FROM
                            student AS s,
                            grade_report AS g
                        WHERE
                            s.Student_number = g.Student_number AND g.Grade = '$Grade' 
                        GROUP BY 
                            g.Student_number) AS T2
                WHERE
                    s.Student_number = a AND
                    b = j
                GROUP BY
                    s.Student_number
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