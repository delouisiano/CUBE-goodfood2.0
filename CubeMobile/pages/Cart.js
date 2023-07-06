import React, { useEffect, useState } from 'react';
import { View, Text, Image, StyleSheet, TouchableOpacity } from 'react-native';
import Icon from 'react-native-vector-icons/Ionicons';
import axios from 'axios';
import { UserCart } from '../Shared/CartContext';


const Cart = ({ route }) => {
    const [cart, setCart] = useState([]);

    function handleDelete(id) {
        setCart(prevCart => prevCart.filter(item => item.dishId !== id));
    }

    useEffect(() => {
        axios.get('http://apigoodfood/getMenuForSite.php?id_site=1')
            .then(function (response) {
                var picture = require("../assets/card1.png");
                let tmpCart = [];
                response.data.forEach(eResponse => {
                    eResponse.quantity = 1;
                    UserCart.ids.forEach(eUserCart => {
                        if (eResponse.id == eUserCart) {
                            // if(tmpCart.find(e => e = e.response)) {
                            //     // if (eTmpCart.id == UserCart) {
                            //     //     eResponse.quantity+=1;
                            //     // }
                            //     console.log(e)
                            // }
                            console.log()
                            tmpCart.push(eResponse);
                        }
                    });
                });
                const newCart = tmpCart.map(e => ({ title: e.title, picture: picture, price: e.price, dishId: e.id, quantity: e.quantity }));
                setCart(newCart);
            }).catch(function (error) {
                console.log(error);
            });
    }, []);


    return (
        <View style={styles.cart}>
            {cart.map((article) => (
                <View key={article.id} style={styles.cartItem}>
                    <Image source={{ uri: article.image }} style={styles.image} />
                    <Text style={styles.title}>{article.title}</Text>
                    <Text style={styles.price}>{article.price}€</Text>
                    <Text style={styles.price}>{article.quantity} pcs.</Text>
                    <TouchableOpacity onPress={() => handleEdit(article.id)}>
                        <Icon name="create-outline" size={30} />
                    </TouchableOpacity>
                    <TouchableOpacity onPress={() => handleDelete(article.id)}>
                        <Icon name="trash-outline" size={30} />
                    </TouchableOpacity>
                </View>
            ))}
        </View>
    );
};


const styles = StyleSheet.create({
    cart: {
        alignItems: 'center',
    },
    title: {
        marginEnd: '5%'
    },
    price: {
        fontWeight: 'bold'
    },
    image: {
        width: '75px',
        height: '75px'
    },
    cartItem: {
        flexDirection: 'row',
        alignItems: 'center',
        justifyContent: 'space-between',
        backgroundColor: '#eaeaea',
        marginBottom: 10,
        width: "90%"
    }
});

export default Cart;