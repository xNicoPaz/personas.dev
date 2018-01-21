<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\Province;
use App\Town;
use App\Person;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountriesTableSeeder::class);
        $this->call(ProvincesTownsPeopleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
		/*
		Insertar todos los paises del mundo

		$listaInserts = "INSERT INTO `countries` (id, iso, name) VALUES(1, 'AF', 'Afganistán');
			INSERT INTO `countries` (id, iso, name) VALUES(2, 'AX', 'Islas Gland');
			INSERT INTO `countries` (id, iso, name) VALUES(3, 'AL', 'Albania');
			INSERT INTO `countries` (id, iso, name) VALUES(4, 'DE', 'Alemania');
			INSERT INTO `countries` (id, iso, name) VALUES(5, 'AD', 'Andorra');
			INSERT INTO `countries` (id, iso, name) VALUES(6, 'AO', 'Angola');
			INSERT INTO `countries` (id, iso, name) VALUES(7, 'AI', 'Anguilla');
			INSERT INTO `countries` (id, iso, name) VALUES(8, 'AQ', 'Antártida');
			INSERT INTO `countries` (id, iso, name) VALUES(9, 'AG', 'Antigua y Barbuda');
			INSERT INTO `countries` (id, iso, name) VALUES(10, 'AN', 'Antillas Holandesas');
			INSERT INTO `countries` (id, iso, name) VALUES(11, 'SA', 'Arabia Saudí');
			INSERT INTO `countries` (id, iso, name) VALUES(12, 'DZ', 'Argelia');
			INSERT INTO `countries` (id, iso, name) VALUES(13, 'AR', 'Argentina');
			INSERT INTO `countries` (id, iso, name) VALUES(14, 'AM', 'Armenia');
			INSERT INTO `countries` (id, iso, name) VALUES(15, 'AW', 'Aruba');
			INSERT INTO `countries` (id, iso, name) VALUES(16, 'AU', 'Australia');
			INSERT INTO `countries` (id, iso, name) VALUES(17, 'AT', 'Austria');
			INSERT INTO `countries` (id, iso, name) VALUES(18, 'AZ', 'Azerbaiyán');
			INSERT INTO `countries` (id, iso, name) VALUES(19, 'BS', 'Bahamas');
			INSERT INTO `countries` (id, iso, name) VALUES(20, 'BH', 'Bahréin');
			INSERT INTO `countries` (id, iso, name) VALUES(21, 'BD', 'Bangladesh');
			INSERT INTO `countries` (id, iso, name) VALUES(22, 'BB', 'Barbados');
			INSERT INTO `countries` (id, iso, name) VALUES(23, 'BY', 'Bielorrusia');
			INSERT INTO `countries` (id, iso, name) VALUES(24, 'BE', 'Bélgica');
			INSERT INTO `countries` (id, iso, name) VALUES(25, 'BZ', 'Belice');
			INSERT INTO `countries` (id, iso, name) VALUES(26, 'BJ', 'Benin');
			INSERT INTO `countries` (id, iso, name) VALUES(27, 'BM', 'Bermudas');
			INSERT INTO `countries` (id, iso, name) VALUES(28, 'BT', 'Bhután');
			INSERT INTO `countries` (id, iso, name) VALUES(29, 'BO', 'Bolivia');
			INSERT INTO `countries` (id, iso, name) VALUES(30, 'BA', 'Bosnia y Herzegovina');
			INSERT INTO `countries` (id, iso, name) VALUES(31, 'BW', 'Botsuana');
			INSERT INTO `countries` (id, iso, name) VALUES(32, 'BV', 'Isla Bouvet');
			INSERT INTO `countries` (id, iso, name) VALUES(33, 'BR', 'Brasil');
			INSERT INTO `countries` (id, iso, name) VALUES(34, 'BN', 'Brunéi');
			INSERT INTO `countries` (id, iso, name) VALUES(35, 'BG', 'Bulgaria');
			INSERT INTO `countries` (id, iso, name) VALUES(36, 'BF', 'Burkina Faso');
			INSERT INTO `countries` (id, iso, name) VALUES(37, 'BI', 'Burundi');
			INSERT INTO `countries` (id, iso, name) VALUES(38, 'CV', 'Cabo Verde');
			INSERT INTO `countries` (id, iso, name) VALUES(39, 'KY', 'Islas Caimán');
			INSERT INTO `countries` (id, iso, name) VALUES(40, 'KH', 'Camboya');
			INSERT INTO `countries` (id, iso, name) VALUES(41, 'CM', 'Camerún');
			INSERT INTO `countries` (id, iso, name) VALUES(42, 'CA', 'Canadá');
			INSERT INTO `countries` (id, iso, name) VALUES(43, 'CF', 'República Centroafricana');
			INSERT INTO `countries` (id, iso, name) VALUES(44, 'TD', 'Chad');
			INSERT INTO `countries` (id, iso, name) VALUES(45, 'CZ', 'República Checa');
			INSERT INTO `countries` (id, iso, name) VALUES(46, 'CL', 'Chile');
			INSERT INTO `countries` (id, iso, name) VALUES(47, 'CN', 'China');
			INSERT INTO `countries` (id, iso, name) VALUES(48, 'CY', 'Chipre');
			INSERT INTO `countries` (id, iso, name) VALUES(49, 'CX', 'Isla de Navidad');
			INSERT INTO `countries` (id, iso, name) VALUES(50, 'VA', 'Ciudad del Vaticano');
			INSERT INTO `countries` (id, iso, name) VALUES(51, 'CC', 'Islas Cocos');
			INSERT INTO `countries` (id, iso, name) VALUES(52, 'CO', 'Colombia');
			INSERT INTO `countries` (id, iso, name) VALUES(53, 'KM', 'Comoras');
			INSERT INTO `countries` (id, iso, name) VALUES(54, 'CD', 'República Democrática del Congo');
			INSERT INTO `countries` (id, iso, name) VALUES(55, 'CG', 'Congo');
			INSERT INTO `countries` (id, iso, name) VALUES(56, 'CK', 'Islas Cook');
			INSERT INTO `countries` (id, iso, name) VALUES(57, 'KP', 'Corea del Norte');
			INSERT INTO `countries` (id, iso, name) VALUES(58, 'KR', 'Corea del Sur');
			INSERT INTO `countries` (id, iso, name) VALUES(59, 'CI', 'Costa de Marfil');
			INSERT INTO `countries` (id, iso, name) VALUES(60, 'CR', 'Costa Rica');
			INSERT INTO `countries` (id, iso, name) VALUES(61, 'HR', 'Croacia');
			INSERT INTO `countries` (id, iso, name) VALUES(62, 'CU', 'Cuba');
			INSERT INTO `countries` (id, iso, name) VALUES(63, 'DK', 'Dinamarca');
			INSERT INTO `countries` (id, iso, name) VALUES(64, 'DM', 'Dominica');
			INSERT INTO `countries` (id, iso, name) VALUES(65, 'DO', 'República Dominicana');
			INSERT INTO `countries` (id, iso, name) VALUES(66, 'EC', 'Ecuador');
			INSERT INTO `countries` (id, iso, name) VALUES(67, 'EG', 'Egipto');
			INSERT INTO `countries` (id, iso, name) VALUES(68, 'SV', 'El Salvador');
			INSERT INTO `countries` (id, iso, name) VALUES(69, 'AE', 'Emiratos Árabes Unidos');
			INSERT INTO `countries` (id, iso, name) VALUES(70, 'ER', 'Eritrea');
			INSERT INTO `countries` (id, iso, name) VALUES(71, 'SK', 'Eslovaquia');
			INSERT INTO `countries` (id, iso, name) VALUES(72, 'SI', 'Eslovenia');
			INSERT INTO `countries` (id, iso, name) VALUES(73, 'ES', 'España');
			INSERT INTO `countries` (id, iso, name) VALUES(74, 'UM', 'Islas ultramarinas de Estados Unidos');
			INSERT INTO `countries` (id, iso, name) VALUES(75, 'US', 'Estados Unidos');
			INSERT INTO `countries` (id, iso, name) VALUES(76, 'EE', 'Estonia');
			INSERT INTO `countries` (id, iso, name) VALUES(77, 'ET', 'Etiopía');
			INSERT INTO `countries` (id, iso, name) VALUES(78, 'FO', 'Islas Feroe');
			INSERT INTO `countries` (id, iso, name) VALUES(79, 'PH', 'Filipinas');
			INSERT INTO `countries` (id, iso, name) VALUES(80, 'FI', 'Finlandia');
			INSERT INTO `countries` (id, iso, name) VALUES(81, 'FJ', 'Fiyi');
			INSERT INTO `countries` (id, iso, name) VALUES(82, 'FR', 'Francia');
			INSERT INTO `countries` (id, iso, name) VALUES(83, 'GA', 'Gabón');
			INSERT INTO `countries` (id, iso, name) VALUES(84, 'GM', 'Gambia');
			INSERT INTO `countries` (id, iso, name) VALUES(85, 'GE', 'Georgia');
			INSERT INTO `countries` (id, iso, name) VALUES(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur');
			INSERT INTO `countries` (id, iso, name) VALUES(87, 'GH', 'Ghana');
			INSERT INTO `countries` (id, iso, name) VALUES(88, 'GI', 'Gibraltar');
			INSERT INTO `countries` (id, iso, name) VALUES(89, 'GD', 'Granada');
			INSERT INTO `countries` (id, iso, name) VALUES(90, 'GR', 'Grecia');
			INSERT INTO `countries` (id, iso, name) VALUES(91, 'GL', 'Groenlandia');
			INSERT INTO `countries` (id, iso, name) VALUES(92, 'GP', 'Guadalupe');
			INSERT INTO `countries` (id, iso, name) VALUES(93, 'GU', 'Guam');
			INSERT INTO `countries` (id, iso, name) VALUES(94, 'GT', 'Guatemala');
			INSERT INTO `countries` (id, iso, name) VALUES(95, 'GF', 'Guayana Francesa');
			INSERT INTO `countries` (id, iso, name) VALUES(96, 'GN', 'Guinea');
			INSERT INTO `countries` (id, iso, name) VALUES(97, 'GQ', 'Guinea Ecuatorial');
			INSERT INTO `countries` (id, iso, name) VALUES(98, 'GW', 'Guinea-Bissau');
			INSERT INTO `countries` (id, iso, name) VALUES(99, 'GY', 'Guyana');
			INSERT INTO `countries` (id, iso, name) VALUES(100, 'HT', 'Haití');
			INSERT INTO `countries` (id, iso, name) VALUES(101, 'HM', 'Islas Heard y McDonald');
			INSERT INTO `countries` (id, iso, name) VALUES(102, 'HN', 'Honduras');
			INSERT INTO `countries` (id, iso, name) VALUES(103, 'HK', 'Hong Kong');
			INSERT INTO `countries` (id, iso, name) VALUES(104, 'HU', 'Hungría');
			INSERT INTO `countries` (id, iso, name) VALUES(105, 'IN', 'India');
			INSERT INTO `countries` (id, iso, name) VALUES(106, 'ID', 'Indonesia');
			INSERT INTO `countries` (id, iso, name) VALUES(107, 'IR', 'Irán');
			INSERT INTO `countries` (id, iso, name) VALUES(108, 'IQ', 'Iraq');
			INSERT INTO `countries` (id, iso, name) VALUES(109, 'IE', 'Irlanda');
			INSERT INTO `countries` (id, iso, name) VALUES(110, 'IS', 'Islandia');
			INSERT INTO `countries` (id, iso, name) VALUES(111, 'IL', 'Israel');
			INSERT INTO `countries` (id, iso, name) VALUES(112, 'IT', 'Italia');
			INSERT INTO `countries` (id, iso, name) VALUES(113, 'JM', 'Jamaica');
			INSERT INTO `countries` (id, iso, name) VALUES(114, 'JP', 'Japón');
			INSERT INTO `countries` (id, iso, name) VALUES(115, 'JO', 'Jordania');
			INSERT INTO `countries` (id, iso, name) VALUES(116, 'KZ', 'Kazajstán');
			INSERT INTO `countries` (id, iso, name) VALUES(117, 'KE', 'Kenia');
			INSERT INTO `countries` (id, iso, name) VALUES(118, 'KG', 'Kirguistán');
			INSERT INTO `countries` (id, iso, name) VALUES(119, 'KI', 'Kiribati');
			INSERT INTO `countries` (id, iso, name) VALUES(120, 'KW', 'Kuwait');
			INSERT INTO `countries` (id, iso, name) VALUES(121, 'LA', 'Laos');
			INSERT INTO `countries` (id, iso, name) VALUES(122, 'LS', 'Lesotho');
			INSERT INTO `countries` (id, iso, name) VALUES(123, 'LV', 'Letonia');
			INSERT INTO `countries` (id, iso, name) VALUES(124, 'LB', 'Líbano');
			INSERT INTO `countries` (id, iso, name) VALUES(125, 'LR', 'Liberia');
			INSERT INTO `countries` (id, iso, name) VALUES(126, 'LY', 'Libia');
			INSERT INTO `countries` (id, iso, name) VALUES(127, 'LI', 'Liechtenstein');
			INSERT INTO `countries` (id, iso, name) VALUES(128, 'LT', 'Lituania');
			INSERT INTO `countries` (id, iso, name) VALUES(129, 'LU', 'Luxemburgo');
			INSERT INTO `countries` (id, iso, name) VALUES(130, 'MO', 'Macao');
			INSERT INTO `countries` (id, iso, name) VALUES(131, 'MK', 'ARY Macedonia');
			INSERT INTO `countries` (id, iso, name) VALUES(132, 'MG', 'Madagascar');
			INSERT INTO `countries` (id, iso, name) VALUES(133, 'MY', 'Malasia');
			INSERT INTO `countries` (id, iso, name) VALUES(134, 'MW', 'Malawi');
			INSERT INTO `countries` (id, iso, name) VALUES(135, 'MV', 'Maldivas');
			INSERT INTO `countries` (id, iso, name) VALUES(136, 'ML', 'Malí');
			INSERT INTO `countries` (id, iso, name) VALUES(137, 'MT', 'Malta');
			INSERT INTO `countries` (id, iso, name) VALUES(138, 'FK', 'Islas Malvinas');
			INSERT INTO `countries` (id, iso, name) VALUES(139, 'MP', 'Islas Marianas del Norte');
			INSERT INTO `countries` (id, iso, name) VALUES(140, 'MA', 'Marruecos');
			INSERT INTO `countries` (id, iso, name) VALUES(141, 'MH', 'Islas Marshall');
			INSERT INTO `countries` (id, iso, name) VALUES(142, 'MQ', 'Martinica');
			INSERT INTO `countries` (id, iso, name) VALUES(143, 'MU', 'Mauricio');
			INSERT INTO `countries` (id, iso, name) VALUES(144, 'MR', 'Mauritania');
			INSERT INTO `countries` (id, iso, name) VALUES(145, 'YT', 'Mayotte');
			INSERT INTO `countries` (id, iso, name) VALUES(146, 'MX', 'México');
			INSERT INTO `countries` (id, iso, name) VALUES(147, 'FM', 'Micronesia');
			INSERT INTO `countries` (id, iso, name) VALUES(148, 'MD', 'Moldavia');
			INSERT INTO `countries` (id, iso, name) VALUES(149, 'MC', 'Mónaco');
			INSERT INTO `countries` (id, iso, name) VALUES(150, 'MN', 'Mongolia');
			INSERT INTO `countries` (id, iso, name) VALUES(151, 'MS', 'Montserrat');
			INSERT INTO `countries` (id, iso, name) VALUES(152, 'MZ', 'Mozambique');
			INSERT INTO `countries` (id, iso, name) VALUES(153, 'MM', 'Myanmar');
			INSERT INTO `countries` (id, iso, name) VALUES(154, 'NA', 'Namibia');
			INSERT INTO `countries` (id, iso, name) VALUES(155, 'NR', 'Nauru');
			INSERT INTO `countries` (id, iso, name) VALUES(156, 'NP', 'Nepal');
			INSERT INTO `countries` (id, iso, name) VALUES(157, 'NI', 'Nicaragua');
			INSERT INTO `countries` (id, iso, name) VALUES(158, 'NE', 'Níger');
			INSERT INTO `countries` (id, iso, name) VALUES(159, 'NG', 'Nigeria');
			INSERT INTO `countries` (id, iso, name) VALUES(160, 'NU', 'Niue');
			INSERT INTO `countries` (id, iso, name) VALUES(161, 'NF', 'Isla Norfolk');
			INSERT INTO `countries` (id, iso, name) VALUES(162, 'NO', 'Noruega');
			INSERT INTO `countries` (id, iso, name) VALUES(163, 'NC', 'Nueva Caledonia');
			INSERT INTO `countries` (id, iso, name) VALUES(164, 'NZ', 'Nueva Zelanda');
			INSERT INTO `countries` (id, iso, name) VALUES(165, 'OM', 'Omán');
			INSERT INTO `countries` (id, iso, name) VALUES(166, 'NL', 'Países Bajos');
			INSERT INTO `countries` (id, iso, name) VALUES(167, 'PK', 'Pakistán');
			INSERT INTO `countries` (id, iso, name) VALUES(168, 'PW', 'Palau');
			INSERT INTO `countries` (id, iso, name) VALUES(169, 'PS', 'Palestina');
			INSERT INTO `countries` (id, iso, name) VALUES(170, 'PA', 'Panamá');
			INSERT INTO `countries` (id, iso, name) VALUES(171, 'PG', 'Papúa Nueva Guinea');
			INSERT INTO `countries` (id, iso, name) VALUES(172, 'PY', 'Paraguay');
			INSERT INTO `countries` (id, iso, name) VALUES(173, 'PE', 'Perú');
			INSERT INTO `countries` (id, iso, name) VALUES(174, 'PN', 'Islas Pitcairn');
			INSERT INTO `countries` (id, iso, name) VALUES(175, 'PF', 'Polinesia Francesa');
			INSERT INTO `countries` (id, iso, name) VALUES(176, 'PL', 'Polonia');
			INSERT INTO `countries` (id, iso, name) VALUES(177, 'PT', 'Portugal');
			INSERT INTO `countries` (id, iso, name) VALUES(178, 'PR', 'Puerto Rico');
			INSERT INTO `countries` (id, iso, name) VALUES(179, 'QA', 'Qatar');
			INSERT INTO `countries` (id, iso, name) VALUES(180, 'GB', 'Reino Unido');
			INSERT INTO `countries` (id, iso, name) VALUES(181, 'RE', 'Reunión');
			INSERT INTO `countries` (id, iso, name) VALUES(182, 'RW', 'Ruanda');
			INSERT INTO `countries` (id, iso, name) VALUES(183, 'RO', 'Rumania');
			INSERT INTO `countries` (id, iso, name) VALUES(184, 'RU', 'Rusia');
			INSERT INTO `countries` (id, iso, name) VALUES(185, 'EH', 'Sahara Occidental');
			INSERT INTO `countries` (id, iso, name) VALUES(186, 'SB', 'Islas Salomón');
			INSERT INTO `countries` (id, iso, name) VALUES(187, 'WS', 'Samoa');
			INSERT INTO `countries` (id, iso, name) VALUES(188, 'AS', 'Samoa Americana');
			INSERT INTO `countries` (id, iso, name) VALUES(189, 'KN', 'San Cristóbal y Nevis');
			INSERT INTO `countries` (id, iso, name) VALUES(190, 'SM', 'San Marino');
			INSERT INTO `countries` (id, iso, name) VALUES(191, 'PM', 'San Pedro y Miquelón');
			INSERT INTO `countries` (id, iso, name) VALUES(192, 'VC', 'San Vicente y las Granadinas');
			INSERT INTO `countries` (id, iso, name) VALUES(193, 'SH', 'Santa Helena');
			INSERT INTO `countries` (id, iso, name) VALUES(194, 'LC', 'Santa Lucía');
			INSERT INTO `countries` (id, iso, name) VALUES(195, 'ST', 'Santo Tomé y Príncipe');
			INSERT INTO `countries` (id, iso, name) VALUES(196, 'SN', 'Senegal');
			INSERT INTO `countries` (id, iso, name) VALUES(197, 'CS', 'Serbia y Montenegro');
			INSERT INTO `countries` (id, iso, name) VALUES(198, 'SC', 'Seychelles');
			INSERT INTO `countries` (id, iso, name) VALUES(199, 'SL', 'Sierra Leona');
			INSERT INTO `countries` (id, iso, name) VALUES(200, 'SG', 'Singapur');
			INSERT INTO `countries` (id, iso, name) VALUES(201, 'SY', 'Siria');
			INSERT INTO `countries` (id, iso, name) VALUES(202, 'SO', 'Somalia');
			INSERT INTO `countries` (id, iso, name) VALUES(203, 'LK', 'Sri Lanka');
			INSERT INTO `countries` (id, iso, name) VALUES(204, 'SZ', 'Suazilandia');
			INSERT INTO `countries` (id, iso, name) VALUES(205, 'ZA', 'Sudáfrica');
			INSERT INTO `countries` (id, iso, name) VALUES(206, 'SD', 'Sudán');
			INSERT INTO `countries` (id, iso, name) VALUES(207, 'SE', 'Suecia');
			INSERT INTO `countries` (id, iso, name) VALUES(208, 'CH', 'Suiza');
			INSERT INTO `countries` (id, iso, name) VALUES(209, 'SR', 'Surinam');
			INSERT INTO `countries` (id, iso, name) VALUES(210, 'SJ', 'Svalbard y Jan Mayen');
			INSERT INTO `countries` (id, iso, name) VALUES(211, 'TH', 'Tailandia');
			INSERT INTO `countries` (id, iso, name) VALUES(212, 'TW', 'Taiwán');
			INSERT INTO `countries` (id, iso, name) VALUES(213, 'TZ', 'Tanzania');
			INSERT INTO `countries` (id, iso, name) VALUES(214, 'TJ', 'Tayikistán');
			INSERT INTO `countries` (id, iso, name) VALUES(215, 'IO', 'Territorio Británico del Océano Índico');
			INSERT INTO `countries` (id, iso, name) VALUES(216, 'TF', 'Territorios Australes Franceses');
			INSERT INTO `countries` (id, iso, name) VALUES(217, 'TL', 'Timor Oriental');
			INSERT INTO `countries` (id, iso, name) VALUES(218, 'TG', 'Togo');
			INSERT INTO `countries` (id, iso, name) VALUES(219, 'TK', 'Tokelau');
			INSERT INTO `countries` (id, iso, name) VALUES(220, 'TO', 'Tonga');
			INSERT INTO `countries` (id, iso, name) VALUES(221, 'TT', 'Trinidad y Tobago');
			INSERT INTO `countries` (id, iso, name) VALUES(222, 'TN', 'Túnez');
			INSERT INTO `countries` (id, iso, name) VALUES(223, 'TC', 'Islas Turcas y Caicos');
			INSERT INTO `countries` (id, iso, name) VALUES(224, 'TM', 'Turkmenistán');
			INSERT INTO `countries` (id, iso, name) VALUES(225, 'TR', 'Turquía');
			INSERT INTO `countries` (id, iso, name) VALUES(226, 'TV', 'Tuvalu');
			INSERT INTO `countries` (id, iso, name) VALUES(227, 'UA', 'Ucrania');
			INSERT INTO `countries` (id, iso, name) VALUES(228, 'UG', 'Uganda');
			INSERT INTO `countries` (id, iso, name) VALUES(229, 'UY', 'Uruguay');
			INSERT INTO `countries` (id, iso, name) VALUES(230, 'UZ', 'Uzbekistán');
			INSERT INTO `countries` (id, iso, name) VALUES(231, 'VU', 'Vanuatu');
			INSERT INTO `countries` (id, iso, name) VALUES(232, 'VE', 'Venezuela');
			INSERT INTO `countries` (id, iso, name) VALUES(233, 'VN', 'Vietnam');
			INSERT INTO `countries` (id, iso, name) VALUES(234, 'VG', 'Islas Vírgenes Británicas');
			INSERT INTO `countries` (id, iso, name) VALUES(235, 'VI', 'Islas Vírgenes de los Estados Unidos');
			INSERT INTO `countries` (id, iso, name) VALUES(236, 'WF', 'Wallis y Futuna');
			INSERT INTO `countries` (id, iso, name) VALUES(237, 'YE', 'Yemen');
			INSERT INTO `countries` (id, iso, name) VALUES(238, 'DJ', 'Yibuti');
			INSERT INTO `countries` (id, iso, name) VALUES(239, 'ZM', 'Zambia');
			INSERT INTO `countries` (id, iso, name) VALUES(240, 'ZW', 'Zimbabue')";

		$arrayInserts = explode(";", $listaInserts);
		for($i=0; $i<count($arrayInserts); $i++){
			DB::statement($arrayInserts[$i]);
		}*/

		Country::create([
			'name' => 'Argentina'
		]);
    }
}

