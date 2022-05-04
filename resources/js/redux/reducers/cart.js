const initialState = {
    items: {},
    totalPrice: 0,
    totalCount: 0,
    isSubmitted: false,
    isConfirmed: false,
    phone: "",
    address: "",
    email: "",
    code: "",
    name: "",
    isValid: false,
    isOrdering: false,
};

const getTotalPrice = (arr) => arr.reduce((sum, obj) => obj.price + sum, 0);

const _get = (obj, path) => {
    const [firstKey, ...keys] = path.split('.');
    return keys.reduce((val, key) => {
        return val[key];
    }, obj[firstKey]);
};

const getTotalSum = (obj, path) => {
    return Object.values(obj).reduce((sum, obj) => {
        const value = _get(obj, path);
        return sum + value;
    }, 0);
};

const cart = (state = initialState, action) => {
    switch (action.type) {
        case 'ADD_PIZZA_CART':
            {
                const currentPizzaItems = !state.items[action.payload.id] ? [action.payload] : [...state.items[action.payload.id].items, action.payload];

                const newItems = {
                    ...state.items,
                    [action.payload.id]: {
                        items: currentPizzaItems,
                        totalPrice: getTotalPrice(currentPizzaItems),
                    },
                };

                const totalCount = getTotalSum(newItems, 'items.length');
                const totalPrice = getTotalSum(newItems, 'totalPrice');

                return {
                    ...state,
                    items: newItems,
                    totalCount,
                    totalPrice,
                };
            }

        case 'REMOVE_CART_ITEM':
            {
                const newItems = {
                    ...state.items,
                };
                const currentTotalPrice = newItems[action.payload].totalPrice;
                const currentTotalCount = newItems[action.payload].items.length;
                delete newItems[action.payload];
                return {
                    ...state,
                    items: newItems,
                    totalPrice: state.totalPrice - currentTotalPrice,
                    totalCount: state.totalCount - currentTotalCount,
                };
            }

        case 'PLUS_CART_ITEM':
            {
                const newObjItems = [
                    ...state.items[action.payload].items,
                    state.items[action.payload].items[0],
                ];
                const newItems = {
                    ...state.items,
                    [action.payload]: {
                        items: newObjItems,
                        totalPrice: getTotalPrice(newObjItems),
                    },
                };

                const totalCount = getTotalSum(newItems, 'items.length');
                const totalPrice = getTotalSum(newItems, 'totalPrice');

                return {
                    ...state,
                    items: newItems,
                    totalCount,
                    totalPrice,
                };
            }

        case 'MINUS_CART_ITEM':
            {
                const oldItems = state.items[action.payload].items;
                const newObjItems =
                    oldItems.length > 1 ? state.items[action.payload].items.slice(1) : oldItems;
                const newItems = {
                    ...state.items,
                    [action.payload]: {
                        items: newObjItems,
                        totalPrice: getTotalPrice(newObjItems),
                    },
                };

                const totalCount = getTotalSum(newItems, 'items.length');
                const totalPrice = getTotalSum(newItems, 'totalPrice');

                return {
                    ...state,
                    items: newItems,
                    totalCount,
                    totalPrice,
                };
            }

        case 'CLEAR_CART':
            return { totalPrice: 0, totalCount: 0, items: {} };

        case 'SET_ORDERING_STATUS':
            return {
                ...state,
                isOrdering: action.payload,
            };
        case 'SET_PHONE':

            return {
                ...state,
                phone: action.payload,
                isValid: state.address.length > 3 && state.name.length > 3 && state.email.length > 10 && state.phone.length >= 16
            };

        case 'SET_ADDRESS':
            return {
                ...state,
                address: action.payload,
                isValid: state.name.length > 3 && state.phone.length >= 17 && state.email.length > 10 && state.address.length > 2
            };

        case 'SET_EMAIL':
            return {
                ...state,
                email: action.payload,
                isValid: state.address.length > 3 && state.phone.length.length >= 17 && state.name.length > 3 && state.email.length > 9
            };

        case 'SET_CODE':
            return {
                ...state,
                isValid: action.payload.length == 4,
                code: action.payload,
            };
        case 'SET_NAME':
            return {
                ...state,
                name: action.payload,
                isValid: state.address.length > 3 && state.phone.length.length >= 17 && state.email.length > 10 && state.name.length > 2
            };
        case 'UPDATE_STATE':
            return {
                ...state,
                isSubmitted: action.payload,
                isValid: false,
            };
        case 'CONFIRM':
            return {
                ...state,
                isConfirmed: action.payload,
            };

        default:
            return state;
    }
};

export default cart;