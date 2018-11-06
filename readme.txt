index.php

程式最一開始的進入點是index.php
然後就會檢查有沒有登入(if($_SESSION['user'] == ""))
要是沒有登入($_SESSION['user'] == "")
上面的navigation bar只會顯示首頁，News，DeepLearningmethods，Login，Register
有登入的話就是下面的else裡寫的項目

按下導覽列的"首頁"會從index.php的case ""顯示view/readMe.html的內容，目前功能尚未清楚定義。

按下導覽列的"News"會由index.php的case "News"出現view/news.html，顯示最新消息

按下導覽列的"DeepLearningMethods"會由index.php的case "DeepLearningMethods"出現view/deepLearningMethods.html，
會在左方導覽列列出儲存在資料庫裡的所有deepLearningMethod
並且可以依照分類來只列出特定分類的演算法，以ajax方式於model/showLList.php實作
點下其中一個就會以ajax方式從model/showContent.php取得資料後回傳到view/deepLearningMethods.html顯示
上面會有該algorithm的相關資訊

按下導覽列的"Login"會跳到ajax/member/login.php，從資料庫確認有無該組帳號，
確實有帳號的話就回到index.php並刷新導覽列

按下導覽列的"Register"會由index.php的case "Register"跳到view/regster.html，目前功能尚未清楚定義。

按下導覽列的"TeacherInfo"會由index.php的case "praetorLogin"跳到view/praetorLogin.html，會顯示登入教授的資訊以及該教授上傳過的所有演算法
並且點選其中一個演算法後會跳到view/ShowAlgorithm.html顯示該演算法的資訊
並且在view/ShowAlgorithm.html頁面中會有"更改資料"的選項
按下後會跳到view/editAlgorithm.html，送出後會跳到model/editAlgorithm.php把form存到資料庫並在該頁面顯示修改後的資訊
最後在下方有一個"add new method"，
按下後會跳到view/NewMethod.html，需要注意的是資料集和參數兩者的"新增"
按下"新增"button後會以ajax方式跳到model/addDataSet.php或model/addParemeter.php去增加欄位讓user填寫。
送出form後會在model/newAlgorithm.php把form存到資料庫並在該頁面顯示修改後的資訊

按下導覽列的"Logout"會清空存在$_SESSION['user']裡的值並跳回index.php
