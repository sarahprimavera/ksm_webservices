<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" 
              href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">
    </head>
    <body>
        <div class="container">

            <form class="well form-horizontal" action="" method="post"  id="signup">
                <fieldset>
            
                    <!-- Form Name -->
                    <legend><h2><b>Registration Form</b></h2></legend><br>
                
                    <!-- Text input-->
                
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name</label>  
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  name="username" placeholder="Name" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>
                
                    <!-- Text input-->
                
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Password</label> 
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="user_password" placeholder="Password" class="form-control"  type="password">
                            </div>
                        </div>
                    </div>
                
                    <!-- Text input-->
                
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Confirm Password</label> 
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="confirm_password" placeholder="Confirm Password" class="form-control"  type="password">
                            </div>
                        </div>
                    </div>
                
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">E-Mail</label>  
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>
                
                
                    <!-- Text input-->
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">Phone Number</label>  
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="contact_no" placeholder="(XXX) XXX-XXXX " class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                
                    <!-- Button -->
                    <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4"><br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" name="signup" class="btn btn-dark" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSIGN UP<span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                    </div>
                    </div>
        
                </fieldset>
            </form>
        </div>
        </div><!-- /.container -->
    </body>
</html>