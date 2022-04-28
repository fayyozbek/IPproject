import { combineReducers } from 'redux';

import filters from './filters';
import pizzas from './pizzas';
import cart from './cart';
import order from './order';

const rootReducer = combineReducers({
    filters,
    pizzas,
    cart,
    order,
});

export default rootReducer;