import React from 'react';
import { useSelector, useDispatch } from 'react-redux';
import { setMail, setPhone,  setAddress, submit, setCode } from '../redux/actions/order';


function Order() {
  const dispatch = useDispatch();

  const isValid = useSelector(({ order }) => order.isValid);


  const onEmailType = (mail) => {
    dispatch(setMail(index));
  };

  const onPhoneType = (phone) => {
    dispatch(setPhone(phone));
  };

  const onAddressType = (address) => {
    dispatch(setAddress(address));
  };

  const onCodeType = (code) => {
    dispatch(setCode(code));
  };
  const onSubmit = (email, phone, address) => {
    if(isValid){
    dispatch(submit(email, phone, address));
    }
  };

  return (
    <div className="container">
    </div>
  );
}

export default Order;
