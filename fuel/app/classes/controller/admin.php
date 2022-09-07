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

class Admin extends \Controller\Base {

    public function before() {
        parent::before();

        if (\Request::active()->controller !== 'Controller\Admin' or!in_array(\Request::active()->action, ['login', 'logout'])) {
            if (\Auth::check()) {
                $admin_group_id = \Config::get('auth.driver', 'Simpleauth') == 'Ormauth' ? 6 : 100;
                if (!\Auth::member($admin_group_id)) {
                    \Session::set_flash('error', e('You don\'t have access to the admin panel'));
                    \Response::redirect('/');
                }
            } else {
                \Response::redirect('admin/login');
            }
        }
    }

    public function action_login() {
        // Already logged in
        \Auth::check() and \Response::redirect('admin');

        $val = \Validation::forge();

        if (\Input::method() == 'POST') {
            $val->add('email', 'Email or Username')
                    ->add_rule('required');
            $val->add('password', 'Password')
                    ->add_rule('required');

            if ($val->run()) {
                if (!\Auth::check()) {
                    if (\Auth::login(\Input::post('email'), \Input::post('password'))) {
                        // assign the user id that lasted updated this record
                        foreach (\Auth::verified() as $driver) {
                            if (($id = $driver->get_user_id()) !== false) {
                                // credentials ok, go right in
                                $current_user = \Model\Auth_User::find($id[1]);
                                \Session::set_flash('success', e('Welcome, ' . $current_user->username));
                                \Response::redirect('');
                            }
                        }
                    } else {
                        $this->template->set_global('login_error', 'Login failed!');
                    }
                } else {
                    $this->template->set_global('login_error', 'Already logged in!');
                }
            }
        }

        $this->template->title = 'Login';
        $this->template->content = \View::forge('admin/login', ['val' => $val], false);
    }

    /**
     * The logout action.
     *
     * @access  public
     * @return  void
     */
    public function action_logout() {
        \Auth::logout();
        \Response::redirect('admin');
    }

    /**
     * The index action.
     *
     * @access  public
     * @return  void
     */
    public function action_index() {
        $this->template->title = 'Dashboard';
        $this->template->content = \View::forge('admin/dashboard');
    }

    public function action_register() {
        // is registration enabled?
        if (!\Config::get('application.user.registration', true)) {
            // inform the user registration is not possible
            \Session::set_flash('error', e('Registration Disabled'));

            // and go back to the previous page (or the homepage)
            \Response::redirect('admin');
        }

        // create the registration fieldset
        $form = \Fieldset::forge('registerform');

        // add a csrf token to prevent CSRF attacks
        $form->form()->add_csrf();

        // and populate the form with the model properties
        $form->add_model('Model\\Auth_User');

        // add the fullname field, it's a profile property, not a user property
        $form->add_after('fullname', 'Full Name', [], [], 'username')->add_rule('required');

        // add a password confirmation field
        $form->add_after('confirm', 'Confirm Password', ['type' => 'password'], [], 'password')->add_rule('required');

        $form->add('submit', '', ['type' => 'submit', 'value' => 'Add', 'class' => 'btn medium primary']);

        // make sure the password is required
        $form->field('password')->add_rule('required');

        // and new users are not allowed to select the group they're in (duh!)
        $form->disable('group_id');

        // since it's not on the form, make sure validation doesn't trip on its absence
        $form->field('group_id')->delete_rule('required')->delete_rule('is_numeric');

        // was the registration form posted?
        if (\Input::method() == 'POST') {
            // validate the input
            $form->validation()->run();

            // if validated, create the user
            if (!$form->validation()->error()) {
                try {
                    // call Auth to create this user
                    $created = \Auth::create_user(
                                    $form->validated('username'),
                                    $form->validated('password'),
                                    $form->validated('email'),
                                    \Config::get('application.user.default_group', 1),
                                    [
                                        'fullname' => $form->validated('fullname'),
                                    ]
                    );

                    // if a user was created succesfully
                    if ($created) {
                        // inform the user
                        \Session::set_flash('success', e('Account Created'));

                        // and go back to the previous page, or show the
                        // application dashboard if we don't have any
                        \Response::redirect_back('admin');
                    } else {
                        // oops, creating a new user failed?
                        \Session::set_flash('error', e('Account Creation failed'));
                    }
                }

                // catch exceptions from the create_user() call
                catch (\SimpleUserUpdateException $e) {
                    // duplicate email address
                    if ($e->getCode() == 2) {
                        \Session::set_flash('error', e('login.email-already-exists'));
                    }

                    // duplicate username
                    elseif ($e->getCode() == 3) {
                        \Session::set_flash('error', e('login.username-already-exists'));
                    }

                    // this can't happen, but you'll never know...
                    else {
                        \Session::set_flash('error', e('Odd'));
                    }
                }
            }

            // validation failed, repopulate the form from the posted data
            $form->repopulate();
        }

        // pass the fieldset to the form, and display the new user registration view
        $this->template->title = 'Register';
        $this->template->set('content', $form->build(), false);
    }

    public static function set_fields($properties, $fieldset) {
        
        foreach ($properties as $p => $settings) {
            if (\Arr::get($settings, 'skip')) {
                continue;
            }

            if (isset($settings['form']['options'])) {
                foreach ($settings['form']['options'] as $key => $value) {
                    is_array($value) or $settings['form']['options'][$key] = \Lang::get($value, [], false) ?: $value;
                }
            }

            // field attributes can be passed in form key
            $attributes = isset($settings['form']) ? $settings['form'] : [];
            // label is either set in property setting, as part of form attributes or defaults to fieldname
            $label = isset($settings['label']) ? $settings['label'] : (isset($attributes['label']) ? $attributes['label'] : $p);
            $label = \Lang::get($label, [], false) ?: $label;
            // create the field and add validation rules
            $field = $fieldset->add($p, $label, $attributes);
            if (!empty($settings['validation'])) {
                foreach ($settings['validation'] as $rule => $args) {
                    if (is_int($rule) and is_string($args)) {
                        $args = [$args];
                    } else {
                        array_unshift($args, $rule);
                    }

                    \call_fuel_func_array([$field, 'add_rule' ], $args);
                }
            }
        }
        return $fieldset;
    }

}

/* End of file admin.php */
