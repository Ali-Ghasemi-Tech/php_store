<?php
function search( $conn , $filter_query){
  
  $result = $conn->query($filter_query);
  if($result){
    return $result;
  }else{
    return null;
  }

}
?>