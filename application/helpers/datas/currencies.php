<?php 
//the list of currencies
//array keys must match the list in countries.php
$datas = array(

    0 => "AED United Arab Emirates, Emirati dirham",
    1 => "AFN Afghanistan, Afghanis",
    2 => "ALL Albania, Leke",
    3 => "AMD Armenia, Dram",
    //4 => "AMD Nagorno-Karabakh, Armenian dram",
    5 => "ANG Netherlands Antilles, Guilders(Florins)",
    6 => "AOA Angola, Kwanza",
    7 => "ARS Argentina, Pesos",
    8 => "AUD Australia, Dollars",
    //9 => "AUD Cocos (Keeling) Islands, Australian dollar",
    //10 => "AUD Kiribati, Australian dollar",
    //11 => "AUD Nauru, Australian Dollar",
    //12 => "AUD Tuvalu, Australian dollar",
    13 => "AWG Aruba, Guilders(Florins)",
    14 => "AZN Azerbaijan, New Manats",
    15 => "BAM Bosnia and Herzegovina, Convertible Marka",
    16 => "BBD Barbados, Dollars",
    17 => "BDT Bangladesh, Taka",
    18 => "BGN Bulgaria, Leva",
    19 => "BHD Bahrain, Bahraini dinar",
    20 => "BIF Burundi, Burundi franc",
    21 => "BMD Bermuda, Dollars",
    22 => "BND Brunei Darussalam, Dollars",
    23 => "BOB Bolivia, Bolivianos",
    24 => "BRL Brazil, Reais",
    25 => "BSD Bahamas, Dollars",
    26 => "BTN Bhutan, ngultrum",
    27 => "BWP Botswana, Pulas",
    28 => "BYR Belarus, Rubles",
    29 => "BZD Belize, Dollars",
    30 => "CAD Canada, Dollars",
    31 => "CDF Congo, Democratic Republic, Congolese franc",
    32 => "CHF Liechtenstein, Switzerland Francs",
    33 => "CHF Switzerland, Francs",
    34 => "CLP Chile, Pesos",
    35 => "CNY China, Yuan Renminbi",
    36 => "COP Colombia, Pesos",
    37 => "CRC Costa Rica, Colón",
    38 => "CUC Cuba, Cuban convertible peso",
    39 => "CUP Cuba, Pesos",
    40 => "CVE Cape Verde, Cape Verdean escudo",
    41 => "CZK Czech Republic, Koruny",
    42 => "DJF Djibouti, Djiboutian franc",
    43 => "DKK Denmark, Kroner",
    //44 => "DKK Faroe Islands, Danish krone",
    //45 => "DKK Greenland, Danish krone",
    46 => "DOP Dominican Republic, Pesos",
    47 => "DZD Algeria, Dinar",
    48 => "EEK Estonia, Krooni",
    49 => "EGP Egypt, Pounds",
    50 => "ERN Eritrea, nakfa",
    51 => "ETB Ethiopia, Birr",
    //52 => "EUR Akrotiri and Dhekelia, Euro",
    //53 => "EUR Andorra, Euro",
    //54 => "EUR Austria, Euro",
    //55 => "EUR Belgium, Euro",
    //56 => "EUR Cyprus, Euro",
    57 => "EUR European Union, Euro",
    //58 => "EUR Finland, Euro",
    //59 => "EUR France, Euro",
    //60 => "EUR Germany, Euro",
    //61 => "EUR Greece, Euro",
    //62 => "EUR Holland (Netherlands), Euro",
    //63 => "EUR Ireland, Euro",
    //64 => "EUR Italy, Euro",
    //65 => "EUR Kosovo, Euro",
    //66 => "EUR Luxembourg, Euro",
    //67 => "EUR Malta, Euro",
    //68 => "EUR Monaco, Euro",
    //69 => "EUR Montenegro, Euro",
    //70 => "EUR Portugal, Euro",
    //71 => "EUR San Marino, Euro",
    //72 => "EUR Slovenia, Euro",
    //73 => "EUR Slovakia, Euro",
    //74 => "EUR Spain, Euro",
    //75 => "EUR Vatican City, Euro",
    76 => "FJD Fiji, Dollars",
    77 => "FKP Falkland Islands, Pounds",
    78 => "GBP United Kingdom, Pounds",
    //79 => "GBP Alderney, British pound",
    //80 => "GBP Britain (United Kingdom), Pounds",
    //81 => "GBP England (United Kingdom), Pounds",
    //82 => "GBP South Georgia and the South Sandwich Islands, British pounds",
    83 => "GEL Georgia, lari",
    84 => "GGP Guernsey, Pounds",
    85 => "GHS Ghana, Cedis",
    86 => "GIP Gibraltar, Pounds",
    87 => "GMD Gambia, Dalasi",
    88 => "GNF Guinea, Guinean Franc",
    89 => "GTQ Guatemala, Quetzales",
    90 => "GYD Guyana, Dollars",
    91 => "HKD Hong Kong, Dollars",
    92 => "HNL Honduras, Lempiras",
    93 => "HRK Croatia, Kuna",
    94 => "HTG Haiti, gourde",
    95 => "HUF Hungary, Forint",
    96 => "IDR Indonesia, Rupiahs",
    97 => "ILS Israel, New Shekels",
    98 => "ILS-PALE Palestine, Israeli new sheqel",
    99 => "IMP Isle of Man, Pounds",
    100 => "INR India, Rupees",
    //101 => "INR Bhutan,Indian Rupee",
    102 => "IQD Iraq, Dinar",
    103 => "IRR Iran, Rials",
    104 => "ISK Iceland, Kronur",
    105 => "JEP Jersey, Pounds",
    106 => "JMD Jamaica, Dollars",
    107 => "JOD Jordan, Dinar",
    //108 => "JOD Palestine, Jordanian dinar",
    109 => "JPY Japan, Yen",
    110 => "KES Kenya, Kenyan shilling",
    111 => "KGS Kyrgyzstan, Soms",
    112 => "KHR Cambodia, Riels",
    113 => "KMF Comoros, Comoran Franc",
    114 => "KPW Korea (North), Won",
    115 => "KRW Korea (South), Won",
    116 => "KWD Kuwait, Dinar",
    117 => "KYD Cayman Islands, Dollars",
    118 => "KZT Kazakhstan, Tenge",
    119 => "LAK Laos, Kips",
    120 => "LBP Lebanon, Pounds",
    121 => "LKR Sri Lanka, Rupees",
    122 => "LRD Liberia, Dollars",
    123 => "LSL Lesotho, loti",
    124 => "LTL Lithuania, Litai",
    125 => "LVL Latvia, Lati",
    126 => "LYD Libya, Dinar",
    127 => "MAD Morocco, Moroccan dirham",
    //128 => "MAD Western Sahara, Moroccan dirham",
    129 => "MDL Moldova, Moldovan Leu",
    130 => "MGA Madagascar, Ariary",
    131 => "MKD Macedonia, Denars",
    132 => "MMK Myanmar, Myanma kyat",
    133 => "MNT Mongolia, Tugriks",
    134 => "MOP Macau, Macanese pataca",
    135 => "MRO Mauritania, Mauritanian ouguiya",
    136 => "MUR Mauritius, Rupees",
    137 => "MVR Maldives, rufiyaa",
    138 => "MWK Malawi, Malawian kwacha",
    139 => "MXN Mexico, Pesos",
    140 => "MYR Malaysia, Ringgits",
    141 => "MZN Mozambique, Meticais",
    142 => "NAD Namibia, Dollars",
	250 => "NAF Netherlands Antilles, Guilders(Florins)",
    143 => "NGN Nigeria, Nairas",
    144 => "NIO Nicaragua, Cordobas",
    145 => "NOK Norway, Krone",
    146 => "NPR Nepal, Rupees",
    147 => "NZD New Zealand, Dollars",
    //148 => "NZD Cook Islands, New Zealand Dollar",
    //149 => "NZD Niue, New Zealand Dollar",
    //150 => "NZD Pitcairn Islands, New Zealand Dollar",
    151 => "OMR Oman, Rials",
    152 => "PAB Panama, Balboa",
    153 => "PEN Peru, Nuevos Soles",
    154 => "PGK Papua New Guinea, kina",
    155 => "PHP Philippines, Pesos",
    156 => "PKR Pakistan, Rupees",
    157 => "PLN Poland, Zlotych",
    158 => "PRB Transnistria, Transnistrian ruble",
    159 => "PYG Paraguay, Guarani",
    160 => "QAR Qatar, Rials",
    161 => "RON Romania, New Lei",
    162 => "RSD Serbia, Dinars",
    163 => "RUB Russia, Rubles",
    //164 => "RUB Abkhazia, Russian Ruble",
    //165 => "RUB South Ossetia, Russian Ruble",
    166 => "RWF Rwanda, Rwandan franc",
    167 => "SAR Saudi Arabia, Riyals",
    168 => "SBD Solomon Islands, Dollars",
    169 => "SCR Seychelles, Rupees",
    170 => "SDD Sudan, Sudanese dinar",
    171 => "SDG Sudan, Sudanese pound",
    172 => "SEK Sweden, Kronor",
    173 => "SGD Singapore, Singapore Dollars",
    //174 => "SGD Brunei, Singapore Dollar",
    //175 => "SHP Saint Helena, Pounds",
    //176 => "SHP Ascension Island, Saint Helena pound",
    //177 => "SHP Tristan da Cunha, Saint Helena pound",
    178 => "SLL Sierra Leone, Sierra Leonean leone",
    179 => "SLSH Somaliland, Somaliland shilling",
    180 => "SOS Somalia, Shillings",
    181 => "SRD Suriname, Dollars",
    182 => "STD Sao Tome, Dobra",
    183 => "SVC El Salvador, Colones",
    184 => "SYP Syria, Pounds",
    185 => "SZL Swaziland, lilangeni",
    186 => "THB Thailand, Baht",
    187 => "TJS Tajikistan, Somoni",
    188 => "TMM Turkmenistan, Turkmen manat",
    189 => "TND Tunisia, Tunisian dinar",
    190 => "TOP Tonga, pa'anga",
    191 => "TRL Turkey, Liras",
    //192 => "TRY Turkey, Lira",
    //193 => "TRY Northern Cyprus, Turkish lira",
    194 => "TTD Trinidad and Tobago, Dollars",
    195 => "TVD Tuvalu, Dollars",
    196 => "TWD Taiwan, New Dollars",
    197 => "TZS Tanzania, Tanzanian shilling",
    198 => "UAH Ukraine, Hryvnia",
    199 => "UGX Uganda, Ugandan shilling",
    200 => "USD America (United States of America), Dollars",
    //201 => "USD British Indian Ocean Territory, US Dollar",
    //202 => "USD British Virgin Islands, US Dollar",
    //203 => "USD East Timor, US dollar",
    //204 => "USD Ecuador, US dollar",
    //205 => "USD El Salvador, US Dollar",
    //206 => "USD Marshall Islands, US Dollar",
    //207 => "USD Micronesia, US Dollar",
    //208 => "USD Northern Mariana Islands,United States dollar",
    //209 => "USD Palau, US Dollar",
    //210 => "USD American Samoa, US Dollar",
    //211 => "USD Turks and Caicos Islands, United States dollar",
    212 => "UYU Uruguay, Pesos",
    213 => "UZS Uzbekistan, Sums",
    214 => "VEF Venezuela, Bolivares Fuertes",
    215 => "VND Vietnam, Dong",
    216 => "VUV Vanuatu, Vatu",
    217 => "WST Samoa, Samoan tala",
    218 => "XAF Communaute Financiere Africaine Franc",
    //219 => "XAF Central African Republic, CFA francs",
    //220 => "XAF Chad, CFA francs",
    //221 => "XAF Congo, Republic",
    //222 => "XAF Equatorial Guinea, CFA Franc BEAC",
    //223 => "XAF Gabon, CFA Franc BEAC",
    224 => "XCD Eastern Caribbean Dollar",
    //225 => "XCD Anguilla, East Caribbean dollar",
    //226 => "XCD Dominica, East Caribbean dollar",
    //227 => "XCD Grenada, East Caribbean dollar",
    //228 => "XCD Saint Lucia, East Caribbean dollar",
    //229 => "XCD Montserrat, East Caribbean dollar",
    //230 => "XCD Saint Kitts and Nevis, East Caribbean dollar",
    //231 => "XCD Saint Vincent and the Grenadines, East Caribbean dollar",
    232 => "XOF Communaute Financiere Africaine Franc",
    //233 => "XOF Burkina Faso, Communaute Financiere Africaine Franc",
    //234 => "XOF Côte d'Ivoire, West African CFA Franc",
    //235 => "XOF Guinea-Bissau, CFA Franc BCEAO",
    //236 => "XOF Mali, CFA Franc BCEAO",
    //237 => "XOF Niger, CFA Franc BCEAO",
    //238 => "XOF Senegal, CFA Franc BCEAO",
    //239 => "XOF Togo,CFA Franc BCEAO",
    //240 => "XPF CFP Franc",
    //241 => "XPF French Polynesia, CFP Franc",
    //242 => "XPF New Caledonia, CFP Franc",
    //243 => "XPF Wallis and Futuna, CFP Franc",
    244 => "YER Yemen, Rials",
    245 => "ZAR South African Rand",
    //246 => "ZAR South African rand",
    //247 => "ZAR Namibia, South African rand",
    248 => "ZMK Zambia, Zambian Kwacha",
    249 => "ZWD Zimbabwe, Zimbabwe Dollars",
);