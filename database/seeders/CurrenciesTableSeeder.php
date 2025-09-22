<?php

/**
 * Currencies Table Seeder.
 *
 * @package Database Seeders
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link https://github.com/nlmenke/vertebrae
 */

declare(strict_types=1);

namespace Database\Seeders;

use App\Entities\Currency\Currency;
use App\Jobs\UpdateExchangeRates;
use CreateCurrenciesTable;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * The Currencies seeder class.
 *
 * This class adds the world's currencies to the `currencies` table. Currencies
 * also include the symbol, decimal precision, and exchange rate in relation to
 * the US Dollar (USD).
 *
 * @since x.x.x introduced
 */
class CurrenciesTableSeeder extends AbstractSeeder
{
    use DispatchesJobs;

    /**
     * Tables that should be truncated before running.
     *
     * @var array
     */
    protected $truncateTables = [
        CreateCurrenciesTable::TABLE,
    ];

    /**
     * Create a new seeder instance.
     *
     * @param Currency $model
     *
     * @return void
     */
    public function __construct(Currency $model)
    {
        $this->model = $model;

        $this->itemList = [
            ['iso_alpha' => 'AED', 'iso_numeric' => '784', 'name' => 'United Arab Emirates Dirham', 'symbol' => 'د.إ'],
            ['iso_alpha' => 'AFN', 'iso_numeric' => '971', 'name' => 'Afghan Afghani', 'symbol' => '؋'],
            ['iso_alpha' => 'ALL', 'iso_numeric' => '008', 'name' => 'Albanian Lek', 'symbol' => 'L'],
            ['iso_alpha' => 'AMD', 'iso_numeric' => '051', 'name' => 'Armenian Dram', 'symbol' => '֏'],
            ['iso_alpha' => 'ANG', 'iso_numeric' => '532', 'name' => 'Netherlands Antillean Guilder', 'symbol' => 'ƒ'],
            ['iso_alpha' => 'AOA', 'iso_numeric' => '973', 'name' => 'Angolan Kwanza', 'symbol' => 'Kz'],
            ['iso_alpha' => 'ARS', 'iso_numeric' => '032', 'name' => 'Argentine Peso'],
            ['iso_alpha' => 'AUD', 'iso_numeric' => '036', 'name' => 'Australian Dollar'],
            ['iso_alpha' => 'AWG', 'iso_numeric' => '533', 'name' => 'Aruban Florin', 'symbol' => 'ƒ'],
            ['iso_alpha' => 'AZN', 'iso_numeric' => '944', 'name' => 'Azerbaijani Manat', 'symbol' => '₼'],
            ['iso_alpha' => 'BAM', 'iso_numeric' => '977', 'name' => 'Bosnia and Herzegovina Convertible Mark', 'symbol' => 'KM'],
            ['iso_alpha' => 'BBD', 'iso_numeric' => '052', 'name' => 'Barbadian Dollar'],
            ['iso_alpha' => 'BDT', 'iso_numeric' => '050', 'name' => 'Bangladeshi Taka', 'symbol' => '৳'],
            ['iso_alpha' => 'BGN', 'iso_numeric' => '975', 'name' => 'Bulgarian Lev', 'symbol' => 'лв'],
            ['iso_alpha' => 'BHD', 'iso_numeric' => '048', 'name' => 'Bahraini Dinar', 'symbol' => '.د.ب', 'decimal_precision' => 3],
            ['iso_alpha' => 'BIF', 'iso_numeric' => '108', 'name' => 'Burundian Franc', 'symbol' => 'FBu', 'decimal_precision' => 0],
            ['iso_alpha' => 'BMD', 'iso_numeric' => '060', 'name' => 'Bermudian Dollar'],
            ['iso_alpha' => 'BND', 'iso_numeric' => '096', 'name' => 'Brunei Dollar'],
            ['iso_alpha' => 'BOB', 'iso_numeric' => '068', 'name' => 'Bolivian Bolíviano', 'symbol' => 'Bs.'],
            ['iso_alpha' => 'BRL', 'iso_numeric' => '986', 'name' => 'Brazilian Real', 'symbol' => 'R$'],
            ['iso_alpha' => 'BSD', 'iso_numeric' => '044', 'name' => 'Bahamian Dollar'],
            ['iso_alpha' => 'BTN', 'iso_numeric' => '064', 'name' => 'Bhutanese Ngultrum', 'symbol' => 'Nu.'],
            ['iso_alpha' => 'BWP', 'iso_numeric' => '072', 'name' => 'Botswana Pula', 'symbol' => 'P'],
            ['iso_alpha' => 'BYN', 'iso_numeric' => '974', 'name' => 'Belarusian Ruble', 'symbol' => 'Br', 'decimal_precision' => 0],
            ['iso_alpha' => 'BZD', 'iso_numeric' => '084', 'name' => 'Belize Dollar'],
            ['iso_alpha' => 'CAD', 'iso_numeric' => '124', 'name' => 'Canadian Dollar'],
            ['iso_alpha' => 'CDF', 'iso_numeric' => '976', 'name' => 'Congolese Franc', 'symbol' => 'FC'],
            ['iso_alpha' => 'CHF', 'iso_numeric' => '756', 'name' => 'Swiss Franc', 'symbol' => 'CHF'],
            ['iso_alpha' => 'CLP', 'iso_numeric' => '152', 'name' => 'Chilean Peso', 'decimal_precision' => 0],
            ['iso_alpha' => 'CNY', 'iso_numeric' => '156', 'name' => 'Chinese Yuan Renminbi', 'symbol' => '¥'],
            ['iso_alpha' => 'COP', 'iso_numeric' => '170', 'name' => 'Colombian Peso'],
            ['iso_alpha' => 'CRC', 'iso_numeric' => '188', 'name' => 'Costa Rican Colón', 'symbol' => '₡'],
            ['iso_alpha' => 'CUP', 'iso_numeric' => '192', 'name' => 'Cuban Peso', 'symbol' => '₱'],
            ['iso_alpha' => 'CVE', 'iso_numeric' => '132', 'name' => 'Cape Verdean Escudo'],
            ['iso_alpha' => 'CZK', 'iso_numeric' => '203', 'name' => 'Czech Koruna', 'symbol' => 'Kč'],
            ['iso_alpha' => 'DJF', 'iso_numeric' => '262', 'name' => 'Djiboutian Franc', 'symbol' => 'Fdj', 'decimal_precision' => 0],
            ['iso_alpha' => 'DKK', 'iso_numeric' => '208', 'name' => 'Danish Krone', 'symbol' => 'kr.'],
            ['iso_alpha' => 'DOP', 'iso_numeric' => '214', 'name' => 'Dominican Peso'],
            ['iso_alpha' => 'DZD', 'iso_numeric' => '012', 'name' => 'Algerian Dinar', 'symbol' => 'د.ج'],
            ['iso_alpha' => 'EGP', 'iso_numeric' => '818', 'name' => 'Egyptian Pound', 'symbol' => 'ج.م'],
            ['iso_alpha' => 'ERN', 'iso_numeric' => '232', 'name' => 'Eritrean Nakfa', 'symbol' => 'Nfk'],
            ['iso_alpha' => 'ETB', 'iso_numeric' => '230', 'name' => 'Ethiopian Birr', 'symbol' => 'Br'],
            ['iso_alpha' => 'EUR', 'iso_numeric' => '978', 'name' => 'Euro', 'symbol' => '€'],
            ['iso_alpha' => 'FJD', 'iso_numeric' => '242', 'name' => 'Fijian Dollar'],
            ['iso_alpha' => 'FKP', 'iso_numeric' => '238', 'name' => 'Falkland Islands Pound', 'symbol' => '£'],
            ['iso_alpha' => 'GBP', 'iso_numeric' => '826', 'name' => 'Pound Sterling', 'symbol' => '£'],
            ['iso_alpha' => 'GEL', 'iso_numeric' => '981', 'name' => 'Georgian Lari', 'symbol' => 'ლ'],
            ['iso_alpha' => 'GHS', 'iso_numeric' => '936', 'name' => 'Ghanaian Cedi', 'symbol' => '₵'],
            ['iso_alpha' => 'GIP', 'iso_numeric' => '292', 'name' => 'Gibraltar Pound', 'symbol' => '£'],
            ['iso_alpha' => 'GMD', 'iso_numeric' => '270', 'name' => 'Gambian Dalasi', 'symbol' => 'D'],
            ['iso_alpha' => 'GNF', 'iso_numeric' => '324', 'name' => 'Guinean Franc', 'symbol' => 'Fr', 'decimal_precision' => 0],
            ['iso_alpha' => 'GTQ', 'iso_numeric' => '320', 'name' => 'Guatemalan Quetzal', 'symbol' => 'Q'],
            ['iso_alpha' => 'GYD', 'iso_numeric' => '328', 'name' => 'Guyanese Dollar'],
            ['iso_alpha' => 'HKD', 'iso_numeric' => '344', 'name' => 'Hong Kong Dollar'],
            ['iso_alpha' => 'HNL', 'iso_numeric' => '340', 'name' => 'Honduran Lempira', 'symbol' => 'L'],
            ['iso_alpha' => 'HRK', 'iso_numeric' => '191', 'name' => 'Croatian Kuna', 'symbol' => 'kn'],
            ['iso_alpha' => 'HTG', 'iso_numeric' => '332', 'name' => 'Haitian Gourde', 'symbol' => 'G'],
            ['iso_alpha' => 'HUF', 'iso_numeric' => '348', 'name' => 'Hungarian Forint', 'symbol' => 'Ft'],
            ['iso_alpha' => 'IDR', 'iso_numeric' => '360', 'name' => 'Indonesian Rupiah', 'symbol' => 'Rp'],
            ['iso_alpha' => 'ILS', 'iso_numeric' => '376', 'name' => 'Israeli Shekel', 'symbol' => '₪'],
            ['iso_alpha' => 'INR', 'iso_numeric' => '356', 'name' => 'Indian Rupee', 'symbol' => '₹'],
            ['iso_alpha' => 'IQD', 'iso_numeric' => '368', 'name' => 'Iraqi Dinar', 'symbol' => 'ع.د', 'decimal_precision' => 3],
            ['iso_alpha' => 'IRR', 'iso_numeric' => '364', 'name' => 'Iranian Rial', 'symbol' => '﷼'],
            ['iso_alpha' => 'ISK', 'iso_numeric' => '352', 'name' => 'Icelandic Króna', 'symbol' => 'kr', 'decimal_precision' => 0],
            ['iso_alpha' => 'JMD', 'iso_numeric' => '388', 'name' => 'Jamaican Dollar'],
            ['iso_alpha' => 'JOD', 'iso_numeric' => '400', 'name' => 'Jordanian Dinar', 'symbol' => 'د.ا', 'decimal_precision' => 3],
            ['iso_alpha' => 'JPY', 'iso_numeric' => '392', 'name' => 'Japanese Yen', 'symbol' => '¥', 'decimal_precision' => 0],
            ['iso_alpha' => 'KES', 'iso_numeric' => '404', 'name' => 'Kenyan Shilling', 'symbol' => 'KSh'],
            ['iso_alpha' => 'KGS', 'iso_numeric' => '417', 'name' => 'Kyrgyzstani Som', 'symbol' => 'лв'],
            ['iso_alpha' => 'KHR', 'iso_numeric' => '116', 'name' => 'Cambodian Riel', 'symbol' => '៛'],
            ['iso_alpha' => 'KMF', 'iso_numeric' => '174', 'name' => 'Comorian Franc', 'symbol' => 'Fr', 'decimal_precision' => 0],
            ['iso_alpha' => 'KPW', 'iso_numeric' => '408', 'name' => 'North Korean Won', 'symbol' => '₩'],
            ['iso_alpha' => 'KRW', 'iso_numeric' => '410', 'name' => 'South Korean Won', 'symbol' => '₩', 'decimal_precision' => 0],
            ['iso_alpha' => 'KWD', 'iso_numeric' => '414', 'name' => 'Kuwaiti Dinar', 'symbol' => 'د.ك', 'decimal_precision' => 3],
            ['iso_alpha' => 'KYD', 'iso_numeric' => '136', 'name' => 'Cayman Islands Dollar'],
            ['iso_alpha' => 'KZT', 'iso_numeric' => '398', 'name' => 'Kazakhstani Tenge', 'symbol' => '〒'],
            ['iso_alpha' => 'LAK', 'iso_numeric' => '418', 'name' => 'Lao Kip', 'symbol' => '₭'],
            ['iso_alpha' => 'LBP', 'iso_numeric' => '422', 'name' => 'Lebanese Pound', 'symbol' => 'ل.ل'],
            ['iso_alpha' => 'LKR', 'iso_numeric' => '144', 'name' => 'Sri Lankan Rupee', 'symbol' => '₨'],
            ['iso_alpha' => 'LRD', 'iso_numeric' => '430', 'name' => 'Liberian Dollar'],
            ['iso_alpha' => 'LSL', 'iso_numeric' => '426', 'name' => 'Lesotho Loti', 'symbol' => 'L'],
            ['iso_alpha' => 'LYD', 'iso_numeric' => '434', 'name' => 'Libyan Dinar', 'symbol' => 'ل.د', 'decimal_precision' => 3],
            ['iso_alpha' => 'MAD', 'iso_numeric' => '504', 'name' => 'Moroccan Dirham', 'symbol' => 'د.م.'],
            ['iso_alpha' => 'MDL', 'iso_numeric' => '498', 'name' => 'Moldovan Leu', 'symbol' => 'L'],
            ['iso_alpha' => 'MGA', 'iso_numeric' => '969', 'name' => 'Malagasy Ariary', 'symbol' => 'Ar'],
            ['iso_alpha' => 'MKD', 'iso_numeric' => '807', 'name' => 'Macedonian Denar', 'symbol' => 'ден'],
            ['iso_alpha' => 'MMK', 'iso_numeric' => '104', 'name' => 'Burmese Kyat', 'symbol' => 'K'],
            ['iso_alpha' => 'MNT', 'iso_numeric' => '496', 'name' => 'Mongolian Tögrög', 'symbol' => '₮'],
            ['iso_alpha' => 'MOP', 'iso_numeric' => '446', 'name' => 'Macanese Pataca', 'symbol' => 'P'],
            ['iso_alpha' => 'MRO', 'iso_numeric' => '478', 'name' => 'Mauritanian Ouguiya', 'symbol' => 'UM'],
            ['iso_alpha' => 'MUR', 'iso_numeric' => '480', 'name' => 'Mauritian Rupee', 'symbol' => '₨'],
            ['iso_alpha' => 'MVR', 'iso_numeric' => '462', 'name' => 'Maldivian Rufiyaa', 'symbol' => 'MVR'],
            ['iso_alpha' => 'MWK', 'iso_numeric' => '454', 'name' => 'Malawian Kwacha', 'symbol' => 'MK'],
            ['iso_alpha' => 'MXN', 'iso_numeric' => '484', 'name' => 'Mexican Peso'],
            ['iso_alpha' => 'MYR', 'iso_numeric' => '458', 'name' => 'Malaysian Ringgit', 'symbol' => 'RM'],
            ['iso_alpha' => 'MZN', 'iso_numeric' => '943', 'name' => 'Mozambican Metical', 'symbol' => 'MTn'],
            ['iso_alpha' => 'NAD', 'iso_numeric' => '516', 'name' => 'Namibian Dollar'],
            ['iso_alpha' => 'NGN', 'iso_numeric' => '566', 'name' => 'Nigerian Naira', 'symbol' => '₦'],
            ['iso_alpha' => 'NIO', 'iso_numeric' => '558', 'name' => 'Nicaraguan Córdoba', 'symbol' => 'C$'],
            ['iso_alpha' => 'NOK', 'iso_numeric' => '578', 'name' => 'Norwegian Krone', 'symbol' => 'kr'],
            ['iso_alpha' => 'NPR', 'iso_numeric' => '524', 'name' => 'Nepalese Rupee', 'symbol' => 'रू'],
            ['iso_alpha' => 'NZD', 'iso_numeric' => '554', 'name' => 'New Zealand Dollar'],
            ['iso_alpha' => 'OMR', 'iso_numeric' => '512', 'name' => 'Omani Rial', 'symbol' => 'ر.ع.', 'decimal_precision' => 3],
            ['iso_alpha' => 'PAB', 'iso_numeric' => '590', 'name' => 'Panamanian Balboa', 'symbol' => 'B/.'],
            ['iso_alpha' => 'PEN', 'iso_numeric' => '604', 'name' => 'Peruvian Sol', 'symbol' => 'S/.'],
            ['iso_alpha' => 'PGK', 'iso_numeric' => '598', 'name' => 'Papua New Guinean Kina', 'symbol' => 'K'],
            ['iso_alpha' => 'PHP', 'iso_numeric' => '608', 'name' => 'Philippine Peso', 'symbol' => '₱'],
            ['iso_alpha' => 'PKR', 'iso_numeric' => '586', 'name' => 'Pakistani Rupee', 'symbol' => '₨'],
            ['iso_alpha' => 'PLN', 'iso_numeric' => '985', 'name' => 'Polish Złoty', 'symbol' => 'zł'],
            ['iso_alpha' => 'PYG', 'iso_numeric' => '600', 'name' => 'Paraguayan Guaraní', 'symbol' => '₲', 'decimal_precision' => 0],
            ['iso_alpha' => 'QAR', 'iso_numeric' => '634', 'name' => 'Qatari Riyal', 'symbol' => 'ر.ق'],
            ['iso_alpha' => 'RON', 'iso_numeric' => '946', 'name' => 'Romanian Leu', 'symbol' => 'Lei'],
            ['iso_alpha' => 'RSD', 'iso_numeric' => '941', 'name' => 'Serbian Dinar', 'symbol' => 'РСД'],
            ['iso_alpha' => 'RUB', 'iso_numeric' => '643', 'name' => 'Russian Ruble', 'symbol' => '₽'],
            ['iso_alpha' => 'RWF', 'iso_numeric' => '646', 'name' => 'Rwandan Franc', 'symbol' => 'FRw'],
            ['iso_alpha' => 'SAR', 'iso_numeric' => '682', 'name' => 'Saudi Riyal', 'symbol' => 'ر.س'],
            ['iso_alpha' => 'SBD', 'iso_numeric' => '090', 'name' => 'Solomon Islands Dollar'],
            ['iso_alpha' => 'SCR', 'iso_numeric' => '690', 'name' => 'Seychellois Rupee', 'symbol' => '₨'],
            ['iso_alpha' => 'SDG', 'iso_numeric' => '938', 'name' => 'Sudanese Pound', 'symbol' => '£'],
            ['iso_alpha' => 'SEK', 'iso_numeric' => '752', 'name' => 'Swedish Krona', 'symbol' => 'kr'],
            ['iso_alpha' => 'SGD', 'iso_numeric' => '702', 'name' => 'Singapore Dollar'],
            ['iso_alpha' => 'SHP', 'iso_numeric' => '654', 'name' => 'Saint Helena Pound', 'symbol' => '£'],
            ['iso_alpha' => 'SLL', 'iso_numeric' => '694', 'name' => 'Sierra Leonean Leone', 'symbol' => 'Le'],
            ['iso_alpha' => 'SOS', 'iso_numeric' => '706', 'name' => 'Somali Shilling', 'symbol' => 'Sh'],
            ['iso_alpha' => 'SRD', 'iso_numeric' => '968', 'name' => 'Surinamese Dollar'],
            ['iso_alpha' => 'SSP', 'iso_numeric' => '728', 'name' => 'South Sudanese Pound', 'symbol' => '£'],
            ['iso_alpha' => 'STD', 'iso_numeric' => '678', 'name' => 'São Tomé and Príncipe Dobra', 'symbol' => 'Db'],
            ['iso_alpha' => 'SVC', 'iso_numeric' => '222', 'name' => 'Salvadoran Colón', 'symbol' => '₡'],
            ['iso_alpha' => 'SYP', 'iso_numeric' => '760', 'name' => 'Syrian Pound', 'symbol' => '£S'],
            ['iso_alpha' => 'SZL', 'iso_numeric' => '748', 'name' => 'Swazi Lilangeni', 'symbol' => 'E'],
            ['iso_alpha' => 'THB', 'iso_numeric' => '764', 'name' => 'Thai Baht', 'symbol' => '฿'],
            ['iso_alpha' => 'TJS', 'iso_numeric' => '972', 'name' => 'Tajikistani Somoni', 'symbol' => 'ЅМ'],
            ['iso_alpha' => 'TMT', 'iso_numeric' => '934', 'name' => 'Turkmenistan Manat', 'symbol' => 'T'],
            ['iso_alpha' => 'TND', 'iso_numeric' => '788', 'name' => 'Tunisian Dinar', 'symbol' => 'د.ت', 'decimal_precision' => 3],
            ['iso_alpha' => 'TOP', 'iso_numeric' => '776', 'name' => 'Tongan Paʻanga', 'symbol' => 'T$'],
            ['iso_alpha' => 'TRY', 'iso_numeric' => '949', 'name' => 'Turkish Lira', 'symbol' => '₺'],
            ['iso_alpha' => 'TTD', 'iso_numeric' => '780', 'name' => 'Trinidad and Tobago Dollar'],
            ['iso_alpha' => 'TWD', 'iso_numeric' => '901', 'name' => 'New Taiwan Dollar'],
            ['iso_alpha' => 'TZS', 'iso_numeric' => '834', 'name' => 'Tanzanian Shilling', 'symbol' => 'Sh'],
            ['iso_alpha' => 'UAH', 'iso_numeric' => '980', 'name' => 'Ukrainian Hryvnia', 'symbol' => '₴'],
            ['iso_alpha' => 'UGX', 'iso_numeric' => '800', 'name' => 'Ugandan Shilling', 'symbol' => 'USh', 'decimal_precision' => 0],
            ['iso_alpha' => 'USD', 'iso_numeric' => '840', 'name' => 'United States Dollar'],
            ['iso_alpha' => 'UYU', 'iso_numeric' => '858', 'name' => 'Uruguayan Peso'],
            ['iso_alpha' => 'UZS', 'iso_numeric' => '860', 'name' => 'Uzbekistani Som', 'symbol' => 'лв'],
            ['iso_alpha' => 'VEF', 'iso_numeric' => '937', 'name' => 'Venezuelan Bolívar', 'symbol' => 'Bs F'],
            ['iso_alpha' => 'VND', 'iso_numeric' => '704', 'name' => 'Vietnamese Dong', 'symbol' => '₫', 'decimal_precision' => 0],
            ['iso_alpha' => 'VUV', 'iso_numeric' => '548', 'name' => 'Vanuatu Vatu', 'symbol' => 'Vt', 'decimal_precision' => 0],
            ['iso_alpha' => 'WST', 'iso_numeric' => '882', 'name' => 'Samoan Tālā', 'symbol' => 'T'],
            ['iso_alpha' => 'XAF', 'iso_numeric' => '950', 'name' => 'Central African CFA Franc', 'symbol' => 'Fr', 'decimal_precision' => 0],
            ['iso_alpha' => 'XCD', 'iso_numeric' => '951', 'name' => 'East Caribbean Dollar'],
            ['iso_alpha' => 'XOF', 'iso_numeric' => '952', 'name' => 'West African CFA Franc', 'symbol' => 'Fr', 'decimal_precision' => 0],
            ['iso_alpha' => 'XPF', 'iso_numeric' => '953', 'name' => 'CFP Franc', 'symbol' => 'Fr', 'decimal_precision' => 0],
            ['iso_alpha' => 'YER', 'iso_numeric' => '886', 'name' => 'Yemeni Rial', 'symbol' => '﷼'],
            ['iso_alpha' => 'ZAR', 'iso_numeric' => '710', 'name' => 'South African Rand', 'symbol' => 'R'],
            ['iso_alpha' => 'ZMW', 'iso_numeric' => '967', 'name' => 'Zambian Kwacha', 'symbol' => 'ZK'],
            ['iso_alpha' => 'ZWL', 'iso_numeric' => '932', 'name' => 'Zimbabwean Dollar'],
        ];
    }

    /**
     * Additional tasks to be completed after seeding has completed.
     *
     * @return void
     */
    public function complete(): void
    {
        $this->dispatch(new UpdateExchangeRates());
    }
}
