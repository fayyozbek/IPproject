const initialState = {
    isSubmitted: false,
    isConfirmed: false,
    phone: "",
    address: "",
    email: "",
    code: "",
    isValid: false,
};

const order = (state = initialState, action) => {
    switch (action.type) {
        case 'SET_PHONE':
            return {
                ...state,
                phone: action.payload,
            };

        case 'SET_ADDRESS':
            return {
                ...state,
                address: action.payload,
            };

        case 'SET_EMAIL':
            return {
                ...state,
                email: action.payload,
            };

        case 'SET_CODE':
            return {
                ...state,
                code: action.payload,
            };

        case 'SUBMIT':

        default:
            return state;
    }
};

export default order;