

<?php
    class User{
      private $id;
      private $name;
      private $email;
      private $phone;
      private $bloodGroup;
      private $picture;
      private $username;
      private $password;
      /*function __construct($name,$email,$phone,$bloodGroup,$picture,$username,$password){
        //$this->id=$id;
        $this->name=$name;
        $this->email=$email;
        $this->phone=$phone;
        $this->bloodGroup=$bloodGroup;
        $this->picture=$picture;
        $this->username=$username;
        $this->password=$password;
      }*/
      function setId($id){
        $this->id=$id;
      }
      function setName($name){
        $this->name=$name;
      }
      function setEmail($email){
        $this->email=$email;
      }
      function setPhone($phone){
        $this->phone=$phone;
      }
      function setBloodGroup($bloodGroup){
        $this->bloodGroup=$bloodGroup;
      }
      function setPicture($picture){
        $this->picture=$picture;
      }
      function setUsername($username){
        $this->username=$username;
      }
      function setPassword($password){
        $this->password=$password;
      }

      function getId(){
        return $this->id;
      }
      function getName(){
        return $this->name;
      }
      function getEmail(){
        return $this->email;
      }
      function getPhone(){
        return $this->phone;
      }
      function getBloodGroup(){
        return $this->bloodGroup;
      }
      function getPicture(){
        return $this->picture;
      }
      function getUsername(){
        return $this->username;
      }
      function getPassword(){
        return $this->password;
      }

    }
?>
