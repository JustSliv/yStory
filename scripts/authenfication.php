<?php 

/**
 * 
 */
class User
{
	function __construct()
	{
		# code...
	}
	
	private $failMsg;

	function registraion() {
		$this->failMsg = true;

		if (isset($_POST['accept'])) {

			if ($_POST['pass'] != $_POST['confirm']) {
				return $this->failMsg = "Пароли на совпадают!";
			}

			$pdo = new PDO('mysql:dbname=ystory;host=localhost', 'ystoryuser', 'ystorypass');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//Проверка на существование аккаунта с таким же логином или адресом електронной почты
			$sql = $pdo->prepare('SELECT * FROM `User` WHERE `login`=:log OR `email`=:em');
			$sql->execute(array(':log' => $_POST['login'], ':em' => $_POST['email']));
			$result = $sql->fetch(PDO::FETCH_ASSOC);

			if($result) {
				$this->failMsg = 'Пользователь с таким логином или адресом електронной почты уже существует';
			} else {
				$newacc_stmt = $pdo->prepare('INSERT INTO `User`(`name`,`login`,`pass`,`email`,`status`,`avatar`) VALUES (:name, :log, :pass, :em, 0, "avatar-default.png")');
				$newacc_stmt->execute(array(
					':name' => $_POST['name'],
					':log' => $_POST['login'],
					':pass' => $_POST['pass'],
					':em' => $_POST['email']
				));

				$this->failMsg = false;
			}
			return $this->failMsg;
		}
	}

	function login() {
		if (isset($_POST['login_sub'])) {
			$pdo = new PDO('mysql:dbname=ystory;host=localhost', 'ystoryuser', 'ystorypass');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//Поиск аккаунта в бд
			$sql = $pdo->prepare('SELECT `login`, `pass`, `name`, `userID` FROM `User` WHERE `login`=:log AND `pass`=:pass');
			$sql->execute(array(':log' => $_POST['login'], ':pass' => $_POST['pass']));
			$result = $sql->fetch(PDO::FETCH_ASSOC);

			if (!is_array($result) || count($result) == 0) {
				return $this->failMsg = "Введен неправильный логин или пароль";
			} else {
				$_SESSION['currentUser'] = $result['login'];
				$_SESSION['username'] = $result['name'];
				$_SESSION['id'] = $result['userID'];
			}
		}
	}

	function getInfo() {
		if(isset($_SESSION['id'])) {
			$pdo = new PDO('mysql:dbname=ystory;host=localhost', 'ystoryuser', 'ystorypass');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//Поиск записи об аккаунте по уникальному идентификатору
			$sql = $pdo->prepare('SELECT * FROM `User` WHERE `userID`=:id');
			$sql->execute(array(':id' => $_SESSION['id']));
			$result = $sql->fetch(PDO::FETCH_ASSOC);

			if (count($result) > 0) {
				return $result;
			} else {
				return $this->failMsg = "Информации об аккаунте не найдено";
			}
		}
	}
}
?>