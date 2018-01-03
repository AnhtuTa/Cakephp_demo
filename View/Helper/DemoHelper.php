<?php
    // Mục đích của Helper là tạo ra các thư viện mà
    // có thể sử dụng ở bất cứ đâu trong View. Trong 
    // Cakephp cũng có hỗ trợ chúng ta nhiều Helper 
    // như: form, html, ajax, number, session, rss, xml, time….

    // Chú ý rằng AppHelper là lớp cha cho mọi Helper. 
    // Vì vậy khi tạo ra một Helper mới, bạn có thể 
    // extends(kế thừa) từ AppHelper hoặc từ một 
    // Helper nào đó có sẵn của CakePHP như: HtmlHelper,…

    class DemoHelper extends AppHelper {
        function randomString($option=10){
        $int = rand(0,51);
        $a_z = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $rand_letter = $a_z[$int];
        for($i=1;$i<$option;$i++){
            $temp = rand(0,51);
            $rand_letter.= $a_z[$temp];
        }
        return $rand_letter;
    }
}