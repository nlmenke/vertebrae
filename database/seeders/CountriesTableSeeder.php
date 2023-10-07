<?php
/**
 * Countries Table Seeder.
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

use App\Entities\Country\Country;
use App\Entities\Currency\Currency;
use CreateCountriesTable;

/**
 * The Countries seeder class.
 *
 * This class adds the world's countries to the `countries` table.
 *
 * @since x.x.x introduced
 */
class CountriesTableSeeder extends AbstractSeeder
{
    /**
     * Tables that should be truncated before running.
     *
     * @var array
     */
    protected $truncateTables = [
        CreateCountriesTable::TABLE,
    ];

    /**
     * Create a new seeder instance.
     *
     * @param Country $model
     *
     * @return void
     */
    public function __construct(Country $model)
    {
        $this->model = $model;

        $this->itemList = [
            ['iso_alpha_2' => 'AD', 'iso_alpha_3' => 'AND', 'iso_numeric' => '020', 'name' => 'Andorra', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'AE', 'iso_alpha_3' => 'ARE', 'iso_numeric' => '784', 'name' => 'United Arab Emirates', 'currency_id' => $this->getCurrencyId('AED')],
            ['iso_alpha_2' => 'AF', 'iso_alpha_3' => 'AFG', 'iso_numeric' => '004', 'name' => 'Afghanistan', 'currency_id' => $this->getCurrencyId('AFN')],
            ['iso_alpha_2' => 'AG', 'iso_alpha_3' => 'ATG', 'iso_numeric' => '028', 'name' => 'Antigua and Barbuda', 'currency_id' => $this->getCurrencyId('XCD')],
            ['iso_alpha_2' => 'AI', 'iso_alpha_3' => 'AIA', 'iso_numeric' => '660', 'name' => 'Anguilla', 'currency_id' => $this->getCurrencyId('XCD')],
            ['iso_alpha_2' => 'AL', 'iso_alpha_3' => 'ALB', 'iso_numeric' => '008', 'name' => 'Albania', 'currency_id' => $this->getCurrencyId('ALL')],
            ['iso_alpha_2' => 'AM', 'iso_alpha_3' => 'ARM', 'iso_numeric' => '051', 'name' => 'Armenia', 'currency_id' => $this->getCurrencyId('AMD')],
            ['iso_alpha_2' => 'AO', 'iso_alpha_3' => 'AGO', 'iso_numeric' => '024', 'name' => 'Angola', 'currency_id' => $this->getCurrencyId('AOA')],
            ['iso_alpha_2' => 'AQ', 'iso_alpha_3' => 'ATA', 'iso_numeric' => '010', 'name' => 'Antarctica'],
            ['iso_alpha_2' => 'AR', 'iso_alpha_3' => 'ARG', 'iso_numeric' => '032', 'name' => 'Argentina', 'currency_id' => $this->getCurrencyId('ARS')],
            ['iso_alpha_2' => 'AS', 'iso_alpha_3' => 'ASM', 'iso_numeric' => '016', 'name' => 'American Samoa', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'AT', 'iso_alpha_3' => 'AUT', 'iso_numeric' => '040', 'name' => 'Austria', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'AU', 'iso_alpha_3' => 'AUS', 'iso_numeric' => '036', 'name' => 'Australia', 'currency_id' => $this->getCurrencyId('AUD')],
            ['iso_alpha_2' => 'AW', 'iso_alpha_3' => 'ABW', 'iso_numeric' => '533', 'name' => 'Aruba', 'currency_id' => $this->getCurrencyId('AWG')],
            ['iso_alpha_2' => 'AX', 'iso_alpha_3' => 'ALA', 'iso_numeric' => '248', 'name' => 'Åland Islands', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'AZ', 'iso_alpha_3' => 'AZE', 'iso_numeric' => '031', 'name' => 'Azerbaijan', 'currency_id' => $this->getCurrencyId('AZN')],
            ['iso_alpha_2' => 'BA', 'iso_alpha_3' => 'BIH', 'iso_numeric' => '070', 'name' => 'Bosnia and Herzegovina', 'currency_id' => $this->getCurrencyId('BAM')],
            ['iso_alpha_2' => 'BB', 'iso_alpha_3' => 'BRB', 'iso_numeric' => '052', 'name' => 'Barbados', 'currency_id' => $this->getCurrencyId('BBD')],
            ['iso_alpha_2' => 'BD', 'iso_alpha_3' => 'BGD', 'iso_numeric' => '050', 'name' => 'Bangladesh', 'currency_id' => $this->getCurrencyId('BDT')],
            ['iso_alpha_2' => 'BE', 'iso_alpha_3' => 'BEL', 'iso_numeric' => '056', 'name' => 'Belgium', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'BF', 'iso_alpha_3' => 'BFA', 'iso_numeric' => '854', 'name' => 'Burkina Faso', 'currency_id' => $this->getCurrencyId('XOF')],
            ['iso_alpha_2' => 'BG', 'iso_alpha_3' => 'BGR', 'iso_numeric' => '100', 'name' => 'Bulgaria', 'currency_id' => $this->getCurrencyId('BGN')],
            ['iso_alpha_2' => 'BH', 'iso_alpha_3' => 'BHR', 'iso_numeric' => '048', 'name' => 'Bahrain', 'currency_id' => $this->getCurrencyId('BHD')],
            ['iso_alpha_2' => 'BI', 'iso_alpha_3' => 'BDI', 'iso_numeric' => '108', 'name' => 'Burundi', 'currency_id' => $this->getCurrencyId('BIF')],
            ['iso_alpha_2' => 'BJ', 'iso_alpha_3' => 'BEN', 'iso_numeric' => '204', 'name' => 'Benin', 'currency_id' => $this->getCurrencyId('XOF')],
            ['iso_alpha_2' => 'BL', 'iso_alpha_3' => 'BLM', 'iso_numeric' => '652', 'name' => 'Saint Barthélemy', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'BM', 'iso_alpha_3' => 'BMU', 'iso_numeric' => '060', 'name' => 'Bermuda', 'currency_id' => $this->getCurrencyId('BMD')],
            ['iso_alpha_2' => 'BN', 'iso_alpha_3' => 'BRN', 'iso_numeric' => '096', 'name' => 'Brunei Darussalam', 'currency_id' => $this->getCurrencyId('BND')],
            ['iso_alpha_2' => 'BO', 'iso_alpha_3' => 'BOL', 'iso_numeric' => '068', 'name' => 'Bolivia', 'currency_id' => $this->getCurrencyId('BOB')],
            ['iso_alpha_2' => 'BQ', 'iso_alpha_3' => 'BES', 'iso_numeric' => '535', 'name' => 'Bonaire, Sint Eustatius and Saba', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'BR', 'iso_alpha_3' => 'BRA', 'iso_numeric' => '076', 'name' => 'Brazil', 'currency_id' => $this->getCurrencyId('BRL')],
            ['iso_alpha_2' => 'BS', 'iso_alpha_3' => 'BHS', 'iso_numeric' => '044', 'name' => 'Bahamas', 'currency_id' => $this->getCurrencyId('BSD')],
            ['iso_alpha_2' => 'BT', 'iso_alpha_3' => 'BTN', 'iso_numeric' => '064', 'name' => 'Bhutan', 'currency_id' => $this->getCurrencyId('BTN')],
            ['iso_alpha_2' => 'BV', 'iso_alpha_3' => 'BVT', 'iso_numeric' => '074', 'name' => 'Bouvet Island', 'currency_id' => $this->getCurrencyId('NOK')],
            ['iso_alpha_2' => 'BW', 'iso_alpha_3' => 'BWA', 'iso_numeric' => '072', 'name' => 'Botswana', 'currency_id' => $this->getCurrencyId('BWP')],
            ['iso_alpha_2' => 'BY', 'iso_alpha_3' => 'BLR', 'iso_numeric' => '112', 'name' => 'Belarus', 'currency_id' => $this->getCurrencyId('BYR')],
            ['iso_alpha_2' => 'BZ', 'iso_alpha_3' => 'BLZ', 'iso_numeric' => '084', 'name' => 'Belize', 'currency_id' => $this->getCurrencyId('BZD')],
            ['iso_alpha_2' => 'CA', 'iso_alpha_3' => 'CAN', 'iso_numeric' => '124', 'name' => 'Canada', 'currency_id' => $this->getCurrencyId('CAD')],
            ['iso_alpha_2' => 'CC', 'iso_alpha_3' => 'CCK', 'iso_numeric' => '166', 'name' => 'Cocos (Keeling) Islands', 'currency_id' => $this->getCurrencyId('AUD')],
            ['iso_alpha_2' => 'CD', 'iso_alpha_3' => 'COD', 'iso_numeric' => '180', 'name' => 'Congo, The Democratic Republic of the', 'currency_id' => $this->getCurrencyId('CDF')],
            ['iso_alpha_2' => 'CF', 'iso_alpha_3' => 'CAF', 'iso_numeric' => '140', 'name' => 'Central African Republic', 'currency_id' => $this->getCurrencyId('XAF')],
            ['iso_alpha_2' => 'CG', 'iso_alpha_3' => 'COG', 'iso_numeric' => '178', 'name' => 'Congo', 'currency_id' => $this->getCurrencyId('XAF')],
            ['iso_alpha_2' => 'CH', 'iso_alpha_3' => 'CHE', 'iso_numeric' => '756', 'name' => 'Switzerland', 'currency_id' => $this->getCurrencyId('CHF')],
            ['iso_alpha_2' => 'CI', 'iso_alpha_3' => 'CIV', 'iso_numeric' => '384', 'name' => 'Côte d\'Ivoire', 'currency_id' => $this->getCurrencyId('XOF')],
            ['iso_alpha_2' => 'CK', 'iso_alpha_3' => 'COK', 'iso_numeric' => '184', 'name' => 'Cook Islands', 'currency_id' => $this->getCurrencyId('NZD')],
            ['iso_alpha_2' => 'CL', 'iso_alpha_3' => 'CHL', 'iso_numeric' => '152', 'name' => 'Chile', 'currency_id' => $this->getCurrencyId('CLP')],
            ['iso_alpha_2' => 'CM', 'iso_alpha_3' => 'CMR', 'iso_numeric' => '120', 'name' => 'Cameroon', 'currency_id' => $this->getCurrencyId('XAF')],
            ['iso_alpha_2' => 'CN', 'iso_alpha_3' => 'CHN', 'iso_numeric' => '156', 'name' => 'China', 'currency_id' => $this->getCurrencyId('CNY')],
            ['iso_alpha_2' => 'CO', 'iso_alpha_3' => 'COL', 'iso_numeric' => '170', 'name' => 'Colombia', 'currency_id' => $this->getCurrencyId('COP')],
            ['iso_alpha_2' => 'CR', 'iso_alpha_3' => 'CRI', 'iso_numeric' => '188', 'name' => 'Costa Rica', 'currency_id' => $this->getCurrencyId('CRC')],
            ['iso_alpha_2' => 'CU', 'iso_alpha_3' => 'CUB', 'iso_numeric' => '192', 'name' => 'Cuba', 'currency_id' => $this->getCurrencyId('CUP')],
            ['iso_alpha_2' => 'CV', 'iso_alpha_3' => 'CPV', 'iso_numeric' => '132', 'name' => 'Cape Verde', 'currency_id' => $this->getCurrencyId('CVE')],
            ['iso_alpha_2' => 'CW', 'iso_alpha_3' => 'CUW', 'iso_numeric' => '531', 'name' => 'Curaçao', 'currency_id' => $this->getCurrencyId('ANG')],
            ['iso_alpha_2' => 'CX', 'iso_alpha_3' => 'CXR', 'iso_numeric' => '162', 'name' => 'Christmas Island', 'currency_id' => $this->getCurrencyId('AUD')],
            ['iso_alpha_2' => 'CY', 'iso_alpha_3' => 'CYP', 'iso_numeric' => '196', 'name' => 'Cyprus', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'CZ', 'iso_alpha_3' => 'CZE', 'iso_numeric' => '203', 'name' => 'Czech Republic', 'currency_id' => $this->getCurrencyId('CZK')],
            ['iso_alpha_2' => 'DE', 'iso_alpha_3' => 'DEU', 'iso_numeric' => '276', 'name' => 'Germany', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'DJ', 'iso_alpha_3' => 'DJI', 'iso_numeric' => '262', 'name' => 'Djibouti', 'currency_id' => $this->getCurrencyId('DJF')],
            ['iso_alpha_2' => 'DK', 'iso_alpha_3' => 'DNK', 'iso_numeric' => '208', 'name' => 'Denmark', 'currency_id' => $this->getCurrencyId('DKK')],
            ['iso_alpha_2' => 'DM', 'iso_alpha_3' => 'DMA', 'iso_numeric' => '212', 'name' => 'Dominica', 'currency_id' => $this->getCurrencyId('XCD')],
            ['iso_alpha_2' => 'DO', 'iso_alpha_3' => 'DOM', 'iso_numeric' => '214', 'name' => 'Dominican Republic', 'currency_id' => $this->getCurrencyId('DOP')],
            ['iso_alpha_2' => 'DZ', 'iso_alpha_3' => 'DZA', 'iso_numeric' => '012', 'name' => 'Algeria', 'currency_id' => $this->getCurrencyId('DZD')],
            ['iso_alpha_2' => 'EC', 'iso_alpha_3' => 'ECU', 'iso_numeric' => '218', 'name' => 'Ecuador', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'EE', 'iso_alpha_3' => 'EST', 'iso_numeric' => '233', 'name' => 'Estonia', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'EG', 'iso_alpha_3' => 'EGY', 'iso_numeric' => '818', 'name' => 'Egypt', 'currency_id' => $this->getCurrencyId('EGP')],
            ['iso_alpha_2' => 'EH', 'iso_alpha_3' => 'ESH', 'iso_numeric' => '732', 'name' => 'Western Sahara', 'currency_id' => $this->getCurrencyId('MAD')],
            ['iso_alpha_2' => 'ER', 'iso_alpha_3' => 'ERI', 'iso_numeric' => '232', 'name' => 'Eritrea', 'currency_id' => $this->getCurrencyId('ERN')],
            ['iso_alpha_2' => 'ES', 'iso_alpha_3' => 'ESP', 'iso_numeric' => '724', 'name' => 'Spain', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'ET', 'iso_alpha_3' => 'ETH', 'iso_numeric' => '231', 'name' => 'Ethiopia', 'currency_id' => $this->getCurrencyId('ETB')],
            ['iso_alpha_2' => 'FI', 'iso_alpha_3' => 'FIN', 'iso_numeric' => '246', 'name' => 'Finland', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'FJ', 'iso_alpha_3' => 'FJI', 'iso_numeric' => '242', 'name' => 'Fiji', 'currency_id' => $this->getCurrencyId('FJD')],
            ['iso_alpha_2' => 'FK', 'iso_alpha_3' => 'FLK', 'iso_numeric' => '238', 'name' => 'Falkland Islands (Malvinas)', 'currency_id' => $this->getCurrencyId('FKP')],
            ['iso_alpha_2' => 'FM', 'iso_alpha_3' => 'FSM', 'iso_numeric' => '583', 'name' => 'Micronesia, Federated States of', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'FO', 'iso_alpha_3' => 'FRO', 'iso_numeric' => '234', 'name' => 'Faroe Islands', 'currency_id' => $this->getCurrencyId('DKK')],
            ['iso_alpha_2' => 'FR', 'iso_alpha_3' => 'FRA', 'iso_numeric' => '250', 'name' => 'France', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'GA', 'iso_alpha_3' => 'GAB', 'iso_numeric' => '266', 'name' => 'Gabon', 'currency_id' => $this->getCurrencyId('XAF')],
            ['iso_alpha_2' => 'GB', 'iso_alpha_3' => 'GBR', 'iso_numeric' => '826', 'name' => 'United Kingdom', 'currency_id' => $this->getCurrencyId('GBP')],
            ['iso_alpha_2' => 'GD', 'iso_alpha_3' => 'GRD', 'iso_numeric' => '308', 'name' => 'Grenada', 'currency_id' => $this->getCurrencyId('XCD')],
            ['iso_alpha_2' => 'GE', 'iso_alpha_3' => 'GEO', 'iso_numeric' => '268', 'name' => 'Georgia', 'currency_id' => $this->getCurrencyId('GEL')],
            ['iso_alpha_2' => 'GF', 'iso_alpha_3' => 'GUF', 'iso_numeric' => '254', 'name' => 'French Guiana', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'GG', 'iso_alpha_3' => 'GGY', 'iso_numeric' => '831', 'name' => 'Guernsey', 'currency_id' => $this->getCurrencyId('GBP')],
            ['iso_alpha_2' => 'GH', 'iso_alpha_3' => 'GHA', 'iso_numeric' => '288', 'name' => 'Ghana', 'currency_id' => $this->getCurrencyId('GHS')],
            ['iso_alpha_2' => 'GI', 'iso_alpha_3' => 'GIB', 'iso_numeric' => '292', 'name' => 'Gibraltar', 'currency_id' => $this->getCurrencyId('GIP')],
            ['iso_alpha_2' => 'GL', 'iso_alpha_3' => 'GRL', 'iso_numeric' => '304', 'name' => 'Greenland', 'currency_id' => $this->getCurrencyId('DKK')],
            ['iso_alpha_2' => 'GM', 'iso_alpha_3' => 'GMB', 'iso_numeric' => '270', 'name' => 'Gambia', 'currency_id' => $this->getCurrencyId('GMD')],
            ['iso_alpha_2' => 'GN', 'iso_alpha_3' => 'GIN', 'iso_numeric' => '324', 'name' => 'Guinea', 'currency_id' => $this->getCurrencyId('GNF')],
            ['iso_alpha_2' => 'GP', 'iso_alpha_3' => 'GLP', 'iso_numeric' => '312', 'name' => 'Guadeloupe', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'GQ', 'iso_alpha_3' => 'GNQ', 'iso_numeric' => '226', 'name' => 'Equatorial Guinea', 'currency_id' => $this->getCurrencyId('XAF')],
            ['iso_alpha_2' => 'GR', 'iso_alpha_3' => 'GRC', 'iso_numeric' => '300', 'name' => 'Greece', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'GS', 'iso_alpha_3' => 'SGS', 'iso_numeric' => '239', 'name' => 'South Georgia and the South Sandwich Islands', 'currency_id' => $this->getCurrencyId('GBP')],
            ['iso_alpha_2' => 'GT', 'iso_alpha_3' => 'GTM', 'iso_numeric' => '320', 'name' => 'Guatemala', 'currency_id' => $this->getCurrencyId('GTQ')],
            ['iso_alpha_2' => 'GU', 'iso_alpha_3' => 'GUM', 'iso_numeric' => '316', 'name' => 'Guam', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'GW', 'iso_alpha_3' => 'GNB', 'iso_numeric' => '624', 'name' => 'Guinea-Bissau', 'currency_id' => $this->getCurrencyId('XOF')],
            ['iso_alpha_2' => 'GY', 'iso_alpha_3' => 'GUY', 'iso_numeric' => '328', 'name' => 'Guyana', 'currency_id' => $this->getCurrencyId('GYD')],
            ['iso_alpha_2' => 'HK', 'iso_alpha_3' => 'HKG', 'iso_numeric' => '344', 'name' => 'Hong Kong', 'currency_id' => $this->getCurrencyId('HKD')],
            ['iso_alpha_2' => 'HM', 'iso_alpha_3' => 'HMD', 'iso_numeric' => '334', 'name' => 'Heard Island and McDonald Islands', 'currency_id' => $this->getCurrencyId('AUD')],
            ['iso_alpha_2' => 'HN', 'iso_alpha_3' => 'HND', 'iso_numeric' => '340', 'name' => 'Honduras', 'currency_id' => $this->getCurrencyId('HNL')],
            ['iso_alpha_2' => 'HR', 'iso_alpha_3' => 'HRV', 'iso_numeric' => '191', 'name' => 'Croatia', 'currency_id' => $this->getCurrencyId('HRK')],
            ['iso_alpha_2' => 'HT', 'iso_alpha_3' => 'HTI', 'iso_numeric' => '332', 'name' => 'Haiti', 'currency_id' => $this->getCurrencyId('HTG')],
            ['iso_alpha_2' => 'HU', 'iso_alpha_3' => 'HUN', 'iso_numeric' => '348', 'name' => 'Hungary', 'currency_id' => $this->getCurrencyId('HUF')],
            ['iso_alpha_2' => 'ID', 'iso_alpha_3' => 'IDN', 'iso_numeric' => '360', 'name' => 'Indonesia', 'currency_id' => $this->getCurrencyId('IDR')],
            ['iso_alpha_2' => 'IE', 'iso_alpha_3' => 'IRL', 'iso_numeric' => '372', 'name' => 'Ireland', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'IL', 'iso_alpha_3' => 'ISR', 'iso_numeric' => '376', 'name' => 'Israel', 'currency_id' => $this->getCurrencyId('ILS')],
            ['iso_alpha_2' => 'IM', 'iso_alpha_3' => 'IMN', 'iso_numeric' => '833', 'name' => 'Isle of Man', 'currency_id' => $this->getCurrencyId('GBP')],
            ['iso_alpha_2' => 'IN', 'iso_alpha_3' => 'IND', 'iso_numeric' => '356', 'name' => 'India', 'currency_id' => $this->getCurrencyId('INR')],
            ['iso_alpha_2' => 'IO', 'iso_alpha_3' => 'IOT', 'iso_numeric' => '086', 'name' => 'British Indian Ocean Territory', 'currency_id' => $this->getCurrencyId('GBP')],
            ['iso_alpha_2' => 'IR', 'iso_alpha_3' => 'IRN', 'iso_numeric' => '364', 'name' => 'Iran, Islamic Republic of', 'currency_id' => $this->getCurrencyId('IRR')],
            ['iso_alpha_2' => 'IS', 'iso_alpha_3' => 'ISL', 'iso_numeric' => '352', 'name' => 'Iceland', 'currency_id' => $this->getCurrencyId('ISK')],
            ['iso_alpha_2' => 'IQ', 'iso_alpha_3' => 'IRQ', 'iso_numeric' => '368', 'name' => 'Iraq', 'currency_id' => $this->getCurrencyId('IQD')],
            ['iso_alpha_2' => 'IT', 'iso_alpha_3' => 'ITA', 'iso_numeric' => '380', 'name' => 'Italy', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'JE', 'iso_alpha_3' => 'JEY', 'iso_numeric' => '832', 'name' => 'Jersey', 'currency_id' => $this->getCurrencyId('GBP')],
            ['iso_alpha_2' => 'JM', 'iso_alpha_3' => 'JAM', 'iso_numeric' => '388', 'name' => 'Jamaica', 'currency_id' => $this->getCurrencyId('JMD')],
            ['iso_alpha_2' => 'JO', 'iso_alpha_3' => 'JOR', 'iso_numeric' => '400', 'name' => 'Jordan', 'currency_id' => $this->getCurrencyId('JOD')],
            ['iso_alpha_2' => 'JP', 'iso_alpha_3' => 'JPN', 'iso_numeric' => '392', 'name' => 'Japan', 'currency_id' => $this->getCurrencyId('JPY')],
            ['iso_alpha_2' => 'KE', 'iso_alpha_3' => 'KEN', 'iso_numeric' => '404', 'name' => 'Kenya', 'currency_id' => $this->getCurrencyId('KES')],
            ['iso_alpha_2' => 'KG', 'iso_alpha_3' => 'KGZ', 'iso_numeric' => '417', 'name' => 'Kyrgyzstan', 'currency_id' => $this->getCurrencyId('KGS')],
            ['iso_alpha_2' => 'KH', 'iso_alpha_3' => 'KHM', 'iso_numeric' => '116', 'name' => 'Cambodia', 'currency_id' => $this->getCurrencyId('KHR')],
            ['iso_alpha_2' => 'KI', 'iso_alpha_3' => 'KIR', 'iso_numeric' => '296', 'name' => 'Kiribati', 'currency_id' => $this->getCurrencyId('AUD')],
            ['iso_alpha_2' => 'KM', 'iso_alpha_3' => 'COM', 'iso_numeric' => '174', 'name' => 'Comoros', 'currency_id' => $this->getCurrencyId('KMF')],
            ['iso_alpha_2' => 'KN', 'iso_alpha_3' => 'KNA', 'iso_numeric' => '659', 'name' => 'Saint Kitts and Nevis', 'currency_id' => $this->getCurrencyId('XCD')],
            ['iso_alpha_2' => 'KP', 'iso_alpha_3' => 'PRK', 'iso_numeric' => '408', 'name' => 'Korea, Democratic People\'s Republic of', 'currency_id' => $this->getCurrencyId('KPW')],
            ['iso_alpha_2' => 'KR', 'iso_alpha_3' => 'KOR', 'iso_numeric' => '410', 'name' => 'Korea, Republic of', 'currency_id' => $this->getCurrencyId('KRW')],
            ['iso_alpha_2' => 'KW', 'iso_alpha_3' => 'KWT', 'iso_numeric' => '414', 'name' => 'Kuwait', 'currency_id' => $this->getCurrencyId('KWD')],
            ['iso_alpha_2' => 'KY', 'iso_alpha_3' => 'CYM', 'iso_numeric' => '136', 'name' => 'Cayman Islands', 'currency_id' => $this->getCurrencyId('KYD')],
            ['iso_alpha_2' => 'KZ', 'iso_alpha_3' => 'KAZ', 'iso_numeric' => '398', 'name' => 'Kazakhstan', 'currency_id' => $this->getCurrencyId('KZT')],
            ['iso_alpha_2' => 'LA', 'iso_alpha_3' => 'LAO', 'iso_numeric' => '418', 'name' => 'Lao People\'s Democratic Republic', 'currency_id' => $this->getCurrencyId('LAK')],
            ['iso_alpha_2' => 'LB', 'iso_alpha_3' => 'LBN', 'iso_numeric' => '422', 'name' => 'Lebanon', 'currency_id' => $this->getCurrencyId('LBP')],
            ['iso_alpha_2' => 'LC', 'iso_alpha_3' => 'LCA', 'iso_numeric' => '662', 'name' => 'Saint Lucia', 'currency_id' => $this->getCurrencyId('XCD')],
            ['iso_alpha_2' => 'LI', 'iso_alpha_3' => 'LIE', 'iso_numeric' => '438', 'name' => 'Liechtenstein', 'currency_id' => $this->getCurrencyId('CHF')],
            ['iso_alpha_2' => 'LK', 'iso_alpha_3' => 'LKA', 'iso_numeric' => '144', 'name' => 'Sri Lanka', 'currency_id' => $this->getCurrencyId('LKR')],
            ['iso_alpha_2' => 'LR', 'iso_alpha_3' => 'LBR', 'iso_numeric' => '430', 'name' => 'Liberia', 'currency_id' => $this->getCurrencyId('LRD')],
            ['iso_alpha_2' => 'LS', 'iso_alpha_3' => 'LSO', 'iso_numeric' => '426', 'name' => 'Lesotho', 'currency_id' => $this->getCurrencyId('LSL')],
            ['iso_alpha_2' => 'LT', 'iso_alpha_3' => 'LTU', 'iso_numeric' => '440', 'name' => 'Lithuania', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'LU', 'iso_alpha_3' => 'LUX', 'iso_numeric' => '442', 'name' => 'Luxembourg', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'LV', 'iso_alpha_3' => 'LVA', 'iso_numeric' => '428', 'name' => 'Latvia', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'LY', 'iso_alpha_3' => 'LBY', 'iso_numeric' => '434', 'name' => 'Libya', 'currency_id' => $this->getCurrencyId('LYD')],
            ['iso_alpha_2' => 'MA', 'iso_alpha_3' => 'MAR', 'iso_numeric' => '504', 'name' => 'Morocco', 'currency_id' => $this->getCurrencyId('MAD')],
            ['iso_alpha_2' => 'MC', 'iso_alpha_3' => 'MCO', 'iso_numeric' => '492', 'name' => 'Monaco', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'MD', 'iso_alpha_3' => 'MDA', 'iso_numeric' => '498', 'name' => 'Moldova', 'currency_id' => $this->getCurrencyId('MDL')],
            ['iso_alpha_2' => 'ME', 'iso_alpha_3' => 'MNE', 'iso_numeric' => '499', 'name' => 'Montenegro', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'MF', 'iso_alpha_3' => 'MAF', 'iso_numeric' => '663', 'name' => 'Saint Martin (French part)', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'MG', 'iso_alpha_3' => 'MDG', 'iso_numeric' => '450', 'name' => 'Madagascar', 'currency_id' => $this->getCurrencyId('MGA')],
            ['iso_alpha_2' => 'MH', 'iso_alpha_3' => 'MHL', 'iso_numeric' => '584', 'name' => 'Marshall Islands', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'MK', 'iso_alpha_3' => 'MKD', 'iso_numeric' => '807', 'name' => 'Macedonia, Republic of', 'currency_id' => $this->getCurrencyId('MKD')],
            ['iso_alpha_2' => 'ML', 'iso_alpha_3' => 'MLI', 'iso_numeric' => '466', 'name' => 'Mali', 'currency_id' => $this->getCurrencyId('XOF')],
            ['iso_alpha_2' => 'MM', 'iso_alpha_3' => 'MMR', 'iso_numeric' => '104', 'name' => 'Myanmar', 'currency_id' => $this->getCurrencyId('MMK')],
            ['iso_alpha_2' => 'MN', 'iso_alpha_3' => 'MNG', 'iso_numeric' => '496', 'name' => 'Mongolia', 'currency_id' => $this->getCurrencyId('MNT')],
            ['iso_alpha_2' => 'MO', 'iso_alpha_3' => 'MAC', 'iso_numeric' => '446', 'name' => 'Macao', 'currency_id' => $this->getCurrencyId('MOP')],
            ['iso_alpha_2' => 'MP', 'iso_alpha_3' => 'MNP', 'iso_numeric' => '580', 'name' => 'Northern Mariana Islands', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'MQ', 'iso_alpha_3' => 'MTQ', 'iso_numeric' => '474', 'name' => 'Martinique', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'MR', 'iso_alpha_3' => 'MRT', 'iso_numeric' => '478', 'name' => 'Mauritania', 'currency_id' => $this->getCurrencyId('MRO')],
            ['iso_alpha_2' => 'MS', 'iso_alpha_3' => 'MSR', 'iso_numeric' => '500', 'name' => 'Montserrat', 'currency_id' => $this->getCurrencyId('XCD')],
            ['iso_alpha_2' => 'MT', 'iso_alpha_3' => 'MLT', 'iso_numeric' => '470', 'name' => 'Malta', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'MU', 'iso_alpha_3' => 'MUS', 'iso_numeric' => '480', 'name' => 'Mauritius', 'currency_id' => $this->getCurrencyId('MUR')],
            ['iso_alpha_2' => 'MV', 'iso_alpha_3' => 'MDV', 'iso_numeric' => '462', 'name' => 'Maldives', 'currency_id' => $this->getCurrencyId('MVR')],
            ['iso_alpha_2' => 'MW', 'iso_alpha_3' => 'MWI', 'iso_numeric' => '454', 'name' => 'Malawi', 'currency_id' => $this->getCurrencyId('MWK')],
            ['iso_alpha_2' => 'MX', 'iso_alpha_3' => 'MEX', 'iso_numeric' => '484', 'name' => 'Mexico', 'currency_id' => $this->getCurrencyId('MXN')],
            ['iso_alpha_2' => 'MY', 'iso_alpha_3' => 'MYS', 'iso_numeric' => '458', 'name' => 'Malaysia', 'currency_id' => $this->getCurrencyId('MYR')],
            ['iso_alpha_2' => 'MZ', 'iso_alpha_3' => 'MOZ', 'iso_numeric' => '508', 'name' => 'Mozambique', 'currency_id' => $this->getCurrencyId('MZN')],
            ['iso_alpha_2' => 'NA', 'iso_alpha_3' => 'NAM', 'iso_numeric' => '516', 'name' => 'Namibia', 'currency_id' => $this->getCurrencyId('NAD')],
            ['iso_alpha_2' => 'NC', 'iso_alpha_3' => 'NCL', 'iso_numeric' => '540', 'name' => 'New Caledonia', 'currency_id' => $this->getCurrencyId('XPF')],
            ['iso_alpha_2' => 'NE', 'iso_alpha_3' => 'NER', 'iso_numeric' => '562', 'name' => 'Niger', 'currency_id' => $this->getCurrencyId('XOF')],
            ['iso_alpha_2' => 'NF', 'iso_alpha_3' => 'NFK', 'iso_numeric' => '574', 'name' => 'Norfolk Island', 'currency_id' => $this->getCurrencyId('AUD')],
            ['iso_alpha_2' => 'NG', 'iso_alpha_3' => 'NGA', 'iso_numeric' => '566', 'name' => 'Nigeria', 'currency_id' => $this->getCurrencyId('NGN')],
            ['iso_alpha_2' => 'NI', 'iso_alpha_3' => 'NIC', 'iso_numeric' => '558', 'name' => 'Nicaragua', 'currency_id' => $this->getCurrencyId('NIO')],
            ['iso_alpha_2' => 'NL', 'iso_alpha_3' => 'NLD', 'iso_numeric' => '528', 'name' => 'Netherlands', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'NO', 'iso_alpha_3' => 'NOR', 'iso_numeric' => '578', 'name' => 'Norway', 'currency_id' => $this->getCurrencyId('NOK')],
            ['iso_alpha_2' => 'NP', 'iso_alpha_3' => 'NPL', 'iso_numeric' => '524', 'name' => 'Nepal', 'currency_id' => $this->getCurrencyId('NPR')],
            ['iso_alpha_2' => 'NR', 'iso_alpha_3' => 'NRU', 'iso_numeric' => '520', 'name' => 'Nauru', 'currency_id' => $this->getCurrencyId('AUD')],
            ['iso_alpha_2' => 'NU', 'iso_alpha_3' => 'NIU', 'iso_numeric' => '570', 'name' => 'Niue', 'currency_id' => $this->getCurrencyId('NZD')],
            ['iso_alpha_2' => 'NZ', 'iso_alpha_3' => 'NZL', 'iso_numeric' => '554', 'name' => 'New Zealand', 'currency_id' => $this->getCurrencyId('NZD')],
            ['iso_alpha_2' => 'OM', 'iso_alpha_3' => 'OMN', 'iso_numeric' => '512', 'name' => 'Oman', 'currency_id' => $this->getCurrencyId('OMR')],
            ['iso_alpha_2' => 'PA', 'iso_alpha_3' => 'PAN', 'iso_numeric' => '591', 'name' => 'Panama', 'currency_id' => $this->getCurrencyId('PAB')],
            ['iso_alpha_2' => 'PE', 'iso_alpha_3' => 'PER', 'iso_numeric' => '604', 'name' => 'Peru', 'currency_id' => $this->getCurrencyId('PEN')],
            ['iso_alpha_2' => 'PF', 'iso_alpha_3' => 'PYF', 'iso_numeric' => '258', 'name' => 'French Polynesia', 'currency_id' => $this->getCurrencyId('XPF')],
            ['iso_alpha_2' => 'PG', 'iso_alpha_3' => 'PNG', 'iso_numeric' => '598', 'name' => 'Papua New Guinea', 'currency_id' => $this->getCurrencyId('PGK')],
            ['iso_alpha_2' => 'PH', 'iso_alpha_3' => 'PHL', 'iso_numeric' => '608', 'name' => 'Philippines', 'currency_id' => $this->getCurrencyId('PHP')],
            ['iso_alpha_2' => 'PK', 'iso_alpha_3' => 'PAK', 'iso_numeric' => '586', 'name' => 'Pakistan', 'currency_id' => $this->getCurrencyId('PKR')],
            ['iso_alpha_2' => 'PL', 'iso_alpha_3' => 'POL', 'iso_numeric' => '616', 'name' => 'Poland', 'currency_id' => $this->getCurrencyId('PLN')],
            ['iso_alpha_2' => 'PM', 'iso_alpha_3' => 'SPM', 'iso_numeric' => '666', 'name' => 'Saint Pierre and Miquelon', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'PN', 'iso_alpha_3' => 'PCN', 'iso_numeric' => '612', 'name' => 'Pitcairn', 'currency_id' => $this->getCurrencyId('NZD')],
            ['iso_alpha_2' => 'PR', 'iso_alpha_3' => 'PRI', 'iso_numeric' => '630', 'name' => 'Puerto Rico', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'PS', 'iso_alpha_3' => 'PSE', 'iso_numeric' => '275', 'name' => 'Palestine, State of', 'currency_id' => $this->getCurrencyId('ILS')],
            ['iso_alpha_2' => 'PT', 'iso_alpha_3' => 'PRT', 'iso_numeric' => '620', 'name' => 'Portugal', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'PW', 'iso_alpha_3' => 'PLW', 'iso_numeric' => '585', 'name' => 'Palau', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'PY', 'iso_alpha_3' => 'PRY', 'iso_numeric' => '600', 'name' => 'Paraguay', 'currency_id' => $this->getCurrencyId('PYG')],
            ['iso_alpha_2' => 'QA', 'iso_alpha_3' => 'QAT', 'iso_numeric' => '634', 'name' => 'Qatar', 'currency_id' => $this->getCurrencyId('QAR')],
            ['iso_alpha_2' => 'RE', 'iso_alpha_3' => 'REU', 'iso_numeric' => '638', 'name' => 'Réunion', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'RO', 'iso_alpha_3' => 'ROU', 'iso_numeric' => '642', 'name' => 'Romania', 'currency_id' => $this->getCurrencyId('RON')],
            ['iso_alpha_2' => 'RS', 'iso_alpha_3' => 'SRB', 'iso_numeric' => '688', 'name' => 'Serbia', 'currency_id' => $this->getCurrencyId('RSD')],
            ['iso_alpha_2' => 'RU', 'iso_alpha_3' => 'RUS', 'iso_numeric' => '643', 'name' => 'Russian Federation', 'currency_id' => $this->getCurrencyId('RUB')],
            ['iso_alpha_2' => 'RW', 'iso_alpha_3' => 'RWA', 'iso_numeric' => '646', 'name' => 'Rwanda', 'currency_id' => $this->getCurrencyId('RWF')],
            ['iso_alpha_2' => 'SA', 'iso_alpha_3' => 'SAU', 'iso_numeric' => '682', 'name' => 'Saudi Arabia', 'currency_id' => $this->getCurrencyId('SAR')],
            ['iso_alpha_2' => 'SB', 'iso_alpha_3' => 'SLB', 'iso_numeric' => '090', 'name' => 'Solomon Islands', 'currency_id' => $this->getCurrencyId('SBD')],
            ['iso_alpha_2' => 'SC', 'iso_alpha_3' => 'SYC', 'iso_numeric' => '690', 'name' => 'Seychelles', 'currency_id' => $this->getCurrencyId('SCR')],
            ['iso_alpha_2' => 'SD', 'iso_alpha_3' => 'SDN', 'iso_numeric' => '729', 'name' => 'Sudan', 'currency_id' => $this->getCurrencyId('SDG')],
            ['iso_alpha_2' => 'SE', 'iso_alpha_3' => 'SWE', 'iso_numeric' => '752', 'name' => 'Sweden', 'currency_id' => $this->getCurrencyId('SEK')],
            ['iso_alpha_2' => 'SG', 'iso_alpha_3' => 'SGP', 'iso_numeric' => '702', 'name' => 'Singapore', 'currency_id' => $this->getCurrencyId('SGD')],
            ['iso_alpha_2' => 'SH', 'iso_alpha_3' => 'SHN', 'iso_numeric' => '654', 'name' => 'Saint Helena, Ascension and Tristan da Cunha', 'currency_id' => $this->getCurrencyId('SHP')],
            ['iso_alpha_2' => 'SI', 'iso_alpha_3' => 'SVN', 'iso_numeric' => '705', 'name' => 'Slovenia', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'SJ', 'iso_alpha_3' => 'SJM', 'iso_numeric' => '744', 'name' => 'Svalbard and Jan Mayen', 'currency_id' => $this->getCurrencyId('NOK')],
            ['iso_alpha_2' => 'SK', 'iso_alpha_3' => 'SVK', 'iso_numeric' => '703', 'name' => 'Slovakia', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'SL', 'iso_alpha_3' => 'SLE', 'iso_numeric' => '694', 'name' => 'Sierra Leone', 'currency_id' => $this->getCurrencyId('SLL')],
            ['iso_alpha_2' => 'SM', 'iso_alpha_3' => 'SMR', 'iso_numeric' => '674', 'name' => 'San Marino', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'SN', 'iso_alpha_3' => 'SEN', 'iso_numeric' => '686', 'name' => 'Senegal', 'currency_id' => $this->getCurrencyId('XOF')],
            ['iso_alpha_2' => 'SO', 'iso_alpha_3' => 'SOM', 'iso_numeric' => '706', 'name' => 'Somalia', 'currency_id' => $this->getCurrencyId('SOS')],
            ['iso_alpha_2' => 'SR', 'iso_alpha_3' => 'SUR', 'iso_numeric' => '740', 'name' => 'Suriname', 'currency_id' => $this->getCurrencyId('SRD')],
            ['iso_alpha_2' => 'SS', 'iso_alpha_3' => 'SSD', 'iso_numeric' => '728', 'name' => 'South Sudan', 'currency_id' => $this->getCurrencyId('SSP')],
            ['iso_alpha_2' => 'ST', 'iso_alpha_3' => 'STP', 'iso_numeric' => '678', 'name' => 'São Tomé and Príncipe', 'currency_id' => $this->getCurrencyId('STD')],
            ['iso_alpha_2' => 'SV', 'iso_alpha_3' => 'SLV', 'iso_numeric' => '222', 'name' => 'El Salvador', 'currency_id' => $this->getCurrencyId('SVC')],
            ['iso_alpha_2' => 'SX', 'iso_alpha_3' => 'SXM', 'iso_numeric' => '534', 'name' => 'Sint Maarten (Dutch part)', 'currency_id' => $this->getCurrencyId('ANG')],
            ['iso_alpha_2' => 'SY', 'iso_alpha_3' => 'SYR', 'iso_numeric' => '760', 'name' => 'Syrian Arab Republic', 'currency_id' => $this->getCurrencyId('SYP')],
            ['iso_alpha_2' => 'SZ', 'iso_alpha_3' => 'SWZ', 'iso_numeric' => '748', 'name' => 'Swaziland', 'currency_id' => $this->getCurrencyId('SZL')],
            ['iso_alpha_2' => 'TC', 'iso_alpha_3' => 'TCA', 'iso_numeric' => '796', 'name' => 'Turks and Caicos Islands', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'TD', 'iso_alpha_3' => 'TCD', 'iso_numeric' => '148', 'name' => 'Chad', 'currency_id' => $this->getCurrencyId('XAF')],
            ['iso_alpha_2' => 'TF', 'iso_alpha_3' => 'ATF', 'iso_numeric' => '260', 'name' => 'French Southern Territories', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'TG', 'iso_alpha_3' => 'TGO', 'iso_numeric' => '768', 'name' => 'Togo', 'currency_id' => $this->getCurrencyId('XOF')],
            ['iso_alpha_2' => 'TH', 'iso_alpha_3' => 'THA', 'iso_numeric' => '764', 'name' => 'Thailand', 'currency_id' => $this->getCurrencyId('THB')],
            ['iso_alpha_2' => 'TJ', 'iso_alpha_3' => 'TJK', 'iso_numeric' => '762', 'name' => 'Tajikistan', 'currency_id' => $this->getCurrencyId('TJS')],
            ['iso_alpha_2' => 'TK', 'iso_alpha_3' => 'TKL', 'iso_numeric' => '772', 'name' => 'Tokelau', 'currency_id' => $this->getCurrencyId('NZD')],
            ['iso_alpha_2' => 'TL', 'iso_alpha_3' => 'TLS', 'iso_numeric' => '626', 'name' => 'Timor-Leste', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'TM', 'iso_alpha_3' => 'TKM', 'iso_numeric' => '795', 'name' => 'Turkmenistan', 'currency_id' => $this->getCurrencyId('TMT')],
            ['iso_alpha_2' => 'TN', 'iso_alpha_3' => 'TUN', 'iso_numeric' => '788', 'name' => 'Tunisia', 'currency_id' => $this->getCurrencyId('TND')],
            ['iso_alpha_2' => 'TO', 'iso_alpha_3' => 'TON', 'iso_numeric' => '776', 'name' => 'Tonga', 'currency_id' => $this->getCurrencyId('TOP')],
            ['iso_alpha_2' => 'TR', 'iso_alpha_3' => 'TUR', 'iso_numeric' => '792', 'name' => 'Turkey', 'currency_id' => $this->getCurrencyId('TRY')],
            ['iso_alpha_2' => 'TT', 'iso_alpha_3' => 'TTO', 'iso_numeric' => '780', 'name' => 'Trinidad and Tobago', 'currency_id' => $this->getCurrencyId('TTD')],
            ['iso_alpha_2' => 'TV', 'iso_alpha_3' => 'TUV', 'iso_numeric' => '798', 'name' => 'Tuvalu', 'currency_id' => $this->getCurrencyId('AUD')],
            ['iso_alpha_2' => 'TW', 'iso_alpha_3' => 'TWN', 'iso_numeric' => '158', 'name' => 'Taiwan', 'currency_id' => $this->getCurrencyId('TWD')],
            ['iso_alpha_2' => 'TZ', 'iso_alpha_3' => 'TZA', 'iso_numeric' => '834', 'name' => 'Tanzania', 'currency_id' => $this->getCurrencyId('TZS')],
            ['iso_alpha_2' => 'UA', 'iso_alpha_3' => 'UKR', 'iso_numeric' => '804', 'name' => 'Ukraine', 'currency_id' => $this->getCurrencyId('UAH')],
            ['iso_alpha_2' => 'UG', 'iso_alpha_3' => 'UGA', 'iso_numeric' => '800', 'name' => 'Uganda', 'currency_id' => $this->getCurrencyId('UGX')],
            ['iso_alpha_2' => 'UM', 'iso_alpha_3' => 'UMI', 'iso_numeric' => '581', 'name' => 'United States Minor Outlying Islands', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'US', 'iso_alpha_3' => 'USA', 'iso_numeric' => '840', 'name' => 'United States', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'UY', 'iso_alpha_3' => 'URY', 'iso_numeric' => '858', 'name' => 'Uruguay', 'currency_id' => $this->getCurrencyId('UYU')],
            ['iso_alpha_2' => 'UZ', 'iso_alpha_3' => 'UZB', 'iso_numeric' => '860', 'name' => 'Uzbekistan', 'currency_id' => $this->getCurrencyId('UZS')],
            ['iso_alpha_2' => 'VA', 'iso_alpha_3' => 'VAT', 'iso_numeric' => '336', 'name' => 'Holy See (Vatican City State)', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'VC', 'iso_alpha_3' => 'VCT', 'iso_numeric' => '670', 'name' => 'Saint Vincent and the Grenadines', 'currency_id' => $this->getCurrencyId('XCD')],
            ['iso_alpha_2' => 'VE', 'iso_alpha_3' => 'VEN', 'iso_numeric' => '862', 'name' => 'Venezuela', 'currency_id' => $this->getCurrencyId('VEF')],
            ['iso_alpha_2' => 'VG', 'iso_alpha_3' => 'VGB', 'iso_numeric' => '092', 'name' => 'Virgin Islands, British', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'VI', 'iso_alpha_3' => 'VIR', 'iso_numeric' => '850', 'name' => 'Virgin Islands, U.S.', 'currency_id' => $this->getCurrencyId('USD')],
            ['iso_alpha_2' => 'VN', 'iso_alpha_3' => 'VNM', 'iso_numeric' => '704', 'name' => 'Vietnam, Socialist Republic of', 'currency_id' => $this->getCurrencyId('VND')],
            ['iso_alpha_2' => 'VU', 'iso_alpha_3' => 'VUT', 'iso_numeric' => '548', 'name' => 'Vanuatu', 'currency_id' => $this->getCurrencyId('VUV')],
            ['iso_alpha_2' => 'WF', 'iso_alpha_3' => 'WLF', 'iso_numeric' => '876', 'name' => 'Wallis and Futuna', 'currency_id' => $this->getCurrencyId('XPF')],
            ['iso_alpha_2' => 'WS', 'iso_alpha_3' => 'WSM', 'iso_numeric' => '882', 'name' => 'Samoa', 'currency_id' => $this->getCurrencyId('WST')],
            ['iso_alpha_2' => 'YE', 'iso_alpha_3' => 'YEM', 'iso_numeric' => '887', 'name' => 'Yemen', 'currency_id' => $this->getCurrencyId('YER')],
            ['iso_alpha_2' => 'YT', 'iso_alpha_3' => 'MYT', 'iso_numeric' => '175', 'name' => 'Mayotte', 'currency_id' => $this->getCurrencyId('EUR')],
            ['iso_alpha_2' => 'ZA', 'iso_alpha_3' => 'ZAF', 'iso_numeric' => '710', 'name' => 'South Africa', 'currency_id' => $this->getCurrencyId('ZAR')],
            ['iso_alpha_2' => 'ZM', 'iso_alpha_3' => 'ZMB', 'iso_numeric' => '894', 'name' => 'Zambia', 'currency_id' => $this->getCurrencyId('ZMW')],
            ['iso_alpha_2' => 'ZW', 'iso_alpha_3' => 'ZWE', 'iso_numeric' => '716', 'name' => 'Zimbabwe', 'currency_id' => $this->getCurrencyId('ZWD')],
        ];
    }

    /**
     * Find and set currency_id from specified ISO 4217 code.
     *
     * @param string $isoAlpha
     *
     * @return int|null
     */
    private function getCurrencyId(string $isoAlpha): ?int
    {
        if ($currency = Currency::where('iso_alpha', $isoAlpha)->first()) {
            return $currency->getId();
        }

        return null;
    }
}
