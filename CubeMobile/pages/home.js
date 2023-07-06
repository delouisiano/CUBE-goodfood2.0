import { StyleSheet, View, Text, Image, Button } from 'react-native';
import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';
import { addToCart } from '../Shared/CartContext';

const Stack = createStackNavigator();


const Card = ({ title, image, description, id_site, navigation }) => {
    return (
        <View style={styles.card}>
            <Text style={styles.title}>{title}</Text>
            <Image style={styles.image} source={image} />
            <Text style={styles.description}>{description}</Text>
            <Button style={styles.button} title="Commander" onPress={() => navigation.navigate('Restaurant', { id_site })} />
        </View>
    );
};

const Dish = ({ title, picture, price, dishId, navigation }) => {
    return (
        <View style={styles.dish}>
            <Text style={styles.title}>{title}</Text>
            <Image style={styles.picture} source={picture} />
            <Text style={styles.price}>{price}</Text>
            <Button style={styles.button} title="Ajouter au panier" onPress={() => addToCart(dishId)} />
        </View>
    );
};

// Define the main component that renders the cards in grid
function Restaurant({ navigation, route }) {
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

function RestaurantList({ navigation, route }) {
    const [restaurants, setRestaurants] = useState([]);

    useEffect(() => {
        axios.get('http://apigoodfood/getSites.php')
            .then(function (response) {
                var img = require("../assets/card1.png");
                const newRestaurant = response.data.map(e => ({ title: e.nom, image: img, description: e.description, id_site: e.id_site }));
                setRestaurants(newRestaurant);
            }).catch(function (error) {
                console.log(error);
            });
    }, []);
    return (
        <View style={styles.content}>
            {restaurants.map((card) => (<Card key={card.title} {...card} navigation={navigation} />))}
        </View>
    );
};

// Define the main component that renders the cards in grid
export default function Home({ navigation }) {

    return (
        <Stack.Navigator>
            <Stack.Screen name='Restaurant List' component={RestaurantList} />
            <Stack.Screen name='Restaurant' component={Restaurant} />
        </Stack.Navigator>
    );
};

// Define some styles for the components
const styles = StyleSheet.create({
    card: {
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
    image: {
        width: 120,
        height: 120,
        marginVertical: 10,
        alignSelf: 'center',
    },
    description: {
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