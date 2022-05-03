const initialState = {
    isSubmitted: false,
    isConfirmed: false,
    phone: "",
    address: "",
    email: "",
    code: "",
    name: "",
    isValid: false,
};

const order = (state = initialState, action) => {
    switch (action.type) {
        case 'SET_PHONE':
            return {
                ...state,
                phone: action.payload,
                isValid: state.address.length > 3 && state.name.length > 3 && state.email.length > 10 && state.phone.length == 16
            };

        case 'SET_ADDRESS':
            return {
                ...state,
                address: action.payload,
                isValid: state.name.length > 3 && state.phone.length == 17 && state.email.length > 10 && state.address.length > 2
            };

        case 'SET_EMAIL':
            return {
                ...state,
                email: action.payload,
                isValid: state.address.length > 3 && state.phone.length.length == 17 && state.name.length > 3 && state.email.length > 9
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
                isValid: state.address.length > 3 && state.phone.length.length == 17 && state.email.length > 10 && state.name.length > 2
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

export default order;