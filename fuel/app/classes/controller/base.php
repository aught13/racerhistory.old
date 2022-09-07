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
namespace Controller;

class Base extends \Fuel\Core\Controller_Hybrid
{
	public function before()
	{
		parent::before();

		$this->current_user = null;

		foreach (\Auth::verified() as $driver)
		{
			if (($id = $driver->get_user_id()) !== false)
			{
				$this->current_user = \Model\Auth_User::find($id[1]);
			}
			break;
		}
                
                if (\Request::active()->controller == 'Controller\Admin' and !in_array(\Request::active()->action, ['login', 'logout'])) {
                    if (\Auth::check()) {
                        $admin_group_id = \Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
                        if (!\Auth::member($admin_group_id)) {
                            \Session::set_flash('error', e('You don\'t have access to the admin panel'));
                            \Response::redirect('/');
                        }
                    } elseif (!\Auth::check()) {
                        \Response::redirect('/');
                    } 
                }

		// Set a global variable so views can use it
		\View::set_global('current_user', $this->current_user);
                \Session::instance();
	}

}
