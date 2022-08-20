<?php
//https://200lab.io/blog/interface-trong-golang-cach-dung-chinh-xac/
//https://viblo.asia/p/lap-trinh-huong-doi-tuong-voi-go-07LKXA7kZV4

/*
====================================================================================
 PHP OOP - Object Oriented Programming
====================================================================================
Structural:
    - Class
        |-- Method (Function)
        |-- Attribute/Property (Variable, Constant, Parameter)
        |-- Static Property
        |-- Static Method
    - Object
        |-- Method (The action, manipulation of Object)
        |-- Property (Characteristics, information of Object)
  
    - 4 major principles:
        + Encapsulation (Đóng gói).
            |-- Public
            |-- Private
            |-- Protected

        + Inheritance (Kế thừa).

        + Polymorphism (Đa hình).


        + Abstraction (Trừu tượng).
 

    - Interface.

    - Abstract Class.
*/

/**
 * ===========================
 * = Encapsulation principle =
 * ===========================
 * 
 * Các đối tượng khác không thể tác động trực tiếp lên các thuộc tính private của đối 
 * tượng hiện tại, mà phải thông qua các phương thức được đối tượng này công khai (public).
 */
class A
{
    //private: không cho phép truy cập trực tiếp từ bên ngoài class, hay kể cả các class con.
    private $a = 1;
    //protected: không cho phép truy cập trực tiếp từ bên ngoài class, nhưng các class con 
    //có thể truy cập.
    protected $b = 2;
    //public: có thể truy cập trực tiếp từ bên ngoài class hoặc bất kì các class nào khác.
    public $c = 3;

    //Vì vậy nếu muốn truy cập được đến thuộc tính private trong class thì phải tạo các phương
    //thức public Set và Get.
    public function setA($value)
    {
        $this->a = $value;
        return $this;
    }
    public function getA()
    {
        return $this->a;
    }

    protected function getB()
    {
        return $this->b;
    }

    private function getC()
    {
        return $this->c;
    }
}

// $object = new A();

// echo $object->a . "\n"; //Fatal error:  Uncaught Error: Cannot access private property A::$a
// echo $object->b . "\n"; //Fatal error:  Uncaught Error: Cannot access protected property A::$b
// echo $object->c . "\n"; //3

// echo $object->setA(7)->getA(); //7



/**
 * =========================
 * = Inheritance principle =
 * =========================
 * 
 * Nhờ tính kế thừa, lớp con thừa hưởng toàn bộ các thuộc tính và phương thức ở lớp cha. 
 * Tuy nhiên lớp con chỉ có thể truy cập đến các thuộc tính public hoặc protected và 
 * phương thức public ở lớp cha. Ngoài ra lớp con có thể tự tạo ra thêm các thuộc tính, 
 * phương thức mới.
 */


class B extends A
{
}

$object2 = new B();
echo $object2->getA() . "\n"; //1
// echo $object2->getB() . "\n"; //Fatal error: Uncaught Error: Call to protected method A::getB()
// echo $object2->getC() . "\n"; //Fatal error: Uncaught Error: Call to private method A::getC()



/**
 * ==========================
 * = Polymorphism principle =
 * ==========================
 * 
 * Tính đa hình cho phép một đối tượng có thể thực hiện cùng một phương thức nhưng theo nhiều cách
 * khác nhau. Hoặc hiểu đơn giản, các phương thức ở lớp con sẽ ghi đè lớp cha.
 */


class C
{
    public function getA()
    {
        echo "Overwrite getA() in C\n";
        return 9;
    }
}

$object3 = new C();
echo $object3->getA(), "\n"; //Overwrite getA() in C       9



/**
 * =========================
 * = Abstraction principle =
 * =========================
 * 
 * Tính trừu tượng là quá trình đơn giản hóa một đối tượng mà trong đó chỉ bao gồm những đặc
 * điểm quan tâm và bỏ qua những đặc điểm chi tiết nhỏ. Quá trình trừu tượng hóa dữ liệu giúp
 * ta xác định được những thuộc tính, hành động nào của đối tượng cần thiết sử dụng cho chương
 * trình.
 * 
 * Ví dụ: Đối tượng Con vật, chúng ta chỉ quan tâm đến những thuộc tính quan trọng như cân nặng,
 *  chiều cao... Mà không cần phải quan tâm số lượng lông trên người chúng hay móng tay chúng dài
 *  bao nhiêu...
 */



/**
 * =============
 * = Interface =
 * =============
 * 
 * Là một khuôn mẫu cho phép và CHỈ CHO PHÉP chỉ định một hoặc nhiều phương thức mà một lớp sẽ triển khai.
 * Nhiều lớp có thể sử dụng cùng một giao diện – tính đa hình.
 * Interface không có thuộc tính, constructor hay destructor các phương thức đều phải là public.
 */

interface D
{
    public function getVar();
    public function getFoo();
    public function setVar($var);
}

class E implements D
{
    public int $var;
    public function getVar()
    {
        return "Hello ";
    }
    public function getFoo()
    {
        return "World";
    }
    public function setVar($var)
    {
        $this->var = $var;
    }
}

class F implements D
{
    public int $var;
    public function getVar()
    {
        return "Var";
    }
    public function getFoo()
    {
        return "Foo";
    }
    public function setVar($var)
    {
        $this->var = $var + 1;
    }
}

$object4 = new E();
echo $object4->getVar(); //Hello
echo $object4->getFoo() . "\n"; //World
$object4->setVar(7) . "\n"; //7

$object5 = new F();
echo $object5->getVar(); //No more
echo $object5->getFoo() . "\n"; //Hello World
$object5->setVar(7) . "\n"; //7



/**
 * ==================
 * = Abstract class =
 * ==================
 *
 * Là một lớp được khai báo tên nhưng chưa được định nghĩa. Đơn giản là khai báo một lớp 
 * trừu tượng trước, xử lý gì thì để lớp con kế thừa lớp Abstract đấy rồi xử lý sau.
 * Một lớp abstract vẫn có thể những thuộc tính và các hàm bình thường. Và không cần phải định
 * nghĩa lại trong lớp con.
 */
abstract class G
{
    public int $var;
    public function getVar(): string
    {
        return $this->var;
    }
    abstract public function getA();
    abstract public function getB();
    abstract public function getC(): string;
}

class H extends G
{

    public function getA()
    {
        return 1;
    }
    public function getB()
    {
        return 2;
    }
    public function getC(): string
    {
        return $this->getVar();
    }
}

class I extends G
{
    public function getA()
    {
        return "Hello ";
    }
    public function getB()
    {
        return "World";
    }
    public function getC(): string
    {
        return "!";
    }
}

/**
 * ==========
 * = Static =
 * ==========
 */

class J {
    public static $var = "Hello";
    public static function getVarSelf()
    {
        return self::$var;
    }
    public static function getVarStatic()
    {
        return static::$var;
    }
}

class K extends J
{
    public static $var = "World";
}
echo J::getVarSelf();   //Hello
echo J::getVarStatic(); //Hello
echo K::getVarSelf();   //Hello
echo K::getVarStatic(), "\n"; //World

class SomeObject {
    public $classVar;
    public function __construct( $classVar ) {
        $this->classVar = $classVar;
    }
}

    
$object    = new SomeObject( "Hello, world." );
$reference = $object;
$reference->classVar = "Look! I can access object!";
echo $object->classVar;    
echo $reference->classVar; 