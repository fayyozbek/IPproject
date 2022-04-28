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


export const submit = (email, phone, address) => (dispatch) => {

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

export const confirm = (code) => (dispatch) => {

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