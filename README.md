﻿# 資料庫課堂作業

努力的把作業做出來了，需先架設 MySQL 資料庫並讀取 stust.sql

* 查詢畫面

![]()
* 題目與心得：

1. 擷取所有主修（Major）為 CS 的學生姓名及學號。

        心得:做出來了，而且可以輸入其他課程名稱來查詢（不過資料庫的主修並沒有其他課程）

2. 擷取所有在 07 年及 05 年由 King 教授所開的課程名稱。

        心得:功能有做，不過查詢其他年份的功能

3. 每㇐學期由 King 教授所開的課程，擷取其課程編號、學期（Semester） 、學年（Year） 及修課的學生人數。

        心得:要求功能完成，也可以查詢其他教授的開課（差點忘了Anderson 教授有兩門課）

4. 擷取每個學生的姓名與成績單。成績單內容包括每門已修完的課程名稱、課程編號、學分數、學期、學年及成績。

        心得:完成，設定成可以個別查詢學生
        （把 Ans4.php 裡的 "st.Name = '$Name' AND" 刪除就能一次看到所有學生的成績 ）

5. 擷取每科成績全都為 A 的所有學生的姓名與主修系所名稱。

        心得:絞盡腦汁想出來如何篩選成績全為 A 的語法，一樣增加了可以查看其他 B,C 之類的成績，不過這題難度好高，最麻煩的部分是不能在 WHERE 之後使用 COUNT （看向教授上課講解考卷的語法），但還是完成了
