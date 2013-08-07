<? session_start(); 
// Session 삭제 
unset($_SESSION['checkLogin']); 
session_destroy(); 
?>
<script>
location = "index.php";
</script>
