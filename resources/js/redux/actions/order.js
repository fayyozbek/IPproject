import axios from 'axios';

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

const _setState = (payload) => ({
    type: 'UPDATE_STATE',
    payload: payload,
});

const _setConfirm = (payload) => ({
    type: 'CONFIRM',
    payload: payload,
});


export const submit = (email, phone, address, name) => (dispatch) => {
    dispatch(_setState(true));

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