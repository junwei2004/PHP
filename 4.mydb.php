<?php
    #mysqli_connect() 建立資料庫連結
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
    #mysqli_query() 從資料庫查詢資料
    $result=mysqli_query($conn, "select * from user");
    #mysqli_fetch_array() 從查詢出來的資料一筆一筆抓出來
    $row=mysqli_fetch_array($result);
    echo $row["id"] . " " . $row["pwd"]."<br>"; 
    $row=mysqli_fetch_array($result);
    echo $row["id"] . " " . $row["pwd"];
?>

#步驟一：建立資料庫連結：
    mysqli_connect(ip,id,pwd,db);
    ip：資料庫所在位置，或localhost
    id：資料庫帳號
    pwd：資料庫密碼
    db：要連結的資料庫名稱
#步驟二：從資料庫查詢資料
    mysqli_query(連結變數, sql命令);
    連結變數：建立資料庫連結的變數
    sql命令：查詢表格的sql命令
#步驟三：從查詢出來的資料一筆一筆抓出來
    mysqli_fetch(查詢結果);
    查詢結果：用sql命令之查詢結果
    通常會搭配while指令，一筆一筆抓資料
#步驟四：抓取每個欄位資料
    $row["欄位名稱"]
    欄位名稱：表格內欄位名稱，可以0,1,2…來代替
    範例中，小數點.代表兩個字串相結合
