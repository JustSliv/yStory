<?php 

/**
 * 
 */
class User
{
	//Подключение к БД
	public $pdo;
	//Сообщение об ошибках
	private $failMsg;

	//Конструктор с установкой соединения с БД
	function __construct() {
		$this->pdo = new PDO('mysql:dbname=ystory;host=localhost', 'ystoryuser', 'ystorypass');
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->failMsg = false;
	}
	
	
	//Метод регистрации
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

	//Метод авторизации
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

	//Получения всей информации о текущем пользователе
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

	//Метод смены имени и/или почты
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
				$_SESSION['result-msg'] = "Ваше имя было успешно изменено. ";
			}

			if ($currEmail != $_POST['changeEmail']) {
				//Проверка на существование идентичной почты
				$sql = $this->pdo->prepare('SELECT `email` FROM `User` WHERE `email`=:em');
				$sql->execute(array(':em' => $_POST['changeEmail']));
				$result = $sql->fetch(PDO::FETCH_ASSOC);

				if (is_array($result)) {
					$_SESSION['result-msg'] = "<p style='color: red'>Данный адрес електронной почты уже занят</p>";
					if ($countOfChanges == 1) {
						$_SESSION['result-msg'] .= "Ваше имя было успешно изменено.";
					}
				} else {
					$upd = $this->pdo->prepare('UPDATE `User` SET `email`=:email WHERE `userID`=:id');
					$upd->execute(array(':email' => $_POST['changeEmail'], ':id' => $_SESSION['id']));
					$countOfChanges++;
					if ($countOfChanges == 2) {
						$_SESSION['result-msg'] = "Ваше имя и адрес електронной почты были изменены";
					} else {
						$_SESSION['result-msg'] = "Ваш адрес електронной почты был изменен";
					}
				}
			}
			if ($countOfChanges > 0) {
			header("Location: settings.php?result=succes");
			}
		}
	}

	//Метод смены пароля
	function change_pass() {
		if (isset($_POST['change-pass-btn'])) {
			$sendedCurPass = $_POST['currPass'];
			$sendedNewPass = $_POST['changePass'];
			$sendedConfirmNewPass = $_POST['changeConfirm'];

			$result = $this->getInfo();

			$curPass = $result['pass'];
			
			if ($sendedCurPass == $curPass) {
				if($sendedNewPass == $sendedConfirmNewPass) {
					$change_pass_stmt = $this->pdo->prepare('UPDATE `User` SET `pass`=:pass WHERE `userID`=:id');
					$change_pass_stmt->execute(array(':pass' => $sendedNewPass, ':id' => $_SESSION['id']));
					$_SESSION['result-pass'] = "Пароль был успешно изменен";
					echo "123";
				} else {
					$_SESSION['result-pass'] = "<p style='color: red'>Пароли не совпадают!</p>";
				}
			} else {
				$_SESSION['result-pass'] = "<p style='color: red'>Введенный вами текущий пароль неправильный!</p>";
			}
			header("Location: settings.php?passchange=result");
		}
	}
}
?>