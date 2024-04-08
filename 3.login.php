<?php 
    if (($_POST["id"] == "john") && ($_POST["pwd"]=="john1234"))
        echo "登入成功";
    else
        echo "登入失敗";
?>

#if (條件) {…動作1} else {…動作2} elseif {…動作3}
#(…)內為判斷條件
#可搭配邏輯判斷子&& (and) 或 || (or)
#{…}內為執行程式
#如為單行程式可省用{ }
