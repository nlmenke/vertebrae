/**
 * Front-end routing.
 *
 * @package Vue - Router
 *
 * @author    Nick Menke <nick@nlmenke.net
 * @copyright 2018-2020 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since x.x.x introduced
 */

import Dashboard from './views/dashboard';
import CountryIndex from './views/countries/index';
import CurrencyIndex from './views/currencies/index';
import LanguageIndex from './views/languages/index';
import LocaleIndex from './views/locales/index';

export default [
    {
        component: Dashboard,
        name: 'dashboard',
        path: '/',
    },
    {
        component: CountryIndex,
        name: 'countries.index',
        path: '/countries',
    },
    {
        component: CurrencyIndex,
        name: 'currencies.index',
        path: '/currencies',
    },
    {
        component: LanguageIndex,
        name: 'languages.index',
        path: '/languages',
    },
    {
        component: LocaleIndex,
        name: 'locales.index',
        path: '/locales',
    },
];
