import React, { useEffect } from 'react';
import { View, Text, Image, StyleSheet, TouchableOpacity } from 'react-native';
import Icon from 'react-native-vector-icons/Ionicons';
import axios from 'axios';
import { useContext } from 'react';
import { CartContext } from '../App.js';

const Cart = ({ route }) => {

    const [cartContent, setcartContent] = useState();
    //const { cart } = useContext(CartContext);

    const handleEdit = (id) => {
        // handle edit logic here
    };

    const handleDelete = (id) => {
        //setArticles(articles.filter((article) => article.id !== id));
    };

    // useEffect(() => {
    //     axios.get('http://api/getMenuForSite.php?id_site=' + route.params.id_site)
    //         .then(function (response) {
    //             var picture = require("../assets/card1.png");
    //             //var img = "../" + e.image;
    //             const newRestaurant = response.data.map(e => ({ title: e.title, picture: picture, price: e.price, dishId: e.dishId }));
    //             setDish(newRestaurant);
    //         }).catch(function (error) {
    //             console.log(error);
    //         });
    // }, []);
    console.log(cartContent);
    return (
        <View style={styles.cart}>
            {cartContent.map((article) => (
                <View key={article.id} style={styles.cartItem}>
                    <Image
                        source={{ uri: article.image }}
                        style={styles.image}
                    />
                    <Text style={styles.title}>{article.title}</Text>
                    <Text style={styles.price}>{article.price}€</Text>
                    <TouchableOpacity onPress={() => handleEdit(article.id)}>
                        <Icon name="create-outline" size={30} />
                    </TouchableOpacity>
                    <TouchableOpacity onPress={() => handleDelete(article.id)}>
                        <Icon name="trash-outline" size={30} />
                    </TouchableOpacity>
                </View>
            ))}
        </View>

        // <CartContext.Consumer>
        //     <button
        //         onClick={() =>
        //             setCart([
        //                 {
        //                     id: 3,
        //                     title: 'Article 3',
        //                     price: 30,
        //                     image: 'https://via.placeholder.com/150'
        //                 }
        //             ])
        //         }
        //     >
        //         Switch Cart (Current: {cart})
        //     </button>
        // </CartContext.Consumer>
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