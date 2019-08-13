<?php
   
class Bontact_Widget_Block_Accountconfig extends Mage_Core_Block_Template
{

  private $bon;
   protected function _toHtml()
   { 
   $this->bon = Mage::getModel('bontact/bontact')->load(1);
   if ($this->getRequest()->getParam('bont-action')=="disconnect") 
	      {
			$this->saveWidgetId('');
			
		  }
if($this->bon->getWidgetId() != "")
{
	$html = '<div class ="logoa">
				<img calss="logo" src="http://bontact.com/wp-content/uploads/logo.png" alt="bontact">
			</div>
			<br/>
			<br/>
			<form class="" action="'.$this->curPageURL().'" method="get"  id="contact-form">
				<input type="hidden" name="bont-action" value="disconnect" />
            
            <button type="submit" id="send" class="btn btn-success">Disconnect</button>
          </form>';
}
else
{
if ($this->getRequest()->getParam('bont-action')=="loginup") 
	      {
			  $data_return = json_decode(file_get_contents("https://dashboard.bontact.com/api/bontactapi.aspx?func=signup&username=".$this->getRequest()->getParam('username')."&password=".$this->getRequest()->getParam('password')."&package=free&telephone=".$this->getRequest()->getParam('tel')."&usertype=71"));
   if($data_return->status==true)
   {
	 $this->saveWidgetId($data_return->token);  
   }
   else
   {
   $html = '
         <div id="messagesbox"><ul class="messages"><li class="error-msg"><ul><li><div id="themessage">'.$data_return->message.'</div></li></ul></li></ul><br></div>
         ';
   }
			  
			  }
   if ($this->getRequest()->getParam('bont-action')=="login") 
	      {
	
   				$data_return = json_decode(file_get_contents("https://dashboard.bontact.com/api/bontactapi.aspx?func=login&username=".$this->getRequest()->getParam('username')."&password=".$this->getRequest()->getParam('password')));
   if($data_return->code==200)
   {
	 $this->saveWidgetId($data_return->token);  
   }
   else
   {
   $html = '
         <div id="messagesbox"><ul class="messages"><li class="error-msg"><ul><li><div id="themessage">'.$data_return->token.'</div></li></ul></li></ul><br></div>
         ';
   }
		 
   }
   else
   {
   $html .='
   <style>
   .wrap {
    margin: 10px 20px 0 2px;
}
   header {
    background: #534741;
    color: #fff;
    padding-top: 15px;
    padding-right: 15px;
    padding-bottom: 15px;
    padding-left: 15px;
}
.logoa {
    padding-top: 15px;
    padding-right: 15px;
    padding-bottom: 15px;
    padding-left: 15px;
}
.switch-but {
    line-height: 18px;
    color: #fff;
    float: right;
}
h4 {
    display: inline;
}
</style>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script type="text/javascript">jQuery.noConflict();</script>
    <script>
	jQuery(document).ready(function () {

    
		
		 
		
		jQuery("#linkup").click( function()
           {
			jQuery("#signin").show();
             jQuery("#signup").hide();
			
           }
						   );
						   
		  jQuery("#linkin").click( function()
           {
			jQuery("#signin").hide();
             jQuery("#signup").show();
			
           }
        );

});
		

	
	</script>
				
				<div id="signup" class="jumbotron col-md-8 ">
			<h3>
				You are just a few seconds away from engagement boost  ...
			</h3>
			<div class ="logoa">
				<img calss="logo" src="http://bontact.com/wp-content/uploads/logo.png" alt="bontact">
			</div>
			
			
			<header >
<h4>Create New Account</h4><span class="switch-but"><b>Already registered?</b> <a id="linkup" href="#" class="signin">Sign in</a></span>
</header>
			<div style="display:inline; height:20px ">
				&nbsp; 
			</div>
			<div id="err" style="display: none" class="alert alert-danger" role="alert"></div>
		<form class="" action="'.$this->curPageURL().'" method="get"  id="contact-form">
				<input type="hidden" name="bont-action" value="loginup" />
            <div class="form-group">
				 <div class="controls">
              <input type="text" name="username" id="emaila" placeholder="Enter your email" class="form-control">
				</div>
            </div>
            <div class="form-group">
              <input type="password" name="password" id="passa" placeholder="Type a password" class="form-control">
            </div>
			<div class="form-group">
              <input type="text" name="tel" id="tela" placeholder="Enter your phone number" class="form-control">
            </div>
            <button type="submit" id="send" class="btn btn-success">SIGN UP</button>
          </form>
			</div>
		
		<div id="signin" style="display: none" class="jumbotron col-md-8 ">
		<div class ="logoa">
				<img calss="logo" src="http://eldad.bontact.com/wp-content/uploads/logo.png" alt="bontact">
			</div>
			<header >
<h4>Sign In</h4><span class="switch-but"><b>Need an Account?</b> <a id = "linkin" href="#" class="signin">Register</a></span>
</header>
			<div style="display:inline; height:20px ">
				&nbsp; 
			</div>
			<div id="err" style="display: none" class="alert alert-danger" role="alert"></div>
			
		<form class="" action="'.$this->curPageURL().'" method="get"  id="contact-form">
							<input type="hidden" name="bont-action" value="login" />
            <div class="form-group">
				 <div class="controls">
              <input type="text" name="username" id="email" placeholder="Enter your email" class="form-control">
				</div>
            </div>
            <div class="form-group">
              <input type="password" name="password" id="pass" placeholder="Type a password" class="form-control">
            </div>
			  <button type="submit" id="sendin" class="btn btn-success">SIGN IN</button>
          </form>
			</div>
				
				
			
		</div>';
   }
   
}
		return $html;
   }

   private function curPageURL() {
      $pageURL = 'http';
      if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
      $pageURL .= "://";
      if ($_SERVER["SERVER_PORT"] != "80") {
      $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
      } else {
      $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
      }

      $pageURL = preg_replace("/\?.*$/", "", $pageURL);

      return $pageURL;
   }

  public function saveWidgetId($wigetid)
    {


                $db = Mage::getSingleton('core/resource')->getConnection('core_read');
				$tableName = Mage::getSingleton("core/resource")->getTableName("bontact");
                $result = $db->query("SELECT * FROM ".$tableName." LIMIT 1");
                if($result) {
        
                   if($row = $result->fetch())
                   {
                                      $conn = Mage::getSingleton('core/resource')->getConnection('core_write');
                                      $conn->query("update ".$tableName." set widgetid='".addslashes($wigetid)."'");
                   }else
                   {

                                    $conn = Mage::getSingleton('core/resource')->getConnection('core_write');
                                    $conn->query("insert into ".$tableName." values('','".addslashes($wigetid)."')");
 
                   }
                }

    }
   }
