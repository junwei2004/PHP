<?php
    session_start();
    unset($_SESSION["counter"]);
    echo "counter重置成功....";
    echo "<meta http-equiv=REFRESH content='2; url=8.counter.php'>";

?>

#啟動會話
#刪除名為 "counter" 的 session 變數
#顯示成功消息
#使用 <meta> 標籤在 HTML 標頭中設置重定向，將在2秒後導向到 8.counter.php 頁面
