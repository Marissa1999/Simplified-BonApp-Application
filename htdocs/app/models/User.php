<?php

class User extends Model
{
    public function find($user_id)
    {
        $SQL = 'SELECT * FROM User WHERE user_id = :user_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        return $stmt->fetch();
    }

    public function findUser($email)
    {
        $SQL = 'SELECT * FROM User WHERE email LIKE :email';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['email' => $email]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        return $stmt->fetch();
    }

    public function create()
    {
        $SQL = 'INSERT INTO User(first_name, last_name, email, password, phone_number, birthday, postal_code, gender, user_language, newsletter, status, token) 
                     VALUES(:first_name, :last_name, :email, :password, :phone_number, :birthday, :postal_code, :gender, :user_language, :newsletter, :status, :token)';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['first_name' => $this->first_name, 'last_name' => $this->last_name,
                        'email' => $this->email, 'password' => $this->password,
                        'phone_number' => $this->phone_number, 'birthday' => $this->birthday,
                        'postal_code' => $this->postal_code, 'gender' => $this->gender,
                        'user_language' => $this->user_language, 'newsletter' => $this->newsletter,
                        'status' => $this->status, 'token' => $this->token]);
        return $stmt->rowCount();
    }

    public function updateStatus()
    {
        $SQL = 'UPDATE User
                   SET status = :status
                 WHERE user_id = :user_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['status' => $this->status, 'user_id' => $this->user_id]);
        return $stmt->rowCount();
    }

    public function updateProfile()
    {
        $SQL = 'UPDATE User
                    SET first_name = :first_name, 
                        last_name = :last_name, 
                        phone_number = :phone_number, 
                        birthday = :birthday, 
                        postal_code = :postal_code, 
                        gender = :gender,
                        user_language = :user_language, 
                        newsletter = :newsletter
                 WHERE user_id = :user_id';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['first_name' => $this->first_name, 'last_name' => $this->last_name,
                        'phone_number' => $this->phone_number, 'birthday' => $this->birthday,
                        'postal_code' => $this->postal_code, 'gender' => $this->gender,
                        'user_language' => $this->user_language, 'newsletter' => $this->newsletter,
                        'user_id' => $this->user_id]);
        return $stmt->rowCount();
    }
}

?>