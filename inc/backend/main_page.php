<?php defined('ABSPATH') or die("No script kiddies please!");
$apmega_settings      = get_option('apmega_settings');
$advanced_click       = ((isset($apmega_settings['advanced_click']))?$apmega_settings['advanced_click']:'');
$mlabel_animation_type       = ((isset($apmega_settings['mlabel_animation_type']))?$apmega_settings['mlabel_animation_type']:'none');
$animation_delay       = ((isset($apmega_settings['animation_delay']))?$apmega_settings['animation_delay']:'2s');
$animation_duration       = ((isset($apmega_settings['animation_duration']))?$apmega_settings['animation_duration']:'3s');
$animation_iteration_count       = ((isset($apmega_settings['animation_iteration_count']))?$apmega_settings['animation_iteration_count']:'1');
$enable_mobile        = ((isset($apmega_settings['enable_mobile']))?$apmega_settings['enable_mobile']:'');
$disable_submenu_retractor        = ((isset($apmega_settings['disable_submenu_retractor']))?$apmega_settings['disable_submenu_retractor']:'');
$mobile_toggle_option = ((isset($apmega_settings['mobile_toggle_option']))?$apmega_settings['mobile_toggle_option']:'');
$close_menu_icon      = ((isset($apmega_settings['close_menu_icon']))?$apmega_settings['close_menu_icon']:'dashicons dashicons-menu');
$open_menu_icon       = ((isset($apmega_settings['open_menu_icon']))?$apmega_settings['open_menu_icon']:'dashicons dashicons-no');
$image_size           = ((isset($apmega_settings['image_size']))?$apmega_settings['image_size']:'thumbnail');
$custom_width         = ((isset($apmega_settings['custom_width']))?$apmega_settings['custom_width']:'');
$hide_icons           = ((isset($apmega_settings['hide_icons']))?$apmega_settings['hide_icons']:'');
$icon_width           = ((isset($apmega_settings['icon_width']))?$apmega_settings['icon_width']:'');

$enable_custom_css    = ((isset($apmega_settings['enable_custom_css']) && $apmega_settings['enable_custom_css'] == 1)?'1':'0');
$enable_custom_js    = ((isset($apmega_settings['enable_custom_js']) && $apmega_settings['enable_custom_js'] == 1)?'1':'0');
$custom_css           = ((isset($apmega_settings['custom_css']))?$apmega_settings['custom_css']:'');
$custom_js           = ((isset($apmega_settings['custom_js']))?$apmega_settings['custom_js']:'');

$theme_object = new AP_Theme_Settings();
$custom_theme = $theme_object->get_custom_theme_data('');

?>
<div class="apmm-settings-main-wrapper">
	<div class="apmm-header">
	<?php include_once('panel_head.php');?>
    </div>

    <?php if(isset($_GET['error_message'])){
    if($_GET['error_message'] == 1){ ?>
        <div class="notice notice-error apmm-message">
			<p><?php _e('Something went wrong. Please try again later.',APMM_TD);?></p>
		</div>
    <?php }else if($_GET['error_message'] == 2){?>
         <div class="notice notice-error apmm-message">
			<p><?php _e('Something went wrong. Please check the write permission of temp folder inside the plugin\'s folder',APMM_TD);?></p>
		</div>
    <?php }else if($_GET['error_message'] == 3){?>
         <div class="notice notice-error apmm-message">
			<p><?php _e('Invalid File Extension',APMM_TD);?></p>
		</div>
    <?php }else if($_GET['error_message'] == 4){?>
         <div class="notice notice-error apmm-message">
			<p><?php _e('No any file uploaded.',APMM_TD);?></p>
		</div>
    <?php }
     } ?>
      <?php if(isset($_GET['message'])){ 
      	if($_GET['message'] == 1){?>
         <div class="notice notice-success apmm-message">
			<p><?php _e('Settings Saved successfully.',APMM_TD);?></p>
		 </div>
    <?php }else if($_GET['message'] == 2){?>
         <div class="notice notice-success apmm-message">
			<p><?php _e('Restored Default Settings Successfully.',APMM_TD);?></p>
		 </div>
    <?php }else if($_GET['message'] == 3){ ?>
 <div class="notice notice-success apmm-message">
			<p><?php _e('Custom Theme imported successfully.',APMM_TD);?></p>
		 </div>
     <?php }
    } ?>

		<div class="container apmm-tab-container">
		    <div class="row">
		      <div class="col-sm-12">
		        <div class="col-xs-2"> 
		          <!-- Nav tabs -->
		          <ul class="nav nav-tabs1 tabs-left">
		            <li class="nav-tab-js"><a class="tab_settings nav-tab-js active" href="#general_settings" data-toggle="tab"><?php _e('General Settings',APMM_TD);?></a></li>
		            <li class="nav-tab-js"><a href="#image_settings" class="image_settings nav-tab-js" data-toggle="tab"><?php _e('Image Settings',APMM_TD);?></a></li>
		            <li class="nav-tab-js"><a href="#shortcode_menu_location" class="shortcode_settings nav-tab-js" data-toggle="tab"><?php _e('Shortcodes',APMM_TD);?></a></li>
		            <li class="nav-tab-js"><a href="#custom_theme_import" class="import_settings nav-tab-js" data-toggle="tab"><?php _e('Import/Export',APMM_TD);?></a></li>
		            
		     
		          </ul>
		        </div>
		        
				<div class="col-xs-10 apmm-content">
					<form action="<?php echo admin_url('admin-post.php'); ?>" method="post" enctype="multipart/form-data">
				                <input type="hidden" name="action" value="apmegamenu_save_settings" />
				                 <?php wp_nonce_field('apmegamenu-nonce','apmegamenu-nonce-setup');?>

						          <!-- Tab panes -->
						          <div class="tab-content">

						            <div class="tab-pane active" id="general_settings">
						            	<?php include_once('tabs/general-settings.php');?>
						            </div>
						              <div class="tab-pane" id="image_settings">
						            	<?php include_once('tabs/image-settings.php');  ?>
						            </div>
						            <div class="tab-pane" id="shortcode_menu_location">
						            	<?php include_once('tabs/shortcode-menu-location.php');?>
						            </div> 
						              <div class="tab-pane" id="custom_theme_import">
						            	<?php include_once('tabs/custom-theme-import.php');?>
						            </div> 
						            
						              <!--  <div class="tab-pane" id="global_settings">
						            	Global Settings
						            </div>  --> 
						          </div>

						    <div class="apmm-field-wrapper apmm-form-field">
				                <input type="submit" class="button button-primary" id="apmm-add-button" name="settings_submit" value="<?php _e('Save',APMM_TD);?>"/>
<input type="submit" class="button button-primary" id="restore_settings_btn" name="restore_old_settings" value="<?php _e('Restore Default Settings',APMM_TD);?>"/>
				            </div>
	
				                
				    </form>
				</div>

		      </div>
		      </div>

		</div>  

		
    
</div>

<?php include_once(APMM_PATH.'/inc/backend/sidebar-right.php');?>