<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 两步验证视图
 * @author Kaijia Feng <fengkaijia@gmail.com>
 * @copyright 2013 Kaijia Feng
 * @license Dual-licensed proprietary
 * @link http://iplacard.com/
 * @package iPlacard
 * @since 2.0
 */

$this->ui->html('header', '<script src="'.static_url(is_dev() ? 'static/js/jquery.numeric.js' : 'static/js/jquery.numeric.min.js').'"></script>');
$this->load->view('header');?>

<?php echo form_open("account/twostep", array('class' => 'form-auth'));?>
	<h2 class="form-auth-heading">两步验证</h2>
	<?php echo validation_errors();?>
	<p>两步验证已经启用，请输入 Google 身份验证器中生成的六位数验证码。</p>
	<?php echo form_input(array(
		'name' => 'code',
		'class' => 'form-control',
		'placeholder' => '验证码',
		'required' => NULL
	));
	?>
	<label for="safe" class="checkbox">
		<?php echo form_checkbox('safe', true);?> 30 天内在此设备上不再要求两步验证
	</label>
	<?php echo form_button(array(
		'name' => 'submit',
		'content' => '确认',
		'type' => 'submit',
		'class' => 'btn btn-primary',
		'onclick' => 'loader(this);'
	));
	echo form_button(array(
		'content' => '无法接收验证码？',
		'type' => 'button',
		'class' => 'btn btn-link',
		'onclick' => onclick_redirect('account/sms/request')
	)); ?>
	
<?php echo form_close();?>

<?php
$this->ui->js('footer', '$("input[name=\'code\']").numeric();');
$this->ui->js('footer', 'form_auth_center();');
$this->load->view('footer'); ?>