import { StatusBar } from 'expo-status-bar';
import React from 'react';
import { StyleSheet, View, Text, Image, Button, ScrollView, SafeAreaView } from 'react-native';
import Navigator from './navigation/stack';

// Define an array of card data
const cards = [
  {
    title: 'Card 1',
    image: require('./assets/card1.png'),
    description: 'Ca fait',
    button: 'buy',
  },
  {
    title: 'Card 2',
    image: require('./assets/card2.png'),
    description: 'beaucoup',
    button: 'buy',
  },
  {
    title: 'Card 3',
    image: require('./assets/card3.png'),
    description: 'la',
    button: 'buy',
  },
  {
    title: 'Card 4',
    image: require('./assets/card4.png'),
    description: 'non',
    button: 'buy',
  },
  {
    title: 'Card 5',
    image: require('./assets/card3.png'),
    description: 'la',
    button: 'buy',
  },
  {
    title: 'Card 6',
    image: require('./assets/card4.png'),
    description: 'non',
    button: 'buy',
  },
  {
    title: 'Card 7',
    image: require('./assets/card3.png'),
    description: 'la',
    button: 'buy',
  },
  {
    title: 'Card 8',
    image: require('./assets/card4.png'),
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
const App = () => {
  return (
    <SafeAreaView style={styles.container}>
      <ScrollView style={styles.scrollView}>
        <View style={styles.content}>
          {cards.map((card) => (
            <Card key={card.title} {...card} />
          ))}

        </View>
      </ScrollView>
    </SafeAreaView>
  );
};

// Define some styles for the components
const styles = StyleSheet.create({
  container: {
    flex: 1,
    flexDirection: 'row',
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#fff',
  },
  scrollView: {
    backgroundColor: 'pink',
    marginHorizontal: 20,
  },
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

export default App;
