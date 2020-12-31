

<?php
    class Report{
      private $id;
      private $topic;
      private $course;
      private $groupMates;
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
      function setTopic($topic){
        $this->topic=$topic;
      }
      function setCourse($course){
        $this->course=$course;
      }
      function setGroupMates($groupMates){
        $this->groupMates=$groupMates;
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
      function getTopic(){
        return $this->topic;
      }
      function getCourse(){
        return $this->course;
      }
      function getGroupMates(){
        return $this->groupMates;
      }
      function getBody(){
        return $this->body;
      }
      function getUsername(){
        return $this->username;
      }
      

    }
?>
