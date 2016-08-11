

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sistem Pengurusan Barangan Pos : eParcel</title>
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="stylesheet" type="text/css" href="http://upahbuatsistemphp.com/eparcel/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://upahbuatsistemphp.com/eparcel/assets/css/bootstrap.cus.css">  
    <link rel="stylesheet" type="text/css" href="http://upahbuatsistemphp.com/eparcel/assets/css/bootstrap_custom.css"> 
    <link rel="stylesheet" type="text/css" href="http://upahbuatsistemphp.com/eparcel/assets/css/sistemkik.css"/>
    <link rel="stylesheet" type="text/css" href="http://upahbuatsistemphp.com/eparcel/assets/css/bootstrap-datatables.css">
    <link rel="stylesheet" type="text/css" href="http://upahbuatsistemphp.com/eparcel/assets/css/datepicker.css"> 
    
    <script src="http://upahbuatsistemphp.com/eparcel/assets/js/jquery-1.10.2.min.js"></script>
    <script src="http://upahbuatsistemphp.com/eparcel/assets/js/bootstrap.js"></script>
    <script src="http://upahbuatsistemphp.com/eparcel/assets/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript" src="http://upahbuatsistemphp.com/eparcel/assets/js/jquery.dataTables.nightly.js"></script>
    <script type="text/javascript" src="http://upahbuatsistemphp.com/eparcel/assets/js/bootstrap-datatables.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://upahbuatsistemphp.com/eparcel/assets/js/FixedColumns.nightly.js"></script> 
  
    <script>

  (function($)
     {
       var methods = 
         {
           init : function( options ) 
           {
             return this.each(function()
               {
                 var _this=$(this);
                     _this.data('marquee',options);
                 var _li=$('>li',_this);
                     
                     _this.wrap('<div class="slide_container"></div>')
                          .height(_this.height())
                         .hover(function(){if($(this).data('marquee').stop){$(this).stop(true,false);}},
                                function(){if($(this).data('marquee').stop){$(this).marquee('slide');}})
                          .parent()
                          .css({position:'relative',overflow:'hidden','height':$('>li',_this).height()})
                          .find('>ul')
                          .css({width:screen.width*2,position:'relative'});
             
                     for(var i=0;i<Math.ceil((screen.width*3)/_this.width());++i)
                     {
                       _this.append(_li.clone());
                     } 
               
                 _this.marquee('slide');});
           },
        
           slide:function()
           {
             var $this=this;
             $this.animate({'top':$('>li',$this).height()*-1},
                           $this.data('marquee').duration,
                           'swing',
                           function()
                           {
                             $this.css('top',0).append($('>li:first',$this));
                             $this.delay($this.data('marquee').delay).marquee('slide');
               
                           }
                          );                           
           }
         };
     
       $.fn.marquee = function(m) 
       {
         var settings={
                       'delay':4000,
                       'duration':2000,
                       'stop':true
                      };
         
         if(typeof m === 'object' || ! m)
         {
           if(m){ 
           $.extend( settings, m );
         }
   
           return methods.init.apply( this, [settings] );
         }
         else
         {
           return methods[m].apply( this);
         }
       };
     }
   )( jQuery );


   jQuery(document).ready(
     function(){jQuery('.some ul').marquee({delay:3000});}
   );

   </script>

  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
      })
    })
  </script> 

  <style type="text/css">

    body {
      background-image: url("images/background.png"); 
      background-repeat: repeat-x, no-repeat;
      font-family: Arial;
      font-size: 12px;
    }

  </style>

  <style>
    .btn{
      font-family: Arial;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;
      filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
      filter: progid:dximagetransform.microsoft.gradient(enabled=false);
      *zoom: 1;
      -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
         -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
              box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
              box-shadow: 4px 4px 4px #888888;
    }

    select,
    textarea,
    input[type="text"],
    input[type="password"],
    input[type="datetime"],
    input[type="datetime-local"],
    input[type="date"],
    input[type="month"],
    input[type="time"],
    input[type="week"],
    input[type="number"],
    input[type="email"],
    input[type="url"],
    input[type="search"],
    input[type="tel"],
    input[type="color"],
    .uneditable-input{

       border: 1px solid #cccccc;
      -webkit-border-radius: 3px;
         -moz-border-radius: 3px;
              border-radius: 3px;
      -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
         -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
      -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
         -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
          -ms-transition: border linear 0.2s, box-shadow linear 0.2s;
           -o-transition: border linear 0.2s, box-shadow linear 0.2s;
              transition: border linear 0.2s, box-shadow linear 0.2s;
        }

    .form-actions{
      background-color: #dddddd;

    }
    .btn-primary{
      background-color: #333;
    }

  </style>

  <style>
  .pagination ul > li > a, .pagination ul > li > span
  {
   
    border: 1px solid #ccc;
      -webkit-border-radius: 5px;
         -moz-border-radius: 5px;
              border-radius: 5px;
      -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
         -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
      -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
         -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
          -ms-transition: border linear 0.2s, box-shadow linear 0.2s;
           -o-transition: border linear 0.2s, box-shadow linear 0.2s;
              transition: border linear 0.2s, box-shadow linear 0.2s;   
  }
  .pagination ul > li > a:hover,
  .pagination ul > .active > a,
  .pagination ul > .active > span,
  .pagination ul > .MarkupPagerNavOn > a,
  .pagination ul > .MarkupPagerNavOn > span {
    background-color: #333;
  }
  
  }
  </style>

  <style>

    .modal{
          width: 360px;
    }

  </style>

  
  <script type="text/javascript">
      
      $(document).ready(function() {      
         $("#myModal").modal('show')
      });
          
  </script>


  <link rel="stylesheet" type="text/css" href="css/marquee.css">
    
  <script type="text/javascript">
      function logout() {
        var answer = confirm("Anda pasti ingin log keluar?")
        if (answer){
          window.location = "logout.php";
        }
        else{
          
        }
      }
  </script></head>

  <body>


  
  
    


    <div class="container layout_header">
        <img src="css/images/header2.png" alt="" width="958" height="100">    </div>

    
