
<div>
             
        <h2>Register Page</h2>
      
      
       <form id="register_form">
        <div class="form-group">
        <label for="pwd">UserName:</label>
        <input type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="pwd">UserMobile:</label>
        <input type="text" class="form-control" name="usermobile">
      </div>
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="useremail">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="userpassword">
      </div>
      <div class="form-group">
        <label for="pwd">Confirm Password:</label>
        <input type="password" class="form-control" name="usercpassword">
      </div>
     
      <button type="button" class="btn btn-default btn-register">Submit</button>
    </form> 

    <div class="msg"></div>
</div>

<?php
$this->load->view('footer');

?>
