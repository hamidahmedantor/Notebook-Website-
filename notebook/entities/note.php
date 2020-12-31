

<?php
    class Note{
      private $id;
      private $title;
      private $body;
      private $picture;
      private $username;            
      
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
      function setTitle($title){
        $this->title=$title;
      }
      function setBody($body){
        $this->body=$body;
      }
      function setPicture($picture){
        $this->picture=$picture;
      }
     
      function setUsername($username){
        $this->username=$username;
      }
      

      function getId(){
        return $this->id;
      }
      function getTitle(){
        return $this->title;
      }
      function getBody(){
        return $this->body;
      }
      function getPicture(){
        return $this->picture;
      }
      
      function getUsername(){
        return $this->username;
      }
      

    }
?>
