/**
 * Front-end routing.
 *
 * router/routes.js
 */

import Dashboard from './views/dashboard';
import CountryIndex from './views/countries/index';
import CurrencyIndex from './views/currencies/index';

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
]
