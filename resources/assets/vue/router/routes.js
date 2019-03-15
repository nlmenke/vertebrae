/**
 * Front-end routing.
 *
 * router/routes.js
 */

import Dashboard from './views/dashboard';
import CurrencyIndex from './views/currencies/index';

export default [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard,
    },
    {
        path: '/currencies',
        name: 'currencies.index',
        component: CurrencyIndex,
    },
]
