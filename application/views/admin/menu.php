
<style>
    .popover{
        width: 300px;
    }

    .content-menu{
        width:150px;
        position:absolute;
        top:84px;
        left:0;
        z-index:10;
    }
    .item-menu{
        width:150px;
        height:75px;
        background:#1ABC9C;
        border-top:1px dotted #f1f1f1;
        padding:5px;
        text-align: center;
    }
    .item-menu:hover{
        background: #9ECC02;
        box-shadow: inset 0px 5px 20px #466101;
        /*cursor:url("../public_html/imagenes/ivss_logo_cursor.png"),auto;*/
        cursor:pointer;
    }

    .content-menu a{
        color:black;
        text-decoration: none;
        font-size: 1.3em;
    }

    .content-menu a:hover{
        cursor:pointer;
        color:black;
    }

    .item-menu p{
        font-size: 0.7em;
        margin-top: 5px;
        margin-bottom:5px;
    }

    .img_menu{
        width:40px;
        height:auto;
        margin:auto;
        margin-top:2px;
        opacity:0.7;
    }
</style>

<div class="content-menu">

    <a id="curriculum" class="item_panel_control" data-panel="panel_curriculum" data-original-title="Gestión de curriculum personal" data-content="" rel="popover" data-placement="right"  data-trigger="hover">
        <div class="item-menu">
            <img src="<?=$this->config->base_url();?>fronted/img/iconos2/curriculum.png" class="img_menu" />        
            <p>Curriculum</p>
        </div>
    </a>

    <a id="contacto" class="item_panel_control" data-panel="panel_contacto" data-original-title="Contacto "  data-content="" rel="popover" data-placement="right" data-trigger="hover">
        <div class="item-menu">
            <img src="<?=$this->config->base_url();?>fronted/img/iconos2/correo3.png" class="img_menu" />        
            <p>Contacto</p>
        </div>
    </a>

    <a id="galeria" class="item_panel_control" data-panel="panel_galeria" data-original-title="Galeria " rel="popover" data-placement="right" data-trigger="hover">
        <div class="item-menu">
            <img src="<?=$this->config->base_url();?>fronted/img/iconos2/galeria.png" class="img_menu" />        
            <p>Galeria</p>
        </div>
    </a>

    <a id="procedimientos" class="item_panel_control" data-panel="panel_procedimientos" data-original-title="Gestión de procedimientos" data-content="" rel="popover" data-placement="right" data-trigger="hover"> 
       <div class="item-menu">       
        <img src="<?=$this->config->base_url();?>fronted/img/iconos2/relax8.png" class="img_menu" />        
        <p>Procedimientos</p>
    </div>
</a>  

<a id="testimonios" class="item_panel_control" data-panel="panel_testimonios" data-original-title="Gestión de testimonios de pascientes" data-content="" rel="popover" data-placement="right" data-trigger="hover">
    <div class="item-menu">
        <img src="<?=$this->config->base_url();?>fronted/img/iconos2/usuarios.png" class="img_menu" />        
        <p>testimonios</p>
    </div>
</a>

<a href="salir" id="cerrar" data-content="Cerrar sesión" rel="popover" data-placement="right" data-trigger="hover">
    <div class="item-menu">         
        <img src="<?=$this->config->base_url();?>fronted/img/iconos2/back57.png" class="img_menu" />
        <p>Cerrar sesión</p>
    </div>
</a>

</div>


<script>
    $(document).on("ready",function(){
     $('#curriculum, #contacto, #procedimientos ,#testimonios ,#cerrar').popover({ trigger: "hover" });
 });
</script>