<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="instafeed.min.js"></script>
<style>
	body{
		margin:0;
	}
	a{
		text-decoration:none;
	}
	#instafeed a{
		 margin:10px;
	}
</style>
<?php if(isset($_GET['access_denied'])){ ?>
<h2 style="color:red;">You must Authorized first X times. </h2>
<?php }?>

<?php 
if(isset($_GET['access_token'])){ ?>

<div width="100%">

<div style="background:#306088; width:100%;  height: 43px; border-bottom: 1px solid rgba(4, 40, 71, 0.8);">
		<div style="width:30%; float:left">&nbsp;
		</div>
		<div style="width:40%; float:left; text-align:right;;margin-top:8px;text-align: center;">
			<img src="http://localhost/rivalsolutions/projects/istafeed/istagram2.png" alt="Istagram" />
		</div>
		<div style="width:30%; float:right;padding-top: 7px">
			<div style="width:20%; float:left; text-align:right">
				<img style="width:30px" src="<?php echo $_GET['profile_picture'];?>" alt="user_photo"/>
			</div>
			<div style="width:20%;float:left; color:FFF; padding:7px;">
				<h5 style="margin:0"><?php echo $_GET['username'];?></h5>
			</div>
		</div>
</div>
	<div style="width:50%; margin:0 auto; margin-top:20px;">
			<table width="50%" cellpadding="0" cellspacing="0" border="0" align="center">
				<tr>
					<td>
						<img  style="border-radius: 100px"src=" <?php echo $_GET['profile_picture'];?>" alt="user_photo" />
					</td>

					<td>
						<h2 style="color:red"> <?php echo $_GET['username'];?></h2>
					</td>
					
				</tr>
			</table>
	</div>
	<div style="width:50%;min-height: 300px; margin:0 auto;margin-top:20px; padding: 10px;border: 1px solid  pink; border-radius: 5px">
		<div  style="width:100%; float:left; border-bottom:2px pink;;border-bottom: 1px solid pink;margin-bottom: 10px">
			<div style="width:50%; float:left;"><h3 style="color:#CC3399"> Istagram Posts</h3></div>
			<div style="width:50%; float:right; text-align: right; margin-top: 15px;"><a onclick="revoke_access();" target="_blank" style="background: #eea740 none repeat scroll 0 0;border: medium none;color: #fff;padding: 8px 15px;" href="https://www.instagram.com/accounts/manage_access/">Revoke Access</a> </div>
		</div>
		<div style="width:100%;">
			<div id="instafeed"></div>	
		</div>
	</div>
<?php }else{ ?>
<div style="padding:10px;">
	<a style="background: #eea740 none repeat scroll 0 0;border: medium none;color: #fff;padding: 8px 15px;" href="https://www.instagram.com/oauth/authorize/?client_id=5aaae18dbe404152be5026d3733acf4e&redirect_uri=http://rival-solutions.com/projects/istafeed/istafeed_server.php&scope=likes+comments+public_content&response_type=code">Click here for Istagram Feed.</a>
</div>
<?php }?>


<script type="text/javascript">

var token =  '<?php echo $_GET["access_token"];?>';
    var feed = new Instafeed({
        get: 'user',
       // tagName: 'awesome',
	    userId:  '<?php echo $_GET["id"];?>',
        clientId: '5aaae18dbe404152be5026d3733acf4e',
		accessToken: token,
        template: '<a href="{{link}}"><img src="{{image}}" /></a>'
    });
    feed.run();
console.log(feed);

/*var feed = new Instafeed({
        get: 'user',
       clientId: '5aaae18dbe404152be5026d3733acf4e',
	   accessToken: '<?php //echo $_GET['access_token'];?>',
		userId:  <?php //echo $_GET['id'];?>,
          filter: function(image) {
            return image.tags.indexOf('TAG_NAME') >= 0;
        }
       
    });
    feed.run();  
	console.log(feed); */
	
	
	function revoke_access(){
		 window.location="http://rival-solutions.com/projects/istafeed/istafeed_client.php";
	}
</script>
