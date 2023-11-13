<?php 

function newurl($incoming_url){
	$al1 	= str_replace("Б","b",$incoming_url);
	$al2 	= str_replace("б","b",$al1);
	$al3 	= str_replace("Г","g",$al2);
	$al4 	= str_replace("г","g",$al3);
	$al5 	= str_replace("Д","d",$al4);
	$al6 	= str_replace("д","d",$al5);
	$al7 	= str_replace("Ё","o",$al6);
	$al8 	= str_replace("ё","o",$al7);
	$al9 	= str_replace("Ж","j",$al8);
	$al10 	= str_replace("ж","j",$al9);
	$al11	= str_replace("З","z",$al10);
	$al12 	= str_replace("з","z",$al11);
	$al13 	= str_replace("И","i",$al12);
	$al14 	= str_replace("и","i",$al13);
	$al15 	= str_replace("Й","y",$al14);
	$al16 	= str_replace("й","y",$al15);
	$al17 	= str_replace("Л","l",$al16);
	$al18 	= str_replace("л","l",$al17);
	$al19 	= str_replace("П","p",$al18);
	$al20 	= str_replace("п","p",$al19);
	$al21 	= str_replace("Ф","f",$al20);
	$al22 	= str_replace("ф","f",$al21);
	$al23 	= str_replace("Х","kh",$al22);
	$al24 	= str_replace("х","kh",$al23);
	$al25 	= str_replace("Ц","ts",$al24);
	$al26 	= str_replace("ц","ts",$al25);
	$al27 	= str_replace("Ч","c",$al26);
	$al28 	= str_replace("ч","c",$al27);
	$al29 	= str_replace("Ш","s",$al28);
	$al30 	= str_replace("ш","s",$al29);
	$al31 	= str_replace("Щ","sca",$al30);
	$al32 	= str_replace("щ","sca",$al31);
	$al33 	= str_replace("Ъ","-",$al32);
	$al34 	= str_replace("ъ","-",$al33);
	$al35 	= str_replace("Ы","i",$al34);
	$al36 	= str_replace("ы","i",$al35);
	$al37 	= str_replace("Ь","-",$al36);
	$al38 	= str_replace("ь","-",$al37);
	$al39 	= str_replace("Э","e",$al38);
	$al40 	= str_replace("э","e",$al39);
	$al41 	= str_replace("Ю","yu",$al40);
	$al42 	= str_replace("ю","yu",$al41);
	$al43 	= str_replace("Я","ya",$al42);
	$al44 	= str_replace("В","v",$al43);
	$al45 	= str_replace("Н","n",$al44);
	$al46 	= str_replace("н","n",$al45);
	$al47 	= str_replace("Р","r",$al46);
	$al48 	= str_replace("р","r",$al47);
	$al49 	= str_replace("С","s",$al48);
	$al50 	= str_replace("с","s",$al49);
	$al51 	= str_replace("у","u",$al50);
	$al52 	= str_replace("Д д","d",$al51);
	$al53 	= str_replace("я","ya",$al52);
	$al54 	= str_replace("к","k",$al53);
	$al55 	= str_replace("к","k",$al54);
	$al56 	= str_replace("м","m",$al55);
	$al57 	= str_replace("М","m",$al56);
	$al58 	= str_replace("т","t",$al57);
	$al59 	= str_replace("Т","t",$al58);
	$al60 	= str_replace("в","v",$al59);

	$url1 	= str_replace("?","",$al60);
	$url2 	= str_replace("!","",$url1);
	$url3 	= str_replace(",","-",$url2);
	$url4 	= str_replace("'","-",$url3);
	$url5 	= str_replace(".","-",$url4);
	$url6 	= str_replace("(","-",$url5);
	$url7 	= str_replace(")","-",$url6);
	$url8 	= str_replace(" ","-",$url7);
	$url9 	= str_replace("/","-",$url8);   
	$url10 	= str_replace("A","a",$url9);
	$url11 	= str_replace("B","b",$url10);
	$url12 	= str_replace("C","c",$url11);
	$url13 	= str_replace("Ç","c",$url12);
	$url14 	= str_replace("ç","c",$url13);
	$url15 	= str_replace("D","d",$url14);
	$url16 	= str_replace("E","e",$url15);
	$url17 	= str_replace("F","f",$url16);
	$url18 	= str_replace("G","g",$url17);
	$url19 	= str_replace("Ğ","g",$url18);
	$url20 	= str_replace("ğ","g",$url19);
	$url21 	= str_replace("H","h",$url20);
	$url22 	= str_replace("İ","i",$url21);
	$url23 	= str_replace("I","i",$url22);
	$url24 	= str_replace("ı","i",$url23);
	$url25 	= str_replace("J","j",$url24);
	$url26 	= str_replace("K","k",$url25);
	$url27 	= str_replace("L","l",$url26);
	$url28 	= str_replace("M","m",$url27);
	$url29 	= str_replace("N","n",$url28);
	$url30 	= str_replace("O","o",$url29);
	$url31 	= str_replace("Ö","o",$url30);
	$url32 	= str_replace("ö","o",$url31);
	$url33 	= str_replace("P","p",$url32);
	$url34 	= str_replace("R","r",$url33);
	$url35 	= str_replace("S","s",$url34);
	$url36 	= str_replace("Ş","s",$url35);
	$url37 	= str_replace("ş","s",$url36);
	$url38 	= str_replace("T","t",$url37);
	$url39 	= str_replace("U","u",$url38);
	$url40 	= str_replace("Ü","u",$url39);
	$url41 	= str_replace("ü","u",$url40);
	$url42 	= str_replace("V","v",$url41);
	$url43 	= str_replace("Y","y",$url42);
	$url44 	= str_replace("Z","z",$url43);
	$url45 	= str_replace("X","x",$url44);
	$url46 	= str_replace("Q","q",$url45);
	$url47 	= str_replace("W","w",$url46);
	$url48 	= str_replace("&","-",$url47);
	$url49 	= str_replace(":","-",$url48);
	$url50 	= str_replace("+","",$url49);
	$url51 	= str_replace("--","-",$url50);
	$url52 	= str_replace("’","-",$url51);
	$url53 	= str_replace("…","",$url52);
	$url54 	= str_replace("*","-",$url53);

	$rus1 	= str_replace("О","o",$url54);
	$rus2	= str_replace("К","k",$rus1);
	$rus3 	= str_replace("А","a",$rus2);
	$rus4 	= str_replace("Е","e",$rus3);
	$rus5 	= str_replace("У","y",$rus4);
	$rus6 	= str_replace("о","o",$rus5);

	return $rus6;
}  


function url_seo($str, $options = array()){
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'transliterate' => true,
    );

    $options = array_merge($defaults, $options);
    $dmr = $defaults["delimiter"];
    $char_map = array(
        // Latin
        'À' => 'A', 'Á' => 'A', ' ' => $dmr, 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
        'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
        'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
        'ß' => 'ss', 
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
        'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
        'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
        'ÿ' => 'y',

        // Latin symbols
        '©' => '(c)',

        // Greek
        'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
        'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
        'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
        'Ϋ' => 'Y',
        'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
        'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
        'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
        'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
        'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

        // Turkish
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 

        // Russian
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
        'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
        'Я' => 'Ya',
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
        'я' => 'ya',

        // Ukrainian
        'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
        'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

        // Czech
        'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
        'Ž' => 'Z', 
        'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
        'ž' => 'z', 

        // Polish
        'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
        'Ż' => 'Z', 
        'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
        'ż' => 'z',

        // Latvian
        'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
        'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
        'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
        'š' => 's', 'ū' => 'u', 'ž' => 'z'
    );


    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }

    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

// echo url_seo(trim($_POST['baslik']));
