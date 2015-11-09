<!DOCTYPE html>
<body>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
    <title>Gestion Vehicular</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css"  media="screen"/>
        <link  rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css" media="screen" />
    
</head>


<body>
    <section id="logo">
        <a href="#"><img src="<?php  base_url();?>iconos/logoimp.png" alt="" /></a>
        <h1 style="font-family: fantasy">GESTIÓN VEHICULAR añadido al git</h1>
    </section>


    <section class="container">
        <section class="row">
            <form action='<?php echo base_url();?>welcome/com_login' method="post" id="login" class="form-horizontal" role="login">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class='glyphicon glyphicon-user'></i></span>
                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name='login' required>
                </div>
                                    
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class='glyphicon glyphicon-wrench'></i></span>
                    <input type='password' name='passwd'  placeholder='Contraseña'class="form-control" required>
                </div>
                <div align="center"><input type='submit'  name='enviar' value='Ingresar'title='INGRESAR' class='btn btn-success'></div></td></tr>
                    
            </form>
                
         </section>
    </section>
</body>
</html>