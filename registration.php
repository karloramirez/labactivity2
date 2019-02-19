<?php

$page_title="Registration";



if($_POST){

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    $user->Username=$_POST['Username'];
    $user->Password=$_POST['Password'];
    $user->email=$_POST['email'];

    // create the user
if($user->create()){

    echo "<div class='alert alert-info'>";
        echo "Successfully registered. <a href='{login.php}login'>Please login</a>.";
    echo "</div>";
    }else{
    echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
}
}
?>
<form action='register.php' method='post' id='register'>

    <table class='table table-responsive'>

        <tr>
            <td class='width-30-percent'>Username</td>
            <td><input type='text' name='Username' class='form-control' required value="<?php echo isset($_POST['Username']) ? htmlspecialchars($_POST['Username'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type='password' name='password' class='form-control' required value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
 <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>
        <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Register
                </button>
            </td>
        </tr>

    </table>
</form>