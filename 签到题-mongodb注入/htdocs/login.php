<?php
session_start();

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

@$username = $_POST['logname'];
@$password = $_POST['logpass'];

$filter = array(
    'username' => $username,
    'password' => $password
);

$query = new MongoDB\Driver\Query($filter);
$cursor = $manager->executeQuery('db_test.tb_users', $query)->toArray();

if (count($cursor) > 0) {
    $_SESSION['user'] = $username;
    header('Location: ok.php');
}else {
    echo "
		<script type='text/javascript'>
			alert('密码忘了吗？赶紧回去好好想想！');
			window.location.href='index.html';
		</script>
	";
}

?>