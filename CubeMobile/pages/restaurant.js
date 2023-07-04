import React, { useState, useEffect } from 'react';
import { View, Text, StyleSheet, Button, Image } from 'react-native';
import axios from 'axios';



const Dish = ({ title, picture, price, dishId, navigation }) => {
    return (
        <View style={styles.dish}>
            <Text style={styles.title}>{title}</Text>
            <Image style={styles.picture} source={picture} />
            <Text style={styles.price}>{price}</Text>
            <Button style={styles.button} title="Ajouter au panier" onPress={() => Cart.setCartContent(dishId)}/>
        </View>
    );
};

// Define the main component that renders the cards in grid
export default function Restaurant({ navigation, route }) {
    const [dish, setDish] = useState([]);

    useEffect(() => {
        axios.get('http://apigoodfood/getMenuForSite.php?id_site=' + route.params.id_site)
            .then(function (response) {
                var picture = require("../assets/card1.png");
                //var img = "../" + e.image;
                const newDish = response.data.map(e => ({ title: e.title, picture: picture, price: e.price, dishId: e.id }));
                setDish(newDish);
            }).catch(function (error) {
                console.log(error);
            });
    }, []);
    return (
        <View style={styles.content}>
            {dish.map((dish) => (
                <Dish key={dish.title} {...dish} navigation={navigation} />
            ))}
        </View>
    );
};

// Define some styles for the components
const styles = StyleSheet.create({
    dish: {
        width: 150,
        height: 250,
        margin: 10,
        padding: 10,
        borderRadius: 10,
        backgroundColor: '#eee',
        shadowColor: '#000',
        shadowOffset: { width: 0, height: 2 },
        shadowOpacity: 0.1,
        shadowRadius: 5,
        elevation: 5,
    },
    title: {
        fontSize: 18,
        fontWeight: 'bold',
        textAlign: 'center',
    },
    picture: {
        width: 120,
        height: 120,
        marginVertical: 10,
        alignSelf: 'center',
    },
    price: {
        fontSize: 14,
        textAlign: 'center',
    },
    button: {
        marginVertical: 10,
    },
    content: {
        marginTop: "5%",
        flex: 1,
        flexDirection: 'row',
        flexWrap: 'wrap',
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor: '#fff',

    }
});
