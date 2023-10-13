<?

ini_set('display_errors', true);
error_reporting (E_ALL);

if (isset($_POST['fio'])) {
	$fio =  '	
	<tr>
	<td>Имя: </td>
	<td>'.$_POST['fio'].'</td>
	</tr>' ;
} else {
	$fio = "";
}

if (isset($_POST['email'])) {
	$email =  '	
	<tr>
	<td>Почта: </td>
	<td>'.$_POST['email'].'</td>
	</tr>' ;
} else {
	$email = "";
}

$phone = $_POST['phone'];
$dlin = '	
	<tr>
	<td>Длина здания: </td>
	<td>'.$_POST['dlin'].' м</td>
	</tr>' ;

$shrin = '
	<tr>
	<td>Ширина здания: </td>
	<td>'.$_POST['shrin'].' м</td>
	</tr>' ;

$vyshin = '
	<tr>
	<td>Высота здания: </td>
	<td>'.$_POST['vyshin'].' м</td>
	</tr>' ;


if ($_POST['etage'] == 1) {
	$etage = 'одноэтажное';
} else {
	$etage = 'многоэтажное';
}

if ($_POST['naznage'] == 1) {
	$naznage = 'гражданское';
} else {
	$naznage = 'промышленное';
}

if ($_POST['carcage'] == 1) {
	$carcage = 'каркасное';
} else {
	$carcage = 'бескаркасное';
}

$caslozhda = '
	<tr>
	<td>Категория сложности здания: </td>
	<td>'.$_POST['caslozhda'].'</td>
	</tr>' ;

$caslozhra = '
	<tr>
	<td>Категория сложности работ: </td>
	<td>'.$_POST['caslozhra'].'</td>
	</tr>' ;

$fobsled = array('fund' => 'фундаменты', 'sten' => 'стены', 'poly' => 'полы', 'kostki' => 'колонны, столбы, стойки ', 'lest' => 'лестницы', 'torm' => 'подкрановые и тормозные конструкции', 'perek' => 'перекрытия', 'nesu' => 'несущие конструкции покрытия', 'ogra' => 'ограждающие конструкции покрытия', 'sovme' => 'совмещённые покрытия или крыши', 'krov' => 'кровля');
$obsled = explode(',',$_POST['vobsle']);
array_pop($obsled);
$vobsle = '';
foreach ($fobsled as $key => $value){
	if(in_array($key,$obsled)){
		$vobsle .= $value.' / ';
	}
}

$vobsle =  '	
<tr>
<td>Обследовательские работы: </td>
<td>'.$vobsle.'</td>
</tr>' ;

$vobmer = "";
if (!empty($_POST['vobmer'])) {
	$fobmer = array('ofunda' => 'планы фундаментов, фундаменты и фундаментные балки', 'ofund' => 'планы фундаментов и фундаменты', 'opoet' => 'поэтажные планы здания', 'okol' => 'планы колонн и связей, подкрановых и тормозных конструкций с узлами сопряжений', 'opol' => 'планы полов с определением состава полов', 'opraz' => 'поперечные и продольные разрезы с узлами сопряжений конструкций', 'ofafe' => 'фасады, окна, ворота', 'okolst' => 'конструкции колонн и стоек', 'olest' => 'лестницы', 'otorm' => 'подкрановые и тормозные конструкции', 'operek' => 'планы конструкций перекрытий со вскрытиями', 'opodk' => 'подкрановые конструкции', 'onesu' => 'планы несущих конструкций покрытия со связями и прогонами, узлами сопряжений конструкций', 'oogr' => 'планы ограждающих конструкций покрытия со вскрытиями', 'ostrop' => 'стропильные и подстропильные конструкции покрытия с определением сечений', 'okrys' => 'крыши', 'okrov' => 'планы кровли со вскрытиями');
	$obmer = explode(',',$_POST['vobmer']);
	array_pop($obmer);
	foreach ($fobmer as $key => $value){
		if(in_array($key,$obmer)){
			$vobmer .= $value.' / ';
		}
	}
	$vobmer =  '	
	<tr>
	<td>Обмерные работы: </td>
	<td>'.$vobmer.'</td>
	</tr>' ;
}

