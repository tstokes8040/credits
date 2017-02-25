<?php
include_once 'utils.php';

$id = isset($_POST['id']) ? intval($_POST['id']) : $user['id'];
$key = $_POST['key'];

if($id < 1 || strlen($key) < 1){
  exit('{"success":false,"msg":"Invalid data"}');
} else if($key != getKey($id)){
  exit('{"success":false,"msg":"Invalid key"}');
}

$query = $connection->prepare('
  SELECT trans.from_id, trans.to_id,from_user.username, to_user.username, trans.amount
  FROM transactions AS trans
  INNER JOIN users AS from_user ON trans.from_id = from_user.id
  INNER JOIN users AS to_user ON trans.to_id = to_user.id
  WHERE trans.from_id = ? OR trans.to_id = ?
  ORDER BY trans.id DESC LIMIT 5
');
$query->bind_param('ii', $id, $id);
$query->execute();
$query->bind_result($fromId, $toId, $fromName, $toName, $amount);

$transactions = array();

while($query->fetch()){
  $from = array('id'=>$fromId, 'name'=>$fromName);
  $to = array('id'=>$toId, 'name'=>$toName);
  $transactions[] = array('from'=>$from, 'to'=>$to, 'amount'=>$amount);
}

echo json_encode(array('success'=>true, 'transactions'=>$transactions));
 ?>