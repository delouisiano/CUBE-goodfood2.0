import { StyleSheet, View, Text, Image, Button } from 'react-native';
import React, { useState, useEffect } from 'react';
import axios from 'axios';
import Navbar from './navabar';

const Card = ({ title, image, description, id_site, navigation }) => {
    return (
        <View style={styles.card}>
            <Text style={styles.title}>{title}</Text>
            <Image style={styles.image} source={image} />
            <Text style={styles.description}>{description}</Text>
            <Button style={styles.button} title="Commander" onPress={() => navigation.navigate('Restaurant', { id_site: id_site })} />
        </View>
    );
};

// Define the main component that renders the cards in grid
export default function Home({ navigation }) {
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
            {restaurants.map((card) => (
                <Card key={card.title} {...card} navigation={navigation} />
            ))}
        </View>
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