$vinzh = "";
if (!empty($_POST['vinzh'])) {
	$finzh = array('gorvo' => 'горячеее водоснабжение', 'otop' => 'отопление', 'holvo' => 'холодное водоснабжение и канализация', 'venti' => 'вентиляция', 'musou' => 'мусороудаление', 'gaszn' => 'газоснабжение', 'vosto' => 'водостоки', 'elses' => 'электросети и средства связи');
	$inzh = explode(',',$_POST['vinzh']);
	array_pop($inzh);
	foreach ($finzh as $key => $value){
		if(in_array($key,$inzh)){
			$vinzh .= $value.' / ';
		}
	}
	$vinzh =  '	
	<tr>
	<td>Инженерные системы: </td>
	<td>'.$vinzh.'</td>
	</tr>' ;
}

$vuslofac = "";
if (!empty($_POST['uslofac'])) {
	$fuslofac = array('prosad' => 'здания, возведённые на просадочных грунтах и т.д.', 'dejpro' => 'действующее производство, затруднённые условия', 'www' => 'вредное производство, вибровоздействия, выделения пара', 'zim' => 'выполнение работ в зимний период года', 'pamarch' => 'выполнение работ в зданиях, являющихся памятником архитектуры', 'vysrab' => 'работа на высоте, с использованием лестниц и различных приспособлений', 'slagr' => 'выполнение работ в цехах со слабой степенью агрессивного воздействия', 'sregr' => 'выполнение работ в цехах со средней степенью агрессивного воздействия', 'silagr' => 'выполнение работ в цехах с сильной степенью агрессивного воздействия', 'usicon' => 'конструкции, усиленные по ранее разработанным проектам', 'seis7' => 'сейсмичность 7 баллов', 'seis8' => 'сейсмичность 8 баллов', 'specre' => 'объекты со спецрежимом');
	$uslofac = explode(',',$_POST['uslofac']);
	array_pop($uslofac);
	foreach ($fuslofac as $key => $value){
		if(in_array($key,$uslofac)){
			$vuslofac .= $value.' / ';
		}
	}
	$vuslofac =  '	
	<tr>
	<td>Усложняющие факторы: </td>
	<td>'.$vuslofac.'</td>
	</tr>' ;
}

if ($_POST['profac'] > 1) {
	if ($_POST['profac'] == 1.25) {
		$profac =  '	
		<tr>
		<td>Шаг конструкций:</td>
		<td> менее 6 метров</td>
		</tr>' ;
	} elseif($_POST['profac'] == 1.1) {
		$profac =  '	
		<tr>
		<td>Смета на ремонтно-восстановительные работы:</td>
		<td> нужна</td>
		</tr>' ;
	} else {
		$profac =  '
		<tr>
		<td>Шаг конструкций:</td>
		<td> менее 6 метров</td>
		<tr>
		<td>Смета на ремонтно-восстановительные работы:</td>
		<td> нужна</td>
		</tr>' ;
	}
}else{
		$profac =  '	
		<tr>
		<td>Шаг конструкций:</td>
		<td> более 6 метров</td>
		</tr>
		<tr>
		<td>Смета на ремонтно-восстановительные работы:</td>
		<td> не нужна</td>
		</tr>' ;
}


if (!empty($_POST['avtopod'])) {
	$avtopod =  '	
	<tr>
	<td>Требуется автоподъёмник (дней): </td>
	<td>'.$_POST['avtopod'].'</td>
	</tr>' ;
} else {
	$avtopod = "";
}

if (!empty($_POST['otschur'])) {
	$otschur =  '	
	<tr>
	<td>Требуется откопка шурфов: </td>
	<td>'.$_POST['otschur'].' шт</td>
	</tr>' ;
} else {
	$otschur = "";
}

