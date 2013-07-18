<?php
/* 
Plugin Name: Webazia Time of background
Version: d4-1.0
Author: P.Kittiwat
Description: Admin choose time for change background.
*/

define("TBPATH",home_url("wp-content/plugins/webazia-timebackgroud/"));
define("TBDIRPATH",ABSPATH."wp-content/plugins/webazia-timebackgroud/");

$tb_db_version = "d4-1.0"; 

## Styles
function add_tb_css(){
		wp_register_style("add_tb_css", TBPATH . "timebackground.css");
		wp_enqueue_style('add_tb_css');
}
add_action('admin_print_styles', 'add_tb_css');

## Scripts
function add_tb_script(){
		wp_register_script("add_tb_script", TBPATH . "timebackground.js");
		wp_enqueue_script('add_tb_script');
		
}
add_action('admin_print_scripts', 'add_tb_script');


function tb_menu() {
	add_submenu_page('options-general.php', 'Time of Background', 'Time of Background', 2, __FILE__, 'tb_show');
}
add_action('admin_menu', 'tb_menu'); 


$table_name="wp_options";
$option_name="timebackground";
function tb_update($details){
	global $wpdb;
	global $table_name;
	global $option_name;
	
	$query_tb = $wpdb->get_results( "SELECT * FROM " . $table_name . " WHERE option_name ='".$option_name."' limit 1");
	if(empty($query_tb)){
		$results = $wpdb->query("INSERT INTO " . $table_name . " (option_name,option_value,autoload) values('".$option_name."','".$details."','no')");
	}else{
		$wpdb->get_results( "UPDATE " . $table_name . " SET option_value = '". $details."' WHERE option_name = '".$option_name."' ") ;
	}

	return $wpdb->insert_id;
}

	
function tb_show(){
	global $wpdb;
	global $table_name;
	global $option_name;

	if(isset($_POST['submit']))
		tb_update(serialize($_POST));
	

	$query_tb = $wpdb->get_results( "SELECT * FROM " . $table_name . " WHERE option_name ='".$option_name."' limit 	1");
	
	
	$val=unserialize($query_tb[0]->option_value);
	?>
	<div class="wrap timebackground">
	<div class="icon32" id="icon-options-general"><br></div>
	<h2> Time of Background </h2>
	
	<div class="updated fade">
		<p>You can create at <a href="admin.php?page=nggallery-add-gallery">Gallery</a> and manage gallery at <a href="admin.php?page=nggallery-manage-gallery">Manage Gallery</a>.</p>
	</div>
	
	<form method="POST">
	<table class="form-table">
			<tbody><tr valign="top" class="even">
			<th scope="row"><label for="Gallery">Gallery</label></th>
			<td><select  name="gid">
			<option value="0" ><?php _e('None', 'webazia-timebackground')?></option>
	<?php  nextGen_galleries_dropdown($val['gid']);?>
		</select></td>
			</tr>
			
		<tr valign="top" class="odd">
			<th scope="row"><label for="Gallery">Change every</label></th>
	<td>
	<input type="radio" name="options" <?php echo ($val['options']=='none')? 'checked="checked"':'';?>value="none"> None<br/>
	<input type="text" name="options_val" value="<?php echo ($val['options_val'])? $val['options_val']:0;?>" size="1"><i>(number)</i><br/>

	<input type="radio" name="options" <?php echo ($val['options']=='minute')? 'checked="checked"':'';?>value="minute"> Minute<br/>
	<input type="radio" name="options" value="hour" <?php echo ($val['options']=='hour')? 'checked="checked"':'';?>/> Hour<br/>
	<input type="radio" name="options" value="day" <?php echo ($val['options']=='day')? 'checked="checked"':'';?>/> Day<br/>
	<input type="radio" name="options" value="week" <?php echo ($val['options']=='week')? 'checked="checked"':'';?>/> Week<br/>
	<input type="radio" name="options" value="month" <?php echo ($val['options']=='month')? 'checked="checked"':'';?>/> Month<br/>
	<input type="radio" name="options" value="year" <?php echo ($val['options']=='year')? 'checked="checked"':'';?>/> Year<br/></td>
		</tr>
		
		</tbody>
	</table>
	<input type="hidden" name="timer" value="<?php echo date('H-i-n-j-Y');?>" />	
	<input type="hidden" name="start" value="0" />
	<p class="submit"><input type="submit" value="Save Changes" class="button-primary" id="submit" name="submit"></p>
	</form>
	</div>
<?php 


}

function tb_image(){
global $wpdb;
global $table_name;
global $option_name;

	$query_tb = $wpdb->get_results( "SELECT * FROM " . $table_name . " WHERE option_name ='".$option_name."' limit 	1");
	
$val=unserialize($query_tb[0]->option_value);

$images=ListImage_nextGen_gallery($val['gid']);

if($val['options']=='none'){
$val['start']=0;
}else{

	if(compareDate(date('H-i-n-j-Y'),$val['timer'],$val['options'],$val['options_val'])>=1){ 
		$val['timer']=date('H-i-n-j-Y');
		$val['start'] = (($val['start']+1)>=count($images))? 0 : $val['start']+1;
		
		tb_update(serialize($val));
		}
}
echo 'style="background-image:url(\''.home_url('wp-content/gallery/').$images[$val['start']]->name.'/'.$images[$val['start']]->filename.'\')"';
}


function compareDate($datenow,$datesystem,$case,$number) {
		$arrDate1 = explode("-",$datenow);
		$arrDate2 = explode("-",$datesystem);
		$timStmp1 = mktime($arrDate1[0],$arrDate1[1],0,$arrDate1[2],$arrDate1[3],$arrDate1[4]);
		$timStmp2 = mktime($arrDate2[0],$arrDate2[1],0,$arrDate2[2],$arrDate2[3],$arrDate2[4]);
$difftime=$timStmp1-$timStmp2;
$number=intval($number);
if($number==0||empty($number)) $number=1;

	switch($case){
		case 'minute': return $difftime/(60*$number);break;
		case 'hour':  return $difftime/(60*60*$number); break;
		case 'day':  return $difftime/(60*60*24*$number); break;
		case 'week':  return $difftime/(60*60*24*7*$number); break;
		case 'month':  return $difftime/(60*60*24*30*$number); break;
		case 'year':  return $difftime/(60*60*24*30*12*$number); break;
	}
}

?>