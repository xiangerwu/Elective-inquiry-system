<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>第二題</title>
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
                $sql=
                "SELECT
                    C.Course_name as 課程名稱,
                    S.Year as 年份
                FROM
                    course AS C,
                    section AS S
                WHERE
                    (S.Year = 05 OR S.Year = 07) AND S.Instructor = 'King' AND S.Course_number = C.Course_number
                ";
                $result = execute_sql("stust", $sql, $link);
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
                mysql_free_result($result);
                mysql_close($link);
            ?>
           </form>
               
        </div>
    </body>
</html>