if (isset($_POST['transhod'])) {
	$ftranshod = array('в пределах МКАД', 'до 10 км от МКАД', '10-20 км от МКАД', '20-30 км от МКАД', '30-40 км от МКАД', '40-50 км от МКАД', '50-60 км от МКАД', '60-70 км от МКАД', '70-80 км от МКАД', '80-90 км от МКАД', 'от 90 км от МКАД');
	$transhod =  '	
	<tr>
	<td>Транспортные расходы: </td>
	<td>'.$ftranshod[$_POST['transhod']].'</td>
	</tr>' ;
} else {
	$transhod = "";
}

if (!empty($_POST['summ'])) {
	$summ =  '	
	<tr>
	<td>Примерная сумма: </td>
	<td>'.$_POST['summ'].' рублей</td>
	</tr>' ;
} else {
	$summ = "";
}

$mailtext ="<html><body>

<!-- Container Table -->
	<table cellpadding='0' cellspacing='0' border='0' width='99%' bgcolor='#e4e4e4'>
	    <tr>
	    	<td align='center'>
	
	<!-- Email Wrapper Table -->
	<table cellpadding='0' cellspacing='0' border='0' width='640' style='font-family: Tahoma, Geneva, sans-serif; font-size:14px;'>
		<tr>
			<td>
	
	<!-- Actual Email Content -->
	<table cellpadding='0' cellspacing='0' border='0' width='600' style='margin-bottom:20px;'>
		<tr>
			<td valign='bottom' height='30' align='right' class='footer'></td>
			
	</tr>
		
		<tr>
		
		
			<td align='center' style='background-color:#fff;' class='email_background'>
	<!-- Email Header -->
	<table cellpadding='0' cellspacing='0' border='0' width='600' >
		<tr> 
			<td align='left' style='padding-bottom: 20px;'></td>
			<td style='padding-bottom: 20px; padding-top: 25px;'></td>
			<td style='padding-bottom: 20px; padding-top: 25px;'>
			</td>

		</tr>
		

				<tr>
			<td align='left' colspan='5' style='height:70px; line-height:70px; background:#991427; font-family: Tahoma, Geneva, sans-serif; font-size:24px; text-align:center; color:#fff;'>Заявка из калькулятора</td>
		</tr>
				<tr>
			<td align='left' colspan='5'>
			<table style='width:500px; margin-left:50px; padding-top:50px; padding-bottom:50px;'>
			$fio
			<tr>
			<td>Телефон: </td>
			<td>$phone</td>
			</tr>
			$email
			$dlin
			$shrin
			$vyshin
			<tr>
			<td>Этажность: </td>
			<td>$etage</td>
			</tr>
			<tr>
			<td>Назначение: </td>
			<td>$naznage</td>
			</tr>
			<tr>
			<td>Каркасность: </td>
			<td>$carcage</td>
			</tr>
			$caslozhda
			$caslozhra
			$vobsle
			$vobmer
			$vinzh
			$vuslofac
			$profac
			$avtopod
			$otschur
			$transhod
			$summ
			</table>
			
			

 
			</td>
		</tr>
		
	</table>
			</td>
		</tr>

	</table>

			</td>
		</tr>
	</table>

	    	</td>
	    </tr>
	</table>




</body></html>"


;

$smtp_login = 'site@mcce.ru';
$smtp_pass = 'peknu6-juxxUf-zeppud';
$smtp_server = 'smtp.yandex.ru';
$smtp_secure = 'ssl';
$smtp_port = 465;
$smtp_from_name = 'Сайт Мосэксперт';
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->SMTPDebug = 3;
$mail->CharSet = 'utf-8';
$mail->isSMTP();
$mail->Host = $smtp_server;
$mail->SMTPAuth = true;
$mail->Username = $smtp_login;
$mail->Password = $smtp_pass;
$mail->SMTPSecure = $smtp_secure;
$mail->Port = $smtp_port;
$mail->setFrom($smtp_login, $smtp_from_name);

	$mail->addAddress('info@mcce.ru');

$mail->isHTML(true);                                 
$mail->Subject = 'Заявка из калькулятора';
$mail->Body    = $mailtext;
$mail->AltBody = '';
if(!$mail->send()) {
	$answer = 'Сообщение не отправлено. Ошибка: ' . $mail->ErrorInfo;
} else {
	$answer = 'Сообщение отправлено';
}
echo $answer;
//echo $mailtext;
?>