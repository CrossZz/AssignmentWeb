<?php
/**

*Session Class
**/
//phien lam viec
class Session{
   public static function init(){
    if (version_compare(phpversion(), '5.4.0', '<')) {
          if (session_id() == '') {
              session_start();
          }
      } else {
          if (session_status() == PHP_SESSION_NONE) {
              session_start();
          }
      }
   }

   public static function set($key, $val){
      $_SESSION[$key] = $val;
   }

   public static function get($key){
      if (isset($_SESSION[$key])) {
       return $_SESSION[$key];
      } else {
       return false;
      }
   }

   public static function checkSession(){//kiem tra co dang nhap hay chua nếu chưa thì đưa về trang login
      self::init();
      if (self::get("adminlogin") == false) {
       self::destroy();
       header("Location:login.php");
      }
   }

   public static function checkLogin(){//nếu đã đăng nhập thành công thì đưa về trang index
      self::init();
      if (self::get("adminlogin")== true) {
       header("Location:index.php");
      }
   }

   public static function destroy(){//xóa phiên làm việc
    session_destroy();
    header("Location:index.php");
   }
}
?>
