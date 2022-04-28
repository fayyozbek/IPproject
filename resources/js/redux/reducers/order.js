import { useDispatch } from 'react-redux';
import { submit } from '../actions/order';


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
    const dispatch = useDispatch();

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
            dispatch(submit(state.email, state.phone, state.address));

        default:
            return state;
    }
};

export default order;