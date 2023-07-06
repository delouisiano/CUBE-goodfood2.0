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

export let UserCart = {
  content: []
};

export const addToCart = (id) => {
  UserCart.content.push(id);
  console.log(UserCart);
}

export const CartContext = React.createContext(
  UserCart.content // default value
);