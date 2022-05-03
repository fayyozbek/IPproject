import React from 'react';
import { Form } from 'react-bootstrap';
import { Button } from '../components';
import { useSelector, useDispatch } from 'react-redux';
import { setMail, setPhone, setAddress, submit, setCode, setName, confirmCode } from '../redux/actions/order';
import InputMask from 'react-input-mask';



function Order() {
  const dispatch = useDispatch();

  const { isValid, isSubmitted, email, name, phone, code, address } = useSelector(({ order }) => order);


  const onNameType = (name) => {
    dispatch(setName(name.target.value));
  };

  const onEmailType = (mail) => {
    dispatch(setMail(mail.target.value));
  };

  const onPhoneType = (phone) => {
    dispatch(setPhone(phone.target.value));
  };

  const onAddressType = (address) => {
    dispatch(setAddress(address.target.value));
  };

  const onCodeType = (code) => {
    dispatch(setCode(code.target.value));
  };

  const onSubmit = () => {
    console.log(isValid);
    if (isValid && !isSubmitted) {
      dispatch(submit(email, phone, address, name));
    } else if(isValid && isSubmitted){
      dispatch(confirmCode(code));
    }
  };

  let form;

  if (isSubmitted) {
    form = <Form>
      <Form.Group className="mb-3" controlId="formCode">
        <Form.Label>Code</Form.Label>
        <InputMask mask="****" onChange={onCodeType}>
          {(inputProps) =>
            <Form.Control {...inputProps} type="code" placeholder="****" />}
        </InputMask>

      </Form.Group>
    </Form>

  } else {
    form = <Form>
      <Form.Group className="mb-3" controlId="formName">
        <Form.Label>Name</Form.Label>

        <Form.Control type="name" placeholder="Name" onChange={onNameType} disabled={isSubmitted} />
      </Form.Group>

      <Form.Group className="mb-3" controlId="formPhone">
        <Form.Label>Phone number</Form.Label>
        <InputMask mask="+998 99 999 99 99" onChange={onPhoneType} disabled={isSubmitted}>
          {(inputProps) => <Form.Control {...inputProps} type="phone" placeholder="+998 90 000 00 00" disabled={inputProps.disabled ? props.disabled : null}
          />}

        </InputMask>

      </Form.Group>

      <Form.Group className="mb-3" controlId="formAddress">
        <Form.Label>Address</Form.Label>
        <Form.Control type="address" placeholder="Address" onChange={onAddressType} disabled={isSubmitted} />
      </Form.Group>



      <Form.Group className="mb-3" controlId="formEmail">
        <Form.Label>Email address</Form.Label>
        <Form.Control type="email" placeholder="Enter email" onChange={onEmailType} disabled={isSubmitted} />
      </Form.Group>


    </Form>

  }

  return (

    <div className="container order">
      <div className="bootstrap-inside">
        {form}
      </div>
      <center>
        <Button variant="primary" type="submit" onClick={onSubmit}>
          Submit
        </Button>
      </center>

    </div>
  );
}

export default Order;
