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
  ids: [],
  products: [{
    product: 0,
    quantity: 0
  }]
};

export const addToCart = (id) => { 
  let toAdd = true;
  UserCart.ids.forEach(element => {
    if (element == id) {
      toAdd = false
    }
  });
  if (toAdd) {
    UserCart.ids.push(id);
  }
}

export const CartContext = React.createContext(
  UserCart.ids // default value
);