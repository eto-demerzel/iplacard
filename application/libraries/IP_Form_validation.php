<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Form Validation延伸类库
 * @package iPlacard
 * @since 2.0
 */
class IP_Form_validation extends CI_Form_validation {

	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * 不符合指定条件
	 */
	public function not($str, $field)
	{
		$param = explode('.', $field, 2);
		if(count($param) == 1)
			return !$this->{$param[0]}($str);
		return !$this->{$param[0]}($str, $param[1]);
	}
	
	/**
	 * 多项元素最大数量
	 */
	public function max_count($array, $val)
	{
		if(preg_match("/[^0-9]/", $val))
		{
			return false;
		}

		return (count($array) > $val) ? false : true;
	}
	
	/**
	 * 多项元素最小数量
	 */
	public function min_count($array, $val)
	{
		if(preg_match("/[^0-9]/", $val))
		{
			return false;
		}

		return (count($array) < $val) ? false : true;
	}
	
	/**
	 * 邮箱区域有效性检查
	 */
	public function valid_email_local($str)
	{
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", "{$str}@iplacard.com")) ? false : true;
	}
}

/* End of file IP_Form_validation.php */
/* Location: ./application/libraries/IP_Form_validation.php */