<?php

// set these configuration variables
$loginrequired = true; // change this to false if you dont want to use authentication

$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
mysql_select_db("mysite") or die(mysql_error());

$sql="select cpanel_passwd from admin";
$result=mysql_query($sql,$con);
$row=mysql_fetch_row($result);

$user = 'admin';  // change this to the username you would like to use
$pass = $row[0]; // change this too
$maxfilesize = '50000000000000'; // max file size in bytes
$hddspace = '50000000000000'; // max total size of all files in directory
$hiddenfiles = array('.htaccess','fileicon.gif','foldericon.gif','arrowicon.gif','styles.css','LICENSE.txt','index.php',	'index.php~'); // add any file names to this array which should remain invisible
$editon = false; // make this = false if you dont want the to use the edit function at all
$editextensions = array(); // add the extensions of file types that you would like to be able to edit
$makediron = true; // make this = false if you dont want to be able to make directories
$newdirpermissions = 0700;
$heading = '';
$downloadrate = 50000000000000; // 130000 bytes per second typical download speed for working out download times
$timezone = '';

$type['jpg'] = 'Image';
$type['jpeg'] = 'Image';
$type['gif'] = 'Image';
$type['psd'] = 'Photoshop';
$type['ai'] = 'Illustrator';
$type['eps'] = 'Image';
$type['bmp'] = 'Image';
$type['as'] = 'ActionScript';
$type['fla'] = 'Flash Source';
$type['swf'] = 'Flash';
$type['mov'] = 'Movie';
$type['mpeg'] = 'Movie';
$type['mpg'] = 'Movie';
$type['mp4'] = 'Movie';
$type['mp3'] = 'Audio';
$type['wav'] = 'Audio';
$type['wmv'] = 'Movie';
$type['avi'] = 'Movie';
$type['txt'] = 'Document';
$type['doc'] = 'Document';
$type['pdf'] = 'Document';
$type['htm'] = 'Web Page';
$type['html'] = 'Web Page';
$type['phtml'] = 'Web Page';
$type['phtm'] = 'Web Page';
$type['php'] = 'Web Page';
$type['asp'] = 'Web Page';
$type['jsp'] = 'Web Page';
$type['aspx'] = 'Web Page';
$type['cfm'] = 'Web Page';
$type['exe'] = 'Application';
$type['xls'] = 'Spread Sheet';
$type['zip'] = 'Compressed Archive';
$type['rar'] = 'Compressed Archive';
$type['gzip'] = 'Compressed Archive';
$type['tar'] = 'Compressed Archive';
$type['log'] = 'Log File';
$type['js'] = 'Javascript';
$type['css'] = 'Style Sheet';
/********************************************************************/
if($timezone != '') {
	putenv("TZ=$timezone"); 
}
$showlogin = false;
$msg = '';
$thisfilename = basename(__FILE__); // get the file name
$path = str_replace($thisfilename,'',__FILE__);   // get the directory path
session_start();

if($_REQUEST['user'] != '') {
	exit;
}
if(strpos($_REQUEST['pathext'],'..') !== false) {
	exit;
}
if(strpos($_REQUEST['delete'],'..') !== false) {
	exit;
}
if(strpos($_REQUEST['delete'],'/') !== false) {
	exit;
}

if($loginrequired === true) { // check to see if they are logged in ---------------------------------------------------------
	if($_SESSION['user'] != $user) {
		$showlogin = true;
	}
}

if($_GET['logoff']) {
	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
   	setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
	$showlogin = true;
	echo "<script>window.location='home.php'</script>";
}

if($_POST['login']) { // if the login button has been pressed ----------------------------------------------------------------
	if(!($_POST['u'] == $user && $_POST['password'] == $pass)) {
		$msg = "<span class='wf-error'>The login details were incorrect</span><br /><br />";
		$showlogin = true;
	} else {
		$_SESSION['user'] = $user;
		$showlogin = false;
	}
}

