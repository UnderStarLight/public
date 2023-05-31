<?php
$servername = "localhost";
$dbname = 'test';
$username = "root";
$password = "root";
try{
  // 连接信息
  $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // 查询信息
  $updateSql = 'UPDATE numbers SET no = :no, updateTime = :updateTime WHERE id = :id';
  // 进行查询
  if($stmt = $connect->prepare($updateSql)) {
    $param = ['no' => $_POST['no'], 'id' => $_POST['id'], 'updateTime' => date('H:i:s')];
    if($stmt -> execute($param)) {
      if($stmt -> rowCount() > 0) {
        // echo '成功更新了'.$stmt->rowCount().'条记录';
      } else { 
        // echo '没有记录被更新';
      }
    }
  }

  // 查询多行
  $querySql = 'SELECT * from numbers';
  $getAll = $connect->query($querySql);
  $result = $getAll->fetchAll(PDO::FETCH_ASSOC);
  // var_dump($result);
  echo json_encode($result);
}catch(PDOException $e) {
  // echo $e->getMessage();
}
?>