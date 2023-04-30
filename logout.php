<?php session_start()?>

<?php
    unset($_SESSION['user']);
?>
<script>
    window.location.href = 'login.php'; // 通常の遷移
</script>