class ProvincesTownsPeopleTableSeeder extends Seeder
{
	public function run(){
		//Argentina tiene id = 13
		$arg = Country::where('name', '=', 'Argentina')->get()[0];
		/*
			Dos provincias, como para probar
		*/
		$santiago = Province::create([
			'name' => 'Santiago del Estero',
			'country_id' => $arg->id,
		]);	
		$tucuman = Province::create([
			'name' => 'Tucumán',
			'country_id' => $arg->id,
		]); 

		/*
			Una localidad en cada provincia
		*/

		$termas = Town::create([
			'name' => 'Termas de Rio Hondo',
			'province_id' => $santiago->id
		]);
		$cadillal = Town::create([
			'name' => 'El cadillal',
			'province_id' => $tucuman->id
		]);

		/*
			Una persona en cada localidad
		*/
		$person1 = Person::create([
			'last_name' => 'Perez',
			'first_name' => 'Juan',
			'dni' => 25159753,
			'birthdate' => Carbon\Carbon::createFromFormat('d/m/Y', '5/4/1989'),
			'address' => 'Colon N 231',
			'town_id' => $termas->id
		]);
		$person2 = Person::create([
			'last_name' => 'Diaz',
			'first_name' => 'Pedro',
			'dni' => 25135739,
			'birthdate' => Carbon\Carbon::createFromFormat('d/m/Y', '19/6/1988'),
			'address' => 'Roca S 246',
			'town_id' => $cadillal->id
		]);
	}
}

class UsersTableSeeder extends Seeder
{
	public function run(){
		$user = App\User::create([
			'name' => 'asdqwe',
			'email' => 'nicolaspaz95@gmail.com',
			'password' => bcrypt('qweasd')
		]);
	}
}