<?php
/**
 * Scripts Table Seeder.
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

use App\Entities\Script\Script;
use CreateScriptsTable;

/**
 * The Scripts seeder class.
 *
 * This class adds language scripts to the `scripts` table. Scripts are the
 * writing system used by various cultures for visual communication.
 *
 * @since x.x.x introduced
 */
class ScriptsTableSeeder extends AbstractSeeder
{
    /**
     * Items to be added to the database.
     *
     * @var array
     */
    protected $itemList = [
        ['iso_alpha' => 'Adlm', 'iso_numeric' => '166', 'name' => 'Adlam', 'direction' => 'rtl'],
        ['iso_alpha' => 'Afak', 'iso_numeric' => '439', 'name' => 'Afaka', 'direction' => 'varies'],
        ['iso_alpha' => 'Aghb', 'iso_numeric' => '239', 'name' => 'Caucasian Albanian'],
        ['iso_alpha' => 'Ahom', 'iso_numeric' => '338', 'name' => 'Ahom'],
        ['iso_alpha' => 'Arab', 'iso_numeric' => '160', 'name' => 'Arabic', 'direction' => 'rtl'],
        ['iso_alpha' => 'Aran', 'iso_numeric' => '161', 'name' => 'Arabic (Nastiliq variant)', 'direction' => 'rtl'],
        ['iso_alpha' => 'Armi', 'iso_numeric' => '124', 'name' => 'Imperial Aramaic', 'direction' => 'rtl'],
        ['iso_alpha' => 'Armn', 'iso_numeric' => '230', 'name' => 'Armenian'],
        ['iso_alpha' => 'Avst', 'iso_numeric' => '134', 'name' => 'Avestan', 'direction' => 'rtl'],
        ['iso_alpha' => 'Bali', 'iso_numeric' => '360', 'name' => 'Balinese'],
        ['iso_alpha' => 'Bamu', 'iso_numeric' => '435', 'name' => 'Bamum'],
        ['iso_alpha' => 'Bass', 'iso_numeric' => '259', 'name' => 'Bassa Vah'],
        ['iso_alpha' => 'Batk', 'iso_numeric' => '365', 'name' => 'Batak'],
        ['iso_alpha' => 'Beng', 'iso_numeric' => '325', 'name' => 'Bengali'],
        ['iso_alpha' => 'Bhks', 'iso_numeric' => '334', 'name' => 'Bhaiksuki'],
        ['iso_alpha' => 'Blis', 'iso_numeric' => '550', 'name' => 'Blissymbols', 'direction' => 'varies'],
        ['iso_alpha' => 'Bopo', 'iso_numeric' => '285', 'name' => 'Bopomofo'],
        ['iso_alpha' => 'Brah', 'iso_numeric' => '300', 'name' => 'Brahmi'],
        ['iso_alpha' => 'Brai', 'iso_numeric' => '570', 'name' => 'Braille'],
        ['iso_alpha' => 'Bugi', 'iso_numeric' => '367', 'name' => 'Buginese'],
        ['iso_alpha' => 'Buhd', 'iso_numeric' => '372', 'name' => 'Buhid'],
        ['iso_alpha' => 'Cakm', 'iso_numeric' => '349', 'name' => 'Chakma'],
        ['iso_alpha' => 'Cans', 'iso_numeric' => '440', 'name' => 'Unified Canadian Aboriginal Syllabics'],
        ['iso_alpha' => 'Cari', 'iso_numeric' => '201', 'name' => 'Carian'],
        ['iso_alpha' => 'Cham', 'iso_numeric' => '358', 'name' => 'Cham'],
        ['iso_alpha' => 'Cher', 'iso_numeric' => '445', 'name' => 'Cherokee'],
        ['iso_alpha' => 'Cirt', 'iso_numeric' => '291', 'name' => 'Cirth', 'direction' => 'varies'],
        ['iso_alpha' => 'Copt', 'iso_numeric' => '204', 'name' => 'Coptic'],
        ['iso_alpha' => 'Cpmn', 'iso_numeric' => '402', 'name' => 'Cypro-Minoan'],
        ['iso_alpha' => 'Cprt', 'iso_numeric' => '403', 'name' => 'Cypriot Syllabary', 'direction' => 'rtl'],
        ['iso_alpha' => 'Cyrl', 'iso_numeric' => '220', 'name' => 'Cyrillic'],
        ['iso_alpha' => 'Cyrs', 'iso_numeric' => '221', 'name' => 'Cyrillic (Old Church Slavonic variant)', 'direction' => 'varies'],
        ['iso_alpha' => 'Deva', 'iso_numeric' => '315', 'name' => 'Devanagari'],
        ['iso_alpha' => 'Dogr', 'iso_numeric' => '328', 'name' => 'Dogra'],
        ['iso_alpha' => 'Dsrt', 'iso_numeric' => '250', 'name' => 'Deseret'],
        ['iso_alpha' => 'Dupl', 'iso_numeric' => '755', 'name' => 'Duployan Stenography'],
        ['iso_alpha' => 'Egyd', 'iso_numeric' => '070', 'name' => 'Egyptian Demotic', 'direction' => 'rtl'],
        ['iso_alpha' => 'Egyh', 'iso_numeric' => '060', 'name' => 'Egyptian Hieratic', 'direction' => 'rtl'],
        ['iso_alpha' => 'Egyp', 'iso_numeric' => '050', 'name' => 'Egyptian Hieroglyphs'],
        ['iso_alpha' => 'Elba', 'iso_numeric' => '226', 'name' => 'Elbasan'],
        ['iso_alpha' => 'Elym', 'iso_numeric' => '128', 'name' => 'Elymaic', 'direction' => 'rtl'],
        ['iso_alpha' => 'Ethi', 'iso_numeric' => '430', 'name' => 'Ethiopic'],
        ['iso_alpha' => 'Geok', 'iso_numeric' => '241', 'name' => 'Khutsuri', 'direction' => 'varies'],
        ['iso_alpha' => 'Geor', 'iso_numeric' => '240', 'name' => 'Georgian'],
        ['iso_alpha' => 'Glag', 'iso_numeric' => '225', 'name' => 'Glagolitic'],
        ['iso_alpha' => 'Gong', 'iso_numeric' => '312', 'name' => 'Gunjala Gondi'],
        ['iso_alpha' => 'Gonm', 'iso_numeric' => '313', 'name' => 'Masaram Gondi'],
        ['iso_alpha' => 'Goth', 'iso_numeric' => '206', 'name' => 'Gothic'],
        ['iso_alpha' => 'Gran', 'iso_numeric' => '343', 'name' => 'Grantha'],
        ['iso_alpha' => 'Grek', 'iso_numeric' => '200', 'name' => 'Greek'],
        ['iso_alpha' => 'Gujr', 'iso_numeric' => '320', 'name' => 'Gujarati'],
        ['iso_alpha' => 'Guru', 'iso_numeric' => '310', 'name' => 'Gurmukhi'],
        ['iso_alpha' => 'Hanb', 'iso_numeric' => '503', 'name' => 'Han with Bopomofo', 'direction' => 'varies'],
        ['iso_alpha' => 'Hang', 'iso_numeric' => '286', 'name' => 'Hangul'],
        ['iso_alpha' => 'Hani', 'iso_numeric' => '500', 'name' => 'Han'],
        ['iso_alpha' => 'Hano', 'iso_numeric' => '371', 'name' => 'Hanunó\'o'],
        ['iso_alpha' => 'Hans', 'iso_numeric' => '501', 'name' => 'Han (Simplified variant)', 'direction' => 'varies'],
        ['iso_alpha' => 'Hant', 'iso_numeric' => '502', 'name' => 'Han (Traditional variant)', 'direction' => 'varies'],
        ['iso_alpha' => 'Hatr', 'iso_numeric' => '127', 'name' => 'Hatran', 'direction' => 'rtl'],
        ['iso_alpha' => 'Hebr', 'iso_numeric' => '125', 'name' => 'Hebrew', 'direction' => 'rtl'],
        ['iso_alpha' => 'Hira', 'iso_numeric' => '410', 'name' => 'Hiragana	Hiragana'],
        ['iso_alpha' => 'Hluw', 'iso_numeric' => '080', 'name' => 'Anatolian Hieroglyphs'],
        ['iso_alpha' => 'Hmng', 'iso_numeric' => '450', 'name' => 'Pahawh Hmong'],
        ['iso_alpha' => 'Hmnp', 'iso_numeric' => '451', 'name' => 'Nyiakeng Puachue Hmong'],
        ['iso_alpha' => 'Hrkt', 'iso_numeric' => '412', 'name' => 'Japanese Syllabaries', 'direction' => 'varies'],
        ['iso_alpha' => 'Hung', 'iso_numeric' => '176', 'name' => 'Old Hungarian', 'direction' => 'rtl'],
        ['iso_alpha' => 'Inds', 'iso_numeric' => '610', 'name' => 'Indus', 'direction' => 'rtl'],
        ['iso_alpha' => 'Ital', 'iso_numeric' => '210', 'name' => 'Old Italic'],
        ['iso_alpha' => 'Jamo', 'iso_numeric' => '284', 'name' => 'Jamo', 'direction' => 'varies'],
        ['iso_alpha' => 'Java', 'iso_numeric' => '361', 'name' => 'Javanese'],
        ['iso_alpha' => 'Jpan', 'iso_numeric' => '413', 'name' => 'Japanese', 'direction' => 'varies'],
        ['iso_alpha' => 'Jurc', 'iso_numeric' => '510', 'name' => 'Jurchen'],
        ['iso_alpha' => 'Kali', 'iso_numeric' => '357', 'name' => 'Kayah Li'],
        ['iso_alpha' => 'Kana', 'iso_numeric' => '411', 'name' => 'Katakana'],
        ['iso_alpha' => 'Khar', 'iso_numeric' => '305', 'name' => 'Kharoshthi', 'direction' => 'rtl'],
        ['iso_alpha' => 'Khmr', 'iso_numeric' => '355', 'name' => 'Khmer'],
        ['iso_alpha' => 'Khoj', 'iso_numeric' => '322', 'name' => 'Khojki'],
        ['iso_alpha' => 'Kitl', 'iso_numeric' => '505', 'name' => 'Khitan Large Script'],
        ['iso_alpha' => 'Kits', 'iso_numeric' => '288', 'name' => 'Khitan Small Script', 'direction' => 'ttb'],
        ['iso_alpha' => 'Knda', 'iso_numeric' => '345', 'name' => 'Kannada'],
        ['iso_alpha' => 'Kore', 'iso_numeric' => '287', 'name' => 'Korean'],
        ['iso_alpha' => 'Kpel', 'iso_numeric' => '436', 'name' => 'Kpelle'],
        ['iso_alpha' => 'Kthi', 'iso_numeric' => '317', 'name' => 'Kaithi'],
        ['iso_alpha' => 'Lana', 'iso_numeric' => '351', 'name' => 'Tai Tham'],
        ['iso_alpha' => 'Laoo', 'iso_numeric' => '356', 'name' => 'Lao'],
        ['iso_alpha' => 'Latf', 'iso_numeric' => '217', 'name' => 'Latin (Fraktur variant)', 'direction' => 'varies'],
        ['iso_alpha' => 'Latg', 'iso_numeric' => '216', 'name' => 'Latin (Gaelic variant)'],
        ['iso_alpha' => 'Latn', 'iso_numeric' => '215', 'name' => 'Latin'],
        ['iso_alpha' => 'Leke', 'iso_numeric' => '364', 'name' => 'Leke'],
        ['iso_alpha' => 'Lepc', 'iso_numeric' => '335', 'name' => 'Lepcha'],
        ['iso_alpha' => 'Limb', 'iso_numeric' => '336', 'name' => 'Limbu'],
        ['iso_alpha' => 'Lina', 'iso_numeric' => '400', 'name' => 'Linear A'],
        ['iso_alpha' => 'Linb', 'iso_numeric' => '401', 'name' => 'Linear B'],
        ['iso_alpha' => 'Lisu', 'iso_numeric' => '399', 'name' => 'Lisu'],
        ['iso_alpha' => 'Loma', 'iso_numeric' => '437', 'name' => 'Loma'],
        ['iso_alpha' => 'Lyci', 'iso_numeric' => '202', 'name' => 'Lycian'],
        ['iso_alpha' => 'Lydi', 'iso_numeric' => '116', 'name' => 'Lydian', 'direction' => 'rtl'],
        ['iso_alpha' => 'Mahj', 'iso_numeric' => '314', 'name' => 'Mahajani'],
        ['iso_alpha' => 'Maka', 'iso_numeric' => '366', 'name' => 'Makasar'],
        ['iso_alpha' => 'Mand', 'iso_numeric' => '140', 'name' => 'Mandaic', 'direction' => 'rtl'],
        ['iso_alpha' => 'Mani', 'iso_numeric' => '139', 'name' => 'Manichaean', 'direction' => 'rtl'],
        ['iso_alpha' => 'Marc', 'iso_numeric' => '332', 'name' => 'Marchen'],
        ['iso_alpha' => 'Maya', 'iso_numeric' => '090', 'name' => 'Mayan Hieroglyphs'],
        ['iso_alpha' => 'Medf', 'iso_numeric' => '265', 'name' => 'Medefaidrin'],
        ['iso_alpha' => 'Mend', 'iso_numeric' => '438', 'name' => 'Mende Kikakui', 'direction' => 'rtl'],
        ['iso_alpha' => 'Merc', 'iso_numeric' => '101', 'name' => 'Meroitic Cursive', 'direction' => 'rtl'],
        ['iso_alpha' => 'Mero', 'iso_numeric' => '100', 'name' => 'Meroitic Hieroglyphs', 'direction' => 'rtl'],
        ['iso_alpha' => 'Mlym', 'iso_numeric' => '347', 'name' => 'Malayalam'],
        ['iso_alpha' => 'Modi', 'iso_numeric' => '324', 'name' => 'Modi'],
        ['iso_alpha' => 'Mong', 'iso_numeric' => '145', 'name' => 'Mongolian', 'direction' => 'ttb'],
        ['iso_alpha' => 'Moon', 'iso_numeric' => '218', 'name' => 'Moon'],
        ['iso_alpha' => 'Mroo', 'iso_numeric' => '264', 'name' => 'Mru'],
        ['iso_alpha' => 'Mtei', 'iso_numeric' => '337', 'name' => 'Meitei'],
        ['iso_alpha' => 'Mult', 'iso_numeric' => '323', 'name' => 'Multani'],
        ['iso_alpha' => 'Mymr', 'iso_numeric' => '350', 'name' => 'Myanmar'],
        ['iso_alpha' => 'Nand', 'iso_numeric' => '311', 'name' => 'Nandinagari'],
        ['iso_alpha' => 'Narb', 'iso_numeric' => '106', 'name' => 'Ancient North Arabian', 'direction' => 'rtl'],
        ['iso_alpha' => 'Nbat', 'iso_numeric' => '159', 'name' => 'Nabataean', 'direction' => 'rtl'],
        ['iso_alpha' => 'Newa', 'iso_numeric' => '333', 'name' => 'Newa'],
        ['iso_alpha' => 'Nkdb', 'iso_numeric' => '085', 'name' => 'Naxi Dongba'],
        ['iso_alpha' => 'Nkgb', 'iso_numeric' => '420', 'name' => 'Nakhi Geba'],
        ['iso_alpha' => 'Nkoo', 'iso_numeric' => '165', 'name' => 'N\'Ko', 'direction' => 'rtl'],
        ['iso_alpha' => 'Nshu', 'iso_numeric' => '499', 'name' => 'Nüshu'],
        ['iso_alpha' => 'Ogam', 'iso_numeric' => '212', 'name' => 'Ogham'],
        ['iso_alpha' => 'Olck', 'iso_numeric' => '261', 'name' => 'Ol Chiki'],
        ['iso_alpha' => 'Orkh', 'iso_numeric' => '175', 'name' => 'Orkhon Runic', 'direction' => 'rtl'],
        ['iso_alpha' => 'Orya', 'iso_numeric' => '327', 'name' => 'Oriya'],
        ['iso_alpha' => 'Osge', 'iso_numeric' => '219', 'name' => 'Osage'],
        ['iso_alpha' => 'Osma', 'iso_numeric' => '260', 'name' => 'Osmanya'],
        ['iso_alpha' => 'Palm', 'iso_numeric' => '126', 'name' => 'Palmyrene', 'direction' => 'rtl'],
        ['iso_alpha' => 'Pauc', 'iso_numeric' => '263', 'name' => 'Pau Cin Hau'],
        ['iso_alpha' => 'Perm', 'iso_numeric' => '227', 'name' => 'Old Permic'],
        ['iso_alpha' => 'Phag', 'iso_numeric' => '331', 'name' => 'Phags-pa', 'direction' => 'ttb'],
        ['iso_alpha' => 'Phli', 'iso_numeric' => '131', 'name' => 'Inscriptional Pahlavi', 'direction' => 'rtl'],
        ['iso_alpha' => 'Phlp', 'iso_numeric' => '132', 'name' => 'Psalter Pahlavi', 'direction' => 'rtl'],
        ['iso_alpha' => 'Phlv', 'iso_numeric' => '133', 'name' => 'Book Pahlavi', 'direction' => 'rtl'],
        ['iso_alpha' => 'Phnx', 'iso_numeric' => '115', 'name' => 'Phoenician', 'direction' => 'rtl'],
        ['iso_alpha' => 'Piqd', 'iso_numeric' => '293', 'name' => 'KLI pIqaD'],
        ['iso_alpha' => 'Plrd', 'iso_numeric' => '282', 'name' => 'Pollard'],
        ['iso_alpha' => 'Prti', 'iso_numeric' => '130', 'name' => 'Inscriptional Parthian', 'direction' => 'rtl'],
        ['iso_alpha' => 'Rjng', 'iso_numeric' => '363', 'name' => 'Rejang'],
        ['iso_alpha' => 'Rohg', 'iso_numeric' => '167', 'name' => 'Hanifi Rohingya', 'direction' => 'rtl'],
        ['iso_alpha' => 'Roro', 'iso_numeric' => '620', 'name' => 'Rongorongo'],
        ['iso_alpha' => 'Runr', 'iso_numeric' => '211', 'name' => 'Runic'],
        ['iso_alpha' => 'Samr', 'iso_numeric' => '123', 'name' => 'Samaritan', 'direction' => 'rtl'],
        ['iso_alpha' => 'Sara', 'iso_numeric' => '292', 'name' => 'Sarati'],
        ['iso_alpha' => 'Sarb', 'iso_numeric' => '105', 'name' => 'Old South Arabian', 'direction' => 'rtl'],
        ['iso_alpha' => 'Saur', 'iso_numeric' => '344', 'name' => 'Saurashtra'],
        ['iso_alpha' => 'Sgnw', 'iso_numeric' => '095', 'name' => 'SignWriting', 'direction' => 'ttb'],
        ['iso_alpha' => 'Shaw', 'iso_numeric' => '281', 'name' => 'Shavian'],
        ['iso_alpha' => 'Shrd', 'iso_numeric' => '319', 'name' => 'Sharada'],
        ['iso_alpha' => 'Shui', 'iso_numeric' => '530', 'name' => 'Shuishu'],
        ['iso_alpha' => 'Sidd', 'iso_numeric' => '302', 'name' => 'Siddhaṃ'],
        ['iso_alpha' => 'Sind', 'iso_numeric' => '318', 'name' => 'Khudawadi'],
        ['iso_alpha' => 'Sinh', 'iso_numeric' => '348', 'name' => 'Sinhala'],
        ['iso_alpha' => 'Sogd', 'iso_numeric' => '141', 'name' => 'Sogdian', 'direction' => 'rtl'],
        ['iso_alpha' => 'Sogo', 'iso_numeric' => '142', 'name' => 'Old Sogdian', 'direction' => 'rtl'],
        ['iso_alpha' => 'Sora', 'iso_numeric' => '398', 'name' => 'Sora Sompeng'],
        ['iso_alpha' => 'Soyo', 'iso_numeric' => '329', 'name' => 'Soyombo'],
        ['iso_alpha' => 'Sund', 'iso_numeric' => '362', 'name' => 'Sundanese'],
        ['iso_alpha' => 'Sylo', 'iso_numeric' => '316', 'name' => 'Syloti Nagri'],
        ['iso_alpha' => 'Syrc', 'iso_numeric' => '135', 'name' => 'Syriac', 'direction' => 'rtl'],
        ['iso_alpha' => 'Syre', 'iso_numeric' => '138', 'name' => 'Syriac (Estrangelo variant)', 'direction' => 'rtl'],
        ['iso_alpha' => 'Syrj', 'iso_numeric' => '137', 'name' => 'Syriac (Western variant)', 'direction' => 'rtl'],
        ['iso_alpha' => 'Syrn', 'iso_numeric' => '136', 'name' => 'Syriac (Eastern variant)', 'direction' => 'rtl'],
        ['iso_alpha' => 'Tagb', 'iso_numeric' => '373', 'name' => 'Tagbanwa'],
        ['iso_alpha' => 'Takr', 'iso_numeric' => '321', 'name' => 'Takri'],
        ['iso_alpha' => 'Tale', 'iso_numeric' => '353', 'name' => 'Tai Le'],
        ['iso_alpha' => 'Talu', 'iso_numeric' => '354', 'name' => 'New Tai Lue'],
        ['iso_alpha' => 'Taml', 'iso_numeric' => '346', 'name' => 'Tamil'],
        ['iso_alpha' => 'Tang', 'iso_numeric' => '520', 'name' => 'Tangut'],
        ['iso_alpha' => 'Tavt', 'iso_numeric' => '359', 'name' => 'Tai Viet'],
        ['iso_alpha' => 'Telu', 'iso_numeric' => '340', 'name' => 'Telugu'],
        ['iso_alpha' => 'Teng', 'iso_numeric' => '290', 'name' => 'Tengwar'],
        ['iso_alpha' => 'Tfng', 'iso_numeric' => '120', 'name' => 'Tifinagh'],
        ['iso_alpha' => 'Tglg', 'iso_numeric' => '370', 'name' => 'Tagalog'],
        ['iso_alpha' => 'Thaa', 'iso_numeric' => '170', 'name' => 'Thaana', 'direction' => 'rtl'],
        ['iso_alpha' => 'Thai', 'iso_numeric' => '352', 'name' => 'Thai'],
        ['iso_alpha' => 'Tibt', 'iso_numeric' => '330', 'name' => 'Tibetan'],
        ['iso_alpha' => 'Tirh', 'iso_numeric' => '326', 'name' => 'Tirhuta'],
        ['iso_alpha' => 'Ugar', 'iso_numeric' => '040', 'name' => 'Ugaritic'],
        ['iso_alpha' => 'Vaii', 'iso_numeric' => '470', 'name' => 'Vai'],
        ['iso_alpha' => 'Visp', 'iso_numeric' => '280', 'name' => 'Visible Speech'],
        ['iso_alpha' => 'Wara', 'iso_numeric' => '262', 'name' => 'Warang Citi'],
        ['iso_alpha' => 'Wcho', 'iso_numeric' => '283', 'name' => 'Wancho'],
        ['iso_alpha' => 'Wole', 'iso_numeric' => '480', 'name' => 'Woleai', 'direction' => 'rtl'],
        ['iso_alpha' => 'Xpeo', 'iso_numeric' => '030', 'name' => 'Old Persian'],
        ['iso_alpha' => 'Xsux', 'iso_numeric' => '020', 'name' => 'Cuneiform'],
        ['iso_alpha' => 'Yiii', 'iso_numeric' => '460', 'name' => 'Yi'],
        ['iso_alpha' => 'Zanb', 'iso_numeric' => '339', 'name' => 'Zanabazar Square'],
    ];

    /**
     * Tables that should be truncated before running.
     *
     * @var array
     */
    protected $truncateTables = [
        CreateScriptsTable::TABLE,
    ];

    /**
     * Create a new seeder instance.
     *
     * @param Script $model
     *
     * @return void
     */
    public function __construct(Script $model)
    {
        $this->model = $model;
    }
}
