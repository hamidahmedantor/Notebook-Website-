
<?php
    class Mail{
      private $id;
      private $title;
      private $from;
      private $to;
      private $subject;
      private $body;
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
      function setFrom($from){
        $this->from=$from;
      }
      function setTo($to){
        $this->to=$to;
      }
      function setSubject($subject){
        $this->subject=$subject;
      }
      function setBody($body){
        $this->body=$body;
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
      function getFrom(){
        return $this->from;
      }
      function getTo(){
        return $this->to;
      }
      function getSubject(){
        return $this->subject;
      }
      function getBody(){
        return $this->body;
      }
      
      function getUsername(){
        return $this->username;
      }
      

    }
?>
