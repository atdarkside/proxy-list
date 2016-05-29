<?
    unlink("proxy.txt");
    $url = "**********************";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html =  curl_exec($ch);
    $start = mb_strpos($html,"<tbody>") + 7;
    $end = mb_strpos($html,"</tbody>");
    $str1 = mb_substr($html,$start,$end - $start);
    $vowels = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","<",">");
    $str2 = str_replace($vowels, "", "$str1");
    $str2 = str_replace("/",":","$str2");
    $str2 = str_replace(" ","","$str2");
    $str3 = explode("\n", $str2);
    $cnt = count($str3);
    $file = fopen("proxy.txt","a");
    for($i = 0;$i < $cnt;$i++){
        $x = 0;
        foreach(str_split($str3[$i]) as $value){
            if($value === ":"){
                $x++;
            }
            if($x <= 1){
                $val[$i] = $val[$i].$value;
            }
        }
        fwrite($file,$val[$i]."\n");
        echo($val[$i]."\n");
    }
    curl_close($ch);
?>
