<?php if (!isset($_SESSION['userEmail'])) { ?>
    <div id="cover">
        <!--    Login Form-->
        <form action="../Function/Login.php" method="post" class="RegisterLoginForm" id="loginForm">
            <div class="formStyle">
                <div class="titleTag">
                    <h1>Login</h1>
                    <img class="closeIMG" alt="close" src="images/close.png">
                    <img class="closeHover" alt="close" src="images/closeHover.png"></div>
                <label> <span>Email Address:</span>
                    <input id="LoginEmail" type="text" name="LoginEmail" />
                </label>
                <label> <span>Password:</span>
                    <input id="LoginPassword" type="password" name="LoginPassword">
                </label>
                <div id="LoginError"></div> 
                <input type="submit" value="Login" class="button-blue-small button-left"/>
                <span class="Tip">don't you have an account?</span>
                <input type="submit" value="Register" class="button-blue-small button-right" id="RegisterBT"/>
            </div>
        </form>
        <!--    Register Form-->
        <form action='../Function/Register.php' method="post" class="RegisterLoginForm" id="registerForm" style="clear:both">
            <div class="formStyle">
                <div class="titleTag">
                    <h1>Register</h1>
                    <img class="closeIMG" alt="close" src="images/close.png">
                    <img class="closeHover" alt="close" src="images/closeHover.png"></div>
                <label> <span>Email Address:</span>
                    <input id="Registeremail" type="text" name="Registeremail" />
                </label>
                <label> <span>Password:</span>
                    <input id="RegisterPassword" type="password" name="Password">
                </label>
                <label> <span>Confirm your password:</span>
                    <input id="RegisterConfirmPassword" type="password" name="CPassword">
                </label>
                <div id="RegisterError"></div>
                <input type="submit" value="Register" name="RegisterSubmit" class="button-blue-small button-left"/>
                <span class="Tip">do you already have an account?</span>
                <input type="submit" value="Login" class="button-blue-small button-right" id="LoginBT"/>
            </div>
        </form>
    </div>
<?php
} 

