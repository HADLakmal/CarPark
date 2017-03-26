@extends('pages.home')

@section('header')
    Sign IN
    <nav>

        <ul>

            <li><a href="signIn">Sign IN</a></li>
            <li><a href="register">Register</a></li>
            <li><a href="about">About us</a></li>
            <li><a href="">Contact us</a></li>

        </ul>
    </nav>
@stop

@section('content')
    <form action="submitUser" method="post">
        {{csrf_field()}}
        {{--<input type="text" name="name">--}}


        <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">Title</label>
            <!--  dropdown list -->
            <div class="col-sm-10">
                <select name="dropTitle" id="drpOneTitle" tabindex="1" class="signupInputTitle" style="width:100px;position: relative;
                                   " required>
                    <option name="a" value="Mr.">Mr.</option>
                    <option name="a" value="Rev.">Rev.</option>
                    <option name="a" value="Mrs.">Mrs.</option>
                    <option name="a" value="Ms.">Ms.</option>
                </select>
            </div>
            <!-- end of dropdown list -->
        </div>


        <div class="form-group">
            <label for="inputtext1" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" name="inputFirstName" class="form-control" id="inputFirstName" placeholder="Enter Your First Name here " required>

            </div>
        </div>

        <div class="form-group">
            <label for="inputStreet2" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" name="inputLastName" class="form-control" id="inputLastName" placeholder="Enter Your Last Name here " required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputTown" class="col-sm-2 control-label">Select your town</label>
            <div class="col-sm-10">
                <input type="text" name="inputTown" class="form-control" id="inputTown" placeholder="Enter Your Town Here " required>
            </div>
        </div>


        <div class="form-group">
            <label for="inputtext1" class="col-sm-2 control-label">NIC/Passport</label>
            <div class="col-sm-10">
                <input type="text" name="inputNic" class="form-control" id="inputNic" placeholder="NIC/Passport " required>
            </div>
        </div>


        <div class="form-group">
            <label for="inputMobile" class="col-sm-2 control-label">Mobile Number</label>
            <div class="col-sm-10">
                <input type="text" name="inputMobile" class="form-control" id="inputMobile" onclick="testing()" placeholder="Enter Your Mobile Number Here " required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Enter Your Email Here">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword1" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="inputPassword" class="form-control" onchange="validatePassword(inputPassword,inputPassword2)" id="inputPassword" placeholder="Password" required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword2" class="col-sm-2 control-label">Reenter Password</label>
            <div class="col-sm-10">
                <input type="password" name="inputPassword2"  class="form-control" onchange="validatePassword()" id="inputPassword2" placeholder="Reenter Password" required>
            </div>
        </div>



        <input style="margin: 20px 0;" type="checkbox"> Remember me



        <input  class="col-md-offset-3" style="width: 30%;" type="submit" name="submit"  value="submit" >
        {{--onclick="validatePassword(inputPassword,inputPassword2)"--}}
    </form>

@stop

<script type="text/javascript">
    function validatePassword() {

        if (document.getElementById("inputPassword").value != document.getElementById("inputPassword2").value  && document.getElementById("inputPassword2").value != ''  && document.getElementById("inputPassword").value != '') {

            window.alert("Passwords Dont Match");
            // pw2.setCustomValidity("Passwords Don't Match");
            // return false;
        }

    }
</script>


