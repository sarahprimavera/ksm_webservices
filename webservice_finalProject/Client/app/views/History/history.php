<?php require APPROOT . '\views\includes\header.php';?>
<?php require APPROOT . '\views\includes\navbar.php';?>

<?php 
echo'<style>
table, th, td {
  border:1px solid black;
}
</style>';
echo '<table  class="" style="border: 1px solid black;">';
 echo'<tr>
   <td>Conversion ID</td>
   <td>Client ID</td>
   <td>Requested date</td>
   <td>Completion Date</td>
   <td>Original String</td>
   <td>Converted String</td>
 </tr>';

 if(!empty($data)){
    foreach($data as $raw){
      echo"<tr>";
      echo"<td>$raw->id</td>";
      echo"<td>$raw->client_id</td>";
      echo"<td>$raw->request_date</td>";
      echo"<td>$raw->completion_date</td>";
      echo"<td>$raw->original_language</td>";
      echo"<td>$raw->translated_language</td>";
      echo"</tr>";
    }
        
  }
  
  echo '</table>';

  ?>

<?php require APPROOT . '/views/includes/footer.php'; ?>