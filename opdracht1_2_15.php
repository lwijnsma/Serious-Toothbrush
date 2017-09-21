<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <title>dont click</title>
  </head>
  <body>

<?php
echo
"
    <style >

      table{width:270px; border: 1px solid black; border-collapse: collapse; height: 270px;}
      td{width: 30px; height: 30px;}
      tr{height: 20px;}
    </style>
";

echo "<table>";
      for ($i=0; $i <8 ; $i++)
      {
         echo "<tr>";
         for ($j=0; $j <8 ; $j++)
         {


                  if ($i%2==0)
                  {
                          if ($j%2==0)
                          {
                                  echo"<td> </td>";
                          }
                          else
                          {
                                  echo '<td style="background-color:black"> </td>';
                          }

                  }
                  else
                  {
                    if ($j%2==0)
                    {
                            echo '<td style="background-color:black"> </td>';
                    }
                    else
                    {
                            echo"<td> </td>";
                    }

                  }
         }
      }



echo "</table>";
 ?>





  </body>
</html>
