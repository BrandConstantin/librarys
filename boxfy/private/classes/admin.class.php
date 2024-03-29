<?php

class Admin extends DatabaseObject {

    static protected $table_name = "user";
    static protected $db_columns = ['id', 'first_name', 'last_name', 'gender', 'birth_year',
        'username', 'address', 'city', 'state', 'zip', 'email', 'hashed_password', 'user_type'];
    public $id;
    public $first_name;
    public $last_name;
    public $gender;
    public $birth_year;
    public $username;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $email;
    protected $hashed_password;
    public $password;
    public $confirm_password;
    protected $password_required = true;
    public $user_type;

    const GENDERS = [
        1 => 'Male',
        2 => 'Famale',
        3 => 'I don\'t wanna specified'
    ];
    
    const STATES = [
        1 => 'Spain',
        2 => 'Portugal',
        3 => 'France',
        4 => 'Ingland',
        5 => 'Holand',
        6 => 'Italy',
        7 => 'Germany',
        8 => 'Romania',
        9 => 'Grece',
        10 => 'Monaco'
    ];

    public function __construct($args = []) {
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->gender = $args['gender'] ?? 3;
        $this->birth_year = $args['birth_year'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->address = $args['address'] ?? '';
        $this->city = $args['city'] ?? '';
        $this->state = $args['state'] ?? 1;
        $this->zip = $args['zip'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->confirm_password = $args['confirm_password'] ?? '';
        $this->user_type = $args['user_type'] ?? 2;
    }

    public function full_name() {
        return $this->first_name . " " . $this->last_name;
    }

    protected function set_hashed_password() {
        $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function verify_password($password) {
        return password_verify($password, $this->hashed_password);
    }

    protected function create() {
        $this->set_hashed_password();
        return parent::create();
    }

    protected function update() {
        if ($this->password != '') {
            $this->set_hashed_password();
            // validate password
        } else {
            // password not being updated, skip hashing and validation
            $this->password_required = false;
        }
        return parent::update();
    }

    protected function validate() {
        $this->errors = [];

        if (is_blank($this->first_name)) {
            $this->errors[] = "First name cannot be blank.";
        } elseif (!has_length($this->first_name, array('min' => 2, 'max' => 255))) {
            $this->errors[] = "First name must be between 2 and 255 characters.";
        }

        if (is_blank($this->last_name)) {
            $this->errors[] = "Last name cannot be blank.";
        } elseif (!has_length($this->last_name, array('min' => 2, 'max' => 255))) {
            $this->errors[] = "Last name must be between 2 and 255 characters.";
        }

        if (is_blank($this->email)) {
            $this->errors[] = "Email cannot be blank.";
        } elseif (!has_length($this->email, array('max' => 255))) {
            $this->errors[] = "Last name must be less than 255 characters.";
        } elseif (!has_valid_email_format($this->email)) {
            $this->errors[] = "Email must be a valid format.";
        }

        if (is_blank($this->username)) {
            $this->errors[] = "Username cannot be blank.";
        } elseif (!has_length($this->username, array('min' => 8, 'max' => 255))) {
            $this->errors[] = "Username must be between 8 and 255 characters.";
        } elseif (!has_unique_username($this->username, $this->id ?? 0)) {
            $this->errors[] = "Username not allowed. Try another username.";
        }

        if ($this->password_required) {
            if (is_blank($this->password)) {
                $this->errors[] = "Password cannot be blank.";
            } elseif (!has_length($this->password, array('min' => 8))) {
                $this->errors[] = "Password must contain 8 or more characters";
            } elseif (!preg_match('/[A-Z]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 uppercase letter";
            } elseif (!preg_match('/[a-z]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 lowercase letter";
            } elseif (!preg_match('/[0-9]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 number";
            } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 symbol";
            }

            if (is_blank($this->confirm_password)) {
                $this->errors[] = "Confirm password cannot be blank.";
            } elseif ($this->password !== $this->confirm_password) {
                $this->errors[] = "Password and confirm password must match.";
            }
        }

        return $this->errors;
    }

    static public function find_by_username($username) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
        $obj_array = static::find_by_sql($sql);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

}