if($showlogin === true) { // if the login screen should be shown --------------------------------------------------------------
	$filemanager = "
	<table class='wf' border='0' cellspacing='0' cellpadding='20' width='100%'>
	<tr>
	<td>
	<span class='wf-heading'>$heading</span><br />
	<form name='wfform1' method='post' action='$_SERVER[PHP_SELF]'>
	$msg
	<center>
	<span class='wf-text'>User Name:</font><input type='text' name='u' /></span><br />
  	<span class='wf-text'>Password:</font><input type='password' name='password' /></span><br />
  	<input type='submit' name='login' value='Login' />
  	</center>
	</form>
	</td>
	</tr>
	</table>";
}



if($showlogin === false) {

	// test the directory to see if it can be opened, this is tested so that it does not try and open
	// and display the contents of directories which the user does not have persmission to view ---------------------------------
	if($_REQUEST['pathext']) {
		$newpath = substr($path.$_REQUEST['pathext'], 0, -1);   // remove the forward or backwards slash from the path
		$dir = @opendir($newpath);
		if($dir == false) { // if the directory could not be opened
			$_GET['back'] = 1; // go back to displaying the previous screen
		} else {
			@closedir($dir);
		}
	}
	
	if($_GET['back'] != '') { // if the back link was clicked ---------------------------------------------------------------------
		$_REQUEST['pathext'] = substr($_REQUEST['pathext'],0,-1);
		$slashpos = strrpos($_REQUEST['pathext'],'/');
		if($slashpos == 0) {
			$_REQUEST['pathext'] = '';	
		} else {
			$_REQUEST['pathext'] = substr($_REQUEST['pathext'],0,$slashpos+1);
		}
	}
	
	
	if($_GET['edit'] != '') { // if an edit link was clicked ----------------------------------------------------------------------
	
		$fp = fopen($path.$_REQUEST['pathext'].$_GET['edit'], "r");
		$oldcontent = fread($fp, filesize($path.$_REQUEST['pathext'].$_GET['edit']));
		fclose($fp);
		
		$filemanager = "
		<center>
		<table class='wf' border='0' cellspacing='0' cellpadding='20' width='100%'>
		<tr>
		<td>
		<span class='wf-heading'>$heading</span><br />
		<form name='form1' method='post' action='$_SERVER[PHP_SELF]'>
			  <center>
				<textarea name='newcontent' cols='45' rows='15'>$oldcontent</textarea>
				<br />
				<br />
				<input type='submit' name='save' value='Save'/>
				<input type='submit' name='cancel' value='Cancel' />
				<input type='hidden' name='u' value='$_POST[u]' />
				<input type='hidden' name='savefile' value='$_GET[edit]' />
				<input type='hidden' name='pathext' value='$_REQUEST[pathext]' />
			  </center>
		</form>
		</td>
		</tr>
		</table>
		</center>
		";
		
	}
	
	if ($_POST['upload'] != '') { // if the upload button was pressed --------------------------------------------------------------------------
		
		if($_FILES['uploadedfile']['name'] != '') { // if a file was actually uploaded 
			
			$_FILES['uploadedfile']['name'] = str_replace('%','',$_FILES['uploadedfile']['name']);  // remove any % signs from the file name
			// if the file size is within allowed limits
			
			if($_FILES['uploadedfile']['size'] > 0 && $_FILES['uploadedfile']['size'] < $maxfilesize) {
			
				// if adding the file will not exceed the maximum allowed total
				$hddtotal = dirsize($path); // get the total size of all files in the directory including any sub directorys
				if(($hddtotal + $_FILES['uploadedfile']['size']) < $hddspace) {
				
					// put the file in the directory
					move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $path.$_REQUEST['pathext'].$_FILES['uploadedfile']['name']);	
				} else {
					$msg = "<span class='wf-error'>There is not enough free space and the file could<br />not be uploaded.</span><br />";
				}
			} else {
				$maxkb = round($maxfilesize/1000); // show the max file size in Kb
				$msg =  "<span class='wf-error'>The file was greater than the maximum allowed file size of $maxkb Kb and could not be uploaded.</span><br />";
			}
		} else {
			$msg =  "<span class='wf-error'>Please press the browse button and select a file to upload before you press the upload button.</span><br />";
		}
	}
		
	if($_POST['save']) { // if the save button was pressed on the edit screen -------------------------------------------------------------------------
		$newcontent = stripslashes($newcontent);
		$fp = fopen($path.$_REQUEST['pathext'].$_POST['savefile'], "w");
		fwrite($fp, $newcontent);
		fclose($fp);
	}
	
	if($_GET['delete'] != '') { // if the delete link was clicked -------------------------------------------------------------------------------------
	
		// delete the file or directory
		if(is_dir($path.$_REQUEST['pathext'].$_GET['delete'])) {
			$result = @rmdir($path.$_REQUEST['pathext'].$_GET['delete']);
			if($result == 0) {
				$msg = "<span class='wf-error'>The folder could not be deleted. The folder must be empty before you can delete it. You also may not be authorised to delete this folder.</span><br />";
			}
		} else {
			if(file_exists($path.$_REQUEST['pathext'].$_GET['delete'])) {
				unlink($path.$_REQUEST['pathext'].$_GET['delete']);
			}
		}
	} 
	
	if($_POST['mkdir'] != '' && $makediron === true) { // if the make directory button was clicked ------------------------------------------------------
		if(strpos($path.$_REQUEST['pathext'].$_POST['dirname'],'.') === false) {
			$result = @mkdir($path.$_REQUEST['pathext'].$_POST['dirname'], $newdirpermissions);
			if($result == 0) {
				$msg = "<span class='wf-error'>The folder could not be created. Make sure the name you entered is a valid folder name.</span><br />";
			}
		}
	}
	
	if($filemanager == '') { // show the main screen -----------------------------------------------------------------------------------------------------
		$hddtotal = dirsize($path); // get the total size of all files in the directory including any sub directorys
		$freespace = round(($hddspace - $hddtotal)/1000); // work out how much free space is left
		$hddtotal = round($hddtotal/1000); // convert to Kb instead of bytes
		$hddspace = round($hddspace/1000); // convert to Kb instead of bytes
		$maxfilesizekb = round($maxfilesize/1000); // convert to Kb instead of bytes
	
		// if $makediron has been set to on show some html for making directories
		if($makediron === true) {
			$mkdirhtml = "<input type='text' name='dirname' size='15' /><input type='submit' name='mkdir' value='Make Directory' />";
		}
		
		// build the html that makes up the file manager
		// the $filemanager variable holds the first part of the html
		// including the form tags and the top 2 heading rows of the table which
		// dont display files
		$filemanager = "
		<center>
		<table class='wf' border='0' cellspacing='0' cellpadding='20' width='100%'>
		<tr>
		<td>
		<a href='$_SERVER[PHP_SELF]?logoff=1'>Log Off</a><br />
	
		<form name='form1' method='post' action='$_SERVER[PHP_SELF]' enctype='multipart/form-data'>
		<input type='hidden' name='MAX_FILE_SIZE' value='$maxfilesize' />
		$mkdirhtml <br /><input type='file' name='uploadedfile' />
		<input type='submit' name='upload' value='Upload' />
		<input type='hidden' name='u' value='$_REQUEST[u]' />
		<input type='hidden' name='pathext' value='$_REQUEST[pathext]' />
		
		</form>
		<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
		<tr class='wf-heading'> 
		<td width='25'>&nbsp;</td>
		<td><span class='wf-headingrow'>&nbsp;FILENAME&nbsp;</span></td>
		<td><span class='wf-headingrow'>&nbsp;TYPE&nbsp;</span></td>
		<td><span class='wf-headingrow'>&nbsp;SIZE&nbsp;</span></td>
		<td><span class='wf-headingrow'>&nbsp;LAST MODIFIED&nbsp;</span></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</tr>
		<tr class='wf-line'> 
		<td colspan='9' height='2'></td>
		</tr>";
	
	// if the current directory is a sub directory show a back link to get back to the previous directory
		if($_REQUEST['pathext'] != '') {
			$filemanager  .= "
			<tr>
			<td class='wf-lightcolumn'>&nbsp;<img src='arrowicon.gif' alt='back icon' />&nbsp;</td>
			<td class='wf-darkcolumn'>&nbsp;<a href='$_SERVER[PHP_SELF]?u=$_REQUEST[u]&amp;back=1&amp;pathext=$_REQUEST[pathext]'>&laquo;BACK</a>&nbsp;</td>
			<td class='wf-lightcolumn'></td>
			<td class='wf-darkcolumn'></td>
			<td class='wf-lightcolumn'></td>
			<td class='wf-darkcolumn'></td>
			<td class='wf-lightcolumn'></td>
			<td class='wf-darkcolumn'></td>
			<td class='wf-lightcolumn'></td>
			</tr>
			<tr class='wf-darkline'> 
			<td colspan='9' height='1'></td>
			</tr>";
		}
	
		// build the table rows which contain the file information
		$newpath = substr($path.$_REQUEST['pathext'], 0, -1);   // remove the forward or backwards slash from the path
		$dir = @opendir($newpath); // open the directory
		while($file = readdir($dir)) { // loop once for each name in the directory
			$filearray[] = $file;
		}
		natcasesort($filearray);
		
		foreach($filearray as $key => $file) {
		
			// check to see if the file is a directory and if it can be opened, if not hide it
			$hiddendir = 0;
			if(is_dir($path.$_REQUEST['pathext'].$file)) {
				$tempdir = @opendir($path.$_REQUEST['pathext'].$file);
				if($tempdir == false) { $hiddendir = 1;}
				@closedir($tempdir);
			}
			
			// if the name is not a directory and the name is not the name of this program file 
			if($file != '.' && $file != '..' && $file != $thisfilename && $hiddendir != 1) {
				$match = false;
				foreach($hiddenfiles as $name) { // for each value in the hidden files array
				
					if($file == $name) { // check the name is not the same as the hidden file name
						$match = true;	 // set a flag if this name is supposed to be hidden
					}
				}	
				
				if($match === false) { // if there were no matches the file should not be hidden
					
						$filedata = stat($path.$_REQUEST['pathext'].$file); // get some info about the file
						$encodedfile = rawurlencode($file);
						
						// find out if the file is one that can be edited
						$editlink = '';
						if($editon === true && !is_dir($path.$_REQUEST['pathext'].$file)) { // if the edit function is turned on and the file is not a directory
						
							$dotpos = strrpos($file,'.');
							foreach($editextensions as $editext) {
							
								$ext = substr($file, ($dotpos+1));
								if(strcmp($ext, $editext) == 0) {
									$editlink = "&nbsp;<a href='$_SERVER[PHP_SELF]?edit=$encodedfile&amp;u=$_REQUEST[u]&amp;pathext=$_REQUEST[pathext]'>EDIT</a>&nbsp;";
								}
							}
						}
						

						// create some html for a link to download files 
						$downloadlink = "<a href='./$_REQUEST[pathext]$encodedfile'>VIEW/DOWNLOAD</a>";

						// create some html for a link to delete files 
						$deletelink = "<a href='$_SERVER[PHP_SELF]?delete=$encodedfile&amp;u=$_REQUEST[u]&amp;pathext=$_REQUEST[pathext]'>DELETE</a>";
						
						// if it is a directory change the file name to a directory link
						if(is_dir($path.$_REQUEST['pathext'].$file)) {
							$filename = "<a href='$_SERVER[PHP_SELF]?u=$_REQUEST[u]&amp;pathext=$_REQUEST[pathext]$encodedfile/'>$file</a>";
							$fileicon = "&nbsp;<img src='foldericon.gif' alt='folder icon' />&nbsp;";
							$downloadlink = '';
							$filedata[7] = '';
							$downloadtime = '';
							$modified = '';
							$filetype = '';
							if($makediron === false) {
								$deletelink = '';
							}
						} else {
							$filename = $file;
							$fileicon = "&nbsp;<img src='fileicon.gif' alt='file icon' />&nbsp;";
							
							$pathparts = pathinfo($file);
							$filetype = $type[$pathparts['extension']];
							
							$modified = date('d-M-y g:ia',$filedata[9]);
							
							$downloadtime = round($filedata[7]/$downloadrate)+1;
							if($downloadtime > 59) {
								$downloadtime = round($downloadtime/60);
								if($downloadtime > 59) {
									$downloadtime = round($downloadtime/60);
									$downloadtime = $downloadtime.' hrs';
								} else {
									$downloadtime = $downloadtime.' min';
								}
							} else {
								$downloadtime = $downloadtime.' sec';
							}
							
							if($filedata[7] > 1024) {
								$filedata[7] = round($filedata[7]/1024);
								if($filedata[7] > 1024) {
									$filedata[7] = round($filedata[7]/1024);
									if($filedata[7] > 1024) {
										$filedata[7] = round($filedata[7]/1024,1);
										if($filedata[7] > 1024) {
											$filedata[7] = round($filedata[7]/1024);
												$filedata[7] = $filedata[7].'Tb';
										} else {
											$filedata[7] = $filedata[7].'Gb';
										}
									} else {
										$filedata[7] = $filedata[7].'Mb';
									}
								} else {
									$filedata[7] = $filedata[7].'Kb';
								}
							} else {
								$filedata[7] = $filedata[7].'b';
							}
						}
						
						// append 2 table rows to the $content variable, the first row has the file
						// informtation, the 2nd row makes a black line 1 pixel high
						
						$content .= "
						<tr>
						<td class='wf-lightcolumn'>$fileicon</td>
						<td class='wf-darkcolumn'>&nbsp;<span class='wt-text'>$filename</span>&nbsp;</td>
						<td class='wf-lightcolumn'>&nbsp;<span class='wt-text'>$filetype</span>&nbsp;</td>
						<td class='wf-darkcolumn'>&nbsp;<span class='wt-text'>$filedata[7]</span>&nbsp;</td>
						<td class='wf-lightcolumn'>&nbsp;<span class='wt-text'>$modified</span>&nbsp;</td>
						<td class='wf-darkcolumn'>&nbsp;$downloadlink&nbsp;</td>
						<td class='wf-lightcolumn'>&nbsp;$deletelink&nbsp;</td>
						<td class='wf-darkcolumn'>$editlink</td>
						</tr>
						<tr class='wf-darkline'> 
						<td colspan='9' height='1'></td>
						</tr>";
				}
			}
		}
		closedir($dir); // now that all the rows have been built close the directory
		$content .= "</table></td></tr></table></center>"; // add some closing tags to the $content variable
		$filemanager  .= $content; // append the html to the $filemanager variable
	}

}

function dirsize($dir) {
// calculate the size of files in $dir

	$dh = @opendir($dir);
	$size = 0;
	if($dh != false) { // dont go into this loop if the dir was not opened successfully
	
		while (($file = readdir($dh)) !== false) {
		
			if ($file != '.' and $file != '..') {
			
				$path = $dir.'/'.$file;
				if (is_dir($path)) {
				
					$size += dirsize("$path/");
				} elseif (is_file($path)) {
					$size += filesize($path);
				}
        	}
		}
		closedir($dh);
	}
	return $size;
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $heading?></title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<body bgcolor="#FFFFFF">
<?php echo $filemanager?>
</body>
</html>
