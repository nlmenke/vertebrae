/**
 * Front-end routing.
 *
 * router/routes.js
 */

import Dashboard from './views/dashboard';
import CountryIndex from './views/countries/index';
import CurrencyIndex from './views/currencies/index';
import LanguageIndex from './views/languages/index';
import LocaleIndex from './views/locales/index';

export default [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard,
    },
    {
        path: '/countries',
        name: 'countries.index',
        component: CountryIndex,
    },
    {
        path: '/currencies',
        name: 'currencies.index',
        component: CurrencyIndex,
    },
    {
        path: '/languages',
        name: 'languages.index',
        component: LanguageIndex,
    },
    {
        path: '/locales',
        name: 'locales.index',
        component: LocaleIndex,
    },
]
