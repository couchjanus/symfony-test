<?phphp
var_dump(__DIR__);
define('ROOT', dirname(__DIR__));
var_dump(ROOT);
echo '<h3>DIRECTORY_SEPARATOR (string): '.DIRECTORY_SEPARATOR.'</h3>';
echo '<h3>PATH_SEPARATOR (string): '.PATH_SEPARATOR.'</h3>';
echo '<h3>SCANDIR_SORT_ASCENDING (integer): '. SCANDIR_SORT_ASCENDING.'</h3>';
echo '<h3>SCANDIR_SORT_DESCENDING (integer): '. SCANDIR_SORT_DESCENDING.'</h3>';
echo "<h3>SCANDIR_SORT_NONE (integer): " . SCANDIR_SORT_NONE.'</h3>';


//Определение функции задает локальную область видимости функции. Любая переменная внутри функции по умолчанию ограничена локальной областью видимости функции:
$a = 1; /* глобальная область видимости */
function test(){
echo $a; /* ссылка на переменную в локальной области видимости */
}
//Выражение echo $a; указывает на локальную версию переменной $a, а в пределах этой области видимости ей не было присвоено значение.

//Если глобальная переменная используется внутри функции, она должна быть объявлена глобальной внутри определения функции.

// Использование global
$a = 1;
$b = 2;

function Sum() {
global $a, $b;
$b = $a + $b;
}
Sum();
echo $b;
//Второй способ доступа к переменным глобальной области видимости - использование специального, определяемого PHP массива $GLOBALS.
// Использование $GLOBALS вместо global
$a = 1;
$b = 2;
function Sum1() {
$GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}
Sum1();
echo $b;



/**
*
*/
//class MyClass {
//    // Class properties and methods go here
//}
//Рекомендуется определять классы до создания их экземпляров.
class AboutController
{
// Class properties and methods go here
}
// Каждый новый объект, основанный на классе, называется экземпляром этого класса.
// Новый экземпляр может быть создан с использованием ключевого слова new:
$controller = new AboutController;

// Чтобы увидеть содержимое объекта, используйте var_dump()
var_dump($controller);

// $controller = new AboutController;

// Класс можно создать и с помощью переменной:

$className = 'AboutController';
$instance = new $className(); // new AboutController()
var_dump($instance);

// Функция get_class ([ object $object ] ) : string возвращает имя класса,
// к которому принадлежит экземпляр $object.
// Функция возвращает FALSE, если $object не является объектом.
// $object - объект. Внутри класса этот параметр может быть опущен.
// Если параметр $object опущен внутри класса, будет возвращено имя этого класса.

// Возвращает имя класса, экземпляром которого является объект controller.
echo 'The class of controller is: ' . get_class($controller);

// Возвращает имя класса, экземпляром которого является объект instance.
echo 'the class of instance is: ' . get_class($instance);

class User {
/**
* @return string
*/
public function getUsername(): string
{
return $this->username;
}

/**
* @param string $username
*/
public function setUsername(string $username): void
{
$this->username = $username;
}
public function __construct()
{
}

/**
* @return int
*/
public function getAge(): int
{
return $this->_age;
}

/**
* @param int $age
*/
public function setAge(int $age): void
{
$this->_age = $age;
}
public $username = 'John Doo'; // I'm a public property
public $email = 'doo@my.cat';
protected $sex = "male"; // I'm a protected property
private $_age = 22; // I'm a private property

public function addFriend(){
return "$this->username just added a new friend";
}

// Методы, которые будут устанавливать и получать значение свойства класса $sex:

public function setSex($newSex)  {
$this->sex = $newSex;
}
public function getSex()  {
return $this->sex;
}
}
// Свойства класса работают точно так же, как и обычные переменные,
// за исключением того, что они привязаны к объекту и поэтому могут быть доступны только с помощью объекта:
$userOne = new User();

//Доступ к свойствам и методам класса, объявленным как public, разрешен отовсюду.
echo $userOne->username;
echo $userOne->email;
//Модификатор protected разрешает доступ наследуемым и родительским классам.
//protected $sex = "male"; // I'm a protected property
// Модификатор private ограничивает область видимости так,
// что только класс, где объявлен сам элемент, имеет к нему доступ.
//private $_age = 22; // I'm a private property

// Чтобы вызвать метод объекта, нужно использовать оператор (->),
// за которым следует имя метода и круглые скобки:

echo $userOne->addFriend();

echo $userOne->username; // Output the property
//echo $userOne->sex; // Output the property
//echo $userOne->_age; // Output the property

$userTwo = new User();
echo $userTwo->getSex(); // Get the property value
$userTwo->setSex("fimale"); // Set a new one
echo $userTwo->getSex(); // Read it out again to show the change

// Изменение свойств класса
class Employee {
/**
* @return mixed
*/
public function getUsername()
{
return $this->username;
}

/**
* @param mixed $username
*/
public function setUsername($username): void
{
$this->username = $username;
}
/**
* @return mixed
*/
public function getName()
{
return $this->name;
}

/**
* @param mixed $name
*/
public function setName($name): void
{
$this->name = $name;
}
private $username;
public $name;
public $email;
}
$newEmployee = new Employee(); // создадим объект класса.
var_dump($newEmployee); // новый пользователь, но его данные не определены
// значения для свойств $newEmployee.
$newEmployee->setName("Ben", "Uslama");
$newEmployee->name = "ben";
$newEmployee->email = "beny@mail.cat";
var_dump($newEmployee);
// определив значения свойств, мы можем их считать при необходимости,
// или же присвоить новые, то есть работать как с обычными переменными.
echo $newEmployee->getName();
$newEmployee->setName("Tom", "Cat");
echo $newEmployee->email;
echo $newEmployee->email = "tomcat@mail.cat";

// Несколько экземпляров
//Для указанного класса можно определить сколько угодно объектов
// и для каждого из них значения свойств нужно указывать отдельно.
// Каждый объект, будет уникальным.
$secondEmployee = new Employee(); // Create second object
$secondEmployee->setName("John", "Doo");
$secondEmployee->login = "john";
$secondEmployee->email = "john@mail.cat";
// Get the value of $name from both objects
echo $secondEmployee->getName();
echo $newEmployee->getName();
// Set new values for both objects
$secondEmployee->setName("John", "Cat");
$newEmployee->setName("Tomt", "Cat");

