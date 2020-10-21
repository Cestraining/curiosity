<!-- MODAL -->
<div id="modal">
        <div id="modal_content">
        <span id="close">&times;</span>
            <div class="signlog">
                <button id="btnregis" >Registration</button>
                <button id="btnlog" >Log In</button>
            </div>
            <div class="forms">
                <div id="form1">
                    <h3>Student Registration</h3>

                    <form action="" autocomplete="off">
                        <label for="name"><img class="icons" src="images/user-alt.svg"></img> Name</label><br>
                        <input id="stuname" type="text" id="name" name="name" placeholder="Name" required><br>
                        <label for="email"><img class="icons" src="images/envelope.svg"></img> Email</label><br>
                        <input id="stuemail" type="text" id="email" name="email" placeholder="Email" required><br>
                        <label for="pass"><img class="icons" src="images/key.svg"></img> New Password</label><br>
                        <input id="stupass" type="text" id="pass" name="pass" placeholder="Name" required><br>
                    </form>
                    <button onclick="addStu()">Register</button>
                </div>
                <div id="form2">
                    <h3>Student Login</h3>
                <form action="" autocomplete="off">
                        <label for="email"><img class="icons" src="images/envelope.svg"></img> Email</label><br>
                        <input type="text" id="email" name="email" placeholder="Email" required><br>
                        <label for="pass"><img class="icons" src="images/key.svg"></img>Password</label><br>
                        <input type="text" id="pass" name="pass" placeholder="Name" required><br>
                </form>
                <button >Login</button>
                </div>
                <span id="form_m"></span>
            </div>
        </div>
    </div>
    <!-- MODAL -->