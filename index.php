<?php
/*
## Example of a line of raw AVIA code in format METAR

### Change the variable raw to get the result.
### The variable raw has the format METAR.
*/

// Raw METAR code string
//$raw = 'UWSS 231500Z 14007MPS 9999 -SHRA BR BKN033CB OVC066 03/M02 Q1019 R12/220395 NOSIG RMK QFE752';

// Set code METAR
//$raw = 'UEEE 072000Z 00000MPS 0150 R23L/0500 R10/1000VP1800D FG VV003 M50/M53 Q1028 RETSRA R12L/290395 R31/CLRD// R/SNOCLO WS RWY10L WS RWY11L TEMPO 4000 RADZ BKN010 RMK QBB080 OFE745';
//$raw = 'METAR UMMS 091330Z 28003G06MPS 320V020 CAVOK M03/M15 Q1020 R31R/CLRD// R31L/////// NOSIG';
//$raw = 'METAR UMMS 251936Z VRB02KT 9999 SCT006 OVC026 06/05 Q1015 R31/D NOSIG RMK QBB080 OFE745';
//$raw = 'METAR EHMG 030625Z AUTO 31010KT 260V330 0200 +DZ VV000 02/02 Q1028=';

$raw = 'METAR ENQR 030620Z AUTO 29009KT 9999NDV -RA FEW009/// BKN028///

           BKN048/// 07/05 Q1028 W///S3=';

/*
$raw = 'METAR UMMG 030600Z 28003G06MPS 4700 BR OVC002 M01/M02 Q1030

R35/390145 NOSIG RMK QBB070=';
*/


//подключаем классы для расшифровки METAR
require_once 'Metar.php';
require_once 'MetarConv.php';

//удалить перевод каретки и конец строки в многострочных METAR
$arr_new_line = array("\n", "\r\n");  //специальные символы
$raw = str_replace($arr_new_line, '', $raw);

// Create class instance for parse METAR string with debug output enable
$metarConv = new MetarConv($raw, FALSE, TRUE);

// Parse METAR
$parameters = $metarConv->parse();

/*
print_r($parameters)."\n\n"; // get parsed parameters as array

// Debug information
$debug = $metar->debug();
print_r($debug)."\n\n"; // get debug information as array
*/

// Get all converted parameters
$metarConv->convParam();

/*
## Отображаем результаты декодирования METAR
*/
echo "\n\n"."Представление результатов декодирования METAR"."\n";
echo $metarConv->raw;

//Пост обработка полученных результатов
//DATAS` date NOT NULL DEFAULT '1000-01-01'
echo "\n\n"."Дата получения данных"."\n";
echo $metarConv->observed_date;

//TIMES` time NOT NULL DEFAULT '00:00:00'
echo "\n"."Срок наблюдения, UTC"."\n";
echo $metarConv->observed_time;

//DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
echo "\n"."Дата и время"."\n";
echo $metarConv->observed_date_time;

//ID_STATION` varchar(4) NOT NULL DEFAULT ''
echo "\n"."Код аэропорта ИКАО"."\n";
echo $metarConv->station;

//Temp` varchar(5) DEFAULT NULL
echo "\n"."Температура воздуха, °C"."\n";
echo $metarConv->temperature;

//Dir` enum('Северный','Южный','Западный','Восточный','С-З','С-В','Ю-З','Ю-В','Переменный') DEFAULT NULL
echo "\n"."Направление ветра"."\n";
echo $metarConv->wind_direction;

//Speed` varchar(5) DEFAULT NULL
echo "\n"."Скорость ветра, м/с"."\n";
echo $metarConv->wind_speed;

//Clouds` enum('Малооблачно','Переменная облачность','Облачно с прояснениями','Сплошная облачность','') NOT NULL DEFAULT ''
echo "\n"."Облачность"."\n";
echo $metarConv->desc_clouds;

//weather` varchar(64) DEFAULT NULL
echo "\n"."Метеорологическое явление"."\n";
echo $metarConv->desc_weather;

//Visib` varchar(5) DEFAULT NULL
echo "\n"."Видимость, км"."\n";
echo $metarConv->visibility;

//Clouds_height` smallint(5) unsigned DEFAULT NULL
echo "\n"."Высота облаков, м"."\n";
echo $metarConv->cloud_height;

//Trend` varchar(75) DEFAULT NULL
echo "\n"."Изменение погоды"."\n";
echo $metarConv->clouds_report;

//Pressure` smallint(5) unsigned DEFAULT NULL
echo "\n"."Давление на уровне моря, гПа"."\n";
echo $metarConv->barometer;

//TempD` varchar(5) DEFAULT NULL
echo "\n"."Температура точки росы, °C"."\n";
echo $metarConv->dew_point;

//Gust` tinyint(3) DEFAULT NULL
echo "\n"."Порыв ветра, м/с"."\n";
echo $metarConv->wind_gust_speed;

//Humidity` tinyint(3) DEFAULT NULL
echo "\n"."Влажность, %"."\n";
echo $metarConv->humidity;
?>