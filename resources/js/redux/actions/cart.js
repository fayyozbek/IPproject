export const addPizzaToCart = (pizzaObj) => ({
    type: 'ADD_PIZZA_CART',
    payload: pizzaObj,
});

export const clearCart = () => ({
    type: 'CLEAR_CART',
});

export const removeCartItem = (id) => ({
    type: 'REMOVE_CART_ITEM',
    payload: id,
});

export const plusCartItem = (id) => ({
    type: 'PLUS_CART_ITEM',
    payload: id,
});

export const minusCartItem = (id) => ({
    type: 'MINUS_CART_ITEM',
    payload: id,
});

export const setMail = (payload) => ({
    type: 'SET_EMAIL',
    payload,
});

export const setAddress = (payload) => ({
    type: 'SET_ADDRESS',
    payload,
});

export const setPhone = (payload) => ({
    type: 'SET_PHONE',
    payload,
});

export const setCode = (payload) => ({
    type: 'SET_CODE',
    payload,
});

export const setName = (payload) => ({
    type: 'SET_NAME',
    payload,
});

export const setOrderingStatus = (payload) => ({
    type: 'SET_ORDERING_STATUS',
    payload,
});

export const setSubmitted = (payload) => ({
    type: 'UPDATE_STATE',
    payload: payload,
});

const _setConfirm = (payload) => ({
    type: 'CONFIRM',
    payload: payload,
});


export const submit = (email, phone, address, name, items) => (dispatch) => {
    dispatch(setSubmitted(true));

    //   axios
    //     .post(
    //       `/api/pizzas?${category !== null ? `category=${category}` : ''}&_sort=${sortBy.type}&_order=${
    //         sortBy.order
    //       }`,
    //     )
    //     .then(({ data }) => {
    //       dispatch(setPizzas(data));
    //     });
};

export const confirmCode = (code) => (dispatch) => {
    dispatch(_setConfirm(true));
    dispatch(clearCart(true));
    dispatch(setOrderingStatus(false));

    //   axios
    //     .post(
    //       `/api/pizzas?${category !== null ? `category=${category}` : ''}&_sort=${sortBy.type}&_order=${
    //         sortBy.order
    //       }`,
    //     )
    //     .then(({ data }) => {
    //       dispatch(setPizzas(data));
    //     });
};