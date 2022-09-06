<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * -----------------------------------------------------------------------------
 *  [!] NOTICE
 * -----------------------------------------------------------------------------
 *
 *  If you need to make modifications to the default configuration,
 *  copy this file to your 'app/config' folder, and make them in there.
 *
 *  This will allow you to upgrade FuelPHP without losing your custom config.
 *
 */

return array(
	/**
	 * -------------------------------------------------------------------------
	 *  Regular
	 * -------------------------------------------------------------------------
	 *
	 *  Regular form definitions.
	 *
	 */

	'prep_value'           => true,
	'auto_id'              => true,
	'auto_id_prefix'       => 'form_',
	'form_method'          => 'post',
	'form_template'        => "\n{open}\n{fields}\n{close}\n",
	'fieldset_template'    => "\n\t\t{open}\n{fields}\n\t\t{close}\n",
	'field_template'       => "{field}",
	'multi_field_template' => "{fields} {field} {label} {fields}",
	'error_template'       => '<span>{error_msg}</span>',
	'group_label'          => '<span>{label}</span>',
	'required_mark'        => '*',
	'inline_errors'        => false,
	'error_class'          => null,
	'label_class'          => null,

	
);
