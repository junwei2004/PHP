<?php
   #mysqli_connect() 建立資料庫連結
   $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
   #mysqli_query() 從資料庫查詢資料
   $result=mysqli_query($conn, "select * from user");
   #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
   while ($row=mysqli_fetch_array($result)) {
     echo $row["id"]." ".$row["pwd"]."<br>";
   } 
?>

#while (條件) {程式}
#使用 mysqli_connect() 函式建立資料庫連線
#使用 mysqli_query() 函式從資料庫查詢資料
#使用 mysqli_fetch_array() 函式從查詢結果中逐一取出資料
#顯示每一筆資料的 id 和 pwd 欄位的值
