import { StyleSheet, View, Text, Image, Button } from 'react-native';
import React, { useState, useEffect } from 'react';
import axios from 'axios';
// Define an array of card data
const cards = [];

// Define a component for each card
const Card = ({ title, image, description, navigation }) => {
    return (
        <View style={styles.card}>
            <Text style={styles.title}>{title}</Text>
            <Image style={styles.image} source={image} />
            <Text style={styles.description}>{description}</Text>
            <Button style={styles.button} title="Commander" onPress={() => navigation.navigate('Restaurant')} />
        </View>
    );
};

// Define the main component that renders the cards in grid
export default function Home({ navigation }) {
    const [cards, setCards] = useState([]);

    useEffect(() => {
        axios.get('http://api/getSites.php')
            .then(function (response) {
                var img = require("../assets/card1.png");
                //var img = "../" + e.image;
                const newCards = response.data.map(e => ({ title: e.nom, image: img, description: e.description }));
                setCards(newCards);
            }).catch(function (error) {
                console.log(error);
            });
    }, []);
    return (
        <View style={styles.content}>
            {cards.map((card) => (
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