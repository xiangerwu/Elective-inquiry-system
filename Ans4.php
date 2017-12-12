<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>第四題</title>
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
                $Name = $_POST["Name"];               
                $sql=
                "SELECT
                    st.Name as 姓名,
                    c.Course_name as 課程名稱,
                    c.Course_number as 課程編號,
                    c.Credit_hours as 學分,
                    s.Semester as 學期,
                    s.Year as 年份,
                    g.Grade as 成績
                FROM
                    student AS st,
                    course AS c,
                    section AS s,
                    grade_report AS g
                WHERE
                    st.Name = '$Name' AND
                    g.Student_number = st.Student_number AND
                    s.Section_identifier = g.Section_identifider AND 
                    c.Course_number = s.Course_number;
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