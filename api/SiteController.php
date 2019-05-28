<?php 

/**
 * summary
 */

require "Controller.php";
require "../yazlab3/db.php";
class SiteController extends Controller
{
    /**
     * summary
     */
   
    public function index(){
    	echo "manga";
    }

    public function all_news(){
    	$db = new db();
    	$db2["news"] = $db->news();
		print_r(json_encode($db2));
    }

    public function all_category(){
        $db = new db();
        print_r(json_encode($db->cat_list()));
    }

    public function news_detail($id){
        $db = new db();
        print_r(json_encode($db->news_detail(db::temizle($id))));
    }

    public function firma_detail($id){
        $db = new db();
        print_r(json_encode($db->firma_detail(db::temizle($id))));
    }
    public function get_uname($id){
        $db = new db();
        print_r(json_encode($db->user_name(db::temizle($id))));
    }

    public function get_catname($id){
        $db = new db();
         //print_r(json_encode($db->category_name(db::temizle($id))));
         echo $db->category_name(db::temizle($id));
    }
    public function like($id){
        $db = new db();
        print_r(json_encode($db->news_like(db::temizle($id))));
    }
    public function un_like($id){
        $db = new db();
        print_r(json_encode($db->news_unlike(db::temizle($id))));
    }
    public function firma_cat($id){
        $db = new db();
        print_r(json_encode($db->firmalar_cat(db::temizle($id))));
    }
    public function register(){
        //echo "manga";
 $email = $_GET["email"];
 $password = $_GET["password"];
 $name = $_GET["name"];

      
 $db = new db();
             if($db->register($email,$password,$name)){
         print_r(json_encode("true"));
       }else{
               print_r(json_encode("false"));
           } 
      
    }
        public function change_pw(){
        //echo "manga";
 $email = $_GET["email"];
 $password = $_GET["password"];
 $name = $_GET["name"];

      
 $db = new db();
             if($db->change_pw($email,$password,$name)){
         print_r(json_encode("true"));
       }else{
               print_r(json_encode("false"));
           } 
      
    }
       public function login(){
        //echo "manga";
 $email = $_GET["email"];
 $password = $_GET["password"];
 $db = new db();
             if($db->login($email,$password)){
         print_r(json_encode("true"));
       }else{
               print_r(json_encode("false"));
           } 
      
    }

}
 ?>

