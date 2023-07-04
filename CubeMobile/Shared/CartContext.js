import React from 'react';

const mockData = [
    {
      id: 1,
      title: 'Article 1',
      price: 10,
      image: 'https://via.placeholder.com/150'
    },
    {
      id: 2,
      title: 'Article 2',
      price: 20,
      image: 'https://via.placeholder.com/150'
    },
    {
      id: 3,
      title: 'Article 3',
      price: 30,
      image: 'https://via.placeholder.com/150'
    }
  ];

export const UserCart = {
    content : mockData
};

export const CartContext = React.createContext(
    UserCart.content // default value
  );