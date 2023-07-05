import React from 'react';

const mockData = [
    {
      id: 1,
      title: 'Article 1',
      price: 10,
      image: '../assets/card1.png'
    },
    {
      id: 2,
      title: 'Article 2',
      price: 20,
      image: '../assets/card1.png'
    },
    {
      id: 3,
      title: 'Article 3',
      price: 30,
      image: '../assets/card1.png'
    }
  ];

export const UserCart = {
    content : mockData
};

export const addToCart = (id) => {
  let newArticle = {
    id: id,
    title: 'Article x',
    price: 30000,
    image: '../assets/card1.png'
  };
  UserCart = [...UserCart.content, newArticle];
  console.log(UserCart);
}

export const CartContext = React.createContext(
    UserCart.content // default value
  );