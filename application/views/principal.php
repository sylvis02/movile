<?php if($this->session->userdata('login_ok') == true){
$id_usuario=$this->session->userdata('id_usuario');
	$menu1="";
	$menu2="";
	$menu3="";
	$menu4="";
$ci = &get_instance();
	$ci->load->model("usuario_model");
	$submenus= $ci->usuario_model->getRolPermiso($id_usuario);
	foreach ($submenus->result() as $item) {
       		if($item->id_menu==1){
           		$menu1.="<li ><a href='".base_url().$item->url."'>".$item->nom_sub."</a></li>";
           	}
           	if($item->id_menu==2){
           		$menu2.="<li ><a href='".base_url().$item->url."'>".$item->nom_sub."</a></li>";
           	}
           	if($item->id_menu==3){
           		$menu3.="<li ><a href='".base_url().$item->url."'>".$item->nom_sub."</a></li>";
           		
           	}
           	if($item->id_menu==4){
           		$menu4.="<li ><a href='".base_url().$item->url."'>".$item->nom_sub."</a></li>";
           		
           	}
    }
?>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?php echo $this->session->userdata('username');?></a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url();?>movilizacion/solicitud"><i class='glyphicon glyphicon-home'></i>  Inicio</a></li>
      
        <li class="dropdown"> 
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span>  Administración   
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
           		<?php echo $menu1;?>
          </ul>
        </li>
         <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="glyphicon glyphicon-list-alt"></span>  Reportes
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
           		<?php echo $menu2;?>
          </ul>
        </li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-tag"></span>  Gestión Movilización
          
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
           		<?php echo $menu3;?>
          </ul>
        </li>
         <li class="dropdown">
          
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-wrench"></span>   Talleres
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
           		<?php echo $menu4;?>
          </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li><a href="<?php echo base_url();?>administracion/info"><span class="glyphicon glyphicon-file"></span> Info</a></li>
        <li><a href="<?php echo base_url();?>welcome/logout"><span class=" glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

<header class="page-header">
        <div class="row">
            <div class="col-md-1 col-md-offset-2">
		<img class="img-polaroid" src="<?php echo base_url();?>images/iconos/logo.png" style="width:65px;height:95px">
	   </div>
           <div class="col-md-6">
		<div class="barnner-title"><h1> SISTEMA DE GESTIÓN VEHICULAR</h1> </div>
           </div>
	</div>
</header>

<div class="container-fluid">
    <div id="cont" style="width:80%; margin:auto; padding-top:5;">  
      <div class="panel panel-default">
        <div  class='panel-heading'>
    	<?php 
      		if($this->uri->segment(2) == FALSE){
          	echo "<span class='glyphicon glyphicon-home'></span> | ".strtoupper($this->uri->segment(1,0));
      	}else{
        	if($this->uri->segment(3) == FALSE){
          	echo "<span class='glyphicon glyphicon-home'></span> | ".strtoupper($this->uri->segment(1,0))." | <a href='".base_url().$this->uri->segment(1,0)."/".$this->uri->segment(2, 0)."'>".strtoupper($this->uri->segment(2, 0))."</a>";
        }
      }
    ?>
    </div>
  </div>
</div>
</div>
<?php } else { redirect(base_url(), 'refresh');
		} ?>
