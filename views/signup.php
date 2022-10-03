<?php
require_once 'connection.php';
// require 'header.php';
// require 'footer.php';

class Singup
{
    private $name;
    private $email;
    private $phone;
    private $password;
    private $address;
    private $city;

    function __construct($name, $email, $password, $phone, $address, $city)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
        $this->phone = $phone;
        $this->city = $city;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getAddress()
    {
        return $this->address;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setCity($city)
    {
        $this->city = $city;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['register'])) {
    $nameErr = $emailErr = $phoneErr = $cpassErr = $passErr = ' ';
    $nameEr = $emailEr = $phoneEr = $passEr = $cpassEr = $addressEr = $cityEr = false;

    $Singup = new Singup(
        $_POST['name'],
        $_POST['email'],
        $_POST['password'],
        $_POST['phone'],
        $_POST['address'],
        $_POST['city']
    );
    print_r($Singup);

    $query = 'SELECT * from `users` where email=?';
    $query = $connect->prepare($query);
    $query->execute([$Singup->getEmail()]);

    $isFound = $query->fetch(PDO::FETCH_OBJ);
    print_r($isFound);

    if (empty($isFound)) {
        if (empty($Singup->getName())) {
            $nameErr = 'Name is required';
            echo "<script>alert(   '$nameErr') </script>";
        } else {
            $Singup->setName(test_input($Singup->getName()));
            // check if name only contains letters and whitespace
            if (
                !preg_match('/^[a-zA-Z\s]*$/', $Singup->getName()) &&
                strlen($Singup->getName()) > 4
            ) {
                $nameErr = 'Only letters and white space allowed';
                echo "<script>alert(   '$nameErr') </script>";
            } else {
                $nameEr = true;
            }
        }

        if (empty($Singup->getEmail())) {
            $emailErr = 'Name is required';
            echo "<script>alert(   '$emailErr') </script>";
        } else {
            $Singup->setEmail(test_input($Singup->getEmail()));
            // $emailEr = false;
            // check if name only contains letters and whitespace

            if (!filter_var($Singup->getEmail(), FILTER_VALIDATE_EMAIL)) {
                $emailErr = 'Invalid email format';
                echo "<script>alert(   '$emailErr') </script>";
            } else {
                $emailEr = true;
            }
        }

        if (empty($Singup->getPhone())) {
            $phoneErr = 'phone is required';
            echo "<script>alert(   '$phoneErr') </script>";
        } else {
            $Singup->setPhone(test_input($Singup->getPhone()));

            // check if name only contains letters and whitespace
            if (
                !preg_match(
                    '/^\+?\d{3}[- ]?\d{3}[- ]?\d{6}$/',
                    $Singup->getPhone()
                )
            ) {
                $phoneErr = 'Invalid phone number format';
                echo "<script>alert(   '$phoneErr') </script>";
            } else {
                $phoneEr = true;
            }
        }

        if (empty($Singup->getPassword())) {
            $passErr = 'password is required';
            echo "<script>alert(   '$passErr') </script>";
        } else {
            $Singup->setPassword(test_input($Singup->getPassword()));

            // check if name only contains letters and whitespace
            if (
                !preg_match(
                    "/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/",
                    $Singup->getPassword()
                )
            ) {
                $passErr = 'Invalid password format';
                echo "<script>alert(   '$passErr') </script>";
            } else {
                $passEr = true;
            }
        }

        // form validation for confirm password
        if ($_REQUEST['cuser_password'] != $Singup->getPassword()) {
            $cpassErr = 'Confirm Password doesnot Matche';
            echo "<script>alert(   '$cpassErr') </script>";
        } else {
            $cpassEr = true;
        }

        if (empty($Singup->getAddress())) {
            $addressErr = 'Address is required';
            echo "<script>alert(   '$addressErr') </script>";
        } else {
            $Singup->setAddress(test_input($Singup->getAddress()));
            $addressEr = true;
        }

        if (empty($Singup->getCity())) {
            $cityErr = 'city is required';
            echo "<scrpt>alert(   '$cityErr ') </script>";
        } else {
            $Singup->setCity(test_input($Singup->getCity()));
            $cityEr = true;
        }

        if (
            $nameEr &&
            $emailEr &&
            $phoneEr &&
            $passEr &&
            $cpassEr &&
            $cityEr &&
            $addressEr
        ) {
            $q =
                'INSERT INTO users (name, address, phone, email, password,city) VALUES (?,?,?,?,?,?)';
            echo "<script> alert( 'test')  </script>";

            $stmt = $connect->prepare($q);
            $stmt->execute([
                $Singup->getName(),
                $Singup->getAddress(),
                $Singup->getPhone(),
                $Singup->getEmail(),
                $Singup->getPassword(),
                $Singup->getCity(),
            ]);
        }
    } else {
        $emailErr = 'It looks like you’re connected try login. Please ';
        echo "<script>alert(   '$emailErr') </script>";
    }
}
