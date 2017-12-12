<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>第一題</title>
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
                $Major = $_POST["Major"];               
                $sql=
                "SELECT 
                    NAME as 姓名,
                    Student_number as 學號
                FROM
                    student
                WHERE
                    Major = '$Major'
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