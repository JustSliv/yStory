<?php 

/**
 * 
 */
class User
{
	public $pdo;
	private $failMsg;

	function __construct()
	{
		$this->pdo = new PDO('mysql:dbname=ystory;host=localhost', 'ystoryuser', 'ystorypass');
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->failMsg = false;
	}
	
	

	function registraion() {
		$this->failMsg = true;

		if (isset($_POST['accept'])) {

			if ($_POST['pass'] != $_POST['confirm']) {
				return $this->failMsg = "Пароли на совпадают!";
			}

			//Проверка на существование аккаунта с таким же логином или адресом електронной почты
			$sql = $this->pdo->prepare('SELECT * FROM `User` WHERE `login`=:log OR `email`=:em');
			$sql->execute(array(':log' => $_POST['login'], ':em' => $_POST['email']));
			$result = $sql->fetch(PDO::FETCH_ASSOC);

			if($result) {
				$this->failMsg = 'Пользователь с таким логином или адресом електронной почты уже существует';
			} else {
				$newacc_stmt = $this->pdo->prepare('INSERT INTO `User`(`name`,`login`,`pass`,`email`,`status`,`avatar`) VALUES (:name, :log, :pass, :em, 0, "avatar-default.png")');
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

			//Поиск аккаунта в бд
			$sql = $this->pdo->prepare('SELECT `login`, `pass`, `name`, `userID` FROM `User` WHERE `login`=:log AND `pass`=:pass');
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

			//Поиск записи об аккаунте по уникальному идентификатору
			$sql = $this->pdo->prepare('SELECT * FROM `User` WHERE `userID`=:id');
			$sql->execute(array(':id' => $_SESSION['id']));
			$result = $sql->fetch(PDO::FETCH_ASSOC);

			if (count($result) > 0) {
				return $result;
			} else {
				return $this->failMsg = "Информации об аккаунте не найдено";
			}
		}
	}

	function change_name_or_email() {
		if (isset($_POST['change-btn'])) {
			$countOfChanges = 0;
			$allData = $this->getInfo();

			//Переменные со старыми данными
			$currName = $allData['name'];
			$currEmail = $allData['email'];
			//Смена логина
			if ($currName != $_POST['changeName']) {
				$upd = $this->pdo->prepare('UPDATE `User` SET `name`=:name WHERE `userID`=:id');
				$upd->execute(array(':name' => $_POST['changeName'], ':id' => $_SESSION['id']));
				$countOfChanges++;
				$_SESSION['result-msg'] = "Ваше имя было успешно изменено";
			}

			if ($currEmail != $_POST['changeEmail']) {
				$upd = $this->pdo->prepare('UPDATE `User` SET `email`=:email WHERE `userID`=:id');
				$upd->execute(array(':email' => $_POST['changeEmail'], ':id' => $_SESSION['id']));
				$countOfChanges++;
				if ($countOfChanges == 2) {
					$_SESSION['result-msg'] = "Ваше имя и адрес електронной почты были изменены";
				} else {
					$_SESSION['result-msg'] = "Ваш адрес електронной почты был изменен";
				}
			}

			if ($countOfChanges == 0) {
				unset($_SESSION['result-msg']);
			}
			header("Location: settings.php");
		}
	}
}
?>