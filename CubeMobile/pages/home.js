import { StyleSheet, View, Text, Image, Button } from 'react-native';
import axios from 'axios';
// Define an array of card data
const cards = [
    {
        title: 'Card 1',
        image: require('../assets/card1.png'),
        description: 'Ca fait',
        button: 'buy',
    },
    {
        title: 'Card 2',
        image: require('../assets/card2.png'),
        description: 'beaucoup',
        button: 'buy',
    },
    {
        title: 'Card 3',
        image: require('../assets/card3.png'),
        description: 'la',
        button: 'buy',
    },
    {
        title: 'Card 4',
        image: require('../assets/card4.png'),
        description: 'non',
        button: 'buy',
    },
    {
        title: 'Card 5',
        image: require('../assets/card3.png'),
        description: 'la',
        button: 'buy',
    },
    {
        title: 'Card 6',
        image: require('../assets/card4.png'),
        description: 'non',
        button: 'buy',
    },
    {
        title: 'Card 7',
        image: require('../assets/card3.png'),
        description: 'la',
        button: 'buy',
    },
    {
        title: 'Card 8',
        image: require('../assets/card4.png'),
        description: 'non',
        button: 'buy',
    },
];

// Define a component for each card
const Card = ({ title, image, description, button }) => {

    return (
        <View style={styles.card}>
            <Text style={styles.title}>{title}</Text>
            <Image style={styles.image} source={image} />
            <Text style={styles.description}>{description}</Text>
            <Button style={styles.button} title={button} onPress={() => alert(button)} />
        </View>
    );
};

// Define the main component that renders the cards in grid
export default async function Home() {
    var res;
    try {
        const response = await axios.post(
            'http://apigoodfood/getSite.php',
            { headers: { "Content-Type": "application/json" } }
        );
        console.log(response);
        res = response;
    } catch (error) {
        console.log(error);
    }

    return (
        <View style={styles.content}>
            {cards.map((card) => (
                <Card key={card.title} {...card} />
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