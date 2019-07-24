<?php

$username = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $err = false;
  if (strlen($username) > 8) {
    $err = true;
  }
}

require "function.php";

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Check username</title>
</head>
<body>
  <form action="" method="POST">
    <input type="text" name="username" placeholder="user name" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>">
    <input type="submit" value="Check!">
    <?php  $dbn = dbConnect();
    // SQL作成
    $sql = "SELECT * FROM user";

	// SQL実行
	$res = $dbn->query($sql);

	// 取得したデータを出力
	foreach( $res as $value ) {
		echo "$value[name]<br>";
    }
    
    if ($err) { echo "Too long!"; } ?>
  </form>
</body>
</html>