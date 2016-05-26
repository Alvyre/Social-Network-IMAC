<?php

include '../Models/Comment.php';

$fonction = $_GET['fonction'];

  if (!empty($_POST)) {
    if (isset($_POST['ContentComment']) || $_POST['ContentComment'] == '') {
      $ContentComment = $_POST['ContentComment'];
    }
    if (isset($_POST['DateComment']) || $_POST['DateComment'] == '') {
      $DateComment = $_POST['DateComment'];
    }
  }


  $result = createComment($DateComment, $ContentComment, $IdUser);
  
  if($result){
    echo "Bravo, vous venez de commenter un sujet";
  }else{
    echo "SEGFAULT";
  }
?>