<style type="text/css">

	 .navbar-inner {
		 height:14px;
		 font-size:12px;
     f/* ont-weight:bold; */
		 font-family:Verdana, Geneva, sans-serif;
	   background-color: #DF344D; /* it's flat*/
		 background-image: -moz-linear-gradient(top, #333333, #222222);
		 background-image: -ms-linear-gradient(top, #333333, #222222);
		 background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#333333), to(#222222));
		 background-image: -webkit-linear-gradient(top, #333333, #222222);
		 background-image: -o-linear-gradient(top, #333333, #222222);
		 background-image: linear-gradient(top, #333333, #222222);
		 background-repeat: repeat-x;

     filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#333333', endColorstr='#222222', GradientType=0);	
	  }  

    .dropdown-menu > li > a:hover,
    .dropdown-menu > li > a:focus,
    .dropdown-submenu:hover > a,
    .dropdown-submenu:focus > a {
      text-decoration: none;
      color: #fff;
      background-color: #FFF;
      background-image: -moz-linear-gradient(top, #DF344D, #DF344D);
      background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#DF344D), to(#DF344D));
      background-image: -webkit-linear-gradient(top, #DF344D, #DF344D);
      background-image: -o-linear-gradient(top, #DF344D, #DF344D);
      background-image: linear-gradient(to bottom, #DF344D, #DF344D);
      background-repeat: repeat-x;
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#DF344D', endColorstr='#DF344D', GradientType=0);
     }

 </style>


<div class="navbar">
      <div class="navbar-inner">
        <div class="container ">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="index.php"><i class="icon icon-home icon-white"></i>Home</a></li>  
              <li class="active"></li>
              <li><a href="parcel_status.php">Terkini</a></li>    
              <li><a href="parcel_status.php">Semak Barang</a></li>
              <li><a href="parcel_status.php">Semak Barang</a></li>
              <li><a href="parcel_status.php">Semak Barang</a></li>
              <li><a href="hubungi.php">Hubungi Kami</a></li> 
              <!-- <li><a href="aduan.php">Aduan dan Maklum Balas</a></li>  -->
            </ul>
            <ul class="nav pull-right">
             <li class="pull-right"><a rel="facebox" href="login.php"><i class="icon icon-user icon-white"></i>Login</a></li>
            </ul> 
         </div>

       </div>
     </div>
</div>  


    <div  class="container layoutcontainer" style="text-transform:uppercase">
      <font size="2" face="Verdana, Geneva, sans-serif" color="#333"><strong>Sistem Pengurusan pusat tuisyen akademik gading </strong></font>    </div>
    <div class="container layoutcontainer" style="height:auto">  
        
<style>
    .btn{
      font-family: Arial;
     -webkit-border-radius: 5px;
     -moz-border-radius: 5px;
          border-radius: 5px;
      filter: progid:dximagetransform.microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
      filter: progid:dximagetransform.microsoft.gradient(enabled=false);
      *zoom: 1;
      -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
         -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
              box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 5px rgba(0, 0, 0, 0.05);
              box-shadow: 4px 4px 4px #888888;
    }

    .btn-primary{
      background-color: #333;
    }

</style>

<script>
  $(function(){
    window.prettyPrint && prettyPrint();
    $('#trkh').datepicker({
      format: 'dd/mm/yyyy'
    }); 
                       
  });
</script>


<script type="text/javascript">
  
    $(document).ready(function() {      
       $("#myModal").modal('show')
    });
          
</script>

<script type="text/javascript" charset="utf-8">
      $(document).ready( function () {
        var oTable = $('#kolej').dataTable( {
          "oLanguage": {"sUrl": "assets/js/dt.txt"},
          "sDom": '<"row"<"span6"l> f>rt<"bottom"ip><"clear">',
          "sScrollY": "250px",
          "bScrollCollapse": true,
          "bPaginate": true,
        } );
        new FixedColumns( oTable );
      } );
</script>
<script type="text/javascript">
  
  $(document).ready(function() {    
  $('[data-toggle="modal"]').click(function(e) 
  {
    e.preventDefault();
    var url = $(this).attr('href');
    if (url.indexOf('#') == 0) 
    {
      $(url).modal('open');
    }
    else 
    {
      $.get(url, function(data) 
      {
      $('<div class="modal hide fade" aria-hidden="true" style="width:650px; height:450px; margin:-250px 0 0 -360px;">' + data + '</div>').modal();
       }).success(function() 
       {
        $('input:text:visible:first').focus(); 
       });
    }
  });
});
    
</script>

<div class="accordion-group breadcrumb">
    <legend>
    <h4><strong><font color="#333" size="4">GUEST</font></strong></h4>
    </legend>
    <hr/>

    <form class="form-horizontal breadcrumb" action="" method="post" name="form1" id="form1" autocomplete="off"  >
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><br>
      </p>
    </form>

       

    
</div>
<br>
  <div class="breadcrumb well">
       <span><font size="2">Hakcipta Terpelihara &copy; <a href="#">Sistem Pengurusan Barangan Pos : eParcel </a> 2014</font></span></div>      
    </div> 
  </body>
</html>
           

