<?php

/**
 * Languages Table Seeder.
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

use App\Entities\Language\Language;
use CreateLanguagesTable;

/**
 * The Languages seeder class.
 *
 * This class adds the world's languages to the `languages` table. Language
 * names are listed in English, but the native tongue can be found within
 * `locales`.
 *
 * @since x.x.x introduced
 */
class LanguagesTableSeeder extends AbstractSeeder
{
    /**
     * Items to be added to the database.
     *
     * @var array
     */
    protected $itemList = [
        ['iso_alpha_2' => 'aa', 'iso_alpha_3' => 'aar', 'name' => 'Afar'],
        ['iso_alpha_2' => 'ab', 'iso_alpha_3' => 'abk', 'name' => 'Abkhazian'],
        ['iso_alpha_2' => 'ae', 'iso_alpha_3' => 'ave', 'name' => 'Avestan'],
        ['iso_alpha_2' => 'af', 'iso_alpha_3' => 'afr', 'name' => 'Afrekaans'],
        ['iso_alpha_2' => 'ak', 'iso_alpha_3' => 'aka', 'name' => 'Akan'],
        ['iso_alpha_2' => 'am', 'iso_alpha_3' => 'amh', 'name' => 'Amharic'],
        ['iso_alpha_2' => 'an', 'iso_alpha_3' => 'arg', 'name' => 'Aragonese'],
        ['iso_alpha_2' => 'ar', 'iso_alpha_3' => 'ara', 'name' => 'Arabic'],
        ['iso_alpha_2' => 'as', 'iso_alpha_3' => 'asm', 'name' => 'Assamese'],
        ['iso_alpha_2' => 'av', 'iso_alpha_3' => 'ava', 'name' => 'Avaric'],
        ['iso_alpha_2' => 'ay', 'iso_alpha_3' => 'aym', 'name' => 'Aymara'],
        ['iso_alpha_2' => 'az', 'iso_alpha_3' => 'aze', 'name' => 'Azerbaijani'],
        ['iso_alpha_2' => 'ba', 'iso_alpha_3' => 'bak', 'name' => 'Bashkir'],
        ['iso_alpha_2' => 'be', 'iso_alpha_3' => 'bel', 'name' => 'Belarusian'],
        ['iso_alpha_2' => 'bg', 'iso_alpha_3' => 'bul', 'name' => 'Bulgarian'],
        ['iso_alpha_2' => 'bh', 'iso_alpha_3' => 'bih', 'name' => 'Bihari'],
        ['iso_alpha_2' => 'bi', 'iso_alpha_3' => 'bis', 'name' => 'Bislama'],
        ['iso_alpha_2' => 'bm', 'iso_alpha_3' => 'bam', 'name' => 'Bambara'],
        ['iso_alpha_2' => 'bn', 'iso_alpha_3' => 'ben', 'name' => 'Bengali'],
        ['iso_alpha_2' => 'bo', 'iso_alpha_3' => 'bod', 'name' => 'Tibetan'],
        ['iso_alpha_2' => 'br', 'iso_alpha_3' => 'bre', 'name' => 'Breton'],
        ['iso_alpha_2' => 'bs', 'iso_alpha_3' => 'bos', 'name' => 'Bosnian'],
        ['iso_alpha_2' => 'ca', 'iso_alpha_3' => 'cat', 'name' => 'Catalan'],
        ['iso_alpha_2' => 'ce', 'iso_alpha_3' => 'che', 'name' => 'Chechen'],
        ['iso_alpha_2' => 'ch', 'iso_alpha_3' => 'cha', 'name' => 'Chamorro'],
        ['iso_alpha_2' => 'co', 'iso_alpha_3' => 'cos', 'name' => 'Corsican'],
        ['iso_alpha_2' => 'cr', 'iso_alpha_3' => 'cre', 'name' => 'Cree'],
        ['iso_alpha_2' => 'cs', 'iso_alpha_3' => 'ces', 'name' => 'Czech'],
        ['iso_alpha_2' => 'cu', 'iso_alpha_3' => 'chu', 'name' => 'Church Slavic'],
        ['iso_alpha_2' => 'cv', 'iso_alpha_3' => 'chv', 'name' => 'Chuvash'],
        ['iso_alpha_2' => 'cy', 'iso_alpha_3' => 'cym', 'name' => 'Welsh'],
        ['iso_alpha_2' => 'da', 'iso_alpha_3' => 'dan', 'name' => 'Danish'],
        ['iso_alpha_2' => 'de', 'iso_alpha_3' => 'deu', 'name' => 'German'],
        ['iso_alpha_2' => 'dv', 'iso_alpha_3' => 'div', 'name' => 'Divehi'],
        ['iso_alpha_2' => 'dz', 'iso_alpha_3' => 'dzo', 'name' => 'Dzongkha'],
        ['iso_alpha_2' => 'ee', 'iso_alpha_3' => 'ewe', 'name' => 'Ewe'],
        ['iso_alpha_2' => 'el', 'iso_alpha_3' => 'ell', 'name' => 'Greek'],
        ['iso_alpha_2' => 'en', 'iso_alpha_3' => 'eng', 'name' => 'English'],
        ['iso_alpha_2' => 'eo', 'iso_alpha_3' => 'epo', 'name' => 'Esperanto'],
        ['iso_alpha_2' => 'es', 'iso_alpha_3' => 'spa', 'name' => 'Spanish'],
        ['iso_alpha_2' => 'et', 'iso_alpha_3' => 'est', 'name' => 'Estonian'],
        ['iso_alpha_2' => 'eu', 'iso_alpha_3' => 'eus', 'name' => 'Basque'],
        ['iso_alpha_2' => 'fa', 'iso_alpha_3' => 'fas', 'name' => 'Persian'],
        ['iso_alpha_2' => 'ff', 'iso_alpha_3' => 'ful', 'name' => 'Fulah'],
        ['iso_alpha_2' => 'fi', 'iso_alpha_3' => 'fin', 'name' => 'Finnish'],
        ['iso_alpha_2' => 'fj', 'iso_alpha_3' => 'fij', 'name' => 'Fijian'],
        ['iso_alpha_2' => 'fo', 'iso_alpha_3' => 'fao', 'name' => 'Faroese'],
        ['iso_alpha_2' => 'fr', 'iso_alpha_3' => 'fra', 'name' => 'French'],
        ['iso_alpha_2' => 'fy', 'iso_alpha_3' => 'fry', 'name' => 'Frisian'],
        ['iso_alpha_2' => 'ga', 'iso_alpha_3' => 'gle', 'name' => 'Irish'],
        ['iso_alpha_2' => 'gd', 'iso_alpha_3' => 'gla', 'name' => 'Gaelic'],
        ['iso_alpha_2' => 'gl', 'iso_alpha_3' => 'glg', 'name' => 'Galician'],
        ['iso_alpha_2' => 'gn', 'iso_alpha_3' => 'grn', 'name' => 'Guaraní'],
        ['iso_alpha_2' => 'gu', 'iso_alpha_3' => 'guj', 'name' => 'Gujarati'],
        ['iso_alpha_2' => 'gv', 'iso_alpha_3' => 'glv', 'name' => 'Manx'],
        ['iso_alpha_2' => 'ha', 'iso_alpha_3' => 'hau', 'name' => 'Hausa'],
        ['iso_alpha_2' => 'he', 'iso_alpha_3' => 'heb', 'name' => 'Hebrew'],
        ['iso_alpha_2' => 'hi', 'iso_alpha_3' => 'hin', 'name' => 'Hindi'],
        ['iso_alpha_2' => 'ho', 'iso_alpha_3' => 'hmo', 'name' => 'Hiri Motu'],
        ['iso_alpha_2' => 'hr', 'iso_alpha_3' => 'hrv', 'name' => 'Croatian'],
        ['iso_alpha_2' => 'ht', 'iso_alpha_3' => 'hat', 'name' => 'Haitian'],
        ['iso_alpha_2' => 'hu', 'iso_alpha_3' => 'hun', 'name' => 'Hungarian'],
        ['iso_alpha_2' => 'hy', 'iso_alpha_3' => 'hye', 'name' => 'Armenian'],
        ['iso_alpha_2' => 'hz', 'iso_alpha_3' => 'her', 'name' => 'Herero'],
        ['iso_alpha_2' => 'ia', 'iso_alpha_3' => 'ina', 'name' => 'Interlingua'],
        ['iso_alpha_2' => 'id', 'iso_alpha_3' => 'ind', 'name' => 'Indonesian'],
        ['iso_alpha_2' => 'ie', 'iso_alpha_3' => 'ile', 'name' => 'Interlingue'],
        ['iso_alpha_2' => 'ig', 'iso_alpha_3' => 'ibo', 'name' => 'Igbo'],
        ['iso_alpha_2' => 'ii', 'iso_alpha_3' => 'iii', 'name' => 'Nuosu'],
        ['iso_alpha_2' => 'ik', 'iso_alpha_3' => 'ipk', 'name' => 'Inupiaq'],
        ['iso_alpha_2' => 'io', 'iso_alpha_3' => 'ido', 'name' => 'Ido'],
        ['iso_alpha_2' => 'is', 'iso_alpha_3' => 'isl', 'name' => 'Icelandic'],
        ['iso_alpha_2' => 'it', 'iso_alpha_3' => 'ita', 'name' => 'Italian'],
        ['iso_alpha_2' => 'iu', 'iso_alpha_3' => 'iku', 'name' => 'Inuktitut'],
        ['iso_alpha_2' => 'ja', 'iso_alpha_3' => 'jpn', 'name' => 'Japanese'],
        ['iso_alpha_2' => 'jv', 'iso_alpha_3' => 'jav', 'name' => 'Javanese'],
        ['iso_alpha_2' => 'ka', 'iso_alpha_3' => 'kat', 'name' => 'Georgian'],
        ['iso_alpha_2' => 'kg', 'iso_alpha_3' => 'kok', 'name' => 'Kongo'],
        ['iso_alpha_2' => 'ki', 'iso_alpha_3' => 'kik', 'name' => 'Kikuyu'],
        ['iso_alpha_2' => 'kj', 'iso_alpha_3' => 'kua', 'name' => 'Kuanyama'],
        ['iso_alpha_2' => 'kk', 'iso_alpha_3' => 'kaz', 'name' => 'Kazakh'],
        ['iso_alpha_2' => 'kl', 'iso_alpha_3' => 'kal', 'name' => 'Kalaallisut'],
        ['iso_alpha_2' => 'km', 'iso_alpha_3' => 'khm', 'name' => 'Khmer'],
        ['iso_alpha_2' => 'kn', 'iso_alpha_3' => 'kan', 'name' => 'Kannada'],
        ['iso_alpha_2' => 'ko', 'iso_alpha_3' => 'kor', 'name' => 'Korean'],
        ['iso_alpha_2' => 'kr', 'iso_alpha_3' => 'kau', 'name' => 'Kanuri'],
        ['iso_alpha_2' => 'ks', 'iso_alpha_3' => 'kas', 'name' => 'Kashmiri'],
        ['iso_alpha_2' => 'ku', 'iso_alpha_3' => 'kur', 'name' => 'Kurdish'],
        ['iso_alpha_2' => 'kv', 'iso_alpha_3' => 'kom', 'name' => 'Komi'],
        ['iso_alpha_2' => 'kw', 'iso_alpha_3' => 'cor', 'name' => 'Cornish'],
        ['iso_alpha_2' => 'ky', 'iso_alpha_3' => 'kir', 'name' => 'Kyrgyz'],
        ['iso_alpha_2' => 'la', 'iso_alpha_3' => 'lat', 'name' => 'Latin'],
        ['iso_alpha_2' => 'lb', 'iso_alpha_3' => 'ltz', 'name' => 'Luxembourgish'],
        ['iso_alpha_2' => 'lg', 'iso_alpha_3' => 'lug', 'name' => 'Ganda'],
        ['iso_alpha_2' => 'li', 'iso_alpha_3' => 'lim', 'name' => 'Limburgan'],
        ['iso_alpha_2' => 'ln', 'iso_alpha_3' => 'lin', 'name' => 'Lingala'],
        ['iso_alpha_2' => 'lo', 'iso_alpha_3' => 'lao', 'name' => 'Lao'],
        ['iso_alpha_2' => 'lt', 'iso_alpha_3' => 'lit', 'name' => 'Lithuanian'],
        ['iso_alpha_2' => 'lu', 'iso_alpha_3' => 'lub', 'name' => 'Luba-Katanga'],
        ['iso_alpha_2' => 'lv', 'iso_alpha_3' => 'lav', 'name' => 'Latvian'],
        ['iso_alpha_2' => 'mg', 'iso_alpha_3' => 'mlg', 'name' => 'Malagasy'],
        ['iso_alpha_2' => 'mh', 'iso_alpha_3' => 'mah', 'name' => 'Marshallese'],
        ['iso_alpha_2' => 'mi', 'iso_alpha_3' => 'mri', 'name' => 'Maori'],
        ['iso_alpha_2' => 'mk', 'iso_alpha_3' => 'mkd', 'name' => 'Macedonian'],
        ['iso_alpha_2' => 'ml', 'iso_alpha_3' => 'mal', 'name' => 'Malayalam'],
        ['iso_alpha_2' => 'mn', 'iso_alpha_3' => 'mon', 'name' => 'Mongolian'],
        ['iso_alpha_2' => 'mr', 'iso_alpha_3' => 'mar', 'name' => 'Marathi'],
        ['iso_alpha_2' => 'ms', 'iso_alpha_3' => 'msa', 'name' => 'Malay'],
        ['iso_alpha_2' => 'mt', 'iso_alpha_3' => 'mlt', 'name' => 'Maltese'],
        ['iso_alpha_2' => 'my', 'iso_alpha_3' => 'mya', 'name' => 'Burmese'],
        ['iso_alpha_2' => 'na', 'iso_alpha_3' => 'nau', 'name' => 'Nauru'],
        ['iso_alpha_2' => 'nb', 'iso_alpha_3' => 'nob', 'name' => 'Bokmål'],
        ['iso_alpha_2' => 'nd', 'iso_alpha_3' => 'nde', 'name' => 'Northern Ndebele'],
        ['iso_alpha_2' => 'ne', 'iso_alpha_3' => 'nep', 'name' => 'Nepali'],
        ['iso_alpha_2' => 'ng', 'iso_alpha_3' => 'ndo', 'name' => 'Ndonga'],
        ['iso_alpha_2' => 'nl', 'iso_alpha_3' => 'nld', 'name' => 'Dutch'],
        ['iso_alpha_2' => 'nn', 'iso_alpha_3' => 'nld', 'name' => 'Nynorsk'],
        ['iso_alpha_2' => 'no', 'iso_alpha_3' => 'nor', 'name' => 'Norwegian'],
        ['iso_alpha_2' => 'nr', 'iso_alpha_3' => 'nbl', 'name' => 'Southern Ndebele'],
        ['iso_alpha_2' => 'nv', 'iso_alpha_3' => 'nav', 'name' => 'Navajo'],
        ['iso_alpha_2' => 'ny', 'iso_alpha_3' => 'nya', 'name' => 'Chewa'],
        ['iso_alpha_2' => 'oc', 'iso_alpha_3' => 'oci', 'name' => 'Occitan'],
        ['iso_alpha_2' => 'oj', 'iso_alpha_3' => 'oji', 'name' => 'Ojibwa'],
        ['iso_alpha_2' => 'om', 'iso_alpha_3' => 'orm', 'name' => 'Oromo'],
        ['iso_alpha_2' => 'or', 'iso_alpha_3' => 'ori', 'name' => 'Oriya'],
        ['iso_alpha_2' => 'os', 'iso_alpha_3' => 'oss', 'name' => 'Ossetian'],
        ['iso_alpha_2' => 'pa', 'iso_alpha_3' => 'pan', 'name' => 'Panjabi'],
        ['iso_alpha_2' => 'pi', 'iso_alpha_3' => 'pli', 'name' => 'Pali'],
        ['iso_alpha_2' => 'pl', 'iso_alpha_3' => 'pol', 'name' => 'Polish'],
        ['iso_alpha_2' => 'ps', 'iso_alpha_3' => 'pus', 'name' => 'Pashto'],
        ['iso_alpha_2' => 'pt', 'iso_alpha_3' => 'por', 'name' => 'Portuguese'],
        ['iso_alpha_2' => 'qu', 'iso_alpha_3' => 'que', 'name' => 'Quechua'],
        ['iso_alpha_2' => 'rm', 'iso_alpha_3' => 'roh', 'name' => 'Romansh'],
        ['iso_alpha_2' => 'rn', 'iso_alpha_3' => 'run', 'name' => 'Rundi'],
        ['iso_alpha_2' => 'ro', 'iso_alpha_3' => 'ron', 'name' => 'Romanian'],
        ['iso_alpha_2' => 'ru', 'iso_alpha_3' => 'rus', 'name' => 'Russian'],
        ['iso_alpha_2' => 'rw', 'iso_alpha_3' => 'kin', 'name' => 'Kinyarwanda'],
        ['iso_alpha_2' => 'sa', 'iso_alpha_3' => 'san', 'name' => 'Sanskrit'],
        ['iso_alpha_2' => 'sc', 'iso_alpha_3' => 'srd', 'name' => 'Sardinian'],
        ['iso_alpha_2' => 'sd', 'iso_alpha_3' => 'snd', 'name' => 'Sindhi'],
        ['iso_alpha_2' => 'se', 'iso_alpha_3' => 'sme', 'name' => 'Sami'],
        ['iso_alpha_2' => 'sg', 'iso_alpha_3' => 'sag', 'name' => 'Sango'],
        ['iso_alpha_2' => 'si', 'iso_alpha_3' => 'sin', 'name' => 'Sinhala'],
        ['iso_alpha_2' => 'sk', 'iso_alpha_3' => 'slk', 'name' => 'Slovak'],
        ['iso_alpha_2' => 'sl', 'iso_alpha_3' => 'slv', 'name' => 'Slovene'],
        ['iso_alpha_2' => 'sm', 'iso_alpha_3' => 'smo', 'name' => 'Samoan'],
        ['iso_alpha_2' => 'sn', 'iso_alpha_3' => 'sna', 'name' => 'Shona'],
        ['iso_alpha_2' => 'so', 'iso_alpha_3' => 'som', 'name' => 'Somali'],
        ['iso_alpha_2' => 'sq', 'iso_alpha_3' => 'sqi', 'name' => 'Albanian'],
        ['iso_alpha_2' => 'sr', 'iso_alpha_3' => 'srp', 'name' => 'Serbian'],
        ['iso_alpha_2' => 'ss', 'iso_alpha_3' => 'ssw', 'name' => 'Swati'],
        ['iso_alpha_2' => 'st', 'iso_alpha_3' => 'sot', 'name' => 'Sotho'],
        ['iso_alpha_2' => 'su', 'iso_alpha_3' => 'sun', 'name' => 'Sundanese'],
        ['iso_alpha_2' => 'sv', 'iso_alpha_3' => 'swe', 'name' => 'Swedish'],
        ['iso_alpha_2' => 'sw', 'iso_alpha_3' => 'swa', 'name' => 'Swahili'],
        ['iso_alpha_2' => 'ta', 'iso_alpha_3' => 'tam', 'name' => 'Tamil'],
        ['iso_alpha_2' => 'te', 'iso_alpha_3' => 'tel', 'name' => 'Telugu'],
        ['iso_alpha_2' => 'tg', 'iso_alpha_3' => 'tgk', 'name' => 'Tajik'],
        ['iso_alpha_2' => 'th', 'iso_alpha_3' => 'tha', 'name' => 'Thai'],
        ['iso_alpha_2' => 'ti', 'iso_alpha_3' => 'tir', 'name' => 'Tigrinya'],
        ['iso_alpha_2' => 'tk', 'iso_alpha_3' => 'tuk', 'name' => 'Turkmen'],
        ['iso_alpha_2' => 'tl', 'iso_alpha_3' => 'tgl', 'name' => 'Tagalog'],
        ['iso_alpha_2' => 'tn', 'iso_alpha_3' => 'tsn', 'name' => 'Tswana'],
        ['iso_alpha_2' => 'to', 'iso_alpha_3' => 'ton', 'name' => 'Tongan'],
        ['iso_alpha_2' => 'tr', 'iso_alpha_3' => 'tur', 'name' => 'Turkish'],
        ['iso_alpha_2' => 'ts', 'iso_alpha_3' => 'tso', 'name' => 'Tsonga'],
        ['iso_alpha_2' => 'tt', 'iso_alpha_3' => 'tat', 'name' => 'Tatar'],
        ['iso_alpha_2' => 'tw', 'iso_alpha_3' => 'twi', 'name' => 'Twi'],
        ['iso_alpha_2' => 'ty', 'iso_alpha_3' => 'tah', 'name' => 'Tahitian'],
        ['iso_alpha_2' => 'ug', 'iso_alpha_3' => 'uig', 'name' => 'Uighur'],
        ['iso_alpha_2' => 'uk', 'iso_alpha_3' => 'ukr', 'name' => 'Ukrainian'],
        ['iso_alpha_2' => 'ur', 'iso_alpha_3' => 'urd', 'name' => 'Urdu'],
        ['iso_alpha_2' => 'uz', 'iso_alpha_3' => 'uzb', 'name' => 'Uzbek'],
        ['iso_alpha_2' => 've', 'iso_alpha_3' => 'ven', 'name' => 'Venda'],
        ['iso_alpha_2' => 'vi', 'iso_alpha_3' => 'vie', 'name' => 'Vietnamese'],
        ['iso_alpha_2' => 'vo', 'iso_alpha_3' => 'vol', 'name' => 'Volapük'],
        ['iso_alpha_2' => 'wa', 'iso_alpha_3' => 'wln', 'name' => 'Walloon'],
        ['iso_alpha_2' => 'wo', 'iso_alpha_3' => 'wol', 'name' => 'Walof'],
        ['iso_alpha_2' => 'xh', 'iso_alpha_3' => 'xho', 'name' => 'Xhosa'],
        ['iso_alpha_2' => 'yi', 'iso_alpha_3' => 'yid', 'name' => 'Yiddish'],
        ['iso_alpha_2' => 'yo', 'iso_alpha_3' => 'yor', 'name' => 'Yoruba'],
        ['iso_alpha_2' => 'za', 'iso_alpha_3' => 'zha', 'name' => 'Zhuang'],
        ['iso_alpha_2' => 'zh', 'iso_alpha_3' => 'zho', 'name' => 'Chinese'],
        ['iso_alpha_2' => 'zu', 'iso_alpha_3' => 'zul', 'name' => 'Zulu'],
    ];

    /**
     * Tables that should be truncated before running.
     *
     * @var array
     */
    protected $truncateTables = [
        CreateLanguagesTable::TABLE,
    ];

    /**
     * Create a new seeder instance.
     *
     * @param Language $model
     *
     * @return void
     */
    public function __construct(Language $model)
    {
        $this->model = $model;
    }
}
