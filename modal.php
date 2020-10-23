<!-- MODAL -->
<div id="modal" class="modal">
        <div id="modal_content" class="modal_content">
        <span id="close" class="close">&times;</span>
            <div class="signlog">
                <button id="btnregis" >Registration</button>
                <button id="btnlog" >Log In</button>
            </div>
            <div class="forms">
                <div id="form1">
                    <h3>Student Registration</h3>

                    <form id="f1reset" action="" autocomplete="off">
                        <label for="stuname"><img class="icons" src="images/user-alt.svg"></img> Name</label><br>
                        <input id="stuname" type="text"name="name" placeholder="Name" required><br>
                        <label for="stuemail"><img class="icons" src="images/envelope.svg"></img> Email</label><br>
                        <input id="stuemail" type="text" name="email" placeholder="Email" required><br>
                        <label for="stupass"><img class="icons" src="images/key.svg"></img> New Password</label><br>
                        <input id="stupass" type="text" name="pass" placeholder="password" required><br>
                    </form>
                    <button onclick="addStu()">Register</button>
                </div>
                <div id="form2">
                    <h3>Student Login</h3>
                <form id="f2reset" action="" autocomplete="off">
                        <label for="stuemailC"><img class="icons" src="images/envelope.svg"></img> Email</label><br>
                        <input id="stuemailC" type="text" name="email" placeholder="Email" required><br>
                        <label for="stupassC"><img class="icons" src="images/key.svg"></img>Password</label><br>
                        <input id="stupassC" type="text" name="pass" placeholder="password" required><br>
                </form>
                <button onclick="logStu()">Login</button>
                </div>
                <span id="form_m" class="form_m"></span>
            </div>
        </div>
    </div>
    <!-- MODAL -->